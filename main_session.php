<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
   header('Content-Type: text/html; charset=utf-8');
   $sessionVariables = array("Attribute","Type_1","Type_2","Level","Rank","Edition","Rarity","Card_Name","setName");

   if(!empty($_SESSION['set_type'])){
      if($_GET['set_type'] != ""){
         $_SESSION['set_type'] = $_GET['set_type'];
      }
   }else{
      $_SESSION['set_type'] = "Main";
   }

   if(!empty($_SESSION['page'])){
      if($_GET['page'] != ""){
         $_SESSION['page'] = $_GET['page'];
      }
   }else{
      $_SESSION['page'] = "home";
   }
   if(!empty($_SESSION['search_Style'])){
      if($_GET['search_Style'] != ""){
         $_SESSION['search_Style'] = $_GET['search_Style'];
      }
   }else{
      $_SESSION['search_Style'] = "List_View";
   }

   if($_SESSION['Sort_Value'] != ""){
      if($_GET['Sort_Value'] != ""){
         $_SESSION['Sort_Value'] = $_GET['Sort_Value'];
      }
   }else{
      $_SESSION['Sort_Value'] = "Name";
   }

//Search filter adding-checking
   foreach($sessionVariables as $value){
      if(isset($_GET[$value])){
         if($_GET[$value] != ''){
            if(count($_SESSION[$value]) > 0){
               if(!in_array($_GET[$value], $_SESSION[$value])){
                  $_SESSION[$value][] = $_GET[$value];
               }
            }else{
               $_SESSION[$value] = array($_GET[$value]);
            }
         }
      }
   }

   if(!isset($_SESSION['language'])){
      $_SESSION['language'] = "EN";
   }elseif(isset($_GET['language'])){
      $cleanedLN = htmlspecialchars($_GET['language']);
      $_SESSION['language'] = $cleanedLN;
   }
   echo '<input type="hidden" id="temp_session_lang" value="' . $_SESSION['language'] . '" />';

//   $con = mysql_connect("localhost","vinceoa2_read","Luffy_234");

   $con = mysql_connect("localhost",$db_username,$db_password);
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8',$con); 
   }
   //mysql_select_db("vinceoa2_ygo", $con);
   mysql_select_db("vinceoa2_" . $db_name, $con);
?>