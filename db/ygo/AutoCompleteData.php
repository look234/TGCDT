<?php
session_start();
?>
<?php
   header("Content-type: text/html; charset=utf-8");

   $con = mysql_connect("localhost","vinceoa2_read","Luffy_234");
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8');
   }

   mysql_select_db("vinceoa2_ygo", $con);


   if(($_SESSION['language'] == "EN") || ($_SESSION['language'] == "AE")){
      $query = "SELECT * FROM YGO_MONSTER_EN ORDER BY Name ASC";
      $result = mysql_query($query) or die(mysql_error()); 
      $names = array("0");
      $i = 0;
      echo '{ ';

      while($row = mysql_fetch_array($result)){
         if(!in_array($row['Name'], $names)){
            if($i == 0){
               $names[] = $row['Name'];
               $newName = htmlspecialchars($row['Name']);
               echo '"' . $i . '" : "' . $newName . '"';
               $i++;
            }else{
               $names[] = $row['Name'];
               $newName = htmlspecialchars($row['Name']);
               echo ',"' . $i . '" : "' . $newName . '"';
               $i++;
            }
         }
      }
   }elseif(($_SESSION['language']) == "JP" || ($_SESSION['language'] == "KR")){

      $query = "SELECT * FROM YGO_MONSTER_EN ORDER BY " . $_SESSION['language'] . "K_Name ASC";
      $result = mysql_query($query) or die(mysql_error()); 
      $names = array("0");
      $i = 0;
      echo '{ ';

      $nameLN = $_SESSION['language'] . "K_Name";
      while($row = mysql_fetch_array($result)){
         $splitName = explode("|", $row[$nameLN]);
         foreach($splitName as $value){
            $fixedName = $fixedName . $value;
         }
         if(!in_array($fixedName, $names)){
            if($i == 0){
               $names[] = $fixedName;
               echo '"' . $i . '" : "' . $fixedName . '"';
               $i++;
            }else{
               $names[] = $fixedName;
               echo ',"' . $i . '" : "' . $fixedName . '"';
               $i++;
            }
         }
         $fixedName = "";
      }
   }else{
      $query = "SELECT * FROM YGO_MONSTER_EN ORDER BY " . $_SESSION['language'] . "_Name ASC";
      $result = mysql_query($query) or die(mysql_error()); 
      $names = array("0");
      $i = 0;
      echo '{ ';

      $nameLN = $_SESSION['language'] . "_Name";
      while($row = mysql_fetch_array($result)){
         if(!in_array($row[$nameLN], $names)){
            if($i == 0){
               $names[] = $row[$nameLN];
               $newName = htmlspecialchars($row[$nameLN]);
               echo '"' . $i . '" : "' . $newName . '"';
               $i++;
            }else{
               $names[] = $row[$nameLN];
               $newName = htmlspecialchars($row[$nameLN]);
               echo ',"' . $i . '" : "' . $newName . '"';
               $i++;
            }
         }
      }
   }

   echo ' }';

?>