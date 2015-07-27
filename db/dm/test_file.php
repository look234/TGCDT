<?php
   session_start();
   header('Content-Type: text/html; charset=utf-8');
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<?php include_once("analyticstracking.php") ?>


<?php
   $con = mysql_connect("localhost","vinceoa2_ygo","ki_234_ki");
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8',$con); 
   }

$temp_array = array();

   mysql_select_db("vinceoa2_dm", $con);
   $query = "SELECT * FROM DM_COMP_DB
INNER JOIN DM_SETS2_EN ON DM_COMP_DB.Set_ID = DM_SETS2_EN.Set2_ID
INNER JOIN DM_CARDS ON DM_COMP_DB.Card_ID = DM_CARDS.Card_ID WHERE DM_CARDS.EN_Name LIKE 'Chilias, the Oracle'";

   $result = mysql_query($query);
   if($result){
      while($row = mysql_fetch_array($result)){
         if(array_key_exists($row["Card_ID"], $temp_array)){
            array_push($temp_array[$row["Card_ID"]]["Sets"], $row["Set_Name"]);
         }else{
            $temp_array[$row["Card_ID"]] = $row["Card_ID"];
            $temp_array[$row["Card_ID"]] = array("Card" => $row["EN_Name"], "Sets" => array("0" => $row["Set_Name"]));
         }
      } //End while
   }//End if

foreach($temp_array as $key => $value){
   echo $temp_array[$key]["Card"] . "<br/><br/>";
   foreach($temp_array[$key]["Sets"] as $value){
      echo $value . "<br/>";
   }
}

?>