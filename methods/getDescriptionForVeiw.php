<?php
 include '../common-sql.php';

 $realtimeQuery='SELECT * FROM action_listing WHERE action_id="'.$_POST['id'].'"';
    $realtimeSql=mysqli_query($conn,$realtimeQuery) or die(mysqli_error($conn));
    $realtimeResult=mysqli_fetch_assoc($realtimeSql);
  
  echo $realtimeResult['action_descprition'];

?>