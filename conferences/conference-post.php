<?php

 include '../common-sql.php';

  print_r($_POST);

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

if (!empty($_POST['conference_charges']) && is_numeric($_POST['conference_charges']))
{
	
	$charges= $_POST['conference_charges'];
}elseif (!empty($_POST['conference_charges']) && !is_numeric($_POST['conference_charges'])) {
	$is_check=false;
	echo "Hall Charges accept Only Numeric";
}else{
     
     $is_check=false;
	echo "Hall Charges is required";
}



if (empty($_POST['conference_serve'])) {

	 $is_check= false;
	echo "Serve Food is Required"."<br>";
	
}else{

    $serve	      = $_POST['conference_serve'];
    

}




foreach($_POST['foodpkg_name'] as $foodpkgname) { 
	
                  // echo $menupkgprice."<br>";
	if (!empty($foodpkgname)) {

		$pkgname     = $_POST['foodpkg_name'];
                  	# code...
	}else{
		$pkgname=null;

                  	// echo "array is empty";
	}
}


foreach($_POST['foodpkg_price'] as $menupkgprice) { 
	
	
	if (!empty($menupkgprice) && !is_numeric($menupkgprice)) {

		$is_check=false;
		echo "Menu Package Price accept only Numeric"."<br>";
                  	# code...
	}elseif(is_numeric($menupkgprice)){

		$pkgprice     = $_POST['foodpkg_price'];
	}else{
		$pkgprice=null;

                  	// echo "array is empty";
	}
}

foreach($_POST['foodpkg_discount'] as $menupkgdiscount) { 
	
	
	if (!empty($menupkgdiscount) && !is_numeric($menupkgdiscount)) {

		$is_check=false;
		echo "Menu Package Discount accept only Numeric"."<br>";
                  	# code...
	}elseif(is_numeric($menupkgdiscount)){

		$pkgdis     = $_POST['foodpkg_discount'];
	}else{
		$pkgdis=null;

                  	// echo "array is empty";
	}
}

foreach($_POST['foodpkg_item'] as $menupkgitems) { 
	
           // echo $menupkgitems;


	$Itemresult = explode(",", $menupkgitems);


	foreach($Itemresult as $item) { 

		if (!empty($item)) {
			
			$pgkitem     = $_POST['foodpkg_item'];
			
		}else{

			$pgkitem=null;

			// echo "array is empty";
		}
	}

}

if (empty($_POST['conference_independ'])) {
	$is_check=false;
	# code...
}else{

	$con_independ=$_POST['conference_independ'];
}
if (!empty($_POST['hotel_name'])) {

	$con_hotelName=$_POST['hotel_name'];
}else{

	$con_hotelName=null;
}
	
if (!empty($_POST['conference_address'])) {

	$con_addres=$_POST['conference_address'];
}else{

	$con_addres=null;
}

if (!empty($_POST['conference_city'])) {
	
	$con_city=$_POST['conference_city'];

}else{
  
  $con_city=null;

}

if (!empty($_POST['conference_province'])) {

	$con_province=$_POST['conference_province'];
}else{
	$con_province=null;
}


if(!empty($_POST['conference_phone']) && !is_numeric($_POST['conference_phone'])){
	$is_check= false;
	echo "This field is accept only numeric";

}elseif(!empty($_POST['conference_phone']) && is_numeric($_POST['conference_phone'])){

	$con_phone     = $_POST['conference_phone'];

}else{
	$con_phone = null;
	
}


if (!empty($_POST['conference_email'])) {

	$con_email=$_POST['conference_email'];
}else{

	$con_email=null;
}

if (!empty($_POST['conference_fcbok'])) {
	
	$con_fcbok=$_POST['conference_fcbok'];
}else{

	$con_fcbok=null;
}

if (!empty($_POST['conference_twiter'])) {
	
	$con_twter=$_POST['conference_twiter'];
}else{

	$con_twter=null;
}

if (!empty($_POST['conference_utube'])) {
	
	$con_utube=$_POST['conference_utube'];
}else{

	$con_utube=null;
}





$img          = $_POST['common_image'];
$imgarray= explode(",",$img);
$provideo       = $_POST['common_video'];






$other	      = $_POST['conference_other'];
$frmdate      = $_POST['book_fromdate'];
$todate       = $_POST['book_todate'];


if (!empty($_POST['conference_offerdiscount']) && !is_numeric($_POST['conference_offerdiscount'])) {
	$is_check= false;
	echo"Offer discount accept only numeric";
}elseif (!empty($_POST['conference_offerdiscount']) && is_numeric($_POST['conference_offerdiscount'])) {
	$discuntofer=$_POST['conference_offerdiscount'];
}else{

	$discuntofer=null;
}


$discountexpire=$_POST['conference_expireoffer'];
$userid       = 2;
$formtype     = 'conference';
$hotelid      = 31;



 
if ($is_check==true) {
	# code...


     
$query='INSERT INTO conference(user_id,hotel_id,conference_name,conference_space,conference_serve,conference_other,conference_offerdiscount,conference_expireoffer,conference_charges,conference_independ,hotel_name,conference_address,conference_city,conference_province,conference_phone,conference_email,conference_fcbok,conference_twiter,conference_utube)VALUES("'.$userid.'","'.$hotelid.'","'.$name.'","'.$space.'","'.$serve.'","'.$other.'","'.$discuntofer.'","'.$discountexpire.'","'.$charges.'","'.$con_independ.'","'.$con_hotelName.'","'.$con_addres.'","'.$con_city.'","'.$con_province.'","'.$con_phone.'","'.$con_email.'","'.$con_fcbok.'","'.$con_twter.'","'.$con_utube.'")';

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

for ($i=0; $i<count($_POST['foodpkg_name']); $i++) {


	$pkgQuery='INSERT INTO common_menupackages(conference_id,foodpkg_name,foodpkg_price,foodpkg_discount,foodpkg_item, 	conference_banquet_type)VALUES("'.$conference_id.'","'.$pkgname[$i].'","'.$pkgprice[$i].'","'.$pkgdis[$i].'","'.$pgkitem[$i].'","'.$formtype.'")';

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