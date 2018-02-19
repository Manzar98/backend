$('#login_btn').click(function(){

  $.ajax({

  	   type:"POST",
  	   url:"auth.php",
  	   data:$('#login-form').serialize(),
  	   success:function(res){

  	   	var data=JSON.parse(res);

  	   	if (data.status=="Success") {

  	   		window.location = "dashboard.php?id="+data.id;
  	   	}else{

  	   		 swal({
                                       title: "Email or Password is incorrect",
                    
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

})



function enterBTN(){

        

 if (event.which==13) {

       $.ajax({

       type:"POST",
       url:"auth.php",
       data:$('#login-form').serialize(),
       success:function(res){

        var data=JSON.parse(res);

        if (data.status=="Success") {

          window.location = "dashboard.php?id="+data.id;
        }else{

           swal({
                                       title: "Email or Password is incorrect",
                    
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