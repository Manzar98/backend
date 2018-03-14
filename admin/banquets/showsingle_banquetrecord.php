<?php
 include '../../common-apis/reg-api.php';
 
 if (isset($_GET['h_id'])) {
      $showBnqQuery=select('banquet',array('banquet_id'=>$_GET['id'],'hotel_id'=>$_GET['h_id']));
 }else{

     $showBnqQuery=select('banquet',array('banquet_id'=>$_GET['id'],'user_id'=>$_GET['u_id']));
 }


?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>

     <?php  while ($BnqResult=mysqli_fetch_assoc($showBnqQuery)) {     

$showBnqImgQuery=select('common_imagevideo',array('banquet_id'=>$BnqResult['banquet_id']));

$showBnqDateQuery=select('common_bookdates',array('banquet_id'=>$BnqResult['banquet_id']));

$showBnqMenuQuery=select('common_menupackages',array('banquet_id'=>$BnqResult['banquet_id']))


        ?>

     

	<title>Detail of <?php echo $BnqResult['banquet_name']; ?> </title>


<?php include '../header_inner_folder.php'; ?>



				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
                      <div class="row">
						<div class="db-title col-md-8">
							<h3><img src="../../images/icon/dbc5.png" alt=""/> Detail of <?php echo $BnqResult['banquet_name']; ?> </h3>
							<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
						</div>
                        <div class="pull-right">
                            <?php if ($_GET['status']=="Approved") { ?>
                                
                          
                        <?php if (isset($_GET['h_id'])) { ?>
                            <a class="waves-effect waves-light btn" href="edit_banquet.php?id=<?php echo $BnqResult['banquet_id'];  ?>&h_id=<?php echo  $BnqResult['hotel_id']  ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name'] ?>&user_id=<?php echo $_GET['user_id']; ?>">Edit</a>
                       <?php  }else{ ?>

                                   <a class="waves-effect waves-light btn" href="edit_banquet.php?id=<?php echo $BnqResult['banquet_id'];  ?>&u_id=<?php echo  $BnqResult['user_id']  ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name'] ?>&user_id=<?php echo $_GET['user_id']; ?>">Edit</a>
                       <?php } ?>
                          <?php   } ?>  
                        </div>
                      </div>
						 
                         <div class="hotelVeiw">
                            
                             <div class="row">
                             	<span><b>Banquet Name :</b></span>
                             	<span><?php echo $BnqResult['banquet_name']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Capacity :</b></span>
                             	<span><?php echo $BnqResult['banquet_space']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Base Booking Charges :</b></span>
                             	<span><?php echo $BnqResult['banquet_charges']."."; ?></span>
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
                                <span><b>Charges :</b></span>
                                <?php if (!empty($BnqResult['banquet_aricon'])) {?>

                                    <span><?php echo $BnqResult['banquet_aricon']."."; ?></span>
                               <?php }else{ ?>

                                     <span>Null.</span>
 
                            <?php    }    ?>
                                
                             </div>

                              <div class="row">
                                <span><b>Generator? :</b></span>
                                <?php if (!empty($BnqResult['banquet_isgen'])) {?>

                                    <span><?php echo $BnqResult['banquet_isgen']."."; ?></span>
                               <?php }else{ ?>

                                     <span>Off.</span>
 
                            <?php    }    ?>
                                
                             </div>

                             <div class="row">
                                <span><b>Charges :</b></span>
                                <?php if (!empty($BnqResult['banquet_generator'])) {?>

                                    <span><?php echo $BnqResult['banquet_generator']."."; ?></span>
                               <?php }else{ ?>

                                     <span>Null.</span>
 
                            <?php    }    ?>
                                
                             </div>
                             <div class="row">
                             	<span><b>Serve Food ? :</b></span>
                             	<span><?php echo $BnqResult['banquet_serve']."."; ?></span>
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
                             

                                <?php  while ($menuResult=mysqli_fetch_assoc($showBnqMenuQuery)) { ?>
                                    
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

                             <?php  while ($mResult=mysqli_fetch_assoc($showBnqMenuQuery)) { ?>
                                    
                               <div class="row">
                                 <div class="col-md-3">
                                    <span><?php  echo $mResult['foodpkg_discount'];  ?></span>
                                 </div>
                                <div class="col-md-3">
                                    <span><?php  echo $mResult['foodpkg_item'];  ?></span>
                                </div>
                               </div>
                                <?php }   ?>





                            
                             <div class="row">
                             	<span><b>Gathering Type :</b></span>
                             	<span><?php echo $BnqResult['banquet_gathering']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Additional Cost :</b></span>
                             	<span><?php echo $BnqResult['banquet_adcost']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Offer Discount (%) :</b></span>
                             	<span><?php echo $BnqResult['banquet_offerdiscount']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Expires on :</b></span>
                             	<span><?php echo $BnqResult['banquet_expireoffer']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Banquet Description :</b></span>
                             	<span><?php echo $BnqResult['banquet_descrip']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Amenities :</b></span>
                             	<span><?php echo $BnqResult['banquet_other']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Independent Hall? :</b></span>
                             	<span><?php echo $BnqResult['banquet_independ']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Address :</b></span>
                                <span><?php echo $BnqResult['banquet_address']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>City :</b></span>
                                <span><?php echo $BnqResult['banquet_city']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Province :</b></span>
                                <span><?php echo $BnqResult['banquet_province']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Phone Number :</b></span>
                                <span><?php echo $BnqResult['banquet_phone']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Email Address :</b></span>
                                <span><?php echo $BnqResult['banquet_email']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Facebook URL :</b></span>
                                <span><?php echo $BnqResult['banquet_fcbok']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Twitter URL :</b></span>
                                <span><?php echo $BnqResult['banquet_twiter']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Youtube URL :</b></span>
                                <span><?php echo $BnqResult['banquet_utube']."."; ?></span>
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
                             

                                <?php  while ($dateResult=mysqli_fetch_assoc($showBnqDateQuery)) { ?>
                                    
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
                               <span><b>Banquet Images :</b></span>
                           </div>
                            <div class="imgVeiwinline row" id="hotel_img_wrap" style="padding-left: 15px;">

                            <?php
                            
                            while ($imgResult=mysqli_fetch_assoc($showBnqImgQuery)) {

                             
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

		



		   <?php  include"../footer_inner_folder.php";  ?>




	

	
</body>

  
  

<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>