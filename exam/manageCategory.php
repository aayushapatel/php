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
            <input type="submit" value="Add Category" name="addBlog">
            <?php
            if(isset($_POST['addBlog'])) {
                header('Location:addCategory.php');
            }
        ?>
            <table border=1>
                <?php
                    $head = ['Category Id', 'Category Image','Title', 'Category Name','Created Date', 'Actions'];
                ?>
                <tr>
                    <?php
                        foreach ($head as $key):
                        ?>
                            <td><?php echo $key; ?></td>
                    <?php endforeach;?>
                </tr>
                <?php
                     $result = selectData('category','category_id,title,image,categoryName,createdAt');
                     while($row = mysqli_fetch_assoc($result)) :
                        ?>
                    <tr>
                        <td><?php echo $row['category_id'];?>   </td>
                        <td><img src="<?php echo $row['image'];?>" height="50px" width="50px">   </td>
                        <td><?php echo $row['title'];?>   </td>
                        <td><?php echo $row['categoryName'];?>   </td>
                        <td><?php echo $row['createdAt'];?>   </td>
                        <?php echo '<td><a href="http://localhost/xampp/php/exam/categoryEdit.php?id='.$row['category_id'].'">Edit </a>';
                      echo '<a href="http://localhost/xampp/php/exam/categoryDelete.php?id='.$row['category_id'].'">Delete</a></td>';
                        ?>
                     </tr>
                     <?php endwhile; ?>
            </table>
        </form>
       
    </body>

</html>