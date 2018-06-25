/*============================
==============================
==============================
Search filteration in manage vendor only against multiple users
=============================
=============================
=============================*/
function myFunction_manage(event) {

	if ($('#user_Type').val()=="-1") {

		var input=document.getElementById("mysearch");

		var filter=input.value;

		var trObj = $('#h_table tbody tr');
		$('#h_table tbody tr').hide();

		if (event.which==13 || event.type=="click" ) {

			$.each(trObj,function(k,value){

				if(value.innerHTML.toLowerCase().indexOf(filter) > -1){
					$(value).show();
				}
			});
// debugger;
}else if(event.type=="change"){


	filter=$('#yourole').val();
	
	$.each($('.appr'),function(k,value){

		console.log(value);

		if(value.innerHTML.indexOf(filter) > -1){

			$(value).parents('.tr-1').show();
		}
	});

}else{

	$.each(trObj,function(k,value){
		if(value.innerHTML.toLowerCase().indexOf(filter) > -1){
			$(value).show();
		}
	});

}

}else{

	childfilter();
}

}
function childfilter(){
	$('.'+$('#user_Type').val()+'_Approved').hide();
	$('.'+$('#user_Type').val()+'_Suspended').hide(); 
	$('.'+$('#user_Type').val()+'_Pending').hide();
	$('.'+$('#user_Type').val()+'_'+$('#yourole').val()).show();

	if ($('#yourole').val()=="") {

		$('.'+$('#user_Type').val()+'_Approved').show();
		$('.'+$('#user_Type').val()+'_Suspended').show(); 
		$('.'+$('#user_Type').val()+'_Pending').show();
	}

}

function filter_userType(event) {

	$('#h_table tbody tr').hide();
	var trObj = $('#h_table tbody tr');
	if(event.type=="change"){

   var filter=$('#user_Type').val(); 
   $.each($('.userType'),function(k,value){

   	if(value.innerHTML.indexOf(filter) > -1){

   		if ($(value).parents('.vendor')) {

   			$(value).parents('.vendor').show();
   		}
   		if($(value).parents('.blogger')){

   			$(value).parents('.blogger').show();	
   		}

   	}

   });
   if (filter=="-1") {

   	  $('.blogger_Approved').show();
	  $('.blogger_Suspended').show(); 
	  $('.blogger_Pending').show();
	  $('.vendor_Approved').show();
	  $('.vendor_Suspended').show(); 
	  $('.vendor_Pending').show();
   }

 
}
}
/*------End search filteration-------*/



/*==========================
    Function for multiple admins
            ============================*/
$('#pro-sub-btn_admins').click(function(){

	debugger;
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
    
    var validator= $("#admins-form").validate({

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
      $.each($('#admins-form').find(".error"),function(key,value)
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
                url: 'registration/upload-ajax-cover.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(cover_data){
                     $('#coverimg').val(cover_data);
                    debugger;

                    $.ajax({

                             type: "POST",
                             url: "adminsPostUpdate.php",
                             data: $('form').serialize(),
                             success:function(res){

                               var data=JSON.parse(res);
                               if (data.status=="Success") {

                                 $("#btn-loader").hide();
                                 setTimeout(function(){
                                  $('#loader').modal('close');
                                  debugger;
                                  swal({
                                    title: "Admin registration successfully submitted!",
                                    // text: "Thank you for your submission! You will be notified once your registration request has been approved!",
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

})

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