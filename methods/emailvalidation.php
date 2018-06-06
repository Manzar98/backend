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
 	     "message"=> "Email already exists");
    echo json_encode($res_array);
    return false;

}else{

   $res_array=array(
 		"status"=> "Success",
 	     "message"=> "Email  not already exists");
   
    echo json_encode($res_array);
    
} 

  

?>