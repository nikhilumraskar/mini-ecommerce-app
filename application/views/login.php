<?php

	include ('header.php');
	//echo crypt(123123, 'raju'); 

?>

<div class="container">
	<?php 

		echo form_open(	'login/authenticate', 	
						[
							'class'=>'form-horizontal col-lg-offset-3 col-lg-6',
							'style'=>'margin-top: 10%;'
						]
					); 

	?>
		<fieldset>
		    <legend>Login</legend>
		    <?php if($error =  $this->session->flashdata('login_failed')): ?>
		    <div class="alert alert-dismissible alert-danger">
			  	<p><?php echo $error; ?></p>
			</div>
			<?php endif; ?>
		    <div class="form-group">
		      	<label class="col-lg-2 control-label">User name</label>
		      	<div class="col-lg-10">
		        	<?php 
		        		echo form_input(
			        						[
			        							'class'=>'form-control',
			        							'name'=>'user_name',
			        							'value'=>set_value('user_name')
			        						]
			        					);
		        		echo form_error('user_name', '<p class="text-danger">', '</p>'); 
		        	?>
		      	</div>
		    </div>
		    <div class="form-group">
		      	<label class="col-lg-2 control-label">Password</label>
		      		<div class="col-lg-10">
		        		<!--input type="password" class="form-control" name="password"-->
		        		<?php 
		        			echo form_password(
			        						[
			        							'class'=>'form-control',
			        							'name'=>'password'
			        						]
			        					);
		        			echo form_error('password', '<p class="text-danger">', '</p>'); 
		        		?>
			      	</div>
		    </div>
		    <div class="form-group">
		     	<div class="col-lg-10 col-lg-offset-2">
		        	<?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Login']) ?>
		      	</div>
		    </div>
		</fieldset>
	<?php 

		echo form_close(); 

	?>
</div>

<?php

	include ('footer.php');

?>