<?php
    class factorial {
        public $number;
        public $ans = 1;
        function findFactorial($number) {
            for ($i=1; $i <= $number ; $i++) { 
                $this -> ans *= $i;
            }
            return $this -> ans;
        }
    }
    $object = new factorial();
    echo $object -> findFactorial(5);
    $object1 = new factorial();
    echo $object1 -> findFactorial(1);
?>