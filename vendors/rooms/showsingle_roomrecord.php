<?php
 include '../../common-apis/reg-api.php';

 
 $showRoomQuery=select('room',array('hotel_id'=>$_GET['h_id'],'room_id'=>$_GET['id']));

 

 	// print_r($hotelResult);
 	# code...
 


 



?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
<script src="../../js/jquery.min.js"></script>
     <?php  while ($RoomResult=mysqli_fetch_assoc($showRoomQuery)) {     

$showRoomImgQuery=select('common_imagevideo',array('room_id'=>$RoomResult['room_id']));

$showRoomDateQuery=select('common_bookdates',array('room_id'=>$RoomResult['room_id']));


        ?>

     

	<title>Detail of <?php echo $RoomResult['room_name']; ?> </title>


<?php include '../header.php'; ?>


				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
                      <div class="row">
						
                        <div class="pull-right">
                            <a class="waves-effect waves-light btn" href="edit_room.php?id=<?php echo $RoomResult['room_id'];  ?>&h_id=<?php echo  $RoomResult['hotel_id']  ?>">Edit</a>
                        </div>
                      </div>
                    <div class="db-profile"> 

                             <img src="" id="cover_photo_common" alt="">
                            <h4><?php echo $RoomResult['room_name'];  ?> </h4>
                            <p><?php echo $RoomResult['hotel_name']; ?></p>
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
                                   <div class="row sp_top">
                                        <span><b>Room service</b></span>
                                        <span><?php echo $RoomResult['room_service']."."; ?></span>
                            </div>
                            <?php if ($RoomResult['room_service']=="yes") {

                                 if (!empty($RoomResult['room_24hour'])) {?>
                                         
                                    <div class="row sp_top">
                                        <span><b>24 hour service</b></span>
                                        <span><?php echo $RoomResult['room_24hour']."."; ?></span>
                                    </div>

                                <?php  }else{ ?>

                                     <div class="row sp_top">
                                        <span><b>Select hour</b></span>
                                        <span><?php echo $RoomResult['room_selecthour']."."; ?></span>
                                    </div>

                               <?php  }
                            } ?> 
                             
                              <div class="db-profile-view">
                    <table class="responsive-table profle-forms-reocrds-tbl" >
                        <thead>
                            
                            <tr>
                                <th>Number of Rooms</th>
                                <th>Charges per night</th>
                                <th>Room Service</th>
                                
                            </tr>

                        </thead>
                        <tbody>

                            <tr>
                                <td><?php echo $RoomResult['room_nosroom']; ?></td>
                                <td><?php echo $RoomResult['room_perni8']; ?></td>
                                <td><?php echo $RoomResult['room_service']; ?></td>
                                
                            </tr>

                        </tbody>
                    </table>
                  </div>     
                      
                             <div class="row sp_top">
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
                              <div>
                                <span><b>Room Description :</b></span>
                                <div class="listing-desc sp_top">
                                <span><?php echo $RoomResult['room_descrip']; ?></span>
                                </div>
                             </div>
                             <div class="sp_top">
                                <span><b>Amenities:</b></span>
                                <div class="sp_top ">
                                <?php $amenity =explode(',', $RoomResult['room_other']); ?>


                                      <?php 
                                       
                                       foreach ($amenity as $k => $v) {?>
                                           
                                            <div class="amenity_div">
                                             <span><?php echo $v."<br/>"; ?></span>
                                             </div>
                                     <?php  }

                                      ?>
                                 </div>
                                </div>
                           <?php if (!empty($RoomResult['room_offerdiscount'])) { ?>
                             <div class="row sp_top">
                                <span><b>Offer Discount (%) :</b></span>
                                <span><?php echo $RoomResult['room_offerdiscount']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Expires on :</b></span>
                                <span><?php echo $RoomResult['room_expireoffer']."."; ?></span>
                             </div>
                           <?php    } ?>

                           
                               
                               
                                  

                            
                             <div class="row sp_top">
                                 <span><b>Unavailable in these days :</b></span>

                             </div>
                             <div>
                                 <table class="listing-tbl sp_top tbl_social">
                                     <thead>
                                        <tr>
                                         <th>From</th>
                                          <th>To</th>
                                           
                                       </tr>
                                     </thead>
                                     <?php  while ($dateResult=mysqli_fetch_assoc($showRoomDateQuery)) { ?>
                                     <tbody>
                                        
                                         <td><?php  echo $dateResult['book_fromdate'];  ?></td>
                                         <td><?php  echo $dateResult['book_todate'];  ?></td>
                                         
                                     </tbody>
                                      <?php }   ?>  
                                 </table>
                             </div>
                             
                             

                              
                                    
                              
                             
                             
                       <?php } ?>

                </div>
              
                    </div>
                           <div class="row sp_top" style="padding-left: 15px;">
                               <span><b>Room Images :</b></span>
                           </div>
                            <div class="imgVeiwinline row" id="hotel_img_wrap" style="padding-left: 15px;">

                            <?php
                            
                           while ($imgResult=mysqli_fetch_assoc($showRoomImgQuery)) {

                             
                                if (!empty($imgResult['common_image'])) {?>
                                <div class="imgeWrap" style="float: left; padding-right:5px; padding-bottom:5px;">
                              <img src="../<?php echo $imgResult['common_image']  ?>" style="height: 100px; width: 150px;" class="materialboxed">
                            </div>&nbsp;&nbsp;
                                    <script type="text/javascript">
                                  $(document).ready(function(){
                                    
                                    setTimeout(function(){

                                      $('#cover_photo_common').attr('src',$('#hotel_img_wrap img').eq(0).attr('src'));
                                    },2000);

                                  })
                                     
                                </script>
                                    
                                   
                                <?php } ?>

                               
                              

                        <?php   
                     }

                            ?>
                        </div>
                    
                </div>
            </div>




		   <?php  include"../footer.php";  ?>




	

	
</body>

  
  

<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>