function checkalias(val) {
  
  var tbl=$(event.currentTarget).attr('tbl');
  var colN=$(event.currentTarget).attr('name');
  var url=$(event.currentTarget).attr('url-ajax');
  var connection=$(event.currentTarget).attr('sql-connect');
 
 $.ajax({
   type:"POST",
   url:url,
   data:{'tblName':tbl,'colName':colN,'colValue':val,'connection':connection},
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