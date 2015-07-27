<?php
/*
session_start();
echo "<b>SESSION Variables</b><br/>";
$id = session_id();
echo $id . "<br/>";
echo $_SESSION['myusername'] . "<br/>";
echo $_SESSION['myid'] . "<br/>";
echo $_SESSION['mylist'] . "<br/>";
echo $_SESSION['language'] . "<br/>";
echo $_SESSION['onlyMine'] . "<br/>";

$link = mysqli_connect('localhost', 'vinceoa2_ygo', 'ki_234_ki', 'vinceoa2_ygo');

if (!$link) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

echo 'Success... ' . mysqli_get_host_info($link) . "\n";

mysqli_close($link);

$newpassword1 = "password";

            $salt = explode('$', "a26dadd67de531cb50e20e9059acb0a25dd36579$65d69ff3546743cdc26559c1449f119a36e9aff9");
            //$actualSalt = "65d69ff3546743cdc26559c1449f119a36e9aff9";
            $digest = sha1($newpassword1.$salt[1]).'$'.$salt[1];
echo $digest;
            if($digest == "9d481fd19ee23fe3a2099d6be196bb81ec92c6b2$65d69ff3546743cdc26559c1449f119a36e9aff9"){
               echo 'myusername';
            }
*/
?>
<?php

   $con = mysql_connect("localhost","vinceoa2_ygo","ki_234_ki");
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      //echo "Whee! Connected!" . "<br />";
      mysql_set_charset('utf8');
   }

   mysql_select_db("vinceoa2_ygo", $con);

   $query = "SELECT * FROM YGO_MONSTER_EN ORDER BY Number ASC";

   $result = mysql_query($query) or die(mysql_error()); 

$temp = "woot";
   while($row = mysql_fetch_array($result)){
      if($temp == $row['Number']){
         //$tempArray[$temp] = $row['DB_ID'];
      }else{
         echo $tempArray[$temp];
         $temp = $row['Number'];
         echo "<br/>" . $row['Name'] . "<br/>";
         $tempArray[$temp] = $row['DB_ID'];
      }
   }

   $query2 = "SELECT * FROM YGO_SET_EN ORDER BY Number ASC";
   //$query2 = "SELECT * FROM YGO_SET_JP ORDER BY Number ASC";

   $result2 = mysql_query($query2) or die(mysql_error()); 

$temp = "woot";
   while($row2 = mysql_fetch_array($result2)){
      if($temp == $row2['Number']){
      }else{
         $temp = $row2['Number'];
         //$newQuery = "UPDATE YGO_SET_EN SET DB_ID='" . $tempArray[$temp] . "' WHERE Number='" . $temp . "' AND Set_Name='Battle Pack 3: Monster League'";
         $newQuery = "UPDATE YGO_SET_JP SET DB_ID='" . $tempArray[$temp] . "' WHERE Number='" . $temp . "' AND Set_Name='ネクスト・チャレンジャーズ'";
         //mysql_query($newQuery);
      }
   }
?>