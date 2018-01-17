$("#pro-sub-btn").click(function(){
         $("#pro-sub-btn").hide();
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
  
tinyMCE.triggerSave();
$.ajax({
                             type:"POST",
                             url:"../rooms/update_room.php",
                             data: $("form").serialize(),
                             success:function(data) {

                             console.log(data);

                             if (data=='sucess') { 
                              $('#loader').modal({dismissible: false});
                              $('#loader').modal('open');

                                $("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Successfully Updated",
                    text: "Your room record has been updated.",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                      window.location = "../rooms/room_list.php";
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

})



/*===============Ajax call for room insertion (create new record)=================*/

$("#pro-sub-btn_room").click(function(){
$("#pro-sub-btn_room").hide();

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
        tinyMCE.triggerSave();
    $.ajax({
                             type:"POST",
                             url:"../rooms/room-post.php",
                             data: $("form").serialize(),
                             success:function(data) {


                             console.log(data);

                             if (data=='sucess') {
                              $('#loader').modal({dismissible: false});
                              $('#loader').modal('open');

                               $("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Successfully Inserted",
                    text: "Your room record has been inserted.",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "../rooms/room_list.php";
                    });
                              },3000)



                             }else{

                               swal({
                                       title: "Error in insertion",
                    text: "Record can not be inserted.",
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


})


