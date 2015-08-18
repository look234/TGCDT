<?php
$some_name = session_name("some_name");
//session_set_cookie_params(0, '/', '.tgcdt.com');
//session_start();
//   header("Content-type: text/html; charset=utf-8");
?>
<?php include_once("analyticstracking.php") ?>



<?php
   include_once "ygo_search_functions.php";
   include_once "database_var.php";

   $con = mysql_connect("localhost","vinceoa2_read","Luffy_234");
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8');
   }

   mysql_select_db("vinceoa2_php1", $con);
   $query1 = "SELECT * FROM ayn_users WHERE username LIKE '" . $_SESSION['myusername'] . "' ";

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

   mysql_select_db("vinceoa2_" . $db_name, $con2);

   $checklistString = "/home8/vinceoa2/public_html/user_data/" . $tempUserID . "/" . $db_name . "_" . $_SESSION['mylist'] . ".txt";
   $str_data = file_get_contents($checklistString, true);
   $data = json_decode($str_data,true);
   
   include_once "ygo_search_query.php";


   $link = mysqli_connect('localhost', 'vinceoa2_ygo', 'ki_234_ki', 'vinceoa2_ygo');
   if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
   }
   $temp_language = "";
   $result = mysql_query($query) or die(mysql_error()); 
   $count = 0;
   echo '<a name="id3" style="position:relative; top:-55px;" />';

   if(mysql_num_rows($result) > 2000){
      echo '<div id="tooManyCards">Way too many cards found! O.o Please narrow your search. ^_^</div>';
   }else{
      while($row = mysql_fetch_array($result)){ 
         $count++;
         echo '<div id="no' . $count . '" class="col-lg-2 col-md-3 col-sm-4 col-xs-6 wootG';
         if(userAmountSimple($row['Card_ID']) == TRUE){
            echo ' hasCards"';
            if($_POST['showOptions'] == "doNotHave"){
               echo ' style="display: none;"';
            }
         }else{
            echo ' doesNotHaveCards"';
            if($_POST['showOptions'] == "onlyMine"){
               echo ' style="display: none;"';
            }
         }
         echo '>';
         if(userAmountSimple($row['Card_ID']) == TRUE){
            echo '<div class="thumbnail greenish_image" >';
         }else{
            echo '<div class="thumbnail cardTopStyle_image" >';
         }

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



         $tempPath2 = '/home8/vinceoa2/public_html/tgcdt/db/' . $db_name . '/images/' . $temp_language . '_cards/' . $row['DB_Card_Num'] . '_' . $row['Edition'] . '_' . $row['Card_ID'] . '.jpg';

         if(file_exists($tempPath2)){
            echo '<img class="lazy img-responsive" style="padding: 0px;" data-toggle="modal" data-target="#Modal_' . $count . '" src="images/back1.png" image_list" data-original="images/' . $temp_language . '_cards/' . $row['DB_Card_Num'] . '_' . $row['Edition'] . '_' . $row['Card_ID'] . '.jpg" alt="" width="250px" height="250px" />';
            echo '<noscript>';
               echo '<img class="img-responsive" style="padding: 0px;" data-toggle="modal" data-target="#Modal_' . $count . '" src="images/' . $temp_language . '_cards/' . $row['DB_Card_Num'] . '_' . $row['Edition'] . '_' . $row['Card_ID'] . '.jpg" />';
            echo '</noscript>';
         }else{
            $site_test = "http://" . $db_name . ".tgcdt.com/images/back1.png";
            echo '<img src="' . $site_test . '" style="padding: 0px; opacity: 0.25;" data-toggle="modal" data-target="#Modal_' . $count . '" class="img-responsive image_list" width="250px" height="250px" /><h2>' . $row['EN_Name'] . '<br />';
            echo '<img src="images/' . $temp_language . '_icons/' . $row['Set_Icon'] . '.png" width="20px" height="20px" /> ' . $row['Set_Number'] . '<br />' . $row['Edition'] . '<br />' . $row['Rarity'] . '<br />';
            if($row['Holo'] != ""){
               echo '(' . $row['Holo'] . ')';
            }
            echo '</h2>';
         }
         if(userAmountSimple($row['Card_ID']) == TRUE){
            echo '<div id="sets_card' . $count . '" class="caption hasCard">';
         }else{
            echo '<div id="sets_card' . $count . '" class="caption">';
         }
            echo '<div class="btn-group-wrap center-block">';
               echo '<input type="hidden" class="Card_ID" value="' . $row['Card_ID'] . '" />';
               echo '<input type="hidden" class="Div_ID" value="no' . $count . '" />';
               echo '<div class="btn-group" role="group" aria-label="...">';
                  echo '<button type="button" class="btn btn-default minusButtons2" style="border-radius: 4px; border-top-right-radius: 0; border-bottom-right-radius: 0;"  aria-label="...">';
                     echo '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>';
                  echo '</button>';
                  userAmount2($row['Card_ID']);
                  echo '<button type="button" class="btn btn-default addButtons2" aria-label="...">';
                     echo '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>';
                  echo '</button>';
                  echo '</div>';
            echo '</div>';
         echo '</div>';


            echo '</div>';
         echo '</div>';







echo '<!-- Modal -->
<div class="modal modal-cards" id="Modal_' . $count . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">';
      if(userAmountSimple($row['Card_ID']) == TRUE){
         echo '<div class="modal-header" style="background-color: #1ae466;">';
      }else{
         echo '<div class="modal-header" style="background-color: #00afe5;">';
      }
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<h5 class="modal-title" id="myModalLabel">';


         detailCardInfoHeader($row, $temp_language);


      echo '</h5></div>'; //close modal-header
      echo '<div class="modal-body ' . $row[$modal_body_color] . '">';
      echo '<div class="modal_buttons" style="text-align: center;" >';
      echo '<button class="iconButtons prevModal" type="button" value="' . $count . '"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="font-size: 2.5em;"></span></button>';
      //echo '<button class="iconButtons modal-card-view" type="button" value="' . $count . '"><span class="glyphicon glyphicon-modal-window" aria-hidden="true" style="font-size: 2.5em;"></span></button>';
      echo '<button class="iconButtons modal-picture-view" type="button" value="' . $count . '"><span class="glyphicon glyphicon-picture" aria-hidden="true" style="font-size: 2.5em;"></span></button>';
      //echo '<button class="iconButtons modal-text-view" type="button" value="' . $count . '"><span class="glyphicon glyphicon-align-justify" aria-hidden="true" style="font-size: 2.5em;"></span></button>';
      echo '<button class="iconButtons modal-set-view" type="button" value="' . $count . '"><span class="glyphicon glyphicon-briefcase" aria-hidden="true" style="font-size: 2.5em;"></span></button>';
      echo '<button class="iconButtons modal-user-view" type="button" value="' . $count . '"><span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: 2.5em;"></span></button>';
      echo '<button class="iconButtons modal-shop-view" type="button" value="' . $count . '"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="font-size: 2.5em;"></span></button>';
      echo '<button class="iconButtons nextModal" type="button" value="' . $count . '"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="font-size: 2.5em;"></span></button><br/>';
      echo '<button class="iconButtons modal-card-lang" type="button" value="English"><span style="font-size: 1em;">EN</span></button>';
      echo '<button class="iconButtons modal-card-lang" type="button" value="French"><span style="font-size: 1em;">FR</span></button>';
      echo '<button class="iconButtons modal-card-lang" type="button" value="German"><span style="font-size: 1em;">DE</span></button>';
      echo '<button class="iconButtons modal-card-lang" type="button" value="Italian"><span style="font-size: 1em;">IT</span></button>';
      echo '<button class="iconButtons modal-card-lang" type="button" value="Portuguese"><span style="font-size: 1em;">PT</span></button>';
      echo '<button class="iconButtons modal-card-lang" type="button" value="Spanish"><span style="font-size: 1em;">ES</span></button>';
      echo '<button class="iconButtons modal-card-lang" type="button" value="Japanese"><span style="font-size: 1em;">JA</span></button>';
      echo '<button class="iconButtons modal-card-lang" type="button" value="Korean"><span style="font-size: 1em;">KO</span></button>';
      echo '<button class="iconButtons modal-card-lang" type="button" value="Chinese"><span style="font-size: 1em;">ZH</span></button>';
      echo "<input type='hidden' class='Data_ID' value='" . $row['Data_ID'] . "' />";
      echo "<input type='hidden' class='Card_Language_Val' value='" . $row['Card_Language'] . "' />";
      echo '</div>';

      echo '<input type="hidden" class="ebay_cardName" value="' . $row['EN_Name'] . '" ></input>';
      echo '<input type="hidden" class="ebay_cardNumber" value="' . $row['Set_Number'] . '" ></input>';
      echo '<input type="hidden" class="ebay_cardSet" value="' . $row['EN_Set_Name'] . '" ></input>';
      echo '<input type="hidden" class="ebay_cardRarity" value="' . $row['Rarity'] . '" ></input>';
      echo '<input type="hidden" class="ebay_cardEdition" value="' . $row['Edition'] . '" ></input>';
      echo "<div class='list modal-shop-view' style='display: none;'>";
      echo "</div>";






         detailCardInfo($row, $count, $temp_language);


      echo '</div></div></div></div>';

      }
   }

?>