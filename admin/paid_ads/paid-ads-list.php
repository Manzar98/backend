<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>List of featured ads</title>
	<?php  include '../header_inner_folder.php'; 

	include '../../common-sql.php';
	$paidQuery=    'SELECT * FROM paid_ads where user_id="'.$_GET['user_id'].'" ORDER BY paid_id DESC ';
          $ads_resp =mysqli_query($conn,$paidQuery)  or die(mysqli_error($conn));


	?>

				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
							
						<div class="db-title">
							<h3><img src="../../images/icon/dbc5.png" alt=""/> <?php echo $_GET['name']; ?> Featured Ads</h3>
							

						</div>

					<?php

						if (mysqli_num_rows($ads_resp) > 0) { ?>	
					
                              <div class="row common-top ">
							    <div class="featured_btn">
								<?php if ($_GET['status']=="Approved") { ?>

									   <a class="waves-effect waves-light btn" href="paid_ads.php?user_id=<?php echo $_GET['user_id']; ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>">Feature an Ad</a>

								<?php } ?>
							    </div>
						      </div>
								 
						<table class="bordered responsive-table" id="h_table">
							<thead>
								<tr> 
									<th>Name</th>
									<th>Listing Type</th>
									<th>Listing Name</th>
									<th>Page</th>
									<th>Duration</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody class="wrap-td ">
								
                                  <?php $i=0; ?>
								
                                <?php   while ($result=mysqli_fetch_assoc($ads_resp)) { ?>

                                   <tr class="tr-wrap">
                                   	<td class="td-name capitalize"><?php echo $result['ad_name'];   ?></td>
									<td class="td-name capitalize"><?php echo $result['select_any'];   ?></td>
									<td class="td-name capitalize listing_name"><?php echo $result['list_of_any']; ?></td>
									<td class="td-name capitalize"><?php echo $result['on_which_page'];   ?></td>
									<td class="td-name capitalize"><?php echo $result['no_of_days'];   ?></td>
								    <?php if ($result['ad_status']=="Approved") { ?>

										<td class="status_wrap appr" ><span class="db-success"><?php echo $result['ad_status']; ?></span></td>
										<?php }elseif ($result['ad_status']=="Suspended") {?>

										<td class="status_wrap appr"><span class="db-not-success"><?php echo $result['ad_status']; ?></span></td>
										
										<?php }else{ ?>

										<td class="status_wrap appr"><span class="db-not-success vendor-pending"><?php echo $result['ad_status']; ?></span></td>
										<?php } ?>
									
										
								 <td class="tdwrap tdwrap_ads sus_appr">
									<div class="buttonsWrap buttonsWrap_ads">
										<div class="row  ">

											<?php if ($_GET['status']=="Suspended") { ?>
												
													<a class="waves-effect waves-light btn" href="#">Delete</a>

											<?php }else{ ?>

													<a class="waves-effect waves-light btn" href="edit_paid_ad.php?id=<?php echo $_GET['user_id'];  ?>&p_id=<?php echo $result['paid_id'] ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>">Edit</a>
													<a class="waves-effect waves-light btn" href="#">Delete</a>

													<?php if ($result['ad_status']=="Approved") { ?>

													<a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended">Suspend</a>

													<a  onclick="show_suspend(event)" id="<?php echo $result['user_id']; ?>" p_id="<?php echo $result['paid_id']; ?>" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;">Suspend</a>

													<a  onclick="show_approve(event)" id="<?php echo $result['user_id']; ?>" p_id="<?php echo $result['paid_id']; ?>" class="approve btn" value="Approved" style="display: none;">Approve</a>

													<?php }else{ ?>

													<a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" style="display: none;" >Suspend</a>

													<a  onclick="show_suspend(event)" id="<?php echo $result['user_id']; ?>" p_id="<?php echo $result['paid_id']; ?>" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;">Suspend</a>

													<a  onclick="show_approve(event)" id="<?php echo $result['user_id']; ?>" p_id="<?php echo $result['paid_id']; ?>" class="approve btn" value="Approved" >Approve</a>

													<?php } ?>

											<?php } ?>
											
										</div>
										
									</div>
								</td> 
									
									
								</tr>



            
    <?php    
  // print_r($result);
       $i++;}
        	?>
								
						
							</tbody>
						</table>
						<?php 	}else{ ?>

						   <?php if ($_GET['status']=='Suspended') { ?>

							 	<div class="row">
						        <div class="col s1"></div>
                                <div class="pull-left">
                                 <h3  style="color: red;"><?php echo $_GET['name']; ?> is Suspended<b>!</b></h3>
                                  <div style="padding-left: 5px; width: 635px;">
                                  <span >Listings cannot be added under the suspended users. Approve the user first to add listings under their name.</span>
                                  </div>
                                </div>
							 	
                             </div>

							<?php  }elseif ($_GET['status']=='Pending') { ?>
							
									<h3  style="color: red;"><?php echo $_GET['name']; ?> is Pending<b>!</b></h3>
									  <span>The user’s status is pending; first approve the user to add listings under his name</span>
								
							<?php }else{ ?>

									<div class="text-center"><span><?php echo $_GET['name']; ?> has no featured ads</span></div>
									<div class="row common-top text-center">
										<div class="">

											<a class="waves-effect waves-light btn" href="paid_ads.php?user_id=<?php echo $_GET['user_id']; ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>">Feature an Ad</a>

										</div>
									</div>

						<?php	} ?>
 
						

					<?php	}?>
					</div>
				</div>
  </div>

	<?php include'../footer_inner_folder.php'; ?>
   <?php include '../../common-ftns/suspend_reason_modal.php'; ?>

 <script type="text/javascript">
   	
   	 function show_approve(event) {
       
      var sus=$(event.currentTarget).parents('tr');
      var btn=$(event.currentTarget).attr('value'); 
      var p_id=$(event.currentTarget).attr('p_id');
      var u_id=$(event.currentTarget).attr('id');
      var listing_name= sus.find('.listing_name').text();

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
             url:"paid-ads-update.php",
             data:{'btn':btn,'u_id':u_id,'p_id':p_id,'list_name':listing_name},
             success:function(res){
                   
                   var data=JSON.parse(res);

                   if (data.status=="Approved") {

                          sus.find('.approve').hide();
                          sus.find('.suspend').show();
                          sus.find(".appr").html('');
                          sus.find(".appr").html('<span class="db-success">Approved</span>');
                   }
             }   

     });
           

            }

            
          });
  
}


	var rowValue = "";
      $('#susp').modal({
      	dismissible: false, // Modal can be dismissed by clicking outside of the modal
     
      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
        // alert("Ready");
        rowValue =trigger.parents('.sus_appr');
        console.log(modal, trigger);
         
      },
      });
