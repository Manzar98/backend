<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>List of Contributors</title>
	<?php  include 'header.php'; 

	include '../common-sql.php';
	$vendorQuery=    'SELECT * FROM credentials where (user_type="vendor" OR user_type="blogger") ORDER BY user_id DESC ';
	 
          $vendor_resp =mysqli_query($conn,$vendorQuery)  or die(mysqli_error($conn));


	?>

				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../images/icon/dbc5.png" alt=""/> Contributors</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>

						</div>

				       <?php include '../common-ftns/admin_filteration.php'; ?>
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
									
									
									
								</tr>
							</thead>
							<tbody class="wrap-td">
								
                                <?php   while ($result=mysqli_fetch_assoc($vendor_resp)) { ?>

                                   <tr class="tr-1 <?php echo $result['user_type']; ?> <?php echo $result['user_type']; ?>_<?php echo $result['user_status']?>">
									<td class="td-name"><?php echo $result['reg_name'];   ?> <?php echo $result['reg_lstname'];   ?></td>
									<td class="text-center td-name"><?php echo $result['reg_postal']; ?></td>
									<td class="text-center"><?php echo $result['reg_city'];   ?></td>
									<td class="text-center"><?php echo $result['reg_email'];   ?></td>
									
										<?php if ($result['user_status']=="Approved") { ?>

										<td class="status_wrap appr" ><span class="db-success"><?php echo $result['user_status']; ?></span></td>

										<?php }elseif ($result['user_status']=="Suspended") {?>

										<td class="status_wrap appr"><span class="db-not-success"><?php echo $result['user_status']; ?></span></td>
										
										<?php }else{ ?>

										<td class="status_wrap appr"><span class="db-not-success vendor-pending"><?php echo $result['user_status']; ?></span></td>
										<?php } ?>
									
                                  <td class="userType" style="display: none;"><?php echo $result['user_type']; ?></td>
                                    <td class="tdwrap sus_appr">
									<div class="buttonsWrap_vendors">
										<div class="row">
											<a class="waves-effect waves-light btn" href="veiw_vendors.php?id=<?php echo $result['user_id'];  ?>&u_type=<?php echo $result['user_type']; ?>">Veiw</a>
											<a class="waves-effect waves-light btn" href="edit_vendor.php?id=<?php echo $result['user_id'];  ?>&u_type=<?php echo $result['user_type']; ?>">Edit</a>
											<a class="waves-effect waves-light btn" href="#">Delete</a>
											<?php if ($result['user_status']=="Approved") { ?>

                                     		<a  href="#susp" u_id="<?php echo $result['user_id'] ?>" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" >Suspend</a>
                                     		<a  onclick="show_suspend(event)" u_id="<?php echo $result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;" u_type="<?php echo $result['user_type']; ?>">Suspend</a>
                                     		<a  onclick="show_approve(event)"  u_id="<?php echo $result['user_id'] ?>" class="approve btn" value="Approved" style="display: none;" u_type="<?php echo $result['user_type']; ?>">Approve</a>
                                     	
                                   <?php  }else{ ?>

                                    		<a href="#susp"  u_id="<?php echo $result['user_id'] ?>" class="suspend waves-effect waves-light btn modal-trigger" style="display: none;" >Suspend</a>
                                    		<a  onclick="show_suspend(event)" u_id="<?php echo $result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;" u_type="<?php echo $result['user_type']; ?>">Suspend</a>
                                     		<a  onclick="show_approve(event)"  u_id="<?php echo $result['user_id'] ?>" u_type="<?php echo $result['user_type']; ?>" class="approve btn" value="Approved" >Approve</a>
 
                                   	         
                                 <?php   } ?>
										</div>
										
									</div>
								</td>
								
									
									
								</tr>



            
    <?php    
  
       }
        	?>
								
						
							</tbody>
						</table>
						<?php 	} ?>
 
						
						 <?php include '../common-ftns/suspend_reason_modal.php'; ?>
					</div>
				</div>
  </div>

<?php include'footer.php'; ?>
<script type="text/javascript">
	var rowValue = "";
      $('#susp').modal({
      	dismissible: false, // Modal can be dismissed by clicking outside of the modal
     
      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
        // alert("Ready");
        rowValue =trigger.parents('tr');
        console.log(modal, trigger);
        // debugger;
      },
      });
function reason_submit() {

      	if ($('#textarea_susp').val()) {
         
		      rowValue.find('.org_susp').trigger('click');
		      rowValue.find('.suspend').hide();
		      $('#textarea_susp').val('');  
		      $('#susp').modal('close');

      	}
      
      
 }
	function show_suspend(event) {
		// debugger;
      var text_area=$('#textarea_susp').val();
      var sus=$(event.currentTarget).parents('tr');
	  var btn=$(event.currentTarget).attr('value');
      var u_id=$(event.currentTarget).attr('u_id');
      var u_type=$(event.currentTarget).attr('u_type');
	   $.ajax({
             
             type:"POST",
             url:"update-user_status.php",
             data:{'btn':btn,'u_id':u_id,'reason':text_area,'u_type':u_type},
             success:function(res){
                   
                   var data=JSON.parse(res);

                   if (data.status=="Suspended") {
                       
                         sus.find(".appr").html('');
                         sus.find(".appr").html('<span class="db-not-success">Suspended</span>');
                        
                   }
             }    

	   });

	 $(event.currentTarget).parents('.sus_appr').find('.approve').show();

} 

function show_approve(event) {
      
      var sus=$(event.currentTarget).parents('tr');
	  var btn=$(event.currentTarget).attr('value');
      var u_id=$(event.currentTarget).attr('u_id');
      var u_type=$(event.currentTarget).attr('u_type');


       swal({

        title: "Are you sure you want to approve this user?",
        
        type: "warning",
            // confirmButtonColor: "#DD6B55",
            showCancelButton: true,
            confirmButtonText: "ok",
            closeOnConfirm: true,
            confirmButtonText: "Yes",
            cancelButtonText: "cancel",
            closeOnConfirm: true,
            closeOnCancel: true
          },function (isconfirm) {

          	if (isconfirm) {
                       

          		 	   $.ajax({
             
             type:"POST",
             url:"update-user_status.php",
             data:{'btn':btn,'u_id':u_id,'u_type':u_type},
             success:function(res){
                   
                   var data=JSON.parse(res);

                   if (data.status=="Approved") {
                          
                          sus.find(".appr").html('');
                          sus.find(".appr").html('<span class="db-success">Approved</span>');
					      sus.find('.approve').hide();
					      sus.find('.suspend').show();
 	 
                   }
             }   
       
	   });
           

          	}

          	
   });

	 
 	 
}


</script>
  <script src="../js/admin-js/admin.js"></script>  
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
</html>


	




	