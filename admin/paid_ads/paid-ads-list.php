<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>List of featured ads</title>
	<?php  include '../header_inner_folder.php'; 

	include '../../common-sql.php';
	$paidQuery=    'SELECT * FROM paid_ads where user_id="'.$_GET['user_id'].'" ORDER BY paid_id DESC ';
          $ads_resp =mysqli_query($conn,$paidQuery)  or die(mysqli_error($conn));


	?>

				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
							
						<div class="db-title">
							<h3><img src="../../images/icon/dbc5.png" alt=""/> <?php echo $_GET['name']; ?> Featured Ads</h3>
							

						</div>

					<?php

								if (mysqli_num_rows($ads_resp) > 0) { ?>	
					
                              <div class="row common-top ">
							<div class="featured_btn">
								
								<a class="waves-effect waves-light btn" href="paid_ads.php?user_id=<?php echo $_GET['user_id']; ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>">Feature an Ad</a>
								
							</div>
						</div>
								 
						<table class="bordered responsive-table" id="h_table">
							<thead>
								<tr>
									<th>Choose a list</th>
									<th>List of</th>
									<th>On which page</th>
									<th>No of days</th>
									<th>Status</th>
									
									
								</tr>
							</thead>
							<tbody class="wrap-td">
								
                                  <?php $i=0; ?>
								
                                <?php   while ($result=mysqli_fetch_assoc($ads_resp)) { ?>

                                   <tr class="">
									<td class="td-name"><?php echo $result['select_any'];   ?></td>
									<td class="text-center"><?php echo $result['list_of_any']; ?></td>
									<td class="text-center"><?php echo $result['on_which_page'];   ?></td>
									<td class="text-center"><?php echo $result['no_of_days'];   ?></td>
									<td class="text-center paly_pause">
 
                                     <?php if ($result['status_play_pause']=="on") { ?>

                                     		<a onclick="show_play()" id="pause_<?php echo $i ?>" p_id="<?php echo $result['paid_id'] ?>" class="pause" value="off"><i class="fa fa-pause" aria-hidden="true" ></i></a>
                                     		<a  onclick="show_pause(event)" id="play_<?php echo $i ?>" p_id="<?php echo $result['paid_id'] ?>" class="play" value="on" style="display: none;"><i class="fa fa-play" aria-hidden="true"></i></a>
                                     	
                                   <?php  }else{ ?>

                                    		<a onclick="show_pause(event)" id="play_<?php echo $i ?>" p_id="<?php echo $result['paid_id'] ?>" class="play" value="on"><i class="fa fa-play" aria-hidden="true"></i></a>
                                    		<a onclick="show_play()" id="pause_<?php echo $i ?>" p_id="<?php echo $result['paid_id'] ?>" class="pause" value="off" style="display: none;"><i class="fa fa-pause" aria-hidden="true" ></i></a>
 
                                   	         
                                 <?php   } ?>
										</td>
										
								 <td class="tdwrap tdwrap_ads">
									<div class="buttonsWrap buttonsWrap_ads">
										<div class="row">
											<a class="waves-effect waves-light btn" href="edit_paid_ad.php?id=<?php echo $_GET['user_id'];  ?>&p_id=<?php echo $result['paid_id'] ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>">Edit</a>
											<a class="waves-effect waves-light btn" href="#">Delete</a>
										</div>
										
									</div>
								</td> 
									
									
								</tr>



            
    <?php    
  // print_r($result);
       $i++;}
        	?>
								
						
							</tbody>
						</table>
						<?php 	}else{ ?>

						   <?php if ($_GET['status']=='Suspended') { ?>

							 	<div class="row">
						        <div class="col s1"></div>
                                <div class="pull-left">
                                 <h3  style="color: red;"><?php echo $_GET['name']; ?> is Suspended<b>!</b></h3>
                                  <div style="padding-left: 5px; width: 635px;">
                                  <span >Listings cannot be added under the suspended users. Approve the user first to add listings under their name.</span>
                                  </div>
                                </div>
							 	
                             </div>

							<?php  }elseif ($_GET['status']=='Pending') { ?>
							
									<h3  style="color: red;"><?php echo $_GET['name']; ?> is Pending<b>!</b></h3>
									  <span>The user’s status is pending; first approve the user to add listings under his name</span>
								
							<?php }else{ ?>

									<div class="text-center"><span><?php echo $_GET['name']; ?> has no featured ads</span></div>
									<div class="row common-top text-center">
										<div class="">

											<a class="waves-effect waves-light btn" href="paid_ads.php?user_id=<?php echo $_GET['user_id']; ?>&name=<?php echo $_GET['name']; ?>&status=<?php echo $_GET['status']; ?>">Feature an Ad</a>

										</div>
									</div>

						<?php	} ?>
 
						

					<?php	}?>
					</div>
				</div>
  </div>

	<?php include'../footer_inner_folder.php'; ?>

<script type="text/javascript">

function show_pause(event) {

	  var btn=$(event.currentTarget).attr('value');
      var p_id=$(event.currentTarget).attr('p_id');
	   $.ajax({
             
             type:"POST",
             url:"paid-ads-update.php",
             data:{'btn':btn,'p_id':p_id},
             success:function(data){
                 
                 console.log(data);
             }    

	   });
	 $(event.currentTarget).hide();
	  
	 $(event.currentTarget).parents('.paly_pause').find('.pause').show();
	 // debugger;
} 

function show_play() {

	var btn=$(event.currentTarget).attr('value');
      var p_id=$(event.currentTarget).attr('p_id');
	   $.ajax({
             
             type:"POST",
             url:"paid-ads-update.php",
             data:{'btn':btn,'p_id':p_id},
             success:function(data){
                 
                 console.log(data);
             }   

	   });
	$(event.currentTarget).hide();
	 
	 $(event.currentTarget).parents('.paly_pause').find('.play').show();
}
</script>
    
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
</html>


	




	