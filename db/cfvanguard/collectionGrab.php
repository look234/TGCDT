<?php
   session_start();

if($_SESSION['myid'] != ""){
   $con = mysql_connect("localhost","vinceoa2_read","Luffy_234");
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      //echo "Whee! Connected!" . "<br />";
   }
   mysql_select_db("vinceoa2_ygo", $con);

   if(!isset($_SESSION['language'])){
     $language = "EN";
   }else{
     $language = $_SESSION['language'];
   }

   $checklistString = "/home8/vinceoa2/public_html/user_data/" . $_SESSION['myid'] . "/ygo_checklist_" . $language . ".txt";

   $str_data = file_get_contents($checklistString, true);
   $data = json_decode($str_data,true);

   $query = "SELECT * FROM YGO_SET_" . $language ." INNER JOIN YGO_MONSTER_EN ON YGO_SET_" . $language .".Number = YGO_MONSTER_EN.Number";

         if (file_exists($checklistString)) {

            foreach($data as $key1=>$value1){
               foreach($data[$key1] as $key2=>$value2){
                  foreach($data[$key1][$key2] as $key3=>$value3){
                     $totalcount2 += $value3;
                     if($value3 > 0){
                        $singlecount++;
                     }
                  }
               }
            }
         }
   
   $result = mysql_query($query);
   if($result){
   while($row = mysql_fetch_array($result)){
         if($row['Set_Num'] == ''){
         }else{
            for($k = 1; $k < 4; $k++){
               $rarity = 'Rarity_' . $k;
               if($row[$rarity] != ''){
                  $totalcount += $data[$row['Set_Num']][$row['Edition_1']][$row[$rarity]];
                  $collectionCount++;
                  if($data[$row['Set_Num']][$row['Edition_1']][$row[$rarity]] > 0){
                     $userCollectionCount++;
                  }
                  if($row['Edition_2'] != ''){
                     $totalcount += $data[$row['Set_Num']][$row['Edition_2']][$row[$rarity]];
                     $collectionCount++;
                     if($data[$row['Set_Num']][$row['Edition_2']][$row[$rarity]] > 0){
                        $userCollectionCount++;
                     }
                  } //End if
               } //End if
            } //End for
         } //End ifelse
   } //End while

   echo $singlecount . " (" . $totalcount2 . ") " . " / " . $collectionCount;
   }//End if

}
?>