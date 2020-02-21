<?php
namespace App\Models\User;

use App\Models\BaseQuery;

class serviceModel extends \App\Models\BaseQuery {
    public static function converter($fields) {
        $serviceData = array();
          foreach ($fields as $key => $value) {
  
              switch ($key) {
                  case 'title':
                      $serviceData['title'] = "'".$value."'";
                  break;
                  case 'vehicleNumber':
                      $serviceData['vehicleNumber'] = "'".$value."'";
                  break;
                  case 'licenseNumber':
                      $serviceData['licenseNumber'] = "'".($value)."'";
                  break;
                  case 'date' :
                      $serviceData['date'] = "'".$value."'";
                  break;
                  case 'timeSlot':
                      $serviceData['timeSlot'] = "'".$value."'";
                  break;
                  case 'vehicleIssue':
                    $serviceData['vehicleIssue'] = "'".$value."'";
                  break;
                  case 'serviceCenter':
                    $serviceData['serviceCenter'] = "'".$value."'";
                  break;
                  case 'status':
                    $serviceData['status'] = "'".$value."'";
                  break;
                  
          }
        }
        return $serviceData;
    }
        public static function insertConverter($fields){
            $serviceData = self::converter($fields);
            $serviceKeys = array_keys($serviceData);
            $serviceValue = array_values($serviceData);
            $serviceId = self::insertData('service_registrations',"userId,".implode(", ",$serviceKeys),$_SESSION['userId'].", ". implode(",", $serviceValue));
            return $serviceId;
        }
        public static function updateConverter($fields,$id) {
            $data = [];
            $serviceData = self::converter($fields);
            foreach ($serviceData as $key => $value) {
                array_push($data, "$key = $value");
            }
            $id = self::updateData('service_registrations',implode(", ", $data),'serviceId='.$id);
        }
         
        
    }

?>