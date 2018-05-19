<?php 
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
	$pageId=$_GET['p_id'];
	$p_Query=select('pages',array('page_id'=>$pageId,'user_id'=>$userId));

	include'../../common-ftns/generate_pages.php'; 
	while ($result_P=mysqli_fetch_assoc($p_Query)){ 
		?>
		<div class="db-cent-3">
			<div class="db-cent-table db-com-table">
				<div class="db-title">
					<h3><img src="../../images/icon/dbc5.png" alt=""/> Edit Page</h3>
					<p>Fill out the form below to update a Page.</p>
				</div>
				<div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="page-form" role="form" action="hotel-post.php" method="POST" enctype="multipart/form-data">

						<input type="hidden" name="user_id" value="<?php echo $result_P['user_id']; ?>">
						<input type="hidden" name="is_time" value="update">
						<input type="hidden" name="page_id" value="<?php echo $result_P['page_id']; ?>">
						<?php
						$asso_array= array();
						$asso_array[]= array("tag"=>"input", "type"=>"text", "id"=>"page_name", "name"=>"page_name","label"=>"Page Name","classDiv"=>"input-field col s8 web","value"=>$result_P['page_name']);
						$asso_array[]= array("tag"=>"textarea", "id"=>"page_content", "name"=>"page_content","label"=>"Page Content","value"=>$result_P['page_content']);
						$asso_array[]=array(

							array("tag"=>"textarea", "id"=>"page_metadata", "name"=>"page_metadata", "label"=>"Meta Data", "classDiv"=>"row", "2col"=>"col s6","value"=>$result_P['page_metadata']),
							array("tag"=>"textarea", "id" =>"page_metakeyword", "name"=>"page_metakeyword", "label"=>"Meta keywords", "classDiv"=>"row", "2col"=>"col s6","value"=>$result_P['page_metakeyword'])
						); 
						$result= gen_page($asso_array); ?>

						<div>
						<label class="col s4">Page Alias</label>
						<div class="input-field col s8">
							<input type="text" id="page_alias" onblur="checkalias(this.value)" name="page_alias" class="validate" url-ajax="../../methods/aliasValidation.php" tbl="pages" sql-connect="../common-sql.php" value="<?php echo$result_P['page_alias']; ?>">
							<span id="msg" class="hi-red"></span>
						</div>
					</div> 
				<?php 	echo $result;
						?>
						 <div class="row" >
						           <p class="pTAG inactive_checkbox">
						           		<input type="hidden" name="page_inactive" id="hidden_checkbox">
						            	<?php if ($result_P['page_inactive']=='on') { ?>

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
								<input type="button"  value="Update" class="waves-effect waves-light pro-sub-btn pro-sub-btn" id="pro-sub-btn_page"> 
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
	<script src="../../js/page-js/page.js"></script>
	<script src="../../js/method-js/alias.js"></script>
	<script>
		jQuery(document).ready(function () {
			tinymce.init({ selector:'#page_content' });
		})
		
	</script>	
</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>