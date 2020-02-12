<?php
    namespace Core;
    abstract class BaseModel {
       protected static function getDatabase() {
           static $db = null;
           if($db === null) {
               $host = 'localhost';
               $dbname = 'student_teacher';
               $username = 'root';
               $password = "";
                try {
                    $db = mysqli_connect($host, $username, $password, $dbname);
                    //$db = new PDO("mysql:host=$host;dbname=$dbname", )
                }
                catch(Exception $e) {
                    echo $e->getMessage();
                }
           }
           return $db;
       }
        
    }

?>