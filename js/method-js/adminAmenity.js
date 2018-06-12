$('.admin_amenity').click(function () {
	
    
	 if($(this).is(':checked')== true){

		var values=[];
		if ($('#amenities-id').val()) {

			values = $('#amenities-id').val().split(',');
		}

		$.each($('[type="checkbox"].admin_amenity.filled-in:checked'), function(){
			if (values.indexOf($(this).val()) == -1) {

				values.push($(this).val());
			}

			
		});

    // convert the array to string and store the value in hidden input field
    $('#amenities-id').val(values.toString());
 
 }else{
 
   var deletechip=$('#amenities-id').val();
   var chipsplit=deletechip.split(",");
   var index = chipsplit.indexOf($(this).val());
   if (index > -1) {
    var splicevalue=chipsplit.splice(index, 1);
    console.log(chipsplit);
           // debugger;
           document.getElementById('amenities-id').value=chipsplit;
         }
 }


})