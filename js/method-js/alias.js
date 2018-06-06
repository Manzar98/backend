function checkalias(val) {

  var tbl=$(event.currentTarget).attr('tbl');
  var colN=$(event.currentTarget).attr('name');
  var url=$(event.currentTarget).attr('url-ajax');
  var connection=$(event.currentTarget).attr('sql-connect');

  var is_newValue= false;
  var data= {'tblName':tbl,'colName':colN,'colValue':val,'connection':connection};
  if (tbl=="pages") {
    $("#msg").hide();
    $("#msg").removeClass("email_error");
    if ($('#page_alias').val() && $('#page_alias').val()!=$('#p_alias').val()) {

      ajax_checkalias(url,data);
    }

  }else if(tbl=="blog"){

    $("#msg").hide();
    $("#msg").removeClass("email_error");
    if ($('#blog_alias').val() && $('#blog_alias').val()!=$('#b_alias').val()) {

      ajax_checkalias(url,data);
    }

  }else{

    ajax_checkalias(url,data);
  }
  
  
}


function ajax_checkalias(url,data) {
//  debugger
  $.ajax({
   type:"POST",
   url:url,
   data:data,
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