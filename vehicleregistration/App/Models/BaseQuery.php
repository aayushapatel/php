<?php
    namespace App\Models;
    use PDO;
    class BaseQuery extends \Core\BaseModel {
        public static function selectData($tableName, $fields, $where = 1) {
            $db = static::getDatabase();
            echo $query = "SELECT $fields FROM $tableName WHERE $where";
            $data = $db->query($query);
            return $data->fetchAll(PDO::FETCH_ASSOC);
        }
        public static function insertData($tableName, $fields, $values) {
            $db = static::getDatabase();
            echo $query ="INSERT INTO $tableName ($fields) VALUES ($values)";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $db->lastInsertId();
        }
        public static function updateData($tableName, $fieldName, $where) {
            $query = "UPDATE `$tableName` SET $fieldName WHERE $where";
            $db = static::getDatabase();
            $stmt = $db->prepare($query);
            $stmt->execute();

            
        } 
        public static function  deleteData($tableName, $where) {
            $query = "DELETE FROM `$tableName` WHERE $where";
            $db = static::getDatabase();
            $stmt = $db->prepare($query);
            $stmt->execute();

          
        }
        public static function  join($query) {
            $db = static::getDatabase();
            $stmt = $db->prepare($query);
            $data = $db->query($query);
            return $data->fetchAll(PDO::FETCH_ASSOC);

          
        }
    }
?>