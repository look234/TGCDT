<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();


   //ini_set('session.cookie_domain', '.tgcdt.com' );
   //session_start();
   ob_start();
   include_once 'forum/includes/functions.php';
   include_once 'forum/includes/functions_display.php';

   $link = mysqli_connect('localhost', 'vinceoa2_read', 'Luffy_234', 'vinceoa2_php1');
   if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
   }

   $cleansite = stripslashes($_GET['site']);
   $username = stripslashes(strip_tags(strtolower($_POST['myusername'])));
   $password = stripslashes(strip_tags($_POST['mypassword']));
   $username = mysqli_real_escape_string($link, $username);
   $password = mysqli_real_escape_string($link, $password);

   if(!$username || !$password){
      echo 'Please enter username and password!<br/>';
   }else{
      $query1 ="SELECT * FROM ayn_users WHERE username_clean='$username'";
      $result1 = mysqli_prepare($link, $query1);
      mysqli_stmt_execute($result1);
      mysqli_stmt_store_result($result1);
      $count = mysqli_stmt_num_rows($result1);
      if($count < 1){
         echo "User not found!";
      }else{
         if($result2 = mysqli_query($link, $query1)){
            while($find_row = mysqli_fetch_assoc($result2)){
               $password_hash = $find_row['user_password'];
               $check = phpbb_check_hash($password, $password_hash);
               if($check == FALSE){
                  echo "Incorrect password!";
               }elseif($check == TRUE){
                  $_SESSION['myid'] = $find_row['user_id'];
                  $_SESSION['myusername'] = $find_row['username'];
                  $_SESSION['user_avatar'] = $find_row['user_avatar'];
                  $_SESSION['mylist'] = "checklist";
                  $_SESSION['language'] = "EN";
                  $_SESSION['onlyMine'] = "yes";
                  $query2 = "UPDATE `vinceoa2_php1`.`ayn_users` SET `user_lastvisit` = '" . $_SERVER['REQUEST_TIME'] . "' WHERE `ayn_users`.`user_id` = " . $_SESSION['myid'] . ";";
                  mysqli_query($link, $query2);

                  header("location:http://" . $cleansite . ".tgcdt.com/");

               }
            }
         }
      }
   }
   mysqli_free_result($result);
   ob_end_flush();
?>