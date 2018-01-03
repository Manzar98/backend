<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Add an Event - Member's Area </title>


<?php  include"../header.php"; ?>


	<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="images/icon/dbc5.png" alt=""/> Add Event Package</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						 
                         <div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="event-form" role="form" action="event-post.php" method="POST" enctype="multipart/form-data">
						
							
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
                        			<option value="-1">Select One</option>
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
                        			<option value="-1">Select One</option>
                        			<option value="yes">Yes</option>
                        			<option value="no">No</option>
                        		</select>
                        	</div>
                        	<div class="col-md-6 common-wrapper c-under5 comon_dropdown_botom_line" id="">
                        		<label >Under 5 allowed?</label>
                        		<select name="event_undr5allow" onchange="selectunder5(this)">
                        			<option value="-1">Select One</option>
                        			<option value="yes">Yes</option>
                        			<option value="no">No</option>
                        		</select>
                        	</div>
                        </div>

                        <div class="row common-top">
                        	<div class="col-md-6 common-wrapper c-childTickt comon_dropdown_botom_line">
                        		<label style="padding-bottom:5px;">Half Ticket for children?</label>
                        		<select name="event_halftikchild">
                        			<option value="-1">Select One</option>
                        			<option value="yes">Yes</option>
                        			<option value="no">No</option>
                        		</select>
                        	</div>
                        	<div class="col-md-2 events-checkbox">
                        		<div class="c-childfree">
                        			<p>
									<input type="checkbox" class="filled-in" onclick="childrnfree(this)" name="event_undr5free" id="undr5free"/>
									<label for="undr5free">Free?</label>
								</p><br><br><br><br>
                        			<!--<label for="filled-in-box">Free</label>
                        			 <p >
                        				
                        				<input type="checkbox" class="filled-in" id="filled-in-box"   name="event_undr5free" />
      
                        				

                        			</p> -->
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="c-childprice">
                        			<label style="padding-left: 8px;">price</label>
                        			<div class="input-field col" style="margin-top: 4px;">
                        				<input type="number"  name="event_undr5price" class="validate">
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
								   <input type="number" value="" name="common_discount[]" class="validate" > 
							      </div>

								</div>								
							</div>			 
						</div>

						<div  class=" " style="margin-bottom: 20px; display: none;" id="discount_btn" > 
                            	<a id="more_discount_id" class="waves-effect waves-light btn more_discount_id" onclick="gen_discount_input(event)">Add More Discounts</a>
                        </div>


						<div class="row common-top" >
							
							<div class="col-md-6 pickup-select common-wrapper comon_dropdown_botom_line">
								<label style="margin-bottom: 32px;">Pickup Offered ?</label>
							      <select onchange="pickOffer(this)" name="event_pikoffer">
								     <option value="-1">Select One</option>
								     <option value="yes">Yes</option>
								     <option value="no">No</option>
							     </select>

							</div>
							
							<div class="col-md-6 pickService"  style="display: none;">
								
								 <label><b>Charges from : </b><br> Airport</label>
								 <div class="input-field ">
								   <input type="number" value="" name="event_pikair" class="validate"> 
							      </div>
							</div>

						</div>
						<div class="row pickService common-top" style="display: none;">
							
							<div class="col-md-6">
								<label> Bus Terminal</label>
								 <div class="input-field ">
								   <input type="number" value="" name="event_pikbus" class="validate"> 
							      </div>

							</div>
							<div class="col-md-6">
								 <label>Specific Location</label>
								 <div class="input-field ">
								   <input type="number" value="" name="event_pikspecific" class="validate"> 
							      </div>
							</div>

						</div>


                       <div class="row common-top" >
							
							<div class="col-md-6 pickup-select common-wrapper comon_dropdown_botom_line">
								<label style="margin-bottom: 32px;">Drop off Offered ?</label>
							      <select onchange="dropOffer(this)" name="event_drpoffer">
								     <option value="-1">Select One</option>
								     <option value="yes">Yes</option>
								     <option value="no">No</option>
							     </select>

							</div>
							<div class="col-md-6 dropService"  style="display: none;">
								 <label>Charges From :<br> Airport</label>
								 <div class="input-field ">
								   <input type="number" value="" name="event_drpair" class="validate"> 
							      </div>
							</div>

						</div>
						<div class="row dropService common-top" style=" display: none;">
							
							<div class="col-md-6">
								<label>Bus Terminal</label>
								 <div class="input-field ">
								   <input type="number" value="" name="event_drpbus" class="validate"> 
							      </div>

							</div>
							<div class="col-md-6">
								 <label>Specific Location</label>
								 <div class="input-field ">
								   <input type="number" value="" name="event_drpspecific" class="validate"> 
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
							<input type="text" name="common_image" id="img_ids">
							</div>
					   </div>
                           											
							<div class="row  common-top clearfix">
								 
									<div class="col s6 dumi_vid_btn" id="pro-file-upload"> <span>Tour's PROMOTIONAL VIDEO</span></div>
										<input type="text" placeholder="Upload Promotional video URL" name="common_video" class="input-field validate col s5 dumi_vid_inpt" required>
							</div>

						<div>
							<div class="input-field col s8">
								<input type="submit" value="ADD" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
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



		   <?php  include"../footer.php"; ?>




		   <script type="text/javascript">
jQuery(document).ready(function(){
	tinymce.init({ selector:'textarea' });

	 // $('#modal-images').modal();
     
     
     // alert('Hit');
 	// $("#chosenexample").chosen({ allow_single_deselect: true})



 	 $('.chips-autocomplete').material_chip({
    autocompleteOptions: {
      data: {
       

        
      },
      limit: Infinity,
      minLength: 1
    }
  });


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


$("#event-form").validate({

         errorElement : 'div',
        errorPlacement: function(error, element) {


        	if($('.select-wrapper').val()=="" && !$('.select-wrapper').hasClass('error')){
                $('.select-wrapper').addClass('error');
                // debugger;
        		// alert('empty');

        	}
        	// else {

         //         $('.select-wrapper').removeClass('error');
         //         debugger;
        	// }
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




</script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>