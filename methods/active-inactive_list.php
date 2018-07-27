<script type="text/javascript">
    function active(event) {

        var sus=$(event.currentTarget).parents('.veiw_sus_appr');
        var btn=$(event.currentTarget).attr('value');
        var id=$(event.currentTarget).attr('id');
        var u_id=$(event.currentTarget).attr('u_id');
        var tbl=$(event.currentTarget).attr('tbl-name');
        var id_col=$(event.currentTarget).attr('id-col');
        var col_name=$(event.currentTarget).attr('col-name');

        swal({
            title: "Are you sure you want to activate this page?",
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
                    url:"../updatePageStatus.php",
                    data:{'btn':btn,'id':id,'u_id':u_id,'tbl_name':tbl,'id_col':id_col,'col_name':col_name},
                    success:function(res){

                        var data=JSON.parse(res);

                        if (data.status=="off") {

                            sus.find('.active').hide();
                            sus.find('.inactive').show();
                            sus.find(".appr").html('');
                            sus.find(".appr").html('<span class="db-success">Activated</span>');
                            sus.find(".descp").html('');
                            debugger
                            if (data.description==null) {

                                $.ajax({

                                    type : "POST",
                                    url  : "../../methods/getDescriptionForVeiw.php",
                                    data : {"id":data.action_id},
                                    success:function(descp){

                                        sus.find(".descp").html('<p>'+descp+'</p>');
                                    }
                                })
                            }else{

                              sus.find(".descp").html('<p>'+data.description+'</p>');
                          } 

                      }
                  }   
              });
            }         
        });

    }

    function inactive(event) {

        var sus=$(event.currentTarget).parents('.veiw_sus_appr');
        var btn=$(event.currentTarget).attr('value');
        var id=$(event.currentTarget).attr('id');
        var u_id=$(event.currentTarget).attr('u_id');
        var tbl=$(event.currentTarget).attr('tbl-name');
        var id_col=$(event.currentTarget).attr('id-col');
        var col_name=$(event.currentTarget).attr('col-name');
        swal({
            title: "Are you sure you want to deactivate this page?",
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
                    url:"../updatePageStatus.php",
                    data:{'btn':btn,'id':id,'u_id':u_id,'tbl_name':tbl,'id_col':id_col,'col_name':col_name},
                    success:function(res){

                        var data=JSON.parse(res);

                        if (data.status=="on") {
                              debugger;

                            sus.find('.inactive').hide();
                            sus.find('.active').show();
                            sus.find(".appr").html('');
                            sus.find(".appr").html('<span class="db-not-success">Deactivated</span>');
                            sus.find(".descp").html('');
                            if (data.description==null) {
                                $.ajax({

                                    type : "POST",
                                    url  : "../../methods/getDescriptionForVeiw.php",
                                    data : {"id":data.action_id},
                                    success:function(descp){

                                        sus.find(".descp").html('<p>'+descp+'</p>');
                                    }
                                })
                            }else{

                              sus.find(".descp").html('<p>'+data.description+'</p>');
                          } 


                      }
                  }   
              });
            }         
        });

    }
</script>