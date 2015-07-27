<style>
div.Red { background-color: #FF0000; }
div.RedTextBox { background-color: #FF6464; }
div.Orange { background-color: #FF8B53; }
div.OrangeTextBox { background-color: #FFC0A1; }
div.Yellow { background-color: #FDE68A; }
div.YellowTextBox { background-color: #FFF7D6; }
div.Green { background-color: #1D9E74; }
div.GreenTextBox { background-color: #60C3A3; }
div.Blue { background-color: #9DB5CC; }
div.BlueTextBox { background-color: #F0F5F9; }
div.Violet { background-color: #A086B7; }
div.VioletTextBox { background-color: #C7B6D6; }
div.Purple { background-color: #BC5A84; }
div.PurpleTextBox { background-color: #DB8BAD; }
div.White { background-color: #CCCCCC; }
div.WhiteTextBox { background-color: #FFFFFF; }
div.Gray { background-color: #C0C0C0; }
div.GrayTextBox { background-color: #FFFFFF; }
div.Black { background-color: #000000; color: #FFFFFF; }
div.BlackTextBox { background-color: #7F7E7E;}
div.CardTextBox { padding: 5px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; display:block; width:100%;}
</style>

<?php

include "../../bwahaha.php";
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();



$db_name = "ygo";
$meta_tags = "ygo, yugioh, Yu-Gi-Oh, Yu-Gi-Oh!, YuGiOh!, checklist, database, card game, trading card, collectible card, TGCDT, The Giant Checklist Database Thing";
$page_title = "TGCDT Yu-Gi-Oh!";
$languages = array( 0 => "EN", 1 => "FR", 2 => "DE", 3 => "IT", 4 => "PT", 5 => "SP", 6 => "JP", 6 => "JA", 7 => "KR", 8 => "AE", 8 => "TC");
$languages_full = array( "EN" => "English", "FR" => "French", "DE" => "German", "IT" => "Italian", "PT" => "Portuguese", "SP" => "Spanish", "JP" => "Japanese", "JA" => "Japanese-Asian", "KR" => "Korean", "AE" => "Asian-English", "TC" => "Chinese");
$modal_body_color = "Color_1";

/* Home Page Specific */

$copyright = "Yu-Gi-Oh! and all respective names are the &trade; & &copy; of Kazuki Takahashi and Konami Digital Entertainment 1996-2015";
$welcome_msg = '<span style="font-size:14px; font-weight:bold;">Welcome</span> to the Yu-Gi-Oh! Branch of TGCDT! We\'ll do our best to keep this database up-to-date with the latest cards. Hope you enjoy and let us know if there is anything we can do to help! ^_^ <b>helpdesk@ygo.tgcdt.com</b><br/>We are currently renovating the login/account creation system to integrate it with the new forum, for now account creation can be done through the forum. <a href="http://tgcdt.com/forum/ucp.php?mode=register" target=""><b>Click Here!</b></a>';

/* Newest Sets Specific */

$new_sets_query = "SELECT DISTINCT YGO_SETS.EN_Set_Name, YGO_SETS.JA_Set_Name, YGO_SETS.FR_Set_Name, YGO_SETS.DE_Set_Name, YGO_SETS.IT_Set_Name, YGO_SETS.ZH_Set_Name, YGO_SETS.PT_Set_Name, YGO_SETS.ES_Set_Name, YGO_SETS.KO_Set_Name, YGO_SETS.Set_Language, YGO_SETS.Release_Date FROM YGO_SETS ORDER BY YGO_SETS.Release_Date DESC LIMIT 20";

/* Search Buttons Specific */

$button_values = array( "button_1" => array( 0 => "Attribute", 1 => "Attribute", 2 => "SELECT DISTINCT Attribute FROM YGO_DATA ORDER BY Attribute ASC"),
                        "button_2" => array( 0 => "Type", 1 => "Type", 2 => "SELECT DISTINCT Type FROM YGO_DATA ORDER BY Type ASC"),
                        "button_3" => array( 0 => "Property", 1 => "Property", 2 => "SELECT DISTINCT Property FROM YGO_DATA ORDER BY Property ASC"),
                        "button_4" => array( 0 => "Level", 1 => "Level", 2 => "SELECT DISTINCT Level FROM YGO_DATA ORDER BY length(Level), Level ASC"),
                        "button_5" => array( 0 => "Rank", 1 => "Rank", 2 => "SELECT DISTINCT Rank FROM YGO_DATA ORDER BY length(Rank), Rank ASC"),
                        "button_6" => array( 0 => "Rarity", 1 => "Rarity", 2 => "SELECT DISTINCT Rarity FROM YGO_CARDS ORDER BY Rarity ASC"),
                        "button_7" => array( 0 => "Card_Language", 1 => "Language", 2 => "SELECT DISTINCT Card_Language FROM YGO_CARDS ORDER BY Card_Language ASC"));


$complex_button_values = array("button_c_1" => array( 0 => "Color", 1 => "Color", 2 => "1", 3 => "2", 4 => "", 5 => "YGO_DATA"),
                               "button_c_2" => array( 0 => "Ability", 1 => "Ability", 2 => "1", 3 => "3", 4 => "", 5 => "YGO_DATA"));


/* Search Specific */

$sort_values = array( "Name" => " ORDER BY EN_Name, Set_Number",
                      "Set Number" => " ORDER BY Set_Number, Release_Date",
                      "Release Date" => " ORDER BY Release_Date, Set_Number",
                      "Type" => " ORDER BY Type, Ability_1, Ability_2, Ability_3, Attribute, EN_Name, Set_Number",
                      "Attribute" => " ORDER BY Attribute, EN_Name, Set_Number",
                      "Level/Rank" => " ORDER BY Level, Rank, EN_Name, Set_Number");

$master_query = "SELECT * FROM 
( Select * FROM YGO_CARDS as T1
INNER JOIN YGO_DATA as T2 ON T1.Data_ID = T2.Card_Data_ID
INNER JOIN YGO_TEXT as T3 ON T1.Text_ID = T3.Card_Text_ID
INNER JOIN YGO_COLLECT as T4 ON T1.Collect_ID = T4.Card_Collect_ID WHERE 1) as CARDS
INNER JOIN ( Select *, GROUP_CONCAT(EN_Set_Name SEPARATOR '|') as magic, GROUP_CONCAT(Main_Set_ID SEPARATOR '|'), GROUP_CONCAT(Release_Date SEPARATOR '|') FROM YGO_COMPLETE as T5
INNER JOIN YGO_SETS as T6 ON T5.Set_ID = T6.Main_Set_ID GROUP BY Card_ID) as COMPLETE
ON CARDS.Card_ID = COMPLETE.Card_ID
WHERE (";

$search_values = array( "button_2" => "Type",
                        "button_1" => "Attribute",
                        "button_3" => "Property",
                        "button_4" => "Level",
                        "button_5" => "Rank",
                        "button_6" => "Rarity",
                        "button_7" => "Card_Language",
                        "Card_Name" => array( 0 => "EN_Name", 1 => "Set_Number"),
                        "button_c_2" => array( 0 => "Ability_1", 1 => "Ability_2", 2 => "Ability_3"),
                        "button_c_1" => array( 0 => "Color_1", 1 => "Color_2"));




function detailCardInfoHeader($row, $language){
    echo '<strong> ' . $row['Set_Number'] . '</strong> ' . $row['EN_Set_Name'] . '<br/>';
    if($row['Edition'] == "1st"){
       echo $row['Edition'] . ' ';
    }
    echo ' ' . $row['Rarity'];
    if($row['Holo'] != ""){
       echo ' <em>(' . $row['Holo'] . ')</em> ';
    }
}





function detailCardInfo($row, $count, $temp_language){
   global $db_name;
   echo "<div class='list modal-card-info'>";
      echo "<div style='width: 263px; display:table-cell;' >";
      $tempPath_jpg = '/home8/vinceoa2/public_html/tgcdt/db/' . $db_name . '/images/' . $temp_language . '_cards/' . $row['DB_Card_Num'] . '_' . $row['Edition'] . '_' . $row['Card_ID'] . '.jpg';

      if(file_exists($tempPath_jpg)){
         echo '<img style="vertical-align: text-top;" src="images/' . $temp_language . '_cards/' . $row['DB_Card_Num'] . '_' . $row['Edition'] . '_' . $row['Card_ID'] . '.jpg">';
      }else{
         $site_test = "http://" . $db_name . ".tgcdt.com/images/back1.png";
         echo '<img style="vertical-align: text-top;" src="' . $site_test . '"/>';
      }
      echo '</div>';
      echo '<div class="CardInfoHolder' . $row['Data_ID'] . '" style="width: 53%; display:table-cell;" >';
      echo '</div>';
   echo '</div>';
}

?>