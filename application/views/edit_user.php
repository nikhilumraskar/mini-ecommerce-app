<?php include ('header.php'); ?>
<?php include ('user_bar.php'); ?>

<div class="container">

<?php 

	echo form_open(	'user/edit_user/'.$id, 	
					[
						'class'=>''
					]
				); 

?>

<h4>User has acces to below modules</h4>

  <?php

    
    foreach ($modules as $key => $value): 

  ?>
      <p><?php echo form_checkbox('module_'.$value['id'],1,isset($value['value'])); echo $value['module']; ?></p>

  <?php 

    endforeach;

  ?>

  <?php echo form_submit(['name'=>'submit','class'=>'btn btn-success','value'=>'Update']) ?>

<?php 

	echo form_close(); 

?>

</div>


<?php include ('footer.php'); ?>