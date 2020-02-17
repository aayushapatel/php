<?php
namespace App\Controllers;

use App\Models\BaseQuery;
use Core\BaseView;

class Home extends \Core\BaseController {
    public static function indexAction($file='index') {
        self::view('index');
    }
    public static function view($file, $parameters='') {
        $category = BaseQuery::selectData('category','category_name','parent_category=0');
        $childCategory = BaseQuery::selectData('category','category_name','parent_category!=0');
        $cms = BaseQuery::selectData('cms_pages','page_title,Url_key');
        BaseView::renderTemplate('User/'.$file.'.html',['category'=>$category,'childCategory'=>$childCategory,'cms'=>$cms,"content" => $parameters]);
    }
    protected function before() {

    }
}
?>