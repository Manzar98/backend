<?php
include '../../common-apis/reg-api.php';

if (isset($_GET['h_id'])) {
  $showBnqQuery=select('banquet',array('banquet_id'=>$_GET['id'],'hotel_id'=>$_GET['h_id']));
  $hotelQuery=select("hotel",array('hotel_id'=>$_GET['h_id']));

  while ($hotelStatus=mysqli_fetch_assoc($hotelQuery)) { 

    $GLOBALS['h_status']= $hotelStatus['hotel_status']; 
  }  
}else{

 $showBnqQuery=select('banquet',array('banquet_id'=>$_GET['id'],'user_id'=>$_GET['u_id']));
}

$showmsgQuery='SELECT * FROM action_listing WHERE action_listing_id="'.$_GET['id'].'" AND action_listing_type="banquet"';
$showmsgSql=mysqli_query($conn,$showmsgQuery) or die(mysqli_error($conn));
$showmsgResult=mysqli_fetch_assoc($showmsgSql);

?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
  <script src="../../js/jquery.min.js"></script>
  <?php  while ($BnqResult=mysqli_fetch_assoc($showBnqQuery)) {     

    $showBnqImgQuery=select('common_imagevideo',array('banquet_id'=>$BnqResult['banquet_id']));

    $showBnqDateQuery=select('common_bookdates',array('banquet_id'=>$BnqResult['banquet_id']));

    $showBnqMenuQuery=select('common_menupackages',array('banquet_id'=>$BnqResult['banquet_id']));

    ?>

    

    <title>Detail of <?php echo $BnqResult['banquet_name']; ?> </title>


    <?php include '../header_inner_folder.php'; ?>



    <div class="db-cent-3">
     <div class="db-cent-table db-com-table">
       
      <div class="veiw_sus_appr">
       <?php if ($_GET['status']=="Approved" || $_GET['status']=="Pending") { ?>
         <div class="row" style="margin-top: 20px;">
           <div class="col s8">
            <p class="descp" style="line-height: 3;"><?php echo $showmsgResult['action_descprition']; ?></p>
          </div>
          <div class="">

            <div class="pull-right sus_appr" style="margin-left: 10px;">
             <?php if (isset($_GET['h_id'])) { ?>
               
               <?php 
               if ($h_status=="Approved") {
                
                if ($BnqResult['banquet_status']=="Approved") { ?>

                  <a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" >Suspend</a>

                  <a  onclick="show_suspend(event)" h_id="<?php echo $BnqResult['hotel_id'] ?>" u_id="<?php echo $BnqResult['user_id'] ?>" id="<?php echo $BnqResult['banquet_id']; ?>" tbl-name="banquet" col-name="banquet_status" col-name-reason="banquet_sus_reason" id-col="banquet_id" h-col="hotel_id" l-url="banquets/showsingle_banquetrecord.php" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;" veiw="veiw" list-name="<?php echo $BnqResult['banquet_name']; ?>">Suspend</a>

                  <a  onclick="show_approve(event)"  h_id="<?php echo $BnqResult['hotel_id'] ?>" u_id="<?php echo $BnqResult['user_id'] ?>" id="<?php echo $BnqResult['banquet_id']; ?>" tbl-name="banquet" col-name="banquet_status" id-col="banquet_id" h-col="hotel_id" col-name-reason="banquet_sus_reason" l-url="banquets/showsingle_banquetrecord.php" class="approve btn" value="Approved" style="display: none;" veiw="veiw" list-name="<?php echo $BnqResult['banquet_name']; ?>">Approve</a>
                  
                <?php  }else{ ?>

                  <a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" style="display: none;" >Suspend</a>

                  <a  onclick="show_suspend(event)" h_id="<?php echo $BnqResult['hotel_id'] ?>" u_id="<?php echo $BnqResult['user_id'] ?>" id="<?php echo $BnqResult['banquet_id']; ?>" tbl-name="banquet" col-name="banquet_status" col-name-reason="banquet_sus_reason" id-col="banquet_id" h-col="hotel_id" l-url="banquets/showsingle_banquetrecord.php" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;" veiw="veiw" list-name="<?php echo $BnqResult['banquet_name']; ?>">Suspend</a>

                  <a  onclick="show_approve(event)"  h_id="<?php echo $BnqResult['hotel_id'] ?>" u_id="<?php echo $BnqResult['user_id'] ?>" id="<?php echo $BnqResult['banquet_id']; ?>" tbl-name="banquet" col-name="banquet_status" id-col="banquet_id" h-col="hotel_id" col-name-reason="banquet_sus_reason" l-url="banquets/showsingle_banquetrecord.php" class="approve btn" value="Approved" veiw="veiw" list-name="<?php echo $BnqResult['banquet_name']; ?>">Approve</a>
                  
                  
                <?php   } ?>
                
              </div>
              <div class="pull-right" >

                <a class="waves-effect waves-light btn" href="edit_banquet.php?id=<?php echo $BnqResult['banquet_id'];  ?>&h_id=<?php echo  $BnqResult['hotel_id']  ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name'] ?>&user_id=<?php echo $_GET['user_id']; ?>">Edit</a>

              <?php } ?>
            <?php  }else{ ?>
              
              <?php if ($BnqResult['banquet_status']=="Approved") { ?>

                <a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended">Suspend</a>

                <a  onclick="show_suspend(event)" u_id="<?php echo $BnqResult['user_id'] ?>" id="<?php echo $BnqResult['banquet_id']; ?>" tbl-name="banquet" col-name="banquet_status" col-name-reason="banquet_sus_reason" id-col="banquet_id" u-col="user_id" l-url="banquets/showsingle_banquetrecord.php" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;" veiw="veiw" list-name="<?php echo $BnqResult['banquet_name']; ?>">Suspend</a>

                <a  onclick="show_approve(event)"  u_id="<?php echo $BnqResult['user_id'] ?>" id="<?php echo $BnqResult['banquet_id']; ?>" tbl-name="banquet" col-name="banquet_status" id-col="banquet_id" u-col="user_id" col-name-reason="banquet_sus_reason" l-url="banquets/showsingle_banquetrecord.php" class="approve btn" value="Approved" style="display: none;" veiw="veiw" list-name="<?php echo $BnqResult['banquet_name']; ?>">Approve</a>
                
              <?php  }else{ ?>

                <a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" style="display: none;" >Suspend</a>

                <a  onclick="show_suspend(event)" u_id="<?php echo $BnqResult['user_id'] ?>" id="<?php echo $BnqResult['banquet_id']; ?>" tbl-name="banquet" col-name="banquet_status" id-col="banquet_id" u-col="user_id" col-name-reason="banquet_sus_reason" l-url="banquets/showsingle_banquetrecord.php" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;" veiw="veiw" list-name="<?php echo $BnqResult['banquet_name']; ?>">Suspend</a>

                <a  onclick="show_approve(event)"  u_id="<?php echo $BnqResult['user_id'] ?>" id="<?php echo $BnqResult['banquet_id']; ?>" tbl-name="banquet" col-name="banquet_status" col-name-reason="banquet_sus_reason" id-col="banquet_id" u-col="user_id" l-url="banquets/showsingle_banquetrecord.php" class="approve btn" value="Approved" veiw="veiw" list-name="<?php echo $BnqResult['banquet_name']; ?>">Approve</a>
                
                
              <?php   } ?>

              <a class="waves-effect waves-light btn" href="edit_banquet.php?id=<?php echo $BnqResult['banquet_id'];  ?>&u_id=<?php echo  $BnqResult['user_id']  ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name'] ?>&user_id=<?php echo $_GET['user_id']; ?>">Edit</a>
            <?php } ?>
            
          </div>
        </div>
      </div>
    <?php   } ?> 
    <div class="text-center " >
      <span style="margin-left: 10px;">Status:</span>
      <?php if ($BnqResult['banquet_status']=="Approved") { ?>
        
        <span class="appr" style="color: green; "><b><?php echo $BnqResult['banquet_status']; ?></b></span>
        <span class="sus" style="color: red; display: none;"><b>Suspended</b></span>



      <?php   }else if($BnqResult['banquet_status']=="Suspended"){ ?>
        
        <span class="sus" style="color: red;"><b><?php echo $BnqResult['banquet_status']; ?></b></span>
        <span class="appr" style="color: green; display: none;"><b>Approved</b></span>
        
      <?php   }else{ ?>

        <span class="appr" style="color: green;  display: none;"><b>Approved</b></span>
        <span class="sus" style="color: red; display: none;"><b>Suspended</b></span>
        <span class="pend" style="color: red;"><b><?php echo $BnqResult['banquet_status']; ?></b></span>

      <?php } ?>
    </div>
    
  </div>
  <div class="text-center ">
    <span style="padding-right: 7px;">Name:</span>
    <span style="color: green;"><b><?php echo $_GET['name']; ?></b></span>
  </div>
  <div class="db-profile"> 

    <img src="" id="cover_photo_common" alt=""> 
    <h4><?php echo $BnqResult['banquet_name'];  ?> </h4>
    <p><?php  ?></p>
  </div>
  
  <div class="hotelVeiw">
    
   <div class="row">
    <span><b>Banquet Name :</b></span>
    <span><?php echo $BnqResult['banquet_name']."."; ?></span>
  </div>
  <div class="row">
    <span><b>Capacity :</b></span>
    <span><?php echo $BnqResult['banquet_space']."."; ?></span>
  </div>
  <div class="row">
    <span><b>Base Booking Charges :</b></span>
    <span><?php echo $BnqResult['banquet_charges']."."; ?></span>
  </div>

  <div class="db-profile-view">
    <table class="responsive-table profle-forms-reocrds-tbl" >
      <thead>
        
        <tr>
          <th>Capacity</th>
          <th>Base Booking Charges</th>
          <th>Serve Food?</th>
          
        </tr>

      </thead>
      <tbody>

        <tr>
          <td><?php echo $BnqResult['banquet_space']; ?></td>
          <td><?php echo $BnqResult['banquet_charges']; ?></td>
          <td class="capitalize"><?php echo $BnqResult['banquet_serve']; ?></td>
          
        </tr>

      </tbody>
    </table>
  </div> 
  <div class="row sp_top">
    <span><b>Hall Booking Charges :</b></span>
  </div>
  <div>
   <table class="listing-tbl sp_top tbl_social">
     <thead>
      <tr>
       <th>With Aircon?</th>
       <th>With Generator?</th>
       
       
     </tr>
   </thead>
   <tbody>
    <?php if (!empty($BnqResult['banquet_aricon'])) {?>
      <td><?php  echo $BnqResult['banquet_aricon'];  ?></td>
    <?php  }else{ ?>

      <td>N/A</td>

    <?php } ?>
    <?php if (!empty($BnqResult['banquet_generator'])) {?>
      <td><?php  echo $BnqResult['banquet_generator'];  ?></td>
    <?php  }else{ ?>

      <td>N/A</td>

    <?php } ?>
    
  </tbody>
</table>
</div>

<div class="row sp_top">
  <span><b>Serve Food ? :</b></span>
  <span class="capitalize"><?php echo $BnqResult['banquet_serve']."."; ?></span>
</div>



<?php   if ($BnqResult['banquet_serve']=="yes") {?>
  <div class="row">
   <span><b>Menu Packages :</b></span>

 </div>

 <div>
   <table class="listing-tbl sp_top tbl_social">
     <thead>
      <tr>
       <th>Package Name</th>
       <th>Package Price</th>
       <th>Discount Percentage</th>
       <th>Package Items</th>
       
     </tr>
   </thead>
   <?php  while ($menuResult=mysqli_fetch_assoc($showBnqMenuQuery)) { ?>
     <tbody>
       
       <td><?php  echo $menuResult['foodpkg_name'];  ?></td>
       <td><?php  echo $menuResult['foodpkg_price'];  ?></td>
       <td><?php  echo $menuResult['foodpkg_discount'];  ?></td>
       <td><?php  echo $menuResult['foodpkg_item'];  ?></td>
       
     </tbody>
   <?php  } ?>
 </table>
</div>

<?php }   

?>

<div class="row sp_top">
  <span><b>Gathering Type :</b></span>
  <span class="capitalize"><?php echo $BnqResult['banquet_gathering']."."; ?></span>
</div>
<div class="row">
  <span><b>Additional Cost :</b></span>
  <span><?php echo $BnqResult['banquet_adcost']."."; ?></span>
</div>
<?php if (!empty($BnqResult['banquet_offerdiscount'])) { ?>


  <div class="row">
    <span><b>Offer Discount (%) :</b></span>
    <span><?php echo $BnqResult['banquet_offerdiscount']."."; ?></span>
  </div>
  <div class="row">
    <span><b>Expires on :</b></span>
    <span><?php echo $BnqResult['banquet_expireoffer']."."; ?></span>
  </div>
<?php  } ?>
<div>
  <span><b>Room Description :</b></span>
  <div class="listing-desc sp_top">
    <span><?php echo $BnqResult['banquet_descrip']; ?></span>
  </div>
</div>
<div class="sp_top">
  <span><b>Amenities:</b></span>
  <div class="sp_top ">
    <?php $amenity =explode(',', $BnqResult['banquet_other']); ?>


    <?php 
    
    foreach ($amenity as $k => $v) {?>
      
      <div class="amenity_div">
       <span><?php echo $v."<br/>"; ?></span>
     </div>
   <?php  }

   ?>
 </div>
</div>





<div class="row sp_top">
 <span><b>Unavailable in these days :</b></span>

</div>
<div>
 <table class="listing-tbl sp_top tbl_social">
   <thead>
    <tr>
     <th>From</th>
     <th>To</th>
     
   </tr>
 </thead>
 <?php  while ($dateResult=mysqli_fetch_assoc($showBnqDateQuery)) { ?>
   <tbody>
     
     <td><?php  echo $dateResult['book_fromdate'];  ?></td>
     <td><?php  echo $dateResult['book_todate'];  ?></td>
     
   </tbody>
 <?php } ?>
</table>
</div>



<div class="row sp_top">
  <span><b>Independent Hall? :</b></span>
  <span class="capitalize"><?php echo $BnqResult['banquet_independ']."."; ?></span>
</div>

<?php if($BnqResult['banquet_independ']=="yes") { ?>

  <div>
   <table class="listing-tbl sp_top tbl_social">
     <thead>
      <tr>
       <th>Address</th>
       <th>City</th>
       <th>Province</th>
       <th>Phone</th>
       <th>Email</th>
       
       
     </tr>
   </thead>
   <tbody>
     
     <td><?php  echo $BnqResult['banquet_address'];  ?></td>
     <td><?php  echo $BnqResult['banquet_city'];  ?></td>
     <td><?php  echo $BnqResult['banquet_province'];  ?></td>
     <td><?php  echo $BnqResult['banquet_phone'];  ?></td>
     <td><?php  echo $BnqResult['banquet_email'];  ?></td>
     
     
   </tbody>
 </table>
</div>

<?php if (!empty($BnqResult['banquet_fcbok']) || !empty($BnqResult['banquet_twiter']) || !empty($BnqResult['banquet_utube'])) { ?>

  <div>
   <table class="listing-tbl sp_top tbl_social">
     <thead>
      <tr>
       <th>Facebook</th>
       <th>Twitter</th>
       <th>Youtube</th>
       
       
     </tr>
   </thead>
   <tbody>
     
     <td><span class="fb_icon"><i class="fa fa-facebook-official" aria-hidden="true"></i></span><?php  echo $BnqResult['banquet_fcbok'];  ?></td>
     <td><span class="tw_icon"><i class="fa fa-twitter-square" aria-hidden="true"></i></span><?php  echo $BnqResult['banquet_twiter'];  ?></td>
     <td><span class="you_icon"><i class="fa fa-youtube-play" aria-hidden="true"></i></span><?php  echo $BnqResult['banquet_utube'];  ?></td>  
   </tbody>
 </table>
</div>
<?php } ?>





<?php }else{ ?>

  <div class="row sp_top">
    <span><b>Under Which Hotel? :</b></span>
    <span class="capitalize"><?php echo $BnqResult['hotel_name']; ?></span>
  </div>



<?php  } ?>








<?php } ?>

</div>

</div>
<div class="row" style="padding-left: 15px;">
 <span><b>Banquet Images :</b></span>
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

    
    

    <?php   
  }

  ?>
</div>

</div>
</div>





<?php  include"../footer_inner_folder.php";  ?>
<?php include '../../common-ftns/suspend_reason_modal.php'; ?>
<?php  include"../../methods/approve_list.php";  ?>
<?php  include"../../methods/suspend_list.php";  ?>




</body>




<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
</html>