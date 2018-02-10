<?php

 include '../common-sql.php';

   // print_r($_POST);

$is_check=true;
$responseArray=[];

if (empty($_POST['banquet_name'])) {

	$is_check=false;
	array_push($responseArray,"Banquet name is required");

}else{

	$name         = $_POST['banquet_name'];
}

if (empty($_POST['banquet_space'])) {

	$is_check=false;
	array_push($responseArray,"Hall capacity field is required");

}elseif (!is_numeric($_POST['banquet_space'])) {

	$is_check=false;
	array_push($responseArray,"Hall capacity field should only contain numbers.");

}else{

	$space        = $_POST['banquet_space'];
}

if (empty($_POST['banquet_charges'])) {

 	$is_check=false;
 	array_push($responseArray,"Banquet charges field is required");

}elseif (!is_numeric($_POST['banquet_charges'])) {

 	$is_check=false;
 	array_push($responseArray,"Banquet charges field should only contain numbers.");

}else{
	
     $charges         = $_POST['banquet_charges'];
}

if (isset($_POST['banquet_isaircon']) && empty($_POST['banquet_aricon'])) {

	  $is_check=false;
	  array_push($responseArray,"Aircon charges field is required");

}elseif (isset($_POST['banquet_isaircon']) && !empty($_POST['banquet_aricon'])) {

	$is_aircon= $_POST['banquet_isaircon'];
}else{

   $is_aircon="off";
}

if (isset($_POST['banquet_isgen']) && empty($_POST['banquet_generator'])) {

	$is_check=false;
	array_push($responseArray,"Generator charges field is required");

}elseif (isset($_POST['banquet_isgen']) && !empty($_POST['banquet_generator'])) {

	$is_gen=$_POST['banquet_isgen'];

}else{

	$is_gen='off';
}


if(!empty($_POST['banquet_aricon']) && !is_numeric($_POST['banquet_aricon'])){

	$is_check= false;
	array_push($responseArray,"Banquet charges field should only contain numbers.");

}elseif(!empty($_POST['banquet_aricon']) && is_numeric($_POST['banquet_aricon'])){

	$aircon	      = $_POST['banquet_aricon'];
}else{

	$aircon = null;
}

if(!empty($_POST['banquet_generator']) && !is_numeric($_POST['banquet_generator'])){

	$is_check= false;
    array_push($responseArray,"Generator charges field should only contain numbers.");

}elseif(!empty($_POST['banquet_generator']) && is_numeric($_POST['banquet_generator'])){

	$gen          = $_POST['banquet_generator'];

}else{

	$gen = null;
}


if (empty($_POST['banquet_serve'])) {

	$is_check=false;
	array_push($responseArray,"Serve food field is required");

}else if ($_POST['banquet_serve']=='yes') {

	    $serve        = $_POST['banquet_serve'];

		foreach($_POST['foodpkg_name'] as $foodpkgname) { 
			    
			if (!empty($foodpkgname)) {

				$pkgname     = $_POST['foodpkg_name'];

			}else{

				 $is_check=false;
				 array_push($responseArray,"Package name field is required");
			}
		}


	    foreach($_POST['foodpkg_price'] as $menupkgprice) { 
		
			if (!empty($menupkgprice) && !is_numeric($menupkgprice)) {

				$is_check=false;
				array_push($responseArray,"Menu package price field should only contain numbers.");
		                  	
			}elseif(is_numeric($menupkgprice)){

				$pkgprice     = $_POST['foodpkg_price'];

			}else{

				$is_check=false;
				array_push($responseArray,"Menu Package Price field is required");
			}
	    }

	    foreach($_POST['foodpkg_item'] as $menupkgitems) { 

			$Itemresult = explode(",", $menupkgitems);

			foreach($Itemresult as $item) { 

				if (!empty($item)) {
					
					$pgkitem     = $_POST['foodpkg_item'];
					
				}else{
		            
		            $is_check=false;
		            array_push($responseArray,"Package item field is required");	
				}
			}
	    }

}else{
	
  $serve   = $_POST['banquet_serve'];
  $pkgname =null;
  $pkgprice=null;
  $pgkitem =null;
}

foreach($_POST['foodpkg_discount'] as $menupkgdiscount) { 
	
	
	if (!empty($menupkgdiscount) && !is_numeric($menupkgdiscount)) {

		$is_check=false;
		array_push($responseArray,"Menu package discount field should only contain numbers.");
                  	
	}elseif(is_numeric($menupkgdiscount)){

		$pkgdis     = $_POST['foodpkg_discount'];

	}else{

		$pkgdis=null;

	}
}

if (empty($_POST['banquet_gathering'])) {

	$is_check=false;
	array_push($responseArray,"Gathering type field is required");

}else{
	
  $gath         = $_POST['banquet_gathering'];
}

