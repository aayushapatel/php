<?php
    namespace App\Models;
    class Post extends \Core\BaseModel {
        public function getAll($tableName, $fields, $where = 1) {
            $db = static::getDatabase();
            $query = "SELECT $fields FROM $tableName WHERE $where";
            $data = mysqli_query($db, $query);
            return $data;
        }
        public function insertData($tableName, $fields, $values) {
            $db = static::getDatabase();
            $query ="INSERT INTO $tableName ($fields) VALUES ($values)";
            $data = mysqli_query($db, $query);
         
        }
        public function updateData($tableName, $fieldName, $where) {
            $query = "UPDATE `$tableName` SET $fieldName WHERE $where";
            $db = static::getDatabase();
            $result = mysqli_query($db, $query) or die;
            
        } 
        function deleteData($tableName, $where) {
            $query = "DELETE FROM `$tableName` WHERE $where";
            $db = static::getDatabase();
            $result = mysqli_query($db, $query) or die;
          
        }
    }
?>