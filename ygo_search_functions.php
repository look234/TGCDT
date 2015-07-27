<?php
function checkED($curED, $num, $checkED1, $checkED2){
   if(($checkED1 == '') && ($checkED2 == '')){
      return true;
   }elseif($num == 1){
      if($curED == $checkED1){
         return true;
      }else{
         return false;
      }
   }else{
      if($curED == $checkED2){
         return true;
      }else{
         return false;
      }
   }
}

//Adds 0's to card number for Wikia link, problem fix for SQL DB primary key value
function fullNumber($newNum){
   switch ($newNum){ 
    case ($newNum < 100000): 
        echo "000" . $newNum;
        break; 
    case ($newNum < 1000000):   
        echo "00" . $newNum;
        break; 
    case ($newNum < 10000000):  
        echo "0" . $newNum; 
        break; 
    default: 
        echo $newNum;
        break; 
    } 
}

function incollectionSet($setNum, $edition, $rarity){
   global $data;

   if($data[$setNum][$edition][$rarity] > 0){
      return TRUE;
   }else{
      return FALSE;
   }
}

function makeGreen($setNum, $ED1, $ED2){
   global $data;
   $makeGreen = 0;

   if(($ED1 == '') && ($ED2 == '')){
      foreach($data[$setNum] as $key=>$value){
         foreach($data[$setNum][$key] as $key2=>$value){
            if($data[$setNum][$key][$key2] > 0){
               $makeGreen++;
            }
         }
      }
   }elseif($ED1 != ''){
      foreach($data[$setNum][$ED1] as $key2=>$value){
         if($data[$setNum][$ED1][$key2] > 0){
            $makeGreen++;
         }
      }
   }else{
      foreach($data[$setNum][$ED2] as $key2=>$value){
         if($data[$setNum][$ED2][$key2] > 0){
            $makeGreen++;
         }
      }
   }

   if($makeGreen > 0){
      return TRUE;
   }else{
      return FALSE;
   }
}

//Shows either the level of the card rank of the card or neither
function levelRank($newRow){
   if($newRow['Level'] > 0){
      //echo '<span id="hiddenLR">' . $newRow['Level'] . '</span><span id="levelRank"><img src="/images/Level.png" alt="Level icon" />x' . $newRow['Level'] . '</span>';
      echo '<span id="levelRank"><img src="/images/Level.png" alt="Level icon" />x' . $newRow['Level'] . '</span>';
   }elseif($newRow['Rank'] > 0){
      //echo '<span id="hiddenLR">' . $newRow['Rank'] . '.5</span><span id="levelRank"><img src="/images/Rank.png" alt="Rank icon" />x' . $newRow['Rank'] . '</span>';
      echo '<span id="levelRank"><img src="/images/Rank.png" alt="Rank icon" />x' . $newRow['Rank'] . '</span>';
   }else{
      //echo '<span id="hiddenLR">Z</span><span id="levelRank"></span>';
      echo '<span id="levelRank"></span>';
   }
}
function levelRank_Mini($newRow){
   if($newRow['Level'] > 0){
      echo '<span id="levelRank_Mini"><img src="/images/Level.png" alt="Level icon" />x' . $newRow['Level'] . '</span>';
   }elseif($newRow['Rank'] > 0){
      echo '<span id="levelRank_Mini"><img src="/images/Rank.png" alt="Rank icon" />x' . $newRow['Rank'] . '</span>';
   }
}

function makeRuby($kanji,$hiragana){
   $splitKanji = explode("|",$kanji);
   $splitHiragana = explode("|",$hiragana);

   for($i = 0; $i < count($splitKanji); $i++){
      if($splitHiragana[$i] == $splitKanji[$i]){
      //if(($splitHiragana[$i] == ' ') || empty($splitHiragana[$i])){
         echo $splitKanji[$i];
      }else{
         echo "<ruby><rb>" . $splitKanji[$i] . "</rb><rp>(</rp><rt>" . $splitHiragana[$i] . "</rt><rp>)</rp></ruby>";
      }
   }
}

function userAmountSimple($set_num, $ed_num, $rarity2){
   global $data;

   $temp = "$set_num|$ed_num|$rarity2";
   $temp2 = "[$set_num][$ed_num][$rarity2]";

   if($data[$set_num][$ed_num][$rarity2] > 0){
      return TRUE; 
   }else{
      return FALSE;
   }
}

function userAmount($set_num, $ed_num, $rarity2){
   global $data;

   $temp = "$set_num|$ed_num|$rarity2";
   $temp2 = "[$set_num][$ed_num][$rarity2]";

   if($data[$set_num][$ed_num][$rarity2] != ''){
      $temp3 = $data[$set_num][$ed_num][$rarity2]; 
   }else{
      $temp3 = 0;
   }


   echo '<button type="button" class="btn btn-default text-center" id="cardCounts" name="' . $temp . '" id="' . $temp2 . '" value="' . $temp3 . '" aria-label="..."><strong>';
   echo $temp3;
   echo '</strong></button>';
}

function userAmount2($card_id){
   global $data;

   $temp = "$set_num|$ed_num|$rarity2";
   $temp2 = "[$set_num][$ed_num][$rarity2]";

   if(array_key_exists($card_id,$data)){
      $temp3 = $data[$card_id]; 
   }else{
      $temp3 = 0;
   }


   echo '<button type="button" class="btn btn-default text-center" id="cardCounts" name="' . $card_id . '" value="' . $temp3 . '" aria-label="..."><strong>';
   echo $temp3;
   echo '</strong></button>';
}

