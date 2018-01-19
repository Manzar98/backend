<?php
 include '../common-sql.php';
  // print_r($_POST);

// return false;
$is_check=true;
 $responseArray=[];

if (empty($_POST['tour_name'])) {

     $is_check=false;
     array_push($responseArray,"Tour name is required");
     
}else{
   
   $tourname      =$_POST['tour_name'];
}
if (empty($_POST['tour_destinationname'])) {

     $is_check=false;
     array_push($responseArray,"Name of Destination is required");
}else{
   
   $nameofdesti      =$_POST['tour_destinationname'];
}



if (empty($_POST['tour_foodinclude'])) {

     $is_check=false;
     array_push($responseArray,"Food include field is required");
}elseif ($_POST['tour_foodinclude']=='yes') {
	$fodinclude       =$_POST['tour_foodinclude'];
	if (empty($_POST['tour_brkfast']) && empty($_POST['tour_lunch']) && empty($_POST['tour_dinner'])) {
		$is_check=false;
		array_push($responseArray,"Check at least one from Food included");
	}else{
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
	}
	# code...
}else{
   
   $fodinclude       =$_POST['tour_foodinclude'];
   $brkfast      ='off';
   $lunch        ='off';
   $dinner        ='off';
}




if (empty($_POST['tour_drink'])) {

	$is_check=false;
     array_push($responseArray,"Drink include field is required");

}elseif ($_POST['tour_drink']=='yes') {
	$drnkinclude      =$_POST['tour_drink'];
     if (empty($_POST['tour_aloholic']) && empty($_POST['tour_nonaloholic'])) {
     	 $is_check=false;
     	 array_push($responseArray,"Check at least one from Drink included");
     }else{

     	if (isset($_POST['tour_aloholic'])) {
     		$aloholic           =$_POST['tour_aloholic'];
     	}else{
     		$aloholic        ='off';
     	}
     	if (isset($_POST['tour_nonaloholic'])) {
     		$nonalohlic         =$_POST['tour_nonaloholic'];
     	}else{
     		$nonalohlic      ='off';
     	}
     }

}else{

	$drnkinclude      =$_POST['tour_drink'];
	$aloholic        ='off';
	$nonalohlic      ='off';
}


if (empty($_POST['tour_stayday'])) {

	$is_check=false;
     array_push($responseArray,"Number of days field is required");
}elseif (!is_numeric($_POST['tour_stayday'])) {
	$is_check=false;
	array_push($responseArray,"Number of days field is accept only numeric");
}else{

	$stayday          =$_POST['tour_stayday'];
}
if (empty($_POST['tour_stayni8'])) {
	
 	$is_check=false;
    array_push($responseArray,"Number of nights field is required");

 }elseif (!is_numeric($_POST['tour_stayni8'])) {

	$is_check=false;
	array_push($responseArray,"Number of nights field is accept only numeric");
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
    array_push($responseArray,"Entry tickets included in the package price field is required");
}else{

	$entrytik         =$_POST['tour_entrytik'];
}
 if (empty($_POST['tour_plan'])) {
	
 	$is_check=false;
    array_push($responseArray,"Whole Plan field is required");
 }else{

	$plan             =$_POST['tour_plan'];
 }
