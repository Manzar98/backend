<?php 
  
   include '../../common-sql.php';
  
   // $roomQuery=select("room",array("user_id"=>2));


   

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
						<div>
							<span style="margin-left: 7px;">Name:</span>
							<span style="color: green;"><b><?php echo $_GET['name']; ?></b></span>
						</div>
						</div>
						
						
				<?php

								if (mysqli_num_rows($room_resp) > 0) { 	?>

								<div class="row">
									<div class="col s1"></div>
									<div class="col s8  ">	
										<input  type="text" class="input-field" id="mysearch" onkeyup="myFunction(event)" placeholder="Search">
									</div>
									<div class="">
										<input class="waves-effect waves-light btn" id="inptbtn" type="button"  onclick="myFunction(event)" value="Search"> 
									</div>
								</div>	
						<table class="bordered responsive-table" id="h_table">
							<thead>
								<tr>
									<th>Room Name</th>
									<th>Hotel</th>
									<th>Number of Rooms</th>
									<th>Charges per Night</th>
									<th>Status</th>
									
								</tr>
							</thead>
							<tbody class="wrap-td">
								

								
                               <?php    while ($result=mysqli_fetch_assoc($room_resp)) { ?>

                                   <tr>
                                   	<td class="td-name"><?php echo $result['room_name'];   ?></td>
									<td class="td-name"><?php echo $result['hotel_name'];   ?></td>
									<td class="text-center "><?php echo $result['room_nosroom'];   ?></td>
									<td class="text-center"><?php echo $result['room_perni8'];   ?></td>
									<?php if ($result['room_inactive']== "on") { ?>
										    
										    <td class="text-center"><span class="db-not-success"><?php echo "Inactive";  ?></span></td>
									<?php }else{ ?>

                                             <td class="text-center"><span class="db-not-success"><?php echo "Pending";  ?></span></td>
									<?php } ?>
									<td  class="tdwrap">
									<div class="buttonsWrap">
										<div class="row">
											<?php if ($_GET['status']=="Suspended") {?>

													<a class="waves-effect waves-light btn" href="showsingle_roomrecord.php?id=<?php echo $result['room_id'];  ?>&h_id=<?php echo $result['hotel_id']; ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name']; ?>&user_id=<?php echo $_GET['id'] ?>">Veiw</a>
													<a class="waves-effect waves-light btn" href="#">Delete</a>

												
											<?php }else{ ?>

													<a class="waves-effect waves-light btn" href="showsingle_roomrecord.php?id=<?php echo $result['room_id'];  ?>&h_id=<?php echo $result['hotel_id']; ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name']; ?>&user_id=<?php echo $_GET['id'] ?>">Veiw</a>
													<a class="waves-effect waves-light btn" href="edit_room.php?id=<?php echo $result['room_id'];  ?>&h_id=<?php echo $result['hotel_id']; ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name']; ?>&user_id=<?php echo $_GET['id'] ?>">Edit</a>
													<a class="waves-effect waves-light btn" href="#">Delete</a>
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

							<?php  }else{ ?>

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

				</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>