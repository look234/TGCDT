<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="REFRESH" content="3;url=http://ygo.tgcdt.com/">
</head>
<body>
   <div id="wrap">
      <?php
         mysql_connect("localhost","vinceoa2_ygo","ki_234_ki") or die(mysql_error()); // Connect to database server(localhost) with username and password.
         mysql_select_db("vinceoa2_ygo") or die(mysql_error()); // Select registration database.
			
         if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
            $email = mysql_escape_string($_GET['email']); // Set email variable
            $hash = mysql_escape_string($_GET['hash']); // Set hash variable
            $search = mysql_query("SELECT Email, Hash, Confirmed FROM USERS WHERE Email='".$email."' AND Hash='".$hash."' AND Confirmed='0'") or die(mysql_error()); 
            $match  = mysql_num_rows($search);
				
            if($match > 0){
               mysql_query("UPDATE USERS SET Confirmed='1' WHERE Email='".$email."' AND Hash='".$hash."' AND Confirmed='0'") or die(mysql_error());
               echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
               $languages = array("EN", "FR", "DE", "IT", "PT", "SP", "JP", "AE", "KR");
               $languages2 = array("EN", "FR", "DE", "IT", "PT", "SP", "JP", "CH", "KR");

               $query = "SELECT ID FROM USERS WHERE Email='" . $_GET['email'] . "'";
               $results = mysql_query($query) or die(mysql_error());
               $userID = mysql_fetch_array($results);

               $newdir = '/home8/vinceoa2/public_html/ygo/user_data/' . $userID['ID'];
               mkdir($newdir);

               chdir($newdir);
               foreach($languages as $value){
                  $newFile = "ygo_checklist_" . $value . ".txt";
                  $file = fopen($newFile,"w");
                  fwrite($file, '{"LOB-000":{"1st":{"Secret Rare":"0"}}}');
                  fclose($file);
               }
               foreach($languages as $value){
                  $newFile = "ygo_tradelist_" . $value . ".txt";
                  $file = fopen($newFile,"w");
                  fwrite($file, '{"LOB-000":{"1st":{"Secret Rare":"0"}}}');
                  fclose($file);
               }
               foreach($languages as $value){
                  $newFile = "ygo_wishlist_" . $value . ".txt";
                  $file = fopen($newFile,"w");
                  fwrite($file, '{"LOB-000":{"1st":{"Secret Rare":"0"}}}');
                  fclose($file);
               }

               $newdir2 = '/home8/vinceoa2/public_html/ptcg/user_data/' . $userID['ID'];
               mkdir($newdir2);

               chdir($newdir2);
               foreach($languages2 as $value){
                  $newFile = "ptcg_checklist_" . $value . ".txt";
                  $file = fopen($newFile,"w");
                  fwrite($file, '{"M1-1":{"1st":{"Rare Holo":"0"}}}');
                  fclose($file);
               }
               foreach($languages2 as $value){
                  $newFile = "ptcg_tradelist_" . $value . ".txt";
                  $file = fopen($newFile,"w");
                  fwrite($file, '{"M1-1":{"1st":{"Rare Holo":"0"}}}');
                  fclose($file);
               }
               foreach($languages2 as $value){
                  $newFile = "ptcg_wishlist_" . $value . ".txt";
                  $file = fopen($newFile,"w");
                  fwrite($file, '{"M1-1":{"1st":{"Rare Holo":"0"}}}');
                  fclose($file);
               }
            }else{
               echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
            }
         }else{
            echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
         }
      ?>
<br/>You should be redirected in a few seconds, if not click <a href="http://ygo.tgcdt.com/">HERE</a>.<br/>
<img src="happy-kitten.jpg" height="500px"/>
   </div>
</body>
</html>