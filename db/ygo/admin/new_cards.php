<?php
$some_name = session_name("some_name");
session_set_cookie_params(0, '/', '.tgcdt.com');
session_start();
   header("Content-type: text/html; charset=utf-8");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
(function($, window, document, undefined) {
$(document).ready(function(){
   $("select#lang").change(function() {
      //alert( "Submit" );
      var temp = $(this).val();
      $("#set_name").load("new_cards_func.php", {lang:temp, lang_switch:"okay"});
      $("#set_name").show();
   });



   $("button#add_cards").click(function() {
      var search = $(this).val();
      var num_of_cards = $("input#num_of_cards").val();
      $("#cards").load("new_cards_func.php", {add_cards:search, num_of_cards:num_of_cards}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $( "#cards" ).trigger( "myCustomEvent" );
         if(statusTxt=="error")
            console.log("error");
      });
      $("#cards").show();
   });

   $("button#main_search").click(function() {
      var search = $(this).val();
      var lang = $("select#lang").val();
      var set_id = $("select#set_id").val();
      var en_name = $("input#en_name").val();
      var card_num = $("input#card_num").val();
      $("#cards").load("new_cards_func.php", {lang:lang, Main_Search:search, en_name:en_name, Card_Number:card_num, Set_ID:set_id}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $( "#cards" ).trigger( "myCustomEvent" );
         if(statusTxt=="error")
            console.log("error");
      });
      $("#cards").show();
   });

   $("button#new_set").click(function() {
      var search = $(this).val();
      $("#cards").load("new_cards_func.php", {new_set:search}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $( "#cards" ).trigger( "myCustomEvent" );
         if(statusTxt=="error")
            console.log("error");
      });
      $("#cards").show();

   });


$(document).on("myCustomEvent", '#cards', function() {

   console.log("clicking #cards");

   $("button#new_set_submit").on( "click", function() {
      console.log('Woot');
      var new_set_submit = $(this).val();
      var set_abbr = $("input#set_abbr").val();
      var set_name = $("input#set_name").val();
      var set_lang = $("input#set_lang").val();
      var set_type = $("input#set_type").val();
      var release_date = $("input#release_date").val();
      $("#cards").load("new_cards_func.php", {new_set_submit:new_set_submit, set_abbr:set_abbr, set_name:set_name, set_type:set_type, release_date:release_date, set_lang:set_lang});
   });

   $("button.search_card_name").on("click", function() {
      //var temp_card_name = $(this).attr( 'id' );
      var Card_Name = $("input#Card_Name").val();

      $("#card_data_info").load("new_cards_func.php", {search_card_name:"search_card_name", Card_Name:Card_Name}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $("#card_data_info").ready(function() {
               $("div.ygo_name").on("click", function() {
                  var temp_card_number = $(this).attr( 'id' );
                  $("input#Data_ID").val(temp_card_number);
                  $("input#Attack_Name").val(temp_card_number);
                  $("div.ygo_name").hide();
                  $("div#" + temp_card_number).show();
                  console.log("SHIT");
               });
            });
         if(statusTxt=="error")
            console.log("error");
      });
      $("#card_data_info").show();
   });

   $("button.add_cards_submit").on('click', function() {
      var Card_Number2 = $("input#Card_Number2").val();
      var DB_Card_Num = $("input#DB_Card_Num").val();
      var Edition = $("input#Edition").val();
      var Rarity = $("input#Rarity").val();
      var Holo = $("input#Holo").val();
      var Card_Language = $("input#Card_Language").val();
      var Set_ID = $("input#Set_ID").val();
      var Data_ID = $("input#Data_ID").val();
      var Text_ID = $("input#Text_ID").val();
      var Collect_ID = $("input#Collect_ID").val();

      $("#cards").load("new_cards_func.php", {add_cards_submit:"add_cards_submit", Card_Number2:Card_Number2, DB_Card_Num:DB_Card_Num, Edition:Edition, Rarity:Rarity, Holo:Holo, Card_Language:Card_Language, Set_ID:Set_ID, Data_ID:Data_ID, Text_ID:Text_ID, Collect_ID:Collect_ID}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $( "#cards" ).trigger( "myCustomEvent" );
         if(statusTxt=="error")
            console.log("error");
      });
      $("#cards").show();
   });

   $("button.copy_card").on('click', function() {
      var Card_Number2 = $("input#Card_Number2").val();
      var DB_Card_Num = $("input#DB_Card_Num").val();
      var Edition = $("input#Edition").val();
      var Rarity = $("input#Rarity").val();
      var Holo = $("input#Holo").val();
      var Card_Language = $("input#Card_Language").val();
      var Set_ID = $("input#Set_ID").val();
      var Data_ID = $("input#Data_ID").val();
      var Text_ID = $("input#Text_ID").val();
      var Collect_ID = $("input#Collect_ID").val();
      var Card_ID = $("input#Card_ID").val();

      $("#cards").load("new_cards_func.php", {add_cards:"add_cards", num_of_cards:"1", Card_Number2:Card_Number2, DB_Card_Num:DB_Card_Num, Edition:Edition, Rarity:Rarity, Holo:Holo, Card_Language:Card_Language, Set_ID:Set_ID, Data_ID:Data_ID, Text_ID:Text_ID, Collect_ID:Collect_ID, Card_ID:Card_ID}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $( "#cards" ).trigger( "myCustomEvent" );
         if(statusTxt=="error")
            console.log("error");
      });
      //console.log("SHIT");
      //console.log("addAgainStart");
      });

   $("button.search_attack_name").on("click", function() {
      var temp_attack_name = $(this).attr( 'id' );
      var foo = $("input#Attack_Name").val();
      $("#card_text_info").load("new_cards_func.php", {search_attack_name:temp_attack_name, Attack_Name:foo}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $("#card_text_info").ready(function() {
               $("div.ygo_text").on("click", function() {
                  var temp_text_number = $(this).attr( 'id' );
                  $("input#Text_ID").val(temp_text_number);
                  $("div.ygo_text").hide();
                  $("div#" + temp_text_number).show();
                  console.log("SHIT");
               });
            });
         if(statusTxt=="error")
            console.log("error");
         });
      $("#card_text_info").show();
      console.log(temp_attack_name + foo);
   });

   $("button.search_card_number").on("click", function() {
      var temp_card_name = $(this).attr( 'id' );
      var Card_Number = $("input#Card_Number2").val();
      $("#card_collect_info").load("new_cards_func.php", {search_card_number:"search_card_number", Card_Number:Card_Number}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $("#card_collect_info").ready(function() {
               $("div.ygo_collect").on("click", function() {
                  var temp_collect_number = $(this).attr( 'id' );
                  $("input#Collect_ID").val(temp_collect_number);
                  $("div.ygo_collect").hide();
                  $("div#" + temp_collect_number).show();
                  console.log("SHIT");
               });
            });
         if(statusTxt=="error")
            console.log("error");
      });
      $("#card_collect_info").show();
   });

   $("button.add_card_text").on("click", function() {
      var temp_attack_name = $(this).attr( 'id' );
      $("#card_text_info").load("new_cards_func.php", {add_cards_text:"add_cards_text"}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $("#card_text_info").ready(function() {
               var Card_Language = $("input#Card_Language").val();
               $("input#Text_Language").val(Card_Language);
               var Data_Link_ID = $("input#Data_ID").val();
               $("input#Data_Link_ID").val(Data_Link_ID);

               $("button.add_cards_text_submit").on("click", function() {
                  var temp_card_number = $(this).attr( 'id' );

                  var Text_Language = $("input#Text_Language").val();
                  var Data_Link_ID = $("input#Data_Link_ID").val();
                  var Materials = $("input#Materials").val();
                  var Pendulum_Effect = $("textarea#Pendulum_Effect").val();
                  var Card_Effect = $("textarea#Card_Effect").val();
                  var Flavor_Text = $("textarea#Flavor_Text").val();

                  $("#card_text_info").load("new_cards_func.php", {add_cards_text_submit:"add_cards_text_submit", Text_Language:Text_Language, Data_Link_ID:Data_Link_ID, Materials:Materials, Pendulum_Effect:Pendulum_Effect, Card_Effect:Card_Effect, Flavor_Text:Flavor_Text}, function(responseTxt,statusTxt,xhr){
                     if(statusTxt=="success")
                        console.log("Success");
                        $("#card_text_info").ready(function() {
                           $("div.ygo_text").on("click", function() {
                              var temp_text_number = $(this).attr( 'id' );
                              $("input#Text_ID").val(temp_text_number);
                              $("div.ygo_text").hide();
                              $("div#" + temp_text_number).show();
                              console.log("SHIT");
                           });
                        });
                     if(statusTxt=="error")
                        console.log("error");
                  });
                  console.log("SHIT");
               });
            });
         if(statusTxt=="error")
            console.log("error");
      });
      $("#card_text_info").show();
   });

   $("button.add_card_data").on("click", function() {
      var temp_card_name = $(this).attr( 'id' );
      $("#card_data_info").load("new_cards_func.php", {add_cards_data:"add_cards_data"}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $("#card_data_info").ready(function() {
               $("button.add_cards_data_submit").on("click", function() {

                  var EN_Name = $("input#EN_Name").val();
                  var Attribute = $("input#Attribute").val();
                  var Color_1 = $("input#Color_1").val();
                  var Color_2 = $("input#Color_2").val();
                  var Type = $("input#Type").val();
                  var Ability_1 = $("input#Ability_1").val();
                  var Ability_2 = $("input#Ability_2").val();
                  var Ability_3 = $("input#Ability_3").val();
                  var Property = $("input#Property").val();
                  var Level = $("input#Level").val();
                  var Rank = $("input#Rank").val();
                  var ATK = $("input#ATK").val();
                  var DEF = $("input#DEF").val();
                  var Pendulum_Blue = $("input#Pendulum_Blue").val();
                  var Pendulum_Red = $("input#Pendulum_Red").val();
                  var Number = $("input#Number").val();
                  var JAK_Name = $("input#JPK_Name").val();
                  var JAH_Name = $("input#JPH_Name").val();
                  var JA_Name = $("input#JA_Name").val();
                  var KOK_Name = $("input#KRK_Name").val();
                  var KOH_Name = $("input#KRH_Name").val();
                  var KO_Name = $("input#KO_Name").val();
                  var FR_Name = $("input#FR_Name").val();
                  var DE_Name = $("input#DE_Name").val();
                  var IT_Name = $("input#IT_Name").val();
                  var PT_Name = $("input#PT_Name").val();
                  var ES_Name = $("input#ES_Name").val();
                  var ZH_Name = $("input#ZH_Name").val();

                  $("#card_data_info").load("new_cards_func.php", {add_cards_data_submit:"add_cards_data_submit", EN_Name:EN_Name, Attribute:Attribute, Color_1:Color_1, Color_2:Color_2, Type:Type, Ability_1:Ability_1, Ability_2:Ability_2, Ability_3:Ability_3, Property:Property, Level:Level, Rank:Rank, ATK:ATK, DEF:DEF, Pendulum_Blue:Pendulum_Blue, Pendulum_Red:Pendulum_Red, Number:Number, JA_Name:JA_Name, JAK_Name:JAK_Name, JAH_Name:JAH_Name, KO_Name:KO_Name, KOK_Name:KOK_Name, KOH_Name:KOH_Name, FR_Name:FR_Name, DE_Name:DE_Name, IT_Name:IT_Name, PT_Name:PT_Name, ES_Name:ES_Name, ZH_Name:ZH_Name}, function(responseTxt,statusTxt,xhr){
                     if(statusTxt=="success")
                        console.log("Success");
                        $("#card_data_info").ready(function() {
                           $("div.ygo_data").on("click", function() {
                              var temp_data_number = $(this).attr( 'id' );
                              $("input#Data_ID").val(temp_data_number);
                              $("div.ygo_data").hide();
                              $("div#" + temp_data_number).show();
                              console.log("SHIT");
                           });
                        });
                     if(statusTxt=="error")
                        console.log("error");
                  });

                  console.log("SHIT");
               });
            });
         if(statusTxt=="error")
            console.log("error");
      });
      $("#card_data_info").show();
   });

   $("button.add_card_collect").on("click", function() {
      var temp_card_name = $(this).attr( 'id' );
      $("#card_collect_info").load("new_cards_func.php", {add_cards_collect:"add_cards_collect"}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $("#card_collect_info").ready(function() {
               $("button.add_cards_collect_submit").on("click", function() {
                  //var temp_card_number = $(this).attr( 'id' );

                  var Set_Number = $("input#Set_Number").val();
                  var Set_Icon = $("input#Set_Icon").val();
                  var Artist = $("input#Artist").val();
                  var Copyright = $("input#Copyright").val();
                  var Rarity_Symbol = $("input#Rarity_Symbol").val();

                  $("#card_collect_info").load("new_cards_func.php", {add_cards_collect_submit:"add_cards_collect_submit", Set_Number:Set_Number, Set_Icon:Set_Icon, Artist:Artist, Copyright:Copyright, Rarity_Symbol:Rarity_Symbol});
                  console.log("SHIT");
               });
            });
         if(statusTxt=="error")
            console.log("error");
      });
      $("#card_collect_info").show();
      //console.log(temp_attack_name);
   });

});





});
})(jQuery, window, document);
</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php include_once("analyticstracking.php") ?>
<style>
.hidden {display:none;}


