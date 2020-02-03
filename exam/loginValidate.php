<?php
    require 'databaseCon.php';
    session_start();
    if(isset($_POST['register'])) {
        header('Location:register.php');
    }
    if(isset($_POST['login'])) {
        if(!empty($_POST['email']) && !empty($_POST['password'])) {

            $result = selectData('user','`user_id`,`password`',"`email` ='".$_POST['email']."'" );
            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if($row['password'] == ($_POST['password'])) {
                    $_SESSION['userId'] = $row['user_id'];
                    header('Location:blogPost.php');
                }
                else {
                    
                    echo "Inavlid Password";
                }
            }
            else {
                echo "Invalid Email";
            }

        }
        else {
            echo "Fill the fields";
        }
    }
?>