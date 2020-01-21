<?php
$johnMarks = -55;
if(0 <= $johnMarks && $johnMarks <= 100)
{
    echo "Marks is in range 0 to 100";
}
else if (0 <= $johnMarks || $johnMarks <= 100)
{
    echo "Marks can be either greater than 0 or less than 100 or both";
}
?>