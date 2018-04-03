
$(document).ready(function(){
      var stored_hotel_id= $('#h_Id').val();
$.ajax({
        
        type: "GET",
        url: '../hotels/selectimage.php',
        data:  {'hotel_id':stored_hotel_id},
        success:function(res){
             
            var data= JSON.parse(res);
             

                  $.each(data,function(k,val){

                    var img= $('<div class="imgeWrap" style="float: left; padding-right:5px; padding-bottom:5px; padding-top: 19px;"><a class="deletIMG"  onclick="deletIMG(event)" data-value="'+val.common_imgvideo_id+'" data-img="'+val.common_image+'"><i class="fa fa-times" aria-hidden="true"></i></a><img src="../'+val.common_image+'" style="width: 150px; height: 100px;" class="materialboxed"></div>');
                      
                      if (val.photo_int_ext_type=='interior') {
                             
                             $('#hotel_img_wrap').append(img);
                             $('#hotel_img_wrap').show();
                      }else if(val.photo_int_ext_type=='exterior'){

                             $('#hotel_img_exe_wrap').append(img);
                             $('#hotel_img_exe_wrap').show();
                      }
                  });

                  Materialize.Toast.removeAll();
        }


})


})