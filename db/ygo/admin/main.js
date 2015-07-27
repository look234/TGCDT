(function($, window, document, undefined) {

var availableTags = new Array();
var lastSelected = "";
var lastSelectedColor = "";
var languagesTemp;
var moreInfoTemp;
var $attribute_s;

$(document).ready(function(){
    var buttonName = $('input#search_style_again').val();
    if(buttonName == "Image_View"){
       countingCards2();
       $("button#searchStyle").css("background-image", "url(/images/listview.png)"); 
       $("button#searchStyle").prop('value', 'List_View');
    }else{
       countingCards();
       $("button#searchStyle").css("background-image", "url(/images/imageview.png)"); 
       $("button#searchStyle").prop('value', 'Image_View');
    }

   $("div.Complete").click(function (e) {
      e.preventDefault();
      if(moreInfoTemp == "open"){
         var number = $(this).children("div#setListNum").html();
         var number = $.trim(number);
         $("img.currentCard").remove();
         $(".moreInfoContent").append(
            '<img src="http://ygo.tgcdt.com/images/EN_packs/' + number + '.png" height="365px" class="currentCard" />');
      }
   });

   $("div.greenish").click(function () {

      $("#" + lastSelected).animate({ backgroundColor: lastSelectedColor }, 'fast');
      lastSelected = $(this).attr("id");
      lastSelectedColor = "#1ae466";
      $(this).css("background-color", "#ffffff");
      if(moreInfoTemp == "open"){
      $("#SideMenuBox2").animate({ backgroundColor: "#1ae466" }, 'fast');
      var number = $(this).children("#imageNumber").val();
      var edition = $(this).children("#imageEdition").val();
      var rarity = $(this).children("#imageRarity").val();
      $("img.currentCard").attr("src","http://ygo.tgcdt.com/images/EN_cards/" + number + "_" + edition + "_" + rarity + ".png");
      $("img.currentCard").attr("width","250px");
      }
   });

   $("div.cardTopStyle").click(function () {

      $("#" + lastSelected).animate({ backgroundColor: lastSelectedColor }, 'fast');
      lastSelected = $(this).attr("id");
      lastSelectedColor = "#00afe5";
      $(this).css("background-color", "#ffffff");
      if(moreInfoTemp == "open"){
      $("#SideMenuBox2").animate({ backgroundColor: "#00afe5" }, 'fast');
      var number = $(this).children("#imageNumber").val();
      var edition = $(this).children("#imageEdition").val();
      var rarity = $(this).children("#imageRarity").val();
      $("img.currentCard").attr("src","http://ygo.tgcdt.com/images/EN_cards/" + number + "_" + edition + "_" + rarity + ".png");
      $("img.currentCard").attr("width","250px");
      }
   });

$( ".s_text" ).change(function () {
    var $temp_s = $(this).val();
    $text_s = [ $temp_s ];
}).change();
$( ".s_attribute" ).change(function () {
    var $temp_s = $(this).val();
    $attribute_s = [ $temp_s ];
}).change();
$( ".s_type_1" ).change(function () {
    var $temp_s = $(this).val();
    $type_1_s = [ $temp_s ];
}).change();
$( ".s_type_2" ).change(function () {
    var $temp_s = $(this).val();
    
    if($.isArray($temp_s)){
    $type_2_s = $temp_s;
    } else {
    var $temp_s = $(this).val();
    $type_2_s = [ $temp_s ];
    }

}).change();
$( ".s_level" ).change(function () {
    var $temp_s = $(this).val();
    $level_s = [ $temp_s ];
}).change();
$( ".s_rank" ).change(function () {
    var $temp_s = $(this).val();
    $rank_s = [ $temp_s ];
}).change();
$( ".s_edition" ).change(function () {
    var $temp_s = $(this).val();
    $edition_s = [ $temp_s ];
}).change();
$( ".s_rarity" ).change(function () {
    var $temp_s = $(this).val();
    $rarity_s = [ $temp_s ];
}).change();
$( ".s_sort" ).change(function () {
    var $temp_s = $(this).val();
    $sort_s = $temp_s;
}).change();

$( "#searchNow" ).click(function( event ) {
  event.preventDefault();

  // Send the data using post
  var posting = $.post( "http://ygo.tgcdt.com/ygo_image_search.php", { Card_Name: $text_s ,Attribute: $attribute_s, Type_1: $type_1_s, Type_2: $type_2_s, Level: $level_s, Rank: $rank_s, Edition: $edition_s, Rarity: $rarity_s, Sort_Value: $sort_s } );
 
  // Put the results in a div
  posting.done(function( data ) {
    //var content = $( data ).find( "#content" );
    $( "#Main" ).empty().append( data );
    $( "#searchNow" ).trigger( "myCustomEvent" );
    countingCards2();
  });

});

$( "body" ).on( "myCustomEvent", function(event) {
  $("img.lazy").show().lazyload({
    effect : "fadeIn"
  });

    $("div.greenish_image").click(function () {

      $("#" + lastSelected).animate({ backgroundColor: lastSelectedColor }, 'fast');
      lastSelected = $(this).attr("id");
      lastSelectedColor = "#1ae466";
      $(this).css("background-color", "#ffffff");
      if(moreInfoTemp == "open"){
         $("#SideMenuBox2").animate({ backgroundColor: "#1ae466" }, 'fast');
         var name = $(this).children("#imageName").val();
         var number = $(this).children("#imageNumber").val();
         var edition = $(this).children("#imageEdition").val();
         var rarity = $(this).children("#imageRarity").val();
         var rarityFull = $(this).children("#imageRarityFull").val();
         $("div#SideMenuBox2").html(name + "<br/>" + number + " - " + edition + " - " + rarityFull);
      }
    });

    $("div.cardTopStyle_image").click(function () {

      $("#" + lastSelected).animate({ backgroundColor: lastSelectedColor }, 'fast');
      lastSelected = $(this).attr("id");
      lastSelectedColor = "#00afe5";
      $(this).css("background-color", "#ffffff");
      if(moreInfoTemp == "open"){
         $("#SideMenuBox2").animate({ backgroundColor: "#00afe5" }, 'fast');
         var name = $(this).children("#imageName").val();
         var number = $(this).children("#imageNumber").val();
         var edition = $(this).children("#imageEdition").val();
         var rarity = $(this).children("#imageRarity").val();
         var rarityFull = $(this).children("#imageRarityFull").val();
         $("div#SideMenuBox2").html(name + "<br/>" + number + " - " + edition + " - " + rarityFull);
      }
    });
   $("button.addButtons2").click(function(){
      $tempVal = $(this).prev().val();
      $(this).prev().val(parseInt($tempVal) + 1);
      var $currentId = $(this).prev().attr('id');
      var $currentName = $(this).prev().attr('name');
      var $value = $(this).prev().val();
      var $cardName = $(this).parent().parent().children("#imageName").val();
      var $activity = "Added";
      $(this).parent().parent().css("background-color", "#1ae466");
      $.post("update.php", { name: $currentName, id: $currentId, value: $value, cardName: $cardName, activity: $activity });
      countingCards2();
   });
   $("button.minusButtons2").click(function(){
      $tempVal = $(this).next().val();
      if($tempVal != 0){
         $(this).next().val(parseInt($tempVal) - 1);
         var $currentId = $(this).next().attr('id');
         var $currentName = $(this).next().attr('name');
         var $value = $(this).next().val();
         var $aCount = 0;
         var $cardName = $(this).parent().parent().children("#imageName").val();
         var $activity = "Removed";
         if($value == 0){
            $(this).parent().parent().children("span").each(function () {
               if($(this).children("input").val() > 0){
                  $aCount++;
               }
            });
            if($aCount > 0){
               $(this).parent().parent().css("background-color", "#1ae466");
            }else{
               $(this).parent().parent().css("background-color", "#00afe5");
            }
         }

         $.post("update.php", { name: $currentName, id: $currentId, value: $value, cardName: $cardName, activity: $activity });
      }
      countingCards2();
   });
});

   $('#advancedShow').click(function() {
      $('.advancedSearch').toggle('slow', function () {
      });
   });
   $('.languages').click(function() {
      if(languagesTemp == "open"){
         $('#SideMenuBox3').css( "background-color", "#4c4c4c" );
         languagesTemp = "closed";
      }else{
         $('#SideMenuBox3').css( "background-color", "#363636" );
         languagesTemp = "open";
      }
      $('.languagesContent').toggle('slow', function () {
      });
   });
   $('.moreInfo').click(function() {
      if(moreInfoTemp == "open"){
         $('#SideMenuBox2').css( "background-color", "#4c4c4c" );
         moreInfoTemp = "closed";
      }else{
         $('#SideMenuBox2').css( "background-color", "#363636" );
         moreInfoTemp = "open";
      }
      $('.moreInfoContent').toggle('slow', function() {
      });
   });

   $('button#onlyMine').click(function() {
      $('button#onlyMine').toggle();
      $('button#allCards').show();
      $("div.cardTopStyle").toggle();
      $("div.cardTopStyle_image").toggle();
   });

   $('button#notMine').click(function() {
      $('button#notMine').toggle();
      $('button#allCards').show();
      $("div.greenish").toggle();
      $("div.greenish_image").toggle();
   });
   $('button#allCards').click(function() {
      $('button#onlyMine').show();
      $('button#notMine').show();
      $('button#allCards').toggle();
      $("div.cardTopStyle").show();
      $("div.cardTopStyle_image").show();
      $("div.greenish").show();
      $("div.greenish_image").show();
   });

   $('button#searchStyle').click(function() {
      var buttonName = $('button#searchStyle').val();
      if(buttonName == "Image_View"){
         window.location.assign("http://ygo.tgcdt.com/?search_Style=Image_View");
      }else{
         window.location.assign("http://ygo.tgcdt.com/?search_Style=List_View");
      }
   });

   $('button#clearAll').click(function() {
      $.post("clearSearchSession.php", { clearAll: "yes" });
      window.location.assign("http://ygo.tgcdt.com/");
   });

   $('.searchFilters').click(function() {
      var curName = $(this).attr("name");
      var curValue = $(this).val();
      var url = "clearSearchSession.php?" + curName + "=" + curValue;
      $.post(url, { name: curName , value: curValue })
         .done(function(data) {
         window.location.assign("http://ygo.tgcdt.com/new_home.php");
      });
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

    var interval = 5500;   //number of mili seconds between each call
    var refresh = function() {
        $.ajax({
            url: "http://ygo.tgcdt.com/random_card_EN.php",
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

   $("button.addButtons").click(function(){
      $tempVal = $(this).prev().val();
      $(this).prev().val(parseInt($tempVal) + 1);
      var $currentId = $(this).prev().attr('id');
      var $currentName = $(this).prev().attr('name');
      var $value = $(this).prev().val();
      var $cardName = $(this).parent().children("#cardName").children().children("#imageName").val();
      var $activity = "Added";
      $(this).parent().css("background-color", "#1ae466");
      $(this).parent().children("div").children("span").css("background-color", "#1ae466");
      $.post("update.php", { name: $currentName, id: $currentId, value: $value, cardName: $cardName, activity: $activity });
      countingCards();
   });
   $("button.minusButtons").click(function(){
      $tempVal = $(this).next().val();
      if($tempVal != 0){
         $(this).next().val(parseInt($tempVal) - 1);
         var $currentId = $(this).next().attr('id');
         var $currentName = $(this).next().attr('name');
         var $value = $(this).next().val();
         var $aCount = 0;
         var $cardName = $(this).parent().children("#cardName").children().children("#imageName").val();
         var $activity = "Removed";
         if($value == 0){
            $(this).parent().parent().children("span").each(function () {
               if($(this).children("input").val() > 0){
                  $aCount++;
               }
            });
            if($aCount > 0){
               $(this).parent().css("background-color", "#1ae466");
               $(this).parent().children("div").children("span").css("background-color", "#1ae466");
            }else{
               $(this).parent().css("background-color", "#00afe5");
               $(this).parent().children("div").children("span").css("background-color", "#00afe5");
            }
         }

         $.post("update.php", { name: $currentName, id: $currentId, value: $value, cardName: $cardName, activity: $activity });
      }
      countingCards();
   });


   $("div.HeaderMenuItem").mouseenter(function(){
      $(this).children("#hiddenHeaderMenu").show('fast');
   });
   $("div.HeaderMenuItem").mouseleave(function(){
      $(this).children("#hiddenHeaderMenu").hide('fast');
   });
   $("div.HeaderMenuItem").click(function(){
      $(this).children("#hiddenHeaderMenu").show('fast');
   });
});

function changeImage(img){
   document.getElementById('loginButton').src="http://ygo.tgcdt.com/images/login2hover.png";
}
function changeImageBack(img){
   document.getElementById('loginButton').src="http://ygo.tgcdt.com/images/login2.png";
}

function countingCards(){
   var numOfCards = $("#Main").children().children().children("input#cardCounts").length;
   var i = 0;
   var j = 0;
   $("#Main").children().children().each(function (i) {
      var temp1 = $(this).children("input#cardCounts").val();
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

function countingCards2(){
      var numOfCards = $("#Main").children().children().children().children("input#cardCounts").length;
      var i = 0;
      var j = 0;
      $("#Main").children().children().children().each(function (i) {
        var temp1 = $(this).children("input#cardCounts").val();
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