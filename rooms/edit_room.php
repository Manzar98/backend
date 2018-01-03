<?php
 include '../common-apis/api.php';
 // $emptyArray=array();
 // $editHotelQuery=select('room',array('hotel_id'=>46));

 



 // $editHotelImgQuery=select('common_imagevideo',array('hotel_id'=>46));

 // while ($imgResult=mysqli_fetch_assoc($editHotelImgQuery)) {
 // 	// print_r($imgResult);
 // 	$emptyArray[] = $imgResult;

 	
 	
 // }

 // echo "<br>".$emptyArray[0]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[1]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[2]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[3]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[4]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[5]['common_imgvideo_id']."<br>" ;
  // print_r($emptyArray);
// print_r(array_column($emptyArray, 'common_imgvideo_id'));


  // while ($emptyArray < 1) {

  // 	print_r($emptyArray[0]) ;
  	
  // }

// print_r($emptyArray);

?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Edit Room</title>


<?php include '../header.php'; ?>


<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
						<div class="db-cent-table db-com-table">
							<div class="db-title">
								<h3><img src="../images/icon/dbc5.png" alt=""/> Add Rooms</h3>
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have8suffered alteration in some form</p>
							</div>

							<div class="db-profile-edit">
								<form class="col s12"  data-toggle="validator" id="room-form" role="form" action="room-post.php" method="POST" enctype="multipart/form-data">

									<?php

									if (mysqli_num_rows($selectHotelQuery) > 0) { ?>
									<div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select"  >
										<label class="col s12">Select Hotel</label>
										<select  class="" name="hotel_name" >
											<option value="">Select One</option>
											<?php

											while ($result=mysqli_fetch_assoc($selectHotelQuery)) { ?>


											<option name="" value="<?php echo $result['hotel_name'] ?>"><?php echo $result['hotel_name'] ?></option>


						    <?php	# code...
						}  ?>
					</select>
				</div>
				<?php  }  ?>





				<div class="common-top">
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
							<select  class="" name="room_service" >
								<option value="" disabled selected>Select One</option>
								<option value="yes">Yes</option>
								<option value="no">No</option>

							</select>
							
						</div>
						
						<div class="row common-top">           
							<div class=" col-md-6" >
								<label>Maximum adults allowed in one room</label>
								<input type="number" value="" class="input-field validate" name="room_maxadult" required>  
							</div>
							<div class=" col-md-6">
								<label>Extra mattress charges for adults</label>
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
								<input type="number" name="room_offerdiscount" class="input-field validate">
							</div>
							<div class="col-md-6">
								<label>Expires on</label>
								<input type="text" id="expireDate" class="input-field from" name="room_expireoffer">
							</div>
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
							<textarea name="room_descrip" required></textarea>
						</div><br>


						<div class="common-top">
							<label class="col s4">Amenities:</label>

							<div class="chips chips-autocomplete"></div>
							<input type="hidden"  name="room_other[]" id="amenities-id">
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