<script src="https://platform.twitter.com/widgets.js" type="text/javascript"></script>
<?php include_once("analyticstracking.php") ?>
<style>
div.no-padding {padding: 5px; background-color: transparent;}
</style>
<?php
   echo '<div class="row" style="padding-left: 20px; padding-right: 20px; position: relative; top: 60px;">';
   echo '<div id="main2">';
   //echo '<div id="leftColumn">';

   echo '<div class="no-padding col-md-4 col-sm-6 col-xs-12" id="HomeBox3_Border">';
   echo '<div id="HomeBox3_Inside" style="padding:5px;"><strong>Please excuse the mess, this home page is being redesigned to be more mobile friendly. Which has caused the desktop view to be destroyed. -.-\' This should be fixed some time tomorrow if everything moves smoothly. Thank you for your patience!</strong><br/><br/>' . $welcome_msg;
   echo '</div></div>';

   //echo '<div id="HomeBox8_Border"><div id="HomeBox8_Inside" style="padding:5px;"><span style="font-size:14px; font-weight:bold;">Quick Search</span><br/>';
   //echo '<form method="GET" action="http://' . $db_name . '.tgcdt.com/" style="display:inline;">';
   //echo '<label for="autocomplete"></label>';
   //echo '<input type="text" id="autocomplete" name="Card_Name" size="24">';
   //echo '<input type="hidden" name="page" value="collection" />';
   //echo '<button class="noBorder" type="submit" style="position:relative; top:5px; right:5px;"><img src="/images/search.png" height="20px" width="20px" />';
   //echo '</button></form>';
   //echo '</div></div>';

   echo '<div  class="no-padding col-md-4 col-sm-6 col-xs-12"><div style="" id="HomeBox5_Border"><div id="HomeBox5_Inside" style="padding:5px;">';
   include 'random_card.php';
   echo '</div></div></div>';

   echo '<div  class="no-padding col-md-4 col-sm-6 col-xs-12" id="HomeBox1_Border"><div id="HomeBox1_Inside" style="padding:5px;"><span style="font-size:14px; font-weight:bold;">Total Collection Count</span><br/>';
   include '/home8/vinceoa2/public_html/tgcdt/collectionGrabAll.php';
   echo '</div></div>';

   echo '<div  class="no-padding col-md-4 col-sm-6 col-xs-12" id="HomeBox7_Border"><div id="HomeBox7_Inside" style="padding:5px;">';
   echo $copyright;
   echo '</div></div>';

   //echo '</div>';

   //echo '<div id="rightColumn">';

   echo '<div  class="no-padding col-md-4 col-sm-6 col-xs-12" id="HomeBox4_Border"><div id="HomeBox4_Inside" style="padding:5px;"><span style="font-size:14px; font-weight:bold;">Newest Sets</span>';
   include '/home8/vinceoa2/public_html/tgcdt/newest_sets.php';
   echo '</div>';

   echo '</div><div  class="no-padding col-md-4 col-sm-6 col-xs-12" id="HomeBox2_Border">';
?>

<a class="twitter-timeline" height="350" href="https://twitter.com/TGCDThing"  data-widget-id="346763162625912832">Tweets by @TGCDThing</a>

<?php
   echo '</div>';

   echo '<div  class="no-padding col-md-4 col-sm-6 col-xs-12" id="HomeBox6_Border"><div id="HomeBox6_Inside" style="padding:5px;"><span style="font-size:14px; font-weight:bold;">Users</span> (Will add more versions of this, i.e. currenlty logged on, newest members, etc.)';
   include '/home8/vinceoa2/public_html/tgcdt/user_list.php';
   echo '</div>';

   //echo '</div></div>';
   echo '</div></div>';
?>