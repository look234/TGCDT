<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<form action="" method="post">
Multiverse ID: <input name="multiverseid" type="text" size="20"></input>
<input name="submit" type="submit" value="Grab it!"></input>
</form>

<?php


function checkAlready($search_card_name5){
$con5 = mysql_connect("localhost","vinceoa2_ygo","ki_234_ki");
if (!$con5){
  die('Could not connect: ' . mysql_error());
}else{
  mysql_set_charset('utf8');
}
mysql_select_db("vinceoa2_mtg", $con5);

$search_card_name5 = mysql_real_escape_string($search_card_name5);


$query5 = "SELECT * FROM MTG_CARDS WHERE EN_Name LIKE '" . $search_card_name5 . "' ORDER BY EN_Name";
   $result5 = mysql_query($query5);

   while($row5 = mysql_fetch_array($result5)){
      echo '<span style="font-size:3em; color:blue;" >SHIT! Already in there!</span><br/><br/>';
   }
}


if($_POST['submit'] != ""){
$string = file_get_contents("http://gatherer.wizards.com/Pages/Card/Details.aspx?multiverseid=" . $_POST['multiverseid']);

echo '<form action="" method="post">';

$s_name = 'Card Name:';
$s_mana = 'Mana Cost:';
$s_cmc = 'Converted Mana Cost:';
$s_type = 'Types:';
$s_pt = 'P/T:';
$s_loyal = 'Loyalty:';
$string_e = '</div>';
$string_v = '<div class="value">';

$temp = explode($s_name, $string);

$name = explode($string_e, $temp[1]);
$name_f = explode($string_v, $name[1]);
$name_f[1] = trim($name_f[1]);

$mana = explode($s_mana, $temp[1]);
$mana_s = explode($string_e, $mana[1]);
$mana_f = explode($string_v, $mana_s[1]);
$mana_f[1] = trim($mana_f[1]);
$mana_f2 = explode('alt="', $mana_f[1]);

for($i = 1; $i < count($mana_f2); $i++){
   $temp_mana = explode('" align="', $mana_f2[$i]);

   switch($temp_mana[0]){
      case "Blue":
         $mana_fv .= "(U)";
         break;
      case "Black":
         $mana_fv .= "(B)";
         break;
      case "Green":
         $mana_fv .= "(G)";
         break;
      case "Red":
         $mana_fv .= "(R)";
         break;
      case "White":
         $mana_fv .= "(W)";
         break;
      default:
         $mana_fv .= "(" . $temp_mana[0] . ")";
         break;
   }
   if($i+1 < count($mana_f2)){
      $mana_fv .=  "|";
   }
}

$cmc = explode($s_cmc, $temp[1]);
$cmc_s = explode($string_e, $cmc[1]);
$cmc_f = explode($string_v, $cmc_s[1]);
$cmc_f[1] = trim($cmc_f[1]);
$cmc_f2 = explode("<br /><br />", $cmc_f[1]);
$cmc_f2[0] = trim($cmc_f2[0]);

$type = explode($s_type, $temp[1]);
$type_s = explode($string_e, $type[1]);
$type_f = explode($string_v, $type_s[1]);
$type_f[1] = trim($type_f[1]);
$type_f2 = explode("  — ", $type_f[1]);
$type_f2[0] = trim($type_f2[0]);
$type_f2[1] = trim($type_f2[1]);

$pt = explode($s_pt, $temp[1]);
$pt_s = explode($string_e, $pt[1]);
$pt_f = explode($string_v, $pt_s[1]);
$pt_f2[1] = trim($pt_f[1]);
$pt_f2 = explode(" / ", $pt_f[1]);
$pt_f2[0] = trim($pt_f2[0]);
$pt_f2[1] = trim($pt_f2[1]);

$loyal = explode($s_loyal, $temp[1]);
$loyal_s = explode($string_e, $loyal[1]);
$loyal_f = explode($string_v, $loyal_s[1]);
$loyal_f[1] = trim($loyal_f[1]);

checkAlready($name_f[1]);

echo ' Multiverse_ID: <input name="card_multi_id" value="' . $_POST['multiverseid'] . '" ><br/>';
echo ' EN_Name: <input name="card_name" value="' . $name_f[1] . '" ><br/>';

for($i = 1; $i < count($mana_f2); $i++){
   $temp_mana = explode('" align="', $mana_f2[$i]);
   if($temp_mana[0] == ""){
      echo ' Color: <input name="card_color" value="Land" ><br/>';
      $done = 1;
      break 1;
   }elseif((is_numeric($temp_mana[0])) && ($i == count($mana_f2))){
      echo ' Color: <input name="card_color" value="Colorless" ><br/>';
      $done = 1;
      break 1;
   }elseif(!is_numeric($temp_mana[0])){
      echo ' Color: <input name="card_color" value="' . $temp_mana[0] . '" ><br/>';
      $done = 1;
      break 1;
   }
}
if($done != 1){
      echo ' Color: <input name="card_color" value="" ><br/>';
}


echo ' Mana: <input name="card_mana" value="' . $mana_fv . '" ><br/>';
echo ' CMC: <input name="card_cmc" value="' . $cmc_f2[0] . '" ><br/>';
echo ' Type_1: <input name="card_type_1" value="' . $type_f2[0] . '" ><br/>';
echo ' Type_2: <input name="card_type_2" value="' . $type_f2[1] . '" ><br/>';
echo ' Power: <input name="card_power" value="' . $pt_f2[0] . '" ><br/>';
echo ' Toughness: <input name="card_toughness" value="' . $pt_f2[1] . '" ><br/>';
echo ' Loyalty: <input name="card_loyalty" value="' . $loyal_f[1] . '" ><br/>';


$string2 = file_get_contents("http://gatherer.wizards.com/Pages/Card/Languages.aspx?multiverseid=" . $_POST['multiverseid']);
//$string2 = file_get_contents("http://mtg.tgcdt.com/admin/main_lang.php");

$lang_t = "_cardTitle";
$details = "Details.aspx?multiverseid=";
$btwn = '">';
$end = '</a>';
$what_lang_s = '<td style="text-align: center;">';
$what_lang_e = '</td>';


$langs = explode($lang_t, $string2);

for($i = 2; $i < count($langs); $i++){
   $a_name = explode($details, $langs[$i]);
   $a_name_id = explode($btwn, $a_name[1]);
   $a_name_end = explode($end, $a_name_id[1]);

   $what_lang = explode($what_lang_s, $langs[$i]);
   $what_lang2 = explode($what_lang_e, $what_lang[1]);
   $a_name_id[0] = trim($a_name_id[0]);
   $what_lang2[0] = trim($what_lang2[0]);
   $a_name_end[0] = trim($a_name_end[0]);
   switch($what_lang2[0]){
      case "Chinese Traditional":
         echo ' ID: <input name="CHT_ID" value="' . $a_name_id[0] . '" ></input>' .
              ' Lang: <input name="CHT_Lang" value="' . $what_lang2[0] . '" ></input>' . 
              ' Name: <input name="CHT_Name" value="' . $a_name_end[0] . '" ></input><br/>';
         break;
      case "German":
         echo ' ID: <input name="DE_ID" value="' . $a_name_id[0] . '" ></input>' .
              ' Lang: <input name="DE_Lang" value="' . $what_lang2[0] . '" ></input>' . 
              ' Name: <input name="DE_Name" value="' . $a_name_end[0] . '" ></input><br/>';
         break;
      case "French":
         echo ' ID: <input name="FR_ID" value="' . $a_name_id[0] . '" ></input>' .
              ' Lang: <input name="FR_Lang" value="' . $what_lang2[0] . '" ></input>' . 
              ' Name: <input name="FR_Name" value="' . $a_name_end[0] . '" ></input><br/>';
         break;
      case "Italian":
         echo ' ID: <input name="IT_ID" value="' . $a_name_id[0] . '" ></input>' .
              ' Lang: <input name="IT_Lang" value="' . $what_lang2[0] . '" ></input>' . 
              ' Name: <input name="IT_Name" value="' . $a_name_end[0] . '" ></input><br/>';
         break;
      case "Japanese":
         echo ' ID: <input name="JP_ID" value="' . $a_name_id[0] . '" ></input>' .
              ' Lang: <input name="JP_Lang" value="' . $what_lang2[0] . '" ></input>' . 
              ' Name: <input name="JP_Name" value="' . $a_name_end[0] . '" ></input><br/>';
         break;
      case "Korean":
         echo ' ID: <input name="KR_ID" value="' . $a_name_id[0] . '" ></input>' .
              ' Lang: <input name="KR_Lang" value="' . $what_lang2[0] . '" ></input>' . 
              ' Name: <input name="KR_Name" value="' . $a_name_end[0] . '" ></input><br/>';
         break;
      case "Portuguese (Brazil)":
         echo ' ID: <input name="PT_ID" value="' . $a_name_id[0] . '" ></input>' .
              ' Lang: <input name="PT_Lang" value="' . $what_lang2[0] . '" ></input>' . 
              ' Name: <input name="PT_Name" value="' . $a_name_end[0] . '" ></input><br/>';
         break;
      case "Portuguese":
         echo ' ID: <input name="PT_ID" value="' . $a_name_id[0] . '" ></input>' .
              ' Lang: <input name="PT_Lang" value="' . $what_lang2[0] . '" ></input>' . 
              ' Name: <input name="PT_Name" value="' . $a_name_end[0] . '" ></input><br/>';
         break;
      case "Russian":
         echo ' ID: <input name="RU_ID" value="' . $a_name_id[0] . '" ></input>' .
              ' Lang: <input name="RU_Lang" value="' . $what_lang2[0] . '" ></input>' . 
              ' Name: <input name="RU_Name" value="' . $a_name_end[0] . '" ></input><br/>';
         break;
      case "Chinese Simplified":
         echo ' ID: <input name="CHS_ID" value="' . $a_name_id[0] . '" ></input>' .
              ' Lang: <input name="CHS_Lang" value="' . $what_lang2[0] . '" ></input>' . 
              ' Name: <input name="CHS_Name" value="' . $a_name_end[0] . '" ></input><br/>';
         break;
      case "Spanish":
         echo ' ID: <input name="SP_ID" value="' . $a_name_id[0] . '" ></input>' .
              ' Lang: <input name="SP_Lang" value="' . $what_lang2[0] . '" ></input>' . 
              ' Name: <input name="SP_Name" value="' . $a_name_end[0] . '" ></input><br/>';
         break;
      default:
         echo "HOLY FUCKING SHIT!!!";
         break;
   }

}
echo '<input name="submit2" type="submit" value="Send it!"></input>';
echo '</form>';

}

