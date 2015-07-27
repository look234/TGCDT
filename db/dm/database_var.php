<?php

$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();

$db_name = "dm";
$db_username = "vinceoa2_ygo";
$db_password = "ki_234_ki";
$meta_tags = "dm, duelmasters, Duel Masterd, checklist, database, card game, trading card, collectible card, TGCDT, The Giant Checklist Database Thing";
$page_title = "TGCDT Duel Masters";
$languages = array( 0 => "EN", 1 => "FR", 2 => "DE", 3 => "IT", 4 => "PT", 5 => "SP", 6 => "JP", 7 => "KR");
$languages_full = array( "EN" => "English", "FR" => "French", "DE" => "German", "IT" => "Italian", "PT" => "Portuguese", "SP" => "Spanish", "JP" => "Japanese", "KR" => "Korean");

/* Home Page Specific */

$copyright = "<strong>Duel Masters</strong>, the <strong>Duel Masters</strong> logo, character names, and their distinctive likenesses are TM and ©2004 Wizards of the Coast/Shogakukan/Mitsui-Kids. Wizards of the Coast and the Wizards of the Coast logo are trademarks of Wizards of the Coast, Inc. in the U.S.A. and other countries.";
$welcome_msg = '<span style="font-size:14px; font-weight:bold;">Welcome</span> to the Duel Masters Branch of TGCDT! We\'ll do our best to keep this database up-to-date with the latest cards. Hope you enjoy and let us know if there is anything we can do to help! ^_^ <b>helpdesk@ygo.tgcdt.com</b><br/>We are currently renovating the login/account creation system to integrate it with the new forum, for now account creation can be done through the forum. <a href="http://tgcdt.com/forum/ucp.php?mode=register" target=""><b>Click Here!</b></a>';

/* Newest Sets Specific */

$new_sets_query = "SELECT DISTINCT DM_SETS_" . $_SESSION['language'] . ".Set_Name, DM_SETS_" . $_SESSION['language'] . ".Release_Date FROM DM_SETS_" . $_SESSION['language'] . " ORDER BY DM_SETS_" . $_SESSION['language'] . ".Release_Date DESC LIMIT 10";

/* Search Buttons Specific */

$button_values = array( "button_1" => array( 0 => "Type", 1 => "Type", 2 => "SELECT DISTINCT Type FROM DM_CARDS ORDER BY Type ASC"),
                        "button_2" => array( 0 => "Race", 1 => "Race", 2 => "SELECT DISTINCT Race FROM DM_CARDS ORDER BY Race ASC"),
                        "button_3" => array( 0 => "Civilization", 1 => "Civilization", 2 => "SELECT DISTINCT Civilization FROM DM_CARDS ORDER BY Civilization ASC"),
                        "button_4" => array( 0 => "Cost", 1 => "Cost", 2 => "SELECT DISTINCT Cost FROM DM_CARDS ORDER BY Cost ASC"),
                        "button_5" => array( 0 => "Power", 1 => "Power", 2 => "SELECT DISTINCT Power FROM DM_CARDS ORDER BY Power ASC"),
                        "button_6" => array( 0 => "Mana_Number", 1 => "Mana Number", 2 => "SELECT DISTINCT Mana_Number FROM DM_CARDS ORDER BY Mana_Number ASC"),
                        "button_7" => array( 0 => "Artist", 1 => "Artist", 2 => "SELECT DISTINCT Artist FROM DM_SETS_" . $_SESSION['language'] . " ORDER BY Artist ASC"),
                        "button_8" => array( 0 => "Edition_1", 1 => "Edition", 2 => "SELECT DISTINCT Edition_1 FROM DM_SETS_" . $_SESSION['language'] . " ORDER BY Edition_1 ASC"));

$complex_button_values = array("button_c_1" => array( 0 => "Rarity", 1 => "Rarity", 2 => "1", 3 => "2", 4 => "", 5 => ("DM_SETS_" . $_SESSION['language'])));

/* Search Specific */

$sort_values = array( "Name" => " ORDER BY EN_Name, Set_Num",
                      "Set Number" => " ORDER BY Set_Num, Release_Date",
                      "Release Date" => " ORDER BY Release_Date, Set_Num",
                      "Type" => " ORDER BY Type, Race, EN_Name, Set_Num",
                      "Race" => " ORDER BY Race, Type, EN_Name, Set_Num",
                      "Cost" => " ORDER BY Cost, Race, EN_Name, Set_Num");

$master_query = "SELECT * FROM DM_SETS_" . $_SESSION['language'] ." 
INNER JOIN DM_CARDS ON DM_SETS_" . $_SESSION['language'] .".Card_ID = DM_CARDS.Card_ID 
INNER JOIN DM_TEXT_" . $_SESSION['language'] ." ON DM_SETS_" . $_SESSION['language'] .".Set_ID = DM_TEXT_" . $_SESSION['language'] .".Set_ID WHERE ( ";

$search_values = array( "button_1" => "Type",
                        "button_2" => "Race",
                        "button_3" => "Civilization",
                        "button_4" => "Cost",
                        "button_5" => "Power",
                        "button_6" => "Mana_Number",
                        "button_7" => "Artist",
                        "button_8" => array( 0 => "Edition_1", 1 => "Edition_2"),
                        "Card_Name" => array( 0 => "EN_Name", 1 => "Set_Num"),
                        "button_c_1" => array( 0 => "Rarity_1", 1 => "Rarity_2"));


?>