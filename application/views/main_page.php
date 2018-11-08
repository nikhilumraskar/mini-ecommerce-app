<?php  include ('header.php'); ?>
<?php include ('user_bar.php'); ?>
<div class="container">

<?php if($error =  $this->session->flashdata('main_page')): ?>
	    <div class="alert alert-dismissible alert-<?=$error['class'];?>">
		  	<p><?php echo $error['msg']; ?></p>
		</div>
<?php endif; ?>	

<div class="list-group col-md-6">
	<?php foreach ($modules as $key => $value){
		echo anchor( $value['class'].'/get_all',$value['module'] , ['class'=>'list-group-item']); 
	} ?>
  <?php echo anchor('login/logout','Logout' , ['class'=>'list-group-item']) ?>
</div>

</div>


<?php include ('footer.php'); ?>