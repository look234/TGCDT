(function($, window, document, undefined) {

var availableTags = new Array();
var lastSelected = "";
var lastSelectedColor = "";
var languagesTemp;
var moreInfoTemp;
var $attribute_s;
var search_type = "search_image.php";
var $button_1 = "";
var $button_2 = "";
var $button_3 = "";
var $button_4 = "";
var $button_5 = "";
var $button_6 = "";
var $button_7 = "";
var $button_8 = "";
var $button_c_1 = "";
var $button_c_2 = "";
var $atk_min_s = "";
var $atk_max_s = "";
var $def_min_s = "";
var $def_max_s = "";
var $weeMenuHideShow = "";
var $sort_s = "";
var $text_s = "";
var $showOptions ="";

$(document).ready(function(){

   var buttonName = $('input#search_style_again').val();
   var subdomain = $('input#subdomain').val();
   var temp_session_lang = $('input#temp_session_lang').val();

   function isBreakpoint( alias ) {
      return $('.device-' + alias).is(':visible');
   }

   if( isBreakpoint('xs') ) {
      $("#xsmallShowOptions").show();
      $weeMenuHideShow = "show";
   }


   $(".quick_search_set").click(function() {
      $text_s = $(this).text();
      $sort_s = "Name";
      alert($sort_s + $text_s);
      window.location.replace("http://ptcg.tgcdt.com/?page=collection");
      //$("div#theBusiness").load("ygo_new_results.php", function( response, status, xhr ) {
      //   if ( status == "error" ) {
      //      var msg = "Sorry but there was an error: ";
      //      $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
      //   }else{
      //      myFunction(event);
      //   }
      //});


      //alert($sort_s + $text_s + " 2");

   });


   $( window ).on( "orientationchange", function( event ) {
      if( isBreakpoint('xs') ) {
         if(event.orientation == "landscape"){
            $( ".wootG" ).removeClass( "col-xs-12" );
            $( ".wootG" ).addClass( "col-xs-4" );
            //alert("we be in landscape");
         }
         if(event.orientation == "portrait"){
            //alert("we be in landscape");
            $( ".wootG" ).removeClass( "col-xs-4" );
            $( ".wootG" ).addClass( "col-xs-12" );
         }
      }
   });
$( ".s_atk_min" ).change(function () {
    var $temp_s = $(this).val();
    $atk_min_s = [ $temp_s ];
}).change();
$( ".s_atk_max" ).change(function () {
    var $temp_s = $(this).val();
    $atk_max_s = [ $temp_s ];
}).change();
$( ".s_def_min" ).change(function () {
    var $temp_s = $(this).val();
    $def_min_s = [ $temp_s ];
}).change();
$( ".s_def_max" ).change(function () {
    var $temp_s = $(this).val();
    $def_max_s = [ $temp_s ];
}).change();
$( ".s_text" ).change(function () {
    var $temp_s = $(this).val();
    $text_s = [ $temp_s ];
}).change();
$( ".button_1" ).change(function () {
    var $temp_s = $(this).val();
    $button_1 = [ $temp_s ];
}).change();
$( ".button_2" ).change(function () {
    var $temp_s = $(this).val();
    $button_2 = [ $temp_s ];
}).change();
$( ".button_c_1" ).change(function () {
    var $temp_s = $(this).val();
    if($.isArray($temp_s)){
    $button_c_1 = $temp_s;
    } else {
    var $temp_s = $(this).val();
    $button_c_1 = [ $temp_s ];
    }
}).change();
$( ".button_c_2" ).change(function () {
    var $temp_s = $(this).val();
    if($.isArray($temp_s)){
    $button_c_2 = $temp_s;
    } else {
    var $temp_s = $(this).val();
    $button_c_2 = [ $temp_s ];
    }
}).change();
$( ".button_3" ).change(function () {
    var $temp_s = $(this).val();
    $button_3 = [ $temp_s ];
}).change();
$( ".button_4" ).change(function () {
    var $temp_s = $(this).val();
    $button_4 = [ $temp_s ];
}).change();
$( ".button_5" ).change(function () {
    var $temp_s = $(this).val();
    $button_5 = [ $temp_s ];
}).change();
$( ".button_6" ).change(function () {
    var $temp_s = $(this).val();
    $button_6 = [ $temp_s ];
}).change();
$( ".button_7" ).change(function () {
    var $temp_s = $(this).val();
    $button_7 = [ $temp_s ];
}).change();
$( ".button_8" ).change(function () {
    var $temp_s = $(this).val();
    $button_8 = [ $temp_s ];
}).change();
$( ".s_sort" ).change(function () {
    var $temp_s = $(this).val();
    $sort_s = $temp_s;
}).change();


$( "#xsmallShowOptions" ).click(function() {
   if($weeMenuHideShow != "show"){
      $( "#search-content" ).removeClass( "col-xs-10" );
      $( "#search-content" ).addClass( "hidden-xs" );
      $( "#hiddenSideMenu" ).removeClass( "col-xs-2" );
      $( "#hiddenSideMenu" ).addClass( "col-xs-12" );
      $( "#SideMenu" ).removeClass( "col-xs-2" );
      $( "#SideMenu" ).addClass( "col-xs-12" );
      $( ".list-group" ).show();
      $weeMenuHideShow = "show";
   }else{
      $( ".list-group" ).hide();
      $( "#search-content" ).removeClass( "hidden-xs" );
      $( "#search-content" ).addClass( "col-xs-10" );
      $( "#hiddenSideMenu" ).addClass( "col-xs-12" );
      $( "#hiddenSideMenu" ).addClass( "col-xs-2" );
      $( "#SideMenu" ).removeClass( "col-xs-12" );
      $( "#SideMenu" ).addClass( "col-xs-2" );
      $weeMenuHideShow = "hide";
   }
});

function AnimateRotate(d){
    var elem = $("#loadingImage");

    $({deg: 0}).animate({deg: d}, {
        duration: 2000,
        step: function(now){
            elem.css({
                 transform: "rotate(" + now + "deg)"
            });
        }
    });
}

$( "#searchNow" ).click(function( event ) {
   if( isBreakpoint('xs') ) {
      $( ".list-group" ).hide();
      $( "#search-content" ).removeClass( "hidden-xs" );
      $( "#search-content" ).addClass( "col-xs-10" );
      $( "#hiddenSideMenu" ).addClass( "col-xs-2" );
      $( "#SideMenu" ).removeClass( "col-xs-12" );
      $( "#SideMenu" ).addClass( "col-xs-2" );
      $weeMenuHideShow = "hide";
      myFunction(event);
   }else{
      myFunction(event);
   }
});

$( "#searchNow_sets" ).click(function( event ) {
   if( isBreakpoint('xs') ) {
      $( ".list-group" ).hide();
      $( "#search-content" ).removeClass( "hidden-xs" );
      $( "#search-content" ).addClass( "col-xs-10" );
      $( "#hiddenSideMenu" ).addClass( "col-xs-2" );
      $( "#SideMenu" ).removeClass( "col-xs-12" );
      $( "#SideMenu" ).addClass( "col-xs-2" );
      $weeMenuHideShow = "hide";
      myFunction2(event);
   }else{
      myFunction2(event);
   }
});


function myFunction2(event) {
  event.preventDefault();

$("<div><div style='position: relative; display: table-cell; top: -50px; vertical-align: middle;'><img src='http://ptcg.tgcdt.com/images/back1.png' id='loadingImage' style='padding: 0px; opacity: 1;' height='150px' /></div></div>").css({
    bottom: "5px",
    display: "table",
    position: "fixed",
    width: "100%",
    height: "100%",
    top: 0,
    left: 0,
    background: 'rgba(0,0,0,0.5)',
    color: "white",
    'text-align': "center",
    'font-size': "30px"
}).appendTo($("#Main").css("position", "relative"));

  // Send the data using post
  var posting = $.post( "http://" + subdomain + ".tgcdt.com/search_sets_list.php" );
  AnimateRotate(360);


  // Put the results in a div
  posting.done(function( data ) {
    //var content = $( data ).find( "#content" );
    $( "#Main" ).empty().append( data );
    $( "#searchNow_sets" ).trigger( "myCustomEvent" );
    countingCards();
  });
}




function myFunction(event) {
  event.preventDefault();

$("<div><div style='position: relative; display: table-cell; top: -50px; vertical-align: middle;'><img src='http://ptcg.tgcdt.com/images/back1.png' id='loadingImage' style='padding: 0px; opacity: 1;' height='150px' /></div></div>").css({
    bottom: "5px",
    display: "table",
    position: "fixed",
    width: "100%",
    height: "100%",
    top: 0,
    left: 0,
    background: 'rgba(0,0,0,0.5)',
    color: "white",
    'text-align': "center",
    'font-size': "30px"
}).appendTo($("#Main").css("position", "relative"));

  // Send the data using post
  var posting = $.post( "http://" + subdomain + ".tgcdt.com/" + search_type + "", { Card_Name: $text_s , button_1: $button_1, button_2: $button_2, button_3: $button_3, button_4: $button_4, button_5: $button_5, ATK_min: $atk_min_s, ATK_max: $atk_max_s, DEF_min: $def_min_s, DEF_max: $def_max_s, button_6: $button_6, button_7: $button_7, button_8: $button_8, button_c_1: $button_c_1, button_c_2: $button_c_2, Sort_Value: $sort_s, showOptions:$showOptions } );
  AnimateRotate(360);


  // Put the results in a div
  posting.done(function( data ) {
    //var content = $( data ).find( "#content" );
    $( "#Main" ).empty().append( data );
    $( "#searchNow" ).trigger( "myCustomEvent" );
    countingCards();
  });
}

function scrollToAnchor(aid){
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}








$(document).keypress(function( event ) {
  if ( event.which == 13 ) {
     event.preventDefault();
     var $temp_s = $('#autocomplete').val();
     $text_s = [ $temp_s ];
     myFunction(event);
  }
});

$( "body" ).on( "myCustomEvent", function(event) {
     scrollToAnchor('id3');
  $("img.lazy").show().lazyload({
    effect : "fadeIn"
  });



   $("button.modal-set-view").click(function() {
      $("div.modal-set-info").show();
      $("div.modal-card-info").hide();
      $("div.modal-shop-view").hide();
   });

   $("button.modal-picture-view").click(function() {
      $("div.modal-set-info").hide();
      var $Data_ID = $(this).find(".Data_ID").val();
      var $Text_Language = $(this).find(".Card_Language_Val").val();

      $.post( "test_card_text_grab.php", { Data_ID: $Data_ID, Text_Language: $Text_Language })
      .done(function( data ) {
      $( ".CardInfoHolder" + $Data_ID ).html( data );
   });
      $("div.modal-card-info").show();
      $("div.modal-shop-view").hide();
   });

   $("button.modal-shop-view").click(function() {
      $("div.modal-set-info").hide();
      $("div.modal-card-info").hide();
      var modalID = $(this).val();
      var cardName = $("div#Modal_" + modalID).find(".ebay_cardName").val();
      var cardNumber = $("div#Modal_" + modalID).find(".ebay_cardNumber").val();
      var cardSet = $("div#Modal_" + modalID).find(".ebay_cardSet").val();
      var cardRarity = $("div#Modal_" + modalID).find(".ebay_cardRarity").val();
      var cardEdition = $("div#Modal_" + modalID).find(".ebay_cardEdition").val();
      $("div#Modal_" + modalID).find("div.modal-shop-view").load("ebay.php", {cardName:cardName, cardNumber:cardNumber, cardSet:cardSet, cardRarity:cardRarity, cardEdition:cardEdition}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            //$( "body" ).trigger( "myCustomEvent" );
         if(statusTxt=="error")
            console.log("error");
      });
      $("div.modal-shop-view").show();
   });

$('.modal-cards').on('hidden.bs.modal', function () {
      $("div.modal-set-info").hide();
      $("div.modal-card-info").show();
      $("div.modal-shop-view").hide();
});

$('.modal-cards').on('shown.bs.modal', function () {

   var $Data_ID = $(this).find(".Data_ID").val();
   var $Text_Language = $(this).find(".Card_Language_Val").val();

   $.post( "test_card_text_grab.php", { Data_ID: $Data_ID, Text_Language: $Text_Language })
      .done(function( data ) {
      $( ".CardInfoHolder" + $Data_ID ).html( data );
   });
})

$(".prevModal").click(function() {
   var current = $(this).val();
   $('#Modal_' + (parseInt(current) - 1)).modal('show');
   $('#Modal_' + current).modal('hide');
});

$(".nextModal").click(function() {
   var current = $(this).val();
   $('#Modal_' + (parseInt(current) + 1)).modal('show');
   $('#Modal_' + current).modal('hide');
});


$('.modal-card-lang').click( function () {

   var $Data_ID = $(this).parent().find(".Data_ID").val();
   var $Text_Language = $(this).val();

   //alert($Data_ID + $Text_Language);
   $.post( "test_card_text_grab.php", { Data_ID: $Data_ID, Text_Language: $Text_Language })
      .done(function( data ) {
      $( ".CardInfoHolder" + $Data_ID ).html( data );
   });
});

    $("div.greenish_image").click(function () {
      $("#" + lastSelected).children(".img-thumbnail").animate({ backgroundColor: lastSelectedColor }, 'fast');
      lastSelected = $(this).attr("id");
      lastSelectedColor = "#1ae466";
      $(this).children(".img-thumbnail").css("background-color", "#ffffff");
      if(moreInfoTemp == "open"){
         $("#SideMenuBox2").animate({ backgroundColor: "#1ae466" }, 'fast');
         var name = $(this).children("#imageName").val();
         var set_name = $(this).children("#imageSetName").val();
         var number = $(this).children("#imageNumber").val();
         var edition = $(this).children("#imageEdition").val();
         var rarity = $(this).children("#imageRarity").val();
         var rarityFull = $(this).children("#imageRarityFull").val();
         var effect = $(this).children("#imageEffect").val();
         var flavor = $(this).children("#imageFlavor").val();
         var someHtmlString = "<span id='box2_name'>" + name + "</span><br/><span id='box2_set'>" + set_name + "</span><br/><span id='box2_num'>" + number + " - " + edition + " - " + rarityFull + "</span><br/><br/><span id='box2_effect'>" + effect + "</span><br/><br/><span id='box2_flavor'>" + flavor + "</span>";
         $("div#SideMenuBox2").html(someHtmlString);
      }
    });

    $("div.cardTopStyle_image").click(function () {
      $("#" + lastSelected).children(".img-thumbnail").animate({ backgroundColor: lastSelectedColor }, 'fast');
      lastSelected = $(this).attr("id");
      lastSelectedColor = "#00afe5";
      $(this).children(".img-thumbnail").css("background-color", "#ffffff");
      if(moreInfoTemp == "open"){
         $("#SideMenuBox2").animate({ backgroundColor: "#00afe5" }, 'fast');
         var name = $(this).children("#imageName").val();
         var set_name = $(this).children("#imageSetName").val();
         var number = $(this).children("#imageNumber").val();
         var edition = $(this).children("#imageEdition").val();
         var rarity = $(this).children("#imageRarity").val();
         var rarityFull = $(this).children("#imageRarityFull").val();
         var effect = $(this).children("#imageEffect").val();
         var flavor = $(this).children("#imageFlavor").val();
         var someHtmlString = "<span id='box2_name'>" + name + "</span><br/><span id='box2_set'>" + set_name + "</span><br/><span id='box2_num'>" + number + " - " + edition + " - " + rarityFull + "</span><br/><br/><span id='box2_effect'>" + effect + "</span><br/><br/><span id='box2_flavor'>" + flavor + "</span>";
         $("div#SideMenuBox2").html(someHtmlString);
      }
    });
   $("button.addButtons2").click(function(){
      $(this).parents(".caption").addClass("hasCard");
      $(this).parents(".wootG").addClass("hasCards");

      var $currentName = $(this).parent().children("#cardCounts").attr('name');
      $tempVal = $(this).parent().children("#cardCounts").val();
      $(this).parent().children("#cardCounts").val(parseInt($tempVal) + 1);
      $(this).parent().children("#cardCounts").children().html(parseInt($tempVal) + 1);
      var $value = $(this).parent().children("#cardCounts").val();
      $.post("update.php", { id: $currentName, value: $value, type: "add" });
      countingCards();
   });
   $("button.minusButtons2").click(function(){
      $tempVal = $(this).parent().children("#cardCounts").val();
      if($tempVal != 0){
         var $currentName = $(this).parent().children("#cardCounts").attr('name');
         $(this).parent().children("#cardCounts").val(parseInt($tempVal) -1);
         $(this).parent().children("#cardCounts").children().html(parseInt($tempVal) - 1);
         var $value = $(this).parent().children("#cardCounts").val();
         if($value == 0){
            $(this).parents(".caption").removeClass("hasCard");
            $(this).parents(".wootG").removeClass("hasCards");
            $(this).parent().parent().children("span").each(function () {
               if($(this).parent().children("#cardCounts").val() > 0){
                  $aCount++;
               }
            });
         }
         $.post("update.php", { id: $currentName, value: $value, type: "remove" });
      }
      countingCards();
   });
});

   $('button#onlyMine').click(function() {
      //if($showOptions == "onlyMine"){
         $("div.hasCards").show();
         $('button#notMine').show();
      //}
      $showOptions = "onlyMine";
      $("div.doesNotHaveCards").hide();
      $('button#onlyMine').hide();
      $('button#allCards').show();
      $('body,html').scroll();
   });

   $('button#notMine').click(function() {
      //if($showOptions == "onlyMine"){
         $("div.doesNotHaveCards").show();
         $('button#onlyMine').show();
      //}
      $showOptions = "doNotHave";
      $("div.hasCards").hide();
      $('button#notMine').hide();
      $('button#allCards').show();
      $('body,html').scroll();
   });
   $('button#allCards').click(function() {
      $showOptions = "";
      $("div.doesNotHaveCards").show();
      $("div.hasCards").show();
      $('button#onlyMine').show();
      $('button#notMine').show();
      $('button#allCards').toggle();
      $('body,html').scroll();
   });


   $('button#searchStyle').click(function(event) {
      var buttonName = $('button#searchStyle').val();
      if(search_type == "ygo_search.php"){
         countingCards();
         $("button#searchStyle").html('<span class="glyphicon glyphicon-th-list" aria-hidden="true" style="font-size: 2.5em; color: Teal;"></span>'); 
         $("button#searchStyle").prop('value', 'Image_View');
         search_type = "search_image.php";
         myFunction(event);
      }else{
         countingCards();
         $("button#searchStyle").html('<span class="glyphicon glyphicon-th" aria-hidden="true" style="font-size: 2.5em; color: Teal;"></span>'); 
         $("button#searchStyle").prop('value', 'List_View');
         search_type = "ygo_search.php";
         myFunction(event);
      }
   });

   $('button#clearAll').click(function() {
      $.post("clearSearchSession.php", { clearAll: "yes" });
      window.location.assign("http://" + subdomain + ".tgcdt.com/");
   });

   $.getJSON("AutoCompleteData.php", { format: "json" }, function(json) {
      $.each(json, function(i, val) {
         availableTags[i] = val;
      });
   });

   $( "#autocomplete" ).autocomplete({
      minLength: 3,
      source: availableTags
   });

   if ($('#HomeBox5_Inside').length){
   var interval = 5500;   //number of mili seconds between each call
   var refresh = function() {
        $.ajax({
            url: "http://" + subdomain + ".tgcdt.com/random_card.php",
            cache: false,
            success: function(html) {
                $('#HomeBox5_Inside').fadeIn('slow').html(html);
                setTimeout(function() {
                    refresh();
                }, interval);
            }
        });
   };
   refresh();
   }
});

function countingCards(){
      var numOfCards = $("button#cardCounts").length;
      var i = 0;
      var j = 0;
      $("button#cardCounts").each(function (i) {
        var temp1 = $(this).val();
        if( temp1 > 0 ){
          j++;
        }
      });
      if(j == 0 && numOfCards == 0){
         var percentage = 0;
      }else{
         var percentage = (j / numOfCards) * 100;
      }
      percentage = percentage.toFixed(0);
      $("div#SideMenuBox3Mini_2").html(j + " of " + numOfCards + " (" + percentage + "%)");
}

function totalCardCount(){
   $.post('collectionGrab.php', function(data) {
      $('div#SideMenuBox3Mini_1').html(data);
   });
}


})(jQuery, window, document);