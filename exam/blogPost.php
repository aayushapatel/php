<!DOCTYPE html>
<html>
    <head>
        <title>Blog Post</title>
    </head>
    <body>
        <?php require 'header.php';?>
        <h3>Blog Post</h3>
        <form method="post">
            <input type="submit" value="Add Blog Post" name="addBlog">
        </form>
        <?php
            if(isset($_POST['addBlog'])) {
                header('Location:addBlog.php');
            }
        ?>
    </body>

</html>