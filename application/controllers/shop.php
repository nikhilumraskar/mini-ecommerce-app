<?php

class Shop extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
	
		$this->load->model('productmodel');
	}

	public function get_all()
	{
		$products = $this->productmodel->get_all_products();

		$this->load->view(	'shop_products', 
					[
						'products'	=>	$products
					]
				);
	}
	

}

?>