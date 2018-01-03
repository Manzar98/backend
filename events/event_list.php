<?php 
   include '../common-apis/api.php';

   $eventQuery=select("event",array("user_id"=>2))


  

?>



<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of Events</title>

<?php include '../header.php';  ?>


	<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../images/icon/dbc5.png" alt=""/>My Events</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						<table class="bordered responsive-table">
							<thead>
								<tr>
									<th>Event Name</th>
									<th>Recurrence</th>
									<th>Event's Description</th>
									<th>Entry Fee</th>
									
								</tr>
							</thead>
							<tbody class="wrap-td">
								<?php

								if (mysqli_num_rows($eventQuery) > 0) { 

								
                                   while ($result=mysqli_fetch_assoc($eventQuery)) { ?>

                                   <tr>
									<td><?php echo $result['event_name'];   ?></td>
									<td><?php echo $result['event_recurrence'];   ?></td>
									<td><?php echo $result['event_descrip'];  ?></td>
									<td><?php echo $result['event_entryfee'];   ?></td>
									
									
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