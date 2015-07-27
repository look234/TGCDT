

<?php

$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();

$db_name = "ptcg";
$db_username = "vinceoa2_ygo";
$db_password = "ki_234_ki";
$meta_tags = "ptcg, pokemon, Pocket Monsters, checklist, database, card game, trading card, collectible card, TGCDT, The Giant Checklist Database Thing";
$page_title = "TGCDT Pokémon";
$languages = array( 0 => "EN", 1 => "FR", 2 => "DE", 3 => "IT", 4 => "PT", 5 => "ES", 6 => "JA", 7 => "KO");
$languages_full = array( "EN" => "English", "FR" => "French", "DE" => "German", "IT" => "Italian", "PT" => "Portuguese", "ES" => "Spanish", "JA" => "Japanese", "KO" => "Korean");
$modal_body_color = "Type_1";

/* Home Page Specific */

$copyright = "Pokémon And All Respective Names are Trademark & © of Nintendo 1996-2015";
$welcome_msg = '<span style="font-size:14px; font-weight:bold;">Welcome</span> to the Pokémon Branch of TGCDT! We\'ll do our best to keep this database up-to-date with the latest cards. Hope you enjoy and let us know if there is anything we can do to help! ^_^ <b>helpdesk@ygo.tgcdt.com</b><br/>We are currently renovating the login/account creation system to integrate it with the new forum, for now account creation can be done through the forum. <a href="http://tgcdt.com/forum/ucp.php?mode=register" target=""><b>Click Here!</b></a>';

/* Newest Sets Specific */

//$new_sets_query = "SELECT DISTINCT PTCG_SETS.Set_Language, PTCG_SETS.EN_Set_Name, PTCG_SETS.JA_Set_Name, PTCG_SETS.FR_Set_Name, PTCG_SETS.DE_Set_Name, PTCG_SETS.IT_Set_Name, PTCG_SETS.ZH_Set_Name, PTCG_SETS.PT_Set_Name, PTCG_SETS.ES_Set_Name, PTCG_SETS.KO_Set_Name, PTCG_SETS.Release_Date FROM PTCG_SETS ORDER BY PTCG_SETS.Release_Date DESC LIMIT 20";
$new_sets_query = "SELECT DISTINCT PTCG_SETS.Main_Set_ID, PTCG_SETS.Set_Language, PTCG_SETS.EN_Set_Name, PTCG_SETS.JA_Set_Name, PTCG_SETS.KO_Set_Name, PTCG_SETS.Release_Date FROM PTCG_SETS ORDER BY PTCG_SETS.Release_Date DESC LIMIT 20";

/* Search Buttons Specific */




$button_values = array( "button_1" => array( 0 => "Stage", 1 => "Stage", 2 => "SELECT DISTINCT Stage FROM PTCG_DATA ORDER BY Stage ASC"),
                        "button_2" => array( 0 => "HP", 1 => "HP", 2 => "SELECT DISTINCT HP FROM PTCG_DATA ORDER BY HP ASC"),
                        "button_3" => array( 0 => "Retreat", 1 => "Retreat", 2 => "SELECT DISTINCT Retreat FROM PTCG_DATA ORDER BY Retreat ASC"),
                        "button_4" => array( 0 => "Rarity", 1 => "Rarity", 2 => "SELECT DISTINCT Rarity FROM PTCG_CARDS ORDER BY Rarity ASC"),
                        "button_5" => array( 0 => "Edition", 1 => "Edition", 2 => "SELECT DISTINCT Edition FROM PTCG_CARDS ORDER BY Edition ASC"),
                        "button_6" => array( 0 => "Artist", 1 => "Artist", 2 => "SELECT DISTINCT Artist FROM PTCG_COLLECT ORDER BY Artist ASC"),
                        "button_7" => array( 0 => "Card_Language", 1 => "Language", 2 => "SELECT DISTINCT Card_Language FROM PTCG_CARDS ORDER BY Card_Language ASC"),
                        "button_8" => array( 0 => "Holo", 1 => "Holo", 2 => "SELECT DISTINCT Holo FROM PTCG_CARDS ORDER BY Holo ASC"));

$complex_button_values = array("button_c_1" => array( 0 => "Type", 1 => "Type", 2 => "1", 3 => "2", 4 => "", 5 => ("PTCG_DATA")),
                               "button_c_2" => array( 0 => "Weakness", 1 => "Weakness", 2 => "1", 3 => "2", 4 => "", 5 => ("PTCG_DATA")));

/* Search Specific */

