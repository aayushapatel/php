<?php
$studentName = array('Girls'=>array('Mary','Jill','Ana'),'Boys'=>array('Jane','Mark','Jack'));
print_r($studentName);
echo "<br>";
echo $studentName['Boys'][0];
echo "<br>";
print_r($studentName["Girls"]);
echo "<br>";
$studentName['Girls'][3] = 'aayusha' ;
print_r($studentName["Girls"]);
$studentName['Teacher'][0] = 'grey';
print_r($studentName['Teacher']);
print_r($studentName);
foreach($studentName as $category => $name ) {
    echo $category;
    foreach($name as $fullname)
    echo $fullname . "<br>";
}


?>