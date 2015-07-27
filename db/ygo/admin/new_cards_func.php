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
   $db_name = "ygo";
   $db_username = "vinceoa2_ygo";
   $db_password = "ki_234_ki";

   $con2 = mysql_connect("localhost",$db_username,$db_password);
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
      $type_Query = "SELECT * FROM YGO_SETS WHERE Set_Language LIKE '" . $_POST['lang'] . "' ORDER BY Release_Date DESC";

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
   $insert_query = "INSERT INTO YGO_SETS (Set_Abbr, EN_Set_Name, Set_Language, Set_Type, Release_Date)
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

   echo '<span>EN Name</span> <input type="text" id="EN_Name"> </input>';
   echo '<span>Attribute</span> <input type="text" size="7" id="Attribute"> </input>';
   echo '<span>Color 1</span> <input type="text" size="4" id="Color_1"> </input>';
   echo '<span>Color 2</span> <input type="text" size="4" id="Color_2"> </input><br/>';
   echo '<span>Type</span> <input type="text" size="4" id="Type"> </input>';
   echo '<span>Ability 1</span> <input type="text" size="4" id="Ability_1"> </input>';
   echo '<span>Ability 2</span> <input type="text" size="4" id="Ability_2"> </input>';
   echo '<span>Ability 3</span> <input type="text" size="4" id="Ability_3"> </input>';
   echo '<span>Property</span> <input type="text" size="4" id="Property"> </input>';
   echo '<span>Level</span> <input type="text" size="4" id="Level"> </input>';
   echo '<span>Rank</span> <input type="text" size="4" id="Rank"> </input><br/>';
   echo '<span>ATK</span> <input type="text" size="2" id="ATK"> </input>';
   echo '<span>DEF</span> <input type="text" size="4" id="DEF"> </input>';
   echo '<span>Pendulum_Blue</span> <input type="text" size="4" id="Pendulum_Blue"> </input>';
   echo '<span>Pendulum_Red</span> <input type="text" size="2" id="Pendulum_Red"> </input>';
   echo '<br/><span>Number</span> <input type="text" size="2" id="Number"> </input>';
   echo '<span>JA Name</span> <input type="text" id="JA_Name"> </input>';
   echo '<span>JAK Name</span> <input type="text" id="JAK_Name"> </input>';
   echo '<span>JAH Name</span> <input type="text" id="JAH_Name"> </input><br/>';
   echo '<span>KO Name</span> <input type="text" id="KO_Name"> </input>';
   echo '<span>KOK Name</span> <input type="text" id="KOK_Name"> </input>';
   echo '<span>KOH Name</span> <input type="text" id="KOH_Name"> </input><br/>';
   echo '<span>FR Name</span> <input type="text" id="FR_Name"> </input>';
   echo '<span>DE Name</span> <input type="text" id="DE_Name"> </input>';
   echo '<span>IT Name</span> <input type="text" id="IT_Name"> </input><br/>';
   echo '<span>PT Name</span> <input type="text" id="PT_Name"> </input>';
   echo '<span>ES Name</span> <input type="text" id="ES_Name"> </input>';
   echo '<span>ZH Name</span> <input type="text" id="ZH_Name"> </input><br/><br/>';
   echo '<button type="submit" name="add_cards_data_submit" class="add_cards_data_submit" id="add_cards_data_submit" value="add_cards_data_submit">Submit</button><br/>';
}

