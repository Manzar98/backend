<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>Featured Ads</title>
  <?php  include 'header-main.php'; 

    include '../common-apis/api.php';

   $edit_ad=select('paid_ads',array('user_id'=>$_SESSION['user_id'],'paid_id'=>$_GET['p_id']));
   
     while ($result=mysqli_fetch_assoc($edit_ad)) {
     	# code...
    
  ?>

					<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../images/icon/dbc5.png" alt=""/>Featured an Ads</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						 
                         <div class="db-profile-edit paid-ads">
					
                   <form class="col s12"  data-toggle="validator" id="paid-form" role="form" action="paid-post.php" method="POST" enctype="multipart/form-data">


                       <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>" id="user_id"> 
                       <input type="hidden" name="user_id" value="<?php echo $result['paid_id'];?>" id="paid_id"> 
					   <div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select" id="select_parent"  >

							<label class="col s4 pull-left">Choose a list</label>
							  <input type="hidden" name=choose_list value="<?php echo $result['select_any'] ?>" id="choose">
							 <select   class="" name="select_any" id="choose_list" onchange="showlist(this)">
							<?php if ($result['select_any']=="hotel") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="hotel" selected>Hotels</option>
								<option value="room">Rooms</option>
								<option value="banquet">Banquets</option>
								<option value="conference">Conferences</option>
								<option value="tour">Tours</option>
								<option value="event">Events</option>
									
						<?php 	}elseif ($result['select_any']=="room") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="hotel">Hotels</option>
								<option value="room" selected>Rooms</option>
								<option value="banquet">Banquets</option>
								<option value="conference">Conferences</option>
								<option value="tour">Tours</option>
								<option value="event">Events</option>
								
						<?php   }elseif ($result['select_any']=="banquet") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="hotel">Hotels</option>
								<option value="room">Rooms</option>
								<option value="banquet" selected>Banquets</option>
								<option value="conference">Conferences</option>
								<option value="tour">Tours</option>
								<option value="event">Events</option>
								
						<?php   }elseif ($result['select_any']=="conference") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="hotel">Hotels</option>
								<option value="room">Rooms</option>
								<option value="banquet">Banquets</option>
								<option value="conference" selected>Conferences</option>
								<option value="tour">Tours</option>
								<option value="event">Events</option>
								
						<?php   }elseif ($result['select_any']=="tour") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="hotel">Hotels</option>
								<option value="room">Rooms</option>
								<option value="banquet">Banquets</option>
								<option value="conference">Conferences</option>
								<option value="tour" selected>Tours</option>
								<option value="event" >Events</option>
								
						<?php   }elseif ($result['select_any']=="event") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="hotel">Hotels</option>
								<option value="room">Rooms</option>
								<option value="banquet">Banquets</option>
								<option value="conference">Conferences</option>
								<option value="tour">Tours</option>
								<option value="event" selected>Events</option>
							
						<?php   }else { ?>
							    <option value=""  disabled selected>Select One</option>
								<option value="hotel">Hotels</option>
								<option value="room">Rooms</option>
								<option value="banquet">Banquets</option>
								<option value="conference">Conferences</option>
								<option value="tour">Tours</option>
								<option value="event">Events</option>

						<?php   } ?> 	
							
							</select> 
						</div>
                     
                     <div class="row">
                     	<input type="hidden" name="list" id="list-of" value="<?php echo $result['list_of_any'] ?>">
						<div class="col-md-12 common-wrapper comon_dropdown_botom_line is_validate_select"   >
                         <div id="list_of_any">
					 
						</div>
                       </div>
						
						</div>
						<div class="row">
                        <div class="col-md-6 common-wrapper comon_dropdown_botom_line is_validate_select" >
                         <div id="on_which_page">
							<label class=" pull-left">On which page</label>
							
							 <select   class="" id="w_page" name="on_which_page" onchange="on_which(this)"> 
					    <?php if($result['on_which_page']=="home"){?>

                                <option value=""  disabled >Select One</option>
								<option value="home" selected>Home Page</option>
								<option value="hotel" >Hotel Page</option>
								<option value="room" >Room Page</option>
								<option value="banquet" >Banquet Page</option>
								<option value="conference" >Conference Page</option>
								<option value="tour" >Tour Page</option>
								<option value="event" >Event Page</option>

                        <?php }elseif ($result['on_which_page']=="hotel") { ?>

							   <option value=""  disabled >Select One</option>
								<option value="home" >Home Page</option>
								<option value="hotel" selected>Hotel Page</option>
								<option value="room" >Room Page</option>
								<option value="banquet" >Banquet Page</option>
								<option value="conference" >Conference Page</option>
								<option value="tour" >Tour Page</option>
								<option value="event" >Event Page</option>
									
						<?php 	}elseif ($result['on_which_page']=="room") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="home" >Home Page</option>
								<option value="hotel" >Hotel Page</option>
								<option value="room" selected>Room Page</option>
								<option value="banquet" >Banquet Page</option>
								<option value="conference" >Conference Page</option>
								<option value="tour" >Tour Page</option>
								<option value="event" >Event Page</option>
								
						<?php   }elseif ($result['on_which_page']=="banquet") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="home" >Home Page</option>
								<option value="hotel" >Hotel Page</option>
								<option value="room" >Room Page</option>
								<option value="banquet" selected>Banquet Page</option>
								<option value="conference" >Conference Page</option>
								<option value="tour" >Tour Page</option>
								<option value="event" >Event Page</option>
								
						<?php   }elseif ($result['on_which_page']=="conference") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="home" >Home Page</option>
								<option value="hotel" >Hotel Page</option>
								<option value="room" >Room Page</option>
								<option value="banquet" >Banquet Page</option>
								<option value="conference" selected>Conference Page</option>
								<option value="tour" >Tour Page</option>
								<option value="event">Event Page</option>
								
						<?php   }elseif ($result['on_which_page']=="tour") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="home" >Home Page</option>
								<option value="hotel" >Hotel Page</option>
								<option value="room" >Room Page</option>
								<option value="banquet" >Banquet Page</option>
								<option value="conference" >Conference Page</option>
								<option value="tour" selected>Tour Page</option>
								<option value="event" >Event Page</option>
								
						<?php   }elseif ($result['on_which_page']=="event") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="home" >Home Page</option>
								<option value="hotel" >Hotel Page</option>
								<option value="room" >Room Page</option>
								<option value="banquet" >Banquet Page</option>
								<option value="conference" >Conference Page</option>
								<option value="tour" >Tour Page</option>
								<option value="event" selected>Event Page</option>
							
						<?php   }else { ?>
							    <option value=""  disabled selected>Select One</option>
								<option value="home" >Home Page</option>
								<option value="hotel" >Hotel Page</option>
								<option value="room" >Room Page</option>
								<option value="banquet" >Banquet Page</option>
								<option value="conference" >Conference Page</option>
								<option value="tour" >Tour Page</option>
								<option value="event" >Event Page</option>

						<?php   } ?> 	

								

							</select> 
						</div>
						</div>

						<div class="col-md-6 common-wrapper comon_dropdown_botom_line is_validate_select" id="no_of_days"  >

							<label class="pull-left">No of days</label>
							
							 <select   class="" name="no_of_days">
							 	<?php if ($result['no_of_days']=="day") {?>

									    <option value=""  disabled >Select One</option>
										<option value="day" selected>One day</option>
										<option value="week" >One week</option>
										<option value="month" >One month</option>
										<option value="year" >One year</option>

							 	<?php }elseif ($result['no_of_days']=="week") {?>

							 		    <option value=""  disabled >Select One</option>
										<option value="day" >One day</option>
										<option value="week" selected>One week</option>
										<option value="month" >One month</option>
										<option value="year" >One year</option>

							 	<?php }elseif ($result['no_of_days']=="month") {?>

							 		    <option value=""  disabled >Select One</option>
										<option value="day" >One day</option>
										<option value="week" >One week</option>
										<option value="month" selected>One month</option>
										<option value="year" >One year</option>

							 	<?php }elseif ($result['no_of_days']=="year") {?>

							 		    <option value=""  disabled >Select One</option>
										<option value="day" >One day</option>
										<option value="week" >One week</option>
										<option value="month" >One month</option>
										<option value="year" selected>One year</option>

							 	<?php }else{?>

							 		    <option value=""  disabled selected>Select One</option>
										<option value="day" >One day</option>
										<option value="week" >One week</option>
										<option value="month" >One month</option>
										<option value="year" >One year</option>

							 	<?php } ?> 
								
								

							</select> 
						</div>
					</div>
                         <div class="common-top">
							<div class="input-field col s8">
								<input type="button" value="Checkout" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn_paid_edit"> </div>
						</div>
						</form>
				</div>
			
			</div>
      </div>
      <?php  } ?>
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

			<div class="db-righ">
				<h4>Notifications(18)</h4>
				<ul>
					
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
											<li><a href="dashboard.html">Dashboard</a>
											</li>
											<li><a href="../db-activity.html">DB Activity</a>
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
	<script src="../js/croppie.js"></script>
	<script src="../js/custom.js"></script>
	<script src="../js/jquery-validation.js"></script>
	<script src="../js/additional-methods.js"></script>
	<script src="../js/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script src="../js/paid-ads-js/ads-vendor.js"></script>
   <?php include 'cal_noti_main_folder.php'; ?>

   
