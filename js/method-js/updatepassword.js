$("#pro-sub-btn_password_update").click(function(){

 if ($('#check_Oldpass').val()!=$("#old-passcode").val()) {


       swal({
                            title: "Your old password is incorrect!",
                   
                    type: "error",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      });
       return;

 }

         var validator= $("#password-wrap").validate({

      rules:{
       
       new_password :{
                    required:true,
                    minlength : 8
                },
      reg_conpassword : {
        required:true,
        minlength : 8,
        equalTo : "#new-passcode"
      }



    },
    messages: {

     
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


  $('#pro-sub-btn_password_update').prop('disabled', true);
      $.ajax({

        type:"POST",
        url:"../methods/updatepassword.php",
        data:$('#password-wrap').serialize(),
        success:function(res){
                   
                   var data=JSON.parse(res);

                        
                   swal({
                                       title: "Your password has been updated successfully !",
                    text: "Thank you for your updation!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "../index.php";
                    });
                   
        }
      })


    }


    
})

$('.password_done').click(function(){

  $('#password-wrap input').val('');
})