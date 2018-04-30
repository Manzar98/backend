<?php
include '../../common-apis/reg-api.php';
if (isset($_GET['h_id'])) {
	$edittourQuery=select('tour',array('tour_id'=>$_GET['id'],'hotel_id'=>$_GET['h_id']));
}else{
	$edittourQuery=select('tour',array('tour_id'=>$_GET['id'],'user_id'=>$_GET['u_id']));
}

$global_tour_id="";

?>



<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>

<?php
         while ($resulttour=mysqli_fetch_assoc($edittourQuery)) {
            
       $edittourImgQuery=select('common_imagevideo',array('tour_id'=>$resulttour['tour_id']));

       $edittournoofpeopleQuery=select('common_nosofpeople', array('tour_id'=>$resulttour['tour_id'])); 

       $editDesQuery=select('tour_destination',array('tour_id'=>$resulttour['tour_id']));



     

  ?>


	<title>Edit Tour Package</title>

	  <?php include '../header.php';  
	  $userId= $_SESSION["user_id"];

   $selectHotel = 'SELECT `hotel_name`,`hotel_id`  FROM `hotel` WHERE `user_id`="'.$userId.'" ';


$selectHotelQuery=mysqli_query($conn,$selectHotel) or die(mysqli_error($conn));



	  ?>


				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../../images/icon/dbc5.png" alt=""/> Edit Tour Package</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						 
                         <div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="tour-form" role="form" action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="tour_id" value="<?php echo $resulttour['tour_id'] ?>" id="tour-id">
						<input type="hidden" name="hotel_id" value="<?php echo $resulttour['hotel_id'] ?>" id="hotelId">
                        <input type="hidden" name="user_id" value="<?php echo $resulttour['user_id'];  ?>">
						<?php $global_tour_id=$resulttour['tour_id']; ?>

							<?php if (!empty($resulttour['hotel_id'])) {?>
      <style type="text/css">
          #dependent_wrap{
             display: none;
          }
      </style>
<?php } ?>
<div id="dependent_wrap">
                         	<div class="common-top">
								<label>Tour Independent ?</label>
								<select onchange="independ(this)" name="tour_independ" id="indipend">

                        	<?php if ($resulttour['tour_independ']== "yes") { ?>

									<option value="" disabled="" >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resulttour['tour_independ']== "no") {?>
								
								    <option value="" disabled="" >Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" selected>No</option>

							<?php }else{ ?>
								     
								    <option value="" disabled="" selected>Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" >No</option>

					        <?php	}  ?>

								</select>
							</div>

                            <?php

if (mysqli_num_rows($selectHotelQuery) > 0) { ?>
<div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select"  id="showhotelList" style="display: none;"  >
  <label class="col s12">Select Hotel</label>
  <select  class="hotelNames" name="hotel_name" >
   <option value="null" disabled="">Select One</option>
   <option selected="" value="<?php echo $resulttour['hotel_name'] ?>"><?php echo $resulttour['hotel_name'] ?></option>
   <?php

   while ($result=mysqli_fetch_assoc($selectHotelQuery)) { ?>


   <option value="<?php echo $result['hotel_name'] ?>" data-id="<?php echo $result['hotel_id']; ?>"><?php echo $result['hotel_name'] ?></option>


						    <?php	# code...
              }  ?>
            </select>
          </div>
          <?php  }  ?>

