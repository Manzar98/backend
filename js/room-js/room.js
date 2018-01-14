$("#pro-sub-btn").click(function(){

  // $('#loader').modal({dismissible: false});
  

$.ajax({
                             type:"POST",
                             url:"../rooms/update_room.php",
                             data: $("form").serialize(),
                             success:function(data) {

                             console.log(data);

                             if (data=='sucess') {
                              $("#pro-sub-btn").hide();
                              $('#loader').modal({dismissible: false});
                              $('#loader').modal('open');

                                $("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Successfully Updated",
                    text: "Your room record has been updated.",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                      window.location = "../rooms/room_list.php";
                    });
                              },3000)

                             }else{

                               swal({
                                       title: "Error in updation",
                    text: "Record can not be updated.",
                    type: "error",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                      // window.location = "../rooms/room_list.php";
                    });

                             }

                            
                           
                            }
                          })


})



/*===============Ajax call for romm insertion (create new record)=================*/

$("#pro-sub-btn_room").click(function(){
  
$.ajax({
                             type:"POST",
                             url:"../rooms/room-post.php",
                             data: $("form").serialize(),
                             success:function(data) {


                             console.log(data);

                             if (data=='sucess') {
                              $("#pro-sub-btn").hide();
                              $('#loader').modal({dismissible: false});
                              $('#loader').modal('open');

                               $("#btn-loader").hide();
                              setTimeout(function(){
                                 $('#loader').modal('close');
                                 swal({
                                       title: "Successfully Inserted",
                    text: "Your room record has been inserted.",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                      // window.location = "../rooms/showsingle_roomrecord.php";
                    });
                              },3000)



                             }else{

                               swal({
                                       title: "Error in insertion",
                    text: "Record can not be inserted.",
                    type: "error",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                      // window.location = "../rooms/room_list.php";
                    });

                             }
                             
                              
                             
                             }

                              
                           
                          })





})


