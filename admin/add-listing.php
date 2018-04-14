

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title> Add Lists</title>
	  <?php  include 'header.php'; ?>
   <?php  if ($_GET['status']=="Approved") {?>
   
 
				<div class="db-cent-2">
					<div class="db-2-main-1">
						<a href="hotels/db-add-hotels.php?user_id=<?php echo $_GET['user_id']; ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>"><div class="db-2-main-2"> <img src="../images/icon/dbc5.png" alt=""> <span>Hotels</span>
							<p>All the Lorem Ipsum generators on the</p>
						</div>
					</div></a>

					<div class="db-2-main-1">
						<a href="rooms/db-add-rooms.php?user_id=<?php echo $_GET['user_id']; ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>">
							<div class="db-2-main-2"> <img src="../images/icon/dbc6.png" alt=""> <span>Rooms</span>
								<p>All the Lorem Ipsum generators on the</p>
							</div>
						</a>
					</div>
					<div class="db-2-main-1">
						<a href="banquets/db-add-banquet-hall.php?user_id=<?php echo $_GET['user_id']; ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>">
							<div class="db-2-main-2"> <img src="../images/icon/dbc3.png" alt=""> <span>Banquet Halls</span>
								<p>All the Lorem Ipsum generators on the</p>
							</div>
						</a>
					</div>

					<div class="db-2-main-1">
						<a href="conferences/db-add-conference-hall.php?user_id=<?php echo $_GET['user_id']; ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>">
							<div class="db-2-main-2"> <img src="../images/icon/dbc3.png" alt=""> <span>Conference Halls</span>
								<p>All the Lorem Ipsum generators on the</p>
							</div>
						</a>
					</div>
					
					<div class="db-2-main-1">
						<a href="tours/db-add-tours.php?user_id=<?php echo $_GET['user_id']; ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>">
							<div class="db-2-main-2"> <img src="../images/icon/dbc3.png" alt=""> <span>Tour Packages</span>
								<p>All the Lorem Ipsum generators on the</p>
							</div>
						</a>
					</div>

					<div class="db-2-main-1">
						<a href="events/db-add-events.php?user_id=<?php echo $_GET['user_id']; ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>">
							<div class="db-2-main-2"> <img src="../images/icon/dbc3.png" alt=""> <span>Event Packages</span>
								<p>All the Lorem Ipsum generators on the</p>
							</div>
						</a>
					</div>
				</div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../images/icon/dbc5.png" alt=""/> My Bookings</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						<table class="bordered responsive-table">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Phone</th>
									<th>City</th>
									<th>Arrival</th>
									<th>Departure</th>
									<th>Members</th>
									<th>Payment</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>01</td>
									<td>Alvin</td>
									<td>+01 4215 3521</td>
									<td><span class="db-tab-hi">New york,</span>USA</td>
									<td>12may</td>
									<td>20may</td>
									<td>12</td>
									<td><a href="#" class="db-success">Success</a>
									</td>
								</tr>
								<tr>
									<td>02</td>
									<td>Liam</td>
									<td>+01 2484 6521</td>
									<td><span class="db-tab-hi">Bangalore,</span>India</td>
									<td>18apr</td>
									<td>24apr</td>
									<td>12</td>
									<td><a href="#" class="db-success">Success</a>
									</td>
								</tr>
								<tr>
									<td>03</td>
									<td>Logan</td>
									<td>+01 6524 6521</td>
									<td><span class="db-tab-hi">Los Angeles,</span>USA</td>
									<td>05dec</td>
									<td>12dec</td>
									<td>12</td>
									<td><a href="#" class="db-not-success">Pending</a>
									</td>
								</tr>
								<tr>
									<td>04</td>
									<td>Michael</td>
									<td>+01 3652 1425</td>
									<td><span class="db-tab-hi">Bristol,</span>UK</td>
									<td>14jen</td>
									<td>24jen</td>
									<td>12</td>
									<td><a href="#" class="db-not-success">Pending</a>
									</td>
								</tr>
								<tr>
									<td>05</td>
									<td>Alvin</td>
									<td>+01 4215 3521</td>
									<td><span class="db-tab-hi">New york,</span>USA</td>
									<td>12may</td>
									<td>20may</td>
									<td>12</td>
									<td><a href="#" class="db-success">Success</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../images/icon/dbc6.png" alt=""/> My Events</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						<table class="bordered responsive-table">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Phone</th>
									<th>City</th>
									<th>Arrival</th>
									<th>Departure</th>
									<th>Members</th>
									<th>Payment</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>01</td>
									<td>Alvin</td>
									<td>+01 4215 3521</td>
									<td><span class="db-tab-hi">New york,</span>USA</td>
									<td>12may</td>
									<td>20may</td>
									<td>12</td>
									<td><a href="#" class="db-success">Success</a>
									</td>
								</tr>
								<tr>
									<td>02</td>
									<td>Liam</td>
									<td>+01 2484 6521</td>
									<td><span class="db-tab-hi">Bangalore,</span>India</td>
									<td>18apr</td>
									<td>24apr</td>
									<td>12</td>
									<td><a href="#" class="db-success">Success</a>
									</td>
								</tr>
								<tr>
									<td>03</td>
									<td>Logan</td>
									<td>+01 6524 6521</td>
									<td><span class="db-tab-hi">Los Angeles,</span>USA</td>
									<td>05dec</td>
									<td>12dec</td>
									<td>12</td>
									<td><a href="#" class="db-not-success">Pending</a>
									</td>
								</tr>
								<tr>
									<td>04</td>
									<td>Michael</td>
									<td>+01 3652 1425</td>
									<td><span class="db-tab-hi">Bristol,</span>UK</td>
									<td>14jen</td>
									<td>24jen</td>
									<td>12</td>
									<td><a href="#" class="db-not-success">Pending</a>
									</td>
								</tr>
								<tr>
									<td>05</td>
									<td>Alvin</td>
									<td>+01 4215 3521</td>
									<td><span class="db-tab-hi">New york,</span>USA</td>
									<td>12may</td>
									<td>20may</td>
									<td>12</td>
									<td><a href="#" class="db-success">Success</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="db-cent-3">
					<div class="db-cent-acti">
						<div class="db-title">
							<h3><img src="../images/icon/dbc1.png" alt=""/> My Activity</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						<ul>
							<li>
								<div class="db-cent-wr-img"> <img src="../images/users/3.png" alt=""> </div>
								<div class="db-cent-wr-con">
									<h6>Hotel Booking Canceled</h6> <span class="lr-revi-date">21th July, 2016</span>
									<p>The hotel is clean, convenient and good value for money. Staff are courteous and helpful. However, they need more training to be efficient.</p>
									<ul>
										<li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
										<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
										<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
										<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
										<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
									</ul>
								</div>
							</li>
							<li>
								<div class="db-cent-wr-img"> <img src="../images/users/3.png" alt=""> </div>
								<div class="db-cent-wr-con">
									<h6>Hotel Payment Success</h6> <span class="lr-revi-date">08th August, 2016</span>
									<p>The hotel is clean, convenient and good value for money. Staff are courteous and helpful. However, they need more training to be efficient.</p>
									<ul>
										<li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
										<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
										<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
										<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
										<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</div>
				 <?php  }else if ($_GET['status']=='Suspended') { ?>
				 <div class="db-cent-3" style="min-height: 458px;">
				 	<div class="db-cent-table db-com-table">
				 				<h3  style="color: red;"><?php echo $_GET['name']; ?> is Suspended<b>!</b></h3>
				 				<div style="padding-left: 5px; width: 635px;">
				 					<span >Listings cannot be added under the suspended users. Approve the user first to add listings under their name.</span>
				 				</div>
				 	</div>
				 </div>


				<?php  }else{ ?>

                   <div class="db-cent-3" style="min-height: 458px;">
				 	<div class="db-cent-table db-com-table">
                           <h3  style="color: red;"><?php echo $_GET['name']; ?> is Pending<b>!</b></h3>
                           <div style="padding-left: 5px; width: 635px;">
							  <span>The user’s status is pending; first approve the user to add listings under his name</span>
							</div>
							</div>
						</div>

			<?php }  ?>
			</div>

	<?php include'footer.php'; ?>

</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>