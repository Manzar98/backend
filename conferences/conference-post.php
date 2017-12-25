<?php

 include 'common-sql.php';

// print_r($_POST);

$is_check= true;

// ['hotel_name' : 'Hotel Name is required',]


// print_r($error_array);

if (empty($_POST['conference_name'])) {
 
	$is_check= false;
	echo "Hall Name is Required"."<br>";
	 

}else{

   $name     = $_POST['conference_name'];
	
}
if (empty($_POST['conference_space'])) {

	$is_check= false;
	echo "Capacity Of Hall is Required"."<br>";
	# code...
}elseif (!is_numeric($_POST['conference_space'])) {
	$is_check=false;
	echo "This Field accept only Numeric"."<br>";
}else{

	$space        = $_POST['conference_space'];
	
}
if (empty($_POST['conference_serve'])) {

	 $is_check= false;
	echo "Serve Food is Required"."<br>";
	
}else{

    $serve	      = $_POST['conference_serve'];
    

}
if (empty($_POST['foodpkg_menu'])) {

	$is_check=false;
	echo "Package Menu is Required"."<br>";
}else{

	$pkgmenu      = $_POST['foodpkg_menu'];
}
if (empty($_POST['foodpkg_name'])) {

	$is_check=false;
	echo "Menu Name is Required"."<br>";

}else{

	$pkgname = $_POST['foodpkg_name'];
}
if (empty($_POST['foodpkg_price'])) {

	$is_check=false;
	echo "Menu Package Price is Required"."<br>";
}elseif (!is_numeric($_POST['foodpkg_price'])) {
	$is_check=false;
	echo "This Field accept only Numeric"."<br>";
}
else{
  
  $pkgprice     = $_POST['foodpkg_price'];
}
if (empty($_POST['foodpkg_item'])) {

	$is_check=false;
	echo "Menu Package Price is Required"."<br>";
}else{

	$pgkitem      = $_POST['foodpkg_item'];
	
}


$img          = $_POST['common_image'];
$imgarray= explode(",",$img);
$provideo       = $_POST['common_video'];


if (!is_numeric($_POST['foodpkg_discount'])) {

	$is_check=false;
	echo "This Field accept only Numeric"."<br>";
}else{

	$pkgdis	      = $_POST['foodpkg_discount'];
}

$other	      = $_POST['conference_other'];
$frmdate      = $_POST['book_fromdate'];
$todate       = $_POST['book_todate'];

if (!is_numeric($_POST['conference_offerdiscount'])) {

	$is_check=false;
	echo "This Field accept only Numeric"."<br>";
}else{
	
	$discuntofer=$_POST['conference_offerdiscount'];
}

$discountexpire=$_POST['conference_expireoffer'];
$userid       = 2;
$formtype     = 'conference';
$hotelid      = 31;



 
if ($is_check==true) {
	# code...


     
$query='INSERT INTO conference(user_id,hotel_id,conference_name,conference_space,conference_serve,conference_other,conference_offerdiscount,conference_expireoffer)VALUES("'.$userid.'","'.$hotelid.'","'.$name.'","'.$space.'","'.$serve.'","'.$other[0].'","'.$discuntofer.'","'.$discountexpire.'")';

if ($conn->query($query)== TRUE) {
 	# code...
 	$conference_id=$conn->insert_id;

 	
 }else{
 	echo "Error: " . $query . "<br>" . $conn->error;
 }

 echo $conference_id;
  // print_r($query);

for ($i=0; $i<count($_POST['book_fromdate']); $i++) {

$datesQuery='INSERT INTO common_bookdates(conference_id,book_fromdate,book_todate,form_date_type)VALUES("'.$conference_id.'","'.$frmdate[$i].'","'.$todate[$i].'","'.$formtype.'")';

 mysqli_query($conn,$datesQuery) or die(mysqli_error($conn));
 
 // print_r($datesQuery);
}

for ($i=0; $i<count($_POST['foodpkg_menu']); $i++) {


	$pkgQuery='INSERT INTO common_menupackages(conference_id,foodpkg_menu,foodpkg_name,foodpkg_price,foodpkg_discount,foodpkg_item, 	conference_banquet_type)VALUES("'.$conference_id.'","'.$pkgmenu[$i].'","'.$pkgname[$i].'","'.$pkgprice[$i].'","'.$pkgdis[$i].'","'.$pgkitem[$i].'","'.$formtype.'")';

 mysqli_query($conn,$pkgQuery) or die(mysqli_error($conn));



}


if (isset($_POST['common_video'])) {

	$videoQuery='INSERT INTO common_imagevideo(conference_id,common_video,img_video_type)VALUES("'.$conference_id.'","'.$provideo.'","'.$formtype.'")';

	mysqli_query($conn,$videoQuery) or die(mysqli_error($conn));
	# code...
}



 for ($i=0; $i<count($imgarray); $i++) {

             // print_r($imgarray) ;

	  $img_UpdateQuery='UPDATE common_imagevideo SET
 	  conference_id="'.$conference_id.'",
 	 img_video_type = "'.$formtype.'" WHERE common_imgvideo_id="'.$imgarray[$i].'"' ;

             mysqli_query($conn,$img_UpdateQuery) or die(mysqli_error($conn));


 }
 echo "<br>"."Your Form Submitted Sucessfully !"."<br>";
}else{

	 return false;
}
?>