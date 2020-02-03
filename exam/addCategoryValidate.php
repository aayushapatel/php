<?php
    function validate($fieldName) {
        if($_POST) {
            switch ($fieldName) {
                case 'title':
                case 'content':
                case 'url':
                case 'metaTitle':
                    if(empty($_POST[$fieldName])) {
                        return true;
                    }    
                break;
                case 'image' :
                    if (empty($_FILES[$fieldName]['name']) && in_array($_FILES['image']['type'],['image/jpg','image/jpeg'])) {    
                        return true;
                    }
                    break;
                
            }
        }
    }
    function setData($validFlag) {
        if($validFlag == 0) {

            @move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$_FILES['image']['name']);
            $category = converter();
            $categoryKeys = array_keys($category);
            $categoryValues = array_values($category);
            $id = insertData('category','category_id,'.implode(",",$categoryKeys),implode(",",$categoryValues));
            if(($id) > 0) {
                header('Location:manageCategory.php');
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
                case 'metaTitle':
                    $userData['metaTitle'] = "'".$value."'";
                break;
                case 'category':
                   $result = selectData('parentCategory','category_id',"categoryName = '".$value."'");
                   $row = mysqli_fetch_assoc($result);
                   $userData['parentCategory'] = "'".$row['category_id']."'";
                   $userData['categoryName'] = "'".$value."'";
                break;

                
            }
            $userData['image'] = "'uploads/".$_FILES['image']['name']."'";

        }
        
        return $userData;
    }
?>