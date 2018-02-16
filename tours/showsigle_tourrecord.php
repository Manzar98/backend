<?php
 include '../common-apis/api.php';
 
 $showTourQuery=select('tour',array('tour_id'=>$_GET['id'],'hotel_id'=>$_GET['h_id']));

?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>

     <?php  while ($TourResult=mysqli_fetch_assoc($showTourQuery)) { 

     print_r($TourResult) ;   

$showTourImgQuery=select('common_imagevideo',array('tour_id'=>$TourResult['tour_id']));

$showdiscountQuery=select('common_nosofpeople',array('tour_id'=>$TourResult['tour_id']));






        ?>

     

	<title>Detail of <?php echo $TourResult['tour_name']; ?> </title>


<?php include '../header.php'; ?>



				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
                      <div class="row">
						<div class="db-title col-md-8">
							<h3><img src="../images/icon/dbc5.png" alt=""/> Detail of <?php echo $TourResult['tour_name']; ?> </h3>
							<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
						</div>
                        <div class="pull-right">
                            <a class="waves-effect waves-light btn" href="edit_tour.php?id=<?php echo $TourResult['tour_id'];  ?>&h_id=<?php echo  $TourResult['hotel_id'] ; ?>">Edit</a>
                        </div>
                      </div>
						 
                         <div class="hotelVeiw">
                            
                             <div class="row">
                             	<span><b>Package Name :</b></span>
                             	<span><?php echo $TourResult['tour_name']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Name of Destinations :</b></span>
                             	<span><?php echo $TourResult['tour_destinationname']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Food Included ? :</b></span>
                                <span><?php echo $TourResult['tour_foodinclude']."."; ?></span>
                             </div>
                             <?php if ($TourResult['tour_foodinclude']=='yes') { ?>
                                 
                             <div class="row">
                                 <div class="col-md-2">
                                    <span><b>Breakfast :</b></span>
                                     
                                 </div>
                                 <div class="col-md-2">
                                     <span><b>Lunch :</b></span>
                                 </div>
                                 <div class="col-md-2">
                                     <span><b>Dinner :</b></span>
                                 </div>
                             </div>
                              <div class="row">
                                 <div class="col-md-2">
                                    <?php if (!empty($TourResult['tour_brkfast'])) {?>

                                    <span><?php echo $TourResult['tour_brkfast']."."; ?></span>
                               <?php }else{ ?>

                                     <span>Off.</span>
 
                            <?php    }    ?>
                                    
                                     
                                 </div>
                                 <div class="col-md-2">

                                     <?php if (!empty($TourResult['tour_lunch'])) {?>

                                    <span><?php echo $TourResult['tour_lunch']."."; ?></span>
                               <?php }else{ ?>

                                     <span>Off.</span>
 
                            <?php    }    ?>
                                 </div>
                                 <div class="col-md-2">

                                     <?php if (!empty($TourResult['tour_dinner'])) {?>

                                    <span><?php echo $TourResult['tour_dinner']."."; ?></span>
                               <?php }else{ ?>

                                     <span>Off.</span>
 
                            <?php    }    ?>
                                 </div>
                             </div>
                           <?php } ?>


                              <div class="row">
                                <span><b>Drink Included ? :</b></span>
                                <span><?php echo $TourResult['tour_drink']."."; ?></span>
                             </div>
                             <?php if ($TourResult['tour_drink']=='yes') { ?>
                                 <div class="row">
                                 <div class="col-md-2">
                                    <span><b>Alcoholic :</b></span>
                                     
                                 </div>
                                 <div class="col-md-2">
                                     <span><b>Non Alcoholic :</b></span>
                                 </div>
                                 
                             </div>
                              <div class="row">
                                 <div class="col-md-2">
                                    <?php if (!empty($TourResult['tour_aloholic'])) {?>

                                    <span><?php echo $TourResult['tour_aloholic']."."; ?></span>
                               <?php }else{ ?>

                                     <span>Off.</span>
 
                            <?php    }    ?>
                                    
                                     
                                 </div>
                                 <div class="col-md-2">

                                     <?php if (!empty($TourResult['tour_nonaloholic'])) {?>

                                    <span><?php echo $TourResult['tour_nonaloholic']."."; ?></span>
                               <?php }else{ ?>

                                     <span>Off.</span>
 
                            <?php    }    ?>
                                 </div>
                                 
                             </div>
                          <?php    }  ?>

                             
                            
                             <div class="row">
                             	<span><b>Number of Days :</b></span>
                             	<span><?php echo $TourResult['tour_stayday']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Number of Nights :</b></span>
                                <span><?php echo $TourResult['tour_stayni8']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Hotel Stay Stars :</b></span>
                                <span><?php echo $TourResult['tour_hotelstr']."."; ?></span>
                             </div>
                             <div class="row">
                                 <span><b>Camping ?</b></span>
                                <?php if (!empty($TourResult['tour_camping'])) { ?>
                                    <span><?php echo $TourResult['tour_camping']; ?></span>
                              <?php  }else{ ?>

                                     <span><?php echo "Off." ?></span>

                               <?php }  ?>
                             </div>
                             
                             <div class="row">
                             	<span><b>Entry tickets included in the package price? :</b></span>
                             	<span><?php echo $TourResult['tour_entrytik']."."; ?></span>
                             </div>
                              <div class="row">
                                <span><b>Whole travel plan of the package :</b></span>
                                <span><?php echo $TourResult['tour_plan']; ?></span>
                             </div>
                              <div class="row">
                                <span><b>Package Price :</b></span>
                                <span><?php echo $TourResult['tour_pkgprice']."."; ?></span>
                             </div>
                              <div class="row">
                                <span><b>Number of people :</b></span>
                                <span><?php echo $TourResult['tour_capacitypeople']."."; ?></span>
                             </div>
                              <div class="row">
                                <span><b>Number of bags allowed per person :</b></span>
                                <span><?php echo $TourResult['tour_nosofbag']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Charges for extra luggage per bag :</b></span>
                                <span><?php echo $TourResult['tour_extrachrbag']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Children Allowed? :</b></span>

                                <span><?php echo $TourResult['tour_childallow']."."; ?></span>
                             </div>
                             <?php if ($TourResult['tour_childallow']=='yes') { ?>

                                 <div class="row">
                                <span><b>Under 5 allowed? :</b></span>
                                <span><?php echo $TourResult['tour_undr5allow']."."; ?></span>
                             </div>
                             <div class="row">
                                 <span><b>Free ?</b></span>
                                 <?php if (!empty($TourResult['tour_undr5free'])) { ?>
                                     <span><?php echo "Yes."; ?></span>
                               <?php  }else{ ?>
                                       <span><?php echo "No."; ?></span>
  
                             <?php   }   ?>
                             </div>
                             <div class="row">
                                <span><b>Charges for children :</b></span>
                                <span><?php echo $TourResult['tour_halftikchild']."."; ?></span>
                             </div>
                            <?php  }  ?>
                             
                            
                             <div class="row">
                                 <span><b>Discount for groups : :</b></span>

                             </div>
                             <div class="row">
                                <div class="col-md-3">
                                 <span><b>Number of People :</b></span>
                                </div>
                                <div class="col-md-3">
                                    <span><b>Discount (Percentage) :</b></span>
                                </div>
                             </div>
                             

                                <?php  while ($discountResult=mysqli_fetch_assoc($showdiscountQuery)) { ?>
                                    
                               <div class="row">
                                 <div class="col-md-3">
                                    <span><?php  echo $discountResult['common_nopeople'];  ?></span>
                                 </div>
                                <div class="col-md-3">
                                    <span><?php  echo $discountResult['common_discount'];  ?></span>

                                </div>
                               </div>
                                
                            <?php }   ?>

                            <div class="row">
                                <span><b>Trip starts from (Location’s Name) :</b></span>
                                <span><?php echo $TourResult['tour_strtloc'].".";  ?></span>
                            </div>
                            <div class="row">
                                <span><b>Pickup Offered ? :</b></span>
                                <span><?php echo $TourResult['tour_pikoffer'].".";  ?></span>
                            </div>
                            <?php if ($TourResult['tour_pikoffer']=='yes') { ?>
                                  <div class="row">
                                <span><b>Charges From:</b></span>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span><b>Airport :</b></span>
                                </div>
                                <div class="col-md-3">
                                    <span><b>Bus Station :</b></span>
                                </div>
                                <div class="col-md-3">
                                    <span><b>Specific Location :</b></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">

                                    <span><?php echo $TourResult['tour_pikair'] ; ?></span>
                                </div>
                                <div class="col-md-3">
                                    <span><?php echo $TourResult['tour_pikbus'];  ?></span>
                                </div>
                                <div class="col-md-3">
                                    <span><?php echo $TourResult['tour_pikspecific'];  ?></span>
                                </div>
                            </div>
                          <?php  } ?>
                          

                            <div class="row">
                                <span><b>Drop off Offered ? :</b></span>
                                <span><?php echo $TourResult['tour_drpoffer'].".";  ?></span>
                            </div>

                            <?php if ($TourResult['tour_drpoffer']=='yes') { ?>
                                  <div class="row">
                                <span><b>Charges From:</b></span>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span><b>Airport :</b></span>
                                </div>
                                <div class="col-md-3">
                                    <span><b>Bus Station :</b></span>
                                </div>
                                <div class="col-md-3">
                                    <span><b>Specific Location :</b></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">

                                    <span><?php echo $TourResult['tour_drpair'];  ?></span>
                                </div>
                                <div class="col-md-3">
                                    <span><?php echo $TourResult['tour_drpbus'];  ?></span>
                                </div>
                                <div class="col-md-3">
                                    <span><?php echo $TourResult['tour_drpspecific'];  ?></span>
                                </div>
                            </div>
                          <?php  } ?>
                            


   
                             
                       <?php } ?>

				</div>

                   
              
					</div>
                           <div class="row" style="padding-left: 15px;">
                               <span><b>Tour Images :</b></span>
                           </div>
                            <div class="imgVeiwinline row" id="hotel_img_wrap" style="padding-left: 15px;">

                            <?php
                            
                            while ($imgResult=mysqli_fetch_assoc($showTourImgQuery)) {

                             
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