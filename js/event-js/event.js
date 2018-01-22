$("#pro-sub-btn").click(function(){

  // $("#pro-sub-btn").hide();
 var validator= $("#event-form").validate({

       errorElement : 'div',
        errorPlacement: function(error, element) {

  

           // console.log(element);
          var placement = $(element).data('error');

             // console.log(placement);
             // console.log(error);
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

      $.each($('#event-form').find(".error"),function(key,value){
        if($(value).css('display')!="none"){
           body.stop().animate({scrollTop:($(value).offset().top - 150)},1000, 'swing', function() { });
         return false; 
        }

       //alert("Finished animating");
    });
        // $("#pro-sub-btn").show();
   }else{

     $('#loader').modal({dismissible: false});
     $('#loader').modal('open');
    
        if ($('.newDiscountLI input').length > 0) {
        // alert('manzar');
        insertDiscountinput();
        // debugger;
      }else{
      
          updateEvent();
      }
}

})


/*===============Ajax call for Event insertion (create new record)=================*/

$("#pro-sub-btn_event").click(function(){
        // $("#pro-sub-btn_event").hide();
  var validator= $("#event-form").validate({

       errorElement : 'div',
        errorPlacement: function(error, element) {

  

           // console.log(element);
          var placement = $(element).data('error');

             // console.log(placement);
             // console.log(error);
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

      $.each($('#event-form').find(".error"),function(key,value){
        if($(value).css('display')!="none"){
           body.stop().animate({scrollTop:($(value).offset().top - 150)},1000, 'swing', function() { });
         return false; 
        }

       //alert("Finished animating");
    });
         $("#pro-sub-btn_event").show();
   }else{
     $('#loader').modal({dismissible: false});
     $('#loader').modal('open');
    tinyMCE.triggerSave();
$.ajax({
                             type:"POST",
                             url:"../events/event-post.php",
                             data: $("form").serialize(),
                             success:function(res) {

                            var data =JSON.parse(res);
                             console.log(data);

                             if (data.status.trim()=='sucess') {
                              
                              

                               $("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Successfully Inserted",
                    text: "Your Event record has been inserted.",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "../events/showsingle_eventrecord.php";
                    });
                              },3000)



                             }else{

                                var responseArray = "";
                                $.each(data.message.split(','),function(k,val){
                                      responseArray += "<li style='color:red;'>"+val+"</li>";
                                })
                                
                               $('#loader').modal('close');
                               swal({
                                       title: "Error in insertion",
                    text: "<ul>"+responseArray+"</ul>",
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
}

})

function updateEvent() {
  

     tinyMCE.triggerSave();
  
$.ajax({
                             type:"POST",
                             url:"../events/update_event.php",
                             data: $("form").serialize(),
                                       success:function(data) {

                             console.log(data);

                             if (data=='sucess') {
                              

                                $("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Successfully Updated",
                    text: "Your Event record has been updated.",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                      window.location = "../events/event_list.php";
                    });
                              },3000)

                             }else{

                               swal({
                                       title: "Error in updation",
                    text: "Record can not be updated.",
                    type: "error",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                      // window.location = "../rooms/room_list.php";
                    });

                             }

                            
                           
                            }
                          })
}


function insertDiscountinput() {

    $.ajax({
                              type:"POST",
                              url:"../insert_discountpkg.php?column_idName=event_id&type=event&id="+$('input[name="event_id"]').val(),
                              data: $('.newDiscountLI input').serialize(),
                              success:function(data) {
                              var response = JSON.parse(data);
                              console.log(response);
                              if(response.status == "success"){
                                
                                $('.newDiscountLI').removeClass('newDiscountLI');
                                updateEvent();
                              }
                   }


                    })
}

