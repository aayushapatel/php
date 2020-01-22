<?php
echo "Enter x and y for a table (x*y)";
include 'designTwoInput.php';
function findNumber($numberOne, $numberTwo) {
    echo "<table border=1>";
    for ($i = 1; $i <= $numberOne ; $i++) { 
        echo "<tr>";
        for ($j = 1; $j <= $numberTwo ; $j++) { 
            echo "<td>" . $i . "*" . $j . "=" . $i*$j . "</td>";
            
        }
        echo "</tr>";
        
    }
    echo "</table>";
    
    
    
}
?>
