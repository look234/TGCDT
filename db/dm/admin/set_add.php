<!-- xml version="1.0" encoding="UTF-8" --> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$(document).ready(function(){

   $("button.search").click(function() {
      var id = $(this).attr( "id" );
      var search = $("input#" + id).val();

      //alert(search);
      $("div#" + id).load("pokemon_list.php" , {pokemon:search});
   });
   $("input.search").click(function() {
      $("div.search").empty();
   });

});

</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php include_once("analyticstracking.php") ?>
<style>
#hidden {display:none;}
</style>

</head>
<body>

<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();

switch($_SESSION['language']){
   case "EN":
      echo '<h2>You are adding cards to the <i>English</i> Database!</h2>';
      break;
   case "FR":
      echo '<h2>You are adding cards to the <i>French</i> Database!</h2>';
      break;
   case "DE":
      echo '<h2>You are adding cards to the <i>German</i> Database!</h2>';
      break;
   case "IT":
      echo '<h2>You are adding cards to the <i>Italian</i> Database!</h2>';
      break;
   case "SP":
      echo '<h2>You are adding cards to the <i>Spanish</i> Database!</h2>';
      break;
   case "PT":
      echo '<h2>You are adding cards to the <i>Portuguese</i> Database!</h2>';
      break;
   case "JP":
      echo '<h2>You are adding cards to the <i>Japanese</i> Database!</h2>';
      break;
   case "KR":
      echo '<h2>You are adding cards to the <i>Korean</i> Database!</h2>';
      break;
   case "CH":
      echo '<h2>You are adding cards to the <i>Chinese</i> Database!</h2>';
      break;
   default:
      echo '<h2>If you see this contact Vincent!</h2>';
      break;
}


if (!isset($_POST['good'])) {
$con = mysql_connect("localhost","vinceoa2_pokemon","Luffy_234");
if (!$con){
  die('Could not connect: ' . mysql_error());
}else{
}
mysql_select_db("vinceoa2_pokemon", $con);

$query = "SELECT * FROM MTG_CARDS_EN";

   $result = mysql_query($query);

   while($row = mysql_fetch_array($result)){
      if($row['Number'] == '0'){
      }else{
         $lastP = $row['Name'];
      }
   }

echo '<form method="post" action="">';

echo ' Start Num: <input type="text" name="startnum" size="1"/>';
echo ' Stop Num: <input type="text" name="stopnum" size="1"/>';
echo ' Set Size: <input type="text" name="size" size="5"/>';
echo ' Set Abbr: <input type="text" name="abbr" size="1"/>';
echo ' Set Num Prefix: <input type="text" name="setnump" size="1"/>';
echo ' Set Num Suffix: <input type="text" name="setnums" size="1"/><br/>';
echo ' Set Name: <input type="text" name="name" size="20"/>';
echo ' Set Other Name: <input type="text" name="oname" size="20"/>';
echo ' Set Release Date: <input type="text" name="date" size="10"/>';
echo ' Set Type: <input type="text" name="type" size="10"/>';

echo '<input type="submit" name="good" value="go" /><br />';

echo '</form>';
}else{
echo '<span id="hidden">';
echo '<form method="post" action="">';
echo ' Start Num: <input type="text" name="startnum" size="1"/>';
echo ' Stop Num: <input type="text" name="stopnum" size="1"/>';
echo ' Set Size: <input type="text" name="size" size="5"/>';
echo ' Set Abbr: <input type="text" name="abbr" size="1"/>';
echo ' Set Num Prefix: <input type="text" name="setnump" size="1"/>';
echo ' Set Num Suffix: <input type="text" name="setnums" size="1"/>';
echo ' Set Name: <input type="text" name="name" size="20"/>';
echo ' Set Other Name: <input type="text" name="oname" size="20"/>';
echo ' Set Release Date: <input type="text" name="date" size="10"/>';
echo ' Set Type: <input type="text" name="type" size="10"/>';
echo '<input type="submit" name="good" value="go" /><br />';
echo '</form>';
echo '</span>';
}

if (isset($_POST['good'])) {
echo '<form action="set_add_submit.php" method="post">';
            $temp = $_POST['stopnum'];
            for($i = $_POST['startnum']; $i <= $temp; $i++){
   echo '(' . $_POST['abbr'] . '-';              
   if($_POST['setnump'] != ""){
      echo $_POST['setnump'];
   }
   echo $i;
   if($_POST['setnums'] != ""){
      echo $_POST['setnums'];
   }
   echo ') ';


                  //echo '(' . $_POST['abbr'] . '-' . $i . ') ';
                  if($_POST['setnump'] != ""){
                     echo $_POST['setnump'];
                  }
                  echo $i . $_POST['size'];
                  echo '<input type="hidden" name="startnum" value="' . $_POST['startnum'] . '">';
                  echo '<input type="hidden" name="stopnum" value="' . $_POST['stopnum'] . '">';
                  echo '<input type="hidden" name="setnump" value="' . $_POST['setnump'] . '">';
                  echo '<input type="hidden" name="setnums" value="' . $_POST['setnums'] . '">';
                  echo '<input type="hidden" name="size" value="' . $_POST['size'] . '">';
                  echo '<input type="hidden" name="abbr" value="' . $_POST['abbr'] . '">';
                  echo '<input type="hidden" name="name" value="' . $_POST['name'] . '">';
                  echo '<input type="hidden" name="oname" value="' . $_POST['oname'] . '">';
                  echo '<input type="hidden" name="date" value="' . $_POST['date'] . '">';
                  echo '<input type="hidden" name="type" value="' . $_POST['type'] . '">';

                  echo ' Rarity 1: <input type="text" name="rarity_1_' . $i . '" size="10" /> ';
                  echo 'Rarity 2: <input type="text" name="rarity_2_' . $i . '" size="10" /> ';
                  echo 'Rarity 3: <input type="text" name="rarity_3_' . $i . '" size="10" /> ';
                  echo 'Rarity 4: <input type="text" name="rarity_4_' . $i . '" size="10" /> ';
                  echo 'Edition 1: <input type="text" name="edition_1_' . $i . '" size="10" /> ';
                  echo 'Edition 2: <input type="text" name="edition_2_' . $i . '" size="10" /> ';
                  echo 'Artist: <input type="text" name="artist_' . $i . '" size="10" /> ';
                  echo 'DB ID: <input type="text" name="id_' . $i . '" size="5" /> <br/>';

                  echo 'Search Card: <input type="text" class="search" id="search_' . $i . '" size="20" /> ';
                  echo '<button type="button" class="search" id="search_' . $i . '">Search</button><br/><div class="search" id="search_' . $i . '"></div>';
                  echo "<br />";
            }
echo '<input type="submit"/><br />';

echo '</form>';

	}
?>

</body>
</html>