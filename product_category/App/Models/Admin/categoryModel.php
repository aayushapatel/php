<?php
namespace App\Models\Admin;
class categoryModel extends \App\Models\BaseQuery {
    protected static function converter($fields) {
        $categoryData = array();
        
          foreach ($fields as $key => $value) {
  
              switch ($key) {
                  case 'categoryName':
                      $categoryData['category_name'] = "'".$value."'";
                  break;
                  case 'url':
                      $value = strtolower(str_replace(" ", "-", $value));
                      $categoryData['Url_key'] = "'".$value."'";
                  break;
                  case 'image':
                      $categoryData['image'] = "'".$value."'";
                  break;
                  case 'status':
                      $categoryData['status'] = "'".$value."'";
                  break;
                  case 'description':
                      $categoryData['description'] = "'".$value."'";
                  break;
                  case 'parentCategory' :
                          $categoryData['parent_category'] = $value;
                      
                      
                  break;
              }
            }
            return $categoryData;
    }
    public static function insertConverter($fields) {
        $categoryData = self::converter($fields);
        $categoryKeys = array_keys($categoryData);
        $categoryValue = array_values($categoryData);
        $id = self::insertData('category',implode(", ",$categoryKeys), implode(",", $categoryValue));
        return $id;
    }
    public static function updateConverter($fields, $id) {
        $categoryData = self::converter($fields);
        $data = [];
        foreach ($categoryData as $key => $value) {
            array_push($data, "$key = $value");
        }
        $id = self::updateData('category',implode(", ", $data),'category_id='.$id);
    }
    
}
?>