if (empty($_POST['tour_pkgprice'])) {
	
	$is_check=false;
     array_push($responseArray,"Package price field is required");
}elseif (!is_numeric($_POST['tour_pkgprice'])) {
	$is_check=false;
	array_push($responseArray,"Package price accept only numeric");
}else{

	$pkgprice         =$_POST['tour_pkgprice'];

}
if (empty($_POST['tour_capacitypeople'])) {
	
	$is_check=false;
   array_push($responseArray,"Number of people field is required");
}elseif (!is_numeric($_POST['tour_capacitypeople'])) {
	$is_check=false;
	array_push($responseArray,"Number of people accept only numeric");
}else{

	$capcipeople      =$_POST['tour_capacitypeople'];

}
if (empty($_POST['tour_nosofbag'])) {
	
	$is_check=false;
	array_push($responseArray,"Number of bags allowed field is required");

}elseif (!is_numeric($_POST['tour_nosofbag'])) {
	$is_check=false;
	array_push($responseArray,"Number of bags allowed accept only numeric");
	
}else{

	$nosbag           =$_POST['tour_nosofbag'];

}
if (empty($_POST['tour_childallow'])) {
	
	$is_check=false;
	array_push($responseArray,"Children allow field is required");
     
}elseif ($_POST['tour_childallow']=='yes') {
				$childallow       =$_POST['tour_childallow'];
				if (empty($_POST['tour_undr5allow'])) {
					$is_check=false;
	                array_push($responseArray,"Under 5 allowed field is required");	
				}else{
					$undr5allow       =$_POST['tour_undr5allow'];
				}
				if (empty($_POST['tour_undr5free']) && empty($_POST['tour_undr5price'])) {
					$is_check=false;
	                array_push($responseArray,"Filled atleast one field in Under 5 allowed");	
				}else{

					if(!empty($_POST['tour_undr5price']) && !is_numeric($_POST['tour_undr5price'])){
						$is_check= false;
					   
					    array_push($responseArray,"Half price field accept only numeric");
					}elseif(!empty($_POST['tour_undr5price']) && is_numeric($_POST['tour_undr5price'])){
						$undr5price      = $_POST['tour_undr5price'];
					}else{
						$undr5price = null;

					}

					if (isset($_POST['tour_undr5free'])) {

					  $undr5free          =$_POST['tour_undr5free'];

					}else{
						$undr5free          ='off';

					}

				}

				if (empty($_POST['tour_halftikchild'])) {
					   $is_check= false;
					   array_push($responseArray,"Children price field is required");
				}elseif (!empty($_POST['tour_halftikchild'] && !is_numeric($_POST['tour_halftikchild']))) {
					 $is_check= false;
					 array_push($responseArray,"Children price field accept only numeric");
				}else{
					 $halftikchild     =$_POST['tour_halftikchild'];
				}
	
}

else{

	$childallow  =$_POST['tour_childallow'];
	$undr5price  = null;
    $undr5allow  = null;
	$undr5free   ='off';
	$halftikchild= null;

}

$extrachrbag      =$_POST['tour_extrachrbag'];







if (empty($_POST['tour_strtloc'])) {
	
	$is_check=false;
     array_push($responseArray,"Trip start location field is required");
}else{

	$strtloc          =$_POST['tour_strtloc'];

}

if (empty($_POST['tour_pikoffer'])) {
	
	$is_check=false;
      array_push($responseArray,"Pickup offered field is required");
}elseif ($_POST['tour_pikoffer']=='yes') {
	$pikoffer         =$_POST['tour_pikoffer'];
	if (empty($_POST['tour_pikair']) && empty($_POST['tour_pikbus']) && empty($_POST['tour_pikspecific'])) {
		$is_check=false;
		array_push($responseArray,"Filled atleast one field from pickup offered ");
	}else{
         
         if(!empty($_POST['tour_pikair']) && !is_numeric($_POST['tour_pikair'])){

			$is_check= false;
		     array_push($responseArray,"From airport pickup field accept only numeric");
		}elseif(!empty($_POST['tour_pikair']) && is_numeric($_POST['tour_pikair'])){

			$pikair      = $_POST['tour_pikair'];

		}else{

			$pikair = null;

        }

        if(!empty($_POST['tour_pikbus']) && !is_numeric($_POST['tour_pikbus'])){

			$is_check= false;
		    array_push($responseArray,"From bus pickup field accept only numeric");
		}elseif(!empty($_POST['tour_pikbus']) && is_numeric($_POST['tour_pikbus'])){

			$pikbus      = $_POST['tour_pikbus'];

		}else{

			$pikbus = null;

		}

		if(!empty($_POST['tour_pikspecific']) && !is_numeric($_POST['tour_pikspecific'])){

			$is_check= false;
		    array_push($responseArray,"From specific location pickup field accept only numeric");
		}elseif(!empty($_POST['tour_pikspecific']) && is_numeric($_POST['tour_pikspecific'])){

			$pikspecific      = $_POST['tour_pikspecific'];

		}else{

			$pikspecific = null;

		}



	}
}


