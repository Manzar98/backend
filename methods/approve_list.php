<script type="text/javascript">
  function show_approve(event) {
       
      var sus=$(event.currentTarget).parents('tr');

      var btn=$(event.currentTarget).attr('value'); 
      
     
      if ($(event.currentTarget).attr('u_id')) {
        var u_id=$(event.currentTarget).attr('u_id');
      }else{
        var u_id="";
      }

      if ($(event.currentTarget).attr('h_id')) {
        var h_id=$(event.currentTarget).attr('h_id');
      }else{
        var h_id="";
      }
        
     

      if ($(event.currentTarget).attr('h-col')) {
          var h_col=$(event.currentTarget).attr('h-col');
      }else{
          var h_col="";
      }

      if ($(event.currentTarget).attr('u-col')) {
        var u_col=$(event.currentTarget).attr('u-col');
      }else{
        var u_col="";
      }

      var list_id=$(event.currentTarget).attr('id');
      var col_name=$(event.currentTarget).attr('col-name');
      var tbl_name=$(event.currentTarget).attr('tbl-name');
      var id_col=$(event.currentTarget).attr('id-col');
      var reason_col=$(event.currentTarget).attr('col-name-reason');
      var l_url=$(event.currentTarget).attr('l-url');
      var listing_name= sus.find('.listing_name').text();

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
             url:"../update-list_status.php",
             data:{'btn':btn,'u_id':u_id,'h_id':h_id,'col_name':col_name,'tbl_name':tbl_name,'list_id':list_id,'id_col':id_col,'u_col':u_col,'h_col':h_col,'reason_col':reason_col,'l_url':l_url,'list_name':listing_name},
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
</script>