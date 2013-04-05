<h3>Your file was successfully uploaded.</h3>
<ul>
<?php foreach($upload_data as $key=>$value) { ?>
<li><?php echo $key." : ".$value; ?></li>
<?php } ?>
</ul>
<p><a href="<?php echo base_url() ?>upload">Upload Another</a></p>