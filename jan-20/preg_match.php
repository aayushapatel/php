<?php
    $subStr='This a String';
    if (preg_match('/is/',$subStr)) {
        echo "substring exist";
    }
    else {
        echo "substring does not exist";
    }
?>