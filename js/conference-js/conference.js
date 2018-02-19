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
   
   var validator= $("#conference-form").validate({
      
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

      $.each($('#conference-form').find(".error"),function(key,value){
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

       if ($('.newMenuLI input').length > 0) {
        // alert('manzar');
        insertMultiInput();
        // debugger;
      }else{
      
          updateConference();
      }


}

})

/*===============Ajax call for Conference insertion (create new record)=================*/

$("#pro-sub-btn_conference").click(function(){

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
var validator= $("#conference-form").validate({
        
        
        
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

      $.each($('#conference-form').find(".error"),function(key,value){
        if($(value).css('display')!="none"){
           body.stop().animate({scrollTop:($(value).offset().top - 150)},1000, 'swing', function() { });
         return false; 
        }

       //alert("Finished animating");
    });
         // $("#pro-sub-btn_conference").hide();
   }else{
        
         $('#loader').modal({dismissible: false});
         $('#loader').modal('open');
         if (!$('#hotelId').val()) {

          $("#hotelId").val($(".hotelNames option:selected").attr("data-id"));
         }
         
    $.ajax({
                             type:"POST",
                             url:"../conferences/conference-post.php",
                             data: $("form").serialize(),
                             success:function(res) {

                             var data =JSON.parse(res);
                             console.log(data);

                             if (data.status=='success') {
                            
                               $("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Conference successfully submitted for review!",
                    text: "Thank you for your submission! You will be notified once your conference submission has been approved!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "../conferences/conference_list.php";
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

}

})




function updateConference() {
  
  if (!$('#hotelId').val()) {

     $("#hotelId").val($(".hotelName option:selected").attr("data-id"));
  }
      
       
  $.ajax({
                             type:"POST",
                             url:"../conferences/update_conference.php",
                             data: $("form").serialize(),
                                       
                                       success:function(res) {
                             var data =JSON.parse(res);
                             console.log(data);

                             if (data.status=='success') {
                              
                                $("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Conference successfully updated for review!",
                    text: "Thank you for your submission! You will be notified once your conference updation has been approved!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                      window.location = "../conferences/conference_list.php";
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
}




function insertMultiInput() {

           $.ajax({
                              type:"POST",
                              url:"../insert_menupkg.php?column_idName=conference_id&type=conference&id="+$('input[name="conference_id"]').val(),
                              data: $('.newMenuLI input').serialize(),
                              success:function(data) {
                              var response = JSON.parse(data);
                              console.log(response);
                              if(response.status == "success"){
                                
                                $('.newMenuLI').removeClass('newMenuLI');
                                updateConference();
                              }
                   }


                    })
   
}