function reason_submit() {

      	if ($('#textarea_susp').val()) {

		      rowValue.find('.org_susp').trigger('click');
		      rowValue.find('.suspend').hide();
		      $('#textarea_susp').val('');  
		      $('.realtime_reason').show();
		      $('#susp').modal('close');
		      
		      

      	}
      
      
 }
	
	function show_suspend(event) {
     
        var text_area=$('#textarea_susp').val();
        var sus=$(event.currentTarget).parents('tr');
        var btn=$(event.currentTarget).attr('value');
        var p_id=$(event.currentTarget).attr('p_id');
        var u_id=$(event.currentTarget).attr('id');
        var listing_name=sus.find('.listing_name').text();
	   $.ajax({
             
             type:"POST",
             url:"paid-ads-update.php",
              data:{'btn':btn,'u_id':u_id,'p_id':p_id,'reason':text_area,'list_name':listing_name},
             success:function(res){
                   
                   var data=JSON.parse(res);

                   if (data.status=="Suspended") {

                          sus.find('.suspend').hide();
                          sus.find('.approve').show();
                          sus.find(".appr").html('');
                         sus.find(".appr").html('<span class="db-not-success">Suspended</span>');
                   }else{

                         
                   }
                 console.log(data);
             }    

	   });
	 
	 // debugger;
} 

   </script>
  
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
</html>


	




	