if($_POST['search_card_name'] == "search_card_name"){

   if($_POST['Card_Name'] != ""){

   $search_card_name_query = "SELECT * FROM YGO_DATA WHERE (EN_Name LIKE '" . $_POST['Card_Name'] . "%' OR JA_Name LIKE '" . $_POST['Card_Name'] . "%' OR KO_Name LIKE '" . $_POST['Card_Name'] . "%' OR DE_Name LIKE '" . $_POST['Card_Name'] . "%' OR IT_Name LIKE '" . $_POST['Card_Name'] . "%' OR PT_Name LIKE '" . $_POST['Card_Name'] . "%' OR ES_Name LIKE '" . $_POST['Card_Name'] . "%' OR ZH_Name LIKE '" . $_POST['Card_Name'] . "%') ORDER BY EN_Name ASC";

   $result2 = mysql_query($search_card_name_query);

   while($row = mysql_fetch_array($result2)){ 
      echo "<div class='list " . $row['Color_1'] . " ygo_name' id='" . $row['Card_Data_ID'] . "' >";
      echo "<div style='width: 10%; display:inline-block;' >";
      echo "<strong><u>Data ID</u></strong><br/><span class='theIDs'>" . $row['Card_Data_ID'] . "</span><br/>";
      echo "</div>";
      echo "<div style='width: 90%; display:inline-block;' >";
      echo '<h1>' . $row['EN_Name'] . ' <img src="http://ygo.tgcdt.com/images/' . $row['Attribute'] . '.png" height="25px" /></h1> ';
      if($row['Level'] != ""){
         for($i = 0; $i < $row['Level']; $i++){
            echo '<img src="http://ygo.tgcdt.com/images/Level.png" height="20px" />';
         }
         echo "<br/>";
      }
      if($row['Rank'] != ""){
         for($i = 0; $i < $row['Rank']; $i++){
            echo '<img src="http://ygo.tgcdt.com/images/Rank.png" height="20px" />';
         }
         echo "<br/>";
      }
      if($row['Property'] != ""){
         echo '[ ' . $row['Attribute'] . ' CARD <img src="http://ygo.tgcdt.com/images/' . $row['Property'] . '.png" height="25px" /> ]<br/>';
      }
      if($row['Pendulum_Blue'] > "0" && $row['Pendulum_Red'] > "0"){
         echo $row['Pendulum_Blue'] . " - " . $row['Pendulum_Red'] . "<br/>";
      }
      if($row['Type'] != ""){
         echo "<strong>" . $row['Type'] . " / " . $row['Ability_1'];
         if($row['Ability_2'] != ""){
            echo " / " . $row['Ability_2'];
            if($row['Ability_3'] != ""){
               echo " / " . $row['Ability_3'];
            }
         }
         echo "</strong><br/>";
      }
      if($row['ATK'] != "" && $row['DEF'] != "" ){
         echo "<strong>ATK " . $row['ATK'] . " / DEF " . $row['DEF'] . "</strong>";
      }
      echo " (" . $row['Number'] . ")<br/>";
      echo "<br/><br/>";

      echo " <strong>French:</strong> " . $row['FR_Name'] . " <strong>German:</strong> " . $row['DE_Name'] . " <strong>Italian:</strong> " . $row['IT_Name'] . "<br/>";
      echo "<strong>Spanish:</strong> " . $row['ES_Name'] . " <strong>Portuguese:</strong> " . $row['PT_Name'] . " <strong>Chinese:</strong> " . $row['ZH_Name'] . "<br/>";
      echo "<strong>Japanese:</strong> " . $row['JA_Name'] . " <strong>Japanese (Kanji):</strong> " . $row['JAK_Name'] . " <strong>Japanese (Hiri):</strong> " . $row['JAH_Name'] . "<br/>";
      echo "<strong>Korean:</strong> " . $row['KO_Name'] . " <strong>Korean (Kanji):</strong> " . $row['KOK_Name'] . " <strong>Korean (Hiri):</strong> " . $row['KOH_Name'] . "<br/>";
      echo "</div>";
      echo "</div>";
   }
   }else{
      echo "<br/>(ノಠ益ಠ)ノ Did you forget something...<br/>";
   }

}

