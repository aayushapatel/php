<?php
    require 'databaseCon.php';
    deleteData('blog_post',"blogPost_id='".$_GET['id']."'");
    header('Location:blogPost.php');
?>