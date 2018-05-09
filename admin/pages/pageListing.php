<?php  include '../../common-apis/reg-api.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:57:37 GMT -->
<head>
	<title>List Of Pages</title>
	
	<?php  include '../header_inner_folder.php';
	$p_Query='SELECT * FROM pages where user_id="'.$_GET['id'].'" ORDER BY page_id DESC ';
	$p_resp =mysqli_query($conn,$p_Query)  or die(mysqli_error($conn)); ?>
	
	<div class="db-cent-3">
		<div class="db-cent-table db-com-table">
			<div class="row">
				<div class="db-title col s9">
					<h3><img src="../../images/icon/dbc5.png" alt=""/> List Of Pages</h3>
					<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p> -->
				</div>
			</div>
			<?php if (mysqli_num_rows($p_resp) > 0) { ?>
			<div class="row">
				<div class="col s4 search_flter">
					<select onchange="myFunction(event)" id="yourole"  name="">
						<option value="" selected="" >View all</option>
						<option value="Activated">Activate</option>
						<option value="Deactivated">Deactivate</option>
					</select>
				</div>
				<div class="col s6 search_field">	
					<input  type="text" class="input-field" id="mysearch" onkeyup="myFunction(event)" placeholder="Search">
				</div>
				<div class="search_field_btn">
					<input class="waves-effect waves-light btn" id="inptbtn" type="button"  onclick="myFunction(event)" value="Search"> 
				</div>
			</div>
			<table class="bordered responsive-table" id="h_table">
				<thead>
					<tr>
						<th>Page Name</th>
						<th>Page Alias</th>
						<th>Page URL</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody class="wrap-td">
					<?php  while ($result=mysqli_fetch_assoc($p_resp)) { ?>
					<tr class="tr-1 veiw_sus_appr">
						<td class="td-name capitalize"><?php echo $result['page_name'] ?></td>
						<td class="td-name capitalize"><?php echo $result['page_alias'] ?></td>
						<td class="td-name capitalize"><?php echo $result['page_alias'] ?></td>
						<?php if ($result['page_inactive']=="on") { ?>
						<td class="status_wrap appr"><span class="db-not-success">Deactivated</span></td>
						<?php }else{ ?>
						<td class="status_wrap appr"><span class="db-success">Activated</span></td>
						<?php } ?>
						<td class="tdwrap tdwrap_ads sus_appr">
							<div class="">
								<div class="row">
									<a class="waves-effect waves-light btn" href="editPage.php?p_id=<?php echo $result['page_id'];  ?>&id=<?php echo $result['user_id']; ?>">Edit</a>
									<a class="waves-effect waves-light btn" href="#">Delete</a>
									<?php if ($result['page_inactive']=="on") { ?>
										    <a onclick="active(event)" class="waves-effect waves-light btn active" id="<?php echo $result['user_id']; ?>" p_id="<?php echo $result['page_id']; ?>" value="off">Activate</a>
										    <a onclick="inactive(event)" class="waves-effect waves-light btn inactive" id="<?php echo $result['user_id']; ?>" p_id="<?php echo $result['page_id']; ?>" value="on" style="display: none;">Deactivate</a>
									<?php }else{ ?>
                                            <a onclick="inactive(event)" class="waves-effect waves-light btn inactive" id="<?php echo $result['user_id']; ?>" p_id="<?php echo $result['page_id']; ?>" value="on">Deactivate</a>
                                            <a onclick="active(event)" class="waves-effect waves-light btn active" id="<?php echo $result['user_id']; ?>" p_id="<?php echo $result['page_id']; ?>" value="off" style="display: none;">Activate</a>

									<?php } ?>
								</div>
							</div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php }else{ ?>
			
			<div class="text-center"><span>Sorry! no pages</span></div>
			<div class="row common-top text-center">
				<div class="">
					<a class="waves-effect waves-light btn modal-trigger spc-modal" href="addNewPage.php?user_id=<?php echo $_GET['id']; ?>">Add New Page</a>
				</div>
			</div>
			<?php	}?>
		</div>
	</div>
</div>
<?php include"../footer_inner_folder.php"; ?>
<script type="text/javascript">
	function active(event) {

		var sus=$(event.currentTarget).parents('.veiw_sus_appr');
		var btn=$(event.currentTarget).attr('value');
		var p_id=$(event.currentTarget).attr('p_id');
		var u_id=$(event.currentTarget).attr('id');

		swal({
			title: "Are you sure you want to activate this page?",
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
        			url:"updatePageStatus.php",
        			data:{'btn':btn,'p_id':p_id,'u_id':u_id},
        			success:function(res){

        				var data=JSON.parse(res);

        				if (data.status=="off") {

        					sus.find('.active').hide();
        					sus.find('.inactive').show();
        					sus.find(".appr").html('');
        					sus.find(".appr").html('<span class="db-success">Activated</span>');
        				}
        			}   
        		});
        	}         
        });

	}

	function inactive(event) {

		var sus=$(event.currentTarget).parents('.veiw_sus_appr');
		var btn=$(event.currentTarget).attr('value');
		var p_id=$(event.currentTarget).attr('p_id');
		var u_id=$(event.currentTarget).attr('id');

		swal({
			title: "Are you sure you want to deactivate this page?",
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
        			url:"updatePageStatus.php",
        			data:{'btn':btn,'p_id':p_id,'u_id':u_id},
        			success:function(res){

        				var data=JSON.parse(res);

        				if (data.status=="on") {

        					sus.find('.inactive').hide();
        					sus.find('.active').show();
        					sus.find(".appr").html('');
        					sus.find(".appr").html('<span class="db-not-success">Deactivated</span>');
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
