<?php
include '../common-apis/api.php';

   $editconferenceQuery=select('conference',array('hotel_id'=>31,'conference_id'=>20));

?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
  <?php
         while ($resultConference=mysqli_fetch_assoc($editconferenceQuery)) {
            
       $editconImgQuery=select('common_imagevideo',array('hotel_id'=>31,'conference_id'=>$resultConference['conference_id']));

       $editconDateQuery=select('common_bookdates', array('conference_id'=>$resultConference['conference_id']));

       $editconmenuQuery=select('common_menupackages', array('conference_id'=>$resultConference['conference_id'])); 

     

  ?>

	<title>Edit Conference Hall</title>


<?php include '../header.php'; ?>


<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../images/icon/dbc5.png" alt=""/> Add Conference Hall</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						 
                         <div class="db-profile-edit">
					<form class="col s12"  data-toggle="validator" id="conference-form" role="form" action="conference-post.php" method="POST" enctype="multipart/form-data">
						
								
							
						<div>
							<label class="col s4">Name of Hall </label>
							<div class="input-field col s8">
								<input type="text"  class="validate" name="conference_name" required="" aria-required="true" value="<?php echo $resultConference['conference_name']  ?>"> </div>
						</div>
						<div>
							<label class="col s4">Capacity</label>
							<div class="input-field col s8">
								<input type="number"   class="validate" name="conference_space" required="" aria-required="true" value="<?php echo $resultConference['conference_space']  ?>"> </div>
						</div>

						<div class="row">
                             	<div class="col-md-6">
                             		<label>Offer Discount (%)</label>
                             		<input type="number" name="conference_offerdiscount" class="input-field validate" value="<?php echo $resultConference['conference_offerdiscount']  ?>">
                             	</div>
                             	<div class="col-md-6">
                             		<label>Expires on</label>
                             		<input type="text" id="expireDate" class="input-field from" name="conference_expireoffer" value="<?php echo $resultConference['conference_expireoffer']  ?>">
                             	</div>
                             </div> 



					   <div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select" id="bn-serv"  >

							<label class="col s12">Serve Food ?</label>
							<select onchange="chk_food(this)"  class="" name="conference_serve" required="" aria-required="true">
                <?php if ($resultConference['conference_serve']== -1) { ?>

                       <option value="" selected="" disabled="">Select One</option>
                       <option value="yes">Yes</option>
                       <option value="no">No</option>

 <?php  }elseif ($resultConference['conference_serve']== "yes") {?>

                         <option value="-1">Select One</option>
                         <option value="yes" selected="">Yes</option>
                         <option value="no">No</option>

 <?php }elseif ($resultConference['conference_serve']== "no") {?>

                         <option value="-1">Select One</option>
                         <option value="yes">Yes</option>
                         <option value="no" selected="">No</option>
 <?php }  ?>
  
							

							</select>
						</div>
                        
                      <div id="menupackage-wrap" style="display: none;" class="common-top">
						
                           <ul class="collapsible def-show-menu" data-collapsible="accordion">
                            <?php  while ($resultconmenu=mysqli_fetch_assoc($editconmenuQuery)) { 

                              ?>
                                   
                        
                       		<li>
                       			<div class="collapsible-header  active">Menu</div>
                       			<div class="collapsible-body"> 
                       				<div class="row">
                       					<div class="col-md-6">
                       						<label >Menu Packages</label>
                       						<input type="text" class="input-field validate" name="foodpkg_menu[]" value="<?php echo $resultconmenu['foodpkg_menu'] ?>">
                       					</div>
                       					<div class="col-md-6">
                       						<label>Package Name</label>
                       						<input type="text" class="input-field validate" name="foodpkg_name[]" value="<?php echo $resultconmenu['foodpkg_name'] ?>">
                       					</div>
                       				</div>

                       				<div class="row">
                       					<div class="col-md-6">
                       						<label>Package Price</label>
                       						<input type="number" class="input-field validate" name="foodpkg_price[]" value="<?php echo $resultconmenu['foodpkg_price'] ?>">
                       					</div>	
                       					<div class="col-md-6">
                       						<label >Discount Percentage</label>
                       						<input type="number" class="input-field validate" name="foodpkg_discount[]" value="<?php echo $resultconmenu['foodpkg_discount'] ?>">
                       					</div>						
                       				</div>
                       				<div class="col s12">
                       					<label>Package Items</label>
                       					<div class="input-field col s3">
                       						<div class="chips-packageitem chips-package" id="chips-packageitem-1"  > </div>
                                  <?php 

                          $pkgItem = explode(",", $resultconmenu['foodpkg_item']);


                          foreach($pkgItem as $item) { ?>
                          <div class="chip">
                            <?php echo $item;   ?>
                            <i class="material-icons close">close</i>
                          </div>

                          <?php     
                        }

                        ?>
                       						<input type="hidden" name="foodpkg_item[]" id="input_chips-packageitem-1" class="menupkg-id"> </div>
                       					</div>

                       				</div>
                       			</li>
                             <?php  }      ?>
                       		</ul>

                       		 <div  class=" ">
                            	<a class="waves-effect waves-light btn " onclick="gen_menupackage_input(event)">Add More Package</a>
                        </div>
					  </div> 

            <div class="imgVeiwinline row" id="hotel_img_wrap">
               <?php

                        while ($imgResult=mysqli_fetch_assoc($editconImgQuery)) {
                              
                          if (!empty($imgResult['common_image'])) {?>
                          <div class="imgeWrap">
                            <a class="deletIMG" onclick="deletIMG(event)"  data-value="<?php echo $imgResult['common_imgvideo_id']?>" data-img="<?php echo $imgResult['common_image'] ?>" ><i class="fa fa-times" aria-hidden="true"></i></a>
                            <img src="../<?php echo $imgResult['common_image']  ?>" width="150" class="materialboxed">
                          </div>&nbsp;&nbsp;


                          <?php } ?>




                          <?php }

                          ?>
            </div>

					<div class="row common-top">
							<div class="">
								<!-- Modal Trigger -->
								<div class="col s1"></div>
							<a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-images" >Conference Photos</a>
							<input type="hidden" name="common_image" id="img_ids">
							</div>
					   </div>
                           											
							<div class="row  common-top clearfix">
								 
									<div class="col s6 dumi_vid_btn" id="pro-file-upload"> <span>HALL's PROMOTIONAL VIDEO</span></div>
										<input type="text" placeholder="Upload Promotional video URL" name="common_video" class="input-field validate col s5 dumi_vid_inpt" required="" aria-required="true">
							</div>

						<div class="common-top">
							<label class="col s4">Amenities</label>
							<div class="chips chips-autocomplete chips_amenities"></div>
              <?php 

                          $lst = explode(",", $resultConference['conference_other']);


                          foreach($lst as $item) { ?>
                          <div class="chip">
                            <?php echo $item;   ?>
                            <i class="material-icons close">close</i>
                          </div>

                          <?php     
                        }

                        ?>

							<input type="hidden" name="conference_other[]" id="amenities-id">
						</div>
                         
                          <div id="dates_wrap">
                        	<div class="row">
                        		<label class="col s6">Unavailable in these days</label>
                  

                          <ul class="collapsible def-show-date" data-collapsible="accordion">
                          	<?php while ($resultconDate=mysqli_fetch_assoc($editconDateQuery)) { ?>
                              
                         
                            <li>
                          		<div class="collapsible-header  active">Date</div>
                          		<div class="collapsible-body"> 
                          		<div class="row">
                          			<div class="col-md-6">
                          				<label>From</label>
                          				<input type="text" id="from" class="input-field from" name="book_fromdate[]" value="<?php echo $resultconDate['book_fromdate'] ?>">
                          			</div>
                          			<div class="col-md-6">
                          				<label>To</label>
                          				<input type="text" id="to" class="input-field to" name="book_todate[]" value="<?php echo $resultconDate['book_todate'] ?>"> 
                          			 </div>
                          		 </div>
                          	  </div>
                          	</li>
                            <?php   }   ?>
                          </ul>
        
                        </div>
                    </div>
                        <div  class=" ">
                            	<a class="waves-effect waves-light btn " onclick="gen_dates_input(event)">Add More Dates</a>
                        </div>
                       
  <?php   } ?>
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


