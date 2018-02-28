<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>Manage Lists</title>
	<?php include 'header-main.php'; 


      include"../common-apis/api.php";

    $reg_hotel=select('hotel',array("user_id"=>$_SESSION['user_id']));
    $reg_room=select('room',array("user_id"=>$_SESSION['user_id']));
    $reg_banquet=select('banquet',array("user_id"=>$_SESSION['user_id']));
    $reg_conference=select('conference',array("user_id"=>$_SESSION['user_id']));
    $reg_tour=select('tour',array("user_id"=>$_SESSION['user_id']));
    $reg_event=select('event',array("user_id"=>$_SESSION['user_id']));
	?>


	
				<div class="db-cent-2">
					<div class="db-2-main-1">
						<a href="
						hotels/hotel_list.php"><div class="db-2-main-2"> <img src="../images/icon/dbc5.png" alt=""> <span>Hotels</span>
						<?php if (mysqli_num_rows($reg_hotel)<1) {?>

								  <h2>0</h2>
						<?php 	}else{ ?>

                                   <h2><?php echo mysqli_num_rows($reg_hotel) ?></h2> 

						<?php } ?>
							
						</div></a>
					</div>

					<a href="rooms/room_list.php"><div class="db-2-main-1">
						<div class="db-2-main-2"> <img src="../images/icon/dbc6.png" alt=""> <span>Rooms</span>
							 
						<?php if (mysqli_num_rows($reg_room)<1) {?>
						
								  <h2>0</h2>
						<?php 	}else{ ?>

                                   <h2><?php echo mysqli_num_rows($reg_room) ?></h2> 

						<?php } ?> 

						</div>
					</div></a>
					<a href="banquets/banquet_list.php"><div class="db-2-main-1">
						<div class="db-2-main-2"> <img src="../images/icon/dbc3.png" alt=""> <span>Banquet Halls</span>
							
                        <?php if (mysqli_num_rows($reg_banquet)<1) {?>
						
								  <h2>0</h2>
						<?php 	}else{ ?>

                                   <h2><?php echo mysqli_num_rows($reg_banquet) ?></h2> 

						<?php } ?> 

						</div>
					</div></a>

					<a href="conferences/conference_list.php"><div class="db-2-main-1">
						<div class="db-2-main-2"> <img src="../images/icon/dbc3.png" alt=""> <span>Conference Halls</span>
							
                        <?php if (mysqli_num_rows($reg_conference)<1) {?>
						
								  <h2>0</h2>
						<?php 	}else{ ?>

                                   <h2><?php echo mysqli_num_rows($reg_conference) ?></h2> 

						<?php } ?>  
						</div>
					</div></a>
					
					<a href="tours/tour_list.php"><div class="db-2-main-1">
						<div class="db-2-main-2"> <img src="../images/icon/dbc3.png" alt=""> <span>Tour Packages</span>
							
						<?php if (mysqli_num_rows($reg_tour)<1) {?>
						
								  <h2>0</h2>
						<?php 	}else{ ?>

                                   <h2><?php echo mysqli_num_rows($reg_tour) ?></h2> 

						<?php } ?>  
						</div>
					</div></a>

					<a href="events/event_list.php"><div class="db-2-main-1">
						<div class="db-2-main-2"> <img src="../images/icon/dbc3.png" alt=""> <span>Event Packages</span>
							
						<?php if (mysqli_num_rows($reg_event)<1) {?>
						
								  <h2>0</h2>
						<?php 	}else{ ?>

                                   <h2><?php echo mysqli_num_rows($reg_event) ?></h2> 

						<?php } ?>   
						</div>
					</div></a>
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
			</div>
			<div class="db-righ">
				<h4>Notifications(18)</h4>
				<ul>
					<li>
						<a href="#!"> <img src="../images/icon/dbr1.jpg" alt="">
							<h5>Joseph, write a review</h5>
							<p>All the Lorem Ipsum generators on the</p> <span>2 hours ago</span> </a>
					</li>
					<li>
						<a href="#!"> <img src="../images/icon/dbr2.jpg" alt="">
							<h5>14 New Messages</h5>
							<p>All the Lorem Ipsum generators on the</p> <span>4 hours ago</span> </a>
					</li>
					<li>
						<a href="#!"> <img src="../images/icon/dbr3.jpg" alt="">
							<h5>Ads expairy soon</h5>
							<p>All the Lorem Ipsum generators on the</p> <span>10 hours ago</span> </a>
					</li>
					<li>
						<a href="#!"> <img src="../images/icon/dbr4.jpg" alt="">
							<h5>Post free ads - today only</h5>
							<p>All the Lorem Ipsum generators on the</p> <span>12 hours ago</span> </a>
					</li>
					<li>
						<a href="#!"> <img src="../images/icon/dbr5.jpg" alt="">
							<h5>listing limit increase</h5>
							<p>All the Lorem Ipsum generators on the</p> <span>14 hours ago</span> </a>
					</li>
					<li>
						<a href="#!"> <img src="../images/icon/dbr6.jpg" alt="">
							<h5>mobile app launch</h5>
							<p>All the Lorem Ipsum generators on the</p> <span>18 hours ago</span> </a>
					</li>
					<li>
						<a href="#!"> <img src="../images/icon/dbr7.jpg" alt="">
							<h5>Setting Updated</h5>
							<p>All the Lorem Ipsum generators on the</p> <span>20 hours ago</span> </a>
					</li>
					<li>
						<a href="#!"> <img src="../images/icon/dbr8.jpg" alt="">
							<h5>Increase listing viewers</h5>
							<p>All the Lorem Ipsum generators on the</p> <span>2 days ago</span> </a>
					</li>
				</ul>
			</div>
		</div>
		<!--END DASHBOARD SECTION-->
		<!--TOP SECTION-->
		<div class="hom-footer-section">
			<div class="container">
				<div class="row">
					<div class="foot-com foot-1">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							</li>
						</ul>
					</div>
					<div class="foot-com foot-2">
						<h5>Phone: (+404) 142 21 23 78</h5> </div>
					<div class="foot-com foot-3">
						<!--<a class="waves-effect waves-light" href="#">online room booking</a>--><a class="waves-effect waves-light" href="../booking.html">room reservation</a> </div>
					<div class="foot-com foot-4">
						<a href="#"><img src="../images/card.png" alt="" />
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--END HEADER SECTION-->
	<footer class="site-footer clearfix">
		<div class="sidebar-container">
			<div class="sidebar-inner">
				<div class="widget-area clearfix">
					<div class="widget widget_azh_widget">
						<div>
							<div class="container">
								<div class="row">
									<div class="col-sm-12 col-md-3 foot-logo"> <img src="../images/logo1.png" alt="logo">
										<p class="hasimg">Hotels worldwide incl. Infos, Ratings and Photos. Make your Hotel Reservation cheap.</p>
										<p class="hasimg">The top-rated hotel booking services.</p>
									</div>
									<div class="col-sm-12 col-md-3">
										<h4>Support &amp; Help</h4>
										<ul class="two-columns">
											<li><a href="dashboard.php">Dashboard</a>
											</li>
											<li><a href="db-activity.html">DB Activity</a>
											</li>
											<li><a href="../booking.html">Booking</a>
											</li>
											<li><a href="../contact-us.html">Contact Us</a>
											</li>
											<li><a href="../about-us.html">About Us</a>
											</li>
											<li><a href="../aminities.html">Aminities</a>
											</li>
											<li><a href="../blog.html">Blog</a>
											</li>
											<li><a href="../menu1.html">Food Menu</a>
											</li>
										</ul>
									</div>
									<div class="col-sm-12 col-md-3">
										<h4>Cities Covered</h4>
										<ul class="two-columns">
											<li><a href="#!">Sydney</a>
											</li>
											<li><a href="#!">Basel</a>
											</li>
											<li><a href="#!">Copenhagen</a>
											</li>
											<li><a href="#!">Frankfurt</a>
											</li>
											<li><a href="#!">Vancouver</a>
											</li>
											<li><a href="#!">Auckland</a>
											</li>
											<li><a href="#!">Vienna</a>
											</li>
											<li><a href="#!">Los Angeles</a>
											</li>
										</ul>
									</div>
									<div class="col-sm-12 col-md-3">
										<h4>Address</h4>
										<p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A. Landmark : Next To Airport</p>
										<p> <span class="foot-phone">Phone: </span> <span class="foot-phone">+01 1245 2541</span> </p>
									</div>
								</div>
							</div>
						</div>
						<div class="foot-sec2">
							<div class="container">
								<div class="row">
									<div class="col-sm-12 col-md-3">
										<h4>Payment Options</h4>
										<p class="hasimg"> <img src="../images/payment.png" alt="payment"> </p>
									</div>
									<div class="col-sm-12 col-md-4">
										<h4>Subscribe Now</h4>
										<form>
											<ul class="foot-subsc">
												<li>
													<input type="text" placeholder="Enter your email id"> </li>
												<li>
													<input type="submit" value="submit"> </li>
											</ul>
										</form>
									</div>
									<div class="col-sm-12 col-md-5 foot-social">
										<h4>Follow with us</h4>
										<p>Join the thousands of other There are many variations of passages of Lorem Ipsum available</p>
										<ul>
											<li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
											<li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .widget-area -->
			</div>
			<!-- .sidebar-inner -->
		</div>
		<!-- #quaternary -->
	</footer>
	<section class="copy">
		<div class="container">
			<p>copyrights © 2017 RN53Themes.net. &nbsp;&nbsp;All rights reserved. </p>
		</div>
	</section>
	<section>
		<!-- LOGIN SECTION -->
		<div id="modal1" class="modal fade" role="dialog">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Hello... <span>{{ name }}</span></h1>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<h4>Login with social media</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="../images/cancel.png" alt="" />
					</a>
					<h4>Login</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<form class="s12">
						<div>
							<div class="input-field s12">
								<input type="text" data-ng-model="name" class="validate">
								<label>User name</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="password" class="validate">
								<label>Password</label>
							</div>
						</div>
						<div>
							<div class="s12 log-ch-bx">
								<p>
									<input type="checkbox" id="test5" />
									<label for="test5">Remember me</label>
								</p>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Login" class="waves-effect waves-light log-in-btn"> </div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal3">Forgot password</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- REGISTER SECTION -->
		<div id="modal2" class="modal fade" role="dialog">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Hello... <span>{{ name1 }}</span></h1>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<h4>Login with social media</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="../images/cancel.png" alt="" />
					</a>
					<h4>Create an Account</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<form class="s12">
						<div>
							<div class="input-field s12">
								<input type="text" data-ng-model="name1" class="validate">
								<label>User name</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="email" class="validate">
								<label>Email id</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="password" class="validate">
								<label>Password</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="password" class="validate">
								<label>Confirm password</label>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Register" class="waves-effect waves-light log-in-btn"> </div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- FORGOT SECTION -->
		<div id="modal3" class="modal fade" role="dialog">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Hello... <span>{{ name3 }}</span></h1>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<h4>Login with social media</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="../images/cancel.png" alt="" />
					</a>
					<h4>Forgot password</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<form class="s12">
						<div>
							<div class="input-field s12">
								<input type="text" data-ng-model="name3" class="validate">
								<label>User name or email id</label>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Submit" class="waves-effect waves-light log-in-btn"> </div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--ALL SCRIPT FILES-->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/angular.min.js"></script>
	<script src="../js/bootstrap.js" type="text/javascript"></script>
	<script src="../js/materialize.min.js" type="text/javascript"></script>
	<script src="../js/jquery.mixitup.min.js" type="text/javascript"></script>
	<script src="../js/custom.js"></script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>