<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head>
	<title><?= $page_title;?></title>
	<?= link_tag('css/base.css');?>
	<?= link_tag('css/960r.css');?>
	<?= link_tag('css/admin/admin.css');?>
	<?= link_tag('css/smoothness/jquery-ui-1.9.2.custom.min.css');?>
	
	<?= script_tag('scripts/jquery-1.8.3.js');?>
	<?= script_tag('scripts/jquery-ui-1.9.2.custom.min.js');?>
	<script type="text/javascript">
		$(function(){
			$('#user_name').focus();
		});
	</script>
</head>

<body id="login">
	
	<div class="container_12" id="login-wrapper">
		<div id="tab-container">
			<?= img(array('src'=>'images/'.$this->config->item('site_logo'),'alt'=>$this->config->item('site_name').' Administration'));?>
			<div id="tabs">
			
				<ul>
					<li><a href="#login-tab">Sign In</a></li>
					<li><a href="#forgot-tab">Forgotten Password</a></li>
				</ul>
				
				<div id="login-tab">
					<?= form_open(current_url()); ?>
					<h2>Sign In</h2>
					<p>Log in below to access the <?= $this->config->item('site_name');?> Administration Panel.</p>
					<? if($this->session->flashdata('msg')) : ?>
					<div class="error">
						<p><?= $this->session->flashdata('msg');?></p>
					</div>
					<? endif; ?>
					<?= validation_errors();?>
					<?= form_label('User Name:','user_name');?>
					<?= form_input(array('name'=>'user_name','id'=>'user_name','value'=>set_value('user_name')));?>
					
					<?= form_label('Password:','pass');?>
					<?= form_input(array('name'=>'pass','id'=>'pass','type'=>'password'));?>
					
					<?= form_submit('submit','Sign In', 'id="submit"');?>
					<div class="clear"></div>
					<?= form_close(); ?>
				</div>
				
				
				
				<div id="forgot-tab">
					<h2>Forget your password?</h2>
					<p>
						Please enter the email address registered in our system. We will send you an email message 
						with instructions for resetting your password.
					</p>
					<div id="reset_form_errors"></div>
					<?= form_open('admin/login/reset_password');?>
					
						<?= form_label('Email Address', 'email_reset');?>
						<?= form_input(array('name'=>'reset_email','id'=>'reset_email','value'=>set_value('reset_email')));?>
						
						<?= form_submit('reset-submit','Send','id="reset-submit"');?>
					<div class="clear"></div>
					<?= form_close();?>
				</div>
				
				
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(function(){
			
			$('#tabs').tabs();
			
			
			
			$('#reset-submit').click(function(){
				var posturl = $(this).parent().attr('action'),
					reset_email = $('#reset_email').val();
				$.post(
					posturl,
					{
						'reset_email' : reset_email
					},
					function(r){
						if(r.status === 'validation_failed'){
							$('#reset_form_errors').html(r.message).slideDown('slow');
						} else if(r.status === 'success'){
							$('#forgot-tab').html(r.message);
						} else {
							alert(r.message);
						}
					},'json'
				);
				
				return false;
			});
		});
	</script>
</body>
</html>