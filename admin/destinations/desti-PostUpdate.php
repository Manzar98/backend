<?php 
include'../../common-sql.php';
 // print_r($_POST);
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

		$query='INSERT INTO destinations(user_id,desti_name,desti_description,desti_inactive)VALUES("'.$_POST['user_id'].'","'.$_POST['desti_name'].'","'.$_POST['desti_description'].'","'.$inactive.'")';     

		if ($conn->query($query)== TRUE) {
  	# code...
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

	}else{

		$query='UPDATE destinations SET 
		desti_name="'.$_POST['desti_name'].'",
		desti_description="'.$_POST['desti_description'].'",
		desti_inactive="'.$inactive.'"
		WHERE desti_id="'.$_POST['desti_id'].'" AND user_id="'.$_POST['user_id'].'"';

		$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

	}
	

	echo json_encode($newSuccessMsgArr);

}else{

	echo json_encode($newErrorMsgArr);
	return false;
}

?>