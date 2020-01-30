<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'customer_portal');
    if(! $conn ) {
       echo "Connected failure<br>";
       die;
    }
    
    function selectData($tableName, $fieldName, $where) {
        $query = "SELECT $fieldName FROM `$tableName` WHERE $where";
        global $conn;
        $result = mysqli_query($conn, $query) or die;
        return $result;
    }
    function insertData($tableName, $fields) {
        $query = "INSERT INTO `$tableName` VALUES('', $fields)";
        global $conn;
        $result = mysqli_query($conn, $query) or die;
        return mysqli_insert_id($conn);

    }

?>