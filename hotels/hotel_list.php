<?php
  
  include '../common-sql.php';


  // select("hotel",array("user_id"=>2));
      $hotelQuery=    'SELECT * FROM hotel where user_id=2 ORDER BY hotel_id DESC ';
          $hotel_resp =mysqli_query($conn,$hotelQuery)  or die(mysqli_error($conn));



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
 <div class="row">
 	<div class="col s1"></div>
	 <div class="col s8  ">	
    <input  type="text" class="input-field" id="mysearch" onkeyup="myFunction(event)" placeholder="Search">
  </div>
  <div class="">
    <input class="waves-effect waves-light btn" id="inptbtn" type="button"  onclick="myFunction(event)" value="Search"> 
  </div>
</div>


						<table class="bordered responsive-table" cellpadding="10" cellspacing="10" id="h_table">
							<thead>
								<tr >
									<th>Name</th>
									<th>City</th>
									<th>Active/Inactive Rooms</th>
									<th>Booked/Free Rooms</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody class="wrap-td">
								<?php

								if (mysqli_num_rows($hotel_resp) > 0) { 

								
                                   while ($result=mysqli_fetch_assoc($hotel_resp)) { ?>

                                   <tr>
									<td class="td-name"><?php echo $result['hotel_name'];   ?></td>
									<td class="text-center td-name"><?php echo $result['hotel_city'];  ?></td>
									<td class="text-center"><?php echo "5/2";   ?></td>
									<td class="text-center"><?php echo "1/9";   ?></td>
									<?php if ($result['hotel_inactive']== "on") { ?>
										    
										    <td class="text-center"><span class="db-not-success"><?php echo "Inactive";  ?></span></td>
									<?php }else{ ?>

                                             <td class="text-center"><span class="db-success"><?php echo "Active";  ?></span></td>
									<?php } ?>
									
									
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
			<?php include '../footer.php'; ?>

			</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>