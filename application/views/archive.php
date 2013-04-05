<h2 style="text-align: right;"><a href="<?php echo base_url()?>blog/new_post/">Create a new Blog</a></h2>
      <?php
        foreach($blogs as $blog) {        
        ?>  
        <h3><strong><a href="<?php echo base_url()?>blog/blogtext/<?php echo $blog['blog_id'] ?>"><?php echo $blog['blog_title']; ?></a></strong>&nbsp;&nbsp;
        </h3>
        <p><?php echo substr($blog['blog_post'], 0, 200).".."; ?></p>
        <a href="<?php echo base_url()?>blog/blogtext/<?php echo $blog['blog_id'] ?>">Read More</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="<?php echo base_url()?>blog/editpost/<?php echo $blog['blog_id'] ?>">Edit Post</a>&nbsp;
        <a href="<?php echo base_url()?>blog/deletepost/<?php echo $blog['blog_id'] ?>">Delete Post</a>
        <hr>
        
        <?php
        }
        ?>