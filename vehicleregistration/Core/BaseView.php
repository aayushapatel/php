<?php
namespace Core;

    class BaseView {
        public static function render($view, $args = []) {
            print_r($args);
            $args = extract($args);
            print_r($as);
            $file = "../App/Views/$view";
            if(is_readable($file)) {
                require $file;
            }
            else {
                echo "$file not found";
            }
        }
        public static function renderTemplate($template, $args = []) {
            static $twig = null;
            if($twig == null) {
                $loader = new \Twig\Loader\FilesystemLoader('../App/Views/');
                $twig = new \Twig\Environment($loader);
            }
           echo $twig->render($template,$args);
        }
    }
?>