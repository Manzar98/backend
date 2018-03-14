<?php
   include '../../common-sql.php';

   // echo  $_GET['hotel_id'] ;
$dataArray=array();
   $imgQuery='SELECT * FROM common_imagevideo WHERE hotel_id="'.$_GET['hotel_id'].'"';

       $result= mysqli_query($conn,$imgQuery)  or die(mysqli_error($conn));

 if (mysqli_num_rows($result)> 0) {


     while ($imgResult=mysqli_fetch_assoc($result)) { 

       // echo $imgResult['common_image'];
        $G_Array=array(
        'common_image'       =>$imgResult['common_image'],
         'common_imgvideo_id' => $imgResult['common_imgvideo_id'],
         'photo_int_ext_type' => $imgResult['photo_int_ext_type']
        );
       array_push($dataArray, $G_Array);
       			
     }
       echo json_encode($dataArray);
 }

?>