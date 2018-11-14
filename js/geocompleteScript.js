jQuery(document).ready(function(){
    
/**
 * Personal Address Autocomplete
 **/
    
  jQuery("#pAddressBox").find('input')
  .geocomplete()
  .bind("geocode:result", function(event, result){
      
      
     // console.log(result);
     var postcode,billing_city, billing_state_s, billing_state_l, billing_country;
        
        for (var i = 0; i < result.address_components.length; i++) {
          for (var j = 0; j < result.address_components[i].types.length; j++) {
              
            
            if (result.address_components[i].types[j] == "postal_code") {
              postcode =  result.address_components[i].long_name;
            }
            if (result.address_components[i].types[j] == "administrative_area_level_2") {
                billing_city = result.address_components[i].long_name;    
            }
            if (result.address_components[i].types[j] == "administrative_area_level_1") {
              billing_state_s = result.address_components[i].short_name;
              billing_state_l = result.address_components[i].long_name;
            }
            if (result.address_components[i].types[j] == "country") {
              billing_country = result.address_components[i].long_name;
            }
          }
        }
    
    
    (typeof(billing_city) == "undefined") ? billing_city = '' : billing_city = billing_city;
    (typeof(billing_state_l) == "undefined") ? billing_state_l = '' : billing_state_l = billing_state_l;
    (typeof(postcode) == "undefined") ? postcode = '' : postcode = postcode;
    jQuery('#pCityBox').find('input').val(billing_city+', '+billing_state_l+', '+billing_country+', '+postcode);
    
    var pAddVal = jQuery("#pAddressBox").find('input').val();
        pAddVal = pAddVal.replace( billing_city,'');
        pAddVal = pAddVal.replace( billing_state_l,'');
        pAddVal = pAddVal.replace(billing_country, ''); 
        pAddVal = pAddVal.replace(postcode, ''); 
        
       
       jQuery("#pAddressBox").find('input').val(pAddVal);
        
    
    
  });

/**
 * Business Address Autocomplete
 **/

jQuery("#bAddressBox").find('input')
  .geocomplete()
  .bind("geocode:result", function(event, result){
     var postcode,billing_city, billing_state_s, billing_state_l;
        
        for (var i = 0; i < result.address_components.length; i++) {
          for (var j = 0; j < result.address_components[i].types.length; j++) {
              
            
            if (result.address_components[i].types[j] == "postal_code") {
              postcode =  result.address_components[i].long_name;
            }
            if (result.address_components[i].types[j] == "administrative_area_level_2") {
                billing_city = result.address_components[i].long_name;    
            }
            if (result.address_components[i].types[j] == "administrative_area_level_1") {
              billing_state_s = result.address_components[i].short_name;
              billing_state_l = result.address_components[i].long_name;
            }    
           if (result.address_components[i].types[j] == "country") {
              billing_country = result.address_components[i].long_name;
            }
          }
        }
    
       (typeof(billing_city) == "undefined") ? billing_city = '' : billing_city = billing_city;
       (typeof(billing_state_l) == "undefined") ? billing_state_l = '' : billing_state_l = billing_state_l;
       (typeof(postcode) == "undefined") ? postcode = '' : postcode = postcode;
        jQuery('#bCityBox').find('input').val(billing_city+', '+billing_state_l+', '+billing_country+', '+postcode);
    
    
        var bAddVal = jQuery("#bAddressBox").find('input').val();
        bAddVal = bAddVal.replace(billing_city,'');
        bAddVal = bAddVal.replace(billing_state_l,'');
        bAddVal = bAddVal.replace(billing_country, ''); 
        bAddVal = bAddVal.replace(postcode, ''); 
        
       
       jQuery("#bAddressBox").find('input').val(bAddVal);
    
  });

/**
 * Checkout Address Autocomplete
 **/
 
 
jQuery("#billing_address_1")
  .geocomplete()
  .bind("geocode:result", function(event, result){
     var postcode,billing_city, billing_state_s, billing_state_l;
        
        for (var i = 0; i < result.address_components.length; i++) {
          for (var j = 0; j < result.address_components[i].types.length; j++) {
              
            
            if (result.address_components[i].types[j] == "postal_code") {
              postcode =  result.address_components[i].long_name;
            }
            if (result.address_components[i].types[j] == "administrative_area_level_2") {
                billing_city = result.address_components[i].long_name;    
            }
            if (result.address_components[i].types[j] == "administrative_area_level_1") {
              billing_state_s = result.address_components[i].short_name;
              billing_state_l = result.address_components[i].long_name;
             
            }

            (typeof(billing_city) == "undefined") ? billing_city = '' : billing_city = billing_city;
            (typeof(billing_state_l) == "undefined") ? billing_state_l = '' : billing_state_l = billing_state_l;
            (typeof(postcode) == "undefined") ? postcode = '' : postcode = postcode;
            
            jQuery('#billing_city').val(billing_city);
            jQuery('#billing_state').val(billing_state_s);
            jQuery('#billing_postcode').val(postcode);
            
          }
        }
    
    
    
    
    
  });

 
});
   
