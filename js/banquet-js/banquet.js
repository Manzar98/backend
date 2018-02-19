$("#pro-sub-btn").click(function(event){

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

   if ($(".with_generator input:checkbox:checked").length > 0) {
        

            $('#banquet_isgen').val('on');

        
   }else{
               $('#banquet_isgen').val('off');

   }

   if ($(".with_aricon input:checkbox:checked").length > 0) {
        

            $('#banquet_isaircon').val('on');

        
   }else{
               $('#banquet_isaircon').val('off');

   }
  
var validator= $("#banquet-form").validate({

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

            var body = $("html, body");
            $.each($('#banquet-form').find(".error"),function(key,value)
            {
              
              if($(value).css('display')!="none")
              {
                 body.stop().animate({scrollTop:($(value).offset().top - 150)},1000, 'swing', function() { });
               return false; 
              }
           });

   }else{

          $('#loader').modal({dismissible: false});
          $('#loader').modal('open');
              
            if ($('.newMenuLI input').length > 0) {
              insertMultiInput();
              
            }else{
                updateBanquet();
            }  
        }
event.preventDefault();
event.stopPropagation();
})



/*===============Ajax call for Banquet insertion (create new record)=================*/

$("#pro-sub-btn_banquet").click(function(){

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
var validator= $("#banquet-form").validate({

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

      $.each($('#banquet-form').find(".error"),function(key,value){
        if($(value).css('display')!="none"){
           body.stop().animate({scrollTop:($(value).offset().top - 150)},1000, 'swing', function() { });
         return false; 
        }

       //alert("Finished animating");
    });
         // $("#pro-sub-btn_banquet").show();
   }else{

$('#loader').modal({dismissible: false});
$('#loader').modal('open');

     tinyMCE.triggerSave();
     if (!$('#hotelId').val()) {
        // debugger;
        $("#hotelId").val($(".hotelNames option:selected").attr("data-id"));
     }
     
$.ajax({
                             type:"POST",
                             url:"../banquets/banquet-post.php",
                             data: $("form").serialize(),
                             success:function(res) {

                            var data =JSON.parse(res);
                             console.log(data);

                             if (data.status=='success') {
                              
                               $("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Banquet successfully submitted for review!",
                    text: "Thank you for your submission! You will be notified once your banquet submission has been approved!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "../banquets/banquet_list.php";
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


function updateBanquet() {
 
    // tinyMCE.triggerSave();
    if (!$('#hotelId').val()) {
        // debugger;
        $("#hotelId").val($(".hotelNames option:selected").attr("data-id"));
     }
  
      
   $.ajax({
                             type:"POST",
                             url:"../banquets/update_banquet.php",
                             data: $("form").serialize(),
                                       success:function(res) {
                             
                             var data =JSON.parse(res);
                             console.log(data);
                          
                             if (data.status=='success') {
                       
                                $("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Banquet successfully updated for review!",
                    text: "Thank you for your submission! You will be notified once your banquet updation has been approved!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                      window.location = "../banquets/banquet_list.php";
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
                              url:"../insert_menupkg.php?column_idName=banquet_id&type=banquet&id="+$('input[name="banquet_id"]').val(),
                              data: $('.newMenuLI input').serialize(),
                              success:function(data) {
                              var response = JSON.parse(data);
                              console.log(response);
                              if(response.status == "success"){
                                
                                $('.newMenuLI').removeClass('newMenuLI');
                                updateBanquet();
                              }
                   }


                    })
   
}
