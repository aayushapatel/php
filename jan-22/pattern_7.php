<?php
echo "Enter number of rows for pattern";
include 'design.html';
include 'validate.php';

function findNumber($number) {
    $starNumber = 1;
    for ($i = 1; $i <= $number ; $i++) { 
        for ($j = 1; $j <= $starNumber; $j++) { 
           echo "*" ;
        }
        for ($k = 1; $k <= $i ; $k++) { 
            echo "0";
        }
        $starNumber += $i + 1;
        echo "<br>";
    }
        
        
    }

    
?>
