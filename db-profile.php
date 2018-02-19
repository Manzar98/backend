<?php 
    session_start();
    if(!$_SESSION['login']){
   header("location: ../index.php");
   die;
}
     include"common-apis/reg-api.php";


    $reg_Query= select('credentials',array("user_id"=>$_SESSION['user_id']));

    $reg_hotel=select('hotel',array("user_id"=>$_SESSION['user_id']));
    $reg_room=select('room',array("user_id"=>$_SESSION['user_id']));
    $reg_banquet=select('banquet',array("user_id"=>$_SESSION['user_id']));
    $reg_conference=select('conference',array("user_id"=>$_SESSION['user_id']));
    $reg_tour=select('tour',array("user_id"=>$_SESSION['user_id']));
    $reg_event=select('event',array("user_id"=>$_SESSION['user_id']));

 
?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>Profile</title>
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
	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/sweetalert.css" rel="stylesheet">
	<link href="css/croppie.css" rel="stylesheet">
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
		<?php   
          
          while ($reg_Result=mysqli_fetch_assoc($reg_Query)) { ?>
          	
          
		
		<div class="dashboard">
			<div class="db-left">
				<div class="db-left-1"  >
					<h4><?php echo $reg_Result['reg_name'];  ?> <?php echo $reg_Result['reg_lstname']; ?></h4>
					<p><?php echo $reg_Result['reg_city']; ?>, <?php echo $reg_Result['reg_country']; ?></p>
				</div>
				<div class="db-left-2">
					<ul>
						<li>
							<a href="dashboard.php?id=<?php echo $reg_Result['user_id']; ?>"><img src="images/icon/db1.png" alt="" />Dashboard</a>
						</li>
						<li>
							<a href="add-listing.php?id=<?php echo $reg_Result['user_id']; ?>"><img src="images/icon/db2.png" alt="" />Add Listing</a>
						</li>
						<li>
							<a href="manage-listing.php?id=<?php echo $reg_Result['user_id']; ?>"><img src="images/icon/db3.png" alt="" />Manage Listing</a>
						</li>
						<li>
							<a href="paid_ads.php"><img src="images/icon/db5.png" alt="" /> Paid Ads</a>
						</li>
						<li>
							<a href="db-event.html"><img src="images/icon/db4.png" alt="" /> Event</a>
						</li>
						<li>
							<a href="db-profile.php?id=<?php echo $_SESSION['user_id'];?>"><img src="images/icon/db7.png" alt="" /> Profile</a>
						</li>
						<li>
							<a href="#"><img src="images/icon/db6.png" alt="" /> Payments</a>
						</li>
						<li>
							<a href="logout.php"><img src="images/icon/db8.png" alt="" /> Logout</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="db-cent">
				<div class="db-cent-1" style="background-image:url('<?php echo $reg_Result['reg_cover']; ?>') !important;">
					
					<p>Hi <?php echo $_SESSION['reg_name']; ?>,</p>
					<h4>Welcome to your dashboard</h4>
					</div>
				<div class="db-profile"> <img src="<?php echo $reg_Result['reg_photo'] ?>" alt="">
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
								<th class="TT" onClick="document.location.href='hotels/hotel_list.php?id=<?php echo $_SESSION['user_id']; ?>'">Hotels</th>
								<th class="TT" onClick="document.location.href='rooms/room_list.php?id=<?php echo $_SESSION['user_id']; ?>'">Rooms</th>
								<th class="TT" onClick="document.location.href='banquets/banquet_list.php?id=<?php echo $_SESSION['user_id']; ?>'">Banquets</th>
								<th class="TT" onClick="document.location.href='conferences/conference_list.php?id=<?php echo $_SESSION['user_id']; ?>'">Conferences</th>
								<th class="TT" onClick="document.location.href='tours/tour_list.php?id=<?php echo $_SESSION['user_id']; ?>'">Tours</th>
								<th class="TT" onClick="document.location.href='events/event_list.php?id=<?php echo $_SESSION['user_id']; ?>'">Events</th>
								<th>Join Date</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $age; ?></td>
								
								<?php if (mysqli_num_rows($reg_hotel)< 1) { ?>
							     <td class="TT" onClick="document.location.href='hotels/hotel_list.php?id=<?php echo $_SESSION['user_id']; ?>'">0</td>
								<?php }else{ ?>
								   <td class="TT" onClick="document.location.href='hotels/hotel_list.php?id=<?php echo $_SESSION['user_id']; ?>'"><?php echo mysqli_num_rows($reg_hotel); ?></td>
								<?php } ?>
								
								<?php if (mysqli_num_rows($reg_room)< 1) { ?>
								<td class="TT" onClick="document.location.href='rooms/room_list.php?id=<?php echo $_SESSION['user_id']; ?>'">0</td>
								<?php }else{ ?>
								<td class="TT" onClick="document.location.href='rooms/room_list.php?id=<?php echo $_SESSION['user_id']; ?>'"><?php echo mysqli_num_rows($reg_room); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_banquet)< 1) { ?>
								<td class="TT" onClick="document.location.href='banquets/banquet_list.php?id=<?php echo $_SESSION['user_id']; ?>'">0</td>
								<?php }else{ ?>
								<td class="TT" onClick="document.location.href='banquets/banquet_list.php?id=<?php echo $_SESSION['user_id']; ?>'"><?php echo mysqli_num_rows($reg_banquet); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_conference)< 1) { ?>
								<td class="TT" onClick="document.location.href='conferences/conference_list.php?id=<?php echo $_SESSION['user_id']; ?>'">0</td>
								<?php }else{ ?>
								<td class="TT" onClick="document.location.href='conferences/conference_list.php?id=<?php echo $_SESSION['user_id']; ?>'"><?php echo mysqli_num_rows($reg_conference); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_tour)< 1) { ?>
								<td class="TT" onClick="document.location.href='tours/tour_list.php?id=<?php echo $_SESSION['user_id']; ?>'">0</td>
								<?php }else{ ?>
								<td class="TT" onClick="document.location.href='tours/tour_list.php?id=<?php echo $_SESSION['user_id']; ?>'"><?php echo mysqli_num_rows($reg_tour); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_event)< 1) { ?>
								<td class="TT" onClick="document.location.href='events/event_list.php?id=<?php echo $_SESSION['user_id']; ?>'">0</td>
								<?php }else{ ?>
								<td class="TT" onClick="document.location.href='events/event_list.php?id=<?php echo $_SESSION['user_id']; ?>'"><?php echo mysqli_num_rows($reg_event); ?></td>
								<?php } ?>

								<td><?php echo $reg_Result['reg_joinD']; ?></td>
								
							</tr>
						</tbody>
					</table>
					
				</div>
				 	<div class="db-profile-edit">

					<form class="col s12" action="registration-update.php" method="post" role="form" id="registor-form">
						<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
						<div class="row">
						<div class="col-md-6">
							<label >First Name</label>
							<div class="input-field ">
								<input type="text" value="<?php echo $reg_Result['reg_name'];  ?>" id="reg_name" name="reg_name" class="validate"> </div>
						</div>
						<div class="col-md-6">
							<label>Last Name</label>
							<div class="input-field">
								<input type="text" value="<?php echo $reg_Result['reg_lstname'];  ?>" id="reg_lstname" name="reg_lstname" class="validate"> </div>
						</div>
						</div>
						<div>
							<label class="col s4">Email Address</label>
							<div class="input-field col s8">
								<input type="email" value="<?php echo $reg_Result['reg_email'];  ?>" id="reg_email" name="reg_email" class="validate"> </div>
						</div>
                         
                        <div class="row">

                         	<div class="col-md-6">
                         		<label>Mobile Number</label>
                         		<div class="input-field ">
                         		   <input type="number" id="reg_phone" name="reg_phone" class="validate" value="<?php echo $reg_Result['reg_phone'];  ?>">
                         		</div>   
                         	</div>
                         	<div class="col-md-6">
                         		<label>Postal Address</label>
                         		<div class="input-field ">
                         		   <input type="text" id="reg_postal" name="reg_postal" class="validate" value="<?php echo $reg_Result['reg_postal'];  ?>">
                         	    </div>
                         	</div>
   
                        </div>
                        <div class="row">
                        	
                        	<div class="col-md-6">
                        		<label>City</label>
                        		<div class="input-field ">
                        		   <input type="text" name="reg_city" id="reg_city" class="validate" value="<?php echo $reg_Result['reg_city'];  ?>">
                        		</div>   
                        	</div>
                        	<div class="col-md-6">
                        		<label>Province</label>
                        	    <div class="input-field ">
                        		   <input type="text" name="reg_province" id="reg_province" class="validate" value="<?php echo $reg_Result['reg_province'];  ?>">
                        		</div> 
                        	</div>

                        </div>
						<div>
							<label class="col s4">Country</label>
							<div class="input-field col s8">
								<input type="text" value="<?php echo $reg_Result['reg_country'];  ?>" name="reg_country" id="reg_country" class="validate"> </div>
						</div>
						
							<div>
								<a class="waves-effect waves-light btn modal-trigger spc-modal " href="#modal-reset" >Reset Password</a>
								
							</div>

					
						<input type="hidden" name="profile_img" id="profile_img">
						<input type="hidden" name="coverimg" id="coverimg">
					</form>
					<div class="row">
						<form>
						   <div class="col-md-6">
							<div class="file-field input-field">
								<div class="btn" id="pro-file-upload"> <span>Cover photo</span>
									<input type="file" id="sortpicture" name="sortpic" onchange="readcover(this);"> </div>
								<div class="file-path-wrapper" >
									<input class="file-path validate" type="hidden" id="check_cover">
									 </div>
							</div>
						  </div>
						  <div class="col-md-6" >
						  	   <img id="cover" src="#" alt="your image" style="display: none;"/>
						  </div>
						  </form>
						</div>
					

                       <div class="row">
						<form >
							<div class="col-md-6">
								<div class="file-field input-field">
								    <div class="btn" id="pro-file-upload"> <span>Profile photo</span>
										<input type="file" id="upload">	

									</div>

								</div>
							</div>
						    <div class="col-md-6" >
								  	     <div id="upload-demo" style="width:350px">
								  	     	
								  	     </div>
								  	     <button id="upload-demo-btn"  class="btn upload-result">Crop Image</button>
								  	     
								  	     <div id="upload-demo-i">
								  	     	
								  	     </div>
							</div>
							</form>
					   </div>
					<div>
							<div class="input-field col s8">
								<input type="button" value="Update" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn_registor_update"> </div>
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

