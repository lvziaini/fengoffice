	About Feng Office 2.5.1 zhangmeng
	================================
	
	Feng Office is a Collaboration Platform and Project Management System.
	It is licensed under the Affero GPL 3 license.
	
	For further information, please visit:
		* http://www.fengoffice.com/
		* http://fengoffice.com/web/forums/
		* http://fengoffice.com/web/wiki/
		* http://sourceforge.net/projects/opengoo
	
	Contact the Feng Office team at:
		* contact@fengoffice.com
	
	
	System requirements
	===================
	
	Feng Office requires a running Web Server, PHP (5.0 or greater) and MySQL (InnoDB
	support recommended). The recommended Web Server is Apache.
	
	Feng Office is not PHP4 compatible and it will not run on PHP versions prior
	to PHP 5.
	
	Recommendations:
	
	PHP 5.2+
	MySQL 5+ with InnoDB support
	Apache 2.0+
	
		* PHP    : http://www.php.net/
		* MySQL  : http://www.mysql.com/
		* Apache : http://www.apache.org/
	
	Please have a look at our requirements here:
	http://www.fengoffice.com/web/wiki/doku.php/installation:server_reqs
	
	Alternatively, if you just want to test Feng Office and you don't care about security
	issues with your files, you can download XAMPP, which includes all that is needed
	by Feng Office (Apache, PHP 5, MySQL) in a single download.
	You can configure MySQL to support InnoDB by commenting or removing
	the line 'skip-innodb' in the file '<INSTALL_DIR>/etc/my.cnf'.
	
		* XAMPP  : http://www.apachefriends.org/en/xampp


	Installation
	============
	
	1. Download Feng Office - http://fengoffice.com/web/community/
	2. Unpack and upload to your web server
	3. Direct your browser to the public/install directory and follow the installation procedure
	
	Further information can be found here: http://www.fengoffice.com/web/wiki/doku.php/installation:installation
 
	You should be finished in a matter of minutes.
	
	4. Some functionality may require further configuration, like setting up a cron job.
	Check the wiki for more information: http://fengoffice.com/web/wiki/doku.php/setup
	
	WARNING: Default memory limit por PHP is 8MB. As a new Feng Office install consumes about 10 MB,
	administrators could get a message similar to "Allowed memory size of 8388608 bytes exhausted".
	This can be solved by setting "memory_limit=32" in php.ini.
	
	Upgrade
	=======
	
	There currently are two kind of upgrades:
	1- From 2.X to 2.X (or from 1.X to 1.X)
	2- From 1.X to 2.X
	
	Either way, we strongly suggest reading the following article in our Wiki for further information:
	http://www.fengoffice.com/web/wiki/doku.php/installation:migration
	
	Note: Plugins must also be updated (if it corresponds)
	
	Open Source Libraries
	=====================
	
	The following open source libraries and applications have been adapted to work with Feng Office:
	- ActiveCollab 0.7.1 - http://www.activecollab.com
	- ExtJs - http://www.extjs.com
	- jQuery - http://www.jquery.com
	- jQuery tools - http://flowplayer.org/tools/
	- jQuery Collapsible - http://phpepe.com/2011/07/jquery-collapsible-plugin.html
	- jQuery Scroll To - http://flesler.blogspot.com/2007/10/jqueryscrollto.html
	- jQuery ModCoder - http://modcoder.com/
	- H5F (HTML 5 Forms) - http://thecssninja.com/javascript/H5F
	- http://flowplayer.org/tools/
	- Reece Calendar - http://sourceforge.net/projects/reececalendar
	- Swift Mailer - http://www.swiftmailer.org
	- Open Flash Chart - http://teethgrinder.co.uk/open-flash-chart
	- Slimey - http://slimey.sourceforge.net
	- FCKEditor - http://www.fckeditor.net
	- JSSoundKit - http://jssoundkit.sourceforge.net
	- PEAR - http://pear.php.net
	- Gelsheet - http://www.gelsheet.org
	
	
	Changelog
	=========
	
	Since 2.5.1-rc
	----------------
	bugfix: can't view object link in notification when an email does not have a subject.
	
	
	Since 2.5.1-beta
	----------------
	bugfix: cannot add milestones in templates
	bugfix: when adding template, after adding milestone cannot select it when adding a task
	
	
	Since 2.5.0.6
	----------------
	bugfix: Template view broken by single quote in property name.
	bugfix: when edit a template if have milestones you can't see tasks.
	bugfix: don't show members that cannot be used in member selector.
	
	
	Since 2.5.0.5
	----------------
	bugfix: Tasks grouping by dimension fixed.
	
	
	Since 2.5.0.4
	----------------
	performance: Issue when loading persons dim.
	bugfix: Imap folders are not saved when editing an email account.
	bugfix: Cannot unclassify mails from classify form.
	bugfix: Emessage not shown when inputing dates with incorrect format.
	bugfix: Add start date to task view.
	bugfix: Get tasks by range query does not include logged user's timezone.
	bugfix: In task complete edition form, assigned to are not displayed correctly.
	bugfix: Issue in include myself in document notifications.
	bugfix: Set db charset when reconnecting in abstract db adapter.
	
	
	Since 2.5.0.3
	----------------
	bugfix: Add attachments column in queued_emails in upgrade scripts.
	bugfix: Set db charset when reconnecting in abstract db adapter.
	
	
	Since 2.5.0.2
	----------------
	bugfix: Render member selectors with preloaded member info.
	bugfix: Order by name doesn't work on object list.
	bugfix: People widget only display users.
	
	
	Since 2.5.0.1
	----------------
	bugfix: on mysql 5.6 have_innodb variable is deprecated
	
	
	Since 2.5
	----------------
	
	feature: Allow to configure dashboard widget position and order for each user.
	feature: Allow to configure default dashboard widget position and order for all users.
	feature: Comments dashboard widget.
	feature: Email dashboard widget.
	feature: choose to filter calendar widget or not.
	feature: choose the user to filter the tasks widget.
	
	bugfix: when add a timeslot by clock on tasks update the percent complete.
	bugfix: if a file doesn't have revision when classify create one.
	bugfix: several minor fixes of undefined variables, missing langs, etc.
	bugfix: when disabling or reactivating users from company view, users list is not reloaded.
	bugfix: member selector displayed wrong data
	bugfix: on task add/edit view, assignee combo displayed wrong data
	bugfix: subscribers and invited people were not shown correctly
	bugfix: encoding when receiving emails
	bugfix: when editing a classified timeslot, its context was not shown
	bugfix: in file upload, the name is not changed if a new name is entered
	bugfix: missing langs and sql changes for email user config options
	
	
	Since 2.5-rc
	----------------
	
	bugfix: general search form submitted by enter key doesn't work in Google Chrome
	bugfix: links are now saved as such when using WYSIWYG
	bugfix: primary-breadcrumb show exact context
	bugfix: mysql transaction problem when sending emails without using a cronjob
	bugfix: when making a new installation, users were not shown by default
	
	
	Since 2.5-beta
	----------------
	
	bugfix: if a file doesn't have a revision, when classifying an email create one.
    bugfix: when adding a timeslot by clock on tasks, task progress bar was not updated correctly.
    bugfix: fixed custom reports using boolean conditions in false.
    bugfix: problems with paging on the overview list.
    bugfix: on activity widget, when clicking on a member, change dimension.
	
	Since 2.4.0.6
	----------------
	
	plugin: new Advanced Reports plugin for the Professional and Enterprise Edition

	feature: multiple files upload support has been added
	feature: cleaner reports tab
	feature: time reports can be filtered by custom properties
	feature: document notification improvements: allow notifying oneself, changing the default subject, choose whether to attach the document to its notification
	fetaure: unclassify objects dragging them to the "view all" node of a dimension tree
	feature: file revisions are easier to access
	feature: new button to add a template from the task tab
	
	security: XSS issue prevention fixed in login form
	
	performance: mail autocomplete, when contacts > 1000 don't load them all, make a query filtering when user begins to type (after 3 chars)
	performance: subscribers are rendered using ajax in add/edit forms
	performance: member selectors loaded using ajax in add/edit forms 
	performance: render subscribers queries optimized (index added) 
	performance: add index by member_id in contact_member_permissions in upgrade scripts
	perfomance: permissions checks in the advanced search take less time so the search is faster
	perfomance: permissions checks in the general search take less time so the search is faster
	perfomance: context checks in the general search take less time so the search is faster
	perfomance: when listing objects, permissions check query has been improved
	
	bugfix: remember columns selection in mail list
	bugfix: set 777 permission to autoloader to prevent future issues
	bugfix: drag and drop on mails panel don't uncheck selected mails
	bugfix: when instantiating a template, create logs for its tasks
	bugfix: on contact list, ordering by email failed
	bugfix: mysql transaction problem when getting emails
	bugfix: on template view, refresh view after editing a template task
	bugfix: when selecting a parent task in template tasks, only show template tasks from that template
	bugfix: repeating tasks don't allow selecting which days to repeat unless using specific repetition
	bugfix: attachments that start with "#" are not sent
	bugfix: max-height for attachments div when composing an email
	bugfix: undefined variable in message controller
	bugfix: when loading advanced search view, displays search results for empty string search 
	bugfix: when using Google Chrome, advanced search submit button breaks
	bugfix: hardcoded table prefix "fo_" in 2.4 upgrade script
	bugfix: when creating a superadmin, system permissions are not set
	bugfix: being able to order by custom property on notes list
	bugfix: search button disabled until results get displayed
	bugfix: mails in outbox alert show archived emails, it should not
	bugfix: don't send reminders for trashed or archived objects
	bugfix: date custom properties default value does not use user's timezones
	bugfix: when editing an email account do not synchronize folders with the mail server until user chooses to do it
	bugfix: email error reporting hook, for log errors on notifications delivery
	bugfix: when instantiating a template, do not display companies in assign combo unless config option allows so
	bugfix: fails when adding subtasks from task view
	bugfix: sending notifications from inside create log function, breaks the mysql transactions
	
	
	Since 2.4.0.5
	----------------
	
	bugfix: Don't send notification when add mail.
	
	
	Since 2.4.0.4
	----------------
	
	bugfix: Deprecated functions usage.
	bugfix: Emtpy trash can was using a deprecated function with performance issues.
	bugfix: Missing parameters in function invocation.
	
	
	Since 2.4.0.3
	----------------
	
	bugfix: can't delete template task, permission denied.
	
	
	Since 2.4.0.2
	----------------
	
	bugfix: langs customer_folder and project_folder.
	bugfix: can't add contacts from mail.
	bugfix: on activity widget move action don't display.
	bugfix: when create user, notifications break mysql transaction.
	
	
	Since 2.4.0.1
	----------------
	
	bugfix: cron process to emtpy trash can does not delete members asociated to contacts.
	
	
	Since 2.4.0
	----------------
	
	bugfix: tab order fix in quick add task; 
	bugfix: issue when create a subtask from task view;
	
	
	Since 2.4-rc
	----------------
	
	fetaure: error message improved when upload limit is reached.
 
	bugfix: on gantt, names of the tasks were not displayed completely.
	bugfix: on gantt, the time estimation for tasks was not displayed correctly.
	bugfix: date custom properties default value does not use user's timezone.
	bugfix: on people widget add user combo is not ordered by name.
	bugfix: on activity widget dates have gmt errors.
	bugfix: general search allways search for empty string.
	bugfix: url files are not saved correctly when url is not absolute.
	bugfix: imap fetch fixed when last email does not exists in server.
	bugfix: only invite automatically the "filtered user" when adding a new event, not when editing an existing one.
	bugfix: variable member_deleted uninitialized in a cycle, maintains the value of previous iterations and fills the log warnings.
	bugfix: don't display group-mailer button if user doesn't have an email account.
	bugfix: allow mail rules for all incoming messages, useful for autoreplies.
	bugfix: the invitations of the events created on google calendar will have the same special ID of the event.
		
	
	Since 2.4-beta
	----------------
	
	feature: alert users if they have mails in the outbox
	feature: contact custom reports - added columns for address, phones, webpages and im.
	feature: display time estimation in time reports when grouping by tasks
	feature: config option to add default permissions to users when creating a member.
	
	system: upgrade Swift Mailer from version 4.0.6 to 5.0.1, this improves and solves some issues when sending emails with exchange servers
	
	bugfix: on user login when save timezone don't change the update_on value
	bugfix: solved an issue when editing a repetitive task and changing its previous repetition value
	bugfix: solved when editing a template task can't remove a dimension member
	bugfix: solved using repeating tasks when applying a template
	bugfix: on tasks and timeslots reports, if grouped by task it diplay milestones
	bugfix: allow the creation of templates in the root (View all)
	bugfix: Users are now shown by default in the People tab.
	bugfix: when printing the task list view, tasks now display their progress and estimation
	bugfix: on general search prevent multiple form submit.
	
	
	Since 2.3.2.1
	----------------
	
	feature: templates have been greatly improved: they have changed completely for good!
	feature: remember selection on total task execution time report
	feature: when sending an email, if a word containing attach is found and no attachment if found, it triggers an alert.
	feature: new user config option to set how many members are shown in breadcrumbs
	feature: update plugins after running upgrade from console.
	feature: add root permission when creating executive or superior users.
	feature: contact edit form has been improved
	
	bugfix: when uploading avatars, if it is .png and its size is smaller than 128x128 the image is not resized
	bugfix: when sending an mail, the sender is now subscribed to it
	bugfix: when adding a file from an email attachment, its now set to be created by the account owner
	bugfix: reporting pagination fixed 
	bugfix: custom reports, csv and pdf export only exports the active page..now it exports everything!
	bugfix: don't collapse task group after performing an action to the task when group is expanded.
	bugfix: email parsing removes enters and some emails were not shown correctly
	bugfix: people widget in french used to cause a syntax error
	bugfix: don't classify email in account's member if conversation is already classified.
	bugfix: task filtering by user has been improved: it loads faster and more accurate
	bugfix: the users selectbox for assignees has been improved: it loads faster and more accurate
	bugfix: check for "can manage contacts" in system permissions if column exists
	bugfix: email parsing does not fetch addresses when they are separated by semicolon
	bugfix: tasks assigned to filter doesn't filter correctly when logged user is an internal collaborator and users 	can add objects without classifying them.
	bugfix: search result pagination issue
	bugfix: search results ordered by date again
	bugfix: add to searchable objects failed for some emails
	bugfix: custom properties migration fix
	bugfix: feng 1 to feng 2 upgrade improved
	bugfix: style fixes in administration tabs
	bugfix: checkbox in contact tab now is working properly. initially it does not show the users
	bugfix: google calendar sync issue for events with over 100 chars has been solved
	bugfix: contact csv export fixed: when no contact is selected => export all contact csv export fixed
	bugfix: some undefined variables have been defined
	bugfix: some translations that were missing were added
	
	security: remove xss from request parameters
	
	performance: search engine has been greatly improved
	
	other: the search button is disabled until returns the search result
	other: when upgrading to 2.4 the completed tasks from feng 1 will change to 100% in completed percentage
	
	
	Since 2.3.2
	----------------
	
	bugfix: When creating members, do not assign permissions for all executives (or superior users) if member has a parent.
	
	
	Since 2.3.2-rc2
	----------------
	
	bugfix: Cannot filter overview by tag.
	bugfix: Tasks tooltip in calendar views shows description as html.
	bugfix: Permissions issue when editing and subscribing for non-admins for not classiffied objects.
	
	
	Since 2.3.2-rc
	----------------
	
	bugfix: Show can_manage_billing permission.
	bugfix: Missing lang on javascript langs. 
	bugfix: Javascript plugin langs are not loaded.
	bugfix: When requesting completed tasks for calendar month view, it does not filter by dates and calendar hangs if there are too much tasks.
	bugfix: Administration / dimensions does not show members for dimensions that don't define permissions.
	bugfix: Permissions fix when email module is not installed.
	bugfix: Company object type name fixed.
	bugfix: Try to reconect to database if not conected when executing a query (if connection is lost while performing other tasks).
	bugfix: When users cannot see other user's tasks they can view them using the search.
	bugfix: Group permissions not applied in assigned to combo (when adding or editing tasks).
	bugfix: Minor bugfixes in 1.7 -> 2.x upgrade.
	bugfix: Activity widget: logs for members (workspaces, etc.) were not displayed.
	bugfix: General search sql query improved.
	bugfix: Don't include context in the user edited notification.
	bugfix: Don't show worked hours if user doesn't have permissions for it.
	bugfix: Don't send archived mails.
	
	feature: Only administrators can change system permissions.
	feature: Users can change permissions of users of the same type (only dimension member permissions).
	feature: Set permissions to executive, manager and admins when creating a new member.
	
	
	Since 2.3.2-beta
	----------------
	
	bugfix: Archiving a submember does not archive its objects.
	bugfix: Error 500 when adding group.
	bugfix: Installer fixes.
	bugfix: Modified the insert in read objects for emails.
	bugfix: Minor bugfixes in document listing.
	bugfix: Sql error when $selected_columns ins an empty array in ContentDataObjects::listing() function
	bugfix: root permissions not set when installing new feng office.
	bugfix: Person report fixed when displaying email field.
	bugfix: contacts are always created when sending mails.
	bugfix: Tasks list milestone grouping fixed.
	
	preformance: Search query improved.
	performance: Insert/delete into sharing table 500 objects x query when saving user permissions.
	
	
	Since 2.3.1
	----------------
	
	bugfix: When ordering tasks and subtasks and grouping by some criterias.
	bugfix: ul and ol (list) on task description doesn't show number or bullet.
	bugfix: Don't update email filter options when reloading email list if they are not modified.
	bugfix: Eail polling only when browser tab is active.
	bugfix: Wait time interval to check an email account.
	bugfix: Session managment fix.
	bugfix: Workspaces widget to the left.
	bugfix: When creating workspace it is not selected if it isn't a root workspace.
	bugfix: Update objects when linking to others, from user_config_option to config_option.
	bugfix: Calendar dalily view puts other days tasks.
	bugfix: Fixes of undefined variables logged in cache/log.php.
	bugfix: Call popup reminders only from active browser tab.
	bugfix: Format date funcions did not use config option for format.
	bugfix: Username is not remembered when creating a new user.
	bugfix: People widget is not displayed.
	bugfix: When unzipping a file the name has the url first.
	bugfix: On Trashed Objects breadcrumbs are not displayed if members are archived.
	bugfix: When add a timespan on a task was always taking logged user id for billing.
	bugfix: Time zone bug on list task in a range of dates.
	bugfix: Last login not saved into data base.
	bugfix: Google calendar synchronization bug fixes.
	
	performance: Save permissions asyncronically when saving member to improve performance.
	
	feature: New login form.
	feature: Field "Is user" added for people custom reports.
	feature: Users permissions can be configured to leave objects unclassified and choose the users that can read/write/delete these objects.
	feature: Tasks view improved.
	feature: People widget improved.
	feature: Improved member panels loading.
	
	language: Several language updates.	
	
	Since 2.3.1-beta
	----------------
	feature: View Contacts direct url if config option is enabled.
	feature: The system now remembers whether you are displaying the Overview as dashboard or as list.
	    
	bugfix: Duplicate key inserting read objects solved.
	bugfix: When writing an email from email tab, bcc was always displayed.
	bugfix: Events report end date did not show the time, now they do.
	bugfix: Objects history was not displaying linked objects logs.
	bugfix: On task list when you filter by a range of dates permissions filtering were not applied.
	bugfix: Exchange compatibility option has been removed.
	bugfix: When listing tasks timezones were not being taken into account.
	bugfix: Last login field was not being updated.
	bugfix: Gantt chart was showing some tasks as completed when their percentage was over 100% and they were not completed
	bugfix: When adding a timeslot for someone else within a task, the billing value was not being taken into account
	bugfix: Gantt chart tasks resizing has been improved 
	
	Since 2.3
	----------------
	feature: In the contact panel you can choose contacts in order to send a group mail
	feature: New user config option, updating an object’s date when it is linked to another object
	feature: Gantt sub tasks can be out of range of parent task dates.
	feature: Gantt chart and Task List can be filtered by period.
	feature: Comments are now displayed on Activity Widget.
	feature: Gantt Chart now displays tasks with only start or due date
	feature: archive/unarchive dimension members from administration->dimensions.
	feature: when uploading a file with the same name as another that has been uploaded by other user and you don't have permissions over it, don't show as if exists.
	feature: New Projects by default will start with “good” status
	feature: Listing function does not use limit if start parameter is not specified
	feature: When adding a client/project the initial focus is on name
	 
	performance: tasks list performance has been greatly enhanced by loading the descriptions afterwards through Ajax
	performance: when saving members save permissions using an async request.
	 
	bugfix: Users invited to an event can view/edit their invitation on Google Calendars
	bugfix: Editing  e-mail accounts correctly by administrator or user with permissions
	bugfix: Export only visible contacts/companies in contact panel
	bugfix: User e-mail duplication upon creation
	bugfix: Completing  tasks with child tasks error
	bugfix: Contact who trashed a document now shown in history
	bugfix: Worked time was not always displayed.
	bugfix: There were empty logs in the Activity widget
	bugfix: Group by on tasks lists, subtasks displayed in wrong place.
	bugfix: Sort listings by custom properties(contact, document) .
	bugfix: Activity Widget broken on small screens.
	bugfix: Activity Widget time zone issue.
	bugfix: Custom property, escape commas.
	bugfix: Contact custom reports now show their email addresses
	bugfix: Search contacts by phone number, email , im and by address.
	bugfix: add_to_members when no permissions over parent .
	bugfix: Duplicate key when adding emails to searchable objects.
	bugfix: User with permissions to edit account cannot delete unclassified emails.
	bugfix: projects widget does not show projects.
	bugfix: Sql was not using "select distinct" on searchable objects().
	bugfix: add task dependency js error .
	bugfix: ObjectController::list_objects malformed sql error.
	bugfix: Now all users can sync Feng Calendar with Google Calendar.
	bugfix: Google Calendar is no longer trashing old events
	bugfix: Trash fails when mail plugin is not installed
	bugfix: Member selector fixed for IE
	bugfix: Some permissions were not set when adding new member
	bugfix: Creating reports of “grouping by user” and “members” at the same time issue fix
	bugfix: Report not showing correct Date in condition legend
	bugfix: SQL issue in Report fixed
	bugfix: Description not set for all tasks when listing.
	bugfix: Left menu expands after adding first client or project
	
	Since 2.3-rc
	----------------
	
	bugfix: Tasks don't show custom properties when printing one.
	bugfix: Rearranged task name and remove button in template edition to avoid overlapping.
	bugfix: Edit task sometimes opens new tab when saving.
	bugfix: Several report grouping bugfixes.
	bugfix: Advanced search by custom property doesn't find the object.
	bugfix: Classify weblinks by drag & drop does nothing.
	bugfix: Event notifications broken with large user names.
	bugfix: IE crashes when loading member trees.
	bugfix: Bugfix when timeslot has no user.
	bugfix: Export to csv, escaped commas and semicolons, improved time management.
	bugfix: Workspace and tags added for new event and task notifications.
	bugfix: Company logo is not displayed well on IE.
	bugfix: Breadcrumbs for the search results.
	bugfix: Improved task list grouping when grouping by date fields.
	bugfix: Overview calendar widget "view more" link broken.
	bugfix: Show main dashboard when clicking on "View all" of People dimension.
	bugfix: Show "save with new name" button after saving a new document.
	bugfix: Object picker pagination shows wrong total.
	bugfix: Several missing langs fixed (en_us, es_la).
	
	Since 2.3-beta
	----------------
	
	feature: Action prompt after workspace creation.
	feature: Advanced search improved.
	feature: Improved export to csv in total tasks time report.
	feature: People panel, move to trash button (only for companies without contacts and for contacts that are not users).
	feature: People panel, improved filter by type (users, companies and contacts as checkboxes).
	feature: Task and event reminders improved.
	feature: Double clicking a workspace takes you to the workspace edition form.
	feature: Custom reports can be ordered by external columns (e.g. milestones, assigned to, etc).
	feature: add/edit template - can specify milestone for each task.
	feature: Height adjustment document preview.
	feature: New buttons to add workspaces and other objects in dashboard widgets.	
	
	bugfix: When uploading files: detect file type from extension when browser sends 'application/x-unknown-application' as file type.
	bugfix: Add to searchable objects doesn't add special characters correctly.
	bugfix: read_objects insert query reimplementation.
	bugfix: Parent workspace not passed when adding workspace from widget button.
	bugfix: Duplicated config option in upgrade script.
	bugfix: Advanced search: sql security issues fixed.
	bugfix: Render "table custom properties" fixed when object has no values for the property.
	bugfix: Error in activity widget for some comments.
	bugfix: Plugin installer returns 'duplicate key' when executing it twice for the same plugin.
	bugfix: Login layout broken for some languages.
	bugfix: Add milestones for tasks in templates: when editing template milestones combos are unselected.
	bugfix: Prevent user deletion from object listings (dashboard).
	bugfix: Workspaces plugin update 4 -> 5 fixed.
	bugfix: Event reminders don't show event name in popup.
	bugfix: Emails addToSharingTable() fixed.
	bugfix: Custom reports malformed conditions when using boolean fields (e.g. is_company).
	bugfix: Search pagination fixed for advanced search results.
	bugfix: Changing assinged to in tasks edition sometimes does not show the notification checkbox.
	bugfix: Member selector fix when not is_multiple.
	bugfix: sql injection in advanced search.
	bugfix: Cannot upload files if no workspace or tag is selected.
	bugfix: Template instantiation does not puts the objects in original members if instantiation is made with no member selected.
	bugfix: Don't save email if cannot save the email file in the filesystem.
	bugfix: csv export fix when & and enters are present in task names or descriptions.
	bugfix: Tasks status filters fixced.
	bugfix: When the whole mail is an attachment, it is not shown.
	bugfix: Show users and people lists expanded in company view.
	bugfix: Object picker pagination shows wrong total.
	
	language: Several language updates.
	
	
	Since 2.2.4.1
	----------------
	
	bugfix: Add permissions over timeslots, reports and templates for user in user's person member when creating the user.
	bugfix: Assigned to combo does not show users when filering by tag.
	bugfix: First person added not shown in tree.
	bugfix: Add object_id to searchable objects.
	bugfix: Empty trash will try to delete deleted emails.
	bugfix: Trash can shows deleted emails.
	bugfix: Create email account gives permissions to it to other users.
	bugfix: Cannot add user if any dimension is required.
	bugfix: Comments are not added to sharing table.
	
	feature: Config option to enable assign tasks to companies.
	
		
	Since 2.2.4
	----------------
	
	bugfix: Add/edit member form permissions goes down if screen is not wide enough.
	bugfix: Member selector onblur must select one of the list if there is any match and there is at least one character written.
	bugfix: Object picker: do not show object types not allowed for the user in the left panel
	bugfix: D&D classify is allowing to classify in read only members.
	bugfix: Do not show parent members in member selector if user has no permissions over them.
	bugfix: Upgrade 1.7 -> 2.X: give permissions over timeslots, reports and templates in all workspaces where the user can manage tasks.
	bugfix: Non admin users cannot delete timeslots.
	
	feature: Can define required dimension without specifying object types.
	feature: Option to view members in a separate column.
	
	
	Since 2.2.4-beta
	----------------
	
	bugfix: Cannot delete user with no objects associated.
	bugfix: Javascript error when loading and change logo link does not exists.
	bugfix: plugin administration fixes.
	bugfix: Email content parts that come in attachments are not shown.
	bugfix: Tasks edition in gantt chart loses task description.
	bugfix: Adding client or project under another member does not remember selected parent when using quickadd and details button.
	
	feature: More options for tasks edition.
	feature: More options for composing emails.
	
	language: Languages updated: German, French, Japanese, Polski.
	
	
	Since 2.2.3.1
	-------------
	
	bugfix: Cannot add user without password if complex passwords are enabled.
	bugfix: Include ";" as metacharacter for complex password validations.
	bugfix: Member name is username when adding a contact (editing contact fixes member).
	bugfix: Change logo link does not work.
	bugfix: Repetitive tasks fix.
	bugfix: fo_ table prefix hardcoded one time.
	bugfix: Calendar tasks display fixed.
	bugfix: Always check if member can be deleted.
	bugfix: Cannot delete mail account with mails.
	bugfix: Add contact was checking if user has can_manage_security.
	bugfix: Cannot select parent member using checkboxes.
	bugfix: Error 500 in some notifications.
	bugfix: New client/project from overview fixed.
	bugfix: Breadcrumbs only show 2 members x dimension.
	bugfix: Total tasks time reports csv export does not work.
	bugfix: Fix en c�lculo de porcentaje de avance de tareas.
	bugfix: Forwarding or replying mails in German only prints "null".
	bugfix: Function getCustomPropertyByName fixed.
	bugfix: Activity widget popup wider to put all buttons in one line.
	bugfix: Users in assign_to combo are not ordered.
	bugfix: 1.7 -> 2.x upgrade does not create table mail_spam_filters.
	bugfix: Tags are lost when dragging a task to another workspace.
	
	performance: Delete account emails performance and memory usage improvements.
	
	feature: Compose mail get contacts by ajax.
	feature: Custom properties columns in documents tab.
	feature: No breadcrumbs for users in activity widget.
	feature: Ckeditor option added: remove html format.
	
	language: Deutch, Russian, Ukranian, Portuguese and Indonesian language updates.
	language: Several language fixes.
	
	
	Since 2.2.3.1-beta
	------------------
	bugfix: Search in a member does not find file contents.
	bugfix: Click on "search everywhere" does not find file contents.
	bugfix: Groups listed alphabetically in the Administration Panel.
	bugfix: Monthly view calendar print shows empty calendar.
	bugfix: Improvements in performance of overview widgets.
	bugfix: Timeslots are not reclassified reclassifying tasks.
	bugfix: Cannot delete members if it has objects.
	bugfix: Member deletion does not clean all related tables.
	bugfix: Only managers or superior roles can change other user passwords.
	bugfix: Several missing langs and undefined variables warnings clean.
	bugfix: Db error when adding two workspaces with the same name.
	bugfix: Quick add files - all radio buttons can be selected.
	
	system: Russian translations updated.
	
	
	Since 2.2.2
	----------------
	bugfix: Owner company cannot be classified.
	bugfix: Task list group by user fix.
	bugfix: Add pdf and docx files to searchable objects.
	bugfix: js managers bugfixes.
	bugfix: Cannot edit/delete mails from deleted accounts.
	bugfix: Error in tasks reports when ordering by 'order' column.
	bugfix: Fixes in migration from 1.X of custom properties.
	
	usability: Reports can be edited to allow execution in every context.
	usability: Performance improved in tasks list.
	usability: Users are filtered by permissions in 'People' dimension when filtering by a workspace.
	usability: Contacts are filtered in 'People' dimension when filtering by a workspace if they belong to the workspace.
	
	system: Portuguese language updated.
	
	
	Since 2.2.1
	----------------
	bugfix: logged_user fix when classifying attachments
	bugfix: go back instead of redirect when editing file properties.
	bugfix: chmod after mkdir when repository file backend creates directory
	bugfix: Several template instatiation fixes
	bugfix: mail classification bugfix
	bugfix: allow to classify mails in workspaces,tags
	bugfix: administration/users: 10 users per page fix
	bugfix: do not use objects in estimated-worked widget, use raw data for better performance
	bugfix: language fixes
	bugfix: cannot use assigned_to combo when adding tasks in ie
	bugfix: ie compatibility fix in calendar toolbars
	bugfix: enable/disable cron events for calendar export/import when adding/deleting accounts
	bugfix: html tags in task tooltip description at calendar
	bugfix: cvs export prints html tags
	bugfix: users with can_manage_security cannot manage groups
	bugfix: view week calendar views don't show tasks all days if task starts or ends in another week
	bugfix: dont show timeslots of other users if cannot see assigned to other's tasks
	bugfix: ext buttons hechos a lo chancho
	bugfix: patch if not exists function array_fill_keys (para php < 5.2)
	bugfix: break large words in task description
	bugfix: administrator cannot log in to admin panel when asking for credentials
	bugfix: cannot edit file after uploaded from object picker
	bugfix: getTimeValue when 12:XX AM
	bugfix: bugfix in custom reports with boolean conditions on custom properties
	bugfix: admin users paging fix
	bugfix: migration companies comments fix

	
	
	Since 2.2.1-rc
	----------------
	bugfix: Cannot manage plugins if no super admin.
	bugfix: Reports were not grouping unclassified objects.
	bugfix: Reports grouping misses a group.
	bugfix: Fixed findById function in ContentDataObjects.
	bugfix: Fixed Email plugin installation.
	bugfix: Fixed translations for dimension names.
	bugfix: Error with company logo when sending notifications.
	bugfix: Time report fix when selecting custom dates and listing paused timeslots.
	bugfix: Fix when getting plugin's javascript translations.
	
	
	Since 2.2
	----------------
	bugfix: Calendar monthly view bugs with repeating events.
	bugfix: Permissions system fix.
	bugfix: Projects appear in object picker.
	bugfix: language fixes (en_us, es_la, es_es).
	bugfix: Error in calendar when user has timezone=0.
	bugfix: Formatted tasks description and notes content does not shows italics and quotes when viewing.
	bugfix: Compressing files does not create compressed file in the current context.
	bugfix: Sometimes can subscribe users with no permissions to the object.
	bugfix: Activity widget bug with general timeslots.
	bugfix: Error when selecting default workspace in mail account edition.
	bugfix: User types are not transalted.
	bugfix: Prevent double generation of tasks when completing a repetitive task instance (double click on complete link).
	bugfix: CSV export fixes at Total tasks times report.
	
	usability: Create events according the filtered user.
	usability: Config option to show tab icons.
	usability: Config option to enable/disable milestones.
	
	
	Since 2.2-rc
    ----------------
    bugfix: calendar monthly view performance upgrades.
    bugfix: translation tool for plugins fixed.
    bugfix: email html signature puts br tags when composing email.
    bugfix: Person email modification does not work.
    bugfix: Prevent double task completion (when double clicking on complete link).
    bugfix: Fixed company edit link from people tree.
    
	
	Since 2.2-beta
	----------------
	bugfix: several fixes in custom reports display.
	bugfix: custom reports csv/pdf export always show status column.
	bugfix: dashboard activity widget does not control permissions correctly.
	bugfix: dashboard activity widget shows username instead of person complete name.
	bugfix: subworkspace creation does not inherit color.
	bugfix: email autoclassification does not classify attachments.
	bugfix: email view shows wrong "To" value when "To" field is empty or undefined.
	bugfix: unclassified mails allows to subscribe other users.
	bugfix: error when forwarding another user's account emails with attachments.
	bugfix: several fixes in email classification functions.
	bugfix: company comments are not displayed.
	bugfix: dashboard's tasks widget breaks right widgets when scrolling (only in chrome).
	bugfix: permissions check in Administration/Dimensions.
	bugfix: css is being printed in csv exported reports.
	bugfix: error subscribing users when instantiating templates with milestones and subtasks.
	bugfix: don't use $this in static functions.
	bugfix: archiving and unarchiving members is not done in a transaction.
	bugfix: permissions in dimension member selectors.
	bugfix: cannot set task's due date to 12:30 PM, always sets the same time but AM.
	bugfix: tasks drag and drop losses some attributes.
	
	usability: mouseover highlight on member properties/restrictions tables.
	
	
	Since 2.1
	----------------
	bugfix: several fixes in repetitive tasks.
	bugfix: quick add of tasks does not subscribe creator.
	bugfix: google calendar import fixed.
	bugfix: fixed event deletion.
	bugfix: fixed email account sharing.
	bugfix: fixed AM/PM issue when selecting task's dates.
	bugfix: special characters in workspace when adding from quick add.
	bugfix: error 500 in workspaces dashboard.
	bugfix: error when searching emails by "From" field in advanced search.
	bugfix: 1.7 -> 2.x upgrade fixed subtasks.
	bugfix: permissions in user's card.
	bugfix: task's drag and drop edition bugfixes.
	bugfix: task's quick add does not keep the task name when switching to complete edition.
	bugfix: several LDAP integration fixes.
	bugfix: fixed contact phones display in list.
	bugfix: config option descriptions added.
	bugfix: user email is not required.
	bugfix: milestone selector does not show all available milestones.
	bugfix: person email cannot be edited.
	bugfix: disabled users are shown in subscribers and invited people.
	bugfix: permission groups upgrade does not set type.
	bugfix: Javascript problems in IE.
	bugfix: issues with breadcrumbs with special characters.
	bugfix: VCard import/export fixed.
	bugfix: cannot delete workspace with apostrophe.
	bugfix: fixed "enters" issue in tasks description wysisyg editor.
	bugfix: File copy makes two copies.
	bugfix: permissions fixed for submembers.
	bugfix: when updating a file, does not subscribe the updater user.
	bugfix: milestones display diferent dates in milestone view and task list.
	bugfix: "assigned to" filter in tasks does not work properly.
	bugfix: cannot archive dimension members.
	bugfix: cannot archive several tasks at once.

	feature: activity widget.
	feature: new workspace and tag selectors.
	feature: add timeslot entries to application_logs.
	feature: complete parent tasks asks to complete child tasks.

	usability: sort email panel by "to" column.
	usability: changes in advanced search for email fields.
	usability: can change imported calendar names.
	usability: email with attachments classification process upgraded.
	usability: linked objects selector can filter by workspace and tags.

	system: CKEditor updated.
	system: translation module upgraded - translate plugins files.
	system: German, Russian and French languages upgraded.

    
    Since 2.0.0.8
    ----------------
    bugfix: Google Calendar issues solved
	bugfix: 'Executive' users not being able to assign tasks to themseleves at some places
	bugfix: Admins and Superadmins may now unblock bloqued documents
	bugfix: Subscriptions and permissions issues solved
	bugfix: Solved some issues when editing objects
	bugfix: Solved issue when classifying emails and then accesing them
	bugfix: Solved issue when adding timeslots
	bugfix: Assigned to alphabetically ordered
	bugfix: Solved issue when editing email accounts
	bugfix: Custom properties were not appearing in weblinks
	bugfix: Solved issue when sending an email
	bugfix: Solved issue where Milestones were showing wrong data
	bugfix: File revisions were not being deleted
	bugfix: Timeslots were not able to be printed
	bugfix: Issues when retrieving passwords solved
	bugfix: Solved issue when deleting timeslots
	bugfix: Solved some permissions issues
	bugfix: Solved issue when adding pictures to documents
	bugfix: Solved issues with paginations
	bugfix: Solved some compatibility issues with IE
	bugfix: People profiles can be closed
	bugfix: Trashed emails not being sent
	bugfix: Repetitive tasks issues solved
	bugfix: Solved workspace quick add issue
	bugfix: Dimension members are now searchable
	 
	usability: Sent mails synchronization reintroduced
	usability: Selecting if repetitive events should be repeated on weekends or workdays
	usability: Templates now take into account custom properties
	usability: Dimension members filtering improvements
	usability: New & improved notifications
	usability: Adavanced search feature
	usability: Added quick task edition, and improved quick task addition
	usability: Improvements when linking objects
	usability: Improvements in task dependencies
	usability: Warning when uploading different file
	usability: Google Docs compatibility through weblinks
	usability: Improved the templates usability
	usability: Workspace widget introduced
	usability: Improvement with estimated time in reports
	usability: Added estimated time information in tasks list
	usability: Deletion from dimension member edition
	usability: Archiving dimension members funciton introduced
	usability: File extension prevention upload
	usability: WYSIWYG text feature for tasks descriptions and notes
	usability: View as list/panel feature reintroduced
	usability: .odt and .fodt files indexing
	 
	system: Improved upgrade procedure
	system: Improved the sharing table
	system: Improved performance when checking emails through IMAP
	system: Improved performance within tasks list
	system: Improved performance when accessing 'Users'
	system: Improved performance with ws colours
	system: Improved performance when loading permissions and dimensions
	system: Improvements within the Plugin system
	system: Major performance improvements at the framework level
	    

	Since 2.0 RC 1
	----------------
	bugfix: Uploading files fom CKEditor.
	bugfix: Some data was not save creating a company.
	bugfix: Error produced from documents tab - New Presentation.
	bugfix: Problems with task dates in some views.
	bugfix: Fatal error when you post a comment on a task page.
	bugfix: Generation of task repetitions in new tasks.
	bugfix: Do not let assign tasks (via drag & drop) to users that doesn't have permissions.
	usability: Interface localization improvements.
	system: Performance improvements.


	Since 2.0 Beta 4
	----------------
	bugfix: Extracted files categorization
	bugfix: When adding workspaces
	bugfix: Breadcrumbs were not working fine all the time 
	bugfix: Being able to zip/unzip files
	security: JS Injection Slimey Fix
	system: .pdf and .docx files contents search
	system: Improvement when creating a new user
	system: Plugin update engine
	system: Plugin manager console mode 
	system: Search in file revisions
	system: Import/Export contacts available again
	system: Import/Export events available again
	system: Google Calendar Sync 	
	system: Improvement on repeating events and tasks
	system: Cache compatibility (i.e.: with APC)
	usability: Completing a task closes its timeslots
	usability: Task progress bar working along the timeslots
	usability: Being able to change permissions in workspaces when editing
	
	
	Since 2.0 Beta 3
	----------------
	
	bugfix: Several changes in the permissions system
	bugfix: Invalid sql queries fixed
	bugfix: Issues with archived and trashed objects solved
	bugfix: Issues with sharing table solved
	bugfix: Improved IE7 and IE9 compatibility
	bugfix: Several timeslots issues solved
	bugfix: IMAP issue solved at Emails module
	bugfix: Solved issue with templates
	bugfix: Added missing tooltips at calendar 
	bugfix: Issue when completing repetitive task solved
	bugfix: Solved some issues with the Search engine
	bugfix: Solved issue with timezone autodetection
	buffix: Solved 'dimension dnx' error creating a workspace
	usability: Permission control in member forms
	usability: Disabling a user feature
	usability: Resfresh overview panel after quick add
	usability: Langs update/improvement
	usability: Drag & Drop feature added 	
	usability: Quick add task added, and improved
	usability: Slight improvement with notifications
	usability: Avoid double click at Search button (which caused performance issues)
	usability: Permissions by group feature added
	usability: Simple billing feature added
	system: Security Fixes
	system: Mail compatibility improved for different email clients 	 
	system: Feng 2 API updated
	system: General code cleanup
	system: Widget Engine
	system: Performance improvements in custom reports
	system: Print calendar
	system: Custom Properties

	Since 2.0 Beta 2
	----------------
	bugfix: Fixed problem uncompressing files
	bugfix: Loading indicator hidden
	bugfix: Search in mail contents
	bugfix: Mail reply js error
	bugfix: Filter members associated with deleted objects
	bugfix: Fixed permission error creating a contact
	usability: Contact View Improvements
	usability: Navigation Improvements
	system: Permission system fixes
	system: Performance issues solved. Using permission cache 'sharing table' for listing
	system: Weblinks module migrated
	
	
	Since 2.0 Beta 1
	----------------

	bugfix: Fixed problem with context trees when editing content objects
	bugfix: Fixed template listing
	bugfix: Fixed issues when instantiating templates with milestones
	bugfix: Fixed issue deleting users from 'people' and 'users' dimension.
	bugfix: Fixed 'core_dimensions' installer
	bugfix: Z-Index fixed in object-picker and header
	usability: Selected rows style in object picker
	system: General code cleanup
	
	
	Since 1.7
	-----------
	
	system: Plugin Support
	system: Search Engine performance improved
	system: Multiple Dimensions - 'Workspaces' and 'Tags' generalization
	system: Database and Models structure changes - Each Content object identified by unique id 
	system: Email removed from core (Available as a plugin)
	system: User Profile System
	feature: PDF Quick View - View uploaded PDF's
	usability: Default Theme improved
	usability: Customizable User Interface
	
