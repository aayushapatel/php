<?php
    class orderArray {
        function sortArray($array) {
            $sorted = sort($array);
            return $array;
        }
    }
    $object = new orderArray();
     print_r($object -> sortArray([2,-1,5,0,9,0,1]));
?>