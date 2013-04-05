<p>Page rendered in {elapsed_time} and total memory consumed {memory_usage}</p>
<?php 
    if($this->session->userdata('user_id')) {
?>
<?php
    } else {
?>
<h2><a href="<?php echo base_url()?>users/login">Login</a></h2>
<?php    } ?>

       <div class="row"> 
        <ul class="thumbnails">

      <?php
        foreach($blogs as $blog) {        
        ?>
            <li class="span4">
                <div class="thumbnail">
                    <a href="#" class="thumbnail">
                    <?php if($blog['img']) {
                        $org = $blog['img'];
                        // $extension = substr($org, -4); // .jpg
                        // $image = substr_replace($org,"",-4); // remove extension
                        // $thumb = $image."_thumb".$extension;

                     ?>

                    <img src="<?php echo base_url()?>uploads/<?php echo $org; ?>" alt="sometext">  
                    <?php } else { ?>
                    <img src="<?php echo base_url() ?>uploads/images12.jpg" alt="Image">
                    <?php } ?>
                    </a>
                    <div class="caption">
                    <h3><?php echo substr($blog['blog_title'], 0, 20).".."; ?></h3>
                    <p><?php echo substr($blog['blog_post'], 0, 200).".."; ?></p>
                    <a href="<?php echo base_url()?>blog/blogtext/<?php echo $blog['blog_id'] ?>" class="btn btn-primary">Read More >></a>
                    </div>
                </div>
            </li>
        <?php
        }
        ?>
    </ul>
</div>
        <div class="anchor"><?php echo $pages; ?></div>
