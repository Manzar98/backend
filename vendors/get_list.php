<?php
   include '../common-sql.php';

   // echo  $_GET['hotel_id'] ;
$dataArray=array();
   $listQuery="SELECT * FROM ".$_GET['tbl_name']." WHERE user_id=".$_GET['user_id']."";

       $result= mysqli_query($conn,$listQuery)  or die(mysqli_error($conn));

 if (mysqli_num_rows($result)> 0) {


     while ($listResult=mysqli_fetch_assoc($result)) { 

       // echo $imgResult['common_image'];
     	if (isset($listResult['hotel_isair'])) {
     		$G_Array=array(
        'name'       =>$listResult['hotel_name']
         
        );
     	}elseif (isset($listResult['room_id'])) {
     		$G_Array=array(
        'name'       =>$listResult['room_name']
         
        );
     	}elseif (isset($listResult['banquet_space'])) {
     		$G_Array=array(
        'name'       =>$listResult['banquet_name']
         
        );
     	}elseif (isset($listResult['conference_space'])) {
     		$G_Array=array(
        'name'       =>$listResult['conference_name']
         
        );
     	}elseif (isset($listResult['tour_name'])) {
     		$G_Array=array(
        'name'       =>$listResult['tour_name']
         
        );
     	}elseif (isset($listResult['event_name'])) {
     		$G_Array=array(
        'name'       =>$listResult['event_name']
         
        );
     	}

        
       array_push($dataArray, $G_Array);
       			
     }
       echo json_encode($dataArray);
 }

?>