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

   if ($('.with_24hour input:checkbox:checked').length > 0) {

        $('#room_24hour').val('on');
   }else{

       $('#room_24hour').val('off');
   }
var validator= $("#room-form").validate({

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

      $.each($('#room-form').find(".error"),function(key,value){
        if($(value).css('display')!="none"){
           body.stop().animate({scrollTop:($(value).offset().top - 150)},1000, 'swing', function() { });
         return false; 
        }

       //alert("Finished animating");
    });
         $("#pro-sub-btn").show();
   }else{ 

    $('#loader').modal({dismissible: false});
    $('#loader').modal('open');
tinyMCE.triggerSave();

$.ajax({
                             type:"POST",
                             url:"../rooms/update_room.php",
                             data: $("form").serialize(),
                             success:function(res) {

                             var data =JSON.parse(res);
                             console.log(data);

                             if (data.status=='success') {


                                                           // 
                              var url=window.location.href;
// debugger;
                              if (url.indexOf('status') > -1) {

                                var url_split=url.split('&');
                                console.log(url_split[1]);


                                $("#btn-loader").hide();
                                setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                  title: "Room successfully updated ",
                                   // text: "Thank you for your submission! You will be notified once your hotel updation has been approved!",
                                   type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                    }, function(){

                      window.location = "../rooms/room_list.php?id="+data.id+"&"+url_split[2]+"&"+url_split[3];

                    });
                               },3000)



                              }else{


                               $("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Room successfully updated for review!",
                    text: "Thank you for your submission! You will be notified once your room updation has been approved!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                      window.location = "../rooms/room_list.php";
                    });
                              },2000)


                              }
                              

                               

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
}

})



/*===============Ajax call for room insertion (create new record)=================*/

$("#pro-sub-btn_room").click(function(){
  
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

var validator= $("#room-form").validate({

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

      $.each($('#room-form').find(".error"),function(key,value){
        if($(value).css('display')!="none"){
           body.stop().animate({scrollTop:($(value).offset().top - 150)},1000, 'swing', function() { });
         return false; 
        }

       //alert("Finished animating");
    });
         $("#pro-sub-btn_room").show();
   }else{ 

        $('#loader').modal({dismissible: false});
        $('#loader').modal('open');

        tinyMCE.triggerSave();
       
        $("#hotelId").val($(".hotelNames option:selected").attr("data-id"));
        // debugger;
        var form_serialize=$("form").serialize();
       
    $.ajax({
                             type:"POST",
                             url:"../rooms/room-post.php",
                             data: form_serialize,
                             success:function(res) {

                            var data =JSON.parse(res);
                             console.log(data);

                             if (data.status=='success') {

                                                             // 
                              var url=window.location.href;
// debugger;
                              if (url.indexOf('status') > -1) {

                                var url_split=url.split('&');
                                console.log(url_split[1]);


                                $("#btn-loader").hide();
                                setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                  title: "Room successfully submitted ",
                                   // text: "Thank you for your submission! You will be notified once your hotel updation has been approved!",
                                   type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                    }, function(){

                      window.location = "../rooms/room_list.php?id="+data.id+"&"+url_split[1]+"&"+url_split[2];

                    });
                               },3000)



                              }else{


                               $("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Room successfully submitted for review!",
                    text: "Thank you for your submission! You will be notified once your room submission has been approved!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "../rooms/room_list.php";
                    });
                              },3000)


                              }


                              
                              



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
                           $("#pro-sub-btn_room").show();
                             }
                             
                              
                             
                             }

                              
                           
                          })
 }


})


