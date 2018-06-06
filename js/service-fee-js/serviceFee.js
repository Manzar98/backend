$('#pro-sub-btn_fee').click(function(){

   var validator= $("#serviceFee-form").validate({
		rules:{

			fee_charges:{
				required:true
			},
			fee_type:{
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
		$.each($('#serviceFee-form').find(".error"),function(key,value)
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
        ajax("../service_fee/feePostUpdate.php",$("form").serialize(),function(data){
          $("#btn-loader").hide();
        	setTimeout(function(){
                                  $('#loader').modal('close');
                                   var tit;
                                  if (data.w_time=="create") {
                                         tit="Service Fee successfully submitted";
                                  }else{
                                       tit="Service Fee successfully updated";
                                  }
                                  swal({
                                    title: tit, 
                                    type: "success",
                                             //confirmButtonColor: "#DD6B55",
                                             confirmButtonText: "ok",
                                             closeOnConfirm: true,
                                             html: false
                                           }, function(){
                                            if (data.typ=="vendor") {
                                               window.location = "../service_fee/feeVendor.php?id="+data.id+"&fee_id="+data.feeId;
                                             }else{
                                               window.location = "../service_fee/feeEndUser.php?id="+data.id+"&fee_id="+data.feeId;
                                             }
                                           
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