<?php
  
  include '../../common-sql.php';
 

  // select("hotel",array("user_id"=>2));
      



        // $hotelQuery=mysqli_query($conn,$hotelSelect) or die(mysqli_error($conn));

        



?>






<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of Hotels</title>


<?php include '../header.php'; 


$hotelQuery=    'SELECT * FROM hotel where user_id="'.$_SESSION['user_id'].'" ORDER BY hotel_id DESC ';
          $hotel_resp =mysqli_query($conn,$hotelQuery)  or die(mysqli_error($conn));
?>


             <!--  <input type="text"  id="row_count" name=""> -->
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../../images/icon/dbc5.png" alt=""/>My Hotels</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
 

                  <?php

				 if (mysqli_num_rows($hotel_resp) > 0) {   ?>
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
									<th>Inactive/Active Rooms</th>
									<th>Booked/Free Rooms</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody class="wrap-td">
								

								
                                 <?php  while ($result=mysqli_fetch_assoc($hotel_resp)) { 

                                       $roomcount_inact='SELECT COUNT(*) AS count FROM room WHERE hotel_id="'.$result['hotel_id'].'" AND room_inactive="off"';
                                $roomcount_act='SELECT COUNT(*) AS count FROM room WHERE hotel_id="'.$result['hotel_id'].'" AND room_inactive="on"';
                             
                                  $roomquery_inact= mysqli_query($conn,$roomcount_inact) or die(mysqli_error($conn));
                                  $roomquery_act= mysqli_query($conn,$roomcount_act) or die(mysqli_error($conn));
                                 	?>

                                   <tr>
									<td class="td-name capitalize"><?php echo $result['hotel_name'];   ?></td>
									<td class="td-name capitalize"><?php echo $result['hotel_city'];  ?></td>
									<?php if (mysqli_num_rows($roomquery_inact)> 0) {
                             	        $cnt=mysqli_fetch_assoc($roomquery_inact);
                             	        $inactive_count= $cnt['count']."</br>";
                             	      // echo   count($cnt);
                             }  ?>
                              <?php if (mysqli_num_rows($roomquery_act)> 0) {
                             	        $cnt_act=mysqli_fetch_assoc($roomquery_act);
                             	        $active_count= $cnt_act['count'];
                             	      // echo   count($cnt);
                             }  ?>

									<td class="capitalize"><?php echo $active_count."/".$inactive_count; ?></td>
									<td class="capitalize"><?php echo "1/9";   ?></td>
									<?php if ($result['hotel_inactive']== "on") { ?>
										    
										    <td class=""><span class="db-not-success"><?php echo "Inactive";  ?></span></td>
									<?php }else{ ?>

                                             <td class=""><span class="db-success"><?php echo "Active";  ?></span></td>
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
       } ?>
        
								
						
							</tbody>
						</table>

						<?php	}else{ ?>
                          <div class="text-center"><span>You have no Hotels</span></div>
                          <div class="row common-top text-center">
							<div class="">
								
							<a class="waves-effect waves-light btn modal-trigger spc-modal" href="db-add-hotels.php">Add New Hotel</a>
								
							</div>
					   </div>

							<?php }?>
					</div>
				</div>
			
				
			</div>
			<?php include '../footer.php'; ?>
<script type="text/javascript">
	
	// $(document).ready(function(){


 //      var Row_length=$('.wrap-td tr').length;

 //          $('#row_count').val(Row_length);

	// })
</script>
			</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>