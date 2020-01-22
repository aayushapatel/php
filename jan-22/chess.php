<?php
echo "Enter number of rows for chess";
include 'design.html';
include 'validate.php';

function findNumber($number) {
    $white = "<td style='background-color: white; width : 20px; height : 20px; display : block;'></div>";
    $black = "<td style='background-color: black; width : 20px; height : 20px;'></div>";
    echo "<table>";
    for ($i = 1; $i <= $number ; $i++) { 
        echo "<tr>";
        for ($j = 1 ; $j <= $number; $j++) { 
            if($i % 2 == 0 ) {
                if($j % 2 == 0) {
                    echo $white;
                }
                else {
                    echo $black;
                }
            }
            else {
                if($j % 2 == 0)
                    echo $black;
                else {
                    echo $white;
                }
            }
        }
        echo "</tr>";
    }
       echo "</table>" ;
    }

    
?>
