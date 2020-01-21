<?php
function maxNumber($number1, $number2)
{
    if($number1>$number2) {
        return $number1;
    }
    else {
        return $number2;
    }
}
$number1 = 22;
$number2 = 45;
echo "Maximum number is : " . maxNumber($number1, $number2);
?>