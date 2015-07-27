<!-- xml version="1.0" encoding="UTF-8" --> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<body>

<form method="post" action="">

<?php

   include_once "../database_var.php";
   include_once "../../../bwahaha.php";

   $con = mysql_connect("localhost", $db_username_write, $db_password_write);
if (!$con){
  die('Could not connect: ' . mysql_error());
}else{
  echo "Whee! Connected!" . "<br />";
  mysql_set_charset('utf8',$con); 
}


mysql_select_db("vinceoa2_ygo", $con);

echo '<form method="post" action="">';

echo 'Find Set Abbreviation: <input type="text" name="set_abb" />';
echo 'New Set Abbreviation: <input type="text" name="new_set_abb" />';
echo 'New Set Name: <input type="text" name="set_name" />';
echo 'Grab Language: <input type="text" name="glang" /><br/>';
echo 'Language: <input type="text" name="lang" /><br/>';
echo 'Edition_1: <input type="text" name="Edition_1" />';
echo 'Edition_2: <input type="text" name="Edition_2" />';

echo '<input type="submit" name="good" value="go" /><br />';

echo '</form>';

if (isset($_POST['good'])) {
   $query = "SELECT * FROM YGO_SET_" . $_POST['glang'] . " WHERE YGO_SET_" . $_POST['glang'] . ".Set_Num LIKE '%$_POST[set_abb]%' ORDER BY YGO_SET_" . $_POST['glang'] . ".Set_Num ASC";

   $result = mysql_query($query);
   while($row = mysql_fetch_array($result)){
      //echo $row['Set_Num'] . " " . $row['Set_Name'] ."<br/>";
      $tempSetNum = explode($_POST['set_abb'], $row['Set_Num']);
      $newSetNum = $_POST['new_set_abb'] . "" . $tempSetNum[1];

      $sql_1="INSERT INTO YGO_SET_" . $_POST['lang'] . " (Set_Num, Set_Name, Edition_1, Edition_2, Rarity_1, Rarity_2, Rarity_3, Number, DB_ID, Set_Type, Release_Date) VALUES ('$newSetNum','$_POST[set_name]','$_POST[Edition_1]','$_POST[Edition_2]','$row[Rarity_1]','$row[Rarity_2]','$row[Rarity_3]','$row[Number]','$row[DB_ID]','$row[Set_Type]','$row[Release_Date]')";

      echo $newSetNum . " " . $_POST['set_name'] . " " . $_POST['Edition_1'] . " " . $_POST['Edition_2'] . " " . $row['Rarity_1'] . " " . $row['Rarity_2'] . " " . $row['Rarity_3'] . " " . $row['Number'] . "<br/>";

      if (!mysql_query($sql_1,$con)){
         echo "Sad Day T-T" . "<br />";
      }else{
      }
   }
}

mysql_close($con);
?>

</body>
</html>