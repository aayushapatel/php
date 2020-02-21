<?php
namespace App\Controllers\User;

use App\Models\BaseQuery;
use Core\BaseView;

class Dashboard extends \Core\BaseController {
    public static function indexAction() {
        $service = BaseQuery::selectData('service_registrations','*',"userId=".$_SESSION['userId']);
        BaseView::renderTemplate('User/dashboard.html',['content'=>$service]);
    }
}
?>