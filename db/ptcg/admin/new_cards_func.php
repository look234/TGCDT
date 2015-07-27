<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
   header("Content-type: text/html; charset=utf-8");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>

</head>


<?php
   include_once "../database_var.php";
   include_once "../../../bwahaha.php";

   $con2 = mysql_connect("localhost", $db_username_write, $db_password_write);
   if (!$con2){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8');
   }
   mysql_select_db("vinceoa2_" . $db_name, $con2);

$face_array = [ "( .o.)", "( `·´ )", "( ° ͜ ʖ °)", "( ͡° ͜ʖ ͡°)", "( ﾟヮﾟ)", "(\\/)(°,,,°)(\\/)", "(¬º-°)¬", "(¬‿¬)", "(´・ω・)っ", "(ʘ‿ʘ)", "(͡° ͜ʖ ͡°)", "(ಠ‿ಠ)", "(ಠ⌣ಠ)", "(ง ͠° ͟ل͜ ͡°)ง", "(ง ͡ʘ ͜ʖ ͡ʘ)ง", "(ง°ل͜°)ง", "(ง⌐□ل͜□)ง", "(ღ˘⌣˘ღ)", "(ᵔᴥᵔ)", "(•ω•)", "(•◡•)/", "(⊙ω⊙)", "(⌐■_■)", "(─‿‿─)", "(╯°□°）╯", "(◕‿◕)", "(☞ﾟ∀ﾟ)☞", "(❍ᴥ❍ʋ)", "(っ◕‿◕)っ", "(づ｡◕‿‿◕｡)づ", "(ノ・∀・)ノ", "(｀◔ ω ◔´)", "(｡◕‿‿◕｡)", "(ﾉ◕ヮ◕)ﾉ", "=^.^=", "| (• ◡•)|", "~(˘▾˘~)", "ʅʕ•ᴥ•ʔʃ", "ʕ´•ᴥ•`ʔ", "ʕ•ᴥ•ʔ", "ʘ‿ʘ", "͡° ͜ʖ ͡°", "ಠ‿ಠ", "ಠ⌣ಠ", "ง ͠° ل͜ °)ง", "༼ つ ◕_◕ ༽つ", "ᕕ( ᐛ )ᕗ", "ᕙ(⇀‸↼‶)ᕗ", "ᕙ༼ຈل͜ຈ༽ᕗ", "≧☉_☉≦", "┌( ಠ_ಠ)┘", "╚(ಠ_ಠ)=┐", "◔ ⌣ ◔", "◕‿↼", "◕‿◕", "☜(⌒▽⌒)☞", "☼.☼", "♥‿♥", "✌(-‿-)✌", "〆(・∀・＠)", "ヽ༼° ͟ل͜ ͡°༽ﾉ", "ヽ༼ʘ̚ل͜ʘ̚༽ﾉ", "ヽ༼ຈل͜ຈ༽ง", "ヽ༼ຈل͜ຈ༽ﾉ", "ヽ༼Ὸل͜ຈ༽ﾉ", "ヾ(⌐■_■)ノ", "꒰･◡･๑꒱", "｡◕‿◕｡", "ʕノ◔ϖ◔ʔノ", "ಠﭛಠ", "(๑>ᴗ<๑)", "(✌ﾟ∀ﾟ)☞", "ಥ‿ಥ", "ヾ(´￢｀)ﾉ", "(ᵒ̤̑ ₀̑ ᵒ̤̑)", "\_(ʘ_ʘ)_/" ];

function energyReplace($string){
   $string = str_replace("[[Water]]", "<img src='Water.png' height='15px' />", $string);
   $string = str_replace("[[Colorless]]", "<img src='Colorless.png' height='15px' />", $string);
   $string = str_replace("[[Fairy]]", "<img src='Fairy.png' height='15px' />", $string);
   $string = str_replace("[[Fighting]]", "<img src='Fighting.png' height='15px' />", $string);
   $string = str_replace("[[Fire]]", "<img src='Fire.png' height='15px' />", $string);
   $string = str_replace("[[Grass]]", "<img src='Grass.png' height='15px' />", $string);
   $string = str_replace("[[Lightning]]", "<img src='Lightning.png' height='15px' />", $string);
   $string = str_replace("[[Psychic]]", "<img src='Psychic.png' height='15px' />", $string);
   $string = str_replace("[[Metal]]", "<img src='Metal.png' height='15px' />", $string);
   $string = str_replace("[[Darkness]]", "<img src='Darkness.png' height='15px' />", $string);
   $string = str_replace("[[Dragon]]", "<img src='Dragon.png' height='15px' />", $string);
   $string = str_replace("[[None]]", "<img src='None.png' height='15px' />", $string);
   $string = str_replace("(", "<em>(", $string);
   $string = str_replace(")", ")</em>", $string);
   return $string;
}

function typeReplace($string){
   $string = str_replace("Water", "<img src='Water.png' />", $string);
   $string = str_replace("Colorless", "<img src='Colorless.png' />", $string);
   $string = str_replace("Fairy", "<img src='Fairy.png' />", $string);
   $string = str_replace("Fighting", "<img src='Fighting.png' />", $string);
   $string = str_replace("Fire", "<img src='Fire.png' />", $string);
   $string = str_replace("Grass", "<img src='Grass.png' />", $string);
   $string = str_replace("Lightning", "<img src='Lightning.png' />", $string);
   $string = str_replace("Psychic", "<img src='Psychic.png' />", $string);
   $string = str_replace("Metal", "<img src='Metal.png' />", $string);
   $string = str_replace("Darkness", "<img src='Darkness.png' />", $string);
   $string = str_replace("Dragon", "<img src='Dragon.png' />", $string);
   return $string;
}

function langReplace($string){
            switch($string){
              case "English":
                 echo "EN";
                 break;
              case "Japanese":
                 echo "JA";
                 break;
              case "Korean":
                 echo "KO";
                 break;
              case "French":
                 echo "FR";
                 break;
              case "Italian":
                 echo "IT";
                 break;
              case "German":
                 echo "DE";
                 break;
              case "Spanish":
                 echo "ES";
                 break;
              case "Russian":
                 echo "RU";
                 break;
              case "Chinese":
                 echo "ZH";
                 break;
              case "Dutch":
                 echo "NL";
                 break;
              case "Polish":
                 echo "PL";
                 break;
              case "Portuguese":
                 echo "PT";
                 break;
              case "Swedish":
                 echo "SV";
                 break;
              default:
                 echo "EN";
                 break;
            }
   //return $temp_language;
}
if($_POST['lang_switch'] == "okay"){
   echo '<span class="filterLabels">Set Name</span>';
   echo '<select id="set_id" name="Set_ID" >';
   echo '<option value=""></option>';
      $type_Query = "SELECT * FROM PTCG_SETS WHERE Set_Language LIKE '" . $_POST['lang'] . "' ORDER BY Release_Date DESC";

      $tempBResult = mysql_query($type_Query);
      if($tempBResult){
         while($row = mysql_fetch_array($tempBResult)){
            if($row['Set_Language'] != ''){
               echo '<option value="' . $row['Main_Set_ID'] . '">' . $row['Main_Set_ID'] . ' - ' . $row['Release_Date'] . ' - (' . $row['Set_Abbr'] . ') ' . $row['EN_Set_Name'] . ' [' . $row['Set_Type'] . '] </option>';
            }
         }
      }
      echo '</select>';
}

