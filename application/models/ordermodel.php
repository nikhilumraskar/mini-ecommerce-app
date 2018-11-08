<?php

	class Ordermodel extends CI_model
	{
		public function get_all_orders()
		{

			$result_arr = array();

			$userid = $this->session->userdata('userid');

			$where_cond = "";

			if($this->session->userdata('user_role') == 4){
				$where_cond = 'where orders.user_id = "'.$userid.'"';
			}
			else if($this->session->userdata('user_role') == 3){
				$where_cond ='where orders.delivery_guy = "'.$userid.'" or orders.delivery_guy = 0';
			}
			else{
				$where_cond;
			}
			
			$r = $this->db->query('SELECT
									orders.id,
										status.`status`,
										a.user_name as updated_by,
									b.user_name as delivery_guy,
									c.user_name as requestor
									FROM
										orders
									INNER JOIN `status` ON orders.`status` = STATUS .id
									INNER JOIN users a on a.id = orders.updated_by
									INNER JOIN users c on c.id = orders.user_id
									LEFT JOIN users b on b.id = orders.delivery_guy
									    '.$where_cond);

			foreach ($r->result_array() as $row)
			{

		        $result_arr[] = $row;
			}

			return $result_arr;
		}

		public function get_order($order_id)
		{
			$result_arr = array();

			$r = $this->db->query('SELECT orders_details.qty, products.product_name FROM orders_details INNER JOIN products on orders_details.product_id = products.id  where orders_details.order_id = "'.$order_id.'"');

			foreach ($r->result_array() as $row)
			{

		        $result_arr[] = $row;
			}

			return $result_arr;
		}

		public function update_order_status($order_id, $status, $servise)
		{
			$userid = $this->session->userdata('userid');

			$this->db->query('update orders set status = "'.$status.'", updated_by = "'.$userid.'", delivery_guy = "'.$servise.'" where id = "'.$order_id.'"');
		}

		public function get_service_options()
		{
			$result_arr = array();

			$where_cond = "";

			$userid = $this->session->userdata('userid');

			if($this->session->userdata('user_role') == 2){
				$where_cond = 'where users.role = "3"';
			}
			else if($this->session->userdata('user_role') == 3){
				$where_cond = 'where users.id = "'.$userid.'"';
			}
			

			$r = $this->db->query('SELECT
									id, user_name
									FROM
										users  '.$where_cond);

			foreach ($r->result_array() as $row)
			{

		        $result_arr[$row['id']] = $row['user_name'];
			}

			return $result_arr;
		}

		public function get_status_options()
		{
			$result_arr = array();

			$r = $this->db->query('SELECT
									* 
									FROM
										status  ');

			foreach ($r->result_array() as $row)
			{

		        $result_arr[$row['id']] = $row['status'];
			}

			return $result_arr;
		}
	}

?>