<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Add a Hotel</title>


<?php 

 
  
include '../header.php'; 

include'../../methods/general_amenities.php'; ?>

   






				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../../images/icon/dbc5.png" alt=""/> Add Hotel</h3>
							<p>Fill out the form below to add a new Hotel.</p>
						</div>
						 
                         <div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="hotel-form" role="form" action="hotel-post.php" method="POST" enctype="multipart/form-data">
                        
                          <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
						<div>

							<label class="col s4">Hotel Name</label>
							<div class="input-field col s8">
								<input type="text" class="validate is_validate" id="hotel_name" name="hotel_name" data-error=".errorTxt1"  required>
								<div class="errorTxt1"></div>
								
							</div>
						</div>

						<div>
							<label class="col s4">Address Line 1</label>
							<div class="input-field col s8">
								<input type="text"  class="validate is_validate" name="hotel_addres1" data-error=".errorTxt2"  required>
								<div class="errorTxt2"></div>
							</div>
						</div>
						<div>
							<label class="col s4">Address Line 2</label>
							<div class="input-field col s12">
								<input type="text" class="validate" name="hotel_addres2" >
								
								 </div>
						</div>

						<div class="row">
							<div  class="col-md-6">
								<label>City</label>
								<input id="first_name" type="text" name="hotel_city" class="input-field validate is_validate" data-error=".errorTxt3" required>
								<div class="errorTxt3"></div>
							</div>

							<div  class="col-md-6">
								<label>Province</label>
								<input id="last_name" type="text" name="hotel_province" class="input-field validate is_validate" data-error=".errorTxt4" required>
								<div class="errorTxt4"></div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label >Phone Number</label>
								<input type="number"  class="input-field validate is_validate" name="hotel_phone" data-error=".errorTxt5" required>
								<div class="errorTxt5"></div>
							</div>
							<div class="col-md-6">
								<label >Fax Number</label>
								<input type="number"  class="input-field validate" name="hotel_fax">
							</div>

						</div>

      					<div>
							<label class="col s4">Email Address</label>
							<div class="input-field col s8">
								<input type="email"  class="validate is_validate" name="hotel_email" data-error=".errorTxt6"  required><div class="errorTxt6"></div> </div>
						</div>


						
						<div>
							<label class="col s4">Website</label>
							<div class="input-field col s8 web">
								<input type="url"  class="validate " name="hotel_web"></div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label>Check In Time</label>
								<input type="text" class="timepicker" id="checkIn" name="hotel_checkin" data-error=".errorTxt7" required=""><div class="errorTxt7"></div>
							</div>
							<div class="col-md-6">
								<label>Check Out Time</label>
								 <input type="text" class="timepicker" id="checkOut"    name="hotel_checkout" data-error=".errorTxt8" required="">  
								 <div class="errorTxt8"></div>
							</div>
						</div>


						<div class="imgVeiwinline row" id="hotel_img_wrap" style="display: none;">
							<div class="row int_title"><label>Interior Photos :</label></div>
							 
						</div>
						<div class="imgVeiwinline row" id="hotel_img_exe_wrap" style="display: none;">
							 <div class="row int_title"><label>Exterior Photos :</label></div>
						</div>
						<div class="imgVeiwinline row" id="hotel_cover_img" style="display: none;">
							<div class="row int_title"><label>Hotel Cover Photo:</label></div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<!-- Modal Trigger -->
							<a class="waves-effect waves-light btn modal-trigger spc-modal" href="#modal-images" >Hotel Interior Photos</a>
							<input type="hidden" name="common_image" id="img_ids">
							</div>
							<div class="col-md-6">
								<a class="waves-effect waves-light btn modal-trigger spc-modal" href="#modal-extimg">Hotel Exterior  Photos</a>
								<input type="hidden" name="common_extimage" id="img_extids">
							</div>
					   </div>

					   <div class="row common-top">
							<div class="">
								<!-- Modal Trigger -->
								<!-- <div class="col s1"></div> -->
							<a class="waves-effect waves-light btn modal-trigger spc-modal" href="#modal-coverimg">Hotel Cover Photos</a>
								<input type="hidden" name="hotel_coverimage" id="img_cover">
							</div>
					   </div>

					   
                           											
							<div class="common-top clearfix">
								 
									
								<label class="col s4">Hotel Promotional Video (URL)</label>
								<div class="input-field col s8">
									<input type="text"  class="" name="common_video"  ></div>
						    </div>
						
						<div class="common-top">
							<label class="col s4">Hotel Description</label>
							<textarea id="hotel-desp" name="hotel_descrp" class="materialize-textarea is_validate" data-error=".errorTxt9" required=""></textarea>
							<div class="errorTxt9"></div>
							 
						</div><br><br>






                        <div class="row" >
                        	<div class="col s12" id="pick_select" >
                        		 <label>Pickup Offered?</label>
                        		<select  onchange="yesCheck(this)" required="" name="hotel_pickup" class=" " id="pik_select" data-error=".errorTxt10" >
							     <option value="" disabled selected>Choose your option</option>
							     <option value="yes">Yes</option>
								 <option value="no">No</option>
							   </select> 
							  
                        	</div>
                        	<div class="input-field">
                        		<div class="errorTxt10"></div>
                        	</div>
                            
					    </div>
					    <div class="row" id="transport" style="display: none;">
                            	<div class="col-md-6" id="fil_air" >
						            <p class="pTAG">
						             <input type="checkbox" class="filled-in" id="filled-in-airport" name="hotel_isair" data-error=".errorTxt12"  />
						             <label for="filled-in-airport" id="air">Airport</label>
						            </p>
						            <div class="input-field">
                                                <div class="errorTxt12"></div>
                                            </div>
         						</div>
         						<div class="col-md-6 " id="fil_bus">
						            <p class="pTAG">
						             <input type="checkbox" class="filled-in" id="filled-in-bus" name="hotel_isbus" data-error=".errorTxt20"/>
						             <label for="filled-in-bus">Bus station</label>
						            </p>
						             <div class="input-field" >
                                                <div class="errorTxt20"></div>
                                            </div>
         						</div>
                            </div>   


                        <div class="row">
                          <div class="col-md-6" >
                          	<div class="" style="display: none;" id="ifYes">
                        		<label>Charges</label>
                        		 <input type="number" id="hotel_pikcharge" class="input-field validate is_validate" name="hotel_pikcharge">
                            </div>
                            </div>
                            <div class="col-md-6" id="buschgr" style="display: none;">
                            	<label>Charges</label>
                        		 <input type="number" id="hotel_buscharge" class="input-field validate " name="hotel_buscharge">
                            </div>
                        </div>

					    <div id="bag-char"   style="display: none;">  
                           <label class="col s6">Luggage </label>
				            <div class="input-field col s12 common-wrapper comon_dropdown_botom_line is_validate_select">
							 <select onchange="noofbags(this)" name="hotel_nobag" id="qun-lags" class="input-field validate">
							   <option value="" disabled selected>Choose your option</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							 </select>		    
					        </div>
					      </div>

                        <div class="common-top">

                        		<label class="col s4" id="1bag" style="display: none;">1 bag charges</label>
                        		<label class="col s4" id="2bags" style="display: none;">2 bags charges</label>
                        		<label class="col s4" id="3bags" style="display: none;">3 bags charges</label>
                        		<label class="col s4" id="4bags" style="display: none;">4 bags charges</label>
                        		<div class="input-field col s8">
								<input type="number"  class="validate"  id="bag-inpt" name="hotel_bagprice" style="display: none;"> </div>
                        		                       
                        </div>

                       
					      
						 <div class="common-top">

							<label class="col s4">Amenities:</label>
                             
                             <div class="chips chips-autocomplete" id="click_other" ></div>
							<input type="hidden"  name="hotel_other" id="amenities-id" >
                              
		
						</div>

						 <div class="common-top">
                             <label class="col s4">Hotel booking cancellation Policy</label>
                            <textarea  name="hotel_policy" class="materialize-textarea is_validate" data-error=".errorTxt11"> </textarea>

                            <div class="errorTxt11"></div>

                         </div>


                         <div class="common-top">
                         	<label class="col s8">Hotel’s Social Media URLs</label>
                         	<div class="row" style="margin-top: 10px;">
                         		<div class="col-md-6">                         			
                         			<label> Hotel’s Facebook</label>
								       <input type="text"  class="validate input-field" name="hotel_fburl">

							    </div>
                         		<div class="col-md-6">
                         			<label>Hotel’s Twitter</label>
								      <input type="text"  class="validate input-field" name="hotel_twurl">
                         		</div>
                         	</div>
                         	<div class="row" style="margin-top: 10px;">
                         		<div class="col-md-6">
                         				<label>Hotel’s Google Plus</label>
								       <input type="text"  class="validate input-field" name="hotel_gourl">
                         		</div>
                         		<div class=" col-md-6">
                         				<label>Hotel’s Instagram</label>
								       <input type="text"  class="validate input-field" name="hotel_insurl">
                         		</div>
                         		
                         	</div>
                         	<div class="row" style="margin-top: 10px;">
                         		<div class="col-md-6">
                         				<label>Hotel’s Pinterest</label>
								       <input type="text"  class="validate input-field" name="hotel_pinurl">
                         		</div>
                         		<div class="col-md-6">
                         				<label>Hotel’s Youtube</label>
								       <input type="text"  class="validate input-field" name="hotel_yuturl">
                         		</div>
                         		
                         	</div>
                         </div> 
                         <div class="row" >
                         	
						            <p class="pTAG">
						             <input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="hotel_inactive" />
						             <label for="filled-in-inactive">Inactive</label>
						            </p>
						             
         						</div>
         						

						<div>
							<div class="input-field col s8">
								<input type="button"  value="Add" class="waves-effect waves-light pro-sub-btn pro-sub-btn" id="pro-sub-btn_hotel"> </div>
						</div>
					</form>

				</div>
              
					</div>
					
				</div>
			</div>

			<!-- Modal Structure -->
			<div id="modal-images" class="modal modal-fixed-footer image_drop_down_modal_body interior_wrap">
				<div class="modal-content">
					<div class="modal-header"><h2>Upload  Photos</h2></div>
				<iframe src="up_load_img.php?name=interior" id="int_iframe"></iframe>
                   <div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat int_done">Done</a>
				</div>
		   </div>
		   </div>

		   <!-- Modal Structure -->
			<div id="modal-extimg" class="modal modal-fixed-footer image_drop_down_modal_body exterior_wrap">

				<div class="modal-content">
						<div class="modal-header"><h2>Upload Exterior Photos</h2></div>
				<iframe src="up_load_img.php?name=exterior" id="ext_iframe"></iframe>
                   <div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ext_done">Done</a>
				</div>
		   </div>
		   </div>

		   <!-- Modal Structure -->
			<div id="modal-coverimg" class="modal modal-fixed-footer image_drop_down_modal_body cover_wrap" style="width: 50%; margin: 0 auto; box-shadow:none;" >

				<div class="modal-content">
						<div class="modal-header"><h2>Upload Cover Photo</h2></div>
				<iframe src="up_load_cover.php?name=hotel-cover"></iframe>
                   <div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Done</a>
				</div>
		   </div>
		   </div>

   		   <?php include '../../common-ftns/submitting-modal.php'; ?>
		   <?php  include"../footer.php";  ?>
           <script src="../../js/hotel-js/hotel.js"></script>


