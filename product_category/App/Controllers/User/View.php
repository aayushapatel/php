<?php
namespace App\Controllers\User;

use App\Models\BaseQuery;
use Core\BaseView;

class View extends \App\Controllers\Home{
    public function viewProducts() {
        
        $url = $this->params['url'];
        $product = BaseQuery::join("SELECT
        p.product_id,p.product_name,p.image,p.Url_key from category c
        LEFT JOIN products_categories r ON c.category_id=r.category_id
        LEFT JOIN products p ON r.product_id=p.product_id  where category_name = '$url'");
       
        self::view('categoryView',($product));

    }
    public function viewCms() {
        
        $url = $this->params['url'];
        $content = BaseQuery::selectData('cms_pages','content',"Url_key='$url'");
        $value = $content[0]['content'];
        self::view('cmsView',$value);

    }
    public function viewOneProduct() {
        
        $url = $this->params['url'];
        $product = BaseQuery::join("SELECT p.product_name,p.image,p.description,p.short_description, c.category_name, p.price FROM products p LEFT JOIN products_categories r ON r.product_id=p.product_id
        LEFT JOIN category c ON c.category_id=r.category_id WHERE p.Url_key='$url' ");
        self::view('productView',$product[0]);

    }
    protected function before() {

    }
}
?>