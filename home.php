<?php
   header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<?php include_once("analyticstracking.php") ?>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="http://tgcdt.com/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://tgcdt.com/dist/css/bootstrap.min.css">
<script>
$(document).ready(function(){
   $("div#CardGame").mouseenter(function(){
      $(this).children("#logo").hide('fast');
      $(this).children("#soon").show('fast');
   });
   $("div#CardGame").mouseleave(function(){
      $(this).children("#logo").show('fast');
      $(this).children("#soon").hide('fast');
   });
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-40116164-1']);
  _gaq.push(['_setDomainName', 'tgcdt.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();


</script>
<style>
img.logo { left:0px; right:0px; top:0px; bottom:0; position:absolute; margin:auto;}
div#CardGame { height: 150px; padding:0px; position:relative; background-color:#02d4ee; margin:5px;
   border-top-right-radius:10px;
   border-top-left-radius:10px;
   border-bottom-right-radius:10px;
   border-bottom-left-radius:10px;
}
div#CardGameOK { height: 150px; padding:0px; position:relative; background-color:#1ae466; margin:5px;
   border-top-right-radius:10px;
   border-top-left-radius:10px;
   border-bottom-right-radius:10px;
   border-bottom-left-radius:10px;
}
div#about { height: 150px; padding:0px; position:relative; background-color:#4c4c4c; margin:5px;
   border-top-right-radius:10px;
   border-top-left-radius:10px;
   border-bottom-right-radius:10px;
   border-bottom-left-radius:10px;
}
div.thumbnail {border: 0px;}
div.no-padding {padding: 0px;}
div#CardGame:hover { background-color:#00afe5; }
div#CardGameOK:hover { background-color:#00afe5; }
span#soon { font:bold 12px Verdana; display:none;}
</style>
</head>
<body style="background-color:#002236;">

<div style="padding-left: 20px; padding-right: 20px; padding-top: 5px;">
<div class="row">
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="about"><img id="logo" class="logo" src="http://ptcg.tgcdt.com/images/tgcdt_logo3_150px.png" /></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGameOK"><a href="http://ygo.tgcdt.com" ><img class="img-responsive logo" src="images/ygo.png" /></a></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGameOK"><a href="http://ptcg.tgcdt.com" ><img class="img-responsive logo" src="images/ptcg.png" /></a></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGameOK"><a href="http://dbz.tgcdt.com" ><img class="img-responsive logo" src="images/dbgt.png" /></a></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGameOK"><a href="http://mtg.tgcdt.com" ><img class="img-responsive logo" src="images/mtg.png" /></a></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGameOK"><a href="http://dm.tgcdt.com" ><img class="img-responsive logo" src="images/dmtcg.png" /></a></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/dbccg.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/wow.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/bdcg.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/chaotic.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/nccg.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/cfvg.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/kaijudo.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/fma.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/huntik.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/swtcg.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/swccg.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/sktcg.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/5rings.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/bleach.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/dbheroes.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/dino.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/exodus.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/opformation.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/startrek.png" /><span id="soon">Soon...</span></div></div>
<div class="no-padding col-lg-1 col-md-2 col-sm-3 col-xs-6" ><div class="thumbnail" id="CardGame"><img id="logo" class="img-responsive logo" src="images/mhhc.png" /><span id="soon">Soon...<br/>(╯°□°）╯︵ ┻━┻</span></div></div>
</div>
</div>

</body>
</html>