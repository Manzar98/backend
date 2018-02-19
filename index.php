<?php 
 
// session_start();

?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>PVC-Log in</title>
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
					<a href="../main.html"><img src="../backend/images/logo.png" alt="">
					</a>
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
			
				</div>
				<div class="row">
					<div class="logo">
						<a href="main.html"><img src="images/logo.png" alt="" />
						</a>
					</div>
					
				</div>
			</div>
		</div>
		<!--TOP SECTION-->
		<!--DASHBOARD SECTION-->
		<div class="dashboard">
			<div class="db-left">
				
				<div class="db-left-2">
					
				</div>
			</div>
			<div class="db-cent">
				<!-- <div class="" style="padding-left: 10px;">
					<h2>Hello... <span>{{ name }}</span></h2>
					
				</div> -->
				    <div class="col-md-3"></div>
					<div class="db-cent-2 col-md-6">
					<div class="db-title">
							<h3>Login</h3>
							
						</div>
							<!-- LOGIN SECTION -->

                	<form class="col s8" role="form" action="auth.php" method="POST" enctype="multipart/form-data" id="login-form">
						<div>
							<div class="input-field">
								<input type="email" name="email" onkeyup="enterBTN()"   class="validate">
								<label>Email</label>
							</div>
						</div>
						<div>
							<div class="input-field">
								<input type="password" name="password" onkeyup="enterBTN()" class="validate">
								<label>Password</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-9  re_me">
								<p>
									<input type="checkbox" id="remembr_me" />
									<label for="remembr_me">Remember me</label>
								</p>
							</div>
							<div class="col-md-3  pull-right">
								<p class="registor">
									 <a href="registration.php">Registration?</a>
								</p>
							</div>
						</div>
						<div>
							<div class="input-field">
								<input type="button" value="Login" class="waves-effect waves-light log-in-btn" id="login_btn"> </div>
						</div>
						
					</form>
					
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

		

	</section>
	<!--ALL SCRIPT FILES-->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/angular.min.js"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/materialize.min.js" type="text/javascript"></script>
	<script src="js/jquery.mixitup.min.js" type="text/javascript"></script>
	<script src="js/custom.js"></script>
	<script src="js/jquery-validation.js"></script>
	<script src="js/additional-methods.js"></script>
	<script src="js/sweetalert.min.js"></script>
    <script src="js/login-js/login.js"></script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>