<?php
include '../../common-apis/reg-api.php';
$showB_Query=select('destinations',array('desti_id'=>$_GET['d_id'],'user_id'=>$_GET['id']));
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
  <script src="../../js/jquery.min.js"></script>
  <?php  while ($result=mysqli_fetch_assoc($showB_Query)) {  
    $showBnqImgQuery=select('common_imagevideo',array('desti_id'=>$result['desti_id']));
    ?>

    <title>Detail of <?php echo $result['desti_name']; ?> </title>

    <?php include '../header_inner_folder.php'; ?>

    <div class="db-cent-3">
     <div class="db-cent-table db-com-table">
      <div class="veiw_sus_appr">
       <div class="row" style="margin-top: 20px;">
        <div class="col s11">
          <div class="pull-right sus_appr" style="margin-left: 10px;">
            <a class="waves-effect waves-light btn" href="editDesti.php?d_id=<?php echo $result['desti_id'];  ?>&id=<?php echo $result['user_id']; ?>">Edit</a>
            <?php if ($result['desti_inactive']=="on") { ?>
              <a onclick="active(event)" class="waves-effect waves-light btn active" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['desti_id']; ?>" value="off" tbl-name="destinations" col-name="desti_inactive" id-col="desti_id">Activate</a>
              <a onclick="inactive(event)" class="waves-effect waves-light btn inactive" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['desti_id']; ?>" value="on" style="display: none;" ttbl-name="destinations" col-name="desti_inactive" id-col="desti_id">Deactivate</a>
              <?php }else{ ?>
                <a onclick="inactive(event)" class="waves-effect waves-light btn inactive" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['desti_id']; ?>" value="on" tbl-name="destinations" col-name="desti_inactive" id-col="desti_id">Deactivate</a>
                <a onclick="active(event)" class="waves-effect waves-light btn active" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['desti_id']; ?>" value="off" style="display: none;" tbl-name="destinations" col-name="desti_inactive" id-col="desti_id">Activate</a>

                <?php } ?>
              </div>
            </div>
          </div>
        </div>

        <div class="db-profile"> 
         <img src="" id="cover_photo_common" alt=""> 
         <h4><?php echo $result['desti_name'];  ?> </h4>
       </div>
       <div class="hotelVeiw">
          <input type="hidden" name="desti_id" id="d_Id" value="<?php echo $result['desti_id']; ?>">
         <div class="row">
          <span><b>Destination Name :</b></span>
          <span><?php echo $result['desti_name']."."; ?></span>
        </div>
        <div>
          <span><b>Destination Description :</b></span>
          <div class="listing-desc sp_top">
            <span><?php echo $result['desti_description']; ?></span>
          </div>
        </div> 
      </div>
      <?php } ?>
    </div>

   <div class="imgVeiwinline row common-top" style="padding-left: 15px;">
    <?php while ($imgResult=mysqli_fetch_assoc($showBnqImgQuery)) {

      if (!empty($imgResult['desti_coverimg'])) { ?>
        <div class="row" id="hotel_cover_img" >
          <div class="row int_title" style="clear: both;"><label>Cover Photo :</label></div>

          <div class="imgeWrap" style="float: left; padding-right:5px; padding-bottom:5px;">
            <a class="deletIMG" onclick="deletIMG(event)"  data-value="<?php echo $imgResult['common_imgvideo_id']?>" data-img="<?php echo $imgResult['desti_coverimg'] ?>" ><i class="fa fa-times" aria-hidden="true"></i></a>
            <img src="../<?php echo $imgResult['desti_coverimg']  ?>" style="height: 100px; width: 150px;" class="materialboxed">
          </div>&nbsp;&nbsp;
        </div>
        <script type="text/javascript">
          $(document).ready(function(){

            setTimeout(function(){

              $('#cover_photo_common').attr('src',$('#hotel_cover_img img').attr('src'));
            },2000);

          })

        </script>
        <?php } ?>
        <?php  }?>
       <div class="imgVeiwinline row" id="hotel_img_wrap" style="display: none;">

            <div class="row int_title"><label>Photos :</label></div>

          </div>
      </div>
    </div>
  </div>


  <?php  include"../footer_inner_folder.php";  ?>
<?php include"../../methods/active-inactive_list.php"; ?>
  <script src="../../js/destination-js/images.js"></script>
<script type="text/javascript">
  Materialize.toast('Loading images')
</script>
<style type="text/css">
  a.deletIMG i {
    display: none;
  }
</style>
</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>