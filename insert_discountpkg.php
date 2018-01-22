<?php
  include 'common-sql.php';
// print_r($_POST);
  

   function getInsertQuery($tableName,$postObject){
  $formtype=$_GET['type'];

global $conn;
 for ($i=0; $i < count($_POST['common_nopeople']) ; $i++) { 


 	$discountQuery='INSERT INTO '.$tableName.'('.$_GET['column_idName'].',common_nopeople,common_discount,discount_type)VALUES("'.$_GET['id'].'","'.$_POST['common_nopeople'][$i].'","'.$_POST['common_discount'][$i].'","'.$formtype.'")';
     // echo $discountQuery;
 	$result=mysqli_query($conn,$discountQuery) or die(mysqli_error($conn));
 	# code...
 }

if ($result==1) {
  # code...
  $resArray=array(
   "status"=> "success",
   "message" => "insertion completed"
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
    
}
getInsertQuery('common_nosofpeople',$_POST);

?>



