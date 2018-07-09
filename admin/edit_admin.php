<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
<title>Profile</title>
<?php include 'header.php'; 

include"../common-apis/api.php";


$reg_Query= select('credentials',array("user_id"=>$_GET['id']));




?>
<?php   

while ($reg_Result=mysqli_fetch_assoc($reg_Query)) { 
$pro_img=substr($reg_Result['reg_photo'],3) ;  ?>
<div class="db-profile"> <img src="<?php echo $pro_img; ?>" alt="">
	<h4><?php echo $reg_Result['reg_name'];  ?> <?php echo $reg_Result['reg_lstname']; ?></h4>
	<p><?php echo $reg_Result['reg_postal']; ?></p>
</div>
<div class="db-profile-view">
	<?php $lastlogin=date_create($reg_Result['reg_lastlogin']); ?>	
	<table class="last-lgon_tbl">
		<thead>
			<th>Last Login</th>
		</thead>
		<tbody>
			<td><?php echo date_format($lastlogin, 'd-m-Y '); ?></td>
		</tbody>
	</table>	
</div>
<div class="db-profile-edit">

	<form class="col s12" action="registration-update.php" method="post" role="form" id="registor-form">
		<input type="hidden" name="user_id" value="<?php echo $reg_Result['user_id']; ?>">
		<input type="hidden" name="user_type" id="u_type" value="<?php echo $reg_Result['user_type']; ?>">
		<input type="hidden" id="u_email" value="<?php echo $reg_Result['reg_email']; ?>">
		<input type="hidden"  id="check_Oldpass" value="<?php echo $_SESSION['reg_password']; ?>" class="validate">
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
						<input type="email" onblur="checkemail_main(this.value)" value="<?php echo $reg_Result['reg_email'];  ?>" id="reg_email" name="reg_email" class="validate">
						<span id="msg" class="hi-red"></span>
					</div>
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
							<?php 
							$cover=substr($reg_Result['reg_cover'],3) ;

							?>
							<div class="col-md-6" >
								<img id="preveiw_cover"  src="<?php echo $cover; ?>" alt="your image" style="width: 150px;height: 70px; margin-top: 10px;"/>
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
								<img src="<?php echo $pro_img; ?>" id="preveiw_image" width="50%" alt="">
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
					<ul class="notify_wrap">

					</ul>
				</div>

				<!-- Modal Structure -->
				<div id="modal-reset" class="modal modal-fixed-footer image_drop_down_modal_body common-img_wrap">
					<div class="modal-content">
						<div class="modal-header"><h2>Reset Password</h2></div>
						<form id="password-wrap" action="updatepassword.php" method="post" role="form">
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
										
										<div class="input-field col s8">
											<input type="button" value="Update" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn_password_update"> </div>
										</form>
										<div class="modal-footer">
											<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat password_done">Done</a>
										</div>
									</div>
								</div>

								<?php include '../common-ftns/submitting-modal.php'; ?>
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
										<h5>Phone: (+404) 142 21 23 78</h5> 
                                        <input type="hidden" id="userType" name="" value="<?php echo $_SESSION['user_type']; ?>">
									</div>
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
												<script src="../js/method-js/updatepassword.js"></script>
												<script src="../js/method-js/email-validation.js"></script>
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
	$('#preveiw_image').remove();
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



/*=======================================
Edition Time of Registration form
=========================================*/ 

$('#pro-sub-btn_registor_update').click(function(){
// debugger
if ($("#msg").hasClass("email_error")) {

swal({

	title: "This email address already exists",

	type: "error",
//confirmButtonColor: "#DD6B55",
confirmButtonText: "ok",
closeOnConfirm: true,
html: false
});
return;
}

var validator= $("#registor-form").validate({

rules:{

	reg_name:{
		required:true
	},
	reg_lstname:{
		required:true
	},
	reg_email:{
		required:true,
		email:true
	},
	reg_phone:{
		required:true,
		number:true
	},
	reg_postal:{
		required:true
	},
	reg_city:{
		required:true
	},
	reg_province:{
		required:true
	},
	reg_country:{
		required:true
	},
	reg_birth:{
		required:true,
		date: true
	},
	reg_password:{
		required:true,
		minlength:8
	}




},
messages: {

	reg_email:{
		email: 'Please enter the valid email address'  
	} ,
	reg_phone:{
		number:'Mobile number should only contain numbers'
	},
	reg_password:{
		minlength:'Minimum length of password is 8 digits'
	},
	reg_birth:{
		date:'Please enter the valid date format'
	},

},

errorElement : 'div',
errorPlacement: function(error, element) {

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

validator.form();

if (validator.form()== false) {

var body = $("html, body");
$.each($('#registor-form').find(".error"),function(key,value)
{

	if($(value).css('display')!="none")
	{
		body.stop().animate({scrollTop:($(value).offset().top - 150)},1000, 'swing', function() { });
		return false; 
	}
});

}else{
// debugger;
$('#loader').modal({dismissible: false});
$('#loader').modal('open');

var file_data = $('#sortpicture').prop('files')[0];   
var form_data = new FormData();                  
form_data.append('file', file_data);
// alert(form_data); 


if ($('#check_cover').val()!="") {                          
$.ajax({
url: 'registration/upload-ajax-cover.php', // point to server-side PHP script 
dataType: 'text',  // what to expect back from the PHP script, if anything
cache: false,
contentType: false,
processData: false,
data: form_data,                         
type: 'post',
success: function(cover_data){
$('#coverimg').val(cover_data);

$.ajax({

type: "POST",
url: "registration/registration-update.php",
data: $("form").serialize(),
success:function(res){

	var data=JSON.parse(res);
	if (data.status=="admin_success") {

		$("#btn-loader").hide();
		setTimeout(function(){
			$('#loader').modal('close');
			swal({
				title: "Profile successfully updated",

				type: "success",
//confirmButtonColor: "#DD6B55",
confirmButtonText: "ok",
closeOnConfirm: true,
html: false
}, function(){

window.location = "edit_admin.php?id="+data.id;
});
		},3000)
	}else{



		$('#loader').modal('close');
		swal({
			title: "Something went wrong!",

			type: "error",
//confirmButtonColor: "#DD6B55",
confirmButtonText: "ok",
closeOnConfirm: true,
html: true
}, function(){

});
	}

}
})

}
});
}else{

$.ajax({

type: "POST",
url: "registration/registration-update.php",
data: $("form").serialize(),
success:function(res){

	var data=JSON.parse(res);
	if (data.status=="admin_success") {

		$("#btn-loader").hide();
		setTimeout(function(){
			$('#loader').modal('close');
			swal({
				title: "Profile successfully updated",

				type: "success",
//confirmButtonColor: "#DD6B55",
confirmButtonText: "ok",
closeOnConfirm: true,
html: false
}, function(){
window.location = "edit_admin.php?id="+data.id;
});
		},3000)
	}else{



		$('#loader').modal('close');
		swal({
			title: "Something went wrong!",

			type: "error",
//confirmButtonColor: "#DD6B55",
confirmButtonText: "ok",
closeOnConfirm: true,
html: true
}, function(){

});
	}

}
})
}

}

});






/*=================
cover image reader
===================*/
function readcover(input){
$('#cover').show();
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
	$('#cover')
	.attr('src', e.target.result)
	.width(150)
	.height(100);
};
$('#preveiw_cover').remove();
reader.readAsDataURL(input.files[0]);
}


}


$( document ).ready(function(){
var postUrl="";
if ($('#userType').val()=="s_admin") {

postUrl="../methods/get-notification.php?gen_for=s_admin"
}else{

postUrl='../methods/get-notification.php?gen_for=admin&'+
$('#authorities_form').serialize()
}
var isLoadNotify = true;
function generateNotifications(){

var requestAjax = $.ajax({

	type:'GET',
	url:postUrl,
	success:function (res) {
// console.log(res);
if (res) {
var data= JSON.parse(res);

// console.log(data);
$('ul.notify_wrap').html('');
$.each(data,function(k,val){
// console.log(val);
// debugger;
isLoadNotify = true;
var li_Wraps= $(`<li class="li-wrap"><i class="fa fa-times noti_x_icon"  aria-hidden="true"></i>
<a href="#" data-href="`+val.url+`" class="x_icon"> <img src="`+val.photo.slice(3)+`" alt="">
<h5 alt="`+val.title+`" title="`+val.title+`">`+val.title+`</h5>
<p alt="`+val.desc+`" title="`+val.desc+`">`+val.desc+`</p> <span>`+val.time+`</span>
</a><input type="hidden" id="noti_id" value="`+val.notify_id+`"/>
</li>`);


$('ul.notify_wrap').append(li_Wraps);
attachNotiyFunction();
redirectNotiyFunction();
})
}else{
isLoadNotify=true;
} 
}


});
}
// if(!)
function callNotifyFunction(){
if(isLoadNotify){
isLoadNotify=false;
generateNotifications()
callNotifyFunction();
}else{
setTimeout(function(){	
	callNotifyFunction();
},5000);
}

}
callNotifyFunction()


function attachNotiyFunction(){
$('.noti_x_icon').click(function(){

var li= $(event.currentTarget).parents('.li-wrap'); 
var noti_id=li.find('#noti_id').val();
// debugger;
$.ajax({

type:"POST",
url: '../methods/update-notification.php',
data :{"id":noti_id},
success:function(data){

if (data=="success") {

	li.hide();
// debugger;
}else{

li.show();
}


}
})






});
}



function redirectNotiyFunction(){
$('.x_icon').click(function(){

var loc =$(this).attr('data-href');

var li= $(event.currentTarget).parents('.li-wrap'); 

var noti_id=li.find('#noti_id').val();
// debugger;
$.ajax({

type:"POST",
url: '../methods/update-notification.php',
data :{"id":noti_id},
success:function(data){

if (data=="success") {

	li.hide();
	window.location= loc;
// debugger;
}else{

li.show();
}


}
})






});
}

})

</script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
				</html>







