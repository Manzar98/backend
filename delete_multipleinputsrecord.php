<?php 
   include 'common-sql.php';

   $tblname=$_POST['tableName'];
   // echo $tblname;
   $id=$_POST['id'];
   // echo $id;
   $column_id_name=$_POST['col_id_name'];
   // echo $column_id_name;

  

  $deleteQuery= 'DELETE FROM '.$tblname.' WHERE '.$column_id_name.'='.$id.'';
  
  // echo $deleteQuery;
   mysqli_query($conn,$deleteQuery) or die(mysqli_error($conn));
 
 $responseArray=array(
    "message" => "success",
      "id" =>  $id
  );

echo json_encode($responseArray);
?>