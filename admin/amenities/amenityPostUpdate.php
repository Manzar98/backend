<?php 
include'../../common-sql.php';
 // print_r($_POST);
session_start();
$is_check= true;
$responseArray=[];
$pageArray = explode(",", $_POST['amenity_page'][0]);

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
	$notify_istime="";
	$notify_title="";
	$notify_descrip="";
	if ($_POST['is_time']=="create") {

		for ($i=0; $i < count($pageArray); $i++) {
        // echo "Manzar"."</br>";
			$query='INSERT INTO amenities(user_id,amenity_name,amenity_description,amenity_page,amenity_inactive)VALUES("'.$_POST['user_id'].'","'.$_POST['amenity_name'].'","'.$_POST['amenity_description'].'","'.$pageArray[$i].'","'.$inactive.'")';  
			$result=mysqli_query($conn,$query) or die(mysqli_error($conn));  
		} 

		$notify_istime="Created";
		$notify_title="New Amenity Created";
		$notify_descrip="".$_POST['amenity_name']." has been created";

	}else{

		for ($i=0; $i < count($pageArray); $i++) {

			$query='UPDATE amenities SET 
			amenity_name="'.$_POST['amenity_name'].'",
			amenity_description="'.$_POST['amenity_description'].'",
			amenity_inactive="'.$inactive.'"
			WHERE amenity_id="'.$_POST['page_amenity_id'][$i].'"';
			
			$result=mysqli_query($conn,$query) or die(mysqli_error($conn)); 
		} 

		$notify_istime="Updated";
		$Adminupdate='SELECT `amenities`.`amenity_inactive` FROM `amenities` WHERE amenity_id="'.$_POST['crnt_a_id'].'"';
		$Adminupdate_result=mysqli_query($conn,$Adminupdate) or die(mysqli_error($conn));
		$Adminupdate_assoc=mysqli_fetch_assoc($Adminupdate_result);

		if ($Adminupdate_assoc['amenity_inactive']== $inactive) {

			$notify_title="Amenity Updated";
			$notify_descrip="".$_POST['amenity_name']." has been updated";
		}else{

			if ($inactive=="off") {

				$notify_title="Amenity Activated";
				$notify_descrip="".$_POST['amenity_name']." has been reactivated";

			}else{

				$notify_title="Amenity Deactivated";
				$notify_descrip="".$_POST['amenity_name']." has been deactivated ";
			} 

		}

	}


	if (isset($_SESSION['user_type']) && $_SESSION['user_type']=="admin") {
		
		include '../../methods/send-notification.php';
		insert_notification($conn,$_POST['user_id'] ,"admin","true","false",$notify_istime,$notify_title,$notify_descrip,date("F j, Y, g:i a"),"amenities/amenityListing.php?id=".$_POST['user_id'],"amenities","s_admin","" );
	}

	echo json_encode($newSuccessMsgArr);

}else{

	echo json_encode($newErrorMsgArr);
	return false;
}

?>