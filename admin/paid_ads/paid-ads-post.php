<?php

 include '../../common-sql.php';
 session_start();
 // print_r($_POST);
$is_check=true;
$responseArray=[];
$adName=$_POST['ad_name'];
 if (empty($_POST['select_any'])) {

 	     $is_check=false;
	     array_push($responseArray,"Choose a list");
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
 $bidAmt=$_POST['bid_amount'];

 $errorMsgs=implode(",",$responseArray);
  $newErrorMsgArr=array(
    "status"=> "error",
    "message"=> $errorMsgs,

);

$newSuccessMsgArr=array(
    "status"=> "success",
    "s_status"=>$_POST['status'],
    "v_name"=>$_POST['v_name'],
    "user_id"=>$_POST['user_id']
    
);
  if ($is_check ==true) {
  $paidQuery='INSERT INTO paid_ads(user_id,ad_name,select_any,list_of_any,on_which_page,no_of_days,bid_amount,ad_status)VALUES("'.$_POST['user_id'].'","'.$adName.'","'.$selct_one.'","'.$lst_any.'","'.$which_pge.'","'.$no_days.'","'.$bidAmt.'","Pending")';

  // $result=mysqli_query($conn,$paidQuery) or die(mysqli_error($conn));

  if ($conn->query($paidQuery)== TRUE) {
  # code...
  $paid_id=$conn->insert_id;

 
 }else{
  echo "Error: " . $paidQuery . "<br>" . $conn->error;
 }

   include '../../methods/send-notification.php';

     insert_notification($conn,$_POST['user_id'],"admin","true","false","Created","New Ad featured","Ad for ".$lst_any." has been featured",date("F j, Y, g:i a"),"#","paid-ads","vendor","" );

    if ($_SESSION['user_type']=="admin") {

      insert_notification($conn,$_POST['user_id'],"admin","true","false","Created","New Ad featured","".$_SESSION['reg_name']." has been featured ".$lst_any."",date("F j, Y, g:i a"),"#","paid-ads","s_admin","" );
    }


	echo json_encode($newSuccessMsgArr);
}else{


	echo json_encode($newErrorMsgArr);
}

?>