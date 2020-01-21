<?php
$x = 2;
if($x !== '2')
{
    echo "this not condition operator is strict. (2!=='2')";
}
if($x != '2')
{
    echo "this not condition operator is not strict. (2=='2')";
}
?>