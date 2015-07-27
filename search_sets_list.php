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

   $con = mysql_connect("localhost","vinceoa2_read","Luffy_234");
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
   $query = "SELECT EN_Set_Name, GROUP_CONCAT(Card_ID SEPARATOR '|') AS Comp_Set FROM " . strtoupper($db_name) . "_COMPLETE INNER JOIN " . strtoupper($db_name) . "_SETS WHERE " . strtoupper($db_name) . "_COMPLETE.Set_ID=" . strtoupper($db_name) . "_SETS.Main_Set_ID GROUP BY " . strtoupper($db_name) . "_SETS.EN_Set_Name";
   $result = mysql_query($query) or die(mysql_error()); 
   $count = 0;

   if(mysql_num_rows($result) > 2000){
      echo '<div id="tooManyCards">Way too many cards found! O.o Please narrow your search. ^_^</div>';
   }else{
      echo '<a name="id3" style="position:relative; top:-55px;" />';

   while($row = mysql_fetch_array($result)){ 
      $count = 0;
      $comp_set_cards = explode("|", $row['Comp_Set']);
      echo '<span style="color: white;" >' . $row['EN_Set_Name'] . ' (' . count($comp_set_cards) . ')</span><br/>';
      echo '<table>';
      foreach($comp_set_cards as $card){
         $color = "#edefaf";
         $count++;
         if(userAmountSimple($card) == TRUE){
            $color = '#b0c4de';
         }

         if($count == 1){
            echo '<tr><td style="position: relative; text-align: center; padding: 2px; margin: 2px; display: inline; width: 75px; height: 50px; background-color: ' . $color . ';">' . $card . '</td>';
         }elseif($count > 20){
            $count = 0;
            echo '<td style="position: relative; text-align: center; padding: 2px; margin: 2px; display: inline; width: 75px; height: 50px; background-color: ' . $color . ';">' . $card . '</td></tr>';
         }else{
            echo '<td style="position: relative; text-align: center; padding: 2px; margin: 2px; display: inline; width: 75px; height: 50px; background-color: ' . $color . ';">' . $card . '</td>';
         }
      }
      echo '</table><br/>';
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