<?php
    $string = 'aayusha patel';
    for ($i=0; $i < strlen($string); $i++) { 
        echo $string[$i] . strtoupper($string[$i]) . "<br>";
    }
    $find = 'sha';
    echo strpos($string, $find);
    echo substr_replace($string , 'PATEL', 8);
?>