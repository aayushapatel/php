<!DOCTYPE html>
<html>
    <head>
        <title>Blog Post</title>
    </head>
    <body>
      <?php include 'databaseCon.php';
      include 'addBlogValidate.php';
      include 'header.php';
      $validFlag = 0;?>
        <h3>Add New Blog Post</h3>
        <form method="post">
            <table>
                <div>
                    <tr>
                        <td>Title</td>
                        <td><input type="text" name="title" id="">
                        <?php if(validate('title')): ?>
                                <span>Invalid Title </span>
                            <?php
                            $validFlag++; endif;?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td>Content</td>
                        <td><input type="text" name="content" id="">
                        <?php if(validate('content')): ?>
                                <span>Invalid Content </span>
                            <?php
                            $validFlag++; endif;?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td>
                            URL
                        </td>
                        <td><input type="url" name="url" id="">
                        
                        <?php if(validate('url')): ?>
                                <span>Invalid URL </span>
                            <?php
                            $validFlag++; endif;?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td>Published At</td>
                        <td><input type="date" name="publishedAt" id="">
                        
                        <?php if(validate('publishedAt')): ?>
                                <span>Invalid Date </span>
                            <?php
                            $validFlag++; endif;?></td>
                    </tr>

                </div>
                <div>
                    <tr>
                        <td>
                            Category
                        </td>
                        <td>
                        <?php $category = selectData('parentCategory','categoryName'); ?>
                            <select name="category[]" id="" multiple>
                                <?php 
                                
                                while($row = mysqli_fetch_assoc($category)):
                                ?>
                                    <option value="<?php echo $row['categoryName'];?>"><?php echo $row['categoryName'];?></option>
                                <?php
                                endwhile;
                                ?>
                            </select>
                            
                        <?php if(validate('category')): ?>
                                <span>Select category </span>
                            <?php
                            $validFlag++; endif;?>

                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td>
                            <input type="submit" value="Add" name="addBlog">
                        </td>
                    </tr>
                </div>
            </table>
        </form>
        <?php
            if(!empty($_POST)) {
                setData($validFlag);
            }
        ?>
    </body>

</html>