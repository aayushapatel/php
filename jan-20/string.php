<?php
$name = "My name is ABC  & Hi ! Good Morning .";
echo str_word_count($name);
echo "<br>";
$name1 = str_word_count($name, 1);
$name2 = str_word_count($name, 2);
print_r ($name1);
echo "<br>";
print_r ($name2);
echo "<br>";
$name3 = str_word_count($name, 2, "&!.");
print_r ($name3);
?>