<?php

 include '../../common-sql.php';

 session_start();

  // print_r($_POST);

$is_check= true;
$responseArray=[];

if (empty($_POST['conference_name'])) {
 
	$is_check= false;
	array_push($responseArray,"Hall name is required");

}else{

   $name     = $_POST['conference_name'];	
}

if (empty($_POST['conference_space'])) {

	$is_check= false;
	array_push($responseArray,"Capacity of hall  is required");

}elseif (!is_numeric($_POST['conference_space'])) {

	$is_check=false;
	array_push($responseArray,"Capacity of hall field should only contain numbers.");

}else{

	$space        = $_POST['conference_space'];	
}

if (!empty($_POST['conference_charges']) && is_numeric($_POST['conference_charges']))
{
	
	$charges= $_POST['conference_charges'];

}elseif (!empty($_POST['conference_charges']) && !is_numeric($_POST['conference_charges'])) {

	$is_check=false;
	array_push($responseArray,"Hall charges field should only contain numbers.");

}else{
     
     $is_check=false;
     array_push($responseArray,"Hall charges field is required");
}



if (empty($_POST['conference_serve'])) {

	 $is_check= false;
	 array_push($responseArray,"Serve food field is required");
	
}else if ($_POST['conference_serve']=='yes') {

	    $serve        = $_POST['conference_serve'];

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
	
  $serve   = $_POST['conference_serve'];
  $pkgname =null;
  $pkgprice=null;
  $pgkitem =null;
}

foreach($_POST['foodpkg_discount'] as $menupkgdiscount) { 
	
	
	if (!empty($menupkgdiscount) && !is_numeric($menupkgdiscount)) {

		$is_check=false;
		array_push($responseArray,"Menu package discount field should only contain numbers.");
                  	# code...
	}elseif(is_numeric($menupkgdiscount)){

		$pkgdis     = $_POST['foodpkg_discount'];
	}else{
		$pkgdis=null;

                  	// echo "array is empty";
	}
}



if (empty($_POST['conference_independ'])) {

	$is_check=false;
	array_push($responseArray,"Hall independent field is required");

}elseif ($_POST['conference_independ']=='yes') {

      $con_independ=$_POST['conference_independ'];
      $con_hotelName=null;

     if (empty($_POST['conference_address'])) {

     	$is_check=false;
     	array_push($responseArray,"Address field is required");

     }else{

     	$con_addres=$_POST['conference_address'];
     }

     if (empty($_POST['conference_city'])) {

     	$is_check=false;
     	array_push($responseArray,"City field is required");

     }else{

     	$con_city=$_POST['conference_city'];
     }

     if (empty($_POST['conference_province'])) {

     	$is_check=false;
     	array_push($responseArray,"Province field is required");

     }else{

     	 $con_province=$_POST['conference_province'];
     }

     if (empty($_POST['conference_phone'])) {

     	$is_check=false;
     	array_push($responseArray,"Phone number field is required");

     }elseif (!empty($_POST['conference_phone']) && !is_numeric($_POST['conference_phone'])) {

     	$is_check=false;
     	array_push($responseArray,"Phone number field should only contain numbers.");

     }else{

     	$con_phone    = $_POST['conference_phone'];
     }

     if (empty($_POST['conference_email'])) {

     	$is_check=false;
     	array_push($responseArray,"Email address field is required");

     }elseif (!filter_var($_POST['conference_email'], FILTER_VALIDATE_EMAIL)) {

     	$is_check=false;
     	array_push($responseArray,"Email address field is invalid");

     }else{

     	$con_email=$_POST['conference_email'];
     }

}
else{
        $con_independ=$_POST['conference_independ'];
        $con_addres=null;
		$con_city=null;
		$con_province=null;
		$con_phone = null;
		$con_email=null;
        if (empty($_POST['hotel_name'])) {

	    	$is_check=false;
	    	array_push($responseArray,"Name of hotel is required");
    	
        }else{

    		$con_hotelName=$_POST['hotel_name'];
       }
	
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



if (empty($_POST['conference_other'])) {

	$is_check=false;
	array_push($responseArray,"Amenities field is required");

}else{

	$other	      = $_POST['conference_other'];
}


if (isset($_POST['book_fromdate'])) {
  foreach($_POST['book_fromdate'] as $bokFROM) { 

    if (!empty($bokFROM)) {
 
      if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%',$bokFROM)) {

          $frmdate=$bokFROM;

      }else{

         $is_check=false;
         array_push($responseArray,"From Date field is invalid");
      }
    }

 }

}else{

      $frmdate=null;
}

