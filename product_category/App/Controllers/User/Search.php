<?php
namespace App\Controllers\User;
use Core\BaseView;
use App\Models\BaseQuery;

class Search extends \App\Controllers\Home {
        public function searchProduct() {
            $searchKey = $this->params['url'];
            $result = BaseQuery::selectData('products','product_id,product_name,image,Url_key',"product_name LIKE '%$searchKey%' or short_description LIKE '%$searchKey%' or description LIKE '%$searchKey%'");
            if(empty($result)) {
                $result = BaseQuery::join("SELECT
                p.product_id,p.product_name,p.image,p.Url_key from category c
                LEFT JOIN products_categories r ON c.category_id=r.category_id
                LEFT JOIN product_categories rr ON c.parent_category=rr.category_id
                LEFT JOIN products p ON r.product_id=p.product_id  where c.category_name LIKE '%$searchKey%'");
            }
            if(empty($result)) {

            }
            print_r($result);
            self::view('categoryView',$result);
        }
    }
?>