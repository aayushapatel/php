<!DOCTYPE html>
<html>
    <head>
        <title>Blog Post</title>
    </head>
    <body>
        <?php require 'databaseCon.php'; 
            require 'header.php';
            require 'blogEditValidate.php';
            $validFlag = 0;
            

            ?>
        <h3>Update Blog Post</h3>
        <form method="post" enctype="multipart/form-data">
            <table>
                <div>
                    <tr>
                        <td>Title</td>
                        <td><input type="text" name="title" id="" value='<?php echo getData('title'); ?>'>
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
                        <td><input type="text" name="content" id=""  value='<?php echo getData('content'); ?>'>
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
                        <td><input type="url" name="url" id=""  value='<?php echo getData('url'); ?>'>
                        <?php if(validate('url')): ?>
                                <span>Invalid url </span>
                            <?php
                            $validFlag++; endif;?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td>
                            Published At
                        </td>
                        <td><input type="date" name="publishedAt" id=""  value='<?php echo getData('publishedAt'); ?>'>
                        <?php if(validate('publishedAt')): ?>
                                <span>Invalid Date </span>
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
                            <select name="categoryName[]" id="" multiple>
                                <?php 
                                $selected = "selected='selected'";
                                while($row = mysqli_fetch_assoc($category)):
                                ?>
                                    <option value="<?php echo $row['categoryName'];?>"
                                    <?php echo (in_array(($row['categoryName']),getData('categoryName',[])))?$selected:"" ?>    >
                                    <?php echo $row['categoryName'];?></option>
                                <?php
                                endwhile;
                                ?>
                            </select>
                            
                        <?php if(validate('categoryName')): ?>
                                <span>Select category </span>
                            <?php
                            $validFlag++; endif;?>

                        </td>
                    </tr>
                </div>
                
                <div>
                    <tr>
                        <td><input type="submit" value="Update"></td>
                    </tr>
                </div>
            </table>
            <?php
                if(!empty($_POST))
                setData($validFlag);
            ?>
        </form>
    </body>

</html>