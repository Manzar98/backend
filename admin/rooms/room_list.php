<?php   
   include '../../common-sql.php';  
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of Rooms</title>

<?php  include '../header_inner_folder.php'; 

    $roomQuery=    'SELECT * FROM room where user_id="'.$_GET['id'].'" ORDER BY room_id DESC ';
          $room_resp =mysqli_query($conn,$roomQuery)  or die(mysqli_error($conn));
?>

				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="row">
						<div class="db-title col s9">
							<h3><img src="../../images/icon/dbc5.png" alt=""/> <?php echo $_GET['name']; ?> Rooms</h3>
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

								if (mysqli_num_rows($room_resp) > 0) { 	?>

								<?php include '../../common-ftns/filter-sus-app-pen.php'; ?>
						<table class="bordered responsive-table" id="h_table">
							<thead>
								<tr>
									<th>Room Name</th>
									<th>Hotel</th>
									<th>Number of Rooms</th>
									<th>Charges per Night</th>
									<th>Status 1</th>
									<th>Status 2</th>
									
								</tr>
							</thead>
							<tbody class="wrap-td">
								

								
                               <?php    while ($result=mysqli_fetch_assoc($room_resp)) { ?>

                                   <tr class="tr-1">
                                   	<td class="td-name capitalize listing_name"><?php echo $result['room_name'];   ?></td>
									<td class="td-name capitalize"><?php echo $result['hotel_name'];   ?></td>
									<td class="capitalize "><?php echo $result['room_nosroom'];   ?></td>
									<td class="td-name capitalize"><?php echo $result['room_perni8'];   ?></td>
									<?php if ($result['room_inactive']== "on") { ?>
										    
										    <td class=""><span class="db-not-success"><?php echo "Inactive";  ?></span></td>
									<?php }else{ ?>

                                             <td class=""><span class="db-success"><?php echo "Active";  ?></span></td>
									<?php } ?>
									<?php if ($result['room_status']=="Approved") { ?>

										<td class="status_wrap appr" ><span class="db-success"><?php echo $result['room_status']; ?></span></td>
										<?php }elseif ($result['room_status']=="Suspended") {?>

										<td class="status_wrap appr"><span class="db-not-success"><?php echo $result['room_status']; ?></span></td>
										
										<?php }else{ ?>

										<td class="status_wrap appr"><span class="db-not-success vendor-pending"><?php echo $result['room_status']; ?></span></td>
										<?php } ?>
									<td  class="tdwrap sus_appr">
									<div class="buttonsWrap_vendors">
										<div class="row">
											<?php if ($_GET['status']=="Suspended") {?>

													<a class="waves-effect waves-light btn" href="showsingle_roomrecord.php?id=<?php echo $result['room_id'];  ?>&h_id=<?php echo $result['hotel_id']; ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name']; ?>&user_id=<?php echo $_GET['id'] ?>">Veiw</a>
													<a class="waves-effect waves-light btn" href="#">Delete</a>

												
											<?php }else{ ?>

													<a class="waves-effect waves-light btn" href="showsingle_roomrecord.php?id=<?php echo $result['room_id'];  ?>&h_id=<?php echo $result['hotel_id']; ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name']; ?>&user_id=<?php echo $_GET['id'] ?>">Veiw</a>
													<a class="waves-effect waves-light btn" href="edit_room.php?id=<?php echo $result['room_id'];  ?>&h_id=<?php echo $result['hotel_id']; ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name']; ?>&user_id=<?php echo $_GET['id'] ?>">Edit</a>
													<a class="waves-effect waves-light btn" href="#">Delete</a>

													<?php if ($result['room_status']=="Approved") { ?>

													<a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended">Suspend</a>

													<a  onclick="show_suspend(event)" h_id="<?php echo $result['hotel_id'] ?>" u_id="<?php echo $result['user_id'] ?>" id="<?php echo $result['room_id']; ?>" tbl-name="room" col-name="room_status" col-name-reason="room_sus_reason" id-col="room_id" h-col="hotel_id" l-url="rooms/showsingle_roomrecord.php" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;">Suspend</a>

													<a  onclick="show_approve(event)"  h_id="<?php echo $result['hotel_id'] ?>" u_id="<?php echo $result['user_id'] ?>" id="<?php echo $result['room_id']; ?>" tbl-name="room" col-name="room_status" id-col="room_id" h-col="hotel_id" col-name-reason="room_sus_reason" l-url="rooms/showsingle_roomrecord.php" class="approve btn" value="Approved" style="display: none;">Approve</a>

													<?php  }else{ ?>

													<a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" style="display: none;" >Suspend</a>

													<a  onclick="show_suspend(event)" h_id="<?php echo $result['hotel_id'] ?>" u_id="<?php echo $result['user_id'] ?>" id="<?php echo $result['room_id']; ?>" tbl-name="room" col-name="room_status" col-name-reason="room_sus_reason" id-col="room_id" h-col="hotel_id" l-url="rooms/showsingle_roomrecord.php" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;">Suspend</a>

													<a  onclick="show_approve(event)"  h_id="<?php echo $result['hotel_id'] ?>" u_id="<?php echo $result['user_id'] ?>" id="<?php echo $result['room_id']; ?>" tbl-name="room" col-name="room_status" id-col="room_id" h-col="hotel_id" col-name-reason="room_sus_reason" l-url="rooms/showsingle_roomrecord.php" class="approve btn" value="Approved" >Approve</a>


													<?php   } ?>
											<?php } ?>
											
										</div>
										
									</div>
									</td>
								</tr>



            
    <?php    
 // print_r($result);
       } ?>
        
								
						
							</tbody>
						</table>
						<?php 	}else{ ?>


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

                          <div class="text-center"><span><?php echo $_GET['name']; ?> has no Rooms</span></div>
						<div class="row common-top text-center">
							<div class="">
								
								<a class="waves-effect waves-light btn modal-trigger spc-modal" href="db-add-rooms.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>">Add New Room</a>
								
							</div>
						</div>
							<?php } ?>
 
						

						 <?php	}?>
					</div>
				</div>
			
			</div>

			<?php include '../footer_inner_folder.php'; ?>
			<?php include '../../common-ftns/suspend_reason_modal.php'; ?>
            <?php  include"../../methods/approve_list.php";  ?>
            <?php  include"../../methods/suspend_list.php";  ?>

				</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>