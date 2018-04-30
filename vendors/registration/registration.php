<?php 
 
// session_start();

?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>PVC-Registration</title>
	<!-- META TAGS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- FAV ICON(BROWSER TAB ICON) -->
	<link rel="shortcut icon" href="../../images/fav.ico" type="image/x-icon">
	<!-- GOOGLE FONT -->
	<link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
	<!-- FONTAWESOME ICONS -->
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<!-- ALL CSS FILES -->
	<link href="../../css/materialize.css" rel="stylesheet">
	<link href="../../css/style.css" rel="stylesheet">
	<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
	<link href="../../css/responsive.css" rel="stylesheet">
	<link href="../../css/sweetalert.css" rel="stylesheet">
	<link href="../../css/croppie.css" rel="stylesheet">
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
					<a href="../../main.html"><img src="../../images/logo.png" alt="">
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
						<a href="../../main.html"><img src="../../images/logo.png" alt="" />
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
				  <div class="db-title reg-title_m">
							<h3>Create an Account</h3>
							<p>Don't have an account? Create your account. It's take less then a minutes</p>
						</div>
				 	<div class="db-profile-edit">

					<form class="col s12" action="registration-post.php" method="post" role="form" id="registor-form" enctype="multipart/form-data">
						<div class="row">
						<div class="col-md-6">
							<label>First Name</label>
							<div class="input-field">
								<input type="text" value="" id="reg_name" name="reg_name" class="validate"> </div>
						</div>
						<div class="col-md-6">
							<label >Last Name</label>
							<div class="input-field ">
								<input type="text" value="" id="reg_lstname" name="reg_lstname" class="validate"> </div>
						</div>
						</div>
						<div>
							<label class="col s4">Email Address</label>
							<div class="input-field col s8">
								<input type="email" onblur="checkemail(this.value)" value="" id="reg_email" name="reg_email" class="validate" > 
								<span id="msg" class="hi-red"></span>
							</div>
							<!-- onblur="checkemail(this.value)" -->
						</div>
                         
                        <div class="row">

                         	<div class="col-md-6">
                         		<label>Mobile Number</label>
                         		<div class="input-field ">
                         		   <input type="number" id="reg_phone" name="reg_phone" class="validate">
                         		</div>   
                         	</div>
                         	<div class="col-md-6">
                         		<label>Postal Address</label>
                         		<div class="input-field ">
                         		   <input type="text" id="reg_postal" name="reg_postal" class="validate">
                         	    </div>
                         	</div>
   
                        </div>
                        <div class="row">
                        	
                        	<div class="col-md-6">
                        		<label>City</label>
                        		<div class="input-field ">
                        		   <input type="text" name="reg_city" id="reg_city" class="validate">
                        		</div>   
                        	</div>
                        	<div class="col-md-6">
                        		<label>Province</label>
                        	    <div class="input-field ">
                        		   <input type="text" name="reg_province" id="reg_province" class="validate">
                        		</div> 
                        	</div>

                        </div>
                        <div class="row">
						<div class="col-md-6">
							<label>Country</label>
							<div class="input-field ">
								<input type="text" value="" name="reg_country" id="reg_country" class="validate"> </div>
						</div>
						<div class="col-md-6">
								<label>Date of Birth</label>
								<div class="input-field ">
									<input type="text" value="" id="reg_birth" name="reg_birth" class="validate"> 
								</div>
						</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Password</label>
								<div class="input-field">
									<input type="password" value="" id="reg_password" name="reg_password" minlength="8" class="validate"> 
								</div>
							</div>
							<div class="col-md-6">
								<label>Conform Password</label>
								<div class="input-field">
									<input type="password" value="" id="reg_Conpassword"  minlength="8" class="validate" name="reg_Conpassword"> 
								</div>
							</div>

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
									<input class="file-path validate" type="hidden" id="check_cover" >
									 </div>
							</div>
						  </div>
						  <div class="col-md-6" >
						  	   <img id="cover" src="#" alt="your image" style="display: none;"/>
						  </div>
						  </form>
						</div>
					<div class="row">
						<form>
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
								<input type="button" value="Submit" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn_registor"> </div>
						</div>
				</div>

			


			
			</div>

<?php include '../../common-ftns/submitting-modal.php'; ?>

	
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
						<!--<a class="waves-effect waves-light" href="#">online room booking</a>--><a class="waves-effect waves-light" href="../../booking.html">room reservation</a> </div>
					<div class="foot-com foot-4">
						<a href="#"><img src="../../images/card.png" alt="" />
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
									<div class="col-sm-12 col-md-3 foot-logo"> <img src="../../images/logo1.png" alt="logo">
										<p class="hasimg">Hotels worldwide incl. Infos, Ratings and Photos. Make your Hotel Reservation cheap.</p>
										<p class="hasimg">The top-rated hotel booking services.</p>
									</div>
									<div class="col-sm-12 col-md-3">
										<h4>Support &amp; Help</h4>
										<ul class="two-columns">
											<li><a href="../dashboard.html">Dashboard</a>
											</li>
											<li><a href="../../db-activity.html">DB Activity</a>
											</li>
											<li><a href="../../booking.html">Booking</a>
											</li>
											<li><a href="../../contact-us.html">Contact Us</a>
											</li>
											<li><a href="../../about-us.html">About Us</a>
											</li>
											<li><a href="../../aminities.html">Aminities</a>
											</li>
											<li><a href="../../blog.html">Blog</a>
											</li>
											<li><a href="../../menu1.html">Food Menu</a>
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
										<p class="hasimg"> <img src="../../images/payment.png" alt="payment"> </p>
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

	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/jquery-ui.js"></script>
	<script src="../../js/angular.min.js"></script>
	<script src="../../js/bootstrap.js" type="text/javascript"></script>
	<script src="../../js/materialize.min.js" type="text/javascript"></script>
	<script src="../../js/jquery.mixitup.min.js" type="text/javascript"></script>
	<script src="../../js/croppie.js"></script>
	<script src="../../js/custom.js"></script>
	<script src="../../js/jquery-validation.js"></script>
	<script src="../../js/additional-methods.js"></script>
	<script src="../../js/sweetalert.min.js"></script>
    <script src="../../js/registration-js/registration.js"></script>
    <script src="../../js/method-js/email-validation.js"></script>
    
<script type="text/javascript">

 
/*=======================
  Profile image reader
=========================*/  

    $('#upload-demo').hide();
    $('#upload-demo-i').hide();
    $('#upload-demo-btn').hide();
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
});


$('#upload').on('change', function () { 
  $('#upload-demo').show();
  $('#upload-demo-btn').show();
  var reader = new FileReader();
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
      
    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-result').on('click', function (ev) {
  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }) .then(function (resp) {

          
    $.ajax({

      type: "POST",
      url: "profile_img_post.php",     
      data: {"image":resp},
      success: function (data) {
         
               $('#upload-demo').hide();
               $('#upload-demo-btn').hide();
               $("#upload-demo-i").show();
                html = '<img src="' + resp + '" />';
               $("#upload-demo-i").html(html);
               $('#profile_img').val(data);

          
       
        // debugger;
      }
    });
   });
});







</script>

	

	
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>