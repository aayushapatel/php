<?php
namespace App\Models\Admin;
class cmsModel extends \App\Models\BaseQuery {
    protected static function converter($fields) {
        $cmsData = array();
        
          foreach ($fields as $key => $value) {
  
              switch ($key) {
                  case 'page_title':
                      $cmsData['page_title'] = "'".$value."'";
                  break;
                  case 'url':
                      $cmsData['Url_key'] = "'".$value."'";
                  break;
                  case 'status':
                      $cmsData['status'] = "'".$value."'";
                  break;
                  case 'content':
                      $cmsData['content'] = "'".$value."'";
                  break;
              }
            }
            return $cmsData;
    }
    public static function insertConverter($fields) {
        $cmsData = self::converter($fields);
        $cmsKeys = array_keys($cmsData);
        $cmsValue = array_values($cmsData);
        $id = self::insertData('cms_pages',implode(", ",$cmsKeys), implode(",", $cmsValue));
        return $id;
    }
    public static function updateConverter($fields, $id) {
        $cmsData = self::converter($fields);
        $data = [];
        foreach ($cmsData as $key => $value) {
            array_push($data, "$key = $value");
        }
        self::updateData('cms_pages',implode(", ", $data),'cms_id='.$id);
        
    }
    
}
?>