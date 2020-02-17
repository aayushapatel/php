<?php
namespace App\Models\Admin;
class register extends \App\Models\BaseQuery {
    public static function converter($fields) {
        $userData = array();
          foreach ($fields as $key => $value) {
  
              switch ($key) {
                  case 'prefixSelect':
                      $userData['prefix'] = "'".$value."'";
                  break;
                  case 'firstname':
                      $userData['firstName'] = "'".$value."'";
                  break;
                  case 'lastname':
                      $userData['lastName'] = "'".$value."'";
                  break;
                  case 'information':
                      $userData['information'] = "'".$value."'";
                  break;
                  case 'password':
                      $userData['password'] = "'".md5($value)."'";
                  break;
                  case 'mobilenumber' :
                      $userData['mobileNumber'] = "'".$value."'";
                  break;
                  case 'email':
                      $userData['email'] = "'".$value."'";
                  break;
              }
          }
          $userKeys = array_keys($userData);
          $userValue = array_values($userData);
          $id = self::insertData('user',implode(", ",$userKeys), implode(",", $userValue));
          return $id;
        }
}
?>