<?php
    if(@mysqli_connect("localhost","roots","","") OR die('Database not connected'))
    {
        echo "Database connected";
    }
?>