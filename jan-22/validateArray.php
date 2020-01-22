<?php
if (isset($_POST['numberButton']))
{
    $number=$_POST['number'];
    $arrayNumber = explode(" ",trim($number));
    $cnt = 0;
    for ($i=0; $i < count($arrayNumber) ; $i++) { 
        if (is_numeric($arrayNumber[$i])) {
           $cnt = 1;
        }  
        else {
            echo 'Invalid Array';
            exit;
        }    
    }
    if($cnt == 1) {
        findNumber($arrayNumber);
    }
    

}
?>