//Built for cards with non-numeric values in ATK or DEF
function changeATFDEF($newRow){
   $tempAttr = array('TRAP', 'SPELL', 'MAGIC', 'TOKEN', 'NON-GAME');
   if(!in_array($newRow['Attribute'], $tempAttr)){
      $tempStat = array($newRow['ATK'], $newRow['DEF']);
         //echo '<span id="hiddenATK">' . $newRow['ATK'] . '</span><span id="hiddenDEF">' . $newRow['DEF'] . '</span><span id="ATK">ATK/';
         echo '<span id="ATK">ATK/';
         if($tempStat[0] == 9999){
            echo "? </span>";
         }elseif($tempStat[0] == 9998){
            echo "X000 </span>";
         }elseif($tempStat[0] == 9997){
            echo "???? </span>";
         }else{
            echo $tempStat[0] . " ";
         }
         echo '<span id="DEF">DEF/';
         if($tempStat[1] == 9999){
            echo '?</span>';
         }elseif($tempStat[1] == 9998){
            echo 'X000</span>';
         }elseif($tempStat[1] == 9997){
            echo '????</span>';
         }else{
            echo $tempStat[1] . '</span></span>';
         }
   }else{
   } //End ifelse
}

function changeATFDEF_Mini($newRow){
   $tempAttr = array('TRAP', 'SPELL', 'MAGIC', 'TOKEN', 'NON-GAME');
   if(!in_array($newRow['Attribute'], $tempAttr)){
      $tempStat = array($newRow['ATK'], $newRow['DEF']);
         echo '<span id="ATK">ATK/';
         if($tempStat[0] == 9999){
            echo "? </span>";
         }elseif($tempStat[0] == 9998){
            echo "X000 </span>";
         }elseif($tempStat[0] == 9997){
            echo "???? </span>";
         }else{
            echo $tempStat[0] . " ";
         }
         echo '<span id="DEF">DEF/';
         if($tempStat[1] == 9999){
            echo '?</span>';
         }elseif($tempStat[1] == 9998){
            echo 'X000</span>';
         }elseif($tempStat[1] == 9997){
            echo '????</span>';
         }else{
            echo $tempStat[1] . '</span></span>';
         }
   }else{
   } //End ifelse
}

//Creates the bracket version view of combined Type values for a card
function typeOutput($Attribute, $Type1, $Type2, $Type3){
   global $EN_types, $FR_types, $DE_types, $IT_types, $PT_types, $SP_types, $JP_types, $TC_types, $KR_types;

   switch($_SESSION['language']){
      case "FR":
         $tempLangArray = $FR_types;
         break;
      case "DE":
         $tempLangArray = $DE_types;
         break;
      case "IT":
         $tempLangArray = $IT_types;
         break;
      case "PT":
         $tempLangArray = $PT_types;
         break;
      case "SP":
         $tempLangArray = $SP_types;
         break;
      case "JP":
         $tempLangArray = $JP_types;
         break;
      case "TC":
         $tempLangArray = $TC_types;
         break;
      case "KR":
         $tempLangArray = $KR_types;
         break;
      default:
         $tempLangArray = $EN_types;
         break;
   }

   if($Attribute == "TOKEN"){
      echo "<span id=\"type\"></span>";
   }elseif($Attribute == "NON-GAME"){
      echo "<span id=\"type\"></span>";
   }elseif(($Type2 == "Effect") && (($Type3 == "Tuner") || ($Type3 == "Gemini") || ($Type3 == "Toon") || ($Type3 == "Union") || ($Type3 == "Spirit"))){
      echo "<span id=\"type\">[ " . $tempLangArray[$Type1] . " / " . $tempLangArray[$Type3] . " ]</span>";
   }elseif(($Type2 == "Normal") && (isset($Type1)) && ($Type3 == "Tuner")){
      echo "<span id=\"type\">[ " . $tempLangArray[$Type1] . " / " . $tempLangArray[$Type3] . " ]</span>";
   }elseif(($Type2 == "Fusion") && (isset($Type1)) && ($Type3 == "Effect")){
      echo "<span id=\"type\">[ " . $tempLangArray[$Type1] . " / " . $tempLangArray[$Type2] . " / " . $tempLangArray[$Type3] . " ]</span>";
   }elseif(($Type2 == "Ritual") && (isset($Type1)) && ($Type3 == "Effect")){
      echo "<span id=\"type\">[ " . $tempLangArray[$Type1] . " / " . $tempLangArray[$Type2] . " / " . $tempLangArray[$Type3] . " ]</span>";
   }elseif(($Type2 == "Synchro") && (isset($Type1)) && (($Type3 == "Effect") || ($Type3 == "Tuner"))){
      echo "<span id=\"type\">[ " . $tempLangArray[$Type1] . " / " . $tempLangArray[$Type2] . " / " . $tempLangArray[$Type3] . " ]</span>";
   }elseif(($Type2 == "Xyz") && (isset($Type1)) && ($Type3 == "Effect")){
      echo "<span id=\"type\">[ " . $tempLangArray[$Type1] . " / " . $tempLangArray[$Type2] . " / " . $tempLangArray[$Type3] . " ]</span>";
   }elseif(($Type2 == "Pendulum") && (isset($Type1)) && ($Type3 == "Effect")){
      echo "<span id=\"type\">[ " . $tempLangArray[$Type1] . " / " . $tempLangArray[$Type2] . " / " . $tempLangArray[$Type3] . " ]</span>";
   }elseif(($Attribute == "TRAP") || ($Attribute == "SPELL") || ($Attribute == "MAGIC")){
      echo "<span id=\"type\">[ " . $tempLangArray[$Type2] . " ]</span>";
   }else{
      echo "<span id=\"type\">[ " . $tempLangArray[$Type1] . " / " . $tempLangArray[$Type2] . " ]</span>";
   }
}
?>