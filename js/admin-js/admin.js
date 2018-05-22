/*============================
==============================
==============================
Search filteration in manage vendor only against multiple users
=============================
=============================
=============================*/
function myFunction_manage(event) {

	if ($('#user_Type').val()=="-1") {

		var input=document.getElementById("mysearch");

		var filter=input.value;

		var trObj = $('#h_table tbody tr');
		$('#h_table tbody tr').hide();

		if (event.which==13 || event.type=="click" ) {

			$.each(trObj,function(k,value){

				if(value.innerHTML.toLowerCase().indexOf(filter) > -1){
					$(value).show();
				}
			});
// debugger;
}else if(event.type=="change"){


	filter=$('#yourole').val();
	
	$.each($('.appr'),function(k,value){

		console.log(value);

		if(value.innerHTML.indexOf(filter) > -1){

			$(value).parents('.tr-1').show();
		}
	});

}else{

	$.each(trObj,function(k,value){
		if(value.innerHTML.toLowerCase().indexOf(filter) > -1){
			$(value).show();
		}
	});

}

}else{

	childfilter();
}

}
function childfilter(){
	$('.'+$('#user_Type').val()+'_Approved').hide();
	$('.'+$('#user_Type').val()+'_Suspended').hide(); 
	$('.'+$('#user_Type').val()+'_Pending').hide();
	$('.'+$('#user_Type').val()+'_'+$('#yourole').val()).show();

	if ($('#yourole').val()=="") {

		$('.'+$('#user_Type').val()+'_Approved').show();
		$('.'+$('#user_Type').val()+'_Suspended').show(); 
		$('.'+$('#user_Type').val()+'_Pending').show();
	}

}

function filter_userType(event) {

	$('#h_table tbody tr').hide();
	var trObj = $('#h_table tbody tr');
	if(event.type=="change"){

   var filter=$('#user_Type').val(); 
   $.each($('.userType'),function(k,value){

   	if(value.innerHTML.indexOf(filter) > -1){

   		if ($(value).parents('.vendor')) {

   			$(value).parents('.vendor').show();
   		}
   		if($(value).parents('.blogger')){

   			$(value).parents('.blogger').show();	
   		}

   	}

   });
   if (filter=="-1") {

   	  $('.blogger_Approved').show();
	  $('.blogger_Suspended').show(); 
	  $('.blogger_Pending').show();
	  $('.vendor_Approved').show();
	  $('.vendor_Suspended').show(); 
	  $('.vendor_Pending').show();
   }

 
}
}
/*------End search filteration-------*/