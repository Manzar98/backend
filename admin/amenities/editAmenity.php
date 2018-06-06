<?php 
include '../../common-apis/reg-api.php';
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Edit Amenity</title>
	<?php 
	include '../header_inner_folder.php'; 
	$userId=$_GET['id'];
	$amenityiId=$_GET['a_id'];
	$D_Query=select('amenities',array('amenity_id'=>$amenityiId,'user_id'=>$userId));

	include'../../common-ftns/generate_pages.php'; 
	while ($result_D=mysqli_fetch_assoc($D_Query)){ 
		?>
		<div class="db-cent-3">
			<div class="db-cent-table db-com-table">
				<div class="db-title">
					<h3><img src="../../images/icon/dbc5.png" alt=""/> Edit Amenity</h3>
					<p>Fill out the form below to update a amenity.</p>
				</div>
				<div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="amenity-form" role="form" action="hotel-post.php" method="POST" enctype="multipart/form-data">

						<input type="hidden" name="user_id" value="<?php echo $result_D['user_id']; ?>">
						<input type="hidden" name="is_time" value="update">
						<input type="hidden" name="amenity_id" id="a_Id" value="<?php echo $result_D['amenity_id']; ?>">
						<?php
						$asso_array= array();
						$asso_array[]= array("tag"=>"input", "type"=>"text", "id"=>"amenity_name", "name"=>"amenity_name","label"=>"Amenity Name","classDiv"=>"input-field col s8 web","value"=>$result_D['amenity_name']);
						$asso_array[]= array("tag"=>"textarea", "id"=>"amenity_description", "name"=>"amenity_description","label"=>"Amenity Description","value"=>$result_D['amenity_description']);
						$result= gen_page($asso_array); ?>
						<?php 	echo $result;
						?>
					<div class="row" >
									<p class="pTAG inactive_checkbox">
										<input type="hidden" name="amenity_inactive" id="hidden_checkbox">
										<?php if ($result_D['amenity_inactive']=='on') { ?>

											<input type="checkbox" class="filled-in inactive" id="filled-in-inactive"  checked="" />
											<label for="filled-in-inactive">Inactive</label>

											<?php 	}else{ ?>

												<input type="checkbox" class="filled-in inactive" id="filled-in-inactive"  />
												<label for="filled-in-inactive">Inactive</label>
												<?php  }  ?>

											</p>     
										</div>
										<div>
											<div class="input-field col s8">
												<input type="button"  value="Update" class="waves-effect waves-light pro-sub-btn pro-sub-btn" id="pro-sub-btn_amenity"> 
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<?php  } ?>
					</div>
					<?php include '../../common-ftns/submitting-modal.php'; ?>
					<?php  include"../footer_inner_folder.php";  ?>
					<script src="../../js/amenity-js/amenity.js"></script>
					
				</body>
				<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
				</html>