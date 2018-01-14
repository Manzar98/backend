<?php

include '../common-sql.php';

 // print_r($_POST);

$is_check=true;


if (empty($_POST['room_name'])) {
	$is_check=false;
	echo "Room Name is required";
}else{

	$name= $_POST['room_name'];
}
if (empty($_POST['room_nosroom'])) {
	$is_check=false;
	echo "Number of Rooms is required";
}elseif (!is_numeric($_POST['room_nosroom'])) {

	$is_check=false;
	echo "Number of Rooms accept only numeric";
}
else{

	$nos= $_POST['room_nosroom'];
}
if (empty($_POST['room_service'])) {
	$is_check=false;
	echo "Room Service is required";
}else{

	$service=$_POST['room_service'];
}
if (empty($_POST['room_maxadult'])) {
	$is_check=false;
	echo "Maximum adults is required";
}elseif (!is_numeric($_POST['room_maxadult'])) {

	$is_check=false;
	echo "Maximum adults accept only numeric";
}else{

	$maxadult=$_POST['room_maxadult'];
}
if (empty($_POST['room_matadult'])) {
	$is_check=false;
	echo "Extra mattress charges for adults is required";

}elseif (!is_numeric($_POST['room_matadult'])) {

	$is_check=false;
	echo "Extra mattress charges for adults accept only numeric";
}else{

	$matadult=$_POST['room_matadult'];
}

if (empty($_POST['room_maxchild'])) {
	$is_check=false;
	echo "Maximum children is required";
}elseif (!is_numeric($_POST['room_maxchild'])) {

	$is_check=false;
	echo "Maximum children accept only numeric";
}else{

	$maxchild=$_POST['room_maxchild'];
}
if (empty($_POST['room_matchild'])) {
	$is_check=false;
	echo "Extra mattress charges for Children is required";
}elseif (!is_numeric($_POST['room_matchild'])) {

	$is_check=false;
	echo "Extra mattress charges for Children accept only numeric";
}else{

	$matchild=$_POST['room_matchild'];
}
if (empty($_POST['room_perni8'])) {
	$is_check=false;
	echo "Room charges  is required";
}elseif (!is_numeric($_POST['room_perni8'])) {

	$is_check=false;
	echo "Room charges accept only numeric";
}else{

	$ni8=$_POST['room_perni8'];

}
// if (empty($_POST['room_descrip'])) {
// 	$is_check=false;
// 	echo "Room Description is required";
// }else{

	$descrip=$_POST['room_descrip'];

// }
if (empty($_POST['room_other'])) {
	$is_check=false;
	echo "Amenities is required";
}else{

	$other=$_POST['room_other'];

}


	$img=$_POST['common_image'];
    // print_r(explode(",", $img)) ;
    $imgarray= explode(",",$img);



	$provideo=$_POST['common_video'];
   

if (empty($_POST['hotel_name'])) {
	$is_check=false;
	echo "Hotel Name is required";
}else{

	$hotelName=$_POST['hotel_name'];
   
}

$from=$_POST['book_fromdate'];
$to=$_POST['book_todate'];

if (!empty($_POST['room_offerdiscount']) && !is_numeric($_POST['room_offerdiscount'])) {
	$is_check= false;
	echo"Offer discount accept only numeric";
}elseif (!empty($_POST['room_offerdiscount']) && is_numeric($_POST['room_offerdiscount'])) {
	$discuntofer=$_POST['room_offerdiscount'];
}else{

	$discuntofer=null;
}


$discountexpire=$_POST['room_expireoffer'];
$formtype='room';
$user_id= 2;
$hotelid=31;


if ($is_check==true) {
	# code...

$query='INSERT INTO room(user_id,hotel_id,room_name,room_nosroom,room_service,room_maxadult,room_matadult,room_maxchild,room_matchild,room_perni8,room_descrip,room_other,room_offerdiscount,room_expireoffer,hotel_name)VALUES("'.$user_id.'","'.$hotelid.'","'.$name.'","'.$nos.'","'.$service.'","'.$maxadult.'","'.$matadult.'","'.$maxchild.'","'.$matchild.'","'.$ni8.'","'.$descrip.'","'.$other[0].'","'.$discuntofer.'","'.$discountexpire.'","'.$hotelName.'")';


if ($conn->query($query)== TRUE) {
 	# code...
 	$room_id=$conn->insert_id;

 
 }else{
 	echo "Error: " . $query . "<br>" . $conn->error;
 }

// echo $room_id;


for ($i=0; $i<count($_POST['book_fromdate']); $i++) {

	$datesQuery='INSERT INTO common_bookdates(room_id,book_fromdate,book_todate,form_date_type)VALUES("'.$room_id.'","'.$from[$i].'","'.$to[$i].'","'.$formtype.'")';

	$datesResult=mysqli_query($conn,$datesQuery) or die(mysqli_error($conn));
}



if (isset($_POST['common_video'])) {

	$videoQuery='INSERT INTO common_imagevideo(room_id,common_video,img_video_type)VALUES("'.$room_id.'","'.$provideo.'","'.$formtype.'")';

	mysqli_query($conn,$videoQuery) or die(mysqli_error($conn));
	# code...
}



 for ($i=0; $i<count($imgarray); $i++) {

             // print_r($imgarray) ;

	  $img_UpdateQuery='UPDATE common_imagevideo SET
 	  room_id="'.$room_id.'",
 	  img_video_type = "'.$formtype.'" WHERE common_imgvideo_id="'.$imgarray[$i].'"' ;

             mysqli_query($conn,$img_UpdateQuery) or die(mysqli_error($conn));


 }


  echo "sucess";

}else{
	echo "you have an error";
	return false;
}


?>