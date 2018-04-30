
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
        var sus=$(event.currentTarget).parents('tr');
        var btn=$(event.currentTarget).attr('value');
        var u_id=$(event.currentTarget).attr('u_id');
        var h_id=$(event.currentTarget).attr('id');
     
	   $.ajax({
             
             type:"POST",
             url:"update_app_sus.php",
              data:{'btn':btn,'u_id':u_id,'h_id':h_id,'reason':text_area},
             success:function(res){
                   
                   var data=JSON.parse(res);

                   if (data.status=="Suspended") {

                         
                          sus.find('.suspend').hide();
                          sus.find('.approve').show();
                          sus.find(".appr").html('');
                          sus.find(".appr").html('<span class="db-not-success">Suspended</span>');
                      
                   }
             }    

	   });

} 
