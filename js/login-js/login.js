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
                        
                      $('.whole_login_block').html('');
                      $('.whole_login_block').
                      html(`<div class="col s1"></div>
                              <div class="db-cent-2 col s6">
                                <div class="row">
                                   <h3  style="color: red;">User Suspended <b>!</b></h3>
                                    <div style="padding-left: 5px; width: 635px;">
                                        <span >Your account has been suspended. Please read the email that has been sent to you or contact us.</span>
                                    </div>
                                </div>
                              </div>`);


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
                      
                     $('.whole_login_block').html('');
                      $('.whole_login_block').
                      html(`<div class="col s1"></div>
                              <div class="db-cent-2 col s6">
                                <div class="row">
                                   <h3  style="color: red;">User Suspended <b>!</b></h3>
                                    <div style="padding-left: 5px; width: 635px;">
                                        <span >Your account has been suspended. Please read the email that has been sent to you or contact us.</span>
                                    </div>
                                </div>
                              </div>`);


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