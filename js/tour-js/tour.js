$("#pro-sub-btn").click(function(){

  if ($('#hotel_img_wrap .imgeWrap').length==0) {
 
    swal({

          title: "At least one photo is required",
          
          type: "error",
            //confirmButtonColor: "#DD6B55",
            confirmButtonText: "ok",
            closeOnConfirm: true,
            html: false
            });
     return;
   }

   if ($(".inactive_checkbox input:checkbox:checked").length > 0) {
        

            $('#hidden_checkbox').val('on');

        
   }else{
               $('#hidden_checkbox').val('off');

   }

   if ($(".brkfast input:checkbox:checked").length > 0) {
        

            $('#tour_brkfast').val('on');

        
   }else{
               $('#tour_brkfast').val('off');

   }

   if ($(".lunch input:checkbox:checked").length > 0) {
        

            $('#tour_lunch').val('on');

        
   }else{
               $('#tour_lunch').val('off');

   }
   
    if ($(".dinner input:checkbox:checked").length > 0) {
        

            $('#tour_dinner').val('on');

        
   }else{
               $('#tour_dinner').val('off');

   }

   if ($(".aloholic input:checkbox:checked").length > 0) {
        

            $('#tour_aloholic').val('on');

        
   }else{
               $('#tour_aloholic').val('off');

   }

    if ($(".nonaloholic input:checkbox:checked").length > 0) {
        

            $('#tour_nonaloholic').val('on');

        
   }else{
               $('#tour_nonaloholic').val('off');

   }

   if ($(".camping input:checkbox:checked").length > 0) {
        

            $('#tour_camping').val('on');

        
   }else{
               $('#tour_camping').val('off');

   }

    if ($(".c-childfree input:checkbox:checked").length > 0) {
        

            $('#tour_undr5free').val('on');

        
   }else{
               $('#tour_undr5free').val('off');

   }


  var validator= $("#tour-form").validate({

       errorElement : 'div',
        errorPlacement: function(error, element) {

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

 validator.form();

if (validator.form()== false) {

     // console.log($('#hotel-form').find(".error").eq(0).offset().top);
     var body = $("html, body");

      $.each($('#tour-form').find(".error"),function(key,value){
        if($(value).css('display')!="none"){
           body.stop().animate({scrollTop:($(value).offset().top - 150)},1000, 'swing', function() { });
         return false; 
        }

       //alert("Finished animating");
    });
         // $("#pro-sub-btn").show();
   }else{
      // debugger;
      $('#loader').modal({dismissible: false});
      $('#loader').modal('open');

   if ($('.newDiscountLI input').length > 0 && isDiscountInput($('.newDiscountLI input')) == true ) {
        // alert('manzar');
        insertDiscountinput();
        // debugger;
      }else{

        if($('.new_Attract').length > 0 &&  isAttractionInput($('.new_Attract input,.new_Attract textarea'))==true){

               insertAttractions();
        }

        if ($('.new_Destination').length > 0 && isDestinationInput($('.new_Destination input,.new_Destination textarea'))==true) {

              addDestionations();
        }
           update_D_A()
           updateTour();
      }

}

})



/*===============Ajax call for Tour insertion (create new record)=================*/

$("#pro-sub-btn_tour").click(function(){

  if ($('#hotel_img_wrap .imgeWrap').length==0) {
 
    swal({

          title: "At least one photo is required",
          
          type: "error",
            //confirmButtonColor: "#DD6B55",
            confirmButtonText: "ok",
            closeOnConfirm: true,
            html: false
            });
     return;
   }
var validator= $("#tour-form").validate({

       errorElement : 'div',
        errorPlacement: function(error, element) {

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

 validator.form();

if (validator.form()== false) {

     // console.log($('#hotel-form').find(".error").eq(0).offset().top);
     var body = $("html, body");

      $.each($('#tour-form').find(".error"),function(key,value){
        if($(value).css('display')!="none"){
           body.stop().animate({scrollTop:($(value).offset().top - 150)},1000, 'swing', function() { });
         return false; 
        }

       //alert("Finished animating");
    });
         // $("#pro-sub-btn_tour").show();
   }else{
    $('#loader').modal({dismissible: false});
    $('#loader').modal('open');

       tinyMCE.triggerSave();
          if (!$('#hotelId').val()) {
        // debugger;
        $("#hotelId").val($(".hotelNames option:selected").attr("data-id"));
     }
addDestionations();
           
$.ajax({
                             type:"POST",
                             url:"../tours/tour-post.php",
                             data: $("form").serialize(),
                             success:function(res) {

                                var data =JSON.parse(res);
                             console.log(data);

                             if (data.status=='success') {
                              

                               $("#btn-loader").hide();
                               
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Tour successfully submitted for review!",
                    text: "Thank you for your submission! You will be notified once your tour submission has been approved!.",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "../tours/tour_list.php";
                    });
                              },2000)



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
                        $('#loader').modal('close');
                      // window.location = "../rooms/room_list.php";
                    });

                             }
                             
                              
                             
                             }

                              
                           
                          })

}

})

