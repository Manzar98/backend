<?php
include '../../common-apis/reg-api.php';
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>

	
	<title>Edit Room</title>


	<?php include '../header_inner_folder.php';
	include '../../common-ftns/adminAmenities.php'; 
	$userId= $_GET["user_id"];
	$RoomID=  $_GET['id'];
	$HotelID= $_GET['h_id'];
	$vendorName=$_GET['name'];
	$vendorStatus=$_GET['status'];
	$selectHotel = 'SELECT `hotel_name`,`hotel_id` FROM `hotel` WHERE `user_id`="'.$userId.'"';

	$selectHotelQuery=mysqli_query($conn,$selectHotel) or die(mysqli_error($conn));

	$editroomQuery=select('room',array('hotel_id'=>$HotelID,'room_id'=>$RoomID));

	$global_room_id="";

	while ($resultRoom=mysqli_fetch_assoc($editroomQuery)){    


		$editroomImgQuery=select('common_imagevideo',array('room_id'=>$resultRoom['room_id']));
		$editroomDateQuery=select('common_bookdates', array('room_id'=>$resultRoom['room_id']));?>

		<div class="db-cent-3">
			<div class="db-cent-table db-com-table">
				<div class="db-title">
					<h3><img src="../../images/icon/dbc5.png" alt=""/> Edit Rooms</h3>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have8suffered alteration in some form</p>
				</div>

				<div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="room-form" role="form" action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="vendorStatus" value="<?php echo $vendorStatus;  ?>">
						<input type="hidden" name="vendorName" value="<?php echo $vendorName;  ?>">
						<?php

						if (mysqli_num_rows($selectHotelQuery) > 0) { ?>
							<div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select"  >
								<!-- <label class="col s12">Select Hotel</label> -->
								<select  class="hotelNames room_HotelName" name="hotel_name" >
									<option value="">Select One</option>
									<option selected="" value="<?php echo $resultRoom['hotel_name'] ;   ?>"><?php echo $resultRoom['hotel_name'] ;   ?></option> 
									<?php

									while ($result=mysqli_fetch_assoc($selectHotelQuery)) { ?>


										<option name="" value="<?php echo $result['hotel_name'] ?>" ><?php echo $result['hotel_name'] ?></option>


										<?php	
									}  ?>
								</select>
							</div>
						<?php  }  ?>




						<input type="hidden" name="hotel_id" value="<?php echo $resultRoom['hotel_id']; ?>" >
						<?php $global_room_id = $resultRoom['room_id']; ?>
						<input type="hidden" name="room_id" value="<?php echo $resultRoom['room_id'] ?>"> 
						<input type="hidden" name="user_id" value="<?php echo $userId ?>">
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
									<select  class="room-serve" name="room_service" onchange="servicetiming(this)" >
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

								<div class="timing_wrap row" style="display: none;">
									<div class="col-md-6 " >
										<div class="with_24hour">
											<p class="pTAG">
												<input type="hidden" name="room_24hour" id="room_24hour">
												<?php if ($resultRoom['room_24hour']=='on') {?>

													<input type="checkbox" class="filled-in" id="filled-in-24"  checked="" />
													<label for="filled-in-24">24 Hour</label>

												<?php }else{?>

													<input type="checkbox" class="filled-in" id="filled-in-24"  />
													<label for="filled-in-24">24 Hour</label>
												<?php } ?>

											</p>
										</div>
									</div>
									<div class="col-md-6 ">
										<div class="selecthour">
											<label style="padding-bottom: 13px;">Select time</label>
											<input type="text" class="timepicker" id="selecthour" name="room_selecthour" value="<?php echo $resultRoom['room_selecthour'] ;   ?>" >  
										</div>
									</div>	
								</div>

								<div class="row common-top">           
									<div class=" col-md-6" >
										<label>Maximum adults allowed in one room</label>
										<input type="number"  class="input-field validate" name="room_maxadult" required value="<?php echo $resultRoom['room_maxadult'] ;   ?>">  
									</div>
									<div class=" col-md-6">
										<label class="common-bottom">Extra mattress charges for adults</label>
										<input type="number"  class="input-field validate" name="room_matadult" required value="<?php echo $resultRoom['room_matadult'] ;   ?>">  
									</div>
								</div>   

								<div class="row">           
									<div class=" col-md-6" >
										<label>Maximum children allowed in one room</label>
										<input type="number"  class="input-field validate" name="room_maxchild" required value="<?php echo $resultRoom['room_maxchild'] ;   ?>">  
									</div>
									<div class=" col-md-6">
										<label class="common-bottom">Extra mattress charges for Children</label>
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
									<div class="row int_title"><label>Photos :</label></div>
									<?php
									$photocounter=0; 
									$hidetitle=""; 
									while ($imgResult=mysqli_fetch_assoc($editroomImgQuery)) { 


										if (!empty($imgResult['common_image'])) {
                                                          // if ($photocounter==0) { ?>
                                                          	<!-- <div class="row int_title"><label>Photos :</label></div> -->
													<?php //$photocounter++; }
													?>

													<div class="imgeWrap" style="float: left; padding-right:5px; padding-bottom:5px;">
														<a class="deletIMG" onclick="deletIMG(event)"  data-value="<?php echo $imgResult['common_imgvideo_id']?>" data-img="<?php echo $imgResult['common_image'] ?>" ><i class="fa fa-times" aria-hidden="true"></i></a>
														<img src="../<?php echo $imgResult['common_image']  ?>" style="width: 150px; height: 100px;" class="materialboxed">
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

										<div class="common-top clearfix">


											<label class="col s4">Room's Promotional Video (url)</label>
											<div class="input-field col s8">
												<input type="text"  class="" name="common_video"  ></div>
											</div>
											<div class="common-top">
												<label class="col s4" style="margin-bottom: 10px;">Room Description</label>
												<textarea name="room_descrip" required><?php echo $resultRoom['room_descrip']  ?></textarea>
											</div><br>
											<div class="row common-top">
												<?php callingAmenity_admin("room"); ?>
											</div>

											<div class="common-top">
												<label class="col s4">Amenities:</label>

												<div class="chips chips-autocomplete"></div>
												<input type="hidden"  name="room_other" id="amenities-id"  value="<?php echo $resultRoom['room_other'] ?>">
											</div>

											<div id="dates_wrap">
												<label class="col s6">Unavailable in these days</label>
												<div class="row">



													<ul class="collapsible def-show-date editroom" data-collapsible="accordion">
														<?php  $i=0;

														if (mysqli_num_rows($editroomDateQuery) > 0) { 



															while ($resultRoomdate=mysqli_fetch_assoc($editroomDateQuery)) {
																?> 

																<li id="gen-date-wrap">
																	<div class="collapsible-header  active">Date<a class="closedate" ><i class="fa fa-times" aria-hidden="true"></i></a>
																		<input type="hidden" name="common_bokdate_id[]" value="<?php echo $resultRoomdate['common_bokdate_id'] ?>" class="dateWrap_id">
																	</div>
																	<div class="collapsible-body"> 
																		<div class="row">
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
																<?php $i++; } 
															}else{ ?>
																<li class="newLI">
																	<div class="collapsible-header  active">Date</div>
																	<div class="collapsible-body"> 
																		<div class="row">
																			<input type="hidden" name="common_bokdate_id[]" id="date_id">
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

																<?php
															}
															?>
														</ul>

													</div>
												</div>


												<div  class=" ">
													<a class="waves-effect waves-light btn " onclick="gen_dates_input(event,'edit')">Add More Dates</a>
												</div>
												<?php   
                       // print_r($resultRoom);
											} ?>

											<div  class=" ">
												<a class="waves-effect waves-light btn " id="ajaxbtn" >Ajax</a>
											</div>



											<div>
												<div class="input-field col s8">
													<input type="button" value="Update" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
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
									<iframe src="../up_load_singleimg.php?p=edit&t=room&r_id=<?php echo $global_room_id; ?>" id="photo_iframe"></iframe>
									<div class="modal-footer">
										<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat photo_done">Done</a>
									</div>
								</div>
							</div>

							<?php include '../../common-ftns/submitting-modal.php'; ?>
							<?php  include"../footer_inner_folder.php";  ?>
							<script src="../../js/room-js/room.js"></script>
							<script src="../../js/method-js/adminAmenity.js"></script>
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

if ($('.room-serve :selected').text() == "Yes"){

	$('.timing_wrap').show();
}else{
	$('.timing_wrap').hide();
}


if ($(".with_24hour input:checkbox:checked").length > 0){

	$('.selecthour').hide();
}else{

	$('.selecthour').show();
}


if ($('.selecthour input').val()) {

	$('.with_24hour').hide();
}else{
	$('.with_24hour').show();


}




tinymce.init({ selector:'textarea' });
$(document).ready(function(){

	/*==============Ajax Function Defination (For Dates)==============*/
	$('#ajaxbtn').click(function(){

		var dataObj = {};

		$('.newLI input').each(function(key,value){
			if(value.id.indexOf("from") > -1){
				dataObj['book_fromdate'] = $(value).val();
			}
			if(value.id.indexOf("to") > -1){
				dataObj['book_todate'] = $(value).val();
			}
		});
		dataObj['room_id'] = $('input[name=room_id]').val();
		dataObj['form_date_type'] = "room";

		console.log(dataObj);


		$.ajax({


			type:"POST",
			url:"../rooms/insert_room.php",
			data: dataObj,
			success:function(data) {
				var response = JSON.parse(data);
				console.log(response);
				if(response.message == "success"){
					$('.newLI #date_id').val(response.id);
					$('.newLI').removeClass('newLI');
				}
			}


		})

	});
	/*==============End Ajax Function Defination==============*/

	var updated_amLst=[];
	var ameinty_obj=[];
	var amenity= $('#amenities-id').val().split(",");
	var amenityLst_admin=$('#amenityLst_admin').val().split(",");

	for (var i = 0; i < amenity.length; i++) {
        // console.log(amenity[i]);
        if ($('#amenityLst_admin').val().indexOf(amenity[i])== -1) {

        	ameinty_obj.push({"tag":amenity[i]});

        }else{
        	updated_amLst.push(amenity[i])
        	$('#updatedAmenityLst_admin').val(updated_amLst.toString());
        }

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

    var updatedSplitAm=$('#updatedAmenityLst_admin').val().split(',');
    $.each(updatedSplitAm,function(k,v){

    	$('.admin_amenity[value="'+v+'"]').prop('checked', true);

    })

});
</script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>