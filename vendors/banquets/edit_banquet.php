<?php
include '../../common-apis/reg-api.php';
?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>

	<?php   

 ?>
 <title>Edit Banquet Hall</title>

 <?php include '../header.php'; 
 $userId= $_SESSION["user_id"];

 $selectHotel = 'SELECT `hotel_name`,`hotel_id` FROM `hotel` WHERE `user_id`="'.$userId.'" ';


 $selectHotelQuery=mysqli_query($conn,$selectHotel) or die(mysqli_error($conn));

 if (isset($_GET['h_id'])) {

  $editbnqQuery=select('banquet',array('banquet_id'=>$_GET['id'],'hotel_id'=>$_GET['h_id']));
}else{

  $editbnqQuery=select('banquet',array('banquet_id'=>$_GET['id'],'user_id'=>$_GET['u_id']));
}



$global_banquet_id="";

while ($resultbnq=mysqli_fetch_assoc($editbnqQuery)){    


 $editbnqImgQuery=select('common_imagevideo',array('banquet_id'=>$resultbnq['banquet_id']));
 $editbnqDateQuery=select('common_bookdates', array('banquet_id'=>$resultbnq['banquet_id']));
 $editbnqmenuQuery=select('common_menupackages', array('banquet_id'=>$resultbnq['banquet_id']));

 ?>



 <div class="db-cent-3">
   <div class="db-cent-table db-com-table">
    <div class="db-title">
     <h3><img src="../../images/icon/dbc5.png" alt=""/> Edit Banquet Halls</h3>
     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
   </div>

   <div class="db-profile-edit">
     <form class="col s12"  data-toggle="validator" id="banquet-form" role="form" action="" method="POST" enctype="multipart/form-data"> 
      
       <input type="hidden" name="user_id" value="<?php echo $resultbnq['user_id'];  ?>">
       <input type="hidden" name="banquet_id" value="<?php echo $resultbnq['banquet_id'];  ?>">
       <input type="hidden" name="hotel_id" id="hotelId" value="<?php echo $resultbnq['hotel_id']; ?>">
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
         <input type="hidden" name="banquet_isaircon" id="banquet_isaircon">
         <?php if ($resultbnq['banquet_isaircon'] == "on") { ?>
         <input type="checkbox" class="filled-in" id="filled-in-aricon" checked="" />
         <label for="filled-in-aricon">Aircon?</label>
         <?php  }else{ ?>

         <input type="checkbox" class="filled-in" id="filled-in-aricon" />
         <label for="filled-in-aricon">Aircon?</label>
         <?php      }  ?>
         
       </p>
     </div>
     <div class=" col-md-6" >
      <div class="with_ari" style="display: none;">
       <label >Charges</label>
       <input type="number" name="banquet_aricon" class="input-field validate airconChrges" value="<?php echo $resultbnq['banquet_aricon']; ?>"> 
     </div>
   </div>

 </div>                  
</div>

<div>

  <div class="row">

   <div class="col-md-6 with_generator clearfix" >
     <p class="pTAG">
       <input type="hidden" name="banquet_isgen" id="banquet_isgen">
       <?php if ($resultbnq['banquet_isgen'] == "on") { ?>
       <input type="checkbox" class="filled-in" id="filled-in-gen" checked="" />
       <label for="filled-in-gen">Generator?</label>
       <?php  }else{ ?>

       <input type="checkbox" class="filled-in" id="filled-in-gen" />
       <label for="filled-in-gen">Generator?</label>
       <?php      }  ?>
       
     </p>
   </div>
   <div class="col-md-6">
    <div class="with_gent" style="display: none;">
     <label>Charges</label>
     <input type="number" name="banquet_generator" class="input-field validate genchrges" value="<?php echo $resultbnq['banquet_generator']; ?>">
   </div>
 </div>


</div>
</div>

<div class="col s12 common-wrapper comon_dropdown_botom_line" id="bn-serv common-top"  >

 <label class="col s12">Serve Food ?</label>
 <select onchange="chk_food(this)"  class="" name="banquet_serve" id="bnqFood">
   <?php if ($resultbnq['banquet_serve']== "") { ?>

   <option value="" selected="" disabled="">Select One</option>
   <option value="yes">Yes</option>
   <option value="no">No</option>

   <?php	}elseif ($resultbnq['banquet_serve']== "yes") {?>

   <option value="">Select One</option>
   <option value="yes" selected="">Yes</option>
   <option value="no">No</option>

   <?php }elseif ($resultbnq['banquet_serve']== "no") {?>

   <option value="">Select One</option>
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
           <input type="text"  class="input-field validate pkg_name" name="foodpkg_name[]" value="<?php echo $resultbnqMenu['foodpkg_name'] ?>">
         </div>
         <div class="col-md-6">
           <label>Package Price</label>
           <input type="number"  class="input-field validate pkg_price" name="foodpkg_price[]" value="<?php echo $resultbnqMenu['foodpkg_price'] ?>">
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
         <input type="text" value="" class="input-field validate pkgname pkg_name" name="foodpkg_name[]">
       </div>
       <div class="col-md-6">
         <label>Package Price</label>
         <input type="number" value="" class="input-field validate pkgprice pkg_price" name="foodpkg_price[]">
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
    <?php if ($resultbnq['banquet_gathering']=="mixed")  {?>

    <option value="" disabled="" >Select One</option>
    <option value="mixed" selected="">Mixed</option>
    <option value="separate">Separate</option>
    <?php  }elseif ($resultbnq['banquet_gathering']=="separate") {?>

    <option value="" disabled="" >Select One</option>
    <option value="mixed">Mixed</option>
    <option value="separate" selected="">Separate</option>
    <?php  }else{ ?>

    <option value="" disabled="" selected="">Select One</option>
    <option value="mixed">Mixed</option>
    <option value="separate">Separate</option>
    <?php }  ?>
    
  </select>
</div>
<div class="col-md-6">
  <label>Additional Cost</label>
  <input type="number" name="banquet_adcost" class="input-field validate" style="padding-top: 15px;" value="<?php echo $resultbnq['banquet_adcost']; ?>" required="">
</div>
</div>

<div class="row">
  <div class="col-md-6">
   <label>Offer Discount (%)</label>
   <input type="number" name="banquet_offerdiscount" class="input-field validate offer_discount" value="<?php echo $resultbnq['banquet_offerdiscount']; ?>">
 </div>
 <div class="col-md-6">
   <label>Expires on</label>
   <input type="text" id="expireDate" class="input-field offer_expire" name="banquet_expireoffer" value="<?php echo $resultbnq['banquet_expireoffer']; ?>">
 </div>
</div> 

<div class="imgVeiwinline row" id="hotel_img_wrap">
 <div class="row int_title"><label>Photos :</label></div>
 <?php
 
 while ($imgResult=mysqli_fetch_assoc($editbnqImgQuery)) {

  

  if (!empty($imgResult['common_image'])) {?>
  <div class="imgeWrap" style="float: left; padding-right:5px; padding-bottom:5px;">
    <a class="deletIMG" onclick="deletIMG(event)"  data-value="<?php echo $imgResult['common_imgvideo_id']?>" data-img="<?php echo $imgResult['common_image'] ?>" ><i class="fa fa-times" aria-hidden="true"></i></a>
    <img src="../<?php echo $imgResult['common_image']  ?>" style="width: 150px; height: 100px;" class="materialboxed">
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

<div class="common-top clearfix">
 
  
  <label class="col s4">Hall's Promotional Video (url)</label>
  <div class="input-field col s8">
    <input type="text"  class="" name="common_video"  ></div>
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


<div class="row inactive_checkbox" >

 <p class="pTAG">
  <input type="hidden" name="banquet_inactive" id="hidden_checkbox">
  <?php if ($resultbnq['banquet_inactive']=='on') { ?>

  <input type="checkbox" class="filled-in inactive" id="filled-in-inactive"  checked="" />
  <label for="filled-in-inactive">Inactive</label>

  <?php   }else{ ?>

  <input type="checkbox" class="filled-in inactive" id="filled-in-inactive"  />
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

<?php include '../../common-ftns/upload-img-modal.php'; ?>
<?php include '../../common-ftns/submitting-modal.php'; ?>
<?php include '../footer.php';?>
<script src="../../js/banquet-js/banquet.js"></script>
<script type="text/javascript">

jQuery(document).ready(function(){

  /*==============Ajax Function Defination (For Dates)==============*/
  $('#ajaxbtn').click(function(){

   // console.log(dates_obj);
   var dataObj = {};

   $('.newLI input').each(function(key,value){

    console.log(value);
    if(value.id.indexOf("from") > -1){
            // debugger;
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


      $('#'+id).on('chip.delete', function(e, chip){
       
       var deletechip=$('#input_'+id).val();
       var chipsplit=deletechip.split(",");
       var index = chipsplit.indexOf(chip.tag);

       if (index > -1) {
        
         var splicevalue=chipsplit.splice(index, 1);
         $('#input_'+id).val(chipsplit);
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
  $('#hall_alone input').val('');
}

  // if ($('#independ-select :selected').text()=="No") {

  //      $('#dependent_wrap').hide();

  // }else{

  //     $('#dependent_wrap').hide();
  // }





});
</script>

</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>