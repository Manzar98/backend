<?php
 include '../common-apis/api.php';

 $editHotelQuery=select('hotel',array('hotel_id'=>46));


 $editHotelImgQuery=select('common_imagevideo',array('hotel_id'=>46));


?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Edit Hotel</title>


<?php include '../header.php'; ?>


<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../images/icon/dbc5.png" alt=""/> Add Hotel</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						 
                         <div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="hotel-form" role="form" action="hotel-post.php" method="POST" enctype="multipart/form-data">
                        <?php 
                        while ($hotelResult=mysqli_fetch_assoc($editHotelQuery)) { ?>

						<div>
							<label class="col s4">Hotel Name</label>
							<div class="input-field col s8">
								<input type="text"  class="validate is_validate" id="hotel_name" name="hotel_name" data-error=".errorTxt5"  required value="<?php echo $hotelResult['hotel_name']; ?>">
								<div class="errorTxt5"></div>
								
							</div>
						</div>

						<div>
							<label class="col s4">Address Line 1</label>
							<div class="input-field col s8">
								<input type="text"  class="validate is_validate" name="hotel_addres1" required value="<?php  echo $hotelResult['hotel_addres1'];  ?>"> </div>
						</div>
						<div>
							<label class="col s4">Address Line 2</label>
							<div class="input-field col s12">
								<input type="text" class="validate " name="hotel_addres2" value="<?php  echo $hotelResult['hotel_addres2'];  ?>"> </div>
						</div>

						<div class="row">
							<div  class="col-md-6">
								<label>City</label>
								<input id="first_name" type="text" name="hotel_city" class="input-field validate is_validate" required value="<?php  echo $hotelResult['hotel_city'];  ?>">
							</div>

							<div  class="col-md-6">
								<label>Province</label>
								<input id="last_name" type="text" name="hotel_province" class="input-field validate is_validate" required value="<?php  echo $hotelResult['hotel_province'];  ?>">
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label >Phone Number</label>
								<input type="number"  class="input-field validate is_validate" name="hotel_phone" required value="<?php  echo $hotelResult['hotel_phone'];  ?>">
							</div>
							<div class="col-md-6">
								<label >Fax Number</label>
								<input type="number"  class="input-field validate" name="hotel_fax" value="<?php  echo $hotelResult['hotel_fax'];  ?>">
							</div>

						</div>

      					<div>
							<label class="col s4">Email Address</label>
							<div class="input-field col s8">
								<input type="email"  class="validate is_validate" name="hotel_email"  required value="<?php  echo $hotelResult['hotel_email'];  ?>"> </div>
						</div>


						
						<div>
							<label class="col s4">Website</label>
							<div class="input-field col s8 web">
                                <label>https://</label>
								<input type="url"  class="validate " name="hotel_web" value="<?php  echo $hotelResult['hotel_web'];  ?>"></div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label>Check In Time</label>
								<input type="text" class="timepicker" id="checkIn" name="hotel_checkin" value="<?php  echo $hotelResult['hotel_checkin'];  ?>">
							</div>
							<div class="col-md-6">
								<label>Check Out Time</label>
								 <input type="text" class="timepicker" id="checkOut" name="hotel_checkout" value="<?php  echo $hotelResult['hotel_checkout'];  ?>"> 
							</div>
						</div>
							<div class="imgVeiwinline row" id="hotel_img_wrap">
							<?php
							
							while ($imgResult=mysqli_fetch_assoc($editHotelImgQuery)) {

							 
								if (!empty($imgResult['common_image'])) {?>
                                    <div class="imgeWrap">
                                    <a class="deletIMG" onclick="deletIMG(event)"  data-value="<?php echo $imgResult['common_imgvideo_id']?>" data-img="<?php echo $imgResult['common_image'] ?>" ><i class="fa fa-times" aria-hidden="true"></i></a>
								 	<img src="../<?php echo $imgResult['common_image']  ?>" width="150" class="materialboxed">
								 	</div>&nbsp;&nbsp;
								 	
                                   
								<?php } ?>

                               
                              

						<?php	}

							?>
						</div>
						<div class="row">
							<div class="col-md-6">
								<!-- Modal Trigger -->
							<a class="waves-effect waves-light btn modal-trigger spc-modal" href="#modal-images" >Hotel Interior Photos</a>
							<input type="hidden" name="common_image" id="img_ids">
							</div>
							<div class="col-md-6">
								<a class="waves-effect waves-light btn modal-trigger spc-modal" href="#modal-extimg">Hotel Exterior  Photos</a>
								<input type="hidden" name="common_image" id="img_extids">

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

					   
                           											
							<div class="row  common-top clearfix">
								 
									<div class="col s6 dumi_vid_btn" id="pro-file-upload"> <span>HOTEL PROMOTIONAL VIDEO</span></div>
										<input type="text" placeholder="Upload Promotional video URL" name="common_video" class="input-field validate col s5 dumi_vid_inpt">
							</div>
						
						<div class="common-top">
							<label class="col s4">Hotel Description</label>
							<textarea id="hotel-desp" name="hotel_descrp" class="materialize-textarea is_validate" > <?php  echo $hotelResult['hotel_descrp'];  ?></textarea>
						</div><br><br>






                        <div class="row" >
                        	<div class="col-md-6  input-field" id="pick_select" >
                        		
                        		<select  onchange="yesCheck(this)" name="hotel_pickup" class=" " id="pik_select" data-value="<?php echo $hotelResult['hotel_pickup'];  ?>">
							     <option>Choose your option</option>
							     <option value="yes">Yes</option>
								 <option value="no">No</option>
							   </select> 
							   <label>Hotel Pickup</label>
                        	</div>
                        	<div class="col-md-6" style="display: none;" id="ifYes">
                        		<label>Pickup Charges</label>
                        		 <input type="number"  class="input-field validate is_validate" name="hotel_pikcharge" value="<?php  echo $hotelResult['hotel_pikcharge'];  ?>" >
                            </div>   
					    </div>

					    <div id="bag-char"   style="display: none;">  
                           <label class="col s6">Luggage </label>
				            <div class="input-field col s12 common-wrapper comon_dropdown_botom_line is_validate_select">
							 <select onchange="noofbags(this)" name="hotel_nobag" id="qun-lags" class="input-field validate" data-value="<?php echo $hotelResult['hotel_nobag'];  ?>">
							   <option value="" disabled selected>Choose your option</option>
							    <option value="-1">0</option>
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
								<input type="text"  class="validate"  id="bag-inpt" name="hotel_bagprice" style="display: none;"> </div>
                        		                       
                        </div>

                       
					      
						 <div class="common-top">

							<label class="col s4">Amenities:</label>
                             
                             <div class="chips chips-autocomplete" id="click_other" ><?php echo $hotelResult['hotel_other'] ?></div>
							<input type="hidden"  name="hotel_other[]" id="amenities-id" >
                              
		
						</div>

						 <div class="common-top">
                             <label class="col s4">Hotel booking cancellation Policy</label>
                            <textarea  name="hotel_policy" class="materialize-textarea is_validate"  ><?php echo $hotelResult['hotel_policy']; ?> </textarea>

                         </div>


                         <div class="common-top">
                         	<label class="col s8">Hotel’s Social Media URLs</label>
                         	<div class="row" style="margin-top: 10px;">
                         		<div class="col-md-6">                         			
                         			<label> Hotel’s Facebook</label>
								       <input type="text"  class="validate input-field" name="hotel_fburl" value="<?php echo $hotelResult['hotel_fburl']; ?>">

							    </div>
                         		<div class="col-md-6">
                         			<label>Hotel’s Twitter</label>
								      <input type="text"  class="validate input-field" name="hotel_twurl" value="<?php echo $hotelResult['hotel_twurl']; ?>">
                         		</div>
                         	</div>
                         	<div class="row" style="margin-top: 10px;">
                         		<div class="col-md-6">
                         				<label>Hotel’s Google Plus</label>
								       <input type="text"  class="validate input-field" name="hotel_gourl" value="<?php echo $hotelResult['hotel_gourl']; ?>">
                         		</div>
                         		<div class=" col-md-6">
                         				<label>Hotel’s Instagram</label>
								       <input type="text"  class="validate input-field" name="hotel_insurl" value="<?php echo $hotelResult['hotel_insurl']; ?>">
                         		</div>
                         		
                         	</div>
                         	<div class="row" style="margin-top: 10px;">
                         		<div class="col-md-6">
                         				<label>Hotel’s Pinterest</label>
								       <input type="text"  class="validate input-field" name="hotel_pinurl" value="<?php echo $hotelResult['hotel_pinurl']; ?>">
                         		</div>
                         		<div class="col-md-6">
                         				<label>Hotel’s Youtube</label>
								       <input type="text"  class="validate input-field" name="hotel_yuturl" value="<?php echo $hotelResult['hotel_yuturl']; ?>">
                         		</div>
                         		
                         	</div>
                         </div> 

						<div>
							<div class="input-field col s8">
								<input type="submit"  value="Add" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
						</div>
                 
                 <?php
 }
