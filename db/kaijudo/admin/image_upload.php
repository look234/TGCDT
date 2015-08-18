<html>
 
<head>   
 
<!-- 1 -->
<link href="dropzone.css" type="text/css" rel="stylesheet" />
 
<!-- 2 -->
<script src="dropzone.js"></script>
 
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
?>
<!-- 3 -->
<form action="upload.php" class="dropzone"></form>
   
</body>
 
</html>