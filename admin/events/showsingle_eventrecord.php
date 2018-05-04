<?php
include '../../common-apis/reg-api.php';

if (isset($_GET['h_id'])) {
  $showEventQuery=select('event',array('event_id'=>$_GET['id'],'hotel_id'=>$_GET['h_id']));

  $hotelQuery=select("hotel",array('hotel_id'=>$_GET['h_id']));

  while ($hotelStatus=mysqli_fetch_assoc($hotelQuery)) {

    $GLOBALS['h_status']= $hotelStatus['hotel_status'];
    
  } 

}else{

  $showEventQuery=select('event',array('event_id'=>$_GET['id'],'user_id'=>$_GET['u_id']));
}



?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
  <script src="../../js/jquery.min.js"></script>
  <?php  while ($EventResult=mysqli_fetch_assoc($showEventQuery)) { 

     // print_r($EventResult) ;   

    $showEventImgQuery=select('common_imagevideo',array('event_id'=>$EventResult['event_id']));

    $showdiscountQuery=select('common_nosofpeople',array('event_id'=>$EventResult['event_id']));
    




    ?>



    <title>Detail of <?php echo $EventResult['event_name']; ?> </title>


    <?php include '../header_inner_folder.php'; ?>



    <div class="db-cent-3">
     <div class="db-cent-table db-com-table">

      <div class="veiw_sus_appr">
       <?php if ($_GET['status']=="Approved" || $_GET['status']=="Pending") { ?>
       <div class="row" style="margin-top: 20px;">
        <div class="col s11">
          
          <div class="pull-right sus_appr" style="margin-left: 10px;">
           <?php if (isset($_GET['h_id'])) { 

             if ($h_status=="Approved") { ?>
             <?php if ($EventResult['event_status']=="Approved") { ?>

             <a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended">Suspend</a>

             <a  onclick="show_suspend(event)" h_id="<?php echo $EventResult['hotel_id'] ?>" u_id="<?php echo $EventResult['user_id'] ?>" id="<?php echo $EventResult['event_id']; ?>" tbl-name="event" col-name="event_status" col-name-reason="event_sus_reason" id-col="event_id" h-col="hotel_id" l-url="events/showsingle_eventrecord.php" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;" veiw="veiw" list-name="<?php echo $EventResult['event_name']; ?>">Suspend</a>

             <a  onclick="show_approve(event)"  h_id="<?php echo $EventResult['hotel_id'] ?>" u_id="<?php echo $EventResult['user_id'] ?>" id="<?php echo $EventResult['event_id']; ?>" tbl-name="event" col-name="event_status" id-col="event_id" h-col="hotel_id" col-name-reason="event_sus_reason" l-url="events/showsingle_eventrecord.php" class="approve btn" value="Approved" style="display: none;" veiw="veiw" list-name="<?php echo $EventResult['event_name']; ?>">Approve</a>
             
             <?php  }else{ ?>

             <a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" style="display: none;" >Suspend</a>

             <a  onclick="show_suspend(event)" h_id="<?php echo $EventResult['hotel_id'] ?>" u_id="<?php echo $EventResult['user_id'] ?>" id="<?php echo $EventResult['event_id']; ?>" tbl-name="event" col-name="event_status" col-name-reason="event_sus_reason" id-col="event_id" h-col="hotel_id" l-url="events/showsingle_eventrecord.php" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;" veiw="veiw" list-name="<?php echo $EventResult['event_name']; ?>">Suspend</a>

             <a  onclick="show_approve(event)"  h_id="<?php echo $EventResult['hotel_id'] ?>" u_id="<?php echo $EventResult['user_id'] ?>" id="<?php echo $EventResult['event_id']; ?>" tbl-name="event" col-name="event_status" id-col="event_id" h-col="hotel_id" col-name-reason="event_sus_reason" l-url="events/showsingle_eventrecord.php" class="approve btn" value="Approved" veiw="veiw" list-name="<?php echo $EventResult['event_name']; ?>">Approve</a>
             
             
             <?php   } ?>
             
           </div>
           <div class="pull-right" >

            <a class="waves-effect waves-light btn" href="edit_event.php?id=<?php echo $EventResult['event_id'];  ?>&h_id=<?php echo $EventResult['hotel_id']; ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name'] ?>&user_id=<?php echo $_GET['user_id']; ?>">Edit</a> 
            <?php } ?>
            <?php  }else{ ?>

            <?php if ($EventResult['event_status']=="Approved") { ?>

            <a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended">Suspend</a>

            <a  onclick="show_suspend(event)" u_id="<?php echo $EventResult['user_id'] ?>" id="<?php echo $EventResult['event_id']; ?>" tbl-name="event" col-name="event_status" col-name-reason="event_sus_reason" id-col="event_id" u-col="user_id" l-url="events/showsingle_eventrecord.php" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;" veiw="veiw" list-name="<?php echo $EventResult['event_name']; ?>">Suspend</a>

            <a  onclick="show_approve(event)"  u_id="<?php echo $EventResult['user_id'] ?>" id="<?php echo $EventResult['event_id']; ?>" tbl-name="event" col-name="event_status" id-col="event_id" u-col="user_id" col-name-reason="event_sus_reason" l-url="events/showsingle_eventrecord.php" class="approve btn" value="Approved" style="display: none;" veiw="veiw" list-name="<?php echo $EventResult['event_name']; ?>">Approve</a>
            
            <?php  }else{ ?>

            <a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" style="display: none;"  >Suspend</a>

            <a  onclick="show_suspend(event)" u_id="<?php echo $EventResult['user_id'] ?>" id="<?php echo $EventResult['event_id']; ?>" tbl-name="event" col-name="event_status" id-col="event_id" u-col="user_id" col-name-reason="event_sus_reason" l-url="events/showsingle_eventrecord.php" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;" veiw="veiw" list-name="<?php echo $EventResult['event_name']; ?>">Suspend</a>

            <a  onclick="show_approve(event)"  u_id="<?php echo $EventResult['user_id'] ?>" id="<?php echo $EventResult['event_id']; ?>" tbl-name="event" col-name="event_status" col-name-reason="event_sus_reason" id-col="event_id" u-col="user_id" l-url="events/showsingle_eventrecord.php" class="approve btn" value="Approved" veiw="veiw" list-name="<?php echo $EventResult['event_name']; ?>">Approve</a>
            
            
            <?php   } ?>

            <a class="waves-effect waves-light btn" href="edit_event.php?id=<?php echo $EventResult['event_id'];  ?>&u_id=<?php echo  $EventResult['user_id'];  ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name'] ?>&user_id=<?php echo $_GET['user_id']; ?>">Edit</a>
            <?php } ?>
            
          </div>
        </div>
      </div>
      <?php   } ?> 
      <div class="text-center " >
        <span style="margin-left: 10px;">Status:</span>
        <?php if ($EventResult['event_status']=="Approved") { ?>
        
        <span class="appr" style="color: green; "><b><?php echo $EventResult['event_status']; ?></b></span>
        <span class="sus" style="color: red; display: none;"><b>Suspended</b></span>

        <?php   }else if($EventResult['event_status']=="Suspended"){ ?>
        
        <span class="sus" style="color: red;"><b><?php echo $EventResult['event_status']; ?></b></span>
        <span class="appr" style="color: green; display: none;"><b>Approved</b></span>
        
        <?php   }else{ ?>
        
        <span class="appr" style="color: green;  display: none;"><b>Approved</b></span>
        <span class="sus" style="color: red; display: none;"><b>Suspended</b></span>
        <span class="pend" style="color: red;"><b><?php echo $EventResult['event_status']; ?></b></span>

        <?php  } ?>
      </div>
      
    </div>

    
    <div class="text-center ">
      <span style="padding-right: 7px;">Name:</span>
      <span style="color: green;"><b><?php echo $_GET['name']; ?></b></span>
    </div>
    <div class="db-profile"> 

      <img src="" id="cover_photo_common" alt="">
      <h4><?php echo $EventResult['event_name'];  ?> </h4>
      <p><?php echo $EventResult['event_venue']; ?></p>
    </div>

    <div class="hotelVeiw">

     <div class="row">
      <span><b>Event Name :</b></span>
      <span><?php echo $EventResult['event_name']."."; ?></span>
    </div>
    <div class="row">
      <span><b>Event Venue :</b></span>
      <span><?php echo $EventResult['event_venue']."."; ?></span>
    </div>
    <div class="row">
      <span><b>Event Recurrence ? :</b></span>
      <span><?php echo $EventResult['event_recurrence']."."; ?></span>
    </div>
    <div class="db-profile-view">
      <table class="responsive-table profle-forms-reocrds-tbl" >
        <thead>

          <tr>
            <th>Venue</th>
            <th>Entry Fee</th>
            <th>Serve Food?</th>

          </tr>

        </thead>
        <tbody>

          <tr>
            <td><?php echo $EventResult['event_venue']; ?></td>
            <td><?php echo $EventResult['event_entry']; ?></td>
            <td class="capitalize"><?php echo $EventResult['event_serve']; ?></td>

          </tr>

        </tbody>
      </table>
    </div>     
    <div class="sp_top">
      <span><b>Event Description :</b></span>
      <div class="listing-desc sp_top">
        <span><?php echo $EventResult['event_descrip']; ?></span>
      </div>
    </div>

    <div class="row sp_top">
      <span><b>Entry Fee ? :</b></span>
      <span class="capitalize"><?php echo $EventResult['event_entry']."."; ?></span>
    </div>
    <?php if ($EventResult['event_entry']=='yes') { ?>
    <div class="row">
      <span><b>Fee:</b></span>
      <span><?php echo $EventResult['event_entryfee']."."; ?></span>
    </div>
    <?php  } ?>
    
    
    <div class="row child-allow">
      <span><b>Children Allowed? :</b></span>

      <span><?php echo $EventResult['event_childallow']."."; ?></span>
    </div>
    <?php if ($EventResult['event_childallow']=='yes') { ?>

    <div>
     <table class="listing-tbl sp_top tbl_social">
       <thead>
        <tr>
         <th>Charges For Children</th>
         <th>Under 5 allowed?</th>
         <th>Price/Free</th>
         
       </tr>
     </thead>
     
     <tbody>
       
       <td><?php  echo $EventResult['event_halftikchild'];  ?></td>
       <td class="capitalize"><?php  echo $EventResult['event_undr5allow'];  ?></td>
       <?php if ($EventResult['event_undr5allow']=="yes") { ?>
       
       
       <?php if (!empty($EventResult['event_undr5price'])) { ?>
       <td><?php  echo $EventResult['event_undr5price'];  ?></td>
       
       <?php  }else{ ?>

       
       <td>Free</td>

       <?php  } ?>
       <?php   }else{ ?>

       <td>N/A</td>

       <?php  } ?>
       
       
     </tbody>
     
   </table>
 </div>
 

 <?php } ?>
 
 
 <div class="row sp_top">
   <span><b>Discount for groups :</b></span>

 </div>

 <div>
   <table class="listing-tbl sp_top tbl_social">
     <thead>
      <tr>
       <th>Number of People</th>
       <th>Discount (Percentage)</th>
       
     </tr>
   </thead>
   <?php  while ($discountResult=mysqli_fetch_assoc($showdiscountQuery)) { ?>
   <tbody>

    <td><?php  echo $discountResult['common_nopeople'];  ?></td>
    <td><?php  echo $discountResult['common_discount'];  ?></td>
    
  </tbody>
  <?php } ?>
</table>
</div>


<div class="row sp_top">
  <span><b>Pickup Offered ? :</b></span>
  <span class="capitalize"><?php echo $EventResult['event_pikoffer'].".";  ?></span>
</div>
<?php if ($EventResult['event_pikoffer']=="yes") { ?>


<div class="row">
  <span><b>Charges From :</b></span>
</div>
<div>
 <table class="listing-tbl sp_top tbl_social">
   <thead>
    <tr>
     <th>Airport</th>
     <th>Bus Terminal</th>
     <th>Specific Location</th>
     
   </tr>
 </thead>
 
 <tbody>
   <?php if (!empty($EventResult['event_pikair'])) { ?>
   <td><?php  echo $EventResult['event_pikair'];  ?></td>
   <?php }else{ ?>
   <td>N/A</td>
   <?php  } ?>
   <?php if (!empty($EventResult['event_pikbus'])) { ?>
   <td><?php  echo $EventResult['event_pikbus'];  ?></td>
   <?php }else{ ?>
   <td>N/A</td>
   <?php  } ?>
   <?php if (!empty($EventResult['event_pikspecific'])) { ?>
   <td><?php  echo $EventResult['event_pikspecific'];  ?></td>
   <?php }else{ ?>
   <td>N/A</td>
   <?php  } ?>
   
   
   
 </tbody>
 
</table>
</div>

<?php  } ?>


<div class="row sp_top">
  <span><b>Drop off Offered ? :</b></span>
  <span class="capitalize"><?php echo $EventResult['event_drpoffer'].".";  ?></span>
</div>

<?php if ($EventResult['event_drpoffer']=='yes') { ?>
<div class="row">
  <span><b>Charges From :</b></span>
</div>
<div>
 <table class="listing-tbl sp_top tbl_social">
   <thead>
    <tr>
     <th>Airport</th>
     <th>Bus Terminal</th>
     <th>Specific Location</th>
     
   </tr>
 </thead>
 
 <tbody>
   <?php if (!empty($EventResult['event_drpair'])) { ?>
   <td><?php  echo $EventResult['event_drpair'];  ?></td>
   <?php }else{ ?>
   <td>N/A</td>
   <?php  } ?>
   <?php if (!empty($EventResult['event_drpbus'])) { ?>
   <td><?php  echo $EventResult['event_drpbus'];  ?></td>
   <?php }else{ ?>
   <td>N/A</td>
   <?php  } ?>
   <?php if (!empty($EventResult['event_drpspecific'])) { ?>
   <td><?php  echo $EventResult['event_drpspecific'];  ?></td>
   <?php }else{ ?>
   <td>N/A</td>
   <?php  } ?>
   
   
   
 </tbody>
 
</table>
</div>
<?php } ?>





<?php } ?>

</div>



</div>
<div class="row" style="padding-left: 15px;">
 <span><b>Event Images :</b></span>
</div>
<div class="imgVeiwinline row" id="hotel_img_wrap" style="padding-left: 15px;">

  <?php
  
  while ($imgResult=mysqli_fetch_assoc($showEventImgQuery)) {

   
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