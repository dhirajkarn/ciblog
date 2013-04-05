
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
            if($error) {
                echo $error;
            }
        ?>
      <h2>Add a new Blog</h2>
        <form action="<?php echo base_url()?>blog/new_post" enctype="multipart/form-data" method="post">
        <p class="input"><label>Blog Title</label><input type="text" name="blog_title"></p>
        <p><label>Blog Post</label><textarea name="blog_post" rows="10" cols="47" class="textarea"></textarea></p>
        <p><label for="file">Upload a Picture</label><input type="file" name="userfile"></p>
        <p class="center"><input type="submit" value="Add Post" class="btn btn-primary"></p>
        </form>  
    </body>
</html>
