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
/* div.VioletTextBox { background-color: #E8E1EF; } */
div.Purple { background-color: #BC5A84; }
div.PurpleTextBox { background-color: #DB8BAD; }
/* div.PurpleTextBox { background-color: #EBB9CE; } */
div.White { background-color: #CCCCCC; }
div.WhiteTextBox { background-color: #FFFFFF; }
div.Gray { background-color: #C0C0C0; }
div.GrayTextBox { background-color: #FFFFFF; }
div.Black { background-color: #000000; color: #FFFFFF; }
div.BlackTextBox { background-color: #7F7E7E;}
div.CardTextBox { padding: 5px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; display:block; width:100%;}
</style>

<?php


$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();

include_once "../../bwahaha.php";

$db_name = "kaijudo";
$modal_body_color = "Civilization_1";
$meta_tags = "ygo, yugioh, Yu-Gi-Oh, Yu-Gi-Oh!, YuGiOh!, checklist, database, card game, trading card, collectible card, TGCDT, The Giant Checklist Database Thing";
$page_title = "TGCDT Kaijudo";

/* Home Page Specific */

$copyright = "Kaijudo and all respective names are the &trade; & &copy; of Kazuki Takahashi and Konami Digital Entertainment 1996-2015";
$welcome_msg = '<span style="font-size:14px; font-weight:bold;">Welcome</span> to the Yu-Gi-Oh! Branch of TGCDT! We\'ll do our best to keep this database up-to-date with the latest cards. Hope you enjoy and let us know if there is anything we can do to help! ^_^ <b>helpdesk@ygo.tgcdt.com</b><br/>We are currently renovating the login/account creation system to integrate it with the new forum, for now account creation can be done through the forum. <a href="http://tgcdt.com/forum/ucp.php?mode=register" target=""><b>Click Here!</b></a>';

/* Newest Sets Specific */

$new_sets_query = "SELECT DISTINCT KAIJUDO_SETS.EN_Set_Name, KAIJUDO_SETS.Set_Language, KAIJUDO_SETS.Release_Date FROM KAIJUDO_SETS ORDER BY KAIJUDO_SETS.Release_Date DESC LIMIT 20";

/* Search Buttons Specific */



$button_values = array( "button_1" => array( 0 => "Card_Type", 1 => "Card Type", 2 => "SELECT DISTINCT Card_Type FROM KAIJUDO_DATA ORDER BY Card_Type ASC"),
                        "button_2" => array( 0 => "Level", 1 => "Level", 2 => "SELECT DISTINCT Level FROM KAIJUDO_DATA ORDER BY length(Level), Level ASC"),
                        "button_3" => array( 0 => "Power", 1 => "Power", 2 => "SELECT DISTINCT Power FROM KAIJUDO_DATA ORDER BY length(Power), Power ASC"),
                        "button_4" => array( 0 => "Artist", 1 => "Artist", 2 => "SELECT DISTINCT Artist FROM KAIJUDO_COLLECT ORDER BY Artist ASC"),
                        "button_5" => array( 0 => "Rarity", 1 => "Rarity", 2 => "SELECT DISTINCT Rarity FROM KAIJUDO_CARDS ORDER BY Rarity ASC"));


$complex_button_values = array("button_c_1" => array( 0 => "Race", 1 => "Race", 2 => "1", 3 => "2", 4 => "", 5 => "KAIJUDO_DATA"),
                               "button_c_2" => array( 0 => "Civilization", 1 => "Civilization", 2 => "1", 3 => "2", 4 => "", 5 => "KAIJUDO_DATA"));


/* Search Specific */

$sort_values = array( "Name" => " ORDER BY EN_Name, Set_Number",
                      "Set Number" => " ORDER BY Set_Number, Release_Date",
                      "Release Date" => " ORDER BY Release_Date, Set_Number");

$master_query = "SELECT * FROM 
( Select * FROM KAIJUDO_CARDS as T1
INNER JOIN KAIJUDO_DATA as T2 ON T1.Data_ID = T2.Card_Data_ID
INNER JOIN KAIJUDO_TEXT as T3 ON T1.Text_ID = T3.Card_Text_ID
INNER JOIN KAIJUDO_COLLECT as T4 ON T1.Collect_ID = T4.Card_Collect_ID WHERE 1) as CARDS
INNER JOIN ( Select *, GROUP_CONCAT(EN_Set_Name SEPARATOR '|') as magic, GROUP_CONCAT(Main_Set_ID SEPARATOR '|'), GROUP_CONCAT(Release_Date SEPARATOR '|') FROM KAIJUDO_COMPLETE as T5
INNER JOIN KAIJUDO_SETS as T6 ON T5.Set_ID = T6.Main_Set_ID GROUP BY Card_ID) as COMPLETE
ON CARDS.Card_ID = COMPLETE.Card_ID
WHERE (";

$search_values = array( "button_2" => "Level",
                        "button_1" => "Card_Type",
                        "button_3" => "Power",
                        "button_4" => "Artist",
                        "button_5" => "Rarity",
                        "button_c_1" => array( 0 => "Race_1", 1 => "Race_2"),
                        "button_c_2" => array( 0 => "Civilization_1", 1 => "Civilization_2"),
                        "Card_Name" => array( 0 => "EN_Name", 1 => "Set_Number"));





function detailCardInfoHeader($row, $language){
    echo '<strong> ' . $row['Set_Number'] . '</strong> ' . $row['EN_Set_Name'] . '<br/>';
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