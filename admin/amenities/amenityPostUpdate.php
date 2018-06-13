<?php 
include'../../common-sql.php';
 // print_r($_POST);
$is_check= true;
$responseArray=[];

foreach($_POST['amenity_page'] as $amPage) { 

	if (!empty($amPage)) {

		$am_page     = $_POST['amenity_page'];

	}else{

		$is_check=false;
		array_push($responseArray, "Applies to field is required");
	}
}

if (isset($_POST['amenity_inactive']) && $_POST['amenity_inactive']=="on") {

	$inactive=$_POST['amenity_inactive'];
}else{
	$inactive="off";
}
$errorMsgs=implode(",",$responseArray);
$newErrorMsgArr=array(
	"status"=> "error",
	"message"=> $errorMsgs
);

$newSuccessMsgArr=array(
	"status"=> "success",
	"id"  =>$_POST['user_id'],
	"w_time"=>$_POST['is_time']
);
if ($is_check==true) {
	
	if ($_POST['is_time']=="create") {

		for ($i=0; $i < count($_POST['amenity_page']); $i++) {
        // echo "Manzar"."</br>";
			$query='INSERT INTO amenities(user_id,amenity_name,amenity_description,amenity_page,amenity_inactive)VALUES("'.$_POST['user_id'].'","'.$_POST['amenity_name'].'","'.$_POST['amenity_description'].'","'.$_POST['amenity_page'][$i].'","'.$inactive.'")';  
			$result=mysqli_query($conn,$query) or die(mysqli_error($conn));  
		} 

	}else{
  
     	
     
		for ($i=0; $i < count($_POST['amenity_page']); $i++) {
         
           if (isset($_POST['page_amenity_id'][$i])) {
           
            $query='UPDATE amenities SET 
			amenity_name="'.$_POST['amenity_name'].'",
			amenity_description="'.$_POST['amenity_description'].'",
			amenity_inactive="'.$inactive.'"
			WHERE amenity_id="'.$_POST['page_amenity_id'][$i].'"';

           }else{

           	  $query='INSERT INTO amenities(user_id,amenity_name,amenity_description,amenity_page,amenity_inactive)VALUES("'.$_POST['user_id'].'","'.$_POST['amenity_name'].'","'.$_POST['amenity_description'].'","'.$_POST['amenity_page'][$i].'","'.$inactive.'")';
           }
			

			$result=mysqli_query($conn,$query) or die(mysqli_error($conn));  
		} 


	}
	

	echo json_encode($newSuccessMsgArr);

}else{

	echo json_encode($newErrorMsgArr);
	return false;
}

?>