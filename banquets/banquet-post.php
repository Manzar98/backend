<?php

 include '../common-sql.php';

// print_r($_POST);

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

if (isset($_POST['banquet_isaircon']) && empty($_POST['banquet_aricon'])) {
	  $is_check=false;
	  echo "Aircon charges field is required"; 	
}elseif (isset($_POST['banquet_isaircon']) && !empty($_POST['banquet_aricon'])) {

	$is_aircon= $_POST['banquet_isaircon'];
}else{

   $is_aircon="off";
}

if (isset($_POST['banquet_isgen']) && empty($_POST['banquet_generator'])) {

	$is_check=false;
	echo "Generator charges field is required";
	
}elseif (isset($_POST['banquet_isgen']) && !empty($_POST['banquet_generator'])) {

	$is_gen=$_POST['banquet_isgen'];
}else{

	$is_gen='off';
}


if(!empty($_POST['banquet_aricon']) && !is_numeric($_POST['banquet_aricon'])){
	$is_check= false;

}elseif(!empty($_POST['banquet_aricon']) && is_numeric($_POST['banquet_aricon'])){
	$aircon	      = $_POST['banquet_aricon'];
}else{
	$aircon = null;

}

if(!empty($_POST['banquet_generator']) && !is_numeric($_POST['banquet_generator'])){
	$is_check= false;

}elseif(!empty($_POST['banquet_generator']) && is_numeric($_POST['banquet_generator'])){

	$gen          = $_POST['banquet_generator'];

}else{
	$gen = null;
	
}


if (empty($_POST['banquet_serve'])) {
	$is_check=false;
	echo "Serve Food is required";
}else{
	
  $serve        = $_POST['banquet_serve'];
}




