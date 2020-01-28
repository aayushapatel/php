<?php
session_start(); 
    function setSession($category) {
        $_SESSION[$category] = (isset($_POST[$category]))? $_POST[$category]: [];
    }
    function getSession($category, $fieldName,$returnType = "") {
        return (isset($_SESSION[$category][$fieldName]))? $_SESSION[$category][$fieldName]: $returnType;
    }
    function validate($category, $fieldName) {
        if(isset($_POST[$category])) {
            switch ($fieldName) {
                case 'firstName':
                case 'lastName':
                    if (!preg_match("/^(?=.*[A-Za-z])[a-zA-Z]*$/",$_POST[$category][$fieldName])) {    
                        return true;
                    }
                    break;
                case 'dateOfBirth':
                    if(($_POST[$category][$fieldName] >  date('Y-m-d')) || $_POST[$category][$fieldName] == '') {
                       return true;
                    }
                     break;
                case 'phoneNumber':
                    if (!preg_match('/^[0-9]{10}+$/',$_POST[$category][$fieldName]) || strlen($_POST[$category][$fieldName]) != 10) {    
                        return true;
                    }
                    break;
                case 'email':
                    if (!filter_var($_POST[$category][$fieldName], FILTER_VALIDATE_EMAIL)) {    
                        return true;
                    }
                    break;
                case 'password':
                    if (!preg_match('/^(?=.*[0-9])(?=.*[A-Z])[0-9A-Za-z!@#$%]{8,12}+$/', $_POST[$category][$fieldName])) {    
                        return true;
                    }
                    break;
                case 'confirmPassword':
                    if($_POST[$category][$fieldName] != $_POST[$category]['password']) {    
                        return true;
                    }
                    break;
                case 'addressOneLine':
                case 'addressTwoLine':
                case 'describe':
                    if(!preg_match('/^(?=.*[A-Za-z0-9])[0-9A-Za-z,(). ]*$/', $_POST[$category][$fieldName])) {    
                       return true;
                    }
                    break;
                case 'postalCode':
                    if(!preg_match('/^[0-9]{6}+$/', $_POST[$category][$fieldName])) {    
                        return true;
                    }
                case 'hobbies':
                    if(isset($_POST[$category][$fieldName])) {
                        return "Select atleast on of them";
                    }
                break;
                case 'profileImage':
                    if(empty($_FILES[$category]['profileImage']['name'])) {    
                        return "Select a image file";
                    }
                    else {
                        $uploadOrNot = (uploadImg(array('image/jpeg','image/jpg'),'profileImage'));
                        if($uploadOrNot !== 1) {
                            return $uploadOrNot;
                        }
                    }
                break;
                case 'certificate':
                    if(empty($_FILES[$category]['certificate']['name'])) {    
                        return "Select a pdf file";
                    }
                    else {
                        $uploadOrNot = (uploadImg(array('application/pdf'),'profileImage'));
                        if($uploadOrNot !== 1) {
                            return $uploadOrNot;
                        }
                    }
                break;
                default:
      
            }   
                setSession('account');
                setSession('address');
                setSession('other');     
        }
        
    }
    function uploadImg($definedType, $fileInput) {
        $cnt = 0;
        $fileName = $_FILES['other'][$fileInput]['name'];
        $tmp_name = $_FILES['other'][$fileInput]['tmp_name'];
        $location = "uploads/";
        $type = $_FILES['other'][$fileInput]['type'];
        foreach($definedType as $defineType) {
            if($type == $defineType) {
                $cnt = 1;
            }
        }
        if ($cnt == 1) {
            if(!file_exists($location . $fileName)) {
                move_uploaded_file($tmp_name, $location . $fileName); 
                return 1;       
            }
            else {
                return 'File already Exists';  
            }
        }
        else {
            $type = '';
            foreach($definedType as $defineType)
            $type .= "File should be ".$defineType;
            return $type;
        }
    }
?>
