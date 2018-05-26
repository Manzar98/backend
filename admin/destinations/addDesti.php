<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Add a Destination</title>
	<?php 
	include '../header_inner_folder.php'; 
	include'../../common-ftns/generate_pages.php'; 
	$userId=$_GET['id'];
	?>
	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<div class="db-title">
				<h3><img src="../../images/icon/dbc5.png" alt=""/> Add Destination</h3>
				<p>Fill out the form below to add a new destination.</p>
			</div>
			<div class="db-profile-edit">
				<form class="col s12"  data-toggle="validator" id="desti-form" role="form" action="hotel-post.php" method="POST" enctype="multipart/form-data">

					<input type="hidden" name="user_id" value="<?php echo $userId; ?>">
					<input type="hidden" name="is_time" value="create">
					<?php
					$asso_array= array();
					$asso_array[]= array("tag"=>"input", "type"=>"text", "id"=>"desti_name", "name"=>"desti_name","label"=>"Destination Name","classDiv"=>"input-field col s8 web","value"=>"");
					$asso_array[]= array("tag"=>"textarea", "id"=>"desti_description", "name"=>"desti_description","label"=>"Destination Description","value"=>"");
					$result= gen_page($asso_array); ?>
					
				<?php	echo $result;
					?>
					<div class="imgVeiwinline row" id="hotel_img_wrap" style="display: none;">

						<div class="row int_title"><label>Photos :</label></div>

					</div>
					<div class="imgVeiwinline row" id="hotel_cover_img" style="display: none;">
							<div class="row int_title"><label>Destination Cover Photo:</label></div>
						</div>
						<div class="row common-top">
						<div class="">
							<!-- Modal Trigger -->
							<div class="col s1"></div>
							<a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-coverimg" >Destination Cover Photo</a>
							<input type="hidden" name="desti_coverimg" id="img_cover">
						</div>
					</div>
						 
					<div class="row common-top">
						<div class="">
							<!-- Modal Trigger-->
							<div class="col s1"></div>
							<a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-images" >Destination Photos</a>
							<input type="hidden" name="common_image" id="img_ids">
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
							<input type="button"  value="Add" class="waves-effect waves-light pro-sub-btn pro-sub-btn" id="pro-sub-btn_desti"> 
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal Structure -->
			<div id="modal-coverimg" class="modal modal-fixed-footer image_drop_down_modal_body cover_wrap" style="width: 50%; margin: 0 auto; box-shadow:none;" >

				<div class="modal-content">
						<div class="modal-header"><h2>Upload Cover Photo</h2></div>
				<iframe src="up_load_cover.php?name=desti-cover"></iframe>
                   <div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Done</a>
				</div>
		   </div>
		   </div>
<?php include '../../common-ftns/upload-img-modal.php'; ?>
<?php include '../../common-ftns/submitting-modal.php'; ?>
<?php  include"../footer_inner_folder.php";  ?>
<script src="../../js/destination-js/destination.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
	$('#modal-coverimg').modal({dismissible: false});

});
</script>
</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>