<?php
 include '../common-apis/api.php';


$selectHotel = 'SELECT `hotel_name` FROM `hotel` WHERE `user_id`=2 ';


$selectHotelQuery=mysqli_query($conn,$selectHotel) or die(mysqli_error($conn));


  $editbnqQuery=select('banquet',array('banquet_id'=>$_GET['id'],'hotel_id'=>$_GET['h_id']));


   $global_banquet_id="";

?>





<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>

	<?php   while ($resultbnq=mysqli_fetch_assoc($editbnqQuery)){    


	   $editbnqImgQuery=select('common_imagevideo',array('banquet_id'=>$resultbnq['banquet_id']));
       $editbnqDateQuery=select('common_bookdates', array('banquet_id'=>$resultbnq['banquet_id']));
    $editbnqmenuQuery=select('common_menupackages', array('banquet_id'=>$resultbnq['banquet_id']));

   ?>
	<title>Edit Banquet Hall</title>

  <?php include '../header.php';?>

  <div class="db-cent">
    <div class="db-cent-1">
     <p>Hi Jana Novakova,</p>
     <h4>Welcome to your dashboard</h4> </div>
     <div class="db-cent-3">
       <div class="db-cent-table db-com-table">
        <div class="db-title">
         <h3><img src="../images/icon/dbc5.png" alt=""/> Edit Banquet Halls</h3>
         <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
       </div>

       <div class="db-profile-edit">
         <form class="col s12"  data-toggle="validator" id="banquet-form" role="form" action="" method="POST" enctype="multipart/form-data"> 
              

              <input type="hidden" name="banquet_id" value="<?php echo $resultbnq['banquet_id'];  ?>">
              <input type="hidden" name="hotel_id" value="<?php echo $resultbnq['hotel_id']; ?>">
              <?php   $global_banquet_id= $resultbnq['banquet_id']; ?>
          <div>
            <label class="col s12">Banquet Hall name </label>
            <div class="input-field col s12">
             <input type="text"   value="<?php echo $resultbnq['banquet_name']; ?>" name="banquet_name" class="validate is_validate_input" required> 
           </div>
         </div>

         <div>
           <label class="col s12">Capacity</label>
           <div class="input-field col s12">
            <input type="number" name="banquet_space"   class="validate is_validate_input" required value="<?php echo $resultbnq['banquet_space']; ?>"> 
          </div>
        </div>

        <div>

         <div class="common-top">

          <label>Base Booking Charges</label>
          <input type="number" name="banquet_charges" class="input-field validate " required value="<?php echo $resultbnq['banquet_charges']; ?>"> 

        </div>
        <div class="common-top">
          <label >Hall Booking Charges :</label>
        </div>
        <div class="row"> 

          <div class="col-md-6 with_aricon" >
           <p class="pTAG">
            <?php if ($resultbnq['banquet_isaircon'] == "on") { ?>
          <input type="checkbox" class="filled-in" id="filled-in-aricon" name="banquet_isaircon"  checked="" />
             <label for="filled-in-aricon">Aircon?</label>
       <?php  }else{ ?>

        <input type="checkbox" class="filled-in" id="filled-in-aricon" name="banquet_isaircon" />
             <label for="filled-in-aricon">Aircon?</label>
        <?php      }  ?>
            
           </p>
         </div>
         <div class=" col-md-6" >
          <div class="with_ari" style="display: none;">
           <label >Charges</label>
           <input type="number" name="banquet_aricon" class="input-field validate " value="<?php echo $resultbnq['banquet_aricon']; ?>"> 
         </div>
       </div>

     </div>                  
   </div>

   <div>

    <div class="row">

     <div class="col-md-6 with_generator clearfix" >
       <p class="pTAG">

     <?php if ($resultbnq['banquet_isgen'] == "on") { ?>
          <input type="checkbox" class="filled-in" id="filled-in-gen"  name="banquet_isgen"  checked="" />
         <label for="filled-in-gen">Generator?</label>
       <?php  }else{ ?>

        <input type="checkbox" class="filled-in" id="filled-in-gen"  name="banquet_isgen" />
         <label for="filled-in-gen">Generator?</label>
        <?php      }  ?>
         
       </p>
     </div>
     <div class="col-md-6">
      <div class="with_gent" style="display: none;">
       <label>Charges</label>
       <input type="number" name="banquet_generator" class="input-field validate " value="<?php echo $resultbnq['banquet_generator']; ?>">
     </div>
   </div>


 </div>
</div>

<div class="col s12 common-wrapper comon_dropdown_botom_line" id="bn-serv common-top"  >

 <label class="col s12">Serve Food ?</label>
 <select onchange="chk_food(this)"  class="" name="banquet_serve" id="bnqFood">
         <?php if ($resultbnq['banquet_serve']== -1) { ?>

 		       <option value="-1" selected="" disabled="">Select One</option>
			   <option value="yes">Yes</option>
			   <option value="no">No</option>

 <?php	}elseif ($resultbnq['banquet_serve']== "yes") {?>

 	           <option value="-1">Select One</option>
			   <option value="yes" selected="">Yes</option>
			   <option value="no">No</option>

 <?php }elseif ($resultbnq['banquet_serve']== "no") {?>

 	           <option value="-1">Select One</option>
			   <option value="yes">Yes</option>
			   <option value="no" selected="">No</option>
 <?php }  ?>
  

 
</select>
</div>

<div id="menupackage-wrap" style="display: none;" class="common-top">

 <ul class="collapsible def-show-menu" data-collapsible="accordion">
   <?php  $i=0;

   

   if (mysqli_num_rows($editbnqmenuQuery) > 0) {

    while ($resultbnqMenu=mysqli_fetch_assoc($editbnqmenuQuery)) { ?>
     
  
      
   <li id="gen_menupackage_input">
    <div class="collapsible-header  active"><?php echo $resultbnqMenu['foodpkg_name'] ?> <a class="closemenu" ><i class="fa fa-times" aria-hidden="true"></i></a>
    <input type="hidden" name="common_menupkg_id[]" value="<?php echo $resultbnqMenu['common_menupkg_id']; ?>" class="menuwrap-id"> 

    </div>
    <div class="collapsible-body"> 
     <div class="row">
      
     <div class="col-md-6">
       <label>Package Name</label>
       <input type="text"  class="input-field validate" name="foodpkg_name[]" value="<?php echo $resultbnqMenu['foodpkg_name'] ?>">
     </div>
      <div class="col-md-6">
     <label>Package Price</label>
     <input type="number"  class="input-field validate" name="foodpkg_price[]" value="<?php echo $resultbnqMenu['foodpkg_price'] ?>">
   </div> 
   </div>

   <div class="row">
  
   <div class="col-md-6">
     <label >Discount Percentage</label>
     <input type="number"  class="input-field validate pkg_percent" name="foodpkg_discount[]" value="<?php echo $resultbnqMenu['foodpkg_discount'] ?>" style="padding-top: 18px;">
   </div>	
   <div class="col-md-6">
     <label>Package Items</label>
  <div class="input-field ">
   <div class="chips-packageitem chips-package" id="chips-packageitem-<?php echo $i+1; ?>"  > </div>
    
   <input type="hidden" name="foodpkg_item[]" id="input_chips-packageitem-<?php echo $i+1; ?>" class="menupkg-id" value="<?php echo $resultbnqMenu['foodpkg_item'];  ?>"> </div>
   </div>					
 </div>
</div>
</li>
 <?php $i++; }  
   }else{ ?>
<li class="newMenuLI">
    <div class="collapsible-header  active">Menu </div>
    <div class="collapsible-body"> 
     <div class="row">
     <div class="col-md-6">
       <label>Package Name</label>
       <input type="text" value="" class="input-field validate pkgname" name="foodpkg_name[]">
     </div>
     <div class="col-md-6">
     <label>Package Price</label>
     <input type="number" value="" class="input-field validate pkgprice" name="foodpkg_price[]">
   </div> 
   </div>

   <div class="row">
    <div class="col-md-6">
     <label >Discount Percentage</label>
     <input type="number" value="" class="input-field validate discountprcent" name="foodpkg_discount[]" style="padding-top: 18px;">
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

     
<?php }
  ?>
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
  <input type="number" name="banquet_adcost" class="input-field validate" style="padding-top: 15px;" value="<?php echo $resultbnq['banquet_adcost']; ?>">
</div>
</div>

<div class="row">
  <div class="col-md-6">
   <label>Offer Discount (%)</label>
   <input type="number" name="banquet_offerdiscount" class="input-field validate" value="<?php echo $resultbnq['banquet_offerdiscount']; ?>">
 </div>
 <div class="col-md-6">
   <label>Expires on</label>
   <input type="text" id="expireDate" class="input-field from" name="banquet_expireoffer" value="<?php echo $resultbnq['banquet_expireoffer']; ?>">
 </div>
</div> 

<div class="imgVeiwinline row" id="hotel_img_wrap">
   
       <?php
         
                        while ($imgResult=mysqli_fetch_assoc($editbnqImgQuery)) {

                        
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
  <a class="waves-effect waves-light btn modal-trigger spc-modal col s10" href="#modal-images" >Banquet Photos</a>
  <input type="hidden" name="common_image" id="img_ids">
</div>
</div>

<div class="row  common-top clearfix">

 <div class="col s6 dumi_vid_btn" id="pro-file-upload"> <span>HALL's PROMOTIONAL VIDEO</span></div>
 <input type="text" placeholder="Upload Promotional video URL" name="common_video" class="input-field validate col s5 dumi_vid_inpt is_validate_input">
</div>
<div class="common-top">
 <label class="col s4">Hall Description</label>
 <textarea name="banquet_descrip" class="input-field validate is_validate_input" required><?php echo $resultbnq['banquet_descrip']; ?></textarea>
</div>

<div class="common-top">
 <label class="col s4">Amenities:</label>

 <div class="chips chips-autocomplete chips_amenities"></div>
 <input type="hidden"  name="banquet_other" id="amenities-id" value="<?php echo $resultbnq['banquet_other'];  ?>">
</div>

<div id="dates_wrap">
  <label class="col s6">Unavailable in these days</label>
 <div class="row">
  


  <ul class="collapsible def-show-date editroom" data-collapsible="accordion">
  
  	<?php $i=0;
   
  
 if (mysqli_num_rows($editbnqDateQuery) > 0) {
   # code...
     //print_r($resultbnqDates);
    while ($resultbnqDate=mysqli_fetch_assoc($editbnqDateQuery)) {
     // for($j=0; $j < count($resultbnqDate['book_fromdate']); $j++ ){
    ?>
  		  

    
   <li id="gen-date-wrap">
    <div class="collapsible-header  active">Date <a class="closedate" ><i class="fa fa-times" aria-hidden="true"></i></a>
 <input type="hidden" name="common_bokdate_id[]" value="<?php echo $resultbnqDate['common_bokdate_id'] ?>"  class="dateWrap_id">
    </div>
    <div class="collapsible-body"> 
      <div class="row">
       <div class="col-md-6">
        <label>From</label>
        <input type="text" id="from-<?php echo $i+1 ?>" class="input-field from" name="book_fromdate[]" value="<?php echo $resultbnqDate['book_fromdate'] ;   ?>">
      </div>
      <div class="col-md-6">
        <label>To</label>
        <input type="text" id="to-<?php echo $i+1 ?>" class="input-field to" name="book_todate[]" value="<?php echo $resultbnqDate['book_todate'] ;   ?>"> 
      </div>
    </div>
  </div>
</li>
<?php $i++;  	} 

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

<?php }  ?>
</ul>

</div>
</div>
<div  class=" ">
 <a class="waves-effect waves-light btn " onclick="gen_dates_input(event,'edit')">Add More Dates</a>
</div>

<div class="col s12 common-wrapper comon_dropdown_botom_line" id="bn-serv common-top"  >

 <label class="col s12">Independent Hall?</label>
 <select onchange="hall_alone(this)"  class="" name="banquet_independ" id="independ-select">

 	<?php if ($resultbnq['banquet_independ']== "yes") { ?>

 		         <option value="-1"  disabled="">Select One</option>
			       <option value="yes" selected="">Yes</option>
			       <option value="no">No</option>

 <?php	}elseif ($resultbnq['banquet_independ']== "no") {?>

 	           <option value="-1" disabled="">Select One</option>
			       <option value="yes" >Yes</option>
			       <option value="no" selected="">No</option>

 <?php }else {?>

 	           <option value="-1" disabled="" selected="">Select One</option>
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
   <option value="null" disabled="">Select One</option>
   <option name="" selected="" value="<?php echo $resultbnq['hotel_name'] ?>"><?php echo $resultbnq['hotel_name'] ?></option>
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
              <input  type="text" name="banquet_address" class="input-field validate" value="<?php echo $resultbnq['banquet_address']; ?>" >
            </div>
            <div class="col-md-6">
              <label>City</label>
              <input  type="text" name="banquet_city" class="input-field validate" value="<?php echo $resultbnq['banquet_city']; ?>" >
            </div>

          </div>

          <div class="row">
           <div class="col-md-6">
            <label>Province</label>
            <input  type="text" name="banquet_province" class="input-field validate" value="<?php echo $resultbnq['banquet_province']; ?>" >
          </div>
          <div class="col-md-6">
            <label>Phone Number</label>
            <input  type="number" name="banquet_phone" class="input-field validate" value="<?php echo $resultbnq['banquet_phone']; ?>" >
          </div>

        </div>

        <div class="row">
         <div class="col-md-6">
          <label>Email Address</label>
          <input  type="email" name="banquet_email" class="input-field validate" value="<?php echo $resultbnq['banquet_email']; ?>" >
        </div>
        <div class="col-md-6">
          <label>Facebook</label>
          <input  type="text" name="banquet_fcbok" class="input-field validate" value="<?php echo $resultbnq['banquet_fcbok']; ?>" >
        </div>

      </div>

      <div class="row">
       <div class="col-md-6">
        <label>Twitter</label>
        <input  type="text" name="banquet_twiter" class="input-field validate" value="<?php echo $resultbnq['banquet_twiter']; ?>" >
      </div>
      <div class="col-md-6">
        <label>Youtube</label>
        <input  type="text" name="banquet_utube" class="input-field validate" value="<?php echo $resultbnq['banquet_utube']; ?>" >
      </div>

    </div>
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
<div id="modal-images" class="modal modal-fixed-footer image_drop_down_modal_body">
  <div class="modal-content">
   <div class="modal-header"><h2>Upload  Photos</h2></div>
   <iframe src="../up_load_singleimg.php?p=edit&t=banquet&b_id=<?php echo $global_banquet_id; ?>"></iframe>
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



<?php include '../footer.php';?>



<script src="../js/banquet-js/banquet.js"></script>
<script type="text/javascript">

// $("body").on("click",".closemenu",function(){ 

//           $(this).parents("#gen_menupackage_input").remove();

//       });



  jQuery(document).ready(function(){

        /*==============Ajax Function Defination (For Dates)==============*/
$('#ajaxbtn').click(function(){

    debugger;

    alert('jgjg');
   // console.log(dates_obj);
    var dataObj = {};

    $('.newLI input').each(function(key,value){

          console.log(value);
      if(value.id.indexOf("from") > -1){
        debugger;
        dataObj['book_fromdate'] = $(value).val();
      }
      if(value.id.indexOf("to") > -1){
        dataObj['book_todate'] = $(value).val();
      }
    });
    dataObj['banquet_id'] = $('input[name=banquet_id]').val();
    dataObj['form_date_type'] = "banquet";

    console.log(dataObj);
    // debugger;
        $.ajax({
                              type:"POST",
                              url:"../banquets/insert_banquet.php",
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

/*==========================================
 Insertion call for Menu pacakge through ajax
===========================================*/








/*==============End Ajax Function Defination==============*/
    tinymce.init({ selector:'textarea' });

		// $('#modal-images').modal();

var ameinty_obj=[];
var amenity= $('#amenities-id').val().split(",");

for (var i = 0; i < amenity.length; i++) {
        // console.log(amenity[i]);
        ameinty_obj.push({"tag":amenity[i]});
}


   $('.chips-autocomplete').material_chip({
      data:ameinty_obj,
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



   $('.chips-packageitem').material_chip({
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



   
var packageitem= $('.menupkg-id');
console.log(packageitem);
 
$.each(packageitem,function(key,item){
  // debugger;
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

/*=======================
Reintialize Dropdown and hide inputs
============================*/

   if ($('#bnqFood :selected').text()=="Yes") {
   

     document.getElementById('menupackage-wrap').style.display = "block";
    }else{
         document.getElementById('menupackage-wrap').style.display = "none";
         $('#menupackage-wrap').find('input').val('');
         
          $('#menupackage-wrap').find('input').removeClass('valid');
           $('#menupackage-wrap').find('input').removeClass('invalid');
    }


// debugger;
    if($(".with_aricon input:checkbox:checked").length > 0){
 // debugger;
  $('.with_ari').show();

  }else{
    $('.with_ari').hide();
  }


  if($(".with_generator input:checkbox:checked").length > 0){
// debugger;
  $('.with_gent').show();

  }else{
    $('.with_gent').hide();
  }


if($('#independ-select :selected').text()=="Yes"){
    $('#hall_alone').show();
    $('#show_hotelName').hide();

  }else{

    $('#hall_alone').hide();
    $('#show_hotelName').show();
  }





 });
</script>

</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>