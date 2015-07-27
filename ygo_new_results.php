<style>
.list-group-item{
  background-color: #4c4c4c;
  border: none !important;
}

.iconButtons {
padding: 7px !important;
}
</style>


<?php

echo '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 info-panel nopadding" style="position:fixed; top:50px;" id="SideMenu" >';
echo '<div class="row-fluid no-gutters">';
echo '<div id="SideMenuBox4">';
if($_GET['user'] == ''){
   echo 'My ';
}else{
   echo $_GET['user'] . "'s ";
}
if($_SESSION['myusername'] == $_GET['user']){
   echo 'My ';
}
//echo ' ' . $languages_full[$_SESSION['language']] . ' ';
switch($_SESSION['mylist']){
   case 'checklist':
      echo 'Collection';
      break;
   case 'tradelist':
      echo 'Trade List';
      break;
   case 'wishlist':
      echo 'Wish List';
      break;
}
echo '<div id="SideMenuBox3Mini_2"></div>';
echo '</div>'; // SideMenuBox4

echo '<div id="SideMenuBox1">';
echo '<label for="autocomplete"></label>';
echo '<input type="text" class="s_text" id="autocomplete" name="Card_Name" style="border-radius:5px; border-width:0px; width:100%; height:25px;">';
?>
<div style="text-align:center;">
   <button class="iconButtons" type="button" id="searchNow"><span class="glyphicon glyphicon-search" aria-hidden="true" style="font-size: 2.5em; color: white;"></span></button>
   <button class="iconButtons" type="button" id="onlyMine" ><span class="glyphicon glyphicon-ok-circle" aria-hidden="true" style="font-size: 2.5em; color: #1ae466;"></span></button>
   <button class="iconButtons3" type="button" id="allCards" style="display: none;"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true" style="font-size: 2.5em;"></span></button>
   <button class="iconButtons" type="button" id="notMine" ><span class="glyphicon glyphicon-ban-circle" aria-hidden="true" style="font-size: 2.5em; color: #00afe5;"></span></button>
   <button class="iconButtons" type="button" id="searchStyle" value="List_View"><span class="glyphicon glyphicon-th" aria-hidden="true" style="font-size: 2.5em; color: Gray;"></span></button>
   <button class="iconButtons" type="button" id="clearAll" ><span class="glyphicon glyphicon-remove" aria-hidden="true" style="font-size: 2.5em; color: Tomato;"></span></button>
   <button class="iconButtons" type="button" id="xsmallShowOptions" style="display: none;"><span class="glyphicon glyphicon-share-alt" aria-hidden="true" style="font-size: 2.5em; color: Lime;"></span></button>
</div>

<div class="advancedSearch" id="advancedSearch">

<?php

echo '<ul class="list-group">';



   foreach($button_values as $b_key => $b_value){
      echo '<li class="list-group-item"><span class="filterLabels">' . $b_value[1] . '</span>';
      echo '<select class="' . $b_key . '" name="' . $b_value[0] . '" style="width:120px; float:right;" >';
      echo '<option value=""></option>';
      $tempBQuery = $b_value[2];

      $tempBResult = mysql_query($tempBQuery);
      if($tempBResult){
         while($row = mysql_fetch_array($tempBResult)){
            if($row[$b_value[0]] != ''){
               echo '<option value="' . $row[$b_value[0]] . '">' . $row[$b_value[0]] . '</option>';
            }
         }
      }
      echo '</select></li>';
   }

   foreach($complex_button_values as $c_key => $c_value){
   echo '<li class="list-group-item"><span class="filterLabels">' . $c_value[0] . '</span>';
   $temptype = array();
   $temptypeCount = 0;
   echo '<select class="' . $c_key . '" name="' . $c_key . '" ' . $c_value[4] . ' style="width:120px; float:right;" >';
   echo '<option value=""></option>';

   for($i = $c_value[2]; $i <= $c_value[3]; $i++){
      $temp_type = $c_value[1] . '_' . $i;
      $type_Query = "SELECT DISTINCT " . $c_value[1] . "_" . $i . " FROM " . $c_value[5] . " ORDER BY " . $c_value[1] . "_" . $i . " ASC";

      $type_Result = mysql_query($type_Query);
      if($type_Result){
         while($row = mysql_fetch_array($type_Result)){
            if(!in_array($row[$temp_type], $temptype)){
               $temptype[$temptypeCount] = $row[$temp_type];
               $temptypeCount++;
            }
         }
      }
   }
   asort($temptype);
   foreach($temptype as $value){
      if($value != ''){
         echo '<option value="' . $value . '">' . $value . '</option>';
      }
   }
   echo '</select></li>';
   }


      echo '<li class="list-group-item"><span class="filterLabels">Order By</span>';
      echo '<select class="s_sort" name="Sort_Value" style="width:120px; float:right;" >';
      echo '<option value=""></option>';
      foreach($sort_values as $key => $value){
         echo '<option value="' . $key . '">' . $key . '</option>';
      }
      echo '</select></li>';
   ?>
</ul>

</div> <!-- advancedSearch -->
</div> <!-- SideMenuBox1 -->
</div> <!-- row-fluid no-gutters -->

</div> <!-- SideMenu -->
   <div class="col-lg-10 col-md-9 col-sm-8 nopadding" style="position:fixed;" id="hiddenSideMenu" ></div>
    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 nopadding" id="hiddenSideMenu" >
    </div>


   <div class="col-lg-10 col-md-9 col-sm-8 hidden-xs gallery-padding" id="search-content" style="float: right;" >
      <div class="row-fluid no-gutters" >
         <div class="col-lg-12 col-md-12 col-sm-12" id="Main" >
         </div>
      </div>
   </div>
