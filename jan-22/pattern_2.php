<?php
echo "Enter number of rows for pattern";
include 'design.html';
include 'validate.php';

function findNumber($number) {
    for ($i = $number; $i > 0 ; $i--) { 
        for ($j = 1 ; $j <= $i; $j++) { 
            echo $j;
        }
        echo "<br>";
    }
        
    }

    
?>
