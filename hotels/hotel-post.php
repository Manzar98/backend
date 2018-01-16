<?php

  include '../common-sql.php';
 // print_r($_POST);

$is_check= true;

 if (empty($_POST['hotel_name'])) {

 	$is_check= false;
 	echo "Hotel Name is required";
 }else{

	$name=$_POST['hotel_name'];
 }
 if (empty($_POST['hotel_addres1'])) {
	 
 	 $is_check=false;
 	 echo "Address 1 is required";
 }else{

	$addres1=$_POST['hotel_addres1'];

 }

$addres2=$_POST['hotel_addres2'];

 if (empty($_POST['hotel_city'])) {
	 
 	 $is_check=false;
 	 echo "City is required";
 }else{
	
	$city=$_POST['hotel_city'];

 }
 if (empty($_POST['hotel_province'])) {
	 
 	 $is_check=false;
 	 echo "Province is required";
 }else{
	
	$province=$_POST['hotel_province'];

 }

 if (empty($_POST['hotel_phone'])) {
	 
 	 $is_check=false;
 	 echo "Phone Number is required";
 }elseif(!is_numeric($_POST['hotel_phone'])){

 	 $is_check=false;
 	 echo "Phone Number accept only numeric";

 }else{
	
	$phone=$_POST['hotel_phone'];

 }
 if (!empty($_POST['hotel_fax']) && !is_numeric($_POST['hotel_fax'])) {
	
 	$is_check=false;
 	 echo "Fax Number accept only numeric";

 }elseif(!empty($_POST['hotel_fax']) && is_numeric($_POST['hotel_fax'])){

	$fax=$_POST['hotel_fax'];
 }else{
  $fax=null;
 }


  if (empty($_POST['hotel_email'])) {
	 
  	 $is_check=false;
  	 echo "Email Address is required ";
  }else{
	
 	$email=$_POST['hotel_email'];

  }
$web=$_POST['hotel_web'];
   
  if (empty($_POST['hotel_descrp'])) {
	
  	$is_check=false;
  	echo "Description is required ";

  }else{

	$descrp=$_POST['hotel_descrp'];

  }
 if (empty($_POST['hotel_other'])) {
	
 	$is_check=false;
 	echo "Amenities is required "."<br>";

 }else{

	$other=$_POST['hotel_other'];

 }
 if (empty($_POST['hotel_policy'])) {

  	$is_check=false;
 	echo "Canellation Policy is required ";
  }else{

	$policy=$_POST['hotel_policy'];
  }
 if (empty($_POST['hotel_pickup'])) {

	
 	$is_check=false;
 	echo "Hotel Pickup is required ";

 }else{

	$pickup=$_POST['hotel_pickup'];
 }
 if (!empty($_POST['hotel_pikcharge']) && !is_numeric($_POST['hotel_pikcharge'])) {

 	$is_check=false;
 	echo "Pickup charges accept only numeric";

 }elseif (!empty($_POST['hotel_pikcharge']) && is_numeric($_POST['hotel_pikcharge'])) {
	
 	$charges=$_POST['hotel_pikcharge'];
 }else{

	$charges=null;
}

   
   $intimg=$_POST['common_image'];
   $intarray= explode(",",$intimg);
   
  
   $extimg=$_POST['common_extimage'];

   if (isset($extimg)) {
 	
 	 $extarray= explode(",",$extimg);

    

 }


$provideo=$_POST['common_video'];

if (!empty($_POST['hotel_nobag'])) {

  $nobag=$_POST['hotel_nobag'];
}else{
  $nobag=null;
}

$bagprice=$_POST['hotel_bagprice'];
$fburl=$_POST['hotel_fburl'];
$twurl=$_POST['hotel_twurl'];
$gourl=$_POST['hotel_gourl'];
$insurl=$_POST['hotel_insurl'];
$pinurl=$_POST['hotel_pinurl'];
$yuturl=$_POST['hotel_yuturl'];

if (empty($_POST['hotel_checkin'])) {
  $is_check=false;
  echo "CheckIn field is required";
}else{
   $checkIn=$_POST['hotel_checkin'];
}

if (empty($_POST['hotel_checkout'])) {
  $is_check=false;
  echo "CheckOut field is required";
}else{

  $checkOut=$_POST['hotel_checkout'];
}

if (isset($_POST['hotel_isair'])) {
  
  $is_air= $_POST['hotel_isair'];
}else{

 $is_air= 'off';
}

if (isset($_POST['hotel_isbus'])) {
  
  $is_bus= $_POST['hotel_isbus'];
}else{

 $is_bus= 'off';
}

if (!empty($_POST['hotel_buscharge']) && !is_numeric($_POST['hotel_buscharge'])) {

  $is_check=false;
  echo "Pickup charges accept only numeric";

 }elseif (!empty($_POST['hotel_buscharge']) && is_numeric($_POST['hotel_buscharge'])) {
  
  $buscharge=$_POST['hotel_buscharge'];
 }else{

  $buscharge=null;
}
  

  


$formtype='hotel';
$user_id= 2;



 

 


 if ($is_check==true) {
	# code...

$query='INSERT INTO hotel(user_id,hotel_name,hotel_addres1,hotel_addres2,hotel_city,hotel_province,hotel_phone,hotel_fax,hotel_email,hotel_web,hotel_descrp,hotel_other,hotel_pickup,hotel_isair,hotel_isbus,hotel_buscharge,hotel_pikcharge,hotel_nobag,hotel_bagprice,hotel_policy,hotel_fburl,hotel_twurl,hotel_gourl,hotel_insurl,hotel_pinurl,hotel_yuturl,hotel_checkin,hotel_checkout)VALUES("'.$user_id.'","'.$name.'","'.$addres1.'","'.$addres2.'","'.$city.'","'.$province.'","'.$phone.'","'.$fax.'","'.$email.'","'.$web.'","'.$descrp.'","'.$other.'","'.$pickup.'","'.$is_air.'","'.$is_bus.'","'.$buscharge.'","'.$charges.'","'.$nobag.'","'.$bagprice.'","'.$policy.'","'.$fburl.'","'.$twurl.'","'.$gourl.'","'.$insurl.'","'.$pinurl.'","'.$yuturl.'","'.$checkIn.'","'.$checkOut.'")';



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

  for ($i=0; $i<count($extarray); $i++) {

         

	   $ext_UpdateQuery='UPDATE common_imagevideo SET
  	  hotel_id="'.$hotel_id.'",
  	  img_video_type = "'.$formtype.'" WHERE common_imgvideo_id="'.$extarray[$i].'"' ;

              mysqli_query($conn,$ext_UpdateQuery) or die(mysqli_error($conn));


  }

  echo "sucess";
 }else{
 	return false;
 	 echo "<br>"."Your Form Can't Submit Kindly Check again "."<br>";
 }


	






?>