<!DOCTYPE html>
<html>
    <head>
        <title>Category</title>
    </head>
    <body>
        <?php require 'databaseCon.php'; 
            require 'addCategoryValidate.php';
            require 'header.php';
            $validFlag = 0;
            ?>
        <h3>Add New Blog Post</h3>
        <form method="post" enctype="multipart/form-data">
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
                                <span>Invalid content </span>
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
                                <span>Invalid url </span>
                            <?php
                            $validFlag++; endif;?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td>Meta Title</td>
                        <td><input type="text" name="metaTitle" id="">
                        <?php if(validate('metaTitle')): ?>
                                <span>Invalid Meta Title </span>
                            <?php
                            $validFlag++; endif;?>
                        </td>
                    </tr>

                </div>
                <div>
                    <tr>
                        <td>
                             Parent Category
                        </td>
                        <td>
                            <?php $category = selectData('parentCategory','categoryName'); ?>
                            <select name="category" id="" >
                                <?php 
                                
                                while($row = mysqli_fetch_assoc($category)):
                                ?>
                                    <option value="<?php echo $row['categoryName'];?>"><?php echo $row['categoryName'];?></option>
                                <?php
                                endwhile;
                                ?>
                            </select>

                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td>Image</td>
                        <td><input type="file" name="image" id="">
                        <?php if(validate('image')): ?>
                                <span>Invalid Image </span>
                            <?php
                            $validFlag++; endif;?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td><input type="submit" value="Add"></td>
                    </tr>
                </div>
            </table>
            <?php
                setData($validFlag);
            ?>
        </form>
    </body>

</html>