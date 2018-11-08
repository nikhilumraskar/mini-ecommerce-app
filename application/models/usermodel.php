<?php

	class Usermodel extends CI_Model
	{
		
		public function get_user_info()
		{
			$userid = $this->session->userdata('userid');

			$r = $this->db->query('select user_name from users where id="'.$userid.'" limit 1');

			return $r->row();
		}

		public function get_user_role($user_id)
		{

			$r = $this->db->query('SELECT users.role FROM users where users.id ="'.$user_id.'" limit 1');

			$row = $r->row();

			return $row->role;
		}

		public function get_user_wise_modules($userid)
		{

			$result_arr = array();

			$r = $this->db->query('SELECT modules.* FROM user2module INNER JOIN modules on user2module.module_id = modules.id where user_id = "'.$userid.'" and user2module.deleted = 0');

			foreach ($r->result_array() as $row)
			{

		        $result_arr[$row['id']] = 1;
			}

			return $result_arr;
		}

		public function get_user_modules()
		{
			$userid = $this->session->userdata('userid');

			$result_arr = array();

			$r = $this->db->query('SELECT modules.* FROM user2module INNER JOIN modules on user2module.module_id = modules.id where user_id = "'.$userid.'" and user2module.deleted = 0');

			foreach ($r->result_array() as $row)
			{

		        $result_arr[$row['id']] = $row;
			}

			return $result_arr;

		}

		public function get_all_users()
		{
			$role = $this->session->userdata('user_role');

			$result_arr = array();

			$r = $this->db->query('SELECT users.id, user_name,role.role from users INNER JOIN role on users.role = role.id where users.role!="'.$role.'" and users.deleted = 0');

			foreach ($r->result_array() as $row)
			{

		        $result_arr[] = $row;
			}

			return $result_arr;
		}

		public function delete($id)
		{
			$r = $this->db->query('update users set deleted = 1 where id = "'.$id.'"');

			$r = $this->db->query('update user2module set deleted = 1 where user_id = "'.$id.'"');
		}

		public function get_all_role(){

			$result_arr = array();

			$r = $this->db->query('select * from role');

			foreach ($r->result_array() as $row)
			{

		        $result_arr[$row['id']] = $row['role'];
			}

			return $result_arr;
		}

		public function add_user($data)
		{
			$data['password'] = crypt($data['password'], $data['user_name']);
			$str = $this->db->insert_string('users', $data);

			$this->db->query($str);

			$this->db->query('INSERT INTO user2module
						SELECT
							"'.$this->db->insert_id().'" as user_id , module_id
						FROM
							role2module
						WHERE
							role_id = "'.$data['role'].'"
						AND `default` = 1');
		}

		public function role_wise_module($role)
		{
			$q = "
					SELECT
					modules.*
					FROM
						modules
					INNER JOIN  role2module on role2module.module_id = modules.id
					where role2module.role_id ='".$role."'";

			$r = $this->db->query($q);

			foreach ($r->result_array() as $row)
			{

		        $result_arr[] = $row;
			}

			return $result_arr;

		}

		public function update_rights($rights, $user)
		{
			foreach ($rights as $key => $value) {
				$deleted = ($value == 1)? 0 : 1;
				$this->db->query('update user2module set deleted = "'.$deleted.'" where module_id = "'.$key.'" and user_id = "'.$user.'"');
			}
		}
	

	}

?>