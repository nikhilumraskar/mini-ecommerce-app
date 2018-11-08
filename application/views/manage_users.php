<?php include ('header.php'); ?>
<?php include ('user_bar.php'); ?>

<div class="container">
<?php echo anchor('user/add','Add New User') ?>
<br><br>
<?php 

if(count($users) == 0): ?>

<h2>No Users Available</h2>

<?php 
else:
?>

<table class="table">
	<thead>
		<tr>
			<th>Sr. No</th>
			<th>Username</th>
			<th>Role</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>

	<?php

		
		foreach ($users as $key => $value): 

	?>
			<tr>
				<td><?=$key+1; ?></td>
				<td><?=$value['user_name']; ?></td>
				<td><?=$value['role']; ?></td>
				<td>
					<?= anchor("user/edit/".$value['id'], 'Edit Rights', ['class'=>'btn btn-primary']) ?>
					<?= anchor("user/delete/".$value['id'], 'Delete', ['class'=>'btn btn-danger']) ?>
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