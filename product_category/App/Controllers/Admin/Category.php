<?php
namespace App\Controllers\Admin;
use App\Models\BaseQuery;
use App\Models\Admin\categoryModel;
use Core\BaseView;
use App\config;
use PDO;

class Category extends \Core\BaseController {
    public function __construct($route_params)   {
        parent::__construct($route_params);
        
    }
    public function indexAction() {
        $grid = BaseQuery::selectData('category','*');
        BaseView::renderTemplate('Admin/category.html',['data'=>$grid]);
    }
    public function addAction() {
        $category = BaseQuery::selectData('category','category_id,category_name','parent_category=0');
        if(isset($_POST['addCategory'])) {
            $_POST['url'] = $this->generateUrl($_POST['url']);
            $_POST['image'] = $_FILES['image']['name'];
            if($this->validate($_POST)) {
                $categoryId = BaseQuery::selectData('category','category_id',"Url_key = '".$_POST['url']."'");
                if(empty($categoryId)) {
                    
                    $id = categoryModel::insertConverter($_POST);
                    header("Location:".config::URL."Admin/Category/");
                }
                else {
                    echo "<script>alert('URL Exists'); </script>";
                    BaseView::renderTemplate('Admin/addCategory.html',['action'=>'Add','parentCategory'=>$category]);
                }
            }
            else {
                
                BaseView::renderTemplate('Admin/addCategory.html',['action'=>'Add','error'=>$this->error,'parentCategory'=>$category]);
            }
            
        }
        else {
            BaseView::renderTemplate('Admin/addCategory.html',['action'=>'Add','parentCategory'=>$category]);
        }
   
    }
    public function editAction() {
        $category = BaseQuery::selectData('category','category_id,category_name','parent_category=0 and category_id!='.$this->params['id']);
        $editdata = BaseQuery::selectData('category','*','category_id='.$this->params['id']);
        
        if(isset($_POST['addCategory'])) {
            $_POST['url'] = $this->generateUrl($_POST['url']);
            $_POST['image'] = $_FILES['image']['name'];
            if($this->validate($_POST)) {
               
                $categoryId = BaseQuery::selectData('category','category_id',"Url_key = '".$_POST['url']." and category_id!=".$this->params['id']."'");
                if(empty($categoryId)) {
                    $id = categoryModel::updateConverter($_POST, $this->params['id']);
                    header("Location:".config::URL."Admin/Category/");
                }
                else {
                    echo "<script>alert('URL Exists'); </script>";
                    BaseView::renderTemplate('Admin/addCategory.html',['action'=>'Update','parentCategory'=>$category,'editdata'=>$editdata[0]]);
                }
            }
            else {
                BaseView::renderTemplate('Admin/addCategory.html',
                ['action'=>'Update','error'=>$this->error,'parentCategory'=>$category,'editdata'=>$editdata[0]]);
            }
            
        }
        else {
            BaseView::renderTemplate('Admin/addCategory.html',['action'=>'Update','parentCategory'=>$category,'editdata'=>$editdata[0]]);
        }
   
    }
    public function deleteAction() {
        $ids = BaseQuery::selectData('category','category_id','parent_category='.$this->params['id']);
        if(!empty($ids)) {
            foreach ($ids as $value) {
                $this->deleteProduct($value['category_id']);
                BaseQuery::deleteData('category','category_id='.$value['category_id']);
            }
        }
        else {
            $this->deleteProduct($this->params['id']);
        }
        BaseQuery::deleteData('category','category_id='.$this->params['id']);
        header('Location:'.config::URL.'Admin/Category');
    }
    protected function deleteProduct($category_id) {
        $productId = BaseQuery::selectData('products_categories','product_id','category_id='.$category_id);
        foreach ($productId as $value) {
            foreach ($value as $product_id) {
                BaseQuery::deleteData('products','product_id='.$product_id);
            }
           
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
    protected static function generateUrl($url) {
        return str_replace(" ", "-", strtolower($url));
    }
    
}
?>