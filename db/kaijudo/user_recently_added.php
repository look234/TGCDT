<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
?>
<?php include_once("analyticstracking.php") ?>
<?php

   
   $location = "/home8/vinceoa2/public_html/user_data/" . $_SESSION['otherUserID'] . "/ygo_recently_added.xml";

   $xml = simplexml_load_file($location);

/*
   foreach($xml->children() as $child){
      if($count < 50){
      if($child->activity == "Added"){
         echo '<div style="margin-bottom:5px;">';
      }else{
         echo '<div style="background-color:#00afe5; margin-bottom:5px;">';
      }
      echo '<b>' . $child->name . '</b><br/>';
      echo $child->number . ' - ';
      echo $child->edition . ' - ';
      echo $child->rarity . '<br/>';
      echo $child->activity . ' ' . $child->time;
      echo '</div>';
      $count++;
      }else{
         break;
      }
   }
*/

   for($i = 0; $i < 50; $i++){
      if($xml->card[$i]->activity == "Added"){
         echo '<div style="margin-bottom:5px;">';
      }else{
         echo '<div style="background-color:#00afe5; margin-bottom:5px;">';
      }
      echo '<b>' . $xml->card[$i]->name . '</b><br/>';
      echo $xml->card[$i]->number . ' - ';
      echo $xml->card[$i]->edition . ' - ';
      echo $xml->card[$i]->rarity . '<br/>';
      echo $xml->card[$i]->activity . ' ' . $xml->card[$i]->time;
      echo '</div>';
   }

?>