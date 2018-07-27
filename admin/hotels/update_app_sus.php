<?php 

include '../../common-sql.php';
session_start();
/*======To get the user info for notifications========*/
$select='SELECT * FROM credentials WHERE user_id="'.$_POST['u_id'].'"';
$s_Query=mysqli_query($conn,$select) or die(mysqli_error($conn));
$s_Result=mysqli_fetch_assoc($s_Query);

$showmsgQuery='SELECT * FROM action_listing WHERE action_listing_id="'.$_POST['h_id'].'" AND action_taken_by="'.$_SESSION['user_id'].'" AND action_listing_type="hotel"';
$showmsgSql=mysqli_query($conn,$showmsgQuery) or die(mysqli_error($conn));
$showmsgResult=mysqli_fetch_assoc($showmsgSql);
if (count($showmsgResult)< 1) {

 $msgQuery='INSERT INTO action_listing(action_listing_id,action_taken_by,action_time,action_descprition,action_listing_type)VALUES("'.$_POST['h_id'].'","'.$_SESSION['user_id'].'","'.date("F j, Y, g:i a").'","This list '.$_POST['btn'].' by '.$_SESSION['reg_name'].' on '.date("F j, Y, g:i a").'","hotel")';

}else{
  $msgQuery='UPDATE action_listing SET 
  action_taken_by="'.$_SESSION['user_id'].'",
  action_time="'.date("F j, Y, g:i a").'",
  action_descprition="This list '.$_POST['btn'].' by '.$_SESSION['reg_name'].' on '.date("F j, Y, g:i a").'"
  WHERE action_listing_id="'.$_POST['h_id'].'" AND action_listing_type="hotel" ';
}
$msgRes=mysqli_query($conn,$msgQuery) or die(mysqli_error($conn));

if (isset($_POST['reason'])) {
	
	$hotel='UPDATE hotel SET hotel_status="'.$_POST['btn'].'",
  hotel_sus_reason="'.$_POST['reason'].'" Where hotel_id="'.$_POST['h_id'].'" AND user_id="'.$_POST['u_id'].'"';
  
  $room='UPDATE room SET room_status="'.$_POST['btn'].'",
  room_sus_reason="'.$_POST['reason'].'" Where hotel_id="'.$_POST['h_id'].'"';

  $bnq='UPDATE banquet SET banquet_status="'.$_POST['btn'].'",
  banquet_sus_reason="'.$_POST['reason'].'" Where hotel_id="'.$_POST['h_id'].'"';

  $conference='UPDATE conference SET conference_status="'.$_POST['btn'].'",
  conference_sus_reason="'.$_POST['reason'].'" Where hotel_id="'.$_POST['h_id'].'"';

  $event='UPDATE event SET event_status="'.$_POST['btn'].'",
  event_sus_reason="'.$_POST['reason'].'" Where hotel_id="'.$_POST['h_id'].'"';

  $tour='UPDATE tour SET tour_status="'.$_POST['btn'].'",
  tour_sus_reason="'.$_POST['reason'].'" Where hotel_id="'.$_POST['h_id'].'"';
  
  include '../../methods/send-notification.php';

  insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Listing Suspended","".$_POST['list_name']." has been suspended",date("F j, Y, g:i a"),"hotels/showsingle_hotelrecord.php?id=".$_POST['h_id']."","hotel","vendor","","");
}else{

  $hotel='UPDATE hotel SET hotel_status="'.$_POST['btn'].'",
  hotel_sus_reason="'.null.'" Where hotel_id="'.$_POST['h_id'].'" AND user_id="'.$_POST['u_id'].'"';
  
  $room='UPDATE room SET room_status="'.$_POST['btn'].'",
  room_sus_reason="'.null.'" Where hotel_id="'.$_POST['h_id'].'"';

  $bnq='UPDATE banquet SET banquet_status="'.$_POST['btn'].'",
  banquet_sus_reason="'.null.'" Where hotel_id="'.$_POST['h_id'].'"';

  $conference='UPDATE conference SET conference_status="'.$_POST['btn'].'",
  conference_sus_reason="'.null.'" Where hotel_id="'.$_POST['h_id'].'"';

  $event='UPDATE event SET event_status="'.$_POST['btn'].'",
  event_sus_reason="'.null.'" Where hotel_id="'.$_POST['h_id'].'"';

  $tour='UPDATE tour SET tour_status="'.$_POST['btn'].'",
  tour_sus_reason="'.null.'" Where hotel_id="'.$_POST['h_id'].'"';

  include '../../methods/send-notification.php';

  insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Listing Approved","You can manage ".$_POST['list_name']." now",date("F j, Y, g:i a"),"hotels/showsingle_hotelrecord.php?id=".$_POST['h_id']."","hotel","vendor","","");




}

$hotel_query=mysqli_query($conn,$hotel) or die(mysqli_error($conn));
$room_query=mysqli_query($conn,$room) or die(mysqli_error($conn));
$bnq_query=mysqli_query($conn,$bnq) or die(mysqli_error($conn));
$conference_query=mysqli_query($conn,$conference) or die(mysqli_error($conn));
$event_query=mysqli_query($conn,$event) or die(mysqli_error($conn));
$tour_query=mysqli_query($conn,$tour) or die(mysqli_error($conn));

if ($_SESSION['user_type']=="admin") {

  insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Listing Suspended","".$_SESSION['reg_name']." has suspended the vendor record named ".$_POST['list_name'],date("F j, Y, g:i a"),"hotels/showsingle_hotelrecord.php?id=".$_POST['h_id']."&status=".$s_Result['user_status']."&name=".$s_Result['reg_name']."&user_id=".$_POST['u_id'],"hotel","s_admin","","true");
}
if ($hotel_query==1) {

  $res_Array=array(
    'status'=>$_POST['btn']

  );

  echo json_encode($res_Array);
}

?>