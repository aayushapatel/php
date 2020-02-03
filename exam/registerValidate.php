<?php 
require 'databaseCon.php';
session_start();
    function validate($fieldName) {
        if($_POST) {
            switch ($fieldName) {
                case 'firstName':
                case 'lastName':
                case 'information':
                case 'password':
                    if(empty($_POST[$fieldName])) {
                        return true;
                    }    
                break;
                case 'mobileNumber' :
                    if (!preg_match('/^[0-9]{10}+$/',$_POST[$fieldName])) {    
                        return true;
                    }
                    break;
                case 'email':
                    if (!filter_var($_POST[$fieldName], FILTER_VALIDATE_EMAIL)) {    
                        return true;
                    }
                case 'confirmPassword':
                    if($_POST['password'] != $_POST['confirmPassword']) {
                        return true;
                    }
                case 'terms':
                    if(!isset($_POST['terms'])) {
                        return true;
                    }
                default:
                    # code...
                    break;
            }
        }
    }
    function setData($flag) {
        if($flag == 0) {
            $userData = converter();
            $userKeys = array_keys($userData);
            $userValue = array_values($userData);
            $userId = selectData('user','user_id',"email = '".$_POST['email']."'");
            if(mysqli_num_rows($userId) == 0) {
                $id = insertData('user','user_id,'.implode(", ",$userKeys), implode(",", $userValue));
                if($id > 1) {
                    $_SESSION['userId'] = $id;
                    header('Location:blogPost.php');
                }
            }
            else {
                echo "User already Registered";
            }
        }
    }
    function converter() {
      $userData = array();
        foreach ($_POST as $key => $value) {

            switch ($key) {
                case 'prefix':
                    $userData['prefix'] = "'".$value."'";
                break;
                case 'firstName':
                    $userData['firstName'] = "'".$value."'";
                break;
                case 'lastName':
                    $userData['lastName'] = "'".$value."'";
                break;
                case 'information':
                    $userData['information'] = "'".$value."'";
                break;
                case 'password':
                    $userData['password'] = "'".$value."'";
                break;
                case 'mobileNumber' :
                    $userData['mobileNumber'] = "'".$value."'";
                break;
                case 'email':
                    $userData['email'] = "'".$value."'";
                break;
            }
        }
        return $userData;
    }
?>