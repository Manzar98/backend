<?php 
   include '../common-apis/api.php';

   $banquetQuery=select("banquet",array("user_id"=>2));

   //


  


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
						<table class="bordered responsive-table" id="h_table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Capacity</th>
									<th>City</th>
									<th>Status (Active/Inactive)</th>
									
									
								</tr>
							</thead>
							<tbody class="wrap-td">
								<?php

								if (mysqli_num_rows($banquetQuery) > 0) { 

								
                                   while ($result=mysqli_fetch_assoc($banquetQuery)) { 

                                    $hotelQuery=select("hotel",array('hotel_id'=>$result['hotel_id']));
                                     // print_r($hotelQuery);
                                      ?>

                                   <tr>
									<td class="text-center"><?php echo $result['banquet_name'];   ?></td>
									<td class="text-center"><?php echo $result['banquet_space'];   ?></td>
									<?php 
									  if ($result['banquet_independ']=='yes') {?>
									  	
									  	<td class="text-center"><?php echo $result['banquet_city'];   ?></td>
									<?php   }else{ 

									while ($hotelCity=mysqli_fetch_assoc($hotelQuery)) { ?>

									     <td class="text-center"><?php echo $hotelCity['hotel_city'];   ?></td> 

										
								 <?php 
									  }  
									  
									  } ?>
									<td class="text-center"><?php echo "Active";  ?></td>

									<td class="tdwrap">
									<div class="buttonsWrap">
										<div class="row">
											<a class="waves-effect waves-light btn" href="showsingle_banquetrecord.php?id=<?php echo $result['banquet_id'];  ?>&h_id=<?php echo $result['hotel_id']; ?>">Veiw</a>
											<a class="waves-effect waves-light btn" href="edit_banquet.php?id=<?php echo $result['banquet_id'];  ?>&h_id=<?php echo $result['hotel_id']; ?>"">Edit</a>
											<a class="waves-effect waves-light btn" href="#">Delete</a>
										</div>
										
									</div>
									</td>
									
									
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