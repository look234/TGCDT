<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
   $ds = DIRECTORY_SEPARATOR;  //1
   $storeFolder = 'uploads';   //2
 
if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];          //3             
    $targetPath = "/home8/vinceoa2/public_html/ygo/images/" . $_SESSION['language'] . "_cards/";  //4
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
    move_uploaded_file($tempFile,$targetFile); //6
}
?>  