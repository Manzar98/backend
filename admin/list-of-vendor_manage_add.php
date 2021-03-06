<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<?php if ($_GET['act'] && $_GET['act']=="manage") { ?>

		<title>Manage a Listing against users</title>

	<?php }else if ($_GET['act'] && $_GET['act']=="add") { ?>

		<title>Add a Listing against users</title>

	<?php }else{ ?>

		<title>Add/manage featured ads against vendors</title>

	<?php } ?>
	<?php  include 'header.php'; 

	include '../common-sql.php';
	$vendorQuery=    'SELECT * FROM credentials where (user_type="vendor" OR user_type="blogger") ORDER BY user_id DESC ';

	$vendor_resp =mysqli_query($conn,$vendorQuery)  or die(mysqli_error($conn));


	?>

	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<div class="db-title">
				<?php if ($_GET['act'] && $_GET['act']=="manage") { ?>

					<h3><img src="../images/icon/dbc5.png" alt=""/> Manage a Listing</h3>
					<p>Choose a vendor you want to manage the listing for.</p>

				<?php }else if ($_GET['act'] && $_GET['act']=="add"){ ?>

					<h3><img src="../images/icon/dbc5.png" alt=""/> Add a Listing</h3>
					<p>Choose a vendor you want to add the listing for.</p>

				<?php }else{ ?>

					<h3><img src="../images/icon/dbc5.png" alt=""/> Add/Manage Featured Ad</h3>
					<p>Choose a vendor you want to add or manage the feature ads for.</p>

				<?php } ?>

			</div>

			<?php include '../common-ftns/admin_filteration.php'; ?>


			<?php

			if (mysqli_num_rows($vendor_resp) > 0) { ?>


				<table class="bordered highlight" id="h_table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Address</th>
							<th>City</th>
							<th>Email Address</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody class="wrap-td">

						<?php   while ($result=mysqli_fetch_assoc($vendor_resp)) { ?>

							<?php if ($_GET['act'] && $_GET['act']=="manage") {  ?>

								<?php if ($result['user_type']=="blogger") { ?>

									<tr class="tr-1 v-lsting-cursor <?php echo $result['user_type']; ?> <?php echo $result['user_type']; ?>_<?php echo $result['user_status']?> AD_blogs" onClick="document.location.href='blogger/blogListing.php?id=<?php echo $result['user_id']; ?>&name=<?php echo $result['reg_name']; ?>&status=<?php echo $result['user_status']; ?>&u_type=<?php echo $result['user_type']; ?>'" >
										<td class="td-name capitalize"><?php echo $result['reg_name'];   ?> <?php echo $result['reg_lstname'];   ?></td>
										<td class="td-name capitalize"><?php echo $result['reg_postal']; ?></td>
										<td class="td-name capitalize"><?php echo $result['reg_city'];   ?></td>
										<td class="td-name capitalize"><?php echo $result['reg_email'];   ?></td>
										<td class="userType" style="display: none;"><?php echo $result['user_type']; ?></td>
										<?php if ($result['user_status']=="Approved") { ?>

											<td class="status_wrap appr" ><span class="db-success"><?php echo $result['user_status']; ?></span></td>

										<?php }elseif ($result['user_status']=="Suspended") {?>

											<td class="status_wrap appr"><span class="db-not-success"><?php echo $result['user_status']; ?></span></td>

										<?php }else{ ?>

											<td class="status_wrap appr"><span class="db-not-success vendor-pending"><?php echo $result['user_status']; ?></span></td>
										<?php } ?>

									<?php  }elseif ($result['user_type']=="vendor") { ?>

										<tr class="tr-1 v-lsting-cursor <?php echo $result['user_type']; ?> <?php echo $result['user_type']; ?>_<?php echo $result['user_status']?> AD_listing" onClick="document.location.href='manage-listing.php?user_id=<?php echo $result['user_id']; ?>&name=<?php echo $result['reg_name']; ?>&status=<?php echo $result['user_status']; ?>&u_type=<?php echo $result['user_type']; ?>'" >
											<td class="td-name capitalize"><?php echo $result['reg_name'];   ?> <?php echo $result['reg_lstname'];   ?></td>
											<td class="td-name capitalize"><?php echo $result['reg_postal']; ?></td>
											<td class="td-name capitalize"><?php echo $result['reg_city'];   ?></td>
											<td class="td-name capitalize"><?php echo $result['reg_email'];   ?></td>
											<td class="userType" style="display: none;"><?php echo $result['user_type']; ?></td>
											<?php if ($result['user_status']=="Approved") { ?>

												<td class="status_wrap appr" ><span class="db-success"><?php echo $result['user_status']; ?></span></td>

											<?php }elseif ($result['user_status']=="Suspended") {?>

												<td class="status_wrap appr"><span class="db-not-success"><?php echo $result['user_status']; ?></span></td>

											<?php }else{ ?>

												<td class="status_wrap appr"><span class="db-not-success vendor-pending"><?php echo $result['user_status']; ?></span></td>
											<?php } ?>
										<?php  } ?>

									<?php }else if ($_GET['act'] && $_GET['act']=="add"){ ?>

										<?php if ($result['user_type']=="blogger") { ?>

											<tr class="tr-1 v-lsting-cursor <?php echo $result['user_type']; ?> <?php echo $result['user_type']; ?>_<?php echo $result['user_status']?> AD_blogs" onClick="document.location.href='blogger/addNewBlog.php?id=<?php echo $result['user_id']; ?>&name=<?php echo $result['reg_name']; ?>&status=<?php echo $result['user_status']; ?>&u_type=<?php echo $result['user_type']; ?>'" >

												<td class="td-name capitalize"><?php echo $result['reg_name'];   ?> <?php echo $result['reg_lstname'];   ?></td>
												<td class="td-name capitalize"><?php echo $result['reg_postal']; ?></td>
												<td class="td-name capitalize"><?php echo $result['reg_city'];   ?></td>
												<td class="td-name capitalize"><?php echo $result['reg_email'];   ?></td>
												<td class="userType" style="display: none;"><?php echo $result['user_type']; ?></td>
												<?php if ($result['user_status']=="Approved") { ?>

													<td class="status_wrap appr" ><span class="db-success"><?php echo $result['user_status']; ?></span></td>

												<?php }elseif ($result['user_status']=="Suspended") {?>

													<td class="status_wrap appr"><span class="db-not-success"><?php echo $result['user_status']; ?></span></td>

												<?php }else{ ?>

													<td class="status_wrap appr"><span class="db-not-success vendor-pending"><?php echo $result['user_status']; ?></span></td>
												<?php } ?>

											<?php  }elseif ($result['user_type']=="vendor") { ?>

												<tr class="tr-1 v-lsting-cursor <?php echo $result['user_type']; ?> <?php echo $result['user_type']; ?>_<?php echo $result['user_status']?> AD_listing" onClick="document.location.href='add-listing.php?user_id=<?php echo $result['user_id']; ?>&name=<?php echo $result['reg_name']; ?>&status=<?php echo $result['user_status']; ?>&u_type=<?php echo $result['user_type']; ?>'" >
													<td class="td-name capitalize"><?php echo $result['reg_name'];   ?> <?php echo $result['reg_lstname'];   ?></td>
													<td class="td-name capitalize"><?php echo $result['reg_postal']; ?></td>
													<td class="td-name capitalize"><?php echo $result['reg_city'];   ?></td>
													<td class="td-name capitalize"><?php echo $result['reg_email'];   ?></td>
													<td class="userType" style="display: none;"><?php echo $result['user_type']; ?></td>
													<?php if ($result['user_status']=="Approved") { ?>

														<td class="status_wrap appr" ><span class="db-success"><?php echo $result['user_status']; ?></span></td>

													<?php }elseif ($result['user_status']=="Suspended") {?>

														<td class="status_wrap appr"><span class="db-not-success"><?php echo $result['user_status']; ?></span></td>

													<?php }else{ ?>

														<td class="status_wrap appr"><span class="db-not-success vendor-pending"><?php echo $result['user_status']; ?></span></td>
													<?php } ?>
												<?php  } ?>



											<?php } ?>




										</tr>




										<?php    

									}
									?>


								</tbody>
							</table>
						<?php 	} ?>
					</div>
				</div>
			</div>

			<?php include'footer.php'; ?>
			<script src="../js/admin-js/admin.js"></script>

		</body>


		<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
		</html>







