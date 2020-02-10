<?php
    class introduction {
        public $msg = "Hello All, I am ";
        public function __construct($name)
        {
            echo $this -> msg.$name;
        }
    }
    $object = new introduction('Aayusha');
?>