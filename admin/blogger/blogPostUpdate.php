<?php 

include '../../common-sql.php';
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

		
		include '../../methods/send-notification.php';
		insert_notification($conn,$_POST['user_id'],"admin","true","false","Created","New Blog Created",$_POST['blog_title']." has been created under your account",date("F j, Y, g:i a"),"blogger/veiwBlog.php?id=".$blog_id."&u_id=".$_POST['user_id'],"blog","blogger" ); 

	}else{

		$query='UPDATE blog SET 
		blog_title="'.$_POST['blog_title'].'",
		blog_alias="'.$_POST['blog_alias'].'",
		blog_content="'.$content.'",
		blog_inactive="'.$inactive.'"
		WHERE blog_id="'.$_POST['blog_id'].'" AND user_id="'.$_POST['user_id'].'"';

		

		$b_update='SELECT `blog`.`blog_inactive` FROM `blog` WHERE blog_id="'.$_POST['blog_id'].'" AND user_id="'.$_POST['user_id'].'"';

		$b_update_result=mysqli_query($conn,$b_update) or die(mysqli_error($conn));

		$b_update_assoc=mysqli_fetch_assoc($b_update_result);

		$notify_title="";
		$notify_descrip = "";

		if ($b_update_assoc['blog_inactive']== $inactive) {

			$notify_title="Listing Updated.";
			$notify_descrip="".$_POST['blog_title']." has been updated";


		}else{


			if ($inactive=="off") {

				$notify_title="Listing Activated";
				$notify_descrip="".$_POST['blog_title']." has been activated";

			}else{

				$notify_title="Listing Deactivated";
				$notify_descrip="".$_POST['blog_title']." has been deactivated ";

			} 



		}
		include '../../methods/send-notification.php';

		insert_notification($conn,$_POST['user_id'],"admin","true","false","Updated",$notify_title,$notify_descrip,date("F j, Y, g:i a"),"blogger/veiwBlog.php?id=".$_POST['blog_id']."&u_id=".$_POST['user_id'],"blog","blogger" );

		$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
	}
	

	echo json_encode($newSuccessMsgArr);

}else{

	echo json_encode($newErrorMsgArr);
	return false;
}

?>