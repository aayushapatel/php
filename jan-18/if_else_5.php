<?php
$a = 1;
if($a == 1):
    echo nl2br("if \n");    //no single quote allowed.
    if($a == 1)       //traditional if case in semi-colon should have else present with it
    {
        echo nl2br("curly");
    }
    else
    {
        echo 'curly else';
    }
else:
    echo "else";
endif;
?>