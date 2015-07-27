<!-- xml version="1.0" encoding="UTF-8" --> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php include_once("analyticstracking.php") ?>
</head>
<body>


<form method="post" action="">

<?php

if (!isset($_POST['good'])) {

echo 'How many do you need to add?';

echo '<form method="post" action="">';

echo ' Num of Cards: <input type="text" name="num" size="1"/>';

echo '<input type="submit" name="good" value="go" /><br />';

echo '</form>';
}else{
echo '<span id="hidden">';
echo '<form method="post" action="">';

echo 'Num of Cards: <input type="text" name="num" />';

echo '<input type="submit" name="good" value="go" /><br />';

echo '</form>';
echo '</span>';
}

if (isset($_POST['good'])) {
echo '<form action="pokemon_add_submit.php" method="post">';
            $temp = $_POST['num'];
            for($i = 1; $i <= $temp; $i++){
                  echo 'Card.';
                  if($i < 10){
                     echo '0' . $i . ': ';
                  }else{
                     echo $i . ': ';
                  }
                  echo '<input type="hidden" name="num" value="' . $_POST['num'] . '">';

                  echo 'Poke Num: <input type="text" name="poke_num_' . $i . '" size="1" /> ';
                  echo 'Name: <input type="text" name="name_' . $i . '" size="8" /> ';
                  echo 'Prefix: <input type="text" name="prefix_' . $i . '" size="8" /> ';
                  echo 'Suffix: <input type="text" name="suffix_' . $i . '" size="7" /> ';
                  echo 'HP: <input type="text" name="hp_' . $i . '" size="2" /> ';
                  echo 'Stage: <input type="text" name="stage_' . $i . '" size="2" />';
                  echo 'Type 1: <input type="text" name="type_1_' . $i . '" size="3" />';
                  echo 'Type 2: <input type="text" name="type_2_' . $i . '" size="3" /><br/>';
                  echo 'Weak 1: <input type="text" name="weakness_1_' . $i . '" size="5" />';
                  echo 'Weak 2: <input type="text" name="weakness_2_' . $i . '" size="5" />';
                  echo 'Weak X: <input type="text" name="weakness_X_' . $i . '" size="5" />';
                  echo 'Res 1: <input type="text" name="resistance_1_' . $i . '" size="5" />';
                  echo 'Res 2: <input type="text" name="resistance_2_' . $i . '" size="5" />';
                  echo 'Res X: <input type="text" name="resistance_X_' . $i . '" size="5" />';
                  echo 'Retreat: <input type="text" name="retreat_' . $i . '" size="2" />';
                  echo "<br />";
            }
echo '<input type="submit"/><br />';

echo '</form>';

	}
?>

</body>
</html>