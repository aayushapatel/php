<?php
echo "Enter two number for swapping";
include 'designTwoInput.php';
function findNumber($numberOne, $numberTwo) {
$numberOne = $numberOne + $numberTwo;
$numberTwo = $numberOne - $numberTwo;
$numberOne = $numberOne - $numberTwo;
echo "First Number is : " . $numberOne;
echo "<br>Second Number is : " . $numberTwo;
}
?>
