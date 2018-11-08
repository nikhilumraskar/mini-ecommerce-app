<?php

	$config		=	[
							'login'		=>	[
												[
													'field'	=>	'user_name',
													'label'	=>	'Email',
													'rules'	=>	'required'
												],
												[
													'field'	=>	'password',
													'label'	=>	'Password',
													'rules'	=>	'required'
												]
											],

							'add_product'=>	[
												[
													'field'	=>	'product_name',
													'label'	=>	'Product Name',
													'rules'	=>	'required'
												],
												[
													'field'	=>	'price',
													'label'	=>	'Price',
													'rules'	=>	'required|numeric'
												],
												[
													'field'	=>	'qty',
													'label'	=>	'Quantity',
													'rules'	=>	'required|numeric'
												]
											],
							'add_user'	=>	[
												[
													'field'	=>	'user_name',
													'label'	=>	'Email',
													'rules'	=>	'required|alpha'
												],
												[
													'field'	=>	'password',
													'label'	=>	'Password',
													'rules'	=>	'required|alpha_numeric'
												],
												[
													'field'	=>	'role',
													'label'	=>	'Role',
													'rules'	=>	'required'
												]
											]
					]

?>