<?php echo $error; ?>
<?php echo form_open_multipart('upload/do_upload'); ?>
<?php
	$data_form = array(
			'name'=>'userfile'
		);
	echo form_upload($data_form);
?><br>
<label for="height">Height</label>&nbsp;<input type="text" name="height"><br>
<label for="width">Width</label>&nbsp;<input type="text" name="width"><br>
<?php echo form_submit('','Upload'); ?>
<?php echo form_close(); ?>

