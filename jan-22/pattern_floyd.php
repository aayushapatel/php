<?php
echo "Enter number of rows for pattern";
include 'design.html';
include 'validate.php';

function findNumber($number) {
    $value = 1;
   for ($i=0; $i < $number  ; $i++) { 
       for ($j=0; $j <= $i  ; $j++) { 
            echo $value;
            $value++;
       }
      echo "<br>" ;
   }
}

    
?>
