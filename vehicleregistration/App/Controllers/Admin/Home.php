<?php
namespace App\Controllers\Admin;

use App\config;
use App\Models\BaseQuery;
use Core\BaseView;
use App\Models\User\serviceModel;
session_start();
class Home extends \Core\BaseController{
    public static function indexAction() {
        $service = BaseQuery::selectData('service_registrations','*');
        $service = BaseQuery::join('SELECT s.serviceId, u.userId, u.firstName, u.lastName, s.title, s.vehicleNumber, s.licenseNumber, s.date, s.timeSlot,s.vehicleIssue,s.serviceCenter, s.status, s.createdDate FROM `service_registrations` s
        LEFT JOIN users u ON s.userId = u.userId');
        BaseView::renderTemplate('Admin/dashboard.html',['content'=>$service]);
    }
    public function editAction() {
        $data = BaseQuery::selectData('service_registrations','*','serviceId='.$this->params['id']);
        if(isset($_POST['addService'])) {
            if($this->validate($_POST)) {
                $id = serviceModel::updateConverter($_POST,$this->params['id'],true);
                $service = BaseQuery::selectData('service_registrations','*');
                BaseView::renderTemplate('Admin/dashboard.html',['content'=>$service]);

            }
            else {
                BaseView::renderTemplate('User/addService.html',['error'=>$this->error,'action'=>'Update','data'=>$data[0]]);
            }
        }
        else {
            
            BaseView::renderTemplate('User/addService.html',['action'=>'Update','data'=>$data[0]]);
        }
    }
    protected function validate($fields) {
        $error = [];
        $result = BaseQuery::selectData('service_registrations','serviceId',"(vehicleNumber ='".$fields['vehicleNumber']."' or licenseNumber ='".$fields['licenseNumber']."') and serviceId != ".$this->params['id']." and status='pending'");
        foreach ($fields as $key => $value) {
            switch ($key) {
                case 'title':
                    if((!preg_match('/^[a-zA-Z]*$/',$value)) || empty($value)) {
                        $error[$key] = "*Invalid Input";
                    }    
                break;
                case 'vehicleNumber':
                case 'licenseNumber':
                    if(!empty($result)) {
                        $error[$key] = "*Already Registered";
                    }
                    if((!preg_match('/^[a-zA-Z0-9 ]/',$value))  || empty($value))  {
                        $error[$key] = "*Invalid Input";
                    }    
                break;
                case 'date' :
                    if (date('Y-m-d') > $value) {    
                        $error[$key] = "*Invalid Date";
                    }
                    break;
                case 'vehicleIssue':
                    if((!preg_match('/^[a-zA-Z0-9 .-]/',$value))  || empty($value))  {
                        $error[$key] = "*Invalid Input";
                    } 
                break;

                
            }
        }
        $this->error = $error;
        return (empty($error))?true:false;
    }
    public function delete() {
        BaseQuery::deleteData('service_registrations','serviceId='.$_POST['id']);
        //header('Location:'.config::URL.'admin/Home/index');
    }
    public function updateStatus() {
        $id = explode("-",$_POST['id']);
        $status = ($id[1]=='pending')?'approved':'pending';
        BaseQuery::updateData('service_registrations',"status='".$status."'",'serviceId='.$id[0]);

    }
    
    protected function before() {

    }
}
?>