/*======================
   Creation/Updation Time
   ========================*/
   $('#pro-sub-btn_page').click(function(){
      // debugger;
   	vali('../pages/pagePostUpdate.php');
   	
   });


   /*===============End=================*/

   /*Function Defination*/
   function vali(p_url){

     if ($(".inactive_checkbox input:checkbox:checked").length > 0) {
        
            $('#hidden_checkbox').val('on');

   }else{
            $('#hidden_checkbox').val('off');

   }

   if ($("#msg").hasClass("email_error")) {
       
      swal({

        title: "This alias already exists",
        
        type: "error",
            //confirmButtonColor: "#DD6B55",
            confirmButtonText: "ok",
            closeOnConfirm: true,
            html: false
          });
      return;
    }

   	var validator=$('#page-form').validate({
   		rules:{
   			page_name:{
   				required:true
   			},
   			page_alias:{
   				required:true,
          lettersonly: true
   			},
   			page_content:{
   				required:true
   			},
   			page_metadata:{
   				required:true
   			},
   			page_metakeyword:{
   				required:true
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
   		$.each($('#page-form').find(".error"),function(key,value)
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
          tinyMCE.triggerSave();

          ajax(p_url,$("form").serialize(),function(data){$("#btn-loader").hide();
                                 setTimeout(function(){
                                  $('#loader').modal('close');
                                  if (data.w_time=="create") {
                                         tit="Page successfully submitted";
                                  }else{
                                       tit="Page successfully updated";
                                  }
                                  swal({
                                    title: tit, 
                                    type: "success",
                                             //confirmButtonColor: "#DD6B55",
                                             confirmButtonText: "ok",
                                             closeOnConfirm: true,
                                             html: false
                                           }, function(){
                                            window.location = "../pages/pageListing.php?id="+data.id;
                                          });
                                },3000)});

   	}	
   }

 function ajax(url,formdata,callback){
    // debugger;
 	   $.ajax({

           type:"POST",
           url: url,
           data: formdata,
           success:function(res){
               
               var data =JSON.parse(res);
               if (data.status.trim()=='success') {
                      callback(data);

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