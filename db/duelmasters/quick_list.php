<!-- xml version="1.0" encoding="UTF-8" --> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<body style="background-color:black;">

<?php
header('Content-Type: text/html; charset=utf-8');

   $con = mysql_connect("localhost","vinceoa2_ygo","ki_234_ki");
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8');
   }

   mysql_select_db("vinceoa2_mtg", $con);
   $query = "SELECT * FROM MTG_CARDS ORDER BY Color, EN_Name";
   $result = mysql_query($query) or die(mysql_error());

$color = array("Red" => "#f9aa8f", "Blue" => "#aae0fa", "Black" => "#cbc2bf", "White" => "#fffbd5", "Green" => "#9bd3ae",
               "Multi" => "#d8c791", "Land" => "#d3cacb", "Colorless" => "#cbc2bf" ); 

   while($row = mysql_fetch_array($result)){ 

//Red #f9aa8f | Colorless #cbc2bf | Black #cbc2bf | Green #9bd3ae | Blue #aae0fa | White #fffbd5 | Multi #d8c791 | Land #d3cacb 

      echo '<div style="margin-bottom:5px; background-color:' . $color[$row['Color']] . '; border-radius:5px; font-family:\'Palatino Linotype\'; font-weight:bold; padding:5px;">';
      echo $row['EN_Name'] . " ";
      $splitCost = explode("|", $row['Mana_Cost']);
      foreach($splitCost as $value){
         if($value != ""){
            echo '<img src="images/' . $value . '.png" width="20px" />';
         }
      }
      echo '</div>';
   }
?>
</body>
</html>