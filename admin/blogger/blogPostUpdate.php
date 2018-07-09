<?php 

include '../../common-sql.php';
session_start();
date_default_timezone_set("Asia/Karachi");
if (!isset($_POST['action'])) {
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

		
		include '../../methods/send-notification.php';
		insert_notification($conn,$_POST['user_id'],"admin","true","false","Created","New Blog Created",$_POST['blog_title']." has been created under your account",date("F j, Y, g:i a"),"blogger/veiwBlog.php?id=".$blog_id."&u_id=".$_POST['user_id'],"blog","blogger","" );

		if ($_SESSION['user_type']=="admin") {

			insert_notification($conn,$_POST['user_id'],"admin","true","false","Created","New Blog Created",$_SESSION['reg_name']." has been created new  blog" .$_POST['blog_title'],date("F j, Y, g:i a"),"blogger/veiwBlog.php?id=".$blog_id."&u_id=".$_POST['user_id']."&status=Pending&name=".$_POST['bloggerName']."&user_id=".$_POST['user_id'],"blog","s_admin","" );
		}
		

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
		$notify_desc_admin="";

		if ($b_update_assoc['blog_inactive']== $inactive) {

			$notify_title="Listing Updated.";
			$notify_descrip="".$_POST['blog_title']." has been updated";
			$notify_desc_admin="".$_SESSION['reg_name']." has been updated ".$_POST['blog_title']."";


		}else{


			if ($inactive=="off") {

				$notify_title="Listing Activated";
				$notify_descrip="".$_POST['blog_title']." has been activated";
                $notify_desc_admin="".$_SESSION['reg_name']." has been activated ".$_POST['blog_title']."";
			}else{

				$notify_title="Listing Deactivated";
				$notify_descrip="".$_POST['blog_title']." has been deactivated ";
				$notify_desc_admin="".$_SESSION['reg_name']." has been deactivated ".$_POST['blog_title']."";

			} 



		}
		include '../../methods/send-notification.php';

		insert_notification($conn,$_POST['user_id'],"admin","true","false","Updated",$notify_title,$notify_descrip,date("F j, Y, g:i a"),"blogger/veiwBlog.php?id=".$_POST['blog_id']."&u_id=".$_POST['user_id'],"blog","blogger","" );

		if ($_SESSION['user_type']=="admin") {

			insert_notification($conn,$_POST['user_id'],"admin","true","false","Updated",$notify_title,$notify_desc_admin,date("F j, Y, g:i a"),"blogger/veiwBlog.php?id=".$_POST['blog_id']."&u_id=".$_POST['user_id']."&status=".$_POST['bloggerStatus']."&name=".$_POST['bloggerName']."&user_id=".$_POST['user_id'],"blog","s_admin","" );
		}

		$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
	}
	

	echo json_encode($newSuccessMsgArr);

}else{

	echo json_encode($newErrorMsgArr);
	return false;
}

}else{

       $blogQuery='UPDATE blog SET blog_inactive="'.$_POST['action'].'"
              	 WHERE blog_id="'.$_POST['blog_id'].'" AND user_id="'.$_POST['user_id'].'"';

	   $blog_result=mysqli_query($conn,$blogQuery) or die(mysqli_error($conn));

        include '../../methods/send-notification.php';
   
     insert_notification($conn,$_POST['user_id'],"admin","true","false","Updated","Deactivation Approved","Your deactivation request has been approved",date("F j, Y, g:i a"),"blogger/veiwBlog.php?id=".$_POST['blog_id']."&u_id=".$_POST['user_id'],"blog","blogger","" );


}

?>