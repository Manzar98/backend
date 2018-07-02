<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>Admin's-Profile</title>
	<?php include 'header.php'; 

	include"../common-apis/api.php";
	$reg_Query= select('credentials',array("user_id"=>$_GET['id']));
	if (isset($_GET['u_type']) && $_GET['u_type']=="admin") {
		$reg_authority=select('authorities',array("user_id"=>$_GET['id']));
       
	}?>
	<?php   while ($reg_Result=mysqli_fetch_assoc($reg_Query)) { 
		$pro_img=substr($reg_Result['reg_photo'],3) ;  ?>
		<input type="hidden" id="crntAdmin_id" value="<?php echo $_SESSION['user_id']; ?>">
		<input type="hidden" id="veiwAdmin_id" value="<?php echo $_GET['id']; ?>">
		<div class="veiw_sus_appr">
			<div class="row" style="margin-top: 20px;">
				<div class="col s11">

					<div class="pull-right sus_appr" style="margin-left: 10px;">

						<?php if ($reg_Result['user_status']=="Approved") { ?>

							<a  href="#susp" u_id="<?php echo $reg_Result['user_id'] ?>" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" >Deactivate</a>
							<a  onclick="show_suspend(event)" u_id="<?php echo $reg_Result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;" u_type="<?php echo $reg_Result['user_type']; ?>">Deactivate</a>
							<a  onclick="show_approve(event)"  u_id="<?php echo $reg_Result['user_id'] ?>" class="approve btn" value="Approved" style="display: none;" u_type="<?php echo $reg_Result['user_type']; ?>">Activate</a>

						<?php  }else{ ?>

							<a href="#susp"  u_id="<?php echo $reg_Result['user_id'] ?>" class="suspend waves-effect waves-light btn modal-trigger" style="display: none;">Deactivate</a>
							<a  onclick="show_suspend(event)" u_id="<?php echo $reg_Result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;" u_type="<?php echo $reg_Result['user_type']; ?>">Deactivate</a>
							<a  onclick="show_approve(event)"  u_id="<?php echo $reg_Result['user_id'] ?>" class="approve btn" value="Approved" u_type="<?php echo $reg_Result['user_type']; ?>">Activate</a>


						<?php   } ?>

					</div>
				</div>
			</div>

			<div class="text-center " >
				<span style="margin-left: 10px;">Status:</span>
				<?php if ($reg_Result['user_status']=="Approved") { ?>

					<span class="appr" style="color: green; "><b>Activated</b></span>
					<span class="sus" style="color: red; display: none;"><b>Deactivated</b></span>



				<?php   }else{ ?>

					<span class="appr" style="color: green; display: none;"><b>Activated</b></span>
					<span class="sus" style="color: red;"><b>Deactivated</b></span>
				<?php   } ?>
			</div>
		</div>
		<div class="db-profile">   
			<img src="<?php echo $pro_img; ?>" alt="">
			<h4><?php echo $reg_Result['reg_name'];  ?> <?php echo $reg_Result['reg_lstname']; ?></h4>
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
			<input type="hidden"  value="<?php echo $reg_Result['reg_name'];?>" id=hidden-name_val>
			<input type="hidden"  value="<?php echo $_GET['id']?>" id=hidden-id_val>
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
						<th>Join Date</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $age; ?></td>
						<td><?php echo $reg_Result['reg_joinD']; ?></td>
					</tr>
				</tbody>
			</table>
		</div>



		<div class="db-profile-edit">

			<form class="col s12" action="" method="post" role="form" id="registor-form">
               <div class="veiwCheckbox">
               	<?php while ($authQuery=mysqli_fetch_assoc($reg_authority)) {?>
				<div class="row">
					<label>Can Manage:</label>
					<div class="col s2"></div>
					<div class="col s3">
						<p class="pTAG">
							<input type="checkbox" name="vendors" class="filled-in canManage" id="filled-in-vendor" value="<?php echo $authQuery['vendors']; ?>">
							<label for="filled-in-vendor" class="canManage-label">Vendor</label>
						</p>
					</div>
					<div class="col s3">
						<p class="pTAG">
							<input type="checkbox" name="admins" class="filled-in canManage" id="filled-in-user" value="<?php echo $authQuery['admins']; ?>">
							<label for="filled-in-user" class="canManage-label" style="padding-left: 7px !important;">Users</label>
						</p>
					</div>
					<div class="col s3">
						<p class="pTAG">
							<input type="checkbox" name="pages" class="filled-in canManage" id="filled-in-page" value="<?php echo $authQuery['pages']; ?>">
							<label for="filled-in-page" class="canManage-label" style="padding-left: 7px !important;">Pages</label>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col s2"></div>
					<div class="col s3">
						<p class="pTAG">
							<input type="checkbox" name="destinations" class="filled-in canManage" id="filled-in-destination" value="<?php echo $authQuery['destinations']; ?>">
							<label for="filled-in-destination" class="canManage-label">Destinations</label>
						</p>
					</div>
					<div class="col s3">
						<p class="pTAG">
							<input type="checkbox" name="faqs" class="filled-in canManage" id="filled-in-faq" value="<?php echo $authQuery['faqs']; ?>">
							<label for="filled-in-faq" class="canManage-label" style="padding-left: 7px !important;">FAQs</label>
						</p>
					</div>
					<div class="col s3">
						<p class="pTAG">
							<input type="checkbox" name="bloggers" class="filled-in canManage" id="filled-in-blogger" value="<?php echo $authQuery['bloggers']; ?>">
							<label for="filled-in-blogger" class="canManage-label">Bloggers</label>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col s2"></div>
					<div class="col s3">
						<p class="pTAG">
							<input type="checkbox" name="amenities" class="filled-in canManage" id="filled-in-amenity" value="<?php echo $authQuery['amenities']; ?>">
							<label for="filled-in-amenity" class="canManage-label">Amenities</label>
						</p>
					</div>
					<div class="col s3">
						<p class="pTAG">
							<input type="checkbox" name="listing" class="filled-in canManage" id="filled-in-listing" value="<?php echo $authQuery['listing']; ?>">
							<label for="filled-in-listing" class="canManage-label" style="padding-left: 7px !important;">Listing</label>
						</p>
					</div>
					<div class="col s3">
						<p class="pTAG">
							<input type="checkbox" name="blogs" class="filled-in canManage" id="filled-in-blogs" value="<?php echo $authQuery['blogs']; ?>">
							<label for="filled-in-blogs" class="canManage-label" style="padding-left: 7px !important;">Blogs</label>
						</p>
					</div>
					<div class="col s3" style="display: none;">
						<p class="pTAG">
							<input type="checkbox" name="servicefee" class="filled-in canManage" id="filled-in-service" value="on">
							<label for="filled-in-service" class="canManage-label" style="padding-left: 7px !important;">Service Fee</label>
						</p>
					</div>
				</div>
			<?php } ?>
			</div>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-10 ">
						<div class="row reason_sp">
							<?php if(!empty($reg_Result['suspend_reason'])){?>


								<div class="col-md-10 col-sm-12 col-xs-12 ">
									<label >Reason Deactivation:</label>
									<div class="pull-left">
										<span><?php echo $reg_Result['suspend_reason'];  ?></span>
									</div>
								</div>

							<?php	} ?>
						</div>
						<div class="row">
							
							<div class="col-md-10 col-sm-12 col-xs-12 realtime_reason" style="display: none;">
								<label >Reason Deactivation:</label>
								<div class="pull-left">
									<span class="res_sup"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12 ">
								<label >First Name :</label>
								<div class="pull-left">
									<span><?php echo $reg_Result['reg_name'];  ?></span>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12 ">
								<label>Last Name :</label>
								<div class="pull-left">
									<span><?php echo $reg_Result['reg_lstname'];  ?></span> 
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<label>Email Address :</label>
								<div class="pull-left">
									<span><?php echo $reg_Result['reg_email'];  ?></span>

								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<label>Country</label>
								<div class="pull-left">
									<span><?php echo $reg_Result['reg_country'];  ?></span>
								</div>
							</div>
						</div>

						<div class="row">

							<div class="col-md-6 col-sm-12 col-xs-12">
								<label>Mobile Number :</label>
								<div class="pull-left">
									<span><?php echo $reg_Result['reg_phone'];  ?></span>
								</div>   
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<label>Postal Address</label>
								<div class="pull-left">
									<span><?php echo $reg_Result['reg_postal'];  ?></span>
								</div>
							</div>
						</div>
						<div class="row">

							<div class="col-md-6 col-sm-12 col-xs-12">
								<label>City :</label>
								<div class="pull-left">
									<span><?php echo $reg_Result['reg_city'];  ?></span>
								</div>   
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<label>Province :</label>
								<div class="pull-left">
									<span><?php echo $reg_Result['reg_province'];  ?></span>
								</div> 
							</div>

						</div>
					</div>
				</div>
			</div>
			
		</div>

		<?php include '../common-ftns/suspend_reason_modal.php';  } ?>
		<?php include 'footer.php'; ?>

		<script type="text/javascript">

			var rowValue = "";
			$('#susp').modal({
      	dismissible: false, // Modal can be dismissed by clicking outside of the modal

      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
        // alert("Ready");
        rowValue =trigger.parents('.sus_appr');
        console.log(modal, trigger);

    },
});
			function reason_submit() {

				if ($('#textarea_susp').val()) {

					rowValue.find('.org_susp').trigger('click');
					rowValue.find('.suspend').hide();
					$('#textarea_susp').val('');  
					$('.realtime_reason').show();
					$('#susp').modal('close');
				} 
			}
			function show_suspend(event) {

				var text_area=$('#textarea_susp').val();
				var sus=$(event.currentTarget).parents('.veiw_sus_appr');
				var btn=$(event.currentTarget).attr('value');
				var u_id=$(event.currentTarget).attr('u_id');
				var id_val= $('#hidden-id_val').val();
				var name_val=$('#hidden-name_val').val();
				var u_type=$(event.currentTarget).attr('u_type');
				$.ajax({

					type:"POST",
					url:"update-user_status.php",
					data:{'btn':btn,'u_id':u_id,'reason':text_area,'u_type':u_type},
					success:function(res){

						var data=JSON.parse(res);

						if (data.status=="Suspended") {

							sus.find('.sus').show();
							sus.find('.appr').hide();
							var st_val= sus.find('.sus').text();

							$('#registor-form').find('.res_sup').text(text_area);    
						}else{


						}
						console.log(data);
					}    

				});
				$(event.currentTarget).hide();

				$(event.currentTarget).parents('.sus_appr').find('.approve').show();
	 // debugger;
	} 

	function show_approve(event) {

		var sus=$(event.currentTarget).parents('.veiw_sus_appr');
		var btn=$(event.currentTarget).attr('value');
		var u_id=$(event.currentTarget).attr('u_id');
		var id_val= $('#hidden-id_val').val();
		var name_val=$('#hidden-name_val').val();
		var u_type=$(event.currentTarget).attr('u_type');

		swal({

			title: "Are you sure you want to approve this user?",

			type: "warning",
            // confirmButtonColor: "#DD6B55",
            showCancelButton: true,
            confirmButtonText: "ok",
            closeOnConfirm: true,
            confirmButtonText: "Yes",
            cancelButtonText: "cancel",
            closeOnConfirm: true,
            closeOnCancel: true
        },function (isconfirm) {

        	if (isconfirm) {

        		$.ajax({

        			type:"POST",
        			url:"update-user_status.php",
        			data:{'btn':btn,'u_id':u_id,'u_type':u_type},
        			success:function(res){

        				var data=JSON.parse(res);

        				if (data.status=="Approved") {

        					$('.reason_sp').hide();
        					sus.find('.sus').hide();
        					sus.find('.appr').show();
        					sus.find('.pend').hide();
        					sus.find('.approve').hide();
        					sus.find('.suspend').show();
        					var st_val= sus.find('.appr').text();
					      $('.realtime_reason').hide(); //in veiw time it works only
					  }else{

					  	console.log(data);
					  }

					}   

				});
        	}
        });


	}

 $(".veiwCheckbox input").attr("disabled", true);
 if ($('#crntAdmin_id').val()==$('#veiwAdmin_id').val()) {
 	 $('.sus_appr').remove();
 }
// debugger
if ($('#filled-in-vendor').val()=="on") {
	$('#filled-in-vendor').prop('checked', true)
}

if ($('#filled-in-blogger').val()=="on") {
	$('#filled-in-blogger').prop('checked', true)
}

if ($('#filled-in-user').val()=="on") {
	$('#filled-in-user').prop('checked', true)
}

if ($('#filled-in-destination').val()=="on") {
	$('#filled-in-destination').prop('checked', true)
}

if ($('#filled-in-listing').val()=="on") {
	$('#filled-in-listing').prop('checked', true)
}

if ($('#filled-in-page').val()=="on") {
	$('#filled-in-page').prop('checked', true)
}

if ($('#filled-in-blogs').val()=="on") {
	$('#filled-in-blogs').prop('checked', true)
}

if ($('#filled-in-amenity').val()=="on") {
	$('#filled-in-amenity').prop('checked', true)
}

if ($('#filled-in-faq').val()=="on") {
	$('#filled-in-faq').prop('checked', true)
}
</script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
</html>







