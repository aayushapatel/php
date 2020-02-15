<?php
    namespace App\Controllers\Admin;

use App\config;
use Core\BaseView;
class Dashboard extends \Core\BaseController {
        public static function indexAction() {
            BaseView::renderTemplate('Admin/dashboard.html');

        }
        // protected function before() {
        //        if(!isset($_SESSION['userId'])) {
        //             header("Location:".config::URL."Admin/login");
        //        }
            
        //    }
           protected function after() {
              // echo "(after)";
           }
       
    }
?>