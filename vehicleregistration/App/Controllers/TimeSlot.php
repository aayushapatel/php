<?php
namespace App\Controllers;

use App\Models\BaseQuery;

class TimeSlot extends \Core\BaseController {
    public static function indexAction() {
        $slots = BaseQuery::join("SELECT timeSlot FROM timeslot except (SELECT timeslot FROM service_registrations WHERE date = '".$_POST['date']."' HAVING count(serviceId) > 3)");
        echo json_encode($slots);

    }
    protected function before() {
        
    }
}
?>