<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
   header("Content-type: text/html; charset=utf-8");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 


<?php
   $db_name = "ptcg";
   $db_username = "vinceoa2_pokemon";
   $db_password = "Luffy_234";

   $con2 = mysql_connect("localhost",$db_username,$db_password);
   if (!$con2){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8');
   }
   mysql_select_db("vinceoa2_" . $db_name, $con2);

$count = "122";
$end_count = "/119";
$icon = "M062-EN";
$artist = "Ken Sugimori";
$copyright = "©2014 Pokémon";
$rarity = "Common";

for($i = 1; $i <= $count; $i++){
   //$insert_query = "INSERT INTO PTCG_COLLECT (Set_Number, Set_Icon, Artist, Copyright, Rarity_Symbol)
VALUES ('" . $i . $end_count . "','" . $icon . "','" . $artist . "','" . $copyright . "','" . $rarity . "')";

      if (!mysql_query($insert_query,$con2)){
         echo "Sad Day T-T" . "<br />";
         //die('Error: ' . mysql_error());
      }else{
         echo $i . "HAHA, COOKIES ON DOWELS!" . "<br />";
      }

}

?>



</html>