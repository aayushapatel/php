<?php
echo "Enter a number to find whether it is a prime or not";
include 'design.html';
include 'validate.php';

function findNumber($number) {
    $flag = 0;
    for ($i = 2; $i <= $number / 2 ; $i++) { 
        if($number % $i == 0) {
            $flag = 1;
        break;
        }
    }
    if ($flag == 0) {
        if($number == 0) {
            echo "0 is neither prime nor composite number";
        }
        else {
            echo $number . " is not a prime number";
        }
    }
    else {
        echo $number . " is a prime number";
    }
    
}
?>