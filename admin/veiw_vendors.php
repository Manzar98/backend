<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>User-Profile</title>
<?php include 'header.php'; 
   
   include"../common-apis/api.php";


    $reg_Query= select('credentials',array("user_id"=>$_GET['id']));
if (isset($_GET['u_type']) && $_GET['u_type']=="vendor") {
    $reg_hotel=select('hotel',array("user_id"=>$_GET['id']));
    $reg_room=select('room',array("user_id"=>$_GET['id']));
    $reg_banquet=select('banquet',array("user_id"=>$_GET['id']));
    $reg_conference=select('conference',array("user_id"=>$_GET['id']));
    $reg_tour=select('tour',array("user_id"=>$_GET['id']));
    $reg_event=select('event',array("user_id"=>$_GET['id']));

}else if (isset($_GET['u_type']) && $_GET['u_type']=="blogger") {
	
	$reg_blog=select('blog',array("user_id"=>$_GET['id']));
}

?>
				<?php   
          
          while ($reg_Result=mysqli_fetch_assoc($reg_Query)) { 
                     $pro_img=substr($reg_Result['reg_photo'],3) ;  ?>
                     <div class="veiw_sus_appr">
                      <div class="row" style="margin-top: 20px;">
                      	<div class="col s11">
					   	  
                        <div class="pull-right sus_appr" style="margin-left: 10px;">
                             
                                    	<?php if ($reg_Result['user_status']=="Approved") { ?>

                                     		<a  href="#susp" u_id="<?php echo $reg_Result['user_id'] ?>" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" >Suspend</a>
                                     		<a  onclick="show_suspend(event)" u_id="<?php echo $reg_Result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;" u_type="<?php echo $reg_Result['user_type']; ?>">Suspend</a>
                                     		<a  onclick="show_approve(event)"  u_id="<?php echo $reg_Result['user_id'] ?>" class="approve btn" value="Approved" style="display: none;" u_type="<?php echo $reg_Result['user_type']; ?>">Approve</a>
                                     	
                                   <?php  }else{ ?>

                                    		<a href="#susp"  u_id="<?php echo $reg_Result['user_id'] ?>" class="suspend waves-effect waves-light btn modal-trigger" style="display: none;">Suspend</a>
                                    		<a  onclick="show_suspend(event)" u_id="<?php echo $reg_Result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;" u_type="<?php echo $reg_Result['user_type']; ?>">Suspend</a>
                                     		<a  onclick="show_approve(event)"  u_id="<?php echo $reg_Result['user_id'] ?>" class="approve btn" value="Approved" u_type="<?php echo $reg_Result['user_type']; ?>">Approve</a>
 
                                   	         
                                 <?php   } ?>
                                   
                        </div>
                        <div class="pull-right" >
                            <a class="waves-effect waves-light btn" href="edit_vendor.php?id=<?php echo $reg_Result['user_id'];  ?>&u_type=<?php echo $reg_Result['user_type']; ?>">Edit</a>
                        </div>
                        </div>
					   </div>

					   <div class="text-center " >
                          <span style="margin-left: 10px;">Status:</span>
                           <?php if ($reg_Result['user_status']=="Approved") { ?>
                                
                             	 <span class="appr" style="color: green; "><b><?php echo $reg_Result['user_status']; ?></b></span>
                             	 <span class="sus" style="color: red; display: none;"><b>Suspended</b></span>



                           <?php   }else{ ?>
                                   
                                    <span class="pend" style="color: red;"><b><?php echo $reg_Result['user_status']; ?></b></span>
                                    <span class="appr" style="color: green; display: none;"><b>Approved</b></span>
                                     <span class="sus" style="color: red; display: none;"><b>Suspended</b></span>
                               
                                    


                         <?php   } ?>
                        </div>
                        
                        </div>
				<div class="db-profile"> 

                        
					<img src="<?php echo $pro_img; ?>" alt="">
					<h4><?php echo $reg_Result['reg_name'];  ?> <?php echo $reg_Result['reg_lstname']; ?></h4>
					<p><?php echo $reg_Result['reg_postal']; ?></p>
				</div>
				<div class="db-profile-view">
					<?php 
                          $userDob = $reg_Result['reg_birth'];
                          $dob = new DateTime($userDob);
                          $now = new DateTime();
                          $difference = $now->diff($dob);
                          $age = $difference->y;

                         $lastlogin=date_create($reg_Result['reg_lastlogin']);
					?>
					
					<input type="hidden"  value="<?php echo $reg_Result['reg_name'];?>" id=hidden-name_val>
							<input type="hidden"  value="<?php echo $_GET['id']?>" id=hidden-id_val>
					<table class="last-lgon_tbl">

						<thead>
							<th>Last Login</th>
						</thead>
						<tbody>
							<td><?php echo date_format($lastlogin, 'd-m-Y '); ?></td>
						</tbody>
					</table>
					<table class="responsive-table profle-forms-reocrds-tbl" > 
					<?php	if (isset($_GET['u_type']) && $_GET['u_type']=="vendor") { ?>
						<thead>
							
							<tr>
								<th>Age</th>
								<th class="TT ho-1 AD_listing" onClick="document.location.href='hotels/hotel_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name'];?>&status=<?php echo $reg_Result['user_status'];?>'">Hotels</th>
								<th class="TT ro-1 AD_listing" onClick="document.location.href='rooms/room_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">Rooms</th>
								<th class="TT ban-1 AD_listing" onClick="document.location.href='banquets/banquet_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">Banquets</th>
								<th class="TT con-1 AD_listing" onClick="document.location.href='conferences/conference_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">Conferences</th>
								<th class="TT tor-1 AD_listing" onClick="document.location.href='tours/tour_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">Tours</th>
								<th class="TT ev-1 AD_listing" onClick="document.location.href='events/event_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">Events</th>
								<th>Join Date</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $age; ?></td>
								
								<?php if (mysqli_num_rows($reg_hotel)< 1) { ?>
							     <td class="TT ho-1 AD_listing" onClick="document.location.href='hotels/hotel_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">0</td>
								<?php }else{ ?>
								   <td class="TT ho-1 AD_listing" onClick="document.location.href='hotels/hotel_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'"><?php echo mysqli_num_rows($reg_hotel); ?></td>
								<?php } ?>
								
								<?php if (mysqli_num_rows($reg_room)< 1) { ?>
								<td class="TT ro-1 AD_listing" onClick="document.location.href='rooms/room_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">0</td>
								<?php }else{ ?>
								<td class="TT ro-1 AD_listing" onClick="document.location.href='rooms/room_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'"><?php echo mysqli_num_rows($reg_room); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_banquet)< 1) { ?>
								<td class="TT ban-1 AD_listing" onClick="document.location.href='banquets/banquet_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">0</td>
								<?php }else{ ?>
								<td class="TT ban-1 AD_listing" onClick="document.location.href='banquets/banquet_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'"><?php echo mysqli_num_rows($reg_banquet); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_conference)< 1) { ?>
								<td class="TT con-1 AD_listing" onClick="document.location.href='conferences/conference_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">0</td>
								<?php }else{ ?>
								<td class="TT con-1 AD_listing" onClick="document.location.href='conferences/conference_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'"><?php echo mysqli_num_rows($reg_conference); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_tour)< 1) { ?>
								<td class="TT tor-1 AD_listing" onClick="document.location.href='tours/tour_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">0</td>
								<?php }else{ ?>
								<td class="TT tor-1 AD_listing" onClick="document.location.href='tours/tour_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'"><?php echo mysqli_num_rows($reg_tour); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_event)< 1) { ?>
								<td class="TT ev-1 AD_listing" onClick="document.location.href='events/event_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">0</td>
								<?php }else{ ?>
								<td class="TT ev-1 AD_listing" onClick="document.location.href='events/event_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'"><?php echo mysqli_num_rows($reg_event); ?></td>
								<?php } ?>
								<td><?php echo $reg_Result['reg_joinD']; ?></td>
							</tr>
						</tbody>
						<?php }else{ ?>
							<thead>
								<tr>
									<th>Age</th>
									<th class="TT bo-1 AD_blogs" onClick="document.location.href='blogger/blogListing.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">No of Blogs</th>
									<th>Join Date</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $age; ?></td>
									<?php if (mysqli_num_rows($reg_blog)< 1) { ?>
								<td class="TT bo-1 AD_blogs" onClick="document.location.href='blogger/blogListing.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">0</td>
								<?php }else{ ?>
								<td class="TT bo-1 AD_blogs" onClick="document.location.href='blogger/blogListing.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'"><?php echo mysqli_num_rows($reg_blog); ?></td>
								<?php } ?>
									<td><?php echo $reg_Result['reg_joinD']; ?></td>
								</tr>
							</tbody>
						<?php } ?>
					</table>
					
				</div>
				
				 	<div class="db-profile-edit">

					<form class="col s12" action="registration-update.php" method="post" role="form" id="registor-form">
						
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-10 ">
								<div class="row reason_sp">
								<?php if(!empty($reg_Result['suspend_reason'])){?>

                                          
								<div class="col-md-10 col-sm-12 col-xs-12 ">
								<label >Reason Suspention:</label>
								<div class="pull-left">
									 <span><?php echo $reg_Result['suspend_reason'];  ?></span>
									 </div>
							</div>
							
							<?php	} ?>
							</div>
							<div class="row">
							
							<div class="col-md-10 col-sm-12 col-xs-12 realtime_reason" style="display: none;">
								<label >Reason Suspention:</label>
								<div class="pull-left">
									 <span class="res_sup"></span>
									 </div>
							</div>
								</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12 ">
								<label >First Name :</label>
								<div class="pull-left">
									 <span><?php echo $reg_Result['reg_name'];  ?></span>
									 </div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12 ">
								<label>Last Name :</label>
								<div class="pull-left">
									<span><?php echo $reg_Result['reg_lstname'];  ?></span> 
								</div>
							</div>
						</div>
						<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<label>Email Address :</label>
							<div class="pull-left">
								<span><?php echo $reg_Result['reg_email'];  ?></span>
								 
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<label>Country</label>
							<div class="pull-left">
								  <span><?php echo $reg_Result['reg_country'];  ?></span>
								 </div>
						</div>
						</div>
                         
                        <div class="row">

                         	<div class="col-md-6 col-sm-12 col-xs-12">
                         		<label>Mobile Number :</label>
                         		<div class="pull-left">
                         		   <span><?php echo $reg_Result['reg_phone'];  ?></span>
                         		</div>   
                         	</div>
                         	<div class="col-md-6 col-sm-12 col-xs-12">
                         		<label>Postal Address</label>
                         		<div class="pull-left">
                         		   <span><?php echo $reg_Result['reg_postal'];  ?></span>
                         	    </div>
                         	</div>
   
                        </div>
                        <div class="row">
                        	
                        	<div class="col-md-6 col-sm-12 col-xs-12">
                        		<label>City :</label>
                        		<div class="pull-left">
                        		   <span><?php echo $reg_Result['reg_city'];  ?></span>
                        		</div>   
                        	</div>
                        	<div class="col-md-6 col-sm-12 col-xs-12">
                        		<label>Province :</label>
                        	    <div class="pull-left">
                        		   <span><?php echo $reg_Result['reg_province'];  ?></span>
                        		</div> 
                        	</div>

                        </div>
						

				</div>
				</div>
            </div>
			
			</div>

