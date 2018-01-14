
<?php
include '../common-sql.php';
print_r($_POST);

$is_check=true;

if (empty($_POST['event_name'])) {

	$is_check=false;
	echo "This Field is required 1"."<br>";
}else{

	$name         = $_POST['event_name'];
}
if (empty($_POST['event_venue'])) {

	$is_check=false;
	echo "This Field is required 2"."<br>" ;
}else{
	
	$venue        = $_POST['event_venue'];
}
if (empty($_POST['event_recurrence'])) {

	$is_check=false;
	echo "This Field is required 3"."<br>" ;
}else{
	
	$recurrence   = $_POST['event_recurrence'];
}
if (empty($_POST['event_descrip'])) {

	$is_check=false;
	echo "This Field is required 4"."<br>";
}else{
	
	$descrip      = $_POST['event_descrip'];

}
if (empty($_POST['event_entry'])) {

	$is_check=false;
	echo "This Field is required 5"."<br>";
}else{
	
	$evententry   = $_POST['event_entry'];

}
if (empty($_POST['event_childallow'])) {

	$is_check=false;
	echo "This Field is required 6"."<br>";
}else{
	
	$childallow   = $_POST['event_childallow'];

}
if (empty($_POST['event_undr5allow'])) {

	$is_check=false;
	echo "This Field is required 7"."<br>";
}else{
	
	$undr5allow   = $_POST['event_undr5allow'];

}

if(!empty($_POST['event_entryfee']) && !is_numeric($_POST['event_entryfee'])){

	$is_check= false;
    echo "Event Price Field accept only Numeric "."<br>";

}elseif(!empty($_POST['event_entryfee']) && is_numeric($_POST['event_entryfee'])){

	$entryfee      = $_POST['event_entryfee'];

}else{

	$entryfee = null;

}

$halftikchild = $_POST['event_halftikchild'];

if (isset($_POST['event_undr5free'])) {
	$undr5free    = $_POST['event_undr5free'];
}else{
	$undr5free    = 'off';
}

 if (isset($_POST['event_undr5price'])) {
 	$undr5price   = $_POST['event_undr5price'];
 }

	
	$nospeople     = $_POST['common_nopeople'];

	$discountx    = $_POST['common_discount'];



if (empty($_POST['event_pikoffer'])) {

	$is_check=false;
	echo "This Field is required 9"."<br>";
}else{
	
	$pikofer      = $_POST['event_pikoffer'];

}

if(!empty($_POST['event_pikair']) && !is_numeric($_POST['event_pikair'])){

	$is_check= false;
    echo "Airport Pickup Field accept only Numeric "."<br>";

}elseif(!empty($_POST['event_pikair']) && is_numeric($_POST['event_pikair'])){

	$pikair      = $_POST['event_pikair'];

}else{

	$pikair = null;

}

if(!empty($_POST['event_pikbus']) && !is_numeric($_POST['event_pikbus'])){

	$is_check= false;
    echo "Bus Pickup Field accept only Numeric "."<br>";

}elseif(!empty($_POST['event_pikbus']) && is_numeric($_POST['event_pikbus'])){

	$pikbus      = $_POST['event_pikbus'];

}else{

	$pikbus = null;

}

if(!empty($_POST['event_pikspecific']) && !is_numeric($_POST['event_pikspecific'])){

	$is_check= false;
    echo "Specific Location Pickup Field accept only Numeric "."<br>";

}elseif(!empty($_POST['event_pikspecific']) && is_numeric($_POST['event_pikspecific'])){

	$pikspecific      = $_POST['event_pikspecific'];

}else{

	$pikspecific = null;

}

if (empty($_POST['event_drpoffer'])) {

	$is_check=false;
	echo "This Field is required 13"."<br>";
}else{
	
	$drpofer      = $_POST['event_drpoffer'];
}

if(!empty($_POST['event_drpair']) && !is_numeric($_POST['event_drpair'])){

	$is_check= false;
    echo "From  Air Dropoff Field accept only Numeric "."<br>";

}elseif(!empty($_POST['event_drpair']) && is_numeric($_POST['event_drpair'])){

	$drpair      = $_POST['event_drpair'];

}else{

	$drpair = null;

}

if(!empty($_POST['event_drpbus']) && !is_numeric($_POST['event_drpbus'])){

	$is_check= false;
    echo "From  Bus Dropoff Field accept only Numeric "."<br>";

}elseif(!empty($_POST['event_drpbus']) && is_numeric($_POST['event_drpbus'])){

	$drpbus      = $_POST['event_drpbus'];

}else{

	$drpbus = null;

}

if(!empty($_POST['event_drpspecific']) && !is_numeric($_POST['event_drpspecific'])){

	$is_check= false;
    echo "From  Bus Dropoff Field accept only Numeric "."<br>";

}elseif(!empty($_POST['event_drpspecific']) && is_numeric($_POST['event_drpspecific'])){

	$drpspecific      = $_POST['event_drpspecific'];

}else{

	$drpspecific = null;

}

if (empty($_POST['event_serve'])) {

	$is_check=false;
	echo "Serve Food Field is required.";
}else{
	$serveFood=$_POST['event_serve'];
}


if (isset($_POST['event_eatFree'])) {
	$eatFree    = $_POST['event_eatFree'];
}else{
	$eatFree    = 'off';
}

if (isset($_POST['event_eatAll'])) {
	$eatAll    = $_POST['event_eatAll'];
}else{
	$eatAll    = 'off';
}

if(!empty($_POST['event_eatAllChrges']) && !is_numeric($_POST['event_eatAllChrges'])){

	$is_check= false;
    echo "All you can eat charges  field accept only Numeric "."<br>";

}elseif(!empty($_POST['event_eatAllChrges']) && is_numeric($_POST['event_eatAllChrges'])){

	$eatAllChrges      = $_POST['event_eatAllChrges'];

}else{

	$eatAllChrges = null;

}




if (isset($_POST['event_eatNeed'])) {
	$eatNeed    = $_POST['event_eatNeed'];
}else{
	$eatNeed    = 'off';
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

echo $event_id;


if (isset($_POST['common_video'])) {

	$videoQuery='INSERT INTO common_imagevideo(event_id,common_video,img_video_type)VALUES("'.$event_id.'","'.$provideo.'","'.$formtype.'")';

	mysqli_query($conn,$videoQuery) or die(mysqli_error($conn));
	# code...
  echo 	$videoQuery;
}



 for ($i=0; $i<count($imgarray); $i++) {

             print_r($imgarray) ;

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

  echo "<br>"."Your Form Submitted Sucessfully !"."<br>";
}else{

	return false;
}

?>