?>
					</form>

				</div>
              
					</div>
					
				</div>
			</div>

			<!-- Modal Structure -->
			<div id="modal-images" class="modal modal-fixed-footer image_drop_down_modal_body">
				<div class="modal-content">
					<div class="modal-header"><h2>Upload  Photos</h2></div>
				<iframe src="up_load_img.php?name=interior"></iframe>
                   <div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Done</a>
				</div>
		   </div>
		   </div>

		   <!-- Modal Structure -->
			<div id="modal-extimg" class="modal modal-fixed-footer image_drop_down_modal_body">

				<div class="modal-content">
						<div class="modal-header"><h2>Upload Exterior Photos</h2></div>
				<iframe src="up_load_img.php?name=exterior"></iframe>
                   <div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Done</a>
				</div>
		   </div>
		   </div>

		   <!-- Modal Structure -->
			<div id="modal-coverimg" class="modal modal-fixed-footer image_drop_down_modal_body" style="width: 50%; margin: 0 auto; box-shadow:none;" >

				<div class="modal-content">
						<div class="modal-header"><h2>Upload Cover Photo</h2></div>
				<iframe src="up_load_cover.php"></iframe>
                   <div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Done</a>
				</div>
		   </div>
		   </div>



		   <?php  include"../footer.php";  ?>




		   <script>
   tinymce.init({ selector:'textarea' });





  function yesCheck(that) {
        if (that.value == "yes") {
            // alert("check");
             document.getElementById("ifYes").style.display = "block";
             document.getElementById("bag-char").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
            document.getElementById("bag-char").style.display = "none";
            document.getElementById("1bag").style.display = "none";
    		document.getElementById("2bags").style.display = "none";
    		document.getElementById("3bags").style.display = "none";
    		document.getElementById("4bags").style.display = "none";
    		document.getElementById('bag-inpt').style.display = "none";
    		  
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


jQuery(document).ready(function(){


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





$("#hotel-form").validate({

         errorElement : 'div',
        errorPlacement: function(error, element) {

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




 $('#checkIn').pickatime();

$('#checkOut').pickatime();








});




    

</script>

	
</body>

  
  

<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>