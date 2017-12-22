<?php
 include 'common-sql.php';
print_r($_POST);

// return false;
$is_check=true;


if (empty($_POST['tour_name'])) {

     $is_check=false;
     echo "Tour Name is Required";
}else{
   
   $tourname      =$_POST['tour_name'];
}
if (empty($_POST['tour_destinationname'])) {

     $is_check=false;
     echo "Name of Destination is Required";
}else{
   
   $nameofdesti      =$_POST['tour_destinationname'];
}

if (empty($_POST['tour_foodinclude'])) {

     $is_check=false;
     echo "This Field is Required010";
}else{
   
   $fodinclude       =$_POST['tour_foodinclude'];
}

   
  if (isset($_POST['tour_brkfast'])) {

	$brkfast      =$_POST['tour_brkfast'];
}else{
	$brkfast      ='off';
}


   
 if (isset($_POST['tour_lunch'])) {

	$lunch        =$_POST['tour_lunch'];
}else{
	$lunch        ='off';
}



if (isset($_POST['tour_dinner'])) {

    $dinner         =$_POST['tour_dinner'];

}else{
	$dinner        ='off';
}


if (empty($_POST['tour_drink'])) {

	$is_check=false;
     echo "This Field is Required";
}else{

	$drnkinclude      =$_POST['tour_drink'];
}



 if (isset($_POST['tour_aloholic'])) {

$aloholic           =$_POST['tour_aloholic'];

}else{
	$aloholic        ='off';

}



 if (isset($_POST['tour_nonaloholic'])) {

 $nonalohlic             =$_POST['tour_nonaloholic'];

}else{
	$nonalohlic         ='off';
}



if (empty($_POST['tour_stayday'])) {

	$is_check=false;
     echo "This Field is Required";
}else{

	$stayday          =$_POST['tour_stayday'];
}
if (empty($_POST['tour_stayni8'])) {
	
 	$is_check=false;
      echo "This Field is Required";
 }else{

 	$stayni8     =$_POST['tour_stayni8'];
 }

$hotelstr         =$_POST['tour_hotelstr'];
if (isset($_POST['tour_camping'])) {

$camping          =$_POST['tour_camping'];

}else{
	$camping          ='off';

}

if (empty($_POST['tour_entrytik'])) {
	
	$is_check=false;
     echo "This Field is Required";
}else{

	$entrytik         =$_POST['tour_entrytik'];
}
if (empty($_POST['tour_plan'])) {
	
	$is_check=false;
     echo "This Field is Required";
}else{

	$plan             =$_POST['tour_plan'];
}
if (empty($_POST['tour_pkgprice'])) {
	
	$is_check=false;
     echo "This Field is Required";
}else{

	$pkgprice         =$_POST['tour_pkgprice'];

}
if (empty($_POST['tour_capacitypeople'])) {
	
	$is_check=false;
     echo "This Field is Required";
}else{

	$capcipeople      =$_POST['tour_capacitypeople'];

}
if (empty($_POST['tour_nosofbag'])) {
	
	$is_check=false;
     echo "This Field is Required";
}else{

	$nosbag           =$_POST['tour_nosofbag'];

}
if (empty($_POST['tour_childallow'])) {
	
	$is_check=false;
     echo "This Field is Required";
}else{

	$childallow       =$_POST['tour_childallow'];

}
if (empty($_POST['tour_undr5allow'])) {
	
	$is_check=false;
     echo "This Field is Required";
}else{

	$undr5allow       =$_POST['tour_undr5allow'];

}
$extrachrbag      =$_POST['tour_extrachrbag'];
$halftikchild     =$_POST['tour_halftikchild'];
if (isset($_POST['tour_undr5free'])) {

  $undr5free          =$_POST['tour_undr5free'];

}else{
	$undr5free          ='off';

}
$undr5price       =$_POST['tour_undr5price'];
if (empty($_POST['tour_strtloc'])) {
	
	$is_check=false;
     echo "This Field is Required";
}else{

	$strtloc          =$_POST['tour_strtloc'];

}
if (empty($_POST['tour_pikoffer'])) {
	
	$is_check=false;
     echo "This Field is Required";
}else{

	$pikoffer         =$_POST['tour_pikoffer'];

}


$pikair           =$_POST['tour_pikair'];
$pikbus           =$_POST['tour_pikbus'];
$pikspecific      =$_POST['tour_pikspecific'];
if (empty($_POST['tour_drpoffer'])) {
	
	$is_check=false;
     echo "This Field is Required";
}else{

	$drpoffer         =$_POST['tour_drpoffer'];

}
$drpair           =$_POST['tour_drpair'];
$drpbus           =$_POST['tour_drpbus'];
$drpspecific      =$_POST['tour_drpspecific'];
$noofpeople       =$_POST['common_nopeople'];
$discountpeople   =$_POST['common_discount'];

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

