<?php
    namespace App\Controllers;
    use \Core\BaseView;
    class Posts extends \Core\BaseController {
        public function index() {
            BaseView::renderTemplate('Home/index.html',['name'=>'aayusha']);

        }
        public function addNew() {
            BaseView::renderTemplate('Home/index.html',['name'=>'aayusha']);
        }
        public function edit() {
            BaseView::renderTemplate('Home/index.html',['name'=>'aayusha']);

        }
    }
?>