<?php

session_start();

print_r($_COOKIE);

echo '<br/>';

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

$ses_id = session_id();

echo $ses_id . '<br/>';

echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
?>