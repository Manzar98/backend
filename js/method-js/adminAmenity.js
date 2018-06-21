
/*=================================
===================================
------In All listing against vendor
===================================
===================================*/
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
/*=============================================================
===============================================================
------------- It works only admin section in Add/Edit amenities 
===============================================================
===============================================================*/
$('.applyTo').click(function(){

	if($(this).is(':checked')== true){

		var values=[];
		if ($('#amenity_page').val()) {

			values = $('#amenity_page').val().split(',');

		}

		$.each($('[type="checkbox"].applyTo.filled-in:checked'), function(){
			if (values.indexOf($(this).val()) == -1) {

				values.push($(this).val());
			}	
		});

    // convert the array to string and store the value in hidden input field
    $('#amenity_page').val(values.toString());
// debugger
if ($('.applyTo[value="'+$(this).val()+'"]').attr('edInsert')=="") {
       // debugger
       var am_Name=$('#amenity_name').val();
       var am_Descp=$('#amenity_description').val();
       var userId= $('#userId').val();
       $.ajax({
       	type:"POST",
       	url:'../amenities/insert_deleteAmenity.php',
       	data: {'page':$(this).val(),'name':am_Name,'descrp':am_Descp,'user_id':userId},
       	success:function(res){

       		var data=JSON.parse(res);
       		var Idvalues=[];
       		if ($('#amP_id').val()) {

       			Idvalues = $('#amP_id').val().split(',');
         				// debugger;
         			}
         			$.each(Idvalues, function(){
         				if (Idvalues.indexOf(data.id) == -1) {

         					Idvalues.push(data.id);
         				}	
         			});
		 // convert the array to string and store the value in hidden input field
		 $('#amP_id').val(Idvalues.toString());
		}
	});




   }


}else{

	var delete_p_name=$('#amenity_page').val();
	var split_p_name=delete_p_name.split(",");
	var index = split_p_name.indexOf($(this).val());
	if (index > -1) {

		var splicevalue=split_p_name.splice(index, 1);
		console.log(split_p_name);

		document.getElementById('amenity_page').value=split_p_name;
	}

	if ($('.applyTo[value="'+$(this).val()+'"]').attr('data-id')) {
		var inpt=$(this);
		var id=$(this).attr('data-id');
		$.ajax({
			type:"POST",
			url:'../amenities/insert_deleteAmenity.php',
			data: {'id':id},
			success:function(){

				inpt.removeAttr('data-id');
			}
		})
		var delete_p_id= $('#amP_id').val();
		var split_p_id=delete_p_id.split(',');
		var indexId=split_p_id.indexOf($(this).attr('data-id'));
		if (indexId > -1) {

			var spliceId=split_p_id.splice(indexId, 1);
			document.getElementById('amP_id').value=split_p_id;
		}
         	}

         }


     })