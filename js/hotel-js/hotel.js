
$("#pro-sub-btn").click(function(){
   // $("#pro-sub-btn").hide();
   if ($('#hotel_img_wrap .imgeWrap').length==0) {

    swal({

      title: "At least one interior photo is required",

      type: "error",
            //confirmButtonColor: "#DD6B55",
            confirmButtonText: "ok",
            closeOnConfirm: true,
            html: false
          });
    return;
  }
  if ($('#hotel_img_exe_wrap .imgeWrap').length==0) {

    swal({

      title: "At least one exterior photo is required",

      type: "error",
            //confirmButtonColor: "#DD6B55",
            confirmButtonText: "ok",
            closeOnConfirm: true,
            html: false
          });
    return;
  }
  if ($('#hotel_cover_img .imgeWrap').length==0) {

    swal({

      title: "Cover photo is required",

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

 if ($("#fil_air input:checkbox:checked").length>0) {

  $('#hotel_isair').val('on');
}else{

 $('#hotel_isair').val('off');
}

if ($("#fil_bus input:checkbox:checked").length>0) {

  $('#hotel_isbus').val('on');
}else{

 $('#hotel_isbus').val('off');
}
var validator= $("#hotel-form").validate({

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

     $.each($('#hotel-form').find(".error"),function(key,value){
      if($(value).css('display')!="none"){
       body.stop().animate({scrollTop:($(value).offset().top - 150)},1000, 'swing', function() { });
       return false; 
     }

       //alert("Finished animating");
     });
     $("#pro-sub-btn").show();
   }else{

     tinyMCE.triggerSave();
     $('#loader').modal({dismissible: false});
     $('#loader').modal('open'); 
     $.ajax({
       type:"POST",
       url:"../hotels/update_hotel.php",
       data: $("form").serialize(),
       success:function(res) {

         var data =JSON.parse(res);
         console.log(data);

         if (data.status=='success') {

                              // debugger;
                              var url=window.location.href;

                              if (url.indexOf('status') > -1) {

                                var url_split=url.split('&');
                                console.log(url_split[1]);


                                $("#btn-loader").hide();
                                setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                  title: "Updation successfully ",
                                   // text: "Thank you for your submission! You will be notified once your hotel updation has been approved!",
                                   type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                    }, function(){

                      window.location = "../hotels/hotel_list.php?id="+data.id+"&"+url_split[1]+"&"+url_split[2];

                    });
                               },3000)



                              }else{


                                $("#btn-loader").hide();
                                setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                   title: "Updation successfully submitted for Review.",
                                   text: "Thank you for your submission! You will be notified once your hotel updation has been approved!",
                                   type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                    }, function(){

                      window.location = "../hotels/hotel_list.php";
                    });
                               },3000)


                              }
                              


                            }else{

                             var responseArray = "";
                             $.each(data.message.split(','),function(k,val){
                              responseArray += " <li  style='color:red;'><i class='fa fa-times errordialog_x' aria-hidden='true'></i>"+val+"</li>";
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

/*===============Ajax call for hotel insertion (create new record)=================*/




$("#pro-sub-btn_hotel").click(function(){
  // $("#pro-sub-btn_hotel").hide();
  if ($('#hotel_img_wrap .imgeWrap').length==0) {

    swal({

      title: "At least one interior photo is required",

      type: "error",
            //confirmButtonColor: "#DD6B55",
            confirmButtonText: "ok",
            closeOnConfirm: true,
            html: false
          });
    return;
  }
  if ($('#hotel_img_exe_wrap .imgeWrap').length==0) {

    swal({

      title: "At least one exterior photo is required",

      type: "error",
            //confirmButtonColor: "#DD6B55",
            confirmButtonText: "ok",
            closeOnConfirm: true,
            html: false
          });
    return;
  }
  if ($('#hotel_cover_img .imgeWrap').length==0) {

    swal({

      title: "Cover photo is required",

      type: "error",
            //confirmButtonColor: "#DD6B55",
            confirmButtonText: "ok",
            closeOnConfirm: true,
            html: false
          });
    return;
  }

  var validator= $("#hotel-form").validate({



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

     $.each($('#hotel-form').find(".error"),function(key,value){
      if($(value).css('display')!="none"){
       body.stop().animate({scrollTop:($(value).offset().top - 150)},1000, 'swing', function() { });
       return false; 
     }

       //alert("Finished animating");
     });
     $("#pro-sub-btn_hotel").show();
   }else{
    $('#loader').modal({dismissible: false});
    $('#loader').modal('open');

    tinyMCE.triggerSave();

    $.ajax({
     type:"POST",
     url:"../hotels/hotel-post.php",
     data: $("form").serialize(),

     success:function(res) {

      var data =JSON.parse(res);
      console.log(data);

      if (data.status=='success') {
       // debugger;
                              var url=window.location.href;

                              if (url.indexOf('status') > -1) {

                                var url_split=url.split('&');
                                console.log(url_split[1]);


                                $("#btn-loader").hide();
                                setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                  title: "Hotel successfully submitted ",
                                   // text: "Thank you for your submission! You will be notified once your hotel updation has been approved!",
                                   type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                    }, function(){

                      window.location = "../hotels/hotel_list.php?id="+data.id+"&"+url_split[1]+"&"+url_split[2];

                    });
                               },3000)



                              }else{


                                $("#btn-loader").hide();
                                setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                   title: "Hotel successfully submitted for review!",
           text: "Thank you for your submission! You will be notified once your hotel submission has been approved!",
           type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                    }, function(){

                      window.location = "../hotels/hotel_list.php";
                    });
                               },3000)


                              }
                              
      

     }else{

      var responseArray = "";
      $.each(data.message.split(','),function(k,val){
        responseArray += " <li  style='color:red;'><i class='fa fa-times errordialog_x' aria-hidden='true'></i>"+val+"</li>";
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

// $(document).ready(function(){
//     $(".responseDialog").parent().addClass('parent_responseDialog');
// });


// $("#pro-sub-btn").ajaxSubmit({url: '../../hotels/update_hotel.php', type: 'post'})

/*==================================
    Remove imges when click on done in modal
    ====================================*/

    $('.int_done').click(function () {
    // debugger;
    $('#int_iframe').contents().find('.dz-image-preview.dz-success.dz-complete').remove();
  // body...
})

    $('.ext_done').click(function () {
    // debugger;
    $('#ext_iframe').contents().find('.dz-image-preview.dz-success.dz-complete').remove();
  // body...
})
