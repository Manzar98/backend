<?php
 include '../../common-apis/reg-api.php';
 if (isset($_GET['h_id'])) {
     $showConQuery=select('conference',array('conference_id'=>$_GET['id'],'hotel_id'=>$_GET['h_id']));
 }else{


    $showConQuery=select('conference',array('conference_id'=>$_GET['id'],'user_id'=>$_GET['u_id']));
 }
 

?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>

     <?php  while ($ConResult=mysqli_fetch_assoc($showConQuery)) {     

$showConImgQuery=select('common_imagevideo',array('conference_id'=>$ConResult['conference_id']));

$showConDateQuery=select('common_bookdates',array('conference_id'=>$ConResult['conference_id']));

$showConMenuQuery=select('common_menupackages',array('conference_id'=>$ConResult['conference_id']))


        ?>

     

	<title>Detail of <?php echo $ConResult['conference_name']; ?> </title>


<?php include '../header.php'; ?>



				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
                      <div class="row">
						<div class="db-title col-md-8">
							<h3><img src="../../images/icon/dbc5.png" alt=""/> Detail of <?php echo $ConResult['conference_name']; ?> </h3>
							<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
						</div>
                        <div class="pull-right">
                            <?php if (isset($_GET["h_id"])) { ?>
                                <a class="waves-effect waves-light btn" href="edit_conference.php?id=<?php echo $ConResult['conference_id'];  ?>&h_id=<?php echo  $ConResult['hotel_id']  ?>">Edit</a>
                           <?php  }else{ ?>

                                   <a class="waves-effect waves-light btn" href="edit_conference.php?id=<?php echo $ConResult['conference_id'];  ?>&u_id=<?php echo  $ConResult['user_id']  ?>">Edit</a>

                          <?php } ?>
                            
                        </div>
                      </div>
						 
                         <div class="hotelVeiw">
                            
                             <div class="row">
                             	<span><b>Conference Hall Name :</b></span>
                             	<span><?php echo $ConResult['conference_name']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Capacity :</b></span>
                             	<span><?php echo $ConResult['conference_space']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hall Booking Charges :</b></span>
                             	<span><?php echo $ConResult['conference_charges']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Offer Discount (%) :</b></span>
                                <span><?php echo $ConResult['conference_offerdiscount']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Expires on :</b></span>
                                <span><?php echo $ConResult['conference_expireoffer']."."; ?></span>
                             </div>


                             <div class="row"><span><b>Hall Booking Charges :</b></span></div>
                              <div class="row">
                                <span><b>Aircon? :</b></span>
                                <?php if (!empty($BnqResult['banquet_isaircon'])) {?>

                                    <span><?php echo $BnqResult['banquet_isaircon']."."; ?></span>
                               <?php }else{ ?>

                                     <span>Off.</span>
 
                            <?php    }    ?>
                                
                             </div>

                             <div class="row">
                             	<span><b>Serve Food ? :</b></span>
                             	<span><?php echo $ConResult['conference_serve']."."; ?></span>
                             </div>

                            <div class="row">
                                 <span><b>Menu Packages :</b></span>

                             </div>
                             <div class="row">
                                <div class="col-md-3">
                                 <span><b>Package Name :</b></span>
                                </div>
                                <div class="col-md-3">
                                    <span><b>Package Price :</b></span>
                                </div>
                             </div>
                             

                                <?php  while ($menuResult=mysqli_fetch_assoc($showConMenuQuery)) {  ?>
                                    
                               <div class="row">
                                 <div class="col-md-3">
                                    <span><?php  echo $menuResult['foodpkg_name'];  ?></span>
                                 </div>
                                <div class="col-md-3">
                                    <span><?php  echo $menuResult['foodpkg_price'];  ?></span>
                                </div>
                               </div>
                                <?php }   ?>


                                <div class="row">
                                <div class="col-md-3">
                                 <span><b>Discount Percentage :</b></span>
                                </div>
                                <div class="col-md-3">
                                    <span><b>Package Items :</b></span>
                                </div>
                             </div>

                            <!--  <?php  while ($mResult=mysqli_fetch_assoc($showConMenuQuery)) { ?>
                                    
                               <div class="row">
                                 <div class="col-md-3">
                                    <span><?php  echo $mResult['foodpkg_discount'];  ?></span>
                                 </div>
                                <div class="col-md-3">
                                    <span><?php  echo $mResult['foodpkg_item'];  ?></span>
                                </div>
                               </div>
                                <?php }   ?> -->

                             
                             <div class="row">
                             	<span><b>Amenities :</b></span>
                             	<span><?php echo $ConResult['conference_other']."."; ?></span>
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
                             

                                <?php  while ($dateResult=mysqli_fetch_assoc($showConDateQuery)) { ?>
                                    
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
                               <span><b>Conference Images :</b></span>
                           </div>
                            <div class="imgVeiwinline row" id="hotel_img_wrap" style="padding-left: 15px;">

                            <?php
                            
                            while ($imgResult=mysqli_fetch_assoc($showConImgQuery)) {

                             
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