<?php

/**
 * Member class
 *
 * @author Diego Castiglioni <diego.castiglioni@fengoffice.com>
 */
class Member extends BaseMember {

	
	private $parent_member = null;
	
	private $skip_validations = array();
	
	private $icon_class = null;
	
	function getAllChildrenObjectTypeIds(){
		return DimensionObjectTypeHierarchies::getAllChildrenObjectTypeIds($this->getDimensionId(), $this->getObjectTypeId());
	}
	
	function getArrayInfo() {
		$columns = $this->getColumns();
		$result = array();
		foreach ($columns as $col) {
			$result[$col] = $this->getColumnValue($col);
		}
		return $result;
	}
	
	function getAllChildrenSorted() {
		$all_children = array();
		
		$children = $this->getAllChildren(false, 'name');
		foreach ($children as $child) {
			$all_children[] = $child;
			$all_children = array_merge($all_children, $child->getAllChildrenSorted());
		}
		
		return $all_children;
	}
	
	function getAllChildren($recursive = false, $order = null) {
		$child_members = array();
		$find_options = array('conditions' => '`parent_member_id` = ' . $this->getId());
		if ($order != null) $find_options['order'] = $order;
		$members = Members::findAll($find_options);
		foreach ($members as $mem){
			$child_members[] = $mem;
			if ($recursive) {
				$children = $mem->getAllChildren($recursive, $order);
				$child_members = array_merge($child_members, $children);
			}
		}
		
		return $child_members;
	}
	
	function getAllChildrenIds($recursive = false) {
		$result = array();
		//if recursive is false, only the first level of children will be returned
		$childs = $this->getAllChildren($recursive);
		foreach ($childs as $child) {
			$result[] = $child->getId();
		}
		return $result;
	}
	
	function getAllChildrenIdsByType($type_id) {
		$result = array();
		//all children in hierarchy
		$childs = $this->getAllChildren(true);
		foreach ($childs as $child) {
			if ($child->getObjectTypeId()== $type_id)
				$result[] = $child->getId();
		}
		return $result;
	}
	
	function getAllChildrenInHierarchy(){
		
		$members = array();		
		$children = $this->getAllChildren();
		foreach ($children as $child){
				$members[] = $child;
				$members = array_merge($child->getAllChildrenInHierarchy(),$members);
		}
		
		return $members;
	}

	/**
	 * Returns all the parent members that are in the same hierachic line, including itself if param is set to true
	 * @return array of Member
	 */
	function getAllParentMembersInHierarchy($include_itself = false, $check_permissions = true){
		
		$child = $this;
		$members = array();		
		
		if ($include_itself){
			while($child != null){
				$members[] = $child;
				$child = $child->getParentMember();
			}
		}
		else{
			while ($child->getParentMember()!= null){
				$child = $child->getParentMember();
				if (!$check_permissions || (function_exists('logged_user') && logged_user() instanceof Contact && ContactMemberPermissions::contactCanAccessMemberAll(implode(',', logged_user()->getPermissionGroupIds()), $child->getId(), logged_user(), ACCESS_LEVEL_READ))) {
					$members[] = $child;
				}
			}
		}
		return $members;
	}
	
	/**
	 * Returns the parent member or null if there isn't one
	 * @return Member
	 */
	function getParentMember() {
		if ($this->parent_member == null){
			if ($this->getParentMemberId() != 0) {
				 $this->parent_member = Members::findById($this->getParentMemberId());
			}
		}
		return $this->parent_member;
	}
	
	
	function canBeReadByContact($permission_group_ids, $user){
		return ContactMemberPermissions::contactCanAccessMemberAll($permission_group_ids, $this->getId(), $user, ACCESS_LEVEL_READ);
	}
	
	/**
	 * @return Dimension
	 * Returns the dimension associated to this member
	 */
	function getDimension() {
		return Dimensions::getDimensionById($this->getDimensionId());
	}
	
	
	function getDimensionRestrictedObjectTypeIds($restricted_dimension_id, $is_required = true){
		return DimensionMemberRestrictionDefinitions::getRestrictedObjectTypeIds($this->getDimensionId(), $this->getObjectTypeId(), $restricted_dimension_id, $is_required);
	}
	
	
	function satisfiesRestriction($member_id){
		$restriction_value = MemberRestrictions::findOne(array('conditions' => '`member_id` = ' . 
							 $member_id. ' AND `restricted_member_id` = '. $this->getId()));
		if ($restriction_value != null) return true;
		else return false;
	}
	