div.list{
padding: 5px;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
margin-top:5px;
}





div.Red { background-color: #FF0000; }
div.Orange { background-color: #FF8B53; }
div.Yellow { background-color: #FDE68A; }
div.Green { background-color: #1D9E74; }
div.Blue { background-color: #9DB5CC; }
div.Violet { background-color: #A086B7; }
div.Purple { background-color: #BC5A84; }
div.White { background-color: #CCCCCC; }
div.Gray { background-color: #C0C0C0; }
div.Black { background-color: #000000; color: #FFFFFF; }

div.Trainer { background-color: #CBCBCB; }
div.Energy { background-color: #E5D6D0; }
div.Parts { background-color: #4c4c4c; }

span.card_name_style {font-size:1.5em;}

span.theIDs {font-size:2em;}


.shimmer {
  font-family: "Verdana";
  font-weight: 300;
  font-size:1.25em;
  margin: 0 auto;
  padding: 0 140px 0 0;
  display: inline;
  margin-bottom: 0;
}
.shimmer {
  text-align: center;
  color: rgba(255,255,255,0.1);
  background: -webkit-gradient(linear, left top, right top, from(#000), to(#000), color-stop(0.5, #fff));
  background: -moz-gradient(linear, left top, right top, from(#000), to(#000), color-stop(0.5, #fff));
  background: gradient(linear, left top, right top, from(#000), to(#000), color-stop(0.5, #fff));
  -webkit-background-size: 125px 100%;
  -moz-background-size: 125px 100%;
  background-size: 125px 100%;
  -webkit-background-clip: text;
  -moz-background-clip: text;
  background-clip: text;
  -webkit-animation-name: shimmer;
  -moz-animation-name: shimmer;
  animation-name: shimmer;
  -webkit-animation-duration: 2s;
  -moz-animation-duration: 2s;
  animation-duration: 2s;
  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  background-repeat: no-repeat;
  background-position: 0 0;
  background-color: #000;
}
@-moz-keyframes shimmer {
  0% {
    background-position: top left;
  }
  100% {
    background-position: top right;
  }
}
@-webkit-keyframes shimmer {
  0% {
    background-position: top left;
  }
  100% {
    background-position: top right;
  }
}
@-o-keyframes shimmer {
  0% {
    background-position: top left;
  }
  100% {
    background-position: top right;
  }
}
@keyframes shimmer {
  0% {
    background-position: top left;
  }
  100% {
    background-position: top right;
  }
}




</style>

</head>



<body style="font-family:Verdana; font-size:0.75em; background-color:black;">

<?php
$db_name = "ygo";
$db_username = "vinceoa2_ygo";
$db_password = "ki_234_ki";

   $con2 = mysql_connect("localhost",$db_username,$db_password);
   if (!$con2){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8');
   }
   mysql_select_db("vinceoa2_" . $db_name, $con2);
echo '<div class="list Energy">';
echo '<span>Card Number (Printed)</span> <input type="text" id="card_num"> </input> <span>Name</span> <input type="text" id="en_name">';

   echo '<br/><span class="filterLabels">Set Language</span>';
   echo '<select id="lang" name="Set Language" >';
   echo '<option value=""></option>';
      $type_Query = "SELECT DISTINCT Set_Language FROM YGO_SETS ORDER BY Set_Language ASC";

      $tempBResult = mysql_query($type_Query);
      if($tempBResult){
         while($row = mysql_fetch_array($tempBResult)){
            if($row['Set_Language'] != ''){
               echo '<option value="' . $row['Set_Language'] . '">' . $row['Set_Language'] . '</option>';
            }
         }
      }
      echo '</select>';


echo '<span id="set_name" class="hidden"></span> <button type="submit" name="main_search" id="main_search" value="go">Search</button><br/>';

echo '<h3>Adding Info to Database</h3><button type="submit" name="new_set" id="new_set" value="new_set">Add a Set</button> <span>Num of Cards</span> <input type="text" id="num_of_cards"></input> <button type="submit" name="add_cards" id="add_cards" value="add_cards">Add Cards</button>';
echo '</div>';


echo '<br/><div class="list Energy"><span id="cards" class="hidden"></span></div>';

?>
</body>
</html>