<script>

   tinymce.init({ selector:'textarea' });

  function yesCheck(that) {
            // alert("check");
              document.getElementById("transport").style.display = "block";
        if (that.value == "yes") {
             document.getElementById("bag-char").style.display = "block";
          
        } else {
             document.getElementById("ifYes").style.display = "none";
            document.getElementById("bag-char").style.display = "none";
            document.getElementById("1bag").style.display = "none";
    		document.getElementById("2bags").style.display = "none";
    		document.getElementById("3bags").style.display = "none";
    		document.getElementById("4bags").style.display = "none";
    		document.getElementById('bag-inpt').style.display = "none";
    		document.getElementById("transport").style.display = "none";
    		$('#buschgr').hide();
    		 $('#buschgr input').val('');
    		$('#ifYes input').val('');

    		  
        }
    }


    function noofbags(that){

    	if(that.value == "1"){

    		document.getElementById("1bag").style.display = "block";
    		document.getElementById('bag-inpt').style.display = "block";
    		 document.getElementById("2bags").style.display = "none";
    		  document.getElementById("3bags").style.display = "none";
    		   document.getElementById("4bags").style.display = "none";
    		
    	} 

    	else if (that.value == "2") {
    		 document.getElementById("1bag").style.display = "none";
    		 document.getElementById('bag-inpt').style.display = "block";
    		 document.getElementById("2bags").style.display = "block";
    		  document.getElementById("3bags").style.display = "none";
    		   document.getElementById("4bags").style.display = "none";
    	}
    	else if (that.value == "3") {
    		document.getElementById("1bag").style.display = "none";
    		document.getElementById('bag-inpt').style.display = "block";
    		document.getElementById("2bags").style.display = "none";
    		document.getElementById("3bags").style.display = "block";
 		    document.getElementById("4bags").style.display = "none";
    	}
    	else if(that.value == "4"){
    		document.getElementById("1bag").style.display = "none";
    		document.getElementById("2bags").style.display = "none";
    		document.getElementById("3bags").style.display = "none";
    		document.getElementById("4bags").style.display = "block";
    		document.getElementById('bag-inpt').style.display = "block";

    	}else{
    		  document.getElementById("1bag").style.display = "none";
    		  document.getElementById("2bags").style.display = "none";
    		  document.getElementById("3bags").style.display = "none";
    		  document.getElementById("4bags").style.display = "none";
    		  document.getElementById('bag-inpt').style.display = "none";
    	}

    }


	// body...
 $('#filled-in-airport').click(function () {
    if ($("#fil_air input:checkbox:checked").length > 0) {
           
           
           $('#ifYes').show();
    }else{

    	$('#ifYes').hide();
    	$('#ifYes input').val('');
    }
});

 $('#filled-in-bus').click(function () {
    if ($("#fil_bus input:checkbox:checked").length > 0) {
           
           
           $('#buschgr').show();
    }else{

    	$('#buschgr').hide();
    	$('#buschgr input').val('');
    }
});


