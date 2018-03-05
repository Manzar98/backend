$('#login_btn').click(function(){

  $.ajax({

  	   type:"POST",
  	   url:"auth.php",
  	   data:$('#login-form').serialize(),
  	   success:function(res){

  	   	var data=JSON.parse(res);
            
  	   	if (data.status=="Success") {

           if (data.u_type=="vendor") {

                   window.location = "vendors/dashboard.php?id="+data.id;

           }else if(data.u_type=="admin"){

                   window.location = "admin/dashboard.php?id="+data.id;
           }

  	   		
  	   	}else{

              
             if (data.type=="Suspended") {
                    
                      swal({
                                       title: "This user has been Suspended",
                    
                    type: "error",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: true
                      }, function(){
                      
                    });


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


  	   }
  })

})



function enterBTN(event){

        

 if (event.which==13) {

       $.ajax({

       type:"POST",
       url:"auth.php",
       data:$('#login-form').serialize(),
       success:function(res){

        var data=JSON.parse(res);

        if (data.status=="Success") {

          if (data.u_type=="vendor") {

                   window.location = "vendors/dashboard.php?id="+data.id;

           }else if(data.u_type=="admin"){

                   window.location = "admin/dashboard.php?id="+data.id;
           }

        }else{

                if (data.type=="Suspended") {
                      
                      swal({
                                       title: "This user has been Suspended",
                    
                    type: "error",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: true
                      }, function(){
                      
                    });


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


       }
  })

 } 
}