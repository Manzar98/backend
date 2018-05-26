zzz<?php 
include '../../common-apis/reg-api.php';
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Edit Page</title>
	<?php 
	include '../header_inner_folder.php'; 
	$userId=$_GET['id'];
	$destiId=$_GET['d_id'];
	$D_Query=select('destinations',array('desti_id'=>$destiId,'user_id'=>$userId));

	include'../../common-ftns/generate_pages.php'; 
	while ($result_D=mysqli_fetch_assoc($D_Query)){ 
		$editdestiImgQuery=select('common_imagevideo',array('desti_id'=>$result_D['desti_id']));
		?>
		<?php $global_desti_id=$result_D['desti_id']; ?>
		<div class="db-cent-3">
			<div class="db-cent-table db-com-table">
				<div class="db-title">
					<h3><img src="../../images/icon/dbc5.png" alt=""/> Edit Destination</h3>
					<p>Fill out the form below to update a destination.</p>
				</div>
				<div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="desti-form" role="form" action="hotel-post.php" method="POST" enctype="multipart/form-data">

						<input type="hidden" name="user_id" value="<?php echo $result_D['user_id']; ?>">
						<input type="hidden" name="is_time" value="update">
						<input type="hidden" name="desti_id" id="d_Id" value="<?php echo $result_D['desti_id']; ?>">
						<?php
						$asso_array= array();
						$asso_array[]= array("tag"=>"input", "type"=>"text", "id"=>"desti_name", "name"=>"desti_name","label"=>"Destination Name","classDiv"=>"input-field col s8 web","value"=>$result_D['desti_name']);
						$asso_array[]= array("tag"=>"textarea", "id"=>"desti_description", "name"=>"desti_description","label"=>"Destination Description","value"=>$result_D['desti_description']);
						$result= gen_page($asso_array); ?>
						<?php 	echo $result;
						?>
						<div class="imgVeiwinline row" id="hotel_img_wrap" style="display: none;">

						<div class="row int_title"><label>Photos :</label></div>

					</div>
					<div class="imgVeiwinline row" id="hotel_cover_img" style="display: none;">
							<div class="row int_title"><label>Destination Cover Photo:</label></div>
						</div>
						<div class="row">
							<?php while ($imgResult=mysqli_fetch_assoc($editdestiImgQuery)) {?>

								<?php if (!empty($imgResult['desti_coverimg'])) { ?>
										<div class="row" id="hotel_cover_img" >
											<div class="row int_title" style="clear: both;"><label>Cover Photo :</label></div>

											<div class="imgeWrap" style="float: left; padding-right:5px; padding-bottom:5px;">
												<a class="deletIMG" onclick="deletIMG(event)"  data-value="<?php echo $imgResult['common_imgvideo_id']?>" data-img="<?php echo $imgResult['desti_coverimg'] ?>" ><i class="fa fa-times" aria-hidden="true"></i></a>
												<img src="../<?php echo $imgResult['desti_coverimg']  ?>" style="height: 100px; width: 150px;" class="materialboxed">
											</div>&nbsp;&nbsp;
										</div>
										<?php   } 
									}?>
								</div>
								<div class="row common-top">
									<div class="">
										<!-- Modal Trigger -->
										<div class="col s1"></div>
										<a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-images" >Destination Photos</a>
										<input type="hidden" name="common_image" id="img_ids">
									</div>
								</div>
								<div class="row common-top">
									<div class="">
										<!-- Modal Trigger -->
										<div class="col s1"></div>
										<a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-coverimg" >Destination Cover Photo</a>
										<input type="hidden" name="desti_coverimg" id="img_cover">
									</div>
								</div>
								
								<div class="row" >
									<p class="pTAG inactive_checkbox">
										<input type="hidden" name="desti_inactive" id="hidden_checkbox">
										<?php if ($result_D['desti_inactive']=='on') { ?>

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
												<input type="button"  value="Update" class="waves-effect waves-light pro-sub-btn pro-sub-btn" id="pro-sub-btn_desti"> 
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<?php  } ?>
					</div>
					<!-- Modal Structure -->
					<div id="modal-images" class="modal modal-fixed-footer image_drop_down_modal_body common-img_wrap">
						<div class="modal-content">
							<div class="modal-header"><h2>Upload  Photos</h2></div>
							<iframe src="../up_load_singleimg.php?p=edit&t=desti&desti_id=<?php echo  $global_desti_id; ?>" id="photo_iframe"></iframe>
							<div class="modal-footer">
								<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat photo_done">Done</a>
							</div>
						</div>
					</div>
					<!-- Modal Structure -->
					<div id="modal-coverimg" class="modal modal-fixed-footer image_drop_down_modal_body cover_wrap" style="width: 50%; margin: 0 auto; box-shadow:none;" >

						<div class="modal-content">
							<div class="modal-header"><h2>Upload Cover Photo</h2></div>
							<iframe src="up_load_cover.php?c=edit&t=cover&cov_id=<?php echo $global_desti_id; ?>"></iframe>
							<div class="modal-footer">
								<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Done</a>
							</div>
						</div>
					</div>
					<?php include '../../common-ftns/submitting-modal.php'; ?>
					<?php  include"../footer_inner_folder.php";  ?>
					<script src="../../js/destination-js/destination.js"></script>
					<script src="../../js/destination-js/images.js"></script>
<script type="text/javascript">
	 Materialize.toast('Loading images')

	jQuery(document).ready(function(){

	$('#modal-coverimg').modal({dismissible: false});

});
</script>
				</body>
				<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
				</html>