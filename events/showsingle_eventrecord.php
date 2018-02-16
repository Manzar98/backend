<?php
 include '../common-apis/api.php';
 
 $showEventQuery=select('event',array('event_id'=>$_GET['id'],'hotel_id'=>$_GET['h_id']));

?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>

     <?php  while ($EventResult=mysqli_fetch_assoc($showEventQuery)) { 

     print_r($EventResult) ;   

$showEventImgQuery=select('common_imagevideo',array('event_id'=>$EventResult['event_id']));

$showdiscountQuery=select('common_nosofpeople',array('event_id'=>$EventResult['event_id']));






        ?>

     

	<title>Detail of <?php echo $EventResult['event_name']; ?> </title>


<?php include '../header.php'; ?>



				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
                      <div class="row">
						<div class="db-title col-md-8">
							<h3><img src="../images/icon/dbc5.png" alt=""/> Detail of <?php echo $EventResult['event_name']; ?> </h3>
							<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
						</div>
                        <div class="pull-right">
                            <a class="waves-effect waves-light btn" href="edit_event.php?id=<?php echo $EventResult['event_id'];  ?>&h_id=<?php echo  $EventResult['hotel_id'];  ?>">Edit</a>
                        </div>
                      </div>
						 
                         <div class="hotelVeiw">
                            
                             <div class="row">
                             	<span><b>Event Name :</b></span>
                             	<span><?php echo $EventResult['event_name']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Event Venue :</b></span>
                             	<span><?php echo $EventResult['event_venue']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Event Recurrence ? :</b></span>
                                <span><?php echo $EventResult['event_recurrence']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Event Description :</b></span>
                                <span><?php echo $EventResult['event_descrip']; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Entry Fee ? :</b></span>
                                <span><?php echo $EventResult['event_entry']."."; ?></span>
                             </div>
                             <?php if ($EventResult['event_entry']=='yes') { ?>
                                   <div class="row">
                                <span><b>Price/Free :</b></span>
                                <?php if ($EventResult['event_entryfee']=="no") { ?>
                                       <span><?php echo "Free"  ?></span>
                             <?php    }else{ ?>
                                       <span><?php echo $EventResult['event_entryfee']."."; ?></span>

                                <?php }  ?>
                                
                             </div>
                            <?php  } ?>
                             
                        
                             <div class="row child-allow">
                                <span><b>Children Allowed? :</b></span>

                                <span><?php echo $EventResult['event_childallow']."."; ?></span>
                             </div>
                             <?php if ($EventResult['event_childallow']=='yes') { ?>
                                <div class="row">
                                <span><b>Under 5 allowed? :</b></span>
                                <span><?php echo $EventResult['event_undr5allow']."."; ?></span>
                             </div>
                             <div class="row">
                                 <span><b>Free ?</b></span>
                                 <?php if (!empty($EventResult['event_undr5free'])) { ?>
                                     <span><?php echo "Yes."; ?></span>
                               <?php  }else{ ?>
                                       <span><?php echo "No."; ?></span>
  
                             <?php   }   ?>
                             </div>
                             <div class="row">
                                <span><b>Charges for children? :</b></span>
                                <span><?php echo $EventResult['event_halftikchild']."."; ?></span>
                             </div>

                            <?php } ?>
                            
                            
                             <div class="row">
                                 <span><b>Discount for groups :</b></span>

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
                                <span><b>Pickup Offered ? :</b></span>
                                <span><?php echo $EventResult['event_pikoffer'].".";  ?></span>
                            </div>
                            <?php if ($EventResult['event_pikoffer']=="yes") { ?>
                                 <div class="row">
                                <span><b>Charges From :</b></span>
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

                                    <span><?php echo $EventResult['event_pikair'];  ?></span>
                                </div>
                                <div class="col-md-3">
                                    <span><?php echo $EventResult['event_pikbus'] ; ?></span>
                                </div>
                                <div class="col-md-3">
                                    <span><?php echo $EventResult['event_pikspecific'];  ?></span>
                                </div>
                            </div>
                            <?php  } ?>
                          

                            <div class="row">
                                <span><b>Drop off Offered ? :</b></span>
                                <span><?php echo $EventResult['event_drpoffer'].".";  ?></span>
                            </div>

                            <?php if ($EventResult['event_drpoffer']=='yes') { ?>
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

                                    <span><?php echo $EventResult['event_drpair'];  ?></span>
                                </div>
                                <div class="col-md-3">
                                    <span><?php echo $EventResult['event_drpbus'];  ?></span>
                                </div>
                                <div class="col-md-3">
                                    <span><?php echo $EventResult['event_drpspecific'];  ?></span>
                                </div>
                            </div>
                           <?php } ?>
                           


   
                             
                       <?php } ?>

				</div>

                   
              
					</div>
                           <div class="row" style="padding-left: 15px;">
                               <span><b>Event Images :</b></span>
                           </div>
                            <div class="imgVeiwinline row" id="hotel_img_wrap" style="padding-left: 15px;">

                            <?php
                            
                            while ($imgResult=mysqli_fetch_assoc($showEventImgQuery)) {

                             
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