if($_POST['new_set'] == "new_set"){
   echo '<br/><span>Set Abbr</span> <input type="text" id="set_abbr"> </input>';
   echo '<span>Set Name</span> <input type="text" id="set_name"> </input>';
   echo '<span>Set Lang</span> <input type="text" id="set_lang"> </input>';
   echo '<span>Set Type</span> <input type="text" id="set_type"> </input>';
   echo '<span>Release Date</span> <input type="text" id="release_date"> </input>';
   echo '<button type="submit" name="new_set_submit" id="new_set_submit" value="new_set_submit">Submit</button><br/>';
}

if($_POST['new_set_submit'] == "new_set_submit"){
   $insert_query = "INSERT INTO PTCG_SETS (Set_Abbr, EN_Set_Name, Set_Language, Set_Type, Release_Date)
VALUES ('" . $_POST['set_abbr'] . "','" . $_POST['set_name'] . "','" . $_POST['set_lang'] . "','" . $_POST['set_type'] . "','" . $_POST['release_date'] . "')";

      if (!mysql_query($insert_query,$con2)){
         echo "Sad Day T-T" . "<br />";
         //die('Error: ' . mysql_error());
      }else{
         echo $face_array[array_rand($face_array)] . "HAHA, COOKIES ON DOWELS!" . "<br />";
      }
}

//Data

if($_POST['add_cards_data'] == "add_cards_data"){
   echo '<br/><span>Nat. Dex Number</span> <input type="text" size="2" id="Number"> </input>';
   echo '<span>EN Name</span> <input type="text" id="EN_Name"> </input>';
   echo '<span>Prefix</span> <input type="text" size="7" id="Prefix"> </input>';
   echo '<span>Suffix</span> <input type="text" size="7" id="Suffix"> </input>';
   echo '<span>Stage</span> <input type="text" size="7" id="Stage"> </input>';
   echo '<span>HP</span> <input type="text" size="2" id="HP"> </input>';
   echo '<span>Type 1</span> <input type="text" size="4" id="Type_1"> </input>';
   echo '<span>Type 2</span> <input type="text" size="4" id="Type_2"> </input><br/>';
   echo '<span>Weakness 1</span> <input type="text" size="4" id="Weakness_1"> </input>';
   echo '<span>Weakness 2</span> <input type="text" size="4" id="Weakness_2"> </input>';
   echo '<span>Weakness X</span> <input type="text" size="2" id="Weakness_X"> </input>';
   echo '<span>Resistance 1</span> <input type="text" size="4" id="Resistance_1"> </input>';
   echo '<span>Resistance 2</span> <input type="text" size="4" id="Resistance_2"> </input>';
   echo '<span>Resistance X</span> <input type="text" size="2" id="Resistance_X"> </input>';
   echo '<span>Retreat</span> <input type="text" size="2" id="Retreat"> </input><br/>';
   echo '<span>JA Name</span> <input type="text" id="JA_Name"> </input>';
   echo '<span>KO Name</span> <input type="text" id="KO_Name"> </input>';
   echo '<span>FR Name</span> <input type="text" id="FR_Name"> </input><br/>';
   echo '<span>RU Name</span> <input type="text" id="RU_Name"> </input>';
   echo '<span>DE Name</span> <input type="text" id="DE_Name"> </input>';
   echo '<span>IT Name</span> <input type="text" id="IT_Name"> </input><br/>';
   echo '<span>PT Name</span> <input type="text" id="PT_Name"> </input>';
   echo '<span>ES Name</span> <input type="text" id="ES_Name"> </input>';
   echo '<span>ZH Name</span> <input type="text" id="ZH_Name"> </input><br/><br/>';
   echo '<button type="submit" name="add_cards_data_submit" class="add_cards_data_submit" id="add_cards_data_submit" value="add_cards_data_submit">Submit</button><br/>';
}

if($_POST['search_card_name'] == "search_card_name"){
   if($_POST['Card_Name'] != ""){

   $search_card_name_query = "SELECT * FROM PTCG_DATA WHERE (EN_Name LIKE '" . $_POST['Card_Name'] . "%' OR RU_Name LIKE '" . $_POST['Card_Name'] . "%' OR RU_Name LIKE '" . $_POST['Card_Name'] . "%' OR KO_Name LIKE '" . $_POST['Card_Name'] . "%' OR DE_Name LIKE '" . $_POST['Card_Name'] . "%' OR IT_Name LIKE '" . $_POST['Card_Name'] . "%' OR PT_Name LIKE '" . $_POST['Card_Name'] . "%' OR ES_Name LIKE '" . $_POST['Card_Name'] . "%' OR ZH_Name LIKE '" . $_POST['Card_Name'] . "%') AND HP LIKE '" . $_POST['HP'] . "%' ORDER BY Prefix, EN_Name, Suffix, HP, Retreat, Weakness_1, Resistance_1 ASC";

   $result2 = mysql_query($search_card_name_query);

   while($row2 = mysql_fetch_array($result2)){ 
      echo "<div class='list " . $row2['Type_1'] . " ptcg_name' id='" . $row2['Card_Data_ID'] . "' >";
      echo "<div style='width: 10%; display:inline-block;' >";
      echo "<strong><u>Data ID</u></strong><br/><span class='theIDs'>" . $row2['Card_Data_ID'] . "</span><br/>";
      echo "</div>";
      echo "<div style='width: 90%; display:inline-block;' >";
      echo typeReplace($row2['Type_1']) . " " . typeReplace($row2['Type_2']) . " <span class='card_name_style'><strong>" . $row2['Prefix'] . " " . $row2['EN_Name'] . " " . $row2['Suffix'] . "</strong></span> HP<span class='card_name_style'><strong>" . $row2['HP'] . "</strong></span> " . $row2['Stage'] . "<br/>";
      echo "<strong>Weakness:</strong> " . typeReplace($row2['Weakness_1']) . "" . typeReplace($row2['Weakness_2']) . "" . $row2['Weakness_X'] . " <strong>Resistance:</strong> " . typeReplace($row2['Resistance_1']) . "" . typeReplace($row2['Resistance_2']) . "" . $row2['Resistance_X'] . " <strong>Retreat Cost:</strong> ";

      for($h = 0; $h < $row2['Retreat'];$h++){
      echo "<img src='Colorless.png' height='15px' />";
      }
      echo "<br/><br/>";

      echo " <strong>French:</strong> " . $row2['FR_Name'] . " <strong>German:</strong> " . $row2['DE_Name'] . " <strong>Italian:</strong> " . $row2['IT_Name'] . "<strong>Spanish:</strong> " . $row2['ES_Name'] . " <strong>Portuguese:</strong> " . $row2['PT_Name'];
      echo "<strong>Japanese:</strong> " . $row2['JA_Name'] . " <strong>Korean:</strong> " . $row2['KO_Name'] . " <strong>Chinese:</strong> " . $row2['ZH_Name'] . " <strong>Russian:</strong> " . $row2['RU_Name'] . "<br/>";
      echo "</div>";
      echo "</div>";
   }
   }else{
      echo "<br/>(ノಠ益ಠ)ノ Did you forget something...<br/>";
   }

}

