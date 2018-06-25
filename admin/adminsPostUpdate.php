<?php 
include"../common-sql.php";

$is_check=true;
$responseArray=[];
$joinDate= date('M Y');

if (isset($_POST['pages']) && $_POST['pages']=="on") {
	$page=$_POST['pages'];
}else{

  $page="off";
}
if (isset($_POST['bloggers']) && $_POST['bloggers']=="on") {
	$blogger=$_POST['bloggers'];
}else{
 
 $blogger="off";
}
if (isset($_POST['admins']) && $_POST['admins']=="on") {
	$admin=$_POST['admins'];
}else{
 
  $admin="off";	
}
if (isset($_POST['vendors']) && $_POST['vendors']=="on") {
	$vendor=$_POST['vendors'];
}else{

	$vendor="off";
}
if (isset($_POST['faqs']) && $_POST['faqs']=="on") {

	$faq=$_POST['faqs'];
}else{

	$faq="off";
}
if (isset($_POST['destinations']) && $_POST['destinations']=="on") {

	$destination=$_POST['destinations'];

}else{
 
	$destination="off";
}

if ($is_check==true) {

 $query='INSERT INTO credentials(reg_name,reg_lstname,reg_email,reg_birth,reg_password,reg_photo,reg_cover,reg_joinD,user_status,user_type)VALUES("'.$_POST['reg_name'].'","'.$_POST['reg_lstname'].'","'.$_POST['reg_email'].'","'.$_POST['reg_birth'].'","'.md5($_POST['reg_password']).'","'.$_POST['profile_img'].'","'.$_POST['coverimg'].'","'.$joinDate.'","Pending","admin")';

 global $conn;
if ($conn->query($query)== TRUE) {
     # code...
   $user_id =$conn->insert_id;
 
// echo $user_id;
// echo "Manzae";
 $subQuery='INSERT INTO authorities(user_id,pages,bloggers,admins,vendors,faqs,destinations)VALUES("'.$user_id.'","'.$page.'","'.$blogger.'","'.$admin.'","'.$vendor.'","'.$faq.'","'.$destination.'")';
  $result=mysqli_query($conn,$subQuery) or die(mysqli_error($conn));

  $title="New admin registered";
 //   $url ="veiwAdmin.php?id=".$user_id."";
 //   $noti_type="admin";

 // include '../../methods/send-notification.php';
 
 // insert_notification($conn,$user_id,$userType,"true","false","Created",$title,"",date("F j, Y, g:i a"),$url,$noti_type,"admin");


 $newSuccessMsgArr=array(
   "status"=> "Success",
   "message"=> "Registration inserted successfully"
 );
 echo json_encode($newSuccessMsgArr);

}

}else{

  $errorMsgs=implode(",",$responseArray);
  $newErrorMsgArr=array(
    "status"=> "error",
    "message"=> $errorMsgs
  ); 
  echo json_encode($newErrorMsgArr);
}



?>