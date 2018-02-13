<?php 
 include '../common-sql.php';

session_start();
// print_r($_SESSION);
    // echo $_SESSION['email'];
   $is_check=true;
 $newpassword=$_POST["new-password"];
 // echo $_SESSION['reg_password'];
 // echo $_POST['old-password'];
  // echo  $password;
 if ($_POST['old-password']==$_SESSION['reg_password']) {

 	$updateQ='UPDATE credentials SET reg_password="'.md5($newpassword).'" WHERE reg_email="'.$_SESSION['reg_email'].'"';
 	
    $updateResult =mysqli_query($conn,$updateQ) or die(mysqli_error($conn));

 }else{

 	$is_check=false;
 }

if ($is_check==true) {

	$Updateresponse=array('status'=>'Success','message'=>'Password Updated Sucessfully',"id"=>$_SESSION['user_id']);

    echo json_encode($Updateresponse);
}else{

	$Updateresponse=array('status'=>'Error','message'=>' Your old password is not match');

echo json_encode($Updateresponse);
}

// echo $updateResult;








  


         
  
  

?>