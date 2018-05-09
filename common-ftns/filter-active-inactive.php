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