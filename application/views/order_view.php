<?php include ('header.php'); ?>
<?php include ('user_bar.php'); ?>

<div class="container">

	

<?php	if(count($orders) == 0): ?>

	<h2>No Orders Places</h2>

	<?php 
	else:
	?>

	<h2>Orders</h2>

	<table class="table">
		<thead>
			<tr>
				<th>Order id</th>
				<th>Requstor</th>
				<th>Action</th>
				<th>Updated By</th>
				<th>Delievery Servise</th>
			</tr>
		</thead>
		<tbody>

		<?php

			
			foreach ($orders as $key => $value): 

		?>
				<tr>
					<td><?='#'.$value['id']; ?></td>
					<td><?php echo anchor('order/edit/'.$value['id'], $value['requestor']); ?></td>
					<td><?=$value['status']; ?></td>
					<td><?=$value['updated_by']; ?></td>
					<td><?=$value['delivery_guy']; ?></td>
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