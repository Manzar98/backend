<?php

session_start();
   // print_r($_SESSION);
if(!$_SESSION['login']){
	header("location: ../index.php");
	die;
}
include '../common-sql.php';

$userQ='SELECT * FROM credentials where user_id="'.$_SESSION['user_id'].'"';


$user_con=mysqli_query($conn,$userQ) or die(my_sqli_error($conn));
?>

<!-- META TAGS -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- FAV ICON(BROWSER TAB ICON) -->
<link rel="shortcut icon" href="../images/fav.ico" type="image/x-icon">
<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
<!-- FONTAWESOME ICONS -->
<link rel="stylesheet" href="../css/font-awesome.min.css">
<!-- ALL CSS FILES -->
<link href="../css/materialize.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
<link href="../css/responsive.css" rel="stylesheet">
<link href="../css/sweetalert.css" rel="stylesheet">
<link href="../css/croppie.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
<![endif]-->
</head>

<body data-ng-app="" class="pages_<?php echo $_SESSION['pages']; ?> bloggers_<?php echo $_SESSION['bloggers']; ?> admins_<?php echo $_SESSION['admins']; ?> vendors_<?php echo $_SESSION['vendors']; ?> faqs_<?php echo $_SESSION['faqs']; ?> destinations_<?php echo $_SESSION['destinations']; ?> amenities_<?php echo $_SESSION['amenities']; ?> servicefee_<?php echo $_SESSION['servicefee']; ?> listing_<?php echo $_SESSION['listing']; ?> blogs_<?php echo $_SESSION['blogs']; ?>">
	<!--MOBILE MENU-->
	<section>
		<div class="mm">
			<div class="mm-inn">
				<div class="mm-logo">
					<a href="../main.html"><img src="../images/logo.png" alt="">
					</a>
				</div>
				<div class="mm-icon"><span><i class="fa fa-bars show-menu" aria-hidden="true"></i></span>
				</div>
				<div class="mm-menu">
					<div class="mm-close"><span><i class="fa fa-times hide-menu" aria-hidden="true"></i></span>
					</div>
					<ul>
						<li><a href="../main.html">Home - Default</a>
						</li>
						<li><a href="../index-1.html">Home - Reservation</a>
						</li>
						<li><a href="../index-2.html">Home - FullSlider</a>
						</li>
						<li><a href="../index-3.html">Home - Block Color</a>
						</li>
						<li><a href="../room-details.html">Room Details</a>
						</li>
						<li><a href="../room-details-block.html">Room Details Block</a>
						</li>
						<li><a href="../hotel-details.html">Hotel Details</a>
						</li>
						<li><a href="../hotel-detail.html">Hotel Details - 1</a>
						</li>
						<li><a href="../about-us.html">About Us</a>
						</li>
						<li><a href="../aminities.html">Aminities</a>
						</li>
						<li><a href="../aminities1.html">Aminities - 1</a>
						</li>
						<li><a href="../menu.html">Food Menu</a>
						</li>
						<li><a href="../menu1.html">Food Menu - 1</a>
						</li>
						<li><a href="../blog.html">Blog</a>
						</li>
						<li><a href="../blog-inner.html">Blog Inner</a>
						</li>
						<li><a href="../dashboard.html">User Dashboard</a>
						</li>
						<li><a href="../db-activity.html">DB Activity</a>
						</li>
						<li><a href="../db-booking.html">DB-Booking</a>
						</li>
						<li><a href="../db-event.html">DB-Event</a>
						</li>
						<li><a href="../db-new-booking.html">DB New Booking</a>
						</li>
						<li><a href="../booking.html">Booking</a>
						</li>
						<li><a href="../collapsible.html">Collapsible</a>
						</li>
						<li><a href="../events.html">Events</a>
						</li>
						<li><a href="../form-fields.html">Form Fields</a>
						</li>
						<li><a href="preloading.html">Preloading</a>
						</li>
						<li><a href="../gallery.html">Gallery</a>
						</li>
						<li><a href="../gallery1.html">Gallery - 1</a>
						</li>
						<li><a href="../gallery2.html">Gallery - 2</a>
						</li>
						<li><a href="../detail.html">Room Detail</a>
						</li>
						<li><a href="../all-rooms.html">All Rooms</a>
						</li>
						<li><a href="../all-rooms1.html">All Rooms - 1</a>
						</li>
						<li><a href="../services.html">Services</a>
						</li>
						<li><a href="../services1.html">Services - 1</a>
						</li>
						<li><a href="../typho-grid.html">Grid Layout</a>
						</li>
						<li><a href="../typo-alert.html">Alert Messages</a>
						</li>
						<li><a href="../typo-all-head.html">All Headers</a>
						</li>
						<li><a href="../typo-badges-labels.html">Labels</a>
						</li>
						<li><a href="../typo-buttons.html">Buttons</a>
						</li>
						<li><a href="../typo-pagination.html">Pagination</a>
						</li>
						<li><a href="../typo-progressbar.html">Progressbar</a>
						</li>
						<li><a href="../typo-slider.html">Image Sliders</a>
						</li>
						<li><a href="../typo-table.html">Table</a>
						</li>
						<li><a href="../typo-buttons.html">Buttons</a>
						</li>
						<li><a href="../typo-pagination.html">Pagination</a>
						</li>
						<li><a href="../typo-progressbar.html">Progressbar</a>
						</li>
						<li><a href="../sitemap.html">Sitemap</a>
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
							<li><a href="../all-hotels.html">Our Hotels</a>
							</li>
							<li><a href="../about-us.html">About Us</a>
							</li>
							<li><a href="../contact-us.html">Contact Us</a>
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
								<a href="dashboard.php"><img src="../images/icon/15.png" alt=""> My Account</a>
							</li>
							<li>
								<a href="db-profile.html"><img src="../images/icon/2.png" alt=""> My Profile</a>
							</li>
							<li>
								<a href="db-booking.html"><img src="../images/icon/16.png" alt=""> My Bookings</a>
							</li>
							<li>
								<a href="db-event.html"><img src="../images/icon/17.png" alt=""> My Events</a>
							</li>
							<li>
								<a href="db-activity.html"><img src="../images/icon/14.png" alt=""> My Activity</a>
							</li>
							<li>
								<a href="#!" data-toggle="modal" data-target="#modal2"><img src="../images/icon/5.png" alt=""> Register</a>
							</li>
							<li>
								<a href="#!" data-toggle="modal" data-target="#modal1"><img src="../images/icon/6.png" alt=""> Log In</a>
							</li>
							<li>
								<a href="#!" data-toggle="modal" data-target="#modal3"><img src="../images/icon/13.png" alt=""> Forgot Password</a>
							</li>
						</ul>
						<!-- Dropdown Structure -->
						<ul id='drop-home' class='dropdown-content drop-con-man'>
							<li><a href="main.html">Home - Default</a>
							</li>
							<li><a href="../index-1.html">Home - Reservation</a>
							</li>
							<li><a href="../index-2.html">Home - FullSlider</a>
							</li>
							<li><a href="../index-3.html">Home - Block Color</a>
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
							<li><a href="../all-rooms.html">All Suite Rooms</a>
							</li>
							<li><a href="../room-details.html">Room Details</a>
							</li>
							<li><a href="../room-details-block.html">Room Details Block</a>
							</li>
							<li><a href="../room-details-1.html">Room Parallax</a>
							</li>
						</ul>
						<!-- PAGES Dropdown Structure -->
						<div id='drop-page' class='dropdown-content drop-con-man drop-full'>
							<div class="mm-1">
								<h4>Pages</h4>
								<ul>
									<li><a href="../room-details.html">Room Details - 1</a>
									</li>
									<li><a href="../room-details-1.html">Room Details - 2</a>
									</li>
									<li><a href="../room-details-block.html">Room Details - 3</a>
									</li>
									<li><a href="../all-rooms.html">All Rooms</a>
									</li>
									<li><a href="../all-rooms1.html">All Rooms - 1</a>
									</li>
									<li><a href="../aminities.html">Aminities</a>
									</li>
									<li><a href="../aminities1.html">Aminities - 1</a>
									</li>
								</ul>
							</div>
							<div class="mm-1">
								<h4>Pages</h4>
								<ul>
									<li><a href="dashboard.php">User Dashboard</a>
									</li>
									<li><a href="../db-activity.html">DB Activity</a>
									</li>
									<li><a href="../db-booking.html">DB-Booking</a>
									</li>
									<li><a href="../db-event.html">DB-Event</a>
									</li>
									<li><a href="../db-new-booking.html">DB New Booking</a>
									</li>
									<li><a href="../booking.html">Booking</a>
									</li>
									<li><a href="../contact-us.html">Contact Us</a>
									</li>
								</ul>
							</div>
							<div class="mm-1">
								<h4>Pages</h4>
								<ul>
									<li><a href="../blog.html">Blog</a>
									</li>
									<li><a href="../blog-inner.html">Blog Inner</a>
									</li>
									<li><a href="../events.html">Events</a>
									</li>
									<li><a href="../gallery.html">Gallery</a>
									</li>
									<li><a href="../gallery1.html">Gallery - 1</a>
									</li>
									<li><a href="../gallery2.html">Gallery - 2</a>
									</li>
									<li><a href="../collapsible.html">Collapsible</a>
									</li>
								</ul>
							</div>
							<div class="mm-1">
								<h4>Pages</h4>
								<ul>
									<li><a href="../about-us.html">About Us</a>
									</li>
									<li><a href="../services.html">Services</a>
									</li>
									<li><a href="../services1.html">Services - 1</a>
									</li>
									<li><a href="../typho-grid.html">Grid Layout</a>
									</li>
									<li><a href="../typo-alert.html">Alert Messages</a>
									</li>
									<li><a href="../form-fields.html">Form Fields</a>
									</li>
									<li><a href="../menu.html">Food Menu</a>
									</li>
								</ul>
							</div>
							<div class="mm-1">
								<h4>Pages</h4>
								<ul>
									<li><a href="../typo-all-head.html">All Headers</a>
									</li>
									<li><a href="../typo-badges-labels.html">Labels</a>
									</li>
									<li><a href="../typo-buttons.html">Buttons</a>
									</li>
									<li><a href="../typo-pagination.html">Pagination</a>
									</li>
									<li><a href="../typo-progressbar.html">Progressbar</a>
									</li>
									<li><a href="../preloading.html">Preloading</a>
									</li>
									<li><a href="../menu1.html">Food Menu - 1</a>
									</li>
								</ul>
							</div>
							<div class="mm-1">
								<h4>Pages</h4>
								<ul>
									<li><a href="../typo-slider.html">Image Sliders</a>
									</li>
									<li><a href="../typo-table.html">Table</a>
									</li>
									<li><a href="../typo-buttons.html">Buttons</a>
									</li>
									<li><a href="../typo-pagination.html">Pagination</a>
									</li>
									<li><a href="../typo-progressbar.html">Progressbar</a>
									</li>
									<li><a href="../sitemap.html">Sitemap</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="logo">
						<a href="../main.html"><img src="../images/logo.png" alt="" />
						</a>
					</div>
					<div class="menu-bar">
						<ul>
							<li><a href="#" class='dropdown-button' data-activates='drop-home'>Home <i class="fa fa-angle-down"></i></a>
							</li>
							<li><a href="#" class='dropdown-button' data-activates='drop-room'>Rooms <i class="fa fa-angle-down"></i></a>
							</li>
							<li><a href="../services.html">Services</a>
							</li>
							<li><a href="../menu.html">Menu</a>
							</li>
							<li><a href="../events.html">Events</a>
							</li>
							<li><a href="../aminities1.html">Amenities</a>
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
		<?php while ($user_result=mysqli_fetch_assoc($user_con)) {?>


			<div class="dashboard">
				<div class="db-left">
					<?php

					$cover=substr($user_result['reg_cover'],3) ;
					$img=substr($user_result['reg_photo'], 3)
					?>
					<div class="db-left-1" style="max-height: 193px; background-image:url('<?php echo  $img;?>'),url('<?php echo $cover; ?>');background-size: 95px,cover;">
						<div style="width: 105px; margin: 0 auto;">
							<h4><?php echo $_SESSION['reg_name'];  ?> <?php echo $_SESSION['reg_lstname']; ?></h4>
							<p><?php echo $_SESSION['reg_city']; ?>, <?php echo $_SESSION['reg_country']; ?></p>
						</div>
					</div>
					<div class="db-left-2">
						<ul>
							<li class="">
								<a href="dashboard.php?id=<?php echo $_SESSION['user_id'] ?>"><img src="../images/icon/db1.png" alt="" /> Dashboard</a>
							</li>

							<?php if ($_SESSION['vendors']=="on" || $_SESSION['bloggers']=="on") { ?>

								<li>
									<a href="manage-vendors.php?id=<?php echo $_SESSION['user_id'] ?>"><img src="../images/icon/db3.png" alt="" /> Contributors</a>
								</li>
							<?php }else if($_SESSION['vendors']=="off" && $_SESSION['bloggers']=="off"){ ?>

								<li class="AD_bloggers AD_vendors">
									<a href="manage-vendors.php?id=<?php echo $_SESSION['user_id'] ?>"><img src="../images/icon/db3.png" alt="" /> Contributors</a>
								</li>
							<?php }else{ ?>
								<li>
									<a href="manage-vendors.php?id=<?php echo $_SESSION['user_id'] ?>"><img src="../images/icon/db3.png" alt="" /> Contributors</a>
								</li>
							<?php } ?>
							

							<?php if ($_SESSION['listing']=="on" || $_SESSION['blogs']=="on") { ?>

								<li>
									<a href="listing.php"><img src="../images/icon/db2.png" alt="" /> Listing</a>
								</li>
							<?php }else if ($_SESSION['listing']=="off" && $_SESSION['blogs']=="off"){ ?>

								<li  class="AD_blogs AD_listing">
									<a href="listing.php"><img src="../images/icon/db2.png" alt="" /> Listing</a>
								</li>
							<?php }else{ ?>

								<li>
									<a href="listing.php"><img src="../images/icon/db2.png" alt="" /> Listing</a>
								</li>
							<?php } ?>

							<li class="AD_vendors">
								<a href="add-manage-ads_vendor.php"><img src="../images/icon/db5.png" alt="" /> Featured Ads</a>
							</li>
							<li class="AD_pages">
								<a href="pages/pageListing.php?id=<?php echo $_SESSION['user_id'] ?>"><img src="../images/icon/db4.png" alt="" /> Pages</a>
							</li>
							<li class="AD_faqs">
								<a href="faqs/faqListing.php?id=<?php echo $_SESSION['user_id'] ?>"><img src="../images/icon/db6.png" alt="" /> FAQs</a>
							</li>
							<li>
								<a href="edit_admin.php?id=<?php echo $_SESSION['user_id'] ?>"><img src="../images/icon/db7.png" alt="" /> Profile</a>
							</li>
							<li class="AD_destinations">
								<a href="destinations/desti-Listing.php?id=<?php echo $_SESSION['user_id'] ?>"><img src="../images/icon/db4.png" alt="" /> Destinations</a>
							</li>
							<li class="AD_amenities">
								<a href="amenities/amenityListing.php?id=<?php echo $_SESSION['user_id'] ?>"><img src="../images/icon/db7.png" alt="" /> Amenities</a>
							</li>
							<li class="AD_fees">
								<a href="service_fee/listOfServiceFee.php?id=<?php echo $_SESSION['user_id'] ?>"><img src="../images/icon/db7.png" alt="" /> Service Fee</a>
							</li>
							<li class="AD_admins">
								<a href="listOfAdmins.php?id=<?php echo $_SESSION['user_id']; ?>"><img src="../images/icon/db6.png" alt="" /> Admins</a>
							</li>
							<li>
								<a href="../logout.php" id="logout"><img src="../images/icon/db8.png" alt="" /> Logout</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="db-cent">
					<div class="db-cent-1" style="background-image:url('<?php echo $cover; ?>') !important;">

						<p>Hi <?php echo $_SESSION['reg_name']; ?>,</p>
						<h4>Welcome to your dashboard</h4>
					</div>
				<?php } ?>
