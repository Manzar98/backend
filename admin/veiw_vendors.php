<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>Vendor-Profile</title>
<?php include 'header.php'; 
   
   include"../common-apis/api.php";


    $reg_Query= select('credentials',array("user_id"=>$_GET['id']));

    $reg_hotel=select('hotel',array("user_id"=>$_GET['id']));
    $reg_room=select('room',array("user_id"=>$_GET['id']));
    $reg_banquet=select('banquet',array("user_id"=>$_GET['id']));
    $reg_conference=select('conference',array("user_id"=>$_GET['id']));
    $reg_tour=select('tour',array("user_id"=>$_GET['id']));
    $reg_event=select('event',array("user_id"=>$_GET['id']));



?>
				<?php   
          
          while ($reg_Result=mysqli_fetch_assoc($reg_Query)) { 
                     $pro_img=substr($reg_Result['reg_photo'],3) ;  ?>
				<div class="db-profile"> <img src="<?php echo $pro_img; ?>" alt="">
					<h4><?php echo $reg_Result['reg_name'];  ?> <?php echo $reg_Result['reg_lstname']; ?></h4>
					<p><?php echo $reg_Result['reg_postal']; ?></p>
				</div>
				<div class="db-profile-view">
					<?php 
                          $userDob = $reg_Result['reg_birth'];
                          $dob = new DateTime($userDob);
                          $now = new DateTime();
                          $difference = $now->diff($dob);
                          $age = $difference->y;

                         $lastlogin=date_create($reg_Result['reg_lastlogin']);
					?>
					<table class="last-lgon_tbl">
						<thead>
							<th>Last Login</th>
						</thead>
						<tbody>
							<td><?php echo date_format($lastlogin, 'd-m-Y '); ?></td>
						</tbody>
					</table>
					<table class="responsive-table profle-forms-reocrds-tbl" >
						<thead>
							<tr>
								<th>Age</th>
								<th class="TT" onClick="document.location.href='hotels/hotel_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'">Hotels</th>
								<th class="TT" onClick="document.location.href='rooms/room_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'">Rooms</th>
								<th class="TT" onClick="document.location.href='banquets/banquet_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'">Banquets</th>
								<th class="TT" onClick="document.location.href='conferences/conference_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'">Conferences</th>
								<th class="TT" onClick="document.location.href='tours/tour_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'">Tours</th>
								<th class="TT" onClick="document.location.href='events/event_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'">Events</th>
								<th>Join Date</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $age; ?></td>
								
								<?php if (mysqli_num_rows($reg_hotel)< 1) { ?>
							     <td class="TT" onClick="document.location.href='hotels/hotel_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'">0</td>
								<?php }else{ ?>
								   <td class="TT" onClick="document.location.href='hotels/hotel_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'"><?php echo mysqli_num_rows($reg_hotel); ?></td>
								<?php } ?>
								
								<?php if (mysqli_num_rows($reg_room)< 1) { ?>
								<td class="TT" onClick="document.location.href='rooms/room_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'">0</td>
								<?php }else{ ?>
								<td class="TT" onClick="document.location.href='rooms/room_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'"><?php echo mysqli_num_rows($reg_room); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_banquet)< 1) { ?>
								<td class="TT" onClick="document.location.href='banquets/banquet_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'">0</td>
								<?php }else{ ?>
								<td class="TT" onClick="document.location.href='banquets/banquet_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'"><?php echo mysqli_num_rows($reg_banquet); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_conference)< 1) { ?>
								<td class="TT" onClick="document.location.href='conferences/conference_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'">0</td>
								<?php }else{ ?>
								<td class="TT" onClick="document.location.href='conferences/conference_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'"><?php echo mysqli_num_rows($reg_conference); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_tour)< 1) { ?>
								<td class="TT" onClick="document.location.href='tours/tour_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'">0</td>
								<?php }else{ ?>
								<td class="TT" onClick="document.location.href='tours/tour_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'"><?php echo mysqli_num_rows($reg_tour); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_event)< 1) { ?>
								<td class="TT" onClick="document.location.href='events/event_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'">0</td>
								<?php }else{ ?>
								<td class="TT" onClick="document.location.href='events/event_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>'"><?php echo mysqli_num_rows($reg_event); ?></td>
								<?php } ?>

								<td><?php echo $reg_Result['reg_joinD']; ?></td>
								
							</tr>
						</tbody>
					</table>
					
				</div>
				
				 	<div class="db-profile-edit">

					<form class="col s12" action="registration-update.php" method="post" role="form" id="registor-form">
						
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-10 ">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12 ">
								<label >First Name :</label>
								<div class="pull-left">
									 <span><?php echo $reg_Result['reg_name'];  ?></span>
									 </div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12 ">
								<label>Last Name :</label>
								<div class="pull-left">
									<span><?php echo $reg_Result['reg_lstname'];  ?></span> 
								</div>
							</div>
						</div>
						<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<label>Email Address :</label>
							<div class="pull-left">
								<span><?php echo $reg_Result['reg_email'];  ?></span>
								 
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<label>Country</label>
							<div class="pull-left">
								  <span><?php echo $reg_Result['reg_country'];  ?></span>
								 </div>
						</div>
						</div>
                         
                        <div class="row">

                         	<div class="col-md-6 col-sm-12 col-xs-12">
                         		<label>Mobile Number :</label>
                         		<div class="pull-left">
                         		   <span><?php echo $reg_Result['reg_phone'];  ?></span>
                         		</div>   
                         	</div>
                         	<div class="col-md-6 col-sm-12 col-xs-12">
                         		<label>Postal Address</label>
                         		<div class="pull-left">
                         		   <span><?php echo $reg_Result['reg_postal'];  ?></span>
                         	    </div>
                         	</div>
   
                        </div>
                        <div class="row">
                        	
                        	<div class="col-md-6 col-sm-12 col-xs-12">
                        		<label>City :</label>
                        		<div class="pull-left">
                        		   <span><?php echo $reg_Result['reg_city'];  ?></span>
                        		</div>   
                        	</div>
                        	<div class="col-md-6 col-sm-12 col-xs-12">
                        		<label>Province :</label>
                        	    <div class="pull-left">
                        		   <span><?php echo $reg_Result['reg_province'];  ?></span>
                        		</div> 
                        	</div>

                        </div>
						

				</div>
				</div>
            </div>
			
			</div>



			<?php } ?>
	<?php include 'footer.php'; ?>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
</html>


	




	