	function delete($check = true) {
		if ($check && !$this->canBeDeleted($error_message)) {
			throw new Exception($error_message);
		}
		// change parent of child nodes
		$child_members = $this->getAllChildren();
		if (is_array($child_members)) {
			$parent = $this->getParentMember();
			foreach($child_members as $child) {
				$child->setParentMemberId($this->getParentMemberId());
				if ($parent instanceof Member) {
					$child->setDepth($parent->getDepth()+1);
				} else $child->setDepth(1);
				$child->save();
			}
		}
		
		// delete member restrictions
		MemberRestrictions::delete(array("`member_id` = ?", $this->getId()));
		MemberRestrictions::delete(array("`restricted_member_id` = ?", $this->getId()));
		
		// delete member properties
		MemberPropertyMembers::delete(array("`member_id` = ?", $this->getId()));
		MemberPropertyMembers::delete(array("`property_member_id` = ?", $this->getId()));
		
		// delete permissions
		ContactMemberPermissions::delete(array("member_id = ?", $this->getId()));
		
		// delete member objects (if they don't belong to another member)
		$sql = "SELECT `o`.`object_id` FROM `".ObjectMembers::instance()->getTableName()."` `o` WHERE `o`.`is_optimization`=0 AND `o`.`member_id`=".$this->getId()." AND NOT EXISTS (
			SELECT `om`.`object_id` FROM `".ObjectMembers::instance()->getTableName()."` `om` WHERE `om`.`object_id`=`o`.`object_id` AND `om`.`is_optimization`=0 AND `om`.`member_id`<>".$this->getId().")";
		$result = DB::execute($sql);
    	$rows = $result->fetchAll();
    	if (!is_null($rows)) {
	    	foreach ($rows as $row) {
	    		$obj = Objects::findById(array_var($row, 'object_id'));
	    		$obj->delete();
	    	}
    	}
    	
    	// clean object_members
    	ObjectMembers::delete("member_id = ".$this->getId());
		
		// delete object if member is a dimension_object
		if ($this->getObjectId()) {
			$object = Objects::findObject($this->getObjectId());
			if ($object instanceof ContentDataObject) $object->delete();
		}
		
		ApplicationLogs::createLog($this, ApplicationLogs::ACTION_DELETE, false, true, true, 'member deleted');
		
