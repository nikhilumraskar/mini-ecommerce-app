<?php  include ('header.php'); ?>
<?php include ('user_bar.php'); ?>
<div class="container">

	<h2>Shop</h2>
	
	<?php if($error =  $this->session->flashdata('cart_msg')): ?>
		    <div class="alert alert-dismissible alert-<?=$error['class'];?>">
			  	<p><?php echo $error['msg']; ?></p>
			</div>
	<?php endif; ?>
	<?php foreach ($products as $key => $value):  ?>

	<div class="form-group col-md-3">
		<div class="panel panel-primary">
		  
		  <div class="panel-body">
		  	<?php echo img(array('asserts/img/product_img.png','width' =>'100%')); ?>
		  </div>
		  <div class="panel-heading">
		    <h3 class="panel-title"><?php echo $value['product_name'] ?></h3>
		    <?php 
		    		$anchor_arr = array('class'=>'btn btn-success pull-right');
		    		$anchor_link = 'cart/add_to_cart/'.$value['id'];
		    		if($value['qty'] == 0 ) {
		    			$anchor_arr['disabled'] = 'disabled';
		    			$anchor_link = '#';
		    		}
	    			echo anchor($anchor_link, 'Add To Cart' , $anchor_arr);
	    	?>
		  </div>
		</div>
	</div>
	<?php endforeach; ?>

</div>


<?php include ('footer.php'); ?>