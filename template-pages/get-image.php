<?php
/*   
 Template Name:Get Image
*/
?>
<?php 
if( isset($_REQUEST['layout']) && !empty($_REQUEST['layout'])) {
 $pageObj =  get_page_by_path( $_REQUEST['layout'], OBJECT, 'layouts');
 if($pageObj != null){
     
/**
 * Convert the PHP header into the image type
 **/ 
 
  header("Content-type: image/png");
  
/**
 * Gets page id and check for featured thumbnail
 **/
 
  $pageId = $pageObj->ID;
  
  
  if(has_post_thumbnail($pageId)){
      $source = get_the_post_thumbnail_url($pageId);
      
      $image =  imagecreatefrompng($source);
      $black = ImageColorAllocate($image,0x00,0x00,0x00);
      $fontSize = 5;
      
    /**
     * Enter fields in the array that need to be added to the image 
     **/
    
    
      $fieldsArray = array(
        "sName"=> "name",
        "sAdd"=>"s_address",
        "sCity"=>"s_city",
        "sPhone"=> "s_phone",
        "sEmail" =>"s_email",
        "bName" => "b_name",
        "bAddress" => "b_address",
        "bCity" => "b_city",
        "bRoutingFrac" => "b_routing_f",
        "bAccountNumb" => "bank_ano",
        "startingCheckNumber" => "check_s"
      );
    
    
    /**
     * Generate and check for each fields in the fields array
     **/
      foreach ($fieldsArray as $key => $value) {
          generateTextforImage($key, $value, $image, $fontSize, $pageId, $black);   
      }
      
      imagepng($image);
    }
 }
}
?>