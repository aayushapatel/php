<?php 
    class calculator {
        public $number1,$number2;
        public function __construct($num1, $num2) {
            $this->number1 = $num1;
            $this->number2 = $num2;
        }
        public function add() {
            return $this->number1 + $this->number2;
        }
    }
    $calc = new calculator(20,20);
    echo $calc->add();
?>