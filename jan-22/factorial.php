<?php
echo "Enter a number to find factorial of it";
include 'design.html';
include 'validate.php';

function findNumber($number) {
    $factorial = 1;
    for ($i=$number; $i > 0 ; $i--) { 
        $factorial *= $i;
    }
    echo "Factorial of " . $number . " is : " . $factorial;
}
?>