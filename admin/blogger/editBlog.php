<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>Edit-Blog's</title>
	<?php 
	include '../../common-apis/reg-api.php';
	include '../header_inner_folder.php'; 
	include'../../common-ftns/generate_pages.php'; 
	$userId=$_GET['u_id'];
	$blogId=$_GET['id'];
	$global_blog_id="";
	$bloggerName=$_GET['name'];
	$bloggerStatus=$_GET['status'];
	$b_Query=select('blog',array('blog_id'=>$blogId,'user_id'=>$userId));
	while ($result_B=mysqli_fetch_assoc($b_Query)){

		$editblogImgQuery=select('common_imagevideo',array('blog_id'=>$result_B['blog_id']));
		?>
<?php $global_blog_id=$result_B['blog_id']; ?>
		<div class="db-cent-3">
			<div class="db-cent-table db-com-table">
				<div class="db-title">
					<h3><img src="../../images/icon/dbc5.png" alt=""/> Edit Blog</h3>
					<p>Fill out the form below to update a blog.</p>
				</div>
				<div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="blog-form" role="form" action="hotel-post.php" method="POST" enctype="multipart/form-data">

						<input type="hidden" name="user_id" value="<?php echo $userId; ?>">
						<input type="hidden" name="bloggerName" value="<?php echo $bloggerName; ?>">
						<input type="hidden" name="bloggerStatus" value="<?php echo $bloggerStatus; ?>">
						<input type="hidden" name="is_time" value="edit">
						<input type="hidden" name="blog_id" value="<?php echo $result_B['blog_id']; ?>">
						<input type="hidden" id="b_alias" value="<?php echo $result_B['blog_alias']; ?>">
						<?php
						$asso_array= array();
						$asso_array[]= array("tag"=>"input", "type"=>"text", "id"=>"blog_title", "name"=>"blog_title","label"=>"Blog Title","classDiv"=>"input-field col s8","value"=>$result_B['blog_title']);
						$asso_array[]= array("tag"=>"textarea", "id"=>"blog_content", "name"=>"blog_content","label"=>"Blog Content","value"=>$result_B['blog_content']);


						$result= gen_page($asso_array); ?>
						<?php	echo $result;
						?>
						<div class="common-top">
							<label class="col s4">Blog Alias</label>
							<div class="input-field col s8">
								<input type="text" id="blog_alias" onblur="checkalias(this.value)" name="blog_alias" class="validate" url-ajax="../../methods/aliasValidation.php" tbl="blog" sql-connect="../common-sql.php" value="<?php echo $result_B['blog_alias']; ?>">
								<span id="msg" class="hi-red"></span>
							</div>
						</div> 
						<div class="imgVeiwinline row" id="hotel_img_wrap">
							<div class="row int_title"><label>Photos :</label></div>
							<?php

							while ($imgResult=mysqli_fetch_assoc($editblogImgQuery)) {

								if (!empty($imgResult['common_image'])) {?>
									<div class="imgeWrap" style="float: left; padding-right:5px; padding-bottom:5px;">
										<a class="deletIMG" onclick="deletIMG(event)"  data-value="<?php echo $imgResult['common_imgvideo_id']?>" data-img="<?php echo $imgResult['common_image'] ?>" ><i class="fa fa-times" aria-hidden="true"></i></a>
										<img src="../<?php echo $imgResult['common_image']  ?>" style="width: 150px; height: 100px;" class="materialboxed">
									</div>&nbsp;&nbsp;
									<?php } ?>

									<?php } ?>
								</div>
								<div class="row common-top">
									<div class="">
										<!-- Modal Trigger -->
										<div class="col s1"></div>
										<a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-images" >Blog Photos</a>
										<input type="hidden" name="common_image" id="img_ids">
									</div>
								</div>
								<div>
									<div class="input-field col s8">
										<input type="button"  value="Update" class="waves-effect waves-light pro-sub-btn pro-sub-btn" id="pro-sub-btn_blog"> 
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<!-- Modal Structure -->
			<div id="modal-images" class="modal modal-fixed-footer image_drop_down_modal_body common-img_wrap">
				<div class="modal-content">
					<div class="modal-header"><h2>Upload  Photos</h2></div>
				<iframe src="../up_load_singleimg.php?p=edit&t=blog&blg_id=<?php echo  $global_blog_id; ?>" id="photo_iframe"></iframe>
                   <div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat photo_done">Done</a>
				</div>
		   </div>
		</div>
			<?php include '../../common-ftns/submitting-modal.php'; ?>
			<?php  include"../footer_inner_folder.php";  ?>
			<script src="../../js/blogger-js/blogger.js"></script>
			<script src="../../js/method-js/alias.js"></script>
			<script>
				jQuery(document).ready(function () {
					tinymce.init({ selector:'#blog_content' });


				})

			</script>	
		</body>
		<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
		</html>