if($_POST['add_cards_data_submit'] == "add_cards_data_submit"){
   $insert_query = "INSERT INTO PTCG_DATA (Number, EN_Name, Prefix, Suffix, Stage, HP, Type_1, Type_2, Weakness_1, Weakness_2, Weakness_X, Resistance_1, Resistance_2, Resistance_X, Retreat, RU_Name, JA_Name, KO_Name, FR_Name, DE_Name, IT_Name, PT_Name, ES_Name, ZH_Name) VALUES ('" . mysql_real_escape_string($_POST['Number']) . "','" . mysql_real_escape_string($_POST['EN_Name']) . "','" . mysql_real_escape_string($_POST['Prefix']) . "','" . mysql_real_escape_string($_POST['Suffix']) . "','" . mysql_real_escape_string($_POST['Stage']) . "','" . $_POST['HP'] . "','" . mysql_real_escape_string($_POST['Type_1']) . "','" . $_POST['Type_2'] . "','" . mysql_real_escape_string($_POST['Weakness_1']) . "','" . $_POST['Weakness_2'] . "','" . mysql_real_escape_string($_POST['Weakness_X']) . "','" . $_POST['Resistance_1'] . "','" . mysql_real_escape_string($_POST['Resistance_2']) . "','" . $_POST['Resistance_X'] . "','" . mysql_real_escape_string($_POST['Retreat']) . "','" . mysql_real_escape_string($_POST['RU_Name']) . "','" . mysql_real_escape_string($_POST['JA_Name']) . "','" . mysql_real_escape_string($_POST['KO_Name']) . "','" . mysql_real_escape_string($_POST['FR_Name']) . "','" . mysql_real_escape_string($_POST['DE_Name']) . "','" . mysql_real_escape_string($_POST['IT_Name']) . "','" . mysql_real_escape_string($_POST['PT_Name']) . "','" . mysql_real_escape_string($_POST['ES_Name']) . "','" . mysql_real_escape_string($_POST['ZH_Name']) . "')";

   if (!mysql_query($insert_query,$con2)){
      echo "Sad Day T-T If you see this call Vince." . "<br />";
   }else{
      echo $face_array[array_rand($face_array)] . " HAHA, COOKIES ON DOWELS!" . "<br />";
   }

   $search_attack_name_query = "SELECT * FROM PTCG_DATA WHERE EN_Name LIKE '" . $_POST['EN_Name'] . "%' AND JA_Name LIKE '" . $_POST['JA_Name'] . "%' ORDER BY Card_Data_ID DESC";

   $result = mysql_query($search_attack_name_query); 

   while($row = mysql_fetch_array($result)){ 
      echo "<div class='list " . $row['Type_1'] . " ptcg_name' id='" . $row2['Card_Data_ID'] . "' >";
      echo "<div style='width: 10%; display:inline-block;' >";
      echo "<strong><u>Data ID</u></strong><br/><span class='theIDs'>" . $row['Card_Data_ID'] . "</span><br/>";
      echo "</div>";
      echo "<div style='width: 90%; display:inline-block;' >";
      echo typeReplace($row['Type_1']) . " " . typeReplace($row['Type_2']) . " <span class='card_name_style'><strong>" . $row['Prefix'] . " " . $row['EN_Name'] . " " . $row['Suffix'] . "</strong></span> HP<span class='card_name_style'><strong>" . $row['HP'] . "</strong></span> " . $row['Stage'] . "<br/>";
      echo "<strong>Weakness:</strong> " . typeReplace($row['Weakness_1']) . "" . typeReplace($row['Weakness_2']) . "" . $row['Weakness_X'] . " <strong>Resistance:</strong> " . typeReplace($row['Resistance_1']) . "" . typeReplace($row['Resistance_2']) . "" . $row['Resistance_X'] . " <strong>Retreat Cost:</strong> ";

      for($h = 0; $h < $row['Retreat'];$h++){
      echo "<img src='Colorless.png' height='15px' />";
      }
      echo "<br/><br/>";

      echo " <strong>French:</strong> " . $row['FR_Name'] . " <strong>German:</strong> " . $row['DE_Name'] . " <strong>Italian:</strong> " . $row['IT_Name'] . "<strong>Spanish:</strong> " . $row['ES_Name'] . " <strong>Portuguese:</strong> " . $row['PT_Name'];
      echo "<strong>Japanese:</strong> " . $row['JA_Name'] . " <strong>Korean:</strong> " . $row['KO_Name'] . " <strong>Chinese:</strong> " . $row['ZH_Name'] . " <strong>Russian:</strong> " . $row['RU_Name'] . "<br/>";
      echo "</div>";
      echo "</div>";
   }
}






//Collect

if($_POST['add_cards_collect'] == "add_cards_collect"){
   echo '<br/><span>Set Number</span> <input type="text" size="6" id="Set_Number"> </input><br/>';
   echo '<span>Set Icon</span> <input type="text" id="Set_Icon"> </input>';
   echo '<span>Artist</span> <input type="text" id="Artist"> </input>';
   echo '<span>Copyright</span> <input type="text" id="Copyright"> </input>';
   echo '<span>Rarity Symbol</span> <input type="text" id="Rarity_Symbol"> </input>';
   echo '<button type="submit" class="add_cards_collect_submit" id="add_cards_collect_submit" value="add_cards_collect_submit">Submit</button><br/>';
}

if($_POST['search_card_number'] == "search_card_number"){
   if($_POST['Card_Number'] != ""){

   $search_card_name_query = "SELECT * FROM PTCG_COLLECT WHERE Set_Number LIKE '" . $_POST['Card_Number'] . "%' ORDER BY Set_Number ASC";

   $result2 = mysql_query($search_card_name_query);

   while($row2 = mysql_fetch_array($result2)){ 
      echo "<div class='list Parts " . " ptcg_collect' id='" . $row2['Card_Collect_ID'] . "' >";
      echo "<div style='width: 10%; display:inline-block;' >";
      echo "<strong><u>Text ID</u></strong><br/><span class='theIDs'>" . $row2['Card_Collect_ID'] . "</span><br/>";
      echo "</div>";
      echo "<div style='width: 90%; display:inline-block;' >";
      echo "<img src='../images/";
      langReplace($row2['Card_Language']);
      echo "_icons/" . $row2['Set_Icon'] . ".png' height='25px' width='25px' /> <strong>" . $row2['Set_Number'] . "</strong> " . $row2['Rarity_Symbol'] . "<br/>";
      echo "<strong>" . $row2['Artist'] . "</strong> " . $row2['Copyright'] . "<br/>";
      echo "</div>";
      echo "</div>";
   }
   }else{
      echo "<br/>ಠ~ಠ Did you forget something...<br/>";
   }

}

