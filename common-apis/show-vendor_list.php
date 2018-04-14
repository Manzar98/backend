<?php 

 include '../common-sql.php';

 $query= 'SELECT * FROM credentials where user_type="vendor" ORDER BY user_id DESC LIMIT 10';

 $vendor_resp =mysqli_query($conn,$query)  or die(mysqli_error($conn));




?>