<?php
    require 'databaseCon.php';
    deleteData('category',"category_id='".$_GET['id']."'");
    header('Location:manageCategory.php');
?>