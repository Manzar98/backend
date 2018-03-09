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
              // / debugger;
           $("#to").datepicker("option","minDate", selected);
           
            $('#to').prop('required',true);
          
          
           

           // debugger;
           if($("#from").parents('.def-show-date').hasClass('editroom')){
                if($("#to").val() && $('#from').val() && !$('#from').parents('.collapsible-body').find('#date_id').val()){
                 // alert('Time to send ajax call for insertion')
                 $('#ajaxbtn').trigger('click');
                  

                }
            }
         }
            // numberOfMonths: 1
           
            
        })
        
           
           .on("change", function() {

               var from = to.datepicker("option", "maxDate", getDate(this));
               console.log($(this).val());
               $('#to').prop('required',false);
             
          }),
        to = $(".to").datepicker({
             // defaultDate: "+1w",
            // changeMonth: false,
            minDate: 0,
            // numberOfMonths: 1
           onSelect: function(selected,element) {
            // debugger;
            console.log(element);
            $("#from").datepicker("option","maxDate", selected);
            
              $('#from').prop('required',true);
            

             
            // debugger;
            if($("#to").parents('.def-show-date').hasClass('editroom')){
                if($("#to").val() && $('#from').val() && !$('#from').parents('.collapsible-body').find('#date_id').val()){
                 // alert('Time to send ajax call for insertion')


                   
            $('#ajaxbtn').trigger('click');
                    
                    // function dateInsert() {



                    //   // body...
                    // }
                

                }
            }
            }
         // }

           
        })
          .on("change", function() {
            
             var to =from.datepicker("option", "maxDate", getDate(this));
                // console.log(Object.values(to));
              // alert('2.trigger')
              $('#from').prop('required',false);
               manzar=$(this).val();
                // alert($(this).val())
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
           // debugger;
           $("#"+to_id).datepicker("option","minDate", selected);
           $('#'+to_id).prop('required',true);
            if($("#"+from_id).parents('.def-show-date').hasClass('editroom')){
                if($("#"+to_id).val() && $('#'+from_id).val() && !$('#'+from_id).parents('.collapsible-body').find('#date_id').val()){

                  $('#ajaxbtn').trigger('click');
                  // alert('Time to send ajax call for insertion')
                }
            }


          
          }
 
 }).on("change", function() {
             
               $('#'+to_id).prop('required',false);

              
          });

  to =$( ".to" ).datepicker({
            // minDate: manzar,

            onSelect: function(selected) {
             
            $("#"+from_id).datepicker("option","maxDate", selected);
            $('#'+from_id).prop('required',true);
            if($("#"+to_id).parents('.def-show-date').hasClass('editroom')){

                if($("#"+to_id).val() && $('#'+from_id).val() && !$('#'+from_id).parents('.collapsible-body').find('#date_id').val() ){
                  // alert('Time to send ajax call for insertion')
                   // debugger;
                  $('#ajaxbtn').trigger('click');


                }
            }
            
         }

  })
  .on("change", function() {
             var to =from.datepicker("option", "minDate", getDate(this));
              
               manzar=$(this).val();
               $('#'+from_id).prop('required',false);

              
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


/*=============Date For Expire discount  ================*/

 $('#expireDate').datepicker({
       minDate: 0
 });

/*======= Dropdown For Serve Food in conference Hall ========*/
function chk_food(that) {

    if (that.value == "yes") {
   // debugger;
        document.getElementById('menupackage-wrap').style.display = "block";
        $('.pkg_name').prop('required',true);
        $('.pkg_price').prop('required',true);
    }else{
         document.getElementById('menupackage-wrap').style.display = "none";
         $('#menupackage-wrap').find('input').val('');
         
          $('#menupackage-wrap').find('input').removeClass('valid');
          $('#menupackage-wrap').find('input').removeClass('invalid');
          $('.pkg_name').prop('required',false);
          $('.pkg_price').prop('required',false);
    }
    // body...
}

/*======= Dropdown For Pickup offer in Tours And Events ========*/
function pickOffer(that) {
    // body...
    if (that.value == "yes") {
        $(".pickService").show();
        // $('.pickup_air').prop('required',true);
        // $('.pickup_bus').prop('required',true);
        // $('.pickup_specific').prop('required',true);
          // if ($('.pickup_air').val() || $('.pickup_bus').val() || $('.pickup_specific').val()) {
          //    debugger;
          //     $('.pickup_air').pro('required',false);
          //    $('.pickup_bus').pro('required',false);
          //   $('.pickup_specific').pro('required',false);
          //  }
         

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

/*======= Checkbox For camping in Tours  (if camping than hide hotel star dropdown)======= */
function changecamp(that){
  // body...
  // console.log(that.value);
if ($(".camping input:checkbox:checked").length > 0) {
    $('#camp_day').show();
    $('#camp_day input').prop('required',true);;
}else{
   
   $('#camp_day').hide();
   $('#camp_day input').val('');
   $('#camp_day input').prop('required',false);;

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
    new_discount.innerHTML='<div class="row newDiscountLI"  id="gen-discount-wrap"><div class="col-md-6"><label>Number of People</label><div class="input-field "><input type="number" value=""  id="unique" onchange="compareInputs(event)"  name="common_nopeople[]" class="tour-discount-per validate hasNew unique"></div></div><div class="col-md-6"><label>Discount (Percentage)<a class="closediscount" ><i class="fa fa-times" aria-hidden="true"></i></a></label><div class="input-field "><input type="number" value="" name="common_discount[]" class="validate"></div></div></div></div>';
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

    // debugger;
    var discountwrap_id=$(this).parents("#gen-discount-wrap").find('.discountWrap-id').val();

   console.log(discountwrap_id);

    if (discountwrap_id) {
      // debugger;
          var colIdName= $(this).parents("#gen-discount-wrap").find('.discountWrap-id').attr('name');
          var col_name = colIdName.slice(0,-2);
          var row_wrap=$(this).parents("#gen-discount-wrap");
         row_wrap.css('background','tomato');
                    row_wrap.fadeOut(800, function(){ 
                      // debugger;
                    row_wrap.remove();
        });
                    $.ajax({

                      type: "POST",
                      url : "../delete_multipleinputsrecord.php",
                      data: {tableName : 'common_nosofpeople',id : discountwrap_id ,col_id_name : col_name},
                      success:function(data) {
                                  var response = JSON.parse(data);
                                  console.log(response);
                                  if(response.message == "success"){
                                 
                                  }
                      }



                    })

    }else{

      $(this).parents("#gen-discount-wrap").remove();
    }

          

      });


           /*x------------x-----------x*/



/*======Function for closing (Extra Dates Inputs)=======*/
  $("body").on("click",".closedate",function(){ 

/*Delete dates wrap from frontend and backend using ajax*/
    var datewrap_id=$(this).parents("#gen-date-wrap").find('.dateWrap_id').val();
    if (datewrap_id) {
        
         var colIdName= $(this).parents("#gen-date-wrap").find('.dateWrap_id').attr('name');
                          var col_name = colIdName.slice(0,-2);
                  // console.log(col_name);
        
        var wrap_li=$(this).parents("#gen-date-wrap");
         wrap_li.css('background','tomato');
                    wrap_li.fadeOut(800, function(){ 
                     // debugger;
                    wrap_li.remove();
        });
                    $.ajax({ 

                                type:"POST",
                                url:"../delete_multipleinputsrecord.php",
                                data: {tableName : 'common_bookdates',id : datewrap_id ,col_id_name : col_name},
                                success:function(data) {
                                  var response = JSON.parse(data);
                                  console.log(response);
                                  if(response.message == "success"){
                                 
                                  }
                      }

  



                    })
                /*---End Ajax---*/

    }else{

       $(this).parents("#gen-date-wrap").remove();
    }
  
         

      });


           /*x------------x-----------x*/

 /*======Function for closing (Extra Menu Package Inputs)=======*/
$("body").on("click",".closemenu",function(){ 
 
 /*Delete Menupkg wrap from frontend and backend using ajax*/  
  var menuwrap_id=$(this).parents("#gen_menupackage_input").find('.menuwrap-id').val();
      if (menuwrap_id) {
                      var colIdName= $(this).parents("#gen_menupackage_input").find('.menuwrap-id').attr('name');
                          var col_name = colIdName.slice(0,-2);
                   // console.log($(this).parents("#gen_menupackage_input"));
                   var wrap_li=$(this).parents("#gen_menupackage_input");
                   wrap_li.css('background','tomato');
                   wrap_li.fadeOut("slow", function(){ 
                    // debugger;
                    wrap_li.remove();
       });
            $.ajax({
                                type:"POST",
                               url:"../delete_multipleinputsrecord.php",
                                data: {tableName : 'common_menupackages',id : menuwrap_id ,col_id_name : col_name},
                                success:function(data) {
                   var response = JSON.parse(data);
                                 console.log(response);
                                 if(response.message == "success"){
                                 
                                 }
                     }


                     })
            /*---End Ajax---*/

      }else{
          $(this).parents("#gen_menupackage_input").remove();
      }


        

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
   
 // debugger;

         
    if(validateDA($('.destination input.valid,.new_Destination textarea'))==true){

            // debugger;
     
      var dest_div= document.getElementById('destination-wrap');

//   console.log(dest_div);
    var lengthOfDestination = $('#destination-wrap .destination').length + 1; 
   var new_destination= document.createElement('div');

   new_destination.innerHTML=`<div class="destination new_Destination" id="destination-`+lengthOfDestination+`">
   <div class="common-top  only_destination">
   <label>Destination Name <a class="close_D" ><i class="fa fa-times" aria-hidden="true"></i></a></label>
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
      <div class="attractions" id="attraction-`+lengthOfDestination+`_1">
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
   </div>

   <div class="row col s8 attr_btn clearfix common-top">
   <a class="waves-effect waves-light btn attr-btn" onclick="gen_attraction(event)">Add More Attractions</a>
   </div>
   </div>`;
   dest_div.appendChild(new_destination.firstChild);

    }else{
       // debugger;
        alert('Error');

    }
    
    

 }

function gen_attraction(event){


  

   // debugger;

  var attr_div= $(event.currentTarget).parents('.destination').find('#attraction-wrap')[0];
  var destionation_number = $(event.currentTarget).parents('.destination').attr('id').split('-')[1];
  var lengthOfAttraction = $(event.currentTarget).parents('.destination').find('#attraction-wrap .attractions').length + 1; 
  var new_attraction= document.createElement('div');

  new_attraction.innerHTML=`<div class="attractions" id="attraction-`+destionation_number+`_`+lengthOfAttraction+`">
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
function validateDA(dataObj){
  // debugger;
      var isvalidateDA = true
      //dataObj each and validate every value
       dataObj.each(function(key,value){
        if ($(value).val()) {
       
            isvalidateDA = true;
              
        }else{

           isvalidateDA =false;
            return false;

        }
        console.log($(value).val());
    });


 return isvalidateDA;
}






$('body').on("click",".close_D",function(){


  /*Delete Destination wrap from frontend and backend using ajax*/  
  var destwrap_id=$(this).parents(".destination").find('.edit-D_id').val();
      if (destwrap_id) {
                      var colIdName= $(this).parents(".destination").find('.edit-D_id').attr('name');
                          var col_name = colIdName.slice(0,-2);
                   // console.log($(this).parents("#gen_menupackage_input"));
                   var wrap_li=$(this).parents(".destination");
                   wrap_li.css('background','tomato');
                   wrap_li.fadeOut("slow", function(){ 
                    // debugger;
                    wrap_li.remove();
       });
            $.ajax({
                                type:"POST",
                               url:"../delete_multipleinputsrecord.php",
                                data: {tableName : 'tour_destination',id : destwrap_id ,col_id_name : col_name},
                                success:function(data) {
                   var response = JSON.parse(data);
                                 console.log(response);
                                 if(response.message == "success"){
                                 
                                 }
                     }


                     })
            /*---End Ajax---*/

      }else{

          $(this).parents('.destination').remove();
      }

})


$('body').on("click",".close_A",function(){

  /*Delete Attraction wrap from frontend and backend using ajax*/  
  var attwrap_id=$(this).parents(".attractions").find('.edit-A_id').val();
      if (attwrap_id) {
                      var colIdName= $(this).parents(".attractions").find('.edit-A_id').attr('name');
                          var col_name = colIdName.slice(0,-2);
                   // console.log($(this).parents("#gen_menupackage_input"));
                   var wrap_li=$(this).parents(".attractions");
                   wrap_li.css('background','tomato');
                   wrap_li.fadeOut("slow", function(){ 
                    // debugger;
                    wrap_li.remove();
       });
            $.ajax({
                                type:"POST",
                               url:"../delete_multipleinputsrecord.php",
                                data: {tableName : 'tour_attraction',id : attwrap_id ,col_id_name : col_name},
                                success:function(data) {
                   var response = JSON.parse(data);
                                 console.log(response);
                                 if(response.message == "success"){
                                 
                                 }
                     }


                     })
            /*---End Ajax---*/

      }else{

          $(this).parents('.attractions').remove();
      }

})






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
       $('#undr5price').val('');

   }else if($('.c-childprice').find('input').val().length < 0){
      // debugger;
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
    
  
     
  var new_package= '<li id="gen_menupackage_input" class="newMenuLI"><div class="collapsible-header ">Menu   <a class="closemenu" ><i class="fa fa-times" aria-hidden="true"></i></a></div><div class="collapsible-body"><div class="row"><div class="col-md-6"><label>Package Name</label><input type="text" name="foodpkg_name[]" value="" class="input-field validate pkgname"></div><div class="col-md-6"><label>Package Price</label><input type="number" value="" name="foodpkg_price[]" class="input-field validate pkgprice"></div></div><div class="row"><div class="col-md-6"><label >Discount Percentage</label><input type="number" name="foodpkg_discount[]" value="" class="input-field validate discountprcent" style="padding-top:18px;"></div><div class="col-md-6"><label>Package Items</label><div class="input-field "><div class="chips chips-packageitem" id="'+id+'"> </div><input type="hidden"  name="foodpkg_item[]" id="input_'+id+'" class="menupkg-id"></div></div></div></div></li>';
   
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
     
    // debugger;
     // you have the added chip here
      var chip_string= $('#'+id).material_chip('data');
      var str = JSON.stringify(chip_string);   
      var array_amenity=[];
      //
     console.log(id);
 for (var i = 0; i < chip_string.length; i++) {

      array_amenity.push(chip_string[i].tag);
     
}
   // debugger;
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

 $('.chips').on('chip.delete', function(e, chip){

       var deletechip=$('#amenities-id').val();
       var chipsplit=deletechip.split(",");
       var index = chipsplit.indexOf(chip.tag);

       if (index > -1) {
          var splicevalue=chipsplit.splice(index, 1);
           console.log(chipsplit);
           // debugger;
           document.getElementById('amenities-id').value=chipsplit;
       }

  });

/*============Add Chips For Menu Packages in (Banquet & Conference)============*/

$('.chips-package').on('chip.add', function(e, chip){
     // debugger;
     // console.log(e.currentTarget.id);
     // you have the added chip here
    var chip_string= $('#'+e.currentTarget.id).material_chip('data')
    var str = JSON.stringify(chip_string);
    var array_amenity=[];

 for (var i = 0; i < chip_string.length; i++) {

      array_amenity.push(chip_string[i].tag);

 }
  // debugger;
  $('#input_'+e.currentTarget.id).val(array_amenity.toString());
   console.log($('#input_'+e.currentTarget.id).val(array_amenity.toString()));
});


/*===============Images Modal ===================*/
 $('#modal-images').modal({dismissible: false});




 /*========== Charges with ARICON AND Generator Backup(show & hide)=========*/

 $('#filled-in-aricon').click(function () {
  
  if($(".with_aricon input:checkbox:checked").length > 0){

  $('.with_ari').show();
  $(".airconChrges").prop('required',true);
  }else{
    $('.with_ari').hide();
    $(".airconChrges").prop('required',false);
    $(".airconChrges").val("");
  }
 })


  $('#filled-in-gen').click(function () {
  
  if($(".with_generator input:checkbox:checked").length > 0){
// debugger;
  $('.with_gent').show();
  $(".genchrges").prop('required',true);

  }else{
    $('.with_gent').hide();
    $(".genchrges").prop('required',true);
    $(".genchrges").val("");
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
  text: "You will not be able to recover this photo!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "cancel",
  closeOnConfirm: false,
  closeOnCancel: true
},
function(isConfirm){
  console.log(isConfirm);
  
  if (isConfirm) {
        
        $.post("../delete_img.php",{
                                         fileId   : file_ID,
                                         fileName : file_Name
                                             })
                 .done(function(data){
                   var parentDiv= $(removeDIV).parents('.imgVeiwinline') ;

                   $(removeDIV).remove();

                   if (parentDiv.find('.imgeWrap').length==0) {

                      parentDiv.find('.int_title').hide();
                       // debugger;
                   }
                   console.log(data);
                     // debugger;
                 });

    swal("Deleted!", "Photo has been deleted.", "success");

  } else {
    swal("Cancelled", "Photo has not been deleted.", "error");
  }
});


}



/*=======Hall independent in banquet & conference ===========*/

function hall_alone(that) {

  if(that.value=="yes"){
    $('#hall_alone').show();
    $('#show_hotelName').hide();
    $('.ind_address').prop('required',true);
    $('.ind_city').prop('required',true);
    $('.ind_province').prop('required',true);
    $('.ind_phone').prop('required',true);
    $('.ind_email').prop('required',true);

  }else{

    $('#hall_alone').hide();
    $('#show_hotelName').show();
    $('.ind_address').prop('required',false);
    $('.ind_city').prop('required',false);
    $('.ind_province').prop('required',false);
    $('.ind_phone').prop('required',false);
    $('.ind_email').prop('required',false);
    $('#hall_alone input').val('');
  }
  // body...
}

/*============== Search feilds in records ================*/

function myFunction(event) {

  var input=document.getElementById("mysearch");

 var filter=input.value;

var trObj = $('#h_table tbody tr');
$('#h_table tbody tr').hide();

if (event.which==13 || event.type=="click" ) {
 
$.each(trObj,function(k,value){
  // debugger;
  if(value.innerHTML.toLowerCase().indexOf(filter) > -1){
 $(value).show();
  }
});

}else if(event.type=="change"){

        
           filter=$('#yourole').val();
           // console.log(filter);
        
$.each($('.appr'),function(k,value){

   console.log(value);
    
  if(value.innerHTML.indexOf(filter) > -1){

    $(value).parent('.tr-1').show();
  }
});




}else{

  $.each(trObj,function(k,value){
  if(value.innerHTML.toLowerCase().indexOf(filter) > -1){
 $(value).show();
  }
});
 
}

}

/*=============Departure & Arrival Date in tour================*/

 $('#departureDate').datepicker({
       minDate: 0
 });

 $('#arrivalDate').datepicker({
       minDate: 0
 });
/*=============Departure & Arrival Time in tour================*/

 $('#departureTime').pickatime();

$('#arrivalTime').pickatime();

/*=================================*/

 // if ($('.offer_expire').val()) {
 //   debugger;
 //   $('.offer_discount').prop('required',true);
 // }else if ($('.offer_discount').val()) {
 //   $('.offer_expire').prop('required',true);
 // }else{
 //  debugger;
 //     $('.offer_discount').prop('required',false);
 //     $('.offer_expire').prop('required',false);
 // }

 /*===========================
Remove imges when click on done in modal
 =============================*/
 $('.photo_done').click(function () {

    $('#photo_iframe').contents().find('.dz-image-preview.dz-success.dz-complete').remove();
 })

 /*===================
 Independent & dependent in tours & events
 ====================*/

 function independ(that) {

  if (that.value=='no') {

    $('#showhotelList').show();

  }else{

    $('#showhotelList').hide();

   // body...
  }
 }


 /*===================
   Date of birth when registration
 ===================*/
  $('#reg_birth').datepicker({
         
            
            
 });

/*===========
Loader close
==========*/

$('#loader').modal({

  dismissible: false
})

/*=================

======================*/
$('#pro-sub-btn_paid').prop('disabled',true);
$('.lbl-list').hide();
function showlist(that){

    $('.lbl-list').show();
    
     var stored_tbl_name=that.value;
     var stored_id=$('#user_id').val();
     
    $.ajax({


       type:"GET",
       url:'get_list.php',
       data:{"tbl_name":stored_tbl_name,"user_id":stored_id},
       success:function(res){
           var data= JSON.parse(res);
           console.log(data);
        // debugger;
        var   dropdown='<label class="pull-left lbl-list">List of '+stored_tbl_name+'</label>'
              dropdown+='<select name="list_of_any" id="List_any" onchange="list_of(this)" >'
              dropdown+='<option  disabled selected>Select One</option>'
           $.each(data,function(k,val){
             
                dropdown+='<option value='+val.name+'>'+val.name+'</option>';

           });
           dropdown+='</select>';
            document.getElementById('list_of_any').innerHTML=dropdown;
            // $('#List_any').material_select();
            $("#List_any").select2({
                    placeholder: "Select a State",
                    allowClear: true
             }); 
       }
    })

}

/*=================

======================*/
$('#on_which_page').hide();
function list_of(that){
    $('#on_which_page').show();

}

/*=================

======================*/
$('#no_of_days').hide();
function on_which(that){
    $('#no_of_days').show();

}


/*=================

======================*/
function n_day() {
   
   $('#pro-sub-btn_paid').prop('disabled',false);
}
/*=================

======================*/

$("#pro-sub-btn_paid").click(function(){

$('#loader').modal({dismissible: false});
      $('#loader').modal('open');

          var user_id=$('#user_id').val();
          var select_one=$('#select_parent option:selected').val();
          var list_any=$('#list_of_any option:selected').val();
          var on_which=$('#on_which_page option:selected').val();
          var no_days=$('#no_of_days option:selected').val();

 
      $.ajax({
          
          type:"POST",
          url:"paid-ads-post.php",
          data:{"user_id":user_id,"select_any":select_one,"list_of_any":list_any,"on_which_page":on_which,"no_of_days":no_days},
          success:function(res){
                    
                    var data= JSON.parse(res);
                    console.log(data);

                    if (data.status=="success") {
                         
                            setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Ads successfully submitted for review!",
                    text: "Thank you for your submission! You will be notified once your ads submission has been approved!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "paid-ads-list.php";
                    });
                              },3000)
                    }else{
                        
                           var responseArray = "";
                                $.each(data.message.split(','),function(k,val){
                                      responseArray += "<li style='color:red;'><i class='fa fa-times errordialog_x' aria-hidden='true'></i>"+val+"</li>";
                                })
                                
                               $('#loader').modal('close');
                               swal({
                                       title: "Something went wrong!",
                    text: "<ul class='responseDialog'>"+responseArray+"</ul>",
                    type: "error",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: true
                      }, function(){
                      // window.location = "../rooms/room_list.php";
                    });


                    }

          }


      })



})




$("#pro-sub-btn_paid_edit").click(function(){

$('#loader').modal({dismissible: false});
      $('#loader').modal('open');

          var user_id=$('#user_id').val();
          var paid_id=$('#paid_id').val();
          var select_one=$('#select_parent option:selected').val();
          var list_any=$('#list_of_any option:selected').val();
          var on_which=$('#on_which_page option:selected').val();
          var no_days=$('#no_of_days option:selected').val();

 
      $.ajax({
          
          type:"POST",
          url:"../vendors/paid-ads-update.php",
          data:{"user_id":user_id,"paid_id":paid_id,"select_any":select_one,"list_of_any":list_any,"on_which_page":on_which,"no_of_days":no_days},
          success:function(res){
                    
                    var data= JSON.parse(res);
                    console.log(data);

                    if (data.status=="success") {
                         
                            setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Ads successfully updated for review!",
                    text: "Thank you for your submission! You will be notified once your ads updation has been approved!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "../vendors/paid-ads-list.php";
                    });
                              },3000)
                    }else{
                        
                           var responseArray = "";
                                $.each(data.message.split(','),function(k,val){
                                      responseArray += "<li style='color:red;'><i class='fa fa-times errordialog_x' aria-hidden='true'></i>"+val+"</li>";
                                })
                                
                               $('#loader').modal('close');
                               swal({
                                       title: "Something went wrong!",
                    text: "<ul class='responseDialog'>"+responseArray+"</ul>",
                    type: "error",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: true
                      }, function(){
                      // window.location = "../rooms/room_list.php";
                    });


                    }

          }


      })



})
