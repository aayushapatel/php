<?php
    require_once dirname(__DIR__) . '\vendor\autoload.php';
    
    spl_autoload_register(function ($className) {
        $root = str_replace('\\', '/', dirname(__DIR__));
        $file = $root . '/' . str_replace('\\', '/', $className) . '.php';
        
        if(is_readable($file)) {
           require $file;
        }
    });
    $router = new Core\Router();

?>    