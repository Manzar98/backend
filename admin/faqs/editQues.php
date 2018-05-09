<?php 
include '../../common-apis/reg-api.php';
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Edit Faq's</title>
	<?php 
	include '../header_inner_folder.php'; 
	$userId=$_GET['id'];
	$faqId=$_GET['f_id'];
	$F_Query=select('faq',array('faq_id'=>$faqId,'user_id'=>$userId));

	include'../../common-ftns/generate_pages.php'; 
	while ($result_F=mysqli_fetch_assoc($F_Query)){ 
		?>
		<div class="db-cent-3">
			<div class="db-cent-table db-com-table">
				<div class="db-title">
					<h3><img src="../../images/icon/dbc5.png" alt=""/> Edit question</h3>
					<p>Fill out the form below to update a question.</p>
				</div>
				<div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="faq-form" role="form" action="hotel-post.php" method="POST" enctype="multipart/form-data">

						<input type="hidden" name="user_id" value="<?php echo $result_F['user_id']; ?>">
						<input type="hidden" name="is_time" value="update">
						<input type="hidden" name="faq_id" value="<?php echo $result_F['faq_id']; ?>">
						<?php
						$asso_array= array();
						$asso_array[]= array("tag"=>"textarea", "id"=>"faq_ques", "name"=>"faq_ques","label"=>"Question","value"=>$result_F['faq_ques']);
						$asso_array[]= array("tag"=>"textarea", "id"=>"faq_ans", "name"=>"faq_ans","label"=>"Answer","value"=>$result_F['faq_ans']);
						$result= gen_page($asso_array);
						echo $result;
						?>
						 <div class="row" >
						           <p class="pTAG inactive_checkbox">
						           		<input type="hidden" name="faq_inactive" id="hidden_checkbox">
						            	<?php if ($result_F['faq_inactive']=='on') { ?>

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
								<input type="button"  value="Add" class="waves-effect waves-light pro-sub-btn pro-sub-btn" id="pro-sub-btn_faq"> 
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
	<script src="../../js/faq-js/faq.js"></script>	
</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>