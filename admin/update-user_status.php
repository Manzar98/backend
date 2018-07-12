<?php

include '../common-sql.php';
 
session_start();
$admin_id=$_SESSION['user_id'];

/*======To get the user info for notifications========*/
$select='SELECT * FROM credentials WHERE user_id="'.$_POST['u_id'].'"';
$s_Query=mysqli_query($conn,$select) or die(mysqli_error($conn));
$s_Result=mysqli_fetch_assoc($s_Query);


if (isset($_POST['reason'])) {

  $query='UPDATE credentials SET user_status="'.$_POST['btn'].'",
  suspend_reason="'.$_POST['reason'].'" WHERE user_id="'.$_POST['u_id'].'"';
  $u_type="";

  if ($_POST['u_type']=="vendor") {
   $u_type="vendor";
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

   
   $hotel_query=mysqli_query($conn,$hotel) or die(mysqli_error($conn));
   $room_query=mysqli_query($conn,$room) or die(mysqli_error($conn));
   $bnq_query=mysqli_query($conn,$bnq) or die(mysqli_error($conn));
   $conference_query=mysqli_query($conn,$conference) or die(mysqli_error($conn));
   $event_query=mysqli_query($conn,$event) or die(mysqli_error($conn));
   $tour_query=mysqli_query($conn,$tour) or die(mysqli_error($conn));
   include '../methods/send-notification.php';

   insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Account deactivated","Your account has been suspended by the admin.",date("F j, Y, g:i a"),"#", "vendor","vendor","","");

   if ($_SESSION['user_type']=="admin") {

    insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Account deactivated","".$_SESSION['reg_name']." has suspended the ".$u_type." account ".$s_Result['reg_name'].".",date("F j, Y, g:i a"),"veiw_vendors.php?id=".$_POST['u_id']."&u_type=".$u_type, $u_type,"s_admin","","true");
  }

}else if($_POST['u_type']=="blogger"){
 $u_type="blogger";
 $blog='UPDATE blog SET blog_status="'.$_POST['btn'].'",
 blog_sus_reason="'.$_POST['reason'].'" WHERE user_id="'.$_POST['u_id'].'"';

 $blog_query=mysqli_query($conn,$blog) or die(mysqli_error($conn));

 include '../methods/send-notification.php';

 insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Account deactivated","Your account has been suspended by the admin.",date("F j, Y, g:i a"),"#", "blogger","blogger","","");

 if ($_SESSION['user_type']=="admin") {

  insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Account deactivated","".$_SESSION['reg_name']." has suspended the ".$u_type." account ".$s_Result['reg_name'].".",date("F j, Y, g:i a"),"veiw_vendors.php?id=".$_POST['u_id']."&u_type=".$u_type, $u_type,"s_admin","","true");
}

}elseif ($_POST['u_type']=="admin") {

 $u_type="admin";
 $blog='UPDATE credentials SET user_status="'.$_POST['btn'].'",
 suspend_reason="'.$_POST['reason'].'" WHERE user_id="'.$_POST['u_id'].'"';

 $blog_query=mysqli_query($conn,$blog) or die(mysqli_error($conn));

 include '../methods/send-notification.php';

 insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Account deactivated","Your account has been suspended by the admin.",date("F j, Y, g:i a"),"#", "admin","admin","","");

 if ($_SESSION['user_type']=="admin") {

  insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Account deactivated","".$_SESSION['reg_name']." has suspended the ".$u_type." account named ".$s_Result['reg_name'].".",date("F j, Y, g:i a"),"veiwAdmins.php?id=".$_POST['u_id']."&u_type=".$u_type, $u_type,"s_admin","","true");
}
}






}else{
  $query='UPDATE credentials SET user_status="'.$_POST['btn'].'",
  suspend_reason="'.null.'" WHERE user_id="'.$_POST['u_id'].'"';
  if ($_POST['u_type']=="vendor") {
    $u_type="vendor";
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

    $hotel_query=mysqli_query($conn,$hotel) or die(mysqli_error($conn));
    $room_query=mysqli_query($conn,$room) or die(mysqli_error($conn));
    $bnq_query=mysqli_query($conn,$bnq) or die(mysqli_error($conn));
    $conference_query=mysqli_query($conn,$conference) or die(mysqli_error($conn));
    $event_query=mysqli_query($conn,$event) or die(mysqli_error($conn));
    $tour_query=mysqli_query($conn,$tour) or die(mysqli_error($conn));
    

    include '../methods/send-notification.php';

    insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Account activated","Congratulations! Your account has been approved.",date("F j, Y, g:i a"),"db-profile.php?id=".$_POST['u_id'], "vendor","vendor","","");

    if ($_SESSION['user_type']=="admin") {

      insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Account activated","".$_SESSION['reg_name']." has approved the ".$u_type. " account named ".$s_Result['reg_name'].".",date("F j, Y, g:i a"),"veiw_vendors.php?id=".$_POST['u_id']."&u_type=".$u_type, $u_type,"s_admin","","true");
    }

  }else if($_POST['u_type']=="blogger"){

   $u_type="blogger";
   $blog='UPDATE blog SET blog_status="'.$_POST['btn'].'",
   blog_sus_reason="'.null.'" Where user_id="'.$_POST['u_id'].'"';
   $blog_query=mysqli_query($conn,$blog) or die(mysqli_error($conn));

   include '../methods/send-notification.php';
   insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Account activated","Congratulations! Your account has been approved.",date("F j, Y, g:i a"),"edit-blogger.php?id=".$_POST['u_id'], "blogger","blogger","","");

   if ($_SESSION['user_type']=="admin") {

    insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Account activated","".$_SESSION['reg_name']." has approved the ".$u_type. "account named ".$s_Result['reg_name'].".",date("F j, Y, g:i a"),"veiw_vendors.php?id=".$_POST['u_id']."&u_type=".$u_type, $u_type,"s_admin","","true");
  }

}else if($_POST['u_type']=="admin"){

 $u_type="admin";
 $blog='UPDATE credentials SET user_status="'.$_POST['btn'].'",
 suspend_reason="'.null.'" Where user_id="'.$_POST['u_id'].'"';
 $blog_query=mysqli_query($conn,$blog) or die(mysqli_error($conn));

 include '../methods/send-notification.php';
 insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Account activated","Congratulations! Your account has been approved.",date("F j, Y, g:i a"),"edit_admin.php?id=".$_POST['u_id']."&u_type=".$u_type, "admin","admin","","");

 if ($_SESSION['user_type']=="admin") {

  insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Account activated","".$_SESSION['reg_name']." has approved the ".$u_type. " account named ".$s_Result['reg_name'].".",date("F j, Y, g:i a"),"veiwAdmins.php?id=".$_POST['u_id']."&u_type=".$u_type, $u_type,"s_admin","","true");
}
}

}

$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

if ($result==1) {
  
  $res_Array=array(
    'status'=>$_POST['btn']

  );

  echo json_encode($res_Array);
}


?>