</div>
						<div>
							<label class="col s4">Package Name</label>
							<div class="input-field col s8">
								<input type="text" class="validate" name="tour_name" required value="<?php echo $resulttour['tour_name']; ?>"> </div>
						</div>
						<div>
							<label class="col s4">Final Desination</label>
							<div class="input-field col s8"> 
								<input type="text" name="tour_destinationname" id="input_chips-desti" class="validate" value="<?php echo $resulttour['tour_destinationname']; ?>"> </div>
						</div>


						<div class="row t-chckbox">
							<div class="col-md-6 hotelFod common-wrapper comon_dropdown_botom_line">
								<label>Food Included ?</label>
								<select name="tour_foodinclude" onchange="selectFod(this)" id="tour-food">

                        	<?php if ($resulttour['tour_foodinclude']== "yes") { ?>

									<option value="" disabled="" >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resulttour['tour_foodinclude']== "no") {?>
								
								    <option value="" disabled="" >Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" selected>No</option>

							<?php }else{ ?>
								     
								    <option value="" disabled="" selected>Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" >No</option>

					        <?php	}  ?>

								</select>
							</div>
							<div id="show-food">
							<div  class="col-md-2 c-food">

								<p class="brkfast">
									<input type="hidden" name="tour_brkfast" id="tour_brkfast">
									<?php if ($resulttour['tour_brkfast']=='on') { ?>

										<input type="checkbox" class="filled-in" id="filled-in-box" checked="" />
									<label for="filled-in-box">Breakfast</label>

								<?php	}else{ ?>
                                         
                                         <input type="checkbox" class="filled-in" id="filled-in-box"/>
									<label for="filled-in-box">Breakfast</label>

								<?php }   ?>
									
								</p>
								
							</div>
							<div class="col-md-2 c-food">
								
								<p class="lunch">
									<input type="hidden" name="tour_lunch" id="tour_lunch">
									<?php if ($resulttour['tour_lunch']=='on') { ?>

							               <input type="checkbox" class="filled-in" id="filled-in-lunch" checked="" />
									       <label for="filled-in-lunch">Lunch</label>

								    <?php	}else{ ?>

                                         <input type="checkbox" class="filled-in" id="filled-in-lunch"/>
									     <label for="filled-in-lunch">Lunch</label>

								    <?php }   ?>
									
								</p>
								
							</div>
							<div class="col-md-2 c-food">
								<p class="dinner">
									<input type="hidden" name="tour_dinner" id="tour_dinner">
									<?php if ($resulttour['tour_dinner']=='on') { ?>

                                           <input type="checkbox" class="filled-in" id="filled-in-diner" checked="" />
									       <label for="filled-in-diner">Dinner</label>
									<?php	}else{ ?>

									       <input type="checkbox" class="filled-in" id="filled-in-diner"/>
									       <label for="filled-in-diner">Dinner</label>

									<?php }   ?>
									
								</p>
							</div>
							</div>

						</div>


						<div class="row t-chckbox common-top">
							<div class="col-md-6 common-wrapper comon_dropdown_botom_line">
								<label>Drinks Included?</label>
								<select name="tour_drink"  onchange="selctdrink(this)" id="tour-drink">

                        	<?php if ($resulttour['tour_drink']== "yes") { ?>

									<option value="" disabled >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resulttour['tour_drink']== "no") {?>
								
								    <option value="" disabled >Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" selected>No</option>

							<?php }else{ ?>
								     
								    <option value="" disabled selected>Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" >No</option>

					        <?php	}  ?>

								</select>
							</div>
							<div id="drink-wrap">
							<div class="col-md-2 c-drink">
								<p class="aloholic">
									<input type="hidden" name="tour_aloholic" id="tour_aloholic">
									<?php if ($resulttour['tour_aloholic']=='on') { ?>

									<input type="checkbox" class="filled-in" id="filled-in-alcholic" checked="" />
									<label for="filled-in-alcholic">Alcoholic</label>
                       
                                    <?php	}else{ ?>

                                    <input type="checkbox" class="filled-in" id="filled-in-alcholic" />
									<label for="filled-in-alcholic">Alcoholic</label>

                                    <?php }   ?>
									
								</p>
								
							</div> 
							<div class="col-md-4 c-drink">
								<p class="nonaloholic">
									<input type="hidden" name="tour_nonaloholic" id="tour_nonaloholic">
									<?php if ($resulttour['tour_nonaloholic']=='on') { ?>

									<input type="checkbox" class="filled-in" id="filled-in-nonalc" checked="" />
									<label for="filled-in-nonalc">Non Alcoholic</label>

									<?php	}else{ ?>

									<input type="checkbox" class="filled-in" id="filled-in-nonalc"/>
									<label for="filled-in-nonalc">Non Alcoholic</label>

                                    <?php }   ?>
          
									
								</p>
		
							</div>
							</div>
						</div>


						<div class="row common-top">
							<div class="col-md-6"> 
								<label>Number of Days</label>
                                  <div class="input-field ">
								    <input type="number" id="bt1" class="validate" name="tour_stayday" required  value="<?php echo $resulttour['tour_stayday']; ?>"> 
								  </div>
							</div>
							<div class="col-md-6">
								<label>Number of Nights</label>
                                  <div class="input-field ">
								   <input type="number" id="bt2" class="validate" name="tour_stayni8" required  value="<?php echo $resulttour['tour_stayni8']; ?>"> 
							      </div>
							</div>

						</div>


						<div class="row">
							
							<div class="col-md-6">
								<label>Departure Date</label>
								<input type="text" id="departureDate" class="input-field " name="tour_depdate" value="<?php echo $resulttour['tour_depdate'];  ?>" required>
							</div>
							<div class="col-md-6">
								<label>Departure Time</label>
								<input type="text" class="timepicker" id="departureTime" name="tour_deptime" data-error=".errorTxt7" required="" value="<?php echo $resulttour['tour_deptime'];  ?>">
							</div>
						</div>

						<div class="row">
							
							<div class="col-md-6">
								<label>Arrival Date</label>
								<input type="text" id="arrivalDate" class="input-field " name="tour_arrdate" value="<?php echo $resulttour['tour_arrdate'];  ?>" required="">
							</div>
							<div class="col-md-6">
								<label>Arrival Time</label>
								<input type="text" class="timepicker" id="arrivalTime" name="tour_arrtime" required="" value="<?php echo $resulttour['tour_arrtime'];  ?>" required="">
							</div>
						</div>



						<div class="row t-chckbox common-top" id="t-chckbox" style="margin-bottom: 30px;">
							<div class="col-md-6" >
							<div class="hotelStr common-wrapper comon_dropdown_botom_line">
								
								  <label for="filled-in-box">Hotel Stay Stars</label>
                                    <select class="" name="tour_hotelstr">
                        	<?php if ($resulttour['tour_hotelstr']== "1") { ?>

                                    	<option value="">Select One</option>
                                    	<option value="1" selected>1</option>
                                    	<option value="2">2</option>
                                    	<option value="3">3</option>
                                    	<option value="4">4</option>
                                    	<option value="5">5</option>
                                    	<option value="6">6</option>
                                    	<option value="7">7</option>
            
							<?php	}elseif ($resulttour['tour_hotelstr']== "2") {?>
								
                                    	<option value="" >Select One</option>
                                    	<option value="1">1</option>
                                    	<option value="2" selected>2</option>
                                    	<option value="3">3</option>
                                    	<option value="4">4</option>
                                    	<option value="5">5</option>
                                    	<option value="6">6</option>
                                    	<option value="7">7</option>
            
							<?php }elseif ($resulttour['tour_hotelstr']== "3") {?>
								
                                    	<option value="" >Select One</option>
                                    	<option value="1">1</option>
                                    	<option value="2">2</option>
                                    	<option value="3" selected>3</option>
                                    	<option value="4">4</option>
                                    	<option value="5">5</option>
                                    	<option value="6">6</option>
                                    	<option value="7">7</option>
            
							<?php }elseif ($resulttour['tour_hotelstr']== "4") {?>
								
                                    	<option value="" >Select One</option>
                                    	<option value="1">1</option>
                                    	<option value="2">2</option>
                                    	<option value="3">3</option>
                                    	<option value="4" selected>4</option>
                                    	<option value="5">5</option>
                                    	<option value="6">6</option>
                                    	<option value="7">7</option>
            
							<?php }elseif ($resulttour['tour_hotelstr']== "5") {?>
								
                                    	<option value="" >Select One</option>
                                    	<option value="1">1</option>
                                    	<option value="2">2</option>
                                    	<option value="3">3</option>
                                    	<option value="4">4</option>
                                    	<option value="5" selected>5</option>
                                    	<option value="6">6</option>
                                    	<option value="7">7</option>
            
							<?php }elseif ($resulttour['tour_hotelstr']== "6") {?>
								
                                    	<option value="" >Select One</option>
                                    	<option value="1">1</option>
                                    	<option value="2">2</option>
                                    	<option value="3">3</option>
                                    	<option value="4">4</option>
                                    	<option value="5">5</option>
                                    	<option value="6" selected>6</option>
                                    	<option value="7">7</option>
            
							<?php }elseif ($resulttour['tour_hotelstr']== "7") {?>
								
                                    	<option value="" >Select One</option>
                                    	<option value="1">1</option>
                                    	<option value="2">2</option>
                                    	<option value="3">3</option>
                                    	<option value="4">4</option>
                                    	<option value="5">5</option>
                                    	<option value="6">6</option>
                                    	<option value="7" selected>7</option>
            
							<?php }else{ ?>
								     
                                    	<option value="" selected="" >Select One</option>
                                    	<option value="1">1</option>
                                    	<option value="2">2</option>
                                    	<option value="3">3</option>
                                    	<option value="4">4</option>
                                    	<option value="5">5</option>
                                    	<option value="6">6</option>
                                    	<option value="7">7</option>
            
					        <?php	}  ?>

                                    	
                                    </select>								
							</div>
							</div>
							<div class="col-md-3  " >
								<div class="camping">
								<p class="checkbox-bottom">
									<input type="hidden" name="tour_camping" id="tour_camping">
									<?php if ($resulttour['tour_camping']=='on') { ?>

									<input type="checkbox" class="filled-in" onclick="changecamp(this)" id="cmp" checked="" />
									<label for="cmp">Camping ?</label>
										
								<?php	}else{ ?>

									<input type="checkbox" class="filled-in" onclick="changecamp(this)" id="cmp"/>
									<label for="cmp">Camping ?</label>

								<?php  } ?>
								</p>
								</div>

							</div>
							<div class="col-md-3" style="display: none;" id="camp_day">
								<label>No of days</label>
                                  <div class="input-field ">
								   <input type="number" value="<?php echo $resulttour['tour_campday']; ?>" name="tour_campday" class="validate" > 
							      </div>
							</div>								
						</div>


						<div class="col s12 common-wrapper common-top clearfix comon_dropdown_botom_line" id="bn-serv" >

							<label class="col s12">Entry tickets included in the package price?</label>
							   <select   name="tour_entrytik">

                        	<?php if ($resulttour['tour_entrytik']== "yes") { ?>

									<option value="" disabled >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resulttour['tour_entrytik']== "no") {?>
								
								    <option value="" disabled >Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" selected>No</option>

							<?php }else{ ?>
								     
								    <option value="" disabled selected>Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" >No</option>

					        <?php	}  ?>


							   </select>
						</div>

						<div class="common-top">
							<label class="col s4">Whole travel plan of the package</label>
							<div class="input-field col s8">
								<textarea class="materialize-textarea textarea-t" name="tour_plan"><?php echo $resulttour['tour_plan']; ?></textarea required></div>
						</div>

						<div class="row common-top"  style="margin-top: 20px;">
							<div class="col-md-6">
								<label style="padding-bottom: 22px;">Package Price</label>
                                  <div class="input-field ">
								   <input type="number" name="tour_pkgprice" class="validate" required  value="<?php echo $resulttour['tour_pkgprice']; ?>"> 
							      </div>

							</div>
							<div class="col-md-6">   
                                <label>Number of people<br> (capacity of the package)</label>
                                  <div class="input-field ">
								   <input type="number" name="tour_capacitypeople" class="validate" required  value="<?php echo $resulttour['tour_capacitypeople']; ?>"> 
							      </div>
							</div>
						</div>


						<div class="row common-top" >
							<div class="col-md-6">
								<label >Number of bags allowed per person</label>
                                  <div class="input-field ">
								   <input type="number" name="tour_nosofbag" class="validate" required  value="<?php echo $resulttour['tour_nosofbag']; ?>"> 
							      </div>

							</div>
							<div class="col-md-6">   
                                <label>Charges for extra luggage per bag</label>
                                  <div class="input-field ">
								   <input type="number" name="tour_extrachrbag" class="validate"  value="<?php echo $resulttour['tour_extrachrbag']; ?>"> 
							      </div>
							</div>
						</div>


						<div class="row common-top">
                        	<div class="col-md-6 common-wrapper comon_dropdown_botom_line" id="childallow">
                        		<label >Children Allowed?</label>
                        		<select name="tour_childallow" onchange="selectchild(this)" id="childallow">
                        	<?php if ($resulttour['tour_childallow']== "yes") { ?>

									<option value="" disabled >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resulttour['tour_childallow']== "no") {?>
								
								    <option value="" disabled >Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" selected>No</option>

							<?php }else{ ?>
								     
								    <option value="" disabled selected>Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" >No</option>

					        <?php	}  ?>
                        		</select>
                        	</div>
                        	<div class="col-md-6 common-wrapper c-under5 comon_dropdown_botom_line" id="under5">
                        		<label >Under 5 allowed?</label>
                        		<select name="tour_undr5allow" onchange="selectunder5(this)" id="undr5allow">
                        	<?php if ($resulttour['tour_undr5allow']== "yes") { ?>

									<option value="" disabled >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resulttour['tour_undr5allow']== "no") {?>
								
								    <option value="" disabled >Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" selected>No</option>

							<?php }else{ ?>
								     
								    <option value="" disabled selected>Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" >No</option>

					        <?php	}  ?>
                        		</select>
                        	</div>
                        </div>

                        <div class="row common-top">
                        	<div class="col-md-6 common-wrapper c-childTickt comon_dropdown_botom_line"  id="c-chilTickt">
                        		<label style="padding-bottom:5px;">Charges for children</label>
                        	    <input type="number" name="tour_halftikchild" class="validate" value="<?php echo $resulttour['tour_halftikchild']; ?>">
                        	</div>
                        	<div class="col-md-2 events-checkbox">
                        		<div class="c-childfree">
                                        <input type="hidden" name="tour_undr5free" id="tour_undr5free">
                        			<p>
                        				<?php if ($resulttour['tour_undr5free']=='on') { ?>

		                        				<input type="checkbox" class="filled-in" onclick="childrnfree(this)" id="undr5free" checked="" />
												<label for="undr5free">Free?</label>

                        					
                        			<?php	}else{ ?>

												<input type="checkbox" class="filled-in" onclick="childrnfree(this)" id="undr5free"/>
												<label for="undr5free">Free?</label>

									<?php } ?>
								</p><br><br><br><br>
                        			
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="c-childprice">
                        			<label style="padding-left: 8px;">price</label>
                        			<div class="input-field col s8" style="margin-top: 4px;">
                        				<input type="number"  name="tour_undr5price" class="validate"  value="<?php echo $resulttour['tour_undr5price']; ?>" id="undr5price">
                        			</div>
                        		</div>
                        	</div>
                        </div>


						<div class="common-top discount clearfix" id=discount_wrap>
							<label>Discount for groups <b>:</b></label>

							<?php 
							

							if (mysqli_num_rows($edittournoofpeopleQuery) > 0) {
								while ($resultDiscount=mysqli_fetch_assoc($edittournoofpeopleQuery)) { ?>
								
							
							<div class="row" id="gen-discount-wrap">
								<input type="hidden" name="common_people_id[]" value="<?php echo $resultDiscount['common_people_id'] ?>" class="discountWrap-id">
								<div class="col-md-6">
									<label>Number of People</label>
                                  <div class="input-field ">
								   <input type="number"  name="common_nopeople[]"  class="tour-discount-per validate s hel" value="<?php echo $resultDiscount['common_nopeople'];  ?>"> 
							      </div>
								</div>
								<div class="col-md-6">
									<label>Discount (Percentage)<a class="closediscount" ><i class="fa fa-times" aria-hidden="true"></i></a></label>
                                  <div class="input-field ">
								   <input type="number" name="common_discount[]" class="validate" value="<?php echo $resultDiscount['common_discount'];  ?>"> 
							      </div>

								</div>								
							</div>
							<?php   } 

						}else{ ?>

						<div class="row newDiscountLI">
								<div class="col-md-6">
									<label>Number of People</label>
                                  <div class="input-field ">
								   <input type="number"  name="common_nopeople[]"  class="tour-discount-per validate s hel" > 
							      </div>
								</div>
								<div class="col-md-6">
									<label>Discount (Percentage)</label>
                                  <div class="input-field ">
								   <input type="number" name="common_discount[]" class="validate" > 
							      </div>

								</div>								
							</div>



						<?php }