if($_POST['add_cards_collect_submit'] == "add_cards_collect_submit"){
   $insert_query = "INSERT INTO PTCG_COLLECT (Set_Number, Set_Icon, Artist, Copyright, Rarity_Symbol) VALUES ('" . mysql_real_escape_string($_POST['Set_Number']) . "','" . mysql_real_escape_string($_POST['Set_Abbr']) . "','" . mysql_real_escape_string($_POST['Artist']) . "','" . mysql_real_escape_string($_POST['Copyright']) . "','" . $_POST['Rarity_Symbol'] . "')";

   if (!mysql_query($insert_query,$con2)){
      echo "Sad Day T-T If you see this call Vince." . "<br />";
   }else{
      echo $face_array[array_rand($face_array)] . " HAHA, COOKIES ON DOWELS!" . "<br />";
   }

   $search_cards_collect_query = "SELECT * FROM PTCG_COLLECT WHERE Set_Number LIKE '" . $_POST['Set_Number'] . "%' ORDER BY Set_Number ASC";

   $result = mysql_query($search_cards_collect_query); 

   while($row = mysql_fetch_array($result)){ 
      echo "<div class='list Parts " . " ptcg_collect' id='" . $row2['Card_Collect_ID'] . "' >";
      echo "<div style='width: 10%; display:inline-block;' >";
      echo "<strong><u>Text ID</u></strong><br/><span class='theIDs'>" . $row['Card_Collect_ID'] . "</span><br/>";
      echo "</div>";
      echo "<div style='width: 90%; display:inline-block;' >";
      echo "<img src='../images/";
      langReplace($row['Card_Language']);
      echo "_icons/" . $row['Set_Icon'] . ".png' height='25px' width='25px' /> <strong>" . $row['Set_Number'] . "</strong> " . $row['Rarity_Symbol'] . "<br/>";
      echo "<strong>" . $row['Artist'] . "</strong> " . $row['Copyright'] . "<br/>";
      echo "</div>";
      echo "</div>";
   }
}








//Card


if($_POST['add_cards'] == "add_cards"){

   for($i = 1; $i <= $_POST['num_of_cards']; $i++){
   echo '<h2> Card ' . $i . '</h2>';
   echo '<span>DB Card Number</span> <input type="text" size="7" id="DB_Card_Num" value="' . $_POST['DB_Card_Num'] . '" ></input><span>Set ID</span> <input type="text" size="3" id="Set_ID" value="' . $_POST['Set_ID'] . '" > </input><br/>';
   echo '<span>Edition</span> <input type="text" size="7" id="Edition" value="' . $_POST['Edition'] . '" ></input>';
   echo '<span>Rarity</span> <input type="text" id="Rarity" value="' . $_POST['Rarity'] . '" ></input>';
   echo '<span>Holo</span> <input type="text" id="Holo" value="' . $_POST['Holo'] . '" ></input>';
   echo '<span>Card Language</span> <input type="text" id="Card_Language" value="' . $_POST['Card_Language'] . '" ></input><br/><br/>';
   echo '<span>Data ID</span> <input type="text" size="2" id="Data_ID" value="' . $_POST['Data_ID'] . '" ></input>  <span>Card Name</span> <input type="text" id="Card_Name"> </input> <span>HP</span> <input type="text" size="3" id="HP2"> </input><button type="button" class="search_card_name" id="search_card_name_' . $i . '" value="search_card_name_' . $i . '">Search Card Name</button> <button type="button" class="add_card_data" id="add_card_data_' . $i . '" value="add_card_data_' . $i . '">Add New Card Data</button><br/><span id="card_data_info" class="hidden">Loading...</span><br/>';

   echo '<span>Text ID</span> <input type="text"size="2"  id="Text_ID" value="' . $_POST['Text_ID'] . '" ></input> <span>Attack Name</span> <input type="text" id="Attack_Name"> </input> <span>Data Link ID</span> <input type="text" id="Data_Link_ID"> </input><button type="submit" class="search_attack_name" id="search_attack_name_' . $i . '" value="search_attack_name_' . $i . '"> Search Attack Name</button> <button type="submit" class="add_card_text" id="add_card_text_' . $i . '" value="add_card_text_' . $i . '">Add New Card Text</button><br/><span id="card_text_info" class="hidden">Loading...</span><br/>';

   echo '<span>Collect ID</span> <input type="text" size="2" id="Collect_ID" value="' . $_POST['Collect_ID'] . '" ></input>  <span>Card Number</span> <input type="text" id="Card_Number2" value="' . $_POST['Card_Number2'] . '" > </input><button type="button" class="search_card_number" id="search_card_number_' . $i . '" value="search_card_number_' . $i . '">Search Card Number</button> <button type="button" class="add_card_collect" id="add_card_collect_' . $i . '" value="add_card_collect_' . $i . '">Add New Card Collect</button><br/><span id="card_collect_info" class="hidden">Loading...</span><br/>';

   echo '<button type="submit" class="add_cards_submit" id="add_cards_submit" value="add_cards_submit">Final Submit</button>';
   }
}




if($_POST['add_cards_submit'] == "add_cards_submit"){

echo $face_array[array_rand($face_array)] . "woot<br />";

   $temp_card_ID = "";
   $insert_query = "INSERT INTO PTCG_CARDS (DB_Card_Num, Edition, Rarity, Holo, Card_Language, Data_ID, Text_ID, Collect_ID) VALUES ('" . mysql_real_escape_string($_POST['DB_Card_Num']) . "','" . $_POST['Edition'] . "','" . mysql_real_escape_string($_POST['Rarity']) . "','" . $_POST['Holo'] . "','" . mysql_real_escape_string($_POST['Card_Language']) . "','" . $_POST['Data_ID'] . "','" . mysql_real_escape_string($_POST['Text_ID']) . "','" . $_POST['Collect_ID'] . "')";

   if (!mysql_query($insert_query,$con2)){
      echo "<br />Sad Day T-T If you see this call Vince." . "<br />";
   }else{
      echo "<br />" . $face_array[array_rand($face_array)] . " HAHA, COOKIES ON DOWELS!" . "<br />";
   }

   $search_attack_name_query = "SELECT * FROM PTCG_CARDS WHERE Data_ID LIKE '" . $_POST['Data_ID'] . "%' AND Text_ID LIKE '" . $_POST['Text_ID'] . "%' AND Collect_ID LIKE '" . $_POST['Collect_ID'] . "%' ORDER BY Card_ID ASC";

   $result = mysql_query($search_attack_name_query); 

   while($row = mysql_fetch_array($result)){ 
      $temp_card_ID = $row['Card_ID'];
      echo $temp_card_ID;
      echo "<br/><br/>";
   }

   $insert_query2 = "INSERT INTO PTCG_COMPLETE (Card_ID, Set_ID) VALUES ('" . $temp_card_ID . "','" . $_POST['Set_ID'] . "')";

   if (!mysql_query($insert_query2,$con2)){
      echo "<br />Sad Day T-T If you see this call Vince." . "<br />";
   }else{
      echo "<br />" . $face_array[array_rand($face_array)] . " HAHA, COOKIES ON DOWELS! AGAIN!" . "<br />";
   }


   echo "<input type='hidden' id='Card_Number2' value='" . $_POST['Card_Number2'] . "'></input>";
   echo "<input type='hidden' id='DB_Card_Num' value='" . $_POST['DB_Card_Num'] . "'></input>";
   echo "<input type='hidden' id='Edition' value='" . $_POST['Edition'] . "'></input>";
   echo "<input type='hidden' id='Rarity' value='" . $_POST['Rarity'] . "'></input>";
   echo "<input type='hidden' id='Holo' value='" . $_POST['Holo'] . "'></input>";
   echo "<input type='hidden' id='Card_Language' value='" . $_POST['Card_Language'] . "'></input>";
   echo "<input type='hidden' id='Set_ID' value='" . $_POST['Set_ID'] . "'></input>";
   echo "<input type='hidden' id='Data_ID' value='" . $_POST['Data_ID'] . "'></input>";
   echo "<input type='hidden' id='Text_ID' value='" . $_POST['Text_ID'] . "'></input>";
   echo "<input type='hidden' id='Collect_ID' value='" . $_POST['Collect_ID'] . "'></input>";
   echo "<input type='hidden' id='Card_ID' value='" . $temp_card_ID . "'></input>";

   echo "<button type='submit' class='copy_card' value='copy_card'>Copy Previous</button>";

}

