<?php 
   
   include '../../common-sql.php';
 
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of Tour Packages</title>


<?php  include '../header.php';  
$tourQuery=    'SELECT * FROM tour where user_id="'.$_SESSION['user_id'].'" ORDER BY tour_id DESC ';
// echo $tourQuery;
          $tour_resp =mysqli_query($conn,$tourQuery)  or die(mysqli_error($conn));

?>


				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../../images/icon/dbc5.png" alt=""/>My Tour Packages</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						

						<?php

								if (mysqli_num_rows($tour_resp) > 0) { ?>

								<div class="row">
									<div class="col s1"></div>
									<div class="col s8  ">	
										<input  type="text" class="input-field" id="mysearch" onkeyup="myFunction(event)" placeholder="Search">
									</div>
									<div class="">
										<input class="waves-effect waves-light btn" id="inptbtn" type="button"  onclick="myFunction(event)" value="Search"> 
									</div>
								</div>
						<table class="bordered responsive-table" id="h_table">
							<thead>
								<tr>
									<th>Package Name</th>
									<th>Destination</th>
									<th>Days/Nights</th>
									<th>Price</th>
									<th>Number of people</th>
									<th>Status</th>
									
								</tr>
							</thead>
							<tbody class="wrap-td">
								

								
                                 <?php  while ($result=mysqli_fetch_assoc($tour_resp)) { ?>

                                   <tr>
									<td class="td-name capitalize"><?php echo $result['tour_name'];   ?></td>
									<td class="td-name capitalize"><?php echo $result['tour_destinationname'];   ?></td>
									<td class="capitalize"><?php echo $result['tour_stayday']."/".$result['tour_stayni8'];  ?></td>
									<td class="td-name capitalize"><?php echo $result['tour_pkgprice'];   ?></td>
									<td class="capitalize"><?php echo $result['tour_capacitypeople'];   ?></td>
									<?php if ($result['tour_inactive']== "on") { ?>
										    
										    <td class="text-center"><span class="db-not-success"><?php echo "Inactive";  ?></span></td>
									<?php }else{ ?>

                                            <td class=""><span class="db-success"><?php echo "Active";  ?></span></td>
									<?php } ?>
									
									<td class="tdwrap">
									<div class="buttonsWrap">


										<?php if ($result['tour_independ']=='no') { ?>
											
										
										<div class="row">
											<a class="waves-effect waves-light btn" href="showsigle_tourrecord.php?id=<?php echo $result['tour_id'];  ?>&h_id=<?php echo $result['hotel_id']; ?>">Veiw</a>
											<a class="waves-effect waves-light btn" href="edit_tour.php?id=<?php echo $result['tour_id'];  ?>&h_id=<?php echo $result['hotel_id']; ?>">Edit</a>
											<a class="waves-effect waves-light btn" href="#">Delete</a>
										</div>
								<?php	}else{ ?>

								         <div class="row">
											<a class="waves-effect waves-light btn" href="showsigle_tourrecord.php?id=<?php echo $result['tour_id'];  ?>&u_id=<?php echo $result['user_id']; ?>">Veiw</a>
											<a class="waves-effect waves-light btn" href="edit_tour.php?id=<?php echo $result['tour_id'];  ?>&u_id=<?php echo $result['user_id']; ?>">Edit</a>
											<a class="waves-effect waves-light btn" href="#">Delete</a>
										</div>



								<?php }   ?>
										
										
									</div>
									</td>
								</tr>



            
    <?php    
  // print_r($result);
       }
        	?>
								
						
							</tbody>
						</table>

						<?php	}else{ ?>

						 <div class="text-center"><span>You have no Tour Packages</span></div>
						 <div class="row common-top text-center">
						 	<div class="">
						 		
						 		<a class="waves-effect waves-light btn modal-trigger spc-modal" href="db-add-tours.php">Add New Tour</a>
						 		
						 	</div>
						 </div>

						 <?php	}?>
					</div>
				</div>
				</div>


				<?php include '../footer.php'; ?>

        
					</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>



