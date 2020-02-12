<?php
    namespace core;
    class Router {
        protected $routes = []; //associative array
        protected $params =[]; //save the parameters from saved routes
        public function __construct() {
            $this->add('', ['controller' => 'Home', 'action' => 'index']);
            $this->add('posts', ['controller' => 'Posts', 'action' => 'index']);
           $this->add('admin/{controller}/{action}',['namespace' => 'Admin']);
           $this->add('{controller}/{action}');
           $this->add('{controller}/{id:\d+}/{action}');
           $this->dispatch($_SERVER['QUERY_STRING']); 
        }
        public function add($route, $params = []) {
             // $route is a string and $params is a array list of parameters
            $route = preg_replace('/\//','\\/',$route);
            $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)',$route);
            $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
            $route = '/^' . $route . '$/i';
             
            $this->routes[$route] = $params;
        }
        public function getRoutes()  {
            return $this->routes;
        }

        public function match($url) {
            $url = $this->removeQueryString($url);
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

        public function dispatch($url) {
            if($this->match($url)) {

                $controller = $this->params['controller'];
                $controller = $this->convertToStudlyCaps($controller);
                //$controller = "App\Controllers\\$controller";
                $controller = $this->getNameSpace().$controller;
                if(class_exists($controller)) {
                    $controller_object = new $controller($this->params);
                    $action = $this->params['action'];
                    $action = $this->convertToCamelCaps($action);

                    if(is_callable([$controller_object, $action])) {
                        $controller_object->$action();
                    }
                    else {
                        echo "Method $action not found";
                    }
                }
                else {
                    echo "Controller class $controller not found";
                }
            }
            else {
                echo "no route matched";
            }

        }

        protected function convertToStudlyCaps($string) {
            return str_replace(' ','',ucwords(str_replace('-',' ',$string)));
        }
        protected function convertToCamelCaps($string) {
            return lcfirst($this->convertToStudlyCaps($string));
        }
        public function removeQueryString($url) {
            if($url != '') {
                $parts = explode("&", $url, 2);
                if(!strpos($parts[0], "=")) {
                    $url = $parts[0];
                }
                else {
                    $url = '';
                }
            }
            return $url;
        }

        protected function getNameSpace() {
            $namespace = 'App\Controllers\\';
            if(array_key_exists('namespace', $this->params)) {
                $namespace .= $this->params['namespace'] . '\\';
            }
            return $namespace;
        }
     }
    

    
?>