if (!is_numeric($_POST['banquet_adcost'])) {

	$is_check=false;
	array_push($responseArray,"Additional cost field should only contain numbers.");

}elseif (empty($_POST['banquet_adcost'])) {

	  $is_check=false;
	  array_push($responseArray,"Additional cost cannot be left empty");

}else{

  $adcost	      = $_POST['banquet_adcost'];
}

if (empty($_POST['banquet_descrip'])) {

 	$is_check=false;
 	array_push($responseArray,"Banquet description cannot be left empty");

}else{
	
  $descrip      = $_POST['banquet_descrip'];
}

if (empty($_POST['banquet_other'])) {

	$is_check=false;
	array_push($responseArray,"Amenities cannot be left empty");
	
}else{
	$other = $_POST['banquet_other'];
}

$img          = $_POST['common_image'];
$imgarray= explode(",",$img);
$provideo        = $_POST['common_video'];

 foreach($_POST['book_fromdate'] as $bokFROM) { 
	// echo $bokFROM;
                  
  	if (!empty($bokFROM)) {
          
//           $datefrom = date_create($_POST['book_fromdate']);
// 	      $resultfrom = date_format($datefrom,"m/d/Y");
 		  if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%',$bokFROM)) {

			    $frmdate=$bokFROM;

 			}else{

 				 $is_check=false;
 				 array_push($responseArray,"From Date field is invalid");
 			}
  	}else{

  		$frmdate=null;
  	}

 }


 foreach($_POST['book_todate'] as $bokTO) { 
	 // echo $bokTO;
                  
  	 if (!empty($bokTO)) {

 	 	   // $dateto = date_create($_POST['book_todate']);
 	       // $resultto = date_format($dateto,"m/d/Y");
 		  if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%',$bokTO)) {

			     $todate=$bokTO;

 			}else{
 				 $is_check=false;
 				 array_push($responseArray,"To Date field is invalid");

 			}
  	 }else{

  	 	 $todate=null;
  	 }

 }


if (!empty($_POST['banquet_offerdiscount']) && !is_numeric($_POST['banquet_offerdiscount'])) {

	$is_check= false;
	array_push($responseArray,"Offer discount field should only contain numbers.");

}elseif (!empty($_POST['banquet_offerdiscount']) && empty($_POST['banquet_expireoffer'])) {

	$is_check= false;
	array_push($responseArray,"Expire offer date field is required");

}
elseif (!empty($_POST['banquet_offerdiscount']) && is_numeric($_POST['banquet_offerdiscount'])) {

	$discuntofer=$_POST['banquet_offerdiscount'];

}else{

	$discuntofer=null;
}

if (!empty($_POST['banquet_expireoffer'])) {
 
 if (!empty($_POST['banquet_expireoffer']) && empty($_POST['banquet_offerdiscount'])) {

   	$is_check=false;
   	array_push($responseArray,"Offer discount field is required");

 }else{
    
     	# code...
          //   $dateExpire = date_create($_POST['banquet_expireoffer']);
 	        //       $dateExpire = new DateTime($_POST['banquet_expireoffer']);
 	        // $resultExpire  =DateTime::createFromFormat("m/d/Y", $_POST['banquet_expireoffer']);
          //  $resultExpire  = date_format($dateExpire, 'm/d/Y');
 		  if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%', $_POST['banquet_expireoffer'])) {

 		 	$discountexpire=$_POST['banquet_expireoffer'];

  	 	 }else{

  	 		  $is_check=false;
 		 	  array_push($responseArray,"Expire offer field is invalid");
 		  }
	
   }

}else{

 	$discountexpire=null;
}


