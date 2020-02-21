<?php
namespace App\Controllers\Admin;
use App\Models\BaseQuery;
use App\Models\Admin\productModel;
use Core\BaseView;
use App\config;
class Products extends \Core\BaseController {
    public function __construct($route_params)   {
        parent::__construct($route_params);
        $this->category = BaseQuery::selectData('category','category_id,category_name','parent_category!=0');
    }
    public function indexAction() {
        $grid = BaseQuery::selectData('products','*');
        BaseView::renderTemplate('Admin/products.html',['data'=>$grid]);
    }
    public function addAction() {
        
        if(isset($_POST['addProduct'])) {
            $_POST['url'] = $this->generateUrl($_POST['url']);
            $_POST['image'] = $_FILES['image']['name'];
            if($this->validate($_POST)) {
                $categoryId = BaseQuery::selectData('products','product_id',"Url_key = '".$_POST['url']."'");
                if(empty($categoryId)) {
                   
                    $id = productModel::insertConverter($_POST);
                    header("Location:".config::URL."Admin/Products/");
                }
                else {
                    echo "<script>alert('URL Exists'); </script>";
                    BaseView::renderTemplate('Admin/addProducts.html',['category'=>$this->category,'action'=>'Add']);
                }
            }
            else {
                
                BaseView::renderTemplate('Admin/addProducts.html',['category'=>$this->category,'action'=>'Add','error'=>$this->error]);            
            }
            
        }
        else {
            BaseView::renderTemplate('Admin/addProducts.html',['category'=>$this->category,'action'=>'Add']);        
        }
    } 
    public function editAction() {
        $editdata = BaseQuery::join("SELECT p.*, r.category_id as child_category FROM products p LEFT JOIN products_categories r ON r.product_id=p.product_id
         WHERE p.product_id=".$this->params['id']);

        if(isset($_POST['addProduct'])) {
            $_POST['url'] = $this->generateUrl($_POST['url']);
            $_POST['image'] = $_FILES['image']['name'];
            if($this->validate($_POST, true)) {
                $categoryId = BaseQuery::selectData('products','product_id',"Url_key = '".$_POST['url']."' and product_id!=".$this->params['id']);
                if(empty($categoryId)) {
                    
                    $id = productModel::updateConverter($_POST, $this->params['id']);
                    header("Location:".config::URL."Admin/Products/");
                }
                else {
                    echo "<script>alert('URL Exists'); </script>";
                    BaseView::renderTemplate('Admin/addProducts.html',['category'=>$this->category,'action'=>'Update','editdata'=>$editdata[0]]);
                }
            }
            else {
                
                BaseView::renderTemplate('Admin/addProducts.html',['category'=>$this->category,'action'=>'Update','error'=>$this->error,'editdata'=>$editdata[0]]);            
            }
            
        }
        else {
            BaseView::renderTemplate('Admin/addProducts.html',['category'=>$this->category,'action'=>'Update','editdata'=>$editdata[0]]);        
        }
    } 
    public function deleteAction() {
        BaseQuery::deleteData('products','product_id='.$this->params['id']);
        
    }
    protected function validate($fields, $imageValidate=false) {
        $error = [];
        
        foreach ($fields as $key => $value) {
            switch ($key) {
                case 'productName':
                case 'url':
                case 'sku':
                case 'status':
                case 'description':
                case 'shortDescription':
                
                    if(empty($value)) {
                        $error[$key] = "*Invalid Input";
                    }
                break;
                case 'category' :
                    if($value == 0) {
                        $error[$key] = "Select a option";
                    }
                case 'price' :
                case 'stock':
                    if(($value < 0) || empty($value)) {
                        $error[$key] = "*Invalid Input";
                    }
                break;
                case 'image':
                    if($imageValidate && empty($_FILES['image']['name'])) {
                        break;
                    }
                    if(!in_array($_FILES['image']['type'],['image/jpg','image/jpeg','image/png'])) {
                        $error[$key] = 'Image in jpg format';
                    }
                    else {
                        move_uploaded_file($_FILES['image']['tmp_name'],config::DOCUMENT_ROOT."uploads/".$_FILES['image']['name']);
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