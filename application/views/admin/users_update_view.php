
<?= form_open(current_url());?>
	<?= form_fieldset('Update User Record');?>
		<p>Use the form below to update this Administrative User </p>
		<?= validation_errors();?>
		<div class="grid_4 alpha">
			<?= form_label('First Name', 'first_name');?>
			<?= form_input(array('name'=>'first_name','id'=>'first_name','value'=>set_value('first_name',$user['first_name']),'placeholder'=>'First Name'));?>
			
			<?= form_label('Last Name','last_name');?>
			<?= form_input(array('name'=>'last_name','id'=>'last_name','value'=>set_value('last_name',$user['last_name']),'placeholder'=>'Last Name'));?>
			
			<?= form_label('Email Address','email');?>
			<?= form_input(array('name'=>'email','id'=>'email','type'=>'email','value'=>set_value('email',$user['email']),'placeholder'=>'Email Address'));?>
		</div>
		<div class="grid_5 omega">	
			<h3 class="remove-bottom">Update Password</h3>
			<h5 class="half-bottom">[ optional ]</h5>
			<?= form_label('Password','password');?>
			<?= form_input(array('name'=>'password','id'=>'password','type'=>'password'));?>
			
			<?= form_label('Confirm Password','password2');?>
			<?= form_input(array('name'=>'password2','id'=>'password2','type'=>'password'));?>
			
			<?= form_input(array('name'=>'type','id'=>'type','type'=>'hidden','value'=>1));?>
			
		</div>
		<div class="clear"></div>
		<?= form_submit('submit','Update User','class="button green"');?>
	<?= form_fieldset_close();?>
<?= form_close();?>