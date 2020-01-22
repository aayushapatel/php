<?php
if (isset($_POST['numberButton'])) {
    $number = $_POST['number'];
    if(is_numeric($number)) {
        
        findNumber($number);
    }
    else {
        echo "Invalid number";
    }
}
?>