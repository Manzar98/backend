<?php include '../../common-apis/reg-api.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<?php if(isset($_GET['fee_id']) && $_GET['fee_id']){ ?>
		<title>Edit Service Fee For End User's</title>
	<?php }else{ ?>
		<title>Add Service Fee For End User's</title>
	<?php } ?>
	
	<?php 
	include '../header_inner_folder.php'; 
	$userId=$_GET['id'];
	?>
	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<div class="db-title">
				<?php if (isset($_GET['fee_id']) && $_GET['fee_id']) { ?>
					<h3><img src="../../images/icon/dbc5.png" alt=""/> Edit Service Fee For End User's</h3>
				<?php }else{ ?>
					<h3><img src="../../images/icon/dbc5.png" alt=""/> Add Service Fee For End User's</h3>
				<?php } ?>
				
				<!-- <p>Fill out the form below to add a new amenity.</p> -->
			</div>
			<?php if (isset($_GET['fee_id']) && $_GET['fee_id']) { 

                  $D_Query=select('service_fee',array('fee_id'=>$_GET['fee_id'],'user_id'=>$_GET['id']));

                  while ($result_D=mysqli_fetch_assoc($D_Query)){ 
	
				?>
              
 
				     <div class="db-profile-edit">
				<form class="col s12"  data-toggle="validator" id="serviceFee-form" role="form" action="" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="user_id" value="<?php echo $_GET['id']; ?>">
					<input type="hidden" name="is_time" value="update">
					<input type="hidden" name="fee_user_type" value="end user">
					<input type="hidden" name="fee_id" value="<?php echo $result_D['fee_id']; ?>">
					<div>
						<label class="col s4">Service Fee</label>
						<div class="input-field col s8">
							<input type="text" value="<?php echo $result_D['fee_charges']; ?>" class="validate" name="fee_charges" id="fee_charges" > 
						</div>
					</div>
					<div class="col s12 common-top">
						<label>“percentage” or “Amount”</label>
						<select name="fee_type" id="fee_type">
							<?php if ($result_D['fee_type']=="Percentage") { ?>
								<option value="" disabled="">Select One</option>
								<option value="Percentage" selected="">Percentage</option>
								<option value="Amount">Amount</option>
							<?php }else if($result_D['fee_type']=="Amount"){ ?>
								<option value="">Select One</option>
								<option value="Percentage">Percentage</option>
								<option value="Amount" selected="">Amount</option>
							<?php }else{ ?>
								<option value="" selected="" disabled="">Select One</option>
								<option value="Percentage">Percentage</option>
								<option value="Amount">Amount</option>
							<?php } ?>
						</select>
					</div>
					<div>
						<div class="input-field col s8">
							<input type="button"  value="Update" class="waves-effect waves-light pro-sub-btn pro-sub-btn" id="pro-sub-btn_fee"> 
						</div>
					</div>
				</form>
			</div>
		<?php } ?>
			<?php }else{ ?>
				<div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="serviceFee-form" role="form" action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="user_id" value="<?php echo $userId; ?>">
						<input type="hidden" name="is_time" value="create">
						<input type="hidden" name="fee_user_type" value="end user">
						<div>
							<label class="col s4">Service Fee</label>
							<div class="input-field col s8">
								<input type="text" value="" class="validate" name="fee_charges" id="fee_charges"> 
							</div>
						</div>
						<div class="col s12 common-top">
							<label>“percentage” or “Amount”</label>
							<select name="fee_type" id="fee_type">
								<option value="">Select One</option>
								<option value="Percentage">Percentage</option>
								<option value="Amount">Amount</option>
							</select>
						</div>
						<div>
							<div class="input-field col s8">
								<input type="button"  value="Add" class="waves-effect waves-light pro-sub-btn pro-sub-btn" id="pro-sub-btn_fee"> 
							</div>
						</div>
					</form>
				</div>
			<?php	} ?>
		</div>
	</div>
</div>
<?php include '../../common-ftns/submitting-modal.php'; ?>
<?php  include"../footer_inner_folder.php";  ?>
<script src="../../js/service-fee-js/serviceFee.js"></script>
</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>