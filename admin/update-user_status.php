<?php

  include '../common-sql.php';

  session_start();

  $admin_id=$_SESSION['user_id'];

if (isset($_POST['reason'])) {

     $query='UPDATE credentials SET user_status="'.$_POST['btn'].'",
     suspend_reason="'.$_POST['reason'].'" WHERE user_id="'.$_POST['u_id'].'"';

     $hotel='UPDATE hotel SET hotel_status="'.$_POST['btn'].'",
     hotel_sus_reason="'.$_POST['reason'].'" Where user_id="'.$_POST['u_id'].'"';
    
    $room='UPDATE room SET room_status="'.$_POST['btn'].'",
    room_sus_reason="'.$_POST['reason'].'" Where user_id="'.$_POST['u_id'].'"';

    $bnq='UPDATE banquet SET banquet_status="'.$_POST['btn'].'",
    banquet_sus_reason="'.$_POST['reason'].'" Where user_id="'.$_POST['u_id'].'"';

    $conference='UPDATE conference SET conference_status="'.$_POST['btn'].'",
    conference_sus_reason="'.$_POST['reason'].'" Where user_id="'.$_POST['u_id'].'"';

    $event='UPDATE event SET event_status="'.$_POST['btn'].'",
    event_sus_reason="'.$_POST['reason'].'" Where user_id="'.$_POST['u_id'].'"';

    $tour='UPDATE tour SET tour_status="'.$_POST['btn'].'",
    tour_sus_reason="'.$_POST['reason'].'" Where user_id="'.$_POST['u_id'].'"';
    
     include '../methods/send-notification.php';

     insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Your account has been suspended","Sorry ",date("F j, Y, g:i a"),"#", "vendor","vendor");

}else{

    $query='UPDATE credentials SET user_status="'.$_POST['btn'].'",
    suspend_reason="'.null.'" WHERE user_id="'.$_POST['u_id'].'"';

    $hotel='UPDATE hotel SET hotel_status="'.$_POST['btn'].'",
    hotel_sus_reason="'.null.'" Where user_id="'.$_POST['u_id'].'"';
    
    $room='UPDATE room SET room_status="'.$_POST['btn'].'",
    room_sus_reason="'.null.'" Where user_id="'.$_POST['u_id'].'"';

    $bnq='UPDATE banquet SET banquet_status="'.$_POST['btn'].'",
    banquet_sus_reason="'.null.'" Where user_id="'.$_POST['u_id'].'"';

    $conference='UPDATE conference SET conference_status="'.$_POST['btn'].'",
    conference_sus_reason="'.null.'" Where user_id="'.$_POST['u_id'].'"';

    $event='UPDATE event SET event_status="'.$_POST['btn'].'",
    event_sus_reason="'.null.'" Where user_id="'.$_POST['u_id'].'"';

    $tour='UPDATE tour SET tour_status="'.$_POST['btn'].'",
    tour_sus_reason="'.null.'" Where user_id="'.$_POST['u_id'].'"';
    

     include '../methods/send-notification.php';

     insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Your registration has been approved","Now you can manage your account",date("F j, Y, g:i a"),"db-profile.php?id=".$_POST['u_id'], "vendor","vendor");
     


}
 
// echo $query;

  $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
  $hotel_query=mysqli_query($conn,$hotel) or die(mysqli_error($conn));
  $room_query=mysqli_query($conn,$room) or die(mysqli_error($conn));
  $bnq_query=mysqli_query($conn,$bnq) or die(mysqli_error($conn));
  $conference_query=mysqli_query($conn,$conference) or die(mysqli_error($conn));
  $event_query=mysqli_query($conn,$event) or die(mysqli_error($conn));
  $tour_query=mysqli_query($conn,$tour) or die(mysqli_error($conn));
   
   if ($result==1) {
      
      $res_Array=array(
            'status'=>$_POST['btn']

      );

      echo json_encode($res_Array);
   }


?>