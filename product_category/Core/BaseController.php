<?php
    namespace Core;
    use App\config;
    abstract class BaseController {
        protected $params = [];
        public function __construct($route_params) {
            $this->params = $route_params;
                
        }
        function __call($name, $arguments = []){
            $method = $name . "Action";
            if(method_exists($this, $method)) {
                if($this->before() == null) {
                    call_user_func_array([$this, $method],$arguments);
                    $this->after();
                }
            }
            else {
                
                throw new\Exception("Method $method not found");
                
            }

        }
        protected function before() {
            session_start();
            if(!isset($_SESSION['userId'])) {
                header("Location:".config::URL."Admin/login");
           }
        
        }
        protected function after() {
        }
    }

?>