<?php
/*
$filename = 'LCJW-EN016_1st_Rarity_1.png';
$degrees = 45;
$dst_image = imagecreatetruecolor(250,365);

// Content type
header('Content-type: image/png');

// Load
$source = imagecreatefrompng($filename);

// Rotate
$rotate = imagerotate($source, $degrees, 0);
imagecopyresampled($dst_image,$source,0,0,0,0,250,365,250,400);

// Output
//imagepng($dst_image, "crop3.png");

// Free the memory
imagedestroy($source);
imagedestroy($rotate);
imagedestroy($dst_image);

*/



list($width, $height, $type, $attr) = getimagesize("LCJW-EN016_1st_Rarity_1.png");

$im = imagecreatefrompng("LCJW-EN016_1st_Rarity_1.png");

//echo '<table cellpadding="0px" cellspacing="0px" border="0px" >';
$topx = 99999;
for($j = 1; $j < $height; $j++){
//echo '<tr>';
for($i = 1; $i < $width; $i++){
   $rgb = imagecolorat($im, $i, $j);
   $colors = imagecolorsforindex($im, $rgb);
   $rgb2 = imagecolorat($im, ($i-1), $j);
   
   $temp = $rgb - $rgb2;

   if($temp < -3500000){
      //echo '<td width="1px" height="1px" bgcolor="blue">';
      if($i < $topx){
         $topx = $i;
         $topy = $j;
      } 
      if($j > $bottomx){
         $bottomx = $i;
         $bottomy = $j;
      } 
   }elseif($temp > 3500000){
      //echo '<td width="1px" height="1px" bgcolor="red">';
   }else{
      //echo '<td width="1px" height="1px" bgcolor="white">';

   /*
   echo '<td width="1px" height="1px" bgcolor="#';
   if(strlen(dechex($colors['red'])) < 2){
     echo "0" . dechex($colors['red']);
   }else{
     echo dechex($colors['red']);
   }
   if(strlen(dechex($colors['green'])) < 2){
     echo "0" . dechex($colors['green']);
   }else{
     echo dechex($colors['green']);
   }
   if(strlen(dechex($colors['blue'])) < 2){
     echo "0" . dechex($colors['blue']);
   }else{
     echo dechex($colors['blue']);
   }
   echo '"></td>';

    */
   }
}
//echo '</tr>';
}
//echo '</table>';

$deltaY = $bottomy - $topy;
$deltaX = $bottomx - $topx;

echo "TopX " . $topx . " TopY " . $topy . " BottomX " . $bottomx . " BottomY " . $bottomy . "<br/>";

$angleInDegrees = atan2($deltaY, $deltaX) * 180 / M_PI;
echo $deltaY . " " . $deltaX . " " . $angleInDegrees . " " . atan2($deltaY, $deltaX);
echo "<br/>" . ((asin(0.359889) * 180) / M_PI);
//

$filename = 'LCJW-EN016_1st_Rarity_1.png';
$degrees = round($angleInDegrees);
$dst_image = imagecreatetruecolor(250,365);

// Content type
header('Content-type: image/png');

// Load
$source = imagecreatefrompng($filename);

// Rotate
$rotate = imagerotate($source, $degrees, 0);

imagepng($rotate);

// Free the memory
imagedestroy($source);
imagedestroy($rotate);

//echo '<tr><td bgcolor="rgb(39,46,60)">Test</td></tr>';

?>
