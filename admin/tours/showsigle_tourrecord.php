<?php
include '../../common-apis/reg-api.php';

if (isset($_GET['h_id'])) {

 $showTourQuery=select('tour',array('tour_id'=>$_GET['id'],'hotel_id'=>$_GET['h_id']));

 $hotelQuery=select("hotel",array('hotel_id'=>$_GET['h_id']));

 while ($hotelStatus=mysqli_fetch_assoc($hotelQuery)) {

  $GLOBALS['h_status']= $hotelStatus['hotel_status'];
  
} 
}else{

 $showTourQuery=select('tour',array('tour_id'=>$_GET['id'],'user_id'=>$_GET['u_id']));
}


?>




<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:01:35 GMT -->
<head>
  <script src="../../js/jquery.min.js"></script>
  <?php  while ($TourResult=mysqli_fetch_assoc($showTourQuery)) { 

     // print_r($TourResult) ;   

    $showTourImgQuery=select('common_imagevideo',array('tour_id'=>$TourResult['tour_id']));

    $showdiscountQuery=select('common_nosofpeople',array('tour_id'=>$TourResult['tour_id']));





    ?>

    

    <title>Detail of <?php echo $TourResult['tour_name']; ?> </title>


    <?php include '../header_inner_folder.php'; ?>



    <div class="db-cent-3">
     <div class="db-cent-table db-com-table">
      <div class="veiw_sus_appr">
       <?php if ($_GET['status']=="Approved" || $_GET['status']=="Pending") { ?>
       <div class="row" style="margin-top: 20px;">
        <div class="col s11">
          
          <div class="pull-right sus_appr" style="margin-left: 10px;">
           <?php if (isset($_GET['h_id'])) { 

            if ($h_status=="Approved") {?>
            <?php if ($TourResult['tour_status']=="Approved") { ?>

            <a  href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" >Suspend</a>

            <a  onclick="show_suspend(event)" h_id="<?php echo $TourResult['hotel_id'] ?>" u_id="<?php echo $TourResult['user_id'] ?>" id="<?php echo $TourResult['tour_id']; ?>" tbl-name="tour" col-name="tour_status" col-name-reason="tour_sus_reason" id-col="tour_id" h-col="hotel_id" l-url="tours/showsigle_tourrecord.php" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;" veiw="veiw" list-name="<?php echo $TourResult['tour_name']; ?>">Suspend</a>

            <a  onclick="show_approve(event)"  h_id="<?php echo $TourResult['hotel_id'] ?>" u_id="<?php echo $TourResult['user_id'] ?>" id="<?php echo $TourResult['tour_id']; ?>" tbl-name="tour" col-name="tour_status" id-col="tour_id" h-col="hotel_id" col-name-reason="tour_sus_reason" l-url="tours/showsigle_tourrecord.php" class="approve btn" value="Approved" style="display: none;" veiw="veiw" list-name="<?php echo $TourResult['tour_name']; ?>">Approve</a>
            
            <?php  }else{ ?>

            <a href="#susp"  class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" style="display: none;">Suspend</a>

            <a  onclick="show_suspend(event)" h_id="<?php echo $TourResult['hotel_id'] ?>" u_id="<?php echo $TourResult['user_id'] ?>" id="<?php echo $TourResult['tour_id']; ?>" tbl-name="tour" col-name="tour_status" col-name-reason="tour_sus_reason" id-col="tour_id" h-col="hotel_id" l-url="tours/showsigle_tourrecord.php" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;" veiw="veiw" list-name="<?php echo $TourResult['tour_name']; ?>">Suspend</a>

            <a  onclick="show_approve(event)"  h_id="<?php echo $TourResult['hotel_id'] ?>" u_id="<?php echo $TourResult['user_id'] ?>" id="<?php echo $TourResult['tour_id']; ?>" tbl-name="tour" col-name="tour_status" id-col="tour_id" h-col="hotel_id" col-name-reason="tour_sus_reason" l-url="tours/showsigle_tourrecord.php" class="approve btn" value="Approved" veiw="veiw" list-name="<?php echo $TourResult['tour_name']; ?>">Approve</a>
            
            
            <?php   } ?>
            
          </div>
          <div class="pull-right" >

           <a class="waves-effect waves-light btn" href="edit_tour.php?id=<?php echo $TourResult['tour_id'];  ?>&h_id=<?php echo  $TourResult['hotel_id'] ; ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name'] ?>&user_id=<?php echo $_GET['user_id']; ?>">Edit</a>
           <?php } ?>
           <?php  }else{ ?>

           <?php if ($TourResult['tour_status']=="Approved") { ?>

           <a  href="#susp"  class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" >Suspend</a>

           <a  onclick="show_suspend(event)" u_id="<?php echo $TourResult['user_id'] ?>" id="<?php echo $TourResult['tour_id']; ?>" tbl-name="tour" col-name="tour_status" col-name-reason="tour_sus_reason" id-col="tour_id" u-col="user_id" l-url="tours/showsigle_tourrecord.php" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;" veiw="veiw" list-name="<?php echo $TourResult['tour_name']; ?>">Suspend</a>

           <a  onclick="show_approve(event)"  u_id="<?php echo $TourResult['user_id'] ?>" id="<?php echo $TourResult['tour_id']; ?>" tbl-name="tour" col-name="tour_status" id-col="tour_id" u-col="user_id" col-name-reason="tour_sus_reason" l-url="tours/showsigle_tourrecord.php" class="approve btn" value="Approved" style="display: none;" veiw="veiw" list-name="<?php echo $TourResult['tour_name']; ?>">Approve</a>
           
           <?php  }else{ ?>

           <a href="#susp" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" style="display: none;">Suspend</a>

           <a  onclick="show_suspend(event)" u_id="<?php echo $TourResult['user_id'] ?>" id="<?php echo $TourResult['tour_id']; ?>" tbl-name="tour" col-name="tour_status" id-col="tour_id" u-col="user_id" col-name-reason="tour_sus_reason" l-url="tours/showsigle_tourrecord.php" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;" veiw="veiw" list-name="<?php echo $TourResult['tour_name']; ?>">Suspend</a>

           <a  onclick="show_approve(event)"  u_id="<?php echo $TourResult['user_id'] ?>" id="<?php echo $TourResult['tour_id']; ?>" tbl-name="tour" col-name="tour_status" col-name-reason="tour_sus_reason" id-col="tour_id" u-col="user_id" l-url="tours/showsigle_tourrecord.php" class="approve btn" value="Approved" veiw="veiw" list-name="<?php echo $TourResult['tour_name']; ?>">Approve</a>
           
           
           <?php   } ?>

           <a class="waves-effect waves-light btn" href="edit_tour.php?id=<?php echo $TourResult['tour_id'];  ?>&u_id=<?php echo  $TourResult['user_id'] ; ?>&status=<?php echo $_GET['status'] ?>&name=<?php echo $_GET['name'] ?>&user_id=<?php echo $_GET['user_id']; ?>">Edit</a>
           <?php } ?>
           
         </div>
       </div>
     </div>
     <?php   } ?> 
     <div class="text-center " >
      <span style="margin-left: 10px;">Status:</span>
      <?php if ($TourResult['tour_status']=="Approved") { ?>
      
      <span class="appr" style="color: green; "><b><?php echo $TourResult['tour_status']; ?></b></span>
      <span class="sus" style="color: red; display: none;"><b>Suspended</b></span>



      <?php   }else if($TourResult['tour_status']=="Suspended"){ ?>
      
      <span class="sus" style="color: red;"><b><?php echo $TourResult['tour_status']; ?></b></span>
      <span class="appr" style="color: green; display: none;"><b>Approved</b></span>
      


      <?php   }else{ ?>
      
      <span class="appr" style="color: green;  display: none;"><b>Approved</b></span>
      <span class="sus" style="color: red; display: none;"><b>Suspended</b></span>
      <span class="pend" style="color: red;"><b><?php echo $TourResult['tour_status']; ?></b></span>

      <?php  } ?>
    </div>
    
  </div>

  <div class="text-center ">
    <span style="padding-right: 7px;">Name:</span>
    <span style="color: green;"><b><?php echo $_GET['name']; ?></b></span>
  </div>
  <div class="db-profile"> 

    <img src="" id="cover_photo_common" alt="">
    <h4><?php echo $TourResult['tour_name'];  ?> </h4>
    <p><?php echo $TourResult['tour_destinationname']; ?></p>
  </div>
  
  <div class="hotelVeiw">
    
   <div class="row">
    <span><b>Package Name :</b></span>
    <span><?php echo $TourResult['tour_name']."."; ?></span>
  </div>
  <div class="row">
    <span><b>Name of Destinations :</b></span>
    <span><?php echo $TourResult['tour_destinationname']."."; ?></span>
  </div>
  <div class="row">
    <span><b>Food Included ? :</b></span>
    <span class="capitalize"><?php echo $TourResult['tour_foodinclude']."."; ?></span>
  </div>
  <?php if ($TourResult['tour_foodinclude']=='yes') { ?>

  <div>
    <table class="listing-tbl sp_top tbl_social">
      <thead>
       <tr>
         <th>Breakfast</th>
         <th>Lunch</th>
         <th>Dinner</th> 
       </tr>
     </thead>
     
     <tbody>
       <?php if ($TourResult['tour_brkfast']=="on") {?>

       <td>Yes</td>
       <?php  }else{ ?>

       <td>No</td>
       <?php  } ?>
       <?php if ($TourResult['tour_lunch']=="on") {?>

       <td>Yes</td>
       <?php  }else{ ?>

       <td>No</td>
       <?php  } ?>
       <?php if ($TourResult['tour_dinner']=="on") {?>

       <td>Yes</td>
       <?php  }else{ ?>

       <td>No</td>
       <?php  } ?>

     </tbody>
     
   </table>
 </div>

 <?php } ?>


 <div class="row sp_top">
  <span><b>Drink Included ? :</b></span>
  <span class="capitalize"><?php echo $TourResult['tour_drink']."."; ?></span>
</div>
<?php if ($TourResult['tour_drink']=='yes') { ?>

<div>
  <table class="listing-tbl sp_top tbl_social">
    <thead>
     <tr>
       <th>Alcoholic</th>
       <th>Non Alcoholic</th>
       
     </tr>
   </thead>
   
   <tbody>
     <?php if ($TourResult['tour_aloholic']=="on") {?>

     <td>Yes</td>
     <?php  }else{ ?>

     <td>No</td>
     <?php  } ?>
     <?php if ($TourResult['tour_nonaloholic']=="on") {?>

     <td>Yes</td>
     <?php  }else{ ?>

     <td>No</td>
     <?php  } ?>
     
   </tbody>
   
 </table>
</div>

<?php    }  ?>


<div class="row sp_top">
  <span><b>Entry tickets included in the package price? :</b></span>
  <span class="capitalize"><?php echo $TourResult['tour_entrytik']."."; ?></span>
</div>
<div>
  <table class="listing-tbl sp_top tbl_social">
    <thead>
     <tr>
       <th>No of days</th>
       <th>No of nights</th>
       <th>Hotel star</th>
       <th>Camping</th>
       <th>Camping days</th>
       
     </tr>
   </thead>
   
   <tbody>
    <td><?php echo $TourResult['tour_stayday']; ?></td>
    <td><?php echo $TourResult['tour_stayni8']; ?></td>
    <td><?php echo $TourResult['tour_hotelstr']; ?></td>
    
    <?php if (!empty($TourResult['tour_camping'])) {?>
    <td>Yes</td>
    <td><?php echo $TourResult['tour_campday']; ?></td>
    <?php }else{ ?>
    <td>No</td>
    <td>N/A</td>
    <?php } ?>
    

    
  </tbody>
  
</table>
</div>
<div class="sp_top">
  <span><b>Whole travel plan of the package :</b></span>
  <div class="listing-desc sp_top">
    <span><?php echo $TourResult['tour_plan']; ?></span>
  </div>
</div>
<div class="row sp_top">
  <span><b>Package Price :</b></span>
  <span><?php echo $TourResult['tour_pkgprice']."."; ?></span>
</div>
<div class="sp_top">
  <table class="listing-tbl sp_top tbl_social">
    <thead>
     <tr>
       <th>Departure Date</th>
       <th>Departure Time</th>
       <th>Arrival Date</th>
       <th>Arrival Time</th> 
     </tr>
   </thead>
   <tbody>
    <td><?php echo $TourResult['tour_depdate']; ?></td>
    <td><?php echo $TourResult['tour_deptime']; ?></td>
    <td><?php echo $TourResult['tour_arrdate']; ?></td>
    <td><?php echo $TourResult['tour_arrtime']; ?></td>  
  </tbody>
  
</table>
</div>

<div class="row child-allow sp_top">
  <span><b>Children Allowed? :</b></span>

  <span class="capitalize"><?php echo $TourResult['tour_childallow']."."; ?></span>
</div>
<?php if ($TourResult['tour_childallow']=='yes') { ?>

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
   
   <td><?php  echo $TourResult['tour_halftikchild'];  ?></td>
   <td class="capitalize"><?php  echo $TourResult['tour_undr5allow'];  ?></td>
   <?php if ($TourResult['tour_undr5allow']=="yes") { ?>
   
   
   <?php if (!empty($TourResult['tour_undr5price'])) { ?>
   <td><?php  echo $TourResult['tour_undr5price'];  ?></td>
   
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
  <span><b>Trip starts from (Location’s Name) :</b></span>
  <span><?php echo $TourResult['tour_strtloc'].".";  ?></span>
</div>

<div>
 <table class="listing-tbl sp_top tbl_social">
   <thead>
    <tr>
     <th>Number of people</th>
     <th>Number of bags allowed per person</th>
     <th>Charges for per bag extra</th>
     
   </tr>
 </thead>
 <tbody>
  <td><?php echo $TourResult['tour_capacitypeople']; ?></td>
  <td><?php echo $TourResult['tour_nosofbag']; ?></td>
  <td><?php echo $TourResult['tour_extrachrbag']; ?></td>
</tbody>

</table>
</div>

<div class="row sp_top">
  <span><b>Pickup Offered ? :</b></span>
  <span class="capitalize"><?php echo $TourResult['tour_pikoffer'].".";  ?></span>
</div>
<?php if ($TourResult['tour_pikoffer']=="yes") { ?>


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
   <?php if (!empty($TourResult['tour_pikair'])) { ?>
   <td><?php  echo $TourResult['tour_pikair'];  ?></td>
   <?php }else{ ?>
   <td>N/A</td>
   <?php  } ?>
   <?php if (!empty($TourResult['tour_pikbus'])) { ?>
   <td><?php  echo $TourResult['tour_pikbus'];  ?></td>
   <?php }else{ ?>
   <td>N/A</td>
   <?php  } ?>
   <?php if (!empty($TourResult['tour_pikspecific'])) { ?>
   <td><?php  echo $TourResult['tour_pikspecific'];  ?></td>
   <?php }else{ ?>
   <td>N/A</td>
   <?php  } ?>
   
   
   
 </tbody>
 
</table>
</div>

<?php  } ?>

<div class="row sp_top">
  <span><b>Drop off Offered ? :</b></span>
  <span class="capitalize"><?php echo $TourResult['tour_drpoffer'].".";  ?></span>
</div>

<?php if ($TourResult['tour_drpoffer']=='yes') { ?>
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
   <?php if (!empty($TourResult['tour_drpair'])) { ?>
   <td><?php  echo $TourResult['tour_drpair'];  ?></td>
   <?php }else{ ?>
   <td>N/A</td>
   <?php  } ?>
   <?php if (!empty($TourResult['tour_drpbus'])) { ?>
   <td><?php  echo $TourResult['tour_drpbus'];  ?></td>
   <?php }else{ ?>
   <td>N/A</td>
   <?php  } ?>
   <?php if (!empty($TourResult['tour_drpspecific'])) { ?>
   <td><?php  echo $TourResult['tour_drpspecific'];  ?></td>
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
 <span><b>Tour Images :</b></span>
</div>
<div class="imgVeiwinline row" id="hotel_img_wrap" style="padding-left: 15px;">

  <?php
  
  while ($imgResult=mysqli_fetch_assoc($showTourImgQuery)) {

   
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