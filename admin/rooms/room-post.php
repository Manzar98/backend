<?php

include '../../common-sql.php';

 // print_r($_POST);
session_start();
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
	array_push($responseArray,"Number of rooms field should only contain numbers.");

}
else{

	$nos= $_POST['room_nosroom'];
}

if (empty($_POST['room_service'])) {

	$is_check=false;
	array_push($responseArray,"Room service field is required");

}elseif ($_POST['room_service']=='yes') {
	$service=$_POST['room_service'];
	if (empty($_POST['room_24hour']) && empty($_POST['room_selecthour'])) {
		
		$is_check=false;
		array_push($responseArray,"Filled atleast one from room service");

	}elseif (!empty($_POST['room_24hour'])) {

		   $choosehour =$_POST['room_24hour'];
		   $selecthour= null;

	}elseif (!empty($_POST['room_selecthour'])) {

		    if (!preg_match("/^(?:0[1-9]|1[0-2]):[0-5][0-9](am|pm|AM|PM)$/", $_POST['room_selecthour'])) {

				 $is_check=false;
				 array_push($responseArray,"Select time format is invalid");
				 
				}else{

					 $choosehour = null;
		             $selecthour= $_POST['room_selecthour'];
				}		   
    }
	
}else{

	$service=$_POST['room_service'];
	$choosehour = null;
	$selecthour= null;
}

if (empty($_POST['room_maxadult'])) {

	$is_check=false;
	array_push($responseArray,"Maximum adults field is required");

}elseif (!is_numeric($_POST['room_maxadult'])) {

	$is_check=false;
	array_push($responseArray,"Maximum adults field should only contain numbers.");

}else{

	$maxadult=$_POST['room_maxadult'];
}

if (empty($_POST['room_matadult'])) {

	$is_check=false;
	array_push($responseArray,"Extra mattress charges for adults field is required");

}elseif (!is_numeric($_POST['room_matadult'])) {

	$is_check=false;
	array_push($responseArray,"Extra mattress charges field should only contain numbers.");

}else{

	$matadult=$_POST['room_matadult'];
}

if (empty($_POST['room_maxchild'])) {

	$is_check=false;
	array_push($responseArray,"Maximum children field is required");

}elseif (!is_numeric($_POST['room_maxchild'])) {

	$is_check=false;
	array_push($responseArray,"Maximum children field should only contain numbers.");

}else{

	$maxchild=$_POST['room_maxchild'];
}

if (empty($_POST['room_matchild'])) {

	$is_check=false;
	array_push($responseArray,"Extra mattress charges for children field is required");

}elseif (!is_numeric($_POST['room_matchild'])) {

	$is_check=false;
	array_push($responseArray,"Extra mattress charges for children field should only contain numbers.");

}else{

	$matchild=$_POST['room_matchild'];
}

if (empty($_POST['room_perni8'])) {

	$is_check=false;
	array_push($responseArray,"Room charges field is required");

}elseif (!is_numeric($_POST['room_perni8'])) {

	$is_check=false;
	array_push($responseArray,"Room charges field should only contain numbers.");

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

 if (isset($_POST['book_fromdate'])) {

      foreach($_POST['book_fromdate'] as $bokFROM) { 
                   
     if (!empty($bokFROM)) {
          
           
        // $resultfrom = DateTime::createFromFormat("m/d/Y", $_POST['book_fromdate']);
       if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%', $bokFROM)) {

           $from= $bokFROM;

       }else{

          $is_check=false;
          array_push($responseArray,"From date field is invalid");
       }
  
     }
 }

 }else{

     $from=null;

 }

if (isset($_POST['book_todate'])) {

  foreach($_POST['book_todate'] as $bokTO) { 
               
     if (!empty($bokTO)) {
                       
         // $resultto = $_POST['book_todate']->format("m/d/Y");
       if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%', $bokTO)) {

           $to= $bokTO;

         }else{

           $is_check=false;
            array_push($responseArray,"To date field is invalid");

         }
    
      }
   }
  
}else{

       $to=null;
 }

