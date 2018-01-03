<?php 
   include '../common-sql.php';

   $banquetQuery=select("banquet",array("user_id"=>2));


  


?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of Banquet Hall's</title>

<?php  include '../header.php';  ?>


<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="images/icon/dbc5.png" alt=""/>My Banquet Hall's</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						<table class="bordered responsive-table">
							<thead>
								<tr>
									<th>Hall Name</th>
									<th>Capacity</th>
									<th>Gathering Type</th>
									<th>Serve Food ?</th>
									<th>Amenities</th>
									
								</tr>
							</thead>
							<tbody class="wrap-td">
								<?php

								if (mysqli_num_rows($banquetQuery) > 0) { 

								
                                   while ($result=mysqli_fetch_assoc($banquetQuery)) { ?>

                                   <tr>
									<td><?php echo $result['banquet_name'];   ?></td>
									<td><?php echo $result['banquet_space'];   ?></td>
									<td><?php echo $result['banquet_gathering'];   ?></td>
									<td><?php echo $result['banquet_serve'];  ?></td>
									<td><?php echo $result['banquet_other'];   ?></td>
									
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



				<?php include"../footer.php"; ?>


</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>