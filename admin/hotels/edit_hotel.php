<?php
include '../../common-apis/reg-api.php';

$editHotelQuery=select('hotel',array('hotel_id'=>$_GET['id']));


$global_hotel_id="";


?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
	<?php 
while ($hotelResult=mysqli_fetch_assoc($editHotelQuery)) { 

    $editHotelImgQuery=select('common_imagevideo',array('hotel_id'=>$hotelResult['hotel_id']));
	?>




<title>Edit Hotel</title>


<?php include '../header_inner_folder.php'; 

include'../../methods/general_amenities.php'; ?>



<div class="db-cent-3">
<div class="db-cent-table db-com-table">
<div class="db-title">
<h3><img src="../../images/icon/dbc5.png" alt=""/> Edit Hotel</h3>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
</div>

<div class="db-profile-edit">
<form class="col s12"  data-toggle="validator" id="hotel-form" role="form" action="" method="POST" enctype="multipart/form-data">

<input type='hidden' value='<?php echo $hotelResult['hotel_id']; ?>' id="h_Id" name="hotel_id" />
<input type='hidden' value='<?php echo $hotelResult['user_id']; ?>' name="user_id" />
<?php $global_hotel_id= $hotelResult['hotel_id']; ?>

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
		<input type="url"  class="validate " name="hotel_web" value="<?php  echo $hotelResult['hotel_web'];  ?>"></div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<label>Check In Time</label>
			<input type="text" class="timepicker" id="checkIn" required="" name="hotel_checkin" value="<?php  echo $hotelResult['hotel_checkin'];  ?>">
		</div>
		<div class="col-md-6">
			<label>Check Out Time</label>
			<input type="text" class="timepicker" id="checkOut" required="" name="hotel_checkout" value="<?php  echo $hotelResult['hotel_checkout'];  ?>">  
		</div>
	</div>
	    <div class="imgVeiwinline row" id="hotel_img_wrap" style="display: none;">
			    <div class="row int_title"><label>Interior Photos :</label></div>
							 
		</div>
		<div class="imgVeiwinline row" id="hotel_img_exe_wrap" style="display: none;">
				<div class="row int_title"><label>Exterior Photos :</label></div>
		</div>

<?php
		while ($imgResult=mysqli_fetch_assoc($editHotelImgQuery)) {?>
                    

            
           <?php if (!empty($imgResult['hotel_coverimg'])) { ?>
			<div class="row" id="hotel_cover_img" >
		<div class="row int_title"><label>Cover Photo :</label></div>
    
				<div class="imgeWrap" style="float: left; padding-right:5px; padding-bottom:5px;">
				<a class="deletIMG" onclick="deletIMG(event)"  data-value="<?php echo $imgResult['common_imgvideo_id']?>" data-img="<?php echo $imgResult['hotel_coverimg'] ?>" ><i class="fa fa-times" aria-hidden="true"></i></a>
				<img src="../<?php echo $imgResult['hotel_coverimg']  ?>" style="height: 100px; width: 150px;" class="materialboxed">
			</div>&nbsp;&nbsp;
		</div>
	<?php   } ?>
          



			<?php	}

			?>
		
      



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

		<div class="common-top clearfix">
								 
									
								<label class="col s4">Hotel Promotional Video (url)</label>
								<div class="input-field col s8">
									<input type="text"  class="" name="common_video"  ></div>
						    </div>


		

		<div class="common-top">
			<label class="col s4">Hotel Description</label>
			<textarea id="hotel-desp" name="hotel_descrp" class="materialize-textarea is_validate" > <?php  echo $hotelResult['hotel_descrp'];  ?></textarea>
		</div><br><br>






		<div class="row" >
			<div class="col-md-  input-field edit_pick_select" id="pick_select" >

				<select  onchange="yesCheck(this)" name="hotel_pickup" class=" " id="pik_select" data-value="<?php echo $hotelResult['hotel_pickup'];  ?>">
					<option>Choose your option</option>
					<?php if ($hotelResult['hotel_pickup']== "yes") { ?>
					<option selected="" value="yes">Yes</option>
					<option  value="no">No</option>
					<?php }else{ ?>
					<option value="yes">Yes</option>
					<option selected="" value="no">No</option>
					<?php  }   ?>

				</select> 
				<label style="padding-top: 17px;">Pickup Offered?</label>
			</div>

			

		</div>
		<div class="row">
			<div class="" id="transport" style="padding-top: 10px;display: none;">
				
				<div class="col-md-6" id="fil_air" >
						            <p class="pTAG">
						            	<input type="hidden" name="hotel_isair" id="hotel_isair">
						            	<?php if ($hotelResult['hotel_isair']=='on') { ?>

						            	<input type="checkbox" class="filled-in" id="filled-in-airport"  checked="" />
						             <label for="filled-in-airport" id="air">Airport</label>	
						            <?php 	}else{ ?>

						            <input type="checkbox" class="filled-in" id="filled-in-airport"   />
						             <label for="filled-in-airport" id="air">Airport</label>
						           <?php  }  ?>
						             
						            </p>
         						</div>
         						<div class="col-md-6" id="fil_bus">
						            <p class="pTAG">
						            	<input type="hidden" name="hotel_isbus" id="hotel_isbus">
						            	<?php if ($hotelResult['hotel_isbus']=='on') { ?>

						            	 <input type="checkbox" class="filled-in" id="filled-in-bus"  checked="" />
						             <label for="filled-in-bus">Bus station</label>
						            <?php 	}else{ ?>

						             <input type="checkbox" class="filled-in" id="filled-in-bus"  />
						             <label for="filled-in-bus">Bus station</label>
						          <?php  }  ?>
						             
						            </p>
         						</div>
			</div>  
		</div>



		<div class="row">
			<div class="col-md-6" >
				<div class="" style="display: none;" id="ifYes">
					<label>Charges</label>
					<input type="number" id="hotel_pikcharge" class="input-field validate is_validate" name="hotel_pikcharge" value="<?php  echo $hotelResult['hotel_pikcharge'];  ?>">
				</div>
			</div>
			<div class="col-md-6" id="buschgr" style="display: none;">
				
				<label>Charges</label>
                <input type="number" id="hotel_buscharge" class="input-field validate " name="hotel_buscharge" value="<?php  echo $hotelResult['hotel_buscharge'];  ?>">
			</div>
		</div>


		<div id="bag-char"   style="display: none;">  
			<label class="col s6">Luggage </label>
			<div class="input-field col s12 common-wrapper comon_dropdown_botom_line is_validate_select">
				<select onchange="noofbags(this)" name="hotel_nobag" id="qun-lags" class="input-field validate" data-value="<?php echo $hotelResult['hotel_nobag'];  ?>">
					<option value="" disabled selected>Choose your option</option>
					<?php if ($hotelResult['hotel_nobag']== 1) { ?>

					<option value="" disabled >Choose your option</option>
					<option selected="" value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>


					<?php }elseif ($hotelResult['hotel_nobag']== 2) { ?>

                    <option value="" disabled >Choose your option</option>
					<option  value="1">1</option>
					<option selected="" value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>

					<?php }elseif ($hotelResult['hotel_nobag']== 3) { ?>

					<option value="" disabled >Choose your option</option>
					<option  value="1">1</option>
					<option  value="2">2</option>
					<option selected="" value="3">3</option>
					<option value="4">4</option>

					<?php }elseif ($hotelResult['hotel_nobag']== 4) { ?>

					<option value="" disabled >Choose your option</option>
					<option  value="1">1</option>
					<option  value="2">2</option>
					<option  value="3">3</option>
					<option selected="" value="4">4</option>

					<?php }else{ ?>
                              
                    <option value="" disabled selected="">Choose your option</option>
					<option  value="1">1</option>
					<option  value="2">2</option>
					<option  value="3">3</option>
					<option  value="4">4</option>

					<?php }                ?>

				</select>		    
			</div>
		</div>

		<div class="common-top">

			<label class="col s4" id="1bag" style="display: none;">1 bag charges</label>
			<label class="col s4" id="2bags" style="display: none;">2 bags charges</label>
			<label class="col s4" id="3bags" style="display: none;">3 bags charges</label>
			<label class="col s4" id="4bags" style="display: none;">4 bags charges</label>
			<div class="input-field col s8">
				<input type="number"  class="validate"  id="bag-inpt" name="hotel_bagprice" style="display: none;" value="<?php echo $hotelResult['hotel_bagprice'] ?>"> </div>

			</div>



			<div class="common-top">

				<label class="col s4">Amenities:</label>

				<div class="chips chips-autocomplete" id="click_other" >
					
			</div>
			<input type="hidden"  name="hotel_other" id="amenities-id" value="<?php echo $hotelResult['hotel_other']; ?>" >
			



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

	<div class="row" >
                         	
						           <p class="pTAG inactive_checkbox">
						           	<input type="hidden" name="hotel_inactive" id="hidden_checkbox">
						            	<?php if ($hotelResult['hotel_inactive']=='on') { ?>

						            	 <input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="" checked=""  />
						             <label for="filled-in-inactive">Inactive</label>
						             
						            <?php 	}else{ ?>

						            <input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="" />
						             <label for="filled-in-inactive">Inactive</label>
						          <?php  }  ?>
						             
						            </p>
						             
         						</div>

	<div>
		<div class="input-field col s8">
			<input type="button"  value="Update" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
		</div>

		<?php
	}
	?>