$sort_values = array( "Name" => " ORDER BY EN_Name, Prefix, Suffix, Release_Date, Set_Number",
                      "Dex Number" => " ORDER BY Number, EN_Name, Prefix, Suffix, Release_Date, Set_Number",
                      "HP" => " ORDER BY HP, EN_Name, Prefix, Suffix, Release_Date, Set_Number",
                      "Stage" => " ORDER BY Stage, EN_Name, Prefix, Suffix, Release_Date, Set_Number",
                      "Retreat" => " ORDER BY Retreat, EN_Name, Prefix, Suffix, Release_Date, Set_Number",
                      "Rarity" => " ORDER BY Rarity, EN_Name, Prefix, Suffix, Release_Date, Set_Number",
                      "Release Date" => " ORDER BY Release_Date, EN_Name, Prefix, Suffix, Set_Number",
                      "Type" => " ORDER BY Type_1, Type_2, EN_Name, Prefix, Suffix, Release_Date, Set_Number");

$master_query = "SELECT * FROM 
( Select * FROM PTCG_CARDS as T1
INNER JOIN PTCG_DATA as T2 ON T1.Data_ID = T2.Card_Data_ID
INNER JOIN PTCG_TEXT as T3 ON T1.Text_ID = T3.Card_TEXT_ID
INNER JOIN PTCG_COLLECT as T4 ON T1.Collect_ID = T4.Card_Collect_ID WHERE 1) as CARDS
INNER JOIN ( Select *, GROUP_CONCAT(EN_Set_Name SEPARATOR '|') as magic, GROUP_CONCAT(Main_Set_ID SEPARATOR '|'), GROUP_CONCAT(Release_Date SEPARATOR '|') FROM PTCG_COMPLETE as T5
INNER JOIN PTCG_SETS as T6 ON T5.Set_ID = T6.Main_Set_ID GROUP BY Card_ID) as COMPLETE
ON CARDS.Card_ID = COMPLETE.Card_ID
WHERE (";

$search_values = array( "button_1" => "Stage",
                        "button_2" => "HP",
                        "button_3" => "Retreat",
                        "button_4" => "Rarity",
                        "button_5" => "Edition",
                        "button_6" => "Artist",
                        "button_7" => "Card_Language",
                        "button_8" => "Holo",
                        "Card_Name" => array( 0 => "EN_Name", 1 => "magic"),
                        "button_c_1" => array( 0 => "Type_1", 1 => "Type_2"),
                        "button_c_2" => array( 0 => "Weakness_1", 1 => "Weakness_2"));


function energyReplace($string){
   $string = str_replace("[[Water]]", "<img src='images/Water.png' height='15px' />", $string);
   $string = str_replace("[[Colorless]]", "<img src='images/Colorless.png' height='15px' />", $string);
   $string = str_replace("[[Fairy]]", "<img src='images/Fairy.png' height='15px' />", $string);
   $string = str_replace("[[Fighting]]", "<img src='images/Fighting.png' height='15px' />", $string);
   $string = str_replace("[[Fire]]", "<img src='images/Fire.png' height='15px' />", $string);
   $string = str_replace("[[Grass]]", "<img src='images/Grass.png' height='15px' />", $string);
   $string = str_replace("[[Lightning]]", "<img src='images/Lightning.png' height='15px' />", $string);
   $string = str_replace("[[Psychic]]", "<img src='images/Psychic.png' height='15px' />", $string);
   $string = str_replace("[[Metal]]", "<img src='images/Metal.png' height='15px' />", $string);
   $string = str_replace("[[Darkness]]", "<img src='images/Darkness.png' height='15px' />", $string);
   $string = str_replace("[[Dragon]]", "<img src='images/Dragon.png' height='15px' />", $string);
   $string = str_replace("[[None]]", "<img src='images/None.png' height='15px' />", $string);

   $string = str_replace("[[水]]", "<img src='images/water2.png' height='15px' />", $string);
   $string = str_replace("[[無色]]", "<img src='images/colorless2.png' height='15px' />", $string);
   $string = str_replace("[[フェアリー]]", "<img src='images/fairy2.png' height='15px' />", $string);
   $string = str_replace("[[闘]]", "<img src='images/fighting2.png' height='15px' />", $string);
   $string = str_replace("[[炎]]", "<img src='images/fire2.png' height='15px' />", $string);
   $string = str_replace("[[草]]", "<img src='images/grass2.png' height='15px' />", $string);
   $string = str_replace("[[雷]]", "<img src='images/lightning2.png' height='15px' />", $string);
   $string = str_replace("[[超]]", "<img src='images/psychic2.png' height='15px' />", $string);
   $string = str_replace("[[鋼]]", "<img src='images/metal2.png' height='15px' />", $string);
   $string = str_replace("[[悪]]", "<img src='images/darkness2.png' height='15px' />", $string);
   $string = str_replace("[[ドラゴン]]", "<img src='images/dragon2.png' height='15px' />", $string);
   $string = str_replace("(", "<em>(", $string);
   $string = str_replace(")", ")</em>", $string);
   return $string;
}

function typeReplace($string, $size){
   $string = str_replace("Water", "<img src='images/Water.png' height='" . $size . "' style='vertical-align: text-bottom;' />", $string);
   $string = str_replace("Colorless", "<img src='images/Colorless.png' height='" . $size . "' style='vertical-align: text-bottom;' />", $string);
   $string = str_replace("Fairy", "<img src='images/Fairy.png' height='" . $size . "' style='vertical-align: text-bottom;' />", $string);
   $string = str_replace("Fighting", "<img src='images/Fighting.png' height='" . $size . "' style='vertical-align: text-bottom;' />", $string);
   $string = str_replace("Fire", "<img src='images/Fire.png' height='" . $size . "' style='vertical-align: text-bottom;' />", $string);
   $string = str_replace("Grass", "<img src='images/Grass.png' height='" . $size . "' style='vertical-align: text-bottom;' />", $string);
   $string = str_replace("Lightning", "<img src='images/Lightning.png' height='" . $size . "' style='vertical-align: text-bottom;' />", $string);
   $string = str_replace("Psychic", "<img src='images/Psychic.png' height='" . $size . "' style='vertical-align: text-bottom;' />", $string);
   $string = str_replace("Metal", "<img src='images/Metal.png' height='" . $size . "' style='vertical-align: text-bottom;' />", $string);
   $string = str_replace("Darkness", "<img src='images/Darkness.png' height='" . $size . "' style='vertical-align: text-bottom;' />", $string);
   $string = str_replace("Dragon", "<img src='images/Dragon.png' height='" . $size . "' style='vertical-align: text-bottom;' />", $string);
   return $string;
}

function multiSuffix2($tempSuf){
   $tempSufParts = explode("|", $tempSuf);
   $sufArray = array("☆", "G", "4", "C", "ACE SPEC", "Team Plasma", "Mega", "LEGEND", "EX", "GL", "FB", "(G)", "(F)", "(Fi)", "(W)", "(P)", "(L)", "(C)", "(M)", "(D)", "(Dr)");
   if(in_array($tempSufParts[0], $sufArray)){
       echo "<img src='/images/" . $tempSufParts[0] . ".png' style='vertical-align: middle;' height='18px' />";
   }else{
       if($tempSufParts[0] == "ex"){
          echo " <i><b>ex</b></i>";
       }elseif($tempSufParts[0] == "δ"){
          echo ' δ <span class="card_name_style_small">DELTA SPECIES</span>';
       }elseif($tempSufParts[0] == "LV.X"){
         echo ' <span class="card_name_style_small">LV.</span><i><b><span>X</span></b></i>';
       }else{
          echo '<span class="card_name_style_small">' . $tempSufParts[0] . '</span>';
       }
   }
   if(isset($tempSufParts[1])){
      if(in_array($tempSufParts[1], $sufArray)){
         echo "<img src='/images/" . $tempSufParts[1] . ".png' style='vertical-align: middle;' height='18px'/>";
      }elseif($tempSufParts[1] == "LV.X"){
         echo ' <span class="card_name_style_small">LV.</span><i><b><span>X</span></b></i>';
      }elseif($tempSufParts[1] == "δ"){
          echo ' δ <span class="card_name_style_small">DELTA SPECIES</span>';
      }else{
         echo " " . '<span class="card_name_style_small">' . $tempSufParts[1] . '</span>';
      }
   }
}

function detailCardInfoHeader($row, $language){
   echo '<img src="images/' . $language . '_icons/' . $row['Set_Icon'] . '.png" width="20px" height="20px" /> <strong> ' . $row['Set_Number'] . '</strong> ' . $row['EN_Set_Name'] . '<br/>';
   if($row['Edition'] == "1st"){
      echo '<img src="images/' . $language . '_icons/' . $row['Edition'] . '.png" width="20px" height="20px" /> ';
   }
   if($row['Rarity_Symbol'] != ""){
      echo ' <img src="images/' . $row['Rarity_Symbol'] . '.png" width="10px" height="10px" />';
   }
   echo ' ' . $row['Rarity'];
   if($row['Holo'] != ""){
      echo ' <em>(' . $row['Holo'] . ')</em> ';
   }
}

function detailCardInfo($row, $count, $temp_language){
   echo "<div class='list modal-card-info'>";
      echo "<div style='width: 263px; display:table-cell;' >";
      $tempPath_jpg = '/home8/vinceoa2/public_html/ptcg/images/' . $temp_language . '_cards/' . $row['DB_Card_Num'] . '_' . $row['Edition'] . '_' . $row['Card_ID'] . '.jpg';

      if(file_exists($tempPath_jpg)){
         echo '<img style="vertical-align: text-top;" src="images/' . $temp_language . '_cards/' . $row['DB_Card_Num'] . '_' . $row['Edition'] . '_' . $row['Card_ID'] . '.jpg">';
      }else{
         $site_test = "http://ptcg.tgcdt.com/images/back1.png";
         echo '<img style="vertical-align: text-top;" src="' . $site_test . '"/>';
      }
      echo '</div>';
      echo '<div class="CardInfoHolder' . $row['Data_ID'] . '" style="width: 53%; display:table-cell;" >';
      echo '</div>';
   echo '</div>';
}


?>