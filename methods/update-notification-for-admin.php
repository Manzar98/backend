<?php

include '../common-sql.php';

$updateQuery= 'UPDATE  notifications SET noti_shown="false",

noti_read="true",noti_shown_byadmin="false" WHERE noti_id="'.$_POST['id'].'"';

$result=mysqli_query($conn,$updateQuery) or die(mysqli_error($conn));

if ($result==1) {
	
	echo "success";

}else{

	echo "error";
}



?>