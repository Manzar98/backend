
$("#pro-sub-btn").click(function(){
   // $("#pro-sub-btn").hide();
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
	
$.ajax({
                             type:"POST",
                             url:"../hotels/update_hotel.php",
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
                    text: "Your hotel record has been updated.",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                      window.location = "../hotels/hotel_list.php";
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

/*===============Ajax call for hotel insertion (create new record)=================*/




$("#pro-sub-btn_hotel").click(function(){
  $("#pro-sub-btn_hotel").hide();

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

    tinyMCE.triggerSave();

     $.ajax({
                             type:"POST",
                             url:"../hotels/hotel-post.php",
                             data: $("form").serialize(),

                             success:function(res) {

                            var data =JSON.parse(res);
                             console.log(data);

                             if (data=='sucess') {
                              $('#loader').modal({dismissible: false});
                              $('#loader').modal('open');

                               $("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Successfully Inserted",
                    text: "Your hotel record has been inserted.",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "../hotels/hotel_list.php";
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





// $("#pro-sub-btn").ajaxSubmit({url: '../../hotels/update_hotel.php', type: 'post'})




