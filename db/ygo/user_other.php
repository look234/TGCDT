<?php include_once("analyticstracking.php") ?>
      <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script >
   var rarityName = [];
   var rarityVal = [];
   google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(drawChart);

   $(document).ready(function(){
      $("button.lang").click(function() {
         var newlang = $(this).val();
         //alert(newlang);
         $("#wootthestuff").load("user_chart.php?lang=" + newlang, drawChart);
         //drawChart();
      });
   });

   function drawChart() {
      rarityName.length = 0;
      rarityVal.length = 0;
      var spans = document.getElementsByTagName('span');
      var l = spans.length;
      for(var i = 0; i < l; i++){
         var spanClass = spans[i].getAttribute("class"); 
         if(spanClass == "hiddenChartData"){ 
            var tempID = spans[i].id; 
            rarityName[i] = tempID;
            rarityVal[i] = parseInt(document.getElementById(tempID).innerHTML);
         }
      }

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'rarityName');
      data.addColumn('number', 'rarityVal');
      for(i = 0; i < rarityName.length; i++){
         data.addRow([rarityName[i] + " (" + rarityVal[i] + ")", rarityVal[i]]);
      }

      var options = {'backgroundColor':'transparent',
                     'width':700,
                     'height':500,
                     'is3D':true,
                     'chartArea':{left:"5%",top:"5%",width:600,height:600},
                     'legend':{position: 'right', textStyle: {color: 'black', fontSize: 12}},
                     'titleTextStyle':{color: 'black', fontSize: 16}};

      var chart = new google.visualization.PieChart(document.getElementById('chart'));
         chart.draw(data, options);
   }
</script>

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

div#HomeBox2_Border {width:250px; min-height:50px; padding:0px; position:relative; float: left; background-color:#02d4ee;
   border-top-right-radius:10px;
   border-top-left-radius:10px;
   border-bottom-right-radius:10px;
   border-bottom-left-radius:10px;
   text-align:left;
   font-family:Verdana;
}

div#HomeBox2_Inside { padding:0px; position:relative; background-color:#02d4ee;
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

div#Box1_Border {width:250px; max-height:300px; padding:0px; position:relative; float: left; top:5px; background-color:#02d4ee;
   border-top-right-radius:10px;
   border-top-left-radius:10px;
   border-bottom-right-radius:10px;
   border-bottom-left-radius:10px;
   text-align:left;
   font-family:Verdana;
}

div#Box1_Inside { padding:0px; max-height:300px; position:relative; background-color:#02d4ee;
   border-style:solid;
   border-color:transparent;
   border-width:4px;
   border-top-right-radius:10px;
   border-top-left-radius:10px;
   border-bottom-right-radius:10px;
   border-bottom-left-radius:10px;
   text-align:left;
   font-family:Verdana;
   font-size:9px;
   margin: 0 auto; 
   overflow:scroll;
   overflow-x:hidden;
}
div#Box1_Inside_2 { padding:0px; position:relative; background-color:#02d4ee;
   border-style:solid;
   border-color:transparent;
   border-width:4px;
   border-top-right-radius:10px;
   border-top-left-radius:10px;
   border-bottom-right-radius:10px;
   border-bottom-left-radius:10px;
   text-align:left;
   margin: 0 auto; 
}

div#HomeBox4_Border {width:640px; position:relative; float: left; background-color:#02d4ee;
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
<?php
   header("Content-type: text/html; charset=utf-8");
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();

   $otherUsername = mysql_escape_string($_GET['username']);
   $otherUsername = stripslashes($otherUsername);

   $link = mysqli_connect('localhost', 'vinceoa2_read', 'Luffy_234', 'vinceoa2_php1');
   if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
   }
   $query = "SELECT * FROM `ayn_users` WHERE `username` LIKE '" . $otherUsername . "' LIMIT 0, 30 ";

   if ($result = mysqli_query($link, $query)) {
      while($row = mysqli_fetch_assoc($result)){
         $userName = $row['username'];
         $userID = $row['user_id'];
         $userLocation = $row['user_from'];
         $userImage = $row['user_avatar'];
      }
      mysqli_free_result($result);
   }

   $_SESSION['otherUserID'] = $userID;

   echo '<div id="leftColumn">';
   echo '<div id="HomeBox2_Border">';
   echo '<div id="HomeBox2_Inside" style="padding:5px;">';
      if ($userImage != '') {
         echo '<img src="http://tgcdt.com/forum/download/file.php?avatar=' . $userImage . '" id="userImage" width="75px" height="75px" align="top" style="padding:0px; margin:0px;" />';
      } else {
         echo "<div id=\"userImageBox\"><img src=\"http://vincentleith.com/user_data/1_Bob/1.png\" id=\"userImage\" width=\"50px\" height=\"50px\" align=\"top\"/></div>";
      }
      echo '<span style="font-size:18px; font-weight:bold; display:inline-block;"> ' . $userName;
      if($userName == "look234"){
         echo '<br/>';
      }elseif($userName == "pokemaster"){
         echo '<br/>';
      }else{
         echo '<span id="userTitle">Beta User</span><br/>';
      }
      echo '<span id="userLocation" style="font-size:12px; font-weight:none;">' . $userLocation . '</span><br/>';
      echo '</span>';
   echo '</div></div>';

   echo '<div id="Box1_Border"><div id="Box1_Inside_2" style="padding:5px;"><span style="font-size:14px; font-weight:bold;">Recent Activity</span><br/></div>';
   echo '<div id="Box1_Inside" style="padding:5px;">';
      include "user_recently_added.php";
   echo '</div></div>';

   echo '</div>';


   echo '<div id="rightColumn">';

   echo '<div id="HomeBox4_Border"><div id="HomeBox4_Inside" style="padding:5px;"><span style="font-size:14px; font-weight:bold;">' . $userName . '\'s Collection</span><br/>';
      echo '<div>';
      include "user_other_count.php";
      echo '</div>';
      echo '<div id="wootthestuff">';
      include "user_chart.php";
      echo '</div>';
   echo '</div>';

   echo '</div>';

?>