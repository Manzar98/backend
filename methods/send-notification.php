<?php 
 // include '../../common-sql.php';


function insert_notification($conn,$userid,$usertype,$shown,$read,$action,$title,$desc,$time,$url,$type,$noti_generate_for,$noti_to_show){


$query='INSERT INTO notifications(user_id,user_type,noti_shown,noti_read,noti_action,noti_title,noti_desc,noti_time,noti_url,noti_type,noti_generate_for,noti_to_show)VALUES("'.$userid.'","'.$usertype.'","'.$shown.'","'.$read.'","'.$action.'","'.$title.'","'.$desc.'","'.$time.'","'.$url.'","'.$type.'","'.$noti_generate_for.'","'.$noti_to_show.'")';

$result_query=mysqli_query($conn,$query) or die(mysqli_error($conn));


if($result_query==1){

return "success";

}






}



?>