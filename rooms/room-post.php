<?php

include '../common-sql.php';

 // print_r($_POST);

$is_check=true;
$responseArray=[];

if (empty($_POST['room_name'])) {

	$is_check=false;
	array_push($responseArray,"Room name is required");

}else{

	$name= $_POST['room_name'];
}

if (empty($_POST['room_nosroom'])) {

	$is_check=false;
	array_push($responseArray,"Number of rooms field is required");

}elseif (!is_numeric($_POST['room_nosroom'])) {

	$is_check=false;
	array_push($responseArray,"Number of rooms field accept only numeric");

}
else{

	$nos= $_POST['room_nosroom'];
}

if (empty($_POST['room_service'])) {

	$is_check=false;
	array_push($responseArray,"Room service field is required");

}else{

	$service=$_POST['room_service'];
}

if (empty($_POST['room_maxadult'])) {

	$is_check=false;
	array_push($responseArray,"Maximum adults field is required");

}elseif (!is_numeric($_POST['room_maxadult'])) {

	$is_check=false;
	array_push($responseArray,"Maximum adults field accept only numeric");

}else{

	$maxadult=$_POST['room_maxadult'];
}

if (empty($_POST['room_matadult'])) {

	$is_check=false;
	array_push($responseArray,"Extra mattress charges for adults field is required");

}elseif (!is_numeric($_POST['room_matadult'])) {

	$is_check=false;
	array_push($responseArray,"Extra mattress charges for adults field accept only numeric");

}else{

	$matadult=$_POST['room_matadult'];
}

if (empty($_POST['room_maxchild'])) {

	$is_check=false;
	array_push($responseArray,"Maximum children field is required");

}elseif (!is_numeric($_POST['room_maxchild'])) {

	$is_check=false;
	array_push($responseArray,"Maximum children field accept only numeric");

}else{

	$maxchild=$_POST['room_maxchild'];
}

if (empty($_POST['room_matchild'])) {

	$is_check=false;
	array_push($responseArray,"Extra mattress charges for children field is required");

}elseif (!is_numeric($_POST['room_matchild'])) {

	$is_check=false;
	array_push($responseArray,"Extra mattress charges for children field accept only numeric");

}else{

	$matchild=$_POST['room_matchild'];
}

if (empty($_POST['room_perni8'])) {

	$is_check=false;
	array_push($responseArray,"Room charges field is required");

}elseif (!is_numeric($_POST['room_perni8'])) {

	$is_check=false;
	array_push($responseArray,"Room charges field accept only numeric");

}else{

	$ni8=$_POST['room_perni8'];
}

if (empty($_POST['room_descrip'])) {

 	$is_check=false;
 	array_push($responseArray,"Room description field is required");

}else{

	$descrip=$_POST['room_descrip'];
 }

if (empty($_POST['room_other'])) {

	$is_check=false;
	array_push($responseArray,"Amenities field is required");

}else{

	$other=$_POST['room_other'];
}

if (empty($_POST['hotel_name'])) {

	$is_check=false;
	array_push($responseArray,"Select hotel is required");

}else{

	$hotelName=$_POST['hotel_name'];  
}


// foreach($_POST['book_fromdate'] as $bokFROM) { 
	                 
  	// if (!empty($bokFROM)) {
          
           
 	      // $resultfrom = DateTime::createFromFormat("m/d/Y", $_POST['book_fromdate']);
 		  // if ($resultfrom) {

			     $from=$_POST['book_fromdate'];

 			// }else{

 				 // $is_check=false;
 				 // array_push($responseArray,"From date field is invalid");
 			// }
	
  	// }else{

 		// $from=null;
  	// }
// }


  // foreach($_POST['book_todate'] as $bokTO) { 
	             
   	 // if (!empty($bokTO)) {
                       
  	 	   // $resultto = $_POST['book_todate']->format("m/d/Y");
	 	  // if ($resultto) {

	 		     $to=$_POST['book_todate'];

  			// }else{

  				// $is_check=false;
  				 // array_push($responseArray,"To date field is invalid");

  			// }
		
   	 // }else{

   	 	// $to=null;
   	 // }
  // }

if (!empty($_POST['room_offerdiscount']) && !is_numeric($_POST['room_offerdiscount'])) {

	$is_check= false;
	array_push($responseArray,"Offer discount field accept only numeric");

}elseif (!empty($_POST['room_offerdiscount']) && empty($_POST['room_expireoffer'])) {

	$is_check= false;
	array_push($responseArray,"Expire offer date field is required");

}
elseif (!empty($_POST['room_offerdiscount']) && is_numeric($_POST['room_offerdiscount'])) {

	$discuntofer=$_POST['room_offerdiscount'];

}else{

	$discuntofer=null;
}

if (!empty($_POST['room_expireoffer'])) {
	# code...

  if (!empty($_POST['room_expireoffer']) && empty($_POST['room_offerdiscount'])) {

  	$is_check=false;
  	array_push($responseArray,"Offer discount field is required");

  }else{
        $result = DateTime::createFromFormat("m/d/Y", $_POST['room_expireoffer']);
    
    //   $date = date_create($_POST['room_expireoffer']);
 	  // $result = date_format($date,"m/d/Y");
 		if ($result) {

 			$discountexpire=$result;

  		}else{

  			 $is_check=false;
 			 array_push($responseArray,"Expire offer field is invalid");
 		}
	
  }
}else{
	$discountexpire=null;
}


$discountexpire=$_POST['room_expireoffer'];
$img=$_POST['common_image'];
$imgarray= explode(",",$img);
$provideo=$_POST['common_video'];
$formtype='room';
$user_id= 2;
$hotelid=31;
$inactive= $_POST['room_inactive'];

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

$query='INSERT INTO room(user_id,hotel_id,room_name,room_nosroom,room_service,room_maxadult,room_matadult,room_maxchild,room_matchild,room_perni8,room_descrip,room_other,room_offerdiscount,room_expireoffer,hotel_name,room_inactive)VALUES("'.$user_id.'","'.$hotelid.'","'.$name.'","'.$nos.'","'.$service.'","'.$maxadult.'","'.$matadult.'","'.$maxchild.'","'.$matchild.'","'.$ni8.'","'.$descrip.'","'.$other.'","'.$discuntofer.'","'.$discountexpire.'","'.$hotelName.'","'.$inactive.'")';


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


  echo json_encode($newSuccessMsgArr);

}else{
	
	echo json_encode($newErrorMsgArr);
    return false;
}


?>