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

$con = mysql_connect("localhost","vinceoa2_pokemon","Luffy_234");
if (!$con){
  die('Could not connect: ' . mysql_error());
}else{
  echo "Whee! Added new cards!" . "<br />";
  mysql_set_charset('utf8',$con); 
}

mysql_select_db("vinceoa2_pokemon", $con);

for($i = 1; $i <= $_POST['num']; $i++){
   $poke_num = 'poke_num_' . $i;
   $name = 'name_' . $i;
   $prefix = 'prefix_' . $i;
   $suffix = 'suffix_' . $i;
   $stage = 'stage_' . $i;
   $hp = 'hp_' . $i;
   $type_1 = 'type_1_' . $i;
   $type_2 = 'type_2_' . $i;
   $weakness_1 = 'weakness_1_' . $i;
   $weakness_2 = 'weakness_2_' . $i;
   $weakness_X = 'weakness_X_' . $i;
   $resistance_1 = 'resistance_1_' . $i;
   $resistance_2 = 'resistance_2_' . $i;
   $resistance_X = 'resistance_X_' . $i;
   $retreat = 'retreat_' . $i;

      //echo "No." . $_POST[$poke_num] . " " . $_POST[$prefix] . " " . $_POST[$name] . " " . $_POST[$suffix] . " Stage " . $_POST[$stage] . " HP " . $_POST[$hp] .  " " . $_POST[$type] . " Weakness " . $_POST[$weakness] . " Resistance " . $_POST[$resistance] . " Retreat " . $_POST[$retreat] . " " . $_POST[$set_numbers] . "<br />";

      $sql_1="INSERT INTO PTCG_CARDS_EN_2 (Number, Name, Prefix, Suffix, Stage, HP, Type_1, Type_2, Weakness_1, Weakness_2, Weakness_X, Resistance_1, Resistance_2, Resistance_X, Retreat) VALUES ('$_POST[$poke_num]','$_POST[$name]','$_POST[$prefix]','$_POST[$suffix]','$_POST[$stage]','$_POST[$hp]','$_POST[$type_1]','$_POST[$type_2]','$_POST[$weakness_1]','$_POST[$weakness_2]','$_POST[$weakness_X]','$_POST[$resistance_1]','$_POST[$resistance_2]','$_POST[$resistance_X]','$_POST[$retreat]')";

      if (!mysql_query($sql_1,$con)){
         echo "Sad Day T-T" . "<br />";
         //die('Error: ' . mysql_error());
      }else{
      }

}

mysql_close($con);

?>
<br />
<a href="pokemon_add.php"><button type="button">Start Again!</button></a>

</body>
</html>