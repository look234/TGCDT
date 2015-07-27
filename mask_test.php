<?php

$image = new Imagick('FMA.JPG');

$height = $image->getImageHeight();
$width = $image->getImageWidth();
$temp_pixel2 = "";

      /* Create new object with the image */
      $im = new Imagick( "FMA.JPG" );

      /* Get iterator */
      $it = $im->getPixelIterator();
       
      /* Loop trough pixel rows */
      foreach( $it as $row => $pixels ) {
          /* For every second row */
          //if ( $row % 2 ) {
              for( $i = 0; $i < (count($pixels) - 1); $i++){
                 $color1 = $pixels[$i]->getColor();
                 $color2 = $pixels[$i + 1]->getColor();
                 //$d = sqrt(($color2['r']-$color1['r'])^2+($color2['g']-$color1['g'])^2+($color2['b']-$color1['b'])^2);
                 $c1 = $color1['r'] + $color1['g'] + $color1['b'];
                 $c2 = $color2['r'] + $color2['g'] + $color2['b'];
                 //$p = $d/sqrt((255)^2+(255)^2+(255)^2);
                 $change = abs($c1 - $c2);
                 $change = $change / 765;
                 //echo $p . "<br/>";
                 $pixels[$i]->setColor( "white" );
                 if($change > 0.2){
                    $pixels[$i]->setColor( "#0000FF" );
                 }
                 /*
                 if($p > 0.7){
                    $pixels[$i]->setColor( "#FF0000" );
                 }
                 if($p < 0.6){
                    $pixels[$i]->setColor( "#FFFF00" );
                 }
                 if($p < 0.5){
                    $pixels[$i]->setColor( "#00FF00" );
                 }
                 if($p < 0.4){
                    $pixels[$i]->setColor( "#0000FF" );
                 }
                 if($p < 0.2){
                    $pixels[$i]->setColor( "#006633" );
                 }
                 if($p < 0.1){
                    $pixels[$i]->setColor( "black" );
                 }
                 */
              }
              
              /* Loop trough the pixels in the row (columns) */
              /*
              foreach ( $pixels as $column => $pixel ) {
                      //if ( is_array($temp_pixel) && ($pixel->isPixelSimilar($temp_pixel, 0.5)) ) {
                      //if( $column % 2 ){
                         //echo $column;
                         if( is_object($temp_pixel2) ){
                            //if($column <= 1){
                               if($pixel->isSimilar($temp_pixel2, 1.0)){
                                  $pixel->setColor( "grey" );
                                  //echo "woot";
                               }else if($pixel->isSimilar($temp_pixel2, 0.5)){
                                  $pixel->setColor( "blue" );
                                  //echo "woot";
                               }else if($pixel->isSimilar($temp_pixel2, 0.25)){
                                  $pixel->setColor( "green" );
                                  //echo "woot";
                               }else if($pixel->isSimilar($temp_pixel2, 0.1)){
                                  $pixel->setColor( "yellow" );
                                  //echo "woot";
                               }else if($pixel->isSimilar($temp_pixel2, 0.005)){
                                  $pixel->setColor( "black" );
                                  //echo "woot";
                               }else{
                                  $pixel->setColor( "white" );
                                  //echo "shit";
                               }
                            }else{
                               if($pixel->isSimilar($pixels[$column - 1], 1.0)){
                                  $pixel->setColor( "grey" );
                                  //echo "woot";
                               }else if($pixel->isSimilar($pixels[$column - 1], 0.5)){
                                  $pixel->setColor( "blue" );
                                  //echo "woot";
                               }else if($pixel->isSimilar($pixels[$column - 1], 0.25)){
                                  $pixel->setColor( "green" );
                                  //echo "woot";
                               }else if($pixel->isSimilar($pixels[$column - 1], 0.1)){
                                  $pixel->setColor( "yellow" );
                                  //echo "woot";
                               }else if($pixel->isSimilar($pixels[$column - 1], 0.005)){
                                  $pixel->setColor( "black" );
                                  //echo "woot";
                               }else{
                                  $pixel->setColor( "white" );
                                  //echo "shit";
                               }
                            }


                         }else{
                              //print_r ($pixel->getColor()).PHP_EOL;
                              $pixel->setColor( "white" );
                         }
                      //}

                      $temp_pixel2 = $pixel;

              }
              */
          //}
          /* Sync the iterator, this is important to do on each iteration */
          $it->syncIterator();
      }
       
      /* Display the image */
      header( "Content-Type: image/png" );
      echo $im;

$height_top = round($height / 4);
$height_bottom = round(($height / 4) * 3);

print "the image height is " . $height . " (" . $height_top . "/" . $height_bottom . ") and the width is ". $width . "<br/>";
/*
echo '<table cellpadding="0px" cellspacing="0px"><tr>';
for($i = 0; $i <= $width; $i++){
$pixel_top = $image->getImagePixelColor($height_top, $i); 
$temp = $pixel_top->getColor();
$r_c = dechex($temp['r']);
$g_c = dechex($temp['g']);
$b_c = dechex($temp['b']);
if(strlen($r_c) < 2){
   $r_c = "0" . $r_c;
}
if(strlen($g_c) < 2){
   $g_c = "0" . $g_c;
}
if(strlen($b_c) < 2){
   $b_c = "0" . $b_c;
}
$hex = $r_c . $g_c . $b_c;
//echo $hex . "<br/>";
//$pixel_top->getColorAsString(); // produces rgb(255,255,255); 
//echo $pixel_top;
echo '<td bgcolor="#' . $hex; 
echo '" height="5px" width="2px"></td>';
$pixel_bottom = $image->getImagePixelColor($height_bottom, $i); 
//echo $pixel_bottom->getColorAsString(); // produces rgb(255,255,255); 
//echo "<br/>";
}
echo "</tr></table>";
*/
/*

$thumb = new Imagick('crop test.png');

$thumb->resizeImage(322,450,Imagick::FILTER_LANCZOS,1);
$thumb->writeImage('mythumb.png');


header("Content-Type: image/png");
echo $thumb;



$image = new Imagick('test_image.png');

$image->roundCorners(5,3);
$image->writeImage("rounded.png");
echo $image;



$path = '/path/to/your/images/';

// Create new objects from png's
$dude = new Imagick('test_image.png');
$mask = new Imagick('pokemon_mask2.png');

// IMPORTANT! Must activate the opacity channel
// See: http://www.php.net/manual/en/function.imagick-setimagematte.php
$dude->setImageMatte(1); 

// Create composite of two images using DSTIN
// See: http://www.imagemagick.org/Usage/compose/#dstin
$dude->compositeImage($mask, Imagick::COMPOSITE_DSTIN, 0, 0);

// Write image to a file.
$dude->writeImage('newimage.png');

// And/or output image directly to browser
header("Content-Type: image/png");
echo $dude;
*/


?>