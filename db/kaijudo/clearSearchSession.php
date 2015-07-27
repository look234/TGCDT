<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
   $sessionVariables = array("Attribute","Type_1","Type_2","Level","Rank","Edition","Rarity","Card_Name","setName");

   if($_POST['clearAll'] == 'yes'){
      foreach($sessionVariables as $tempVariable){
         unset($_SESSION[$tempVariable]);
      }
   }
   foreach($_GET as $key=>$value){
      foreach($_SESSION[$key] as $key2=>$value2){
         if($_SESSION[$key][$key2] == $value){
            $_SESSION[$key][$key2] = '';
         }
      }
   }
?>