if (empty($_POST['banquet_independ'])) {

	$is_check=false;
	array_push($responseArray,"Hall independent field is required");

}elseif ($_POST['banquet_independ']=='yes') {

     $banquet_hotelName=null;
     $banquet_independ=$_POST['banquet_independ'];

     if (empty($_POST['banquet_address'])) {

     	$is_check=false;
     	array_push($responseArray,"Address field is required");

     }else{

     	$banquet_addres=$_POST['banquet_address'];
     }

     if (empty($_POST['banquet_city'])) {

     	$is_check=false;
     	array_push($responseArray,"City field is required");

     }else{

     	$banquet_city=$_POST['banquet_city'];
     }

     if (empty($_POST['banquet_province'])) {

     	$is_check=false;
     	array_push($responseArray,"Province field is required");

     }else{

     	 $banquet_province=$_POST['banquet_province'];
     }

     if (empty($_POST['banquet_phone'])) {

     	$is_check=false;
     	array_push($responseArray,"Phone number field is required");

     }elseif (!empty($_POST['banquet_phone']) && !is_numeric($_POST['banquet_phone'])) {

     	$is_check=false;
     	array_push($responseArray,"Phone number field should only contain numbers.");

     }else{

     	$banquet_phone     = $_POST['banquet_phone'];
     }

     if (empty($_POST['banquet_email'])) {

     	$is_check=false;
     	array_push($responseArray,"Email address field is required");

     }elseif (!filter_var($_POST['banquet_email'], FILTER_VALIDATE_EMAIL)) {

     	$is_check=false;
     	array_push($responseArray,"Email address field is invalid");

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
    	   array_push($responseArray,"Name of hotel is required");
    	
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


$userid       = $_POST['user_id'];
$formtype     = 'banquet';
if (isset($_POST['hotel_id'])) {

	$hotelid      = $_POST['hotel_id'];
}

if (isset($_POST['banquet_inactive'])) {
  $inactive=$_POST['banquet_inactive'];
}else{
  $inactive="off";
}

$errorMsgs=implode(",",$responseArray);

$newErrorMsgArr=array(
    "status"=> "error",
    "message"=> $errorMsgs
);


$newSuccessMsgArr=array(
    "status"=> "success"
    
);

 
if ($is_check==true) {
	# code...

if ($banquet_independ=='no') {
	# code...


 $query='INSERT INTO banquet(user_id,hotel_id,banquet_name,banquet_space,banquet_charges,banquet_aricon,banquet_isaircon,banquet_isgen,banquet_generator,banquet_serve,banquet_gathering,banquet_adcost,banquet_descrip,banquet_other,banquet_offerdiscount,banquet_expireoffer,banquet_independ,hotel_name,banquet_address,banquet_city,banquet_province,banquet_phone,banquet_email,banquet_fcbok,banquet_twiter,banquet_utube,banquet_inactive)VALUES("'.$userid.'","'.$hotelid.'","'.$name.'","'.$space.'","'.$charges.'","'.$aircon.'","'.$is_aircon.'","'.$is_gen.'","'.$gen.'","'.$serve.'","'.$gath.'","'.$adcost.'","'.$descrip.'","'.$other.'","'.$discuntofer.'","'.$discountexpire.'","'.$banquet_independ.'","'.$banquet_hotelName.'","'.$banquet_addres.'","'.$banquet_city.'","'.$banquet_province.'","'.$banquet_phone.'","'.$banquet_email.'","'.$bnq_fcbok.'","'.$bnq_twter.'","'.$bnq_utube.'","'.$inactive.'")';
 

}else{

	$query='INSERT INTO banquet(user_id,banquet_name,banquet_space,banquet_charges,banquet_aricon,banquet_isaircon,banquet_isgen,banquet_generator,banquet_serve,banquet_gathering,banquet_adcost,banquet_descrip,banquet_other,banquet_offerdiscount,banquet_expireoffer,banquet_independ,hotel_name,banquet_address,banquet_city,banquet_province,banquet_phone,banquet_email,banquet_fcbok,banquet_twiter,banquet_utube,banquet_inactive)VALUES("'.$userid.'","'.$name.'","'.$space.'","'.$charges.'","'.$aircon.'","'.$is_aircon.'","'.$is_gen.'","'.$gen.'","'.$serve.'","'.$gath.'","'.$adcost.'","'.$descrip.'","'.$other.'","'.$discuntofer.'","'.$discountexpire.'","'.$banquet_independ.'","'.$banquet_hotelName.'","'.$banquet_addres.'","'.$banquet_city.'","'.$banquet_province.'","'.$banquet_phone.'","'.$banquet_email.'","'.$bnq_fcbok.'","'.$bnq_twter.'","'.$bnq_utube.'","'.$inactive.'")';

}

if ($conn->query($query)== TRUE) {
  	# code...
  	$banquet_id =$conn->insert_id;

// echo $banquet_id;
  }else{
  	echo "Error: " . $query . "<br>" . $conn->error;
  }

 // echo $banquet_id;
  // print_r($query);

if ($todate) {

   for ($i=0; $i<count($_POST['book_fromdate']); $i++) {

    $datesQuery='INSERT INTO common_bookdates(banquet_id,book_fromdate,book_todate,form_date_type)VALUES("'.$banquet_id.'","'.$_POST['book_fromdate'][$i].'","'.$_POST['book_todate'][$i].'","'.$formtype.'")';

    mysqli_query($conn,$datesQuery) or die(mysqli_error($conn));
   }
}

if ($pkgname) {
	
   for ($i=0; $i<count($_POST['foodpkg_price']); $i++) {


	  $pkgQuery='INSERT INTO common_menupackages(banquet_id,foodpkg_name,foodpkg_price,foodpkg_discount,foodpkg_item, 	conference_banquet_type)VALUES("'.$banquet_id.'","'.$pkgname[$i].'","'.$pkgprice[$i].'","'.$pkgdis[$i].'","'.$pgkitem[$i].'","'.$formtype.'")';

      mysqli_query($conn,$pkgQuery) or die(mysqli_error($conn));
   }
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


  // echo "sucess";
  echo json_encode($newSuccessMsgArr);
  
}
else{
	 echo json_encode($newErrorMsgArr);
     return false;
	
}
?>