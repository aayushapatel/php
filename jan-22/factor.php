<?php
echo "Enter number to find factors of it";
include 'design.html';
include 'validate.php';

function findNumber($number) {
    $factor=array();
        for ($i = 1; $i <= $number; $i++) { 
            if($number % $i == 0) {
                array_push($factor, $i);
            }
        }
        echo "Factors of " . $number . " : " . implode(", ",$factor);
        
    }

    
?>
