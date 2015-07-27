<!-- xml version="1.0" encoding="UTF-8" --> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<body>

<?php
header('Content-Type: text/html; charset=utf-8');

$con = mysql_connect("localhost","vinceoa2_ygo","ki_234_ki");
if (!$con){
  die('Could not connect: ' . mysql_error());
}else{
  echo "Whee! Connected!" . "<br />";
  mysql_set_charset('utf8',$con); 
}

mysql_select_db("vinceoa2_ygo", $con);

if($_POST['woot'] == 'shit'){
   $i = 0;
   echo "zero";
}else{
   $i = 1;
   echo "one";
}

for($i; $i <= $_POST['amount']; $i++){
   $set_num = 'set_num_' . $i;
   $rarity_1 = 'rarity_1_' . $i;
   $rarity_2 = 'rarity_2_' . $i;
   $rarity_3 = 'rarity_3_' . $i;
   $number = 'number_' . $i;
   echo $_POST[$set_num] . $_POST['set_name'] . $_POST['edition_1'] . $_POST['edition_2'] . $_POST[$rarity_1] . $_POST[$rarity_2] . $_POST[$rarity_3] . $_POST[$number] .  "<br />";

//$sql_1="INSERT INTO YGO_SET_EN (Set_Num, Set_Name, Edition_1, Edition_2, Rarity_1, Rarity_2, Rarity_3, Number, Set_Type, Release_Date) VALUES ('$_POST[$set_num]','$_POST[set_name]','$_POST[edition_1]','$_POST[edition_2]','$_POST[$rarity_1]','$_POST[$rarity_2]','$_POST[$rarity_3]','$_POST[$number]','$_POST[set_type]','$_POST[release_date]')";
$sql_1="INSERT INTO YGO_SET_JP (Set_Num, Set_Name, Edition_1, Rarity_1, Rarity_2, Rarity_3, Number, Set_Type, Release_Date) VALUES ('$_POST[$set_num]','$_POST[set_name]','$_POST[edition_1]','$_POST[$rarity_1]','$_POST[$rarity_2]','$_POST[$rarity_3]','$_POST[$number]','$_POST[set_type]','$_POST[release_date]')";

if (!mysql_query($sql_1,$con)){
  echo "Sad Day T-T" . "<br />";
  //die('Error: ' . mysql_error());
}else{
}

}

mysql_close($con);

?>
<br />
<a href="http://ygo.tgcdt.com/admin/ygo_set_form.php"><button type="button">Start Again!</button></a>

</body>
</html>