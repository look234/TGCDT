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

echo 'Find Set ID: <input type="text" name="set_id" value="' . $_POST[set_id] . '"/>';
echo 'New Set ID: <input type="text" name="new_set_id" value="' . $_POST[new_set_id] . '"/>';
echo 'New Set Abbr: <input type="text" name="new_set_abbr" value="' . $_POST[new_set_abbr] . '"/>';
echo 'New Edition: <input type="text" name="new_edition" value="' . $_POST[new_edition] . '"/>';
echo 'New Language: <input type="text" name="new_language" value="' . $_POST[new_language] . '"/>';

echo '<input type="submit" name="good" value="go" /><br />';

echo '</form>';

if (isset($_POST['good'])) {
   $query = "SELECT * FROM YGO_COMPLETE JOIN YGO_CARDS ON YGO_COMPLETE.Card_ID=YGO_CARDS.Card_ID WHERE YGO_COMPLETE.Set_ID LIKE '%" . $_POST['set_id'] . "%' ORDER BY YGO_CARDS.DB_Card_Num ASC";

   $result = mysql_query($query);
   while($row = mysql_fetch_array($result)){
      $temp = $_POST[new_set_abbr] . substr($row['DB_Card_Num'], 7);
      echo $temp . "<br/>";

      if($_POST[new_language] == $row['Card_Language']){
         $sql_1="INSERT INTO YGO_CARDS (DB_Card_Num, Edition, Rarity, Holo, Card_Language, Data_ID, Text_ID, Collect_ID) VALUES ('$temp','$_POST[new_edition]','$row[Rarity]','$row[Holo]','$_POST[new_language]','$row[Data_ID]','$row[Text_ID]','$row[Collect_ID]')";
      }else{
         $sql_1="INSERT INTO YGO_CARDS (DB_Card_Num, Edition, Rarity, Holo, Card_Language, Data_ID, Text_ID, Collect_ID) VALUES ('$temp','$_POST[new_edition]','$row[Rarity]','$row[Holo]','$_POST[new_language]','$row[Data_ID]','0','$row[Collect_ID]')";
      }

      if (!mysql_query($sql_1,$con)){
         echo "Sad Day T-T" . "<br />";
      }else{
      }

      $lastCard = "SELECT * FROM YGO_CARDS ORDER BY Card_ID DESC LIMIT 1";
      $theLastCard = mysql_query($lastCard);
      $row2 = mysql_fetch_array($theLastCard);

      $sql_2="INSERT INTO YGO_COMPLETE (Card_ID, Set_ID) VALUES ('$row2[Card_ID]','$_POST[new_set_id]')";

      if (!mysql_query($sql_2,$con)){
         echo "Sad Day T-T" . "<br />";
      }else{
      }
   }
}

mysql_close($con);
?>

</body>
</html>