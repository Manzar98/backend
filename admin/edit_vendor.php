<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>Edit-Vendor</title>
<?php include 'header.php'; 
   
   include"../common-apis/api.php";


    $reg_Query= select('credentials',array("user_id"=>$_GET['id']));

    $reg_hotel=select('hotel',array("user_id"=>$_GET['id']));
    $reg_room=select('room',array("user_id"=>$_GET['id']));
    $reg_banquet=select('banquet',array("user_id"=>$_GET['id']));
    $reg_conference=select('conference',array("user_id"=>$_GET['id']));
    $reg_tour=select('tour',array("user_id"=>$_GET['id']));
    $reg_event=select('event',array("user_id"=>$_GET['id']));



?>
				<?php   
          
          while ($reg_Result=mysqli_fetch_assoc($reg_Query)) { 
                     $pro_img=substr($reg_Result['reg_photo'],3) ;  ?>
				<div class="db-profile"> <img src="<?php echo $pro_img; ?>" alt="">
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
					<table class="last-lgon_tbl">
						<thead>
							<th>Last Login</th>
						</thead>
						<tbody>
							<td><?php echo date_format($lastlogin, 'd-m-Y '); ?></td>
						</tbody>
					</table>
					<table class="responsive-table profle-forms-reocrds-tbl" >
						<thead>
							<tr>
								<th>Age</th>
								<th class="TT ho-1" onClick="document.location.href='hotels/hotel_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">Hotels</th>
								<th class="TT ro-1" onClick="document.location.href='rooms/room_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">Rooms</th>
								<th class="TT ban-1" onClick="document.location.href='banquets/banquet_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">Banquets</th>
								<th class="TT con-1" onClick="document.location.href='conferences/conference_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">Conferences</th>
								<th class="TT tor-1" onClick="document.location.href='tours/tour_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">Tours</th>
								<th class="TT ev-1" onClick="document.location.href='events/event_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">Events</th>
								<th>Join Date</th>

							</tr>
						</thead>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $age; ?></td>
								
								<?php if (mysqli_num_rows($reg_hotel)< 1) { ?>
							     <td class="TT ho-1" onClick="document.location.href='hotels/hotel_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">0</td>
								<?php }else{ ?>
								   <td class="TT ho-1" onClick="document.location.href='hotels/hotel_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'"><?php echo mysqli_num_rows($reg_hotel); ?></td>
								<?php } ?>
								
								<?php if (mysqli_num_rows($reg_room)< 1) { ?>
								<td class="TT ro-1" onClick="document.location.href='rooms/room_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">0</td>
								<?php }else{ ?>
								<td class="TT ro-1" onClick="document.location.href='rooms/room_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'"><?php echo mysqli_num_rows($reg_room); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_banquet)< 1) { ?>
								<td class="TT ban-1" onClick="document.location.href='banquets/banquet_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">0</td>
								<?php }else{ ?>
								<td class="TT ban-1" onClick="document.location.href='banquets/banquet_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'"><?php echo mysqli_num_rows($reg_banquet); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_conference)< 1) { ?>
								<td class="TT con-1" onClick="document.location.href='conferences/conference_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">0</td>
								<?php }else{ ?>
								<td class="TT con-1" onClick="document.location.href='conferences/conference_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'"><?php echo mysqli_num_rows($reg_conference); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_tour)< 1) { ?>
								<td class="TT tor-1" onClick="document.location.href='tours/tour_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">0</td>
								<?php }else{ ?>
								<td class="TT tor-1" onClick="document.location.href='tours/tour_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'"><?php echo mysqli_num_rows($reg_tour); ?></td>
								<?php } ?>

								<?php if (mysqli_num_rows($reg_event)< 1) { ?>
								<td class="TT ev-1" onClick="document.location.href='events/event_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'">0</td>
								<?php }else{ ?>
								<td class="TT ev-1" onClick="document.location.href='events/event_list.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $reg_Result['reg_name']; ?>&status=<?php echo $reg_Result['user_status'];?>'"><?php echo mysqli_num_rows($reg_event); ?></td>
								<?php } ?>

								<td><?php echo $reg_Result['reg_joinD']; ?></td>
								
							</tr>
						</tbody>
					</table>
					
				</div>
				 	<div class="db-profile-edit">

					<form class="col s12" action="registration-update.php" method="post" role="form" id="registor-form">
						<input type="hidden" name="user_id" value="<?php echo $_GET['id']; ?>">
						<div class="row">
						<div class="col-md-6">
							<label >First Name</label>
							<div class="input-field ">
								<input type="text" value="<?php echo $reg_Result['reg_name'];  ?>" id="reg_name" name="reg_name" class="validate"> </div>
						</div>
						<div class="col-md-6">
							<label>Last Name</label>
							<div class="input-field">
								<input type="text" value="<?php echo $reg_Result['reg_lstname'];  ?>" id="reg_lstname" name="reg_lstname" class="validate"> </div>
						</div>
						</div>
						<div>
							<label class="col s4">Email Address</label>
							<div class="input-field col s8">
								<input type="email" value="<?php echo $reg_Result['reg_email'];  ?>" id="reg_email" name="reg_email" class="validate"> </div>
						</div>
                         
                        <div class="row">

                         	<div class="col-md-6">
                         		<label>Mobile Number</label>
                         		<div class="input-field ">
                         		   <input type="number" id="reg_phone" name="reg_phone" class="validate" value="<?php echo $reg_Result['reg_phone'];  ?>">
                         		</div>   
                         	</div>
                         	<div class="col-md-6">
                         		<label>Postal Address</label>
                         		<div class="input-field ">
                         		   <input type="text" id="reg_postal" name="reg_postal" class="validate" value="<?php echo $reg_Result['reg_postal'];  ?>">
                         	    </div>
                         	</div>
   
                        </div>
                        <div class="row">
                        	
                        	<div class="col-md-6">
                        		<label>City</label>
                        		<div class="input-field ">
                        		   <input type="text" name="reg_city" id="reg_city" class="validate" value="<?php echo $reg_Result['reg_city'];  ?>">
                        		</div>   
                        	</div>
                        	<div class="col-md-6">
                        		<label>Province</label>
                        	    <div class="input-field ">
                        		   <input type="text" name="reg_province" id="reg_province" class="validate" value="<?php echo $reg_Result['reg_province'];  ?>">
                        		</div> 
                        	</div>

                        </div>
						<div>
							<label class="col s4">Country</label>
							<div class="input-field col s8">
								<input type="text" value="<?php echo $reg_Result['reg_country'];  ?>" name="reg_country" id="reg_country" class="validate"> </div>
						</div>

				   <div class="veiw_sus_appr">
                      <div class="row" >	  
                        <div class="col-md-6 sus_appr" style="margin-left: 10px;">
                             
                                    	<?php if ($reg_Result['user_status']=="Approved") { ?>

                                     		<a  href="#susp" u_id="<?php echo $reg_Result['user_id'] ?>" class="suspend waves-effect waves-light btn modal-trigger spc-modal" value="Suspended" >Suspend</a>
                                     		<a  onclick="show_suspend(event)" u_id="<?php echo $reg_Result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;">Suspend</a>
                                     		<a  onclick="show_approve(event)"  u_id="<?php echo $reg_Result['user_id'] ?>" class="approve btn spc-modal" value="Approved" style="display: none;">Approve</a>
                                     	
                                   <?php  }else{ ?>

                                    		<a href="#susp"  u_id="<?php echo $reg_Result['user_id'] ?>" class="suspend waves-effect waves-light btn modal-trigger spc-modal" style="display: none;">Suspend</a>
                                    		<a  onclick="show_suspend(event)" u_id="<?php echo $reg_Result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;">Suspend</a>
                                     		<a  onclick="show_approve(event)"  u_id="<?php echo $reg_Result['user_id'] ?>" class="approve btn spc-modal" value="Approved" >Approve</a>
 
                                   	         
                                 <?php   } ?>      
                        </div>
                         <div >
								<a class="waves-effect waves-light btn modal-trigger spc-modal " href="#modal-reset" >Reset Password</a>
								
					    </div>
					   </div>

					  
                        
                    </div>
					    
						
							

					
						<input type="hidden" name="profile_img" id="profile_img">
						<input type="hidden" name="coverimg" id="coverimg">
					</form>

					<input type="hidden"  value="<?php echo $reg_Result['reg_name'];?>" id=hidden-name_val>
					<input type="hidden"  value="<?php echo $_GET['id']?>" id=hidden-id_val>
					<div class="row">
						<form>
						   <div class="col-md-6">
							<div class="file-field input-field">
								<div class="btn" id="pro-file-upload"> <span>Cover photo</span>
									<input type="file" id="sortpicture" name="sortpic" onchange="readcover(this);"> </div>
								<div class="file-path-wrapper" >
									<input class="file-path validate" type="hidden" id="check_cover">
									 </div>
							</div>
						  </div>
						  <?php 
                             $cover=substr($reg_Result['reg_cover'],3) ;
				             
						  ?>
						  <div class="col-md-6" >
						  	<img id="preveiw_cover"  src="<?php echo $cover; ?>" alt="your image" style="width: 150px;height: 70px; margin-top: 10px;" />
						  	   <img id="cover" src="#" alt="your image" style="display: none;"/>
						  </div>
						  </form>
						</div>
					

                       <div class="row">
						<form >
							<div class="col-md-6">
								<div class="file-field input-field">
								    <div class="btn" id="pro-file-upload"> <span>Profile photo</span>
										<input type="file" id="upload">	

									</div>

								</div>
							</div>
						    <div class="col-md-6" >
						    	<img src="<?php echo $pro_img; ?>" id="preveiw_image" width="50%" alt="">
								  	     <div id="upload-demo" style="width:350px">
								  	     	
								  	     </div>
								  	     <button id="upload-demo-btn"  class="btn upload-result">Crop Image</button>
								  	     
								  	     <div id="upload-demo-i">
								  	     	
								  	     </div>
							</div>
							</form>
					   </div>
					<div>
							<div class="input-field col s8">
								<input type="button" value="Update" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn_registor_update"> </div>
						</div>

				</div>

			
			</div>


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

