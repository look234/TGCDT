<?php 
session_start();
session_destroy();
header("location:http://" . $_GET['db'] . ".tgcdt.com/");
?>