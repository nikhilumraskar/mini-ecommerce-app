<?php include ('header.php'); ?>
<?php include ('user_bar.php'); ?>

<div class="container">
<?php echo anchor('product/add','Add New Product') ?>
<br><br>
<?php 

if(count($products) == 0): ?>

<h2>No Product Available</h2>

<?php 
else:
?>

<table class="table">
	<thead>
		<tr>
			<th>Sr. No</th>
			<th>Product Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>

	<?php

		
		foreach ($products as $key => $value): 

	?>
			<tr>
				<td><?=$key+1; ?></td>
				<td><?=$value['product_name']; ?></td>
				<td><?=$value['price']; ?></td>
				<td><?=$value['qty']; ?></td>
				<td>
					<?= anchor("product/edit/".$value['id'], 'Edit', ['class'=>'btn btn-primary']) ?>
					<?= anchor("product/delete/".$value['id'], 'Delete', ['class'=>'btn btn-danger']) ?>
				</td>
			</tr>

	<?php 

		endforeach;

	?>
	
	</tbody>
</table>

<?php 
endif; ?>


</div>


<?php include ('footer.php'); ?>