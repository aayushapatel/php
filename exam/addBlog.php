<!DOCTYPE html>
<html>
    <head>
        <title>Blog Post</title>
    </head>
    <body>
      <?php include 'databaseCon.php'; ?>
        <h3>Add New Blog Post</h3>
        <form method="post">
            <table>
                <div>
                    <tr>
                        <td>Title</td>
                        <td><input type="text" name="title" id=""></td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td>Content</td>
                        <td><input type="text" name="content" id=""></td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td>
                            URL
                        </td>
                        <td><input type="url" name="url" id=""></td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td>Published At</td>
                        <td><input type="date" name="publishedAt" id=""></td>
                    </tr>

                </div>
                <div>
                    <tr>
                        <td>
                            Category
                        </td>
                        <td>
                        <?php $category = selectData('parentCategory','categoryName'); ?>
                            <select name="category" id="" multiple>
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
            </table>
        </form>
    </body>

</html>