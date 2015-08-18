<?php

   $series_name = "KAIJUDO";
   include_once "../database_var.php";
   include_once "../../../bwahaha.php";

   $con2 = mysql_connect("localhost", $db_username_write, $db_password_write);
    if (!$con2){
        die('Could not connect: ' . mysql_error());
    }else{
        mysql_set_charset('utf8');
    }
    mysql_select_db("vinceoa2_" . $db_name, $con2);

if($_POST['funcType'] == 'AddInfo'){
   buildFields($_POST['seriesName'], $_POST['addType']);
}
if($_POST['funcType'] == 'SearchInfo'){
   $searchType = explode("_", $_POST['searchType']);
   searchFields($_POST['seriesName'], $searchType[1], $_POST['searchValue']);
}
if($_POST['funcType'] == 'SubmitInfo'){
   submitFields($_POST['seriesName'], $_POST['submitType'], $_POST['submitValues'], $_POST['submitValueNames']);
}
if($_POST['funcType'] == 'FinalSubmit'){
   finalSubmit($_POST['seriesName'], $_POST['submitType'], $_POST['submitValues'], $_POST['submitValueNames']);
}

function buildFields($series_name, $table_name){
    $result = mysql_query("SHOW COLUMNS FROM " . $series_name . "_" . $table_name);
    if (!$result) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }

    $temp_length = 0;
    if(mysql_num_rows($result) > 0){
        $rand = dechex(rand(0x000000, 0xFFFFFF));
        echo '<div style="border-radius: 5px; padding: 5px; margin: 5px; background-color: #' . $rand . ';" class="add_' . $table_name . '" >';
        while($row = mysql_fetch_assoc($result)){
            $pos = strpos($row['Field'], "_ID");
            if($pos === false){
                $result2 = mysql_query("SELECT MAX(LENGTH(" . $row['Field'] . ")) FROM " . $series_name . "_" . $table_name);
                $temp_row = str_replace("_", " ", $row['Field']);
                echo $temp_row . ' <input type="text" name="' . $row['Field'] . '" id="' . $row['Field'] . '" size="';
                while($row2 = mysql_fetch_assoc($result2)){
                    if($row2['MAX(LENGTH(' . $row['Field'] . '))'] != 0){
                        if($row2['MAX(LENGTH(' . $row['Field'] . '))'] > 100){
                           $temp_length += ($row2['MAX(LENGTH(' . $row['Field'] . '))']);
                           echo '100" value=""';
                        }else{
                           $temp_length += ($row2['MAX(LENGTH(' . $row['Field'] . '))']);
                           echo ($row2['MAX(LENGTH(' . $row['Field'] . '))']) . '" value=""';
                        }
                    }else{
                        $temp_length += 5;
                        echo "5";
                    }
                }
                echo '"> ';
                if($temp_length > 35){
                    echo ' <br/>';
                    $temp_length = 0;
                }
            }
        }
        if($table_name != "CARDS"){
           echo '<br/><br/><button type="submit" name="' . $table_name . '" class="add_cards_submit" id="add_cards_' . $table_name . '_submit" value="add_cards_' . $table_name . '_submit">Submit</button></div>';
        }else{
           echo '<br/><br/></div>';
        }
    }
    echo "<br/><br/>";
}

function searchFields($series_name, $table_name, $search_info){
    $result_col = mysql_query("SHOW COLUMNS FROM " . $series_name . "_" . $table_name);
    $query = "SELECT * FROM " . $series_name . "_" . $table_name . " WHERE ";
    if(mysql_num_rows($result_col) > 0){
        $total = mysql_num_rows($result_col);
        $count = 1;
        while($row2 = mysql_fetch_assoc($result_col)){
           if(($count < ($total)) && ($skip == 0) && ($count != 1)){
              $query .= " OR ";
           } 
           $skip = 0;
           if($row2['Type'] == 'int(11)' && is_numeric($search_info)){
              $count++;
              $query .= " " . $row2['Field'] . " = " . $search_info . " ";
           }elseif($row2['Type'] != 'int(11)' && !is_numeric($search_info)){
              $count++;
              $query .= " " . $row2['Field'] . " LIKE '" . $search_info . "%' ";
           }else{
              $count++;
              $skip = 1;
           }
        }
    }

   $result = mysql_query($query);
   if(!$result){
      echo 'Could not run query: ' . mysql_error();
      exit;
   }
   if(mysql_num_rows($result) > 0){
      while($row = mysql_fetch_assoc($result)){
         $rand = dechex(rand(0x000000, 0xFFFFFF));
         echo '<div style="border-radius: 5px; padding: 5px; margin: 5px; background-color: #' . $rand . ';" class="pass_' . $table_name . '" id="' . $row['Main_Set_ID'] . $row['Card_Data_ID'] . $row['Card_Text_ID'] . $row['Card_Collect_ID'] .'" >';
         foreach($row as $col_name => $value){
            echo '<strong>' . $col_name . '</strong>: ' . $value . '<br/>';
         }
         echo '</div>';
      }
   }
}

