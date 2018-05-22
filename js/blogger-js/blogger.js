$('#pro-sub-btn_blog').click(function () {

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

	var validator= $("#blog-form").validate({
		rules:{

			blog_title:{
				required:true
			},
			blog_alias:{
				required:true,
				lettersonly: true

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
		$.each($('#blog-form').find(".error"),function(key,value)
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
		
		blogger_ajax_ftn();
		
	}
	

});


function blogger_ajax_ftn(){
	
	$.ajax({
		type:"POST",
		url:"../blogger/blogPostUpdate.php",
		data: $("form").serialize(),
		success:function(res) {
			var data =JSON.parse(res);
			if (data.status=='success') {

				$("#btn-loader").hide();
				var url=window.location.href;
				if (url.indexOf('status') > -1) {
					var url_split=url.split('&');
					var tit;
					if (data.w_time=="create") {
						tit="Blog successfully submitted";
					}else{
						tit="Blog successfully updated";
					}

					setTimeout(function(){
						$('#loader').modal('close');
						swal({
							title: tit,
							type: "success",
							confirmButtonText: "ok",
							closeOnConfirm: true,
							html: false
						}, function(){
							if (data.w_time=="create") {
								window.location = "../blogger/blogListing.php?id="+data.id+"&"+url_split[1]+"&"+url_split[2];
							}else{ 
								window.location = "../blogger/blogListing.php?id="+data.id+"&"+url_split[2]+"&"+url_split[3];
							}
						});
					},3000)

				}else{
					
					setTimeout(function(){
						$('#loader').modal('close');
						var tit;
						var des;
						if (data.w_time=="create") {
							tit="Blog successfully submitted for review!";
							des="Thank you for your submission! You will be notified once your blog submission has been approved!"

						}else{
							tit="Blog successfully updated for Review.";
							des="Thank you for your submission! You will be notified once your hotel updation has been approved!"
						}
						swal({
							title: tit,
							text: des,
							type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                  }, function(){

                  	window.location = "../blogger/blogListing.php?id="+data.id;

                  });
					},3000)

				}

				

			}else{

				var responseArray = "";
				$.each(data.message.split(','),function(k,val){
					responseArray += " <li  style='color:red;'><i class='fa fa-times errordialog_x' aria-hidden='true'></i>"+val+"</li>";
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

function admin_blogger_ajax_ftn(){
	$.ajax({
		type:"POST",
		url:"../blogger/blogPostUpdate.php",
		data: $("form").serialize(),
		success:function(res) {
			var data =JSON.parse(res);
			if (data.status=='success') {
				var url=window.location.href;

				debugger
				$("#btn-loader").hide();
				setTimeout(function(){
					$('#loader').modal('close');
					var tit;
						// var des;
						if (data.w_time=="create") {
							tit="Blog successfully submitted!";
                                       // des="Thank you for your submission! You will be notified once your blog submission has been approved!"

                                   }else{
                                   	tit="Blog successfully updated.";
                                      // des="Thank you for your submission! You will be notified once your hotel updation has been approved!"
                                  }
                                  swal({
                                  	title: tit,
                                  	text: des,
                                  	type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                  }, function(){

                  	window.location = "../blogger/blogListing.php?id="+data.id;

                  });
                              },3000)

			}else{

				var responseArray = "";
				$.each(data.message.split(','),function(k,val){
					responseArray += " <li  style='color:red;'><i class='fa fa-times errordialog_x' aria-hidden='true'></i>"+val+"</li>";
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