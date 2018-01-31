<?php
  include 'common-sql.php';
  // print_r($_POST);
 
    // $destination_id=$_POST['destination_att_id'];
    $attr_id_array=array();
    

for ($i=0; $i < count($_POST['attraction_name']) ; $i++) { 
  
  $attrctionQuery='INSERT INTO tour_attraction(destination_id,attraction_name,attraction_descrp)VALUES("'.$_POST['destination_att_id'][$i].'","'.$_POST['attraction_name'][$i].'","'.$_POST['attraction_descrp'][$i].'")';
  // echo $attrctionQuery;

   if ($conn->query($attrctionQuery)== TRUE) {
  # code...
  $attraction_id=$conn->insert_id;

 
  array_push($attr_id_array, $attraction_id);

 }else{
  // echo "Error: " . $attrctionQuery . "<br>" . $conn->error;

   $resArray=array(
   "status"=> "failed",
   "message" => $conn->error
  );

  echo json_encode($resArray);
 
 }

 }


  $resArray=array(
   "status"=> "success",
   "message" => "insertion completed",
   "attraction_id" => implode(",",$attr_id_array)
  );

 echo json_encode($resArray);






 ?>