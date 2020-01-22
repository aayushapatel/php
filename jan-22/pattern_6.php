<?php
echo "Enter number of rows and columns respectively for pattern";
include 'designTwoInput.php';

function findNumber($numberOne,$numberTwo) {
    for ($i = 1; $i <= $numberOne ; $i++) { 
        for ($j = 1; $j <= $numberTwo ; $j++) {
            if($i == 1 || $i == $numberOne || $j == 1 || $j == $numberTwo) {
                echo "*";
            }
            else {
                echo "&nbsp;&nbsp;";
            }
           
        }
        echo "<br>";
        
    }
}
    
?>
