<?php
    namespace App\Controllers;
    use \Core\BaseView;
    class Home extends \Core\BaseController {
        public function indexAction() {

            BaseView::renderTemplate('Home/index.html',['name'=>'aayusha']);
        }
        public function getIdAction() {
            BaseView::renderTemplate('Home/index.html',['name'=>'aayusha']);
        }
        protected function before() {
         //   echo "<br>(before)";
         
        }
        protected function after() {
           // echo "(after)";
        }
    }
?>