?> 
						</div>
                               
						<div  class=" " style="margin-bottom: 20px;"> 
                            	<a id="more_discount_id" class="waves-effect waves-light btn more_discount_id" onclick="gen_discount_input(event)">Add More Discounts</a>
                        </div>

						<div class="common-top">
							<label class="col s4">Trip starts from (Location’s Name)</label>
							<div class="input-field col s8">
								<input type="text" name="tour_strtloc" class="validate" required  value="<?php echo $resulttour['tour_strtloc']; ?>"> </div>
						</div>

						<div class="row common-top" >
							 
							<div class="pickup-select common-wrapper comon_dropdown_botom_line">
								<label >Pickup Offered ?</label>
							      <select onchange="pickOffer(this)" name="tour_pikoffer" id="pikoffer">
                        	<?php if ($resulttour['tour_pikoffer']== "yes") { ?>

									<option value="" disabled >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resulttour['tour_pikoffer']== "no") {?>
								
								    <option value="" disabled >Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" selected>No</option>

							<?php }else{ ?>
								     
								    <option value="" disabled selected>Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" >No</option>

					        <?php	}  ?>
     							     </select>

							</div>
						</div>

						<div class="row pickService common-top" style="display: none;">
							<label style="padding-left: 13px;"><b>Charges from : </b></label>
							<div class="col-md-6">
								<label>Airport</label>
								 <div class="input-field ">
								   <input type="number" name="tour_pikair" class="validate"  value="<?php echo $resulttour['tour_pikair']; ?>"> 
							      </div>
								
							</div>
							<div class="col-md-6">
								<label> Bus Terminal</label>
								 <div class="input-field ">
								   <input type="number" name="tour_pikbus" class="validate"  value="<?php echo $resulttour['tour_pikbus']; ?>"> 
							      </div>								 
							</div>
						</div>
                        
                        <div class="row">
						<div class="col-md-6 pickService"  style="display: none;">
								<label>Specific Location</label>
								 <div class="input-field ">
								   <input type="number" name="tour_pikspecific" class="validate"  value="<?php echo $resulttour['tour_pikspecific']; ?>"> 
							      </div>
								 
						</div>
						</div>
                         

                       <div class="row common-top" >
							
							<div class="pickup-select common-wrapper comon_dropdown_botom_line">
								<label >Drop off Offered ?</label>
							      <select onchange="dropOffer(this)" name="tour_drpoffer" id="drpoffer">
                        	<?php if ($resulttour['tour_drpoffer']== "yes") { ?>

									<option value="" disabled >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resulttour['tour_drpoffer']== "no") {?>
								
								    <option value="" disabled >Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" selected>No</option>

							<?php }else{ ?>
								     
								    <option value="" disabled selected>Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" >No</option>

					        <?php	}  ?>
    							     </select>

							</div>
						
						</div>
						<div class="row dropService common-top" style=" display: none;">
							<label style="padding-left: 13px;"><b>Charges from : </b></label>
							<div class="col-md-6">
								<label>Airport</label>
								 <div class="input-field ">
								   <input type="number" name="tour_drpair" class="validate"  value="<?php echo $resulttour['tour_drpair']; ?>"> 
							      </div>
							</div>
							<div class="col-md-6">
								<label>Bus Terminal</label>
								 <div class="input-field ">
								   <input type="number" name="tour_drpbus" class="validate"  value="<?php echo $resulttour['tour_drpbus']; ?>"> 
							      </div>
								 
							</div>

						</div>
						<div class="row">
						<div class="col-md-6 dropService"  style="display: none;">
								 <label>Specific Location</label>
								 <div class="input-field ">
								   <input type="number" name="tour_drpspecific" class="validate"  value="<?php echo $resulttour['tour_drpspecific']; ?>"> 
							      </div>
					    </div>
					    </div>

			            <div class="imgVeiwinline row" id="hotel_img_wrap">
			            	<div class="row int_title"><label>Photos :</label></div>
												<?php
												while ($imgResult=mysqli_fetch_assoc($edittourImgQuery)) {

													


													if (!empty($imgResult['common_image'])) {?>
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
							<a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-images" >Tour Photos</a>
							<input type="hidden" name="common_image" id="img_ids">
							</div>
					   </div>
                           											
							<div class="common-top clearfix">
                 
                  
					                <label class="col s4">Tour's Promotional Video (url)</label>
					                <div class="input-field col s8">
					                  <input type="text"  class="" name="common_video"  ></div>
                            </div>

							<div class="destination-wrap " id="destination-wrap">
                                  <?php 

                                   

                                  if (mysqli_num_rows($editDesQuery) > 0) {
                                      $i=1;
								while ($result_D=mysqli_fetch_assoc($editDesQuery)) { 

                                       $editAttrQuery=select('tour_attraction', array('destination_id'=>$result_D['destination_id']))
									?>



									<div class="destination" id="destination-<?php echo $i; ?>">
										<input type="hidden" name="destination_id[]" value="<?php echo $result_D['destination_id']; ?>" class="edit-D_id">
										<div class="common-top">

											<label>Stopover Name <a class="close_D" ><i class="fa fa-times" aria-hidden="true"></i></a></label>
											<div class="input-field col s8">
												<input type="text" name="destination_name[]" value="<?php echo $result_D['destination_name']; ?>">

											</div>

										</div>
										<div >
											<label>Stopover Description</label>
											<div class="input-field col s8">
												<textarea class="materialize-textarea" name="destination_descrp[]"><?php echo $result_D['destination_descrp']; ?></textarea> 
											</div>
										</div>


										<div id="attraction-wrap">
                                           <?php  $j=1;  ?>
											<?php while ($result_A=mysqli_fetch_assoc($editAttrQuery)) {  ?>
											

											<div class="attractions" id="attraction-<?php echo $i; ?>_<?php echo $j; ?>">

												<input type="hidden" name="attraction_id[]" value="<?php echo $result_A['attraction_id']; ?>" class="edit-A_id">

												<div class="common-top">
													<label>Attraction Name <a class="close_A" ><i class="fa fa-times" aria-hidden="true"></i></a></label>
													<div class="input-field col s8">
														<input type="text"  name="attraction_name[]" value="<?php echo $result_A['attraction_name']; ?>">

													</div>

												</div>
												<div >
													<label>Attraction Description</label>
													<div class="input-field col s8">
														<textarea  class="materialize-textarea custom-text-area" name="attraction_descrp[]"><?php echo $result_A['attraction_descrp']; ?></textarea> 
													</div>
												</div>
											</div>

											<?php $j++;} ?>
										</div>
										


										<div class="row col s8 attr_btn clearfix common-top">
											<a class="waves-effect waves-light btn attr-btn" onclick="edit_gen_attraction(event)">Add More Attractions</a>
										</div>
									</div>

									<?php $i++;}

								 }else{ ?>


									<div class="destination new_Destination" id="destination-1">

										<div class="common-top">
											<label>Stopover Name</label>
											<div class="input-field col s8">
												<input type="text" name="destination_name[]" required>

											</div>

										</div>
										<div >
											<label>Stopover Description</label>
											<div class="input-field col s8">
												<textarea class="materialize-textarea" name="destination_descrp[]" required></textarea> 
											</div>
										</div>
										<div id="attraction-wrap">
											<div class="attractions new_Attract" id="attraction-1_1">
												
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
											<a class="waves-effect waves-light btn attr-btn" onclick="edit_gen_attraction(event)">Add More Attractions</a>
										</div>
									</div>
									<input type="hidden" name="desti_id" id="D-id">
							<?php	}?>
                              
								</div>
						

						<div class="col s8 common-top clearfix">
                        	<a class="waves-effect waves-light btn " onclick="gen_destination(event)">Add More Stopover</a>
                        </div>

                        <div class="row" >
                         	
						           <p class="pTAG inactive_checkbox">
						           	<input type="hidden" name="tour_inactive" id="hidden_checkbox">
						            	<?php if ($resulttour['tour_inactive']=='on') { ?>

						            	 <input type="checkbox" class="filled-in inactive" id="filled-in-inactive" checked="" />
						             <label for="filled-in-inactive">Inactive</label>
						             
						            <?php 	}else{ ?>

						            <input type="checkbox" class="filled-in inactive" id="filled-in-inactive" />
						             <label for="filled-in-inactive">Inactive</label>
						          <?php  }  ?>
						             
						            </p>
						             
         				</div>

                 
                       <?php } ?>
                       
						<div>
							<div class="input-field col s8">
								<input type="button" value="Update" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
						</div>
					</form>
				</div>

					</div>
			
				</div>
			</div>

     <?php include '../../common-ftns/upload-img-modal.php'; ?>
   	 <?php include '../../common-ftns/submitting-modal.php'; ?>         
     <?php include '../footer.php'; ?>

<script src="../../js/tour-js/tour.js"></script>
 

<script type="text/javascript">
jQuery(document).ready(function(){
	 
     tinymce.init({ selector:'.textarea-t' });

     // $('#modal-images').modal();
     
     // alert('Hit');
 	// $("#chosenexample").chosen({ allow_single_deselect: true})




 $("#tour-form").validate({

         errorElement : 'div',
        errorPlacement: function(error, element) {

        	if($('.select-wrapper').val()=="" && !$('.select-wrapper').hasClass('error')){
                $('.select-wrapper').addClass('error');
                // debugger;
        		// alert('empty');

        	}else if ($('.select-wrapper').val()!=""  &&  $('.select-wrapper').hasClass('error')){

                 $('.select-wrapper').removeClass('error');
                 // debugger;
        	}
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



 /*=================================
 Reintialize Dropdown and hideinputs
 =================================*/

if ($('#tour-food :selected').text() == "Yes") {
        
    $('.c-food').show();


    $("#bt1").click(function(){

         
      if ($("#show-food input:checkbox:checked").length > 0 || $('#show-food').find('input').is(":checked") ) {
          
            // alert('sucess');
          $('#show-food').find('input').removeClass('checkbox-error');

      }else{
           $('#show-food').find('input').addClass('checkbox-error');
         
          // alert('Kindly checked aleast one');
          return false;
      }

    });
      

  }else{
    $('.c-food').hide();
    $('#show-food').find('input').removeClass('checkbox-error');
  }



  

    if ($('#tour-food :selected').text() == "Yes") {
     $('.c-drink').show();

     $("#bt2").click(function(){

         
      if ($("#drink-wrap input:checkbox:checked").length > 0 || $('#drink-wrap').find('input').is(":checked")) {
          
           // alert('sucess');
          $('#drink-wrap').find('input').removeClass('checkbox-error');

      }else{
           $('#drink-wrap').find('input').addClass('checkbox-error');
           // alert('Kindly checked aleast one');
          return false;
      }

      
      });

  }else{
    $('.c-drink').hide();
    $('#drink-wrap').find('input').removeClass('checkbox-error');

  }


if ($('#childallow :selected').text() == "Yes") {

         $('.c-childTickt').show();
         $('.c-under5').show();
      }else{
         $('.c-childTickt').hide();
         $('.c-under5').hide();
         $('.c-childprice').hide();
         $('.c-childfree').hide();
      }


if ($('#undr5allow :selected').text() == "Yes") {

     $('.c-childfree').show();
     $('.c-childprice').show();
  }else{

     $('.c-childfree').hide();
     $('.c-childprice').hide();


  }


  if ($('#pikoffer :selected').text() == "Yes") {
        $(".pickService").show();
          
         

    }else{
        $(".pickService").hide();
        $(".pickService").find('input').val('');
        $('.pickService').find('input').removeClass('valid');
        $('.pickService').find('input').removeClass('invalid');
    }


    if ($('#drpoffer :selected').text() == "Yes") {
        $(".dropService").show();
    }else{
        $(".dropService").hide();
        $(".dropService").find('input').val('');
        $('.dropService').find('input').removeClass('valid');
        $('.dropService').find('input').removeClass('invalid');
    }

 if ($(".c-childfree input:checkbox:checked").length > 0) {
      
       $('.c-childprice').hide();
       $('#undr5price').val('');

   }else if($('.c-childprice').find('input').val().length < 0){
      // debugger;
      $('.c-childfree').hide();
       $('.c-childprice').show();

   }

if ($(".camping input:checkbox:checked").length > 0) {
    $('#camp_day').show();
    $('#camp_day input').prop('required',true);;
}else{
   
   $('#camp_day').hide();
   $('#camp_day input').val('');
   $('#camp_day input').prop('required',false);;

}

	if ($('#indipend :selected').text() == "No") {

 $('#showhotelList').show();

  }else{

    $('#showhotelList').hide();

   // body...
  } 

});


 /*============================================
   Edit time Destination & attraction generation 
 ==============================================*/


function edit_gen_attraction(event){


    var desti_stored_id =$(event.currentTarget).parents('.destination').find('.edit-D_id').val();



   // debugger;

  var attr_div= $(event.currentTarget).parents('.destination').find('#attraction-wrap')[0];
  var destionation_number = $(event.currentTarget).parents('.destination').attr('id').split('-')[1];
  var lengthOfAttraction = $(event.currentTarget).parents('.destination').find('#attraction-wrap .attractions').length + 1; 
  var new_attraction= document.createElement('div');

  new_attraction.innerHTML=`<div class="attractions new_Attract" id="attraction-`+destionation_number+`_`+lengthOfAttraction+`">
  <input type="hidden" name="attraction_id[]" class="edit-A_id">
  <input type="hidden" value="`+desti_stored_id+`" name="destination_att_id[]" class="edit-D_id">
  <div class="common-top">
  <label>Attraction Name <a class="close_A" ><i class="fa fa-times" aria-hidden="true"></i></a></label>
  <div class="input-field col s8">
  <input type="text"  name="attraction_name[]">
  </div>
  </div>
  <div >
  <label>Attraction Description</label>
  <div class="input-field col s8">
  <textarea  class="materialize-textarea custom-text-area" name="attraction_descrp[]"></textarea> 
  </div>
  </div>
  </div>`;

  attr_div.appendChild(new_attraction.firstChild);


}






</script>

</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>