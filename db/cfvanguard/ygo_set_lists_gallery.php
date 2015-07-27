<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
   header('Content-Type: text/html; charset=utf-8');

   if(!isset($_SESSION['onlyMine'])){
      $_SESSION['onlyMine'] = "yes";
   }elseif(isset($_GET['onlyMine'])){
      $_SESSION['onlyMine'] = $_GET['onlyMine'];
   }
   if(!isset($_SESSION['mylist'])){
      $_SESSION['mylist'] = "checklist";
   }elseif(isset($_GET['mylist'])){
      $_SESSION['mylist'] = $_GET['mylist'];
   }
   if(!isset($_SESSION['language'])){
      $_SESSION['language'] = "EN";
   }elseif(isset($_GET['language'])){
      $cleanedLN = htmlspecialchars($_GET['language']);
      $_SESSION['language'] = $cleanedLN;
      //header('Location: http://ygo.tgcdt.com/');
   }
?>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
   <link href="OriginalSytle.css" rel="stylesheet" type="text/css" media="screen" />
<?php include_once("analyticstracking.php") ?>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script>
$(document).ready(function(){

  $("div#aSet").dblclick( function () {
     var $setAbb = $(this).children(".setAbb").val();
     var $setName = $(this).children(".setName").val();
     alert($setAbb + $setName); 
     //$.post("ygo_search.php", { setAbb: $setAbb, setName: $setName }).window.location.replace("http://ygo.tgcdt.com/");

  });

});
</script>

   <div >

