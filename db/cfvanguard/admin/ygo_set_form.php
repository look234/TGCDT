<!-- xml version="1.0" encoding="UTF-8" --> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>


<form method="post" action="">

<?php
header('Content-Type: text/html; charset=utf-8');

echo '<form method="post" action="">';

echo 'Set Abbreviation: <input type="text" name="set_abb" />';
echo 'Set Name: <input type="text" name="set_name" />';
echo 'Amount in set: <input type="text" name="amount" />';
echo 'Starts with 000: <input type="checkbox" name="000" />';
echo 'Edition 1 in set: <input type="text" name="edition_1" />';
echo 'Edition 2 in set: <input type="text" name="edition_2" />';
echo 'Set Type: <input type="text" name="set_type" />';
echo 'Release Date: <input type="text" name="release_date" />';

echo '<input type="submit" name="good" value="go" /><br />';

echo '</form>';

	if (isset($_POST['good'])) {
echo '<form action="ygo_set_add.php" method="post">';
            $temp = $_POST['amount'];
            if(isset($_POST['000'])){
               $i = 0;
               $woot = 'shit';
            }else{
               $i = 1;
            }
            for($i; $i <= $temp; $i++){
                  //echo 'Set Abbreviation: <input type="text" name="set_abb" />';
                  if($_POST['set_abb'] == ''){

                  }elseif($i >= 10){
                     $set_num =  $_POST['set_abb'] . $i;
                     echo $set_num;
                  }else{
                     $set_num =  $_POST['set_abb'] . "0" . $i;
                     echo $set_num;
                  }
                  echo '<input type="hidden" name="set_num_' . $i . '" value="' . $set_num . '">';
                  echo '<input type="hidden" name="set_name" value="' . $_POST['set_name'] . '">';
                  echo '<input type="hidden" name="edition_1" value="' . $_POST['edition_1'] . '">';
                  echo '<input type="hidden" name="edition_2" value="' . $_POST['edition_2'] . '">';
                  echo '<input type="hidden" name="set_type" value="' . $_POST['set_type'] . '">';
                  echo '<input type="hidden" name="release_date" value="' . $_POST['release_date'] . '">';

                  echo '<input type="hidden" name="woot" value="' . $woot . '">';
                  echo '<input type="hidden" name="amount" value="' . $_POST['amount'] . '">';

                  echo 'Rarity 1: <input type="text" name="rarity_1_' . $i . '" /> ';
                  echo 'Rarity 2: <input type="text" name="rarity_2_' . $i . '" /> ';
                  echo 'Rarity 3: <input type="text" name="rarity_3_' . $i . '" /> ';
                  echo 'Number: <input type="text" name="number_' . $i . '" />';
                  echo "<br />";
            }
echo '<input type="submit"/><br />';

echo '</form>';

	}
?>

</body>
</html>