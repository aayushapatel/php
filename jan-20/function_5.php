<?php
function addition($number1,$number2) {
    return $number1 + $number2;
}
function subtraction($number1,$number2) {
    return $number1 - $number2;
}
function multiplication($number1,$number2) {
    return $number1 * $number2;
}
function division($number1,$number2) {
    return $number1 / $number2;
}
$answer = subtraction(multiplication(3, addition(4, 5)),(division(6,2)));
echo $answer;
?>