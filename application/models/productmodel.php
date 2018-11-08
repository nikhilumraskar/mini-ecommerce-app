<?php

	class Productmodel extends CI_model
	{
		public function get_all_products()
		{
			$result_arr = array();

			$r = $this->db->query('select * from products where deleted = 0  ');

			foreach ($r->result_array() as $row)
			{

		        $result_arr[] = $row;
			}

			return $result_arr;
		}

		public function add_product($data)
		{

			$str = $this->db->insert_string('products', $data);

			$this->db->query($str);

		}

		public function edit_product($data)
		{

			$where = "id = '".$data['id']."'";

			unset($data['id']);

			$str = $this->db->update_string('products', $data, $where);

			$this->db->query($str);

		}

		public function get_product($id)
		{
			$r = $this->db->query('select * from products where id = "'.$id.'"');

			return $r->row();
		}

		public function delete_product($id)
		{
			$where = "id = '".$id."'";
			$str = $this->db->update_string('products', array('deleted'=> 1 ), $where);
			$this->db->query($str);
		}

		public function product_qty($product_id)
		{
			$q = "select qty from products where id = '".$product_id."'";
			$r = $this->db->query($q);

			$row = $r->row();

			if(isset($row->qty)) return $row->qty;
			else 0;


		}
	}

?>