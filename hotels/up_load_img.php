                      <?php
                      if(isset($_GET['name'])){
                       $type=$_GET['name'];
                     }
                     ?>
                     <div class="col s12">

                       <form action="../upload.php" enctype="multipart/form-data" class="dropzone" id="image-upload">
                        <?php
                       if (isset($_GET['name'])) {?>
                        <div class="image_drop_element"></div>
                        <input type="hidden" name="photo_type" id="photo_type" value="<?php  echo $type;  ?>">

                <?php  }elseif (isset($_GET['p']) && $_GET['p']=="edit") {

                         if ($_GET['t']== "ext-hotel") { ?>

                                <input type="hidden" value="exterior" name="photo_int_ext_type" />
                                 <input type="hidden" value="<?php echo $_GET['h_id'];?>" name="hotel_id" />
                  <?php   }elseif ($_GET['t'] == 'int-hotel') { ?>
                         
                                 <input type="hidden" value="interior" name="photo_int_ext_type" />
                                 <input type="hidden" value="<?php echo $_GET['h_id'];?>" name="hotel_id" />
                  <?php   }
                           # code...
                       } ?>
                      </form>
                    </div>





                    <script src="../js/jquery.min.js"></script>
                    <script src="../js/dropzone.js"></script>
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">

                    <script type="text/javascript">

                      Dropzone.options.imageUpload = {

                        maxFilesize:10,
                        acceptedFiles: ".jpeg,.jpg,.png,.gif",
                        previewTemplate : `<div class="dz-preview dz-file-preview">
                        <div class="dz-image">
                        <img data-dz-thumbnail />
                        </div>
                        <div class="dz-details">
                        <img  src="../images/removebutton.png" style="width:60px;" alt="Click me to remove the file." data-dz-remove />
                        </div>
                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                        <div class="dz-success-mark"><span>✔</span></div>

                        <div class="dz-error-message"><span data-dz-errormessage></span></div>

                        </div>`,
                        init: function() {
                         this.on("success", function(file,response)
                         {
                          console.log('File : ', file);
                          console.log('Response :', response);
                          var updatedResponse=JSON.parse(response);
                          console.log('I got hit');
                          $(file.previewElement).find('img[data-dz-thumbnail]').attr('upload-file-name',updatedResponse.filename);

                          $(file.previewElement).find('img[data-dz-remove]').attr('upload-file-id',updatedResponse.id);

                          if ($('#photo_type').val() == 'interior' ) {
                                       //set the ids of img in hidden inputs
                                       if (parent.document.getElementById('img_ids').value == "") {

                                          //To access the parent directory
                                          parent.document.getElementById('img_ids').value=updatedResponse.id;
                                           
                                            // debugger;
                                          
                                          
                                        }else{
                                           // debugger;
                                           
                                          var storedId=parent.document.getElementById('img_ids').value;


                                          parent.document.getElementById('img_ids').value= storedId+','+updatedResponse.id;
                                        }
                                        var singleImg = $('<div class="imgeWrap" style="float: left; padding-right:5px; padding-bottom:5px;"><a class="deletIMG" onclick="deletIMG(event)" data-value="'+updatedResponse.id+'" data-img="'+updatedResponse.filename+'"><i class="fa fa-times" aria-hidden="true"></i></a><img src="../'+updatedResponse.filename+'" style="width: 150; height: 100;" class="materialboxed"></div>');

                                        parent.$('#hotel_img_wrap').append(singleImg[0]);
                                         parent.$('#hotel_img_wrap').show();

                                       
                                       
                                      }else{


                                     // debugger;
                                     if (parent.document.getElementById('img_extids')) {
                                      if (parent.document.getElementById('img_extids').value == "") {

                                           //To access the parent directory
                                           parent.document.getElementById('img_extids').value=updatedResponse.id;
                                           // parent.document.getElementById('img_name').value=updatedResponse.filename;

                                         }else{

                                           var storedextId=parent.document.getElementById('img_extids').value;

                                           parent.document.getElementById('img_extids').value= storedextId+','+updatedResponse.id;
                                         }
                                         var singleImg = $('<div class="imgeWrap" style="float: left; padding-right:5px; padding-bottom:5px;"><a class="deletIMG" onclick="deletIMG(event)" data-value="'+updatedResponse.id+'" data-img="'+updatedResponse.filename+'"><i class="fa fa-times" aria-hidden="true"></i></a><img src="../'+updatedResponse.filename+'" style="width: 150px; height: 100px;" class="materialboxed"></div>');
                                         parent.$('#hotel_img_exe_wrap').append(singleImg[0]);
                                         parent.$('#hotel_img_exe_wrap').show();
                                       }
                                     }
                                      // debugger;
                                    });
                         this.on("removedfile", function(file){
                          console.log('Removed File : ', file);
                          console.log($(file.previewElement).find('img[upload-file-name]').attr('upload-file-name'));
                          var deleteFile = $(file.previewElement).find('img[upload-file-name]').attr('upload-file-name');
                          var deleteId= $(file.previewElement).find('img[data-dz-remove]').attr('upload-file-id');
                          parent.$('a[data-value='+deleteId+']').parent().remove();
                          
                          $.post("../delete_img.php",{fileName : deleteFile,
                           fileId   : deleteId
                         })
                          .done(function(data){
                           console.log(data);
                         });
                        });
                       }
                     };

                     $(document).ready(function(){
                      $('#image-upload .dz-message span').after('<i>- or -</i><span class="btn-select-image">Select an image from computer</span>')

                    })

                  </script>
                  <style type="text/css">
                  .dropzone{
                    border: 0px solid  ;
                  }
                  .image_drop_element{
                    background-image: url('images/picker_sprite-v107.png');
                    background-position: -60px -490px;
                    width: 74px;
                    height: 86px;
                    background-repeat: no-repeat;
                    margin: 30px auto 10px;
                  }

                  .dz-clickable span {
                    color: #aaa;
                    font-size: 12px;
                    padding: 0 10px;
                    font-family: sans-serif;
                  }

                  .btn-select-image {
                    -webkit-box-shadow: none;
                    -moz-box-shadow: none;
                    box-shadow: none;
                    background-color: #f5f5f5;
                    background-image: -webkit-linear-gradient(top,#f5f5f5,#f1f1f1);
                    background-image: -moz-linear-gradient(top,#f5f5f5,#f1f1f1);
                    background-image: -ms-linear-gradient(top,#f5f5f5,#f1f1f1);
                    background-image: -o-linear-gradient(top,#f5f5f5,#f1f1f1);
                    background-image: linear-gradient(top,#f5f5f5,#f1f1f1);
                    color: #444;
                    border: 1px solid #dcdcdc;
                    border: 1px solid rgba(0,0,0,0.1);
                    -webkit-border-radius: 2px;
                    -moz-border-radius: 2px;
                    border-radius: 2px;
                    cursor: default;
                    font-size: 11px !important;
                    font-weight: bold;
                    text-align: center;
                    white-space: nowrap;
                    margin-right: 16px;
                    height: 27px;
                    line-height: 27px;
                    min-width: 54px;
                    outline: 0;
                    padding: 3px 8px !important;
                  }
                  .dz-message i {
                    display: block;
                    font-style: normal;
                    color: #aaa;
                    font-family: sans-serif;
                    font-size: 16px;
                    margin: 10px 0;
                  }
                  .dropzone .dz-preview.dz-success .dz-progress{
                    opacity: 0;
                    -webkit-transition: opacity 0.4s ease-in;
                    -moz-transition: opacity 0.4s ease-in;
                    -ms-transition: opacity 0.4s ease-in;
                    -o-transition: opacity 0.4s ease-in;
                    transition: opacity 0.4s ease-in;
                  }
                  .dz-message{
                    display: block !important;
                  }
                  .dz-preview.dz-processing.dz-image-preview.dz-success.dz-complete {

                    bottom: 60px;
                  }
                  .dz-preview.dz-error.dz-complete.dz-image-preview {
                   bottom: 60px;
                 }
               </style>
