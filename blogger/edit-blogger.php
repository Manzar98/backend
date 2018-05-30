<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Profile</title>
	<?php include 'header.php'; 
	include"../common-apis/api.php";
	include'../common-ftns/generate_pages.php';
	$reg_Query= select('credentials',array("user_id"=>$_SESSION['user_id'])); ?>

	<?php while ($reg_Result=mysqli_fetch_assoc($reg_Query)) {

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
			<form class="col s12" action="blogger-update.php" method="post" role="form" id="registor-form">
				<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
				<input type="hidden" name="user_type" value="<?php echo $reg_Result['user_type']; ?>">
				<input type="hidden" id="u_email" value="<?php echo $reg_Result['reg_email']; ?>">
				<?php	$asso_array= array();
				$asso_array[]=array(

					array("tag"=>"input", "type"=>"text", "id"=>"reg_name", "name"=>"reg_name", "label"=>"First Name", "classDiv"=>"row", "2col"=>"col s6","value"=>$reg_Result['reg_name']),
					array("tag"=>"input", "type"=>"text", "id" =>"reg_lstname", "name"=>"reg_lstname", "label"=>"Last Name", "classDiv"=>"row", "2col"=>"col s6","value"=>$reg_Result['reg_lstname'])
				);
				$asso_array[]=array(

					array("tag"=>"input", "type"=>"text", "id"=>"reg_phone", "name"=>"reg_phone", "label"=>"Mobile Number", "classDiv"=>"row", "2col"=>"col s6","value"=>$reg_Result['reg_phone']),
					array("tag"=>"input", "type"=>"text", "id" =>"reg_postal", "name"=>"reg_postal", "label"=>"Postal Address", "classDiv"=>"row", "2col"=>"col s6","value"=>$reg_Result['reg_postal'])
				);
				$asso_array[]=array(

					array("tag"=>"input", "type"=>"text", "id"=>"reg_city", "name"=>"reg_city", "label"=>"City", "classDiv"=>"row", "2col"=>"col s6","value"=>$reg_Result['reg_city']),
					array("tag"=>"input", "type"=>"text", "id" =>"reg_province", "name"=>"reg_province", "label"=>"Province", "classDiv"=>"row", "2col"=>"col s6","value"=>$reg_Result['reg_province'])
				);
				$asso_array[]= array("tag"=>"input", "type"=>"text", "id"=>"reg_country", "name"=>"reg_country","label"=>"Country","classDiv"=>"input-field col s8 web","value"=>$reg_Result['reg_country']);
				$result= gen_page($asso_array);
				echo $result;
				?>
				<div>
					<label class="col s4">Email Address</label>
					<div class="input-field col s8">
						<input type="email" onblur="checkemail_main(this.value)" value="<?php echo $reg_Result['reg_email'];  ?>" id="reg_email" name="reg_email" class="validate">
						<span id="msg" class="hi-red"></span>
					</div>
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

<?php include '../common-ftns/submitting-modal.php'; ?>
			<?Php 	} ?>




			<?php include 'footer.php'; ?>
			<script src="../js/croppie.js"></script>
			<script src="../js/registration-js/registration.js"></script>
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

	</script>