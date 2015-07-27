<?php

$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();

include_once "../../bwahaha.php";

$db_name = "mtg";
$meta_tags = "ygo, yugioh, Yu-Gi-Oh, Yu-Gi-Oh!, YuGiOh!, checklist, database, card game, trading card, collectible card, TGCDT, The Giant Checklist Database Thing";
$page_title = "TGCDT Yu-Gi-Oh!";
$languages = array( 0 => "EN", 1 => "FR", 2 => "DE", 3 => "IT", 4 => "PT", 5 => "SP", 6 => "JP", 6 => "JA", 7 => "KR", 8 => "AE", 8 => "TC");
$languages_full = array( "EN" => "English", "FR" => "French", "DE" => "German", "IT" => "Italian", "PT" => "Portuguese", "SP" => "Spanish", "JP" => "Japanese", "KR" => "Korean", "CHS" => "Chinese Simplified", "CHT" => "Chinese Traditional", "RU" => "Russian");

/* Home Page Specific */

$copyright = "Yu-Gi-Oh! and all respective names are the &trade; & &copy; of Kazuki Takahashi and Konami Digital Entertainment 1996-2013";
$welcome_msg = '<span style="font-size:14px; font-weight:bold;">Welcome</span> to the Yu-Gi-Oh! Branch of TGCDT! We\'ll do our best to keep this database up-to-date with the latest cards. Hope you enjoy and let us know if there is anything we can do to help! ^_^ <b>helpdesk@ygo.tgcdt.com</b><br/>We are currently renovating the login/account creation system to integrate it with the new forum, for now account creation can be done through the forum. <a href="http://tgcdt.com/forum/ucp.php?mode=register" target=""><b>Click Here!</b></a>';

/* Newest Sets Specific */

$new_sets_query = "SELECT DISTINCT MTG_SETS_" . $_SESSION['language'] . ".Set_Name, MTG_SETS_" . $_SESSION['language'] . ".Release_Date FROM MTG_SETS_" . $_SESSION['language'] . " ORDER BY MTG_SETS_" . $_SESSION['language'] . ".Release_Date DESC LIMIT 10";

/* Search Buttons Specific */

$button_values = array( "button_1" => array( 0 => "Type_1", 1 => "Type", 2 => "SELECT DISTINCT Type_1 FROM MTG_CARDS ORDER BY Type_1 ASC"),
                        "button_2" => array( 0 => "Type_2", 1 => "Sub-Type", 2 => "SELECT DISTINCT Type_2 FROM MTG_CARDS ORDER BY Type_2 ASC"),
                        "button_3" => array( 0 => "Mana_Cost_1", 1 => "Mana Cost", 2 => "SELECT DISTINCT Mana_Cost_1 FROM MTG_CARDS ORDER BY Mana_Cost_1 ASC"),
                        "button_4" => array( 0 => "Edition_1", 1 => "Edition", 2 => "SELECT DISTINCT Edition_1 FROM MTG_SETS_" . $_SESSION['language'] . " ORDER BY Edition_1 ASC"));

$complex_button_values = array("button_c_1" => array( 0 => "Rarity", 1 => "Rarity", 2 => "1", 3 => "4", 4 => "", 5 => ("MTG_SETS_" . $_SESSION['language'])),"button_c_2" => array( 0 => "Color", 1 => "Color", 2 => "1", 3 => "2", 4 => "", 5 => ("MTG_CARDS")));

/* Search Specific */

$sort_values = array( "Name" => " ORDER BY EN_Name, Set_Num",
                      "Set Number" => " ORDER BY Set_Num, Release_Date",
                      "Release Date" => " ORDER BY Release_Date, Set_Num",
                      "Type" => " ORDER BY Type_1, Type_2, Color_1, Color_2, EN_Name, Set_Num",
                      "Color" => " ORDER BY Color_1, Color_2, EN_Name, Set_Num",
                      "Mana Cost" => " ORDER BY Mana_Cost_1, Mana_Cost_2, Color_1, Color_2, EN_Name, Set_Num");

$master_query = "SELECT * FROM MTG_SETS_" . $_SESSION['language'] ." INNER JOIN MTG_CARDS ON MTG_SETS_" . $_SESSION['language'] .".DB_ID = MTG_CARDS.DB_ID WHERE ( ";

$search_values = array( "button_1" => "Type_1",
                        "button_2" => "Type_2",
                        "button_3" => "Mana_Cost_1",
                        "button_4" => array( 0 => "Edition_1", 1 => "Edition_2"),
                        "Card_Name" => array( 0 => "EN_Name", 1 => "Set_Num"),
                        "button_c_1" => array( 0 => "Rarity_1", 1 => "Rarity_2", 2 => "Rarity_3", 3 => "Rarity_4"),
                        "button_c_2" => array( 0 => "Color_1", 1 => "Color_2"));


?>