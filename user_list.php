<?php
   session_start();
   header('Content-Type: text/html; charset=utf-8');
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<?php include_once("analyticstracking.php") ?>

<div >

<?php
   $link = mysqli_connect('localhost', 'vinceoa2_read', 'Luffy_234', 'vinceoa2_php1');
   if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
   }

   $query = "SELECT * FROM ayn_users LIMIT 67";
      if ($result = mysqli_query($link, $query)) {
         while ($row = mysqli_fetch_assoc($result)) {
         if($row['user_email'] != ""){
            if($row['user_avatar'] != ""){
               echo '<a href="http://' . $db_name . '.tgcdt.com/new_home.php?page=userpage&username=' . $row['username'] . '"><div class="littleUserBox"><img src="http://tgcdt.com/forum/download/file.php?avatar=' . $row['user_avatar'] . '" id="userImage" width="35px" height="35px" style="vertical-align:bottom; padding:0px; margin:0px;" />';
            }else{
               echo '<a href="http://' . $db_name . '.tgcdt.com/new_home.php?page=userpage&username=' . $row['username'] . '"><div class="littleUserBox"><img src="http://vincentleith.com/user_data/1_Bob/1.png" height="35px" width="35px" style="vertical-align:bottom;" />';
            }
            echo '<span style="display: inline-block; white-space: nowrap;">' . $row['username'] . "<br/>";
            $date = date("Y-m-j", $row['user_lastvisit']);
            echo $date;
            echo '</span></div></a>';
         }
      } //End while
   }//End if

   echo '</div>';
?>