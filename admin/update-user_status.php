<?php

  include '../common-sql.php';
$query='UPDATE credentials SET user_status="'.$_POST['btn'].'" WHERE user_id="'.$_POST['u_id'].'"';


 
// echo $query;

  $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
   
   if ($result==1) {
      
      $res_Array=array(
            'status'=>$_POST['btn']

      );

      echo json_encode($res_Array);
   }

?>