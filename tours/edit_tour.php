<?php
include '../common-apis/api.php';

$edittourQuery=select('tour',array('tour_id'=>$_GET['id'],'hotel_id'=>$_GET['h_id']));

?>



<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>

<?php
         while ($resulttour=mysqli_fetch_assoc($edittourQuery)) {
            
       $edittourImgQuery=select('common_imagevideo',array('tour_id'=>$resulttour['tour_id'],'hotel_id'=>$resulttour['hotel_id']));

       $edittournoofpeopleQuery=select('common_nosofpeople', array('tour_id'=>$resulttour['tour_id'])); 

     

  ?>


	<title>Edit Tour Package</title>

	  <?php include '../header.php'; ?>


			<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../images/icon/dbc5.png" alt=""/> Edit Tour Package</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						 
                         <div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="tour-form" role="form" action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="tour_id" value="<?php echo $resulttour['tour_id'] ?>">
						<input type="hidden" name="hotel_id" value="<?php echo $resulttour['hotel_id'] ?>">

							
						<div>
							<label class="col s4">Package Name</label>
							<div class="input-field col s8">
								<input type="text" class="validate" name="tour_name" required value="<?php echo $resulttour['tour_name']; ?>"> </div>
						</div>
						<div>
							<label class="col s4">Name of Desination</label>
							<div class="input-field col s8">
								<div class="chips chips-destination"  name="tour_destinationname[]"></div>
								  <?php 

                          $nameOfDesti = explode(",", $resulttour['tour_destinationname']);


                          foreach($nameOfDesti as $item) { ?>
                          <div class="chip">
                            <?php echo $item;   ?>
                            <i class="material-icons close">close</i>
                          </div>

                          <?php     
                        }

                        ?>
								<input type="hidden" name="tour_destinationname[]" id="input_chips-desti" class="" required> </div>
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

								<p>
									<?php if ($resulttour['tour_brkfast']=='on') { ?>

										<input type="checkbox" class="filled-in" id="filled-in-box"   name="tour_brkfast" checked="" />
									<label for="filled-in-box">Breakfast</label>

								<?php	}else{ ?>
                                         
                                         <input type="checkbox" class="filled-in" id="filled-in-box"   name="tour_brkfast" />
									<label for="filled-in-box">Breakfast</label>

								<?php }   ?>
									
								</p>
								
							</div>
							<div class="col-md-2 c-food">
								
								<p>
									<?php if ($resulttour['tour_lunch']=='on') { ?>

							               <input type="checkbox" class="filled-in" id="filled-in-lunch"  name="tour_lunch"  checked="" />
									       <label for="filled-in-lunch">Lunch</label>

								    <?php	}else{ ?>

                                         <input type="checkbox" class="filled-in" id="filled-in-lunch"  name="tour_lunch" />
									     <label for="filled-in-lunch">Lunch</label>

								    <?php }   ?>
									
								</p>
								
							</div>
							<div class="col-md-2 c-food">
								<p>
									<?php if ($resulttour['tour_dinner']=='on') { ?>

                                           <input type="checkbox" class="filled-in" id="filled-in-diner"   name="tour_dinner" checked="" />
									       <label for="filled-in-diner">Dinner</label>
									<?php	}else{ ?>

									       <input type="checkbox" class="filled-in" id="filled-in-diner"   name="tour_dinner" />
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
								<p>
									<?php if ($resulttour['tour_aloholic']=='on') { ?>

									<input type="checkbox" class="filled-in" id="filled-in-alcholic"   name="tour_aloholic" checked="" />
									<label for="filled-in-alcholic">Alcoholic</label>
                       
                                    <?php	}else{ ?>

                                    <input type="checkbox" class="filled-in" id="filled-in-alcholic"   name="tour_aloholic" />
									<label for="filled-in-alcholic">Alcoholic</label>

                                    <?php }   ?>
									
								</p>
								
							</div> 
							<div class="col-md-4 c-drink">
								<p>
									<?php if ($resulttour['tour_nonaloholic']=='on') { ?>

									<input type="checkbox" class="filled-in" id="filled-in-nonalc"   name="tour_nonaloholic" checked="" />
									<label for="filled-in-nonalc">Non Alcoholic</label>

									<?php	}else{ ?>

									<input type="checkbox" class="filled-in" id="filled-in-nonalc"   name="tour_nonaloholic" />
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


						<div class="row t-chckbox common-top" id="t-chckbox" style="margin-bottom: 30px;">
							<div class="col-md-6" >
							<div class="hotelStr common-wrapper comon_dropdown_botom_line">
								
								  <label for="filled-in-box">Hotel Stay Stars</label>
                                    <select class="" name="tour_hotelstr"  onchange="changeStr(this)">
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
							<div class="col-md-6  " >
								<div class="camping">
								<p class="checkbox-bottom">
									<?php if ($resulttour['tour_camping']=='on') { ?>

									<input type="checkbox" class="filled-in" onclick="changecamp(this)" name="tour_camping" id="cmp" checked="" />
									<label for="cmp">Camping ?</label>
										
								<?php	}else{ ?>

									<input type="checkbox" class="filled-in" onclick="changecamp(this)" name="tour_camping" id="cmp"/>
									<label for="cmp">Camping ?</label>

								<?php  } ?>
								</p>
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
                        		<label style="padding-bottom:5px;">Half Ticket for children?</label>
                        		<select name="tour_halftikchild" onchange="selecthalftik(this)">
                        	<?php if ($resulttour['tour_halftikchild']== "yes") { ?>

									<option value="" disabled >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resulttour['tour_halftikchild']== "no") {?>
								
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
                        	<div class="col-md-2 events-checkbox">
                        		<div class="c-childfree">

                        			<p>
                        				<?php if ($resulttour['tour_undr5free']=='on') { ?>

		                        				<input type="checkbox" class="filled-in" onclick="childrnfree(this)" name="tour_undr5free" id="undr5free" checked="" />
												<label for="undr5free">Free?</label>

                        					
                        			<?php	}else{ ?>

												<input type="checkbox" class="filled-in" onclick="childrnfree(this)" name="tour_undr5free" id="undr5free"/>
												<label for="undr5free">Free?</label>

									<?php } ?>
								</p><br><br><br><br>
                        			
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="c-childprice">
                        			<label style="padding-left: 8px;">price</label>
                        			<div class="input-field col s8" style="margin-top: 4px;">
                        				<input type="number"  name="tour_undr5price" class="validate"  value="<?php echo $resulttour['tour_undr5price']; ?>">
                        			</div>
                        		</div>
                        	</div>
                        </div>


						<div class="common-top discount clearfix" id=discount_wrap>
							<label>Discount for groups <b>:</b></label>

							<?php 
							while ($resultDiscount=mysqli_fetch_assoc($edittournoofpeopleQuery)) { ?>

							<input type="hidden" name="common_people_id[]" value="<?php echo $resultDiscount['common_people_id'] ?>">
							<div class="row">
								<div class="col-md-6">
									<label>Number of People</label>
                                  <div class="input-field ">
								   <input type="number"  name="common_nopeople[]"  class="tour-discount-per validate s hel" value="<?php echo $resultDiscount['common_nopeople'];  ?>"> 
							      </div>
								</div>
								<div class="col-md-6">
									<label>Discount (Percentage)</label>
                                  <div class="input-field ">
								   <input type="number" name="common_discount[]" class="validate" value="<?php echo $resultDiscount['common_discount'];  ?>"> 
							      </div>

								</div>								
							</div>
							<?php   } ?> 
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
							 
							<div class="col-md-6 pickup-select common-wrapper comon_dropdown_botom_line">
								<label style="margin-bottom: 32px;">Pickup Offered ?</label>
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
							
							<div class="col-md-6 pickService"  style="display: none;">
								
								 <label><b>Charges from : </b><br> Airport</label>
								 <div class="input-field ">
								   <input type="number" name="tour_pikair" class="validate"  value="<?php echo $resulttour['tour_pikair']; ?>"> 
							      </div>
							</div>

						</div>
						<div class="row pickService common-top" style="display: none;">
							
							<div class="col-md-6">
								<label> Bus Terminal</label>
								 <div class="input-field ">
								   <input type="number" name="tour_pikbus" class="validate"  value="<?php echo $resulttour['tour_pikbus']; ?>"> 
							      </div>

							</div>
							<div class="col-md-6">
								 <label>Specific Location</label>
								 <div class="input-field ">
								   <input type="number" name="tour_pikspecific" class="validate"  value="<?php echo $resulttour['tour_pikspecific']; ?>"> 
							      </div>
							</div>

						</div>
                         

                       <div class="row common-top" >
							
							<div class="col-md-6 pickup-select common-wrapper comon_dropdown_botom_line">
								<label style="margin-bottom: 32px;">Drop off Offered ?</label>
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
							<div class="col-md-6 dropService"  style="display: none;">
								 <label>Charges From :<br> Airport</label>
								 <div class="input-field ">
								   <input type="number" name="tour_drpair" class="validate"  value="<?php echo $resulttour['tour_drpair']; ?>"> 
							      </div>
							</div>

						</div>
						<div class="row dropService common-top" style=" display: none;">
							
							<div class="col-md-6">
								<label>Bus Terminal</label>
								 <div class="input-field ">
								   <input type="number" name="tour_drpbus" class="validate"  value="<?php echo $resulttour['tour_drpbus']; ?>"> 
							      </div>

							</div>
							<div class="col-md-6">
								 <label>Specific Location</label>
								 <div class="input-field ">
								   <input type="number" name="tour_drpspecific" class="validate"  value="<?php echo $resulttour['tour_drpspecific']; ?>"> 
							      </div>
							</div>

						</div>
			          <div class="imgVeiwinline row" id="hotel_img_wrap">
												<?php

												while ($imgResult=mysqli_fetch_assoc($edittourImgQuery)) {


													if (!empty($imgResult['common_image'])) {?>
													<div class="imgeWrap">
														<a class="deletIMG" onclick="deletIMG(event)"  data-value="<?php echo $imgResult['common_imgvideo_id']?>" data-img="<?php echo $imgResult['common_image'] ?>" ><i class="fa fa-times" aria-hidden="true"></i></a>
														<img src="../<?php echo $imgResult['common_image']  ?>" width="150" class="materialboxed">
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
                           											
							<div class="row  common-top clearfix">
								 
									<div class="col s6 dumi_vid_btn" id="pro-file-upload"> <span>Tour's PROMOTIONAL VIDEO</span></div>
										<input type="text" placeholder="Upload Promotional video URL" name="common_video" class="input-field validate col s5 dumi_vid_inpt" required>
							</div>

						<div class="destination-wrap" id="destination-wrap">
                        <div class="common-top">
							<label>Destination Name</label>
                            <div class="input-field col s8">
                            	<input type="text" name="destination_name[]">

                            </div>
						   	 
						</div>
						<div >
							<label>Destination Description</label>
							<div class="input-field col s8">
								<textarea class="materialize-textarea textarea-t" name="destination_descrp[]"></textarea> 
							</div>
						</div>
                        <div id="attraction-wrap">
						<div class="common-top">
							<label>Attraction Name</label>
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
					    </div>


						<div class="row col s8 attr_btn clearfix common-top">
                        	<a class="waves-effect waves-light btn " onclick="gen_attraction(event)">Add More Attractions</a>
                        </div>
						</div>

						<div class="col s8 common-top clearfix">
                        	<a class="waves-effect waves-light btn " onclick="gen_destination(event)">Add More Destination</a>
                        </div>

                 
                       <?php } ?>
                       
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

     // $('#modal-images').modal();
     
     // alert('Hit');
 	// $("#chosenexample").chosen({ allow_single_deselect: true})



 	 $('.chips-destination').material_chip({
    autocompleteOptions: {
      data: {
           
      },
      limit: Infinity,
      minLength: 1
    }
  });




$('.chips-destination').on('chip.add', function(e, chip){
    
     // you have the added chip here
    var chip_desti_string= $('.chips-destination').material_chip('data')
    var str = JSON.stringify(chip_desti_string);
    var array_destination=[];

 for (var i = 0; i < chip_desti_string.length; i++) {

      array_destination.push(chip_desti_string[i].tag);

 }
 
  $('#input_chips-desti').val(array_destination.toString());
   console.log($('#input_chips-desti').val(array_destination.toString()));
});
 



 $("#tour-form").validate({

         errorElement : 'div',
        errorPlacement: function(error, element) {

        	if($('.select-wrapper').val()=="" && !$('.select-wrapper').hasClass('error')){
                $('.select-wrapper').addClass('error');
                // debugger;
        		// alert('empty');

        	}else if ($('.select-wrapper').val()!=""  &&  $('.select-wrapper').hasClass('error')){

                 $('.select-wrapper').removeClass('error');
                 debugger;
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





 /*Reintialize Dropdown and hideinputs*/



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



		 

});
</script>

</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>