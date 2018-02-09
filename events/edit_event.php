<?php 
include '../common-apis/api.php';

if (isset($_GET['h_id'])) {
	$editeventQuery=select('event',array('event_id'=>$_GET['id'],'hotel_id'=>$_GET['h_id']));

}else{
	$editeventQuery=select('event',array('event_id'=>$_GET['id'],'user_id'=>$_GET['u_id']));

}
$global_event_id="";

?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
<?php
         while ($resultevent=mysqli_fetch_assoc($editeventQuery)) {
            
       $editeventImgQuery=select('common_imagevideo',array('event_id'=>$resultevent['event_id']));

       $editeventnoofpeopleQuery=select('common_nosofpeople', array('event_id'=>$resultevent['event_id'])); 

     

  ?>



	<title>Edit Event</title>


<?php  include"../header.php"; 
$userId= $_SESSION["user_id"];

   $selectHotel = 'SELECT `hotel_name`,`hotel_id`  FROM `hotel` WHERE `user_id`="'.$userId.'" ';


$selectHotelQuery=mysqli_query($conn,$selectHotel) or die(mysqli_error($conn));
?>


	<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="images/icon/dbc5.png" alt=""/> Edit Event Package</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						 
                         <div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="event-form" role="form" action="" method="POST" enctype="multipart/form-data">
						
							<input type="hidden" name="event_id" value="<?php echo $resultevent['event_id']; ?>">
							<input type="hidden" name="hotel_id" value="<?php echo $resultevent['hotel_id']; ?>" id="hotelId">
							<input type="hidden" name="user_id" value="<?php echo $resultevent['user_id'];  ?>">
							<?php $global_event_id=$resultevent['event_id']; ?>
						<div>
							<label class="col s4">Event Name</label>
							<div class="input-field col s8">
								<input type="text"  class="validate" name="event_name" required value="<?php echo $resultevent['event_name']; ?> "> 
							</div>
						</div>

						<div>
							<label class="col s4">Event Venue</label>
							<div class="input-field col s8">
								<input type="text" class="validate" name="event_venue" required value="<?php echo $resultevent['event_venue'] ?> "> 
							</div>
						</div>


                         <div class="t-chckbox">
							<div class="common-wrapper comon_dropdown_botom_line">
								<label >Event Recurrence ?</label>
								<select   name="event_recurrence">
				                    
				             <?php if ($resultevent['event_recurrence']== "onetime") { ?>

									<option value="" disabled >Select One</option>
                                    <option value="onetime" selected>One Time</option>
                                    <option value="week">Weekly</option>
                                    <option value="biweek">Biweekly</option>
                                    <option value="month">Monthly</option>
                                    <option value="quarter">Quarterly</option>
                                    <option value="year">Yearly</option>		

							 <?php	}elseif ($resultevent['event_recurrence']== "week") {?>
								
									<option value="" disabled >Select One</option>
                                    <option value="onetime">One Time</option>
                                    <option value="week" selected>Weekly</option>
                                    <option value="biweek">Biweekly</option>
                                    <option value="month">Monthly</option>
                                    <option value="quarter">Quarterly</option>
                                    <option value="year">Yearly</option>					

							 <?php }elseif ($resultevent['event_recurrence']== "biweek") { ?>
								     
									<option value="" disabled >Select One</option>
                                    <option value="onetime">One Time</option>
                                    <option value="week">Weekly</option>
                                    <option value="biweek" selected>Biweekly</option>
                                    <option value="month">Monthly</option>
                                    <option value="quarter">Quarterly</option>
                                    <option value="year">Yearly</option>	

					        <?php	}elseif ($resultevent['event_recurrence']== "month") { ?>

									<option value="" disabled >Select One</option>
                                    <option value="onetime">One Time</option>
                                    <option value="week">Weekly</option>
                                    <option value="biweek">Biweekly</option>
                                    <option value="month" selected>Monthly</option>
                                    <option value="quarter">Quarterly</option>
                                    <option value="year">Yearly</option>										        	
					        <?php	}elseif ($resultevent['event_recurrence']== "quarter") { ?>

									<option value="" disabled >Select One</option>
                                    <option value="onetime">One Time</option>
                                    <option value="week">Weekly</option>
                                    <option value="biweek">Biweekly</option>
                                    <option value="month">Monthly</option>
                                    <option value="quarter" selected>Quarterly</option>
                                    <option value="year">Yearly</option>										        	
					        <?php	}elseif ($resultevent['event_recurrence']=="year") { ?>

									<option value="" disabled >Select One</option>
                                    <option value="onetime">One Time</option>
                                    <option value="week">Weekly</option>
                                    <option value="biweek">Biweekly</option>
                                    <option value="month">Monthly</option>
                                    <option value="quarter">Quarterly</option>
                                    <option value="year" selected>Yearly</option>										        	
					        				        	
					        <?php	}else{ ?>

									<option value="" disabled selected>Select One</option>
                                    <option value="onetime">One Time</option>
                                    <option value="week">Weekly</option>
                                    <option value="biweek">Biweekly</option>
                                    <option value="month">Monthly</option>
                                    <option value="quarter">Quarterly</option>
                                    <option value="year">Yearly</option>					        	
					        <?php   }  ?>
									
								</select>
							</div>
						</div>

						<div class="t-chckbox">
							<div class="common-wrapper comon_dropdown_botom_line"></div>
							<label>Serve Food?</label>
							<select onchange="showEvent_Eat(this)" name="event_serve"    id="show_Eat">
								<?php if ($resultevent['event_serve']=="yes") { ?>
									<option value="" disabled="" >Select One</option>
								    <option value="yes" selected="">Yes</option>
								    <option value="no"> No</option>

								<?php }elseif ($resultevent['event_serve']=="no") { ?> 
									<option value="" disabled="" >Select One</option>
									<option value="yes">Yes</option>
									<option value="no" selected=""> No</option>
								<?php }else{?>
									  
									<option value="" disabled="" selected="">Select One</option>
									<option value="yes">Yes</option>
									<option value="no"> No</option>
								<?php }   ?>
								
							</select>
						</div>

						<div class="row common-top EatFoodWrap"  >
							<div class="col-md-1"></div>
							<div class="col-md-3 " >
								<div class="eatFree">
							       <p class="pTAG">

							       <?php if ($resultevent['event_eatFree']=="on") {?>
							               <input type="checkbox" class="filled-in freeLbl" id="filled-in-all_free"  name="event_eatFree" checked="" />
							               <label for="filled-in-all_free" class="freeLbl">Free?</label>
							      <?php  }else{ ?>
							                <input type="checkbox" class="filled-in freeLbl" id="filled-in-all_free"  name="event_eatFree" />
							               <label for="filled-in-all_free" class="freeLbl">Free?</label>


							      <?php }  ?>
							         
							       </p>
							    </div>
							</div>
							<div class="col-md-4 " >
								<div class="eatAll">
							       <p class="pTAG">
							       <?php if ($resultevent['event_eatAll']=="on") { ?>
							       		   <input type="checkbox" class="filled-in allLbl" id="filled-in-all_u_can"  name="event_eatAll" checked="" />
							               <label for="filled-in-all_u_can" >All you can eat</label>
							       <?php }else { ?>
							       	       <input type="checkbox" class="filled-in allLbl" id="filled-in-all_u_can"  name="event_eatAll" />
							              <label for="filled-in-all_u_can" >All you can eat</label>
							       <?php }  ?>
							         
							       </p>
							    </div>
							</div>
							<div class="col-md-4" style="display: none;" id="eatallChrges">
								<label>Charges</label>
                        		<input type="number" name="event_eatAllChrges" class="validate" value="<?php echo $resultevent['event_eatAllChrges'] ?>"  id="eatChrges">
							</div>
							<div class="col-md-4 " >
								<div class="eatNeed">
							       <p class="pTAG">
							      <?php if ($resultevent['event_eatNeed']=="on") { ?>
							       		   <input type="checkbox" class="filled-in needLbl" id="filled-in-as_u_need"  name="event_eatNeed" checked="" />
							               <label for="filled-in-as_u_need">As you need</label>
							      <?php }else{ ?>
							               <input type="checkbox" class="filled-in needLbl" id="filled-in-as_u_need"  name="event_eatNeed" />
							               <label for="filled-in-as_u_need">As you need</label>
							      <?php } ?>
							         
							       </p>
							    </div>
							</div>
						</div>


                        <div class="common-top">
							<label class="col s4">Event Description</label>
							  <div class="input-field col s8">
								 <textarea class="materialize-textarea" name="event_descrip" 
								 ><?php echo $resultevent['event_descrip']; ?></textarea>
							  </div>
						</div>
                        

                        <div class="row common-top common-wrapper comon_dropdown_botom_line">
                        	<div class="col-md-6">
                        		<label style="margin-bottom: 10px;">Entry Fee ?</label>
                        		<select name="event_entry" onchange="selectentryfee(this)" id="selectprice">
                        	<?php if ($resultevent['event_entry']== "") { ?>

									<option value="" disabled selected>Select One</option>
								    <option value="yes">Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resultevent['event_entry']== "yes") {?>
								
								    <option value="" disabled >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php }elseif ($resultevent['event_entry']== "no") { ?>
								     
								    <option value="" disabled >Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" selected>No</option>

					        <?php	}  ?>
                        		</select>
                        	</div>
                   
                        	<div class="col-md-6">
                        		<div class="c-price events-checkbox">
                        		<label>price</label>
                                  <div class="input-field">
								   <input type="number"  name="event_entryfee" class="validate"  value="<?php echo $resultevent['event_entryfee']; ?>">


							      </div>
                                </div>
                        	</div>
                        </div>
						

                        <div class="row common-top">
                        	<div class="col-md-6 common-wrapper comon_dropdown_botom_line" id="" >
                        		<label >Children Allowed?</label>
                        		<select name="event_childallow" onchange="selectchild(this)" id="childallow">
                        	<?php if ($resultevent['event_childallow']== "") { ?>

									<option value="" disabled selected>Select One</option>
								    <option value="yes">Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resultevent['event_childallow']== "yes") {?>
								
								    <option value="" disabled >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php }elseif ($resultevent['event_childallow']== "no") { ?>
								     
								    <option value="" disabled >Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" selected>No</option>

					        <?php	}  ?>
                        		</select>
                        	</div>
                        	<div class="col-md-6 common-wrapper c-under5 comon_dropdown_botom_line" id="">
                        		<label >Under 5 allowed?</label>
                        		<select name="event_undr5allow" onchange="selectunder5(this)" id="undr5allow">
                        	<?php if ($resultevent['event_undr5allow']== "") { ?>

									<option value="" disabled selected>Select One</option>
								    <option value="yes">Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resultevent['event_undr5allow']== "yes") {?>
								
								    <option value="" disabled >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php }elseif ($resultevent['event_undr5allow']== "no") { ?>
								     
								    <option value="" disabled >Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" selected>No</option>

					        <?php	}  ?>

                        		</select>
                        	</div>
                        </div>

                        <div class="row common-top">
                        	<div class="col-md-6 common-wrapper c-childTickt comon_dropdown_botom_line">
                        		<label style="padding-bottom:5px;">Charges for children</label>
                        		<input type="number" name="event_halftikchild" class="validate" value="<?php echo $resultevent['event_halftikchild']; ?>">
                        	</div>
                        	<div class="col-md-2 events-checkbox">
                        		<div class="c-childfree">
                        			<p>
                        				<?php if ($resultevent['event_undr5free']=='on') {?>
                        					
                        					<input type="checkbox" class="filled-in" onclick="childrnfree(this)" name="event_undr5free" id="undr5free" checked="" />
									       <label for="undr5free">Free?</label>

                        			<?php	}else{ ?>

                        			       <input type="checkbox" class="filled-in" onclick="childrnfree(this)" name="event_undr5free" id="undr5free"/>
									       <label for="undr5free">Free?</label>

                        			<?php }  ?>
									
								</p><br><br><br><br>
                        			
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="c-childprice">
                        			<label style="padding-left: 8px;">price</label>
                        			<div class="input-field col" style="margin-top: 4px;">
                        				<input type="number"  name="event_undr5price" class="validate"  value="<?php echo $resultevent['event_undr5price']; ?>" id="undr5price">
                        			</div>
                        		</div>
                        	</div>
                        </div>


						<div class="common-top discount clearfix" id="discount_wrap" style="display: none;">
								<label>Discount for groups <b>:</b></label>
								<?php  
								
								if (mysqli_num_rows($editeventnoofpeopleQuery) > 0) { 
									while($resultDiscount=mysqli_fetch_assoc($editeventnoofpeopleQuery)) {  ?>
								
								
		
							<div class="row" id="gen-discount-wrap">
								<input type="hidden" name="common_people_id[]" value="<?php  echo $resultDiscount['common_people_id']; ?>" class="discountWrap-id">
								<div class="col-md-6">
									<label>Number of People</label>
                                  <div class="input-field ">
								   <input type="number" name="common_nopeople[]"  class="tour-discount-per validate s hel " value="<?php echo $resultDiscount['common_nopeople'];  ?>"> 
							      </div>
								</div>
								<div class="col-md-6">
									<label>Discount (Percentage)<a class="closediscount" ><i class="fa fa-times" aria-hidden="true"></i></a></label>
                                  <div class="input-field ">
								   <input type="number" name="common_discount[]" class="validate" value="<?php echo $resultDiscount['common_discount'];  ?>"> 
							      </div>

								</div>								
							</div>	
							<?php	}   
						}else{ ?>
						<div class="row newLI">
								<div class="col-md-6">
									<label>Number of People</label>
                                  <div class="input-field ">
								   <input type="number" name="common_nopeople[]"  class="tour-discount-per validate s hel " > 
							      </div>
								</div>
								<div class="col-md-6">
									<label>Discount (Percentage)</label>
                                  <div class="input-field ">
								   <input type="number" name="common_discount[]" class="validate" > 
							      </div>

								</div>								
							</div>	



					<?php 	}
?>		 
						</div>

						<div  class=" " style="margin-bottom: 20px; display: none;" id="discount_btn" > 
                            	<a id="more_discount_id" class="waves-effect waves-light btn more_discount_id" onclick="gen_discount_input(event)">Add More Discounts</a>
                        </div>


						<div class="row common-top" >
							
							<div class="pickup-select common-wrapper comon_dropdown_botom_line">
								<label>Pickup Offered ?</label>
							      <select onchange="pickOffer(this)" name="event_pikoffer" id="pikoffer">
                        	<?php if ($resultevent['event_pikoffer']== "") { ?>

									<option value="" disabled selected>Select One</option>
								    <option value="yes">Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resultevent['event_pikoffer']== "yes") {?>
								
								    <option value="" disabled >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php }elseif ($resultevent['event_pikoffer']== "no") { ?>
								     
								    <option value="" disabled >Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" selected>No</option>

					        <?php	}  ?>

    							     </select>

							</div>
						</div>

						<div class="row pickService common-top" style="display: none;">
							<label style="padding-left: 13px;"><b>Charges from : </b></label>
							<div class="col-md-6">
								 <label>Airport</label>
								 <div class="input-field ">
								   <input type="number"  name="event_pikair" class="validate"  value="<?php echo $resultevent['event_pikair']; ?>"> 
							      </div>
								

							</div>
							<div class="col-md-6">
								<label> Bus Terminal</label>
								 <div class="input-field ">
								   <input type="number" name="event_pikbus" class="validate" value="<?php echo $resultevent['event_pikbus']; ?>"> 
							      </div>
								 
							</div>

						</div>
					    <div class="row">
						   <div class="col-md-6 pickService"  style="display: none;">
								<label>Specific Location</label>
								 <div class="input-field ">
								   <input type="number" name="event_pikspecific" class="validate" value="<?php echo $resultevent['event_pikspecific']; ?>"> 
							      </div>
								
							</div>
						</div>


                       <div class="row common-top" >
							
							<div class="pickup-select common-wrapper comon_dropdown_botom_line">
								<label>Drop off Offered ?</label>
							      <select onchange="dropOffer(this)" name="event_drpoffer" id="drpoffer">
                        	<?php if ($resultevent['event_drpoffer']== "") { ?>

									<option value="" disabled selected>Select One</option>
								    <option value="yes">Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resultevent['event_drpoffer']== "yes") {?>
								
								    <option value="" disabled >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php }elseif ($resultevent['event_drpoffer']== "no") { ?>
								     
								    <option value="" disabled >Select One</option>
								    <option value="yes" >Yes</option>
								    <option value="no" selected>No</option>

					        <?php	}  ?>

 							     </select>

							</div>
							

						</div>
						<div class="row dropService common-top" style=" display: none;">
							<label style="padding-left: 13px;"><b>Charges from : </b></label>
							<div class="col-md-6">
								<label>Airport</label>
								 <div class="input-field ">
								   <input type="number" name="event_drpair" class="validate" value="<?php echo $resultevent['event_drpair']; ?>"> 
							      </div>
								

							</div>
							<div class="col-md-6">
								<label>Bus Terminal</label>
								 <div class="input-field ">
								   <input type="number" name="event_drpbus" class="validate" value="<?php echo $resultevent['event_drpbus']; ?>"> 
							      </div>
								 
							</div>

						</div>
                         
                         <div class="row">
						     <div class="col-md-6 dropService"  style="display: none;">
								 <label>Specific Location</label>
								 <div class="input-field ">
								   <input type="number" name="event_drpspecific" class="validate" value="<?php echo $resultevent['event_drpspecific']; ?>"> 
							      </div>
							</div>
                         </div>
                   <div class="imgVeiwinline row" id="hotel_img_wrap">
                   	<div class="row int_title"><label>Photos :</label></div>
												<?php
                                                    
												while ($imgResult=mysqli_fetch_assoc($editeventImgQuery)) {

										
													if (!empty($imgResult['common_image'])) {?>
													<div class="imgeWrap">
														<a class="deletIMG" onclick="deletIMG(event)"  data-value="<?php echo $imgResult['common_imgvideo_id']?>" data-img="<?php echo $imgResult['common_image'] ?>" ><i class="fa fa-times" aria-hidden="true"></i></a>
														<img src="../<?php echo $imgResult['common_image']  ?>" style="height: 100px; width: 150px;" class="materialboxed">
													</div>&nbsp;&nbsp;


													<?php } ?>




													<?php	}

													?>
												</div>

					    <div class="row common-top">
							<div class="">
								<!-- Modal Trigger -->
								<div class="col s1"></div>
							<a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-images" >Event Photos</a>
							<input type="hidden" name="common_image" id="img_ids">
							</div>
					   </div>
                           											
							<div class="row  common-top clearfix">
								 
									<div class="col s6 dumi_vid_btn" id="pro-file-upload"> <span>Event's PROMOTIONAL VIDEO</span></div>
										<input type="text" placeholder="Upload Promotional video URL" name="common_video" class="input-field validate col s5 dumi_vid_inpt">
							</div>

 <?php if (!empty($resultevent['hotel_id'])) {?>
      <style type="text/css">
          #dependent_wrap{
             display: none;
          }
      </style>
<?php } ?>
						<div id="dependent_wrap">
                         	<div class="common-top">
								<label>Event Independent ?</label>
								<select onchange="independ(this)" name="event_independ" id="indipend">

                        	<?php if ($resultevent['event_independ']== "yes") { ?>

									<option value="" disabled="" >Select One</option>
								    <option value="yes" selected>Yes</option>
								    <option value="no">No</option>

							<?php	}elseif ($resultevent['event_independ']== "no") {?>
								
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
                            		<option selected="" value="<?php echo $resulttour['hotel_name'] ?>"><?php echo $resultevent['hotel_name'] ?></option>
                            		<?php

                            		while ($result=mysqli_fetch_assoc($selectHotelQuery)) { ?>


                            		<option value="<?php echo $result['hotel_name'] ?>" data-id="<?php echo $result['hotel_id']; ?>"><?php echo $result['hotel_name'] ?></option>


						    <?php	# code...
						}  ?>
					</select>
				</div>
				<?php  }  ?>

			</div>





							<div class="row" >
                         	
						           <p class="pTAG">
						            	<?php if ($resultevent['event_inactive']=='on') { ?>

						            	 <input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="event_inactive" checked="" />
						             <label for="filled-in-inactive">Inactive</label>
						             
						            <?php 	}else{ ?>

						            <input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="event_inactive" />
						             <label for="filled-in-inactive">Inactive</label>
						          <?php  }  ?>
						             
						            </p>
						             
         						</div>




