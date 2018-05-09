<?php
  
include"../../common-sql.php";

   $joinDate= date('M Y');

   $query='INSERT INTO credentials(reg_name,reg_lstname,reg_email,reg_phone,reg_postal,reg_city,reg_province,reg_country,reg_birth,reg_password,reg_photo,reg_cover,reg_joinD,user_status,user_type)VALUES("'.$_POST['reg_name'].'","'.$_POST['reg_lstname'].'","'.$_POST['reg_email'].'","'.$_POST['reg_phone'].'","'.$_POST['reg_postal'].'","'.$_POST['reg_city'].'","'.$_POST['reg_province'].'","'.$_POST['reg_country'].'","'.$_POST['reg_birth'].'","'.md5($_POST['reg_password']).'","'.$_POST['profile_img'].'","'.$_POST['coverimg'].'","'.$joinDate.'","Pending","vendor")';

   global $conn;

  if ($conn->query($query)== TRUE) {
    # code...
    $user_id =$conn->insert_id;
    
   include '../../methods/send-notification.php';

     insert_notification($conn,$user_id,"vendor","true","false","Created","New vendor registered","".$_POST['reg_name']." has been registered as new vendor",date("F j, Y, g:i a"),"veiw_vendors.php?id=".$user_id."","vendor","admin");

     $responseArray=array(
         "status"=> "Success",
          "message"=> "Registration inserted successfully"
     );
      echo json_encode($responseArray);

  }else{

     $responseArray=array(
         "status"=> "Failed",
          "message"=> "Something went wrong in registration "
     );
      echo json_encode($responseArray);
   }


    

?>