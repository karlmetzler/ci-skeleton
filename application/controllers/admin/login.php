<?php if(!defined('BASEPATH')) exit('No Direct Script Acccess');

class Login extends CI_Controller{

	function Login()
	{ 
		 parent::__construct();
		 $this->load->model('admin_model');
		 session_start();
	}

	function index()
	{
		$this->form_validation->set_error_delimiters('<div class="error"><p>','</p></div>');
		if($this->form_validation->run('admin_login') == FALSE)
		{
			$data['page_title'] = $this->config->item('site_name').' Site Administration';
			
			$this->load->vars($data);
			$this->load->view('admin/login_view');
		}
		else 
			{
				// verify user
				if($user = $this->admin_model->verify_user($this->input->post('user_name'),$this->input->post('pass')))
				{
					redirect('admin/dashboard','refresh');
				}
				else 
					{
						$this->session->set_flashdata('msg','Incorrect User Name or Password');
						redirect(current_url(),'refresh');
					}
				
			}
	}
	
	function reset_password()
	{
		$this->form_validation->set_error_delimiters('<div class="error"><p>','</p></div>');
		if($this->form_validation->run('reset_admin_password')==FALSE)
		{
			$result=array('status'=>'validation_failed','message'=>validation_errors());
			echo json_encode($result);
		}
		else 
			{
				if($request=$this->admin_model->reset_password($this->input->post('reset_email')))
				{
					$data['email'] = $this->input->post('reset_email');
					$result = array('status'=>'success','message'=>$this->load->view('admin/password_reset_success_view',$data,TRUE));
					echo json_encode($result);
				}
				else 
					{
						$result = array('status'=>'failed','message'=> 'An error has occurred. Please try again later.');
						echo json_encode($result);
					}
			}
	}
	
	
	//------------ CALLBACK METHODS ------------//
	function reset_email_check($str)
	{
		$this->db->where('email',$str);
		$this->db->limit(1);
		$query = $this->db->get('admin');
		if($query->num_rows()>0)
		{
			return TRUE;
		}
		else 
			{
				$this->form_validation->set_message('reset_email_check','The %s does not exist in the system.');
				return FALSE;
			}
	}

}

/* End of file login.php */
/* Location ./application/controllers/login.php */