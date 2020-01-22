<?php
echo "Enter array in textbox with ' ' between two elements : ";
include 'design.html';
include 'validateArray.php';
function findNumber($arrayNumber) {
    $biggestNumber = $arrayNumber[0];
    for ($i=0; $i < count($arrayNumber) ; $i++) {
        if ($arrayNumber[$i] > $biggestNumber) {
            $biggestNumber = $arrayNumber[$i];
        } 
    }
    echo "Biggest Number is : " . $biggestNumber;
}
    
?>
