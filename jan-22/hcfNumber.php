<?php
echo "Enter two number for findin HCF";
include 'designTwoInput.php';
function findNumber($numberOne, $numberTwo) {
    $numberOneFactor = $numberTwoFactor  = array();
    $hcfAnswer = 1;
    if($numberOne > $numberTwo):
        $len = $numberOne;  
    else :
        $len = $numberTwo;
    endif;

    for ($i = 1; $i <= $len; $i++) { 
        if($numberOne % $i == 0) {
            array_push($numberOneFactor, $i);
        }
        if($numberTwo % $i == 0) {
            array_push($numberTwoFactor, $i);
        }
    }
    for ($i = 0; $i < count($numberOneFactor); $i++) { 
        for ($j=0; $j < count($numberTwoFactor); $j++) { 
            if($numberOneFactor[$i] == $numberTwoFactor[$j]) {
                $hcfAnswer *= $numberTwoFactor[$j];
            }
        }
    }
    echo "HCF of " . $numberOne . " & " . $numberTwo . " : " . $hcfAnswer;
    
    
}
?>
