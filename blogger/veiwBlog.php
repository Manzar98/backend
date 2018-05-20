<?php
include '../common-apis/api.php';

$showB_Query=select('blog',array('blog_id'=>$_GET['id'],'user_id'=>$_GET['u_id']));

?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
  <script src="../js/jquery.min.js"></script>
  <?php  while ($B_Result=mysqli_fetch_assoc($showB_Query)) {   ?>

    <title>Detail of <?php echo $B_Result['blog_title']; ?> </title>

    <?php include 'header.php'; ?>

    <div class="db-cent-3">
     <div class="db-cent-table db-com-table">
      <div class="row">
        <div class="pull-right">
         <a class="waves-effect waves-light btn" href="edit_banquet.php?id=<?php echo $B_Result['blog_id'];  ?>&u_id=<?php echo  $B_Result['user_id']  ?>">Edit</a>
       </div>
     </div>
     <div class="db-profile"> 
      <!-- <img src="" id="cover_photo_common" alt="">  -->
      <h4><?php echo $B_Result['blog_title'];  ?> </h4>
    </div>
    <div class="hotelVeiw">

     <div class="row">
      <span><b>Blog Title :</b></span>
      <span><?php echo $B_Result['blog_title']."."; ?></span>
    </div>
    <div class="row">
      <span><b>Blog Alias :</b></span>
      <span><?php echo $B_Result['blog_alias']."."; ?></span>
    </div>
    <div>
      <span><b>Blog Content :</b></span>
      <div class="listing-desc sp_top">
        <span><?php echo $B_Result['blog_content']; ?></span>
      </div>
    </div> 
  </div>

</div>
<div class="row" style="padding-left: 15px;">
 <span><b>Blog Images :</b></span>
</div>
<div class="imgVeiwinline row" id="hotel_img_wrap" style="padding-left: 15px;">

 <?php 

   /* if (!empty($imgResult['common_image'])) {?>
      <div class="imgeWrap" style="float: left; padding-right:5px; padding-bottom:5px;">
        <img src="../<?php echo $imgResult['common_image']  ?>" style="height: 100px; width: 150px;" class="materialboxed">
      </div>&nbsp;&nbsp;
      <script type="text/javascript">
        $(document).ready(function(){

          setTimeout(function(){

            $('#cover_photo_common').attr('src',$('#hotel_img_wrap img').eq(0).attr('src'));
          },2000);

        })

        </script>*/
        ?>

        <?php } ?>

      </div>

    </div>
  </div>
  <?php  include"footer.php";  ?>
</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>