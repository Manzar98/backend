<?php

 include 'common-sql.php';
 // print_r($_POST);
$is_check=true;
$responseArray=[];
 if (empty($_POST['select_any'])) {

 	     $is_check=false;
	     array_push($responseArray,"Select One is required");
 }else{
    
     $selct_one=$_POST['select_any'];
 }

if (empty($_POST['list_of_any'])) {

 	     $is_check=false;
	     array_push($responseArray,"List of  is required");
 }else{
    
     $lst_any=$_POST['list_of_any'];
 }

 if (empty($_POST['on_which_page'])) {

 	     $is_check=false;
	     array_push($responseArray,"On which page is required");
 }else{
    
     $which_pge=$_POST['on_which_page'];
 }

 if (empty($_POST['no_of_days'])) {

 	     $is_check=false;
	     array_push($responseArray,"No of days is required");
 }else{
    
     $no_days=$_POST['no_of_days'];
 }

 $errorMsgs=implode(",",$responseArray);
  $newErrorMsgArr=array(
    "status"=> "error",
    "message"=> $errorMsgs
);

$newSuccessMsgArr=array(
    "status"=> "success"
    
);
  if ($is_check ==true) {
  $paidQuery='INSERT INTO paid_ads(user_id,select_any,list_of_any,on_which_page,no_of_days)VALUES("'.$_POST['user_id'].'","'.$selct_one.'","'.$lst_any.'","'.$which_pge.'","'.$no_days.'")';

  $result=mysqli_query($conn,$paidQuery) or die(mysqli_error($conn));


	echo json_encode($newSuccessMsgArr);
}else{


	echo json_encode($newErrorMsgArr);
}

?>