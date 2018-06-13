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
	$amenityName= $_GET['a_name'];
	$D_Query=select('amenities',array('amenity_id'=>$amenityiId,'user_id'=>$userId));
	$upQuery=select('amenities',array('amenity_name'=>$amenityName,'user_id'=>$userId));
	$nameStr_array=[];
    $idStr_array=[];
	while ($resutlUpquery=mysqli_fetch_assoc($upQuery)) {
         // echo "Manzar";
		array_push($nameStr_array, $resutlUpquery['amenity_page']);
		array_push($idStr_array, $resutlUpquery['amenity_id']);
	} ?>

	<?php	include'../../common-ftns/generate_pages.php'; 
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
						<input type="hidden" name="" id="amPage_list" value="<?php echo implode(',', $nameStr_array); ?>">
						<input type="hidden" name="" id="amP_id" value="<?php echo implode(',', $idStr_array); ?>">
						<input type="hidden" name="user_id" value="<?php echo $result_D['user_id']; ?>">
						<input type="hidden" name="is_time" value="update">
						<input type="hidden" id="a_Id" name="amenity_id" value="<?php echo $result_D['amenity_id'];  ?>">
						<input type="hidden" name="A_Name" value="<?php echo $result_D['amenity_name']; ?>">
						<input type="hidden" name="P_Name" value="<?php echo $result_D['amenity_page']; ?>">
						
						<?php
						$asso_array= array();
						$asso_array[]= array("tag"=>"input", "type"=>"text", "id"=>"amenity_name", "name"=>"amenity_name","label"=>"Amenity Name","classDiv"=>"input-field col s8 web","value"=>$result_D['amenity_name']);
						$asso_array[]= array("tag"=>"textarea", "id"=>"amenity_description", "name"=>"amenity_description","label"=>"Amenity Description","value"=>$result_D['amenity_description']);
						$result= gen_page($asso_array); ?>
						<?php 	echo $result;
						?>
						<div class="col s12 common-top">

							<label>Applies to</label>
							<select name="amenity_page[]" id="amenity_page" multiple>
								<option value="" disabled="">Select One</option>
								<option value="hotel">Hotel</option>
								<option value="room">Room</option>
								<option value="banquet">Banquet</option>
								<option value="conference">Conference</option>
							</select>
						</div>
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
<script type="text/javascript">
	jQuery(document).ready(function(){
   
   var selectedOptions=$('#amPage_list').val().split(',');
   $.each(selectedOptions, function(i,e){
     $("#amenity_page option[value='" + e + "']").prop("selected", true);
     $('#amenity_page').material_select();
     
 });

})
</script>
</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>