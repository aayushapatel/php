<?php
    class age {
        public  $todayDate;
        public function __construct() {
            $this->todayDate = date_create(date("Y/m/d"));
        }
        function findAge ($birthDate) {
            $age = date_diff($birthDate, $this -> todayDate);
            return $age->y." years ".$age->m." months ".$age->d." days ";
        }
    }
    $ageObject = new age();
    $birthDay = date_create("1997/06/02");
    echo $ageObject -> findAge($birthDay);
   
?>