<!-- Modal Structure -->
<div id="modal-reset" class="modal modal-fixed-footer image_drop_down_modal_body common-img_wrap">
  <div class="modal-content">
  	<div class="modal-header"><h2>Reset Password</h2></div>
      <form id="password-wrap" action="updatepassword.php" method="post" role="form" id="registor-form">
                    <div>
							<label class="col s4">Old Password</label>
							<div class="input-field col s6">
								<input type="password" id="old-passcode" name="old-password" class="validate"> </div>
						</div>
						<div>
							<label class="col s4">New Password</label>
							<div class="input-field col s6">
								<input type="password"  id="new-passcode" name="new_password" class="validate"> </div>
						</div>
						<div>
							<label class="col s4">Confrom Password</label>
							<div class="input-field col s6">
								<input type="password"  id="reg_conpassword" name="reg_conpassword" class="validate"> </div>
						</div>
						<input type="hidden"  id="check_Oldpass" value="<?php echo $_SESSION['reg_password']; ?>" class="validate">
						<div class="input-field col s8">
								<input type="button" value="Update" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn_password_update"> </div>
                    </form>
   <div class="modal-footer">
     <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat password_done">Done</a>
   </div>
 </div>
</div>

 <!-- Modal Structure -->
  <div id="loader" class="modal">
    <div class="modal-content">
      <div class="col-md-5"></div>
         <div class="preloader-wrapper big active" style="top: 90px;">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-red">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-yellow">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-green">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

    </div>
    <div style="text-align: center; padding-top: 170px;">
    <span>Submitting.....</span>
    </div>
    </div>
    
  </div>
		</div>

			<?php } ?>
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
					<a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
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
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/angular.min.js"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/materialize.min.js" type="text/javascript"></script>
	<script src="js/jquery.mixitup.min.js" type="text/javascript"></script>
	<script src="js/croppie.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/jquery-validation.js"></script>
	<script src="js/additional-methods.js"></script>
	<script src="js/sweetalert.min.js"></script>
    <script src="js/registration-js/registration.js"></script>
    <script src="js/method-js/updatepassword.js"></script>
    <script type="text/javascript">
    	$('#modal-reset').modal({dismissible: false});
		
	</script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
</html>


	




	