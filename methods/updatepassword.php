<?php 
 include '../common-sql.php';

session_start();

 $newpassword=$_POST["new_password"];
 
 

 	$updateQ='UPDATE credentials SET reg_password="'.md5($newpassword).'" WHERE reg_email="'.$_SESSION['reg_email'].'"';
 	
    $updateResult =mysqli_query($conn,$updateQ) or die(mysqli_error($conn));



	$Updateresponse=array('status'=>'Success','message'=>'Password Updated Sucessfully',"id"=>$_SESSION['user_id']);

    echo json_encode($Updateresponse);


// echo $updateResult;








  


         
  
  

?>