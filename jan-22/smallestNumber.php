<?php
echo "Enter array in textbox with ' ' between two elements : ";
include 'design.html';
include 'validateArray.php';
function findNumber($arrayNumber) {
    $smallestNumber = $arrayNumber[0];
    for ($i=0; $i < count($arrayNumber) ; $i++) {
        if ($arrayNumber[$i] < $smallestNumber) {
            $smallestNumber = $arrayNumber[$i];
        } 
    }
    echo "Smallest Number is : " . $smallestNumber;
}
    
?>
