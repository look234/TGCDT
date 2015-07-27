<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
   header("Content-type: text/html; charset=utf-8");
?>
<?php include_once("analyticstracking.php") ?>

<?php
   include_once "/home8/vinceoa2/public_html/ygo/types.php";
   include_once "ygo_search_functions.php";

   $con = mysql_connect("localhost","vinceoa2_read","Luffy_234");
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8');
   }

   mysql_select_db("vinceoa2_php1", $con);
   if($_GET['user'] != ''){
      $otherUsersJazz = 1;
      $query1 = "SELECT * FROM ayn_users WHERE username LIKE '" . $_GET['user'] . "' ";
   }else{
      $otherUsersJazz = 0;
      $query1 = "SELECT * FROM ayn_users WHERE username LIKE '" . $_SESSION['myusername'] . "' ";
   }

   $result1 = mysql_query($query1) or die(mysql_error()); 

   while($row = mysql_fetch_array($result1)){ 
      $tempUserID = $row['user_id'];
   }
   if($otherUsersJazz == 1){
      $checklistString = "/home8/vinceoa2/public_html/user_data/" . $tempUserID . "/" . $db_name . "_checklist_" . $_SESSION['language'] . ".txt";
   }else{
      $checklistString = "/home8/vinceoa2/public_html/user_data/" . $tempUserID . "/" . $db_name . "_" . $_SESSION['mylist'] . "_" . $_SESSION['language'] . ".txt";
   }

   $con2 = mysql_connect("localhost",$db_username,$db_password);
   if (!$con2){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8');
   }
   $str_data = file_get_contents($checklistString, true);
   $data = json_decode($str_data,true);
   mysql_select_db("vinceoa2_" . $db_name, $con2);
   
   include_once "ygo_search_query.php";

   $link = mysqli_connect('localhost', 'vinceoa2_ygo', 'ki_234_ki', 'vinceoa2_ygo');
   if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
   }


   echo "<font face=\"Verdana\" size=\"2\">";
   $result = mysql_query($query) or die(mysql_error()); 
   $count = 0;

   if(mysql_num_rows($result) > 2000){
      echo '<div id="tooManyCards">Way too many cards found! O.o Please narrow your search. ^_^</div>';
   }else{

   while($row = mysql_fetch_array($result)){ 
   if($db_name == "ptcg"){

      $count++;
      echo '<div title="' . $row['Set_Num'] . '/n' . $row[$tempName] . '" id="no' . $count . '" class="';
      if(userAmountSimple($row['Set_Num'], $row['Edition'], $row['Rarity']) == TRUE){
         echo 'greenish_image">';
      }else{
         echo 'cardTopStyle_image">';
      }
      if($_SESSION['language'] == "JP"){
         $tempName = str_replace("|","", $row['JPK_Name']);
         echo '<input type="hidden" id="imageName" value="' . $tempName . '" />';
      }elseif($_SESSION['language'] == "KR"){
         $tempName = str_replace("|","", $row['KRK_Name']);
         echo '<input type="hidden" id="imageName" value="' . $tempName . '" />';
      }else{
         $tempName = $_SESSION['language'] . "_Name";
         echo '<input type="hidden" id="imageName" value="' . $row[$tempName] . '" />';
      }
      if(isset($row['Print_Num'])){
         echo '<input type="hidden" id="imageNumber" value="' . $row['Print_Num'] . '" />';
      }else{
         echo '<input type="hidden" id="imageNumber" value="' . $row['Set_Num'] . '" />';
      }
      echo '<input type="hidden" id="imageEdition" value="' . $row['Edition'] . '" />';
      echo '<input type="hidden" id="imageSetName" value="' . htmlspecialchars($row["GROUP_CONCAT(Set_Name SEPARATOR '|')"]) . '" />';
      echo '<input type="hidden" id="imageEffect" value="' . htmlspecialchars($row['Main_Text']) . '" />';
      echo '<input type="hidden" id="imageFlavor" value="' . htmlspecialchars($row['Flavor_Text']) . '" />';

      echo '<input type="hidden" id="imageRarity" value="' . $row['Rarity'] . '" />';
      echo '<input type="hidden" id="imageRarityFull" value="' . $row['Rarity'] . '" />';
      $tempPath = '/home8/vinceoa2/public_html/' . $db_name . '/images/' . $_SESSION['language'] . '_cards/' . $row['Set_Num'] . '_' . $row['Edition'] . '_' . $row['Rarity'] . '.png';
      $tempPath_jpg = '/home8/vinceoa2/public_html/' . $db_name . '/images/' . $_SESSION['language'] . '_cards/' . $row['Set_Num'] . '_' . $row['Edition'] . '_' . $row['Rarity'] . '.jpg';
      $tempPath2 = '/home8/vinceoa2/public_html/' . $db_name . '/images/' . $_SESSION['language'] . '_temp/' . $row['Number'] . '-' . $_SESSION['language'] . '.png';
      if(file_exists($tempPath)){
         echo '<img class="lazy src="images/back1.png" image_list" data-original="images/' . $_SESSION['language'] . '_cards/' . $row['Set_Num'] . '_' . $row['Edition'] . '_' . $row['Rarity'] . '.png" width="150" height="219" alt=""><noscript><img src="images/' . $_SESSION['language'] . '_cards/' . $row['Set_Num'] . '_' . $row['Edition'] . '_' . $row['Rarity'] . '.png" width="150" height="219"></noscript>';
      }elseif(file_exists($tempPath_jpg)){
         echo '<img class="lazy src="images/back1.png" image_list" data-original="images/' . $_SESSION['language'] . '_cards/' . $row['Set_Num'] . '_' . $row['Edition'] . '_' . $row['Rarity'] . '.jpg" width="150" height="219" alt=""><noscript><img src="images/' . $_SESSION['language'] . '_cards/' . $row['Set_Num'] . '_' . $row['Edition'] . '_' . $row['Rarity'] . '.jpg" width="150" height="219"></noscript>';
      }elseif(file_exists($tempPath2)){
         echo '<img class="lazy src="images/back1.png" image_list" data-original="images/' . $_SESSION['language'] . '_temp/' . $row['Number'] . '-' . $_SESSION['language'] . '.png" width="150" height="219" alt=""><noscript><img src="images/' . $_SESSION['language'] . '_temp/' . $row['Number'] . '-' . $_SESSION['language'] . '.png" width="150" height="219"></noscript>';
      }else{
         $site_test = "http://" . $db_name . ".tgcdt.com/images/back1.png";
         echo '<img src="' . $site_test . '" width="150px" class="image_list" /><br/>';
      }
      echo '<div id="sets_card' . $count . '" class="cardBottomStyle" style="position:relative; top:10px; margin: 0 auto; text-align:center; ">';
      if($otherUsersJazz == 1){
         userAmount($row['Set_Num'], $row['Edition'], $row['Rarity']);
      }else{
         echo '<button class="minusButtons2">-</button>';
         userAmount($row['Set_Num'], $row['Edition'], $row['Rarity']);
         echo '<button class="addButtons2">+</button>';
      }
      echo '</div></div>';

}else{
         for($i = 1; $i <= 2; $i++){
            $newEd = "Edition_" . $i;
            if($row[$newEd] == ""){
            }elseif(($row[$newEd] == $_POST['Edition'][0]) || ($_POST['Edition'][0] == "")){
               for($j = 1; $j <= 4; $j++){
                  $newRare = "Rarity_" . $j;
                  if(($row[$newRare] == "") || ($row[$newRare] != $_POST['Rarity'][0])){
                     break 1;
                  }elseif(($row[$newRare] == $_POST['Rarity'][0]) || ($_POST['Rarity'][0] == "")){
      $count++;
      echo '<div title="' . $row['Set_Num'] . '/n' . $row[$tempName] . '" id="no' . $count . '" class="';
      if(userAmountSimple($row['Set_Num'], $row[$newEd], $row[$newRare]) == TRUE){
         echo 'greenish_image">';
      }else{
         echo 'cardTopStyle_image">';
      }
      if($_SESSION['language'] == "JP"){
         $tempName = str_replace("|","", $row['JPK_Name']);
         echo '<input type="hidden" id="imageName" value="' . $tempName . '" />';
      }elseif($_SESSION['language'] == "KR"){
         $tempName = str_replace("|","", $row['KRK_Name']);
         echo '<input type="hidden" id="imageName" value="' . $tempName . '" />';
      }else{
         $tempName = $_SESSION['language'] . "_Name";
         echo '<input type="hidden" id="imageName" value="' . $row[$tempName] . '" />';
      }
      if(isset($row['Print_Num'])){
         echo '<input type="hidden" id="imageNumber" value="' . $row['Print_Num'] . '" />';
      }else{
         echo '<input type="hidden" id="imageNumber" value="' . $row['Set_Num'] . '" />';
      }
      echo '<input type="hidden" id="imageEdition" value="' . $row[$newEd] . '" />';
      echo '<input type="hidden" id="imageSetName" value="' . htmlspecialchars($row['Set_Name']) . '" />';
      echo '<input type="hidden" id="imageEffect" value="' . htmlspecialchars($row['Main_Text']) . '" />';
      echo '<input type="hidden" id="imageFlavor" value="' . htmlspecialchars($row['Flavor_Text']) . '" />';

      echo '<input type="hidden" id="imageRarity" value="' . $newRare . '" />';
      echo '<input type="hidden" id="imageRarityFull" value="' . $row[$newRare] . '" />';
      $tempPath = '/home8/vinceoa2/public_html/' . $db_name . '/images/' . $_SESSION['language'] . '_cards/' . $row['Set_Num'] . '_' . $row[$newEd] . '_' . $newRare . '.png';
      $tempPath_jpg = '/home8/vinceoa2/public_html/' . $db_name . '/images/' . $_SESSION['language'] . '_cards/' . $row['Set_Num'] . '_' . $row[$newEd] . '_' . $newRare . '.jpg';
      $tempPath2 = '/home8/vinceoa2/public_html/' . $db_name . '/images/' . $_SESSION['language'] . '_temp/' . $row['Number'] . '-' . $_SESSION['language'] . '.png';
      if(file_exists($tempPath)){
         echo '<img class="lazy src="images/back1.png" image_list" data-original="images/' . $_SESSION['language'] . '_cards/' . $row['Set_Num'] . '_' . $row[$newEd] . '_' . $newRare . '.png" width="150" height="219" alt=""><noscript><img src="images/' . $_SESSION['language'] . '_cards/' . $row['Set_Num'] . '_' . $row[$newEd] . '_' . $newRare . '.png" width="150" height="219"></noscript>';
      }elseif(file_exists($tempPath_jpg)){
         echo '<img class="lazy src="images/back1.png" image_list" data-original="images/' . $_SESSION['language'] . '_cards/' . $row['Set_Num'] . '_' . $row[$newEd] . '_' . $newRare . '.jpg" width="150" height="219" alt=""><noscript><img src="images/' . $_SESSION['language'] . '_cards/' . $row['Set_Num'] . '_' . $row[$newEd] . '_' . $newRare . '.jpg" width="150" height="219"></noscript>';
      }elseif(file_exists($tempPath2)){
         echo '<img class="lazy src="images/back1.png" image_list" data-original="images/' . $_SESSION['language'] . '_temp/' . $row['Number'] . '-' . $_SESSION['language'] . '.png" width="150" height="219" alt=""><noscript><img src="images/' . $_SESSION['language'] . '_temp/' . $row['Number'] . '-' . $_SESSION['language'] . '.png" width="150" height="219"></noscript>';
      }else{
         $site_test = "http://" . $db_name . ".tgcdt.com/images/back1.png";
         echo '<img src="' . $site_test . '" width="150px" class="image_list" /><br/>';
      }
      echo '<div id="sets_card' . $count . '" class="cardBottomStyle" style="position:relative; top:10px; margin: 0 auto; text-align:center; ">';
      if($otherUsersJazz == 1){
         userAmount($row['Set_Num'], $row[$newEd], $row[$newRare]);
      }else{
         echo '<button class="addButtons2">+</button>';
         userAmount($row['Set_Num'], $row[$newEd], $row[$newRare]);
         echo '<button class="minusButtons2">-</button>';
      }
      echo '</div></div>';
}
                  }
               }
            }
         }
      }
   }
?>