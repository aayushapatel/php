<?php
require 'registrationHTML.php';

if(isset($_POST['submit'])) {
    
    (uploadImg(array('application/pdf'),'certificate'));
    (uploadImg(array('image/jpeg','image/jpg'),'profileImage'));
    if (!preg_match("/^[a-zA-Z]*$/",$_POST['firstName'])) {
        echo "<script> alert('Invalid FirstName'); </script>";
    }
    else if (!preg_match("/^[a-zA-Z]*$/",$_POST['lastName'])) {
        echo "<script> alert('Invalid LastName'); </script>";
    }
    else if($_POST['dateOfBirth'] >  date('Y-m-d')) {
        echo "<script> alert('Invalid Date Of Birth'); </script>";
    }
    elseif (!preg_match('/^[0-9]{10}+$/',$_POST['phoneNumber'])) {
        echo "<script> alert('Invalid Phone Number'); </script>";   
    }
    else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('Invalid Email'); </script>";
    }
    else if(!preg_match('/^(?=.*[0-9])(?=.*[A-Z])[0-9A-Za-z!@#$%]{8,12}+$/', $_POST['password'])) {
        echo "<script> alert('Password length should be in 8-10 characters. Password should include one capital letter and one number'); </script>";
    }
    else if($_POST['password'] !== $_POST['confirmPassword']) {
        echo "<script> alert('Password does not match'); </script>";
    }
    else if(!preg_match('/^(?=.*[A-Za-z0-9])[0-9A-Za-z, ]*$/', $_POST['addressOne'])) {
        echo "<script> alert('Special Characters not allowed in address Line 1'); </script>";
    }
    else if(!preg_match('/^(?=.*[A-Za-z0-9])[0-9A-Za-z, ]*$/', $_POST['addressTwo'])) {
        echo "<script> alert('Special Characters not allowed in address Line 2'); </script>";
    }
    else if(!preg_match('/^[0-9]{6}+$/', $_POST['postalCode'])) {
        echo "<script> alert('Special characters and alphabets are not allowed'); </script>";
    }
    else if(!preg_match('/^(?=.*[A-Za-z])[A-Za-z0-9, ]*$/', $_POST['describe'])) {
        echo "<script> alert('Describe Yourself input Invalid'); </script>";
    }
    else if(!(isset($_POST['Post']) || isset($_POST['Phone']) || isset($_POST['Email']) || isset($_POST['SMS']))) {
        echo "<script> alert('Select atleast any one get in touch option'); </script>";
    }
    else if(empty($_FILES['profileImage']['name']) || empty($_FILES['certificate']['name'])) {
        echo "<script> alert('Upload Certificate and profileImage'); </script>";
    }
    else {
        $_SESSION['detail'] = array();
        $_POST['password'] = '';
        $_POST['confirmPassword'] = '';
        $_SESSION['detail'] = $_POST;
   
    }



}

function uploadImg($definedType, $fileInput) {
    $cnt = 0;
    $fileName = $_FILES[$fileInput]['name'];
    $tmp_name = $_FILES[$fileInput]['tmp_name'];
    $location = "uploads/";
    $type = $_FILES[$fileInput]['type'];
    foreach($definedType as $defineType) {
        if($type == $defineType) {
            $cnt = 1;
        }
    }
    if ($cnt == 1) {
        if(!file_exists($location . $fileName)) {
            move_uploaded_file($tmp_name, $location . $fileName);        
        }
        else {
            echo "<script> alert('File already Exists'); </script>";  
                die;  
        }
    }
    else {
        foreach($definedType as $defineType)
        echo "<script> alert('File should be ".$defineType."'); </script>";
        die;
    }

}
?>