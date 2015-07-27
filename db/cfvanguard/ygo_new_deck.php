<script>
function allowDrop(ev)
{
ev.preventDefault();
}

function drag(ev)
{
ev.dataTransfer.setData("Text",ev.target.id);
}

function drop(ev)
{
ev.preventDefault();
var data=ev.dataTransfer.getData("Text");
ev.target.appendChild(document.getElementById(data));
}
</script>
<style>

div#HomeBox3_Border {width:450px; min-height:50px; padding:0px; position:fixed; top:55px; float: left; background-color:#02d4ee;
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

div#HomeBox4_Border {width:440px; min-height:50px; position:relative; float: left; background-color:#02d4ee;
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

div#leftColumn {width:450px; min-height:50px; position:relative; float: left; top:55px;}
div#rightColumn {width:440px; min-height:50px; position:relative; float: left; top:55px; margin: 0 auto;
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

#div1 {width:350px;height:70px;padding:10px;border:1px solid #aaaaaa;}

#div2 {width:350px;height:70px;padding:10px;border:1px solid #aaaaaa;}
</style>
<?php include_once("analyticstracking.php") ?>
<?php
   echo '<div id="leftColumn">';

   echo '<div id="HomeBox3_Border">';
   echo '<div id="HomeBox3_Inside" style="padding:5px;"><span style="font-size:14px; font-weight:bold;">Deck</span> (Page is still in progress)<br/>';
   echo 'Your deck will show up here with options like naming, choosing between Forbidden List and Traditional style, etc.<br/><br/>';
   echo '<div style="position:relative; margin: 0 auto; width:400px;" >Main Deck<br/>';
   for ($i=1; $i <= 20; $i++){
      if($i < 10){
         echo '<img src="/images/EN_cards/DEM1-EN00' . $i . '_Unlimited_Rarity_1.png" width="50px" draggable="true" ondragstart="drag(event)" />';
      }else{
         echo '<img src="/images/EN_cards/DEM1-EN0' . $i . '_Unlimited_Rarity_1.png" width="50px" draggable="true" ondragstart="drag(event)" />';
      }

   }
   echo '</div><br/><div style="position:relative; margin: 0 auto; width:400px;" >Extra Deck<br/>';
   echo '<img src="/images/EN_cards/LCYW-EN051_1st_Rarity_1.png" width="50px" draggable="true" ondragstart="drag(event)" />';
   echo '<img src="/images/EN_cards/SJCS-EN007_Limited_Rarity_1.png" width="50px" draggable="true" ondragstart="drag(event)" />';
   echo '<img src="/images/EN_cards/HA07-EN020_1st_Rarity_1.png" width="50px" draggable="true" ondragstart="drag(event)" />';
   echo '<img src="/images/EN_cards/HA07-EN019_1st_Rarity_1.png" width="50px" draggable="true" ondragstart="drag(event)" />';
   echo '<img src="/images/EN_cards/YS13-EN041_1st_Rarity_1.png" width="50px" draggable="true" ondragstart="drag(event)" />';
   echo '</div><br/><div style="position:relative; margin: 0 auto; width:400px;" >Side Deck<br/>';
   echo '<img src="/images/EN_cards/FMR-001_Unlimited_Rarity_1.png" width="50px" draggable="true" ondragstart="drag(event)" />';
   echo '<img src="/images/EN_cards/FMR-002_Unlimited_Rarity_1.png" width="50px" draggable="true" ondragstart="drag(event)" />';
   echo '<img src="/images/EN_cards/FMR-003_Unlimited_Rarity_1.png" width="50px" draggable="true" ondragstart="drag(event)" />';
   echo '</div></div>';
   echo '<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div></div>';

   echo '</div>';


   echo '<div id="rightColumn">';

   echo '<div id="HomeBox4_Border"><div id="HomeBox4_Inside" style="padding:5px;"><span style="font-size:14px; font-weight:bold;">Search</span><br/>';
   echo 'Here you will be able to search and drag and drop cards into your deck.';
   echo '</div>';
   echo '<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div></div>';

   echo '</div>';
?>