<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
   header("Content-type: text/html; charset=utf-8");
?>

<style>
.panel {border: 0px; margin-left: 5px; margin-right: 5px; margin-bottom: 5px !important;}

</style>

<?php include_once("analyticstracking.php") ?>

<?php
   include_once "database_var.php";
   include_once "ygo_search_functions.php";

   $con = mysql_connect("localhost",$db_username,$db_password);
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8');
   }

   mysql_select_db("vinceoa2_php1", $con);
   if($_GET['user'] != ''){
      $query1 = "SELECT * FROM ayn_users WHERE username LIKE '" . $_GET['user'] . "' ";
   }else{
      $query1 = "SELECT * FROM ayn_users WHERE username LIKE '" . $_SESSION['myusername'] . "' ";
   }
   $result1 = mysql_query($query1) or die(mysql_error()); 
   while($row = mysql_fetch_array($result1)){ 
      $tempUserID = $row['user_id'];
   }

   $con2 = mysql_connect("localhost",$db_username,$db_password);
   if (!$con2){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8');
   }

   $checklistString = "/home8/vinceoa2/public_html/user_data/" . $tempUserID . "/" . $db_name . "_" . $_SESSION['mylist'] . ".txt";
   $str_data = file_get_contents($checklistString, true);
   $data = json_decode($str_data,true);

   mysql_select_db("vinceoa2_" . $db_name, $con2);

   echo "<font face=\"Verdana\" size=\"2\">";
   //$query = "SELECT *, GROUP_CONCAT(Card_ID SEPARATOR '|') AS Comp_Set FROM " . strtoupper($db_name) . "_COMPLETE INNER JOIN " . strtoupper($db_name) . "_SETS WHERE " . strtoupper($db_name) . "_COMPLETE.Set_ID=" . strtoupper($db_name) . "_SETS.Main_Set_ID GROUP BY " . strtoupper($db_name) . "_SETS.EN_Set_Name";

   mysql_query("SET SESSION group_concat_max_len = 100000") or die(mysql_error()); 

   $query = "SELECT *, GROUP_CONCAT(" . strtoupper($db_name) . "_COMPLETE.Card_ID SEPARATOR '|') AS Comp_Set, GROUP_CONCAT(Rarity SEPARATOR '|') AS Rarity_Set FROM " . strtoupper($db_name) . "_COMPLETE INNER JOIN " . strtoupper($db_name) . "_SETS ON " . strtoupper($db_name) . "_COMPLETE.Set_ID=" . strtoupper($db_name) . "_SETS.Main_Set_ID INNER JOIN " . strtoupper($db_name) . "_CARDS WHERE " . strtoupper($db_name) . "_COMPLETE.Card_ID=" . strtoupper($db_name) . "_CARDS.Card_ID GROUP BY " . strtoupper($db_name) . "_SETS.EN_Set_Name";


   $result = mysql_query($query) or die(mysql_error()); 
   $count = 0;

   if(mysql_num_rows($result) > 2000){
      echo '<div id="tooManyCards">Way too many cards found! O.o Please narrow your search. ^_^</div>';
   }else{
      echo '<a name="id3" style="position:relative; top:-55px;" />';

   while($row = mysql_fetch_array($result)){ 
      $temp_language = "";
            switch($row['Set_Language']){
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


      $user_count = 0;
      $set_count = 0;
      $comp_set_cards = explode("|", $row['Comp_Set']);
      $rarity_set_cards = explode("|", $row['Rarity_Set']);
      $rarity_count = array();
      $rarity_count_total = array();

      foreach($comp_set_cards as $key=>$card){
         if(array_key_exists($rarity_set_cards[$key], $rarity_count)){
            $rarity_count_total[$rarity_set_cards[$key]]++;
         }else{
            $rarity_count[$rarity_set_cards[$key]] = 0;
            $rarity_count_total[$rarity_set_cards[$key]]++;
         }
         $set_count++;
         if(userAmountSimple($card) == TRUE){
            $rarity_count[$rarity_set_cards[$key]]++;
            $color = '#b0c4de';
            $user_count++;
         }
      }
      $percentage = $user_count / $set_count;
      $percentage = $percentage * 100;
      $percentage = number_format($percentage, 0);
      if($percentage == 100){
         echo '<div class="row" style="margin-right: 0px !important; margin-left: 0px !important; margin-bottom: 5px; background-color: #1ae466;">';
      }else{
         echo '<div class="row" style="margin-right: 0px !important; margin-left: 0px !important; margin-bottom: 5px; background-color: #00afe5;">';
      }
         echo '<div class="col-lg-2 col-md-3" style="">';
            echo '<div style="border: 0px !important; background-color: transparent; " class="thumbnail">';
               $tempPath_jpg = '/home8/vinceoa2/public_html/tgcdt/db/ptcg/images/' . $temp_language . '_packs/' . $row['Main_Set_ID'] . '.png';
               if(file_exists($tempPath_jpg)){
                  echo "<img src='images/" . $temp_language . "_packs/" . $row['Main_Set_ID'] . ".png' height='150px' width='150px' /> ";
               }else{
                  $site_test = "http://tgcdt.com/images/noimage.png";
                  echo "<img src='" . $site_test . "' height='150px' width='150px' /> ";
               }
               echo '<div class="caption" style=" background-color: transparent;" >';
               echo '<p style="text-indent: 0 !important; text-align: center; margin-bottom: 0px; font-size: 20px; background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(26, 228, 102, 1)), color-stop(' . $percentage . '%,rgba(26, 228, 102, 1)), color-stop(' . $percentage . '%,rgba(114, 142, 141, 1)), color-stop(100%,rgba(114, 142, 141, 1))); /* Chrome,Safari4+ */">(' . $user_count . ' of ' .  $set_count . ') ' . $percentage . '%</p></div>';
            echo '</div>';
         echo '</div>';
         echo '<div class="col-lg-10 col-md-9">';
            echo '<span style="font-size: 22px; " >' . $row['EN_Set_Name'] . '</span><br/>';
            echo "You currently own " . $percentage . "% of all the possible cards available in this set.<br/>";
            foreach($rarity_count_total as $r_key=>$r_value){
               $percent = $rarity_count[$r_key] / $r_value;
               $percent = $percent * 100;
               $percent = number_format($percent, 0);
               echo "<strong>" . $r_key . ":</strong> (" . $rarity_count[$r_key] . " of " . $r_value . ") " . $percent . "%<br/>";
            }
            //echo $row['Rarity_Set'];
            //print_r ($rarity_count);
         echo '</div>';
      echo '</div>';
   }
   }
?>
  <script type="text/javascript" charset="utf-8">
  $(function() {
    $("img.lazy").show().lazyload({
       effect      : "fadeIn"
    });
  });
  </script>