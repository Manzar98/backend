<?php  include '../common-apis/api.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of Admins</title>
	
	<?php  include 'header.php';
	$d_Query='SELECT * FROM credentials where user_type="admin" ORDER BY user_id DESC ';
	$d_resp =mysqli_query($conn,$d_Query)  or die(mysqli_error($conn)); ?>
	
	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<div class="row">
				<div class="db-title col s9">
					<h3><img src="../images/icon/dbc5.png" alt=""/> List Of Admins</h3>
					<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
				</div>
			</div>

			<div class="row common-top ">
				<div class="featured_btn">
					<a class="waves-effect waves-light btn" href="addNewAdmins.php?id=<?php echo $_GET['id']; ?>">Add New Admin</a>
				</div>
			</div>
			<table class="bordered responsive-table" id="h_table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email Address</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody class="wrap-td">
					<?php  while ($result=mysqli_fetch_assoc($d_resp)) { ?>
						<tr class="tr-1 veiw_sus_appr">
							<td class="td-name capitalize"><?php echo $result['reg_name']; ?></td>
							<td class="td-name capitalize"><?php echo $result['reg_email']; ?></td>
							<?php if ($result['user_status']=="Approved") { ?>

								<td class="status_wrap appr" ><span class="db-success">Activated</span></td>

							<?php }elseif ($result['user_status']=="Suspended") {?>

								<td class="status_wrap appr"><span class="db-not-success">Deactivated</span></td>

							<?php }?>

							<td class="tdwrap sus_appr">
								<div class="buttonsWrap_vendors">
									<div class="row">
										<a class="waves-effect waves-light btn" href="veiwAdmins.php?id=<?php echo $result['user_id'];  ?>&u_type=<?php echo $result['user_type']; ?>">Veiw</a>
										<?php if ($_SESSION['user_type']=="s_admin") { ?>
											<a class="waves-effect waves-light btn" href="editAdmins.php?id=<?php echo $result['user_id'];  ?>&u_type=<?php echo $result['user_type']; ?>">Edit</a>
										<?php } ?>
										<?php if ($result['user_status']=="Approved") { 


											if ($_SESSION['user_id']!=$result['user_id']) { ?>
												<a  href="#susp" u_id="<?php echo $result['user_id'] ?>" class="suspend waves-effect waves-light btn modal-trigger" value="Suspended" >Deactivate</a>
												<a  onclick="show_suspend(event)" u_id="<?php echo $result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility:hidden; position: fixed;" u_type="<?php echo $result['user_type']; ?>">Deactivate</a>

											<?php } ?>

											<a  onclick="show_approve(event)"  u_id="<?php echo $result['user_id'] ?>" class="approve btn" value="Approved" style="display: none;" u_type="<?php echo $result['user_type']; ?>">Activate</a>
										<?php }else{

											if ($_SESSION['user_id']!=$result['user_id']) { ?>


												<a  onclick="show_approve(event)"  u_id="<?php echo $result['user_id'] ?>" u_type="<?php echo $result['user_type']; ?>" class="approve btn" value="Approved" >Activate</a>
											<?php  } ?>

											<a href="#susp"  u_id="<?php echo $result['user_id'] ?>" class="suspend waves-effect waves-light btn modal-trigger" style="display: none;" >Deactivate</a>
											<a  onclick="show_suspend(event)" u_id="<?php echo $result['user_id'] ?>" class=" btn org_susp" value="Suspended" style="visibility: hidden; position: fixed;" u_type="<?php echo $result['user_type']; ?>">Deactivate</a>
										<?php	} ?>
									</div>

								</div>
							</td>

						</tr>
					<?php } ?>
				</tbody>
			</table>

			<?php include '../common-ftns/suspend_reason_modal.php'; ?>
		</div>
	</div>
</div>
<?php include"footer.php"; ?>
<script type="text/javascript">
	var rowValue = "";
	$('#susp').modal({
      	dismissible: false, // Modal can be dismissed by clicking outside of the modal

      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
        // alert("Ready");
        rowValue =trigger.parents('tr');
        console.log(modal, trigger);
        // debugger;
    },
});
	function reason_submit() {

		if ($('#textarea_susp').val()) {

			rowValue.find('.org_susp').trigger('click');
			rowValue.find('.suspend').hide();
			$('#textarea_susp').val('');  
			$('#susp').modal('close');

		}


	}
	function show_suspend(event) {
		// debugger;
		var text_area=$('#textarea_susp').val();
		var sus=$(event.currentTarget).parents('tr');
		var btn=$(event.currentTarget).attr('value');
		var u_id=$(event.currentTarget).attr('u_id');
		var u_type=$(event.currentTarget).attr('u_type');
		$.ajax({

			type:"POST",
			url:"update-user_status.php",
			data:{'btn':btn,'u_id':u_id,'reason':text_area,'u_type':u_type},
			success:function(res){

				var data=JSON.parse(res);

				if (data.status=="Suspended") {

					sus.find(".appr").html('');
					sus.find(".appr").html('<span class="db-not-success">Deactivated</span>');

				}
			}    

		});

		$(event.currentTarget).parents('.sus_appr').find('.approve').show();

	} 

	function show_approve(event) {

		var sus=$(event.currentTarget).parents('tr');
		var btn=$(event.currentTarget).attr('value');
		var u_id=$(event.currentTarget).attr('u_id');
		var u_type=$(event.currentTarget).attr('u_type');


		swal({

			title: "Are you sure you want to approve this user?",

			type: "warning",
            // confirmButtonColor: "#DD6B55",
            showCancelButton: true,
            confirmButtonText: "ok",
            closeOnConfirm: true,
            confirmButtonText: "Yes",
            cancelButtonText: "cancel",
            closeOnConfirm: true,
            closeOnCancel: true
        },function (isconfirm) {

        	if (isconfirm) {


        		$.ajax({

        			type:"POST",
        			url:"update-user_status.php",
        			data:{'btn':btn,'u_id':u_id,'u_type':u_type},
        			success:function(res){

        				var data=JSON.parse(res);

        				if (data.status=="Approved") {

        					sus.find(".appr").html('');
        					sus.find(".appr").html('<span class="db-success">Activated</span>');
        					sus.find('.approve').hide();
        					sus.find('.suspend').show();

        				}
        			}   

        		});


        	}


        });



	}


</script>
</body>
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:50 GMT -->
</html>
