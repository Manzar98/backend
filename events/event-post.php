
<?php
include '../common-sql.php';
 print_r($_POST);

$is_check=true;

if (empty($_POST['event_name'])) {

	$is_check=false;
	echo "Event Name Field is required "."<br>";
}else{

	$name         = $_POST['event_name'];
}
if (empty($_POST['event_venue'])) {

	$is_check=false;
	echo "Venue Field is required "."<br>" ;
}else{
	
	$venue        = $_POST['event_venue'];
}
if (empty($_POST['event_recurrence'])) {

	$is_check=false;
	echo "Recurrence Field is required"."<br>" ;
}else{
	
	$recurrence   = $_POST['event_recurrence'];
}
 if (empty($_POST['event_descrip'])) {

 	$is_check=false;
 	echo "Event Description Field is required "."<br>";
 }else{
	
	$descrip      = $_POST['event_descrip'];

 }
if (empty($_POST['event_entry'])) {

	$is_check=false;
	echo "Entry Fee Field is required"."<br>";
}elseif ($_POST['event_entry']=='yes') {
			   $evententry   = $_POST['event_entry'];
			   
			   if(empty($_POST['event_entryfee'])){

				$is_check= false;
			    echo "Event Price Field is required";

				}elseif(!empty($_POST['event_entryfee']) && !is_numeric($_POST['event_entryfee'])){
                     $is_check=false;
                     echo "Event price field accept only numeric";
					

				}else{
                    $entryfee      = $_POST['event_entryfee'];
					$entryfee = null;

				}

	
}
else{
	
	$evententry   = $_POST['event_entry'];

}

if (empty($_POST['event_childallow'])) {
	
	$is_check=false;
	echo "Children allow field is required";
     
}elseif ($_POST['event_childallow']=='yes') {
				$childallow       =$_POST['event_childallow'];
				if (empty($_POST['event_undr5allow'])) {
					$is_check=false;
	                echo "Under 5 allowed field is required";	
				}else{
					$undr5allow       =$_POST['event_undr5allow'];
				}
				if (empty($_POST['event_undr5free']) && empty($_POST['event_undr5price'])) {
					$is_check=false;
	                echo "Filled atleast one field in Under 5 allowed";	
				}else{

					if(!empty($_POST['event_undr5price']) && !is_numeric($_POST['event_undr5price'])){
						$is_check= false;
					   
					    echo "Half price field accept only numeric";
					}elseif(!empty($_POST['event_undr5price']) && is_numeric($_POST['event_undr5price'])){
						$undr5price      = $_POST['event_undr5price'];
					}else{
						$undr5price = null;

					}

					if (isset($_POST['event_undr5free'])) {

					  $undr5free          =$_POST['event_undr5free'];

					}else{
						$undr5free          ='off';

					}

				}

				if (empty($_POST['event_halftikchild'])) {
					   $is_check= false;
					   echo "Children price field is required";
				}elseif (!empty($_POST['event_halftikchild'] && !is_numeric($_POST['event_halftikchild']))) {
					 $is_check= false;
					 echo "Children price field accept only numeric";
				}else{
					 $halftikchild     =$_POST['event_halftikchild'];
				}
	
}

else{

	$childallow  =$_POST['event_childallow'];
	$undr5price  = null;
    $undr5allow  = null;
	$undr5free   ='off';
	$halftikchild= null;

}

	
	$nospeople     = $_POST['common_nopeople'];
	$discountx    = $_POST['common_discount'];

if (empty($_POST['event_pikoffer'])) {
	
	$is_check=false;
      echo "Pickup offered field is required";
}elseif ($_POST['event_pikoffer']=='yes') {
	$pikoffer         =$_POST['event_pikoffer'];
	if (empty($_POST['event_pikair']) && empty($_POST['event_pikbus']) && empty($_POST['event_pikspecific'])) {
		$is_check=false;
		echo "Filled atleast one field from pickup offered ";
	}else{
         
         if(!empty($_POST['event_pikair']) && !is_numeric($_POST['event_pikair'])){

			$is_check= false;
		     echo "From airport pickup field accept only numeric";
		}elseif(!empty($_POST['event_pikair']) && is_numeric($_POST['event_pikair'])){

			$pikair      = $_POST['event_pikair'];

		}else{

			$pikair = null;

        }

        if(!empty($_POST['event_pikbus']) && !is_numeric($_POST['event_pikbus'])){

			$is_check= false;
		   echo "From bus pickup field accept only numeric";
		}elseif(!empty($_POST['event_pikbus']) && is_numeric($_POST['event_pikbus'])){

			$pikbus      = $_POST['event_pikbus'];

		}else{

			$pikbus = null;

		}

		if(!empty($_POST['event_pikspecific']) && !is_numeric($_POST['event_pikspecific'])){

			$is_check= false;
		    echo "From specific location pickup field accept only numeric";
		}elseif(!empty($_POST['event_pikspecific']) && is_numeric($_POST['event_pikspecific'])){

			$pikspecific      = $_POST['event_pikspecific'];

		}else{

			$pikspecific = null;

		}



	}
}


else{

	$pikoffer         =$_POST['event_pikoffer'];
	$pikair = null;
	$pikbus = null;
	$pikspecific = null;

}


