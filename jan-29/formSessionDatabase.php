<?php
session_start(); 
require 'databaseCon.php';
    function setSession($category) {
        $_SESSION[$category] = (isset($_POST[$category]))? $_POST[$category]: [];
    }
    function getSession($category, $fieldName,$returnType = "") {
        return (isset($_SESSION[$category][$fieldName]))? $_SESSION[$category][$fieldName]: $returnType;
    }
    setSession('account');
    setSession('address');
    setSession('other');

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
                    if($_POST[$fieldName] != $_POST[$category]['password']) {    
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
                break;
                case 'hobbies':
                    if(isset($_POST[$category][$fieldName])) {
                        return true;
                    }
                break;
                case 'profileImage':
                    if(empty($_FILES[$category]['name']['profileImage'])) {    
                        return "Select a image file";
                    }
                    else {
                        $uploadOrNot = (uploadImg(array('image/jpeg','image/jpg'),'profileImage'));
                        if($uploadOrNot !== 1) {
                            return $uploadOrNot;
                        }
                        else {
                            return "1";
                        }
                    }
                break;
                case 'certificate':
                    if(empty($_FILES[$category]['name']['certificate'])) {    
                        return "Select a pdf file";
                    }
                    else {
                        $uploadOrNot = (uploadImg(array('application/pdf'),'certificate'));
                        if($uploadOrNot !== 1) {
                            return $uploadOrNot;
                        }
                        else
                            return "1";
                    }
                break;
                default:
      
            }   
                     
        }
        
    }
    function uploadImg($definedType, $fileInput) {
        $cnt = 0;
        echo $fileName = $_FILES['other']['name'][$fileInput];
        $tmp_name = $_FILES['other']['tmp_name'][$fileInput];
        $location = "uploads/";
        $type = $_FILES['other']['type'][$fileInput];
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

    function setData($flag) {
        echo $flag;
        if($flag == 0) {
            echo "b";
            $account = accountData($_POST['account']);
            $address = addressData($_POST['address']);
            $customerId = insertData('customers', $account);
            $address_id = insertData('customer_address',$customerId.", ".$address);
            foreach ($_POST['other'] as $key => $value) {
                $other = otherData($key, $value);
                $id = insertData('customer_additional_info',$customerId.", ".$other);
            }
            $profileImage = $_FILES['other']['name']['profileImage'];
            $certificate = $_FILES['other']['name']['certificate'];
            echo $profileImage;
            $id = insertData('customer_additional_info',$customerId.", 'Image Profile', '".$profileImage."'");
            $id = insertData('customer_additional_info',$customerId.", 'Certificate', '".$certificate."'");
            
        }
    }

    function accountData($account) {
        $fieldData = array();
        $keyArray = array();
        foreach($account as $key => $field) {
            switch ($key) {
                default:
                    $field = "'".$field."'";
                     array_push($fieldData, $field);
                    break;
            }
        }
        return implode(", ", $fieldData);
    }
    function addressData($address) {
        $fieldData = array();
        foreach($address as $key => $field) {
            switch ($key) {

                default:
                    $field = "'".$field."'";
                     array_push($fieldData, $field);
                    break;
            }
        }
        return implode(", ", $fieldData);
    } 
    function otherData($key, $field)    {
        switch ($key) {
            case 'describe':
                $field = "'".$field."'";
                return "'Description', ".$field;
                break;
            case 'years' :
                $field = "'".$field."'";
                return "'Experience Years', ".$field;
                break;
            case 'clients':
                $field = "'".$field."'";
                return "'Clients', ".$field;
                break;
            case 'inTouch':
                $inTouchArray = array();
                foreach ($field as $subValue) {
                   array_push($inTouchArray,$subValue);
                }
                return "'Get In touch', '".implode(", ", $inTouchArray)."'";
                break;
            case 'hobbies':
                $hobbiesArray = array();
                foreach ($field as $subValue) {
                   array_push($hobbiesArray,$subValue);
                }
                return "'Hobbies', '".implode(", ", $hobbiesArray)."'";        
                break;
            default:
                break;
        }
    }

    displayData();
    function displayData() {
        $table = "<table border=1>";
        $accountArray = ['Id','Prefix','First Name','Last Name','Date of Birth','Phone Number','Email','Password'];
        $addressArray = ['Address Line 1','Address Line 2','Company','City','State','Country','Postal Code'];
        $otherArray = ['Description','Experience Year','Clients','Get In touch','Hobbies','Image Profile','Certificate'];
        foreach (array_merge($accountArray,$addressArray,$otherArray) as $key) {
            $table .= "<th>".$key."</td>";
        }
        $result = selectData('customers','*', 1);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $table .= "<tr>";
                $id = $row['customer_id'];
                foreach ($row as $value) {
                    $table .= "<td>".$value."</td>";
                }
                $addressResult = selectData('customer_address','*','`customer_id` = '.$id);
                if(mysqli_num_rows($addressResult) > 0) {
                    while($addressrow = mysqli_fetch_assoc($addressResult)) {
                       
                        foreach ($addressrow as $key => $addressvalue) {
                            if(!($key == 'id') && !($key == 'customer_id'))
                                $table .= "<td>".$addressvalue."</td>";
                        }
                    }
                }
                $otherResult = selectData('customer_additional_info','*','`customer_id` = '.$id);
                if(mysqli_num_rows($otherResult) > 0) {
                    $i = 0;
                    
                    while($otherrow = mysqli_fetch_assoc($otherResult)) {
                        label :
                        if($otherArray[$i] == $otherrow['field_key']) {
                            $table .= "<td>".$otherrow['value']."</td>";
                        }
                        else {
                            $table .= "<td>"."</td>";
                            $i++;
                            goto label;
                        }
                        $i++;
                        }
                    }
                
                $table .= "</tr>";
            }
        }
        $table .= "</table>";
        echo $table;
    }
   
    
?>