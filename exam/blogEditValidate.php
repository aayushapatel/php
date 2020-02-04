<?php
ob_start();
$result = selectData('blog_post','*', "blogPost_id=".$_GET['id']);
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
if($fieldName == 'categoryName')
    $value = explode(", ",$value);
return (isset($value))? $value: $returnType;
}

function validate($fieldName) {
    if($_POST) {
        switch ($fieldName) {
            case 'title':
            case 'content':
            case 'url':
                if(empty($_POST[$fieldName])) {
                    return true;
                }    
            break;
            case 'publishedAt' :
               
                if(date("Y-m-d") < $_POST['publishedAt']) {
                    return true;
                }
                break;
            case 'categoryName':
                if(!isset($_POST['categoryName'])) {
                    return true;
                }
                break;
        }
    }
}
function setData($validFlag) {

    if($validFlag == 0) {
        $categoryArray = [];
        $category = converter();
        foreach ($category as $key => $value) {
            array_push($categoryArray, $key."=".$value);
        }
        $id = updateData('blog_post',implode(", ",$categoryArray),'blogPost_id='.$_GET['id']);
        if(($id) > 0) {
            header('Location:blogPost.php');
        }
    }
}
function converter() {
    $userData = array();

    foreach ($_POST as $key => $value) {
        switch ($key) {
            case 'title':
                $userData['title'] = "'".$value."'";
            break;
            case 'content':
                $userData['content'] = "'".$value."'";
            break;
            case 'url':
                $userData['url'] = "'".$value."'";
            break;
            case 'publishedAt':
                $userData['publishedAt'] = "'".$value."'";
            break;
            case 'categoryName':
                $categoryArray = [];
               foreach ($value as $category) {
                   array_push($categoryArray,$category);
               }
               $userData['categoryName'] = "'".implode(", ", $categoryArray)."'";
            break;

            
        }
      

    }
    $userData['user_id'] = $_SESSION['userId'];
    
    return $userData;
}
ob_end_flush();
?>