if(isset($_POST['book_todate'])){

     foreach($_POST['book_todate'] as $bokTO) { 
     
     if (!empty($bokTO)) {

      if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%',$bokTO)) {

           $todate=$bokTO;

      }else{
         $is_check=false;
         array_push($responseArray,"To Date field is invalid");

      }
     }

 }

}else{

       $todate=null;
}


if (!empty($_POST['conference_offerdiscount']) && !is_numeric($_POST['conference_offerdiscount'])) {

	$is_check= false;
	array_push($responseArray,"Offer discount field should only contain numbers.");

}elseif (!empty($_POST['conference_offerdiscount']) && empty($_POST['conference_expireoffer'])) {

	$is_check= false;
	array_push($responseArray,"Expire offer date field is required");
}
elseif (!empty($_POST['conference_offerdiscount']) && is_numeric($_POST['conference_offerdiscount'])) {

	$discuntofer=$_POST['conference_offerdiscount'];

}else{

	$discuntofer=null;
}

if (!empty($_POST['conference_expireoffer'])) {
	# code...

if (!empty($_POST['conference_expireoffer']) && empty($_POST['conference_offerdiscount'])) {

	$is_check=false;
	array_push($responseArray,"Offer discount field is required");

}else{
	
	    // $date = date_create($_POST['conference_expireoffer']);
	    // $result = date_format($date,"m/d/Y");

		if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%', $_POST['conference_expireoffer'])) {

			$discountexpire= $_POST['conference_expireoffer'];

		}else{

			 $is_check=false;
			array_push($responseArray,"Expire offer field is invalid");
		}
}

}else{

	$discountexpire=null;
}

$userid       = $_POST['user_id'];
$formtype     = 'conference';
$hotelid      = $_POST['hotel_id'];

