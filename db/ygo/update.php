<?php include_once("analyticstracking.php") ?>
<?php
   $some_name = session_name("some_name");
   session_set_cookie_params(0, '/', '.tgcdt.com');
   session_start();


   if(($_SESSION['myid'] != "") && (is_numeric($_SESSION['myid']))){
   $checklistString = "/home8/vinceoa2/public_html/user_data/" . $_SESSION['myid'] . "/ptcg_" . $_SESSION['mylist'] . ".txt";

   $handle = fopen($checklistString, 'c+');
   $result = fgets($handle);   
   $data = json_decode($result,true);
   fclose($handle);

   if(is_numeric($_POST['value'])){
      $data[$_POST['id']] = $_POST['value'];

      $data2 = json_encode($data);
      $fp = fopen($checklistString, 'w') 
         or exit("unable to open file");

      fwrite($fp, $data2);
      fclose($fp);
   }
   }

/*
   $path = realpath("/home8/vinceoa2/public_html/user_data/" . $_SESSION['myid'] . "/ygo_recently_added.xml");
   $f = $path;
   $arr = file($path);

   $unixTimestamp = time();
   $currentTime = date("Y-m-d H:i:s", $unixTimestamp);
   $cleanCardName = stripslashes($_POST['cardName']);
   $cleanCardName = str_replace("&", "&amp;", $cleanCardName);

   $tempArray = "   <card>\r\n      <name>" . $cleanCardName . "</name>\r\n      <number>" . $temp[0] . "</number>\r\n      <edition>" . $temp[1] . "</edition>\r\n      <rarity>" . $temp[2] . "</rarity>\r\n      <activity>" . $_POST['activity'] . "</activity>\r\n      <time>" . $currentTime . "</time>\r\n   </card>\r\n";

   array_splice($arr,2,0, array($tempArray));
   $arr = array_values($arr);
   file_put_contents($path,implode($arr));
*/

   echo $success;

?>