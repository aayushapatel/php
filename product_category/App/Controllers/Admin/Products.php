<?php
namespace App\Controllers\Admin;

use Core\BaseView;

class Products extends \Core\BaseController {
    public function indexAction() {
        BaseView::renderTemplate('Admin/products.html');
    }
    public function addAction() {
        echo "product";
    }   
}
?>