$denation_name    =$_POST['destination_name'];
$denation_desp    =$_POST['destination_descrp'];
$attraction_name  =$_POST['attraction_name'];
$attraction_desp  =$_POST['attraction_descrp'];
$user_id          =2;
$hotelid          =31;
$formtype         ='tour';

if ($is_check==true) {
	# code...


$query= 'INSERT INTO tour(user_id,hotel_id,tour_name,tour_destinationname,tour_foodinclude,tour_brkfast,tour_lunch,tour_dinner,tour_aloholic,tour_nonaloholic,tour_stayday,tour_stayni8,tour_hotelstr,tour_camping,tour_entrytik,tour_plan,tour_pkgprice,tour_capacitypeople,tour_nosofbag,tour_extrachrbag,tour_childallow,tour_undr5allow,tour_halftikchild,tour_undr5free,tour_undr5price,tour_strtloc,tour_pikoffer,tour_pikair,tour_pikbus,tour_pikspecific,tour_drpoffer,tour_drpair,tour_drpbus,tour_drpspecific)VALUES("'.$user_id.'","'.$hotelid.'","'.$tourname.'","'.$nameofdesti[0].'","'.$fodinclude.'","'.$brkfast.'","'.$lunch.'","'.$dinner.'","'.$drnkinclude.'","'.$aloholic.'","'.$nonalohlic.'","'.$stayday.'","'.$stayni8.'","'.$hotelstr.'","'.$camping.'","'.$entrytik.'","'.$plan.'","'.$pkgprice.'","'.$capcipeople.'","'.$nosbag.'","'.$extrachrbag.'","'.$childallow.'","'.$undr5allow.'","'.$halftikchild.'","'.$undr5price.'","'.$strtloc.'","'.$pikoffer.'","'.$pikair.'","'.$pikbus.'","'.$pikspecific.'","'.$drpoffer.'","'.$drpair.'","'.$drpbus.'","'.$drpspecific.'")';

if ($conn->query($query)== TRUE) {
 	# code...
 	$tour_id=$conn->insert_id;

 }else{
 	echo "Error: " . $query . "<br>" . $conn->error;
 }

echo $tour_id;
 
 if (isset($_POST['common_video'])) {

	$videoQuery='INSERT INTO common_imagevideo(tour_id,common_video,img_video_type)VALUES("'.$tour_id.'","'.$provideo.'","'.$formtype.'")';

	mysqli_query($conn,$videoQuery) or die(mysqli_error($conn));
	# code...
}



 for ($i=0; $i<count($imgarray); $i++) {

             print_r($imgarray) ;

	  $img_UpdateQuery='UPDATE common_imagevideo SET
 	 tour_id="'.$tour_id.'",
 	 img_video_type = "'.$formtype.'" WHERE common_imgvideo_id="'.$imgarray[$i].'"' ;

             mysqli_query($conn,$img_UpdateQuery) or die(mysqli_error($conn));


 }


for ($i=0; $i < count($_POST['common_nopeople']) ; $i++) { 


 	$discountQuery='INSERT INTO common_nosofpeople(tour_id,common_nopeople,common_discount,discount_type)VALUES("'.$tour_id.'","'.$noofpeople[$i].'","'.$discountpeople[$i].'","'.$formtype.'")';
     // echo $discountQuery;
 	$disResult=mysqli_query($conn,$discountQuery) or die(mysqli_error($conn));
 	# code...
 }


 for ($i=0; $i < count($_POST['destination_name']) ; $i++) { 


 	$destinationQuery='INSERT INTO tour_destination(tour_id,destination_name,destination_descrp)VALUES("'.$tour_id.'","'.$denation_name[$i].'","'.$denation_desp[$i].'")';


    if ($conn->query($destinationQuery)== TRUE) {
 	# code...
 	$destination_id=$conn->insert_id;

 }else{
 	echo "Error: " . $destinationQuery . "<br>" . $conn->error;
 }

echo $destination_id;

     // echo $discountQuery;
 	

 	 

for ($i=0; $i < count($_POST['attraction_name']) ; $i++) { 
 	
 	$attrctionQuery='INSERT INTO tour_attraction(destination_id,attraction_name,attraction_descrp)VALUES("'.$destination_id.'","'.$attraction_name[$i].'","'.$attraction_desp[$i].'")';

 	$attrResult=mysqli_query($conn,$attrctionQuery) or die(mysqli_error($conn));
 }
}


   echo "<br>"."Your Form Submitted Sucessfully !"."<br>";
}else{
	return false;
}
?>