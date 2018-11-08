<?php

class Login extends MY_Controller
{
	
	/*function __construct(){
		parent::__construct();
		if($this->session->userdata('userid')) return redirect('user');
	}*/

	public function index()
	{
		$this->load->view('login');
	}

	public function authenticate()
	{
		if($this->form_validation->run('login'))
		{
			$post_data = $this->input->post();

			$this->load->model('loginmodel');
	
			if($this->loginmodel->authenticate($post_data) != false)
			{
				$user_data = $this->loginmodel->authenticate($post_data);
			 	$this->session->set_userdata('userid', $user_data->id);
			 	$this->session->set_userdata('user_role', $user_data->role);
			 	return redirect('user');
			}
			else
			{ 
				$this->session->set_flashdata('login_failed', 'Invalid Username/Password');
				return redirect('login');
			}
		}
		else $this->load->view('login');
	}

	public function logout()
	{
		$this->session->unset_userdata('userid');
		$this->load->view('login');
	}
}

?>