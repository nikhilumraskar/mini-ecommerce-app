<?php include ('header.php'); ?>
<?php include ('user_bar.php'); ?>

<div class="container">

	

<?php	if(count($cart) == 0): ?>

	<h2>Nothing in Cart</h2>

	<?php 
	else:
	?>

	<h2>Cart</h2>

	<table class="table">
		<thead>
			<tr>
				<th>Sr. No</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Sub Total</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>

		<?php

			
			foreach ($cart as $key => $value): 

		?>
				<tr>
					<td><?=$key+1; ?></td>
					<td><?=$value['product_name']; ?></td>
					<td><?=$value['price']; ?></td>
					<td><?=$value['qty']; ?></td>
					<td><?=$value['sub_total']; ?></td>
					<td>
						<?= anchor("cart/edit/".$value['id'], 'Edit', ['class'=>'btn btn-primary']) ?>
						<?= anchor("cart/delete/".$value['id'], 'Delete', ['class'=>'btn btn-danger']) ?>
					</td>
				</tr>

		<?php 

			endforeach;

		?>
		
		</tbody>
	</table>

	<div class="jumbotron">
	  <h1 class="display-3">Total Rs. <?php echo $cart_total; ?></h1>
	  
	  <hr class="my-4">
	  <p class="lead">
	    <?= anchor("cart/place_order/", 'Place Order', ['class'=>'btn btn-primary btn-lg']) ?>
	  </p>
	</div>

	<?php 
	endif; ?>

</div>

<?php include ('footer.php'); ?>