if (empty($_POST['event_drpoffer'])) {
	
	$is_check=false;
     echo "Dropoff offered field is required";
}elseif ($_POST['event_drpoffer']=='yes') {
     $drpoffer         =$_POST['event_drpoffer'];
	if (empty($_POST['event_drpair']) && empty($_POST['event_drpbus']) && empty($_POST['event_drpspecific'])) {
         
		 $is_check=false;
		 echo "Filled atleast one field from pickup offered ";
	 }else{

				if(!empty($_POST['event_drpair']) && !is_numeric($_POST['event_drpair'])){

					$is_check= false;
				    echo "From  air dropoff field accept only numeric";
				}elseif(!empty($_POST['event_drpair']) && is_numeric($_POST['event_drpair'])){

					$drpair      = $_POST['event_drpair'];

				}else{

					$drpair = null;

				}

				if(!empty($_POST['event_drpbus']) && !is_numeric($_POST['event_drpbus'])){

					$is_check= false;
				     echo "From bus dropoff field accept only numeric";
				}elseif(!empty($_POST['event_drpbus']) && is_numeric($_POST['event_drpbus'])){

					$drpbus      = $_POST['event_drpbus'];

				}else{

					$drpbus = null;

				}

				if(!empty($_POST['event_drpspecific']) && !is_numeric($_POST['event_drpspecific'])){

					$is_check= false;
				    echo "From specific location dropoff field accept only numeric";
				}elseif(!empty($_POST['event_drpspecific']) && is_numeric($_POST['event_drpspecific'])){

					$drpspecific      = $_POST['event_drpspecific'];

				}else{

					$drpspecific = null;

				}


	 }
	
}else{

	$drpoffer         =$_POST['event_drpoffer'];
	$drpair = null;
	$drpbus = null;
	$drpspecific = null;

}




if (empty($_POST['event_serve'])) {

	$is_check=false;
	echo "Serve Food Field is required.";
}elseif ($_POST['event_serve']=="yes") {

       $serveFood=$_POST['event_serve'];
	   if(empty($_POST['event_eatFree']) && empty($_POST['event_eatAll']) && empty('$event_eatNeed')){
           $is_check=false;
           echo "checked the one field from serve food";

	   }else{
             
             if (isset($_POST['event_eatFree'])) {
				$eatFree    = $_POST['event_eatFree'];
			}else{
				$eatFree    = 'off';
			}
			if (isset($_POST['event_eatAll'])) {
				 $eatAll    = $_POST['event_eatAll'];
				 if (empty($_POST['event_eatAllChrges'])) {
				 	$is_check=false;
				 	echo "All you can eat charges  field is required";
				 }elseif (!empty($_POST['event_eatAllChrges']) && !is_numeric($_POST['event_eatAllChrges'])) {
				 	$is_check= false;
                    echo "All you can eat charges  field accept only Numeric ";
				 }else{
				 	$eatAllChrges      = $_POST['event_eatAllChrges'];
				 }

			}else{
				$eatAll="off";
			}
			if (isset($_POST['event_eatNeed'])) {

					$eatNeed    = $_POST['event_eatNeed'];
				}else{
					$eatNeed    = 'off';
				}

	   }
	
}
else{
	$serveFood=$_POST['event_serve'];
	$eatFree    = 'off';
	$eatAll="off";
	$eatNeed    = 'off';
	$eatAllChrges = null;
}

$img          = $_POST['common_image'];
$imgarray= explode(",",$img);	
$provideo        = $_POST['common_video'];
$userid       = 2;
$hotelid      = 31;
$formtype     = 'event';

if ($is_check==true) {
	# code...

$query='INSERT INTO event(user_id,hotel_id,event_name,event_venue,event_recurrence,event_serve,event_eatFree,event_eatAll,event_eatAllChrges,event_eatNeed,event_descrip,event_entry,event_entryfee,event_childallow,event_undr5allow,event_halftikchild,event_undr5free,event_undr5price,event_pikoffer,event_pikair,event_pikbus,event_pikspecific,event_drpoffer,event_drpair,event_drpbus,event_drpspecific)VALUES("'.$userid.'","'.$hotelid.'","'.$name.'","'.$venue.'","'.$recurrence.'","'.$serveFood.'","'.$eatFree.'","'.$eatAll.'","'.$eatAllChrges.'","'.$eatNeed.'","'.$descrip.'","'.$evententry.'","'.$entryfee.'","'.$childallow.'","'.$undr5allow.'","'.$halftikchild.'","'.$undr5free.'","'.$undr5price.'","'.$pikofer.'","'.$pikair.'","'.$pikbus.'","'.$pikspecific.'","'.$drpofer.'","'.$drpair.'","'.$drpbus.'","'.$drpspecific.'")';

if ($conn->query($query)== TRUE) {
 	# code...
 	$event_id=$conn->insert_id;

 }else{
 	echo "Error: " . $query . "<br>" . $conn->error;
 }

// echo $event_id;


if (isset($_POST['common_video'])) {

	$videoQuery='INSERT INTO common_imagevideo(event_id,common_video,img_video_type)VALUES("'.$event_id.'","'.$provideo.'","'.$formtype.'")';

	mysqli_query($conn,$videoQuery) or die(mysqli_error($conn));
	# code...
  // echo 	$videoQuery;
}



 for ($i=0; $i<count($imgarray); $i++) {

             // print_r($imgarray) ;

	  $img_UpdateQuery='UPDATE common_imagevideo SET
 	 event_id="'.$event_id.'",
 	 img_video_type = "'.$formtype.'" WHERE common_imgvideo_id="'.$imgarray[$i].'"' ;

             mysqli_query($conn,$img_UpdateQuery) or die(mysqli_error($conn));


 }

 for ($i=0; $i < count($_POST['common_nopeople']) ; $i++) { 


 	$discountQuery='INSERT INTO common_nosofpeople(event_id,common_nopeople,common_discount,discount_type)VALUES("'.$event_id.'","'.$nospeople[$i].'","'.$discountx[$i].'","'.$formtype.'")';
     // echo $discountQuery;
 	$disQuery=mysqli_query($conn,$discountQuery) or die(mysqli_error($conn));
 	# code...
 }


  echo "sucess";

}else{

	return false;
}

?>


