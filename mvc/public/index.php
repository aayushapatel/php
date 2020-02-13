<?php
    
    require '../vendor/autoload.php';
    // spl_autoload_register(function ($className) {
    //     $root = str_replace('\\', '/', dirname(__DIR__));
    //     $file = $root . '/' . str_replace('\\', '/', $className) . '.php';
        
    //     if(is_readable($file)) {
    //        require $file;
    //     }
    // });
    set_error_handler('Core\Error::errorHandler');
    set_exception_handler('Core\Error::exceptionHandler');
    $router = new Core\Router();

?>    