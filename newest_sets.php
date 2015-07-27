<?php
   session_start();
   header('Content-Type: text/html; charset=utf-8');
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<?php include_once("analyticstracking.php") ?>

<div >

<?php
   $con = mysql_connect("localhost",$db_username,$db_password);
   if (!$con){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8',$con); 
   }

   mysql_select_db("vinceoa2_" . $db_name, $con);

   $query = $new_sets_query;



   $result = mysql_query($query);
   if($result){
      while($row = mysql_fetch_array($result)){

         echo $row['Release_Date'] . ' <span class="label label-default"';

            switch($row['Set_Language']){
              case "English":
                 echo " style='background-color: #9e0016;' >ENG";
                 break;
              case "Japanese":
                 echo " style='background-color: #b1f100; color:black;' >JPN";
                 break;
              case "Korean":
                 echo " style='background-color: #f97083;' >KOR";
                 break;
              case "French":
                 echo " style='background-color: #a468d5;' >FRA";
                 break;
              case "Italian":
                 echo " style='background-color: #f30021;' >ITA";
                 break;
              case "German":
                 echo " style='background-color: #640cad;' >DEU";
                 break;
              case "Spanish":
                 echo " style='background-color: #739d00;' >SPA";
                 break;
              case "Russian":
                 echo " style='background-color: #c7f83e;' >RUS";
                 break;
              case "Chinese":
                 echo " style='background-color: #c10087;' >ZHO";
                 break;
              case "Dutch":
                 echo " style='background-color:LimeGreen;' >NLD";
                 break;
              case "Polish":
                 echo " style='background-color:Red;' >POL";
                 break;
              case "Portuguese":
                 echo " style='background-color:Sienna;' >POR";
                 break;
              case "Swedish":
                 echo " style='background-color:Tan;' >SWE";
                 break;
              default:
                 echo " style='background-color:SteelBlue;' >ENG";
                 break;
            }

         //echo '</span> <a id="urlSet_Name" href="http://' . $db_name . '.tgcdt.com/?page=collection&setName=' . $urlSet_Name . '">' . $row['EN_Set_Name'] . '</a><br/>';
         echo '</span> <span id="' . $row['Main_Set_ID'] . '" class="quick_search_set" >';
            switch($row['Set_Language']){
              case "English":
                 echo $row['EN_Set_Name'];
                 break;
              case "Japanese":
                 if($row['JA_Set_Name'] != ""){
                    echo $row['JA_Set_Name'];
                 }else{
                    echo $row['EN_Set_Name'];
                 }
                 break;
              case "Korean":
                 if($row['KO_Set_Name'] != ""){
                    echo $row['KO_Set_Name'];
                 }else{
                    echo $row['EN_Set_Name'];
                 }
                 break;
              case "French":
                 if($row['FR_Set_Name'] != ""){
                    echo $row['FR_Set_Name'];
                 }else{
                    echo $row['EN_Set_Name'];
                 }
                 break;
              case "Italian":
                 if($row['IT_Set_Name'] != ""){
                    echo $row['IT_Set_Name'];
                 }else{
                    echo $row['EN_Set_Name'];
                 }
                 break;
              case "German":
                 if($row['DE_Set_Name'] != ""){
                    echo $row['DE_Set_Name'];
                 }else{
                    echo $row['EN_Set_Name'];
                 }
                 break;
              case "Spanish":
                 if($row['ES_Set_Name'] != ""){
                    echo $row['ES_Set_Name'];
                 }else{
                    echo $row['EN_Set_Name'];
                 }
                 break;
              case "Russian":
                 echo $row['EN_Set_Name'];
                 break;
              case "Chinese":
                 if($row['ZH_Set_Name'] != ""){
                    echo $row['ZH_Set_Name'];
                 }else{
                    echo $row['EN_Set_Name'];
                 }
                 break;
              case "Dutch":
                 echo $row['EN_Set_Name'];
                 break;
              case "Polish":
                 echo $row['EN_Set_Name'];
                 break;
              case "Portuguese":
                 if($row['PT_Set_Name'] != ""){
                    echo $row['PT_Set_Name'];
                 }else{
                    echo $row['EN_Set_Name'];
                 }
                 break;
              case "Swedish":
                 echo $row['EN_Set_Name'];
                 break;
              default:
                 echo $row['EN_Set_Name'];
                 break;
            }
            echo '</span><br/>';
      } //End while
   }//End if

   echo '</div>';
?>