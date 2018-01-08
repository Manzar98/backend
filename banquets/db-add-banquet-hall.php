<?php
 include '../common-apis/api.php';


$selectHotel = 'SELECT `hotel_name` FROM `hotel` WHERE `user_id`=2 ';


$selectHotelQuery=mysqli_query($conn,$selectHotel) or die(mysqli_error($conn));

?>





<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<title>Add a Banquet Hall</title>

  <?php include '../header.php';?>

  <div class="db-cent">
    <div class="db-cent-1">
     <p>Hi Jana Novakova,</p>
     <h4>Welcome to your dashboard</h4> </div>
     <div class="db-cent-3">
       <div class="db-cent-table db-com-table">
        <div class="db-title">
         <h3><img src="../images/icon/dbc5.png" alt=""/> Add Banquet Halls</h3>
         <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
       </div>

       <div class="db-profile-edit">
         <form class="col s12"  data-toggle="validator" id="banquet-form" role="form" action="banquet-post.php" method="POST" enctype="multipart/form-data"> 

          <div>
            <label class="col s12">Banquet Hall name </label>
            <div class="input-field col s12">
             <input type="text"   value="" name="banquet_name" class="validate is_validate_input" required> 
           </div>
         </div>

         <div>
           <label class="col s12">Capacity</label>
           <div class="input-field col s12">
            <input type="number" name="banquet_space"   class="validate is_validate_input" required> 
          </div>
        </div>

        <div>

         <div class="common-top">

          <label>Base Booking Charges</label>
          <input type="number" value="" name="banquet_charges" class="input-field validate " required> 

        </div>
        <div class="common-top">
          <label >Hall Booking Charges :</label>
        </div>
        <div class="row"> 

          <div class="col-md-6 with_aricon" >
           <p class="pTAG">
             <input type="checkbox" class="filled-in" id="filled-in-aricon" name="banquet_isaircon" />
             <label for="filled-in-aricon">Aircon?</label>
           </p>
         </div>
         <div class=" col-md-6" >
          <div class="with_ari" style="display: none;">
           <label >Charges</label>
           <input type="number" value="" name="banquet_aricon" class="input-field validate "> 
         </div>
       </div>

     </div>                  
   </div>




   <div>

    <div class="row">

     <div class="col-md-6 with_generator clearfix" >
       <p class="pTAG">
         <input type="checkbox" class="filled-in" id="filled-in-gen"  name="banquet_isgen" />
         <label for="filled-in-gen">Generator?</label>
       </p>
     </div>
     <div class="col-md-6">
      <div class="with_gent" style="display: none;">
       <label>Charges</label>
       <input type="number" value="" name="banquet_generator" class="input-field validate ">
     </div>
   </div>

 </div>
</div>

<div class="col s12 common-wrapper comon_dropdown_botom_line" id="bn-serv common-top"  >

 <label class="col s12">Serve Food ?</label>
 <select onchange="chk_food(this)"  class="" name="banquet_serve">
  <option value="-1">Select One</option>
  <option value="yes">Yes</option>
  <option value="no">No</option>

</select>
</div>

<div id="menupackage-wrap" style="display: none;" class="common-top">

 <ul class="collapsible def-show-menu" data-collapsible="accordion">
   <li>
    <div class="collapsible-header  active">Menu</div>
    <div class="collapsible-body"> 
     <div class="row">
     <div class="col-md-6">
       <label>Package Name</label>
       <input type="text" value="" class="input-field validate" name="foodpkg_name[]">
     </div>
     <div class="col-md-6">
     <label>Package Price</label>
     <input type="number" value="" class="input-field validate" name="foodpkg_price[]">
   </div> 
   </div>

   <div class="row">
    <div class="col-md-6">
     <label >Discount Percentage</label>
     <input type="number" value="" class="input-field validate" name="foodpkg_discount[]" style="padding-top: 18px;">
   </div>   
   <div class="col-md-6">
     <label>Package Items</label>
  <div class="input-field ">
   <div class="chips-packageitem chips-package" id="chips-packageitem-1"  name=""> </div>
   <input type="hidden" name="foodpkg_item[]" id="input_chips-packageitem-1" class="menupkg-id"> </div>
   </div>						
 </div>

</div>
</li>
</ul>

<div  class=" ">
 <a class="waves-effect waves-light btn " onclick="gen_menupackage_input(event)">Add More Package</a>
</div>
</div> 



<div class="row common-top" >
 <div class="col-md-6 common-wrapper comon_dropdown_botom_line" id="gathr_type">
  <label> Gathering Type <strong>?</strong></label>
  <select name="banquet_gathering">
    <option value="-1">Select One</option>
    <option value="mixed">Mixed</option>
    <option value="separate">Separate</option>
  </select>
</div>
<div class="col-md-6">
  <label>Additional Cost</label>
  <input type="number" value="" name="banquet_adcost" class="input-field validate" style="padding-top: 15px;">