else{

	$pikoffer         =$_POST['tour_pikoffer'];
	$pikair = null;
	$pikbus = null;
	$pikspecific = null;

}


if (empty($_POST['tour_drpoffer'])) {
	
	$is_check=false;
     array_push($responseArray,"Dropoff offered field is required");
}elseif ($_POST['tour_drpoffer']=='yes') {
     $drpoffer         =$_POST['tour_drpoffer'];
	if (empty($_POST['tour_drpair']) && empty($_POST['tour_drpbus']) && empty($_POST['tour_drpspecific'])) {
         
		 $is_check=false;
		 array_push($responseArray,"Filled atleast one field from pickup offered ");
	 }else{

				if(!empty($_POST['tour_drpair']) && !is_numeric($_POST['tour_drpair'])){

					$is_check= false;
				    array_push($responseArray,"From  air dropoff field accept only numeric");
				}elseif(!empty($_POST['tour_drpair']) && is_numeric($_POST['tour_drpair'])){

					$drpair      = $_POST['tour_drpair'];

				}else{

					$drpair = null;

				}

				if(!empty($_POST['tour_drpbus']) && !is_numeric($_POST['tour_drpbus'])){

					$is_check= false;
				     array_push($responseArray,"From bus dropoff field accept only numeric");
				}elseif(!empty($_POST['tour_drpbus']) && is_numeric($_POST['tour_drpbus'])){

					$drpbus      = $_POST['tour_drpbus'];

				}else{

					$drpbus = null;

				}

				if(!empty($_POST['tour_drpspecific']) && !is_numeric($_POST['tour_drpspecific'])){

					$is_check= false;
				    array_push($responseArray,"From specific location dropoff field accept only numeric");
				}elseif(!empty($_POST['tour_drpspecific']) && is_numeric($_POST['tour_drpspecific'])){

					$drpspecific      = $_POST['tour_drpspecific'];

				}else{

					$drpspecific = null;

				}


	 }
	
}else{

	$drpoffer         =$_POST['tour_drpoffer'];
	$drpair = null;
	$drpbus = null;
	$drpspecific = null;

}











// if (!is_numeric($_POST['common_nopeople'])) {

// 	$is_check=false;
// 	echo "This Field accept only Numeric 24"."<br>";
// }else{

	$noofpeople       =$_POST['common_nopeople'];
// }
// if (!is_numeric($_POST['common_discount'])) {

// 	$is_check=false;
// 	echo "This Field accept only Numeric 25"."<br>";
// }else{
	
	$discountpeople   =$_POST['common_discount'];
// }/





$img          = $_POST['common_image'];

$imgarray= explode(",",$img);	
$provideo        = $_POST['common_video'];
$denation_name    =$_POST['destination_name'];
$denation_desp    =$_POST['destination_descrp'];
$attraction_name  =$_POST['attraction_name'];
$attraction_desp  =$_POST['attraction_descrp'];

if (empty($_POST['tour_depdate'])) {
  $is_check=false;
  array_push($responseArray,"Departure date field is required");
}else{
  $depDate= $_POST['tour_depdate'];
}

if (empty($_POST['tour_deptime'])) {
  $is_check=false;
  array_push($responseArray,"Departure Time filed is requird");
}elseif (!preg_match("/^(?:0[1-9]|1[0-2]):[0-5][0-9](am|pm|AM|PM)$/", $_POST['tour_deptime'])) {
	$is_check=false;
	array_push($responseArray,"Departure time format is invalid");
}
else{
  $depTime=$_POST['tour_deptime'];
}

