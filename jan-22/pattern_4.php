<?php
echo "Enter number of rows for pattern";
include 'design.html';
include 'validate.php';

function findNumber($number) {
    for ($i = 1; $i <= $number ; $i++) { 
        for ($j = 1 ; $j <= $i; $j++) { 
            echo $j;
        }
        echo "<br>";
    }
        
    }

    
?>
