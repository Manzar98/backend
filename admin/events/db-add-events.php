<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Add an Event </title>


	<?php  
	include '../../common-sql.php';
	include"../header_inner_folder.php";  


	$userId= $_GET["user_id"];
	$vendorName=$_GET['name'];
	$vendorStatus=$_GET['status'];
	$selectHotel = 'SELECT `hotel_name`,`hotel_id`  FROM `hotel` WHERE `user_id`="'.$userId.'" ';


	$selectHotelQuery=mysqli_query($conn,$selectHotel) or die(mysqli_error($conn));



	?>

	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<div class="db-title">
				<h3><img src="../../images/icon/dbc5.png" alt=""/> Add Event Package</h3>
				<p>Fill out the form below to add a new Event.</p>
			</div>
			
			<div class="db-profile-edit">
				<form class="col s12"  data-toggle="validator" id="event-form" role="form" action="event-post.php" method="POST" enctype="multipart/form-data">

					<input type="hidden" name="vendorStatus" value="<?php echo $vendorStatus;  ?>">
					<input type="hidden" name="vendorName" value="<?php echo $vendorName;  ?>">
					<input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">

					<div class="common-top">
						<label>Event Independent ?</label>
						<select onchange="independ(this)" name="event_independ">
							<option value="">Select One</option>
							<option value="yes">Yes</option>
							<option value="no">No</option>
						</select>
					</div>
					<div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select"  id="showhotelList" style="display: none;" >
						<?php if (mysqli_num_rows($selectHotelQuery) > 0) { ?>

							<label class="col s12">Select Hotel</label>

							<select  class="hotelNames" name="hotel_name" >
								<option value="null" selected="" disabled="">Select One</option>
								<?php

								while ($result=mysqli_fetch_assoc($selectHotelQuery)) { ?>


									<option name="" value="<?php echo $result['hotel_name'] ?>" data-id="<?php echo $result['hotel_id']; ?>"><?php echo $result['hotel_name'] ?></option>


														    <?php	# code...
														}  ?>
													</select>
													
												<?php  }else{ ?>
													<div class="row"><span id="msg" class="hi-red">No hotel exists</span></div>
													<a class="waves-effect waves-light btn" href="../hotels/db-add-hotels.php?id=<?php echo $_GET['user_id']; ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>">Add Hotel</a>

												<?php  }  ?>
											</div>
											<input type="hidden" name="hotel_id" id="hotelId">
											<div>
												<label class="col s4">Event Name</label>
												<div class="input-field col s8">
													<input type="text" value="" class="validate" name="event_name" required> 
												</div>
											</div>

											<div>
												<label class="col s4">Event Venue</label>
												<div class="input-field col s8">
													<input type="text" value="" class="validate" name="event_venue" required> 
												</div>
											</div>


											<div class="t-chckbox">
												<div class="common-wrapper comon_dropdown_botom_line">
													<label >Event Recurrence ?</label>
													<select   name="event_recurrence">
														<option value="" disabled selected>Select One</option>
														<option value="onetime">One Time</option>
														<option value="week">Weekly</option>
														<option value="biweek">Biweekly</option>
														<option value="month">Monthly</option>
														<option value="quarter">Quarterly</option>
														<option value="year">Yearly</option>
													</select>
												</div>
											</div>

											<div class="t-chckbox">
												<div class="common-wrapper comon_dropdown_botom_line"></div>
												<label>Serve Food?</label>
												<select name="event_serve" onchange="showEvent_Eat(this)">
													<option value="" disabled="" selected="">Select One</option>
													<option value="yes">Yes</option>
													<option value="no"> No</option>
												</select>

											</div>

											<div class="row common-top EatFoodWrap"  >
												<div class="col-md-1"></div>
												<div class="col-md-3 " >
													<div class="eatFree">
														<p class="pTAG">
															<input type="checkbox" class="filled-in freeLbl" id="filled-in-all_free"  name="event_eatFree" />
															<label for="filled-in-all_free" class="freeLbl">Free?</label>
														</p>
													</div>
												</div>
												<div class="col-md-4" >
													<div class="eatAll">
														<p class="pTAG">
															<input type="checkbox" class="filled-in allLbl" id="filled-in-all_u_can"  name="event_eatAll" />
															<label for="filled-in-all_u_can" >All you can eat</label>
														</p>
													</div>
												</div>
												<div class="col-md-4" style="display: none;" id="eatallChrges">
													<label>Charges</label>
													<input type="number" name="event_eatAllChrges" class="validate" id="eatChrges" >
												</div>
												<div class="col-md-4 eatNeed" >
													<div class="">
														<p class="pTAG">
															<input type="checkbox" class="filled-in needLbl" id="filled-in-as_u_need"  name="event_eatNeed" />
															<label for="filled-in-as_u_need">As you need</label>
														</p>
													</div>
												</div>
											</div>


											<div class="common-top">
												<label class="col s4">Event Description</label>
												<div class="input-field col s8">
													<textarea class="materialize-textarea" name="event_descrip" 
													></textarea>
												</div>
											</div>


											<div class="row common-top common-wrapper comon_dropdown_botom_line">
												<div class="col-md-6">
													<label style="margin-bottom: 10px;">Entry Fee ?</label>
													<select name="event_entry" onchange="selectentryfee(this)">
														<option value="" selected="" disabled="">Select One</option>
														<option value="yes">Yes</option>
														<option value="no">No</option>
													</select>
												</div>

												<div class="col-md-6">
													<div class="c-price events-checkbox">
														<label>price</label>
														<div class="input-field">
															<input type="number"  name="event_entryfee" class="validate">


														</div>
													</div>
												</div>
											</div>


											<div class="row common-top">
												<div class="col-md-6 common-wrapper comon_dropdown_botom_line" id="" >
													<label >Children Allowed?</label>
													<select name="event_childallow" onchange="selectchild(this)">
														<option value="" selected=""  disabled="">Select One</option>
														<option value="yes">Yes</option>
														<option value="no">No</option>
													</select>
												</div>
												<div class="col-md-6 common-wrapper c-under5 comon_dropdown_botom_line" id="">
													<label >Under 5 allowed?</label>
													<select name="event_undr5allow" onchange="selectunder5(this)">
														<option value="">Select One</option>
														<option value="yes">Yes</option>
														<option value="no">No</option>
													</select>
												</div>
											</div>

											<div class="row common-top">
												<div class="col-md-6 common-wrapper c-childTickt comon_dropdown_botom_line">
													<label style="padding-bottom:5px;">Charges for children</label>
													<input type="number" name="event_halftikchild" class="validate" >

												</div>
												<div class="col-md-2 events-checkbox">
													<div class="c-childfree">
														<p>
															<input type="checkbox" class="filled-in" onclick="childrnfree(this)" name="event_undr5free" id="undr5free"/>
															<label for="undr5free">Free?</label>
														</p><br><br><br><br>

													</div>
												</div>
												<div class="col-md-4">
													<div class="c-childprice">
														<label style="padding-left: 8px;">price</label>
														<div class="input-field col" style="margin-top: 4px;">
															<input type="number"  name="event_undr5price" class="validate" id="undr5price">
														</div>
													</div>
												</div>
											</div>


											<div class="common-top discount clearfix" id="discount_wrap" style="display: none;">
												<label>Discount for groups <b>:</b></label>
												<div class="row">
													<div class="col-md-6">
														<label>Number of People</label>
														<div class="input-field ">
															<input type="number" value=""  name="common_nopeople[]" id="uniq_people" class="tour-discount-per validate s hel " > 
														</div>
													</div>
													<div class="col-md-6">
														<label>Discount (Percentage)</label>
														<div class="input-field ">
															<input type="number" value="" name="common_discount[]" class="validate tour-discount-dis" > 
														</div>

													</div>								
												</div>			 
											</div>

											<div  class=" " style="margin-bottom: 20px; display: none;" id="discount_btn" > 
												<a id="more_discount_id" class="waves-effect waves-light btn more_discount_id" onclick="gen_discount_input(event)">Add More Discounts</a>
											</div>


											<div class="row common-top" >

												<div class="pickup-select common-wrapper comon_dropdown_botom_line">
													<label>Pickup Offered ?</label>
													<select onchange="pickOffer(this)" name="event_pikoffer">
														<option value="" selected="" disabled="">Select One</option>
														<option value="yes">Yes</option>
														<option value="no">No</option>
													</select>

												</div>
											</div>

											<div class="row pickService common-top" style="display: none;">
												<label style="padding-left: 13px;"><b>Charges from : </b></label>
												<div class="col-md-6">
													<label>Airport</label>
													<div class="input-field ">
														<input type="number" value="" name="event_pikair" class="validate"> 
													</div>
												</div>
												<div class="col-md-6">
													<label> Bus Terminal</label>
													<div class="input-field ">
														<input type="number" value="" name="event_pikbus" class="validate"> 
													</div>

												</div>

											</div>

											<div class="row">
												<div class="col-md-6 pickService"  style="display: none;">

													<label>Specific Location</label>
													<div class="input-field ">
														<input type="number" value="" name="event_pikspecific" class="validate"> 
													</div>
												</div>
											</div>



											<div class="row common-top" >

												<div class="pickup-select common-wrapper comon_dropdown_botom_line">
													<label>Drop off Offered ?</label>
													<select onchange="dropOffer(this)" name="event_drpoffer">
														<option value="" selected="" disabled="">Select One</option>
														<option value="yes">Yes</option>
														<option value="no">No</option>
													</select>

												</div>
											</div>
											<div class="row dropService common-top" style=" display: none;">
												<label style="padding-left: 13px;"><b>Charges from : </b></label>
												<div class="col-md-6">
													<label>Airport</label>
													<div class="input-field ">
														<input type="number" value="" name="event_drpair" class="validate"> 
													</div>

												</div>
												<div class="col-md-6">
													<label>Bus Terminal</label>
													<div class="input-field ">
														<input type="number" value="" name="event_drpbus" class="validate"> 
													</div>

												</div>
											</div>

											<div class="row">
												<div class="col-md-6 dropService"  style="display: none;">   <label>Specific Location</label>
													<div class="input-field ">
														<input type="number" value="" name="event_drpspecific" class="validate"> 
													</div>

												</div>
											</div>

											<div class="imgVeiwinline" id="hotel_img_wrap" style="display: none;">
												<div class="row int_title"><label>Photos :</label></div>

											</div>

											<div class="row common-top">
												<div class="">
													<!-- Modal Trigger -->
													<div class="col s1"></div>
													<a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-images" >Event Photos</a>
													<input type="hidden" name="common_image" id="img_ids">
												</div>
											</div>

											<div class="common-top clearfix">


												<label class="col s4">Events's Promotional Video (url)</label>
												<div class="input-field col s8">
													<input type="text"  class="" name="common_video"  ></div>
												</div>




												<div class="row" >

													<p class="pTAG">
														<input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="event_inactive" />
														<label for="filled-in-inactive">Inactive</label>
													</p>

												</div>

												<div>
													<div class="input-field col s8">
														<input type="button" value="ADD" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn_event"> </div>
													</div>
												</form>
											</div>

										</div>

									</div>
								</div>

								<?php include '../../common-ftns/upload-img-modal.php'; ?>
								<?php include '../../common-ftns/submitting-modal.php'; ?>
								<?php  include"../footer_inner_folder.php"; ?>
								<script src="../../js/event-js/event.js"></script>

								<script type="text/javascript">
									jQuery(document).ready(function(){
										tinymce.init({ selector:'textarea' });

									});

									function showEvent_Eat(that) {

										if (that.value== 'yes') {
											$('.EatFoodWrap').show();


										}else{
											$('.EatFoodWrap').hide();

										}
									}

									$(".freeLbl").click(function () {

     // $('input:checkbox:not(:disabled)').not(this).prop('checked', this.checked);
     
     if($(".eatFree input:checkbox:checked").length > 0){
 // debugger;
 $('.eatAll').hide();
 $('.eatNeed').hide();
 $('#eatChrges').val('');

}else{
	$('.eatFree').show();
	$('.eatAll').show();
	$('.eatNeed').show();  
}

});

									$(".allLbl").click(function () {

     // $('input:checkbox:not(:disabled)').not(this).prop('checked', this.checked);
     
     if($(".eatAll input:checkbox:checked").length > 0){
 // debugger;
 $('.eatFree').hide();
 $('.eatNeed').hide();
 $('#eatallChrges').show();
 

}else{
	$('.eatFree').show();
	$('.eatAll').show();
	$('.eatNeed').show();  
	$('#eatallChrges').hide();
}

});

									$(".needLbl").click(function () {

     // $('input:checkbox:not(:disabled)').not(this).prop('checked', this.checked);
     
     if($(".eatNeed input:checkbox:checked").length > 0){
 // debugger;
 $('.eatFree').hide();
 $('.eatAll').hide();
 $('#eatChrges').val('');

}else{
	$('.eatFree').show();
	$('.eatAll').show();
	$('.eatNeed').show();  
}

});

									function selectentryfee(that) {

										if (that.value == "yes") {
											$('.c-free').show();
											$('.c-price').show();
											$('#discount_wrap').show();
											$('#discount_btn').show();

		// console.log($(".c-free input:checkbox:checked").length);
		
		
	}else{
		$('.c-free').hide();
		$('.c-price').hide();
		$('#discount_wrap').hide();
		$('#discount_btn').hide();
	}

	// body...
}

function ticketprice(){

	// console.log($('.c-price').find('input').length);
	
	if ($('.c-price').find('input').length < 0) {

		$('.c-free').show();

		
	}else if($('.c-price').find('input').length > 0){

		$('.c-free').hide();
	}

}

</script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>