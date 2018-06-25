<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Add Admin</title>
	<?php 
	include 'header.php';
	$userId=$_GET['id'];
	?>
	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<div class="db-title">
				<h3><img src="../images/icon/dbc5.png" alt=""/> Add Admin</h3>
				<p>Fill out the form below to add a new admin.</p>
			</div>
			<div class="db-profile-edit">
				<form class="col s12"  data-toggle="validator" id="admins-form" role="form" action="" method="POST" enctype="multipart/form-data">

					<input type="hidden" name="user_id" value="<?php echo $userId; ?>">
					<input type="hidden" name="is_time" value="create">
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
							<div class="row">
								<div class="col-md-6">
									<label style="padding-bottom: 10px;">Email Address</label>
									<div class="input-field">
										<input type="email" onblur="checkemail_main(this.value)" value="" id="reg_email" name="reg_email" class="validate" > 
										<span id="msg" class="hi-red"></span>
									</div>
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

							<div class="row">
								<label>Can Manage:</label>
								<div class="col s2"></div>
								<div class="col s3">
									<p class="pTAG">
										<input type="checkbox" name="vendors" class="filled-in canManage" id="filled-in-vendor" value="on">
										<label for="filled-in-vendor" class="canManage-label">Vendor</label>
									</p>
								</div>
								<div class="col s3">
									<p class="pTAG">
										<input type="checkbox" name="admins" class="filled-in canManage" id="filled-in-user" value="on">
										<label for="filled-in-user" class="canManage-label" style="padding-left: 7px !important;">Users</label>
									</p>
								</div>
								<div class="col s3">
									<p class="pTAG">
										<input type="checkbox" name="pages" class="filled-in canManage" id="filled-in-page" value="on">
										<label for="filled-in-page" class="canManage-label" style="padding-left: 7px !important;">Pages</label>
									</p>
								</div>
							</div>
							<div class="row">
								<div class="col s2"></div>
								<div class="col s3">
									<p class="pTAG">
										<input type="checkbox" name="destinations" class="filled-in canManage" id="filled-in-destination" value="on">
										<label for="filled-in-destination" class="canManage-label">Destinations</label>
									</p>
								</div>
								<div class="col s3">
									<p class="pTAG">
										<input type="checkbox" name="faqs" class="filled-in canManage" id="filled-in-faq" value="on">
										<label for="filled-in-faq" class="canManage-label" style="padding-left: 7px !important;">FAQs</label>
									</p>
								</div>
								<div class="col s3">
									<p class="pTAG">
										<input type="checkbox" name="bloggers" class="filled-in canManage" id="filled-in-blogger" value="on">
										<label for="filled-in-blogger" class="canManage-label">Bloggers</label>
									</p>
								</div>
							</div>
							<div class="row">
								<div class="col s2"></div>
								<div class="col s3">
									<p class="pTAG">
										<input type="checkbox" name="amenities" class="filled-in canManage" id="filled-in-amenity" value="on">
										<label for="filled-in-amenity" class="canManage-label">Amenities</label>
									</p>
								</div>
								<div class="col s3">
									<p class="pTAG">
										<input type="checkbox" name="servicefee" class="filled-in canManage" id="filled-in-service" value="on">
										<label for="filled-in-service" class="canManage-label" style="padding-left: 7px !important;">Service Fee</label>
									</p>
								</div>
							</div>
							<div class="row" >

								<p class="pTAG">
									<input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="desti_inactive" />
									<label for="filled-in-inactive">Inactive</label>
								</p>
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
									<input type="button"  value="Add" class="waves-effect waves-light pro-sub-btn pro-sub-btn" id="pro-sub-btn_admins"> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include '../common-ftns/submitting-modal.php'; ?>
			<?php  include"footer.php";  ?>
			<script src="../js/croppie.js"></script>
			<script src="../js/method-js/email-validation.js"></script>
			<script src="../js/admin-js/admin.js"></script>
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
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>