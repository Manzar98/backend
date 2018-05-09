<?php 
include'../../common-sql.php';
 // print_r($_POST);
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
	
	if ($_POST['is_time']=="create") {

		$query='INSERT INTO faq(user_id,faq_ques,faq_ans,faq_inactive)VALUES("'.$_POST['user_id'].'","'.$_POST['faq_ques'].'","'.$_POST['faq_ans'].'","'.$inactive.'")';      

	}else{

		$query='UPDATE faq SET 
		faq_ques="'.$_POST['faq_ques'].'",
		faq_ans="'.$_POST['faq_ans'].'",
		faq_inactive="'.$inactive.'"
		WHERE faq_id="'.$_POST['faq_id'].'" AND user_id="'.$_POST['user_id'].'"';

	}
	$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

	echo json_encode($newSuccessMsgArr);

}else{

	echo json_encode($newErrorMsgArr);
	return false;
}

?>