<?php 
include'../../common-sql.php';
 // print_r($_POST);
session_start();
$is_check= true;
$responseArray=[];

if (isset($_POST['desti_inactive']) && $_POST['desti_inactive']=="on") {

	$inactive=$_POST['desti_inactive'];
}else{
	$inactive="off";
}
$img          = $_POST['common_image'];
$imgarray= explode(",",$img);
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
$notify_istime="";
	$notify_title="";
	$notify_descrip="";
	$desti_id="";
		$query='INSERT INTO destinations(user_id,desti_name,desti_description,desti_inactive)VALUES("'.$_POST['user_id'].'","'.$_POST['desti_name'].'","'.$_POST['desti_description'].'","'.$inactive.'")';     

		if ($conn->query($query)== TRUE) {
			$desti_id=$conn->insert_id;

		}else{
			echo "Error: " . $query . "<br>" . $conn->error;
		} 

		$cover_UpdateQuery='UPDATE common_imagevideo SET
		desti_id="'.$desti_id.'",
		img_video_type="destination" WHERE common_imgvideo_id="'.$_POST['desti_coverimg'].'"';
		mysqli_query($conn,$cover_UpdateQuery) or die(mysqli_error($conn));

		for ($i=0; $i<count($imgarray); $i++) {

			$img_UpdateQuery='UPDATE common_imagevideo SET
			desti_id="'.$desti_id.'",
			img_video_type = "destination" WHERE common_imgvideo_id="'.$imgarray[$i].'"' ;

			mysqli_query($conn,$img_UpdateQuery) or die(mysqli_error($conn));
		}

		$notify_istime="Created";
		$notify_title="New Destination Created";
		$notify_descrip="".$_POST['desti_name']." has been created";

	}else{

		$query='UPDATE destinations SET 
		desti_name="'.$_POST['desti_name'].'",
		desti_description="'.$_POST['desti_description'].'",
		desti_inactive="'.$inactive.'"
		WHERE desti_id="'.$_POST['desti_id'].'" AND user_id="'.$_POST['user_id'].'"';
		
        $desti_id=$_POST['desti_id'];
		$notify_istime="Updated";
		$Adminupdate='SELECT `destinations`.`desti_inactive` FROM `destinations` WHERE desti_id="'.$_POST['desti_id'].'"';
		$Adminupdate_result=mysqli_query($conn,$Adminupdate) or die(mysqli_error($conn));
		$Adminupdate_assoc=mysqli_fetch_assoc($Adminupdate_result);

		if ($Adminupdate_assoc['desti_inactive']== $inactive) {

			$notify_title="Destination Updated";
			$notify_descrip="".$_POST['desti_name']." has been updated";
		}else{

			if ($inactive=="off") {

				$notify_title="Destination Activated";
				$notify_descrip="".$_POST['desti_name']." has been reactivated";

			}else{

				$notify_title="Destination Deactivated";
				$notify_descrip="".$_POST['desti_name']." has been deactivated ";
			} 

		}

		$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

	}
	
if (isset($_SESSION['user_type']) && $_SESSION['user_type']=="admin") {
		
		include '../../methods/send-notification.php';
		insert_notification($conn,$_POST['user_id'] ,"admin","true","false",$notify_istime,$notify_title,$notify_descrip,date("F j, Y, g:i a"),"destinations/veiwDesti.php?d_id=".$desti_id."&id=".$_POST['user_id'],"destinations","s_admin","","true");
	}
	echo json_encode($newSuccessMsgArr);

}else{

	echo json_encode($newErrorMsgArr);
	return false;
}

?>