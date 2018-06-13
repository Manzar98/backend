$('#pro-sub-btn_amenity').click(function(){


	if ($(".inactive_checkbox input:checkbox:checked").length > 0) {
        
            $('#hidden_checkbox').val('on');
        
   }else{
               $('#hidden_checkbox').val('off');
   }

   var validator= $("#amenity-form").validate({
		rules:{

			amenity_name:{
				required:true
			},
			amenity_description:{
				required:true
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
		$.each($('#amenity-form').find(".error"),function(key,value)
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
    var formData=$("form").serialize();
    if ($('#amP_id').val()) {
      var ids=$('#amP_id').val().split(',');

      $.each(ids,function(key,val){

        formData += encodeURI('&page_amenity_id[]='+val);

      })

    }
        ajax("../amenities/amenityPostUpdate.php",formData,function(data){$("#btn-loader").hide();
        	setTimeout(function(){
                                  $('#loader').modal('close');
                                   var tit;
                                  if (data.w_time=="create") {
                                         tit="Amenity successfully submitted";
                                  }else{
                                       tit="Amenity successfully updated";
                                  }
                                  swal({
                                    title: tit, 
                                    type: "success",
                                             //confirmButtonColor: "#DD6B55",
                                             confirmButtonText: "ok",
                                             closeOnConfirm: true,
                                             html: false
                                           }, function(){
                                            window.location = "../amenities/amenityListing.php?id="+data.id;
                                          });
                                },3000)});
	}
})


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




