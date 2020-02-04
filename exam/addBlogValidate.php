<?php

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
                case 'category':
                    if(!isset($_POST['category'])) {
                        return true;
                    }
                    break;
            }
        }
    }
    function setData($validFlag) {
        if($validFlag == 0) {

           
            $category = converter();
            
            $categoryKeys = array_keys($category);
            $categoryValues = array_values($category);
            $id = insertData('blog_post','blogPost_id,'.implode(",",$categoryKeys),implode(",",$categoryValues));
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
                case 'category':
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
?>