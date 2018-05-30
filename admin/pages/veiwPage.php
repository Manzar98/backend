<?php
include '../../common-apis/reg-api.php';
$showB_Query=select('pages',array('page_id'=>$_GET['p_id'],'user_id'=>$_GET['id']));
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
  <script src="../../js/jquery.min.js"></script>
  <?php  while ($result=mysqli_fetch_assoc($showB_Query)) {  
    ?>

    <title>Detail of <?php echo $result['page_name']; ?> </title>

    <?php include '../header_inner_folder.php'; ?>

    <div class="db-cent-3">
     <div class="db-cent-table db-com-table">
      <div class="veiw_sus_appr">
       <div class="row" style="margin-top: 20px;">
        <div class="col s11">
          <div class="pull-right sus_appr" style="margin-left: 10px;">
            <a class="waves-effect waves-light btn" href="editPage.php?p_id=<?php echo $result['page_id'];  ?>&id=<?php echo $result['user_id']; ?>">Edit</a>
            <?php if ($result['page_inactive']=="on") { ?>
              <a onclick="active(event)" class="waves-effect waves-light btn active" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['page_id']; ?>" value="off" tbl-name="pages" col-name="page_inactive" id-col="page_id">Activate</a>
              <a onclick="inactive(event)" class="waves-effect waves-light btn inactive" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['page_id']; ?>" value="on" style="display: none;" ttbl-name="pages" col-name="page_inactive" id-col="page_id">Deactivate</a>
              <?php }else{ ?>
                <a onclick="inactive(event)" class="waves-effect waves-light btn inactive" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['page_id']; ?>" value="on" tbl-name="pages" col-name="page_inactive" id-col="page_id">Deactivate</a>
                <a onclick="active(event)" class="waves-effect waves-light btn active" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['page_id']; ?>" value="off" style="display: none;" tbl-name="pages" col-name="page_inactive" id-col="page_id">Activate</a>

                <?php } ?>
              </div>
            </div>
          </div>
        </div>

        <div class="db-profile"> 
         <img src="" id="cover_photo_common" alt=""> 
         <h4><?php echo $result['page_name'];  ?> </h4>
       </div>
       <div class="hotelVeiw">
         <div class="row">
          <span><b>Page Name :</b></span>
          <span><?php echo $result['page_name']."."; ?></span>
        </div>
        <div class="row">
          <span><b>Page Alias :</b></span>
          <span><?php echo $result['page_alias']."."; ?></span>
        </div>
        <div class="row">
          <span><b>Page Meta Data :</b></span>
          <span><?php echo $result['page_metadata']."."; ?></span>
        </div>
        <div class="row">
          <span><b>Page Keywords :</b></span>
          <span><?php echo $result['page_metakeyword']."."; ?></span>
        </div>
        <div>
          <span><b>Page Content :</b></span>
          <div class="listing-desc sp_top">
            <span><?php echo $result['page_content']; ?></span>
          </div>
        </div> 
      </div>
      <?php } ?>
    </div>
</div>
</div>
  <?php  include"../footer_inner_folder.php";  ?>
<?php include"../../methods/active-inactive_list.php"; ?>
</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>