<?php
/////////////////////////////////////////////
include 'common-sql.php';

$email = $_POST['email'];
$password = $_POST['password'];


$query = 'SELECT * FROM credentials WHERE reg_email="'.$email.'" AND reg_password="'.md5($password).'" ';

$result = mysqli_query($conn,$query) or die(mysqli_error($conn));


if(mysqli_num_rows($result) == 1){

  //echo 'Successfuly authorized';
$crntresult=mysqli_fetch_assoc($result) ;//for exract out id we use this  
   //echo $crntresult['id'] ;
if ($crntresult['user_status']!="Suspended" && $crntresult['user_status']!="Pending") {
    
    $queryup= 'UPDATE `credentials` SET reg_lastlogin=now() Where reg_email="'.$email.'"';
 
 mysqli_query($conn,$queryup)or die(mysqli_error($conn));

  
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

        if ($crntresult['user_type']=='vendor') {
       $res_Array=array(
          "status"=>"Success",
           "id"=> $crntresult['user_id'],
           "u_type"=> $crntresult['user_type']
        );
  }elseif ($crntresult['user_type']=='admin'){
         
         $res_Array=array(
          "status"=>"Success",
           "id"=> $crntresult['user_id'],
           "u_type"=> $crntresult['user_type']
        );

  }elseif($crntresult['user_type']=='blogger'){

         $res_Array=array(
          "status"=>"Success",
           "id"=> $crntresult['user_id'],
           "u_type"=> $crntresult['user_type']
        );
  }
       echo json_encode($res_Array);
        // header('Location: dashboard.php?id='.$crntresult['user_id']);//to send the id for 
  }elseif($crntresult['user_status'] == "Suspended"){

       $res_Array=array(
          "status"=>"Error-sus",
           "type"=>"Suspended"
     
        );
  echo  json_encode($res_Array);

  }elseif ($crntresult['user_status'] == "Pending") {
    
    $res_Array=array(
          "status"=>"Error-pen",
           "type"=>"Pending"
     
        );

  echo  json_encode($res_Array);
  }

 
     
  
        
}else{ 

	   $res_Array=array(
          "status"=>"Error"
     
        );
	echo  json_encode($res_Array);
}
