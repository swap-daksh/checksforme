/**
 * functionality for the Live image preview
 **/
 
jQuery(document).ready(function(){
    jQuery('input.live-preview').change(function(){
       updateTemplateImage();
    });    
});

function updateTemplateImage(){
    jQuery('.cfm-template-img').find('img').attr('src', getTemplateImage());
    jQuery('#template-preview-hidden').val(getTemplateImage());
}

function getTemplateImage(){
    getArgs();
    
    if(isLivePreview()){
     return imageApiUrl+'?'+getArgs();
    } else { 
     return localStorage.getItem("layoutURL"); 
    }
}

function isLivePreview(){
    if(localStorage.getItem("livePreviewEnabled") == "true"){
        return true;
    } else {
        return false;
    } 
}
 
function getArgs(){
    
    var SerialArray = {};
    
    var sName = jQuery('#pName').find('input').val();
    (sName.length > 0) ?  SerialArray.sName = sName : '' ;
    
    var sAdd = jQuery('#pAddressBox').find('input').val(); 
    (sAdd.length > 0) ?  SerialArray.sAdd = sAdd : '' ;
    
    var sCity = jQuery('#pCityBox').find('input').val(); 
    (sCity.length > 0) ?  SerialArray.sCity = sCity : '' ;
    
    var sPhone = jQuery('#pPhone').find('input').val();
    (sPhone.length > 0) ?  SerialArray.sPhone = sPhone : '' ;
    
    var sEmail = jQuery('#pEmail').find('input').val(); 
    (sEmail.length > 0) ?  SerialArray.sEmail = sEmail : '' ;
    
    var bName = jQuery('#bName').find('input').val(); 
    (bName.length > 0) ?  SerialArray.bName = bName : '' ;
    
    var bAddress = jQuery('#bAddressBox').find('input').val();
    (bAddress.length > 0) ?  SerialArray.bAddress = bAddress : '' ;
    
    var bCity = jQuery('#bCityBox').find('input').val();
    (bCity.length > 0) ?  SerialArray.bCity = bCity : '' ;
    
    var bRoutingFrac = jQuery('#bRoutingFraction').find('input').val();
    (bRoutingFrac.length > 0) ?  SerialArray.bRoutingFrac = bRoutingFrac : '' ;
    
    var bNineDigit = jQuery('#bNineDigit').find('input').val();
    (bNineDigit.length > 0) ?  SerialArray.bNineDigit = bNineDigit : '' ;
    
    var bAccountNumb = jQuery('#bAccountNumber').find('input').val();
    (bAccountNumb.length > 0) ?  SerialArray.bAccountNumb = bAccountNumb : '' ;
    
    var bHashNumber = jQuery('#bHashNumber').find('input').val(); 
    (bHashNumber.length > 0) ?  SerialArray.bHashNumber = bHashNumber : '' ;
    
    var bSignatureLine = jQuery('#bSignatureLine').find('input').val();
    (bSignatureLine.length > 0) ?  SerialArray.bSignatureLine = bSignatureLine : '' ;
    
    if(!jQuery.isEmptyObject(SerialArray)){
      localStorage.setItem("livePreviewEnabled", true);
    } else{
      localStorage.setItem("livePreviewEnabled", false);   
    }
    
   SerialArray.layout = processLayout();
   return jQuery.param(SerialArray);
}


function processLayout(){ 
    
    var layoutUrl,file, template;
    
    layoutUrl = localStorage.getItem("layoutURL");
    file = layoutUrl.substring(layoutUrl.lastIndexOf('/')+1);
    if(file.indexOf('-') >= 0){
      template = file.split("-")[0];    
    } else {
      template = file.replace('.png', '');
    }
    
    console.log(template);
    
    return template;
    
}
 
 