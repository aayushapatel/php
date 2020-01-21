<?php
function displayName() {
    global $name;
    echo "Hi! My name is " . $name;
}
$name = "Aayusha";
displayName();
?>