<?php include_once("analyticstracking.php") ?>
<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
$languages = array( 0 => "EN", 1 => "FR", 2 => "DE", 3 => "IT", 4 => "PT", 5 => "SP", 6 => "JP", 7 => "KR", 8 => "AE", 8 => "TC");
      for($i = 0; $i < count($languages); $i++){
         $checklistString = "/home8/vinceoa2/public_html/user_data/" . $_SESSION['otherUserID'] . "/ygo_checklist_" . $languages[$i] . ".txt";

         if (file_exists($checklistString)) {

            $str_data = file_get_contents($checklistString, true);
            $data = json_decode($str_data,true);

            foreach($data as $key1=>$value1){
               foreach($data[$key1] as $key2=>$value2){
                  foreach($data[$key1][$key2] as $key3=>$value3){
                     $totalcount[$languages[$i]] += $value3;
                     if($value3 > 0){
                        $singlecount[$languages[$i]]++;
                     }
                  }
               }
            }
         }
      }

   if($totalcount['EN'] > 0){
      echo '<button name="userLang" class="lang" value="EN">English<br/>' . $singlecount['EN'] . ' (' . $totalcount['EN'] . ')</button>';
   }
   if($totalcount['FR'] > 0){
      echo '<button name="userLang" class="lang" value="FR">French<br/>' . $singlecount['FR'] . ' (' . $totalcount['FR'] . ')</button>';
   }
   if($totalcount['DE'] > 0){
      echo '<button name="userLang" class="lang" value="DE">German<br/>' . $singlecount['DE'] . ' (' . $totalcount['DE'] . ')</button>';
   }
   if($totalcount['IT'] > 0){
      echo '<button name="userLang" class="lang" value="IT">Italian<br/>' . $singlecount['IT'] . ' (' . $totalcount['IT'] . ')</button>';
   }
   if($totalcount['PT'] > 0){
      echo '<button name="userLang" class="lang" value="PT">Portuguese<br/>' . $singlecount['PT'] . ' (' . $totalcount['PT'] . ')</button>';
   }
   if($totalcount['SP'] > 0){
      echo '<button name="userLang" class="lang" value="SP">Spanish<br/>' . $singlecount['SP'] . ' (' . $totalcount['SP'] . ')</button>';
   }
   if($totalcount['JP'] > 0){
      echo '<button name="userLang" class="lang" value="JP">Japanese<br/>' . $singlecount['JP'] . ' (' . $totalcount['JP'] . ')</button>';
   }
   if($totalcount['TC'] > 0){
      echo '<button name="userLang" class="lang" value="TC">Chinese<br/>' . $singlecount['TC'] . ' (' . $totalcount['TC'] . ')</button>';
   }
   if($totalcount['KR'] > 0){
      echo '<button name="userLang" class="lang" value="KR">Korean<br/>' . $singlecount['KR'] . ' (' . $totalcount['KR'] . ')</button>';
   }   
   if($totalcount['AE'] > 0){
      echo '<button name="userLang" class="lang" value="AE">Asian-English<br/>' . $singlecount['AE'] . ' (' . $totalcount['AE'] . ')</button>';
   }

?>