<?php   } ?>
						<div>
							<div class="input-field col s8">
								<input type="button" value="Update" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
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
				<iframe src="../up_load_singleimg.php?p=edit&t=event&e_id=<?php echo $global_event_id; ?>" id="photo_iframe"></iframe>
                   <div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat photo_done">Done</a>
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


		   <?php  include"../footer.php"; ?>



<script src="../js/event-js/event.js"></script>
		   <script type="text/javascript">
jQuery(document).ready(function(){
	tinymce.init({ selector:'textarea' });

	 // $('#modal-images').modal();
     
     
     // alert('Hit');
 	// $("#chosenexample").chosen({ allow_single_deselect: true})
});
function showEvent_Eat(that) {
	 // debugger;
	if (that.value== 'yes') {
		$('.EatFoodWrap').show();
		

	}else{
        $('.EatFoodWrap').hide();

	}
}









$(".freeLbl").click(function () {

     // $('input:checkbox:not(:disabled)').not(this).prop('checked', this.checked);
     
   if($(".eatFree input:checkbox:checked").length > 0){
 // debugger;
  $('.eatAll').hide();
  $('.eatNeed').hide();
  $('#eatChrges').val('');

  }else{
  	$('.eatFree').show();
    $('.eatAll').show();
    $('.eatNeed').show();  
  }
   
 });

