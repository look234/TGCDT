<!-- xml version="1.0" encoding="UTF-8" --> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<style>
span {
  display: inline-block;
  width: 200px;
  font-size:11px;
}
span#num {
  display: inline-block;
  width: 100px;
}
</style>

</head>
<body>

<form method="post" action="">
<?php


$con = mysql_connect("localhost","vinceoa2_ygo","ki_234_ki");
if (!$con){
  die('Could not connect: ' . mysql_error());
}else{
  echo "Whee! Connected!" . "<br />";
  mysql_set_charset('utf8',$con); 
}



mysql_select_db("vinceoa2_ygo", $con);

echo '<form method="post" action="">';

echo 'Set Abbreviation: <input type="text" name="set_abb" />';

echo '<input type="submit" name="good" value="go" /><br />';

echo '</form>';

if (isset($_POST['good'])) {
   $query = "SELECT * FROM YGO_SET_EN INNER JOIN YGO_MONSTER_EN ON YGO_SET_EN.DB_ID = YGO_MONSTER_EN.DB_ID WHERE YGO_SET_EN.Set_Num LIKE '%$_POST[set_abb]%' ORDER BY YGO_SET_EN.Set_Num ASC";


   echo '<form method="post" action="">';
   $result = mysql_query($query);
   while($row = mysql_fetch_array($result)){
      $count++;

      echo '<span id="num">' . $row['Set_Num'] . '</span>';
      if($row['Name'] == ""){
         echo ' <span><b>EN</b> <input type="text" name="name_' . $count . '[name_EN]" /></span>';
      }else{
          echo ' <span><b>EN</b> ' . $row['Name'] . '</span>';
      }
      if($row['FR_Name'] == ""){
         echo ' <span><b>FR</b> <input type="text" name="name_' . $count . '[name_FR]" /></span>';
      }else{
          echo ' <span><b>FR</b> ' . $row['FR_Name'] . '</span>';
      }
      if($row['DE_Name'] == ""){
         echo ' <span><b>DE</b> <input type="text" name="name_' . $count . '[name_DE]" /></span>';
      }else{
          echo ' <span><b>DE</b> ' . $row['DE_Name'] . '</span>';
      }
      if($row['IT_Name'] == ""){
         echo ' <span><b>IT</b> <input type="text" name="name_' . $count . '[name_IT]" /></span>';
      }else{
          echo ' <span><b>IT</b> ' . $row['IT_Name'] . '</span>';
      }
      if($row['PT_Name'] == ""){
         echo ' <span><b>PT</b> <input type="text" name="name_' . $count . '[name_PT]" /></span>';
      }else{
          echo ' <span><b>PT</b> ' . $row['PT_Name'] . '</span>';
      }
      if($row['SP_Name'] == ""){
         echo ' <span><b>SP</b> <input type="text" name="name_' . $count . '[name_SP]" /></span>';
      }else{
          echo ' <span><b>SP</b> ' . $row['SP_Name'] . '</span>';
      }
      echo '<br/><span id="num">' . $row[Number] . '</span>';
      if($row['JPK_Name'] == ""){
         echo ' <span><b>JPK</b> <input type="text" name="name_' . $count . '[name_JPK]" /></span>';
      }else{
          echo ' <span><b>JPK</b> ' . $row['JPK_Name'] . '</span>';
      }
      if($row['JPH_Name'] == ""){
         echo ' <span><b>JPH</b> <input type="text" name="name_' . $count . '[name_JPH]" /></span>';
      }else{
          echo ' <span><b>JPH</b> ' . $row['JPH_Name'] . '</span>';
      }
      if($row['KRK_Name'] == ""){
         echo ' <span><b>KRK</b> <input type="text" name="name_' . $count . '[name_KRK]" /></span>';
      }else{
          echo ' <span><b>KRK</b> ' . $row['KRK_Name'] . '</span>';
      }
      if($row['KRH_Name'] == ""){
         echo ' <span><b>KRH</b> <input type="text" name="name_' . $count . '[name_KRH]" /></span>';
      }else{
          echo ' <span><b>KRH</b> ' . $row['KRH_Name'] . '</span>';
      }
      echo '<input type="hidden" name="number_' . $count . '" value="' . $row[Number] . '" /><br/>';
   }


   echo '<input type="text" name="amount" value="' . $count . '" />';
   echo '<input type="submit" name="good2" value="go" /><br />';
   echo '</form>';
}


   if(isset($_POST['good2'])) {
      for($i = 1; $i <= $_POST['amount']; $i++){
         $name = 'name_' . $i;
         $number = 'number_' . $i;

         $goSQL = 0;
         foreach($_POST[$name] as $value){
            if($value != ""){
               $goSQL = 1;
            }
         }
$previous = 0;
         if($goSQL == 1){
            $sql_1 = "UPDATE YGO_MONSTER_EN SET ";

         if($_POST[$name][name_EN] != ""){
            $sql_1 = $sql_1 . "Name = '" . $_POST[$name][name_EN] . "' ";
            $previous = 1;
         }
         if($_POST[$name][name_FR] != ""){
            if($previous == 1){
               $sql_1 = $sql_1 . ", FR_Name = '" . $_POST[$name][name_FR] . "' ";
            }else{
               $sql_1 = $sql_1 . "FR_Name = '" . $_POST[$name][name_FR] . "' ";
               $previous = 1;
            }
         }
         if($_POST[$name][name_DE] != ""){
            if($previous == 1){
               $sql_1 = $sql_1 . ", DE_Name = '" . $_POST[$name][name_DE] . "' ";
            }else{
               $sql_1 = $sql_1 . "DE_Name = '" . $_POST[$name][name_DE] . "' ";
               $previous = 1;
            }
         }
         if($_POST[$name][name_IT] != ""){
            if($previous == 1){
               $sql_1 = $sql_1 . ", IT_Name = '" . $_POST[$name][name_IT] . "' ";
            }else{
               $sql_1 = $sql_1 . "IT_Name = '" . $_POST[$name][name_IT] . "' ";
               $previous = 1;
            }
         }
         if($_POST[$name][name_PT] != ""){
            if($previous == 1){
               $sql_1 = $sql_1 . ", PT_Name = '" . $_POST[$name][name_PT] . "' ";
            }else{
               $sql_1 = $sql_1 . "PT_Name = '" . $_POST[$name][name_PT] . "' ";
               $previous = 1;
            }
         }
         if($_POST[$name][name_SP] != ""){
            if($previous == 1){
               $sql_1 = $sql_1 . ", SP_Name = '" . $_POST[$name][name_SP] . "' ";
            }else{
               $sql_1 = $sql_1 . "SP_Name = '" . $_POST[$name][name_SP] . "' ";
               $previous = 1;
            }
         }
         if($_POST[$name][name_JPK] != ""){
            if($previous == 1){
               $sql_1 = $sql_1 . ", JPK_Name = '" . $_POST[$name][name_JPK] . "' ";
            }else{
               $sql_1 = $sql_1 . "JPK_Name = '" . $_POST[$name][name_JPK] . "' ";
               $previous = 1;
            }
         }
         if($_POST[$name][name_JPH] != ""){
            if($previous == 1){
               $sql_1 = $sql_1 . ", JPH_Name = '" . $_POST[$name][name_JPH] . "' ";
            }else{
               $sql_1 = $sql_1 . "JPH_Name = '" . $_POST[$name][name_JPH] . "' ";
               $previous = 1;
            }
         }
         if($_POST[$name][name_KRK] != ""){
            if($previous == 1){
               $sql_1 = $sql_1 . ", KRK_Name = '" . $_POST[$name][name_KRK] . "' ";
            }else{
               $sql_1 = $sql_1 . "KRK_Name = '" . $_POST[$name][name_KRK] . "' ";
               $previous = 1;
            }
         }
         if($_POST[$name][name_KRH] != ""){
            if($previous == 1){
               $sql_1 = $sql_1 . ", KRH_Name = '" . $_POST[$name][name_KRH] . "' ";
            }else{
               $sql_1 = $sql_1 . "KRH_Name = '" . $_POST[$name][name_KRH] . "' ";
            }
         }
         $sql_1 = $sql_1 . "WHERE Number = '" . $_POST[$number] . "'";

         }



         if($goSQL == 1){
            echo $sql_1 . "<br/>";
            if (!mysql_query($sql_1,$con)){
               echo "Sad Day T-T" . "<br />";
            }else{
            }
         }
      }
   }

mysql_close($con);
?>


</body>
</html>