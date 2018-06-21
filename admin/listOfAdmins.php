<?php  include '../common-apis/api.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of Admins</title>
	
	<?php  include 'header.php';
	$d_Query='SELECT * FROM credentials where user_type="admin" ORDER BY user_id DESC ';
	$d_resp =mysqli_query($conn,$d_Query)  or die(mysqli_error($conn)); ?>
	
	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<div class="row">
				<div class="db-title col s9">
					<h3><img src="../images/icon/dbc5.png" alt=""/> List Of Admins</h3>
					<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
				</div>
			</div>

				<div class="row common-top ">
				<div class="featured_btn">
					<a class="waves-effect waves-light btn" href="addNewAdmins.php?id=<?php echo $_GET['id']; ?>">Add New Admin</a>
				</div>
			</div>
			<table class="bordered responsive-table" id="h_table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email Address</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody class="wrap-td">
					<?php  while ($result=mysqli_fetch_assoc($d_resp)) { ?>
					<tr class="tr-1 veiw_sus_appr">
						<td class="td-name capitalize"><?php echo $result['reg_name']; ?></td>
						<td class="td-name capitalize"><?php echo $result['reg_email']; ?></td>
						<?php if ($result['user_status']=="Suspended") { ?>
						<td class="status_wrap appr"><span class="db-not-success">Deactivated</span></td>
						<?php }else{ ?>
						<td class="status_wrap appr"><span class="db-success">Activated</span></td>
						<?php } ?>

					</tr>
					<?php } ?>
				</tbody>
			</table>

		</div>
	</div>
</div>
<?php include"footer.php"; ?>
<script type="text/javascript">
	
</script>
</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>
