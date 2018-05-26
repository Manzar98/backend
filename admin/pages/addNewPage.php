<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Add a Page</title>
	<?php 
	include '../header_inner_folder.php'; 
	include'../../common-ftns/generate_pages.php'; 
	$userId=$_GET['id'];
	?>
	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<div class="db-title">
				<h3><img src="../../images/icon/dbc5.png" alt=""/> Add Page</h3>
				<p>Fill out the form below to add a new Page.</p>
			</div>
			<div class="db-profile-edit">
				<form class="col s12"  data-toggle="validator" id="page-form" role="form" action="hotel-post.php" method="POST" enctype="multipart/form-data">

					<input type="hidden" name="user_id" value="<?php echo $userId; ?>">
					<input type="hidden" name="is_time" value="create">
					<?php
					$asso_array= array();
					$asso_array[]= array("tag"=>"input", "type"=>"text", "id"=>"page_name", "name"=>"page_name","label"=>"Page Name","classDiv"=>"input-field col s8 web","value"=>"");
					$asso_array[]= array("tag"=>"textarea", "id"=>"page_content", "name"=>"page_content","label"=>"Page Content","value"=>"");
					$asso_array[]=array(

						array("tag"=>"textarea", "id"=>"page_metadata", "name"=>"page_metadata", "label"=>"Meta Data", "classDiv"=>"row", "2col"=>"col s6","value"=>""),
						array("tag"=>"textarea", "id" =>"page_metakeyword", "name"=>"page_metakeyword", "label"=>"Meta keywords", "classDiv"=>"row", "2col"=>"col s6","value"=>"")
					); 
					$result= gen_page($asso_array); ?>
					
				<?php	echo $result;
					?>
					<div class="common-top">
						<label class="col s4">Page Alias</label>
						<div class="input-field col s8">
							<input type="text" id="page_alias" onblur="checkalias(this.value)" name="page_alias" class="validate" url-ajax="../../methods/aliasValidation.php" tbl="pages" sql-connect="../common-sql.php">
							<span id="msg" class="hi-red"></span>
						</div>
					</div> 
					<div class="row" >
						<p class="pTAG">
							<input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="page_inactive" />
							<label for="filled-in-inactive">Inactive</label>
						</p>
					</div>
					<div>
						<div class="input-field col s8">
							<input type="button"  value="Add" class="waves-effect waves-light pro-sub-btn pro-sub-btn" id="pro-sub-btn_page"> 
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
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