<?php include ('header.php'); ?>
<?php include ('user_bar.php'); ?>

<div class="container">


<h4>Add New Product</h4>
<?php 

	echo form_open(	'product/edit_product', 	
					[
						'class'=>''
					]
				); 

  echo form_input(
                [
                  'name'=>'id',
                  'value'=>set_value('id', $product->id),
                  'type'=>'hidden'
                ]
              );

?>
<div class="form-group">
<div class="row">
  <div class="col-md-3">
    <?php 
      echo form_input(
                [
                  'class'=>'form-control',
                  'name'=>'product_name',
                  'value'=>set_value('product_name', $product->product_name),
                  'placeholder'=>"Product Name"
                ]
              );
      echo form_error('product_name', '<p class="text-danger">', '</p>'); 
    ?>
  </div>
  <div class="col-md-2">
    <?php 
      echo form_input(
                [
                  'class'=>'form-control',
                  'name'=>'price',
                  'value'=>set_value('price',$product->price),
                  'placeholder'=>"Price"
                ]
              );
      echo form_error('price', '<p class="text-danger">', '</p>'); 
    ?>
  </div>
  <div class="col-md-2">
    <?php 
      echo form_input(
                [
                  'class'=>'form-control',
                  'name'=>'qty',
                  'value'=>set_value('qty',$product->qty),
                  'placeholder'=>"Quantity"
                ]
              );
      echo form_error('qty', '<p class="text-danger">', '</p>'); 
    ?>
  </div>
  <div class="col-md-1">
    <?php echo form_submit(['name'=>'submit','class'=>'btn btn-success','value'=>'Update']) ?>
  </div>
</div>
</div>
<?php 

	echo form_close(); 

?>

</div>


<?php include ('footer.php'); ?>