if($_POST['add_cards_data_submit'] == "add_cards_data_submit"){

   $insert_query = "INSERT INTO YGO_DATA (EN_Name, Attribute, Color_1, Color_2, Type, Ability_1, Ability_2, Ability_3, Property, Level, Rank, ATK, DEF, Pendulum_Blue, Pendulum_Red, Number, JA_Name, JAK_Name, JAH_Name, KO_Name, KOK_Name, KOH_Name, FR_Name, DE_Name, IT_Name, PT_Name, ES_Name, ZH_Name) VALUES ('" . mysql_real_escape_string($_POST['EN_Name']) . "','" . mysql_real_escape_string($_POST['Attribute']) . "','" . mysql_real_escape_string($_POST['Color_1']) . "','" . mysql_real_escape_string($_POST['Color_2']) . "','" . mysql_real_escape_string($_POST['Type']) . "','" . mysql_real_escape_string($_POST['Ability_1']) . "','" . $_POST['Ability_2'] . "','" . mysql_real_escape_string($_POST['Ability_3']) . "','" . $_POST['Property'] . "','" . mysql_real_escape_string($_POST['Level']) . "','" . mysql_real_escape_string($_POST['Rank']) . "','" . $_POST['ATK'] . "','" . mysql_real_escape_string($_POST['DEF']) . "','" . $_POST['Pendulum_Blue'] . "','" . mysql_real_escape_string($_POST['Pendulum_Red']) . "','" . mysql_real_escape_string($_POST['Number']) . "','" . mysql_real_escape_string($_POST['JA_Name']) . "','" . mysql_real_escape_string($_POST['JAK_Name']) . "','" . mysql_real_escape_string($_POST['JAH_Name']) . "','" . mysql_real_escape_string($_POST['KO_Name']) . "','" . mysql_real_escape_string($_POST['KOK_Name']) . "','" . mysql_real_escape_string($_POST['KOH_Name']) . "','" . mysql_real_escape_string($_POST['FR_Name']) . "','" . mysql_real_escape_string($_POST['DE_Name']) . "','" . mysql_real_escape_string($_POST['IT_Name']) . "','" . mysql_real_escape_string($_POST['PT_Name']) . "','" . mysql_real_escape_string($_POST['ES_Name']) . "','" . mysql_real_escape_string($_POST['ZH_Name']) . "')";

   if (!mysql_query($insert_query,$con2)){
      echo "Sad Day T-T If you see this call Vince." . "<br />";
   }else{
      echo $face_array[array_rand($face_array)] . " HAHA, COOKIES ON DOWELS!" . "<br />";
   }

   $search_attack_name_query = "SELECT * FROM YGO_DATA WHERE EN_Name LIKE '" . $_POST['EN_Name'] . "%' AND JA_Name LIKE '" . $_POST['JA_Name'] . "%' ORDER BY Card_Data_ID DESC";

   $result = mysql_query($search_attack_name_query); 

   while($row = mysql_fetch_array($result)){ 
      echo "<div class='list " . $row['Color_1'] . " ygo_name' id='" . $row['Card_Data_ID'] . "' >";
      echo "<div style='width: 10%; display:inline-block;' >";
      echo "<strong><u>Data ID</u></strong><br/><span class='theIDs'>" . $row['Card_Data_ID'] . "</span><br/>";
      echo "</div>";
      echo "<div style='width: 90%; display:inline-block;' >";
      echo '<h1>' . $row['EN_Name'] . ' <img src="http://ygo.tgcdt.com/images/' . $row['Attribute'] . '.png" height="25px" /></h1> ';
      if($row['Level'] != ""){
         for($i = 0; $i < $row['Level']; $i++){
            echo '<img src="http://ygo.tgcdt.com/images/Level.png" height="20px" />';
         }
         echo "<br/>";
      }
      if($row['Rank'] != ""){
         for($i = 0; $i < $row['Rank']; $i++){
            echo '<img src="http://ygo.tgcdt.com/images/Rank.png" height="20px" />';
         }
         echo "<br/>";
      }
      if($row['Property'] != ""){
         echo '[ ' . $row['Attribute'] . ' CARD <img src="http://ygo.tgcdt.com/images/' . $row['Property'] . '.png" height="25px" /> ]<br/>';
      }
      if($row['Pendulum_Blue'] > "0" && $row['Pendulum_Red'] > "0"){
         echo $row['Pendulum_Blue'] . " - " . $row['Pendulum_Red'] . "<br/>";
      }
      if($row['Type'] != ""){
         echo "<strong>" . $row['Type'] . " / " . $row['Ability_1'];
         if($row['Ability_2'] != ""){
            echo " / " . $row['Ability_2'];
            if($row['Ability_3'] != ""){
               echo " / " . $row['Ability_3'];
            }
         }
         echo "</strong><br/>";
      }
      if($row['ATK'] != "" && $row['DEF'] != "" ){
         echo "<strong>ATK " . $row['ATK'] . " / DEF " . $row['DEF'] . "</strong>";
      }
      echo " (" . $row['Number'] . ")<br/>";
      echo "<br/><br/>";

      echo " <strong>French:</strong> " . $row['FR_Name'] . " <strong>German:</strong> " . $row['DE_Name'] . " <strong>Italian:</strong> " . $row['IT_Name'] . "<br/>";
      echo "<strong>Spanish:</strong> " . $row['ES_Name'] . " <strong>Portuguese:</strong> " . $row['PT_Name'] . " <strong>Chinese:</strong> " . $row['ZH_Name'] . "<br/>";
      echo "<strong>Japanese:</strong> " . $row['JA_Name'] . " <strong>Japanese (Kanji):</strong> " . $row['JAK_Name'] . " <strong>Japanese (Hiri):</strong> " . $row['JAH_Name'] . "<br/>";
      echo "<strong>Korean:</strong> " . $row['KO_Name'] . " <strong>Korean (Kanji):</strong> " . $row['KOK_Name'] . " <strong>Korean (Hiri):</strong> " . $row['KOH_Name'] . "<br/>";
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

   $search_card_name_query = "SELECT * FROM YGO_COLLECT WHERE Set_Number LIKE '" . $_POST['Card_Number'] . "%' ORDER BY Set_Number ASC";

   $result2 = mysql_query($search_card_name_query);

   while($row2 = mysql_fetch_array($result2)){ 
      echo "<div class='list Parts " . " ygo_collect' id='" . $row2['Card_Collect_ID'] . "' >";
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
   $insert_query = "INSERT INTO YGO_COLLECT (Set_Number, Set_Icon, Artist, Copyright, Rarity_Symbol) VALUES ('" . mysql_real_escape_string($_POST['Set_Number']) . "','" . mysql_real_escape_string($_POST['Set_Abbr']) . "','" . mysql_real_escape_string($_POST['Artist']) . "','" . mysql_real_escape_string($_POST['Copyright']) . "','" . $_POST['Rarity_Symbol'] . "')";

   if (!mysql_query($insert_query,$con2)){
      echo "Sad Day T-T If you see this call Vince." . "<br />";
   }else{
      echo $face_array[array_rand($face_array)] . " HAHA, COOKIES ON DOWELS!" . "<br />";
   }

   $search_cards_collect_query = "SELECT * FROM YGO_COLLECT WHERE Set_Number LIKE '" . $_POST['Set_Number'] . "%' ORDER BY Set_Number ASC";

   $result = mysql_query($search_cards_collect_query); 

   while($row = mysql_fetch_array($result)){ 
      echo "<div class='list Parts " . " ygo_collect' id='" . $row2['Card_Collect_ID'] . "' >";
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

   echo '<span>Text ID</span> <input type="text"size="2"  id="Text_ID" value="' . $_POST['Text_ID'] . '" ></input>  <span>Attack Name</span> <input type="text" id="Attack_Name"> </input> <button type="submit" class="search_attack_name" id="search_attack_name_' . $i . '" value="search_attack_name_' . $i . '">Search Attack Name</button> <button type="submit" class="add_card_text" id="add_card_text_' . $i . '" value="add_card_text_' . $i . '">Add New Card Text</button><br/><span id="card_text_info" class="hidden">Loading...</span><br/>';

   echo '<span>Collect ID</span> <input type="text" size="2" id="Collect_ID" value="' . $_POST['Collect_ID'] . '" ></input>  <span>Card Number</span> <input type="text" id="Card_Number2" value="' . $_POST['Card_Number2'] . '" > </input><button type="button" class="search_card_number" id="search_card_number_' . $i . '" value="search_card_number_' . $i . '">Search Card Number</button> <button type="button" class="add_card_collect" id="add_card_collect_' . $i . '" value="add_card_collect_' . $i . '">Add New Card Collect</button><br/><span id="card_collect_info" class="hidden">Loading...</span><br/>';

   echo '<button type="submit" class="add_cards_submit" id="add_cards_submit" value="add_cards_submit">Final Submit</button>';
   }
}




if($_POST['add_cards_submit'] == "add_cards_submit"){

echo $face_array[array_rand($face_array)] . "woot<br />";

   $temp_card_ID = "";
   $insert_query = "INSERT INTO YGO_CARDS (DB_Card_Num, Edition, Rarity, Holo, Card_Language, Data_ID, Text_ID, Collect_ID) VALUES ('" . mysql_real_escape_string($_POST['DB_Card_Num']) . "','" . $_POST['Edition'] . "','" . mysql_real_escape_string($_POST['Rarity']) . "','" . $_POST['Holo'] . "','" . mysql_real_escape_string($_POST['Card_Language']) . "','" . $_POST['Data_ID'] . "','" . mysql_real_escape_string($_POST['Text_ID']) . "','" . $_POST['Collect_ID'] . "')";

   if (!mysql_query($insert_query,$con2)){
      echo "<br />Sad Day T-T If you see this call Vince." . "<br />";
   }else{
      echo "<br />" . $face_array[array_rand($face_array)] . " HAHA, COOKIES ON DOWELS!" . "<br />";
   }

   $search_attack_name_query = "SELECT * FROM YGO_CARDS WHERE Data_ID LIKE '" . $_POST['Data_ID'] . "%' AND Text_ID LIKE '" . $_POST['Text_ID'] . "%' AND Collect_ID LIKE '" . $_POST['Collect_ID'] . "%' ORDER BY Card_ID ASC";

   $result = mysql_query($search_attack_name_query); 

   while($row = mysql_fetch_array($result)){ 
      $temp_card_ID = $row['Card_ID'];
      echo $temp_card_ID;
      echo "<br/><br/>";
   }

   $insert_query2 = "INSERT INTO YGO_COMPLETE (Card_ID, Set_ID) VALUES ('" . $temp_card_ID . "','" . $_POST['Set_ID'] . "')";

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
   echo '<br/><span>Text Language</span> <input type="text" size="10" id="Text_Language"></input> <span>Data_Link_ID</span> <input type="text" size="3" id="Data_Link_ID"></input><br/>';
   echo '<h3>Pendulum Effect</h3>';
   echo '<span>Text</span> <textarea rows="2" cols="80" id="Pendulum_Effect"></textarea><br/>';
   echo '<h3>Materials</h3>';
   echo '<span>Text</span> <input type="text" id="Materials"></input><br/>';
   echo '<h3>Card Effect</h3>';
   echo '<span>Text</span> <textarea rows="2" cols="80" id="Card_Effect"></textarea><br/>';
   echo '<h3>Flavor Text</h3>';
   echo '<span>Text</span> <textarea rows="2" cols="80" id="Flavor_Text"></textarea><br/><br/>';
   echo '<button type="submit" name="add_cards_text_submit" class="add_cards_text_submit" id="add_cards_text_submit" value="add_cards_text_submit">Submit</button><br/>';
}

if($_POST['search_attack_name'] == "search_attack_name_1"){
   if($_POST['Attack_Name'] != ""){

   $search_attack_name_query = "SELECT * FROM YGO_TEXT WHERE Data_Link_ID LIKE '" . $_POST['Attack_Name'] . "' OR Card_Effect LIKE '%" . $_POST['Attack_Name'] . "%' OR Materials LIKE '%" . $_POST['Attack_Name'] . "%' OR Flavor_Text LIKE '" . $_POST['Attack_Name'] . "%' ORDER BY Card_Text_ID DESC";

   $result2 = mysql_query($search_attack_name_query);

   while($row2 = mysql_fetch_array($result2)){ 
      echo "<div class='list Parts " . " ygo_text' id='" . $row2['Card_Text_ID'] . "' >";
      echo "<div style='width: 10%; display:inline-block;' >";
      echo "<strong><u>Text ID</u></strong><br/><span class='theIDs'>" . $row2['Card_Text_ID'] . "</span><br/>";
      echo "<strong><u>Data Link ID</u></strong><br/><span class='theIDs'>" . $row2['Data_Link_ID'] . "</span><br/>";
      echo "<strong><u>Language</u></strong><br/><span class='theIDs'>" . $row2['Text_Language'] . "</span><br/>";
      echo "</div>";
      echo "<div style='width: 90%; display:inline-block;' >";
      if($row2['Pendulum_Effect'] != ""){
         echo $row2['Pendulum_Effect'] . "<br/>";
      }
      if($row2['Materials'] != ""){
         echo $row2['Materials'] . "<br/>";
      }
      if($row2['Card_Effect'] != ""){
         echo $row2['Card_Effect'] . "<br/>";
      }
      if($row2['Flavor_Text'] != ""){
         echo "<i>" . $row2['Flavor_Text'] . "</i><br/>";
      }
      echo "</div>";
      echo "</div>";
   }
   }else{
      echo "<br/>(ง •̀_•́)ง Did you forget something...<br/>";
   }
}

if($_POST['add_cards_text_submit'] == "add_cards_text_submit"){
   $insert_query = "INSERT INTO YGO_TEXT (Text_Language, Data_Link_ID, Flavor_Text, Materials, Pendulum_Effect, Card_Effect) VALUES ('" . mysql_real_escape_string($_POST['Text_Language']) . "','" . mysql_real_escape_string($_POST['Data_Link_ID']) . "','" . mysql_real_escape_string($_POST['Flavor_Text']) . "','" . mysql_real_escape_string($_POST['Materials']) . "','" . mysql_real_escape_string($_POST['Pendulum_Effect']) . "','" . mysql_real_escape_string($_POST['Card_Effect']) . "')";

   if (!mysql_query($insert_query,$con2)){
      echo "Sad Day T-T If you see this call Vince." . "<br />";
   }else{
      echo $face_array[array_rand($face_array)] . " HAHA, COOKIES ON DOWELS!" . "<br />";
   }

   $search_attack_name_query = "SELECT * FROM YGO_TEXT WHERE Attack_1_Name LIKE '" . $_POST['Attack_1_Name'] . "%' AND Ability_Name LIKE '" . $_POST['Ability_Name'] . "%' ORDER BY Card_Text_ID DESC";

   $result = mysql_query($search_attack_name_query); 

   while($row2 = mysql_fetch_array($result)){ 
      echo "<div class='list Parts " . " ygo_text' id='" . $row2['Card_Text_ID'] . "' >";
      echo "<div style='width: 10%; display:inline-block;' >";
      echo "<strong><u>Text ID</u></strong><br/><span class='theIDs'>" . $row2['Card_Text_ID'] . "</span><br/>";
      echo "<strong><u>Data Link ID</u></strong><br/><span class='theIDs'>" . $row2['Data_Link_ID'] . "</span><br/>";
      echo "<strong><u>Language</u></strong><br/><span class='theIDs'>" . $row2['Text_Language'] . "</span><br/>";
      echo "</div>";
      echo "<div style='width: 90%; display:inline-block;' >";
      if($row2['Pendulum_Effect'] != ""){
         echo $row2['Pendulum_Effect'] . "<br/>";
      }
      if($row2['Materials'] != ""){
         echo $row2['Materials'] . "<br/>";
      }
      if($row2['Card_Effect'] != ""){
         echo $row2['Card_Effect'] . "<br/>";
      }
      if($row2['Flavor_Text'] != ""){
         echo "<i>" . $row2['Flavor_Text'] . "</i><br/>";
      }
      echo "</div>";
      echo "</div>";
   }
}

if($_POST['Main_Search'] == "go"){
   $master_query = "SELECT * FROM 
( Select * FROM YGO_CARDS as T1
INNER JOIN YGO_DATA as T2 ON T1.Data_ID = T2.Card_Data_ID
INNER JOIN YGO_TEXT as T3 ON T1.Text_ID = T3.Card_TEXT_ID
INNER JOIN YGO_COLLECT as T4 ON T1.Collect_ID = T4.Card_Collect_ID WHERE 1) as CARDS
INNER JOIN ( Select *, GROUP_CONCAT(EN_Set_Name SEPARATOR '|') FROM YGO_COMPLETE as T5
INNER JOIN YGO_SETS as T6 ON T5.Set_ID = T6.Main_Set_ID GROUP BY Card_ID) as COMPLETE
ON CARDS.Card_ID = COMPLETE.Card_ID
WHERE EN_Name LIKE '" . $_POST['en_name'] . "%' AND Set_Language LIKE '" . $_POST['lang'] . "%' AND Set_ID LIKE '" . $_POST['Set_ID'] . "' AND Set_Number LIKE '" . $_POST['Card_Number'] . "%' ORDER BY DB_Card_Num ASC";

   $result = mysql_query($master_query) or die(mysql_error()); 

   while($row = mysql_fetch_array($result)){ 
      echo "<div class='list " . $row['Color_1'] . "'>";
      echo "<div style='width: 10%; display:inline-block;' >";
      echo "<strong><u>Set ID</u></strong><br/><span class='theIDs'>" . $row['Set_ID'] . "</span><br/>";
      echo "<strong><u>Card ID</u></strong><br/><span class='theIDs'>" . $row['Card_ID'] . "</span><br/>";
      echo "<strong><u>Data ID</u></strong><br/><span class='theIDs'>" . $row['Data_ID'] . "</span><br/>";
      echo "<strong><u>Text ID</u></strong><br/><span class='theIDs'>" . $row['Text_ID'] . "</span><br/>";
      echo "<strong><u>Collect ID</u></strong><br/><span class='theIDs'>" . $row['Collect_ID'] . "</span><br/>";
      echo "</div>";
      echo "<div style='width: 90%; display:inline-block;' >";
      echo '<h1>' . $row['EN_Name'] . ' <img src="http://ygo.tgcdt.com/images/' . $row['Attribute'] . '.png" height="25px" /></h1> ';
      if($row['Level'] != ""){
         for($i = 0; $i < $row['Level']; $i++){
            echo '<img src="http://ygo.tgcdt.com/images/Level.png" height="20px" />';
         }
         echo "<br/>";
      }
      if($row['Rank'] != ""){
         for($i = 0; $i < $row['Rank']; $i++){
            echo '<img src="http://ygo.tgcdt.com/images/Rank.png" height="20px" />';
         }
         echo "<br/>";
      }
      if($row['Property'] != ""){
         echo '[ ' . $row['Attribute'] . ' CARD <img src="http://ygo.tgcdt.com/images/' . $row['Property'] . '.png" height="25px" /> ]<br/>';
      }
      if($row['Pendulum_Blue'] > "0" && $row['Pendulum_Red'] > "0"){
         echo $row['Pendulum_Blue'] . " - " . $row['Pendulum_Red'] . "<br/>";
      }
      if($row['Type'] != ""){
         echo "<strong>" . $row['Type'] . " / " . $row['Ability_1'];
         if($row['Ability_2'] != ""){
            echo " / " . $row['Ability_2'];
            if($row['Ability_3'] != ""){
               echo " / " . $row['Ability_3'];
            }
         }
         echo "</strong><br/>";
      }
      if($row['ATK'] != "" && $row['DEF'] != "" ){
         echo "<strong>ATK " . $row['ATK'] . " / DEF " . $row['DEF'] . "</strong>";
      }
      echo " (" . $row['Number'] . ")<br/>";

      echo "<br/><br/>";
      echo $row['DB_Card_Num'] . "_" . $row['Edition'] . "_" . $row['Card_ID'] . "<br/>";
      if($row['Rarity'] != ""){
         echo "<span class='shimmer'>";
      }else{
         echo "<span>";
      }
      echo $row['Rarity'] . " (" . $row['Holo'] . ")</span><br/><strong>" . $row['Set_Number'] . "</strong> " . $row['EN_Set_Name'] . "<br/><br/>";
      if($row['Text_ID'] == "0"){
         echo "Blah<br/>";
      }else{
         if($row['Pendulum_Effect'] != ""){
            echo $row['Pendulum_Effect'] . "<br/>";
         }
         if($row['Materials'] != ""){
            echo $row['Materials'] . "<br/>";
         }
         if($row['Card_Effect'] != ""){
            echo $row['Card_Effect'] . "<br/>";
         }
         if($row['Flavor_Text'] != ""){
            echo "<i>" . $row['Flavor_Text'] . "</i><br/>";
         }
      }

      echo $row['Copyright'] . "<br/>";
      echo "</div>";
      echo "</div>";
      echo "<br/>";
   }
}




?>
</html>