</div>
</div>

<div class="row">
  <div class="col-md-6">
   <label>Offer Discount (%)</label>
   <input type="number" name="banquet_offerdiscount" class="input-field validate">
 </div>
 <div class="col-md-6">
   <label>Expires on</label>
   <input type="text" id="expireDate" class="input-field from" name="banquet_expireoffer">
 </div>
</div> 

<div class="imgVeiwinline row" id="hotel_img_wrap">
               
</div>


<div class="row common-top">
 <div class="">
  <!-- Modal Trigger -->
  <div class="col s1"></div>
  <a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-images" >Banquet Photos</a>
  <input type="hidden" name="common_image" id="img_ids">
</div>
</div>

<div class="row  common-top clearfix">

 <div class="col s6 dumi_vid_btn" id="pro-file-upload"> <span>HALL's PROMOTIONAL VIDEO</span></div>
 <input type="text" placeholder="Upload Promotional video URL" name="common_video" class="input-field validate col s5 dumi_vid_inpt is_validate_input" required>
</div>
<div class="common-top">
 <label class="col s4">Hall Description</label>
 <textarea name="banquet_descrip" class="input-field validate is_validate_input" required></textarea>
</div>

<div class="common-top">
 <label class="col s4">Amenities:</label>

 <div class="chips chips-autocomplete chips_amenities"></div>
 <input type="hidden"  name="banquet_other[]" id="amenities-id">
</div><br><br>


<div id="dates_wrap">
 <div class="row">
  <label class="col s6">Unavailable in these days</label>


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

<div class="col s12 common-wrapper comon_dropdown_botom_line" id="bn-serv common-top"  >

 <label class="col s12">Independent Hall?</label>
 <select onchange="hall_alone(this)"  class="" name="banquet_independ">
  <option value="-1">Select One</option>
  <option value="yes">Yes</option>
  <option value="no">No</option>

</select>
</div>

<?php

if (mysqli_num_rows($selectHotelQuery) > 0) { ?>
<div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select" style="display: none;" id="show_hotelName" >
  <label class="col s12">Select Hotel</label>
  <select  class="" name="hotel_name" >
   <option value="null" selected="" disabled="">Select One</option>
   <?php

   while ($result=mysqli_fetch_assoc($selectHotelQuery)) { ?>


   <option name="" value="<?php echo $result['hotel_name'] ?>"><?php echo $result['hotel_name'] ?></option>


						    <?php	# code...
              }  ?>
            </select>
          </div>
          <?php  }  ?>






          <div id="hall_alone" style="display: none;">
            <div class="row common-top">
             <div class="col-md-6">
              <label>Address</label>
              <input  type="text" name="banquet_address" class="input-field validate"  >
            </div>
            <div class="col-md-6">
              <label>City</label>
              <input  type="text" name="banquet_city" class="input-field validate"  >
            </div>

          </div>

          <div class="row">
           <div class="col-md-6">
            <label>Province</label>
            <input  type="text" name="banquet_province" class="input-field validate"  >
          </div>
          <div class="col-md-6">
            <label>Phone Number</label>
            <input  type="number" name="banquet_phone" class="input-field validate"  >
          </div>

        </div>

        <div class="row">
         <div class="col-md-6">
          <label>Email Address</label>
          <input  type="email" name="banquet_email" class="input-field validate"  >
        </div>
        <div class="col-md-6">
          <label>Facebook</label>
          <input  type="text" name="banquet_fcbok" class="input-field validate"  >
        </div>

      </div>

      <div class="row">
       <div class="col-md-6">
        <label>Twitter</label>
        <input  type="text" name="banquet_twiter" class="input-field validate"  >
      </div>
      <div class="col-md-6">
        <label>Youtube</label>
        <input  type="text" name="banquet_utube" class="input-field validate"  >
      </div>

    </div>
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




<?php include '../footer.php';?>



<script type="text/javascript">
  jQuery(document).ready(function(){

    tinymce.init({ selector:'textarea' });

		// $('#modal-images').modal();



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

   $('#chips-packageitem-1').material_chip({
    autocompleteOptions: {
      data: {
        'Naan': null,
        'Thai': null,
        'Meat': null,
        'drinks': null
      },
      limit: Infinity,
      minLength: 1
    }
  });

   $('#pro-sub-btn').click(function(){
    debugger;
    var isFormValidated = true;
    $.each($('#banquet-form .is_validate_input'),function(key,val){
      if(!val.value){
       isFormValidated = false;
       console.log(val);
       $(val).addClass('error');	
     }else{
      debugger;
      $(val).removeClass('error');
    }
  });
	// $.each($('#banquet-form .is_validate_select'),function(key,val){
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
		$("#room-form").submit();
	}else{
		console.log('There is an error');
	}
})












   $("#banquet-form").validate({

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






 });
</script>

</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>