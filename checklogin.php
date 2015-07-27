<?php
   //$some_name = session_name("tgcdt");
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();

   //ini_set('session.cookie_domain', '.tgcdt.com' );
   //session_set_cookie_params(0, '/', '.tgcdt.com');
   //session_start();
   ob_start();

   $link = mysqli_connect('localhost', 'vinceoa2_read', 'Luffy_234', 'vinceoa2_ygo');
   if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
   }
   $cleansite = stripslashes($_GET['site']);

   $myusername = $_POST['myusername']; 
   $mypassword = $_POST['mypassword']; 
   $myusername = stripslashes($myusername);
   $mypassword = stripslashes($mypassword);
   $myusername = mysqli_real_escape_string($link, $myusername);
   $mypassword = mysqli_real_escape_string($link, $mypassword);

   $query1 ="SELECT * FROM USERS WHERE Name='$myusername' and Password='$mypassword'";
   $result1 = mysqli_prepare($link, $query1);
   mysqli_stmt_execute($result1);
   mysqli_stmt_store_result($result1);
   $count = mysqli_stmt_num_rows($result1);

   $query2 = "SELECT Password FROM USERS WHERE Name='$myusername'";
      if ($result2 = mysqli_query($link, $query2)) {
         while ($row2 = mysqli_fetch_assoc($result2)) {
            $salt = explode('$', $row2["Password"]);
            $digest = sha1($mypassword.$salt[1]).'$'.$salt[1];
            if($digest == $row2["Password"]){
               $query = "SELECT * FROM USERS WHERE Name='$myusername'";
               if ($result = mysqli_query($link, $query)) {
                  while ($row = mysqli_fetch_assoc($result)) {
                     $_SESSION['myid'] = $row["ID"];
                     $_SESSION['myusername'] = $row["Name"];
                     $_SESSION['myimage'] = $row["Image"];
                  }
                  mysqli_free_result($result);
               }

               $unixTimestamp = time();
               $currentTime = date("Y-m-d H:i:s", $unixTimestamp);

               $_SESSION['lastActive'] = $currentTime;
               $_SESSION['mylist'] = "checklist";
               $_SESSION['language'] = "EN";
               $_SESSION['onlyMine'] = "no";

$query = "UPDATE  `vinceoa2_ygo`.`USERS` SET  `Last_Active` =  '" . $_SESSION['lastActive'] . "' WHERE  `USERS`.`ID` =" . $_SESSION['myid'] . ";";
mysqli_query($link, $query);

               header("location:http://" . $cleansite . ".tgcdt.com/");

            }else{
               header("location:http://" . $cleansite . ".tgcdt.com/");
            }
         }
         mysqli_free_result($result);
      }
   ob_end_flush();
?>