<?php
namespace App\Controllers;

use App\Models\BaseQuery;
use Core\BaseView;

class Home extends \Core\BaseController {
    public static function indexAction() {
        self::view('index');
    }
    public static function view($file, $parameters='') {
        $category = BaseQuery::join("SELECT
        cc.category_name AS parent_category,
        GROUP_CONCAT(c.category_name) AS child_category
    FROM
        category c
    JOIN category cc ON
        c.parent_category = cc.category_id
    WHERE c.status = 'On' and cc.status = 'On'
    GROUP BY
        cc.category_name
    ORDER BY
        cc.category_name");
        $cms = BaseQuery::selectData('cms_pages','page_title,Url_key',"status='On'");
        BaseView::renderTemplate('User/'.$file.'.html',['category'=>$category,'cms'=>$cms,"content" => $parameters]);
    }
    protected function before() {

    }
}
?>