<!-- Modal Structure -->
<div id="modal-reset" class="modal modal-fixed-footer image_drop_down_modal_body common-img_wrap">
  <div class="modal-content">
  	<div class="modal-header"><h2>Reset Password</h2></div>
      <form id="password-wrap" action="updatepassword.php" method="post" role="form" id="registor-form">
                    <div>
							<label class="col s4">Old Password</label>
							<div class="input-field col s6">
								<input type="password" id="old-passcode" name="old-password" class="validate"> </div>
						</div>
						<div>
							<label class="col s4">New Password</label>
							<div class="input-field col s6">
								<input type="password"  id="new-passcode" name="new_password" class="validate"> </div>
						</div>
						<div>
							<label class="col s4">Confrom Password</label>
							<div class="input-field col s6">
								<input type="password"  id="reg_conpassword" name="reg_conpassword" class="validate"> </div>
						</div>
						<input type="hidden"  id="check_Oldpass" value="<?php echo $_SESSION['reg_password']; ?>" class="validate">
						<div class="input-field col s8">
								<input type="button" value="Update" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn_password_update"> </div>
                    </form>
   <div class="modal-footer">
     <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat password_done">Done</a>
   </div>
 </div>
</div>

 <!-- Modal Structure -->
  <div id="loader" class="modal">
    <div class="modal-content">
      <div class="col-md-5"></div>
         <div class="preloader-wrapper big active" style="top: 90px;">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-red">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-yellow">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-green">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

    </div>
    <div style="text-align: center; padding-top: 170px;">
    <span>Submitting.....</span>
    </div>
    </div>
    
  </div>
		

			<?php } ?>

		<?php include 'footer.php'; ?>;
		<script src="../js/croppie.js"></script>
 <script src="../js/registration-js/registration.js"></script>
    <script src="../js/method-js/updatepassword.js"></script>
    <script type="text/javascript">
    	$('#modal-reset').modal({dismissible: false});
		