//Text
if($_POST['add_cards_text'] == "add_cards_text"){
   echo '<br/><span>Text Language</span> <input type="text" size="10" id="Text_Language"></input><span>Pokedex_Data</span> <input type="text" size="50" id="Pokedex_Data"></input><br/>';
   echo '<h3>Ability</h3>';
   echo '<span>Type</span> <input type="text" id="Ability_Type"></input>';
   echo '<span>Name</span> <input type="text" id="Ability_Name"></input><br/>';
   echo '<span>Text</span> <textarea rows="2" cols="80" id="Ability_Text"></textarea>';
   echo '<h3>Attack 1
<button type="button" class="attack1_energy" value="[[Colorless]]"><img src="Colorless.png" height="15px" /></button>
<button type="button" class="attack1_energy" value="[[Water]]"><img src="Water.png" height="15px" /></button>
<button type="button" class="attack1_energy" value="[[Fighting]]"><img src="Fighting.png" height="15px" /></button>
<button type="button" class="attack1_energy" value="[[Fire]]"><img src="Fire.png" height="15px" /></button>
<button type="button" class="attack1_energy" value="[[Grass]]"><img src="Grass.png" height="15px" /></button>
<button type="button" class="attack1_energy" value="[[Lightning]]"><img src="Lightning.png" height="15px" /></button>
<button type="button" class="attack1_energy" value="[[Psychic]]"><img src="Psychic.png" height="15px" /></button>
<button type="button" class="attack1_energy" value="[[Metal]]"><img src="Metal.png" height="15px" /></button>
<button type="button" class="attack1_energy" value="[[Darkness]]"><img src="Darkness.png" height="15px" /></button>
<button type="button" class="attack1_energy" value="[[Fairy]]"><img src="Fairy.png" height="15px" /></button>
<button type="button" class="attack1_energy" value="[[Dragon]]"><img src="Dragon.png" height="15px" /></button>
<button type="button" class="attack1_energy" value="[[None]]"><img src="None.png" height="15px" /></button>
</h3>';
   echo '<span>Cost</span> <input type="text" size="45" id="Attack_1_Cost"></input>';
   echo '<span>Name</span> <input type="text" id="Attack_1_Name"></input>';
   echo '<span>Damage</span> <input type="text" size="3" id="Attack_1_Damage"></input><br/>';
   echo '<span>Text</span> <textarea rows="2" cols="80" id="Attack_1_Text"></textarea>';
   echo '<h3>Attack 2
<button type="button" class="attack2_energy" value="[[Colorless]]"><img src="Colorless.png" height="15px" /></button>
<button type="button" class="attack2_energy" value="[[Water]]"><img src="Water.png" height="15px" /></button>
<button type="button" class="attack2_energy" value="[[Fighting]]"><img src="Fighting.png" height="15px" /></button>
<button type="button" class="attack2_energy" value="[[Fire]]"><img src="Fire.png" height="15px" /></button>
<button type="button" class="attack2_energy" value="[[Grass]]"><img src="Grass.png" height="15px" /></button>
<button type="button" class="attack2_energy" value="[[Lightning]]"><img src="Lightning.png" height="15px" /></button>
<button type="button" class="attack2_energy" value="[[Psychic]]"><img src="Psychic.png" height="15px" /></button>
<button type="button" class="attack2_energy" value="[[Metal]]"><img src="Metal.png" height="15px" /></button>
<button type="button" class="attack2_energy" value="[[Darkness]]"><img src="Darkness.png" height="15px" /></button>
<button type="button" class="attack2_energy" value="[[Fairy]]"><img src="Fairy.png" height="15px" /></button>
<button type="button" class="attack2_energy" value="[[Dragon]]"><img src="Dragon.png" height="15px" /></button>
<button type="button" class="attack2_energy" value="[[None]]"><img src="None.png" height="15px" /></button>
</h3>';
   echo '<span>Cost</span> <input type="text" size="45" id="Attack_2_Cost"></input>';
   echo '<span>Name</span> <input type="text" id="Attack_2_Name"></input>';
   echo '<span>Damage</span> <input type="text" size="3" id="Attack_2_Damage"></input><br/>';
   echo '<span>Text</span> <textarea rows="2" cols="80" id="Attack_2_Text"></textarea>';
   echo '<h3>Attack 3
<button type="button" class="attack3_energy" value="[[Colorless]]"><img src="Colorless.png" height="15px" /></button>
<button type="button" class="attack3_energy" value="[[Water]]"><img src="Water.png" height="15px" /></button>
<button type="button" class="attack3_energy" value="[[Fighting]]"><img src="Fighting.png" height="15px" /></button>
<button type="button" class="attack3_energy" value="[[Fire]]"><img src="Fire.png" height="15px" /></button>
<button type="button" class="attack3_energy" value="[[Grass]]"><img src="Grass.png" height="15px" /></button>
<button type="button" class="attack3_energy" value="[[Lightning]]"><img src="Lightning.png" height="15px" /></button>
<button type="button" class="attack3_energy" value="[[Psychic]]"><img src="Psychic.png" height="15px" /></button>
<button type="button" class="attack3_energy" value="[[Metal]]"><img src="Metal.png" height="15px" /></button>
<button type="button" class="attack3_energy" value="[[Darkness]]"><img src="Darkness.png" height="15px" /></button>
<button type="button" class="attack3_energy" value="[[Fairy]]"><img src="Fairy.png" height="15px" /></button>
<button type="button" class="attack3_energy" value="[[Dragon]]"><img src="Dragon.png" height="15px" /></button>
<button type="button" class="attack3_energy" value="[[None]]"><img src="None.png" height="15px" /></button>
</h3>';
   echo '<span>Cost</span> <input type="text" size="45" id="Attack_3_Cost"></input>';
   echo '<span>Name</span> <input type="text" id="Attack_3_Name"></input>';
   echo '<span>Damage</span> <input type="text" size="3" id="Attack_3_Damage"></input><br/>';
   echo '<span>Text</span> <textarea rows="2" cols="80" id="Attack_3_Text"></textarea>';
   echo '<h3>Attack 4
<button type="button" class="attack4_energy" value="[[Colorless]]"><img src="Colorless.png" height="15px"/></button>
<button type="button" class="attack4_energy" value="[[Water]]"><img src="Water.png" height="15px" /></button>
<button type="button" class="attack4_energy" value="[[Fighting]]"><img src="Fighting.png" height="15px" /></button>
<button type="button" class="attack4_energy" value="[[Fire]]"><img src="Fire.png" height="15px" /></button>
<button type="button" class="attack4_energy" value="[[Grass]]"><img src="Grass.png" height="15px" /></button>
<button type="button" class="attack4_energy" value="[[Lightning]]"><img src="Lightning.png" height="15px" /></button>
<button type="button" class="attack4_energy" value="[[Psychic]]"><img src="Psychic.png" height="15px" /></button>
<button type="button" class="attack4_energy" value="[[Metal]]"><img src="Metal.png" height="15px" /></button>
<button type="button" class="attack4_energy" value="[[Darkness]]"><img src="Darkness.png" height="15px" /></button>
<button type="button" class="attack4_energy" value="[[Fairy]]"><img src="Fairy.png" height="15px" /></button>
<button type="button" class="attack4_energy" value="[[Dragon]]"><img src="Dragon.png" height="15px" /></button>
<button type="button" class="attack4_energy" value="[[None]]"><img src="None.png" height="15px" /></button>
</h3>';
   echo '<span>Cost</span> <input type="text" size="45" id="Attack_4_Cost"></input>';
   echo '<span>Name</span> <input type="text" id="Attack_4_Name"></input>';
   echo '<span>Damage</span> <input type="text" size="3" id="Attack_4_Damage"></input><br/>';
   echo '<span>Text</span> <textarea rows="2" cols="80" id="Attack_4_Text"></textarea><br/>';
   echo '<h3>Card Effect</h3>';
   echo '<span>Text</span> <textarea rows="4" cols="80" id="Card_Effect"></textarea><br/>';

   echo '<h3>Rule 1</h3>';
   echo '<span>Type</span> <input type="text" size="10" id="Rule_1_Type"></input>';
   echo '<span>Name</span> <input type="text" size="10" id="Rule_1_Name"></input><br/>';
   echo '<span>Text</span> <textarea rows="2" cols="80" id="Rule_1_Text"></textarea><br/>';
   echo '<h3>Rule 2</h3>';
   echo '<span>Type</span> <input type="text" size="10" id="Rule_2_Type"></input>';
   echo '<span>Name</span> <input type="text" size="10" id="Rule_2_Name"></input><br/>';
   echo '<span>Text</span> <textarea rows="2" cols="80" id="Rule_2_Text"></textarea><br/>';
   echo '<h3>Rule 3</h3>';
   echo '<span>Type</span> <input type="text" size="10" id="Rule_3_Type"></input>';
   echo '<span>Name</span> <input type="text" size="10" id="Rule_3_Name"></input><br/>';
   echo '<span>Text</span> <textarea rows="2" cols="80" id="Rule_3_Text"></textarea><br/>';
   echo '<h3>Rule 4</h3>';
   echo '<span>Type</span> <input type="text" size="10" id="Rule_4_Type"></input>';
   echo '<span>Name</span> <input type="text" size="10" id="Rule_4_Name"></input><br/>';
   echo '<span>Text</span> <textarea rows="2" cols="80" id="Rule_4_Text"></textarea><br/>';
   echo '<h3>Flavor Text</h3>';
   echo '<span>Text</span> <textarea rows="2" cols="80" id="Flavor_Text"></textarea><br/><br/>';
   echo '<button type="submit" name="add_cards_text_submit" class="add_cards_text_submit" id="add_cards_text_submit" value="add_cards_text_submit">Submit</button><br/>';
}

