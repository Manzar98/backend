/*=================
   Function for Ads 
======================*/
$('#pro-sub-btn_paid').prop('disabled',true);
$('.lbl-list').hide();
function showlist(that){

    $('.lbl-list').show();
    
     var stored_tbl_name=that.value;
     var stored_id=$('#user_id').val();
     
    $.ajax({


       type:"GET",
       url:'get_list.php',
       data:{"tbl_name":stored_tbl_name,"user_id":stored_id},
       success:function(res){
           var data= JSON.parse(res);
           console.log(data);
        // debugger;
        var   dropdown='<label class="pull-left lbl-list">List of '+stored_tbl_name+'</label>'
              dropdown+='<select name="list_of_any" id="List_any" onchange="list_of(this)" >'
              dropdown+='<option  disabled selected>Select One</option>'
           $.each(data,function(k,val){
             
                dropdown+='<option value='+val.name+'>'+val.name+'</option>';

           });
           dropdown+='</select>';
            document.getElementById('list_of_any').innerHTML=dropdown;
            // $('#List_any').material_select();
            $("#List_any").select2({
                    placeholder: "Select a State",
                    allowClear: true
             }); 
       }
    })

}

/*=================
 Function for Ads 
======================*/
$('#on_which_page').hide();
function list_of(that){
    $('#on_which_page').show();

}

/*=================
 Function for Ads 
======================*/
$('#no_of_days').hide();
function on_which(that){
    $('#no_of_days').show();

}


/*=================

=========== Function for Ads ===========*/
function n_day() {
   
   $('#pro-sub-btn_paid').prop('disabled',false);
}
/*=================
 Function for Ads submission
======================*/

$("#pro-sub-btn_paid").click(function(){

$('#loader').modal({dismissible: false});
      $('#loader').modal('open');

          var user_id=$('#user_id').val();
          var select_one=$('#select_parent option:selected').val();
          var list_any=$('#list_of_any option:selected').val();
          var on_which=$('#on_which_page option:selected').val();
          var no_days=$('#no_of_days option:selected').val();

 
      $.ajax({
          
          type:"POST",
          url:"paid-ads-post.php",
          data:{"user_id":user_id,"select_any":select_one,"list_of_any":list_any,"on_which_page":on_which,"no_of_days":no_days},
          success:function(res){
                    
                    var data= JSON.parse(res);
                    console.log(data);

                    if (data.status=="success") {
                         
                            setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Ads successfully submitted for review!",
                    text: "Thank you for your submission! You will be notified once your ads submission has been approved!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "paid-ads-list.php";
                    });
                              },3000)
                    }else{
                        
                           var responseArray = "";
                                $.each(data.message.split(','),function(k,val){
                                      responseArray += "<li style='color:red;'><i class='fa fa-times errordialog_x' aria-hidden='true'></i>"+val+"</li>";
                                })
                                
                               $('#loader').modal('close');
                               swal({
                                       title: "Something went wrong!",
                    text: "<ul class='responseDialog'>"+responseArray+"</ul>",
                    type: "error",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: true
                      }, function(){
                      // window.location = "../rooms/room_list.php";
                    });


                    }

          }


      })



})

/*=================
 Function for Ads Updation
======================*/


$("#pro-sub-btn_paid_edit").click(function(){

$('#loader').modal({dismissible: false});
      $('#loader').modal('open');

          var user_id=$('#user_id').val();
          var paid_id=$('#paid_id').val();
          var select_one=$('#select_parent option:selected').val();
          var list_any=$('#list_of_any option:selected').val();
          var on_which=$('#on_which_page option:selected').val();
          var no_days=$('#no_of_days option:selected').val();

 
      $.ajax({
          
          type:"POST",
          url:"../vendors/paid-ads-update.php",
          data:{"user_id":user_id,"paid_id":paid_id,"select_any":select_one,"list_of_any":list_any,"on_which_page":on_which,"no_of_days":no_days},
          success:function(res){
                    
                    var data= JSON.parse(res);
                    console.log(data);

                    if (data.status=="success") {
                         
                            setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Ads successfully updated for review!",
                    text: "Thank you for your submission! You will be notified once your ads updation has been approved!",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                       window.location = "../vendors/paid-ads-list.php";
                    });
                              },3000)
                    }else{
                        
                           var responseArray = "";
                                $.each(data.message.split(','),function(k,val){
                                      responseArray += "<li style='color:red;'><i class='fa fa-times errordialog_x' aria-hidden='true'></i>"+val+"</li>";
                                })
                                
                               $('#loader').modal('close');
                               swal({
                                       title: "Something went wrong!",
                    text: "<ul class='responseDialog'>"+responseArray+"</ul>",
                    type: "error",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: true
                      }, function(){
                      // window.location = "../rooms/room_list.php";
                    });


                    }

          }


      })



})