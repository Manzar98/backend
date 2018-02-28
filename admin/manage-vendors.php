<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>List of Vendors</title>
	<?php  include 'header.php'; 

	include '../common-sql.php';
	$vendorQuery=    'SELECT * FROM credentials where user_type="vendor" ';
	 
          $vendor_resp =mysqli_query($conn,$vendorQuery)  or die(mysqli_error($conn));


	?>

				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../images/icon/dbc5.png" alt=""/>Vendors</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>

						</div>

						
						<?php

								if (mysqli_num_rows($vendor_resp) > 0) { ?>
                             
								 
						<table class="bordered responsive-table" id="h_table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Address</th>
									<th>City</th>
									<th>Email Address</th>
									<th>Status</th>
									<th>Click</th>
									
									
								</tr>
							</thead>
							<tbody class="wrap-td">
								
                                <?php   while ($result=mysqli_fetch_assoc($vendor_resp)) { ?>

                                   <tr class="">
									<td class="td-name"><?php echo $result['reg_name'];   ?> <?php echo $result['reg_lstname'];   ?></td>
									<td class="text-center"><?php echo $result['reg_postal']; ?></td>
									<td class="text-center"><?php echo $result['reg_city'];   ?></td>
									<td class="text-center"><?php echo $result['reg_email'];   ?></td>
									
										<?php if ($result['user_status']=="Approved") { ?>

										<td class="status_wrap appr" ><span class="db-success"><?php echo $result['user_status']; ?></span></td>

										<td class="status_wrap sus" style="display: none;"><span class="db-not-success">Suspended</span></td>

										<?php }elseif ($result['user_status']=="Suspended") {?>

										<td class="status_wrap sus"><span class="db-not-success"><?php echo $result['user_status']; ?></td>
										<td class="status_wrap appr" style="display: none;"><span class="db-success">Approved</span></td>

										<?php }else{ ?>

										<td class="status_wrap "><span class="db-not-success vendor-pending">Pending</span></td>
										<?php } ?>
									</span>
                                    <td class="text-center sus_appr">
                                    	<?php if ($result['user_status']=="Approved") { ?>

                                     		<a onclick="show_suspend(event)"  u_id="<?php echo $result['user_id'] ?>" class="suspend btn" value="Suspended">Suspend</a>
                                     		<a  onclick="show_approve(event)"  u_id="<?php echo $result['user_id'] ?>" class="approve btn" value="Approved" style="display: none;">Approve</a>
                                     	
                                   <?php  }else{ ?>

                                    		<a onclick="show_suspend(event)"  u_id="<?php echo $result['user_id'] ?>" class="suspend btn" value="Suspended" style="display: none;">Suspend</a>
                                     		<a  onclick="show_approve(event)"  u_id="<?php echo $result['user_id'] ?>" class="approve btn" value="Approved" >Approve</a>
 
                                   	         
                                 <?php   } ?>
                                    </td>
									
									
								</tr>



            
    <?php    
  
       }
        	?>
								
						
							</tbody>
						</table>
						<?php 	}else{ ?>
 
						<div class="text-center"><span>You have no featured ads</span></div>
						<div class="row common-top text-center">
							<div class="">
								
								<a class="waves-effect waves-light btn" href="paid_ads.php">Feature an Ad</a>
								
							</div>
						</div>

						 <?php	}?>
					</div>
				</div>
  </div>

<?php include'footer.php'; ?>
<script type="text/javascript">
	
	function show_suspend(event) {
      
      var sus=$(event.currentTarget).parents('tr');
	  var btn=$(event.currentTarget).attr('value');
      var u_id=$(event.currentTarget).attr('u_id');
	   $.ajax({
             
             type:"POST",
             url:"update-user_status.php",
             data:{'btn':btn,'u_id':u_id},
             success:function(res){
                   
                   var data=JSON.parse(res);

                   if (data.status=="Suspended") {

                         sus.find('.sus').show();
                         sus.find('.appr').hide();

                   }else{

                         
                         
                   }
                 console.log(data);
             }    

	   });
	 $(event.currentTarget).hide();
	  
	 $(event.currentTarget).parents('.sus_appr').find('.approve').show();
	 // debugger;
} 

function show_approve(event) {
       
      var sus=$(event.currentTarget).parents('tr');

	var btn=$(event.currentTarget).attr('value');
      var u_id=$(event.currentTarget).attr('u_id');
	   $.ajax({
             
             type:"POST",
             url:"update-user_status.php",
             data:{'btn':btn,'u_id':u_id},
             success:function(res){
                   
                   var data=JSON.parse(res);

                   if (data.status=="Approved") {

                          
                          sus.find('.sus').hide();
                          sus.find('.appr').show();
                          
                         
                         
                   }else{
                      
                      
                      
                   }
                 console.log(data);
             }   

	   });
	$(event.currentTarget).hide();
	 
	 $(event.currentTarget).parents('.sus_appr').find('.suspend').show();
}
</script>
    
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
</html>


	




	