<div class="row">
	<div class="col s3 search_flter ">						 		 <select onchange="filter_userType(event)" id="user_Type"  name="" class="">
		<option value="-1" selected="" >View all</option>
		<?php if (($_SESSION['vendors']=="on") || ($_SESSION['listing']=="on")) { ?>
            <option class="" value="vendor">Vendor</option>
		<?php }else if(($_SESSION['bloggers']=="on") || ($_SESSION['blogs']=="on")){ ?>
            <option class="" value="blogger">Blogger</option>
		<?php }else{ ?>
                <option class="" value="vendor">Vendor</option>
                <option class="" value="blogger">Blogger</option>
		<?php } ?>
		
		
	</select>
</div>
<div class="col s3 search_flter">

	<select onchange="myFunction_manage(event)" id="yourole"  name="">
		<option value="" selected="" >View all</option>
		<option value="Approved">Approved</option>
		<option value="Suspended">Suspended</option>
		<option value="Pending">Waiting Approval</option>
	</select>
</div>
<div class="col s4 search_field">	
	<input  type="text" class="input-field" id="mysearch" onkeyup="myFunction(event)" placeholder="Search">
</div>
<div class="search_field_btn">
	<input class="waves-effect waves-light btn" id="inptbtn" type="button"  onclick="myFunction(event)" value="Search"> 
</div>
</div>