if (isset($_POST['conference_inactive'])) {
  $inactive=$_POST['conference_inactive'];
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

if ($con_independ=='no') {

     
$query='INSERT INTO conference(user_id,hotel_id,conference_name,conference_space,conference_serve,conference_other,conference_offerdiscount,conference_expireoffer,conference_charges,conference_independ,hotel_name,conference_address,conference_city,conference_province,conference_phone,conference_email,conference_fcbok,conference_twiter,conference_utube,conference_inactive,conference_status)VALUES("'.$userid.'","'.$hotelid.'","'.$name.'","'.$space.'","'.$serve.'","'.$other.'","'.$discuntofer.'","'.$discountexpire.'","'.$charges.'","'.$con_independ.'","'.$con_hotelName.'","'.$con_addres.'","'.$con_city.'","'.$con_province.'","'.$con_phone.'","'.$con_email.'","'.$con_fcbok.'","'.$con_twter.'","'.$con_utube.'","'.$inactive.'","Pending")';

   if ($conn->query($query)== TRUE) {
 	# code...
 	$conference_id=$conn->insert_id;

 	
 }else{
 	echo "Error: " . $query . "<br>" . $conn->error;
 }

 

if (count($_POST['book_fromdate']) > 0 && !empty($_POST['book_fromdate'][0])) {

   for ($i=0; $i<count($_POST['book_fromdate']); $i++) {

     $datesQuery='INSERT INTO common_bookdates(conference_id,book_fromdate,book_todate,form_date_type)VALUES("'.$conference_id.'","'.$_POST['book_fromdate'][$i].'","'.$_POST['book_todate'][$i].'","'.$formtype.'")';

     mysqli_query($conn,$datesQuery) or die(mysqli_error($conn));
 
   }
}

if (count($_POST['foodpkg_name']) > 0 && !empty($_POST['foodpkg_name'][0])) {

    for ($i=0; $i<count($_POST['foodpkg_name']); $i++) {


	   $pkgQuery='INSERT INTO common_menupackages(conference_id,foodpkg_name,foodpkg_price,foodpkg_discount,foodpkg_item, 	conference_banquet_type)VALUES("'.$conference_id.'","'.$pkgname[$i].'","'.$pkgprice[$i].'","'.$pkgdis[$i].'","'.$pgkitem[$i].'","'.$formtype.'")';

       mysqli_query($conn,$pkgQuery) or die(mysqli_error($conn));
    }
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

     include '../../methods/send-notification.php';


     insert_notification($conn,$userid ,"vendor","true","false","Created","New Conference Created","".$name." in ".$con_hotelName." has been posted for review by ".$_SESSION['reg_name'],date("F j, Y, g:i a"),"conferences/showsingle_conferencerecord.php?id=".$conference_id."&h_id=".$hotelid."&status=Pending&name=".$_SESSION['reg_name']."&user_id=".$userid ,"conference","admin" );


}else{

	$query='INSERT INTO conference(user_id,conference_name,conference_space,conference_serve,conference_other,conference_offerdiscount,conference_expireoffer,conference_charges,conference_independ,hotel_name,conference_address,conference_city,conference_province,conference_phone,conference_email,conference_fcbok,conference_twiter,conference_utube,conference_inactive,conference_status)VALUES("'.$userid.'","'.$name.'","'.$space.'","'.$serve.'","'.$other.'","'.$discuntofer.'","'.$discountexpire.'","'.$charges.'","'.$con_independ.'","'.$con_hotelName.'","'.$con_addres.'","'.$con_city.'","'.$con_province.'","'.$con_phone.'","'.$con_email.'","'.$con_fcbok.'","'.$con_twter.'","'.$con_utube.'","'.$inactive.'","Pending")';


	if ($conn->query($query)== TRUE) {
 	# code...
 	$conference_id=$conn->insert_id;

 	
 }else{
 	echo "Error: " . $query . "<br>" . $conn->error;
 }

 

if (count($_POST['book_fromdate']) > 0 && !empty($_POST['book_fromdate'][0])) {

   for ($i=0; $i<count($_POST['book_fromdate']); $i++) {

     $datesQuery='INSERT INTO common_bookdates(conference_id,book_fromdate,book_todate,form_date_type)VALUES("'.$conference_id.'","'.$_POST['book_fromdate'][$i].'","'.$_POST['book_todate'][$i].'","'.$formtype.'")';

     mysqli_query($conn,$datesQuery) or die(mysqli_error($conn));
 
   }
}

if (count($_POST['foodpkg_name']) > 0 && !empty($_POST['foodpkg_name'][0])) {

    for ($i=0; $i<count($_POST['foodpkg_name']); $i++) {


	   $pkgQuery='INSERT INTO common_menupackages(conference_id,foodpkg_name,foodpkg_price,foodpkg_discount,foodpkg_item, 	conference_banquet_type)VALUES("'.$conference_id.'","'.$pkgname[$i].'","'.$pkgprice[$i].'","'.$pkgdis[$i].'","'.$pgkitem[$i].'","'.$formtype.'")';

       mysqli_query($conn,$pkgQuery) or die(mysqli_error($conn));
    }
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

   include '../../methods/send-notification.php';


     insert_notification($conn,$userid ,"vendor","true","false","Created","New Conference Created","".$name." has been posted for review by ".$_SESSION['reg_name'],date("F j, Y, g:i a"),"conferences/showsingle_conferencerecord.php?id=".$conference_id."&u_id=".$userid."&status=Pending&name=".$_SESSION['reg_name']."&user_id=".$userid ,"conference","admin" );




}


    echo json_encode($newSuccessMsgArr);
  
}
else{
	 echo json_encode($newErrorMsgArr);
     return false;
	
}
?>