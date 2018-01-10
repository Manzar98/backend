$(document).ready(function() {
    "use strict";

    //LEFT MOBILE MENU OPEN
    $(".show-menu").on('click', function() {
        $(".mm-menu").css('right', '-25%');
    });

    //LEFT MOBILE MENU OPEN
    $(".hide-menu").on('click', function() {
        $(".mm-menu").css('right', '-100%');
    });
    //GOOGLE MAP - SCROLL REMOVE
    $('.hp-view')
        .on('click', function() {
            $(this).find('iframe').addClass('clicked')
        })
        .on('mouseleave', function() {
            $(this).find('iframe').removeClass('clicked')
        });

    $('input#input_text, textarea#textarea1').characterCounter();
    Materialize.updateTextFields();
    $('.collapsible').collapsible();
    $('.materialboxed').materialbox();
    $('.carousel').carousel();
    $('select').material_select();
    $('.slider').slider();
    $('.dropdown-button').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrainWidth: true, // Does not change width of dropdown to that of the activator
        hover: true, // Activate on hover
        gutter: 0, // Spacing from edge
        belowOrigin: false, // Displays dropdown below the button
        alignment: 'left', // Displays dropdown with edge aligned to the left of button
        stopPropagation: false // Stops event propagation
    });
});

//PORTFOLIO FILTER
$(function() {

    var filterList = {

        init: function() {

            // MixItUp plugin
            // http://mixitup.io
            $('#portfoliolist').mixItUp({
                selectors: {
                    target: '.portfolio',
                    filter: '.filter'
                },
                load: {
                    filter: '.logo'
                }
            });

        }

    };

    // Run the show!
    filterList.init();


});

 var manzar= "";
//DATE PICKER	
$(function() {

    
    var dateFormat = "dd-mm-yy",
        from = $(".from")
        .datepicker({
            // defaultDate: "+1w",
            // changeMonth: false,
            minDate: 0,
             onSelect: function(selected) {
              // debugger;
           $("#to").datepicker("option","minDate", selected)
           debugger;
           if($("#from").parents('.def-show-date').hasClass('editroom')){
                if($("#to").val() && $('#from').val() && !$('#from').parents('.collapsible-body').find('#date_id').val()){
                 alert('Time to send ajax call for insertion')
                 $('#ajaxbtn').trigger('click');
                  

                }
            }
         }
            // numberOfMonths: 1
           
            
        })
        
           
           .on("change", function() {

               var from = to.datepicker("option", "maxDate", getDate(this));
               console.log($(this).val());

             
          }),
        to = $(".to").datepicker({
             // defaultDate: "+1w",
            // changeMonth: false,
            minDate: 0,
            // numberOfMonths: 1
           onSelect: function(selected,element) {
            // debugger;
            console.log(element);
            $("#from").datepicker("option","maxDate", selected)
            debugger;
            if($("#to").parents('.def-show-date').hasClass('editroom')){
                if($("#to").val() && $('#from').val() && !$('#from').parents('.collapsible-body').find('#date_id').val()){
                 alert('Time to send ajax call for insertion')


                   
            $('#ajaxbtn').trigger('click');
                    
                    // function dateInsert() {



                    //   // body...
                    // }
                

                }
            }
         }

           
        })
          .on("change", function() {
            
             var to =from.datepicker("option", "maxDate", getDate(this));
                // console.log(Object.values(to));
              // alert('2.trigger')
               manzar=$(this).val();
                alert($(this).val())
          });

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }
        
        return date;


    }


});




 /*====== Button  For add new dates input  and check unavileblity dates  =========*/

var auto_gen_to_id=['to-1'];
var auto_gen_from_id=['from-1'];

