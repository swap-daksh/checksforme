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
      
     
      $fontSize = 10;
      
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
    
    
    
    //$key => $value
    /**
     * Generate and check for each fields in the fields array
     **/

  //  $terms = get_terms(array('post_type' => 'layout_type','taxonomy' => 'layout_tags','order'=>'asc','hide_empty' => false));
  
  $ltype = get_the_terms($pageId, 'layout_type');
  $ltag  = get_the_terms($pageId, 'layout_tags');
  
  $termsArray = array();
  if(!empty($ltype)){
      foreach($ltype as $a){
            array_push($termsArray, $a->slug );
      }
  }
 if(!empty($ltag)){
      foreach($ltag as $a){
            array_push($termsArray, $a->slug );
      }
 }
  

  foreach ($fieldsArray as $key => $value) {
        
        
       /** $terms = get_terms(array('post_type' => 'layout_type','taxonomy' => 'layout_tags','order'=>'asc','hide_empty' => false));
        if($terms){ 
        $myarr=array();
        foreach($terms as $cat) {
         $myarr[]=$cat->slug;
        }
        
        }
        **/
       
        
        //pr($myarr);
            if (in_array("has_three_name",$termsArray)){
                  
                
                    
            if($key == 'sName') {
                for($x=0; $x < 3; $x++){
                  generateTextforImage($key, $value, $image, $fontSize, $pageId, $black, getCoordinates($pageId, 'additional_name_title_'.($x+1) , 'x'), getCoordinates($pageId, 'additional_name_title_'.($x+1) , 'y'));
                }
              } else{
                  generateTextforImage($key, $value, $image, $fontSize, $pageId, $black, getCoordinates($pageId, 'additional_name_title_'.($x+1) , 'x'), getCoordinates($pageId, 'additional_name_title_'.($x+1) , 'y')); 
             }
                
            } elseif (in_array("three-checks",$termsArray)){
                for($x=0; $x < 3; $x++){
                  generateTextforImage($key, $value, $image, $fontSize, $pageId, $black, getCoordinates($pageId, 'additional_name_title_'.($x+1) , 'x'), getCoordinates($pageId, 'additional_name_title_'.($x+1) , 'y'));
                } 
            } elseif (in_array("personal-wallet",$termsArray)){
                $fontSize=4;
                for($x=0; $x < 3; $x++){
                  generateTextforImage($key, $value, $image, $fontSize, $pageId, $black, getCoordinates($pageId, 'additional_name_title_'.($x+1) , 'x'), getCoordinates($pageId, 'additional_name_title_'.($x+1) , 'y'));
                }
            } else{
                  generateTextforImage($key, $value, $image, $fontSize, $pageId, $black); 
            } 
      

      }
      
      imagealphablending( $image, false );
      imagesavealpha( $image, true );
      
      imagepng($image);
    }
 }
}
?>