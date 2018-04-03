<?php 
include '../../common-sql.php';
     // print_r($_POST);
$h_id = $_POST['hotel_id'];
// $user_status=$_POST['user_status'];
// global $user_status;
$is_check= true;
$responseArray=[];

if (empty($_POST['hotel_name'])) {

  $is_check= false;
  array_push($responseArray,"Hotel name is required");

}else{

  $name=$_POST['hotel_name'];
}
if (empty($_POST['hotel_addres1'])) {

 $is_check=false;
 array_push($responseArray,"Address line 1 field is required");

}else{

  $addres1=$_POST['hotel_addres1'];

}

$addres2=$_POST['hotel_addres2'];

if (empty($_POST['hotel_city'])) {

 $is_check=false;
 array_push($responseArray,"City field is required");
}else{
  
  $city=$_POST['hotel_city'];

}
if (empty($_POST['hotel_province'])) {

 $is_check=false;
 array_push($responseArray,"Province field is required");
}else{
  
  $province=$_POST['hotel_province'];

}

if (empty($_POST['hotel_phone'])) {

 $is_check=false;
 array_push($responseArray,"Phone number field is required");    
}elseif(!is_numeric($_POST['hotel_phone'])){

 $is_check=false;
 array_push($responseArray,"Phone number field should only contain numbers.");
}else{
  
  $phone=$_POST['hotel_phone'];

}
if (!empty($_POST['hotel_fax']) && !is_numeric($_POST['hotel_fax'])) {
  
  $is_check=false;
  array_push($responseArray,"Fax number field should only contain numbers.");
}elseif(!empty($_POST['hotel_fax']) && is_numeric($_POST['hotel_fax'])){

  $fax=$_POST['hotel_fax'];
}else{
  $fax=null;
}

if (empty($_POST['hotel_email'])) {

  $is_check=false;
  array_push($responseArray,"Email address field is required");
}elseif(!filter_var($_POST['hotel_email'], FILTER_VALIDATE_EMAIL)){

  $is_check=false;
  array_push($responseArray,"Email address field is invalid");
}else{
  
  $email=$_POST['hotel_email'];

}

if (!empty($_POST['hotel_web'])) {
  # code...

  if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST['hotel_web'])) {
    $is_check=false;
    array_push($responseArray,"Website url is invalid");  
  }else{

   $web=$_POST['hotel_web'];
 }
}else{

  $web=null;
}


if (empty($_POST['hotel_descrp'])) {
  
 $is_check=false;
 array_push($responseArray,"Description field is required");
}else{

  $descrp=$_POST['hotel_descrp'];

}
if (empty($_POST['hotel_other'])) {
  
  $is_check=false;
  array_push($responseArray,"Amenities field is required");
}else{

  $other=$_POST['hotel_other'];

}
if (empty($_POST['hotel_policy'])) {

 $is_check=false;
 array_push($responseArray,"Canellation policy field is required");
}else{

 $policy=$_POST['hotel_policy'];
}

if (empty($_POST['hotel_pickup'])) {

  $is_check=false;
  array_push($responseArray,"Hotel pickup field is required");
}elseif ($_POST['hotel_pickup'] == 'yes') {

  $pickup=$_POST['hotel_pickup'];
  if (empty($_POST['hotel_isair']) && empty($_POST['hotel_isbus'])) {

    $is_check=false;
    array_push($responseArray,"Check atleast one from pickup offered");
  }else{

    if (isset($_POST['hotel_isair'])) {

      $is_air= $_POST['hotel_isair'];
      if (empty($_POST['hotel_pikcharge'])) {

        $is_check=false;
        array_push($responseArray,"Airport charges field is required");
      }elseif (!empty($_POST['hotel_pikcharge']) && !is_numeric($_POST['hotel_pikcharge'])) {

        $is_check=false;
        array_push($responseArray,"Airport charges field should only contain numbers.");
      }else{

       $charges=$_POST['hotel_pikcharge'];
     }
   }else{
    $charges=null;
     $is_air= 'off';
   }

   if (isset($_POST['hotel_isbus'])) {

    $is_bus= $_POST['hotel_isbus'];
    if (empty($_POST['hotel_buscharge'])) {
     $is_check=false;
     array_push($responseArray,"Bus charges field is required");
   }elseif (!empty($_POST['hotel_buscharge']) && !is_numeric($_POST['hotel_buscharge'])) {
     $is_check=false;
     array_push($responseArray,"Bus charges field should only contain numbers.");
   }else{
     $buscharge=$_POST['hotel_buscharge'];
   }

 }else{
   $buscharge=null;
   $is_bus= 'off';
 }
}

}else{
 $pickup=$_POST['hotel_pickup'];
 $charges=null;
 $buscharge=null;
 $is_bus= 'off';
 $is_air= 'off';

}


