<?php
  include '../common-sql.php';
   // print_r($_POST);

   // return false;
$desti_id_array=array();
for ($i=0; $i < count($_POST['destination_name']) ; $i++) { 
     
     $Desti_UpdateQuery='UPDATE tour_destination SET
     destination_name="'.$_POST['destination_name'][$i].'",destination_descrp="'.$_POST['destination_descrp'][$i].'" WHERE destination_id="'.$_POST['destination_id'][$i].'"' ;

              
      // echo $Desti_UpdateQuery;
       mysqli_query($conn,$Desti_UpdateQuery) or die(mysqli_error($conn));
     


array_push($desti_id_array, $_POST['destination_id'][$i]);
}

$attrResult= addAttraction($_POST['destination_id']);

if ($attrResult==1) {

 $resArray=array(
   "status"=> "success",
   "message" => "insertion completed",
   "id"  => implode(",",$desti_id_array)
  );

 echo json_encode($resArray);
 }else{
 	  $resArray=array(
   "status"=> "failed",
   "message" => $conn->error
  );

 echo json_encode($resArray);
  // echo "Error: " . $query . "<br>" . $conn->error;
 }
 


function addAttraction($destination_id){
 global $conn;
	for ($i=0; $i < count($_POST['attraction_name']) ; $i++) { 


   $attrctionQuery='UPDATE tour_attraction SET
     attraction_name="'.$_POST['attraction_name'][$i].'",attraction_descrp="'.$_POST['attraction_descrp'][$i].'" WHERE attraction_id="'.$_POST['attraction_id'][$i].'"' ;
 	
    // echo $attrctionQuery;
  $attrResult=mysqli_query($conn,$attrctionQuery) or die(mysqli_error($conn));
 }

  if ($attrResult==1) {
  	
  	return 1;
  }else{
  	return 0;
  }


}

 ?>