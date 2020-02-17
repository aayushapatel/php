<?php
namespace App\Models\Admin;
class productModel extends \App\Models\BaseQuery {
    protected static function converter($fields) {
        $productData = array();
        
          foreach ($fields as $key => $value) {
  
              switch ($key) {
                  case 'productName':
                      $productData['product_name'] = "'".$value."'";
                  break;
                  case 'sku':
                    $productData['SKU'] = "'".$value."'";
                break;
                  case 'url':
                      $productData['Url_key'] = "'".$value."'";
                  break;
                  case 'image':
                      $productData['image'] = "'".$value."'";
                  break;
                  case 'status':
                      $productData['status'] = "'".$value."'";
                  break;
                  case 'shortDescription':
                    $productData['short_description'] = "'".$value."'";
                break;
                  case 'description':
                      $productData['description'] = "'".$value."'";
                  break;
                  case 'price':
                    $productData['price'] = "'".$value."'";
                break;
                case 'stock':
                    $productData['stock'] = "'".$value."'";
                break;
                
              }
            }
            return $productData;
    }
    public static function insertConverter($fields) {
        $productData = self::converter($fields);
        $productKeys = array_keys($productData);
        $productValue = array_values($productData);
        $id = self::insertData('products',implode(", ",$productKeys), implode(",", $productValue));
        self::insertData('products_categories','product_id, category_id', "$id, $fields[category]");
        return $id;
    }
    public static function updateConverter($fields, $id) {
        $productData = self::converter($fields);
        $data = [];
        foreach ($productData as $key => $value) {
            array_push($data, "$key = $value");
        }
        self::updateData('products',implode(", ", $data),'product_id='.$id);
        self::updateData('products_categories',"category_id='".$fields['category']."'", "product_id=$id" );
    }
    
}
?>