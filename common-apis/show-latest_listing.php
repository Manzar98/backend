<?php 

 include '../common-sql.php';

 $query_h= 'SELECT * FROM credentials where user_type="vendor" ORDER BY user_id DESC LIMIT 10';
 $list_resp_h =mysqli_query($conn,$query_h)  or die(mysqli_error($conn));


$query_r= 'SELECT * FROM credentials where user_type="vendor" ORDER BY user_id DESC LIMIT 10';
 $list_resp_r =mysqli_query($conn,$query_r)  or die(mysqli_error($conn));



 $query_b= 'SELECT * FROM credentials where user_type="vendor" ORDER BY user_id DESC LIMIT 10';
 $list_resp_b =mysqli_query($conn,$query_b)  or die(mysqli_error($conn));


 $query_c= 'SELECT * FROM credentials where user_type="vendor" ORDER BY user_id DESC LIMIT 10';
 $list_resp_c =mysqli_query($conn,$query_c)  or die(mysqli_error($conn));


 $query_t= 'SELECT * FROM credentials where user_type="vendor" ORDER BY user_id DESC LIMIT 10';
 $list_resp_t =mysqli_query($conn,$query_t)  or die(mysqli_error($conn));



 $query_e= 'SELECT * FROM credentials where user_type="vendor" ORDER BY user_id DESC LIMIT 10';
 $list_resp_e =mysqli_query($conn,$query_e)  or die(mysqli_error($conn));

?>
