<!DOCTYPE html>
<html>
    <head>
        <title>Header</title>
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
            <div>
                <input type="submit" value="Manage Category" name="manage">
                <input type="submit" value="My Profile" name="profile">
                <input type="submit" value="Logout" name="logout">
            </div>
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