<?php include '../footer.php';  ?>




<script type="text/javascript">
jQuery(document).ready(function(){
  tinymce.init({ selector:'textarea' });


  // $('#modal-images').modal();
     
     // alert('Hit');
  // $("#chosenexample").chosen({ allow_single_deselect: true})



   $('.chips-autocomplete').material_chip({
    autocompleteOptions: {
      data: {
        'Multimedia Projector': null,
        'Drafting pads and pens': null
        
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
// $('select').material_select();

// $('select[required]').css({
//       display: 'inline',
//       position: 'absolute',
//       float: 'left',
//       padding: 0,
//       margin: 0,
//       border: '1px solid rgba(255,255,255,0)',
//       height: 0, 
//       width: 0,
//       top: '2em',
//       left: '3em',
//       opacity: 0,
//       pointerEvents: 'none'
//     });


// $.validator.setDefaults({
//   highlight: function(element, errorClass, validClass) {
//     if (element.tagName === 'SELECT')
//      $(element).closest('.select-wrapper').addClass('invalid');
//     else
//      $(element).removeClass(validClass).addClass(errorClass);
//   },
//   unhighlight: function(element, errorClass, validClass) {
//     if (element.tagName === 'SELECT')
//      $(element).closest('.select-wrapper').removeClass('invalid');
//     else
//      $(element).removeClass(errorClass).addClass(validClass);
//   },
//   errorClass: 'invalid',
//   validClass: "valid",
//   errorPlacement: function(error, element) {
//     if (element.prop('tagName')  === 'SELECT') {
//       // alternate placement for select error
//       error.appendTo( element.parent() );
//       error.addClass('active');
//     }
//     else {
//       $(element)
//         .closest("form")
//         .find("label[for='" + element.attr("id") + "']")
//         .attr('data-error', error.text());
//     }
//   },
//   submitHandler: function(form) {
//     console.log('form ok');
//   }
// });

// $("#conference-form").validate({
//   rules: {
//     dateField: {
//       date: true
//     }
//   }
// });

















// $('#pro-sub-btn').click(function(){
//   debugger;
//  var isFormValidated = true;
//   $.each($('#conference-form .is_validate_input'),function(key,val){
//      if(!val.value){
//        isFormValidated = false;
//        console.log(val);
//        $(val).addClass('error'); 
//      }else{
//         debugger;
//        $(val).removeClass('error');
//      }
//   });
//   // $.each($('#conference-form .is_validate_select'),function(key,val){
//   //     if(!$(val).find('select').val()){
//   //       isFormValidated = false;
//   //       console.log(val);
//   //       $(val).find('.select-wrapper').addClass('error');

//   //     }else{
//   //       // debugger;
//   //       $(val).find('.select-wrapper').removeClass('error');
//   //     }
//   // });


//  if(isFormValidated){
//    console.log('TIme to submit form');
//    $("#room-form").submit();
//  }else{
//    console.log('There is an error');
//  }
// })




    //  $("#conference-form").validate({

    //       errorElement : 'div',
    //      errorPlacement: function(error, element) {

    //         console.log(element);
    //        var placement = $(element).data('error');

    //           console.log(placement);
    //           console.log(error);
    //        if (placement) {
    //          $(placement).append(error)
    //        } else {
    //          error.insertAfter(element);
    //        }
    //      }
    // });

});
</script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>
