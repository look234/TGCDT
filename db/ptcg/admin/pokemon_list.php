<!-- xml version="1.0" encoding="UTF-8" --> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<style>
#lv {font-size:9px;}
#DB_ID {display:inline-block; width: 75px;}
#Name {display:inline-block; width: 300px;}
</style>
</head>
<body style="font-family:Verdana;">

<?php
include_once 'ygo_search_functions.php';

$con = mysql_connect("localhost","vinceoa2_ygo","ki_234_ki");
if (!$con){
  die('Could not connect: ' . mysql_error());
}else{
  mysql_set_charset('utf8');
}
mysql_select_db("vinceoa2_mtg", $con);

$search_card_name = mysql_real_escape_string($_POST['pokemon']);


$query = "SELECT * FROM MTG_CARDS WHERE EN_Name LIKE '" . $search_card_name . "' ORDER BY EN_Name";

   $result = mysql_query($query);

   while($row = mysql_fetch_array($result)){
      echo '<div style="border-bottom:3px solid black; width:100%;">';
      echo '<div id="DB_ID">' . $row['DB_ID'] . '</div> ';
      echo '<div id="Name">';
      echo $row['EN_Name'] . ' ';
      echo '</div>';
         echo '<span style="display:inline-block; width:150px; top:5px; font-weight:bold;">';
         echo $row['Color'];
         echo '</span>';
      echo '</div>';
   }

?>
Not here go add it! <a href="http://ptcg.tgcdt.com/pokemon_add.php" target="_blank">OVER HERE</a>
</body>
</html>