<?php
   $con = mysql_connect("localhost","vinceoa2_read","Luffy_234");
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      //echo "Whee! Connected!" . "<br />";
      mysql_set_charset('utf8',$con); 
   }
   mysql_select_db("vinceoa2_ygo", $con);

   $query = "SELECT * FROM YGO_SET_" . $_SESSION['language'] . " WHERE Set_Type='" . $_SESSION['set_type'] . "' ORDER BY YGO_SET_" . $_SESSION['language'] . ".Release_Date DESC";
   $i = 0;
   $count = 0;
   $tempSetList = array();

   $checklistString = "/home8/vinceoa2/public_html/user_data/" . $_SESSION['myid'] . "/ygo_" . $_SESSION['mylist'] . "_" . $_SESSION['language'] . ".txt";
   $str_data = file_get_contents($checklistString, true);
   $data = json_decode($str_data,true);
   $result = mysql_query($query);
   if($result){
   while($row = mysql_fetch_array($result)){
         if($row['Set_Num'] == ''){
         }else{
            $tempSetNum = mb_split("-", $row['Set_Num']);
            $tempSetNum2 = mb_split("[0-9]", $tempSetNum[1]);
            if($tempSetNum2[0] == ''){
               $newSetNum = $tempSetNum[0];
            }else{
               $newSetNum = $tempSetNum[0] . "-" . $tempSetNum2[0];
            }

            if(($tempSetList[$i]['Set_Name'] == $row['Set_Name']) && ($tempSetList[$i]['Set_Abb'] == $newSetNum)){
               if($row['Rarity_1'] != ''){
                  $tempSetList[$i]['Count']++;
               }
               if($row['Rarity_2'] != ''){
                  $tempSetList[$i]['Count']++;
               }
               if($row['Rarity_3'] != ''){
                  $tempSetList[$i]['Count']++;
               }
               if($row['Rarity_4'] != ''){
                  $tempSetList[$i]['Count']++;
               }
               $num = $row['Set_Num'];
               $ed1 = $row['Edition_1'];
               $ed2 = $row['Edition_2'];

               foreach($data[$num][$ed1] as $key1 => $value1){
                  if($value1 > 0){
                     $tempSetList[$i]['User_Count_ED1']++;
                     $tempSetList[$i]['User_TCount_ED1'] += $value1;
                  }
               }
               foreach($data[$num][$ed2] as $key2 => $value2){
                  if($value2 > 0){
                     $tempSetList[$i]['User_Count_ED2']++;
                     $tempSetList[$i]['User_TCount_ED2'] += $value2;
                  }
               }
            }else{
               $v = 0;
               for($v = 0; $v <= count($tempSetList); $v++){
                  if(($tempSetList[$v]['Set_Name'] == $row['Set_Name']) && ($tempSetList[$v]['Set_Abb'] == $newSetNum)){
                        $addit = 0;
                        if($row['Rarity_1'] != ''){
                           $tempSetList[$v]['Count']++;
                        }
                        if($row['Rarity_2'] != ''){
                           $tempSetList[$v]['Count']++;
                        }
                        if($row['Rarity_3'] != ''){
                           $tempSetList[$v]['Count']++;
                        }
                        if($row['Rarity_4'] != ''){
                           $tempSetList[$v]['Count']++;
                        }
                        $i = $v;
                        break 1;
                  }else{
                        $addit++;
                        $i = $v;
                  }
               }
               if($addit > 0){
                        $i++;
                        $tempSetList[$i]['Set_Date'] = $row['Release_Date'];
                        $tempSetList[$i]['Set_Name'] = $row['Set_Name'];
                        $tempSetList[$i]['Set_Abb'] = $newSetNum;
                        if($row['Rarity_1'] != ''){
                           $tempSetList[$i]['Count']++;
                        }
                        if($row['Rarity_2'] != ''){
                           $tempSetList[$i]['Count']++;
                        }
                        if($row['Rarity_3'] != ''){
                           $tempSetList[$i]['Count']++;
                        }
                        if($row['Rarity_4'] != ''){
                           $tempSetList[$i]['Count']++;
                        }
                        //$tempSetList[$i]['Count'] = 1;
                        $tempSetList[$i]['Edition_1'] = $row['Edition_1'];
                        $tempSetList[$i]['Edition_2'] = $row['Edition_2'];
               }

               $num = $row['Set_Num'];
               $ed1 = $row['Edition_1'];
               $ed2 = $row['Edition_2'];
               foreach($data[$num][$ed1] as $key1 => $value1){
                  if($value1 > 0){
                     $tempSetList[$i]['User_Count_ED1']++;
                     $tempSetList[$i]['User_TCount_ED1'] += $value1;
                  }
               }
               foreach($data[$num][$ed2] as $key2 => $value2){
                  if($value2 > 0){
                     $tempSetList[$i]['User_Count_ED2']++;
                     $tempSetList[$i]['User_TCount_ED2'] += $value2;
                  }
               } 

            }
         } //End ifelse
   } //End while
   }//End if

   for($j = 1; $j <= count($tempSetList); $j++){
      if($tempSetList[$j]['User_Count_ED1'] == $tempSetList[$j]['Count']){
         $ed1Color = 2;
      }elseif($tempSetList[$j]['User_Count_ED1'] > 0){
         $ed1Color = 1;
      }else{
         $ed1Color = 0;
      }
      if($tempSetList[$j]['User_Count_ED2'] == $tempSetList[$j]['Count']){
         $ed2Color = 2;
      }elseif($tempSetList[$j]['User_Count_ED2'] > 0){
         $ed2Color = 1;
      }else{
         $ed2Color = 0;
      }
      if($ed1Color == 2 || $ed2Color == 2){
         echo '<div class="greenish_image" id="aSet" >';
      }elseif($ed1Color == 1 || $ed2Color == 1){
         echo '<div class="cardTopStyle_image" id="aSet" style="';

$percentage = ($tempSetList[$j]['User_Count_ED1'] / $tempSetList[$j]['Count']) * 100;

$haveSomeColor = '#00afe5';
$haveNoneColor = '#02d4ee';

echo 'background: ' . $haveSomeColor . '; /* Old browsers */';
echo 'background: -moz-linear-gradient(left, ' . $haveSomeColor . ' 0%, ' . $haveSomeColor . ' ' . $percentage . '%, ' . $haveNoneColor . ' ' . $percentage . '%, ' . $haveNoneColor . ' 100%, ' . $haveNoneColor . ' 100%); /* FF3.6+ */';
echo 'background: -webkit-gradient(linear, left top, right top, color-stop(0%,' . $haveSomeColor . '), color-stop(' . $percentage . '%,' . $haveSomeColor . '), color-stop(' . $percentage . '%,' . $haveNoneColor . '), color-stop(100%,' . $haveNoneColor . '), color-stop(100%,' . $haveNoneColor . ')); /* Chrome,Safari4+ */';
echo 'background: -webkit-linear-gradient(left, ' . $haveSomeColor . ' 0%,' . $haveSomeColor . ' ' . $percentage . '%,' . $haveNoneColor . ' ' . $percentage . '%,' . $haveNoneColor . ' 100%,' . $haveNoneColor . ' 100%); /* Chrome10+,Safari5.1+ */';
echo 'background: -o-linear-gradient(left, ' . $haveSomeColor . ' 0%,' . $haveSomeColor . ' ' . $percentage . '%,' . $haveNoneColor . ' ' . $percentage . '%,' . $haveNoneColor . ' 100%,' . $haveNoneColor . ' 100%); /* Opera 11.10+ */';
echo 'background: -ms-linear-gradient(left, ' . $haveSomeColor . ' 0%,' . $haveSomeColor . ' ' . $percentage . '%,' . $haveNoneColor . ' ' . $percentage . '%,' . $haveNoneColor . ' 100%,' . $haveNoneColor . ' 100%); /* IE10+ */';
echo 'background: linear-gradient(to right, ' . $haveSomeColor . ' 0%,' . $haveSomeColor . ' ' . $percentage . '%,' . $haveNoneColor . ' ' . $percentage . '%,' . $haveNoneColor . ' 100%,' . $haveNoneColor . ' 100%); /* W3C */';
echo 'filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="' . $haveSomeColor . '", endColorstr="' . $haveNoneColor . '",GradientType=1 ); /* IE6-9 */';

         echo '>';
      }else{
         echo '<div class="cardTopStyle_image" id="aSet" style="min-height: 235px;">';
      }
      $tempPath = '/home8/vinceoa2/public_html/ygo/images/' . $_SESSION['language'] . '_packs/' . $tempSetList[$j]['Set_Abb'] . "_" . $tempSetList[$j]['Set_Date'] . '.png';
      if(file_exists($tempPath)){
         //echo '<img class="lazy src="images/back1.png" image_list" data-original="images/' . $_SESSION['language'] . '_packs/' . $tempSetList[$j]['Set_Abb'] . "_" . $tempSetList[$j]['Set_Date'] . '.png" style="max-width:150px; max-height:219px;" alt=""><noscript><img src="images/' . $_SESSION['language'] . '_packs/' . $tempSetList[$j]['Set_Abb'] . "_" . $tempSetList[$i]['Release_Date'] . '.png" style="max-width:150px; max-height:219px;"></noscript>';
         echo '<img src="http://ygo.tgcdt.com/images/' . $_SESSION['language'] . '_packs/' . $tempSetList[$j]['Set_Abb'] . "_" . $tempSetList[$j]['Set_Date'] . '.png" style="max-width:150px; max-height:219px; display: block; margin-left: auto; margin-right: auto;">';
      }else{
         echo '<img src="http://ygo.tgcdt.com/images/back1.png" width="150px" class="image_list" /><br/>';
      }
      echo '<div id="sets_card' . $count . '" class="cardBottomStyle_image" style="position:relative; margin: 0 auto; text-align:center; color:black; ">';
      echo '<form method="GET" action="" id="list"><input type="hidden" class="Edition" name="Edition" value="' . $tempSetList[$j]['Edition_1'] . '">';
      echo '<input type="hidden" class="Sort_Value" name="Sort_Value" value="Set Number">';
      echo '<input type="hidden" class="setName" name="setName" value="' . $tempSetList[$j]['Set_Name'] . '">';
            echo '<button type="submit" value="Submit" class="listButton">'; 
         //edition($tempSetList[$j]['Edition_1']);
         if($tempSetList[$j]['User_Count_ED1'] == ''){
            echo "0 ( 0 ) / " . $tempSetList[$j]['Count'];
         }else{
            echo $tempSetList[$j]['User_Count_ED1'] . " (" . $tempSetList[$j]['User_TCount_ED1'] . ") / " . $tempSetList[$j]['Count'];
         }  
      echo '</button></form>';
   
      echo '</div></div>';
      if($tempSetList[$j]['Edition_2'] != ""){
         if($tempSetList[$j]['User_Count_ED2'] == $tempSetList[$j]['Count']){
            $ed2Color = 2;
         }elseif($tempSetList[$j]['User_Count_ED2'] > 0){
            $ed2Color = 1;
         }else{
            $ed2Color = 0;
         }
         if($ed2Color == 2){
            echo '<div class="greenish_image" id="aSet" >';
         }elseif($ed2Color == 1){
            echo '<div class="cardTopStyle_image" id="aSet" style="';
$percentage = ($tempSetList[$j]['User_Count_ED2'] / $tempSetList[$j]['Count']) * 100;

$haveSomeColor = '#00afe5';
$haveNoneColor = '#02d4ee';

echo 'background: ' . $haveSomeColor . '; /* Old browsers */';
echo 'background: -moz-linear-gradient(left, ' . $haveSomeColor . ' 0%, ' . $haveSomeColor . ' ' . $percentage . '%, ' . $haveNoneColor . ' ' . $percentage . '%, ' . $haveNoneColor . ' 100%, ' . $haveNoneColor . ' 100%); /* FF3.6+ */';
echo 'background: -webkit-gradient(linear, left top, right top, color-stop(0%,' . $haveSomeColor . '), color-stop(' . $percentage . '%,' . $haveSomeColor . '), color-stop(' . $percentage . '%,' . $haveNoneColor . '), color-stop(100%,' . $haveNoneColor . '), color-stop(100%,' . $haveNoneColor . ')); /* Chrome,Safari4+ */';
echo 'background: -webkit-linear-gradient(left, ' . $haveSomeColor . ' 0%,' . $haveSomeColor . ' ' . $percentage . '%,' . $haveNoneColor . ' ' . $percentage . '%,' . $haveNoneColor . ' 100%,' . $haveNoneColor . ' 100%); /* Chrome10+,Safari5.1+ */';
echo 'background: -o-linear-gradient(left, ' . $haveSomeColor . ' 0%,' . $haveSomeColor . ' ' . $percentage . '%,' . $haveNoneColor . ' ' . $percentage . '%,' . $haveNoneColor . ' 100%,' . $haveNoneColor . ' 100%); /* Opera 11.10+ */';
echo 'background: -ms-linear-gradient(left, ' . $haveSomeColor . ' 0%,' . $haveSomeColor . ' ' . $percentage . '%,' . $haveNoneColor . ' ' . $percentage . '%,' . $haveNoneColor . ' 100%,' . $haveNoneColor . ' 100%); /* IE10+ */';
echo 'background: linear-gradient(to right, ' . $haveSomeColor . ' 0%,' . $haveSomeColor . ' ' . $percentage . '%,' . $haveNoneColor . ' ' . $percentage . '%,' . $haveNoneColor . ' 100%,' . $haveNoneColor . ' 100%); /* W3C */';
echo 'filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="' . $haveSomeColor . '", endColorstr="' . $haveNoneColor . '",GradientType=1 ); /* IE6-9 */';

         echo '>';
      }else{
         echo '<div class="cardTopStyle_image" id="aSet" style="min-height: 235px;">';
      }
      $tempPath = '/home8/vinceoa2/public_html/ygo/images/' . $_SESSION['language'] . '_packs/' . $tempSetList[$j]['Set_Abb'] . "_" . $tempSetList[$i]['Release_Date'] . '.png';
      if(file_exists($tempPath)){
         //echo '<img class="lazy src="images/back1.png" image_list" data-original="images/' . $_SESSION['language'] . '_packs/' . $tempSetList[$j]['Set_Abb'] . "_" . $tempSetList[$j]['Set_Date'] . '.png" style="max-width:150px; max-height:219px;" alt=""><noscript><img src="images/' . $_SESSION['language'] . '_packs/' . $tempSetList[$j]['Set_Abb'] . "_" . $tempSetList[$j]['Set_Date'] . '.png" style="max-width:150px; max-height:219px;"></noscript>';
         echo '<img src="http://ygo.tgcdt.com/images/' . $_SESSION['language'] . '_packs/' . $tempSetList[$j]['Set_Abb'] . "_" . $tempSetList[$j]['Set_Date'] . '.png" style="max-width:150px; max-height:219px; display: block; margin-left: auto; margin-right: auto;">';
      }else{
         echo '<img src="http://ygo.tgcdt.com/images/back1.png" width="150px" class="image_list" /><br/>';
      }
         echo '<div id="sets_card' . $count . '" class="cardBottomStyle_image" style="position:relative; margin: 0 auto; text-align:center; color:black; ">';
         echo '<form method="GET" action="" id="list"><input type="hidden" class="Edition" name="Edition" value="' . $tempSetList[$j]['Edition_2'] . '">';
         echo '<input type="hidden" class="Sort_Value" name="Sort_Value" value="Set Number">';
         echo '<input type="hidden" class="setName" name="setName" value="' . $tempSetList[$j]['Set_Name'] . '">';
            echo '<button type="submit" value="Submit" class="listButton">';  
         //edition($tempSetList[$j]['Edition_1']);
         if($tempSetList[$j]['User_Count_ED2'] == ''){
            echo "0 ( 0 ) / " . $tempSetList[$j]['Count'];
         }else{
            echo $tempSetList[$j]['User_Count_ED2'] . " (" . $tempSetList[$j]['User_TCount_ED2'] . ") / " . $tempSetList[$j]['Count'];
         } 
      echo '</button></form>';
   
      echo '</div></div>';
      }
   }

function edition($ed){
   switch($ed){
      case "Unlimited":
         echo "Unlimited";
         break;
      case "1st":
         echo "1st Edition";
         break;
      case "Limited":
         echo "Limited";
         break;
      case "Duel Terminal":
         echo "Duel Terminal";
         break;
      case "Replica":
         echo "Replica";
         break;
      default:
         echo $ed;
         break;
   }
}

   echo '</div>';
?>