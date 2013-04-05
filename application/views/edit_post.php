
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
      <h2>Edit Blog : <?php echo $post['blog_title']; ?> </h2>
        <?php
            if($success == 1) {
                echo "<h3>Blog Updated Successfully!</h3>";
            }
        ?>
        <?php
            if(isset($post)) {
        ?>
        <form action="<?php echo base_url()?>blog/editpost/<?php echo $post['blog_id']?>" method="post">
        <p class="input"><label>Blog Title</label><input type="text" name="blog_title" value="<?php echo $post['blog_title']?>"></p>
        <p><label>Blog Post</label><textarea name="blog_post" rows="15" cols="50" class="textarea"><?php echo $post['blog_post']?></textarea></p>
        <p class="center"><input type="submit" value="Update Post" class="btn btn-primary"></p>
        </form>
        <?php
            }
        ?>  
    </body>
</html>
