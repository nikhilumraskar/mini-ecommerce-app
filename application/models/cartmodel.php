<?php

class Cartmodel extends CI_model
{
	public function add_to_cart($product_id)
	{
		$userid = $this->session->userdata('userid');

		$check_product_q = "select id from cart where product_id = '".$product_id."' and user_id = '".$userid."' and deleted = 0";
		$check_product_r = $this->db->query($check_product_q);

		$row = $check_product_r->row();

		$add_to_cart_q = '';

		if (isset($row->id)){

			$add_to_cart_q = "update cart set qty = qty + 1 where id = '".$row->id."'";
		}
		else{
			$data = array('product_id' => $product_id, 'user_id' => $userid, 'qty'=>1);

			$add_to_cart_q = $this->db->insert_string('cart', $data);
		}
		$this->db->query($add_to_cart_q);


	}

	public function get_cart()
	{
		$userid = $this->session->userdata('userid');

		$result_arr = array();

		$cart_q = "SELECT cart.id, cart.qty , products.price,cart.qty*products.price as sub_total, products.product_name  FROM cart INNER JOIN products on cart.product_id = products.id where cart.deleted = 0 and user_id = '".$userid."'";
		$cart_r = $this->db->query($cart_q);

		foreach ($cart_r->result_array() as $row)
		{

	        $result_arr[] = $row;
		}

		return $result_arr;
	}

	public function cart_total()
	{
		$userid = $this->session->userdata('userid');

		$q = "SELECT sum(cart.qty*products.price) as sub_total  FROM cart INNER JOIN products on cart.product_id = products.id where cart.deleted = 0 and user_id = '".$userid."'";

		$r = $this->db->query($q);

		$row = $r->row();

		if(isset($row->sub_total)) return $row->sub_total;
			else 0;
	}

	public function delete($id)
	{
		$this->db->query('update cart set deleted = 1 where id = "'.$id.'"');
	}

	public function place_order()
	{
		$userid = $this->session->userdata('userid');
		$this->db->query('insert into orders (user_id,status,updated_by) values("'.$userid.'", "1", "'.$userid.'")');

		$this->db->query('insert into orders_details (order_id,product_id,qty) select '.$this->db->insert_id().' as order_id,  product_id , qty from cart where deleted = 0 and user_id = "'.$userid.'"');

		$this->db->query('update cart set deleted = 1 where user_id = "'.$userid.'"');
	}
}

?>