if (!empty($_POST['room_offerdiscount']) && !is_numeric($_POST['room_offerdiscount'])) {

	$is_check= false;
	array_push($responseArray,"Offer discount field should only contain numbers.");

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
        // $result = DateTime::createFromFormat("m/d/Y", $_POST['room_expireoffer']);
    
    //   $date = date_create($_POST['room_expireoffer']);
 	  // $result = date_format($date,"m/d/Y");
 		if (preg_match('%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%', $_POST['room_expireoffer'])) {

 			$discountexpire=$_POST['room_expireoffer'];

  		}else{

  			 $is_check=false;
 			 array_push($responseArray,"Expire offer field is invalid");
 		}
	
  }
}else{
	$discountexpire=null;
}


$img=$_POST['common_image'];
$imgarray= explode(",",$img);
$provideo=$_POST['common_video'];
$formtype='room';
$user_id=$_POST['user_id'];
$hotelid=$_POST['hotel_id'];

if (isset($_POST['room_inactive'])) {
  $inactive=$_POST['room_inactive'];
}else{
  $inactive="off";
}

$errorMsgs=implode(",",$responseArray);

$newErrorMsgArr=array(
    "status"=> "error",
    "message"=> $errorMsgs
);

$newSuccessMsgArr=array(
    "status"=> "success",
    "id"=> $user_id
    
);



if ($is_check==true) {
	# code...

$query='INSERT INTO room(user_id,hotel_id,room_name,room_nosroom,room_service,room_selecthour,room_24hour,room_maxadult,room_matadult,room_maxchild,room_matchild,room_perni8,room_descrip,room_other,room_offerdiscount,room_expireoffer,hotel_name,room_inactive,room_status)VALUES("'.$user_id.'","'.$hotelid.'","'.$name.'","'.$nos.'","'.$service.'","'.$selecthour.'","'.$choosehour.'","'.$maxadult.'","'.$matadult.'","'.$maxchild.'","'.$matchild.'","'.$ni8.'","'.$descrip.'","'.$other.'","'.$discuntofer.'","'.$discountexpire.'","'.$hotelName.'","'.$inactive.'","Pending")';


if ($conn->query($query)== TRUE) {
 	# code...
 	$room_id=$conn->insert_id;

 
 }else{
 	echo "Error: " . $query . "<br>" . $conn->error;
 }

// echo $room_id;
if (count($_POST['book_fromdate']) > 0 && !empty($_POST['book_fromdate'][0])) {

   for ($i=0; $i<count($_POST['book_fromdate']); $i++) {

	$datesQuery='INSERT INTO common_bookdates(room_id,book_fromdate,book_todate,form_date_type)VALUES("'.$room_id.'","'.$_POST['book_fromdate'][$i].'","'.$_POST['book_todate'][$i].'","'.$formtype.'")';

	$datesResult=mysqli_query($conn,$datesQuery) or die(mysqli_error($conn));
   }
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

  include '../../methods/send-notification.php';

     insert_notification($conn,$user_id,"admin","true","false","Created","New Room Created","".$name." in ".$hotelName." has been created under your account",date("F j, Y, g:i a"),"rooms/showsingle_roomrecord.php?id=".$room_id."&h_id=".$hotelid,"room","vendor","" );

     if ($_SESSION['user_type']=="admin") {

 insert_notification($conn,$user_id ,"admin","true","false","Created","New Room Created","".$_SESSION['reg_name']." has been created ".$name." in ".$hotelName."",date("F j, Y, g:i a"),"rooms/showsingle_roomrecord.php?id=".$room_id."&h_id=".$hotelid."&status=".$_POST['vendorStatus']."&name=".$_POST['vendorName']."&user_id=".$user_id,"room","s_admin","" );
}


  echo json_encode($newSuccessMsgArr);

}else{
	
	echo json_encode($newErrorMsgArr);
    return false;
}


?>