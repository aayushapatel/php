<?php
echo "Enter a number to find factorial of it";
include 'design.html';
include 'validate.php';

function findNumber($number) {
    $numberArray[0] = 0;
    $numberArray[1] = 1;
    echo $numberArray[0] . "," .$numberArray[1];
    for ($i = 2; $i < $number ; $i++) { 
        $numberArray[$i] = $numberArray[$i -1] + $numberArray[$i - 2];
        echo "," . $numberArray[$i];
    }
    
}
?>