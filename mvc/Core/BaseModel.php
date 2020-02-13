<?php
    namespace Core;
    use PDO;
    use App\config;
    abstract class BaseModel {
       protected static function getDatabase() {
           static $db = null;
           if($db === null) {
            //    $host = 'localhost';
            //    $dbname = 'student_teacher';
            //    $username = 'root';
            //    $password = "";
                
                    // $db = mysqli_connect($host, $username, $password, $dbname);
                    $db = new PDO("mysql:host=" . config::DB_HOST . ";dbname=" . config::DB_NAME, config::DB_USER, config::DB_PASSWORD);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           }  
           return $db;
       }
        
    }

?>