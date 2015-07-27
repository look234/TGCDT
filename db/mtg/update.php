<?php include_once("analyticstracking.php") ?>
<?php
   include_once "database_var.php";

   if(($_SESSION['myid'] != "") && (is_numeric($_SESSION['myid']))){
      $checklistString = "/home8/vinceoa2/public_html/user_data/" . $_SESSION['myid'] . "/" . $db_name . "_" . $_SESSION['mylist'] . ".txt";

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
?>