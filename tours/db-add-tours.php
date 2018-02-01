
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Add Tour Package</title>

	  <?php include '../header.php'; ?>


			<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../images/icon/dbc5.png" alt=""/> Add Tour Package</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						 
                         <div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="tour-form" role="form" action="tour-post.php" method="POST" enctype="multipart/form-data">
						
							
						<div>
							<label class="col s4">Package Name</label>
							<div class="input-field col s8">
								<input type="text" value="" class="validate" name="tour_name" required> </div>
						</div>
						<div>
							<label class="col s4">Final Destination</label>
							<div class="input-field col s8">
								
								<input type="text" name="tour_destinationname" id="input_chips-desti" class="validate"  required=""> </div>
						</div>


						<div class="row t-chckbox">
							<div class="col-md-6 hotelFod common-wrapper comon_dropdown_botom_line">
								<label>Food Included ?</label>
								<select name="tour_foodinclude" onchange="selectFod(this)">
									<option value="" selected="">Select One</option>
									<option value="yes">Yes</option>
									<option value="no">No</option>
								</select>
							</div>
							 <div id="show-food">
							<div  class="col-md-2 c-food">

								<p>
									<input type="checkbox" class="filled-in" id="filled-in-box"   name="tour_brkfast" />
									<label for="filled-in-box">Breakfast</label>
								</p>
								
							</div>
							<div class="col-md-2 c-food">
								
								<p>
									<input type="checkbox" class="filled-in" id="filled-in-lunch"  name="tour_lunch" />
									<label for="filled-in-lunch">Lunch</label>
								</p>
								
							</div>
							<div class="col-md-2 c-food">
								<p>
									<input type="checkbox" class="filled-in" id="filled-in-diner"   name="tour_dinner" />
									<label for="filled-in-diner">Dinner</label>
								</p>
							</div>
							</div>

						</div>


						<div class="row t-chckbox common-top">
							<div class="col-md-6 common-wrapper comon_dropdown_botom_line">
								<label>Drinks Included?</label>
								<select name="tour_drink"  onchange="selctdrink(this)">
									<option value="" disabled="" selected="">Select One</option>
									<option value="yes">Yes</option>
									<option value="no">No</option>
								</select>
							</div>
							<div id="drink-wrap">
							<div class="col-md-2 c-drink">
								<p>
									<input type="checkbox" class="filled-in" id="filled-in-alcholic"   name="tour_dinner" />
									<label for="filled-in-alcholic">Alcoholic</label>
								</p>
								
							</div> 
							<div class="col-md-4 c-drink">
								<p>
									<input type="checkbox" class="filled-in" id="filled-in-nonalc"   name="tour_nonaloholic" />
									<label for="filled-in-nonalc">Non Alcoholic</label>
								</p>
								
							</div>
							</div>
						</div>


						<div class="row common-top">
							<div class="col-md-6"> 
								<label>Number of Days</label>
                                  <div class="input-field ">
								    <input type="number" value="" id="bt1" class="validate" name="tour_stayday" required> 
								  </div>
							</div>
							<div class="col-md-6">
								<label>Number of Nights</label>
                                  <div class="input-field ">
								   <input type="number" value="" id="bt2" class="validate" name="tour_stayni8" required> 
							      </div>
							</div>

						</div>

						<div class="row">
							
							<div class="col-md-6">
								<label>Departure Date</label>
								<input type="text" id="departureDate" class="input-field " name="tour_depdate" required="">
							</div>
							<div class="col-md-6">
								<label>Departure Time</label>
								<input type="text" class="timepicker" id="departureTime" name="tour_deptime"  required="">
							</div>
						</div>

						<div class="row">
							
							<div class="col-md-6">
								<label>Arrival Date</label>
								<input type="text" id="arrivalDate" class="input-field " name="tour_arrdate" required="">
							</div>
							<div class="col-md-6">
								<label>Arrival Time</label>
								<input type="text" class="timepicker" id="arrivalTime" name="tour_arrtime" required="">
							</div>
						</div>


						<div class="row t-chckbox common-top" id="t-chckbox"  style="margin-bottom: 30px;">
							<div class="col-md-6" >
							<div class="hotelStr common-wrapper comon_dropdown_botom_line">
								
								  <label for="filled-in-box">Hotel Stay Stars</label>
                                    <select class="" name="tour_hotelstr"  onchange="changeStr(this)">
                                    	<option value="">Select One</option>
                                    	<option value="1">1</option>
                                    	<option value="2">2</option>
                                    	<option value="3">3</option>
                                    	<option value="4">4</option>
                                    	<option value="5">5</option>
                                    	<option value="6">6</option>
                                    	<option value="7">7</option>
                                    </select>								
							</div>
							</div>
							<div class="col-md-6  " >
								<div class="camping">
								<p class="checkbox-bottom">
									<input type="checkbox" class="filled-in" onclick="changecamp(this)" name="tour_camping" id="cmp"/>
									<label for="cmp">Camping ?</label>
								</p>
								</div>
								
							</div>							
						</div>


						<div class="col s12 common-wrapper common-top clearfix comon_dropdown_botom_line" id="bn-serv" >

							<label class="col s12">Entry tickets included in the package price?</label>
							   <select   name="tour_entrytik">
								 <option value="">Select One</option>
								 <option value="yes">Yes</option>
								 <option value="no">No</option>

							   </select>
						</div>

						<div class="common-top">
							<label class="col s4">Whole travel plan of the package</label>
							<div class="input-field col s8">
								<textarea class="materialize-textarea textarea-t" name="tour_plan"></textarea required>  </div>
						</div>

						<div class="row common-top"  style="margin-top: 20px;">
							<div class="col-md-6">
								<label style="padding-bottom: 22px;">Package Price</label>
                                  <div class="input-field ">
								   <input type="number" value="" name="tour_pkgprice" class="validate" required> 
							      </div>

							</div>
							<div class="col-md-6">   
                                <label>Number of people<br> (capacity of the package)</label>
                                  <div class="input-field ">
								   <input type="number" value="" name="tour_capacitypeople" class="validate" required> 
							      </div>
							</div>
						</div>


						<div class="row common-top" >
							<div class="col-md-6">
								<label >Number of bags allowed per person</label>
                                  <div class="input-field ">
								   <input type="number" value="" name="tour_nosofbag" class="validate" required> 
							      </div>

							</div>
							<div class="col-md-6">   
                                <label>Charges for extra luggage per bag</label>
                                  <div class="input-field ">
								   <input type="number" value="" name="tour_extrachrbag" class="validate"> 
							      </div>
							</div>
						</div>


						<div class="row common-top">
                        	<div class="col-md-6 common-wrapper comon_dropdown_botom_line" id="childallow">
                        		<label >Children Allowed?</label>
                        		<select name="tour_childallow" onchange="selectchild(this)">
                        			<option value="">Select One</option>
                        			<option value="yes">Yes</option>
                        			<option value="no">No</option>
                        		</select>
                        	</div>
                        	<div class="col-md-6 common-wrapper c-under5 comon_dropdown_botom_line" id="under5">
                        		<label >Under 5 allowed?</label>
                        		<select name="tour_undr5allow" onchange="selectunder5(this)">
                        			<option value="">Select One</option>
                        			<option value="yes">Yes</option>
                        			<option value="no">No</option>
                        		</select>
                        	</div>
                        </div>

                        <div class="row common-top">
                        	<div class="col-md-6 common-wrapper c-childTickt comon_dropdown_botom_line"  id="c-chilTickt">
                        		<label style="padding-bottom:5px;">Charges for children</label> 
                        		 <input type="number" name="tour_halftikchild" class="validate">
                        	</div>
                        	<div class="col-md-2 events-checkbox">
                        		<div class="c-childfree">

                        			<p>
									<input type="checkbox" class="filled-in" onclick="childrnfree(this)" name="tour_undr5free" id="undr5free"/>
									<label for="undr5free">Free?</label>
								</p><br><br><br><br>
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="c-childprice">
                        			<label style="padding-left: 8px;">price</label>
                        			<div class="input-field col s8" style="margin-top: 4px;">
                        				<input type="number"  name="tour_undr5price" class="validate" id="undr5price">
                        			</div>
                        		</div>
                        	</div>
                        </div>


						<div class="common-top discount clearfix" id=discount_wrap>
							<label>Discount for groups <b>:</b></label>
							<div class="row">
								<div class="col-md-6">
									<label>Number of People</label>
                                  <div class="input-field ">
								   <input type="number" value=""  name="common_nopeople[]" id="uniq_people" class="tour-discount-per validate s hel"> 
							      </div>
								</div>
								<div class="col-md-6">
									<label>Discount (Percentage)</label>
                                  <div class="input-field ">
								   <input type="number" value="" name="common_discount[]" class="validate"> 
							      </div>

								</div>								
							</div>
							 
						</div>
                               
						<div  class=" " style="margin-bottom: 20px;"> 
                            	<a id="more_discount_id" class="waves-effect waves-light btn more_discount_id" onclick="gen_discount_input(event)">Add More Discounts</a>
                        </div>

						<div class="common-top">
							<label class="col s4">Trip starts from (Location’s Name)</label>
							<div class="input-field col s8">
								<input type="text" value="" name="tour_strtloc" class="validate" required> </div>
						</div>

						<div class="row common-top" >
							 
							<div class="pickup-select common-wrapper comon_dropdown_botom_line">
								<label>Pickup Offered ?</label>
							      <select onchange="pickOffer(this)" name="tour_pikoffer">
								     <option value="">Select One</option>
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
								   <input type="number" value="" name="tour_pikair" class="validate pickup_air"> 
							      </div>

							</div>
							<div class="col-md-6">
								<label> Bus Terminal</label>
								 <div class="input-field ">
								   <input type="number" value="" name="tour_pikbus" class="validate pickup_bus"> 
							      </div>
								
							</div>

						</div>
						<div class="row">
							<div class="col-md-6 pickService"  style="display: none;">
								
								  <label>Specific Location</label>
								 <div class="input-field ">
								   <input type="number" value="" name="tour_pikspecific" class="validate pickup_specific"> 
							      </div>
							</div>
						</div>
                         

                       <div class="row common-top" >
							
							<div class="pickup-select common-wrapper comon_dropdown_botom_line">
								<label>Drop off Offered ?</label>
							      <select onchange="dropOffer(this)" name="tour_drpoffer">
								     <option value="">Select One</option>
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
								   <input type="number" value="" name="tour_drpair" class="validate dropoff_air"> 
							      </div>
								

							</div>
							<div class="col-md-6">
								<label>Bus Terminal</label>
								 <div class="input-field ">
								   <input type="number" value="" name="tour_drpbus" class="validate dropoff_bus"> 
							      </div>
								 
							</div>

						</div>
						<div class="row">
							<div class="col-md-6 dropService"  style="display: none;">
								<label>Specific Location</label>
								 <div class="input-field ">
								   <input type="number" value="" name="tour_drpspecific" class="validate dropoff_specific" > 
							      </div>
							</div>
						</div>
			           <div class="imgVeiwinline row" id="hotel_img_wrap">
			               
			            </div>
					   <div class="row common-top">
							<div class="">
								<!-- Modal Trigger -->
								<div class="col s1"></div>
							<a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-images" >Tour Photos</a>
							<input type="hidden" name="common_image" id="img_ids">
							</div>
					   </div>
                           											
							<div class="row  common-top clearfix">
								 
									<div class="col s6 dumi_vid_btn" id="pro-file-upload"> <span>Tour's PROMOTIONAL VIDEO</span></div>
										<input type="text" placeholder="Upload Promotional video URL" name="common_video" class="input-field validate col s5 dumi_vid_inpt">
							</div>
								<div class="destination-wrap " id="destination-wrap">
									<div class="destination new_Destination" id="destination-1">
										<div class="common-top">
											<label>Destination Name</label>
											<div class="input-field col s8">
												<input type="text" name="destination_name[]" required>

											</div>

										</div>
										<div >
											<label>Destination Description</label>
											<div class="input-field col s8">
												<textarea class="materialize-textarea" name="destination_descrp[]" required></textarea> 
											</div>
										</div>
										<div id="attraction-wrap">
											<div class="attractions" id="attraction-1_1">
												<div class="common-top">
													<label>Attraction Name</label>
													<div class="input-field col s8">
														<input type="text"  name="attraction_name[]" required>

													</div>

												</div>
												<div >
													<label>Attraction Description</label>
													<div class="input-field col s8">
														<textarea  class="materialize-textarea custom-text-area" name="attraction_descrp[]" required></textarea> 
													</div>
												</div>
											</div>
										</div>
										


										<div class="row col s8 attr_btn clearfix common-top">
											<a class="waves-effect waves-light btn attr-btn" onclick="gen_attraction(event)">Add More Attractions</a>
										</div>
									</div>
                                    <input type="hidden" name="desti_id" id="D-id">
								</div>
						

						<div class="col s8 common-top clearfix">
                        	<a class="waves-effect waves-light btn " onclick="gen_destination(event)">Add More Destinations</a>
                        </div>

                       <div class="row" >
                         	
						            <p class="pTAG">
						             <input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="tour_inactive" />
						             <label for="filled-in-inactive">Inactive</label>
						            </p>
						             
         						</div>
                       
                       
						<div>
							<div class="input-field col s8">
								<input type="button" value="ADD" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn_tour"> </div>
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




     <?php include '../footer.php'; ?>
<script src="../js/tour-js/tour.js"></script>


 

<script type="text/javascript">
jQuery(document).ready(function(){
	 
     tinymce.init({ selector:'.textarea-t' });

  

});
</script>

</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>