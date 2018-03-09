<?php 

include '../../common-sql.php';

$a_Query='SELECT * From ganeral_amenities where ga_id=1';
         $a_sqli=mysqli_query($conn,$a_Query) or die(mysqli_error($conn));

   while ($am_Result=mysqli_fetch_assoc($a_sqli)) { ?>
   	
      <input type="hidden" name="" id="amenities-input_wrap" value="<?php echo $am_Result['ga_amenities']; ?>">

 <?php  } ?>