<?php
 include '../common-apis/api.php';

     $RoomID=  $_GET['id'];

     $HotelID= $_GET['h_id'];

   $selectHotel = 'SELECT `hotel_name` FROM `hotel` WHERE `user_id`=2 ';

   $selectHotelQuery=mysqli_query($conn,$selectHotel) or die(mysqli_error($conn));

   $editroomQuery=select('room',array('hotel_id'=>$HotelID,'room_id'=>$RoomID));
   
?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>

	<?php   while ($resultRoom=mysqli_fetch_assoc($editroomQuery)){    


	   $editroomImgQuery=select('common_imagevideo',array('room_id'=>$resultRoom['room_id']));
       $editroomDateQuery=select('common_bookdates', array('room_id'=>$resultRoom['room_id']));
   ?>
	<title>Edit Room</title>


<?php include '../header.php'; ?>


<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
						<div class="db-cent-table db-com-table">
							<div class="db-title">
								<h3><img src="../images/icon/dbc5.png" alt=""/> Edit Rooms</h3>
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have8suffered alteration in some form</p>
							</div>

							<div class="db-profile-edit">
								<form class="col s12"  data-toggle="validator" id="room-form" role="form" action="" method="POST" enctype="multipart/form-data">

									<?php

									if (mysqli_num_rows($selectHotelQuery) > 0) { ?>
									<div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select"  >
										<label class="col s12">Select Hotel</label>
										<select  class="" name="hotel_name" >
											<option value="">Select One</option>
											<option selected="" value="<?php echo $resultRoom['hotel_name'] ;   ?>"><?php echo $resultRoom['hotel_name'] ;   ?></option>
											<?php

											while ($result=mysqli_fetch_assoc($selectHotelQuery)) { ?>


											<option name="" value="<?php echo $result['hotel_name'] ?>"><?php echo $result['hotel_name'] ?></option>


						    <?php	# code...
						}  ?>
					</select>
				</div>
				<?php  }  ?>




                 <input type="hidden" name="hotel_id" value="<?php echo $resultRoom['hotel_id']  ?>">
                 <input type="hidden" name="room_id" value="<?php echo $resultRoom['room_id'] ?>"> 
				<div class="common-top">
					<label class="col s4">Room Name </label>
					<div class="input-field col s12">
						<input type="text" value="<?php echo $resultRoom['room_name'] ;   ?>" class="validate" name="room_name" required> </div>
					</div>
					<div>
						<label class="col s4">Number of Rooms</label>
						<div class="input-field col s12">
							<input type="number"   class="validate" name="room_nosroom" required value="<?php echo $resultRoom['room_nosroom'] ;   ?>"> </div>
						</div>


						<div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select" id="rom-ser" >

							<label class="col s12">Room service</label>
							<select  class="" name="room_service" >
								<?php if ($resultRoom['room_service']== "") { ?>

									<option value="" disabled selected>Select One</option>
								    <option value="yes">Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resultRoom['room_service']== "yes") {?>
								
								    <option value="" disabled >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php }elseif ($resultRoom['room_service']== "no") { ?>
								     
								    <option value="" disabled >Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" selected>No</option>

					        <?php	}  ?>
								

							</select>
							
						</div>
						
						<div class="row common-top">           
							<div class=" col-md-6" >
								<label>Maximum adults allowed in one room</label>
								<input type="number"  class="input-field validate" name="room_maxadult" required value="<?php echo $resultRoom['room_maxadult'] ;   ?>">  
							</div>
							<div class=" col-md-6">
								<label>Extra mattress charges for adults</label>
								<input type="number"  class="input-field validate" name="room_matadult" required value="<?php echo $resultRoom['room_matadult'] ;   ?>">  
							</div>
						</div>   

						<div class="row">           
							<div class=" col-md-6" >
								<label>Maximum children allowed in one room</label>
								<input type="number"  class="input-field validate" name="room_maxchild" required value="<?php echo $resultRoom['room_maxchild'] ;   ?>">  
							</div>
							<div class=" col-md-6">
								<label>Extra mattress charges for Children</label>
								<input type="number"  class="input-field validate" name="room_matchild" required value="<?php echo $resultRoom['room_matchild'] ;   ?>">
							</div>
						</div> 						

						<div>
							<label class="col s4">Room Charges per night</label>
							<div class="input-field col s8">
								<input type="number"  class="validate" name="room_perni8" required value="<?php echo $resultRoom['room_perni8'] ;   ?>"> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Offer Discount (%)</label>
								<input type="number" name="room_offerdiscount" class="input-field validate" value="<?php echo $resultRoom['room_offerdiscount'] ;   ?>">
							</div>
							<div class="col-md-6">
								<label>Expires on</label>
								<input type="text" id="expireDate" class="input-field from" name="room_expireoffer" value="<?php echo $resultRoom['room_expireoffer'] ;   ?>">
							</div>
						</div>  
                       
                       	<div class="imgVeiwinline row" id="hotel_img_wrap">
												<?php

												while ($imgResult=mysqli_fetch_assoc($editroomImgQuery)) {


													if (!empty($imgResult['common_image'])) {?>
													<div class="imgeWrap">
														<a class="deletIMG" onclick="deletIMG(event)"  data-value="<?php echo $imgResult['common_imgvideo_id']?>" data-img="<?php echo $imgResult['common_image'] ?>" ><i class="fa fa-times" aria-hidden="true"></i></a>
														<img src="../<?php echo $imgResult['common_image']  ?>" width="150" class="materialboxed">
													</div>&nbsp;&nbsp;


													<?php } ?>




													<?php	}

													?>
												</div>
						

						<div class="row common-top">
							<div class="">
								<!-- Modal Trigger -->
								<div class="col s1"></div>
								<a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-images" >Room Photos</a>
								<input type="hidden" name="common_image" id="img_ids">
							</div>
						</div>

						<div class="row  common-top clearfix">

							<div class="col s6 dumi_vid_btn" id="pro-file-upload"> <span>ROOM's PROMOTIONAL VIDEO</span></div>
							<input type="text" placeholder="Upload Promotional video URL" name="common_video" class="input-field validate col s5 dumi_vid_inpt" required>
						</div>
						<div class="common-top">
							<label class="col s4" style="margin-bottom: 10px;">Room Description</label>
							<textarea name="room_descrip" required><?php echo $resultRoom['room_descrip']  ?></textarea>
						</div><br>


						<div class="common-top">
							<label class="col s4">Amenities:</label>

							<div class="chips chips-autocomplete"></div>
							<input type="hidden"  name="room_other" id="amenities-id"  value="<?php echo $resultRoom['room_other'] ?>">
						</div>

						<div id="dates_wrap">
							<label class="col s6">Unavailable in these days</label>
							<div class="row">
								


								<ul class="collapsible def-show-date" data-collapsible="accordion">
									<?php  $i=0;
									while ($resultRoomdate=mysqli_fetch_assoc($editroomDateQuery)){ ?>  
									<li>
										<div class="collapsible-header  active">Date</div>
										<div class="collapsible-body"> 
											<div class="row">
												<input type="hidden" name="common_bokdate_id[]" value="<?php echo $resultRoomdate['common_bokdate_id'] ?>">
												<div class="col-md-6">
													<label>From</label>
													<input type="text" id="from-<?php echo $i+1; ?>" class="input-field from" name="book_fromdate[]" value="<?php echo $resultRoomdate['book_fromdate'] ;   ?>" >
												</div>
												<div class="col-md-6">
													<label>To</label>
													<input type="text" id="to-<?php echo $i+1; ?>" class="input-field to" name="book_todate[]" value="<?php echo $resultRoomdate['book_todate'] ;   ?>"> 
												</div>
											</div>
										</div>
									</li>
									<?php $i++; } ?>
								</ul>

							</div>
						</div>
						<div  class=" ">
							<a class="waves-effect waves-light btn " onclick="gen_dates_input(event)">Add More Dates</a>
						</div>

                       <?php   
                       // print_r($resultRoom);
   } ?>
						<div>
							<div class="input-field col s8">
								<input type="button" value="ADD" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
							</div>
						</form>
					</div>

				</div>

			</div>
			</div>

		<!-- Modal Structure -->
		<div id="modal-images" class="modal modal-fixed-footer image_drop_down_modal_body">
			<div class="modal-content">
				<div class="modal-header"><h2>Upload  Photos</h2></div>
				<iframe src="../up_load_singleimg.php"></iframe>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Done</a>
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



		   <?php  include"../footer.php";  ?>



