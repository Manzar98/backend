<?php 
function callingAmenity_admin($page){
	include '../../common-sql.php';
	$a_Query='SELECT * From amenities where amenity_page="'.$page.'"';
	$a_sqli=mysqli_query($conn,$a_Query) or die(mysqli_error($conn));

	$m=0;
	$am_Result= "";
	$str_array=[];
	?>   

<?php	while ($am_Result=mysqli_fetch_assoc($a_sqli)) { ?>
	<div class="col s1"></div>
		<div class="col s3">
			<p class="pTAG">
				<input type="checkbox" name="" class="filled-in admin_amenity" id="filled-in-<?php echo $m+1; ?>" value="<?php echo $am_Result['amenity_name']; ?>">
				<label for="filled-in-<?php echo $m+1; ?>" class="amenity_labal" ><?php echo $am_Result['amenity_name']; ?></label>
			</p>
		</div>
    <?php  array_push($str_array, $am_Result['amenity_name']); ?>
		<?php  $m++;}  ?>
      <input type="hidden" name="" id="amenityLst_admin" value="<?php echo implode(',', $str_array); ?>">
      <input type="hidden" name="" id="updatedAmenityLst_admin" value="">
   <?php	}?>