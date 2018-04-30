<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
<head>
	<title>Featured Ads</title>
  <?php  include '../header_inner_folder.php'; 

    include '../../common-apis/reg-api.php';

   $edit_ad=select('paid_ads',array('user_id'=>$_GET['id'],'paid_id'=>$_GET['p_id']));
   
     while ($result=mysqli_fetch_assoc($edit_ad)) {
     	# code...
    
  ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
					<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="../../images/icon/dbc5.png" alt=""/> Featured an Ads</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						 
                         <div class="db-profile-edit paid-ads">
					
                   <form class="col s12"  data-toggle="validator" id="paid-form" role="form" action="paid-post.php" method="POST" enctype="multipart/form-data">


                       <input type="hidden" name="user_id" value="<?php echo $_GET['id'];?>" id="user_id"> 
                       <input type="hidden" value="<?php echo $_GET['name'];?>" id="v_name"> 
                       <input type="hidden" value="<?php echo $_GET['status'];?>" id="status"> 
                       <input type="hidden" value="<?php echo $result['paid_id'];?>" id="paid_id"> 
                       <div class="row">
                       	 <div class="col s6">
							<div class="">
								<label>Featured Ad Name</label>
								<input type="text" name="ad_name" class="input-field validate" id="ad_name" value="<?php echo $result['ad_name']; ?>">
							</div>	
						 </div>
					   <div class="col s6 common-wrapper comon_dropdown_botom_line is_validate_select" id="select_parent"  >

							<label class="pull-left">Choose a list</label>
							  <input type="hidden" name=choose_list value="<?php echo $result['select_any'] ?>" id="choose">
							 <select   class="" name="select_any" id="choose_list" onchange="showlist(this)">
							<?php if ($result['select_any']=="hotel") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="hotel" selected>Hotels</option>
								<option value="room">Rooms</option>
								<option value="banquet">Banquets</option>
								<option value="conference">Conferences</option>
								<option value="tour">Tours</option>
								<option value="event">Events</option>
									
						<?php 	}elseif ($result['select_any']=="room") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="hotel">Hotels</option>
								<option value="room" selected>Rooms</option>
								<option value="banquet">Banquets</option>
								<option value="conference">Conferences</option>
								<option value="tour">Tours</option>
								<option value="event">Events</option>
								
						<?php   }elseif ($result['select_any']=="banquet") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="hotel">Hotels</option>
								<option value="room">Rooms</option>
								<option value="banquet" selected>Banquets</option>
								<option value="conference">Conferences</option>
								<option value="tour">Tours</option>
								<option value="event">Events</option>
								
						<?php   }elseif ($result['select_any']=="conference") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="hotel">Hotels</option>
								<option value="room">Rooms</option>
								<option value="banquet">Banquets</option>
								<option value="conference" selected>Conferences</option>
								<option value="tour">Tours</option>
								<option value="event">Events</option>
								
						<?php   }elseif ($result['select_any']=="tour") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="hotel">Hotels</option>
								<option value="room">Rooms</option>
								<option value="banquet">Banquets</option>
								<option value="conference">Conferences</option>
								<option value="tour" selected>Tours</option>
								<option value="event" >Events</option>
								
						<?php   }elseif ($result['select_any']=="event") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="hotel">Hotels</option>
								<option value="room">Rooms</option>
								<option value="banquet">Banquets</option>
								<option value="conference">Conferences</option>
								<option value="tour">Tours</option>
								<option value="event" selected>Events</option>
							
						<?php   }else { ?>
							    <option value=""  disabled selected>Select One</option>
								<option value="hotel">Hotels</option>
								<option value="room">Rooms</option>
								<option value="banquet">Banquets</option>
								<option value="conference">Conferences</option>
								<option value="tour">Tours</option>
								<option value="event">Events</option>

						<?php   } ?> 	
							
							</select> 
						</div>

						</div>
                     
                     <div class="row">
                     	<input type="hidden" name="list" id="list-of" value="<?php echo $result['list_of_any'] ?>">
						<div class="col-md-12 common-wrapper comon_dropdown_botom_line is_validate_select"   >
                         <div id="list_of_any">
					 
						</div>
                       </div>
						
						</div>
						<div class="row">
                        <div class="col s6 common-wrapper comon_dropdown_botom_line is_validate_select" >
                         <div id="on_which_page">
							<label class=" pull-left">On which page</label>
							
							 <select   class="" id="w_page" name="on_which_page" onchange="on_which(this)"> 
					    <?php if($result['on_which_page']=="home"){?>

                                <option value=""  disabled >Select One</option>
								<option value="home" selected>Home Page</option>
								<option value="hotel" >Hotel Page</option>
								<option value="room" >Room Page</option>
								<option value="banquet" >Banquet Page</option>
								<option value="conference" >Conference Page</option>
								<option value="tour" >Tour Page</option>
								<option value="event" >Event Page</option>

                        <?php }elseif ($result['on_which_page']=="hotel") { ?>

							   <option value=""  disabled >Select One</option>
								<option value="home" >Home Page</option>
								<option value="hotel" selected>Hotel Page</option>
								<option value="room" >Room Page</option>
								<option value="banquet" >Banquet Page</option>
								<option value="conference" >Conference Page</option>
								<option value="tour" >Tour Page</option>
								<option value="event" >Event Page</option>
									
						<?php 	}elseif ($result['on_which_page']=="room") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="home" >Home Page</option>
								<option value="hotel" >Hotel Page</option>
								<option value="room" selected>Room Page</option>
								<option value="banquet" >Banquet Page</option>
								<option value="conference" >Conference Page</option>
								<option value="tour" >Tour Page</option>
								<option value="event" >Event Page</option>
								
						<?php   }elseif ($result['on_which_page']=="banquet") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="home" >Home Page</option>
								<option value="hotel" >Hotel Page</option>
								<option value="room" >Room Page</option>
								<option value="banquet" selected>Banquet Page</option>
								<option value="conference" >Conference Page</option>
								<option value="tour" >Tour Page</option>
								<option value="event" >Event Page</option>
								
						<?php   }elseif ($result['on_which_page']=="conference") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="home" >Home Page</option>
								<option value="hotel" >Hotel Page</option>
								<option value="room" >Room Page</option>
								<option value="banquet" >Banquet Page</option>
								<option value="conference" selected>Conference Page</option>
								<option value="tour" >Tour Page</option>
								<option value="event">Event Page</option>
								
						<?php   }elseif ($result['on_which_page']=="tour") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="home" >Home Page</option>
								<option value="hotel" >Hotel Page</option>
								<option value="room" >Room Page</option>
								<option value="banquet" >Banquet Page</option>
								<option value="conference" >Conference Page</option>
								<option value="tour" selected>Tour Page</option>
								<option value="event" >Event Page</option>
								
						<?php   }elseif ($result['on_which_page']=="event") { ?>

							    <option value=""  disabled >Select One</option>
								<option value="home" >Home Page</option>
								<option value="hotel" >Hotel Page</option>
								<option value="room" >Room Page</option>
								<option value="banquet" >Banquet Page</option>
								<option value="conference" >Conference Page</option>
								<option value="tour" >Tour Page</option>
								<option value="event" selected>Event Page</option>
							
						<?php   }else { ?>
							    <option value=""  disabled selected>Select One</option>
								<option value="home" >Home Page</option>
								<option value="hotel" >Hotel Page</option>
								<option value="room" >Room Page</option>
								<option value="banquet" >Banquet Page</option>
								<option value="conference" >Conference Page</option>
								<option value="tour" >Tour Page</option>
								<option value="event" >Event Page</option>

						<?php   } ?> 	

								

							</select> 
						</div>
						</div>

						<div class="col-md-6 common-wrapper comon_dropdown_botom_line is_validate_select" id="no_of_days"  >

							<label class="pull-left">No of days</label>
							
							 <select   class="" name="no_of_days" id="no_of_d">
							 	<?php if ($result['no_of_days']=="day") {?>

									    <option value=""  disabled >Select One</option>
										<option value="day" selected>One day</option>
										<option value="week" >One week</option>
										<option value="month" >One month</option>
										<option value="year" >One year</option>

							 	<?php }elseif ($result['no_of_days']=="week") {?>

							 		    <option value=""  disabled >Select One</option>
										<option value="day" >One day</option>
										<option value="week" selected>One week</option>
										<option value="month" >One month</option>
										<option value="year" >One year</option>

							 	<?php }elseif ($result['no_of_days']=="month") {?>

							 		    <option value=""  disabled >Select One</option>
										<option value="day" >One day</option>
										<option value="week" >One week</option>
										<option value="month" selected>One month</option>
										<option value="year" >One year</option>

							 	<?php }elseif ($result['no_of_days']=="year") {?>

							 		    <option value=""  disabled >Select One</option>
										<option value="day" >One day</option>
										<option value="week" >One week</option>
										<option value="month" >One month</option>
										<option value="year" selected>One year</option>

							 	<?php }else{?>

							 		    <option value=""  disabled selected>Select One</option>
										<option value="day" >One day</option>
										<option value="week" >One week</option>
										<option value="month" >One month</option>
										<option value="year" >One year</option>

							 	<?php } ?> 
								
								

							</select> 
						</div>
					</div>

					<div class="col s12 comon_dropdown_botom_line" id="bid_price">
							<div class="">
								<label class="col s4 pull-left">Bidding Amount</label>
								<input type="number" name="bid_amount" class="input-field validate tooltipped" data-position="top" data-tooltip="Your ranking in the search results depend on your bidding amount; higher the bidding amount, higher will be the ad." id="bid_amount" value="<?php echo $result['bid_amount']; ?>">
							</div>	
						</div>
                         <div class="common-top">
							<div class="input-field col s8">
								<input type="button" value="Checkout" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn_paid_edit"> </div>
						</div>
						</form>
				</div>
			
			</div>
      </div>
      <?php  } ?>
  </div>

