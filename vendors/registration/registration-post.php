<?php

include"../../common-sql.php";

$is_check=true;
$responseArray=[];
$joinDate= date('M Y');

if (empty($_POST['user_type'])) {
 $is_check=false;
 array_push($responseArray,"User type is required");
}else{

  $userType= $_POST['user_type'];
}

if ($is_check==true) {

 $query='INSERT INTO credentials(reg_name,reg_lstname,reg_email,reg_phone,reg_postal,reg_city,reg_province,reg_country,reg_birth,reg_password,reg_photo,reg_cover,reg_joinD,user_status,user_type)VALUES("'.$_POST['reg_name'].'","'.$_POST['reg_lstname'].'","'.$_POST['reg_email'].'","'.$_POST['reg_phone'].'","'.$_POST['reg_postal'].'","'.$_POST['reg_city'].'","'.$_POST['reg_province'].'","'.$_POST['reg_country'].'","'.$_POST['reg_birth'].'","'.md5($_POST['reg_password']).'","'.$_POST['profile_img'].'","'.$_POST['coverimg'].'","'.$joinDate.'","Pending","'.$userType.'")';

 global $conn;

 if ($conn->query($query)== TRUE) {
    # code...
  $user_id =$conn->insert_id;

  if ($_POST['user_type']=="vendor") {
   $title="New vendor registered";
   $decs=$_POST['reg_name']." has registered as new vendor";
   $url ="veiw_vendors.php?id=".$user_id."";
   $noti_type="vendor";
 }elseif ($_POST['user_type']=="blogger") {
   $title="New blogger registered";
   $decs=$_POST['reg_name']." has registered as new blogger";
   $url="veiw_vendors.php?id=".$user_id."";
   $noti_type="blogger";
 }
 include '../../methods/send-notification.php';
 
 insert_notification($conn,$user_id,$userType,"true","false","Created",$title,$decs,date("F j, Y, g:i a"),$url,$noti_type,"admin","");


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