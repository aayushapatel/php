<?php
namespace App\Controllers\Admin;
use App\Models\Post;
use Core\BaseView;
use App\config;
use PDO;

class Category extends \Core\BaseController {
    public function __construct($route_params)   {
        parent::__construct($route_params);
        $this->category = Post::selectData('category','category_id,category_name','parent_category=0');
    }
    public function indexAction() {
        $grid = Post::selectData('category','*');
        BaseView::renderTemplate('Admin/category.html',['data'=>$grid]);
    }
    public function addAction() {
        
        if(isset($_POST['addCategory'])) {

            $_POST['image'] = $_FILES['image']['name'];
            if($this->validate($_POST)) {
               
                $categoryId = POST::selectData('category','category_id',"Url_key = '".$_POST['url']."'");
                if(empty($categoryId)) {
                    $categoryData = $this->converter($_POST);
                    $categoryKeys = array_keys($categoryData);
                    $categoryValue = array_values($categoryData);
                    $id = Post::insertData('category',implode(", ",$categoryKeys), implode(",", $categoryValue));
                    header("Location:".config::URL."Admin/Category/");
                }
                else {
                    echo "<script>alert('URL Exists'); </script>";
                    BaseView::renderTemplate('Admin/addCategory.html',['action'=>'Add','parentCategory'=>$this->category]);
                }
            }
            else {
                
                BaseView::renderTemplate('Admin/addCategory.html',['action'=>'Add','error'=>$this->error,'parentCategory'=>$this->category]);
            }
            
        }
        else {
            BaseView::renderTemplate('Admin/addCategory.html',['action'=>'Add','parentCategory'=>$this->category]);
        }
   
    }
    public function editAction() {
        
        $editdata = Post::selectData('category','*','category_id='.$this->params['id']);
        
        if(isset($_POST['addCategory'])) {

            $_POST['image'] = $_FILES['image']['name'];
            if($this->validate($_POST)) {
               
                $categoryId = POST::selectData('category','category_id',"Url_key = '".$_POST['url']." and category_id!=".$this->params['id']."'");
                if(empty($categoryId)) {
                    $categoryData = $this->converter($_POST);
                    $data = [];
                    foreach ($categoryData as $key => $value) {
                        array_push($data, "$key = $value");
                    }
                    $id = Post::updateData('category',implode(", ", $data),'category_id='.$this->params['id']);
                    header("Location:".config::URL."Admin/Category/");
                }
                else {
                    echo "<script>alert('URL Exists'); </script>";
                    BaseView::renderTemplate('Admin/addCategory.html',['action'=>'Update','parentCategory'=>$this->category,'editdata'=>$editdata[0]]);
                }
            }
            else {
                BaseView::renderTemplate('Admin/addCategory.html',
                ['action'=>'Update','error'=>$this->error,'parentCategory'=>$this->category,'editdata'=>$editdata[0]]);
            }
            
        }
        else {
            BaseView::renderTemplate('Admin/addCategory.html',['action'=>'Update','parentCategory'=>$this->category,'editdata'=>$editdata[0]]);
        }
   
    }
    protected function validate($fields) {
        $error = [];
        foreach ($fields as $key => $value) {
            switch ($key) {
                case 'categoryName':
                case 'url':
                
                case 'status':
                case 'description':
                case 'parentCategory':
                    if(empty($value)) {
                        $error[$key] = "*Invalid Input";
                    }
                break;
                case 'image':
                    if(!in_array($_FILES['image']['type'],['image/jpg','image/jpeg','image/png'])) {
                        $error[$key] = 'Image in jpg format';
                    }
                break;
            }
        }
        
        $this->error = $error;
        return (empty($error))?true:false;
    }
    
    protected static function converter($fields) {
        $categoryData = array();
        $categoryData['parent_category'] = 0;
          foreach ($fields as $key => $value) {
  
              switch ($key) {
                  case 'categoryName':
                      $categoryData['category_name'] = "'".$value."'";
                  break;
                  case 'url':
                      $value = strtolower(str_replace(" ", "-", $value));
                      $categoryData['Url_key'] = "'".$value."'";
                  break;
                  case 'image':
                      $categoryData['image'] = "'".$value."'";
                  break;
                  case 'status':
                      $categoryData['status'] = "'".$value."'";
                  break;
                  case 'description':
                      $categoryData['description'] = "'".$value."'";
                  break;
                  case 'parentCategory' :
                          $categoryData['parent_category'] = $value;
                      
                      
                  break;
              }
          }
          return $categoryData;
        }
}
?>