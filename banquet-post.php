<?php

 include 'common-sql.php';

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
	echo "Hall capacity is required";
}elseif (!is_numeric($_POST['banquet_space'])) {

	$is_check=false;
	echo "Hall capacity accept only numeric";
}else{

	$space        = $_POST['banquet_space'];
}
if (empty($_POST['banquet_naricon'])) {
	$is_check=false;
	echo "This Field is required";
}elseif (!is_numeric($_POST['banquet_naricon'])) {

	$is_check=false;
	echo "This Field accept only numeric";
}else{
	
  $nari         = $_POST['banquet_naricon'];
}
if (empty($_POST['banquet_ngenerator'])) {
	$is_check=false;
	echo "This Field is required";
}elseif (!is_numeric($_POST['banquet_ngenerator'])) {

	$is_check=false;
	echo "This Field accept only numeric";
}else{
	
  $ngen         = $_POST['banquet_ngenerator'];
}

if (!is_numeric($_POST['banquet_aricon'])) {
	$is_check=false;
	echo "This Field accept only numeric";

}else{

	$ari	      = $_POST['banquet_aricon'];
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
	echo "Menu Package Price accept only numeric";
}else{
  
  $pkgprice     = $_POST['foodpkg_price'];
}
if (empty($_POST['foodpkg_item'])) {

	$is_check=false;
	echo "Menu Package Price is Required"."<br>";
}else{

	$pgkitem      = $_POST['foodpkg_item'];
	
}

if (!is_numeric($_POST['foodpkg_discount'])) {

	$is_check=false;
	echo "Menu Package Price is Required"."<br>";
}else{
$pkgdis	      = $_POST['foodpkg_discount'];
}


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
if (empty($_POST['banquet_other'])) {
	$is_check=false;
	echo "Amenities is required";
}else{
	
  $other	      = $_POST['banquet_other'];
}
if (empty($_POST['common_image'])) {
	$is_check=false;
	echo "At Least one image is required";
}else{
	
  $img          = $_POST['common_image'];
  $imgarray= explode(",",$img);
}
if (empty($_POST['common_video'])) {
	$is_check=false;
	echo "Video is required";
}else{
	
  $provideo        = $_POST['common_video'];
  
}






$frmdate      = $_POST['book_fromdate'];
$todate       = $_POST['book_todate'];

if (!is_numeric($_POST['banquet_offerdiscount'])) {

	$is_check= false;
	echo"Offer discount accept only numeric";
}else{
	
	$discuntofer=$_POST['banquet_offerdiscount'];

}
$discountexpire=$_POST['banquet_expireoffer'];



$userid       = 2;
$formtype     = 'banquet';
$hotelid      = 31;



 
if ($is_check==true) {
	# code...


     
$query='INSERT INTO banquet(user_id,hotel_id,banquet_name,banquet_space,banquet_aricon,banquet_naricon,banquet_generator,banquet_ngenerator,banquet_serve,banquet_gathering,banquet_adcost,banquet_descrip,banquet_other,banquet_offerdiscount,banquet_expireoffer)VALUES("'.$userid.'","'.$hotelid.'","'.$name.'","'.$space.'","'.$ari.'","'.$nari.'","'.$gen.'","'.$ngen.'","'.$serve.'","'.$gath.'","'.$adcost.'","'.$descrip.'","'.$other[0].'","'.$discuntofer.'","'.$discountexpire.'")';

if ($conn->query($query)== TRUE) {
 	# code...
 	$banquet_id=$conn->insert_id;

 	
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

	mysqli_query($conn,$videoQuery) or die(mysqli_error($conn));
	# code...
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