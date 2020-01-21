<?php
    $maryMarks = 55;
    $johnMarks = 85;
    /*if(1 < $maryMarks > 100)
    {
        echo "marks is in range 0 to 100"; 
    }*/
    if($maryMarks > $johnMarks)
    {
        echo "Mary scores high";
    }
    else if($maryMarks < $johnMarks)
    {
        echo "John scores high";
    }
    else
    {
        echo "mary and john both scores same";
    }
    
?>