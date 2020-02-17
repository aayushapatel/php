<?php
    namespace App\Controllers\Admin;
use App\Models\Admin\register;
use App\Models\BaseQuery;
use Core\BaseView;
use App\config;
session_start();
class Login extends \Core\BaseController{
    
        public function indexAction() {
           
            if(isset($_POST['signIn'])) {
                $data = $this->checkLogin($_POST);
                if(is_numeric($data)) {
                    echo "<script>alert('Login Success'); </script>";
                    $_SESSION['userId'] = $data;
                    header("Location:".config::URL."Admin/Dashboard");
                }
                else {
                    BaseView::renderTemplate('Admin/login.html',['error'=>$data]);
                }
                
                
            }
            else {
                BaseView::renderTemplate('Admin/login.html');
            }
        }
        
        protected function checkLogin($fields) {
            $error = [];
            $authenticateData = BaseQuery::selectData('user', 'user_id,password', "email='".$fields['email']."'");
            
            if(!empty($authenticateData)) {
                if($authenticateData[0]['password'] !== md5($fields['password'])) {
                    $error['password'] = "Invalid Password";
                }
                else {
                    return $authenticateData[0]['user_id'];
                }
            }
            else {
                $error['email'] = "Invalid email";
            }
            
            return ($error);
        }
        public function registrationAction() {
            $data = BaseQuery::selectData('prefix','prefix_name');
            if(isset($_POST['signUp'])) {
                if($this->validate($_POST)) {
                    $userId = BaseQuery::selectData('user','user_id',"email = '".$_POST['email']."'");
                    if(empty($userId)) {
                        $id = register::converter($_POST);
                        $_SESSION['userId'] = $id;
                        header("Location:".config::URL."Admin/Dashboard");
                    }
                    else {
                        echo "<script>alert('Email already exist'); </script>";
                        BaseView::renderTemplate('Admin/registration.html',['prefix'=>$data]);
                    }
                }
                else {
                    BaseView::renderTemplate('Admin/registration.html',['error'=>$this->error,'prefix'=>$data]);
                }
                
            }
            else {
                
                
                BaseView::renderTemplate('Admin/registration.html',['prefix'=>$data]);
            }
        }
        protected function validate($fields) {
            $error = [];
            foreach ($fields as $key => $value) {
                switch ($key) {
                    case 'firstname':
                    case 'lastname':
                        if(!preg_match('/^[a-zA-Z]*$/',$value)) {
                            $error[$key] = "*Invalid Name";
                        }    
                    break;
                    case 'information':
                    case 'password':
                        if(!preg_match('/^[a-zA-Z0-9_@$&]/',$value)) {
                            $error[$key] = "*Invalid Input";
                        }    
                    break;
                    case 'mobilenumber' :
                        if (!preg_match('/^[0-9]{10}+$/',$value)) {    
                            $error[$key] = "*Invalid Mobile Number";
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
                    default:
                        # code...
                        break;
                }
            }
            if(!isset($fields['terms'])) {
                $error['terms'] = "*Check this field";
            }
            $this->error = $error;
            return (empty($error))?true:false;
        }
      
        public function logout() {
            session_destroy();
            header("Location:".config::URL."Admin/login");
        }
        
        protected function before() {
        }
        protected function after() {
         
        }
    }
?>