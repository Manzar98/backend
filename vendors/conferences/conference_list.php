<?php 
  
   include '../../common-apis/reg-api.php';
   
   // $conferenceQuery=select("conference",array("user_id"=>2));
   



  

?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of Conference Hall's</title>

<?php include '../header.php'; 
$conferenceQuery='SELECT * FROM conference where user_id="'.$_SESSION['user_id'].'" ORDER BY conference_id DESC ';
          $conference_resp =mysqli_query($conn,$conferenceQuery)  or die(mysqli_error($conn));?>




				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../../images/icon/dbc5.png" alt=""/>My Conference Hall's</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>

		 
            	<?php

					if (mysqli_num_rows($conference_resp) > 0) { ?>

					<div class="row">
						<div class="col s1"></div>
						<div class="col s8  ">	
							<input  type="text" class="input-field" id="mysearch" onkeyup="myFunction(event)" placeholder="Search">
						</div>
						<div class="">
							<input class="waves-effect waves-light btn" id="inptbtn" type="button"  onclick="myFunction(event)" value="Search"> 
						</div>
					</div>

						<table class="bordered responsive-table" id="h_table">
							<thead>
								<tr>
									
									<th>Hall Name</th>
									<th>Capacity</th>
									<th>City</th>
									<th>Status</th>
									
								</tr>
							</thead>
							
								<tbody class="wrap-td">
							

								
                               <?php    while ($result=mysqli_fetch_assoc($conference_resp)) { 


                                         $hotelQuery=select("hotel",array('hotel_id'=>$result['hotel_id']));

                                   	?>

                                   <tr>
									<td class="td-name capitalize"><?php echo $result['conference_name'];   ?></td>
									<td class="td-name capitalize"><?php echo $result['conference_space'];   ?></td>

									<?php 
									  if ($result['conference_independ']=='yes') {?>
									  	
									  	<td class="td-name capitalize"><?php echo $result['conference_city'];   ?></td>
									<?php   }else{ 

									while ($hotelCity=mysqli_fetch_assoc($hotelQuery)) { ?>

									     <td class="td-name capitalize"><?php echo $hotelCity['hotel_city'];   ?></td> 

										
								 <?php 
									  }  
									  
									  } ?>
                                    <?php if ($result['conference_inactive']== "on") { ?>
										    
										    <td class=""><span class="db-not-success"><?php echo "Inactive";  ?></span></td>
									<?php }else{ ?>

                                             <td class=""><span class="db-success"><?php echo "Active";  ?></span></td>
									<?php } ?>
									
									<!-- <td><a href="#" class="db-success">Success</a>
									</td> -->
									<td class="tdwrap">
								<div class="buttonsWrap">

										<?php if ($result['conference_independ']=='no') { ?>
											
										
										<div class="row">
											<a class="waves-effect waves-light btn" href="showsingle_conferencerecord.php?id=<?php echo $result['conference_id'];  ?>&h_id=<?php echo $result['hotel_id']; ?>">Veiw</a>
											<a class="waves-effect waves-light btn" href="edit_conference.php?id=<?php echo $result['conference_id'];  ?>&h_id=<?php echo $result['hotel_id']; ?>"">Edit</a>
											<a class="waves-effect waves-light btn" href="#">Delete</a>
										</div>
								<?php	}else{ ?>

								         <div class="row">
											<a class="waves-effect waves-light btn" href="showsingle_conferencerecord.php?id=<?php echo $result['conference_id'];  ?>&u_id=<?php echo $result['user_id']; ?>">Veiw</a>
											<a class="waves-effect waves-light btn" href="edit_conference.php?id=<?php echo $result['conference_id'];  ?>&u_id=<?php echo $result['user_id']; ?>"">Edit</a>
											<a class="waves-effect waves-light btn" href="#">Delete</a>
										</div>



								<?php }   ?>
										
							 </div>
			
									</td>
								</tr>



            
    <?php    
 // print_r($result);
       } ?>
        	
								
						
							</tbody>
						</table>
						<?php	}else{ ?>

						 <div class="text-center"><span>You have no Conference Halls</span></div>
						 <div class="row common-top text-center">
						 	<div class="">
						 		
						 		<a class="waves-effect waves-light btn modal-trigger spc-modal" href="db-add-conference-hall.php">Add New Conference</a>
						 		
						 	</div>
						 </div>

						 <?php	}?>
					</div>
				</div>
				</div>


				<?php  include '../footer.php';?>


				</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>