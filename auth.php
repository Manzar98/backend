<?php
/////////////////////////////////////////////
include 'common-sql.php';

$email = $_POST['email'];
$password = $_POST['password'];


$query = 'SELECT * FROM credentials WHERE email="'.$email.'" AND password="'.$password.'" ';

$result = mysqli_query($conn,$query) or die(mysqli_error($conn));


if(mysqli_num_rows($result) == 1){
	//echo 'Successfuly authorized';
$crntresult=mysqli_fetch_assoc($result) ;//for exract out id we use this  
	 //echo $crntresult['id'] ;
	 session_start();
	    $_SESSION['login'] = true;
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        $_SESSION['user_id']=$crntresult['user_id'];
      
     	  header('Location: dashboard.php?id='.$crntresult['user_id']);//to send the id for 
     
  
        
}else{
	echo 'Email or password is incorrect';
}
