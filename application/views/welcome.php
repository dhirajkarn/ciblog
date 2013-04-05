<script type="text/javascript" src="<?php echo base_url() ?>scripts/core.js"></script>
<div class="sidebar_home">
    <div class="signup">
    	<h2 class="nice">Login</h2>
    		<div id="bad_username"></div>
    	<form  id="login_form">
		    <p> <input type="text" name="username" id="username" placeholder="Email"></p>
		    <p> <input type="password" name="password" id="password" placeholder="Password"></p>
		    <p style="text-align:center;"><input type="button" id="login" value="Login" class="btn btn-success"></p>
		</form>
		<button class="btn btn-warning btn-block">Or</button>
    	<?php
		    if($errors) {
		?>
		<div style="background-color:red; color:white;">
			<?php echo $errors; ?>
		</div>
		<?php } ?>
		<?php 
		    echo $this->session->flashdata('message');
		?>

		<?php
		    $attribute = array('id'=>'registration_form', 'class'=>'for');
		    echo form_open(base_url().'users/register', $attribute); 
		?>
		<h2 class="nice">Sign Up</h2>
		<p> 
		<?php 
		    $data_form = array(
		        'name'=>'username',
		        'size'=>30,
		        'id'=>'username',
		        'placeholder'=>'Username'
		    );
		    echo form_input($data_form);
		?>
		</p>
		<p> 
		<?php
		    $data_form = array(
		        'name'=>'email',
		        'size'=>30,
		        'id'=>'email',
		        'placeholder'=>'Email'
		    );
		    echo form_input($data_form);
		?>
		</p>
		<p> 
		<?php
		    $data_form = array(
		        'name'=>'password',
		        'size'=>30,
		        'id'=>'password',
		        'placeholder'=>'Password'
		    );
		    echo form_password($data_form);
		?>
		</p>
		<p> 
		<?php
		    $data_form = array(
		        'name'=>'password2',
		        'size'=>30,
		        'id'=>'password2',
		        'placeholder'=>'Confirm Password'
		    );
		    echo form_password($data_form);
		?>
		</p>
		<p style="text-align:center;"><input type="submit" value="Register" class="btn btn-success"></p>
		<?php echo form_close(); ?>
    </div>
</div>
<div class="span8">
	
</div>