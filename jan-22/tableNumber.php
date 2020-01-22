<?php
echo "Enter x for table";
include 'design.html';
include 'validate.php';
function findNumber($number) {
    echo "<table border=1>";
    for ($i = 1; $i <= $number ; $i++) { 
        echo "<tr>";
        for ($j = 1; $j <= $number ; $j++) { 
            echo "<td>" . $i*$j . "</td>";
            
        }
        echo "</tr>";
        
    }
    echo "</table>";
    
    
    
}
?>
