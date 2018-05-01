<script type="text/javascript">
	var rowValue = "";
      $('#susp').modal({
      	dismissible: false, // Modal can be dismissed by clicking outside of the modal
     
      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
        // alert("Ready");
        rowValue =trigger.parents('.sus_appr');
        console.log(modal, trigger);
         
      },
      });
function reason_submit() {

      	if ($('#textarea_susp').val()) {

		      rowValue.find('.org_susp').trigger('click');
		      rowValue.find('.suspend').hide();
		      $('#textarea_susp').val('');  
		      $('.realtime_reason').show();
		      $('#susp').modal('close');
		      
		      

      	}
      
      
 }
	
	function show_suspend(event) {
      
        var text_area=$('#textarea_susp').val();
        var sus=$(event.currentTarget).parents('.veiw_sus_appr');
      
       
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
      
      var crntevent=$(event.currentTarget).attr('veiw');
      var list_id=$(event.currentTarget).attr('id');
      var col_name=$(event.currentTarget).attr('col-name');
      var tbl_name=$(event.currentTarget).attr('tbl-name');
      var id_col=$(event.currentTarget).attr('id-col');
      var reason_col=$(event.currentTarget).attr('col-name-reason');
      var l_url=$(event.currentTarget).attr('l-url');
      var listing_name= sus.find('.listing_name').text();

	   $.ajax({
             
             type:"POST",
             url:"../update-list_status.php",
              data:{'btn':btn,'u_id':u_id,'h_id':h_id,'col_name':col_name,'tbl_name':tbl_name,'list_id':list_id,'id_col':id_col,'u_col':u_col,'h_col':h_col,'reason_col':reason_col,'l_url':l_url,'reason':text_area,'list_name':listing_name},
             success:function(res){
                   
                   var data=JSON.parse(res);

                   if (data.status=="Suspended") {

                          sus.find('.suspend').hide();
                          sus.find('.approve').show();

                           if (crntevent) {

                                sus.find('.sus').show();
                                sus.find('.appr').hide();
                               
                          }else{
                          
                               sus.find(".appr").html('');
                               sus.find(".appr").html('<span class="db-not-success">Suspended</span>');
                            
                          }     
                   }
             }    

	   });
	 
	 // debugger;
} 
</script>