<?php include '../../common-ftns/submitting-modal.php'; ?>
<?php include '../footer_inner_folder.php'; ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="../../js/paid-ads-js/ads-admin.js"></script>
<script type="text/javascript">
	
	if (($('#choose_list :selected').text()=="Hotels") || ($('#choose_list :selected').text()=="Rooms") || ($('#choose_list :selected').text()=="Banquets") || ($('#choose_list :selected').text()=="Conferences") || ($('#choose_list :selected').text()=="Tours") || ($('#choose_list :selected').text()=="Events")) {
        
       $('#list_of_any').show();
	}
  if (($('#w_page :selected').text()=="Home") || ($('#w_page :selected').text()=="Hotel Page") || ($('#w_page :selected').text()=="Room Page") || ($('#w_page :selected').text()=="Banquet Page") || ($('#w_page :selected').text()=="Conference Page") || ($('#w_page :selected').text()=="Tour Page") || ($('#w_page :selected').text()=="Event Page")) {

       $('#no_of_days').show();
       
	}

	 if (($('#no_of_d :selected').text()=="One day") || ($('#no_of_d :selected').text()=="One week") || ($('#no_of_d :selected').text()=="One month") || ($('#no_of_d :selected').text()=="One year")) {

       $('#bid_price').show();
       
	}


	
	$(document).ready(function(){

        var stored_tbl_name= $('#choose').val();
        var stored_id=$('#user_id').val();
      
		    $.ajax({

       type:"GET",
       url:'get_list.php',
       data:{"tbl_name":stored_tbl_name,"user_id":stored_id},
       success:function(res){
           var data= JSON.parse(res);
           console.log(data);
        // debugger;
        var   dropdown='<label class="pull-left lbl-list">List of '+stored_tbl_name+'</label>'
              dropdown+='<select name="list_of_any" id="List_any" onchange="list_of(this)" >'
              dropdown+='<option  disabled selected>Select One</option>'
           $.each(data,function(k,val){
             
                dropdown+='<option value='+val.name+'>'+val.name+'</option>';

           });
           dropdown+='</select>';
            document.getElementById('list_of_any').innerHTML=dropdown;
            // $('#List_any').material_select();
            $("#List_any").select2({
                    placeholder: "Select a list",
                    allowClear: true
             });
            $('[name=list_of_any]').val($('#list-of').val()).change();
            
       }
    })

     
	})
</script>
<script type="text/javascript">
	 $(document).ready(function(){
    $('.tooltipped').tooltip();
  });
</script>


   
 

    
</body>


<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/db-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 10:03:00 GMT -->
</html>


	




	