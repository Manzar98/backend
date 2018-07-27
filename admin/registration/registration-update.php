<?php 
include '../../common-sql.php';
 // print_r($_POST);
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
   # code...

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
// echo $query;

$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

if ($result==1) {
  if (isset($_POST['user_type']) && $_POST['user_type']=="vendor") {

    include '../../methods/send-notification.php';
    insert_notification($conn,$_POST['user_id'],"admin","true","false","Updated","User record updated","Admin has updated your record",date("F j, Y, g:i a"),"db-profile.php?id=".$_POST['user_id'],"vendor","vendor","","" );

     $responseArray=array(

    "status"=> "user_success",
    "message"=> "Registration updated successfully",
    "id"=> $_POST['user_id'],
    "usertype"=>$_POST['user_type']
  );
  }else if (isset($_POST['user_type']) && $_POST['user_type']=="blogger") {

    include '../../methods/send-notification.php';

    insert_notification($conn,$_POST['user_id'],"admin","true","false","Updated","User record updated","Admin has updated your record",date("F j, Y, g:i a"),"blogger/edit-blogger.php?id=".$_POST['user_id'],"blogger","blogger","","" );

     $responseArray=array(

    "status"=> "user_success",
    "message"=> "Registration updated successfully",
    "id"=> $_POST['user_id'],
    "usertype"=>$_POST['user_type']
  );
  }else{

     $responseArray=array(

    "status"=> "admin_success",
    "message"=> "Registration updated successfully",
    "id"=> $_POST['user_id']
  );
  }



 
  echo json_encode($responseArray);
}else{

  $responseArray=array(
    "status"=> "Failed",
    "message"=> "Something went wrong in updation "
  );
  echo json_encode($responseArray);
}

?>