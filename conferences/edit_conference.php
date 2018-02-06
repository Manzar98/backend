<?php
include '../common-apis/api.php';
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>


   <title>Edit Conference Hall</title>


   <?php include '../header.php'; 
    $userId= $_SESSION["user_id"];

   $selectHotel = 'SELECT `hotel_name` FROM `hotel` WHERE `user_id`="'.$userId.'"';


$selectHotelQuery=mysqli_query($conn,$selectHotel) or die(mysqli_error($conn));

$editconferenceQuery=select('conference',array('conference_id'=>$_GET['id'],'hotel_id'=>$_GET['h_id']));

 while ($resultConference=mysqli_fetch_assoc($editconferenceQuery)) {

   $editconImgQuery=select('common_imagevideo',array('conference_id'=>$resultConference['conference_id']));

   $editconDateQuery=select('common_bookdates', array('conference_id'=>$resultConference['conference_id']));

   $editconmenuQuery=select('common_menupackages', array('conference_id'=>$resultConference['conference_id'])); 

    $global_conference_id="";
    ?>


   <div class="db-cent">
    <div class="db-cent-1">
     <p>Hi Jana Novakova,</p>
     <h4>Welcome to your dashboard</h4> </div>
     <div class="db-cent-3">
       <div class="db-cent-table db-com-table">
        <div class="db-title">
         <h3><img src="../images/icon/dbc5.png" alt=""/> Edit Conference Hall</h3>
         <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
       </div>

       <div class="db-profile-edit">
         <form class="col s12"  data-toggle="validator" id="conference-form" role="form" action="" method="POST" enctype="multipart/form-data">

           <input type="hidden" name="hotel_id" value="<?php echo $resultConference['hotel_id'] ?>">	
           <input type="hidden" name="conference_id" value="<?php echo $resultConference['conference_id'] ?>"> 
           <?php $global_conference_id=$resultConference['conference_id'];  ?>

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

            <div>
              <label class="col s4">Hall Charges</label>
              <div class="input-field col s8">
                <input type="number"   class="validate" name="conference_charges" required="" aria-required="true" value="<?php echo $resultConference['conference_charges']  ?>"> </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                 <label>Offer Discount (%)</label>
                 <input type="number" name="conference_offerdiscount" class="input-field validate offer_discount" value="<?php echo $resultConference['conference_offerdiscount']  ?>">
               </div>
               <div class="col-md-6">
                 <label>Expires on</label>
                 <input type="text" id="expireDate" class="input-field from offer_expire" name="conference_expireoffer" value="<?php echo $resultConference['conference_expireoffer']  ?>">
               </div>
             </div> 



             <div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select" id="bn-serv"  >

               <label class="col s12">Serve Food ?</label>
               <select onchange="chk_food(this)"  class="" name="conference_serve" required="" aria-required="true" id="conferenceFood" >
                <?php if ($resultConference['conference_serve']== "") { ?>

                <option value="" selected="" disabled="">Select One</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>

                <?php  }elseif ($resultConference['conference_serve']== "yes") {?>

                <option value="" disabled="">Select One</option>
                <option value="yes" selected="">Yes</option>
                <option value="no">No</option>

                <?php }elseif ($resultConference['conference_serve']== "no") {?>

                <option value="" disabled="">Select One</option>
                <option value="yes">Yes</option>
                <option value="no" selected="">No</option>
                <?php }  ?>



              </select>
            </div>

            <div id="menupackage-wrap" style="display: none;" class="common-top">

             <ul class="collapsible def-show-menu" data-collapsible="accordion">
              <?php $i=0;
              
  if (mysqli_num_rows($editconmenuQuery) > 0) {

       while ($resultconmenu=mysqli_fetch_assoc($editconmenuQuery)){ 
       
                ?>

                
                <li id="gen_menupackage_input">
                  <div class="collapsible-header  active"><?php echo $resultconmenu['foodpkg_name']; ?> <a class="closemenu" ><i class="fa fa-times" aria-hidden="true"></i></a>
                  <input type="hidden" name="common_menupkg_id[]" value="<?php echo $resultconmenu['common_menupkg_id']; ?>" class="menuwrap-id">
                  </div>
                  <div class="collapsible-body"> 
                   <div class="row">
                    <div class="col-md-6">
                     <label>Package Name</label>
                     <input type="text" class="input-field validate pkg_name" name="foodpkg_name[]" value="<?php echo $resultconmenu['foodpkg_name'] ?>">
                   </div>
                   <div class="col-md-6">
                    <label>Package Price</label>
                    <input type="number" class="input-field validate pkg_price" name="foodpkg_price[]" value="<?php echo $resultconmenu['foodpkg_price'] ?>">
                  </div>  
                </div>

                <div class="row">

                  <div class="col-md-6">
                   <label >Discount Percentage</label>
                   <input type="number" class="input-field validate" name="foodpkg_discount[]" value="<?php echo $resultconmenu['foodpkg_discount'] ?>" style="padding-top: 18px;">
                 </div>

                 <div class="col-md-6">
                   <label>Package Items</label>
                   <div class="input-field ">
                     <div class="chips-packageitem chips-package" id="chips-packageitem-<?php echo $i+1; ?>"  > </div>

                     <input type="hidden" name="foodpkg_item[]" id="input_chips-packageitem-<?php echo $i+1; ?>" class="menupkg-id" value="<?php echo $resultconmenu['foodpkg_item'];  ?>"> </div>
                   </div> 					
                 </div>
               
               </div>
             </li>
             <?php $i++; }      

               }else{ ?>
               <li class="newMenuLI">
    <div class="collapsible-header  active">Menu</div>
    <div class="collapsible-body"> 
     <div class="row">
     <div class="col-md-6">
       <label>Package Name</label>
       <input type="text" value="" class="input-field validate pkg_name" name="foodpkg_name[]">
     </div>
     <div class="col-md-6">
     <label>Package Price</label>
     <input type="number" value="" class="input-field validate pkg_price" name="foodpkg_price[]">
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
   <div class="chips-packageitem chips-package" id="chips-packageitem"  name=""> </div>
   <input type="hidden" name="foodpkg_item[]" id="input_chips-packageitem" class="menupkg-id"> </div>
   </div>           
 </div>

</div>
</li>
 <?php  }
?>
           </ul>

           <div  class=" ">
             <a class="waves-effect waves-light btn " onclick="gen_menupackage_input(event)">Add More Package</a>
           </div>
         </div> 

         <div class="imgVeiwinline row" id="hotel_img_wrap">
           <?php
          $photocounter=0;
           while ($imgResult=mysqli_fetch_assoc($editconImgQuery)) {
            if ($photocounter==0) { ?>
                      <div class="row int_title"><label>Photos :</label></div>
                    <?php $photocounter++; } 

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
         <input type="text" placeholder="Upload Promotional video URL" name="common_video" class="input-field validate col s5 dumi_vid_inpt" >
       </div>

       <div class="common-top">
         <label class="col s4">Amenities</label>
         <div class="chips chips-autocomplete chips_amenities"></div>
         <input type="hidden" name="conference_other" id="amenities-id" value="<?php echo $resultConference['conference_other']; ?>">
       </div>

       <div id="dates_wrap">

        <label class="col s6">Unavailable in these days</label>
         <div class="row">



          <ul class="collapsible def-show-date editroom" data-collapsible="accordion">
           <?php  $i=0;
             
 if (mysqli_num_rows($editconDateQuery) > 0) { 
       
       while ($resultconDate=mysqli_fetch_assoc($editconDateQuery)){ ?>
       
          

           <li id="gen-date-wrap">
            <div class="collapsible-header  active">Date
              <a class="closedate" ><i class="fa fa-times" aria-hidden="true"></i></a>
             <input type="hidden" name="common_bokdate_id[]" value="<?php echo $resultconDate['common_bokdate_id'] ?>" class="dateWrap_id">
            </div>
            <div class="collapsible-body"> 
              <div class="row">
               <div class="col-md-6">
                <label>From</label>
                <input type="text" id="from-<?php echo $i+1 ?>" class="input-field from" name="book_fromdate[]" value="<?php echo $resultconDate['book_fromdate'] ?>">
              </div>
              <div class="col-md-6">
                <label>To</label>
                <input type="text" id="to-<?php echo $i+1 ?>" class="input-field to" name="book_todate[]" value="<?php echo $resultconDate['book_todate'] ?>"> 
              </div>
            </div>
          </div>
        </li>
        <?php $i++;  }

         }else{ ?>
         <li class="newLI">
    <div class="collapsible-header  active">Date</div>
    <div class="collapsible-body"> 
      <div class="row">
        <input type="hidden" name="common_bokdate_id[]" id="date_id">
       <div class="col-md-6">
        <label>From</label>
        <input type="text" id="from" class="input-field from" name="book_fromdate[]">
      </div>
      <div class="col-md-6">
        <label>To</label>
        <input type="text" id="to" class="input-field to" name="book_todate[]" > 
      </div>
    </div>
  </div>
</li>


    <?php      }   ?>
      </ul>

    </div>
  </div>
  <div  class=" ">
   <a class="waves-effect waves-light btn " onclick="gen_dates_input(event,'edit')">Add More Dates</a>
 </div>

 <div class="col s12 common-wrapper comon_dropdown_botom_line" id="bn-serv common-top"  >

 <label class="col s12">Independent Hall?</label>
 <select onchange="hall_alone(this)"  class="" name="conference_independ" id="independ-select">

  <?php if ($resultConference['conference_independ']== "yes") { ?>

           <option value="" disabled="">Select One</option>
           <option value="yes" selected="">Yes</option>
           <option value="no">No</option>

 <?php  }elseif ($resultConference['conference_independ']== "no" ) {?>

          <option value="" disabled="">Select One</option>
          <option value="yes" >Yes</option>
          <option value="no" selected="">No</option>

 <?php }else {?>

          <option value="" selected="" disabled="">Select One</option>
          <option value="yes">Yes</option>
          <option value="no" >No</option>
 <?php }  ?>
  
</select>
</div>

<?php

if (mysqli_num_rows($selectHotelQuery) > 0) { ?>
<div class="col s12 common-wrapper comon_dropdown_botom_line is_validate_select" style="display: none;" id="show_hotelName" >
  <label class="col s12">Select Hotel</label>
  <select  class="" name="hotel_name" >
   <option value="null"  disabled="">Select One</option>
   <option name="" selected="" value="<?php echo $resultConference['hotel_name'] ?>"><?php echo $resultConference['hotel_name'] ?></option>
   <?php
    
   while ($result=mysqli_fetch_assoc($selectHotelQuery)) { ?>


   <option name="" value="<?php echo $result['hotel_name'] ?>"><?php echo $result['hotel_name'] ?></option>


                <?php # code...
              }  ?>
            </select>
          </div>
          <?php  }  ?>




          

          <div id="hall_alone" style="display: none;">
            <div class="row common-top">
             <div class="col-md-6">
              <label>Address</label>
              <input  type="text" name="conference_address" class="input-field validate ind_address" value="<?php echo $resultConference['conference_address']; ?>" >
            </div>
            <div class="col-md-6">
              <label>City</label>
              <input  type="text" name="conference_city" class="input-field validate ind_city" value="<?php echo $resultConference['conference_city']; ?>" >
            </div>

          </div>

          <div class="row">
           <div class="col-md-6">
            <label>Province</label>
            <input  type="text" name="conference_province" class="input-field validate ind_province" value="<?php echo $resultConference['conference_province']; ?>" >
          </div>
          <div class="col-md-6">
            <label>Phone Number</label>
            <input  type="number" name="conference_phone" class="input-field validate ind_phone" value="<?php echo $resultConference['conference_phone']; ?>" >
          </div>

        </div>

        <div class="row">
         <div class="col-md-6">
          <label>Email Address</label>
          <input  type="email" name="conference_email" class="input-field validate ind_email" value="<?php echo $resultConference['conference_email']; ?>" >
        </div>
        <div class="col-md-6">
          <label>Facebook</label>
          <input  type="text" name="conference_fcbok" class="input-field validate" value="<?php echo $resultConference['conference_fcbok']; ?>" >
        </div>

      </div>

      <div class="row">
       <div class="col-md-6">
        <label>Twitter</label>
        <input  type="text" name="conference_twiter" class="input-field validate" value="<?php echo $resultConference['conference_twiter']; ?>" >
      </div>
      <div class="col-md-6">
        <label>Youtube</label>
        <input  type="text" name="conference_utube" class="input-field validate" value="<?php echo $resultConference['conference_utube']; ?>" >
      </div>

    </div>
  </div>
  <div class="row" >
                          
                       <p class="pTAG">
                          <?php if ($resultConference['conference_inactive']=='on') { ?>

                           <input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="conference_inactive" checked="" />
                         <label for="filled-in-inactive">Inactive</label>
                         
                        <?php   }else{ ?>

                        <input type="checkbox" class="filled-in inactive" id="filled-in-inactive" name="conference_inactive" />
                         <label for="filled-in-inactive">Inactive</label>
                      <?php  }  ?>
                         
                        </p>
                         
                    </div>
   
 <?php   } ?>

  <div  class=" ">
              <a class="waves-effect waves-light btn " id="ajaxbtn" >Ajax</a>
            </div>
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
   <iframe src="../up_load_singleimg.php?p=edit&t=conference&c_id=<?php echo $global_conference_id; ?>" id="photo_iframe"></iframe>
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






<?php include '../footer.php';  ?>


<script src="../js/conference-js/conference.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function(){
     /*==============Ajax Function Defination (For Dates)==============*/
$('#ajaxbtn').click(function(){

   

    alert('jgjg');
   // console.log(dates_obj);
    var dataObj = {};

    $('.newLI input').each(function(key,value){
      if(value.id.indexOf("from") > -1){
        dataObj['book_fromdate'] = $(value).val();
      }
      if(value.id.indexOf("to") > -1){
        dataObj['book_todate'] = $(value).val();
      }
    });
    dataObj['conference_id'] = $('input[name=conference_id]').val();
    dataObj['form_date_type'] = "conference";

    console.log(dataObj);
    debugger;
        $.ajax({
                              type:"POST",
                              url:"../conferences/insert_conference.php",
                              data: dataObj,
                              success:function(data) {
                var response = JSON.parse(data);
                              console.log(response);
                              if(response.message == "success"){
                                $('.newLI #date_id').val(response.id);
                                $('.newLI').removeClass('newLI');
                              }
                   }


                    })

  });

/*==============End Ajax Function Defination==============*/
    tinymce.init({ selector:'textarea' });


  // $('#modal-images').modal();

     // alert('Hit');
  // $("#chosenexample").chosen({ allow_single_deselect: true})
  var ameinty_obj=[];
  var amenity= $('#amenities-id').val().split(",");

  for (var i = 0; i < amenity.length; i++) {
        // console.log(amenity[i]);
        ameinty_obj.push({"tag":amenity[i]});
      }



      $('.chips-autocomplete').material_chip({
        data: ameinty_obj,

        autocompleteOptions: {
          data: {
            'Multimedia Projector': null,
            'Drafting pads and pens': null

          },
          limit: Infinity,
          minLength: 1
        }
      });


      var packageitem= $('.menupkg-id');
      console.log(packageitem);

      $.each(packageitem,function(key,item){
        var packageitem_obj=[];
        var id= item.id.split('_')[1];
        var packagesItems = $(item).val();

        var menuItems = packagesItems.split(','); 
        for (var i = 0; i < menuItems.length; i++) {
         // console.log(amenity[i]);
         packageitem_obj.push({"tag":menuItems[i]});
       }

       $('#'+id).material_chip({

        data : packageitem_obj,
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

})



      $('#chips-packageitem').material_chip({
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

/*=======================
Reintialize Dropdown and hide inputs
============================*/

    if ($('#conferenceFood :selected').text()=="Yes") {
      // debugger;
     document.getElementById('menupackage-wrap').style.display = "block";
    }else{
         document.getElementById('menupackage-wrap').style.display = "none";
         $('#menupackage-wrap').find('input').val('');
         
          $('#menupackage-wrap').find('input').removeClass('valid');
           $('#menupackage-wrap').find('input').removeClass('invalid');
   }

   if($('#independ-select :selected').text()=="Yes"){
    $('#hall_alone').show();
    $('#show_hotelName').hide();

  }else{

    $('#hall_alone').hide();
    $('#show_hotelName').show();
    $('#hall_alone input').val('');
  }




   

 });
</script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>