function insertAttractions(){
  // debugger;
    var data = $('.new_Attract input, .new_Attract textarea').serialize();
    $.ajax({

                      type: "POST",
                      async: false,
                      url : "../tours/insertA.php",
                      data: data,
                      success:function(data) {
                                  var response = JSON.parse(data);
                                  console.log(response);
                                  if(response.status == "success"){
                                       var ids_array = response.attraction_id.split(',');
                                      $.each($('.new_Attract input.edit-A_id'),function(key,value){
                                         
                                             $(value).val(ids_array[key]);
                                             $(value).parents('.new_Attract').removeClass("new_Attract");
                                              // debugger;
                                      });

                                      
                                  }
                      }



                    })
  
}

function isDestinationInput(dataObj){
  var isValid = true;
  dataObj.each(function(key,val){
      if(!$(val).val()){
        isValid = false;
         return false;
      }

  });
  return isValid;
}

function isAttractionInput(dataObj){
  // debugger;
  var isValid = true;
  dataObj.each(function(key,val){
      if(!$(val).val() && !$(val).hasClass('edit-A_id')){
        isValid = false;
         return false;
      }

  });
  return isValid;
}


function isDiscountInput(dataObj){
  var isValid = true;
  dataObj.each(function(ke,value){
      if(!$(value).val()){
        isValid = false;
         return false;
      }

  });
  return isValid;
}

function updateTour() {

      tinyMCE.triggerSave();
      if (!$('#hotelId').val()) {
        // debugger;
        $("#hotelId").val($(".hotelNames option:selected").attr("data-id"));
     }
$.ajax({
                             type:"POST",
                             url:"../tours/update_tour.php",
                             data: $("form").serialize(),
                                       success:function(res) {

                             var data =JSON.parse(res);
                             console.log(data);

                             if (data.status=='success') {
                             

                                $("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Tour successfully updated for review!",
                    text: "Thank you for your submission! You will be notified once your tour updation has been approved!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                      window.location = "../tours/tour_list.php";
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
  // body...
}



function insertDiscountinput() {

    $.ajax({
                              type:"POST",
                              url:"../insert_discountpkg.php?column_idName=tour_id&type=tour&id="+$('input[name="tour_id"]').val(),
                              data: $('.newDiscountLI input').serialize(),
                              success:function(data) {
                              var response = JSON.parse(data);
                              console.log(response);
                              if(response.status == "success"){
                                
                                $('.newDiscountLI').removeClass('newDiscountLI');
                                updateTour();
                              }
                   }


                    })
}

function addDestionations(){

  // var data = $('.new_Destination input,.new_Destination textarea').serialize();
  var stored_tour_id = "";
  if ($('#tour-form').find('#tour-id').val()) {
          stored_tour_id='&tour_id='+$('#tour-form').find('#tour-id').val();
  }
    $.each($('.new_Destination'),function(key,val){

    // debugger;
      var data= $(val).find('input,textarea').serialize();


  $.ajax({

                      type: "POST",
                      async: false,
                      url : "../tours/insertD-A.php",
                      data: data+stored_tour_id,
                      success:function(data) {
                                  var response = JSON.parse(data);
                                  console.log(response);
                                  if(response.status == "success"){

                                       var stored_att_id= response.attr_id;
                                       var stored_att_id_array= stored_att_id.split(',');


                                     var D_ids_array=response.id;

                                     console.log(D_ids_array);
                                     $(val).find('.only_destination').before('<input type="hidden" name="destination_id[]" value="'+D_ids_array+'" />');
                                    
                                    $.each($(val).find('.attractions'),function(k,v){
                                      $(v).append('<input name="attraction_id[]" value="'+stored_att_id_array[k]+'" />')
                                    })

                                    //$('#'+DD_obj).removeClass('new_Destination');
                                    
                                     $(val).removeClass('new_Destination');
                                    // debugger;
                                    // 
                                    if ($('#D-id').val()) {

                                       var storedDesti =$('#D-id').val();
                                           storedDesti =storedDesti+','+response.id;
                                           $('#D-id').val(storedDesti) ; 
                                              // debugger;
                                     }else{
                                     
                                          $('#D-id').val(response.id) ;              
                                     }
                                   }
                      }



                    })
  })
  // return false;
  // var DD_obj= $('.new_Destination').attr('id');
   

}



function update_D_A(){
 
   var data=$('.destination-wrap input,.destination-wrap textarea').serialize();
// debugger;
    $.ajax({

                      type: "POST",
                      url : "../tours/updateD-A.php",
                      data: data,
                      success:function(data) {
                                  var response = JSON.parse(data);
                                  console.log(response);
                                  if(response.status == "success"){

                                    
                                  }
                      }



                    })

}