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
						<table class="bordered responsive-table" cellpadding="10" cellspacing="10" id="h_table">
							<thead>
								<tr>
									<th>Name</th>
									<th>City</th>
									<th>Active/Inactive Rooms</th>
									<th>Booked/Free Rooms</th>
									<th>Status (Active/Inactive)</th>
								</tr>
							</thead>
							<tbody class="wrap-td">
								<?php

								if (mysqli_num_rows($hotelQuery) > 0) { 

								
                                   while ($result=mysqli_fetch_assoc($hotelQuery)) { ?>

                                   <tr>
									<td><?php echo $result['hotel_name'];   ?></td>
									<td><?php echo $result['hotel_city'];  ?></td>
									<td><?php echo "5/2";   ?></td>
									<td><?php echo "1/9";   ?></td>
									<td><?php echo "Active";   ?></td>
									
									<!-- <td><a href="#" class="db-success">Success</a>
									</td> -->
									<td class="tdwrap">
									<div class="buttonsWrap">
										<div class="row">
											<a class="waves-effect waves-light btn" href="showsingle_hotelrecord.php?id=<?php echo $result['hotel_id'];  ?>">Veiw</a>
											<a class="waves-effect waves-light btn" href="edit_hotel.php?id=<?php echo $result['hotel_id'];  ?>">Edit</a>
											<a class="waves-effect waves-light btn" href="#">Delete</a>
										</div>
										
									</div>
									</td>
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