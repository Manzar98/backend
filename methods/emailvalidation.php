<?php 
 include '../common-sql.php';


    
 $email=$_POST["email"];
 // echo $email;

  $query='SELECT * From credentials WHERE reg_email="'.$email.'"';

 $result =mysqli_query($conn,$query);
 

 if (mysqli_num_rows($result)> 0) {
   
   // print_r(mysqli_fetch_assoc($result));
 	$res_array=array(
 		"status"=> "Error",
 	     "message"=> "Email is already exist");
    echo json_encode($res_array);
    return false;

}else{

   $res_array=array(
 		"status"=> "Success",
 	     "message"=> "Email is not already exist");
   
    echo json_encode($res_array);
    
} 

  

?>