<?php
  
  include"common-sql.php";

  $query='INSERT INTO credentials(reg_name,reg_email,reg_phone,reg_postal,reg_city,reg_province,reg_country,reg_birth,reg_password)VALUES("'.$_POST['reg_name'].'","'.$_POST['reg_email'].'","'.$_POST['reg_phone'].'","'.$_POST['reg_postal'].'","'.$_POST['reg_city'].'","'.$_POST['reg_province'].'","'.$_POST['reg_country'].'","'.$_POST['reg_birth'].'","'.md5($_POST['reg_password']).'")';

  $result=mysqli_query($conn,$query) or die(mysqli_error($conn));

  if ($result==1) {

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