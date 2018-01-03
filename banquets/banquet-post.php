<?php

 include '../common-sql.php';

print_r($_POST);

$is_check=true;


if (empty($_POST['banquet_name'])) {
	$is_check=false;
	echo "Banquet Name is required";
}else{

	$name         = $_POST['banquet_name'];
}
if (empty($_POST['banquet_space'])) {
	$is_check=false;
	echo "Hall capacity is required 6";
}elseif (!is_numeric($_POST['banquet_space'])) {

	$is_check=false;
	echo "Hall capacity accept only numeric 5";
}else{

	$space        = $_POST['banquet_space'];
}
 if (empty($_POST['banquet_charges'])) {
 	$is_check=false;
 	echo "This Field is required 4";
 }elseif (!is_numeric($_POST['banquet_charges'])) {

 	$is_check=false;
 	echo "This Field accept only numeric 3";
 }else{
	
     $charges         = $_POST['banquet_charges'];
 }


if (!is_numeric($_POST['banquet_aricon'])) {
	$is_check=false;
	echo "This Field accept only numeric";

}else{

	$aircon	      = $_POST['banquet_aricon'];
}

if (!is_numeric($_POST['banquet_generator'])) {
	$is_check=false;
	echo "This Field accept only numeric";

}else{

	$gen          = $_POST['banquet_generator'];
}


if (empty($_POST['banquet_serve'])) {
	$is_check=false;
	echo "Serve Food is required";
}else{
	
  $serve        = $_POST['banquet_serve'];
}


	$pkgmenu      = $_POST['foodpkg_menu'];

	$pkgname      = $_POST['foodpkg_name'];

    $pkgprice     = $_POST['foodpkg_price'];

	$pgkitem      = $_POST['foodpkg_item'];
	
    $pkgdis	      = $_POST['foodpkg_discount'];



if (empty($_POST['banquet_gathering'])) {
	$is_check=false;
	echo "Gathering Type is required";
}else{
	
  $gath         = $_POST['banquet_gathering'];
}

if (!is_numeric($_POST['banquet_adcost'])) {

	$is_check=false;
	echo "Additional cost accept only numeric"."<br>";
}else{

  $adcost	      = $_POST['banquet_adcost'];
}



if (empty($_POST['banquet_descrip'])) {
	$is_check=false;
	echo "Banquet Description  is required";
}else{
	
  $descrip      = $_POST['banquet_descrip'];
}

	
  $other	      = $_POST['banquet_other'];

  $img          = $_POST['common_image'];
  $imgarray= explode(",",$img);

  $provideo        = $_POST['common_video'];

  $frmdate      = $_POST['book_fromdate'];

  $todate       = $_POST['book_todate'];

if (!is_numeric($_POST['banquet_offerdiscount'])) {

	$is_check= false;
	echo"Offer discount accept only numeric";
}else{
	
	$discuntofer=$_POST['banquet_offerdiscount'];

}

 $discountexpire=$_POST['banquet_expireoffer'];



if (empty($_POST['banquet_independ'])) {
	$is_check=false;
	# code...
}else{

	$banquet_independ=$_POST['banquet_independ'];
}
if (isset($_POST['hotel_name'])) {

	$banquet_hotelName=$_POST['hotel_name'];
}else{

	$banquet_hotelName="null";
}
	

	$banquet_addres=$_POST['banquet_address'];

	$banquet_city=$_POST['banquet_city'];

	$banquet_province=$_POST['banquet_province'];


if(!is_numeric($_POST['banquet_phone'])){

$is_check=false;

}else{

	$banquet_phone=$_POST['banquet_phone'];
}



	$banquet_email=$_POST['banquet_email'];

	$bnq_fcbok=$_POST['banquet_fcbok'];

	$bnq_twter=$_POST['banquet_twiter'];

	$bnq_utube=$_POST['banquet_utube'];

	$userid       = 2;

	$formtype     = 'banquet';

	$hotelid      = 31;



 
if ($is_check==true) {
	# code...



 $query='INSERT INTO banquet(user_id,hotel_id,banquet_name,banquet_space,banquet_charges,	banquet_aricon,banquet_generator,banquet_serve,banquet_gathering,banquet_adcost,banquet_descrip,banquet_other,banquet_offerdiscount,banquet_expireoffer,banquet_independ,hotel_name,banquet_address,banquet_city,banquet_province,banquet_phone,banquet_email,banquet_fcbok,banquet_twiter,banquet_utube)VALUES("'.$userid.'","'.$hotelid.'","'.$name.'","'.$space.'","'.$charges.'","'.$aircon.'","'.$gen.'","'.$serve.'","'.$gath.'","'.$adcost.'","'.$descrip.'","'.$other[0].'","'.$discuntofer.'","'.$discountexpire.'","'.$banquet_independ.'","'.$banquet_hotelName.'","'.$banquet_addres.'","'.$banquet_city.'","'.$banquet_province.'","'.$banquet_phone.'","'.$banquet_email.'","'.$bnq_fcbok.'","'.$bnq_twter.'","'.$bnq_utube.'")';



if ($conn->query($query)== TRUE) {
  	# code...
  	$banquet_id =$conn->insert_id;

// echo $banquet_id;
  }else{
  	echo "Error: " . $query . "<br>" . $conn->error;
  }

 echo $banquet_id;
  // print_r($query);

for ($i=0; $i<count($_POST['book_fromdate']); $i++) {

$datesQuery='INSERT INTO common_bookdates(banquet_id,book_fromdate,book_todate,form_date_type)VALUES("'.$banquet_id.'","'.$frmdate[$i].'","'.$todate[$i].'","'.$formtype.'")';

 mysqli_query($conn,$datesQuery) or die(mysqli_error($conn));
 
 // print_r($datesQuery);
}

for ($i=0; $i<count($_POST['foodpkg_menu']); $i++) {


	$pkgQuery='INSERT INTO common_menupackages(banquet_id,foodpkg_menu,foodpkg_name,foodpkg_price,foodpkg_discount,foodpkg_item, 	conference_banquet_type)VALUES("'.$banquet_id.'","'.$pkgmenu[$i].'","'.$pkgname[$i].'","'.$pkgprice[$i].'","'.$pkgdis[$i].'","'.$pgkitem[$i].'","'.$formtype.'")';

 mysqli_query($conn,$pkgQuery) or die(mysqli_error($conn));



}


if (isset($_POST['common_video'])) {

	$videoQuery='INSERT INTO common_imagevideo(banquet_id,common_video,img_video_type)VALUES("'.$banquet_id.'","'.$provideo.'","'.$formtype.'")';

echo $videoQuery;
	mysqli_query($conn,$videoQuery) or die(mysqli_error($conn));
	
}



 for ($i=0; $i<count($imgarray); $i++) {

             print_r($imgarray) ;

	  $img_UpdateQuery='UPDATE common_imagevideo SET
 	  banquet_id="'.$banquet_id.'",
 	  img_video_type = "'.$formtype.'" WHERE common_imgvideo_id="'.$imgarray[$i].'"' ;

             mysqli_query($conn,$img_UpdateQuery) or die(mysqli_error($conn));


 }


  echo "<br>"."Your Form Submitted Sucessfully !"."<br>";
}
else{
	return false;
}
?>