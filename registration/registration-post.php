<?php
  
include"../common-sql.php";
  // print_r($_POST);


   $joinDate= date('M Y');




   // print_r($_POST);
    // print_r($_FILES['uploadfile']);
 // echo $_FILES['uploadfile'];
  // $file =time().'-'.$_FILES['uploadfile']['name'];
  // $tmpPath = $_FILES['uploadfile']['tmp_name'];
  // $targetDir = 'images/uploads/';

  // if(move_uploaded_file($tmpPath, $targetDir.$file)){
  //   //echo 'File upload on path  : '.$targetDir.$file;
  //   $upload = $targetDir.$file;
  //    echo $upload;
  // }else{
  //   echo 'Some thing wrong with the uploading';
  // }
   

   $query='INSERT INTO credentials(reg_name,reg_lstname,reg_email,reg_phone,reg_postal,reg_city,reg_province,reg_country,reg_birth,reg_password,reg_photo,reg_cover,reg_joinD)VALUES("'.$_POST['reg_name'].'","'.$_POST['reg_lstname'].'","'.$_POST['reg_email'].'","'.$_POST['reg_phone'].'","'.$_POST['reg_postal'].'","'.$_POST['reg_city'].'","'.$_POST['reg_province'].'","'.$_POST['reg_country'].'","'.$_POST['reg_birth'].'","'.md5($_POST['reg_password']).'","'.$_POST['profile_img'].'","'.$_POST['coverimg'].'","'.$joinDate.'")';

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