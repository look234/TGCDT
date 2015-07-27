<?php


   $con = mysql_connect("localhost","vinceoa2_read","Luffy_234");
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8');
   }
   mysql_select_db("vinceoa2_ptcg", $con);

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
FROM PTCG_TEXT
INNER JOIN PTCG_DATA
ON PTCG_TEXT.Data_Link_ID=PTCG_DATA.Card_Data_ID
WHERE PTCG_TEXT.Data_Link_ID = '" . $_POST['Data_ID'] . "'";

   $result = mysql_query($query) or die(mysql_error()); 
   while($row = mysql_fetch_array($result)){ 
      if($row['Text_Language'] == 'English' ){
      //if($row['Text_Language'] == $_POST['Text_Language'] ){
      echo "<table style='width:100%'>";
      echo "<tr><td style='width:100%; font-size:0.65em; ' colspan='2'>" . $row['Stage'];
      if($row['Stage_Text'] != ""){
         echo " - " . $row['Stage_Text'];
      } 
      echo "</td></tr>";

if($row['Type_1'] != "Trainer" && $row['Type_1'] != "Energy"){
      echo "<tr><td style='width:70%'><span class='card_name_style_2'><strong>";
      echo multiSuffix2($row['Prefix']) . " " . $row['EN_Name'] . " </strong> ";
      echo multiSuffix2($row['Suffix']);
      echo "</span>";
      echo "</td><td style='width:30% text-align:right;'>";
      if($row['HP'] > 0){
         echo " <span class='card_name_style_small'>HP</span><span class='card_name_style_2'><strong>" . $row['HP'] . "</strong> </span>";
      }
      echo typeReplace($row['Type_1'], "20px") . " " . typeReplace($row['Type_2'], "20px");
      echo "</td></tr>";
}else if($row['Type_1'] == "Trainer" && $row['HP'] != ""){
      echo "<tr><td style='width:80%'><span class='card_name_style_2'><strong>";
      echo $row['Prefix'] . " " . $row['EN_Name'] . " </strong> ";
      echo multiSuffix2($row['Suffix']);
      echo "</span>";
      echo "</td><td style='width:20% text-align:right;'>";
      if($row['HP'] > 0){
         echo " <span class='card_name_style_small'>HP</span><span class='card_name_style_2'><strong>" . $row['HP'] . "</strong> </span>";
      }
      echo "</td></tr>";
}else{
      echo "<tr><td style='width:100%' colspan='2'><span class='card_name_style_2'><strong>";
      echo $row['Prefix'] . " " . $row['EN_Name'] . " </strong> ";
      echo multiSuffix2($row['Suffix']);
      echo "</span>";
      echo "</td></tr>";
}

      echo "<tr><td style=' font-size:0.65em; ' colspan='2'>" . $row['Pokedex_Data'] . "</td></tr></table>";

      if($row['Text_ID'] == "0"){
         echo "Blah<br/>";
      }else{

      echo "<br/><table style='width:100%;'>";
      if($row['Rule_1_Type'] != "" && ($row['Rule_1_Type'] != "Item Rule" && $row['Rule_1_Type'] != "Supporter Rule" && $row['Rule_1_Type'] != "Stadium Rule" && $row['Rule_1_Type'] != "EX Rule")){
         if($row['Rule_1_Type'] == "Tool Rule"){
            echo "<tr><td style='font-size:0.65em; width:100%; padding: 3px 3px 5px 3px; background-color: #FFFFFF; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;' colspan='3'>";
            if($row['Rule_1_Name'] != ""){
               echo "<span style='font-size: 1.2em; color: #7777EE; padding: 3px 3px 3px 3px; font-weight: bold;'>" . $row['Rule_1_Name'] . "</span> ";
            }
            echo energyReplace($row['Rule_1_Text']) . "</td></tr>";
         }else if($row['Rule_1_Type'] == "Mega Rule"){
            echo "<tr><td style='font-size:0.65em; background-color: #839446; border-width: 3px; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;' colspan='3'>";
            if($row['Rule_1_Name'] != ""){
               echo "<span style='font-size: 1.2em; color: #839446; background-color: #000000; padding: 3px 1px 1px 3px; font-weight: bold; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'>" . $row['Rule_1_Name'] . "</span><br/> ";
            }
            echo "<span style='padding: 3px 3px 3px 3px; line-height: 200%; '>" . energyReplace($row['Rule_1_Text']) . "</span></td></tr>";
         }else if($row['Rule_1_Type'] == "ex Rule"){
            echo "<tr><td style='font-size:0.65em; background-color: #d9ddc4; color: #525e52; padding: 3px 3px 3px 3px; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;' colspan='3'>";
            echo "<span>" . energyReplace($row['Rule_1_Text']) . "</span></td></tr>";
         }else{
            if($row['Rule_1_Name'] != ""){
               echo "<tr><td style='font-size:0.8em; width:100%' colspan='2'><strong>" . $row['Rule_1_Name'] . "</strong></td></tr>";
            }
            echo "<tr><td style='font-size:0.65em; width:100%; padding-bottom: 10px;' colspan='3'>" . energyReplace($row['Rule_1_Text']) . "</td></tr>";
         }
      }
      if($row['Card_Effect'] != ""){
         echo "<tr><td style='font-size:0.75em; width:100%; padding-top: 10px; padding-bottom: 5px;' colspan='3'>" . energyReplace($row['Card_Effect']) . "</td></tr>";
      }

      if($row['Ability_Name'] != ""){
         echo "<tr><td style='font-size:0.75em; width:40%; padding-top: 10px;'><strong>" . $row['Ability_Type'] . "</strong></td><td style='font-size:0.85em; width:60%; padding-top: 10px;' colspan='2'><strong>" . $row['Ability_Name'] . "</strong></td></tr>";
         echo "<tr><td style='font-size:0.75em; width:100%; padding-bottom: 5px;' colspan='3'>" . energyReplace($row['Ability_Text']) . "</td></tr>";
      }

      if($row['Attack_1_Name'] != ""){
         echo "<tr><td style='font-size:0.85em; width: 30%; padding-top: 10px;'>" . energyReplace($row['Attack_1_Cost']) . "</td><td style='font-size:0.85em; width: 60%; padding-top: 10px;'><strong>" . $row['Attack_1_Name'] . "</strong></td><td style='font-size:0.85em; text-align: left; width: 10%; padding-top: 10px;'><strong>" . $row['Attack_1_Damage'] . "</strong></td></tr>";
         echo "<tr><td style='font-size:0.75em; width:100%; padding-bottom: 10px;' colspan='3'>" . energyReplace($row['Attack_1_Text']) . "</td></tr>";
         if($row['Attack_2_Name'] != ""){
            echo "<tr><td style='font-size:0.85em; width: 30%;'>" . energyReplace($row['Attack_2_Cost']) . "</td><td style='font-size:0.85em; width: 60%;'><strong>" . $row['Attack_2_Name'] . "</strong></td><td style='font-size:0.85em; text-align: left; width: 10%;'><strong>" . $row['Attack_2_Damage'] . "</strong></td></tr>";
            echo "<tr><td style='font-size:0.75em; width:100%; padding-bottom: 10px;' colspan='3'>" . energyReplace($row['Attack_2_Text']) . "</td></tr>";
            if($row['Attack_3_Name'] != ""){
               echo "<tr><td style='font-size:0.85em; width: 30%;'>" . energyReplace($row['Attack_3_Cost']) . "</td><td style='font-size:0.85em; width: 60%;'><strong>" . $row['Attack_3_Name'] . "</strong></td><td style='font-size:0.85em; text-align: left; width: 10%;'><strong>" . $row['Attack_3_Damage'] . "</strong></td></tr>";
               echo "<tr><td style='font-size:0.75em; width:100%; padding-bottom: 10px;' colspan='3'>" . energyReplace($row['Attack_3_Text']) . "</td></tr>";
               if($row['Attack_4_Name'] != ""){
                  echo "<tr><td style='font-size:0.85em; width: 30%;'>" . energyReplace($row['Attack_4_Cost']) . "</td><td style='font-size:0.85em; width: 60%;'><strong>" . $row['Attack_4_Name'] . "</strong></td><td style='font-size:0.85em; text-align: left; width: 10%;'><strong>" . $row['Attack_4_Damage'] . "</strong></td></tr>";
                  echo "<tr><td style='font-size:0.75em; width:100%; padding-bottom: 10px;' colspan='3'>" . energyReplace($row['Attack_4_Text']) . "</td></tr>";
               }
            }
         }
      }

      if($row['Rule_1_Type'] != "" && ($row['Rule_1_Type'] == "Item Rule" || $row['Rule_1_Type'] == "Supporter Rule" || $row['Rule_1_Type'] == "Stadium Rule" || $row['Rule_1_Type'] == "EX Rule")){
         if($row['Rule_1_Type'] == "Item Rule"){
            echo "<tr><td style='font-size:0.65em; width:100%; padding: 3px 3px 10px 3px; background-color: #7777EE; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;' colspan='3'>" . energyReplace($row['Rule_1_Text']) . "</td></tr>";
         }else if($row['Rule_1_Type'] == "Supporter Rule"){
            echo "<tr><td style='font-size:0.65em; width:100%; padding: 3px 3px 10px 3px; background-color: #F55014; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;' colspan='3'>" . energyReplace($row['Rule_1_Text']) . "</td></tr>";
         }else if($row['Rule_1_Type'] == "Stadium Rule"){
            echo "<tr><td style='font-size:0.65em; width:100%; padding: 3px 3px 10px 3px; background-color: #76CC43; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;' colspan='3'>" . energyReplace($row['Rule_1_Text']) . "</td></tr>";
         }else if($row['Rule_1_Type'] == "EX Rule"){
            echo "<tr><td style='font-size:0.65em; width:100%; background-color: #839446; border-width: 3px; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;' colspan='3'>";
            if($row['Rule_1_Name'] != ""){
               echo "<span style='font-size: 1.2em; color: #839446; background-color: #000000; padding: 3px 1px 1px 3px; font-weight: bold; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'>" . $row['Rule_1_Name'] . "</span><br/> ";
            }
            echo "<span style='padding: 9px 3px 3px 3px; line-height: 200%;'>" . energyReplace($row['Rule_1_Text']) . "</span></td></tr>";
         }else{
            echo "<tr><td style='font-size:0.65em; width:100%; padding: 3px 3px 10px 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;' colspan='3'>" . energyReplace($row['Rule_1_Text']) . "</td></tr>";
         }
      }
      if($row['Rule_2_Type'] != "" && ($row['Rule_2_Type'] == "Item Rule" || $row['Rule_2_Type'] == "Supporter Rule" || $row['Rule_2_Type'] == "Stadium Rule" || $row['Rule_2_Type'] == "EX Rule")){
         if($row['Rule_2_Type'] == "Item Rule"){
            echo "<tr><td style='font-size:0.65em; width:100%; padding: 3px 3px 10px 3px; background-color: #7777EE; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;' colspan='3'>" . energyReplace($row['Rule_2_Text']) . "</td></tr>";
         }else if($row['Rule_2_Type'] == "Supporter Rule"){
            echo "<tr><td style='font-size:0.65em; width:100%; padding: 3px 3px 10px 3px; background-color: #F55014; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;' colspan='3'>" . energyReplace($row['Rule_2_Text']) . "</td></tr>";
         }else if($row['Rule_2_Type'] == "Stadium Rule"){
            echo "<tr><td style='font-size:0.65em; width:100%; padding: 3px 3px 10px 3px; background-color: #76CC43; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;' colspan='3'>" . energyReplace($row['Rule_2_Text']) . "</td></tr>";
         }else if($row['Rule_2_Type'] == "EX Rule"){
            echo "<tr><td style='font-size:0.65em; width:100%; background-color: #839446; border-width: 3px; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;' colspan='3'>";
            if($row['Rule_2_Name'] != ""){
               echo "<span style='font-size: 1.2em; color: #839446; background-color: #000000; padding: 3px 1px 1px 3px; font-weight: bold; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'>" . $row['Rule_2_Name'] . "</span><br/> ";
            }
            echo "<span style='padding: 9px 3px 3px 3px; line-height: 200%; '>" . energyReplace($row['Rule_2_Text']) . "</span></td></tr>";
         }else{
            echo "<tr><td style='font-size:0.65em; width:100%; padding: 3px 3px 10px 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;' colspan='3'>" . energyReplace($row['Rule_2_Text']) . "</td></tr>";
         }
      }

      echo "</table><br/>";

if(($row['Type_1'] != "Trainer") && ($row['Type_1'] != "Energy")){
      echo "<table style='width:100%; border-top: 1px solid #555555;'><tr><td style='font-size:0.75em; text-align: center; width:33%'><strong>Weakness</strong></td><td style='font-size:0.75em; text-align: center; width:33%'><strong>Resistance</strong></td><td style='font-size:0.75em; text-align: center; width:33%'><strong>Retreat Cost</strong></td></tr><tr><td style='font-size:0.75em; text-align: center;'>" . typeReplace($row['Weakness_1'], "15px") . typeReplace($row['Weakness_2'], "15px") . " " . $row['Weakness_X'] . "</td><td style='font-size:0.75em; text-align: center;'>" . typeReplace($row['Resistance_1'], "15px") . typeReplace($row['Resistance_2'], "15px") . " " . $row['Resistance_X'] . "</td><td style='font-size:0.75em; text-align: center;'>";

      for($h = 0; $h < $row['Retreat']; $h++){
         echo "<img src='images/Colorless.png' height='15px' />";
      }
      echo "</td></tr></table>";
}

      if($row['Flavor_Text'] != ""){
         echo "<br/><i><span style='font-size:0.8em' >" . $row['Flavor_Text'] . "</span></i><br/>";
      }
      }

      echo "<br/>Illus. " . $row['Artist'] . " <br/><span style='font-size:0.8em' >" . $row['Copyright'] . "</span><br/>";
      echo "</div>";
      echo "</div>";
      echo '<div style="padding:5px; display:inline; display: none; " class="row modal-set-info">';
      echo "<h4>This card is available in the following Sets:</h4>";
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
         echo "</div></div>";
      }
      }
   }
?>