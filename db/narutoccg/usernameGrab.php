<?php
   //$some_name = session_name("tgcdt");
   ini_set('session.cookie_domain', '.tgcdt.com' );
   session_start();
?>
<?php include_once("analyticstracking.php") ?>
<?php
   if($_SESSION['myusername'] != ''){
      if ($_SESSION['user_avatar'] != '') {
         echo '<img src="http://tgcdt.com/forum/download/file.php?avatar=' . $_SESSION['user_avatar'] . '" id="userImage" width="50px" height="50px" align="top" style="padding:0px; margin:0px;" />';
      } else {
         echo "<div id=\"userImageBox\"><img src=\"http://vincentleith.com/user_data/1_Bob/1.png\" id=\"userImage\" width=\"50px\" height=\"50px\" align=\"top\"/></div>";
      }
      echo '<span style="display: inline-block; font-family:Verdana;"><span style="display: inline-block; font-size:14px; font-weight:bold;">' . $_SESSION['myusername'] . '</span><br/><span style="display: inline-block; font-size:12px;">';
      if($_SESSION['myusername'] == "look234"){
         echo "Creator";
      }elseif($_SESSION['myusername'] == "pokemaster"){
         echo "Co-Creator";
      }else{
         echo "Beta User";
      }
      echo '</span></span>';
      echo '<form name="form1" method="post" action="Logout.php" style="display:inline;" >';
echo '<span style="position:relative; float:right;"><button class="noBorder" type="submit" name="Submit" value="Login" style="position:relative; top:3px; padding-left:3px;"><img id="loginButton" src="/images/login2.png" height="35px" onmouseover="changeImage()" onmouseout="changeImageBack()"/></button></span>';
      //echo '<br/><button class="noBorder2" type="submit" style="position:relative; float:right;">Logout</button>';
      echo '</form></div>';
   }else{
      echo '<form name="form1" method="POST" action="http://tgcdt.com/new_login.php?site=ygo" style="display:inline; font-family:Verdana; font-size:10px;" >';
      echo '<span style="position:relative; float:left;"><button class="noBorder" type="submit" name="Submit" value="Login" style="position:relative; top:4px; padding-left:3px;"><img id="loginButton" src="/images/login2.png" height="35px" onmouseover="changeImage()" onmouseout="changeImageBack()"/></button></span>';
      echo '<span style="position:relative; float:right;">Username: <input name="myusername" type="text" id="myusername" style="border:0px;"></span><br/>';
      echo '<span style="position:relative; float:right;">Password: <input name="mypassword" type="password" id="mypassword" style="border:0px;"></span><br/>';
      echo '</form>';
   }
?>