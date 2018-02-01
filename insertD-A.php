<?php
  include 'common-sql.php';
 // print_r($_POST);

  $desti_id_array=array();


for ($i=0; $i < count($_POST['destination_name']) ; $i++) { 
  

if (isset($_POST['tour_id'])) {

      $destinationQuery='INSERT INTO tour_destination(tour_id,destination_name,destination_descrp)VALUES("'.$_POST['tour_id'].'","'.$_POST['destination_name'][$i].'","'.$_POST['destination_descrp'][$i].'")';
}else{

  $destinationQuery='INSERT INTO tour_destination(destination_name,destination_descrp)VALUES("'.$_POST['destination_name'][$i].'","'.$_POST['destination_descrp'][$i].'")';
}


    if ($conn->query($destinationQuery)== TRUE) {
  # code...
  $destination_id=$conn->insert_id;
  array_push($desti_id_array, $destination_id);

 

 }else{

   $resArray=array(
   "status"=> "failed",
   "message" => $conn->error
  );

  echo json_encode($resArray);
 }
 
}

$attrResult= addAttraction($destination_id);
 

 $resArray=array(
   "status"=> "success",
   "message" => "insertion completed",
   "id"  => implode(",",$desti_id_array),
   "attr_id" =>implode(",",$attrResult)
  );

 echo json_encode($resArray);
 
 


function addAttraction($destination_id){
 global $conn;
   $att_id_array= array();
	for ($i=0; $i < count($_POST['attraction_name']) ; $i++) { 
 	
 	$attrctionQuery='INSERT INTO tour_attraction(destination_id,attraction_name,attraction_descrp)VALUES("'.$destination_id.'","'.$_POST['attraction_name'][$i].'","'.$_POST['attraction_descrp'][$i].'")';

  // $attrResult=mysqli_query($conn,$attrctionQuery) or die(mysqli_error($conn));
 
  if ($conn->query($attrctionQuery)== TRUE) {
  
  $attraction_id=$conn->insert_id;
  array_push($att_id_array, $attraction_id);
  
 }else{



   $resArray=array(
   "status"=> "failed",
   "message" => $conn->error
  );

  echo json_encode($resArray);
 }

}
return $att_id_array;

  


}

 ?>