function gen_dates_input(event,editFlag) {//
    // body...
   event.preventDefault();
   // console.log(type);
    
    var to_id = "to-"+($('.def-show-date li').length + 1);
    auto_gen_to_id.push(to_id)
       console.log(auto_gen_to_id);

       var from_id="from-"+($('.def-show-date li').length + 1);
       auto_gen_from_id.push(from_id);
       console.log(auto_gen_from_id);
       var dataInput = (editFlag == "edit") ? '<input type="hidden" name="common_bokdate_id[]" id="date_id">' : '';
   // var checkdate=document.getElementById('to').value;
   // console.log(checkdate);

     
    var showlength =$('.def-show-date li').length;
    // console.log(showlength);
     $('.def-show-date').collapsible('close', showlength-1);
     
   var new_obj='<li id="gen-date-wrap" class="newLI"><div class="collapsible-header">Date <a class="closedate" ><i class="fa fa-times" aria-hidden="true"></i></a></div><div class="collapsible-body"><div class="row">'+dataInput+'<div class="col-md-6"><label>From</label><input type="text" class="input-field from" id="'+from_id+'" name="book_fromdate[]"></div><div class="col-md-6"><label>To  </label><input type="text"  class="input-field to" id="'+to_id+'" name="book_todate[]"></div></div></div></li>';
     
      $('.def-show-date').append(new_obj);
    
    var showupdatedlength =$('.def-show-date li').length;
  $('.def-show-date').collapsible('open', showupdatedlength-1);


 from= $( ".from" ).datepicker({

                  // minDate: manzar, 

         onSelect: function(selected) {
           debugger;
           $("#"+to_id).datepicker("option","minDate", selected)
            if($("#"+from_id).parents('.def-show-date').hasClass('editroom')){
                if($("#"+to_id).val() && $('#'+from_id).val() && !$('#'+from_id).parents('.collapsible-body').find('#date_id').val()){

                  $('#ajaxbtn').trigger('click');
                  alert('Time to send ajax call for insertion')
                }
            }


          
          }
 
 });

  to =$( ".to" ).datepicker({
            // minDate: manzar,

            onSelect: function(selected) {
             
            $("#"+from_id).datepicker("option","maxDate", selected)
            if($("#"+to_id).parents('.def-show-date').hasClass('editroom')){

                if($("#"+to_id).val() && $('#'+from_id).val() && !$('#'+from_id).parents('.collapsible-body').find('#date_id').val() ){
                  alert('Time to send ajax call for insertion')
                   debugger;
                  $('#ajaxbtn').trigger('click');


                }
            }
            
         }

  })
  .on("change", function() {
             var to =from.datepicker("option", "minDate", getDate(this));
              
               manzar=$(this).val();
              
          });

  function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }
        
        return date;


    }

    event.stopPropagation();
}

/*===================Ajax call for date Insertion==========================*/
 





function insertDtate() {














  // body...
}






/*=============Date For Expire discount  ================*/

 $('#expireDate').datepicker({
       minDate: 0
 });

/*======= Dropdown For Serve Food in conference Hall ========*/
function chk_food(that) {

    if (that.value == "yes") {

        document.getElementById('menupackage-wrap').style.display = "block";
    }else{
         document.getElementById('menupackage-wrap').style.display = "none";
         $('#menupackage-wrap').find('input').val('');
         
          $('#menupackage-wrap').find('input').removeClass('valid');
           $('#menupackage-wrap').find('input').removeClass('invalid');
    }
    // body...
}

/*======= Dropdown For Pickup offer in Tours And Events ========*/
function pickOffer(that) {
    // body...
    if (that.value == "yes") {
        $(".pickService").show();
          
         

    }else{
        $(".pickService").hide();
        $(".pickService").find('input').val('');
        $('.pickService').find('input').removeClass('valid');
        $('.pickService').find('input').removeClass('invalid');
    }
    
}

/*======= Dropdown For Dropoff offer in Tours And Events========= */
function dropOffer(that) {
    // body...
    if (that.value == "yes") {
        $(".dropService").show();
    }else{
        $(".dropService").hide();
        $(".dropService").find('input').val('');
        $('.dropService').find('input').removeClass('valid');
        $('.dropService').find('input').removeClass('invalid');
    }
    
}

/*======= Dropdown For Hotel Stars in Tours (if stay in hotel than hide camping checkbox)====== */
function changeStr(that) {
  // body...

  if (that.value == "") {
    $('.camping').show();
  }else {
    $('.camping').hide();
  }
 
}

/*======= Checkbox For camping in Tours  (if camping than hide hotel star dropdown)======= */
function changecamp(that){
  // body...
  console.log(that.value);
if ($(".camping input:checkbox:checked").length > 0) {
    $('.hotelStr').hide();
}else{
   
   $('.hotelStr').show();
}

 
}