$(".allLbl").click(function () {

     // $('input:checkbox:not(:disabled)').not(this).prop('checked', this.checked);
     
      if($(".eatAll input:checkbox:checked").length > 0){
 // debugger;
  $('.eatFree').hide();
  $('.eatNeed').hide();
  $('#eatallChrges').show();

  }else{
  	$('.eatFree').show();
    $('.eatAll').show();
    $('.eatNeed').show();  
    $('#eatallChrges').hide();
  }
   
 });

$(".needLbl").click(function () {

     // $('input:checkbox:not(:disabled)').not(this).prop('checked', this.checked);
     
      if($(".eatNeed input:checkbox:checked").length > 0){
 // debugger;
  $('.eatFree').hide();
  $('.eatAll').hide();
  $('#eatChrges').val('');

  }else{
  	$('.eatFree').show();
    $('.eatAll').show();
    $('.eatNeed').show();  
  }
   
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


/*=================================
Reintialize Dropdown and hideinputs
===================================*/

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

if ($('#selectprice :selected').text() == "Yes") {
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

if($('#show_Eat :selected').text()=="Yes"){
      
        $('.EatFoodWrap').show();
		$('.eatFree').show();
        $('.eatAll').show();
        $('.eatNeed').show(); 
  }else{

    $('.EatFoodWrap').hide();
  }

if($(".eatFree input:checkbox:checked").length > 0){
 // debugger;
  $('.eatAll').hide();
  $('.eatNeed').hide();
  $('#eatChrges').val('');

  }else{
  	$('.eatFree').show();
    $('.eatAll').show();
    $('.eatNeed').show();  
  }

if($(".eatAll input:checkbox:checked").length > 0){
 // debugger;
  $('.eatFree').hide();
  $('.eatNeed').hide();
  $('#eatallChrges').show();

  }else{
  	$('.eatFree').show();
    $('.eatAll').show();
    $('.eatNeed').show(); 
    $('#eatallChrges').hide(); 
  }

if($(".eatNeed input:checkbox:checked").length > 0){
 // debugger;
  $('.eatFree').hide();
  $('.eatAll').hide();
  $('#eatChrges').val('');

  }else{
  	$('.eatFree').show();
    $('.eatAll').show();
    $('.eatNeed').show();  
  }



  if ($(".c-childfree input:checkbox:checked").length > 0) {
      
       $('.c-childprice').hide();
       $('#undr5price').val('');

   }else if($('.c-childprice').find('input').val().length < 0){
      // debugger;
      $('.c-childfree').hide();
      $('.c-childprice').show();

   }

if ($('#indipend :selected').text() == "No") {

 $('#showhotelList').show();

  }else{

    $('#showhotelList').hide();

   // body...
  } 


</script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>