jQuery(document).ready(function(){

   var am_obj=[];
   var am_data=$('#amenities-input_wrap').val().split(',');
   // console.log(am_data);

 for (var i = 0; i < am_data.length; i++) {
	      
	      am_obj[am_data[i]] = "";
}

 $('.chips-autocomplete').material_chip({
    autocompleteOptions: {
      data : am_obj,
      limit: Infinity,
      minLength: 1
    }
  });

// debugger;


$('#modal-extimg').modal({dismissible: false});
$('#modal-coverimg').modal({dismissible: false});

// $('#pro-sub-btn').click(function(){
// 	// debugger;
// 	var isFormValidated = true;
// 	 $.each($('#hotel-form .is_validate'),function(key,val){
// 	 		if(!val.value){
// 	 			isFormValidated = false;
// 	 			console.log(val);
// 				$(val).addClass('error');	
// 	 		}else{
// 	 			// debugger;
// 	 			$(val).removeClass('error');
// 	 		}
// 	 });
// 	$.each($('#hotel-form .is_validate_select'),function(key,val){
// 			if(!$(val).find('select').val()){
// 				isFormValidated = false;
// 				console.log(val);
// 				$(val).find('.select-wrapper').addClass('error');

// 			}else{
// 				// debugger;
// 				$(val).find('.select-wrapper').removeClass('error');
// 			}
// 	});


// 	if(isFormValidated){
// 		console.log('TIme to submit form');
// 		$("#hotel-form").submit();
// 	}else{
// 		console.log('There is an error');
// 	}
// })



// $("#hotel-form").validate({
//   submitHandler: function(form) {
//     $(form).ajaxSubmit();
//   }
// });

// $("#hotel-form").validate({

//          errorElement : 'div',
//         errorPlacement: function(error, element) {

//         	 console.log(element);
//           var placement = $(element).data('error');

//              console.log(placement);
//              console.log(error);
//           if (placement) {
//             $(placement).append(error)
//           } else {
//             error.insertAfter(element);
//           }
//         }
//    });




 $('#checkIn').pickatime();

$('#checkOut').pickatime();


});




    

</script>

	
</body>

  
  

<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>