<?php 
include"../common-sql.php";
session_start();

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
if (isset($_POST['servicefee']) && $_POST['servicefee']=="on") {

  $service=$_POST['servicefee'];

}else{
 
  $service="off";
}
if (isset($_POST['amenities']) && $_POST['amenities']=="on") {

  $amenity=$_POST['amenities'];

}else{
 
  $amenity="off";
}
if (isset($_POST['listing']) && $_POST['listing']=="on") {

  $listing=$_POST['listing'];

}else{
 
  $listing="off";
}
if (isset($_POST['blogs']) && $_POST['blogs']=="on") {

  $blog=$_POST['blogs'];

}else{
 
  $blog="off";
}
$u_id=$_POST['user_id'];
if ($is_check==true) {

  if (isset($_POST['isTime']) && $_POST['isTime']!="update") {
    
   $query='INSERT INTO credentials(reg_name,reg_lstname,reg_email,reg_phone,reg_postal,reg_city,reg_province,reg_country,reg_birth,reg_password,reg_photo,reg_cover,reg_joinD,user_status,user_type)VALUES("'.$_POST['reg_name'].'","'.$_POST['reg_lstname'].'","'.$_POST['reg_email'].'","'.$_POST['reg_phone'].'","'.$_POST['reg_postal'].'","'.$_POST['reg_city'].'","'.$_POST['reg_province'].'","'.$_POST['reg_country'].'","'.$_POST['reg_birth'].'","'.md5($_POST['reg_password']).'","'.$_POST['profile_img'].'","'.$_POST['coverimg'].'","'.$joinDate.'","Approved","admin")';

   global $conn;
   if ($conn->query($query)== TRUE) {
     # code...
     $user_id =$conn->insert_id;
     
     $subQuery='INSERT INTO authorities(user_id,pages,bloggers,admins,vendors,faqs,destinations,servicefee,amenities,listing,blogs)VALUES("'.$user_id.'","'.$page.'","'.$blogger.'","'.$admin.'","'.$vendor.'","'.$faq.'","'.$destination.'","'.$service.'","'.$amenity.'","'.$listing.'","'.$blog.'")';
     $result=mysqli_query($conn,$subQuery) or die(mysqli_error($conn));

     $title="New admin registered";
 //   $url ="veiwAdmin.php?id=".$user_id."";
 //   $noti_type="admin";

 // include '../../methods/send-notification.php';
     
 // insert_notification($conn,$user_id,$userType,"true","false","Created",$title,"",date("F j, Y, g:i a"),$url,$noti_type,"admin");
     

   }

 }else{

  if (!empty($_POST['profile_img']) && !empty($_POST['coverimg'])) {

    $query='UPDATE credentials SET reg_name="'.$_POST['reg_name'].'",
    reg_lstname="'.$_POST['reg_lstname'].'",
    reg_email="'.$_POST['reg_email'].'",
    reg_phone="'.$_POST['reg_phone'].'",
    reg_postal="'.$_POST['reg_postal'].'",
    reg_city="'.$_POST['reg_city'].'",
    reg_province="'.$_POST['reg_province'].'",
    reg_country="'.$_POST['reg_country'].'",
    reg_photo="'.$_POST['profile_img'].'",
    reg_cover="'.$_POST['coverimg'].'" WHERE user_id="'.$_POST['user_id'].'"';

  }elseif (!empty($_POST['profile_img']) && empty($_POST['coverimg'])) {
   
    $query='UPDATE credentials SET reg_name="'.$_POST['reg_name'].'",
    reg_lstname="'.$_POST['reg_lstname'].'",
    reg_email="'.$_POST['reg_email'].'",
    reg_phone="'.$_POST['reg_phone'].'",
    reg_postal="'.$_POST['reg_postal'].'",
    reg_city="'.$_POST['reg_city'].'",
    reg_province="'.$_POST['reg_province'].'",
    reg_country="'.$_POST['reg_country'].'",
    reg_photo="'.$_POST['profile_img'].'" WHERE user_id="'.$_POST['user_id'].'"';

  }elseif(!empty($_POST['coverimg']) && empty($_POST['profile_img'])){

    $query='UPDATE credentials SET reg_name="'.$_POST['reg_name'].'",
    reg_lstname="'.$_POST['reg_lstname'].'",
    reg_email="'.$_POST['reg_email'].'",
    reg_phone="'.$_POST['reg_phone'].'",
    reg_postal="'.$_POST['reg_postal'].'",
    reg_city="'.$_POST['reg_city'].'",
    reg_province="'.$_POST['reg_province'].'",
    reg_country="'.$_POST['reg_country'].'",
    reg_cover="'.$_POST['coverimg'].'" WHERE user_id="'.$_POST['user_id'].'"';

  }else{

    $query='UPDATE credentials SET reg_name="'.$_POST['reg_name'].'",
    reg_lstname="'.$_POST['reg_lstname'].'",
    reg_email="'.$_POST['reg_email'].'",
    reg_phone="'.$_POST['reg_phone'].'",
    reg_postal="'.$_POST['reg_postal'].'",
    reg_city="'.$_POST['reg_city'].'",
    reg_province="'.$_POST['reg_province'].'",
    reg_country="'.$_POST['reg_country'].'" WHERE user_id="'.$_POST['user_id'].'"';


  }

  $childQuery='UPDATE authorities SET pages="'. $page.'",
  bloggers="'.$blogger.'",
  admins="'.$admin.'",
  vendors="'.$vendor.'",
  faqs="'.$faq.'",
  destinations="'.$destination.'",
  servicefee="'.$service.'",
  amenities="'.$amenity.'",
  listing="'.$listing.'",
  blogs="'.$blog.'" WHERE user_id="'.$_POST['user_id'].'"';
// echo $query;

  $result=mysqli_query($conn,$query) or die(mysqli_error($conn));


  $resultChild=mysqli_query($conn,$childQuery) or die(mysqli_error($conn));
}

$newSuccessMsgArr=array(
 "status"=> "Success",
 "message"=> "Registration inserted successfully",
 "id"=> $_SESSION['user_id']
);
echo json_encode($newSuccessMsgArr);

}else{

  $errorMsgs=implode(",",$responseArray);
  $newErrorMsgArr=array(
    "status"=> "error",
    "message"=> $errorMsgs
  ); 
  echo json_encode($newErrorMsgArr);
}



?>