<?php
include 'common-sql.php';


$selectHotel = 'SELECT `hotel_name` FROM `hotel` WHERE `user_id`=2 ';


$selectHotelQuery=mysqli_query($conn,$selectHotel) or die(mysqli_error($conn));



?>






<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Add a Room</title>
	<!-- META TAGS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- FAV ICON(BROWSER TAB ICON) -->
	<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
	<!-- GOOGLE FONT -->
	<link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
	<!-- FONTAWESOME ICONS -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- ALL CSS FILES -->
	<link href="css/materialize.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- Bootstrap Date-Picker Plugin -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
	<link href="css/responsive.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
<![endif]-->
</head>

<body data-ng-app="">
	<!--MOBILE MENU-->
	<section>
		<div class="mm">
			<div class="mm-inn">
				<div class="mm-logo">
					<a href="main.html"><img src="images/logo.png" alt="">
					</a>
				</div>
				<div class="mm-icon"><span><i class="fa fa-bars show-menu" aria-hidden="true"></i></span>
				</div>
				<div class="mm-menu">
					<div class="mm-close"><span><i class="fa fa-times hide-menu" aria-hidden="true"></i></span>
					</div>
					<ul>
						<li><a href="main.html">Home - Default</a>
						</li>
						<li><a href="index-1.html">Home - Reservation</a>
						</li>
						<li><a href="index-2.html">Home - FullSlider</a>
						</li>
						<li><a href="index-3.html">Home - Block Color</a>
						</li>
						<li><a href="room-details.html">Room Details</a>
						</li>
						<li><a href="room-details-block.html">Room Details Block</a>
						</li>
						<li><a href="hotel-details.html">Hotel Details</a>
						</li>
						<li><a href="hotel-detail.html">Hotel Details - 1</a>
						</li>
						<li><a href="about-us.html">About Us</a>
						</li>
						<li><a href="aminities.html">Aminities</a>
						</li>
						<li><a href="aminities1.html">Aminities - 1</a>
						</li>
						<li><a href="menu.html">Food Menu</a>
						</li>
						<li><a href="menu1.html">Food Menu - 1</a>
						</li>
						<li><a href="blog.html">Blog</a>
						</li>
						<li><a href="blog-inner.html">Blog Inner</a>
						</li>
						<li><a href="dashboard.html">User Dashboard</a>
						</li>
						<li><a href="db-activity.html">DB Activity</a>
						</li>
						<li><a href="db-booking.html">DB-Booking</a>
						</li>
						<li><a href="db-event.html">DB-Event</a>
						</li>
						<li><a href="db-new-booking.html">DB New Booking</a>
						</li>
						<li><a href="booking.html">Booking</a>
						</li>
						<li><a href="collapsible.html">Collapsible</a>
						</li>
						<li><a href="events.html">Events</a>
						</li>
						<li><a href="form-fields.html">Form Fields</a>
						</li>
						<li><a href="preloading.html">Preloading</a>
						</li>
						<li><a href="gallery.html">Gallery</a>
						</li>
						<li><a href="gallery1.html">Gallery - 1</a>
						</li>
						<li><a href="gallery2.html">Gallery - 2</a>
						</li>
						<li><a href="detail.html">Room Detail</a>
						</li>
						<li><a href="all-rooms.html">All Rooms</a>
						</li>
						<li><a href="all-rooms1.html">All Rooms - 1</a>
						</li>
						<li><a href="services.html">Services</a>
						</li>
						<li><a href="services1.html">Services - 1</a>
						</li>
						<li><a href="typho-grid.html">Grid Layout</a>
						</li>
						<li><a href="typo-alert.html">Alert Messages</a>
						</li>
						<li><a href="typo-all-head.html">All Headers</a>
						</li>
						<li><a href="typo-badges-labels.html">Labels</a>
						</li>
						<li><a href="typo-buttons.html">Buttons</a>
						</li>
						<li><a href="typo-pagination.html">Pagination</a>
						</li>
						<li><a href="typo-progressbar.html">Progressbar</a>
						</li>
						<li><a href="typo-slider.html">Image Sliders</a>
						</li>
						<li><a href="typo-table.html">Table</a>
						</li>
						<li><a href="typo-buttons.html">Buttons</a>
						</li>
						<li><a href="typo-pagination.html">Pagination</a>
						</li>
						<li><a href="typo-progressbar.html">Progressbar</a>
						</li>
						<li><a href="sitemap.html">Sitemap</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--HEADER SECTION-->
	<section>
		<!--TOP SECTION-->
		<div class="menu-section">
			<div class="container">
				<div class="row">
					<div class="top-bar">
						<ul>
							<li><a class='dropdown-button' href='#' data-activates='dropdown1'> My Account <i class="fa fa-angle-down"></i></a>
							</li>
							<li><a href="all-hotels.html">Our Hotels</a>
							</li>
							<li><a href="about-us.html">About Us</a>
							</li>
							<li><a href="contact-us.html">Contact Us</a>
							</li>
							<li><a class='dropdown-button' href='#' data-activates='dropdown2'>Language <i class="fa fa-angle-down"></i></a>
							</li>
							<li><a href="#">Toll Free No: 1800 102 7275</a>
							</li>
						</ul>
					</div>
					<div class="all-drop-down">
						<!-- Dropdown Structure -->
						<ul id='dropdown1' class='dropdown-content drop-con-man'>
							<li>
								<a href="dashboard.html"><img src="images/icon/15.png" alt=""> My Account</a>
							</li>
							<li>
								<a href="db-profile.html"><img src="images/icon/2.png" alt=""> My Profile</a>
							</li>
							<li>
								<a href="db-booking.html"><img src="images/icon/16.png" alt=""> My Bookings</a>
							</li>
							<li>
								<a href="db-event.html"><img src="images/icon/17.png" alt=""> My Events</a>
							</li>
							<li>
								<a href="db-activity.html"><img src="images/icon/14.png" alt=""> My Activity</a>
							</li>
							<li>
								<a href="#!" data-toggle="modal" data-target="#modal2"><img src="images/icon/5.png" alt=""> Register</a>
							</li>
							<li>
								<a href="#!" data-toggle="modal" data-target="#modal1"><img src="images/icon/6.png" alt=""> Log In</a>
							</li>
							<li>
								<a href="#!" data-toggle="modal" data-target="#modal3"><img src="images/icon/13.png" alt=""> Forgot Password</a>
							</li>
						</ul>
						<!-- Dropdown Structure -->
						<ul id='drop-home' class='dropdown-content drop-con-man'>
							<li><a href="main.html">Home - Default</a>
							</li>
							<li><a href="index-1.html">Home - Reservation</a>
							</li>
							<li><a href="index-2.html">Home - FullSlider</a>
							</li>
							<li><a href="index-3.html">Home - Block Color</a>
							</li>
						</ul>
						<!-- Dropdown Structure -->
						<ul id='dropdown2' class='dropdown-content drop-con-man'>
							<li><a href="#!">English</a>
							</li>
							<li><a href="#!">Spanish</a>
							</li>
							<li><a href="#!">Hindi</a>
							</li>
							<li><a href="#!">Russian</a>
							</li>
							<li><a href="#!">Portuguese</a>
							</li>
						</ul>
						<!-- ROOM Dropdown Structure -->
						<ul id='drop-room' class='dropdown-content drop-con-man'>
							<li><a href="all-rooms.html">All Suite Rooms</a>
							</li>
							<li><a href="room-details.html">Room Details</a>
							</li>
							<li><a href="room-details-block.html">Room Details Block</a>
							</li>
							<li><a href="room-details-1.html">Room Parallax</a>
							</li>
						</ul>
						<!-- PAGES Dropdown Structure -->
						<div id='drop-page' class='dropdown-content drop-con-man drop-full'>
							<div class="mm-1">
								<h4>Pages</h4>
								<ul>
									<li><a href="room-details.html">Room Details - 1</a>
									</li>
									<li><a href="room-details-1.html">Room Details - 2</a>
									</li>
									<li><a href="room-details-block.html">Room Details - 3</a>
									</li>
									<li><a href="all-rooms.html">All Rooms</a>
									</li>
									<li><a href="all-rooms1.html">All Rooms - 1</a>
									</li>
									<li><a href="aminities.html">Aminities</a>
									</li>
									<li><a href="aminities1.html">Aminities - 1</a>
									</li>
								</ul>
							</div>
							<div class="mm-1">
								<h4>Pages</h4>
								<ul>
									<li><a href="dashboard.html">User Dashboard</a>
									</li>
									<li><a href="db-activity.html">DB Activity</a>
									</li>
									<li><a href="db-booking.html">DB-Booking</a>
									</li>
									<li><a href="db-event.html">DB-Event</a>
									</li>
									<li><a href="db-new-booking.html">DB New Booking</a>
									</li>
									<li><a href="booking.html">Booking</a>
									</li>
									<li><a href="contact-us.html">Contact Us</a>
									</li>
								</ul>
							</div>
							<div class="mm-1">
								<h4>Pages</h4>
								<ul>
									<li><a href="blog.html">Blog</a>
									</li>
									<li><a href="blog-inner.html">Blog Inner</a>
									</li>
									<li><a href="events.html">Events</a>
									</li>
									<li><a href="gallery.html">Gallery</a>
									</li>
									<li><a href="gallery1.html">Gallery - 1</a>
									</li>
									<li><a href="gallery2.html">Gallery - 2</a>
									</li>
									<li><a href="collapsible.html">Collapsible</a>
									</li>
								</ul>
							</div>
							<div class="mm-1">
								<h4>Pages</h4>
								<ul>
									<li><a href="about-us.html">About Us</a>
									</li>
									<li><a href="services.html">Services</a>
									</li>
									<li><a href="services1.html">Services - 1</a>
									</li>
									<li><a href="typho-grid.html">Grid Layout</a>
									</li>
									<li><a href="typo-alert.html">Alert Messages</a>
									</li>
									<li><a href="form-fields.html">Form Fields</a>
									</li>
									<li><a href="menu.html">Food Menu</a>
									</li>
								</ul>
							</div>
							<div class="mm-1">
								<h4>Pages</h4>
								<ul>
									<li><a href="typo-all-head.html">All Headers</a>
									</li>
									<li><a href="typo-badges-labels.html">Labels</a>
									</li>
									<li><a href="typo-buttons.html">Buttons</a>
									</li>
									<li><a href="typo-pagination.html">Pagination</a>
									</li>
									<li><a href="typo-progressbar.html">Progressbar</a>
									</li>
									<li><a href="preloading.html">Preloading</a>
									</li>
									<li><a href="menu1.html">Food Menu - 1</a>
									</li>
								</ul>
							</div>
							<div class="mm-1">
								<h4>Pages</h4>
								<ul>
									<li><a href="typo-slider.html">Image Sliders</a>
									</li>
									<li><a href="typo-table.html">Table</a>
									</li>
									<li><a href="typo-buttons.html">Buttons</a>
									</li>
									<li><a href="typo-pagination.html">Pagination</a>
									</li>
									<li><a href="typo-progressbar.html">Progressbar</a>
									</li>
									<li><a href="sitemap.html">Sitemap</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="logo">
						<a href="main.html"><img src="images/logo.png" alt="" />
						</a>
					</div>
					<div class="menu-bar">
						<ul>
							<li><a href="#" class='dropdown-button' data-activates='drop-home'>Home <i class="fa fa-angle-down"></i></a>
							</li>
							<li><a href="#" class='dropdown-button' data-activates='drop-room'>Rooms <i class="fa fa-angle-down"></i></a>
							</li>
							<li><a href="services.html">Services</a>
							</li>
							<li><a href="menu.html">Menu</a>
							</li>
							<li><a href="events.html">Events</a>
							</li>
							<li><a href="aminities1.html">Amenities</a>
							</li>
							<li><a href="#" class='dropdown-button' data-activates='drop-page'>Pages <i class="fa fa-angle-down"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--TOP SECTION-->
		<!--DASHBOARD SECTION-->
		<div class="dashboard">
			<div class="db-left">
				<div class="db-left-1">
					<h4>Jana Novakova</h4>
					<p>Newyork, United States</p>
				</div>
				<div class="db-left-2">
					<ul>
						<li>
							<a href="dashboard.html"><img src="images/icon/db1.png" alt="" /> Add Listing</a>
						</li>
						<li>
							<a href="db-booking.html"><img src="images/icon/db2.png" alt="" /> My Bookings</a>
						</li>
						<li>
							<a href="db-new-booking.html"><img src="images/icon/db3.png" alt="" /> New Booking</a>
						</li>
						<li>
							<a href="db-event.html"><img src="images/icon/db4.png" alt="" /> Event</a>
						</li>
						<li>
							<a href="db-activity.html"><img src="images/icon/db5.png" alt="" /> Activity</a>
						</li>
						<li>
							<a href="db-profile.html"><img src="images/icon/db7.png" alt="" /> Profile</a>
						</li>
						<li>
							<a href="#"><img src="images/icon/db6.png" alt="" /> Payments</a>
						</li>
						<li>
							<a href="#"><img src="images/icon/db8.png" alt="" /> Logout</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
					<div class="db-cent-3">
						<div class="db-cent-table db-com-table">
							<div class="db-title">
								<h3><img src="images/icon/dbc5.png" alt=""/> Add Rooms</h3>
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have8suffered alteration in some form</p>
							</div>

							<div class="db-profile-edit">
								<form class="col s12"  data-toggle="validator" id="room-form" role="form" action="room-post.php" method="POST" enctype="multipart/form-data">

									<?php

									if (mysqli_num_rows($selectHotelQuery) > 0) { ?>
									<div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select"  >
										<label class="col s12">Select Hotel</label>
										<select  class="" name="hotel_name" >
											<option value="">Select One</option>
											<?php

											while ($result=mysqli_fetch_assoc($selectHotelQuery)) { ?>


											<option name="" value="<?php echo $result['hotel_name'] ?>"><?php echo $result['hotel_name'] ?></option>


						    <?php	# code...
						}  ?>
					</select>
				</div>
				<?php  }  ?>





				<div class="common-top">
					<label class="col s4">Room Name </label>
					<div class="input-field col s12">
						<input type="text" value="" class="validate" name="room_name" required> </div>
					</div>
					<div>
						<label class="col s4">Number of Rooms</label>
						<div class="input-field col s12">
							<input type="number"   class="validate" name="room_nosroom" required> </div>
						</div>


						<div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select" id="rom-ser" >

							<label class="col s12">Room service</label>
							<select  class="" name="room_service" >
								<option value="" disabled selected>Select One</option>
								<option value="yes">Yes</option>
								<option value="no">No</option>

							</select>
							
						</div>
						
						<div class="row common-top">           
							<div class=" col-md-6" >
								<label>Maximum adults allowed in one room</label>
								<input type="number" value="" class="input-field validate" name="room_maxadult" required>  
							</div>
							<div class=" col-md-6">
								<label>Extra mattress charges for adults</label>
								<input type="number" value="" class="input-field validate" name="room_matadult" required>  
							</div>
						</div>   

						<div class="row">           
							<div class=" col-md-6" >
								<label>Maximum children allowed in one room</label>
								<input type="number" value="" class="input-field validate" name="room_maxchild" required>  
							</div>
							<div class=" col-md-6">
								<label>Extra mattress charges for Children</label>
								<input type="number" value="" class="input-field validate" name="room_matchild" required>
							</div>
						</div> 						

						<div>
							<label class="col s4">Room Charges per night</label>
							<div class="input-field col s8">
								<input type="number"  class="validate" name="room_perni8" required> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Offer Discount (%)</label>
								<input type="number" name="room_offerdiscount" class="input-field validate">
							</div>
							<div class="col-md-6">
								<label>Expires on</label>
								<input type="text" id="expireDate" class="input-field from" name="room_expireoffer">
							</div>
						</div>  

						

						<div class="row common-top">
							<div class="">
								<!-- Modal Trigger -->
								<div class="col s1"></div>
								<a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-images" >Room Photos</a>
								<input type="hidden" name="common_image" id="img_ids">
							</div>
						</div>

						<div class="row  common-top clearfix">

							<div class="col s6 dumi_vid_btn" id="pro-file-upload"> <span>ROOM's PROMOTIONAL VIDEO</span></div>
							<input type="text" placeholder="Upload Promotional video URL" name="common_video" class="input-field validate col s5 dumi_vid_inpt" required>
						</div>
						<div class="common-top">
							<label class="col s4" style="margin-bottom: 10px;">Room Description</label>
							<textarea name="room_descrip" required></textarea>
						</div><br>


						<div class="common-top">
							<label class="col s4">Amenities:</label>

							<div class="chips chips-autocomplete"></div>
							<input type="hidden"  name="room_other[]" id="amenities-id">
						</div><br><br>


						<div id="dates_wrap">
							<div class="row">
								<label class="col s6">Unavailable in these days</label>


								<ul class="collapsible def-show-date" data-collapsible="accordion">
									<li>
										<div class="collapsible-header  active">Date</div>
										<div class="collapsible-body"> 
											<div class="row">
												<div class="col-md-6">
													<label>From</label>
													<input type="text" id="from" class="input-field from" name="book_fromdate[]">
												</div>
												<div class="col-md-6">
													<label>To</label>
													<input type="text" id="to" class="input-field to" name="book_todate[]"> 
												</div>
											</div>
										</div>
									</li>
								</ul>

							</div>
						</div>
						<div  class=" ">
							<a class="waves-effect waves-light btn " onclick="gen_dates_input(event)">Add More Dates</a>
						</div>


						<div>
							<div class="input-field col s8">
								<input type="button" value="ADD" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
							</div>
						</form>
					</div>

				</div>

			</div>
		</div>  

		<!-- Modal Structure -->
		<div id="modal-images" class="modal modal-fixed-footer image_drop_down_modal_body">
			<div class="modal-content">
				<div class="modal-header"><h2>Upload  Photos</h2></div>
				<iframe src="up_load_singleimg.php"></iframe>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Done</a>
				</div>
			</div>
		</div>




		<div class="db-righ">
			<h4>Notifications(18)</h4>
			<ul>
				<li>
					<a href="#!"> <img src="images/icon/dbr1.jpg" alt="">
						<h5>Joseph, write a review</h5>
						<p>All the Lorem Ipsum generators on the</p> <span>2 hours ago</span> </a>
					</li>
					<li>
						<a href="#!"> <img src="images/icon/dbr2.jpg" alt="">
							<h5>14 New Messages</h5>
							<p>All the Lorem Ipsum generators on the</p> <span>4 hours ago</span> </a>
						</li>
						<li>
							<a href="#!"> <img src="images/icon/dbr3.jpg" alt="">
								<h5>Ads expairy soon</h5>
								<p>All the Lorem Ipsum generators on the</p> <span>10 hours ago</span> </a>
							</li>
							<li>
								<a href="#!"> <img src="images/icon/dbr4.jpg" alt="">
									<h5>Post free ads - today only</h5>
									<p>All the Lorem Ipsum generators on the</p> <span>12 hours ago</span> </a>
								</li>
								<li>
									<a href="#!"> <img src="images/icon/dbr5.jpg" alt="">
										<h5>listing limit increase</h5>
										<p>All the Lorem Ipsum generators on the</p> <span>14 hours ago</span> </a>
									</li>
									<li>
										<a href="#!"> <img src="images/icon/dbr6.jpg" alt="">
											<h5>mobile app launch</h5>
											<p>All the Lorem Ipsum generators on the</p> <span>18 hours ago</span> </a>
										</li>
										<li>
											<a href="#!"> <img src="images/icon/dbr7.jpg" alt="">
												<h5>Setting Updated</h5>
												<p>All the Lorem Ipsum generators on the</p> <span>20 hours ago</span> </a>
											</li>
											<li>
												<a href="#!"> <img src="images/icon/dbr8.jpg" alt="">
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
														<!--<a class="waves-effect waves-light" href="#">online room booking</a>--><a class="waves-effect waves-light" href="booking.html">room reservation</a> </div>
														<div class="foot-com foot-4">
															<a href="#"><img src="images/card.png" alt="" />
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
																		<div class="col-sm-12 col-md-3 foot-logo"> <img src="images/logo1.png" alt="logo">
																			<p class="hasimg">Hotels worldwide incl. Infos, Ratings and Photos. Make your Hotel Reservation cheap.</p>
																			<p class="hasimg">The top-rated hotel booking services.</p>
																		</div>
																		<div class="col-sm-12 col-md-3">
																			<h4>Support &amp; Help</h4>
																			<ul class="two-columns">
																				<li><a href="dashboard.html">Dashboard</a>
																				</li>
																				<li><a href="db-activity.html">DB Activity</a>
																				</li>
																				<li><a href="booking.html">Booking</a>
																				</li>
																				<li><a href="contact-us.html">Contact Us</a>
																				</li>
																				<li><a href="about-us.html">About Us</a>
																				</li>
																				<li><a href="aminities.html">Aminities</a>
																				</li>
																				<li><a href="blog.html">Blog</a>
																				</li>
																				<li><a href="menu1.html">Food Menu</a>
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
																			<p class="hasimg"> <img src="images/payment.png" alt="payment"> </p>
																		</div>
																		<div class="col-sm-12 col-md-4">
																			<h4>Subscribe Now</h4>
																			<form>
																				<ul class="foot-subsc">
																					<li>
																						<input type="text" placeholder="Enter your email id"> </li>
																						<li>
																							<input type="" value="submit"> </li>
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
																<a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
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
																			<input type="" value="Login" class="waves-effect waves-light log-in-btn"> </div>
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
																	<a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
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
																				<input type="" value="Submit" class="waves-effect waves-light log-in-btn"> </div>
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
														<script src="js/jquery.min.js"></script>
														<script src="js/jquery-ui.js"></script>
														<script src="js/angular.min.js"></script>
														<script src="js/bootstrap.js" type="text/javascript"></script>
														<script src="js/materialize.min.js" type="text/javascript"></script>
														<script src="js/jquery.mixitup.min.js" type="text/javascript"></script>
														<script src="js/custom.js"></script>
														<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
														<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
														<script src="js/jquery-validation.js"></script>
														<script src="js/additional-methods.js"></script>


														<script type="text/javascript">
															tinymce.init({ selector:'textarea' });



															$(document).ready(function(){

																$('#pro-sub-btn').click(function(){
	// debugger;
	var isFormValidated = true;
	$.each($('#room-form .is_validate'),function(key,val){
		if(!val.value){
			isFormValidated = false;
			console.log(val);
			$(val).addClass('error');	
		}else{
	 			// debugger;
	 			$(val).removeClass('error');
	 		}
	 	});
	// $.each($('#room-form .is_validate_select'),function(key,val){
	// 		if(!$(val).find('select').val()){
	// 			isFormValidated = false;
	// 			console.log(val);
	// 			$(val).find('.select-wrapper').addClass('error');

	// 		}else{
	// 			// debugger;
	// 			$(val).find('.select-wrapper').removeClass('error');
	// 		}
	// });


	if(isFormValidated){
		console.log('TIme to submit form');
		$("#room-form").submit();
	}else{
		console.log('There is an error');
	}
})





																$('.chips-autocomplete').material_chip({
																	autocompleteOptions: {
																		data: {
																			'Wifi': null,
																			'Swimming Pool': null,
																			'Room service': null,
																			'Restaurant': null
																		},
																		limit: Infinity,
																		minLength: 1
																	}
																});


																$("#room-form").validate({



																	errorElement : 'div',
																	errorPlacement: function(error, element) {


        	// debugger;
        	console.log(element);
        	var placement = $(element).data('error');

        	console.log(placement);
        	console.log(error);
        	if (placement) {
        		$(placement).append(error)
        	} else {
        		error.insertAfter(element);
        	}
        }
    });


															});
														</script>
													</body>


													<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
													</html>