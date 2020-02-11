<?php
    namespace Core;
    abstract class BaseController {
        protected $route_params = [];
        public function __construct($route_params) {
            $this->route_params = $route_params;
            
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
                
                echo "Method $method not found";
                
            }

        }
        protected function before() {
        }
        protected function after() {
        }
    }

?>