if($_POST['submit2'] != ""){
$con = mysql_connect("localhost","vinceoa2_ygo","ki_234_ki");
if (!$con){
  die('Could not connect: ' . mysql_error());
}else{
  echo "Whee! Added new cards!" . "<br />";
  mysql_set_charset('utf8',$con); 
}

mysql_select_db("vinceoa2_mtg", $con);


   $Multiverse_ID = $_POST['card_multi_id'];
   $EN_Name = addslashes($_POST['card_name']);
   $Color = $_POST['card_color'];
   $Mana = $_POST['card_mana'];
   $CMC = $_POST['card_cmc'];
   $Type_1 = $_POST['card_type_1'];
   $Type_2 = $_POST['card_type_2'];
   $Power = $_POST['card_power'];
   $Toughness = $_POST['card_toughness'];
   $Loyalty = $_POST['card_loyalty'];

   $CHT_ID = $_POST['CHT_ID'];
   $CHT_Name = $_POST['CHT_Name'];
   $CHS_ID = $_POST['CHS_ID'];
   $CHS_Name = $_POST['CHS_Name'];
   $DE_ID = $_POST['DE_ID'];
   $DE_Name = addslashes($_POST['DE_Name']);
   $FR_ID = $_POST['FR_ID'];
   $FR_Name = addslashes($_POST['FR_Name']);
   $IT_ID = $_POST['IT_ID'];
   $IT_Name = addslashes($_POST['IT_Name']);
   $PT_ID = $_POST['PT_ID'];
   $PT_Name = addslashes($_POST['PT_Name']);
   $SP_ID = $_POST['SP_ID'];
   $SP_Name = addslashes($_POST['SP_Name']);
   $JP_ID = $_POST['JP_ID'];
   $JP_Name = $_POST['JP_Name'];
   $KR_ID = $_POST['KR_ID'];
   $KR_Name = $_POST['KR_Name'];
   $RU_ID = $_POST['RU_ID'];
   $RU_Name = $_POST['RU_Name'];

      $sql_1="INSERT INTO MTG_CARDS (EN_Name, Color_1, Mana_Cost_1, CMC_1, Type_1, Type_2, Power, Toughness, Loyalty, SP_Name, PT_Name, RU_Name, CHS_Name, CHT_Name, DE_Name, FR_Name, IT_Name, JP_Name, KR_Name) VALUES ('$EN_Name','$Color','$Mana','$CMC','$Type_1','$Type_2','$Power','$Toughness','$Loyalty','$SP_Name','$PT_Name','$RU_Name','$CHS_Name','$CHT_Name','$DE_Name','$FR_Name','$IT_Name','$JP_Name','$KR_Name')";


//echo $sql_1;

      if (!mysql_query($sql_1,$con)){
         echo "Sad Day T-T" . "<br />";
         die('Error: ' . mysql_error());
      }else{
      }



mysql_close($con);
}

//print_r ($langs);

?>