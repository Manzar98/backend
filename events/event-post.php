
<?php
include 'common-sql.php';
// print_r($_POST);

$is_check=true;

if (empty($_POST['event_name'])) {

	$is_check=false;
	echo "This Field is required";
}else{

	$name         = $_POST['event_name'];
}
if (empty($_POST['event_venue'])) {

	$is_check=false;
	echo "This Field is required";
}else{
	
	$venue        = $_POST['event_venue'];
}
if (empty($_POST['event_recurrence'])) {

	$is_check=false;
	echo "This Field is required";
}else{
	
	$recurrence   = $_POST['event_recurrence'];
}
if (empty($_POST['event_descrip'])) {

	$is_check=false;
	echo "This Field is required";
}else{
	
	$descrip      = $_POST['event_descrip'];

}
if (empty($_POST['event_entry'])) {

	$is_check=false;
	echo "This Field is required";
}else{
	
	$evententry   = $_POST['event_entry'];

}
if (empty($_POST['event_childallow'])) {

	$is_check=false;
	echo "This Field is required";
}else{
	
	$childallow   = $_POST['event_childallow'];

}
if (empty($_POST['event_undr5allow'])) {

	$is_check=false;
	echo "This Field is required";
}else{
	
	$undr5allow   = $_POST['event_undr5allow'];

}
if (!is_numeric($_POST['event_entryfee'])) {
	
	$is_check=false;
	echo "This Field is accept only numeric";
}else{

	$entryfee     = $_POST['event_entryfee'];
}



$halftikchild = $_POST['event_halftikchild'];
if (isset($_POST['event_undr5free'])) {
	$undr5free    = $_POST['event_undr5free'];
}else{
	$undr5free    = 'off';
}
 
if (!is_numeric($_POST['event_undr5price'])) {
	
	$is_check=false;
	echo "This Field is accept only numeric";
}else{
	
	$undr5price   = $_POST['event_undr5price'];
} 

if (!is_numeric($_POST['common_nopeople'])) {
	
	$is_check=false;
	echo "This Field is accept only numeric";
}else{
	
	$nospeople     = $_POST['common_nopeople'];
} 

if (!is_numeric($_POST['common_discount'])) {
	
	$is_check=false;
	echo "This Field is accept only numeric";
}else{
	
	$discountx    = $_POST['common_discount'];
}


if (empty($_POST['event_pikoffer'])) {

	$is_check=false;
	echo "This Field is required";
}else{
	
	$pikofer      = $_POST['event_pikoffer'];

}

if (!is_numeric($_POST['event_pikair'])) {
	
	$is_check=false;
	echo "This Field is accept only numeric";
}else{
	
	$pikair       = $_POST['event_pikair'];
}

if (!is_numeric($_POST['event_pikbus'])) {
	
	$is_check=false;
	echo "This Field is accept only numeric";
}else{
	
	$pikbus       = $_POST['event_pikbus'];
}

if (!is_numeric($_POST['event_pikspecific'])) {
	
	$is_check=false;
	echo "This Field is accept only numeric";
}else{
	
	$pikspecific  = $_POST['event_pikspecific'];

}

if (empty($_POST['event_drpoffer'])) {

	$is_check=false;
	echo "This Field is required";
}else{
	
	$drpofer      = $_POST['event_drpoffer'];
}

if (!is_numeric($_POST['event_drpair'])) {
	
	$is_check=false;
	echo "This Field is accept only numeric";
}else{
	
	$drpair       = $_POST['event_drpair'];

}

if (!is_numeric($_POST['event_drpbus'])) {
	
	$is_check=false;
	echo "This Field is accept only numeric";
}else{
	
	$drpbus       = $_POST['event_drpbus'];

}

if (!is_numeric($_POST['event_drpspecific'])) {
	
	$is_check=false;
	echo "This Field is accept only numeric";
}else{
	
	$drpspecific  = $_POST['event_drpspecific'];

}

if (empty($_POST['common_image'])) {
	
	$is_check=false;
     echo "This Field is Required";
}else{

	$img          = $_POST['common_image'];

$imgarray= explode(",",$img);

}
if (empty($_POST['common_video'])) {
	
	$is_check=false;
     echo "This Field is Required";
}else{

	
$provideo        = $_POST['common_video'];


}
$userid       = 2;
$hotelid      = 31;
$formtype     = 'event';

if ($is_check==true) {
	# code...

$query='INSERT INTO event(user_id,hotel_id,event_name,event_venue,event_recurrence,event_descrip,event_entry,event_entryfee,event_childallow,event_undr5allow,event_halftikchild,event_undr5free,event_undr5price,event_pikoffer,event_pikair,event_pikbus,event_pikspecific,event_drpoffer,event_drpair,event_drpbus,event_drpspecific)VALUES("'.$userid.'","'.$hotelid.'","'.$name.'","'.$venue.'","'.$recurrence.'","'.$descrip.'","'.$evententry.'","'.$entryfee.'","'.$childallow.'","'.$undr5allow.'","'.$halftikchild.'","'.$undr5free.'","'.$undr5price.'","'.$pikofer.'","'.$pikair.'","'.$pikbus.'","'.$pikspecific.'","'.$drpofer.'","'.$drpair.'","'.$drpbus.'","'.$drpspecific.'")';

if ($conn->query($query)== TRUE) {
 	# code...
 	$event_id=$conn->insert_id;

 }else{
 	echo "Error: " . $query . "<br>" . $conn->error;
 }

echo $event_id;


if (isset($_POST['common_video'])) {

	$videoQuery='INSERT INTO common_imagevideo(event_id,common_video,img_video_type)VALUES("'.$event_id.'","'.$provideo.'","'.$formtype.'")';

	mysqli_query($conn,$videoQuery) or die(mysqli_error($conn));
	# code...
  echo 	$videoQuery;
}



 for ($i=0; $i<count($imgarray); $i++) {

             print_r($imgarray) ;

	  $img_UpdateQuery='UPDATE common_imagevideo SET
 	 event_id="'.$event_id.'",
 	 img_video_type = "'.$formtype.'" WHERE common_imgvideo_id="'.$imgarray[$i].'"' ;

             mysqli_query($conn,$img_UpdateQuery) or die(mysqli_error($conn));


 }

 for ($i=0; $i < count($_POST['common_nopeople']) ; $i++) { 


 	$discountQuery='INSERT INTO common_nosofpeople(event_id,common_nopeople,common_discount,discount_type)VALUES("'.$event_id.'","'.$nospeople[$i].'","'.$discountx[$i].'","'.$formtype.'")';
     // echo $discountQuery;
 	$disQuery=mysqli_query($conn,$discountQuery) or die(mysqli_error($conn));
 	# code...
 }

  echo "<br>"."Your Form Submitted Sucessfully !"."<br>";
}else{

	return false;
}

?>


