<?php

include '../common-sql.php';

session_start();
$admin_id=$_SESSION['user_id'];
$realtimeResult="";
/*======To get the user info for notifications========*/
$select='SELECT * FROM credentials WHERE user_id="'.$_POST['u_id'].'"';
$s_Query=mysqli_query($conn,$select) or die(mysqli_error($conn));
$s_Result=mysqli_fetch_assoc($s_Query);

$showmsgQuery='SELECT * FROM action_listing WHERE action_listing_id="'.$_POST['u_id'].'" AND action_taken_by="'.$_SESSION['user_id'].'" AND action_listing_type="credentials"';
$showmsgSql=mysqli_query($conn,$showmsgQuery) or die(mysqli_error($conn));
$showmsgResult=mysqli_fetch_assoc($showmsgSql);
if (count($showmsgResult)< 1) {

 $msgQuery='INSERT INTO action_listing(action_listing_id,action_taken_by,action_time,action_descprition,action_listing_type)VALUES("'.$_POST['u_id'].'","'.$_SESSION['user_id'].'","'.date("F j, Y, g:i a").'","This '.$_POST['u_type'].' '.$_POST['btn'].' by '.$_SESSION['reg_name'].' on '.date("F j, Y, g:i a").'","credentials")';
 if ($conn->query($msgQuery)== TRUE) {
    # code...
   $action_id =$conn->insert_id;
 }


}else{
  
  $msgQuery='UPDATE action_listing SET 
  action_taken_by="'.$_SESSION['user_id'].'",
  action_time="'.date("F j, Y, g:i a").'",
  action_descprition="This '.$_POST['u_type'].' '.$_POST['btn'].' by '.$_SESSION['reg_name'].' on '.date("F j, Y, g:i a").'"
  WHERE action_listing_id="'.$_POST['u_id'].'" AND action_listing_type="credentials"';
  $msgRes=mysqli_query($conn,$msgQuery) or die(mysqli_error($conn));

  $realtimeQuery='SELECT * FROM action_listing WHERE action_listing_id="'.$_POST['u_id'].'"';
  $realtimeSql=mysqli_query($conn,$realtimeQuery) or die(mysqli_error($conn));
  $realtimeResult=mysqli_fetch_assoc($realtimeSql);
}

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
  
  if (isset($action_id) && $action_id > 0) {

    $res_Array=array(
      'status'=>$_POST['btn'],
      'description'=>null,
      'action_id' => $action_id

    );
  }else{

   $res_Array=array(
    'status'=>$_POST['btn'],
    'description'=>$realtimeResult['action_descprition']

  );
 }
 

 echo json_encode($res_Array);
}


?>