<?php 

include '../../common-sql.php';

if ($_POST['btn']=="on") {
	
	$query='UPDATE pages SET page_inactive="'.$_POST['btn'].'" WHERE page_id="'.$_POST['p_id'].'" AND user_id="'.$_POST['u_id'].'"';
}else{
   
   $query='UPDATE pages SET page_inactive="'.$_POST['btn'].'" WHERE page_id="'.$_POST['p_id'].'" AND user_id="'.$_POST['u_id'].'"';
  
}

 $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
   
   if ($result==1) {
      
      $res_Array=array(
            'status'=>$_POST['btn']

      );

      echo json_encode($res_Array);
   }

?>