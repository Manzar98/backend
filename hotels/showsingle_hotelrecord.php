<?php
 include '../common-apis/api.php';
 
 $showHotelQuery=select('hotel',array('hotel_id'=>46));

 

 	// print_r($hotelResult);
 	# code...
 


 $showHotelImgQuery=select('common_imagevideo',array('hotel_id'=>46));

 // while ($imgResult=mysqli_fetch_assoc($editHotelImgQuery)) {
 // 	// print_r($imgResult);
 // 	$emptyArray[] = $imgResult;

 	
 // 	# code...
 // }

// echo "<br>".$emptyArray[0]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[1]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[2]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[3]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[4]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[5]['common_imgvideo_id']."<br>" ;
  // print_r($emptyArray);
print_r(array_column($emptyArray, 'common_imgvideo_id'));

 // while ($emptyArray > 1) {

 // 	echo $emptyArray['common_imgvideo_id'];
 // 	# code...
 // }


?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>

     <?php  while ($hotelResult=mysqli_fetch_assoc($showHotelQuery)) {     ?>
	<title>Detail of <?php echo $hotelResult['hotel_name']; ?> </title>


<?php include '../header.php'; ?>


<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
                      <div class="row">
						<div class="db-title col-md-8">
							<h3><img src="../images/icon/dbc5.png" alt=""/> Detail of <?php echo $hotelResult['hotel_name']; ?> </h3>
							<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
						</div>
                        <div class="pull-right">
                            <a class="waves-effect waves-light btn" href="edit_hotel.php">Edit</a>
                        </div>
                      </div>
						 
                         <div class="hotelVeiw">
                            
                             <div class="row">
                             	<span><b>Hotel Name :</b></span>
                             	<span><?php echo $hotelResult['hotel_name']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Address Line 1 :</b></span>
                             	<span><?php echo $hotelResult['hotel_addres1']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Address Line 2:</b></span>
                             	<span><?php echo $hotelResult['hotel_addres2']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>City :</b></span>
                             	<span><?php echo $hotelResult['hotel_city']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Province :</b></span>
                             	<span><?php echo $hotelResult['hotel_province']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Phone Number :</b></span>
                             	<span><?php echo $hotelResult['hotel_phone']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Fax Number :</b></span>
                             	<span><?php echo $hotelResult['hotel_fax']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Email Address :</b></span>
                             	<span><?php echo $hotelResult['hotel_email']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Website :</b></span>
                             	<span><?php echo $hotelResult['hotel_web']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Check In :</b></span>
                             	<span><?php echo $hotelResult['hotel_checkin']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Check Out :</b></span>
                             	<span><?php echo $hotelResult['hotel_checkout']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel Description :</b></span>
                             	<span><?php echo $hotelResult['hotel_descrp']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel Pickup? :</b></span>
                             	<span><?php echo $hotelResult['hotel_pickup']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Pickup Charges :</b></span>
                             	<span><?php echo $hotelResult['hotel_pikcharge']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Amenities :</b></span>
                             	<span><?php echo $hotelResult['hotel_other']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel booking cancellation Policy  :</b></span>
                             	<span><?php echo $hotelResult['hotel_policy']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel’s Facebook :</b></span>
                             	<span><?php echo $hotelResult['hotel_fburl']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel’s Twitter :</b></span>
                             	<span><?php echo $hotelResult['hotel_twurl']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel’s Google Plus :</b></span>
                             	<span><?php echo $hotelResult['hotel_gourl']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel’s Instagram :</b></span>
                             	<span><?php echo $hotelResult['hotel_insurl']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel’s Pinterest :</b></span>
                             	<span><?php echo $hotelResult['hotel_pinurl']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel’s Youtube :</b></span>
                             	<span><?php echo $hotelResult['hotel_yuturl']."."; ?></span>
                             </div>
                       <?php } ?>

				</div>
              
					</div>
                           <div class="row" style="padding-left: 15px;">
                               <span><b>Hotel Images :</b></span>
                           </div>
                            <div class="imgVeiwinline row" id="hotel_img_wrap" style="padding-left: 15px;">

                            <?php
                            
                            while ($imgResult=mysqli_fetch_assoc($showHotelImgQuery)) {

                             
                                if (!empty($imgResult['common_image'])) {?>
                                    <div class="imgeWrap">
                                    <a class="deletIMG" onclick="deletIMG(event)"  data-value="<?php echo $imgResult['common_imgvideo_id']?>" data-img="<?php echo $imgResult['common_image'] ?>" ><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <img src="../<?php echo $imgResult['common_image']  ?>" width="150" class="materialboxed">
                                    </div>&nbsp;&nbsp;
                                    
                                   
                                <?php } ?>

                               
                              

                        <?php   }

                            ?>
                        </div>
					
				</div>
			</div>

		



		   <?php  include"../footer.php";  ?>




	

	
</body>

  
  

<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>