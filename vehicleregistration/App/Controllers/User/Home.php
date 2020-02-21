<?php
namespace App\Controllers\User;
use App\config;
use App\Models\BaseQuery;
use Core\BaseView;
use App\Models\User\registerModel;
session_start();
class Home extends \Core\BaseController {
    public function indexAction() {
        if(isset($_POST['signIn'])) {
            $data = $this->checkLogin($_POST);
            if(is_numeric($data)) {
                echo "<script>alert('Login Success'); </script>";
                $_SESSION['userId'] = $data;
                header("Location:".config::URL."User/Dashboard");
            }
            else {
                BaseView::renderTemplate('User/login.html',['error'=>$data]);
            }
        }
        else {
            BaseView::renderTemplate('User/login.html');
        }
    }
    
    protected function checkLogin($fields) {
        $error = [];
        $authenticateData = BaseQuery::selectData('users', 'userId,password', "email='".$fields['email']."'");
        
        if(!empty($authenticateData)) {
            echo md5($fields['password']);
            if($authenticateData[0]['password'] !== md5($fields['password'])) {
                $error['password'] = "Invalid Password";
            }
            else {
                return $authenticateData[0]['userId'];
            }
        }
        else {
            $error['email'] = "Invalid email";
        }
        
        return ($error);
    }
    
    public function registrationAction() {
            if(isset($_POST['signUp'])) {
                if($this->validate($_POST)) {
                    $userId = BaseQuery::selectData('users','userId',"email = '".$_POST['email']."'");
                    if(empty($userId)) {
                        $id = registerModel::converter($_POST);
                        header("Location:".config::URL."User/Home/index");
                    }
                    else {
                        echo "<script>alert('Email already exist'); </script>";
                        BaseView::renderTemplate('User/registration.html');
                    }
                }
                else {
                    BaseView::renderTemplate('User/registration.html',['error'=>$this->error]);
                }
            }
            else {
                
                BaseView::renderTemplate('User/registration.html');
            }
        }
        protected function validate($fields) {
            $error = [];
            foreach ($fields as $key => $value) {
                switch ($key) {
                    case 'firstName':
                    case 'lastName':
                    case 'country':
                    case 'city':
                    case 'state':
                        if((!preg_match('/^[a-zA-Z]*$/',$value)) || empty($value)) {
                            $error[$key] = "*Invalid Input";
                        }    
                    break;
                    
                    case 'password':
                    case 'street':
                    
                        if(!preg_match('/^[a-zA-Z0-9_@$&]/',$value)) {
                            $error[$key] = "*Invalid Input";
                        }    
                    break;
                    case 'phoneNumber' :
                        if ((!preg_match('/^[0-9]{10}+$/',$value)  || empty($value))) {    
                            $error[$key] = "*Invalid Mobile Number";
                        }
                        break;
                    case 'zipCode':
                        if (!preg_match('/^[0-9]{6}+$/',$value)) {    
                            $error[$key] = "*Invalid Zip Code";
                        }
                        break;

                    case 'email':
                        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {    
                            $error[$key] = "*Invalid Email";
                        }
                    break;
                    case 'confirm_password':
                        if($fields['password'] != $value) {
                            $error[$key] = "*Password does not match";
                        }
                    break;
                    
                }
            }
            $this->error = $error;
            return (empty($error))?true:false;
        }
    public function logout() {
        session_destroy();
        header("Location:".config::URL."User/Home");
    }
    
    protected function before() {

    }
}
?>