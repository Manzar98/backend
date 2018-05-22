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
	$b_Query=select('blog',array('blog_id'=>$blogId,'user_id'=>$userId));
while ($result_B=mysqli_fetch_assoc($b_Query)){
?>

	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<div class="db-title">
				<h3><img src="../../images/icon/dbc5.png" alt=""/> Edit Blog</h3>
				<p>Fill out the form below to update a blog.</p>
			</div>
			<div class="db-profile-edit">
				<form class="col s12"  data-toggle="validator" id="blog-form" role="form" action="hotel-post.php" method="POST" enctype="multipart/form-data">

					<input type="hidden" name="user_id" value="<?php echo $userId; ?>">
					<input type="hidden" name="is_time" value="edit">
					<input type="hidden" name="blog_id" value="<?php echo $result_B['blog_id']; ?>">
					<?php
					$asso_array= array();
					$asso_array[]= array("tag"=>"input", "type"=>"text", "id"=>"blog_title", "name"=>"blog_title","label"=>"Blog Title","classDiv"=>"input-field col s8","value"=>$result_B['blog_title']);
					$asso_array[]= array("tag"=>"textarea", "id"=>"blog_content", "name"=>"blog_content","label"=>"Blog Content","value"=>$result_B['blog_content']);

					
					$result= gen_page($asso_array); ?>
					<div>
						<label class="col s4">Blog Alias</label>
						<div class="input-field col s8">
							<input type="text" id="blog_alias" onblur="checkalias(this.value)" name="blog_alias" class="validate" url-ajax="../methods/aliasValidation.php" tbl="blog" sql-connect="../common-sql.php" value="<?php echo $result_B['blog_alias']; ?>">
							<span id="msg" class="hi-red"></span>
						</div>
					</div> 
				<?php	echo $result;
					?>
					<div class="row common-top" >
						<p class="pTAG">
							<input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="blog_inactive" />
							<label for="filled-in-inactive">Inactive</label>
						</p>
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
   