if (empty($_POST['tour_arrdate'])) {
  $is_check=false;
  array_push($responseArray,"Arrival Date field is required");
}else{
  $arrDate=$_POST['tour_arrdate'];
}

if (empty($_POST['tour_arrtime'])) {
  $is_check=false;
  array_push($responseArray,"Arrival Time field is required");

}elseif (!preg_match("/^(?:0[1-9]|1[0-2]):[0-5][0-9](am|pm|AM|PM)$/", $_POST['tour_arrtime'])) {
	$is_check=false;
	array_push($responseArray,"Arrival time format is invalid");
}else{
  $arrTime=$_POST['tour_arrtime'];
}




$user_id          =2;
$hotelid          =31;
$formtype         ='tour';


$errorMsgs=implode(",",$responseArray);

$newErrorMsgArr=array(
    "status"=> "error",
    "message"=> $errorMsgs
);


if ($is_check==true) {
	# code...


$query= 'INSERT INTO tour(user_id,hotel_id,tour_name,tour_destinationname,tour_foodinclude,tour_brkfast,tour_lunch,tour_dinner,tour_drink,tour_aloholic,tour_nonaloholic,tour_stayday,tour_stayni8,tour_depdate,tour_deptime,tour_arrdate,tour_arrtime,tour_hotelstr,tour_camping,tour_entrytik,tour_plan,tour_pkgprice,tour_capacitypeople,tour_nosofbag,tour_extrachrbag,tour_childallow,tour_undr5allow,tour_halftikchild,tour_undr5free,tour_undr5price,tour_strtloc,tour_pikoffer,tour_pikair,tour_pikbus,tour_pikspecific,tour_drpoffer,tour_drpair,tour_drpbus,tour_drpspecific)VALUES("'.$user_id.'","'.$hotelid.'","'.$tourname.'","'.$nameofdesti.'","'.$fodinclude.'","'.$brkfast.'","'.$lunch.'","'.$dinner.'","'.$drnkinclude.'","'.$aloholic.'","'.$nonalohlic.'","'.$stayday.'","'.$stayni8.'","'.$depDate.'","'.$depTime.'","'.$arrDate.'","'.$arrTime.'","'.$hotelstr.'","'.$camping.'","'.$entrytik.'","'.$plan.'","'.$pkgprice.'","'.$capcipeople.'","'.$nosbag.'","'.$extrachrbag.'","'.$childallow.'","'.$undr5allow.'","'.$halftikchild.'","'.$undr5free.'","'.$undr5price.'","'.$strtloc.'","'.$pikoffer.'","'.$pikair.'","'.$pikbus.'","'.$pikspecific.'","'.$drpoffer.'","'.$drpair.'","'.$drpbus.'","'.$drpspecific.'")';


// echo $query;
if ($conn->query($query)== TRUE) {
 	# code...
 	$tour_id=$conn->insert_id;

 }else{
 	echo "Error: " . $query . "<br>" . $conn->error;
 }

// echo $tour_id;
 
 if (isset($_POST['common_video'])) {

	$videoQuery='INSERT INTO common_imagevideo(tour_id,common_video,img_video_type)VALUES("'.$tour_id.'","'.$provideo.'","'.$formtype.'")';

	mysqli_query($conn,$videoQuery) or die(mysqli_error($conn));
	# code...
}



 for ($i=0; $i<count($imgarray); $i++) {

             // print_r($imgarray) ;

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

// echo $destination_id;

     // echo $discountQuery;
 	

 	 

for ($i=0; $i < count($_POST['attraction_name']) ; $i++) { 
 	
 	$attrctionQuery='INSERT INTO tour_attraction(destination_id,attraction_name,attraction_descrp)VALUES("'.$destination_id.'","'.$attraction_name[$i].'","'.$attraction_desp[$i].'")';

 	$attrResult=mysqli_query($conn,$attrctionQuery) or die(mysqli_error($conn));
 }
}


   echo "sucess";
}else{
	echo json_encode($newErrorMsgArr);
	return false;

}
?>