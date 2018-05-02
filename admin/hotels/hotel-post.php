<?php

include '../../common-sql.php';
 // print_r($_POST);

$is_check= true;
$responseArray=[];

if (empty($_POST['hotel_name'])) {

  $is_check= false;
  array_push($responseArray,"Hotel name is required");

}else{

	$name=$_POST['hotel_name'];
}
if (empty($_POST['hotel_addres1'])) {

 $is_check=false;
 array_push($responseArray,"Address line 1 field is required");

}else{

	$addres1=$_POST['hotel_addres1'];

}

$addres2=$_POST['hotel_addres2'];

if (empty($_POST['hotel_city'])) {

 $is_check=false;
 array_push($responseArray,"City field is required");
}else{
	
	$city=$_POST['hotel_city'];

}
if (empty($_POST['hotel_province'])) {

 $is_check=false;
 array_push($responseArray,"Province field is required");
}else{
	
	$province=$_POST['hotel_province'];

}

if (empty($_POST['hotel_phone'])) {

 $is_check=false;
 array_push($responseArray,"Phone number field is required"); 	 
}elseif(!is_numeric($_POST['hotel_phone'])){

 $is_check=false;
 array_push($responseArray,"Phone number field should only contain numbers.");
}else{
	
	$phone=$_POST['hotel_phone'];

}
if (!empty($_POST['hotel_fax']) && !is_numeric($_POST['hotel_fax'])) {
	
  $is_check=false;
  array_push($responseArray,"Fax number field should only contain numbers.");
}elseif(!empty($_POST['hotel_fax']) && is_numeric($_POST['hotel_fax'])){

	$fax=$_POST['hotel_fax'];
}else{
  $fax=null;
}

if (empty($_POST['hotel_email'])) {

  $is_check=false;
  array_push($responseArray,"Email address field is required");
}elseif(!filter_var($_POST['hotel_email'], FILTER_VALIDATE_EMAIL)){

  $is_check=false;
  array_push($responseArray,"Email address field is invalid");
}else{
	
  $email=$_POST['hotel_email'];

}

if (!empty($_POST['hotel_web'])) {
  # code...

  if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST['hotel_web'])) {
    $is_check=false;
    array_push($responseArray,"Website url is invalid");  
  }else{

   $web=$_POST['hotel_web'];
 }
}else{

  $web=null;
}


if (empty($_POST['hotel_descrp'])) {
	
 $is_check=false;
 array_push($responseArray,"Description field is required");
}else{

	$descrp=$_POST['hotel_descrp'];

}
if (empty($_POST['hotel_other'])) {
	
  $is_check=false;
  array_push($responseArray,"Amenities field is required");
}else{

	$other=$_POST['hotel_other'];

}
if (empty($_POST['hotel_policy'])) {

 $is_check=false;
 array_push($responseArray,"Canellation policy field is required");
}else{

 $policy=$_POST['hotel_policy'];
}

if (empty($_POST['hotel_pickup'])) {

  $is_check=false;
  array_push($responseArray,"Hotel pickup field is required");
}elseif ($_POST['hotel_pickup'] == 'yes') {

  $pickup=$_POST['hotel_pickup'];
  if (!isset($_POST['hotel_isair']) && !isset($_POST['hotel_isbus'])) {

    $is_check=false;
    array_push($responseArray,"Check atleast one from pickup offered");
  }else{

    if (isset($_POST['hotel_isair']) && $_POST['hotel_isair']=="on") {

      $is_air= $_POST['hotel_isair'];
      if (empty($_POST['hotel_pikcharge'])) {

        $is_check=false;
        array_push($responseArray,"Airport charges field is required");
      }else{

       $charges=$_POST['hotel_pikcharge'];
     }
   }else{
    $charges=null;
     $is_air= 'off';
   }

   if (isset($_POST['hotel_isbus']) && $_POST['hotel_isbus']=='on') {

    $is_bus= $_POST['hotel_isbus'];
    if (empty($_POST['hotel_buscharge'])) {
     $is_check=false;
     array_push($responseArray,"Bus charges field is required");
   }else{
     $buscharge=$_POST['hotel_buscharge'];
   }

 }else{
   $buscharge=null;
   $is_bus= 'off';
 }
}

}else{
 $pickup=$_POST['hotel_pickup'];
 $charges=null;
 $buscharge=null;
 $is_bus= 'off';
 $is_air= 'off';

}

$intimg=$_POST['common_image'];
$intarray= explode(",",$intimg);
$extimg=$_POST['common_extimage'];
if (isset($extimg)) {

  $extarray= explode(",",$extimg);
}
if (!empty($_POST['hotel_nobag']) ) {

  $nobag=$_POST['hotel_nobag'];

   if ($_POST['hotel_nobag'] > 0) {

      if (empty($_POST['hotel_bagprice'])) {
        
        $is_check= false;
        array_push($responseArray,"Bag charges field is required");
  }elseif (!empty($_POST['hotel_bagprice']) && !is_numeric($_POST['hotel_bagprice'])) {
       $is_check= false;
       array_push($responseArray,"Bag charges field should only contain numbers.");
  }else{

       $bagprice=$_POST['hotel_bagprice'];
  }
   }

 
}
else{
  $nobag=null;
  $bagprice=null;
}

