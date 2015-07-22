<?php if(!defined('BASEPATH')) exit('No Direct Script Acccess');

class Welcome extends CI_Controller{

	function Welcome()
	{ 
		 parent::__construct();
		 
		 
	}

	function index()
	{
		$this->load->view('boiler_plate');
	}
	
	

}

/* End of file welcome.php */
/* Location ./application/controllers/welcome.php */