		return parent::delete();
	}

	
	function canContainObject($object_type_id){
		return Members::instance()->canContainObject($object_type_id, $this->getObjectTypeId(), $this->getDimensionId());
	}
	
	
	function canBeDeleted(&$error_message) {
		if ($this->getObjectId() == owner_company()->getCreatedById() || $this->getObjectId() == owner_company()->getId()) {
			$error_message = lang("cannot delete member is account owner");
			return false;
		}
		
		$continue_check = false;
		
		$childs = $this->getAllChildren();
		if (count($childs) == 0) {
			$continue_check = true;
		} else {
			if ($this->getParentMemberId() > 0) {
				$child_ots = DimensionObjectTypeHierarchies::getAllChildrenObjectTypeIds($this->getDimensionId(), $this->getParentMember()->getObjectTypeId(), false);
			}
			foreach ($childs as $child) {
				// check if child can be put in the parent (or root)
				if ($this->getParentMemberId() == 0) {
					$dim_ot = DimensionObjectTypes::findOne(array("conditions" => array("`dimension_id` = ? AND `object_type_id` = ?", $this->getDimensionId(), $child->getObjectTypeId())));
					if (!$dim_ot->getIsRoot()){
						$error_message = lang("cannot delete member cannot be root");
						return false;
					}
				} else {
					if (!in_array($child->getObjectTypeId(), $child_ots)){
						$error_message = lang("cannot delete member childs cannot be moved to parent");
						return false;
					}
				}
			}
			$continue_check = true;
		}
		
		if (!$continue_check){
			return false;
		} else {
			$child_ids = $this->getAllChildrenIds();
			$child_ids[] = $this->getId();
			$child_ids_str = implode(",", $child_ids);
			
			$objects_in_member = ObjectMembers::instance()->findAll(array('conditions' => 'member_id = '.$this->getId()));
			if (!$objects_in_member || count($objects_in_member) == 0) {
				return true;
			} else {
				$more_conditions = "";
				if (Plugins::instance()->isActivePlugin('core_dimensions')) {
					$person_dim = Dimensions::findByCode('feng_persons')->getId();
					$more_conditions = " AND member_id NOT IN (SELECT id FROM ".TABLE_PREFIX."members WHERE dimension_id=$person_dim)";
				}
				$object_id_condition = $this->getObjectId() > 0 ? " AND o.id <> ".$this->getObjectId() : "";
				foreach ($objects_in_member as $om) {
					
					$db_res = DB::execute("SELECT object_type_id FROM ".TABLE_PREFIX."objects WHERE id=".$om->getObjectId());
					$row = $db_res->fetchRow();
					if ($row && array_var($row, 'object_type_id')) {
						$req_dim_ids = DimensionObjectTypeContents::getRequiredDimensions(array_var($row, 'object_type_id'));
						if (in_array($this->getDimensionId(), $req_dim_ids)) {
							$error_message = lang("cannot delete member is required for objects");
							return false;
						}
					}
				}
			}
		}
		
		return true;
	}
	
	function validate(&$errors) {
		if (!array_var($this->skip_validations, 'presence of name')) {
			if (!$this->validatePresenceOf('name')) $errors[] = lang('name required');
		}
		if ($this->isNew() && !array_var($this->skip_validations, 'uniqueness of parent - name')) {
			if ($this->getParentMemberId() == 0) {
				if (!$this->validateUniquenessOf('name', 'dimension_id', 'object_type_id')) $errors[] = lang('member name already exists in dimension', $this->getName());
			} else {
				if (!$this->validateUniquenessOf('name', 'parent_member_id', 'object_type_id' )) $errors[] = lang('member name already exists', $this->getName());
			}
		}
	}
	
	/*
	 * It would be nice to be able to add extra validations to the validator
	 */
	function add_skip_validation($validation) {
		if (!array_key_exists($validation, $this->skip_validations)) {
			$this->skip_validations[$validation] = true;
		}
	}
	/**
	 * 
	 * 
	 */
	function getMemberColor($default = null) {
		$color = is_null($default) || !is_numeric($default) ? 0 : $default;
		
		Hook::fire('override_member_color', $this, $color);
		
		return $color;
	}
	
	function getObjectClass() {
		if ($handler = $this->getObjectHandlerClass() ) {
			eval ("\$itemClass = $handler::instance()->getItemClass();");
			if ($itemClass) {
				return $itemClass ;
			}
		}
		return '' ;
	}
	
	function getObjectHandlerClass() {
		if ($otid = $this->getObjectTypeId()){
			if ($ot = ObjectTypes::findById($otid)) {
				if ($handler = $ot->getHandlerClass() ){
					return $handler;
				}
			}
		}
		return '';
	}
	
	
	/**
	 * 
	 */
	function getIconClass() {
		if (!$this->icon_class) {
			if( $itemClass = $this->getObjectClass() ) {
				eval ("\$o = new $itemClass();");
				if ($o instanceof DimensionObject ) {
					$o->setId($this->getObjectId());
					$o->setObjectId($this->getObjectId());
					if( $icon_cls = $o->getIconClass()){
						$this->icon_class = $icon_cls;
						return $this->icon_class;
					}
				}
			}
			// If Obj instance do not define icon class, return object type definition
			$type = ObjectTypes::instance()->findById($this->getObjectTypeId());
			$this->icon_class = $type->getIconClass();
		}
		return $this->icon_class;
	}
	
	/**
	 * 
	 * Returns the memeber relations grouped by dimension  
	 */
	function getRelatedMembers() {
	
		$ids = $this->getAllChildrenIds(true);
		$ids[] = $this->getId();
		
		$sql = "SELECT DISTINCT
					d.id AS dimension_id,
					d.name AS dimension_name ,
					m.id AS member_id,
					m.name as member_name,
					m.parent_member_id as parent
				
				FROM 
					".TABLE_PREFIX."member_property_members p
				INNER JOIN  
					".TABLE_PREFIX."dimension_member_associations a ON a.id = p.association_id
				INNER JOIN  
					".TABLE_PREFIX."dimensions d  ON a.associated_dimension_id = d.id
				INNER JOIN  
					".TABLE_PREFIX."members m ON p.property_member_id = m.id
				WHERE p.member_id IN (".implode(",", $ids).") AND is_active = 1
				ORDER BY dimension_name, member_name";
				
		$rows = DB::executeAll($sql);
		$res = array();
		if (is_array($rows)) {
			foreach ($rows as $row) {
				$res[$row['dimension_name']][] = $row;
			}
		}
		return $res;
	}
	
	/**
	 * Returnrs true if members accepts child nodes, false otherwise
	 * @author Alvaro Torterola - alvaro.torterola@fengoffice.com
	 */
	function allowChilds() {
  		return DimensionObjectTypeHierarchies::typeAllowChilds($this->getDimensionId(), $this->getObjectTypeId());
	}

	
	function getPath(){
		$path='';
		foreach(array_reverse($this->getAllParentMembersInHierarchy(false)) as $parent){
			$path.= $parent->getName(). "/";
		}
		if ($path){
			$path=substr($path, 0, -1);
		}
		return $path;
	}
	
	
	
	/**
	 * @abstract Archives the member and its submembers (including content objects)
	 * @param user Contact
	 * @return Returns the total number of archived objects 
	 * @author Alvaro Torterola - alvaro.torterola@fengoffice.com
	 */
	function archive($user) {
		if (!$user instanceof Contact) return 0;
		
		try {
			DB::beginWork();
			
			$person_dim = Dimensions::findByCode('feng_persons');
			$person_dim_cond = $person_dim instanceof Dimension ? " AND m2.dimension_id<>".$person_dim->getId() : "";
			
			// archive objects that dont belong to other unarchived members
			$sql = "SELECT om.object_id FROM ".TABLE_PREFIX."object_members om INNER JOIN ".TABLE_PREFIX."objects o ON o.id=om.object_id  
					WHERE om.member_id=".$this->getId()." AND o.archived_by_id=0 AND NOT EXISTS (
					  SELECT member_id FROM ".TABLE_PREFIX."object_members om2 INNER JOIN ".TABLE_PREFIX."members m2 ON m2.id=om2.member_id
					  WHERE om2.is_optimization=0 AND m2.archived_by_id=0 AND om2.object_id=om.object_id AND om2.member_id<>om.member_id".$person_dim_cond."
					);";
			$object_ids = DB::executeAll($sql);
			$count = 0;
			if (is_array($object_ids) && count($object_ids) > 0) {
				foreach ($object_ids as $row) {
					$content_object = Objects::findObject($row['object_id']);
					if ($content_object instanceof ContentDataObject) {
						$content_object->archive();
						$count++;
					}
				}
				// Log archived objects
				DB::execute("INSERT INTO ".TABLE_PREFIX."application_logs (taken_by_id, rel_object_id, object_name, created_on, created_by_id, action, is_private, is_silent, log_data)
					VALUES (".$user->getId().",".$this->getId().",".DB::escape($this->getName()).",NOW(),".$user->getId().",'archive',0,1,'".implode(',',array_flat($object_ids))."')");
			}
			
			$this->setArchivedById($user->getId());
			$this->setArchivedOn(DateTimeValueLib::now());
			$this->save();
			
			$sub_members = $this->getAllChildren();
			foreach ($sub_members as $sub_member) {
				if ($sub_member->getArchivedById() == 0) {
					$count += $sub_member->archive($user);
				}
			}
			
			DB::commit();
			
			return $count;
			
		} catch (Exception $e) {
			DB::rollback();
			flash_error($e->getMessage());
			ajx_current("empty");
			return $count;
		}
	}
	
	
	/**
	 * @abstract Unarchives the member and its submembers (including content objects)
	 * @param user Contact
	 * @return Returns the total number of unarchived objects 
	 * @author Alvaro Torterola - alvaro.torterola@fengoffice.com
	 */
	function unarchive($user) {
		if (!$user instanceof Contact) return 0;
		
		try {
			DB::beginWork();
			
			// unarchive this member's objects
			$sql = "SELECT om.object_id FROM ".TABLE_PREFIX."object_members om INNER JOIN ".TABLE_PREFIX."objects o ON o.id=om.object_id  
					WHERE om.member_id=".$this->getId()." AND o.archived_by_id>0";
			$object_ids = DB::executeAll($sql);
			$count = 0;
			if (is_array($object_ids) && count($object_ids) > 0) {
				foreach ($object_ids as $row) {
					$content_object = Objects::findObject($row['object_id']);
					if ($content_object instanceof ContentDataObject) {
						$content_object->unarchive();
						$count++;
					}
				}
				// Log unarchived objects
				DB::execute("INSERT INTO ".TABLE_PREFIX."application_logs (taken_by_id, rel_object_id, object_name, created_on, created_by_id, action, is_private, is_silent, log_data)
					VALUES (".$user->getId().",".$this->getId().",".DB::escape($this->getName()).",NOW(),".$user->getId().",'unarchive',0,1,'".implode(',',array_flat($object_ids))."')");
			}
			$this->setArchivedById(0);
			$this->setArchivedOn(EMPTY_DATETIME);
			$this->save();
			
			$sub_members = $this->getAllChildren();
			foreach ($sub_members as $sub_member) {
				if ($sub_member->getArchivedById() > 0) {
					$count += $sub_member->unarchive($user);
				}
			}

			DB::commit();
			
			return $count;
		
		} catch (Exception $e) {
			DB::rollback();
			flash_error($e->getMessage());
			ajx_current("empty");
			return $count;
		}
	}
	
	
	/**
	 * @abstract Returns all permission groups that has 'allow all' in the member's dimension
	 * and all permission groups that have $access_level permissions for any object type in this member
	 * @param $access_level Permission level check
	 * @return Array of permission group ids
	 */
	function getAllowedPermissionGroups($access_level = ACCESS_LEVEL_READ) {
		$dimension = $this->getDimension();
		$allowall_pg_ids = $dimension->getPermissionGroupsAllowAll();
		$hascheck_pg_ids = $dimension->getPermissionGroupsCheck();
		if (count($hascheck_pg_ids) == 0) $hascheck_pg_ids[] = 0;
		
		$access_level_condition = "";
		if ($access_level == ACCESS_LEVEL_WRITE) $access_level_condition = " AND can_write = 1";
		if ($access_level == ACCESS_LEVEL_DELETE) $access_level_condition = " AND can_delete = 1";
		
		$sql = "SELECT permission_group_id FROM ".TABLE_PREFIX."contact_member_permissions 
			WHERE member_id=".$this->getId()." AND permission_group_id IN (".implode(",", $hascheck_pg_ids).")" . $access_level_condition;
		$checked_pg_ids = array_flat(DB::executeAll($sql));
		
		return array_unique(array_merge($allowall_pg_ids, $checked_pg_ids));
	}
	
	/**
	 * @abstract Returns user ids that has a permission group with $access_level permissions in this member
	 * @param $access_level Permission level check
	 * @return Array of contact ids
	 */
	function getAllowedContactIds($access_level = ACCESS_LEVEL_READ) {
		$allowed_permission_groups = $this->getAllowedPermissionGroups($access_level);
		if (count($allowed_permission_groups) == 0) return array();
		
		$imploded_pgs = implode(",", $allowed_permission_groups);
		if (str_ends_with($imploded_pgs, ",")) $imploded_pgs = substr($imploded_pgs, 0, -1);
		if (is_null($imploded_pgs) || $imploded_pgs == "") $imploded_pgs = "0";
		$contact_ids = DB::executeAll("SELECT contact_id FROM ".TABLE_PREFIX."contact_permission_groups WHERE permission_group_id IN (".$imploded_pgs.")");
		return array_unique(array_flat($contact_ids));
	}
}