<?php
namespace App\Controllers\User;
ini_set('session.gc_maxlifetime', 200000);
session_start();
    class Cart extends \Core\BaseController {
        public static function indexAction() {
            $product = [($_POST)];
            if(isset($_SESSION['product'][$product[0]['name']])) {
               // $_SESSION['product'][$product[0]['name']]['quantity'] = "bb";
                $_SESSION['product'][$product[0]['name']]['quantity'] = $_SESSION['product'][$product[0]['name']]['quantity']+1;
            }
            else {
                $_SESSION['product'][$product[0]['name']] = $product[0];
            }
        }
        public static function getAction() {
            $product = $_SESSION['product'];
            echo json_encode($product);
        }
        public static function removeAction() {
             $product = ($_POST);
            $product = substr($product['productName'], strpos($product['productName'],"-")+1);
           unset($_SESSION['product'][$product]);
        }
        protected function before(){

        }
    }
?>