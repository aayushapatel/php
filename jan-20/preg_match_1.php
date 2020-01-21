<?php
$name = "aayusha patel@";
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  $nameErr = "Name Invalid. No special character allowed";
}
else {
    $nameErr = "Name valid";
}
echo $nameErr;
?>