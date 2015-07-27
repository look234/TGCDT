<?php include_once("analyticstracking.php") ?>
<?php
   session_start();

   $con = mysql_connect("localhost","vinceoa2_read","Luffy_234");
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      //echo "Whee! Connected!" . "<br />";
   }
   mysql_select_db("vinceoa2_php1", $con);


$query1 = "SELECT * FROM ayn_users";

$result1 = mysql_query($query1);
if($result1){
while($row1 = mysql_fetch_array($result1)){
   if($row1['user_email'] != ""){
      for($i = 0; $i < count($languages); $i++){
         $checklistString = "/home8/vinceoa2/public_html/user_data/" . $row1['user_id'] . "/" . $db_name . "_checklist_" . $languages[$i] . ".txt";
         if (file_exists($checklistString)) {
            $str_data = file_get_contents($checklistString, true);
            $data = json_decode($str_data,true);
            foreach($data as $key1=>$value1){
               foreach($data[$key1] as $key2=>$value2){
                  foreach($data[$key1][$key2] as $key3=>$value3){
                     $totalcount[$languages[$i]] += $value3;
                  }
               }
            }
         }
      }
   }
}
}//End user while
   foreach($totalcount as $value){
      $grandTotal += $value;
   }

   echo '<span id="langTitle">English</span> ' . $totalcount['EN'] . '<br/>';
   echo '<span id="langTitle">French</span> ' . $totalcount['FR'] . '<br/>';
   echo '<span id="langTitle">German</span> ' . $totalcount['DE'] . '<br/>';
   echo '<span id="langTitle">Italian</span> ' . $totalcount['IT'] . '<br/>';
   echo '<span id="langTitle">Portuguese</span> ' . $totalcount['PT'] . '<br/>';
   echo '<span id="langTitle">Spanish</span> ' . $totalcount['SP'] . '<br/>';
   echo '<span id="langTitle">Japanese</span> ' . $totalcount['JP'] . '<br/>';
   echo '<span id="langTitle">Japanese-Asian</span> ' . $totalcount['JA'] . '<br/>';
   echo '<span id="langTitle">Chinese</span> ' . $totalcount['TC'] . '<br/>';
   echo '<span id="langTitle">Korean</span> ' . $totalcount['KR'] . '<br/>';
   echo '<span id="langTitle">Asian-English</span> ' . $totalcount['AE'] . '<br/>';
   echo '<span id="langTitle">Total Count</span> ' . $grandTotal;
?>