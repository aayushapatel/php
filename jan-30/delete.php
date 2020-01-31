<?php
    require 'databaseCon.php';
    $where = "`customer_id`=".$_GET['id'];
    deleteData('customers', $where);
    echo "Deleted Sucessfully";
    header("Location: grid.php");
?>