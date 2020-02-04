<!DOCTYPE html>
<html>
    <head>
        <title>Header</title>
        <style>
            div.header{
                
                margin-left: 900px;
                margin-bottom: 50px;
                
            }
        </style>
    </head>
    <body>
        <form action="" method="post">
            <?php session_start();?>
            <?php
                function checkSession() {
                    if(!isset($_SESSION['userId'])) {
                        header('Location:login.php');
                        die;
                    }
                }
            ?>
            <div class="header">
                <input type="submit" value="Manage Category" name="manage">
                <input type="submit" value="My Profile" name="profile">
                <input type="submit" value="Logout" name="logout">
            </div>
            <h4><a href="http://localhost/xampp/php/exam/blogPost.php">BLOG</a></h4>
            <?php
                checkSession();
                if(isset($_POST['manage'])) {
                    checkSession();
                    header('Location:manageCategory.php');
                }
                if(isset($_POST['profile'])) {
                    checkSession();
                    header('Location:myProfile.php');
                }
                if(isset($_POST['logout'])) {
                    checkSession();
                    session_destroy();
                    header('Location:login.php');
                }
            ?>
        </form>
    </body>

</html>