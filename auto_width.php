<!DOCTYPE html>
<html>

<?php include_once "/home8/vinceoa2/public_html/tgcdt/main_session.php" ?>
<?php
echo '<input type="hidden" id="subdomain" value="' . $db_name . '" />'; 
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="keywords" content="<?php echo $meta_tags; ?>" >
      <title><?php echo $page_title; ?></title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
      <link href="OriginalSytle.css" rel="stylesheet" type="text/css" media="screen" />
      <?php include_once("analyticstracking.php") ?>
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
      <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
      <script src="http://tgcdt.com/jquery.lazyload.js" type="text/javascript"></script>
      <script type="text/javascript" src="http://tgcdt.com/main.js"></script>
      <script type="text/javascript" src="http://tgcdt.com/dist/js/bootstrap.min.js"></script>
<style>
.row-fluid.no-gutters {
  margin-right: 0;
  margin-left: 0;
}
.row-fluid.no-gutters [class^="col-"],
.row-fluid.no-gutters [class*=" col-"]{
  padding-right: 2px;
  padding-left: 2px;
}

.navbar-brand.icon {
padding-top:0px;
padding-bottom:0px;
}

.scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}

.main-content {
   background-color: #002236;
}

.info-panel {
   background-color: #363636;
}

.nopadding {
   padding: 0 !important;
   margin: 0 !important;
}
</style>

<script>
 $(function(){
   $(".dropdown-menu li a").click(function(){
      $(this).parent().parent().parent().children( ".filterLabels" ).text($(this).text());
      $(this).parent().parent().parent().children( ".filterLabels" ).append( '<span class="caret"></span>' );
      $(this).parent().parent().parent().children( ".filterLabels" ).val($(this).text());
   });
});
</script>
  <link rel="stylesheet" href="http://tgcdt.com/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar">Home</span>
            <span class="icon-bar">Collection</span>
            <span class="icon-bar">Settings</span>
          </button>
          <a class="navbar-brand icon" href="#"><img src="http://ptcg.tgcdt.com/images/tgcdt_logo3_150px.png" height="50px"/></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">Collection</a></li>
            <li><a href="#contact">Settings</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

  <div class="container-fluid main-content nopadding" role="main" style="position:absolute; top:50px;">
    <div class="col-lg-2 col-md-3 hidden-sm hidden-xs info-panel nopadding" style="position:fixed;">
       <div class="row-fluid no-gutters"><h4>
<?php
   foreach($button_values as $b_key => $b_value){
echo '<div class="col-lg-5 col-md-5"><span class="label label-default">' . $b_value[1] . '</span></div>';
      echo '<div class="col-lg-7 col-md-7"><div class="dropdown">';
      echo '<button class="btn btn-default btn-xs dropdown-toggle filterLabels" type="button" id="dropdownMenu' . $b_key . '" data-toggle="dropdown">Pick One<span class="caret"></span></button>';
      echo '<ul class="dropdown-menu scrollable-menu ' . $b_key . '" role="menu" aria-labelledby="dropdownMenu' . $b_key . '" name="' . $b_value[0] . '">';
      echo '<li><a role="menuitem" tabindex="-1" href="#" value="">Pick One</a></li>';
      $tempBQuery = $b_value[2];

      $tempBResult = mysql_query($tempBQuery);
      if($tempBResult){
         while($row = mysql_fetch_array($tempBResult)){
            if($row[$b_value[0]] != ''){
               echo '<li><a role="menuitem" tabindex="-1" href="#" value="' . $row[$b_value[0]] . '">' . $row[$b_value[0]] . '</a></li>';
            }
         }
      }
      echo '</ul></div></div>';
   }
?>
       </h4></div>
    </div>
    <div class="col-lg-2 col-md-3 hidden-sm hidden-xs nopadding">
    </div>

    <div class="col-lg-10 col-md-9 nopadding">
      <div class="row-fluid no-gutters">
<?php
for($i = 1; $i < 50; $i++){
   if($i < 10){
   echo '    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4">
      <img src="http://dm.tgcdt.com/images/EN_cards/M001-EN00' . $i . '_Unlimited_Rarity_1.jpg" class="img-responsive img-thumbnail">
      <div class="caption">
        <p><a href="#" class="btn btn-default btn-lg btn-sm btn-xs" role="button" type="button">+</a> <a href="#" class="btn btn-default btn-lg btn-sm btn-xs" role="button" type="button">-</a></p>
      </div>
    </div>';
   }else{
   echo '    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4">
      <img src="http://dm.tgcdt.com/images/EN_cards/M001-EN0' . $i . '_Unlimited_Rarity_1.jpg" class="img-responsive img-thumbnail">
      <div class="caption">
        <p><a href="#" class="btn btn-default btn-lg btn-sm btn-xs" role="button" type="button">+</a> <a href="#" class="btn btn-default btn-lg btn-sm btn-xs" role="button" type="button">-</a></p>
      </div>
    </div>';
   }

}
?>
      </div>
    </div>
  </div>
</body>
</html>