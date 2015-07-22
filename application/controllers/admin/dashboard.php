<?php if(!defined('BASEPATH')) exit('No Direct Script Acccess');

class Dashboard extends CI_Controller{

	function Dashboard()
	{ 
		 parent::__construct();
		 session_start();
		 if(!isset($_SESSION['admin_user']))
		 {
		 	redirect('admin/login','refresh');
		 }
		 
	}

	function index()
	{
		$data['page_title'] = 'Dashboard';
		$data['main'] = 'admin/home';
		
		$this->load->vars($data);
		$this->load->view('admin/template');
	}
	
	function logout()
	{
		unset($_SESSION['admin_user']);
		unset($_SESSION['fname']);
		unset($_SESSION['lname']);
		unset($_SESSION['type']);
		$this->session->set_flashdata('msg','Please Log Back In to Continue.');
		redirect('admin/login','refresh');
	}
	

}

/* End of file dashboard.php */
/* Location ./application/controllers/dashboard.php */