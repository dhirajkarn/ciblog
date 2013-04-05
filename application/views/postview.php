        <?php $keyword = ""; ?>
        <div class="sidebar">
            
            <div class="search">
                <script>
  (function() {
    var cx = '002443069980448651367:2tbcgmrwuig';
    var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
            </div>
            <div class="ad"></form></div>
        </div>
        <div class="post_container">
                <h2><?php echo $blog_details['blog_title']; ?></h2>
                <div class="post"><?php
                    echo $blog_details['blog_post'];
                ?></div>
        </div>
        <div class="comment">
            <h2>Comments</h2>
            <div id="responses">
            <?php
            	if(count($comments) > 0) {
            ?> 
            <?php foreach($comments as $row) { ?>
            <div class="comment_text">
                <span><b><?php echo $row['commenter_name'] ?></b> said at <?php echo $row['fmt_comment_create_time'] ?></span><br>
                	<div class="cment"><?php echo $row['comment'] ?></div>
            </div>
                	<?php } ?>

                <?php } else {  ?>
                <p>There are currently no comments!</p>
                <?php } ?>
            </div>
            <form id="comment_form">
            <input type="hidden" name="blog_id" value="<?php echo $blog_details['blog_id'] ?>">
            <p class="input"><label>NAME</label> 
            <?php
            	$data_form = array(
            			'name'=>'commenter_name',
                        'class'=>'blackborder'
            		);
            	echo form_input($data_form);
            ?></p>
            <p><label>COMMENT</label>
            <?php
            	$data_form = array(
            			'name'=>'comment',
                        'rows'=>5,
                        'cols'=>50,
                        'class'=>'textarea'
            		);
            	echo form_textarea($data_form);
            ?></p>
            <p><label>CAPTCHA</label>
            <?php echo $captcha; ?>
            <?php 
                //echo $this->session->flashdata('message');
            ?></p>
            <p><input type="text" name="captcha" style="margin-left:135px; width:145px; height:30px; border:1px solid black;"></p>
            <p style="text-align:center;"><input type="button" id="submit" value="Post Comment" class="button"></p>
            <?php echo form_close(); ?>
        </div>

        


