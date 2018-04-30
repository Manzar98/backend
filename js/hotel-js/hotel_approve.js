
  function show_approve(event) {
       
      var sus=$(event.currentTarget).parents('tr');
      var btn=$(event.currentTarget).attr('value'); 
      var h_id=$(event.currentTarget).attr('id');
      var u_id=$(event.currentTarget).attr('u_id');

    swal({

        title: "Are you sure you want to approve this user?",
        
        type: "warning",
            // confirmButtonColor: "#DD6B55",
            showCancelButton: true,
            confirmButtonText: "ok",
            closeOnConfirm: true,
            confirmButtonText: "Yes",
            cancelButtonText: "cancel",
            closeOnConfirm: true,
            closeOnCancel: true
          },function (isconfirm) {

            if (isconfirm) {
                       
            $.ajax({
             
             type:"POST",
             url:"update_app_sus.php",
             data:{'btn':btn,'u_id':u_id,'h_id':h_id},
             success:function(res){
                   
                   var data=JSON.parse(res);

                   if (data.status=="Approved") {

                          sus.find('.approve').hide();
                          sus.find('.suspend').show();
                          sus.find(".appr").html('');
                          sus.find(".appr").html('<span class="db-success">Approved</span>');
                   
                   }
             }   

     });
           

            }

            
          });
   



  
  
}
