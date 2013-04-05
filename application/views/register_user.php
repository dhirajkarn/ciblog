<script type="text/javascript" src="<?php echo base_url() ?>scripts/core.js"></script>
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
    $attribute = array('id'=>'registration_form', 'class'=>'form');
    echo form_open(base_url().'users/register', $attribute); 
 ?>
<p><?php echo form_label('Username', 'username'); ?> 
<?php 
    $data_form = array(
        'name'=>'username',
        'size'=>30,
        'class'=>'blackborder',
        'id'=>'username'
    );
    echo form_input($data_form);
?>
</p>
<p><?php echo form_label('Email', 'email'); ?> 
<?php
    $data_form = array(
        'name'=>'email',
        'size'=>30,
        'class'=>'blackborder',
        'id'=>'email'
    );
    echo form_input($data_form);
?>
</p>
<p><?php echo form_label('Password', 'password'); ?> 
<?php
    $data_form = array(
        'name'=>'password',
        'size'=>30,
        'class'=>'blackborder',
        'id'=>'password'
    );
    echo form_password($data_form);
?>
</p>
<p><?php echo form_label('Confirm Password', 'password2'); ?> 
<?php
    $data_form = array(
        'name'=>'password2',
        'size'=>30,
        'class'=>'blackborder',
        'id'=>'password2'
    );
    echo form_password($data_form);
?>
</p>
<p style="text-align:center;"><input type="submit" value="Register" class="button"></p>
<?php echo form_close(); ?>
