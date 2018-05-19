<?php 
include'../../common-sql.php';
 // print_r($_POST);
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
	
	if ($_POST['is_time']=="create") {

		$query='INSERT INTO pages(user_id,page_name,page_alias,page_content,page_metadata,page_metakeyword,page_inactive)VALUES("'.$_POST['user_id'].'","'.$_POST['page_name'].'","'.$_POST['page_alias'].'","'.$p_content.'","'.$_POST['page_metadata'].'","'.$_POST['page_metakeyword'].'","'.$inactive.'")';      

	}else{

		$query='UPDATE pages SET 
		page_name="'.$_POST['page_name'].'",
		page_alias="'.$_POST['page_alias'].'",
		page_content="'.$p_content.'",
		page_metadata="'.$_POST['page_metadata'].'",
		page_metakeyword="'.$_POST['page_metakeyword'].'",
		page_inactive="'.$inactive.'"
		WHERE page_id="'.$_POST['page_id'].'" AND user_id="'.$_POST['user_id'].'"';

	}
	$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

	echo json_encode($newSuccessMsgArr);

}else{

	echo json_encode($newErrorMsgArr);
	return false;
}

?>