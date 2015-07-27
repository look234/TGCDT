<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
   header("Content-type: text/html; charset=utf-8");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 


<?php
   $db_name = "ygo";
   $db_username = "vinceoa2_ygo";
   $db_password = "ki_234_ki";

   $con2 = mysql_connect("localhost",$db_username,$db_password);
   if (!$con2){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8');
   }
   mysql_select_db("vinceoa2_" . $db_name, $con2);

$abbr = "POTD-SP";
$count = "60";
$start_count = "1";
$icon = "POTD";
$copyright = "©1996 KAZUKI TAKAHASHI";

for($i = $start_count; $i <= $count; $i++){

   if($i < 10){
      $full_Num = $abbr . "00" . $i;
   }else if($i < 100){
      $full_Num = $abbr . "0" . $i;
   }else{
      $full_Num = $abbr . $i;
   }
   $insert_query = "INSERT INTO YGO_COLLECT (Set_Number, Set_Icon, Copyright) VALUES ('" . $full_Num . "','" . $icon . "','" . $copyright . "')";

      if (!mysql_query($insert_query,$con2)){
         echo "Sad Day T-T" . "<br />";
         //die('Error: ' . mysql_error());
      }else{
         echo $full_Num . " HAHA, COOKIES ON DOWELS!" . "<br />";
      }

}

?>



</html>