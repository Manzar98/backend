<?php  include '../../common-apis/reg-api.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of Destination</title>
	
	<?php  include '../header_inner_folder.php';
	$d_Query='SELECT * FROM destinations where user_id="'.$_GET['id'].'" ORDER BY desti_id DESC ';
	$d_resp =mysqli_query($conn,$d_Query)  or die(mysqli_error($conn)); ?>
	
	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<div class="row">
				<div class="db-title col s9">
					<h3><img src="../../images/icon/dbc5.png" alt=""/> List Of Destination</h3>
					<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
				</div>
			</div>
			<?php if (mysqli_num_rows($d_resp) > 0) { ?>
				<div class="row common-top ">
				<div class="featured_btn">
					<a class="waves-effect waves-light btn" href="addDesti.php?id=<?php echo $_GET['id']; ?>">Add New Destination</a>
				</div>
			</div>
			<?php include '../../common-ftns/filter-active-inactive.php'; ?>
			<table class="bordered responsive-table" id="h_table">
				<thead>
					<tr>
						<th>Destination Name</th>
						<th>Destination Description</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody class="wrap-td">
					<?php  while ($result=mysqli_fetch_assoc($d_resp)) { ?>
					<tr class="tr-1 veiw_sus_appr">
						<td class="td-name capitalize"><?php echo $result['desti_name'] ?></td>
						<td class="td-name capitalize"><?php echo $result['desti_description'] ?></td>
						<?php if ($result['desti_inactive']=="on") { ?>
						<td class="status_wrap appr"><span class="db-not-success">Deactivated</span></td>
						<?php }else{ ?>
						<td class="status_wrap appr"><span class="db-success">Activated</span></td>
						<?php } ?>
						<td class="tdwrap tdwrap_ads sus_appr">
							<div class="">
								<div class="row">
									<a class="waves-effect waves-light btn" href="editDesti.php?d_id=<?php echo $result['desti_id'];  ?>&id=<?php echo $result['user_id']; ?>">Edit</a>
									<a class="waves-effect waves-light btn" href="#">Delete</a>
									<?php if ($result['desti_inactive']=="on") { ?>
										    <a onclick="active(event)" class="waves-effect waves-light btn active" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['desti_id']; ?>" value="off" tbl-name="destinations" col-name="desti_inactive" id-col="desti_id">Activate</a>
										    <a onclick="inactive(event)" class="waves-effect waves-light btn inactive" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['desti_id']; ?>" value="on" style="display: none;" ttbl-name="destinations" col-name="desti_inactive" id-col="desti_id">Deactivate</a>
									<?php }else{ ?>
                                            <a onclick="inactive(event)" class="waves-effect waves-light btn inactive" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['desti_id']; ?>" value="on" tbl-name="destinations" col-name="desti_inactive" id-col="desti_id">Deactivate</a>
                                            <a onclick="active(event)" class="waves-effect waves-light btn active" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['desti_id']; ?>" value="off" style="display: none;" tbl-name="destinations" col-name="desti_inactive" id-col="desti_id">Activate</a>

									<?php } ?>
								</div>
							</div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php }else{ ?>
			
			<div class="text-center"><span>Sorry! no destinations</span></div>
			<div class="row common-top text-center">
				<div class="">
					<a class="waves-effect waves-light btn modal-trigger spc-modal" href="addDesti.php?id=<?php echo $_GET['id']; ?>">Add New Destination</a>
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
