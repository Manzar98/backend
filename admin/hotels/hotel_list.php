 <?php
  
  include '../../common-sql.php';
 
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of Hotels</title>


<?php include '../header_inner_folder.php'; 


$hotelQuery=    'SELECT * FROM hotel where user_id="'.$_GET['id'].'" ORDER BY hotel_id DESC ';
          $hotel_resp =mysqli_query($conn,$hotelQuery)  or die(mysqli_error($conn));

?>
          <!--  <input type="text"  id="row_count" name=""> -->
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">

						<div class="row">
						<div class="db-title col s9">
							<h3><img src="../../images/icon/dbc5.png" alt=""/> <?php echo $_GET['name']; ?> Hotels</h3>
							<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
						</div>
						<div class="col s3" style="margin-top: 10px;">
							<span >Status:</span>
							 <?php if ($_GET['status']=='Suspended') { ?>
							 	<span class="appr" style="color: red; "><b><?php echo $_GET['status']; ?></b></span>

							<?php  }else{ ?>

                                      <span class="appr" style="color: green; "><b><?php echo $_GET['status']; ?></b></span>

							<?php } ?>
						</div>
						
						</div>
						
 

                  <?php

				 if (mysqli_num_rows($hotel_resp) > 0) {   ?>
				 <?php include '../../common-ftns/filter-sus-app-pen.php'; ?>
						<table class="bordered responsive-table" cellpadding="10" cellspacing="10" id="h_table">
							<thead>
								<tr >
									<th>Name</th>
									<th>City</th>
									<th>Inactive/Active Rooms</th>
									<th>Booked/Free Rooms</th>
									<th>Status 1</th>
									<th>Status 2</th>
								</tr>
							</thead>
							<tbody class="wrap-td">
								

								
                                 <?php  while ($result=mysqli_fetch_assoc($hotel_resp)) { 
                                $roomcount_inact='SELECT COUNT(*) AS count FROM room WHERE hotel_id="'.$result['hotel_id'].'" AND room_inactive="off"';
                                $roomcount_act='SELECT COUNT(*) AS count FROM room WHERE hotel_id="'.$result['hotel_id'].'" AND room_inactive="on"';
                             
                                  $roomquery_inact= mysqli_query($conn,$roomcount_inact) or die(mysqli_error($conn));
                                  $roomquery_act= mysqli_query($conn,$roomcount_act) or die(mysqli_error($conn));
                                

                                 	?>

                                   <tr class="tr-1 veiw_sus_appr">
									<td class="td-name capitalize listing_name"><?php echo $result['hotel_name'];   ?></td>
									<td class="td-name capitalize"><?php echo $result['hotel_city'];  ?></td>
                             <?php if (mysqli_num_rows($roomquery_inact)> 0) {
                             	        $cnt=mysqli_fetch_assoc($roomquery_inact);
                             	        $inactive_count= $cnt['count']."</br>";
                             	      // echo   count($cnt);
                             }  ?>
                              <?php if (mysqli_num_rows($roomquery_act)> 0) {
                             	        $cnt_act=mysqli_fetch_assoc($roomquery_act);
                             	        $active_count= $cnt_act['count'];
                             	      // echo   count($cnt);
                             }  ?>

									<td class="capitalize"><?php echo $active_count."/".$inactive_count; ?></td>
									<td class="capitalize"><?php echo "1/9";   ?></td>
									<?php if ($result['hotel_inactive']== "on") { ?>
										    
										    <td class=""><span class="db-not-success"><?php echo "Inactive";  ?></span></td>
									<?php }else{ ?>

                                             <td class=""><span class="db-success"><?php echo "Active";  ?></span></td>
									<?php } ?>
									<?php if ($result['hotel_status']=="Approved") { ?>

										<td class="status_wrap appr" ><span class="db-success"><?php echo $result['hotel_status']; ?></span></td>
										<?php }elseif ($result['hotel_status']=="Suspended") {?>

										<td class="status_wrap appr"><span class="db-not-success"><?php echo $result['hotel_status']; ?></span></td>
										
										<?php }else{ ?>

										<td class="status_wrap appr"><span class="db-not-success vendor-pending"><?php echo $result['hotel_status']; ?></span></td>
										<?php } ?>
									
									<td class="tdwrap sus_appr">
									<div class="buttonsWrap_vendors">
										<?php if ($_GET['status']=="Suspended") { ?>
											
												<div class="row">
												<a class="waves-effect waves-light btn" href="showsingle_hotelrecord.php?id=<?php echo $result['hotel_id'];  ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name']; ?>">Veiw</a>
												<a class="waves-effect waves-light btn" href="#">Delete</a>
											</div>

										<?php }else{ ?>
     
										<div class="row">
                                              
                                              <a class="waves-effect waves-light btn" href="showsingle_hotelrecord.php?id=<?php echo $result['hotel_id'];  ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name']; ?>">Veiw</a>
											<a class="waves-effect waves-light btn" href="edit_hotel.php?id=<?php echo $result['hotel_id'];  ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name']; ?>">Edit</a>
											<a class="waves-effect waves-light btn" href="#">Delete</a>

									     <?php if ($result['hotel_status']=="Approved") { ?>
									     	
									     <a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" >Suspend</a>

									     <a  onclick="show_suspend(event)" id="<?php echo $result['hotel_id'] ?>" u_id="<?php echo $result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;" list-name="<?php echo $result['hotel_name']; ?>">Suspend</a>

									     <a  onclick="show_approve(event)"  id="<?php echo $result['hotel_id'] ?>" u_id="<?php echo $result['user_id'] ?>" class="approve btn" value="Approved" style="display: none;" list-name="<?php echo $result['hotel_name']; ?>">Approve</a>
									     <?php  }else{ ?>

									     <a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" style="display: none;"  >Suspend</a>

									     <a  onclick="show_suspend(event)" id="<?php echo $result['hotel_id'] ?>" u_id="<?php echo $result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;" list-name="<?php echo $result['hotel_name']; ?>">Suspend</a>

									     <a  onclick="show_approve(event)"  id="<?php echo $result['hotel_id'] ?>" u_id="<?php echo $result['user_id'] ?>" class="approve btn" value="Approved" list-name="<?php echo $result['hotel_name']; ?>">Approve</a>
									     <?php  } ?>
											
										</div>

										<?php } ?>
										
										
									</div>
									</td>
								</tr>



            
    <?php    
 // print_r($result);
       } ?>
        
								
						
							</tbody>
						</table>

						<?php	}else{ ?>


						<?php if ($_GET['status']=='Suspended') { ?>

							 	<div class="row">
						        <div class="col s1"></div>
                                <div class="pull-left">
                                 <h3  style="color: red;"><?php echo $_GET['name']; ?> is Suspended<b>!</b></h3>
                                 <div style="padding-left: 5px; width: 635px;">
                                  <span >Listings cannot be added under the suspended users. Approve the user first to add listings under their name.</span>
                                  </div>
                                </div>
							 	
                             </div>

							<?php  }elseif ($_GET['status']=='Pending') { ?>
							
							<h3  style="color: red;"><?php echo $_GET['name']; ?> is Pending<b>!</b></h3>
							  <span>The user’s status is pending; first approve the user to add listings under his name</span>
								
							<?php }else{ ?>

                            <div class="text-center"><span><?php echo $_GET['name']; ?> has no Hotels</span></div>
                          <div class="row common-top text-center">
							<div class="">
								
							<a class="waves-effect waves-light btn modal-trigger spc-modal" href="db-add-hotels.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>">Add New Hotel</a>
								
							</div>
					   </div>
							<?php } ?>
                         

							<?php }?>
					</div>
				</div>
			
				
			</div>
			<?php include '../footer_inner_folder.php'; ?>
			<?php include '../../common-ftns/suspend_reason_modal.php'; ?>
            <script src="../../js/hotel-js/hotel_approve.js"></script>
            <script src="../../js/hotel-js/hotel_suspend.js"></script>

			</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>