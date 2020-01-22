<?php
$a = '1';
echo $b = &$a;
echo "<br>";
echo $c = "2$b";
echo "<br>";
echo $b;
echo "<br>";
$b = 5;
echo $a;


?>