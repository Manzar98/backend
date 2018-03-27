<?php 

include '../common-sql.php';
      $dataArray=array();
    
    if (isset($_GET['gen_for'])=="admin") {

       $noti_Query='SELECT `notifications`.*, `credentials`.`reg_name`, `credentials`.`reg_lstname`, `credentials`.`reg_city`, `credentials`.`reg_photo` FROM `credentials` LEFT JOIN `notifications` ON `notifications`.`user_id` = `credentials`.`user_id` WHERE `notifications`.`noti_shown`= "true" AND `notifications`.`noti_read`= "false" AND `notifications`.`noti_generate_for`="admin" ORDER BY noti_id DESC';
    }



      // if(isset($_GET['id'])){
      //    $noti_Query='SELECT `notifications`.*, `credentials`.`reg_name`, `credentials`.`reg_lstname`, `credentials`.`reg_city`, `credentials`.`reg_photo` FROM `credentials` LEFT JOIN `notifications` ON `notifications`.`user_id` = `credentials`.`user_id` WHERE `notifications`.`noti_shown`= "true" AND `notifications`.`noti_read`= "false" AND `credentials`.`user_id`="'.$_GET['id'].'" ORDER BY noti_id DESC';
      // }else{
        
      // }
   
    // echo $noti_Query;

    $noti_sqli=mysqli_query($conn,$noti_Query) or die(mysqli_error($conn));

   $count=mysqli_num_rows($noti_sqli);

  if ($count> 0) {
  	# code...
    while ($result=mysqli_fetch_assoc($noti_sqli)) {
    	  // print_r($result);
           $Array_obj=array(

                  "notify_id"=> $result['noti_id'],
                  "userid"   => $result['user_id'],
                  "name"     => $result['reg_name'],
                  "photo"    => $result['reg_photo'],
                  "usertype" => $result['user_type'],
                  "shown"    => $result['noti_shown'],
                  "read"     => $result['noti_read'],
                  "action"   => $result['noti_action'],
                  "title"    => $result['noti_title'],
                  "desc"     => $result['noti_desc'],
                  "time"     => $result['noti_time'],
                  "url"      => $result['noti_url'],
                  "formtype" => $result['noti_type'],
                  "gen_for"=> $result['noti_generate_for'],
                  "count"    => $count
                 

           );
       array_push($dataArray, $Array_obj);
     }
     
     echo json_encode($dataArray);
   
  }  