<?php

	class User extends MY_Controller
	{

		function __construct()
		{
			parent::__construct();
			if(! $this->session->userdata('userid') ) return redirect('login');
			
			$this->load->model('usermodel');
			$this->load->model('ordermodel');

		}

		public function index()
		{
			$modules = $this->usermodel->get_user_modules();

			$this->load->view(	'main_page', 
								[
									'modules' => $modules
								]
							);
			
		}

		public function get_all()
		{
			$users = $this->usermodel->get_all_users();
			$this->load->view(	'manage_users', 
								[
									'users' => $users
								]
							);
		}

		public function delete($id)
		{
			$users = $this->usermodel->delete($id);
			return redirect('user/get_all');
		}

		public function add()
		{
			$role = $this->usermodel->get_all_role();
			$this->load->view(	'add_user', ['role'=>$role]);
		}

		public function edit($id)
		{
			$role = $this->usermodel->get_user_role($id);
			$modules = $this->usermodel->role_wise_module($role);
			$user_wise_modules = $this->usermodel->get_user_wise_modules($id);

			foreach ($modules as $key => $value) {
				if( isset($user_wise_modules[ $value['id'] ]) && $user_wise_modules[ $value['id'] ] == 1)
					$modules[$key]['value'] = 1;
			}



			$this->load->view(	'edit_user', ['modules'=>$modules ,'id'=>$id]);
		}

		public function add_user()
		{
			if($this->form_validation->run('add_user')){
				$post_data = $this->input->post();
				unset($post_data['submit']);
				$this->usermodel->add_user($post_data);
			}
			else{
				$role = $this->usermodel->get_all_role();
				$this->load->view(	'add_user', ['role'=>$role]);
			}

			
			return redirect('user/get_all');
		}

		public function edit_user($id)
		{
			$role = $this->usermodel->get_user_role($id);
			$modules = $this->usermodel->role_wise_module($role);
			$user_wise_modules = array();

			$post_data = $this->input->post();


			foreach ($modules as $key => $value) {
				if( isset($post_data['module_'.$value['id']]) )
					$user_wise_modules[$value['id']] = 1;
				else
					 $user_wise_modules[$value['id']] = 0;

			}

			$this->usermodel->update_rights($user_wise_modules, $id);

			return redirect('user/get_all');
		}
	
	}

?>