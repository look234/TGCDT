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









function detailCardInfo($row, $count){
$temp_language = "";
            switch($row['Card_Language']){
              case "English":
                 $temp_language = "EN";
                 break;
              case "Japanese":
                 $temp_language = "JA";
                 break;
              case "Korean":
                 $temp_language = "KO";
                 break;
              case "French":
                 $temp_language = "FR";
                 break;
              case "Italian":
                 $temp_language = "IT";
                 break;
              case "German":
                 $temp_language = "DE";
                 break;
              case "Spanish":
                 $temp_language = "ES";
                 break;
              case "Russian":
                 $temp_language = "RU";
                 break;
              case "Chinese":
                 $temp_language = "ZH";
                 break;
              case "Dutch":
                 $temp_language = "NL";
                 break;
              case "Polish":
                 $temp_language = "PL";
                 break;
              case "Portuguese":
                 $temp_language = "PT";
                 break;
              case "Swedish":
                 $temp_language = "SV";
                 break;
              default:
                 $temp_language = "EN";
                 break;
            }

echo '<!-- Modal -->';
echo '<div class="modal fade modal-cards" id="Modal_' . $count . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
echo '<div class="modal-dialog">';
echo '<div class="modal-content">';


echo '<div class="modal-header">';
echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
echo '<h5 class="modal-title" id="myModalLabel"><strong> ' . $row['Set_Number'] . '</strong> ' . $row['EN_Set_Name'] . '<br/>';

        if($row['Edition'] == "1st"){
           echo $row['Edition'] . ' ';
        }

        echo ' ' . $row['Rarity'];
        if($row['Holo'] != ""){
           echo ' <em>(' . $row['Holo'] . ')</em> ';
        }
echo '</h5></div>'; //close modal-header



echo '<div class="modal-body ' . $row['Color_1'] . '">';


echo '<div class="modal_buttons" style="text-align: center;" >';
echo '<button class="iconButtons modal-card-view" type="button" style="display: none;"><span class="glyphicon glyphicon-modal-window" aria-hidden="true" style="font-size: 2.5em;"></span></button>';
echo '<button class="iconButtons modal-picture-view" type="button" style="display: none;"><span class="glyphicon glyphicon-picture" aria-hidden="true" style="font-size: 2.5em;"></span></button>';
echo '<button class="iconButtons modal-text-view" type="button" style="display: none;"><span class="glyphicon glyphicon-align-justify" aria-hidden="true" style="font-size: 2.5em;"></span></button>';
echo '<button class="iconButtons modal-set-view" type="button"><span class="glyphicon glyphicon-briefcase" aria-hidden="true" style="font-size: 2.5em;"></span></button>';
echo '<button class="iconButtons modal-user-view" type="button"><span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: 2.5em;"></span></button>';
echo '<button class="iconButtons modal-stats-view" type="button"><span class="glyphicon glyphicon-stats" aria-hidden="true" style="font-size: 2.5em;"></span></button>';
echo '</div>'; //close modal_buttons


      echo "<div class='list modal-card-info'>";



      echo "<div style='width: 263px; display:table-cell;' >";
            $tempPath_jpg = '/home8/vinceoa2/public_html/tgcdt/db/kaijudo/images/' . $temp_language . '_cards/' . $row['DB_Card_Num'] . '_' . $row['Edition'] . '_' . $row['Card_ID'] . '.jpg';

            if(file_exists($tempPath_jpg)){
               echo '<img style="vertical-align: text-top;" src="images/' . $temp_language . '_cards/' . $row['DB_Card_Num'] . '_' . $row['Edition'] . '_' . $row['Card_ID'] . '.jpg">';
            }else{
               $site_test = "http://kaijudo.tgcdt.com/images/back1.png";
               echo '<img style="vertical-align: text-top;" src="' . $site_test . '"/>';
            }
      echo "</div>";  //close image



      echo "<div style='width: 53%; display:table-cell;' >";

      echo "<table style='width:100%'>";
      echo "<tr><td style='width: 90%; font-variant: small-caps; '><span class='card_name_style_2'><strong>";
      echo $row['EN_Name'] . " </strong> ";
      echo "</span>";
      echo '</td><td style="width:10%" ><img src="http://ygo.tgcdt.com/images/' . $row['Attribute'] . '.png" height="25px" /></td>';
      echo "</tr>";

      echo '<tr>';
      if($row['Level'] != "" ){
         echo '<td style="padding:5px; text-align:right; width:100%;" colspan="2">';
         for($i = 0; $i < $row['Level']; $i++){
            echo '<img src="http://ygo.tgcdt.com/images/Level.png" height="20px" />';
         }
      }
      if($row['Rank'] != "" ){
         echo '<td style="padding:5px; text-align:left; width:100%;" colspan="2">';
         for($i = 0; $i < $row['Rank']; $i++){
            echo '<img src="http://ygo.tgcdt.com/images/Rank.png" height="20px" />';
         }
      }
      if($row['Property'] != "" ){
         echo '<td style="padding:5px; text-align:right;" colspan="2">';
         echo '[ ' . $row['Attribute'] . ' CARD <img src="http://ygo.tgcdt.com/images/' . $row['Property'] . '.png" height="25px" /> ]<br/>';
      }
      echo '</td></tr>';


      echo "</table>";

      if($row['Text_ID'] == "0"){
         echo "Blah<br/>";
      }else{
         if($row['Pendulum_Effect'] != ""){
            echo '<div class="' . $row['Color_1'] . 'TextBox CardTextBox" >' . $row['Pendulum_Effect'] . '</div><br/>';
         }
         echo '<div class="' . $row['Color_1'] . 'TextBox CardTextBox" >';
         if($row['Type'] != ""){
            echo '<span style="font-weight: bold; font-variant: small-caps; font-family: Georgia, Serif;" >[ ' . $row['Type'];
            if($row['Ability_1'] != "" && $row['Ability_1'] != "Normal"){
               echo ' / ' . $row['Ability_1'];
               if($row['Ability_2'] != "" && $row['Ability_2'] != "Normal"){
                  echo ' / ' . $row['Ability_2'];
                  if($row['Ability_3'] != ""){
                     echo ' / ' . $row['Ability_3'];
                  }
               }
            }
            echo ' ]</span><br/>';
         }
         echo '<div style="font-size: 0.85em !important; padding-bottom: 10px;" >';
         if($row['Materials'] != ""){
            echo $row['Materials'] . "<br/>";
         }
         if($row['Card_Effect'] != ""){
            echo $row['Card_Effect'] . "<br/>";
         }
         if($row['Flavor_Text'] != ""){
            echo "<i>" . $row['Flavor_Text'] . "</i><br/>";
         }
         echo '</div>'; //close text-box
         if($row['ATK'] != "" && $row['DEF'] != "" ){
            echo '<div style="text-align:right; border-top-style: solid; border-top-width: 2px;" ><strong>ATK/ ' . $row['ATK'] . '  DEF/ ' . $row['DEF'] . '</div></strong>';
         }
         echo '</div><br/>'; //close CardTextBox
      }
      echo '<span style="font-size: 0.85em; float: left;" ><strong>' . $row['Number'] . '</strong></span><span style="font-size: 0.85em; float: right;" >' . $row['Copyright'] . '</span><br/>';
      echo '</div>'; //close text
      echo '</div>'; //close modal-card-info




      echo '<div style="padding:5px; display:inline; display: none; " class="row modal-set-info">';
      echo '<h4>This card is available in the following Sets:</h4>';
      $temp_set_name = explode("|", $row["magic"]);
      $temp_set_id = explode("|", $row["GROUP_CONCAT(Main_Set_ID SEPARATOR '|')"]);
      $temp_set_date = explode("|", $row["GROUP_CONCAT(Release_Date SEPARATOR '|')"]);
      foreach($temp_set_name as $key=>$value){
         echo '<div class="col-lg-3 col-md-3"><div style="background-color:transparent; border: 0px !important;" class="thumbnail">';
            $tempPath_jpg = '/home8/vinceoa2/public_html/ptcg/images/' . $temp_language . '_packs/' . $temp_set_id[$key] . '.png';

            if(file_exists($tempPath_jpg)){
               echo "<img src='images/" . $temp_language . "_packs/" . $temp_set_id[$key] . ".png' height='100px' width='100px' /> ";
            }else{
               $site_test = "http://tgcdt.com/images/noimage.png";
               echo "<img src='" . $site_test . "' height='100px' width='100px' /> ";
            }
         echo '<div class="caption"><p style="text-indent: 0 !important; text-align: center;">' . $temp_set_date[$key] . '</p><h5>' . $value . '</h5>';
         echo '</div>'; //close caption
         echo '</div>'; //close thumbnail
         echo '</div>'; //close set icon
      }
      echo '</div>'; //close modal-set-info


      echo '</div>'; //close modal-body


      echo '</div>'; //close modal-content
      echo '</div>'; //close modal-dialog
      echo '</div>'; //close modal-cards
}

   //0.0 What?
   //echo '</div>';
   //echo '</div>';
   //echo '</div>';




?>