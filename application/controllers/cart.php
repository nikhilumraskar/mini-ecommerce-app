<?php

class Cart extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		if(! $this->session->userdata('userid') ) return redirect('login');
		$this->load->model('cartmodel');
		$this->load->model('productmodel');
	}

	public function get_all()
	{
		$cart = $this->cartmodel->get_cart();

		$cart_total = $this->cartmodel->cart_total();

		$this->load->view('cart_view',
							[
								'cart' => $cart,
								'cart_total' => $cart_total
							]
						);

	}

	public function edit($id)
	{
		# code...
	}

	public function edit_qty($id)
	{
		# code...
	}

	public function delete($id)
	{
		$this->cartmodel->delete($id);
		return redirect('cart/get_all');
	}

	public function place_order()
	{
		$this->cartmodel->place_order();

		$main_page = array();
		$main_page['msg'] = 'Order Places Successfully ';
		$main_page['class'] = 'success';
		$this->session->set_flashdata('main_page', $main_page);
		
		return redirect('user');
	}

	public function add_to_cart($id)
	{
		

		$cart_msg = array();

		if($this->productmodel->product_qty($id)){
			$cart_msg['msg'] = 'Product Added to '.anchor('cart/get_all','Cart' , ['class' =>'btn btn-default' ]);
			$cart_msg['class'] = 'success';
			$this->cartmodel->add_to_cart($id);
		}
		else{
			$cart_msg['msg'] = 'Product not in stock ';
			$cart_msg['class'] = 'danger';
		}

		
		//addto cart
		
		$this->session->set_flashdata('cart_msg', $cart_msg);

		return redirect('shop/get_all');
	}
}

?>