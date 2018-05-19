<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>List of Users</title>
	<?php  include 'header.php'; 

	include '../common-sql.php';
	$vendorQuery=    'SELECT * FROM credentials where (user_type="vendor" OR user_type="blogger") ORDER BY user_id DESC ';
	 
          $vendor_resp =mysqli_query($conn,$vendorQuery)  or die(mysqli_error($conn));


	?>

				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../images/icon/dbc5.png" alt=""/>Users</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>

						</div>

				      <!--  <?php include '../common-ftns/filter-sus-app-pen.php'; ?> -->
                        <div class="row">
                        	<div class="col s3 search_flter">
						 		 <select onchange="filter_userType(event)" id="user_Type"  name="">
						 		 	  <option value="-1" selected="" >View all</option>
								      <option value="vendor">Vendor</option>
								      <option value="blogger">Blogger</option>
                                 </select>
						 	</div>
						 	<div class="col s3 search_flter">

						 		 <select onchange="myFunction_manage(event)" id="yourole"  name="">
						 		 	  <option value="" selected="" >View all</option>
								      <option value="Approved">Approved</option>
								      <option value="Suspended">Suspended</option>
								      <option value="Pending">Waiting Approval</option>
                                 </select>
						 	</div>
						 	<div class="col s4 search_field">	
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

										<!-- <td class="status_wrap sus" style="display: none;"><span class="db-not-success">Suspended</span></td> -->

										<?php }elseif ($result['user_status']=="Suspended") {?>

										<td class="status_wrap appr"><span class="db-not-success"><?php echo $result['user_status']; ?></span></td>
										<!-- <td class="status_wrap appr" style="display: none;"><span class="db-success">Approved</span></td> -->

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
                                     		<a  onclick="show_suspend(event)" u_id="<?php echo $result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;">Suspend</a>
                                     		<a  onclick="show_approve(event)"  u_id="<?php echo $result['user_id'] ?>" class="approve btn" value="Approved" style="display: none;">Approve</a>
                                     	
                                   <?php  }else{ ?>

                                    		<a href="#susp"  u_id="<?php echo $result['user_id'] ?>" class="suspend waves-effect waves-light btn modal-trigger" style="display: none;">Suspend</a>
                                    		<a  onclick="show_suspend(event)" u_id="<?php echo $result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;">Suspend</a>
                                     		<a  onclick="show_approve(event)"  u_id="<?php echo $result['user_id'] ?>" class="approve btn" value="Approved" >Approve</a>
 
                                   	         
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
	   $.ajax({
             
             type:"POST",
             url:"update-user_status.php",
             data:{'btn':btn,'u_id':u_id,'reason':text_area},
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
					      sus.find('.approve').hide();
					      sus.find('.suspend').show();
 	 
                   }
             }   
       
	   });
           

          	}

          	
   });

	 
 	 
}

/*Search filteration in manage vendor only against multiple users*/
function myFunction_manage(event) {

	if ($('#user_Type').val()=="-1") {

		var input=document.getElementById("mysearch");

		var filter=input.value;

		var trObj = $('#h_table tbody tr');
		$('#h_table tbody tr').hide();

		if (event.which==13 || event.type=="click" ) {

			$.each(trObj,function(k,value){

				if(value.innerHTML.toLowerCase().indexOf(filter) > -1){
					$(value).show();
				}
			});
// debugger;
}else if(event.type=="change"){


	filter=$('#yourole').val();
	
	$.each($('.appr'),function(k,value){

		console.log(value);

		if(value.innerHTML.indexOf(filter) > -1){

			$(value).parents('.tr-1').show();
		}
	});

}else{

	$.each(trObj,function(k,value){
		if(value.innerHTML.toLowerCase().indexOf(filter) > -1){
			$(value).show();
		}
	});

}

}else{

	childfilter();
}

}
function childfilter(){

	$('.'+$('#user_Type').val()+'_Approved').hide();
	$('.'+$('#user_Type').val()+'_Suspended').hide(); 
	$('.'+$('#user_Type').val()+'_Pending').hide();
	$('.'+$('#user_Type').val()+'_'+$('#yourole').val()).show();

	if ($('#yourole').val()=="") {

		$('.'+$('#user_Type').val()+'_Approved').show();
		$('.'+$('#user_Type').val()+'_Suspended').show(); 
		$('.'+$('#user_Type').val()+'_Pending').show();
	}

}

function filter_userType(event) {

	$('#h_table tbody tr').hide();
	var trObj = $('#h_table tbody tr');
	if(event.type=="change"){

   var filter=$('#user_Type').val(); 
   $.each($('.userType'),function(k,value){

   	if(value.innerHTML.indexOf(filter) > -1){

   		if ($(value).parents('.vendor')) {

   			$(value).parents('.vendor').show();
   		}
   		if($(value).parents('.blogger')){

   			$(value).parents('.blogger').show();	
   		}

   	}

   });


   if (filter=="-1") {

   	  $('.blogger_Approved').show();
	  $('.blogger_Suspended').show(); 
	  $('.blogger_Pending').show();
	  $('.vendor_Approved').show();
	  $('.vendor_Suspended').show(); 
	  $('.vendor_Pending').show();
   }

 
}
}
/*------End search filteration-------*/
</script>
    
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
</html>


	




	