<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'user_portal');
    if(! $conn ) {
       echo "Connected failure<br>";
       die;
    }
    
    function selectData($tableName, $fieldName, $where = "1") {
        $query = "SELECT $fieldName FROM `$tableName` WHERE $where";
        global $conn;
        $result = mysqli_query($conn, $query) or die;
        return $result;
    }
    function insertData($tableName, $fieldName, $fields) {
        $query = "INSERT INTO `$tableName` ($fieldName) VALUES('', $fields)";
        global $conn;
        $result = mysqli_query($conn, $query) or die;
        return mysqli_insert_id($conn);

    }
    function updateData($tableName, $fieldName, $where) {
        $query = "UPDATE `$tableName` SET $fieldName WHERE $where";
        global $conn;
        $result = mysqli_query($conn, $query) or die;
        return $result;
    }
    function deleteData($tableName, $where) {
        $query = "DELETE FROM `$tableName` WHERE $where";
        global $conn;
        $result = mysqli_query($conn, $query) or die;
        return $result;
    }

?>