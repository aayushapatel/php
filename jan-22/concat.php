<?php
$text1 = "hello";
$text2 = "worlds";
$finalstr = "";
$lenText1 = strlen($text1);
$lenText2 = strlen($text2);
for ($i=0; $i < $lenText1 || $i < $lenText2 ; $i++) { 
    @$finalstr .= $text1[$i] . $text2[$i];
}
echo $finalstr;
?>