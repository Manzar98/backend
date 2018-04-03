<?php

  include '../common-sql.php';

  session_start();

  $admin_id=$_SESSION['user_id'];

if (isset($_POST['reason'])) {

     $query='UPDATE credentials SET user_status="'.$_POST['btn'].'",
     suspend_reason="'.$_POST['reason'].'" WHERE user_id="'.$_POST['u_id'].'"';

     include '../methods/send-notification.php';

     insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Your account has been suspended","Sorry ",date("F j, Y, g:i a"),"#", "vendor","vendor");

}else{

$query='UPDATE credentials SET user_status="'.$_POST['btn'].'",
     suspend_reason="'.null.'" WHERE user_id="'.$_POST['u_id'].'"';

     include '../methods/send-notification.php';

     insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Your registration has been approved","Now you can manage your account",date("F j, Y, g:i a"),"db-profile.php?id=".$_POST['u_id'], "vendor","vendor");
     


}
 
// echo $query;

  $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
   
   if ($result==1) {
      
      $res_Array=array(
            'status'=>$_POST['btn']

      );

      echo json_encode($res_Array);
   }


?>