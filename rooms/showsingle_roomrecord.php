<?php
 include '../common-apis/api.php';

 
 $showRoomQuery=select('room',array('hotel_id'=>$_GET['h_id'],'room_id'=>$_GET['id']));

 

 	// print_r($hotelResult);
 	# code...
 


 



?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>

     <?php  while ($RoomResult=mysqli_fetch_assoc($showRoomQuery)) {     

$showRoomImgQuery=select('common_imagevideo',array('room_id'=>$RoomResult['room_id']));

$showRoomDateQuery=select('common_bookdates',array('room_id'=>$RoomResult['room_id']));


        ?>

     

	<title>Detail of <?php echo $RoomResult['room_name']; ?> </title>


<?php include '../header.php'; ?>


<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
                      <div class="row">
						<div class="db-title col-md-8">
							<h3><img src="../images/icon/dbc5.png" alt=""/> Detail of <?php echo $RoomResult['room_name']; ?> </h3>
							<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
						</div>
                        <div class="pull-right">
                            <a class="waves-effect waves-light btn" href="edit_room.php?id=<?php echo $RoomResult['room_id'];  ?>&h_id=<?php echo  $RoomResult['hotel_id']  ?>">Edit</a>
                        </div>
                      </div>
						 
                         <div class="hotelVeiw">
                            
                             <div class="row">
                             	<span><b>Hotel Name :</b></span>
                             	<span><?php echo $RoomResult['hotel_name']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Room Name :</b></span>
                             	<span><?php echo $RoomResult['room_name']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Number Of Rooms:</b></span>
                             	<span><?php echo $RoomResult['room_nosroom']."."; ?></span>
                             </div>
                              <div class="row">
                                <span><b>Room service :</b></span>
                                <span><?php echo $RoomResult['room_service']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Maximum adults allowed in one room :</b></span>
                             	<span><?php echo $RoomResult['room_maxadult']."."; ?></span>
                             </div>
                            
                             <div class="row">
                             	<span><b>Extra mattress charges for adults :</b></span>
                             	<span><?php echo $RoomResult['room_matadult']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Maximum children allowed in one room :</b></span>
                             	<span><?php echo $RoomResult['room_maxchild']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Extra mattress charges for Children :</b></span>
                             	<span><?php echo $RoomResult['room_matchild']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Room Charges per night :</b></span>
                             	<span><?php echo $RoomResult['room_perni8']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Room Description :</b></span>
                             	<span><?php echo $RoomResult['room_descrip']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Amenities :</b></span>
                             	<span><?php echo $RoomResult['room_other']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Offer Discount (%) :</b></span>
                             	<span><?php echo $RoomResult['room_offerdiscount']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Expires on :</b></span>
                             	<span><?php echo $RoomResult['room_expireoffer']."."; ?></span>
                             </div>

                             <div class="row">
                                 <span><b>Unavailable in these days :</b></span>

                             </div>
                             <div class="row">
                                <div class="col-md-3">
                                 <span><b>From :</b></span>
                                </div>
                                <div class="col-md-3">
                                    <span><b>To :</b></span>
                                </div>
                             </div>
                             

                                <?php  while ($dateResult=mysqli_fetch_assoc($showRoomDateQuery)) { ?>
                                    
                               <div class="row">
                                 <div class="col-md-3">
                                    <span><?php  echo $dateResult['book_fromdate'];  ?></span>
                                 </div>
                                <div class="col-md-3">
                                    <span><?php  echo $dateResult['book_todate'];  ?></span>
                                </div>
                               </div>
                                <?php }   ?>
                             
                             
                       <?php } ?>

				</div>
              
					</div>
                           <div class="row" style="padding-left: 15px;">
                               <span><b>Room Images :</b></span>
                           </div>
                            <div class="imgVeiwinline row" id="hotel_img_wrap" style="padding-left: 15px;">

                            <?php
                            
                            while ($imgResult=mysqli_fetch_assoc($showRoomImgQuery)) {

                             
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