/*======= Dropdown For Food in Tours (Food Included or Not) ============ */
function selectFod(that){
  // body...
  if (that.value == "yes") {
        
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

  
}


/* Button For Add More Discounts  in Tours  (function For more Inputs) */
function gen_discount_input(event) {


  $('.unique').removeClass('unique');
  
       var dis_div =document.getElementById('discount_wrap');

  
    var new_discount=document.createElement('div');
    new_discount.innerHTML='<div class="row newLI"  id="gen-discount-wrap"><div class="col-md-6"><label>Number of People</label><div class="input-field "><input type="number" value=""  id="unique" onchange="compareInputs(event)"  name="common_nopeople[]" class="tour-discount-per validate hasNew unique"></div></div><div class="col-md-6"><label>Discount (Percentage)<a class="closediscount" ><i class="fa fa-times" aria-hidden="true"></i></a></label><div class="input-field "><input type="number" value="" name="common_discount[]" class="validate"></div></div></div></div>';
    dis_div.appendChild(new_discount.firstChild);


}


function compareInputs(event) {

  var allInputs= $('#discount_wrap').find('.tour-discount-per');

  
  var foo=allInputs.slice(0, -1);

 
  for (var i = 0; i < foo.length; i++) {


   var  key=foo[i].value;
    // console.log(key);
  
   if(parseInt(key) == parseInt(event.currentTarget.value)) {

        // console.log($(this).value.addClass('discountError'));
        $(event.currentTarget).addClass('discountError');
      
      $("#more_discount_id").attr('disabled','disabled');
     // alert('same value');
        
        return false;
      
 
    
  }else if(parseInt(key) != parseInt(event.currentTarget.value)){
      
     $(event.currentTarget).removeClass('discountError');
    $("#more_discount_id").removeAttr('disabled');
    
     // alert('distinct value');
  }

}


}

/*=======Function for closing (Extra Discount & No of People Inputs)=======*/
  $("body").on("click",".closediscount",function(){ 

          $(this).parents("#gen-discount-wrap").remove();

      });


           /*x------------x-----------x*/



/*======Function for closing (Extra Dates Inputs)=======*/
  $("body").on("click",".closedate",function(){ 

          $(this).parents("#gen-date-wrap").remove();

      });


           /*x------------x-----------x*/

 /*======Function for closing (Extra Menu Package Inputs)=======*/
$("body").on("click",".closemenu",function(){ 

          $(this).parents("#gen_menupackage_input").remove();

      });


           /*x------------x-----------x*/




function selctdrink(that){
  // body...
  if (that.value == "yes") {
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
}



/* Button for Add Destination in Tours (finction for Destination inputs) */

 function gen_destination(event) {
   // body...
   var dest_div= document.getElementById('destination-wrap');

//   console.log(dest_div);

   var new_destination= document.createElement('div');

   new_destination.innerHTML=`<div class="destination-wrap" id="destination-wrap">
   <div class="common-top">
   <label>Destination Name</label>
   <div class="input-field col s8">
   <input type="text" name="destination_name[]">

   </div>

   </div>
   <div >
   <label>Destination Description</label>
   <div class="input-field col s8">
   <textarea class="materialize-textarea custom-text-area" name="destination_descrp[]"></textarea> 
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
   </div>`;
   dest_div.appendChild(new_destination.firstChild);
 }

function gen_attraction(event){


  



  var attr_div= document.getElementById('attraction-wrap');

  var new_attraction= document.createElement('div');

  new_attraction.innerHTML=`<div id="attraction-wrap">
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
  </div>`;

  attr_div.appendChild(new_attraction.firstChild);


}






/*======================Childrens Allowed==========================*/

function selectchild(that) {

  if (that.value == "yes") {

        $('.c-childTickt').show();
        $('.c-under5').show();
      }else{
        $('.c-childTickt').hide();
        $('.c-under5').hide();
         $('.c-childprice').hide();
    $('.c-childfree').hide();
      }
      // body...
     

  // body...
}


function selectunder5(that) {

  if (that.value == "yes") {

    $('.c-childfree').show();
    $('.c-childprice').show();
  }else{

    $('.c-childfree').hide();
    $('.c-childprice').hide();


  }
  // body...
}

 function childrnfree(that) {
    
   if ($(".c-childfree input:checkbox:checked").length > 0) {
      
       $('.c-childprice').hide();

   }else if($('.c-childprice').find('input').val().length < 0){
      debugger;
      $('.c-childfree').hide();
      $('.c-childprice').show();

   }else{

     $('.c-childprice').show();
   }
   // body...
 }

/*==============================*/

/*================= Function for more Menu package create in (Banquet and conference hall)===========================================*/

var banquet_packages_array=[]
function gen_menupackage_input(event) {

  var packagelength= $('.def-show-menu li').length;

  $('.def-show-menu').collapsible('close', packagelength-1);

      var id = "chips-packageitem-"+($('.chips-packageitem').length+1);
      banquet_packages_array.push(id);
    
  
     
  var new_package= '<li id="gen_menupackage_input" class="newLI"><div class="collapsible-header ">Menu   <a class="closemenu" ><i class="fa fa-times" aria-hidden="true"></i></a></div><div class="collapsible-body"><div class="row"><div class="col-md-6"><label>Package Name</label><input type="text" name="foodpkg_name[]" value="" class="input-field validate"></div><div class="col-md-6"><label>Package Price</label><input type="number" value="" name="foodpkg_price[]" class="input-field validate"></div></div><div class="row"><div class="col-md-6"><label >Discount Percentage</label><input type="number" name="foodpkg_discount[]" value="" class="input-field validate" style="padding-top:18px;"></div><div class="col-md-6"><label>Package Items</label><div class="input-field "><div class="chips chips-packageitem" id="'+id+'"> </div><input type="hidden"  name="foodpkg_item[]" id="input_'+id+'" class="menupkg-id"></div></div></div></div></li>';
   
   $('.def-show-menu').append(new_package);

   var packagelengthupdated= $('.def-show-menu li').length;

   $('.def-show-menu').collapsible('open', packagelengthupdated-1);

   // debugger;
   $('#'+id).material_chip({
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
   
   

   /*===========================
   Reinitialize Add Chips For Menu Packages in (Banquet & Conference) when click add more button
    ==========================*/

   $('#'+id).on('chip.add', function(e, chip){
     

     // you have the added chip here
      var chip_string= $('#'+id).material_chip('data');
      var str = JSON.stringify(chip_string);   
      var array_amenity=[];
      // console.log(id);
 for (var i = 0; i < chip_string.length; i++) {

      array_amenity.push(chip_string[i].tag);
     
}

     $('#input_'+id).val(array_amenity.toString())
    console.log($('#'+id).val(array_amenity.toString()));
    e.stopPropagation();
  });


}

/*=================Function For Add Chips For Amenities in all form=======================*/


 $('.chips-autocomplete').on('chip.add', function(e, chip){

    // you have the added chip here
        var chip_string= $('.chips-autocomplete').material_chip('data')
  // console.log($('.chips-autocomplete').material_chip('data'));

  // var str = JSON.stringify(chip_string);
    // console.log(str);
   var array_amenity=[];
  for (var i = 0; i < chip_string.length; i++) {

   // console.log(chip_string[i].tag);
     array_amenity.push(chip_string[i].tag);

}

 // console.log(array_amenity.toString());

 document.getElementById('amenities-id').value = array_amenity.toString();
  });

/*============Add Chips For Menu Packages in (Banquet & Conference)============*/

$('.chips-package').on('chip.add', function(e, chip){
    
     // you have the added chip here
    var chip_string= $('.chips-packageitem').material_chip('data')
    var str = JSON.stringify(chip_string);
    var array_amenity=[];

 for (var i = 0; i < chip_string.length; i++) {

      array_amenity.push(chip_string[i].tag);

 }
 
  $('#input_chips-packageitem-1').val(array_amenity.toString());
   console.log($('#input_chips-packageitem-1').val(array_amenity.toString()));
});

/*=============File Uploading================*/




/*======Form Validation=======*/

// function form_Validate()
//             {
//                 var e = document.getElementById("");
//                 var strUser = e.options[e.selectedIndex].value;

//                 var strUser1 = e.options[e.selectedIndex].text;
//                 if(strUser==0)
//                 {
//                     alert("Please select a user");
//                 }
//             }

/*===============Images Modal ===================*/
 $('#modal-images').modal({dismissible: false});




 /*========== Charges with ARICON AND Generator Backup(show & hide)=========*/

 $('#filled-in-aricon').click(function () {
  
  if($(".with_aricon input:checkbox:checked").length > 0){
// debugger;
  $('.with_ari').show();

  }else{
    $('.with_ari').hide();
  }
 })


  $('#filled-in-gen').click(function () {
  
  if($(".with_generator input:checkbox:checked").length > 0){
// debugger;
  $('.with_gent').show();

  }else{
    $('.with_gent').hide();
  }
 })

/*=============Delete Image in Preveiw in all forms===============*/

function deletIMG(event){
  console.log(event.currentTarget.getAttribute("data-value"));

  var file_ID=event.currentTarget.getAttribute("data-value");
  var file_Name=event.currentTarget.getAttribute("data-img");
  var removeDIV =event.currentTarget.parentElement;
swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel plx!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  console.log(isConfirm);
  
  if (isConfirm) {
        
        $.post("../delete_img.php",{
                                         fileId   : file_ID,
                                         fileName : file_Name
                                             })
                 .done(function(data){
                   console.log(data);
                   $(removeDIV).remove();
                 });

    swal("Deleted!", "Your imaginary file has been deleted.", "success");

  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});


}



/*=======Hall independent in banquet,conference and events===========*/

function hall_alone(that) {

  if(that.value=="yes"){
    $('#hall_alone').show();
    $('#show_hotelName').hide();

  }else{

    $('#hall_alone').hide();
    $('#show_hotelName').show();
  }
  // body...
}





