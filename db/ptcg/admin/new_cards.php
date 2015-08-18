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
      var temp_card_name = $(this).attr( 'id' );
      var Card_Name = $("input#Card_Name").val();
      var HP = $("input#HP2").val();
      $("#card_data_info").load("new_cards_func.php", {search_card_name:"search_card_name", Card_Name:Card_Name, HP:HP}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $("#card_data_info").ready(function() {
               $("div.ptcg_name").on("click", function() {
                  var temp_card_number = $(this).attr( 'id' );
                  $("input#Data_ID").val(temp_card_number);
                  $("input#Data_Link_ID").val(temp_card_number);
                  $("div.ptcg_name").hide();
                  $("div#" + temp_card_number).show();
                  console.log("SHIT");

      var lang = $("input#Card_Language").val();
      $("#card_text_info").load("new_cards_func.php", {search_attack_name:"search_attack_name_1", Data_Link_ID:temp_card_number, Text_Language:lang}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $("#card_text_info").ready(function() {
               $("div.ptcg_text").on("click", function() {
                  var temp_text_number = $(this).attr( 'id' );
                  $("input#Text_ID").val(temp_text_number);
                  $("div.ptcg_text").hide();
                  $("div#" + temp_text_number).show();
                  console.log("SHIT");
               });
            });
         if(statusTxt=="error")
            console.log("error");
         });
      $("#card_text_info").show();
               });
               var temp_card_number = $(this).attr( 'id' );


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
      var foo2 = $("input#Data_Link_ID").val();
      var lang = $("input#Card_Language").val();
      $("#card_text_info").load("new_cards_func.php", {search_attack_name:temp_attack_name, Attack_Name:foo, Data_Link_ID:foo2, Text_Language:lang}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $("#card_text_info").ready(function() {
               $("div.ptcg_text").on("click", function() {
                  var temp_text_number = $(this).attr( 'id' );
                  $("input#Text_ID").val(temp_text_number);
                  $("div.ptcg_text").hide();
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
               $("div.ptcg_collect").on("click", function() {
                  var temp_collect_number = $(this).attr( 'id' );
                  $("input#Collect_ID").val(temp_collect_number);
                  $("div.ptcg_collect").hide();
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

               $("button.attack1_energy").on("click", function() {
                  var energy = $(this).val();
                  var Attack_1_Cost = $("input#Attack_1_Cost").val();
                  $("input#Attack_1_Cost").val(Attack_1_Cost + energy);
               });
               $("button.attack2_energy").on("click", function() {
                  var energy = $(this).val();
                  var Attack_2_Cost = $("input#Attack_2_Cost").val();
                  $("input#Attack_2_Cost").val(Attack_2_Cost + energy);
               });
               $("button.attack3_energy").on("click", function() {
                  var energy = $(this).val();
                  var Attack_3_Cost = $("input#Attack_3_Cost").val();
                  $("input#Attack_3_Cost").val(Attack_3_Cost + energy);
               });
               $("button.attack4_energy").on("click", function() {
                  var energy = $(this).val();
                  var Attack_4_Cost = $("input#Attack_4_Cost").val();
                  $("input#Attack_4_Cost").val(Attack_4_Cost + energy);
               });

               $("button.add_cards_text_submit").on("click", function() {
                  var temp_card_number = $(this).attr( 'id' );

                  var Text_Language = $("input#Text_Language").val();
                  var Pokedex_Data = $("input#Pokedex_Data").val();
                  var Attack_1_Cost = $("input#Attack_1_Cost").val();
                  var Attack_1_Name = $("input#Attack_1_Name").val();
                  var Attack_1_Damage = $("input#Attack_1_Damage").val();
                  var Attack_1_Text = $("textarea#Attack_1_Text").val();
                  var Attack_2_Cost = $("input#Attack_2_Cost").val();
                  var Attack_2_Name = $("input#Attack_2_Name").val();
                  var Attack_2_Damage = $("input#Attack_2_Damage").val();
                  var Attack_2_Text = $("textarea#Attack_2_Text").val();
                  var Attack_3_Cost = $("input#Attack_3_Cost").val();
                  var Attack_3_Name = $("input#Attack_3_Name").val();
                  var Attack_3_Damage = $("input#Attack_3_Damage").val();
                  var Attack_3_Text = $("textarea#Attack_3_Text").val();
                  var Attack_4_Cost = $("input#Attack_4_Cost").val();
                  var Attack_4_Name = $("input#Attack_4_Name").val();
                  var Attack_4_Damage = $("input#Attack_4_Damage").val();
                  var Attack_4_Text = $("textarea#Attack_4_Text").val();
                  var Ability_Type = $("input#Ability_Type").val();
                  var Ability_Name = $("input#Ability_Name").val();
                  var Ability_Text = $("textarea#Ability_Text").val();
                  var Card_Effect = $("textarea#Card_Effect").val();
                  var Rule_1_Type = $("input#Rule_1_Type").val();
                  var Rule_1_Name = $("input#Rule_1_Name").val();
                  var Rule_1_Text = $("textarea#Rule_1_Text").val();
                  var Rule_2_Type = $("input#Rule_2_Type").val();
                  var Rule_2_Name = $("input#Rule_2_Name").val();
                  var Rule_2_Text = $("textarea#Rule_2_Text").val();
                  var Rule_3_Type = $("input#Rule_3_Type").val();
                  var Rule_3_Name = $("input#Rule_3_Name").val();
                  var Rule_3_Text = $("textarea#Rule_3_Text").val();
                  var Rule_4_Type = $("input#Rule_4_Type").val();
                  var Rule_4_Name = $("input#Rule_4_Name").val();
                  var Rule_4_Text = $("textarea#Rule_4_Text").val();
                  var Flavor_Text = $("textarea#Flavor_Text").val();

                  $("#card_text_info").load("new_cards_func.php", {add_cards_text_submit:"add_cards_text_submit", Text_Language:Text_Language, Pokedex_Data:Pokedex_Data, Attack_1_Cost:Attack_1_Cost, Attack_1_Name:Attack_1_Name, Attack_1_Damage:Attack_1_Damage, Attack_1_Text:Attack_1_Text, Attack_2_Cost:Attack_2_Cost, Attack_2_Name:Attack_2_Name, Attack_2_Damage:Attack_2_Damage, Attack_2_Text:Attack_2_Text, Attack_3_Cost:Attack_3_Cost, Attack_3_Name:Attack_3_Name, Attack_3_Damage:Attack_3_Damage, Attack_3_Text:Attack_3_Text, Attack_4_Cost:Attack_4_Cost, Attack_4_Name:Attack_4_Name, Attack_4_Damage:Attack_4_Damage, Attack_4_Text:Attack_4_Text, Ability_Type:Ability_Type, Ability_Name:Ability_Name, Ability_Text:Ability_Text, Card_Effect:Card_Effect, Rule_1_Type:Rule_1_Type, Rule_1_Name:Rule_1_Name, Rule_1_Text:Rule_1_Text, Rule_2_Type:Rule_2_Type, Rule_2_Name:Rule_2_Name, Rule_2_Text:Rule_2_Text, Rule_3_Type:Rule_3_Type, Rule_3_Name:Rule_3_Name, Rule_3_Text:Rule_3_Text, Rule_1_Type:Rule_4_Type, Rule_4_Name:Rule_4_Name, Rule_4_Text:Rule_4_Text, Flavor_Text:Flavor_Text}, function(responseTxt,statusTxt,xhr){
                     if(statusTxt=="success")
                        console.log("Success");
                        $("#card_text_info").ready(function() {
                           $("div.ptcg_text").on("click", function() {
                              var temp_text_number = $(this).attr( 'id' );
                              $("input#Text_ID").val(temp_text_number);
                              $("div.ptcg_text").hide();
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
      console.log(temp_attack_name);
   });

   $("button.add_card_data").on("click", function() {
      var temp_card_name = $(this).attr( 'id' );
      $("#card_data_info").load("new_cards_func.php", {add_cards_data:"add_cards_data"}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $("#card_data_info").ready(function() {
               $("button.add_cards_data_submit").on("click", function() {
                  //var temp_card_number = $(this).attr( 'id' );

                  var Number = $("input#Number").val();
                  var EN_Name = $("input#EN_Name").val();
                  var Prefix = $("input#Prefix").val();
                  var Suffix = $("input#Suffix").val();
                  var Stage = $("input#Stage").val();
                  var HP = $("input#HP").val();
                  var Type_1 = $("input#Type_1").val();
                  var Type_2 = $("input#Type_2").val();
                  var Weakness_1 = $("input#Weakness_1").val();
                  var Weakness_2 = $("input#Weakness_2").val();
                  var Weakness_X = $("input#Weakness_X").val();
                  var Resistance_1 = $("input#Resistance_1").val();
                  var Resistance_2 = $("input#Resistance_2").val();
                  var Resistance_X = $("input#Resistance_X").val();
                  var Retreat = $("input#Retreat").val();
                  var JA_Name = $("input#JA_Name").val();
                  var KO_Name = $("input#KO_Name").val();
                  var FR_Name = $("input#FR_Name").val();
                  var DE_Name = $("input#DE_Name").val();
                  var IT_Name = $("input#IT_Name").val();
                  var PT_Name = $("input#PT_Name").val();
                  var ES_Name = $("input#ES_Name").val();
                  var ZH_Name = $("input#ZH_Name").val();
                  var RU_Name = $("input#RU_Name").val();

                  $("#card_data_info").load("new_cards_func.php", {add_cards_data_submit:"add_cards_data_submit", Number:Number, EN_Name:EN_Name, Prefix:Prefix, Suffix:Suffix, Stage:Stage, HP:HP, Type_1:Type_1, Type_2:Type_2, Weakness_1:Weakness_1, Weakness_2:Weakness_2, Weakness_X:Weakness_X, Resistance_1:Resistance_1, Resistance_2:Resistance_2, Resistance_X:Resistance_X, Retreat:Retreat, JA_Name:JA_Name, KO_Name:KO_Name, FR_Name:FR_Name, DE_Name:DE_Name, IT_Name:IT_Name, PT_Name:PT_Name, ES_Name:ES_Name, ZH_Name:ZH_Name, RU_Name:RU_Name}, function(responseTxt,statusTxt,xhr){
                     if(statusTxt=="success")
                        console.log("Success");
                        $("#card_data_info").ready(function() {
                           $("div.ptcg_data").on("click", function() {
                              var temp_data_number = $(this).attr( 'id' );
                              $("input#Data_ID").val(temp_data_number);
                              $("div.ptcg_data").hide();
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
      //console.log(temp_attack_name);
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
div.Grass { background-color: #7DB808; }
div.Psychic { background-color: #A65E9A; }
div.Water { background-color: #5BC7E5; }
div.Fighting { background-color: #FF501F; }
div.Fire { background-color: #E24242; }
div.Colorless { background-color: #E5D6D0; }
div.Trainer { background-color: #CBCBCB; }
div.Energy { background-color: #E5D6D0; }
div.Lightning { background-color: #FAB536; }
div.Fairy { background-color: #E03A83; }
div.Darkness { color: #FFFFFF; background-color: #2C2E2B; }
div.Metal { background-color: #8A776E; }
div.Dragon { background-color: #C6A114; }
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
   include_once "../database_var.php";
   include_once "../../../bwahaha.php";


   $con2 = mysql_connect("localhost", $db_username_write, $db_password_write);
   if (!$con2){
      die('Could not connect: ' . mysql_error());
   }else{
      mysql_set_charset('utf8');
   }
   mysql_select_db("vinceoa2_" . $db_name, $con2);
echo '<div class="list Energy">';
echo '<span>Card Number (Printed)</span> <input type="text" id="card_num"> </input> <span>Name</span> <input type="text" id="en_name">';
   echo $db_username_write;
   echo '<br/><span class="filterLabels">Set Language</span>';
   echo '<select id="lang" name="Set Language" >';
   echo '<option value=""></option>';
      $type_Query = "SELECT DISTINCT Set_Language FROM PTCG_SETS ORDER BY Set_Language ASC";

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