<?php
/////////////////////////////////////////////
include 'common-sql.php';

$email = $_POST['email'];
$password = $_POST['password'];


$query = 'SELECT * FROM credentials WHERE reg_email="'.$email.'" AND reg_password="'.md5($password).'" ';

$result = mysqli_query($conn,$query) or die(mysqli_error($conn));


if(mysqli_num_rows($result) == 1){

 $queryup= 'UPDATE `credentials` SET reg_lastlogin=now() Where reg_email="'.$email.'"';
 
 mysqli_query($conn,$queryup)or die(mysqli_error());
	//echo 'Successfuly authorized';
$crntresult=mysqli_fetch_assoc($result) ;//for exract out id we use this  
	 //echo $crntresult['id'] ;
  
	 session_start();

	      $_SESSION['login'] = true;
        $_SESSION['reg_email']=$email;
        $_SESSION['reg_password']=$password;
        $_SESSION['user_id']=$crntresult['user_id'];
        $_SESSION['reg_cover']=$crntresult['reg_cover'];
        $_SESSION['reg_name']=$crntresult['reg_name'];
        $_SESSION['reg_lstname']=$crntresult['reg_lstname'];
        $_SESSION['reg_city']=$crntresult['reg_city'];
        $_SESSION['reg_country']=$crntresult['reg_country'];
        $_SESSION['reg_photo']=$crntresult['reg_photo'];

        $res_Array=array(
          "status"=>"Success",
           "id"=> $crntresult['user_id']
        );
       echo json_encode($res_Array);
     	  // header('Location: dashboard.php?id='.$crntresult['user_id']);//to send the id for 
     
  
        
}else{

	   $res_Array=array(
          "status"=>"Error"
     
        );
	echo  json_encode($res_Array);
}
