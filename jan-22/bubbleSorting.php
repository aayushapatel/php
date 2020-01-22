<?php
echo "Enter array in textbox with ' ' between two elements : ";
include 'design.html';
include 'validateArray.php';
function findNumber($arrayNumber) {
    $cnt = count($arrayNumber);
    for ($i = 0 ; $i < $cnt ; $i++) {
        echo "<br>";
        for ($j = 0; $j < $cnt-$i-1 ; $j++) { 
        
            if($arrayNumber[$j] > $arrayNumber[$j+1] ) {
                $tempNumber = $arrayNumber[$j];
                $arrayNumber[$j] = $arrayNumber[$j+1];
                $arrayNumber[$j+1] = $tempNumber;
            }
            print_r($arrayNumber);
            echo "<br>";
        }

        
    }
    echo "Array after Bubble Sort : ";
    for ($i = 0; $i < $cnt; $i++) { 
        echo $arrayNumber[$i] . "  ";
    } 
}
    

    
?>
