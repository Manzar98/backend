<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<?php if ($_GET['act'] && $_GET['act']=="manage") { ?>

	<title>Manage a Listing against vendors</title>

	<?php }else if ($_GET['act'] && $_GET['act']=="add") { ?>

	<title>Add a Listing against vendors</title>

	<?php }else{ ?>

	<title>Add/manage featured ads against vendors</title>

	<?php } ?>
	<?php  include 'header.php'; 

	include '../common-sql.php';
	$vendorQuery=    'SELECT * FROM credentials where user_type="vendor" ORDER BY user_id DESC ';
	 
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

				   <div class="row">
						 	<div class="col s4 search_flter">
						 		
						 		 <select onchange="myFunction(event)" id="yourole"  name="">
						 		 	  <option value="" selected="" >View all</option>
								      <option value="Approved">Approved</option>
								      <option value="Suspended">Suspended</option>
								      <option value="Pending">Waiting Approval</option>
                                 </select>
						 	</div>
						 	<div class="col s6 search_field">	
						 		<input  type="text" class="input-field" id="mysearch" onkeyup="myFunction(event)" placeholder="Search">
						 	</div>
						 	<div class="search_field_btn">
						 		<input class="waves-effect waves-light btn" id="inptbtn" type="button"  onclick="myFunction(event)" value="Search"> 
						 	</div>
				   </div>

						
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
                                
                                <?php if ($_GET['act'] && $_GET['act']=="manage") { ?>

                                        <tr class="tr-1 v-lsting-cursor" onClick="document.location.href='manage-listing.php?user_id=<?php echo $result['user_id']; ?>&name=<?php echo $result['reg_name']; ?>&status=<?php echo $result['user_status']; ?>'" >

                                <?php }else if ($_GET['act'] && $_GET['act']=="add"){ ?>
                                         
                                          <tr class="tr-1 v-lsting-cursor" onClick="document.location.href='add-listing.php?user_id=<?php echo $result['user_id']; ?>&name=<?php echo $result['reg_name']; ?>&status=<?php echo $result['user_status']; ?>'" >

                                <?php }else{ ?>
                                       
                                        <tr class="tr-1 v-lsting-cursor" onClick="document.location.href='paid_ads/paid-ads-list.php?user_id=<?php echo $result['user_id']; ?>&name=<?php echo $result['reg_name']; ?>&status=<?php echo $result['user_status']; ?>'" >
                                <?php } ?>
                                   
									<td class="td-name capitalize"><?php echo $result['reg_name'];   ?> <?php echo $result['reg_lstname'];   ?></td>
									<td class="td-name capitalize"><?php echo $result['reg_postal']; ?></td>
									<td class="td-name capitalize"><?php echo $result['reg_city'];   ?></td>
									<td class="td-name capitalize"><?php echo $result['reg_email'];   ?></td>
									
										<?php if ($result['user_status']=="Approved") { ?>

										<td class="status_wrap appr" ><span class="db-success"><?php echo $result['user_status']; ?></span></td>

										<!-- <td class="status_wrap sus" style="display: none;"><span class="db-not-success">Suspended</span></td> -->

										<?php }elseif ($result['user_status']=="Suspended") {?>

										<td class="status_wrap appr"><span class="db-not-success"><?php echo $result['user_status']; ?></span></td>
										<!-- <td class="status_wrap appr" style="display: none;"><span class="db-success">Approved</span></td> -->

										<?php }else{ ?>

										<td class="status_wrap appr"><span class="db-not-success vendor-pending"><?php echo $result['user_status']; ?></span></td>
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


    
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
</html>


	




	