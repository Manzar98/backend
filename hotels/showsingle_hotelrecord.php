<?php
 include '../common-apis/api.php';
 
 $showHotelQuery=select('hotel',array('hotel_id'=>46));

 

 	// print_r($hotelResult);
 	# code...
 


 $editHotelImgQuery=select('common_imagevideo',array('hotel_id'=>46));

 while ($imgResult=mysqli_fetch_assoc($editHotelImgQuery)) {
 	// print_r($imgResult);
 	$emptyArray[] = $imgResult;

 	
 	# code...
 }

// echo "<br>".$emptyArray[0]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[1]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[2]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[3]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[4]['common_imgvideo_id']."<br>" ;
// echo "<br>".$emptyArray[5]['common_imgvideo_id']."<br>" ;
  // print_r($emptyArray);
print_r(array_column($emptyArray, 'common_imgvideo_id'));

 // while ($emptyArray > 1) {

 // 	echo $emptyArray['common_imgvideo_id'];
 // 	# code...
 // }


?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>

     <?php  while ($hotelResult=mysqli_fetch_assoc($showHotelQuery)) {     ?>
	<title>Detail of <?php echo $hotelResult['hotel_name']; ?> </title>


<?php include '../header.php'; ?>


<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../images/icon/dbc5.png" alt=""/> Detail of <?php echo $hotelResult['hotel_name']; ?> </h3>
							<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
						</div>
						 
                         <div class="hotelVeiw">
                            
                             <div class="row">
                             	<span><b>Hotel Name :</b></span>
                             	<span><?php echo $hotelResult['hotel_name']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Address Line 1 :</b></span>
                             	<span><?php echo $hotelResult['hotel_addres1']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Address Line 2:</b></span>
                             	<span><?php echo $hotelResult['hotel_addres2']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>City :</b></span>
                             	<span><?php echo $hotelResult['hotel_city']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Province :</b></span>
                             	<span><?php echo $hotelResult['hotel_province']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Phone Number :</b></span>
                             	<span><?php echo $hotelResult['hotel_phone']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Fax Number :</b></span>
                             	<span><?php echo $hotelResult['hotel_fax']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Email Address :</b></span>
                             	<span><?php echo $hotelResult['hotel_email']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Website :</b></span>
                             	<span><?php echo $hotelResult['hotel_web']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Check In :</b></span>
                             	<span><?php echo $hotelResult['hotel_checkin']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Check Out :</b></span>
                             	<span><?php echo $hotelResult['hotel_checkout']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel Description :</b></span>
                             	<span><?php echo $hotelResult['hotel_descrp']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel Pickup? :</b></span>
                             	<span><?php echo $hotelResult['hotel_pickup']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Pickup Charges :</b></span>
                             	<span><?php echo $hotelResult['hotel_pikcharge']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Amenities :</b></span>
                             	<span><?php echo $hotelResult['hotel_other']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel booking cancellation Policy  :</b></span>
                             	<span><?php echo $hotelResult['hotel_policy']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel’s Facebook :</b></span>
                             	<span><?php echo $hotelResult['hotel_fburl']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel’s Twitter :</b></span>
                             	<span><?php echo $hotelResult['hotel_twurl']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel’s Google Plus :</b></span>
                             	<span><?php echo $hotelResult['hotel_gourl']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel’s Instagram :</b></span>
                             	<span><?php echo $hotelResult['hotel_insurl']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel’s Pinterest :</b></span>
                             	<span><?php echo $hotelResult['hotel_pinurl']."."; ?></span>
                             </div>
                             <div class="row">
                             	<span><b>Hotel’s Youtube :</b></span>
                             	<span><?php echo $hotelResult['hotel_yuturl']."."; ?></span>
                             </div>
                       <?php } ?>

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