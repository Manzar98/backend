/*=====================================
    Creation Time of Registration  form
    ========================================*/ 

    $('#pro-sub-btn_registor').click(function(){
    

      value = $('#reg_birth').val(),
      today = new Date(),
      dob = new Date(value.replace(/(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
      age = today.getFullYear() - dob.getFullYear(); //This is the update
       if (age<13) {
             swal({

        title: "You must be 13 years of age!",
        
        type: "error",
            //confirmButtonColor: "#DD6B55",
            confirmButtonText: "ok",
            closeOnConfirm: true,
            html: false
          });
      return;

       }


      if($('#check_cover').val()==""){

          swal({

        title: "Cover Photo is required",
        
        type: "error",
            //confirmButtonColor: "#DD6B55",
            confirmButtonText: "ok",
            closeOnConfirm: true,
            html: false
          });
      return;
      }

      if ($('#profile_img').val()=="") {
        swal({

        title: "Profile Photo is required",
        
        type: "error",
            //confirmButtonColor: "#DD6B55",
            confirmButtonText: "ok",
            closeOnConfirm: true,
            html: false
          });
      return;
      }

     if ($("#msg").hasClass("email_error")) {
       
      swal({

        title: "This email address already exists",
        
        type: "error",
            //confirmButtonColor: "#DD6B55",
            confirmButtonText: "ok",
            closeOnConfirm: true,
            html: false
          });
      return;
    }
    
    var validator= $("#registor-form").validate({

      rules:{


       reg_name:{
        required:true
      },
      reg_lstname:{
        required:true
      },
      reg_email:{
        required:true,
        email:true
      },
      reg_phone:{
        required:true,
        number:true
      },
      reg_postal:{
        required:true
      },
      reg_city:{
        required:true
      },
      reg_province:{
        required:true
      },
      reg_country:{
        required:true
      },
      reg_birth:{
        required:true,
        date: true
      },
      reg_password :{
                    required:true,
                    minlength : 8
                },
      reg_Conpassword : {
        required:true,
        minlength : 8,
        equalTo : "#reg_password"
      }




    },
    messages: {

      reg_email:{
       email: 'Please enter the valid email address'  
     } ,
     reg_phone:{
       number:'Mobile number should only contain numbers'
     },
     reg_password:{
       minlength:'Minimum length of password is 8 digits'
     },
     reg_birth:{
       date:'Please enter the valid date format'
     },
     reg_Conpassword:{
      equalTo: "Please enter the same password"
     }

   },

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
      $.each($('#registor-form').find(".error"),function(key,value)
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

       var file_data = $('#sortpicture').prop('files')[0];   
       var form_data = new FormData();                  
       form_data.append('file', file_data);
    // alert(form_data);                             
    $.ajax({
                url: 'upload-ajax-cover.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(cover_data){
                     $('#coverimg').val(cover_data);


                    $.ajax({

                             type: "POST",
                             url: "registration-post.php",
                             data: $('form').serialize(),
                             success:function(res){

                               var data=JSON.parse(res);
                               if (data.status=="Success") {

                                 $("#btn-loader").hide();
                                 setTimeout(function(){
                                  $('#loader').modal('close');
                                  swal({
                                    title: "Registration successfully submitted for review!",
                                    text: "Thank you for your submission! You will be notified once your registration request has been approved!",
                                    type: "success",
                                             //confirmButtonColor: "#DD6B55",
                                             confirmButtonText: "ok",
                                             closeOnConfirm: true,
                                             html: false
                                           }, function(){
                                            window.location = "../../index.php";
                                          });
                                },3000)
                               }else{


                                 var responseArray = "";
                                 $.each(data.message.split(','),function(k,val){
                                  responseArray += " <li  style='color:red;list-style-type: circle;margin-left: 10px;'><i class='fa fa-times errordialog_x' aria-hidden='true'></i>"+val+"</li>";
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
                                            
                                      });
                                }

                            }
                         })
                }
     });
  }

  });

/*=======================================
   Edition Time of Registration form
   =========================================*/ 

   $('#pro-sub-btn_registor_update').click(function(){


    if ($("#msg").hasClass("email_error")) {
       
      swal({

        title: "This email address already exists",
        
        type: "error",
            //confirmButtonColor: "#DD6B55",
            confirmButtonText: "ok",
            closeOnConfirm: true,
            html: false
          });
      return;
    }
     
    var validator= $("#registor-form").validate({

      rules:{
       
       reg_name:{
        required:true
      },
      reg_lstname:{
        required:true
      },
      reg_email:{
        required:true,
        email:true
      },
      reg_phone:{
        required:true,
        number:true
      },
      reg_postal:{
        required:true
      },
      reg_city:{
        required:true
      },
      reg_province:{
        required:true
      },
      reg_country:{
        required:true
      },
      reg_birth:{
        required:true,
        date: true
      },
      reg_password:{
        required:true,
        minlength:8
      }




    },
    messages: {

      reg_email:{
       email: 'Please enter the valid email address'  
     } ,
     reg_phone:{
       number:'Mobile number should only contain numbers'
     },
     reg_password:{
       minlength:'Minimum length of password is 8 digits'
     },
     reg_birth:{
       date:'Please enter the valid date format'
     },

   },

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
      $.each($('#registor-form').find(".error"),function(key,value)
      {
        
        if($(value).css('display')!="none")
        {
         body.stop().animate({scrollTop:($(value).offset().top - 150)},1000, 'swing', function() { });
         return false; 
       }
     });

    }else{
   	  // debugger;
   	  $('#loader').modal({dismissible: false});
       $('#loader').modal('open');

       var file_data = $('#sortpicture').prop('files')[0];   
       var form_data = new FormData();                  
       form_data.append('file', file_data);
    // alert(form_data);  

    if ($('#check_cover').val()!="") {                          
    $.ajax({
                url: 'registration/upload-ajax-cover.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(cover_data){
                     $('#coverimg').val(cover_data);

                            $.ajax({

                                  type: "POST",
                                  url: "registration/registration-update.php",
                                  data: $("form").serialize(),
                                  success:function(res){

                                   var data=JSON.parse(res);

                                   if (data.status=="Success") {
                                   
                                    $("#btn-loader").hide();
                                    setTimeout(function(){
                                     $('#loader').modal('close');
                                     swal({
                                       title: "Registration successfully updated for review!",
                                       text: "Thank you for your updation! You will be notified once your changes have been approved!",
                                       type: "success",
                                                //confirmButtonColor: "#DD6B55",
                                                confirmButtonText: "ok",
                                                closeOnConfirm: true,
                                                html: false
                                              }, function(){
                                                if (data.usertype=="vendor") {
                                               window.location = "db-profile.php?id="+data.id;
                                             }else if(data.usertype=="blogger"){
                                                window.location = "edit-blogger.php?id="+data.id;
                                             }
                                             });
                                   },3000)
                                  }else if(data.status=="user_success"){
                                       
                                          $("#btn-loader").hide();
                                    setTimeout(function(){
                                     $('#loader').modal('close');
                                     swal({
                                       title: "Registration successfully updated for review!",
                                       text: "Thank you for your updation! You will be notified once your changes have been approved!",
                                       type: "success",
                                                //confirmButtonColor: "#DD6B55",
                                                confirmButtonText: "ok",
                                                closeOnConfirm: true,
                                                html: false
                                              }, function(){
                                                if (data.usertype=="admin") {
                                                   window.location = "edit_admin.php?id="+data.id;
                                                }else{
                                                   window.location = "edit_vendor.php?id="+data.id;
                                                }
                                               
                                             });
                                   },3000)




                                  }else{



                                   $('#loader').modal('close');
                                   swal({
                                     title: "Something went wrong!",
                                     
                                     type: "error",
                                                //confirmButtonColor: "#DD6B55",
                                                confirmButtonText: "ok",
                                                closeOnConfirm: true,
                                                html: true
                                              }, function(){
                                                
                                              });
                                 }

                               }
                             })

                }
     });
  }else{

              $.ajax({

                                  type: "POST",
                                  url: "registration/registration-update.php",
                                  data: $("form").serialize(),
                                  success:function(res){

                                   var data=JSON.parse(res);
                                   if (data.status=="Success") {
                                   
                                    $("#btn-loader").hide();
                                    setTimeout(function(){
                                     $('#loader').modal('close');
                                     swal({
                                       title: "Registration successfully updated for review!",
                                       text: "Thank you for your updation! You will be notified once your changes have been approved!",
                                       type: "success",
                                                //confirmButtonColor: "#DD6B55",
                                                confirmButtonText: "ok",
                                                closeOnConfirm: true,
                                                html: false
                                              }, function(){
                                              if (data.usertype=="vendor") {
                                               window.location = "db-profile.php?id="+data.id;
                                             }else if(data.usertype=="blogger"){
                                                window.location = "edit-blogger.php?id="+data.id;
                                             }
                                             });
                                   },3000)
                                  }else if(data.status=="user_success"){

                                          $("#btn-loader").hide();
                                    setTimeout(function(){
                                     $('#loader').modal('close');
                                     swal({
                                       title: "Registration successfully updated for review!",
                                       text: "Thank you for your updation! You will be notified once your changes have been approved!",
                                       type: "success",
                                                //confirmButtonColor: "#DD6B55",
                                                confirmButtonText: "ok",
                                                closeOnConfirm: true,
                                                html: false
                                              }, function(){
                                              if (data.usertype=="admin") {
                                                   window.location = "edit_admin.php?id="+data.id;
                                                }else{
                                                   window.location = "edit_vendor.php?id="+data.id+"&u_type="+data.usertype;
                                                }
                                             });
                                   },3000)




                                  }else{



                                   $('#loader').modal('close');
                                   swal({
                                     title: "Something went wrong!",
                                     
                                     type: "error",
                                                //confirmButtonColor: "#DD6B55",
                                                confirmButtonText: "ok",
                                                closeOnConfirm: true,
                                                html: true
                                              }, function(){
                                                
                                              });
                                 }

                               }
                             })




  }

     }

   });






/*=================
cover image reader
===================*/
function readcover(input){
     $('#cover').show();
    if (input.files && input.files[0]) {
                 var reader = new FileReader();

                reader.onload = function (e) {
                     $('#cover')
                         .attr('src', e.target.result)
                        .width(150)
                         .height(100);
                 };
                 $('#preveiw_cover').remove();
                 reader.readAsDataURL(input.files[0]);
    }


}
