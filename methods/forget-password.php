<?php 
 include '../common-sql.php';
 include 'cmethods.php';
 

    
 $email=$_POST["email"];
 // echo $email;

  $query='SELECT * From users WHERE reg_mail="'.$email.'"';

 $result =mysqli_query($conn,$query);
 

 if (mysqli_num_rows($result)> 0) {
   
   // print_r(mysqli_fetch_assoc($result));
    // echo "Email is alrady exist";
    
    $password = generateRandomString();
// echo $password;

$updateQ='UPDATE users SET password="'.md5($password).'" WHERE email="'.$email.'"';

// echo $updateQ;
$updateResult =mysqli_query($conn,$updateQ);
$response = array('status'=>'true','message'=>'New password has been sent to your registered email (i.e) '.$email);
echo json_encode($response);
//echo "{status:true,message:'New password has been sent to your registered email (i.e) ".$email."'}";

$emailArray=array('email'=>$email,'password'=>$password,'forget'=>'true');
 sendPasswordInEmail($emailArray);

}else{
$response = array('status'=>'false','message'=>'The email address was not found in the database');
echo json_encode($response);
	// echo 'The email address was not found in the database';
}