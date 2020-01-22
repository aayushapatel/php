<?php
echo "Enter number of rows and columns respectively for pattern";
include 'designTwoInput.php';

function findNumber($numberOne,$numberTwo) {
    for ($i = 1; $i <= $numberOne ; $i++) { 
        for ($j = 1, $value = $i; $j <= $numberTwo ; $j++) { 
            echo $value . "  ";
            $value += $numberOne ;
        }
        echo "<br>";
        
    }
}
    
?>