</form>

<div class="col s8" id="btn-loader" style="display: none;">
						 <div class="preloader-wrapper big active">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
					</div>



</div>

</div>

</div>
</div>

<!-- Modal Structure -->
<div id="modal-images" class="modal modal-fixed-footer image_drop_down_modal_body interior_wrap">
<div class="modal-content">
<div class="modal-header"><h2>Upload Interior  Photos</h2></div>
<iframe src="up_load_img.php?name=interior&p=edit&t=int-hotel&h_id=<?php echo $global_hotel_id; ?>" id="int_iframe"></iframe>
<div class="modal-footer">
<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat int_done">Done</a>
</div>
</div>
</div>

<!-- Modal Structure -->
<div id="modal-extimg" class="modal modal-fixed-footer image_drop_down_modal_body exterior_wrap">

<div class="modal-content">
<div class="modal-header"><h2>Upload Exterior Photos</h2></div>
<iframe src="up_load_img.php?name=exterior&p=edit&t=ext-hotel&h_id=<?php echo $global_hotel_id; ?>" id="ext_iframe"></iframe>
<div class="modal-footer">
<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ext_done">Done</a>
</div>
</div>
</div>

<!-- Modal Structure -->
<div id="modal-coverimg" class="modal modal-fixed-footer image_drop_down_modal_body cover_wrap" style="width: 50%; margin: 0 auto; box-shadow:none;" >