function submitFields($series_name, $table_name, $submit_values, $submit_value_names){
   $count = 0;
   $insert_query = "INSERT INTO " . $series_name . "_" . $table_name . " (";
   foreach($submit_value_names as $name){
      $count++;
      if($count == count($submit_value_names)){
         $insert_query .= $name;
      }else{
         $insert_query .= $name . ", ";
      }
   }
   $insert_query .= ") VALUES (";
   $count = 0;
   foreach($submit_values as $value){
      $count++;
      if($count == count($submit_values)){
         $insert_query .=  "'" . mysql_real_escape_string($value) . "'";
      }else{
         $insert_query .=  "'" . mysql_real_escape_string($value) . "',";
      }
   }
   $insert_query .= ");";

   //echo $insert_query;

   if (!mysql_query($insert_query)){
      $result = mysql_query($insert_query);
      if (!$result) {
        die('Invalid query: ' . mysql_error());
      }
      echo "Sad Day T-T If you see this call Vince." . "<br />";
   }else{
      echo $face_array[array_rand($face_array)] . " HAHA, COOKIES ON DOWELS!" . "<br />";
   }

   $search_attack_name_query = "SELECT * FROM " . $series_name . "_" . $table_name . " ORDER BY Card_" . ucwords($table_name) . "_ID DESC LIMIT 1";

   $result = mysql_query($search_attack_name_query); 

   while($row2 = mysql_fetch_array($result)){ 
      $rand = dechex(rand(0x000000, 0xFFFFFF));
      echo '<div style="border-radius: 5px; padding: 5px; margin: 5px; background-color: #' . $rand . ';" class="pass_' . $table_name . '" id="' . $row2['Main_Set_ID'] . $row2['Card_Data_ID'] . $row2['Card_Text_ID'] . $row2['Card_Collect_ID'] .'" >';
      foreach($row2 as $col_name => $value){
         if(!is_numeric($col_name)){
            echo '<strong>' . $col_name . '</strong>: ' . $value . '<br/>';
         }
      }
      echo '</div>';
   }
}

function finalSubmit($series_name, $table_name, $submit_values, $submit_value_names){
   echo $face_array[array_rand($face_array)] . "woot<br />";

   $temp_card_ID = "";
   $count = 0;
   $insert_query = "INSERT INTO " . $series_name . "_" . $table_name . " (";
   foreach($submit_value_names as $name){
      $count++;
      if($count == count($submit_value_names)){
         $insert_query .= $name;
      }else{
         $insert_query .= $name . ", ";
      }
   }
   $insert_query .= ") VALUES (";
   $count = 0;
   foreach($submit_values as $value){
      $count++;
      if($count == count($submit_values)){
         $insert_query .=  "'" . mysql_real_escape_string($value) . "'";
      }else{
         $insert_query .=  "'" . mysql_real_escape_string($value) . "',";
      }
   }
   $insert_query .= ");";

   if (!mysql_query($insert_query)){
      echo "<br />Sad Day T-T If you see this call Vince." . "<br />";
   }else{
      echo "<br />" . $face_array[array_rand($face_array)] . " HAHA, COOKIES ON DOWELS!" . "<br />";
   }

   $search_attack_name_query = "SELECT * FROM " . $series_name . "_" . $table_name . " WHERE Data_ID LIKE '" . $submit_values[5] . "%' AND Text_ID LIKE '" . $submit_values[6] . "%' AND Collect_ID LIKE '" . $submit_values[7] . "%' ORDER BY Card_ID ASC";

   $result = mysql_query($search_attack_name_query); 

   while($row = mysql_fetch_array($result)){ 
      $temp_card_ID = $row['Card_ID'];
      echo $temp_card_ID;
      echo "<br/><br/>";
   }

   $insert_query2 = "INSERT INTO " . $series_name . "_COMPLETE (Card_ID, Set_ID) VALUES ('" . $temp_card_ID . "','" . $_POST['set_id'] . "')";

   if (!mysql_query($insert_query2)){
      echo "<br />Sad Day T-T If you see this call Vince." . "<br />";
   }else{
      echo "<br />" . $face_array[array_rand($face_array)] . " HAHA, COOKIES ON DOWELS! AGAIN!" . "<br />";
   }

}
?>