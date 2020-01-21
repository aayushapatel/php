<?php
$site = "https://www.google.co.in";
@fopen($site,"r")
or die("Unable to connect to $site");
?>