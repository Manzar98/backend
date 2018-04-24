<?php
 include '../../common-apis/reg-api.php';
 
 $showHotelQuery=select('hotel',array('hotel_id'=>$_GET['id']));




?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
<script src="../../js/jquery.min.js"></script>
     <?php  while ($hotelResult=mysqli_fetch_assoc($showHotelQuery)) {    

    $showHotelImgQuery=select('common_imagevideo',array('hotel_id'=>$hotelResult['hotel_id']));

    // echo $hotelResult['hotel_id'];
    // $imgResult=mysqli_fetch_assoc($showHotelImgQuery);

        ?>


	<title>Detail of <?php echo $hotelResult['hotel_name']; ?> </title>


<?php include '../header.php'; ?>



				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
                      <div class="row">
                        <div class="pull-right">
                            <a class="waves-effect waves-light btn" href="edit_hotel.php?id=<?php echo $hotelResult['hotel_id'];  ?>">Edit</a>
                        </div>
                      </div>
                      <div class="db-profile"> 

                             <img src="" id="cover_photo_common" alt=""> 
                            <h4><?php echo $hotelResult['hotel_name'];  ?> </h4>
                            <p><?php echo $hotelResult['hotel_addres1']; ?></p>
                     </div>
						 
                         <div class="hotelVeiw">
                            <input type='hidden' value='<?php echo $hotelResult['hotel_id']; ?>' id="h_Id" name="hotel_id" />
                             <div class="row">
                                <span><b>Hotel Name :</b></span>
                                <span><?php echo $hotelResult['hotel_name']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Address Line 1 :</b></span>
                                <span><?php echo $hotelResult['hotel_addres1']."."; ?></span>
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
                                <span><b>Email Address :</b></span>
                                <span><?php echo $hotelResult['hotel_email']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Website :</b></span>
                                <span><?php echo $hotelResult['hotel_web']."."; ?></span>
                             </div>
                <div class="db-profile-view">
                    <table class="responsive-table profle-forms-reocrds-tbl" >
                        <thead>
                            
                            <tr>
                                <th>Phone No</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Pickup Offered</th>
                            </tr>

                        </thead>
                        <tbody>

                            <tr>
                                <td><?php echo $hotelResult['hotel_phone']; ?></td>
                                <td><?php echo $hotelResult['hotel_checkin']; ?></td>
                                <td><?php echo $hotelResult['hotel_checkout']; ?></td>
                                <td><?php echo $hotelResult['hotel_pickup']; ?></td>
                            </tr>

                        </tbody>
                    </table>
                  </div>

                             
                             <div>
                                <span><b>Hotel Description :</b></span>
                                <div class="listing-desc sp_top">
                                <span><?php echo $hotelResult['hotel_descrp']; ?></span>
                                </div>
                             </div>
                             <div class="row common-top">
                                    <span><b>Hotel Pickup? :</b></span>
                             <?php if ($hotelResult['hotel_pickup']== "yes") {?>

                                       <span class="capitalize"><?php echo $hotelResult['hotel_pickup']."."; ?></span>
                             </div>  
                             <div class="row">
                                 <span><b>Pickup Charges :</b></span>
                                 
                                 <table class="listing-tbl sp_top">
                                     <thead>
                                         <tr>
                                             <th class="listing_th">From Airport</th>
                                             <th>From Bus Terminal</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr >
                                            <?php if (!empty($hotelResult['hotel_pikcharge'])) {?>
                                                <td class="listing_td"><?php echo $hotelResult['hotel_pikcharge']; ?></td>
                                           <?php }else{ ?>

                                                  <td class="listing_td">N/A</td>

                                          <?php  } ?>
                                          <?php if (!empty($hotelResult['hotel_buscharge'])) {?>
                                                <td><?php echo $hotelResult['hotel_buscharge']; ?></td>
                                           <?php }else{ ?>

                                                  <td>N/A</td>

                                          <?php  } ?>

                                         </tr>
                                     </tbody>
                                 </table>
                             </div>      
                                 
                            <?php  }else{ ?>

                                    <span class="capitalize"><?php echo $hotelResult['hotel_pickup']."."; ?></span>
                                  <?php } ?>
                             </div>

                             <div class="sp_top">
                                <span><b>Amenities:</b></span>
                                <div class="sp_top ">
                                <?php $amenity =explode(',', $hotelResult['hotel_other']); ?>


                                      <?php 
                                       
                                       foreach ($amenity as $k => $v) {?>
                                           
                                            <div class="amenity_div">
                                             <span><?php echo $v."<br/>"; ?></span>
                                             </div>
                                     <?php  }

                                      ?>
                                 </div>
                                </div>
                             

                              <div class="sp_top">
                                <span><b>Hotel’s Cancellation Policy:</b></span>
                                <div class="listing-desc sp_top">
                                <span><?php echo $hotelResult['hotel_policy']; ?></span>
                                </div>
                             </div>
                         <?php if (!empty($hotelResult['hotel_fburl']) || !empty($hotelResult['hotel_twurl']) || !empty($hotelResult['hotel_gourl']) || !empty($hotelResult['hotel_insurl']) || !empty($hotelResult['hotel_pinurl']) || !empty($hotelResult['hotel_yuturl']) ) { ?>
                             
                        
                              <div class="sp_top">
                                <span><b>Social Networks:</b></span>
                             </div>
                             <div>
                                 <table class="listing-tbl sp_top tbl_social">
                                    <tbody>
                                        <tr>
                                         <td><span class="fb_icon"><i class="fa fa-facebook-official" aria-hidden="true"></i></span><?php echo $hotelResult['hotel_fburl']; ?></td>
                                          <td><span class="tw_icon"><i class="fa fa-twitter-square" aria-hidden="true"></i></span><?php echo $hotelResult['hotel_twurl']; ?></td>
                                           
                                       </tr>
                                       <tr>
                                         <td><span class="google_icon"><i class="fa fa-google-plus-square" aria-hidden="true"></i></span><?php echo $hotelResult['hotel_gourl']; ?></td>
                                          <td><span class="insta_icon"><i class="fa fa-instagram" aria-hidden="true"></i></span><?php echo $hotelResult['hotel_insurl']; ?></td>
                                           
                                       </tr>
                                       <tr>
                                           <td><span class="pin_icon"><i class="fa fa-pinterest-square" aria-hidden="true"></i></span><?php echo $hotelResult['hotel_pinurl']; ?></td>
                                          <td><span class="you_icon"><i class="fa fa-youtube-play" aria-hidden="true"></i></span><?php echo $hotelResult['hotel_yuturl']; ?></td>
                                           
                                       </tr>
                                     </tbody>
                                 </table>
                             </div>
                           <?php  } ?>
                       <?php } ?>

              
                    </div>
                

                           <div class="row sp_top" style="padding-left: 15px;">
                               <span><b>Hotel Images :</b></span>
                           </div>
                           <div class="h_title row int_title"><label>Interior Photos :</label></div>
                           <div class="imgVeiwinline row" id="hotel_img_wrap" style="display: none;">
                            

                          </div>
                          <div class="h_title row int_title"><label>Exterior Photos :</label></div>
                          <div class="imgVeiwinline row" id="hotel_img_exe_wrap" style="display: none;">
                            
                          </div>

                            <div class="imgVeiwinline row"  style="padding-left: 15px;">

                            <?php
                            // 
                              while ($imgResult=mysqli_fetch_assoc($showHotelImgQuery)) {
                           // print_r($imgResult);

                           if (!empty($imgResult['hotel_coverimg'])) { ?>
                           <div class="row" id="hotel_cover_img" >
                             <div class="row int_title"><label>Cover Photo :</label></div>

                             <div class="imgeWrap" style="float: left; padding-right:5px; padding-bottom:5px;">
                              <img src="../<?php echo $imgResult['hotel_coverimg']  ?>" style="height: 100px; width: 150px;" class="materialboxed">
                            </div>&nbsp;&nbsp;
                          </div>
                          <?php   }  

                            if (!empty($imgResult['common_image'])) { ?>
                                
                                <script type="text/javascript">
                                  $(document).ready(function(){
                                    
                                    setTimeout(function(){

                                      $('#cover_photo_common').attr('src',$('#hotel_img_wrap img').eq(0).attr('src'));
                                    },2000);

                                  })
                                     
                                </script>
                           <?php  }


                          ?>
                              
                               


                               
                              

                        <?php   
                              }

                            ?>
                        </div>
                    
                </div>
            </div>


		
</div>


		   <?php  include"../footer.php";  ?>
            <script src="../../js/hotel-js/images.js"></script>




	

	
</body>

  
  

<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>