<?php
namespace App\Models\User;
class registerModel extends \App\Models\BaseQuery {
    public static function converter($fields) {
        $userData = $addressData = array();
          foreach ($fields as $key => $value) {
  
              switch ($key) {
                  case 'firstName':
                      $userData['firstName'] = "'".$value."'";
                  break;
                  case 'lastName':
                      $userData['lastName'] = "'".$value."'";
                  break;
                  case 'password':
                      $userData['password'] = "'".md5($value)."'";
                  break;
                  case 'phoneNumber' :
                      $userData['phoneNumber'] = "'".$value."'";
                  break;
                  case 'email':
                      $userData['email'] = "'".$value."'";
                  break;
                  case 'street':
                    $addressData['street'] = "'".$value."'";
                  break;
                  case 'city':
                    $addressData['city'] = "'".$value."'";
                  break;
                  case 'state':
                    $addressData['state'] = "'".$value."'";
                  break;
                  case 'country':
                    $addressData['country'] = "'".$value."'";
                  break;
                  case 'zipCode':
                    $addressData['zipCode'] = "'".$value."'";
                  break;
          }
        }
          $userKeys = array_keys($userData);
          $userValue = array_values($userData);
          $userId = self::insertData('users',implode(", ",$userKeys), implode(",", $userValue));
          $addressKeys = array_keys($addressData);
          $addressValue = array_values($addressData);
          $id = self::insertData('user_addresses',"userId, ".implode(", ",$addressKeys), $userId.", ".implode(",", $addressValue));
          return $userId;
        
    }
}
?>