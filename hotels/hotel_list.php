<?php
  
  include '../common-apis/api.php';


  $hotelQuery=select("hotel",array("user_id"=>2));


        // $hotelQuery=mysqli_query($conn,$hotelSelect) or die(mysqli_error($conn));

        



?>






<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of Hotels</title>


<?php include '../header.php'; ?>


<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../images/icon/dbc5.png" alt=""/>My Hotels</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						<table class="bordered responsive-table" cellpadding="10" cellspacing="10">
							<thead>
								<tr>
									<th>Name</th>
									<th>Address</th>
									<th>City</th>
									<th>Province</th>
									<th>Phone Number</th>
									<th>Email Address</th>
									<th>Amenities</th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody class="wrap-td">
								<?php

								if (mysqli_num_rows($hotelQuery) > 0) { 

								
                                   while ($result=mysqli_fetch_assoc($hotelQuery)) { ?>

                                   <tr>
									<td><?php echo $result['hotel_name'];   ?></td>
									<td><?php echo $result['hotel_addres1'];   ?></td>
									<td><?php echo $result['hotel_city'];  ?></td>
									<td><?php echo $result['hotel_province'];   ?></td>
									<td><?php echo $result['hotel_phone'];   ?></td>
									<td><?php echo $result['hotel_email'];   ?></td>
									<td><?php echo $result['hotel_other'];   ?></td>
									<td><?php echo $result['hotel_descrp'];   ?></td>
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