<script src="../js/room-js/room.js"></script>
		   <script type="text/javascript">
							tinymce.init({ selector:'textarea' });



							$(document).ready(function(){

								$('#pro-sub-btn').click(function(){
// debugger;
	var isFormValidated = true;
	$.each($('#room-form .is_validate'),function(key,val){
		if(!val.value){
			isFormValidated = false;
			console.log(val);
			$(val).addClass('error');	
		}else{
	 			// debugger;
	 			$(val).removeClass('error');
	 		}
	 	});
	// $.each($('#room-form .is_validate_select'),function(key,val){
	// 		if(!$(val).find('select').val()){
	// 			isFormValidated = false;
	// 			console.log(val);
	// 			$(val).find('.select-wrapper').addClass('error');

	// 		}else{
	// 			// debugger;
	// 			$(val).find('.select-wrapper').removeClass('error');
	// 		}
	// });


	if(isFormValidated){
		console.log('TIme to submit form');
		// $("#room-form").submit();
	}else{
		console.log('There is an error');
	}
})


var ameinty_obj=[];
var amenity= $('#amenities-id').val().split(",");

for (var i = 0; i < amenity.length; i++) {
	      // console.log(amenity[i]);
	      ameinty_obj.push({"tag":amenity[i]});
}


$('.chips-autocomplete').material_chip({
      data: ameinty_obj,

	autocompleteOptions: {
		data: {
			'Wifi': null,
			'Swimming Pool': null,
			'Room service': null,
			'Restaurant': null
		},
		limit: Infinity,
		minLength: 1
	}
});


	$("#room-form").validate({



		errorElement : 'div',
		errorPlacement: function(error, element) {


        	// debugger;
        	console.log(element);
        	var placement = $(element).data('error');

        	console.log(placement);
        	console.log(error);
        	if (placement) {
        		$(placement).append(error)
        	} else {
        		error.insertAfter(element);
        	}
        }
    });


															});
														</script>
													</body>


													<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
													</html>