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
<script src="../../js/jquery.min.js"></script>
     <?php  while ($ConResult=mysqli_fetch_assoc($showConQuery)) {     

$showConImgQuery=select('common_imagevideo',array('conference_id'=>$ConResult['conference_id']));

$showConDateQuery=select('common_bookdates',array('conference_id'=>$ConResult['conference_id']));

$showConMenuQuery=select('common_menupackages',array('conference_id'=>$ConResult['conference_id']));



        ?>

     

	<title>Detail of <?php echo $ConResult['conference_name']; ?> </title>


<?php include '../header.php'; ?>



				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
                      <div class="row">
                        <div class="pull-right">
                            <?php if (isset($_GET["h_id"])) { ?>
                                <a class="waves-effect waves-light btn" href="edit_conference.php?id=<?php echo $ConResult['conference_id'];  ?>&h_id=<?php echo  $ConResult['hotel_id']  ?>">Edit</a>
                           <?php  }else{ ?>

                                   <a class="waves-effect waves-light btn" href="edit_conference.php?id=<?php echo $ConResult['conference_id'];  ?>&u_id=<?php echo  $ConResult['user_id']  ?>">Edit</a>

                          <?php } ?>
                            
                        </div>
                      </div>
                    <div class="db-profile"> 

                            <img src="" id="cover_photo_common" alt="">
                            <h4><?php echo $ConResult['conference_name'];  ?> </h4>
                            <p><?php  ?></p>
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
                                <span><b>Hall Charges :</b></span>
                                <span><?php echo $ConResult['conference_charges']."."; ?></span>
                             </div>

                  <div class="db-profile-view">
                    <table class="responsive-table profle-forms-reocrds-tbl" >
                        <thead>
                            
                            <tr>
                                <th>Capacity</th>
                                <th>Hall Cahrges</th>
                                <th>Serve Food?</th>
                                
                            </tr>

                        </thead>
                        <tbody>

                            <tr>
                                <td><?php echo $ConResult['conference_space']; ?></td>
                                <td><?php echo $ConResult['conference_charges']; ?></td>
                                <td class="capitalize"><?php echo $ConResult['conference_serve']; ?></td>
                                
                            </tr>

                        </tbody>
                    </table>
                  </div> 
                            
                            <?php if (!empty($ConResult['conference_offerdiscount'])) { ?>
                                
                        
                             <div class="row sp_top">
                                <span><b>Offer Discount (%) :</b></span>
                                <span><?php echo $ConResult['conference_offerdiscount']."."; ?></span>
                             </div>
                             <div class="row">
                                <span><b>Expires on :</b></span>
                                <span><?php echo $ConResult['conference_expireoffer']."."; ?></span>
                             </div>
                             <?php    } ?>


                             <div class="sp_top">
                                <span><b>Amenities:</b></span>
                                <div class="sp_top ">
                                <?php $amenity =explode(',', $ConResult['conference_other']); ?>


                                      <?php 
                                       
                                       foreach ($amenity as $k => $v) {?>
                                           
                                            <div class="amenity_div">
                                             <span><?php echo $v."<br/>"; ?></span>
                                             </div>
                                     <?php  }

                                      ?>
                                 </div>
                                </div>
                            
                             

                             <div class="row sp_top">
                                <span><b>Serve Food ? :</b></span>
                                <span class="capitalize"><?php echo $ConResult['conference_serve']."."; ?></span>
                             </div>
                           

                          <?php  if ($ConResult['conference_serve']=="yes") {?>
                            <div class="row">
                                 <span><b>Menu Packages :</b></span>

                             </div>

                            <div>
                                 <table class="listing-tbl sp_top tbl_social">
                                     <thead>
                                        <tr>
                                         <th>Package Name</th>
                                          <th>Package Price</th>
                                          <th>Discount Percentage</th>
                                          <th>Package Items</th>
                                           
                                       </tr>
                                     </thead>
                                     <?php  while ($menuResult=mysqli_fetch_assoc($showConMenuQuery)) {?>
                                     <tbody>
                                       
                                         <td><?php  echo $menuResult['foodpkg_name'];  ?></td>
                                         <td><?php  echo $menuResult['foodpkg_price'];  ?></td>
                                         <td><?php  echo $menuResult['foodpkg_discount'];  ?></td>
                                         <td><?php  echo $menuResult['foodpkg_item'];  ?></td>
                                          
                                     </tbody>
                                     <?php  } ?>
                                 </table>
                             </div>
                             
                                <?php }   
                                 
                                  ?>


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
                                     <?php  while ($dateResult=mysqli_fetch_assoc($showConDateQuery)) { ?>
                                     <tbody>
                                       
                                         <td><?php  echo $dateResult['book_fromdate'];  ?></td>
                                         <td><?php  echo $dateResult['book_todate'];  ?></td>
                                          
                                     </tbody>
                                     <?php }  ?>
                                 </table>
                             </div>
                              


                        
                           <div class="row sp_top">
                                <span><b>Hall Independent? :</b></span>
                                <span class="capitalize"><?php echo $ConResult['conference_independ']; ?></span>
                            </div>
                            <?php if($ConResult['conference_independ']=="yes") { ?>
                                 
                                 <div>
                                 <table class="listing-tbl sp_top tbl_social">
                                     <thead>
                                        <tr>
                                         <th>Address</th>
                                          <th>City</th>
                                          <th>Province</th>
                                          <th>Phone</th>
                                          <th>Email</th>
                                          
                                           
                                       </tr>
                                     </thead>
                                     <tbody>
                                       
                                         <td><?php  echo $ConResult['conference_address'];  ?></td>
                                         <td><?php  echo $ConResult['conference_city'];  ?></td>
                                         <td><?php  echo $ConResult['conference_province'];  ?></td>
                                         <td><?php  echo $ConResult['conference_phone'];  ?></td>
                                         <td><?php  echo $ConResult['conference_email'];  ?></td>
                                         
                                          
                                     </tbody>
                                 </table>
                             </div>
                           
                           <?php if (!empty($ConResult['conference_fcbok']) || !empty($ConResult['conference_twiter']) || !empty($ConResult['conference_utube'])) { ?>
                              
                             <div>
                                 <table class="listing-tbl sp_top tbl_social">
                                     <thead>
                                        <tr>
                                         <th>Facebook</th>
                                          <th>Twitter</th>
                                          <th>Youtube</th>
                                          
                                           
                                       </tr>
                                     </thead>
                                     <tbody>
                                       
                                         <td><span class="fb_icon"><i class="fa fa-facebook-official" aria-hidden="true"></i></span><?php  echo $ConResult['conference_fcbok'];  ?></td>
                                         <td><span class="tw_icon"><i class="fa fa-twitter-square" aria-hidden="true"></i></span><?php  echo $ConResult['conference_twiter'];  ?></td>
                                         <td><span class="you_icon"><i class="fa fa-youtube-play" aria-hidden="true"></i></span><?php  echo $ConResult['conference_utube'];  ?></td>   
                                     </tbody>
                                 </table>
                             </div>
                             <?php } ?>


                            


                           <?php }else{ ?>

                            <div class="row sp_top">
                                <span><b>Under Which Hotel? :</b></span>
                                <span class="capitalize"><?php echo $ConResult['hotel_name']; ?></span>
                            </div>



                          <?php  } ?>
            
                             
                             
                       <?php } ?>

                </div>
              
                    </div>
                           <div class="row sp_top" style="padding-left: 15px;">
                               <span><b>Conference Images :</b></span>
                           </div>
                            <div class="imgVeiwinline row" id="hotel_img_wrap" style="padding-left: 15px;">

                            <?php
                            
                           while ($imgResult=mysqli_fetch_assoc($showConImgQuery)) {

                             
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