<?php include '../common-ftns/suspend_reason_modal.php'; ?>


			<?php } ?>
	<?php include 'footer.php'; ?>

<script type="text/javascript">

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
        var sus=$(event.currentTarget).parents('.veiw_sus_appr');
	    var btn=$(event.currentTarget).attr('value');
        var u_id=$(event.currentTarget).attr('u_id');
        var id_val= $('#hidden-id_val').val();
        var name_val=$('#hidden-name_val').val();
        var u_type=$(event.currentTarget).attr('u_type');
	   $.ajax({
             
             type:"POST",
             url:"update-user_status.php",
             data:{'btn':btn,'u_id':u_id,'reason':text_area,'u_type':u_type},
             success:function(res){
                   
                   var data=JSON.parse(res);

                   if (data.status=="Suspended") {

                         sus.find('.sus').show();
                         sus.find('.appr').hide();
                          var st_val= sus.find('.sus').text();
        
                         $('#registor-form').find('.res_sup').text(text_area);
                       
                          $('.ho-1').attr('onclick',"document.location.href='hotels/hotel_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.ro-1').attr('onclick',"document.location.href='rooms/room_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.ban-1').attr('onclick',"document.location.href='banquets/banquet_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.con-1').attr('onclick',"document.location.href='conferences/conference_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.tor-1').attr('onclick',"document.location.href='tours/tour_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.ev-1').attr('onclick',"document.location.href='events/event_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.bo-1').attr('onclick',"document.location.href='blogger/blogListing.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                        
                           
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
       
        var sus=$(event.currentTarget).parents('.veiw_sus_appr');
	    var btn=$(event.currentTarget).attr('value');
        var u_id=$(event.currentTarget).attr('u_id');
        var id_val= $('#hidden-id_val').val();
        var name_val=$('#hidden-name_val').val();
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

                          $('.reason_sp').hide();
                          sus.find('.sus').hide();
                          sus.find('.appr').show();
                          sus.find('.pend').hide();

                          
                           sus.find('.approve').hide();
					      sus.find('.suspend').show();
					       var st_val= sus.find('.appr').text();

                          $('.ho-1').attr('onclick',"document.location.href='hotels/hotel_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.ro-1').attr('onclick',"document.location.href='rooms/room_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.ban-1').attr('onclick',"document.location.href='banquets/banquet_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.con-1').attr('onclick',"document.location.href='conferences/conference_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.tor-1').attr('onclick',"document.location.href='tours/tour_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.ev-1').attr('onclick',"document.location.href='events/event_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.bo-1').attr('onclick',"document.location.href='blogger/blogListing.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                         


                             
                        
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


	




	