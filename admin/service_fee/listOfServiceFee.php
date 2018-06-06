<?php  include '../../common-apis/reg-api.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>Service Fee</title>	
	<?php  include '../header_inner_folder.php'; 
	$d_Query='SELECT * FROM service_fee where user_id="'.$_GET['id'].'"';
	$d_resp =mysqli_query($conn,$d_Query)  or die(mysqli_error($conn));?>
	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<div class="row">
				<div class="db-title col s9">
					<h3><img src="../../images/icon/dbc5.png" alt=""/> Service Fee</h3>
					<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
				</div>
			</div>
			<?php if (mysqli_num_rows($d_resp) > 0) {  ?>
				
					<?php  while ($result=mysqli_fetch_assoc($d_resp)) { ?>
						<?php if (isset($result['fee_user_type']) && $result['fee_user_type']=="end user") { ?>
							<div class="row common-top text-center">
					        <div class="col s2"></div>
							<div class="col s4">
								<a class="waves-effect waves-light btn modal-trigger spc-modal" href="feeEndUser.php?id=<?php echo $_GET['id']; ?>&fee_id=<?php echo $result['fee_id']; ?>">Fee for end user's</a>
							</div>
						<?php }else{ ?>
							<div class="col s4">
								<a class="waves-effect waves-light btn modal-trigger spc-modal" href="feeEndUser.php?id=<?php echo $_GET['id']; ?>">Fee for end user's</a>
							</div>
						<?php } ?>

						<?php if (isset($result['fee_user_type']) && $result['fee_user_type']=="vendor") { ?>
							<div class="col s4">
								<a class="waves-effect waves-light btn modal-trigger spc-modal" href="feeVendor.php?id=<?php echo $_GET['id']; ?>&fee_id=<?php echo $result['fee_id']; ?>">Fee for vendor's</a>
							</div>
						<?php }else{ ?>
							<div class="col s4">
								<a class="waves-effect waves-light btn modal-trigger spc-modal" href="feeVendor.php?id=<?php echo $_GET['id']; ?>">Fee for vendor's</a>
							</div>
							</div>
						<?php } ?>
					

				<?php } ?>
			<?php }else{ ?>		
				<div class="row common-top text-center">
					<div class="col s2"></div>
					<div class="col s4">
						<a class="waves-effect waves-light btn modal-trigger spc-modal" href="feeEndUser.php?id=<?php echo $_GET['id']; ?>">Fee for end user's</a>
					</div>
					<div class="col s4">
						<a class="waves-effect waves-light btn modal-trigger spc-modal" href="feeVendor.php?id=<?php echo $_GET['id']; ?>">Fee for vendor's</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php include"../footer_inner_folder.php"; ?>
</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>
