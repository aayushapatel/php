<?php
namespace App\Controllers\Admin;
use Core\BaseView;
class Users extends \Core\BaseController {
    public function indexAction() {
        BaseView::renderTemplate('home/index.html',
        ['name' => 'Dave',
        'colours' => ['red','green','blue']]);
    }
    
    protected function before() {
      //  echo "<br>(before)";
     
    }
    protected function after() {
       // echo "(after)";
    }
}
?>