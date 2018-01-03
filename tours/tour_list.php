<?php 
   
   include '../common-apis/api.php';

   $tourQuery=select("tour",array("user_id"=>2));


   


?>



<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of Tour Pacakages</title>


<?php  include '../header.php';  ?>

<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="images/icon/dbc5.png" alt=""/>My Tour Pacakages</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						<table class="bordered responsive-table">
							<thead>
								<tr>
									<th>Package Name</th>
									<th>Destination</th>
									<th>No of Days</th>
									<th>No of Night</th>
									<th>Whole Paln</th>
									<th>Charges per Person</th>
									<th>Capacity</th>
									<th>Trip starts from</th>
								</tr>
							</thead>
							<tbody class="wrap-td">
								<?php

								if (mysqli_num_rows($tourQuery) > 0) { 

								
                                   while ($result=mysqli_fetch_assoc($tourQuery)) { ?>

                                   <tr>
									<td><?php echo $result['tour_name'];   ?></td>
									<td><?php echo $result['tour_destinationname'];   ?></td>
									<td><?php echo $result['tour_stayday'];  ?></td>
									<td><?php echo $result['tour_stayni8'];   ?></td>
									<td><?php echo $result['tour_plan'];   ?></td>
									<td><?php echo $result['tour_pkgprice'];   ?></td>
									<td><?php echo $result['tour_capacitypeople'];   ?></td>
									<td><?php echo $result['tour_strtloc'];   ?></td>
									
									<!-- <td><a href="#" class="db-success">Success</a>
									</td> -->
								</tr>



            
    <?php    
  // print_r($result);
       }
        	}?>
								
						
							</tbody>
						</table>
					</div>
				</div>
				</div>


				<?php include '../footer.php'; ?>


					</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>



