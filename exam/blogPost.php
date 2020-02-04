<!DOCTYPE html>
<html>
    <head>
        <title>Blog Post</title>
    </head>
    <body>
        <?php require 'header.php';
            require 'databaseCon.php'; ?>
        <h3>Blog Post</h3>
        <form method="post">
            <input type="submit" value="Add Blog Post" name="addBlog">
        </form>
        <?php
           
            if(isset($_POST['addBlog'])) {
                header('Location:addBlog.php');
            }
        ?>
         <table border=1>
                <?php
                    $head = ['Post Id', 'Category Name','Title', 'Published Date','Actions'];
                ?>
                <tr>
                    <?php
                        foreach ($head as $key):
                        ?>
                            <td><?php echo $key; ?></td>
                    <?php endforeach;?>
                </tr>
                <?php
                     $result = selectData('blog_post','blogPost_id,categoryName,title,publishedAt','user_id='.$_SESSION['userId']);
                     while($row = mysqli_fetch_assoc($result)) :
                        ?>
                    <tr>
                        <td><?php echo $row['blogPost_id'];?>   </td>
                        <td><?php echo $row['categoryName'];?>   </td>
                        <td><?php echo $row['title'];?>   </td>
                        <td><?php echo $row['publishedAt'];?>   </td>
                        <?php echo '<td><a href="http://localhost/xampp/php/exam/blogEdit.php?id='.$row['blogPost_id'].'">Edit </a>';
                      echo '<a href="http://localhost/xampp/php/exam/blogDelete.php?id='.$row['blogPost_id'].'">Delete</a></td>';
                        ?>
                     </tr>
                     <?php endwhile; ?>
            </table>
    </body>

</html>