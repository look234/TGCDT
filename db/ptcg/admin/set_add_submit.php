<!-- xml version="1.0" encoding="UTF-8" --> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<?php include_once("analyticstracking.php") ?>
</head>
<body>

<?php
header('Content-Type: text/html; charset=utf-8');
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();

   include_once "../database_var.php";
   include_once "../../../bwahaha.php";

   $con = mysql_connect("localhost", $db_username_write, $db_password_write);
if (!$con){
  die('Could not connect: ' . mysql_error());
}else{
  echo "Whee! Added new cards!" . "<br />";
  mysql_set_charset('utf8',$con); 
}

mysql_select_db("vinceoa2_mtg", $con);

for($i = $_POST['startnum']; $i <= $_POST['stopnum']; $i++){

   if($_SESSION['language'] == "EN"){
      $size = $i . $_POST['size'];
   }else{
      if($i < 10){
         $size = "00" . $i . $_POST['size'];
      }elseif($i < 100){
         $size = "0" . $i . $_POST['size'];
      }else{
         $size = $i . $_POST['size'];
      }
   }

   $abbr = $_POST['abbr'] . '-';
   if($_POST['setnump'] != ""){
      $abbr = $abbr . $_POST['setnump'];
   }
      if($i < 10){
         $abbr = $abbr . "00" . $i;
      }elseif($i < 100){
         $abbr = $abbr . "0" . $i;
      }else{
         $abbr = $abbr . $i;
      }
   if($_POST['setnums'] != ""){
      $abbr = $abbr . $_POST['setnums'];
   }
   $name = $_POST['name'];
   $oname = $_POST['oname'];
   $date = $_POST['date'];
   $type = $_POST['type'];
   $rarity_1 = 'rarity_1_' . $i;
   $rarity_2 = 'rarity_2_' . $i;
   $rarity_3 = 'rarity_3_' . $i;
   $rarity_4 = 'rarity_4_' . $i;
   $edition_1 = 'edition_1_' . $i;
   $edition_2 = 'edition_2_' . $i;
   $artist = 'artist_' . $i;
   $id = 'id_' . $i;

      $sql_1="INSERT INTO MTG_SETS_" . $_SESSION['language'] . " (Set_Num, Print_Set_Num, Set_Name, Other_Name, Rarity_1, Rarity_2, Rarity_3, Rarity_4, Edition_1, Edition_2, Set_Type, Artist, DB_ID, Release_Date) VALUES ('$abbr','$size','$name','$oname','$_POST[$rarity_1]','$_POST[$rarity_2]','$_POST[$rarity_3]','$_POST[$rarity_4]','$_POST[$edition_1]','$_POST[$edition_2]','$type','$_POST[$artist]','$_POST[$id]','$date')";

      if (!mysql_query($sql_1,$con)){
         echo "Sad Day T-T" . "<br />";
         die('Error: ' . mysql_error());
      }else{
      }
}

mysql_close($con);

?>
<br />
<a href="set_add.php"><button type="button">Start Again!</button></a>

</body>
</html>