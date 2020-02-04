<?php 
require 'databaseCon.php';
$result = selectData('user','*', "user_id=".$_SESSION['userId']);
$data = getRowValue($result);



function getRowValue($result) {
    $value = null;
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            
               foreach ($row as $key => $value) {
                       $categoryArray[$key] = $value;
           }
         }
     }
    
   return $categoryArray;
}
function getData( $fieldName,$returnType = "") {
        global $data;
        $valueArray = $data;
    $value = (isset($valueArray[$fieldName]))? $valueArray[$fieldName] : $returnType;
    return (isset($value))? $value: $returnType;
}
    function validate($fieldName) {
        if($_POST) {
            switch ($fieldName) {
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
                case 'confirmPassword':
                    if($_POST['password'] != $_POST['confirmPassword']) {
                        return true;
                    }
                case 'terms':
                    if(!isset($_POST['terms'])) {
                        return true;
                    }
                default:
                    
                    break;
            }
        }
    }
    function setData($flag) {
        if($flag == 0) {
            $userData = converter();
            $updateUser = [];
            foreach ($userData as $key => $value) {
                array_push($updateUser,$key."=".$value);
            }
            $id = updateData('user',implode(", ",$updateUser    ), 'user_id='.$_SESSION['userId']);
        }
    }
    function converter() {
      $userData = array();
        foreach ($_POST as $key => $value) {

            switch ($key) {
               
                case 'information':
                    $userData['information'] = "'".$value."'";
                break;
                case 'password':
                    $userData['password'] = "'".md5($value)."'";
                break;
                case 'mobileNumber' :
                    $userData['mobileNumber'] = "'".$value."'";
                break;
               
            }
        }
        return $userData;
    }
?>