<script type="text/javascript">
	
	if (($('#choose_list :selected').text()=="Hotels") || ($('#choose_list :selected').text()=="Rooms") || ($('#choose_list :selected').text()=="Banquets") || ($('#choose_list :selected').text()=="Conferences") || ($('#choose_list :selected').text()=="Tours") || ($('#choose_list :selected').text()=="Events")) {
        
       $('#list_of_any').show();
	}
  if (($('#w_page :selected').text()=="Home") || ($('#w_page :selected').text()=="Hotel Page") || ($('#w_page :selected').text()=="Room Page") || ($('#w_page :selected').text()=="Banquet Page") || ($('#w_page :selected').text()=="Conference Page") || ($('#w_page :selected').text()=="Tour Page") || ($('#w_page :selected').text()=="Event Page")) {

       $('#no_of_days').show();
       
	}


	
	$(document).ready(function(){

        var stored_tbl_name= $('#choose').val();
        var stored_id=$('#user_id').val();
        
		    $.ajax({


       type:"GET",
       url:'get_list.php',
       data:{"tbl_name":stored_tbl_name,"user_id":stored_id},
       success:function(res){
           var data= JSON.parse(res);
           console.log(data);
        // debugger;
        var   dropdown='<label class="pull-left lbl-list">List of '+stored_tbl_name+'</label>'
              dropdown+='<select name="list_of_any" id="List_any" onchange="list_of(this)" >'
              dropdown+='<option  disabled selected>Select One</option>'
           $.each(data,function(k,val){
             
                dropdown+='<option value='+val.name+'>'+val.name+'</option>';

           });
           dropdown+='</select>';
            document.getElementById('list_of_any').innerHTML=dropdown;
            // $('#List_any').material_select();
            $("#List_any").select2({
                    placeholder: "Select a list",
                    allowClear: true
             });
            $('[name=list_of_any]').val($('#list-of').val()).change();
            
       }
    })

     
	})
</script>


   
 

    
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
</html>


	




	