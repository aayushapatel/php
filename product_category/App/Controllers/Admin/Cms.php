<?php
namespace App\Controllers\Admin;   

use App\Models\BaseQuery;
use App\Models\Admin\cmsModel;
use Core\BaseView;
use App\config;
class Cms extends \Core\BaseController {
    
    public function indexAction() {
        $grid = BaseQuery::selectData('cms_pages','*');
        BaseView::renderTemplate('Admin/cms.html',['data'=>$grid]);
    }
    public function addAction() {
        
        if(isset($_POST['addCms'])) {
            $_POST['url'] = $this->generateUrl($_POST['url']);
            if($this->validate($_POST)) {
                $cmsId = BaseQuery::selectData('cms_pages','cms_id',"Url_key = '".$_POST['url']."'");
                if(empty($cmsId)) {
                    $id = cmsModel::insertConverter($_POST);
                    header("Location:".config::URL."Admin/Cms/");
                }
                else {
                    echo "<script>alert('URL Exists'); </script>";
                    BaseView::renderTemplate('Admin/addCms.html',['action'=>'Add']);
                }
            }
            else {
                
                BaseView::renderTemplate('Admin/addCms.html',['action'=>'Add','error'=>$this->error]);            
            }
            
        }
        else {
            BaseView::renderTemplate('Admin/addCms.html',['action'=>'Add']);        
        }
    } 
    public function editAction() {
        $editdata = BaseQuery::selectData('cms_pages','*','cms_id='.$this->params['id']);
        if(isset($_POST['addCms'])) {
            $_POST['url'] = $this->generateUrl($_POST['url']);
          
            if($this->validate($_POST)) {
                $cmsId = BaseQuery::selectData('cms_pages','cms_id',"Url_key = '".$_POST['url']."' and cms_id!=".$this->params['id']);
                if(empty($cmsId)) {
                    
                    $id = cmsModel::updateConverter($_POST, $this->params['id']);
                    header("Location:".config::URL."Admin/Cms/");
                }
                else {
                    echo "<script>alert('URL Exists'); </script>";
                    BaseView::renderTemplate('Admin/addCms.html',['action'=>'Update','editdata'=>$editdata[0]]);
                }
            }
            else {
                
                BaseView::renderTemplate('Admin/addCms.html',['action'=>'Update','error'=>$this->error,'editdata'=>$editdata[0]]);            
            }
            
        }
        else {
            BaseView::renderTemplate('Admin/addCms.html',['action'=>'Update','editdata'=>$editdata[0]]);        
        }
    } 
    public function deleteAction() {
        BaseQuery::deleteData('cms_pages','cms_id='.$this->params['id']);
        header('Location:'.config::URL.'Admin/Cms');
    }
    protected function validate($fields) {
        $error = [];
        
        foreach ($fields as $key => $value) {
            switch ($key) {
                case 'page_title':
                case 'url':
                case 'content':
                    if(empty($value)) {
                        $error[$key] = "*Invalid Input";
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