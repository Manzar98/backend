<?php 
include'../../common-sql.php';
 // print_r($_POST);
$is_check= true;
$responseArray=[];

if (empty($_POST['fee_type'])) {
  $is_check=false;
  array_push($responseArray,"Percentage or Amount field is required");
}
$errorMsgs=implode(",",$responseArray);
$newErrorMsgArr=array(
	"status"=> "error",
	"message"=> $errorMsgs
);


if ($is_check==true) {
	
	if ($_POST['is_time']=="create") {

		$query='INSERT INTO service_fee(user_id,fee_charges,fee_type,fee_user_type)VALUES("'.$_POST['user_id'].'","'.$_POST['fee_charges'].'","'.$_POST['fee_type'].'","'.$_POST['fee_user_type'].'")';    

		if ($conn->query($query)== TRUE) {
  	# code...
  	$fee_id =$conn->insert_id;

// echo $banquet_id;
  }else{
  	echo "Error: " . $query . "<br>" . $conn->error;
  } 
  $newSuccessMsgArr=array(
	"status"=> "success",
	"id"  =>$_POST['user_id'],
	"w_time"=>$_POST['is_time'],
	"typ"=>$_POST['fee_user_type'],
	"feeId"=>$fee_id
);

	}else{

		$query='UPDATE service_fee SET 
		fee_charges="'.$_POST['fee_charges'].'",
		fee_type="'.$_POST['fee_type'].'",
		fee_user_type="'.$_POST['fee_user_type'].'"
		WHERE fee_id="'.$_POST['fee_id'].'" AND user_id="'.$_POST['user_id'].'"';

		
      $result=mysqli_query($conn,$query) or die(mysqli_error($conn));

      $newSuccessMsgArr=array(
	"status"=> "success",
	"id"  =>$_POST['user_id'],
	"w_time"=>$_POST['is_time'],
	"typ"=>$_POST['fee_user_type'],
	"feeId"=>$_POST['fee_id']
);
	}
	

	echo json_encode($newSuccessMsgArr);

}else{

	echo json_encode($newErrorMsgArr);
	return false;
}

?>