if($_POST['search_attack_name'] == "search_attack_name_1"){
   //if($_POST['Attack_Name'] != "" || $_POST['Data_Link_ID'] != ""){

   if($_POST['Data_Link_ID'] != ""){
      $search_attack_name_query = "SELECT * FROM PTCG_TEXT WHERE Data_Link_ID = " . $_POST['Data_Link_ID'] . " AND Text_Language = '" . $_POST['Text_Language'] . "' ORDER BY Card_Text_ID DESC";
   }else{
      $search_attack_name_query = "SELECT * FROM PTCG_TEXT WHERE Card_Effect LIKE '%" . $_POST['Attack_Name'] . "%' OR Attack_1_Name LIKE '" . $_POST['Attack_Name'] . "%' OR Attack_2_Name LIKE '" . $_POST['Attack_Name'] . "%' OR Attack_3_Name LIKE '" . $_POST['Attack_Name'] . "%' OR Attack_4_Name LIKE '" . $_POST['Attack_Name'] . "%' OR Ability_Name LIKE '" . $_POST['Attack_Name'] . "%' ORDER BY Card_Text_ID DESC";
   }
   //echo $search_attack_name_query;

   $result2 = mysql_query($search_attack_name_query);

   while($row2 = mysql_fetch_array($result2)){ 
      echo "<div class='list Parts " . " ptcg_text' id='" . $row2['Card_Text_ID'] . "' >";
      echo "<div style='width: 10%; display:inline-block;' >";
      echo "<strong><u>Text ID</u></strong><br/><span class='theIDs'>" . $row2['Card_Text_ID'] . "</span><br/>";
      echo "</div>";
      echo "<div style='width: 90%; display:inline-block;' >";
      echo $row2['Pokedex_Data'] . "<br/><br/>";
      if($row2['Rule_1_Type'] != ""){
         echo "<b>" . $row2['Rule_1_Name'] . "</b><br/>";
         echo energyReplace($row2['Rule_1_Text']) . "<br/>";
      }
      if($row2['Rule_2_Type'] != ""){
         echo "<b>" . $row2['Rule_2_Name'] . "</b><br/>";
         echo energyReplace($row2['Rule_2_Text']) . "<br/>";
      }
      if($row2['Rule_3_Type'] != ""){
         echo "<b>" . $row2['Rule_3_Name'] . "</b><br/>";
         echo energyReplace($row2['Rule_3_Text']) . "<br/>";
      }
      if($row2['Rule_4_Type'] != ""){
         echo "<b>" . $row2['Rule_4_Name'] . "</b><br/>";
         echo energyReplace($row2['Rule_4_Text']) . "<br/>";
      }
      if($row2['Card_Effect'] != ""){
         echo energyReplace($row2['Card_Effect']) . "<br/>";
      }
      if($row2['Ability_Name'] != ""){
         echo "<b>" . $row2['Ability_Type'] . ": " . $row2['Ability_Name'] . "</b><br/>";
         echo energyReplace($row2['Ability_Text']) . "<br/>";
      }
      if($row2['Attack_1_Name'] != ""){
         echo energyReplace($row2['Attack_1_Cost']) . " <b>" . $row2['Attack_1_Name'] . "</b> " . $row2['Attack_1_Damage'] . "<br/>";
         echo energyReplace($row2['Attack_1_Text']) . "<br/>";
      }
      if($row2['Attack_2_Name'] != ""){
         echo energyReplace($row2['Attack_2_Cost']) . " <b>" . $row2['Attack_2_Name'] . "</b> " . $row2['Attack_2_Damage'] . "<br/>";
         echo energyReplace($row2['Attack_2_Text']) . "<br/>";
      }
      if($row2['Attack_3_Name'] != ""){
         echo energyReplace($row2['Attack_3_Cost']) . " <b>" . $row2['Attack_3_Name'] . "</b> " . $row2['Attack_3_Damage'] . "<br/>";
         echo energyReplace($row2['Attack_3_Text']) . "<br/>";
      }
      if($row2['Attack_4_Name'] != ""){
         echo energyReplace($row2['Attack_4_Cost']) . " <b>" . $row2['Attack_4_Name'] . "</b> " . $row2['Attack_4_Damage'] . "<br/>";
         echo energyReplace($row2['Attack_4_Text']) . "<br/>";
      }
      echo "<br/>" . $row2['Stage_Effect'] . "<br/>";
      echo "<i>" . $row2['Flavor_Text'] . "</i><br/>";
      echo "</div>";
      echo "</div>";
   }
   //}else{
      //echo "<br/>(ง •̀_•́)ง Did you forget something...<br/>";
   //}
}

