<?php 

/*----------------------------
    Function for dynamic Insert Query
 ------------------------------*/

 function getInsertQuery($tableName,$postObject){
  $columnArray = array(); // define column name in array
  $columnValues = array(); // define column value in array
  
  
  foreach ($postObject as $key => $value) {// 
    array_push($columnArray,$key);           //pushing columns names
    array_push($columnValues,'"'.$value.'"'); //pushing columns value
  }
 

  $query = "INSERT INTO ".$tableName." (" . implode(',', $columnArray) . ") VALUES (" . implode(',', $columnValues). ")";
   
    global $conn;
    $resultint = mysqli_query($conn,$query) or die(mysqli_error($conn)); 
    return  $resultint;
          
 };


?>