function checkemail(val) {

 $.ajax({
   type:"POST",
   url:"methods/emailvalidation.php",
   data:'email='+val,
   success:function(res) {

            var data=JSON.parse(res);
            if (data.status=="Error") {
                  // debugger;
                    $("#msg").show();
                    $("#msg").html(data.message);
                    var mailwrapper=document.getElementById('msg');
                    mailwrapper.classList.add("invalid");
                    $("#msg").addClass("email_error");



              }else if(data.status=="Success"){
              // debugger;
                  $("#msg").hide();
                  $("#msg").removeClass("email_error");
            }

     }
  })
}