if($_POST['add_cards_text_submit'] == "add_cards_text_submit"){
   $insert_query = "INSERT INTO PTCG_TEXT (Text_Language, Pokedex_Data, Attack_1_Cost, Attack_1_Name, Attack_1_Damage, Attack_1_Text, Attack_2_Cost, Attack_2_Name, Attack_2_Damage, Attack_2_Text, Attack_3_Cost, Attack_3_Name, Attack_3_Damage, Attack_3_Text, Attack_4_Cost, Attack_4_Name, Attack_4_Damage, Attack_4_Text, Ability_Type, Ability_Name, Ability_Text, Rule_1_Type, Rule_1_Name, Rule_1_Text, Rule_2_Type, Rule_2_Name, Rule_2_Text, Rule_3_Type, Rule_3_Name, Rule_3_Text, Rule_4_Type, Rule_4_Name, Rule_4_Text, Flavor_Text, Card_Effect) VALUES ('" . mysql_real_escape_string($_POST['Text_Language']) . "','" . mysql_real_escape_string($_POST['Pokedex_Data']) . "','" . $_POST['Attack_1_Cost'] . "','" . mysql_real_escape_string($_POST['Attack_1_Name']) . "','" . $_POST['Attack_1_Damage'] . "','" . mysql_real_escape_string($_POST['Attack_1_Text']) . "','" . $_POST['Attack_2_Cost'] . "','" . mysql_real_escape_string($_POST['Attack_2_Name']) . "','" . $_POST['Attack_2_Damage'] . "','" . mysql_real_escape_string($_POST['Attack_2_Text']) . "','" . $_POST['Attack_3_Cost'] . "','" . mysql_real_escape_string($_POST['Attack_3_Name']) . "','" . $_POST['Attack_3_Damage'] . "','" . mysql_real_escape_string($_POST['Attack_3_Text']) . "','" . $_POST['Attack_4_Cost'] . "','" . mysql_real_escape_string($_POST['Attack_4_Name']) . "','" . $_POST['Attack_4_Damage'] . "','" . mysql_real_escape_string($_POST['Attack_4_Text']) . "','" . mysql_real_escape_string($_POST['Ability_Type']) . "','" . mysql_real_escape_string($_POST['Ability_Name']) . "','" . mysql_real_escape_string($_POST['Ability_Text']) . "','" . mysql_real_escape_string($_POST['Rule_1_Type']) . "','" . mysql_real_escape_string($_POST['Rule_1_Name']) . "','" . mysql_real_escape_string($_POST['Rule_1_Text']) . "','" . mysql_real_escape_string($_POST['Rule_2_Type']) . "','" . mysql_real_escape_string($_POST['Rule_2_Name']) . "','" . mysql_real_escape_string($_POST['Rule_2_Text']) . "','" . mysql_real_escape_string($_POST['Rule_3_Type']) . "','" . mysql_real_escape_string($_POST['Rule_3_Name']) . "','" . mysql_real_escape_string($_POST['Rule_3_Text']) . "','" . mysql_real_escape_string($_POST['Rule_4_Type']) . "','" . mysql_real_escape_string($_POST['Rule_4_Name']) . "','" . mysql_real_escape_string($_POST['Rule_4_Text']) . "','" . mysql_real_escape_string($_POST['Flavor_Text']) . "','" . mysql_real_escape_string($_POST['Card_Effect']) . "')";

   if (!mysql_query($insert_query,$con2)){
      echo "Sad Day T-T If you see this call Vince." . "<br />";
   }else{
      echo $face_array[array_rand($face_array)] . " HAHA, COOKIES ON DOWELS!" . "<br />";
   }

   $search_attack_name_query = "SELECT * FROM PTCG_TEXT WHERE Attack_1_Name LIKE '" . $_POST['Attack_1_Name'] . "%' AND Ability_Name LIKE '" . $_POST['Ability_Name'] . "%' ORDER BY Card_Text_ID DESC";

   $result = mysql_query($search_attack_name_query); 

   while($row2 = mysql_fetch_array($result)){ 
      echo "<div class='list Parts " . " ptcg_text' id='" . $row2['Card_Text_ID'] . "' >";
      echo "<div style='width: 10%; display:inline-block;' >";
      echo "<strong><u>Text ID</u></strong><br/><span class='theIDs'>" . $row2['Card_Text_ID'] . "</span><br/>";
      echo "</div>";
      echo "<div style='width: 90%; display:inline-block;' >";
      if($row2['Rule_1_Type'] != ""){
         echo "<b>" . $row2['Rule_1_Name'] . "</b><br/>";
         echo energyReplace($row2['Rule_1_Text']) . "<br/>";
      }
      if($row2['Rule_2_Type'] != ""){
         echo "<b>" . $row2['Rule_2_Name'] . "</b><br/>";
         echo energyReplace($row2['Rule_2_Text']) . "<br/>";
      }
      if($row2['Rule_3_Type'] != ""){
         echo "<b>" . $row2['Rule_3_Name'] . "</b><br/>";
         echo energyReplace($row2['Rule_3_Text']) . "<br/>";
      }
      if($row2['Rule_4_Type'] != ""){
         echo "<b>" . $row2['Rule_4_Name'] . "</b><br/>";
         echo energyReplace($row2['Rule_4_Text']) . "<br/>";
      }
      if($row2['Card_Effect'] != ""){
         echo energyReplace($row2['Card_Effect']) . "<br/>";
      }
      if($row2['Ability_Name'] != ""){
         echo "<b>" . $row2['Ability_Type'] . ": " . $row2['Ability_Name'] . "</b><br/>";
         echo energyReplace($row2['Ability_Text']) . "<br/>";
      }
      if($row2['Attack_1_Name'] != ""){
         echo energyReplace($row2['Attack_1_Cost']) . " <b>" . $row2['Attack_1_Name'] . "</b> " . $row2['Attack_1_Damage'] . "<br/>";
         echo energyReplace($row2['Attack_1_Text']) . "<br/>";
      }
      if($row2['Attack_2_Name'] != ""){
         echo energyReplace($row2['Attack_2_Cost']) . " <b>" . $row2['Attack_2_Name'] . "</b> " . $row2['Attack_2_Damage'] . "<br/>";
         echo energyReplace($row2['Attack_2_Text']) . "<br/>";
      }
      if($row2['Attack_3_Name'] != ""){
         echo energyReplace($row2['Attack_3_Cost']) . " <b>" . $row2['Attack_3_Name'] . "</b> " . $row2['Attack_3_Damage'] . "<br/>";
         echo energyReplace($row2['Attack_3_Text']) . "<br/>";
      }
      if($row2['Attack_4_Name'] != ""){
         echo energyReplace($row2['Attack_4_Cost']) . " <b>" . $row2['Attack_4_Name'] . "</b> " . $row2['Attack_4_Damage'] . "<br/>";
         echo energyReplace($row2['Attack_4_Text']) . "<br/>";
      }
      echo "<br/><i>" . $row2['Flavor_Text'] . "</i><br/>";
      echo "</div>";
      echo "</div>";
   }
}

