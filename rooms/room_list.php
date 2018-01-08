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
						<table class="bordered responsive-table" id="h_table">
							<thead>
								<tr>
									<th>Room Name</th>
									<th>Hotel (Under which hotel)</th>
									<th>Number of Rooms</th>
									<th>Charges per Night</th>
									<th>Status (Active/Inactive)</th>
									
								</tr>
							</thead>
							<tbody class="wrap-td">
								<?php

								if (mysqli_num_rows($roomQuery) > 0) { 

								
                                   while ($result=mysqli_fetch_assoc($roomQuery)) { ?>

                                   <tr>
                                   	<td><?php echo $result['room_name'];   ?></td>
									<td><?php echo $result['hotel_name'];   ?></td>
									<td><?php echo $result['room_nosroom'];   ?></td>
									<td><?php echo $result['room_perni8'];   ?></td>
									<td><?php echo "Active";   ?></td>
									<td  class="tdwrap">
									<div class="buttonsWrap">
										<div class="row">
											<a class="waves-effect waves-light btn" href="showsingle_roomrecord.php?id=<?php echo $result['room_id'];  ?>&h_id=<?php echo $result['hotel_id']; ?>">Veiw</a>
											<a class="waves-effect waves-light btn" href="edit_room.php?id=<?php echo $result['room_id'];  ?>&h_id=<?php echo $result['hotel_id']; ?>"">Edit</a>
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