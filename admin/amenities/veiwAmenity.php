<?php
include '../../common-apis/reg-api.php';
$showB_Query=select('amenities',array('amenity_id'=>$_GET['a_id'],'user_id'=>$_GET['id']));

$showmsgQuery='SELECT * FROM action_listing WHERE action_listing_id="'.$_GET['a_id'].'" AND action_listing_type="amenities"';
$showmsgSql=mysqli_query($conn,$showmsgQuery) or die(mysqli_error($conn));
$showmsgResult=mysqli_fetch_assoc($showmsgSql);
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
  <script src="../../js/jquery.min.js"></script>
  <?php  while ($result=mysqli_fetch_assoc($showB_Query)) {  
    ?>

    <title>Detail of <?php echo $result['amenity_name']; ?> </title>

    <?php include '../header_inner_folder.php'; ?>

    <div class="db-cent-3">
     <div class="db-cent-table db-com-table">
      <div class="veiw_sus_appr">
       <div class="row" style="margin-top: 20px;">
        <div class="col s7">
          <p class="descp" style="line-height: 3;"><?php echo $showmsgResult['action_descprition']; ?></p>
        </div>
        <div class="">
          <div class="pull-right sus_appr" style="margin-left: 10px;">
            <a class="waves-effect waves-light btn" href="editAmenity.php?a_id=<?php echo $result['amenity_id'];  ?>&id=<?php echo $result['user_id']; ?>&a_name=<?php echo $_GET['a_name']; ?>">Edit</a>
            <?php if ($result['amenity_inactive']=="on") { ?>
              <a onclick="active(event)" class="waves-effect waves-light btn active" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['amenity_id']; ?>" value="off" tbl-name="amenities" col-name="amenity_inactive" id-col="amenity_id">Activate</a>
              <a onclick="inactive(event)" class="waves-effect waves-light btn inactive" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['amenity_id']; ?>" value="on" style="display: none;" ttbl-name="amenities" col-name="amenity_inactive" id-col="amenity_id">Deactivate</a>
            <?php }else{ ?>
              <a onclick="inactive(event)" class="waves-effect waves-light btn inactive" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['amenity_id']; ?>" value="on" tbl-name="amenities" col-name="amenity_inactive" id-col="amenity_id">Deactivate</a>
              <a onclick="active(event)" class="waves-effect waves-light btn active" u_id="<?php echo $result['user_id']; ?>" id="<?php echo $result['amenity_id']; ?>" value="off" style="display: none;" tbl-name="amenities" col-name="amenity_inactive" id-col="amenity_id">Activate</a>

            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <div class="db-profile"> 
     <img src="" id="cover_photo_common" alt=""> 
     <h4><?php echo $result['amenity_name'];  ?> </h4>
   </div>
   <div class="hotelVeiw">
     <div class="row">
      <span><b>Amenity Name :</b></span>
      <span><?php echo $result['amenity_name']."."; ?></span>
    </div>
    <div class="row">
      <span><b>Amenity Page :</b></span>
      <span><?php echo $result['amenity_page']."."; ?></span>
    </div>
    <div>
      <span><b>Amenity Description :</b></span>
      <div class="listing-desc sp_top">
        <span><?php echo $result['amenity_description']; ?></span>
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