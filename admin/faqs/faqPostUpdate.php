<?php 
include'../../common-sql.php';
 // print_r($_POST);
session_start();
$is_check= true;
$responseArray=[];
if (isset($_POST['faq_inactive']) && $_POST['faq_inactive']=="on") {

	$inactive=$_POST['faq_inactive'];
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
	$faq_id="";
	if ($_POST['is_time']=="create") {

		$query='INSERT INTO faq(user_id,faq_ques,faq_ans,faq_inactive)VALUES("'.$_POST['user_id'].'","'.$_POST['faq_ques'].'","'.$_POST['faq_ans'].'","'.$inactive.'")';
   global $conn;
   if ($conn->query($query)== TRUE) {
     # code...
     $faq_id =$conn->insert_id;


 }
		$notify_istime="Created";
		$notify_title="New FAQ Created";
		$notify_descrip="".$_POST['faq_ques']." has been created";      

	}else{

		$query='UPDATE faq SET 
		faq_ques="'.$_POST['faq_ques'].'",
		faq_ans="'.$_POST['faq_ans'].'",
		faq_inactive="'.$inactive.'"
		WHERE faq_id="'.$_POST['faq_id'].'" AND user_id="'.$_POST['user_id'].'"';
         
        $faq_id=$_POST['faq_id'];
		$notify_istime="Updated";
		$Adminupdate='SELECT `faq`.`faq_inactive` FROM `faq` WHERE faq_id="'.$_POST['faq_id'].'"';
		$Adminupdate_result=mysqli_query($conn,$Adminupdate) or die(mysqli_error($conn));
		$Adminupdate_assoc=mysqli_fetch_assoc($Adminupdate_result);

		if ($Adminupdate_assoc['faq_inactive']== $inactive) {

			$notify_title="Faq Updated";
			$notify_descrip="".$_POST['faq_ques']." has been updated";
		}else{

			if ($inactive=="off") {

				$notify_title="Faq Activated";
				$notify_descrip="".$_POST['faq_ques']." has been reactivated";

			}else{

				$notify_title="Faq Deactivated";
				$notify_descrip="".$_POST['faq_ques']." has been deactivated ";
			} 

		}

	}
 if (isset($_SESSION['user_type']) && $_SESSION['user_type']=="admin") {

	include '../../methods/send-notification.php';
	insert_notification($conn,$_POST['user_id'] ,"admin","true","false",$notify_istime,$notify_title,$notify_descrip,date("F j, Y, g:i a"),"faqs/editQues.php?f_id=".$faq_id."&id=".$_POST['user_id'],"faq","s_admin","" );
}
	$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

	echo json_encode($newSuccessMsgArr);

}else{

	echo json_encode($newErrorMsgArr);
	return false;
}

?>