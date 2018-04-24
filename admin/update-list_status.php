<?php 

include '../common-sql.php';

if (isset($_POST['reason'])) {


	if (isset($_POST['h_id']) && !empty($_POST['h_id'])) {

		$query='UPDATE '.$_POST['tbl_name'].' SET '.$_POST['col_name'].'="'.$_POST['btn'].'",
     '.$_POST['reason_col'].'="'.$_POST['reason'].'" WHERE '.$_POST['h_col'].'="'.$_POST['h_id'].'" AND '.$_POST['id_col'].'='.$_POST['list_id'].'';

          include '../methods/send-notification.php';

          insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Your listing has been suspended","sorry",date("F j, Y, g:i a"),$_POST['l_url']."?id=".$_POST['list_id']."&h_id=".$_POST['h_id'],$_POST['tbl_name'],"vendor");
	}else{
     
	     $query='UPDATE '.$_POST['tbl_name'].' SET '.$_POST['col_name'].'="'.$_POST['btn'].'",
	     '.$_POST['reason_col'].'="'.$_POST['reason'].'" WHERE '.$_POST['u_col'].'="'.$_POST['u_id'].'" AND '.$_POST['id_col'].'='.$_POST['list_id'].'';

		  include '../methods/send-notification.php';

		    insert_notification($conn,$_POST['u_id'],"admin","true","false","Suspended","Your listing has been suspended","sorry",date("F j, Y, g:i a"),$_POST['l_url']."?id=".$_POST['list_id']."&u_id=".$_POST['u_id'],$_POST['tbl_name'],"vendor");

	}

    

}else{

	if (isset($_POST['h_id']) && !empty($_POST['h_id'])) {

		$query='UPDATE '.$_POST['tbl_name'].' SET '.$_POST['col_name'].'="'.$_POST['btn'].'",
     '.$_POST['reason_col'].'="'.null.'" WHERE '.$_POST['h_col'].'="'.$_POST['h_id'].'" AND '.$_POST['id_col'].'='.$_POST['list_id'].'';

          include '../methods/send-notification.php';

          insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Your listing has been approved","Now you can manage your listing",date("F j, Y, g:i a"),$_POST['l_url']."?id=".$_POST['list_id']."&h_id=".$_POST['h_id'],$_POST['tbl_name'],"vendor");
	}else{
     
	     $query='UPDATE '.$_POST['tbl_name'].' SET '.$_POST['col_name'].'="'.$_POST['btn'].'",
	     '.$_POST['reason_col'].'="'.null.'" WHERE '.$_POST['u_col'].'="'.$_POST['u_id'].'" AND '.$_POST['id_col'].'='.$_POST['list_id'].'';

		     include '../methods/send-notification.php';

		    insert_notification($conn,$_POST['u_id'],"admin","true","false","Approved","Your listing has been approved","Now you can manage your listing",date("F j, Y, g:i a"),$_POST['l_url']."?id=".$_POST['list_id']."&u_id=".$_POST['u_id'],$_POST['tbl_name'],"vendor");

	}

     
     


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