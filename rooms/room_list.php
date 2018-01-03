<?php 
  
   include '../common-apis/api.php';

   $roomQuery=select("room",array("user_id"=>2));


   

?>





<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of Rooms</title>


<?php  include '../header.php'; ?>


	<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="images/icon/dbc5.png" alt=""/>My Rooms</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						<table class="bordered responsive-table">
							<thead>
								<tr>
									<th>Hotel Name</th>
									<th>Room Name</th>
									<th>No of Rooms</th>
									<th>Room Service</th>
									<th>Charges</th>
									<th>Description</th>
									<th>Amenities</th>
									
								</tr>
							</thead>
							<tbody class="wrap-td">
								<?php

								if (mysqli_num_rows($roomQuery) > 0) { 

								
                                   while ($result=mysqli_fetch_assoc($roomQuery)) { ?>

                                   <tr>
									<td><?php echo $result['hotel_name'];   ?></td>
									<td><?php echo $result['room_name'];   ?></td>
									<td><?php echo $result['room_nosroom'];   ?></td>
									<td><?php echo $result['room_service'];  ?></td>
									<td><?php echo $result['room_perni8'];   ?></td>
									<td><?php echo $result['room_descrip'];   ?></td>
									<td><?php echo $result['room_other'];   ?></td>
									
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



				</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>