<div class="modal-content">
<div class="modal-header"><h2>Upload Cover Photo</h2></div>
<iframe src="up_load_cover.php?c=edit&t=cover&cov_id=<?php echo $global_hotel_id; ?>"></iframe>
<div class="modal-footer">
<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Done</a>
</div>
</div>
</div>

<?php include '../../common-ftns/submitting-modal.php'; ?>
<div id="toast-container"></div>
<?php  include"../footer_inner_folder.php";  ?>

<script src="../../js/hotel-js/hotel.js"></script>
<script src="../../js/hotel-js/images.js"></script>
<script>
 Materialize.toast('Loading images')
tinymce.init({ selector:'textarea' });





function yesCheck(that) {
if (that.value == "yes") {
            // alert("check");
              document.getElementById("transport").style.display = "block";
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

var ameinty_obj=[];
var amenity= $('#amenities-id').val().split(",");

for (var i = 0; i < amenity.length; i++) {
	      // console.log(amenity[i]);
	      ameinty_obj.push({"tag":amenity[i]});
}

 var am_obj=[];
   var am_data=$('#amenities-input_wrap').val().split(',');
   // console.log(am_data);

 for (var i = 0; i < am_data.length; i++) {
	      
	      am_obj[am_data[i]] = "";
}


// console.log(ameinty_obj);
$('.chips-autocomplete').material_chip({
	data : ameinty_obj,
autocompleteOptions: {
 data : am_obj,
limit: Infinity,
minLength: 1
}
});


$('#modal-extimg').modal({dismissible: false});
$('#modal-coverimg').modal({dismissible: false});
$('#checkIn').pickatime();
$('#checkOut').pickatime();


/*==============================
   Reintialize dropdowns hide Inputs,dropdown
============================== */

if($('#qun-lags :selected').text() == "1"){

 
document.getElementById("1bag").style.display = "block";
document.getElementById('bag-inpt').style.display = "block";
document.getElementById("2bags").style.display = "none";
document.getElementById("3bags").style.display = "none";
document.getElementById("4bags").style.display = "none";

} 

else if ($('#qun-lags :selected').text() == "2") {
document.getElementById("1bag").style.display = "none";
document.getElementById('bag-inpt').style.display = "block";
document.getElementById("2bags").style.display = "block";
document.getElementById("3bags").style.display = "none";
document.getElementById("4bags").style.display = "none";
}
else if ($('#qun-lags :selected').text() == "3") {
document.getElementById("1bag").style.display = "none";
document.getElementById('bag-inpt').style.display = "block";
document.getElementById("2bags").style.display = "none";
document.getElementById("3bags").style.display = "block";
document.getElementById("4bags").style.display = "none";
}
else if($('#qun-lags :selected').text() == "4"){
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


if ($('#pik_select :selected').text() == "Yes") {
           
              document.getElementById("transport").style.display = "block";
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
    		

    		  
        }
    
    if ($("#fil_air input:checkbox:checked").length > 0){

       $('#ifYes').show();
    }else{

    	$('#ifYes').hide();

    }


 if ($("#fil_bus input:checkbox:checked").length > 0) {

        $('#buschgr').show();

 }else{

 	   $('#buschgr').hide();
 	   
 }


});





</script>


</body>




<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>