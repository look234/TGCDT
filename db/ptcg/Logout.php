<?php 
include_once "database_var.php"; 

$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
session_destroy();
header("location:http://" . $db_name . ".tgcdt.com/");
?>