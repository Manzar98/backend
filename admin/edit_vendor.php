<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>Edit-Vendor</title>
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
						<input type="hidden" name="user_id" value="<?php echo $_GET['id']; ?>">
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
									<div class="col-sm-12 col-md-3 foot-logo"> <img src="../images/logo1.png" alt="logo">
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
    <script src="../js/registration-js/registration.js"></script>
    <script src="../js/method-js/updatepassword.js"></script>
    <script type="text/javascript">
    	$('#modal-reset').modal({dismissible: false});
		
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
      url: "registration/profile_img_post.php",     
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


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
</html>


	




	