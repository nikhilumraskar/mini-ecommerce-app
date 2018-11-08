<?php

class Order extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		if(! $this->session->userdata('userid') ) return redirect('login');

		$this->load->model('ordermodel');

	}
	
	public function get_all()
	{
		$orders = $this->ordermodel->get_all_orders();

		$this->load->view('order_view', ['orders'=>$orders]);

	}

	public function edit($id)
	{
		$service_options = $this->ordermodel->get_service_options();
		$status_options = $this->ordermodel->get_status_options();
		$order = $this->ordermodel->get_order($id);
		
		$this->load->view('edit_order', ['id'=>$id, 'order'=>$order, 'service_options'=>$service_options, 'status_options'=>$status_options]);
	}

	public function edit_order($order_id)
	{
		$post_data = $this->input->post();

		$this->ordermodel->update_order_status($order_id, $post_data['status'], $post_data['service']);
		return redirect('order/get_all');
	}

}

?>