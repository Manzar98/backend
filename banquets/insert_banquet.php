<?php 
    include '../common-sql.php';
/*----------------------------
    Function for dynamic Insert Query
 ------------------------------*/
 print_r( $_POST);


 
 function getInsertQuery($tableName,$postObject){
  $columnArray = array(); // define column name in array
  $columnValues = array(); // define column value in array
  
  
  foreach ($postObject as $key => $value) {// 
    array_push($columnArray,$key);           //pushing columns names
    array_push($columnValues,'"'.$value.'"'); //pushing columns value
  }
 

  $query = "INSERT INTO ".$tableName." (" . implode(',', $columnArray) . ") VALUES (" . implode(',', $columnValues). ")";
   
    global $conn;

if ($conn->query($query)== TRUE) {
  # code...
  $date_id=$conn->insert_id;

 
 }else{
  echo "Error: " . $query . "<br>" . $conn->error;
 }

 //$responseArray = array();
 
 $responseArray = array(
      "message" => "success",
      "id" =>  $date_id
  );

  echo json_encode($responseArray);


     // $resultint = mysqli_query($conn,$query) or die(mysqli_error($conn)); 
    // return  $resultint;






  //   if ($resultint==1) {

  //         // return $resultup;
  //         echo "sucess";
  //        }


  //    }else{

  //   echo 'you have an error';
  // }

          
 };

 if (isset($_GET['act'])) {

   getInsertQuery($_GET['act'],$_POST);
 }else{

  getInsertQuery('common_bookdates',$_POST);
 }


?>