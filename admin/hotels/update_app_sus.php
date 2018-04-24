<?php 

  include '../../common-sql.php';

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

          insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Your listing has been suspended","sorry",date("F j, Y, g:i a"),"hotels/showsingle_hotelrecord.php?id=".$_POST['h_id']."","hotel","vendor");
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

          insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Your listing has been approved","Now you can manage your listing",date("F j, Y, g:i a"),"hotels/showsingle_hotelrecord.php?id=".$_POST['h_id']."","hotel","vendor");

}

$hotel_query=mysqli_query($conn,$hotel) or die(mysqli_error($conn));
$room_query=mysqli_query($conn,$room) or die(mysqli_error($conn));
$bnq_query=mysqli_query($conn,$bnq) or die(mysqli_error($conn));
$conference_query=mysqli_query($conn,$conference) or die(mysqli_error($conn));
$event_query=mysqli_query($conn,$event) or die(mysqli_error($conn));
$tour_query=mysqli_query($conn,$tour) or die(mysqli_error($conn));
if ($hotel_query==1) {
      
      $res_Array=array(
            'status'=>$_POST['btn']

      );

      echo json_encode($res_Array);
   }

?>