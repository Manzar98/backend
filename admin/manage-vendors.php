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

				   <div class="row">
						 	<div class="col s4 search_flter">
						 		
						 		 <select onchange="myFunction(event)" id="yourole"  name="">
						 		 	  <option value="" selected="" disabled="">Search By Filter</option>
								      <option value="Approved">Approved</option>
								      <option value="Suspended">Suspended</option>
								      
                                 </select>
						 	</div>
						 	<div class="col s6 search_field">	
						 		<input  type="text" class="input-field" id="mysearch" onkeyup="myFunction(event)" placeholder="Search">
						 	</div>
						 	<div class="search_field_btn">
						 		<input class="waves-effect waves-light btn" id="inptbtn" type="button"  onclick="myFunction(event)" value="Search"> 
						 	</div>
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

                                   <tr class="tr-1">
									<td class="td-name"><?php echo $result['reg_name'];   ?> <?php echo $result['reg_lstname'];   ?></td>
									<td class="text-center"><?php echo $result['reg_postal']; ?></td>
									<td class="text-center"><?php echo $result['reg_city'];   ?></td>
									<td class="text-center"><?php echo $result['reg_email'];   ?></td>
									
										<?php if ($result['user_status']=="Approved") { ?>

										<td class="status_wrap appr" ><span class="db-success"><?php echo $result['user_status']; ?></span></td>

										<!-- <td class="status_wrap sus" style="display: none;"><span class="db-not-success">Suspended</span></td> -->

										<?php }elseif ($result['user_status']=="Suspended") {?>

										<td class="status_wrap appr"><span class="db-not-success"><?php echo $result['user_status']; ?></span></td>
										<!-- <td class="status_wrap appr" style="display: none;"><span class="db-success">Approved</span></td> -->

										<?php }else{ ?>

										<td class="status_wrap "><span class="db-not-success vendor-pending">Pending</span></td>
										<?php } ?>
									
                                    <td class="text-center sus_appr">
                                    	<?php if ($result['user_status']=="Approved") { ?>

                                     		<a  href="#susp" u_id="<?php echo $result['user_id'] ?>" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" >Suspend</a>
                                     		<a  onclick="show_suspend(event)" u_id="<?php echo $result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;">Suspend</a>
                                     		<a  onclick="show_approve(event)"  u_id="<?php echo $result['user_id'] ?>" class="approve btn" value="Approved" style="display: none;">Approve</a>
                                     	
                                   <?php  }else{ ?>

                                    		<a href="#susp"  u_id="<?php echo $result['user_id'] ?>" class="suspend waves-effect waves-light btn modal-trigger" style="display: none;">Suspend</a>
                                    		<a  onclick="show_suspend(event)" u_id="<?php echo $result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;">Suspend</a>
                                     		<a  onclick="show_approve(event)"  u_id="<?php echo $result['user_id'] ?>" class="approve btn" value="Approved" >Approve</a>
 
                                   	         
                                 <?php   } ?>
                                    </td>
                                    <td class="tdwrap_vendors">
									<div class="buttonsWrap_vendors">
										<div class="row">
											<a class="waves-effect waves-light btn" href="veiw_vendors.php?id=<?php echo $result['user_id'];  ?>">Veiw</a>
											<a class="waves-effect waves-light btn" href="edit_vendor.php?id=<?php echo $result['user_id'];  ?>">Edit</a>
											<a class="waves-effect waves-light btn" href="#">Delete</a>
										</div>
										
									</div>
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
						  <!-- Modal Trigger -->
  

  <!-- Modal Structure -->
  <div id="susp" class="modal ">
    <div class="modal-content">
      <h4>Reason for suspention</h4>
     <div class="input-field col s12">
          <textarea id="textarea_susp" class="materialize-textarea"></textarea>
          <label for="textarea_susp">Reason</label>
          <input type="button" value="Submit" class="btn" name="" onclick="reason_submit()">
        </div>
    </div>
    
  </div>
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
	   $.ajax({
             
             type:"POST",
             url:"update-user_status.php",
             data:{'btn':btn,'u_id':u_id,'reason':text_area},
             success:function(res){
                   
                   var data=JSON.parse(res);

                   if (data.status=="Suspended") {
                        // sus.find('.appr').hide();
                         // sus.find('.sus').show();
                         
                         sus.find(".appr").html('');
                         sus.find(".appr").html('<span class="db-not-success">Suspended</span>');
                         // debugger;

                   }else{

                         
                         
                   }
                 console.log(data);
             }    

	   });
	 // $(event.currentTarget).hide();
	  
	 $(event.currentTarget).parents('.sus_appr').find('.approve').show();
	 // debugger;
} 

function show_approve(event) {
      
      var sus=$(event.currentTarget).parents('tr');

	var btn=$(event.currentTarget).attr('value');
      var u_id=$(event.currentTarget).attr('u_id');

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
             data:{'btn':btn,'u_id':u_id},
             success:function(res){
                   
                   var data=JSON.parse(res);

                   if (data.status=="Approved") {
                          
                          sus.find(".appr").html('');
                         sus.find(".appr").html('<span class="db-success">Approved</span>');
                          // sus.find('.sus').hide();
                          // sus.find('.appr').show();

                        
					      sus.find('.approve').hide();
					      sus.find('.suspend').show();
 	 
                   }else{
                      
                      
                      
                   }
                 console.log(data);
             }   
       
	   });
           

          	}

          	
          });

	 
 	 
}
</script>
    
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
</html>


	




	