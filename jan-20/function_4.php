<?php
function positiveOrNot($number)
{
    if($number >= 0)
        return true;
    else {
        return false;
    }
}
$number = -2;
if(positiveOrNot($number)) {
    echo "It is a postive number";
}
else {
    echo "It is a negative number";
}
?>