if($_POST['Main_Search'] == "go"){
   $master_query = "SELECT * FROM 
( Select * FROM PTCG_CARDS as T1
INNER JOIN PTCG_DATA as T2 ON T1.Data_ID = T2.Card_Data_ID
INNER JOIN PTCG_TEXT as T3 ON T1.Text_ID = T3.Card_TEXT_ID
INNER JOIN PTCG_COLLECT as T4 ON T1.Collect_ID = T4.Card_Collect_ID WHERE 1) as CARDS
INNER JOIN ( Select *, GROUP_CONCAT(EN_Set_Name SEPARATOR '|') FROM PTCG_COMPLETE as T5
INNER JOIN PTCG_SETS as T6 ON T5.Set_ID = T6.Main_Set_ID GROUP BY Card_ID) as COMPLETE
ON CARDS.Card_ID = COMPLETE.Card_ID
WHERE EN_Name LIKE '" . $_POST['en_name'] . "%' AND Set_Language LIKE '" . $_POST['lang'] . "%' AND Set_ID LIKE '" . $_POST['Set_ID'] . "' AND Set_Number LIKE '" . $_POST['Card_Number'] . "%' ORDER BY DB_Card_Num ASC";

   $result = mysql_query($master_query) or die(mysql_error()); 

   while($row = mysql_fetch_array($result)){ 
      echo "<div class='list " . $row['Type_1'] . "'>";
      echo "<div style='width: 10%; display:inline-block;' >";
      echo "<strong><u>Set ID</u></strong><br/><span class='theIDs'>" . $row['Set_ID'] . "</span><br/>";
      echo "<strong><u>Card ID</u></strong><br/><span class='theIDs'>" . $row['Card_ID'] . "</span><br/>";
      echo "<strong><u>Data ID</u></strong><br/><span class='theIDs'>" . $row['Data_ID'] . "</span><br/>";
      echo "<strong><u>Text ID</u></strong><br/><span class='theIDs'>" . $row['Text_ID'] . "</span><br/>";
      echo "<strong><u>Collect ID</u></strong><br/><span class='theIDs'>" . $row['Collect_ID'] . "</span><br/>";
      echo "</div>";
      echo "<div style='width: 90%; display:inline-block;' >";
      echo typeReplace($row['Type_1']) . " " . typeReplace($row['Type_2']) . " <span class='card_name_style'><strong>" . $row['Prefix'] . " " . $row['EN_Name'] . " " . $row['Suffix'] . "</strong></span> HP<span class='card_name_style'><strong>" . $row['HP'] . "</strong></span> " . $row['Stage'] . "<br/>";
      echo "<strong>Weakness:</strong> " . typeReplace($row['Weakness_1']) . "" . typeReplace($row['Weakness_2']) . "" . $row['Weakness_X'] . " <strong>Resistance:</strong> " . typeReplace($row['Resistance_1']) . "" . typeReplace($row['Resistance_2']) . "" . $row['Resistance_X'] . " <strong>Retreat Cost:</strong> ";

      for($h = 0; $h < $row['Retreat'];$h++){
      echo "<img src='Colorless.png' />";
      }
      echo "<br/><br/>";
      echo $row['DB_Card_Num'] . "_" . $row['Edition'] . "_" . $row['Card_ID'] . "<br/>";
      echo $row['DB_Card_Num'] . " <em>" . $row['Edition'] . "</em> ";
      if($row['Holo'] != ""){
         echo "<span class='shimmer'>";
      }else{
         echo "<span>";
      }
      echo $row['Rarity'] . " (" . $row['Holo'] . ")</span><br/><strong>" . $row['Set_Number'] . "</strong> " . $row['EN_Set_Name'] . "<br/><br/>";
      if($row['Text_ID'] == "0"){
         echo "Blah<br/>";
      }else{
      if($row['Rule_1_Type'] != ""){
         echo "<b>" . $row['Rule_1_Name'] . "</b><br/>";
         echo energyReplace($row['Rule_1_Text']) . "<br/>";
      }
      if($row['Rule_2_Type'] != ""){
         echo "<b>" . $row['Rule_2_Name'] . "</b><br/>";
         echo energyReplace($row['Rule_2_Text']) . "<br/>";
      }
      if($row['Rule_3_Type'] != ""){
         echo "<b>" . $row['Rule_3_Name'] . "</b><br/>";
         echo energyReplace($row['Rule_3_Text']) . "<br/>";
      }
      if($row['Rule_4_Type'] != ""){
         echo "<b>" . $row['Rule_4_Name'] . "</b><br/>";
         echo energyReplace($row['Rule_4_Text']) . "<br/>";
      }
      if($row['Card_Effect'] != ""){
         echo energyReplace($row['Card_Effect']) . "<br/>";
      }
      if($row['Ability_Name'] != ""){
         echo "<b>" . $row['Ability_Type'] . ": " . $row['Ability_Name'] . "</b><br/>";
         echo energyReplace($row['Ability_Text']) . "<br/>";
      }
      if($row['Attack_1_Name'] != ""){
         echo energyReplace($row['Attack_1_Cost']) . " <b>" . $row['Attack_1_Name'] . "</b> " . $row['Attack_1_Damage'] . "<br/>";
         echo energyReplace($row['Attack_1_Text']) . "<br/>";
      }
      if($row['Attack_2_Name'] != ""){
         echo energyReplace($row['Attack_2_Cost']) . " <b>" . $row['Attack_2_Name'] . "</b> " . $row['Attack_2_Damage'] . "<br/>";
         echo energyReplace($row['Attack_2_Text']) . "<br/>";
      }
      if($row['Attack_3_Name'] != ""){
         echo energyReplace($row['Attack_3_Cost']) . " <b>" . $row['Attack_3_Name'] . "</b> " . $row['Attack_3_Damage'] . "<br/>";
         echo energyReplace($row['Attack_3_Text']) . "<br/>";
      }
      if($row['Attack_4_Name'] != ""){
         echo energyReplace($row['Attack_4_Cost']) . " <b>" . $row['Attack_4_Name'] . "</b> " . $row['Attack_4_Damage'] . "<br/>";
         echo energyReplace($row['Attack_4_Text']) . "<br/>";
      }

      if($row['Flavor_Text'] != ""){
         echo "<br/><i>" . $row['Flavor_Text'] . "</i><br/>";
      }
      }

      echo $row['Artist'] . " " . $row['Copyright'] . "<br/>";
      echo "</div>";
      echo "</div>";
      echo "<br/>";
   }
}




?>
</html>