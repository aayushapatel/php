<?php
namespace App\Controllers\User;

use App\Models\BaseQuery;
use Core\BaseView;

class View extends \App\Controllers\Home{
    public function viewProduct() {
        
        $url = $this->params['url'];
        $product = BaseQuery::join("SELECT
        p.* from category c
        LEFT JOIN products_categories r ON c.category_id=r.category_id
        LEFT JOIN products p ON r.product_id=p.product_id  where category_name = '$url'");
        self::view('categoryView',$product);

    }
    public function viewCms() {
        
        $url = $this->params['url'];
        $content = BaseQuery::selectData('cms_pages','content',"Url_key='$url'");
        print_r($content);
        $key = 'content';
        echo $value = $content[0]['content'];
        self::view('cmsView',$value);

    }
    protected function before() {

    }
}
?>