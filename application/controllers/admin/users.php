<?php if(!defined('BASEPATH')) exit('No Direct Script Acccess');

class Users extends CI_Controller{

	function Users()
	{ 
		 parent::__construct();
		 session_start();
		 if(!isset($_SESSION['admin_user']))
		 {
		 	redirect('admin/login','refresh');
		 }
		 
		 $this->load->model('admin_model');
		 
		 $this->form_validation->set_error_delimiters('<div class="error"><p>','</p></div>');
	}

	function index()
	{
		
		if($this->form_validation->run('add_admin_user')==FALSE)
		{
			$data['page_title'] = 'Administrative Users';
			$data['main'] = 'admin/users_view';
			$data['users'] = $this->admin_model->get_users();
			
			$this->load->vars($data);
			$this->load->view('admin/template');	
		}
		else 
			{
				// add a user
				if($request = $this->admin_model->add_user())
				{
					$this->session->set_flashdata('msg','New User Added Successfully');
					redirect('admin/users','refresh');
				}
				else 
					{
						$this->session->set_flashdata('msg','An error occurred. Please try again.');
						redirect('admin/users','refresh');
					}
			}
	}
	
	function add()
	{
		if($this->form_validation->run('add_admin_user') == FALSE) 
		{
			$data['page_title'] = 'Add Administrative User';
			$data['main'] = 'admin/users_add_view';
			
			$this->load->vars($data);
			$this->load->view('admin/template');
		}
		else 
			{
				// add user record
				if($result = $this->admin_model->add_user()) 
				{
					$this->session->set_flashdata('msg','New user successfully added');
					redirect('admin/users','refresh');
				}
				else {
					$this->session->set_flashdata('msg','An error occurred while adding the new user. Please try again.');
					redirect(current_url(),'refresh');
				}
				
			}
	}
	
	function update($id)
	{
		if($this->form_validation->run('update_admin_user')==FALSE) 
		{
			$data['page_title'] = 'Update User Record';
			$data['user'] = $this->admin_model->get_user($id);
			$data['main'] = ('admin/users_update_view');
			
			$this->load->vars($data);
			$this->load->view('admin/template');
		}
		else 
			{
				// update user record
				if($result = $this->admin_model->update_user($id))
				{
					$this->session->set_flashdata('msg','User Updated Successfully');
					redirect('admin/users','refresh');
				}
				else 
					{
						$this->session->set_flashdata('error','An error occurred while updating the record. Please try again.');
						redirect(current_url(),'refresh');
					}
			}
	}
	
	function delete($id)
	{
		if($this->input->post('ajax'))
		{
			$result = $this->admin_model->delete_user($id);
			if($result) 
			{
				$arr = array('status'=>'success','message'=>'The user has been removed from the system.');
				echo json_encode($arr);
			}
			else 
				{
					$arr = array('status'=>'failed','message'=>'An error occurred while deleting the user. Please Try Again.');
					echo json_encode($arr);
				}
		}
	}
	
	//------------ CALLBACK METHODS ------------//
	function check_username($str)
	{
		$this->db->where('user_name',$str);
		$this->db->limit(1);
		$query = $this->db->get('admin');
		if($query->num_rows()>0)
		{
			$this->form_validation->set_message('check_username','The %s already exists in the system. Please use a different user name.');
			return FALSE;
		}
		else 
			{
				return TRUE;
			}
	}

}

/* End of file users.php */
/* Location ./application/controllers/users.php */