<?php
   $query = $master_query;


end($search_values);
$master_key = key($search_values);
reset($search_values);

foreach($search_values as $key => $top_value){
   if(isset($_POST[$key])){
      foreach($_POST[$key] as $value){
         if($value != ""){
            $value = mysql_real_escape_string($value);
            if($key == "Edition"){
               $query .= " ( " . $top_value[0] . " = '" . $value . "' AND " . $top_value[1] . " != '" . $value . "' ) OR ( " . $top_value[0] . " != '" . $value . "' AND " . $top_value[1] . " = '" . $value . "' ) ";
               if(count($_POST[$key]) > 1){
                  $query .= " OR ";
               }
            }elseif(is_array($top_value)){
               foreach($top_value as $low_key => $low_value){
                  $query .= " " . $low_value . " LIKE '%" . $value . "%' ";
                  //$query .= " " . $low_value . " LIKE '" . $value . "' ";
                  if($low_key < (count($top_value) -1 )){
                     $query .= " OR ";
                  }
               }
               if(count($_POST[$key]) > 1){
                  if($value != end($_POST[$key])){
                     $query .= " ) AND ( ";
                  }
               }
            }else{
               //$query .= " " . $top_value . " LIKE '%" . $value . "%' ";
               $query .= " " . $top_value . " LIKE '" . $value . "' ";
               if(count($_POST[$key]) > 1){
                  $query .= " OR ";
               }
            }
         }else{
            if(is_array($top_value)){
               $query .= " " . $top_value[0] . " LIKE '%' ";
            }else{
               $query .= " " . $top_value . " LIKE '%' ";
            }
         }
      }
   }
   if($key == $master_key){
         $query .= " ) ";
   }else{
         $query .= " ) AND ( ";
   }
}

      if($_POST['Sort_Value'] != ""){
         $query .= $sort_values[$_POST['Sort_Value']];
      }else{
         if($db_name == "ptcg"){
            $query .= " ORDER BY Release_Date, DB_Card_Num, length(Set_Number), Set_Number";      
         }else{
            $query .= " ORDER BY EN_Name, EN_Set_Name";
         }
      } 

      //echo $query . "<br/>";
     // print_r ($search_values);
?>