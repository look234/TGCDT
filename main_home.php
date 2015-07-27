<?php include_once "/home8/vinceoa2/public_html/tgcdt/main_session.php" ?>
<?php echo '<input type="hidden" id="subdomain" value="' . $db_name . '" />'; ?>

<html>

   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="keywords" content="<?php echo $meta_tags; ?>" >
      <title><?php echo $page_title; ?></title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
      <link href="OriginalSytle.css" rel="stylesheet" type="text/css" media="screen" />
      <?php include_once("analyticstracking.php") ?>
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
      <link rel="stylesheet" href="http://tgcdt.com/main.css" />
      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
      <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
      <script src="http://tgcdt.com/jquery.lazyload.js" type="text/javascript"></script>
      <script type="text/javascript" src="http://tgcdt.com/main.js"></script>
      <script type="text/javascript" src="http://tgcdt.com/dist/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="http://tgcdt.com/dist/css/bootstrap.min.css">
      <script type="text/javascript">
         $(document).bind("mobileinit", function () {
            $.mobile.autoInitializePage = false;
         });
      </script>
      <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


      <script>
         $(function(){
            $(".dropdown-menu li a").click(function(){
               $(this).parent().parent().parent().children( ".filterLabels" ).text($(this).text());
               $(this).parent().parent().parent().children( ".filterLabels" ).append( '<span class="caret"></span>' );
               $(this).parent().parent().parent().children( ".filterLabels" ).val($(this).text());
            });
         });
      </script>
<!-- OMFG, this style fixed the bootstrap modal scroll bar issues. T~T -->
<style>
body.modal-open {
overflow: auto !important;
padding-right: 0px!important;
}
</style>
   </head>

   <div class="device-xs visible-xs"></div>
   <div class="device-sm visible-sm"></div>
   <div class="device-md visible-md"></div>
   <div class="device-lg visible-lg"></div>

   <body style="background-color:#002236;">
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <div class="container-fluid">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand icon" href="http://tgcdt.com"><img src="http://ptcg.tgcdt.com/images/tgcdt_logo3_150px.png" height="50px"/></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="?page=home">Home</a></li>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Database <span class="caret"></span></a>
                     <ul class="dropdown-menu" role="menu">
                        <li><a href="?page=collection">Search Cards</a></li>
                        <li><a href="?page=search_sets">Set Lists</a></li>
                     </ul>
                  </li>
                  <li><a href="http://tgcdt.com/forum/" class="HeaderMenuLink">Forum</a></li>
                  <li class="dropdown">
                        <?php
                           if(($_SESSION['myusername'] == 'pokemaster') || ($_SESSION['myusername'] == 'look234') || ($_SESSION['myusername'] == 'that_guy')){
                              echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Super Special Awesome Bits <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                              <li><a href="http://bulbapedia.bulbagarden.net/wiki/List_of_Pok%C3%A9mon_Trading_Card_Game_expansions" target="_blank" >Bulbapedia</a></li>
                              <li><a href="http://ptcg.tgcdt.com/admin/new_cards.php" target="_blank" >Add Cards</a></li>
                              <li><a href="http://ptcg.tgcdt.com/admin/image_upload.php" target="_blank" >Upload Images</a></li>';
                           }else{
                              echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Nothing <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                              <li class="disabled"><a href="#">Nothing</a></li>
                              <li class="disabled"><a href="#">Nothing</a></li>
                              <li class="disabled"><a href="#">Nothing</a></li>
                              <li class="divider"></li>
                              <li class="disabled"><a href="#">Nothing</a></li>';
                           }
                        ?>
                     </ul>
                  </li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <?php
                     if($_SESSION['myusername'] != ''){
                        if ($_SESSION['user_avatar'] != '') {
                           echo '<img src="http://tgcdt.com/forum/download/file.php?avatar=' . $_SESSION['user_avatar'] . '" id="userImage" width="50px" height="50px" align="top" style="padding:0px; margin:0px;" />';
                        } else {
                           echo "<img src=\"http://vincentleith.com/user_data/1_Bob/1.png\" id=\"userImage\" width=\"50px\" height=\"50px\" align=\"top\"/>";
                        }
                        echo '<li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . $_SESSION['myusername'] . '<span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                                 <li class="disabled"><a href="#">My Page</a></li>
                                 <li class="disabled"><a href="#">Settings</a></li>
                                 <li class="divider"></li>
                                 <li>
                                    <form name="form1" method="POST" action="Logout.php" style="text-align:center;" >

                                       <button type="submit" class="btn btn-primary" name="Submit" value="Login">Sign Out T-T</button>
                                    </form>
                                 </li>
                              </ul>
                        </li>';
                                 //echo '<li><a href="?page=collection" class="HeaderMenuLink">' . $_SESSION['myusername'] . '</a></li>';
                     }else{
                        echo '<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#myModal" >Login</button>';
                     }
                  ?>

                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                         <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">x</button>
                            <h3>Login to TGCDT</h3>
                         </div>
                         <div class="modal-body">
                            <form name="form1" method="POST" action="http://tgcdt.com/new_login.php?site=<?php echo $db_name; ?>" >
                               <p><input type="text" class="span3" name="myusername" id="myusername" placeholder="Username"></p>
                               <p><input type="password" class="span3" name="mypassword" id="mypassword" placeholder="Password"></p>
                               <p><button type="submit" class="btn btn-primary" name="Submit" value="Login" onclick="myFunction()">Login</button>
                                  <a href="#">Forgot Password?</a>
                               </p>
                            </form>
                         </div>
                         <div class="modal-footer">
                            New to TGCDT?
                            <a href="http://tgcdt.com/forum/ucp.php?mode=register" class="btn btn-primary">Register</a>
                         </div>
                      </div>
                    </div>
                  </div>
               </ul>
            </div> <!-- nav-collapse -->
         </div>
      </nav>

      <div class="container-fluid main-content nopadding" role="main" id="theBusiness">
         <?php
            if($_SESSION['page'] == "home"){
               include_once "ygo_home.php";
            }elseif($_SESSION['page'] == "collection"){
               include_once "ygo_new_results.php";
            }elseif($_SESSION['page'] == "search_sets"){
               include_once "search_sets_control.php";
            }elseif($_SESSION['page'] == "userpage"){
               include_once "/home8/vinceoa2/public_html/ygo/user_other.php";
            }elseif($_SESSION['page'] == "decks"){
               include_once "/home8/vinceoa2/public_html/ygo/testing_xml.php";
            }elseif($_SESSION['page'] == "faqs"){
               include_once "/home8/vinceoa2/public_html/ygo/faqs.php";
            }elseif($_SESSION['page'] == "sets"){
               include_once "/home8/vinceoa2/public_html/ygo/ygo_set_lists.php";
            }
         ?>
      </div>
   </body>
</html>