<?php 

include '../common-sql.php';
session_start();
$realtimeResult="";
/*======To get the user info for notifications========*/
$select='SELECT * FROM credentials WHERE user_id="'.$_POST['u_id'].'"';
$s_Query=mysqli_query($conn,$select) or die(mysqli_error($conn));
$s_Result=mysqli_fetch_assoc($s_Query);

$showmsgQuery='SELECT * FROM action_listing WHERE action_listing_id="'.$_POST['list_id'].'" AND action_taken_by="'.$_SESSION['user_id'].'" AND action_listing_type="'.$_POST['tbl_name'].'"';
$showmsgSql=mysqli_query($conn,$showmsgQuery) or die(mysqli_error($conn));
$showmsgResult=mysqli_fetch_assoc($showmsgSql);

if (count($showmsgResult)< 1) {
 $msgQuery='INSERT INTO action_listing(action_listing_id,action_taken_by,action_time,action_descprition,action_listing_type)VALUES("'.$_POST['list_id'].'","'.$_SESSION['user_id'].'","'.date("F j, Y, g:i a").'","This list '.$_POST['btn'].' by '.$_SESSION['reg_name'].' on '.date("F j, Y, g:i a").'","'.$_POST['tbl_name'].'")';

 if ($conn->query($msgQuery)== TRUE) {
    # code...
     $action_id =$conn->insert_id;
   }

}else{

  $msgQuery='UPDATE action_listing SET 
  action_taken_by="'.$_SESSION['user_id'].'",
  action_time="'.date("F j, Y, g:i a").'",
  action_descprition="This list '.$_POST['btn'].' by '.$_SESSION['reg_name'].' on '.date("F j, Y, g:i a").'"
  WHERE action_listing_id="'.$_POST['list_id'].'" AND action_listing_type="'.$_POST['tbl_name'].'"';

  $msgRes=mysqli_query($conn,$msgQuery) or die(mysqli_error($conn));

      $realtimeQuery='SELECT * FROM action_listing WHERE action_listing_id="'.$_POST['list_id'].'"';
     $realtimeSql=mysqli_query($conn,$realtimeQuery) or die(mysqli_error($conn));
    $realtimeResult=mysqli_fetch_assoc($realtimeSql);
 
}

if (isset($_POST['reason'])) {


	if (isset($_POST['h_id']) && !empty($_POST['h_id'])) {

		$query='UPDATE '.$_POST['tbl_name'].' SET '.$_POST['col_name'].'="'.$_POST['btn'].'",
   '.$_POST['reason_col'].'="'.$_POST['reason'].'" WHERE '.$_POST['h_col'].'="'.$_POST['h_id'].'" AND '.$_POST['id_col'].'='.$_POST['list_id'].'';

   include '../methods/send-notification.php';

   insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Listing Suspended","".$_POST['list_name']." has been suspended",date("F j, Y, g:i a"),$_POST['l_url']."?id=".$_POST['list_id']."&h_id=".$_POST['h_id'],$_POST['tbl_name'],"vendor","","");


   if ($_SESSION['user_type']=="admin") {

    insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Listing Suspended","".$_SESSION['reg_name']." has suspended the vendor record named ".$_POST['list_name'],date("F j, Y, g:i a"),$_POST['l_url']."?id=".$_POST['list_id']."&h_id=".$_POST['h_id']."&status=".$s_Result['user_status']."&name=".$s_Result['reg_name']."&user_id=".$_POST['u_id'],$_POST['tbl_name'],"s_admin","","true");
  }
}else{

  $query='UPDATE '.$_POST['tbl_name'].' SET '.$_POST['col_name'].'="'.$_POST['btn'].'",
  '.$_POST['reason_col'].'="'.$_POST['reason'].'" WHERE '.$_POST['u_col'].'="'.$_POST['u_id'].'" AND '.$_POST['id_col'].'='.$_POST['list_id'].'';

  if ($_POST['tbl_name']=="blog") {
   $type="blogger";
 }else{
   $type="vendor";
 }
 include '../methods/send-notification.php';

 insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Listing Suspended","".$_POST['list_name']." has been suspended",date("F j, Y, g:i a"),$_POST['l_url']."?id=".$_POST['list_id']."&u_id=".$_POST['u_id'],$_POST['tbl_name'],$type,"","");

 if ($_SESSION['user_type']=="admin") {

  insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Listing Suspended","".$_SESSION['reg_name']." has suspended the ".$type." record named ".$_POST['list_name'],date("F j, Y, g:i a"),$_POST['l_url']."?id=".$_POST['list_id']."&u_id=".$_POST['u_id']."&status=".$s_Result['user_status']."&name=".$s_Result['reg_name']."&user_id=".$_POST['u_id'],$_POST['tbl_name'],"s_admin","","true");
}

}




}else{

	if (isset($_POST['h_id']) && !empty($_POST['h_id'])) {

		$query='UPDATE '.$_POST['tbl_name'].' SET '.$_POST['col_name'].'="'.$_POST['btn'].'",
   '.$_POST['reason_col'].'="'.null.'" WHERE '.$_POST['h_col'].'="'.$_POST['h_id'].'" AND '.$_POST['id_col'].'='.$_POST['list_id'].'';

   include '../methods/send-notification.php';

   insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Listing Approved","You can manage ".$_POST['list_name']." now",date("F j, Y, g:i a"),$_POST['l_url']."?id=".$_POST['list_id']."&h_id=".$_POST['h_id'],$_POST['tbl_name'],"vendor","","");

   if ($_SESSION['user_type']=="admin") {

    insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Listing Approved","".$_SESSION['reg_name']." has approved the vendor record named ".$_POST['list_name'],date("F j, Y, g:i a"),$_POST['l_url']."?id=".$_POST['list_id']."&h_id=".$_POST['h_id']."&status=".$s_Result['user_status']."&name=".$s_Result['reg_name']."&user_id=".$_POST['u_id'],$_POST['tbl_name'],"s_admin","","true");
  }


}else{

  $query='UPDATE '.$_POST['tbl_name'].' SET '.$_POST['col_name'].'="'.$_POST['btn'].'",
  '.$_POST['reason_col'].'="'.null.'" WHERE '.$_POST['u_col'].'="'.$_POST['u_id'].'" AND '.$_POST['id_col'].'='.$_POST['list_id'].'';

  if ($_POST['tbl_name']=="blog") {
   $type="blogger";
 }else{
   $type="vendor";
 }
 include '../methods/send-notification.php';

 insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Listing Approved","You can manage ".$_POST['list_name']." now",date("F j, Y, g:i a"),$_POST['l_url']."?id=".$_POST['list_id']."&u_id=".$_POST['u_id'],$_POST['tbl_name'],$type,"","");

 if ($_SESSION['user_type']=="admin") {

  insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Listing Approved","".$_SESSION['reg_name']." has approved the ".$type." record named ".$_POST['list_name'],date("F j, Y, g:i a"),$_POST['l_url']."?id=".$_POST['list_id']."&u_id=".$_POST['u_id']."&status=".$s_Result['user_status']."&name=".$s_Result['reg_name']."&user_id=".$_POST['u_id'],$_POST['tbl_name'],"s_admin","","true");
}

}

}

// echo $query;

$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

if ($result==1) {

if (isset($action_id) && $action_id > 0) {

   $res_Array=array(
    'status'=>$_POST['btn'],
    'description'=>null,
    'action_id'=> $action_id

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