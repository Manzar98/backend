<?php  include '../../common-apis/reg-api.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of FAQ's</title>
	
	<?php  include '../header_inner_folder.php';
	$f_Query='SELECT * FROM faq where user_id="'.$_GET['id'].'" ORDER BY faq_id DESC ';
	$f_resp =mysqli_query($conn,$f_Query)  or die(mysqli_error($conn)); ?>
	
	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<div class="row">
				<div class="db-title col s9">
					<h3><img src="../../images/icon/dbc5.png" alt=""/> List Of FAQ's</h3>
					<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
				</div>
			</div>
			<?php if (mysqli_num_rows($f_resp) > 0) { ?>
			<div class="row common-top ">
				<div class="featured_btn">
					<a class="waves-effect waves-light btn" href="addNewQues.php?user_id=<?php echo $_GET['id']; ?>">Add New Question</a>
				</div>
			</div>
			<?php include '../../common-ftns/filter-active-inactive.php'; ?>
			<table class="bordered responsive-table" id="h_table">
				<thead>
					<tr>
						<th>Question</th>
						<th>Answer</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody class="wrap-td">
					<?php  while ($result=mysqli_fetch_assoc($f_resp)) { ?>
					<tr class="tr-1 veiw_sus_appr">
						<td class="td-name capitalize"><?php echo $result['faq_ques'] ?></td>
						<td class="td-name capitalize"><?php echo $result['faq_ans'] ?></td>
						<?php if ($result['faq_inactive']=="on") { ?>
						<td class="status_wrap appr"><span class="db-not-success">Deactivated</span></td>
						<?php }else{ ?>
						<td class="status_wrap appr"><span class="db-success">Activated</span></td>
						<?php } ?>
						<td class="tdwrap tdwrap_ads sus_appr">
							<div class="">
								<div class="row">
									<a class="waves-effect waves-light btn" href="editQues.php?f_id=<?php echo $result['faq_id'];  ?>&id=<?php echo $result['user_id']; ?>">Edit</a>
									<a class="waves-effect waves-light btn" href="#">Delete</a>
									<?php if ($result['faq_inactive']=="on") { ?>
										    <a onclick="active(event)" class="waves-effect waves-light btn active" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['faq_id']; ?>" value="off" tbl-name="faq" col-name="faq_inactive" id-col="faq_id">Activate</a>
										    <a onclick="inactive(event)" class="waves-effect waves-light btn inactive" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['faq_id']; ?>" value="on" style="display: none;" tbl-name="faq" col-name="faq_inactive" id-col="faq_id">Deactivate</a>
									<?php }else{ ?>
                                            <a onclick="inactive(event)" class="waves-effect waves-light btn inactive" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['faq_id']; ?>" value="on" tbl-name="faq" col-name="faq_inactive" id-col="faq_id">Deactivate</a>
                                            <a onclick="active(event)" class="waves-effect waves-light btn active" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['faq_id']; ?>" value="off" style="display: none;" tbl-name="faq" col-name="faq_inactive" id-col="faq_id">Activate</a>

									<?php } ?>
								</div>
							</div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php }else{ ?>
			
			<div class="text-center"><span>Sorry! no question</span></div>
			<div class="row common-top text-center">
				<div class="">
					<a class="waves-effect waves-light btn modal-trigger spc-modal" href="addNewQues.php?user_id=<?php echo $_GET['id']; ?>">Add New Question</a>
				</div>
			</div>
			<?php	}?>
		</div>
	</div>
</div>
<?php include"../footer_inner_folder.php"; ?>
<?php include"../../methods/active-inactive_list.php"; ?>
<script type="text/javascript">
	
</script>
</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>
