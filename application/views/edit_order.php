<?php include ('header.php'); ?>
<?php include ('user_bar.php'); ?>

<div class="container">


<h4>Add New Product</h4>

<table class="table">
  <thead>
    <tr>
      <th>Sr. No</th>
      <th>Product Name</th>
      <th>Quantity</th>
    </tr>
  </thead>
  <tbody>

  <?php

    
    foreach ($order as $key => $value): 

  ?>
      <tr>
        <td><?=$key+1; ?></td>
        <td><?=$value['product_name']; ?></td>
        <td><?=$value['qty']; ?></td>
      </tr>

  <?php 

    endforeach;

  ?>
  
  </tbody>
</table>

<?php 


if(in_array($this->session->userdata('user_role'), array(2,3))):

  echo form_open( 'order/edit_order/'.$id,  
          [
            'class'=>''
          ]
        ); 

?>


Assign Delievery Service : <?php echo form_dropdown('service', $service_options, array('class'=>'form-control')); ?>

<br>
<br>
<br>

Change Status : <?php echo form_dropdown('status', $status_options, array('class'=>'form-control')); ?> 
<br>
<br>
<br>

<?php echo form_submit(['name'=>'submit','class'=>'btn btn-success','value'=>'Update']) ?>

<?php 

	echo form_close(); 

endif;

?>

</div>


<?php include ('footer.php'); ?>