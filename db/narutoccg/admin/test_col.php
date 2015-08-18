<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$(document).ready(function(){
   var submitValues = [];
   var submitValueNames = [];

   $("button#theGo").click(function() {
         var submitType = "CARDS";
         var seriesName_s = $('#SeriesName').val();
         $("div.add_CARDS").children('input').each(function () {
            var s_values = $( this ).val();
            var s_names = $( this ).attr('name');
            submitValues.push(s_values);
            submitValueNames.push(s_names);
         });
         var s_values = $("#Data_ID").val();
         submitValues.push(s_values);
         submitValueNames.push("Data_ID");
         var s_values = $("#Text_ID").val();
         submitValues.push(s_values);
         submitValueNames.push("Text_ID");
         var s_values = $("#Collect_ID").val();
         submitValues.push(s_values);
         submitValueNames.push("Collect_ID");
         var set_id = $("#Set_ID").val();
         $("#" + submitType + "Output").load("test_col_func.php", {seriesName:seriesName_s, submitType:submitType, submitValues:submitValues, submitValueNames:submitValueNames, set_id:set_id, funcType:"FinalSubmit"}, function(responseTxt,statusTxt,xhr){
            if(statusTxt=="success")
               console.log("Success");
               $( "body" ).trigger( "myCustomEvent" );
            if(statusTxt=="error")
               console.log("error");
         });
         $('#Set_ID').css({ 'background': 'White' });
         $('#Data_ID').css({ 'background': 'White' });
         $('#Text_ID').css({ 'background': 'White' });
         $('#Collect_ID').css({ 'background': 'White' });
         submitValues = [];
         submitValueNames = [];
   });

   $("button.addInfo").click(function() {
      console.log("woot");
      var seriesName = $('#SeriesName').val();
      var addType = $(this).attr("id");
      $("#search_" + addType + "Output").empty();
      $("#" + addType + "Output").load("test_col_func.php", {seriesName:seriesName, addType:addType, funcType:"AddInfo"}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $( "body" ).trigger( "myCustomEvent" );
            var temp_lang = $("#Card_Language").val();
            $("#Text_Language").val(temp_lang);
         if(statusTxt=="error")
            console.log("error");
      });
   });

   $("button.searchInfo").click(function() {
      console.log("woot2");
      var seriesName_s = $('#SeriesName').val();
      var searchType = $(this).attr("id");
      var searchTypeExtra = $(this).attr("name");
      var searchValue = $('input#' + searchType + "_value").val();
      $("#" + searchTypeExtra + "Output").empty();
      console.log(seriesName_s + " " + searchType + " " + searchValue);
      $("#" + searchType + "Output").load("test_col_func.php", {seriesName:seriesName_s, searchType:searchType, searchValue:searchValue, funcType:"SearchInfo"}, function(responseTxt,statusTxt,xhr){
         if(statusTxt=="success")
            console.log("Success");
            $( "body" ).trigger( "myCustomEvent" );
         if(statusTxt=="error")
            console.log("error");
      });
      $("#CARDSOutput").empty();
   });

   $(document).on("myCustomEvent", 'body', function() {
      //console.log("All Active");
      //$( "input" ).each(function( index ) {
      //   console.log( index + ": " + $( this ).val() );
      //});

      $("div.pass_DATA").click(function() {
         var $temp_val = $(this).attr("id");
         $('#Data_ID').val($temp_val);
         $('#Data_ID').css({ 'background': 'GreenYellow' });
         $("div.pass_DATA").hide();
         $("div#" + $temp_val + ".pass_DATA").show();
      });
      $("div.pass_TEXT").click(function() {
         var $temp_val = $(this).attr("id");
         $('#Text_ID').val($temp_val);
         $('#Text_ID').css({ 'background': 'GreenYellow' });
         $("div.pass_TEXT").hide();
         $("div#" + $temp_val + ".pass_TEXT").show();
      });
      $("div.pass_COLLECT").click(function() {
         var $temp_val = $(this).attr("id");
         $('#Collect_ID').val($temp_val);
         $('#Collect_ID').css({ 'background': 'GreenYellow' });
         $("div.pass_COLLECT").hide();
         $("div#" + $temp_val + ".pass_COLLECT").show();
      });
      $("div.pass_SETS").click(function() {
         var $temp_val = $(this).attr("id");
         $('#Set_ID').val($temp_val);
         $('#Set_ID').css({ 'background': 'GreenYellow' });
         $("div.pass_SETS").hide();
         $("div#" + $temp_val + ".pass_SETS").show();
      });

      $(".add_cards_submit").click(function() {
         var submitType = $(this).attr("name");
         var seriesName_s = $('#SeriesName').val();
         $("div.add_" + submitType).children('input').each(function () {
            var s_values = $( this ).val();
            var s_names = $( this ).attr('name');
            submitValues.push(s_values);
            submitValueNames.push(s_names);
         });
         $("#" + submitType + "Output").load("test_col_func.php", {seriesName:seriesName_s, submitType:submitType, submitValues:submitValues, submitValueNames:submitValueNames, funcType:"SubmitInfo"}, function(responseTxt,statusTxt,xhr){
            if(statusTxt=="success")
               console.log("Success");
               $( "body" ).trigger( "myCustomEvent" );
            if(statusTxt=="error")
               console.log("error");
         });
         //console.info( submitValues );

         submitValues = [];
         submitValueNames = [];
      });
   });
});
</script>
<body>
<table><tr><td valign="top" style="width: 50%;">
<?php
    include "test_col_func.php";

    $tables = array("CARDS", "DATA", "TEXT", "COLLECT");
    echo '<input type="hidden" id="SeriesName" value="' . $series_name . '" />';
    buildFields($series_name, "CARDS");
    echo '<br/><span id="CARDSOutput"></span>';
    echo '<br/><input type="text" size="4" name="Set_ID" id="Set_ID"></input> <input type="text" name="search_sets" id="search_SETS_value"></input> <button class="searchInfo" name="SETS" id="search_SETS">Search Card Sets</button> <button class="addInfo" id="SETS">Add Card Sets</button><br/><span id="SETSOutput"></span><span id="search_SETSOutput"></span>';
    echo '<br/><input type="text" size="4" name="Data_ID" id="Data_ID"></input> <input type="text" name="search_data" id="search_DATA_value"></input> <button class="searchInfo" name="DATA" id="search_DATA">Search Card Data</button> <button class="addInfo" id="DATA">Add Card Data</button><br/><span id="DATAOutput"></span><span id="search_DATAOutput"></span>';
    //buildFields($series_name, "DATA");
    echo '<br/><input type="text" size="4" name="Text_ID" id="Text_ID"></input> <input type="text" name="search_text" id="search_TEXT_value"></input> <button class="searchInfo" name="TEXT" id="search_TEXT">Search Card Text</button> <button class="addInfo" id="TEXT">Add Card Text</button><br/><span id="TEXTOutput"></span><span id="search_TEXTOutput"></span>';
    //buildFields($series_name, "TEXT");
    echo '<br/><input type="text" size="4" name="Collect_ID" id="Collect_ID"></input> <input type="text" name="search_collect" id="search_COLLECT_value"></input> <button class="searchInfo" name="COLLECT" id="search_COLLECT">Search Card Collect</button> <button class="addInfo" id="COLLECT">Add Card Collect</button><br/><span id="COLLECTOutput"></span><span id="search_COLLECTOutput"></span>';
    //buildFields($series_name, "COLLECT");

?>

<br/><br/><button id="theGo" type="submit">GO</button>
</td><td style="width: 50%;"><iframe src='http://www.tradecardsonline.com/im/selectCard/game_id/48' height='1000px' width='800px'></iframe></td></tr></table>
</body>