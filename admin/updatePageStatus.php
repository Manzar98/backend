<?php 

include '../common-sql.php';

if ($_POST['btn']=="on") {
	
	$query='UPDATE '.$_POST['tbl_name'].' SET '.$_POST['col_name'].'="'.$_POST['btn'].'" WHERE '.$_POST['id_col'].'="'.$_POST['id'].'" AND user_id="'.$_POST['u_id'].'"';
}else{
   
   $query='UPDATE '.$_POST['tbl_name'].' SET '.$_POST['col_name'].'="'.$_POST['btn'].'" WHERE '.$_POST['id_col'].'="'.$_POST['id'].'" AND user_id="'.$_POST['u_id'].'"';
  
}

 $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
   
   if ($result==1) {
      
      $res_Array=array(
            'status'=>$_POST['btn']

      );

      echo json_encode($res_Array);
   }

?>