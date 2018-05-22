<?php 

include '../common-sql.php';
session_start();
$is_check= true;
$responseArray=[];
if (empty($_POST['blog_content'])) {
	$is_check=false;
	array_push($responseArray,"Blog content is required");
}else{
	$content=$_POST['blog_content'];
}
if (isset($_POST['blog_inactive']) && $_POST['blog_inactive']=="on") {

	$inactive=$_POST['blog_inactive'];
}else{
	$inactive="off";
}
$img          = $_POST['common_image'];
$imgarray= explode(",",$img);
$formtype="blog";
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

		$query='INSERT INTO blog(user_id,blog_title,blog_alias,blog_content,blog_inactive,blog_status)VALUES("'.$_POST['user_id'].'","'.$_POST['blog_title'].'","'.$_POST['blog_alias'].'","'.$content.'","'.$inactive.'","Pending")';  

		if ($conn->query($query)== TRUE) {
			
			$blog_id =$conn->insert_id;

		}else{
			echo "Error: " . $query . "<br>" . $conn->error;
		}  

		for ($i=0; $i<count($imgarray); $i++) {

			$img_UpdateQuery='UPDATE common_imagevideo SET
			blog_id="'.$blog_id.'",
			img_video_type = "'.$formtype.'" WHERE common_imgvideo_id="'.$imgarray[$i].'"' ;

			mysqli_query($conn,$img_UpdateQuery) or die(mysqli_error($conn));
		}
		

		include '../methods/send-notification.php';

		insert_notification($conn,$_POST['user_id'],"blogger","true","false","Created","New Blog Created","".$_POST['blog_title']." has been posted for review by ".$_SESSION['reg_name'],date("F j, Y, g:i a"),"blogger/veiwBlog.php?id=".$blog_id."&u_id=".$_POST['user_id']."&status=Pending&name=".$_SESSION['reg_name']."&user_id=".$_POST['user_id'] ,"blog","admin" ); 

	}else{

		$query='UPDATE blog SET 
		blog_title="'.$_POST['blog_title'].'",
		blog_alias="'.$_POST['blog_alias'].'",
		blog_content="'.$content.'",
		blog_inactive="'.$inactive.'"
		WHERE blog_id="'.$_POST['blog_id'].'" AND user_id="'.$_POST['user_id'].'"';

		include '../methods/send-notification.php';
		insert_notification($conn,$_POST['user_id'],"blogger","true","false","Created","Blog Updated","".$_POST['blog_title']." has been updated for review by ".$_SESSION['reg_name'],date("F j, Y, g:i a"),"blogger/showBlog.php?id=".$_POST['blog_id']."&u_id=".$_POST['user_id']."&status=Approved&name=".$_SESSION['reg_name']."&user_id=".$_POST['user_id'] ,"blog","admin" );

		$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
	}
	

	echo json_encode($newSuccessMsgArr);

}else{

	echo json_encode($newErrorMsgArr);
	return false;
}

?>