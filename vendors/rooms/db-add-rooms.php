
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Add a Room</title>
	
	<?php 
	include '../../common-sql.php';
	include '../header.php'; 
    $userId= $_SESSION["user_id"];

$selectHotel = 'SELECT `hotel_name`,`hotel_id` FROM `hotel` WHERE `user_id`="'.$userId.'" ';

// echo $selectHotel;

$selectHotelQuery=mysqli_query($conn,$selectHotel) or die(mysqli_error($conn));
    ?>


					<div class="db-cent-3">
						<div class="db-cent-table db-com-table">
							<div class="db-title">
								<h3><img src="../../images/icon/dbc5.png" alt=""/> Add Rooms</h3>
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have8suffered alteration in some form</p>
							</div>

							<div class="db-profile-edit">
								<form class="col s12"  data-toggle="validator" id="room-form" role="form" action="room-post.php" method="POST" enctype="multipart/form-data">

									<?php

									if (mysqli_num_rows($selectHotelQuery) > 0) { ?>
									<div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select"  >
										<label class="col s12">Select Hotel</label>
										<select  class="hotelNames"  name="hotel_name" >
											<option value="">Select One</option>
											<?php

											while ($result=mysqli_fetch_assoc($selectHotelQuery)) { ?>

										<option name="" data-id="<?php echo $result['hotel_id']; ?>"  value="<?php echo $result['hotel_name'] ?>"><?php echo $result['hotel_name'] ?></option>
                                     <?php	
						}  ?>
       
                                    
					</select>

						  
				</div>
				<?php  }  ?>





				<div class="common-top">
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
					<input type="hidden" name="hotel_id" id="hotelId"> 
					<label class="col s4">Room Name </label>
					<div class="input-field col s12">
						<input type="text" value="" class="validate" name="room_name" required> </div>
					</div>
					<div>
						<label class="col s4">Number of Rooms</label>
						<div class="input-field col s12">
							<input type="number"   class="validate" name="room_nosroom" required> </div>
						</div>


						<div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select" id="rom-ser" >

							<label class="col s12">Room service</label>
							<select  class="" onchange="servicetiming(this)" name="room_service" required="">
								<option value="" disabled selected>Select One</option>
								<option value="yes">Yes</option>
								<option value="no">No</option>

							</select>
							
						</div>
						<div class="timing_wrap row" style="display: none;">
							<div class="col-md-6 " >
								<div class="with_24hour">
								<p class="pTAG">
									<input type="checkbox" class="filled-in" id="filled-in-24" name="room_24hour" />
									<label for="filled-in-24">24 Hour</label>
								</p>
							</div>
							</div>
							<div class="col-md-6 ">
							   <div class="selecthour">
								<label style="padding-bottom: 13px;">Select time</label>
								<input type="text" value="" class="timepicker" id="selecthour" name="room_selecthour">  
							 </div>
							</div>	
						</div>
						
						<div class="row common-top">           
							<div class=" col-md-6" >
								<label>Maximum adults allowed in one room</label>
								<input type="number" value="" class="input-field validate" name="room_maxadult" required>  
							</div>
							<div class=" col-md-6">
								<label >Extra mattress charges for adults</label>
								<input type="number" value="" class="input-field validate" name="room_matadult" required>  
							</div>
						</div>   

						<div class="row">           
							<div class=" col-md-6" >
								<label>Maximum children allowed in one room</label>
								<input type="number" value="" class="input-field validate" name="room_maxchild" required>  
							</div>
							<div class=" col-md-6">
								<label>Extra mattress charges for Children</label>
								<input type="number" value="" class="input-field validate" name="room_matchild" required>
							</div>
						</div> 						

						<div>
							<label class="col s4">Room Charges per night</label>
							<div class="input-field col s8">
								<input type="number"  class="validate" name="room_perni8" required> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Offer Discount (%)</label>
								<input type="number" name="room_offerdiscount" class="input-field validate offerDiscnt" >
							</div>
							<div class="col-md-6">
								<label>Expires on</label>
								<input type="text" id="expireDate" class="input-field expireDate" name="room_expireoffer">
							</div>
						</div>  

						<div class="imgVeiwinline" id="hotel_img_wrap" style="display: none;">
							<div class="row int_title"><label>Photos :</label></div>
							 
						</div>

						<div class="row common-top">
							<div class="">
								<!-- Modal Trigger -->
								<div class="col s1"></div>
								<a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-images" >Room Photos</a>
								<input type="hidden" name="common_image" id="img_ids">
							</div>
						</div>

						<div class="common-top clearfix">
                 
                  
                <label class="col s4">Room's Promotional Video (url)</label>
                <div class="input-field col s8">
                  <input type="text"  class="" name="common_video"  ></div>
                </div>
						<div class="common-top">
							<label class="col s4" style="margin-bottom: 10px;">Room Description</label>
							<textarea name="room_descrip" required></textarea>
						</div><br>


						<div class="common-top">
							<label class="col s4">Amenities:</label>

							<div class="chips chips-autocomplete"></div>
							<input type="hidden"  name="room_other" id="amenities-id">
						</div><br><br>


						<div id="dates_wrap">
							<label class="col s6">Unavailable in these days</label>
							<div class="row">
								


								<ul class="collapsible def-show-date" data-collapsible="accordion">
									<li>
										<div class="collapsible-header  active">Date</div>
										<div class="collapsible-body"> 
											<div class="row">
												<div class="col-md-6">
													<label>From</label>
													<input type="text" id="from" class="input-field from" name="book_fromdate[]">
												</div>
												<div class="col-md-6">
													<label>To</label>
													<input type="text" id="to" class="input-field to" name="book_todate[]"> 
												</div>
											</div>
										</div>
									</li>
								</ul>

							</div>
						</div>
						<div  class=" ">
							<a class="waves-effect waves-light btn " onclick="gen_dates_input(event)">Add More Dates</a>
						</div>
						<div class="row" >
                         	
						            <p class="pTAG">
						             <input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="room_inactive" />
						             <label for="filled-in-inactive">Inactive</label>
						            </p>
						             
         						</div>


						<div>
							<div class="input-field col s8">
								<input type="button" value="ADD" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn_room"> </div>
							</div>
						</form>
					</div>

				</div>

			</div>
		</div>  

		<!-- Modal Structure -->
		<div id="modal-images" class="modal modal-fixed-footer image_drop_down_modal_body common-img_wrap">
			<div class="modal-content">
				<div class="modal-header"><h2>Upload  Photos</h2></div>
				<iframe src="../up_load_singleimg.php" id="photo_iframe"></iframe>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat photo_done">Done</a>
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



   <?php include '../footer.php'; ?>
	<script src="../../js/room-js/room.js"></script>	

<script type="text/javascript">

$('#selecthour').pickatime();

$('#filled-in-24').click(function () {
    if ($(".with_24hour input:checkbox:checked").length > 0) {
           
           
           $('.selecthour').hide();
    }else{
    	$('.selecthour').show();

    	
    }
});

$('#selecthour').change(function () {
    if ($('.selecthour input').val()) {
           
           $('.with_24hour').hide();
    }else{
    	$('.with_24hour').show();

    	
    }
});

function servicetiming(that) {

	if (that.value == "yes") {

		$('.timing_wrap').show();
	}else{
		$('.timing_wrap').hide();
	}
	// body...
}

tinymce.init({ selector:'textarea' });


$('.chips-autocomplete').material_chip({

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



</script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>