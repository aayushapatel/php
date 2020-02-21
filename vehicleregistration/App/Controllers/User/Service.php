<?php
namespace App\Controllers\User;
use Core\BaseView;
use App\Models\User\serviceModel;
use App\Models\BaseQuery;
use App\config;
class Service extends \Core\BaseController {
    public function indexAction() {
        if(isset($_POST['addService'])) {
            if($this->validate($_POST)) {
                
                    $id = serviceModel::insertConverter($_POST);
                    header("Location:".config::URL."User/Dashboard/index");
            }
            else {
                BaseView::renderTemplate('User/addService.html',['error'=>$this->error,'action'=>'Add']);
            }
        }
        else {
            
            BaseView::renderTemplate('User/addService.html',['action'=>'Add']);
        }
    }
    protected function validate($fields) {
        $error = [];
        $result = BaseQuery::selectData('service_registrations','serviceId',"(vehicleNumber ='".$fields['vehicleNumber']."' or licenseNumber ='".$fields['licenseNumber']."') and userId != ".$_SESSION['userId']." and status='pending'");
        $date = BaseQuery::selectData('service_registrations','serviceId',"date='".$fields['date']."' and timeSlot='".$fields['timeSlot']."'");
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
                case 'timeSlot':
                    if(count($date) > 2) {
                        $error[$key] = "*Already Booked";
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

}
?>