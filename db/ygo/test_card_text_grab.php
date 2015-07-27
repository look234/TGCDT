<?php


   $con = mysql_connect("localhost","vinceoa2_read","Luffy_234");
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8');
   }
   mysql_select_db("vinceoa2_ygo", $con);
$temp_language = "";
            switch($_POST['Text_Language']){
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

$query = "SELECT *
FROM YGO_TEXT
INNER JOIN YGO_DATA
ON YGO_TEXT.Data_Link_ID=YGO_DATA.Card_Data_ID
WHERE YGO_TEXT.Data_Link_ID = '" . $_POST['Data_ID'] . "'";


   $result = mysql_query($query) or die(mysql_error()); 
   while($row = mysql_fetch_array($result)){ 
      if($row['Text_Language'] == $_POST['Text_Language'] ){
      echo "<table style='width:100%'>";
      echo "<tr>";
      if($row['Color_1'] == "Black"){
      echo "<td style='width: 90%; font-variant: small-caps; color:white;'><span class='card_name_style_2'><strong>";
      echo $row[$temp_language . '_Name'] . " </strong> ";
      echo '</span>';
      echo '</td>';
      }else{
      echo "<td style='width: 90%; font-variant: small-caps;'><span class='card_name_style_2'><strong>";
      echo $row[$temp_language . '_Name'] . " </strong> ";
      echo '</span>';
      echo '</td>';
      }
      echo '<td style="width:10%" ><img src="http://ygo.tgcdt.com/images/' . $row['Attribute'] . '.png" height="25px" /></td>';
      echo '</tr>';

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


      echo '</table>';
      echo '<div class="TextBoxHolder" >';
      if($row['Text_ID'] == "0"){
         echo "Blah<br/>";
      }else{
         if($row['Pendulum_Effect'] != ""){
            echo '<div style="font-size: 0.85em !important;" class="' . $row['Color_1'] . 'TextBox CardTextBox" >' . $row['Pendulum_Effect'] . '</div><br/>';
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
            if($row['Text_Language'] == "Japanese" || $row['Text_Language'] == "Korean" || $row['Text_Language'] == "Chinese"){
               echo $row['Flavor_Text'] . "<br/>";
            }else{
               echo "<i>" . $row['Flavor_Text'] . "</i><br/>";
            }
         }
         echo '</div>'; //close text-box
         if($row['ATK'] != "" && $row['DEF'] != "" ){
            echo '<div style="text-align:right; border-top-style: solid; border-top-width: 2px;" ><strong>ATK/ ' . $row['ATK'] . '  DEF/ ' . $row['DEF'] . '</div></strong>';
         }
         echo '</div><br/>'; //close CardTextBox
      }
      echo '</div>';
      echo '<span style="font-size: 0.85em; float: left;" ><strong>' . $row['Number'] . '</strong></span><span style="font-size: 0.85em; float: right;" >' . $row['Copyright'] . '</span><br/>';
      }
   }
?>