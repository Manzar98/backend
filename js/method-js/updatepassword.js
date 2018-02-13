$("#pro-sub-btn_password_update").click(function(){

      $('#pro-sub-btn_password_update').prop('disabled', true);
	    $.ajax({

	    	type:"POST",
	    	url:"methods/updatepassword.php",
	    	data:$('#password-wrap').serialize(),
	    	success:function(res){
                   
                   var data=JSON.parse(res);

                   if (data.status=="Error") {

                   	 swal({
                            title: "Your old password is not match!",
                   
                    type: "error",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      });
                     $('#pro-sub-btn_password_update').prop('disabled', false);
                   }else{
                        
                         swal({
                                       title: "Your password has been updated successfully !",
                    text: "Thank you for your updation!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "db-profile.php?id="+data.id;
                    });
                   }
	    	}
	    })
})

$('.password_done').click(function(){

  $('#password-wrap input').val('');
})