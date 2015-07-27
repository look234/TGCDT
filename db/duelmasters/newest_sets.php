<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
   header('Content-Type: text/html; charset=utf-8');
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<?php include_once("analyticstracking.php") ?>

<div >

<?php
   $con = mysql_connect("localhost","vinceoa2_read","Luffy_234");
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8',$con); 
   }
   mysql_select_db("vinceoa2_dm", $con);

   $query = "SELECT DISTINCT DM_SET_" . $_SESSION['language'] . ".Set_Name, DM_SET_" . $_SESSION['language'] . ".Release FROM DM_SET_" . $_SESSION['language'] . " ORDER BY DM_SET_" . $_SESSION['language'] . ".Release_Date DESC LIMIT 10";

   $result = mysql_query($query);
   if($result){
      while($row = mysql_fetch_array($result)){
         $urlSet_Name = str_replace(" ", "+", $row['Set_Name']);
         echo $row['Release'] . ' <a id="urlSet_Name" href="http://duelmasters.tgcdt.com/new_home.php?page=collection&setName=' . $urlSet_Name . '">' . $row['Set_Name'] . '</a><br/>';
      } //End while
   }//End if

   echo '</div>';
?>