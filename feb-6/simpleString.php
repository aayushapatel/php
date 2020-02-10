<?php
    class simpleString {
        protected $initialized = "My Class has initialized";
        function displayMessage() {
            return $this -> initialized;
        }
    }
    $object = new simpleString();
    $returnString = $object -> displayMessage();
    echo $returnString;
?>