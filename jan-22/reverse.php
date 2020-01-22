<?php
echo "Enter a number to reverse it";
include 'design.html';
include 'validate.php';

function findNumber($number) {
   $initialNumber = $number;
   $finalNumber = "";
   for ($i = 1; $i <= strlen($initialNumber) ; $i++) { 
       $last = $number % 10;
       $finalNumber .= $last;
       $number /= 10;
   }
   echo "Reverse of " . $initialNumber . " is : " . $finalNumber;

    
}
?>