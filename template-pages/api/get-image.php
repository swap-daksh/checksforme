<?php
/*   
 Template Name:Get Image
*/
?>
<?php 

$height = "400";
$width = "500";
$image = imagecreate($width, $height);
imagecolorallocate($image, 255, 45, 95);
imagejpeg($image);
header("Content-type: image/jpeg");

?>