<?php
echo "Enter a number to find Whether it is a armstrong number or not";
include 'design.html';
include 'validate.php';

function findNumber($number) {
   $initialNumber=$number;
   $finalNumber = 0;

   for ($i = 1; $i <=strlen($initialNumber) ; $i++) { 
        $last = $number % 10;
        $finalNumber += pow($last,3);
        $number /= 10;
   }
   if($finalNumber == $initialNumber) {
       echo $initialNumber . " is a Armstrong number";
   }
   else {
    echo $initialNumber . " is not a Armstrong number";
   }

    
}
?>