if (!empty($_POST['hotel_nobag']) ) {

  $nobag=$_POST['hotel_nobag'];

   if ($_POST['hotel_nobag'] > 0) {

      if (empty($_POST['hotel_bagprice'])) {
        
        $is_check= false;
        array_push($responseArray,"Bag charges field is required");
  }elseif (!empty($_POST['hotel_bagprice']) && !is_numeric($_POST['hotel_bagprice'])) {
       $is_check= false;
       array_push($responseArray,"Bag charges field should only contain numbers.");
  }else{

       $bagprice=$_POST['hotel_bagprice'];
  }
   }

 
}
else{
  $nobag=null;
  $bagprice=null;
}



$fburl=$_POST['hotel_fburl'];
$twurl=$_POST['hotel_twurl'];
$gourl=$_POST['hotel_gourl'];
$insurl=$_POST['hotel_insurl'];
$pinurl=$_POST['hotel_pinurl'];
$yuturl=$_POST['hotel_yuturl'];



if (empty($_POST['hotel_checkin'])) {
  $is_check=false;
  array_push($responseArray,"Checkin field is required");
}elseif (!preg_match("/^(?:0[1-9]|1[0-2]):[0-5][0-9](am|pm|AM|PM)$/", $_POST['hotel_checkin'])) {
 $is_check=false;
 array_push($responseArray,"Checkin time format is invalid");
}else{
 $checkIn=$_POST['hotel_checkin'];
}


if (empty($_POST['hotel_checkout'])) {

  $is_check=false;
  array_push($responseArray,"Checkout field is required");

}elseif (!preg_match("/^(?:0[1-9]|1[0-2]):[0-5][0-9](am|pm|AM|PM)$/", $_POST['hotel_checkout'])) {

 $is_check=false;
 array_push($responseArray,"Checkout time format is invalid");


}
else{

$checkOut=$_POST['hotel_checkout'];

}
$formtype='hotel';
 $user_id=$_POST['user_id'];
if (isset($_POST['hotel_inactive'])) {
  $inactive=$_POST['hotel_inactive'];
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
     "id"=>$user_id
    
    
);



if ($is_check==true) {

$hotlupdate='SELECT `hotel`.`hotel_inactive` FROM `hotel` WHERE hotel_id="'.$h_id.'"';

  $hotlupdate_result=mysqli_query($conn,$hotlupdate) or die(mysqli_error($conn));

  $hotlupdate_assoc=mysqli_fetch_assoc($hotlupdate_result);

  $notify_title="";
  $notify_descrip = "";

  if ($hotlupdate_assoc['hotel_inactive']== $inactive) {
  
  $notify_title="Your Listing has been updated.";

  $notify_descrip="".$name." has been updated";

    
  }else{


      if ($inactive=="off") {

         $notify_title="Your Listing has been activated ";
         $notify_descrip="".$name." has been reactivated ";

       }else{
          
         $notify_title="Your Listing has been inactivated ";
         $notify_descrip="".$name." has been inactivated ";

       } 
   


  }

     
  include '../../methods/send-notification.php';

  insert_notification($conn,$user_id,"admin","true","false","Updated",$notify_title,$notify_descrip,date("F j, Y, g:i a"),"hotels/showsingle_hotelrecord.php?id=".$h_id,"hotel","vendor" );

  getUpdatequery('hotel',$_POST,array('hotel_id'=>$h_id));


  
  echo json_encode($newSuccessMsgArr);
}else{
  echo json_encode($newErrorMsgArr);
  return false;

}





  // echo gettype($_POST['hotel_other'][0]);
/*----------------------------
    Function for dynamic Update Query for Hotels
 ------------------------------*/
    function   getUpdatequery($tableName,$updateObject,$where){

     $whereClauseArray = array();
     $updtevalues      = array();

     if (!empty($_POST['hotel_id'])) {
       # code...
   

      foreach ($updateObject as $key => $value) {
        if($key!='common_image' && $key!='hotel_coverimage' && $key!='common_video'){
        	$updtevalues[] = "$key = '$value'";
        }
        
      }
        //array_push($updtevalues,"user_type='".$updateObject['inforole']."'");    
          //print_r($updtevalues);

       /*Where clause generation*/
       foreach ($where as $key => $value) {	
       			
				$whereClauseArray[]="$key='$value'";
     	}
     	
     	if (count($whereClauseArray)==1) {
       			//$query='SELECT * From '.$tableName.' WHERE '.$slct[0] ;
       			$updatequery= "UPDATE ".$tableName." SET ". implode(',', $updtevalues). " WHERE ".$whereClauseArray[0];
       			// echo $updatequery;
        }else if(count($whereClauseArray) > 1) {
        		$condString='';
				for ($i=0; $i < count($whereClauseArray); $i++) { 
					if ($condString=="") {
					    $condString = $whereClauseArray[$i]." AND ";    
					}else{
					    $condString .= $whereClauseArray[$i]." AND ";
					}
				}
				$condString = substr($condString,0,-4);
				$updatequery= "UPDATE ".$tableName." SET ". implode(',', $updtevalues). " WHERE ".$condString;
        }
       
       
        global $conn;
        $resultup=mysqli_query($conn,$updatequery) or die(mysqli_error($conn));
          // echo"manzar";
         
       
  }



 }

?>