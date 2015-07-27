<script>
   function userIn(obj){
      obj.style.backgroundColor='#00afe5';
      obj.style.cursor='pointer';
   }
   function userOut(obj){
      obj.style.backgroundColor='#02d4ee';
      obj.style.cursor='auto';
   }
</script>
<style>

div#HomeBox3_Border {width:250px; min-height:50px; padding:0px; position:fixed; top:55px; float: left; background-color:#02d4ee;
   border-top-right-radius:10px;
   border-top-left-radius:10px;
   border-bottom-right-radius:10px;
   border-bottom-left-radius:10px;
   text-align:left;
   font-family:Verdana;
}

div#HomeBox3_Inside { padding:0px; position:relative; background-color:#02d4ee;
   border-style:solid;
   border-color:transparent;
   border-width:4px;
   border-top-right-radius:10px;
   border-top-left-radius:10px;
   border-bottom-right-radius:10px;
   border-bottom-left-radius:10px;
   text-align:left;
   font-family:Verdana;
   font-size:11px;
   margin: 0 auto; 
}

div#HomeBox4_Border {width:640px; min-height:50px; position:relative; float: left; background-color:#02d4ee;
   border-top-right-radius:10px;
   border-top-left-radius:10px;
   border-bottom-right-radius:10px;
   border-bottom-left-radius:10px;
   text-align:left;
   font-family:Verdana;
}

div#HomeBox4_Inside { position:relative; background-color:#02d4ee;
   border-style:solid;
   border-color:transparent;
   border-width:4px;
   border-top-right-radius:10px;
   border-top-left-radius:10px;
   border-bottom-right-radius:10px;
   border-bottom-left-radius:10px;
   text-align:left;
   font-family:Verdana;
   font-size:11px;
   margin: 0 auto; 
}

a:hover {font-weight:bold;}

div#leftColumn {width:250px; min-height:50px; position:relative; float: left; top:55px;}
div#rightColumn {width:640px; min-height:50px; position:relative; float: left; top:55px; margin: 0 auto;
border-style:solid;
border-color:transparent;
border-width:5px;
border-top-width:0px;}

span#langTitle {
display:inline-block;
width:120px;
font-weight:bold;
text-align:right;
font-size:11px;
}
</style>
<?php include_once("analyticstracking.php") ?>
<div class="feeds">


</div>
<?php
   echo '<div id="leftColumn">';

   echo '<div id="HomeBox3_Border">';
   echo '<div id="HomeBox3_Inside" style="padding:5px;"><span style="font-size:14px; font-weight:bold;">Index</span> (Page is still in progress)<br/>';
   echo 'Rarity Breakdown<br/>';
   echo 'Can\'t find ______<br/>';
   echo 'Forgot my password<br/>';
   echo 'I really like this site<br/>';
   echo 'Something not on this list<br/>';
   echo '</div></div>';

   echo '</div>';


   echo '<div id="rightColumn">';

   echo '<div id="HomeBox4_Border"><div id="HomeBox4_Inside" style="padding:5px;"><span style="font-size:14px; font-weight:bold;">Rarity Breakdown</span><br/>';
   echo 'Common<center><img src="/images/Common.png" /></center><br/>';
   echo 'Rare<center><img src="/images/Rare.png" /></center><br/>';
   echo 'Super Rare<center><img src="/images/Super Rare.png" /></center><br/>';
   echo 'Ultra Rare<center><img src="/images/Ultra Rare.png" /></center><br/>';
   echo 'Ultimate Rare<center><img src="/images/Ultimate Rare.png" /></center><br/>';
   //echo '<img src="/images/Holographic Rare.png" /><br/>';
   echo 'Secret Rare<center><img src="/images/Secret Rare.png" /></center><br/>';
   //echo '<img src="/images/Ultra Secret Rare.png" /><br/>';
   echo 'Gold Rare<center><img src="/images/Gold Rare.png" /></center><br/>';
   echo 'Gold Ghost Rare<center><img src="/images/Gold Ghost Rare.png" /></center><br/>';
   echo 'Starfoil Rare<center><img src="/images/Starfoil Rare.png" /></center><br/>';
   //echo '<img src="/images/Normal Parallel Rare.png" /><br/>';
   //echo '<img src="/images/Rare Parallel Rare.png" /><br/>';
   //echo '<img src="/images/Super Parallel Rare.png" /><br/>';
   //echo '<img src="/images/Ultra Parallel Rare.png" /><br/>';

   echo '</div>';

   echo '</div>';

?>