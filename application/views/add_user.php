<?php include ('header.php'); ?>
<?php include ('user_bar.php'); ?>

<div class="container">


<h4>Add New User</h4>
<?php 

	echo form_open(	'user/add_user', 	
					[
						'class'=>''
					]
				); 

?>
<div class="form-group">
<div class="row">
  <div class="col-md-2">
    <?php 
      echo form_input(
                [
                  'class'=>'form-control',
                  'name'=>'user_name',
                  'value'=>set_value('user_name'),
                  'placeholder'=>"User name"
                ]
              );
      echo form_error('user_name', '<p class="text-danger">', '</p>'); 
    ?>
  </div>
  <div class="col-md-2">
    <?php 
      echo form_input(
                [
                  'class'=>'form-control',
                  'name'=>'password',
                  'value'=>'',
                  'placeholder'=>"Password"
                ]
              );
      echo form_error('password', '<p class="text-danger">', '</p>'); 
    ?>
  </div>
  <div class="col-md-2">
    <?php echo form_dropdown('role', $role, array('class'=>'form-control')); 

      echo form_error('role', '<p class="text-danger">', '</p>'); 
    ?>
  </div>
  <div class="col-md-1">
    <?php echo form_submit(['name'=>'submit','class'=>'btn btn-success','value'=>'Add User']) ?>
  </div>
</div>
</div>
<?php 

	echo form_close(); 

?>

</div>


<?php include ('footer.php'); ?>