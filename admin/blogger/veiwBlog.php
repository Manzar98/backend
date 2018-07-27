<?php
include '../../common-apis/reg-api.php';
$showB_Query=select('blog',array('blog_id'=>$_GET['id'],'user_id'=>$_GET['u_id']));
$showmsgQuery='SELECT * FROM action_listing WHERE action_listing_id="'.$_GET['id'].'" AND action_listing_type="blog"';
$showmsgSql=mysqli_query($conn,$showmsgQuery) or die(mysqli_error($conn));
$showmsgResult=mysqli_fetch_assoc($showmsgSql);
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
  <script src="../../js/jquery.min.js"></script>
  <?php  while ($B_Result=mysqli_fetch_assoc($showB_Query)) {  
    $showBnqImgQuery=select('common_imagevideo',array('blog_id'=>$B_Result['blog_id']));
    ?>

    <title>Detail of <?php echo $B_Result['blog_title']; ?> </title>

    <?php include '../header_inner_folder.php'; ?>

    <div class="db-cent-3">
     <div class="db-cent-table db-com-table">
      <div class="veiw_sus_appr">
       <?php if ($_GET['status']=="Approved" || $_GET['status']=="Pending") { ?>
         <div class="row" style="margin-top: 20px;">
          <div class="col s7">
            <p class="descp" style="line-height: 3;"><?php echo $showmsgResult['action_descprition']; ?></p>
          </div>
          <div class="col s2">
           <?php if (isset($_GET['blog_status']) && $_GET['blog_status']=="Pending") { ?>

            <a class="waves-effect waves-light btn" onclick="approval_request()" value="on" b_id="<?php echo $B_Result['blog_id'];?>" userId="<?php echo $B_Result['user_id'];?>">Inactive Approval</a>
            <input type="hidden" value="<?php echo $B_Result['blog_inactive_reason']; ?>" id="reason_text">
          <?php  } ?>
        </div>
        <div class="col s3">

          <div class="pull-right sus_appr" style="margin-left: 10px;">


            <?php if ($B_Result['blog_status']=="Approved") { ?>

              <a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended">Suspend</a>

              <a  onclick="show_suspend(event)" u_id="<?php echo $B_Result['user_id'] ?>" id="<?php echo $B_Result['blog_id']; ?>" tbl-name="blog" col-name="blog_status" col-name-reason="blog_sus_reason" id-col="blog_id" u-col="user_id" l-url="blogger/veiwBlog.php" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;" veiw="veiw" list-name="<?php echo $B_Result['blog_title']; ?>">Suspend</a>

              <a  onclick="show_approve(event)"  u_id="<?php echo $B_Result['user_id'] ?>" id="<?php echo $B_Result['blog_id']; ?>" tbl-name="blog" col-name="blog_status" id-col="blog_id" u-col="user_id" col-name-reason="blog_sus_reason" l-url="blogger/veiwBlog.php" class="approve btn" value="Approved" style="display: none;" veiw="veiw" list-name="<?php echo $B_Result['blog_title']; ?>">Approve</a>

            <?php  }else{ ?>

              <a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" style="display: none;" >Suspend</a>

              <a  onclick="show_suspend(event)" u_id="<?php echo $B_Result['user_id'] ?>" id="<?php echo $B_Result['blog_id']; ?>" tbl-name="blog" col-name="blog_status" id-col="blog_id" u-col="user_id" col-name-reason="blog_sus_reason" l-url="blog/veiwBlog.php" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;" veiw="veiw" list-name="<?php echo $B_Result['blog_title']; ?>">Suspend</a>

              <a  onclick="show_approve(event)"  u_id="<?php echo $B_Result['user_id'] ?>" id="<?php echo $B_Result['blog_id']; ?>" tbl-name="blog" col-name="blog_status" col-name-reason="blog_sus_reason" id-col="blog_id" u-col="user_id" l-url="blog/veiwBlog.php" class="approve btn" value="Approved" veiw="veiw" list-name="<?php echo $B_Result['blog_title']; ?>">Approve</a>
            <?php   } ?>

            <a class="waves-effect waves-light btn" href="editBlog.php?id=<?php echo $B_Result['blog_id'];  ?>&u_id=<?php echo  $B_Result['user_id']  ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name'] ?>&user_id=<?php echo $_GET['user_id']; ?>">Edit</a>
          </div>
        </div>
      </div>
    <?php } ?>

    
    
    <div class="text-center " >
      <span style="margin-left: 10px;">Status:</span>
      <?php if ($B_Result['blog_status']=="Approved") { ?>

        <span class="appr" style="color: green; "><b><?php echo $B_Result['blog_status']; ?></b></span>
        <span class="sus" style="color: red; display: none;"><b>Suspended</b></span>

      <?php   }else if($B_Result['blog_status']=="Suspended"){ ?>
        <span class="sus" style="color: red;"><b><?php echo $B_Result['blog_status']; ?></b></span>
        <span class="appr" style="color: green; display: none;"><b>Approved</b></span>

      <?php   }else{ ?>

        <span class="appr" style="color: green;  display: none;"><b>Approved</b></span>
        <span class="sus" style="color: red; display: none;"><b>Suspended</b></span>
        <span class="pend" style="color: red;"><b><?php echo $B_Result['blog_status']; ?></b></span>

      <?php } ?>
    </div>

  </div>
  <div class="text-center ">
    <span style="padding-right: 7px;">Name:</span>
    <span style="color: green;"><b><?php echo $_GET['name']; ?></b></span>
  </div>
  <div class="db-profile"> 
   <img src="" id="cover_photo_common" alt=""> 
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
<?php } ?>
</div>
<div class="row" style="padding-left: 15px;">
 <span><b>Blog Images :</b></span>
</div>
<div class="imgVeiwinline row" id="hotel_img_wrap" style="padding-left: 15px;">

  <?php

  while ($imgResult=mysqli_fetch_assoc($showBnqImgQuery)) {


    if (!empty($imgResult['common_image'])) {?>
      <div class="imgeWrap" style="float: left; padding-right:5px; padding-bottom:5px;">
        <img src="../<?php echo $imgResult['common_image']  ?>" style="height: 100px; width: 150px;" class="materialboxed">
      </div>&nbsp;&nbsp;
      <script type="text/javascript">
        $(document).ready(function(){

          setTimeout(function(){

            $('#cover_photo_common').attr('src',$('#hotel_img_wrap img').eq(0).attr('src'));
          },2000);

        })

      </script>
    <?php } ?>
  <?php  }?>
</div>
</div>
</div>


<?php  include"../footer_inner_folder.php";  ?>
<?php include'../../common-ftns/suspend_reason_modal.php'; ?>
<?php  include"../../methods/approve_list.php";  ?>
<?php  include"../../methods/suspend_list.php";  ?>
<script type="text/javascript">
  function approval_request() {

    var action=$(event.currentTarget).attr('value');
    var b_id=$(event.currentTarget).attr('b_id');
    var eve=$(event.currentTarget);
    var u_id=$(event.currentTarget).attr('userId');
    var response=$('#reason_text').val();
    swal({

      title: "Are you sure you want to inactive this blog?",
      text: response,
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
               url:"blogPostUpdate.php",
               data:{'action':action,'blog_id':b_id,'user_id':u_id},
               success:function(data){  
                
                var url=window.location.href;
                var update_split=url.split('&');
                var updateUrl=update_split[0]+'&'+update_split[1]+'&'+update_split[2]+'&'+update_split[3]+'&'+update_split[4];
                console.log(updateUrl);
                window.location.href= updateUrl;
                $(eve).hide();
              }   

            });
           }
         });
    
  }
</script>

</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>