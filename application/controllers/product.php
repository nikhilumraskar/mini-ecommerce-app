<?php

	class Product extends MY_Controller
	{
		function __construct()
		{
			parent::__construct();
			if(! $this->session->userdata('userid') ) return redirect('login');

			$this->load->model('productmodel');

		}

		public function get_all()
		{
			$products = $this->productmodel->get_all_products();

			$this->load->view(	'manage_products', 
								[
									'products'	=>	$products
								]
							);

		}

		public function add_product()
		{
			if($this->form_validation->run('add_product'))
			{

				$post_data = $this->input->post();

				unset($post_data['submit']);

				$this->productmodel->add_product($post_data);
				redirect('product/manage_products');
			}
			else
				$this->load->view('add_product' );
		}

		public function edit_product()
		{
			$post_data = $this->input->post();

			if($this->form_validation->run('add_product'))
			{

				unset($post_data['submit']);

				$this->productmodel->edit_product($post_data);
				redirect('product/manage_products');
			}
			else{
				$product = $this->productmodel->get_product($post_data['id']);
				$this->load->view('edit_product',
								[
									'product'	=>	$product
								]
							);
			}
		}

		public function add()
		{
			$this->load->view('add_product' );
		}

		public function edit($id)
		{
			$product = $this->productmodel->get_product($id);
			
			$this->load->view('edit_product',
								[
									'product'	=>	$product
								]
							);
		}

		public function delete($id)
		{

			$this->productmodel->delete_product($id);
			
			redirect('product/manage_products');
		}
	}

?>