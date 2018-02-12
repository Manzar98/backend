/*=====================================
    Creation Time of Registration  form
========================================*/ 

$('#pro-sub-btn_registor').click(function(){
     
var validator= $("#registor-form").validate({

        rules:{
               
               reg_name:{
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
   	  $('#loader').modal();
   $('#loader').modal('open');
   	  $.ajax({

   	  	   type: "POST",
   	  	   url: "registration-post.php",
   	  	   data: $("form").serialize(),
   	  	   success:function(res){

   	  	   	  var data=JSON.parse(res);
   	  	   	  if (data.status="Success") {

   	  	   	  	$("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Registration successfully submitted for review!",
                    text: "Thank you for your submission! You will be notified once your registration submission has been approved!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "index.php";
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

/*=======================================
   Edition Time of Registration form
=========================================*/ 

$('#pro-sub-btn_registor_update').click(function(){
     
var validator= $("#registor-form").validate({

        rules:{
               
               reg_name:{
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
   	  $('#loader').modal();
   $('#loader').modal('open');
   	  $.ajax({

   	  	   type: "POST",
   	  	   url: "registration-update.php",
   	  	   data: $("form").serialize(),
   	  	   success:function(res){

   	  	   	  var data=JSON.parse(res);
   	  	   	  if (data.status="Success") {

   	  	   	  	$("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Registration successfully updated for review!",
                    text: "Thank you for your updation! You will be notified once your registration updation has been approved!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "db-profile.php?id="+data.id;
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