foreach($_POST['foodpkg_name'] as $foodpkgname) { 
	
                  // echo $menupkgprice."<br>";
	if (!empty($foodpkgname)) {

		$pkgname     = $_POST['foodpkg_name'];
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


if (empty($_POST['banquet_gathering'])) {
	$is_check=false;
	echo "Gathering Type is required";
}else{
	
  $gath         = $_POST['banquet_gathering'];
}

if (!is_numeric($_POST['banquet_adcost'])) {

	$is_check=false;
	echo "Only numeric data is allowed in Additional Cost";
}elseif (empty($_POST['banquet_adcost'])) {
	  $is_check=false;
	  echo "Additional Cost cannot be left empty";
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
	echo"Amenities is required";	
}else{
	$other = $_POST['banquet_other'];
}
	
  

  $img          = $_POST['common_image'];
  $imgarray= explode(",",$img);

  $provideo        = $_POST['common_video'];

  $frmdate      = $_POST['book_fromdate'];

  $todate       = $_POST['book_todate'];

if (!empty($_POST['banquet_offerdiscount']) && !is_numeric($_POST['banquet_offerdiscount'])) {
	$is_check= false;
	echo"Offer discount accept only numeric";
}elseif (!empty($_POST['banquet_offerdiscount']) && empty($_POST['banquet_expireoffer'])) {
	$is_check= false;
	echo"Expire offer date field is required";
}
elseif (!empty($_POST['banquet_offerdiscount']) && is_numeric($_POST['banquet_offerdiscount'])) {
	$discuntofer=$_POST['banquet_offerdiscount'];
}else{

	$discuntofer=null;
}

if (!empty($_POST['banquet_expireoffer']) && empty($_POST['banquet_offerdiscount'])) {
	$is_check=false;
	echo "Offer discount field is required";

}else{
	$discountexpire=$_POST['banquet_expireoffer'];
}


if (empty($_POST['banquet_independ'])) {
	$is_check=false;
	echo "Hall independent field is required";
}elseif ($_POST['banquet_independ']=='yes') {
    $banquet_hotelName=null;
   $banquet_independ=$_POST['banquet_independ'];

     if (empty($_POST['banquet_address'])) {
     	$is_check=false;
     	echo "Address field is required";
     }else{

     	$banquet_addres=$_POST['banquet_address'];
     }
     if (empty($_POST['banquet_city'])) {

     	$is_check=false;
     	echo "City field is required";

     }else{

     	$banquet_city=$_POST['banquet_city'];
     }

     if (empty($_POST['banquet_province'])) {

     	$is_check=false;
     	echo "Province field is required";
     }else{

     	 $banquet_province=$_POST['banquet_province'];
     }

     if (empty($_POST['banquet_phone'])) {
     	$is_check=false;
     	echo "Phone number field is required";
     }elseif (!empty($_POST['banquet_phone']) && !is_numeric($_POST['banquet_phone'])) {
     	$is_check=false;
     	echo "Phone number field accept only numeric";
     }else{
     	$banquet_phone     = $_POST['banquet_phone'];
     }

     if (empty($_POST['banquet_email'])) {
     	$is_check=false;
     	echo "Email address field is required";
     }elseif (!filter_var($_POST['banquet_email'], FILTER_VALIDATE_EMAIL)) {
     	$is_check=false;
     	echo "Email address field is invalid";
     }else{
     	$banquet_email=$_POST['banquet_email'];
     }

}
else{
       $banquet_independ=$_POST['banquet_independ'];
       $banquet_addres=null;
       $banquet_city=null;
       $banquet_province=null;
       $banquet_phone = null;
       $banquet_email=null;
    if (empty($_POST['hotel_name'])) {
    	$is_check=false;
    	echo "Name of hotel is required";
    	
    }else{

    	$banquet_hotelName=$_POST['hotel_name'];
    }
	
}



if (!empty($_POST['banquet_fcbok'])) {
	
	$bnq_fcbok=$_POST['banquet_fcbok'];
}else{

	$bnq_fcbok=null;
}

if (!empty($_POST['banquet_twiter'])) {
	
	$bnq_twter=$_POST['banquet_twiter'];
}else{

	$bnq_twter=null;
}

if (!empty($_POST['banquet_utube'])) {
	
	$bnq_utube=$_POST['banquet_utube'];
}else{

	$bnq_utube=null;
}






	

	$userid       = 2;

	$formtype     = 'banquet';

	$hotelid      = 31;






 
if ($is_check==true) {
	# code...



 $query='INSERT INTO banquet(user_id,hotel_id,banquet_name,banquet_space,banquet_charges,banquet_aricon,banquet_isaircon,banquet_isgen,banquet_generator,banquet_serve,banquet_gathering,banquet_adcost,banquet_descrip,banquet_other,banquet_offerdiscount,banquet_expireoffer,banquet_independ,hotel_name,banquet_address,banquet_city,banquet_province,banquet_phone,banquet_email,banquet_fcbok,banquet_twiter,banquet_utube)VALUES("'.$userid.'","'.$hotelid.'","'.$name.'","'.$space.'","'.$charges.'","'.$aircon.'","'.$is_aircon.'","'.$is_gen.'","'.$gen.'","'.$serve.'","'.$gath.'","'.$adcost.'","'.$descrip.'","'.$other.'","'.$discuntofer.'","'.$discountexpire.'","'.$banquet_independ.'","'.$banquet_hotelName.'","'.$banquet_addres.'","'.$banquet_city.'","'.$banquet_province.'","'.$banquet_phone.'","'.$banquet_email.'","'.$bnq_fcbok.'","'.$bnq_twter.'","'.$bnq_utube.'")';



if ($conn->query($query)== TRUE) {
  	# code...
  	$banquet_id =$conn->insert_id;

// echo $banquet_id;
  }else{
  	echo "Error: " . $query . "<br>" . $conn->error;
  }

 // echo $banquet_id;
  // print_r($query);

for ($i=0; $i<count($_POST['book_fromdate']); $i++) {

$datesQuery='INSERT INTO common_bookdates(banquet_id,book_fromdate,book_todate,form_date_type)VALUES("'.$banquet_id.'","'.$frmdate[$i].'","'.$todate[$i].'","'.$formtype.'")';

 mysqli_query($conn,$datesQuery) or die(mysqli_error($conn));
 
 // print_r($datesQuery);
}

for ($i=0; $i<count($_POST['foodpkg_price']); $i++) {


	$pkgQuery='INSERT INTO common_menupackages(banquet_id,foodpkg_name,foodpkg_price,foodpkg_discount,foodpkg_item, 	conference_banquet_type)VALUES("'.$banquet_id.'","'.$pkgname[$i].'","'.$pkgprice[$i].'","'.$pkgdis[$i].'","'.$pgkitem[$i].'","'.$formtype.'")';

 mysqli_query($conn,$pkgQuery) or die(mysqli_error($conn));



}


if (isset($_POST['common_video'])) {

	$videoQuery='INSERT INTO common_imagevideo(banquet_id,common_video,img_video_type)VALUES("'.$banquet_id.'","'.$provideo.'","'.$formtype.'")';

// echo $videoQuery;
	mysqli_query($conn,$videoQuery) or die(mysqli_error($conn));
	
}



 for ($i=0; $i<count($imgarray); $i++) {

             // print_r($imgarray) ;

	  $img_UpdateQuery='UPDATE common_imagevideo SET
 	  banquet_id="'.$banquet_id.'",
 	  img_video_type = "'.$formtype.'" WHERE common_imgvideo_id="'.$imgarray[$i].'"' ;

             mysqli_query($conn,$img_UpdateQuery) or die(mysqli_error($conn));


 }


  echo "sucess";
}
else{
	return false;
}
?>