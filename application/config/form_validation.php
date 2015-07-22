<?php if(!defined('BASEPATH')) exit('No direct script access');

$config = array(
	'admin_login' => array(
		array('field'=>'user_name','label'=>'User Name','rules'=>'required'),
		array('field'=>'pass','label'=>'Password','rules'=>'required')
	),
	'reset_admin_password' => array(
		array('field'=>'reset_email','label'=>'Email Address','rules'=>'required|valid_email|callback_reset_email_check')
	),
	'add_admin_user' =>array(
		array('field'=>'first_name','label'=>'First Name','rules'=>'required'),
		array('field'=>'last_name','label'=>'Last Name','rules'=>'required'),
		array('field'=>'email','label'=>'Email Address','rules'=>'required|valid_email'),
		array('field'=>'user_name','label'=>'User Name','rules'=>'required|alpha_dash|callback_check_username'),
		array('field'=>'password','label'=>'Password','rules'=>'required'),
		array('field'=>'password2','label'=>'Confirm Password','rules'=>'required|matches[password]')
	),
	'update_admin_user' => array(
		array('field'=>'first_name','label'=>'First Name','rules'=>'required'),
		array('field'=>'last_name','label'=>'Last Name','rules'=>'required'),
		array('field'=>'email','label'=>'Email Address','rules'=>'required|valid_email'),
		array('field'=>'password','label'=>'Password','rules'=>'trim'),
		array('field'=>'password2','label'=>'Confirm Password','rules'=>'trim|matches[password]')
	),
	
);

/* end of file form_validation.php*/
/* location ./application/config/form_validation.php */
