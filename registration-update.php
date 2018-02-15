<?php 
  include 'common-sql.php';
 // print_r($_POST);
 
 if (!empty($_POST['profile_img'])) {
   # code...

  $query='UPDATE credentials SET reg_name="'.$_POST['reg_name'].'",
  reg_email="'.$_POST['reg_email'].'",
  reg_phone="'.$_POST['reg_phone'].'",
  reg_postal="'.$_POST['reg_postal'].'",
  reg_city="'.$_POST['reg_city'].'",
  reg_province="'.$_POST['reg_province'].'",
  reg_country="'.$_POST['reg_country'].'",
  reg_birth="'.$_POST['reg_birth'].'",
  reg_photo="'.$_POST['profile_img'].'" WHERE user_id="'.$_POST['user_id'].'"';
 }else{

$query='UPDATE credentials SET reg_name="'.$_POST['reg_name'].'",
  reg_email="'.$_POST['reg_email'].'",
  reg_phone="'.$_POST['reg_phone'].'",
  reg_postal="'.$_POST['reg_postal'].'",
  reg_city="'.$_POST['reg_city'].'",
  reg_province="'.$_POST['reg_province'].'",
  reg_country="'.$_POST['reg_country'].'",
  reg_birth="'.$_POST['reg_birth'].'" WHERE user_id="'.$_POST['user_id'].'"';


 }
// echo $query;

  $result=mysqli_query($conn,$query) or die(mysqli_error($conn));

  if ($result==1) {

    $responseArray=array(

        "status"=> "Success",
         "message"=> "Registration updated successfully",
         "id"=> $_POST['user_id']
    );
     echo json_encode($responseArray);
  }else{

    $responseArray=array(
        "status"=> "Failed",
         "message"=> "Something went wrong in updation "
    );
     echo json_encode($responseArray);
  }

?>