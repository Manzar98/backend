<?php 
include'../../common-sql.php';
 // print_r($_POST);

session_start();
$is_check= true;
$responseArray=[];
if (empty($_POST['page_content'])) {

	$is_check= false;
	array_push($responseArray,"Page content is required");
}else{
	$p_content=$_POST['page_content'];
}
if (isset($_POST['page_inactive']) && $_POST['page_inactive']=="on") {

	$inactive=$_POST['page_inactive'];
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

		$query='INSERT INTO pages(user_id,page_name,page_alias,page_content,page_metadata,page_metakeyword,page_inactive)VALUES("'.$_POST['user_id'].'","'.$_POST['page_name'].'","'.$_POST['page_alias'].'","'.$p_content.'","'.$_POST['page_metadata'].'","'.$_POST['page_metakeyword'].'","'.$inactive.'")';

		$notify_istime="Created";
		$notify_title="New Page Created";
		$notify_descrip="".$_POST['page_name']." has been created";       

	}else{

		$query='UPDATE pages SET 
		page_name="'.$_POST['page_name'].'",
		page_alias="'.$_POST['page_alias'].'",
		page_content="'.$p_content.'",
		page_metadata="'.$_POST['page_metadata'].'",
		page_metakeyword="'.$_POST['page_metakeyword'].'",
		page_inactive="'.$inactive.'"
		WHERE page_id="'.$_POST['page_id'].'" AND user_id="'.$_POST['user_id'].'"';

		$notify_istime="Updated";
		$Adminupdate='SELECT `pages`.`page_inactive` FROM `pages` WHERE page_id="'.$_POST['page_id'].'"';
		$Adminupdate_result=mysqli_query($conn,$Adminupdate) or die(mysqli_error($conn));
		$Adminupdate_assoc=mysqli_fetch_assoc($Adminupdate_result);

		if ($Adminupdate_assoc['page_inactive']== $inactive) {

			$notify_title="Page Updated";
			$notify_descrip="".$_POST['page_name']." has been updated";

		}else{

			if ($inactive=="off") {

				$notify_title="Page Activated";
				$notify_descrip="".$_POST['page_name']." has been reactivated";

			}else{

				$notify_title="Page Deactivated";
				$notify_descrip="".$_POST['page_name']." has been deactivated ";
			} 

		}

	}

	if (isset($_SESSION['user_type']) && $_SESSION['user_type']=="admin") {

		include '../../methods/send-notification.php';
		insert_notification($conn,$_POST['user_id'] ,"admin","true","false",$notify_istime,$notify_title,$notify_descrip,date("F j, Y, g:i a"),"pages/veiwPage.php?p_id=".$_POST['page_id']."&id=".$_POST['user_id'],"pages","s_admin","","true");
	}
	$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

	echo json_encode($newSuccessMsgArr);

}else{

	echo json_encode($newErrorMsgArr);
	return false;
}

?>