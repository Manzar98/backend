$("#pro-sub-btn").click(function(){


$.ajax({
                             type:"POST",
                             url:"../banquets/update_banquet.php",
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
                    text: "Your banquet record has been updated.",
                    type: "success",
                      //confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ok",
                      closeOnConfirm: true,
                      html: false
                      }, function(){
                      window.location = "../banquets/banquet_list.php";
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