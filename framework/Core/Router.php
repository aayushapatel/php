<?php
    class Router {
        protected $routes = []; //associative array
        protected $params =[]; //save the parameters from saved routes
        public function add($route, $params = []) {
             // $route is a string and $params is a array list of parameters
             echo $route;
             echo "<br>";
             echo "<br>".$route = preg_replace('/\//','\\/',$route);

             echo "<br>";
             echo "<br>".$route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)',$route);
             echo "<br>";
             
             echo $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
             echo $route = '/^' . $route . '$/i';
             
            $this->routes[$route] = $params;
        }
        public function getRoutes()  {
            return $this->routes;
        }

        public function match($url) {
            // foreach ($this->routes as $route => $params) {
            //     if($url == $route) {
            //         $this->params = $params;
            //         return true;
            //     }
            // }
            // return false;

            //$reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";
            foreach ($this->routes as $route => $params) {
            
                if(preg_match($route, $url, $matches)) {
                    //$params = [];
                    foreach ($matches as $key => $match) {

                        if(is_string($key)) {
                            $params[$key] = $match;
                        }
                    }
                    $this->params = $params;
                    return true;
                }
            }
            return false;
        }

        public function getParams() {
            return $this->params;
        }
    }
?>