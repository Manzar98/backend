<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Add Amenity</title>
	<?php 
	include '../header_inner_folder.php'; 
	include'../../common-ftns/generate_pages.php'; 
	$userId=$_GET['id'];
	?>
	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<div class="db-title">
				<h3><img src="../../images/icon/dbc5.png" alt=""/> Add Amenity</h3>
				<p>Fill out the form below to add a new amenity.</p>
			</div>
			<div class="db-profile-edit">
				<form class="col s12"  data-toggle="validator" id="amenity-form" role="form" action="hotel-post.php" method="POST" enctype="multipart/form-data">

					<input type="hidden" name="user_id" value="<?php echo $userId; ?>">
					<input type="hidden" name="is_time" value="create">
					<?php
					$asso_array= array();
					$asso_array[]= array("tag"=>"input", "type"=>"text", "id"=>"amenity_name", "name"=>"amenity_name","label"=>"Amenity Name","classDiv"=>"input-field col s8 web","value"=>"");
					$asso_array[]= array("tag"=>"textarea", "id"=>"amenity_description", "name"=>"amenity_description","label"=>"Amenity Description","value"=>"");
					$result= gen_page($asso_array); ?>
					
					<?php	echo $result;
					?>
					<div class="row common-top">
						<div>
							<label>Applies to :</label>
						</div>
						<input type="hidden" name="amenity_page[]" id="amenity_page">
							<div class="common-top">
							<div  class="col s3">
								<p class="pTAG"> 
									<input type="checkbox" class="filled-in applyTo" id="filled-in-hotel" value="hotel" />
									<label for="filled-in-hotel" class="applyTo-label" style="padding-left: 12px !important">Hotel</label>
								</p>
							</div>
							<div  class="col s3">
								<p class="pTAG"> 
									<input type="checkbox" class="filled-in applyTo" id="filled-in-room" value="room"/>
									<label for="filled-in-room" class="applyTo-label" style="padding-left: 12px !important">Room</label>
								</p>
							</div>
							<div  class="col s3">
								<p class="pTAG"> 
									<input type="checkbox" class="filled-in applyTo" id="filled-in-banquet" value="banquet"/>
									<label for="filled-in-banquet" class="applyTo-label">Banquet</label>
								</p>
							</div>
							<div  class="col s3">
								<p class="pTAG"> 
									<input type="checkbox" class="filled-in applyTo" id="filled-in-conference" value="conference" />
									<label for="filled-in-conference" class="applyTo-label">Conerence</label>
								</p>
							</div>
							</div>
						</div>

					<div class="row" >
						<p class="pTAG">
							<input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="desti_inactive" />
							<label for="filled-in-inactive">Inactive</label>
						</p>
					</div>
					<div>
						<div class="input-field col s8">
							<input type="button"  value="Add" class="waves-effect waves-light pro-sub-btn pro-sub-btn" id="pro-sub-btn_amenity"> 
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include '../../common-ftns/submitting-modal.php'; ?>
<?php  include"../footer_inner_folder.php";  ?>
<script src="../../js/amenity-js/amenity.js"></script>
<script src="../../js/method-js/adminAmenity.js"></script>
</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>