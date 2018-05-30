<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>Featured Ads</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<?php  include '../header_inner_folder.php'; 
	include"../../common-apis/reg-api.php";?>
	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<?Php 
			function is_formCheck(){
				$reg_hotel=select('hotel',array("user_id"=>$_GET['user_id']));
				$reg_banquet=select('banquet',array("user_id"=>$_GET['user_id']));
				$reg_conference=select('conference',array("user_id"=>$_GET['user_id']));
				$reg_tour=select('tour',array("user_id"=>$_GET['user_id']));
				$reg_event=select('event',array("user_id"=>$_GET['user_id']));
				$is_showForm=false;

				if (mysqli_num_rows($reg_hotel) > 0) {
					$is_showForm=true;
					return $is_showForm;
				}
				if(mysqli_num_rows($reg_banquet) > 0){
					$is_showForm=true;
					return $is_showForm;
				}
				if(mysqli_num_rows($reg_conference) > 0){
					$is_showForm=true;
					return $is_showForm;
				}
				if(mysqli_num_rows($reg_tour) > 0){
					$is_showForm=true;
					return $is_showForm;
				}
				if(mysqli_num_rows($reg_event) > 0){
					$is_showForm=true;
					return $is_showForm;
				}
			}

			if (is_formCheck()) { ?>
				
				<div class="db-title">
					<h3><img src="../../images/icon/dbc5.png" alt=""/> Featured an Ads</h3>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
				</div>

				<div class="db-profile-edit paid-ads">

					<form class="col s12"  data-toggle="validator" id="paid-form" role="form" action="paid-post.php" method="POST" enctype="multipart/form-data">


						<input type="hidden" name="user_id" value="<?php echo $_GET['user_id'];?>" id="user_id"> 
						<input type="hidden" value="<?php echo $_GET['name'];?>" id="v_name"> 
						<input type="hidden" value="<?php echo $_GET['status'];?>" id="status"> 
						<div class="row">
							<div class="col s6">
								<div class="">
									<label>Featured Ad Name</label>
									<input type="text" value="" name="ad_name" class="input-field validate" id="ad_name">
								</div>	
							</div>
							<div class="col s6 common-wrapper comon_dropdown_botom_line is_validate_select" id="select_parent"  >

								<label class="pull-left">Choose a List</label>

								<select   class="" name="select_any" onchange="showlist(this)">
									<option value=""  disabled selected>Select One</option>
									<option value="hotel">Hotels</option>
									<option value="room">Rooms</option>
									<option value="banquet">Banquets</option>
									<option value="conference">Conferences</option>
									<option value="tour">Tours</option>
									<option value="event">Events</option>

								</select> 
							</div>
						</div>	

						<div class="row">
							<div class="col-md-12 common-wrapper comon_dropdown_botom_line is_validate_select"   >
								<div id="list_of_any">

								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-6 common-wrapper comon_dropdown_botom_line is_validate_select" >
								<div id="on_which_page">
									<label class=" pull-left">On which page</label>

									<select   class="" name="on_which_page" onchange="on_which(this)">
										<option value=""  disabled selected>Select One</option>
										<option value="home" >Home Page</option>
										<option value="hotel" >Hotel Page</option>
										<option value="room" >Room Page</option>
										<option value="banquet" >Banquet Page</option>
										<option value="conference" >Conference Page</option>
										<option value="tour" >Tour Page</option>
										<option value="event" >Event Page</option>

									</select> 
								</div>
							</div>
							<div class="col-md-6 common-wrapper comon_dropdown_botom_line is_validate_select" id="no_of_days"  >

								<label class="pull-left">No of days</label>

								<select   class="" name="no_of_days" onchange="n_day()">
									<option value=""  disabled selected>Select One</option>
									<option value="day" >One day</option>
									<option value="week" >One week</option>
									<option value="month" >One month</option>
									<option value="year" >One year</option>


								</select> 
							</div>
						</div>

						<div class="col s12 comon_dropdown_botom_line" id="bid_price">
							<div class="">
								<label class="col s4 pull-left">Bidding Amount</label>
								<input type="number" value="" name="bid_amount" class="input-field validate tooltipped" data-position="top" data-tooltip="Your ranking in the search results depend on your bidding amount; higher the bidding amount, higher will be the ad." id="bid_amount">
							</div>	
						</div>

						<div class="common-top">
							<div class="input-field col s8">
								<input type="button" value="Checkout" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn_paid"> </div>
							</div>
						</form>
					</div>

					<?Php }else{ ?>
						<div class="db-title">
							<h3><img src="../../images/icon/dbc5.png" alt=""/> Featured an Ads</h3>
							<span>
								You do not have anything to feature yet, please add a listing first
							</span>
						</div>

						<?php } ?>
						

					</div>
				</div>
			</div>

			<?php include '../../common-ftns/submitting-modal.php'; ?>
			<?php include '../footer_inner_folder.php'; ?>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
			<script src="../../js/paid-ads-js/ads-admin.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					$('.tooltipped').tooltip();
				});
			</script>

		</body>


		<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
		</html>







