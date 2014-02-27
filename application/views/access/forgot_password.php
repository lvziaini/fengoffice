<?php
set_page_title(lang('forgot password'));
add_javascript_to_page('jquery/jquery.js');

$css = array();
Hook::fire('overwrite_login_css', null, $css);
foreach ($css as $c) {
	echo stylesheet_tag($c);
}
?>
<div class="header-container">
	<div class="header">
	<?php if (Plugins::instance()->isActivePlugin('custom_login')) {
			echo_custom_logo_url();
		  } else { ?>
		<a class="logo" href="http://www.fengoffice.com"></a>
	<?php } ?>
	</div>
</div>
<div class="login-body">

<form class="internalForm" action="<?php echo get_url('access', 'forgot_password') ?>" method="post">
<?php tpl_display(get_template_path('form_errors')) ?>
<div class="form-container">
<?php if (!isset($_GET['instructions_sent']) || !$_GET['instructions_sent']) { ?>

  <div class="input">
    <?php echo label_tag('邮箱', 'forgotPasswordEmail')  ?>
    <?php echo text_field('your_email', $your_email, array('class' => 'long', 'id' => 'forgotPasswordEmail')) ?>
  </div>
  <input type="hidden" name="submited" value="submited" />
<?php } ?>
  <div id="forgotPasswordSubmit">
  <?php if (!isset($_GET['instructions_sent']) || !$_GET['instructions_sent']) { 
  			echo submit_button('修改密码');
  		} ?>
  	<span><a class="internalLink" href="<?php echo get_url('access', 'login') ?>"><?php echo ('登陆') ?></a></span>
  </div>
</form>

</div>

</div>
<div class="login-footer">
	<div class="powered-by">
		<?php echo lang('footer powered', 'http://www.fengoffice.com/', clean(product_name())) . ' - ' . lang('version') . ' ' . product_version();?>
	</div>
</div>