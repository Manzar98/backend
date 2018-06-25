<div class="row">
	<div class="col s3 search_flter ">						 		 <select onchange="filter_userType(event)" id="user_Type"  name="" class="">
		<option value="-1" selected="" >View all</option>
		<option class="AD_vendors" value="vendor">Vendor</option>
		<option class="AD_bloggers" value="blogger">Blogger</option>
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