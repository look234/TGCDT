<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();

$dir = 'images/' . $_SESSION['language'] . '_cards/';
$files1 = scandir($dir);
$images = count($files1);
$theImage = rand(2, $images);

if($files1[$theImage] != ""){
   $temp = explode("_", $files1[$theImage], 3);
   $removeExt = explode(".", $temp[2]);

   echo "<img src='/images/" . $_SESSION['language'] . "_cards/$files1[$theImage]' width='250px' height='365px' />";
}else{
   $theImage = rand(2, $images);
   $temp = explode("_", $files1[$theImage], 3);
   $removeExt = explode(".", $temp[2]);

   echo "<img src='/images/" . $_SESSION['language'] . "_cards/$files1[$theImage]' width='250px' height='365px' />";
}
?>