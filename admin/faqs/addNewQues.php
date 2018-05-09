<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Add a Question</title>
	<?php 
	include '../header_inner_folder.php'; 
	include'../../common-ftns/generate_pages.php'; 
	$userId=$_GET['user_id'];
	?>
<div class="db-cent-3">
	<div class="db-cent-table db-com-table">
		<div class="db-title">
			<h3><img src="../../images/icon/dbc5.png" alt=""/> Add Question</h3>
			<p>Fill out the form below to add a new question.</p>
		</div>
		<div class="db-profile-edit">
			<form class="col s12"  data-toggle="validator" id="faq-form" role="form" action="hotel-post.php" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="user_id" value="<?php echo $userId; ?>">
				<input type="hidden" name="is_time" value="create">
				<?php
				$asso_array= array();
				$asso_array[]= array("tag"=>"textarea", "id"=>"faq_ques", "name"=>"faq_ques","label"=>"Question","value"=>"");
				$asso_array[]= array("tag"=>"textarea", "id"=>"faq_ans", "name"=>"faq_ans","label"=>"Answer","value"=>"");
				$result= gen_page($asso_array);
				echo $result;
				?>
				<div class="row" >
					<p class="pTAG">
						<input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="faq_inactive" />
						<label for="filled-in-inactive">Inactive</label>
					</p>
				</div>
				<div>
					<div class="input-field col s8">
						<input type="button"  value="Add" class="waves-effect waves-light pro-sub-btn pro-sub-btn" id="pro-sub-btn_faq"> 
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
 </div>
	<?php include '../../common-ftns/submitting-modal.php'; ?>
	<?php  include"../footer_inner_folder.php";  ?>
	<script src="../../js/faq-js/faq.js"></script>	
</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>