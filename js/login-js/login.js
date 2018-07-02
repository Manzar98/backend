$('#login_btn').click(function(){

authentication();

})


function enterBTN(event){

 if (event.which==13) {

  authentication();

 } 
}




function authentication(){

    $.ajax({

       type:"POST",
       url:"auth.php",
       data:$('#login-form').serialize(),
       success:function(res){

        var data=JSON.parse(res);
            // debugger;
        if (data.status=="Success") {

           if (data.u_type=="vendor") {

                   window.location = "vendors/dashboard.php?id="+data.id;

           }else if(data.u_type=="admin" || data.u_type=="s_admin"){

                   window.location = "admin/dashboard.php?id="+data.id;

           }else if(data.u_type=="blogger"){

                   window.location = "blogger/dashboard.php?id="+data.id;
           }

          
        }else if (data.type=="Suspended") {
                        // debugger;
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


             }else if (data.type=="Pending") {
                       // debugger;
                      $('.whole_login_block').html('');
                      $('.whole_login_block').
                      html(`<div class="col s1"></div>
                              <div class="db-cent-2 col s6">
                                <div class="row">
                                   <h3  style="color: red;">User pending approval<b>!</b></h3>
                                    <div style="padding-left: 5px; width: 635px;">
                                        <span >Your request has been submitted for review and has not yet been approved. You will be notified via email once your request has been approved which will enable you to login to the system.</span>
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
  })
}