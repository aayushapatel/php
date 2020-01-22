<?php
echo "Enter two number for find in LCM";
include 'designTwoInput.php';
function findNumber($numberOne, $numberTwo) {
    $tempNumber1 = $numberOne;
    $tempNumber2 = $numberTwo;
    while ($tempNumber2 != 0) {
        $temp = $tempNumber2;
        $tempNumber2 = $tempNumber1 % $tempNumber2;
        $tempNumber1 = $temp;
    }
    echo "LCM of " . $numberOne . " & " . $numberTwo . " = ".($numberOne * $numberTwo) / $tempNumber1;
    
}
?>
