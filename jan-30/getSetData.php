<?php 
    include 'databaseCon.php';
    $resultAccount = selectData('customers', '*', '`customer_id` = '.$_GET['id']);
    $accountValue = getRowValue($resultAccount);
    $resultAddress = selectData('customer_address', '*', '`customer_id` = '.$_GET['id']);
    $addressValue = getRowValue($resultAddress);
    $resultOther = selectData('customer_additional_info', '*', '`customer_id` = '.$_GET['id']);
    $otherValue = getRowValue($resultOther,'other');
    function getRowValue($result,$other='') {
             $value = null;
             if (mysqli_num_rows($result) > 0) {
                 while($row = mysqli_fetch_assoc($result)) {
                     if($other == 'other') {
                         if($row['field_key'] == 'hobbies' || $row['field_key'] == 'inTouch')
                                $row['value'] = explode(", ", $row['value']);
                        $categoryArray[$row['field_key']] = $row['value'];
                     }
                     else {
                        foreach ($row as $key => $value) {
                                $categoryArray[$key] = $value;
                    }
                    }
                  }
              }
             
            return $categoryArray;
         }
    function getData($category, $fieldName,$returnType = "") {
        if($category == 'account') {
            global $accountValue;
            $valueArray = $accountValue;
        }
        elseif ($category == 'address') {
            global $addressValue;
            $valueArray = $addressValue;
        }
        else {
            global $otherValue;
            $valueArray = $otherValue;
        }
        $value = (isset($valueArray[$fieldName]))? $valueArray[$fieldName] : $returnType;
        return (isset($value))? $value: $returnType;
    }
    function validate($category, $fieldName) {
        if(isset($_POST[$category]) && isset($_POST['submit'])) {
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
            
            $customerId = updateData('customers', $account,'customer_id  = '.$_GET['id']);
            $address_id = updateData('customer_address',$address, 'customer_id  = '.$_GET['id']);
            foreach ($_POST['other'] as $key => $value) {
                $other = otherData($key, $value);
                $id = updateData('customer_additional_info',"value = ".$other, "`customer_id`  = ".$_GET['id']." AND `field_key` = '".$key."'");
            }
            $profileImage = $_FILES['other']['name']['profileImage'];
            $certificate = $_FILES['other']['name']['certificate'];

            $id = updateData('customer_additional_info',"value = '".$profileImage."'", "`customer_id`  = ".$_GET['id']." AND `field_key` = 'profileImage'");
            $id = updateData('customer_additional_info',"value = '".$certificate."'", "`customer_id`  = ".$_GET['id']." AND `field_key` = 'certificate'");
            echo "Updated Successfully";
            
            
        }
    }
function updateConverter($category) {
   
    foreach ($category as $key => $value) {
          array_push($key = "'".$value."'");
    }
    return $categoryArray;
}

    function accountData($account) {
        $fieldData = array();
        $keyArray = array();
        foreach($account as $key => $field) {
            switch ($key) {
                default:
                     array_push($fieldData, $key ."= '".$field."'");
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
                   array_push($fieldData, $key ."= '".$field."'");
             }
         }
         return implode(", ", $fieldData);
    }
    function otherData($key, $field)    {
        switch ($key) {
            case 'describe':
                
            case 'years' :
                
            case 'clients':
                $field = "'".$field."'";
                return $field;
                break;
            case 'inTouch':
            
            case 'hobbies':
                $hobbiesArray = array();
                foreach ($field as $subValue) {
                   array_push($hobbiesArray,$subValue);
                }
                return "'".implode(", ", $hobbiesArray)."'";        
                break;
            default:
                break;
        }
    }












        





?>