/*=======================
  Profile image reader
=========================*/  

    $('#upload-demo').hide();
    $('#upload-demo-i').hide();
    $('#upload-demo-btn').hide();
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
});


$('#upload').on('change', function () { 
  $('#upload-demo').show();
  $('#upload-demo-btn').show();
  var reader = new FileReader();
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function(){
      	$('#preveiw_image').remove();
        console.log('jQuery bind complete');
      });
      
    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-result').on('click', function (ev) {

  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }) .then(function (resp) {

          
    $.ajax({

      type: "POST",
      url: "registration/profile_img_post.php",     
      data: {"image":resp},
      success: function (data) {
               
               $('#upload-demo').hide();
               $('#upload-demo-btn').hide();
               $("#upload-demo-i").show();
                html = '<img src="' + resp + '" />';
               $("#upload-demo-i").html(html);
               $('#profile_img').val(data);

          
       
        // debugger;
      }
    });
   });
});

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

	   $.ajax({
             
             type:"POST",
             url:"update-user_status.php",
             data:{'btn':btn,'u_id':u_id,'reason':text_area},
             success:function(res){
                   
                   var data=JSON.parse(res);

                   if (data.status=="Suspended") {

                         // sus.find('.sus').show();
                         // sus.find('.appr').hide();
                         $('#registor-form').find('.res_sup').text(text_area);

                          var st_val= data.status;

                          $('.ho-1').attr('onclick',"document.location.href='hotels/hotel_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.ro-1').attr('onclick',"document.location.href='rooms/room_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.ban-1').attr('onclick',"document.location.href='banquets/banquet_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.con-1').attr('onclick',"document.location.href='conferences/conference_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.tor-1').attr('onclick',"document.location.href='tours/tour_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.ev-1').attr('onclick',"document.location.href='events/event_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
					    
                            
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

                          $('.reason_sp').hide();
                          // sus.find('.sus').hide();
                          // sus.find('.appr').show();
 
                            sus.find('.approve').hide();
					      sus.find('.suspend').show();

					       var st_val= data.status;

                          $('.ho-1').attr('onclick',"document.location.href='hotels/hotel_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.ro-1').attr('onclick',"document.location.href='rooms/room_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.ban-1').attr('onclick',"document.location.href='banquets/banquet_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.con-1').attr('onclick',"document.location.href='conferences/conference_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.tor-1').attr('onclick',"document.location.href='tours/tour_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
                          $('.ev-1').attr('onclick',"document.location.href='events/event_list.php?id="+id_val+"&name="+name_val+"&status="+st_val+"'");
					    
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


	




	