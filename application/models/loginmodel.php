<?php

class Loginmodel extends CI_model
{
	public function authenticate($data)
	{
		$password_hash = crypt($data['password'], $data['user_name']);

		$get_user_data_q = "select id,role from users where user_name = '".$data['user_name']."' and password = '".$password_hash."' limit 1";
		$query = $this->db->query($get_user_data_q);

		if($query->num_rows() > 0)
			return $query->row();
		else
			return false;
	}
}

?>