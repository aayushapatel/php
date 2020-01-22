<?php
echo "Enter a number to find table of it";
include 'design.html';
include 'validate.php';

function findNumber($tablenumber) {
    echo " Table of " . $tablenumber;
   for ($i=0; $i <= 10 ; $i++) { 
       echo "<br>" . $tablenumber . "*" . $i . "=" . $tablenumber*$i;
   }
}
?>