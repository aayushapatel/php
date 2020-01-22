<?php
echo "Enter a year to find whether it a leap year or not";
include 'design.html';
include 'validate.php';

function findNumber($year) {
    if($year % 100 == 0) {
        if($year % 400 == 0) {
            $status = " is a leap year";
        }
        else {
            $status = " is not a leap year";
        }
    }
    elseif ($year % 4 == 0) {
        $status = " is a leap year";
    }
    else {
        $status = " is not a leap year";
    }
    echo $year,$status;
   

    
}
?>