$provideo=$_POST['common_video'];

$fburl=$_POST['hotel_fburl'];
$twurl=$_POST['hotel_twurl'];
$gourl=$_POST['hotel_gourl'];
$insurl=$_POST['hotel_insurl'];
$pinurl=$_POST['hotel_pinurl'];
$yuturl=$_POST['hotel_yuturl'];



if (empty($_POST['hotel_checkin'])) {
  $is_check=false;
  array_push($responseArray,"Checkin field is required");
}elseif (!preg_match("/^(?:0[1-9]|1[0-2]):[0-5][0-9](am|pm|AM|PM)$/", $_POST['hotel_checkin'])) {
 $is_check=false;
 array_push($responseArray,"Checkin time format is invalid");
}else{
 $checkIn=$_POST['hotel_checkin'];
}


if (empty($_POST['hotel_checkout'])) {

  $is_check=false;
  array_push($responseArray,"Checkout field is required");

}elseif (!preg_match("/^(?:0[1-9]|1[0-2]):[0-5][0-9](am|pm|AM|PM)$/", $_POST['hotel_checkout'])) {

 $is_check=false;
 array_push($responseArray,"Checkout time format is invalid");


}
else{

$checkOut=$_POST['hotel_checkout'];

}
$formtype='hotel';
$user_id= $_POST['user_id'];
if (isset($_POST['hotel_inactive'])) {
  $inactive=$_POST['hotel_inactive'];
}else{
  $inactive="off";
}




$errorMsgs=implode(",",$responseArray);

$newErrorMsgArr=array(
    "status"=> "error",
    "message"=> $errorMsgs
);

$newSuccessMsgArr=array(
    "status"=> "success",
    "id"  =>$user_id
);

if ($is_check==true) {
	# code...

  $query='INSERT INTO hotel(user_id,hotel_name,hotel_addres1,hotel_addres2,hotel_city,hotel_province,hotel_phone,hotel_fax,hotel_email,hotel_web,hotel_descrp,hotel_other,hotel_pickup,hotel_isair,hotel_isbus,hotel_buscharge,hotel_pikcharge,hotel_nobag,hotel_bagprice,hotel_policy,hotel_fburl,hotel_twurl,hotel_gourl,hotel_insurl,hotel_pinurl,hotel_yuturl,hotel_checkin,hotel_checkout,hotel_inactive,hotel_status)VALUES("'.$user_id.'","'.$name.'","'.$addres1.'","'.$addres2.'","'.$city.'","'.$province.'","'.$phone.'","'.$fax.'","'.$email.'","'.$web.'","'.$descrp.'","'.$other.'","'.$pickup.'","'.$is_air.'","'.$is_bus.'","'.$buscharge.'","'.$charges.'","'.$nobag.'","'.$bagprice.'","'.$policy.'","'.$fburl.'","'.$twurl.'","'.$gourl.'","'.$insurl.'","'.$pinurl.'","'.$yuturl.'","'.$checkIn.'","'.$checkOut.'","'.$inactive.'","Pending")';



  // echo $query;

  if ($conn->query($query)== TRUE) {
  	# code...
  	$hotel_id=$conn->insert_id;

// echo $hotel_id;
  }else{
  	echo "Error: " . $query . "<br>" . $conn->error;
  }
  // echo $hotel_id;


  if (isset($_POST['common_video'])) {

    $videoQuery='INSERT INTO common_imagevideo(hotel_id,common_video,img_video_type)VALUES("'.$hotel_id.'","'.$provideo.'","'.$formtype.'")';

    mysqli_query($conn,$videoQuery) or die(mysqli_error($conn));
 	# code...
  }






  for ($i=0; $i<count($intarray); $i++) {



    $img_UpdateQuery='UPDATE common_imagevideo SET
    hotel_id="'.$hotel_id.'",
    img_video_type = "'.$formtype.'" WHERE common_imgvideo_id="'.$intarray[$i].'"' ;

    mysqli_query($conn,$img_UpdateQuery) or die(mysqli_error($conn));


  }

  $cover_UpdateQuery='UPDATE common_imagevideo SET
   hotel_id="'.$hotel_id.'",
   img_video_type="'.$formtype.'" WHERE common_imgvideo_id="'.$_POST['hotel_coverimage'].'"';
   mysqli_query($conn,$cover_UpdateQuery) or die(mysqli_error($conn));

  for ($i=0; $i<count($extarray); $i++) {



    $ext_UpdateQuery='UPDATE common_imagevideo SET
    hotel_id="'.$hotel_id.'",
    img_video_type = "'.$formtype.'" WHERE common_imgvideo_id="'.$extarray[$i].'"' ;

    mysqli_query($conn,$ext_UpdateQuery) or die(mysqli_error($conn));


  }


  include '../../methods/send-notification.php';

  insert_notification($conn,$user_id,"admin","true","false","Created","New Hotel Created",$name. " hotel has been created under your account",date("F j, Y, g:i a"),"hotels/showsingle_hotelrecord.php?id=".$hotel_id,"hotel","vendor" );

  

  echo json_encode($newSuccessMsgArr);
}else{
  echo json_encode($newErrorMsgArr);
  return false;

}









?>