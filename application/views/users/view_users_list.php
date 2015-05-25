	<div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
				<h1 class="page-header">Users list</h1>
            </div>
        </div>
		<div class="row">
            <div class="col-md-3 voffset-20">
				<div id="addUser"><span class="glyphicon glyphicon-plus"></span><strong> Add User </strong></div>
			</div>
			<div class="col-md-3"></div>
        </div>
		<div class="row voffset-20">
            <div class="col-md-2"></div>
			<div class="col-md-1"><strong>Filter by:</strong></div>
			<div class="col-md-2">
				<div class="filter_element" >Username :</div>
				<input type="text" class="form-control" name="f_username" id="f_username" value=""></div>
			<div class="col-md-2">
				<div class="filter_element">Age category:</div>
				<select class="form-control" name="f_age_category" id="f_age_category" >
					<option value="0"> - SELECT - </option>
					<?php 						
					foreach ($age_category as $item) {
						echo '<option value="'.$item['id'].'">'.$item['a_category'].'</option>';
					}
					?>								
				</select>
			</div>
			<div class="col-md-2">
				<div class="filter_element">User category:</div>
				<select class="form-control" name="f_user_category" id="f_user_category" >
					<option value="0"> - SELECT - </option>
					<?php 
					foreach ($user_category as $item) {
							echo '<option value="'.$item['id'].'" >'.$item['u_category'].'</option>';
					}
					?>								
				</select>
			</div>
			<div class="col-md-2"></div>
        </div>
        <!-- Content Row -->
        <div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Users list</h3>
			</div>
			<div class="panel-body" id="contentUserList" >	
				<table id="usersList" class="table table-hover" data-sort="ASC">
					<thead>
						<tr>
							<th id="order_by" >Username</th>
							<th>Email</th>
							<th>Name</th>
							<th>Phone</th>
							<th>User category</th>
							<th>Age category</th>
						</tr>
					</thead>
					<tbody>
					
						<?php 
							foreach ($users as $user_item) {

								echo '<tr data-toggle="tooltip" data-placement="top" title="'.$user_item['tooltip'].'" class="tr_usr" id="'.$user_item['id'].'" >
										<td>'.$user_item['username'].'</td>
										<td>'.$user_item['email'].'</td>
										<td>'.$user_item['name'].'</td>
										<td>'.$user_item['phone_number'].'</td>
										<td>'.$user_item['u_category'].'</td>
										<td>'.$user_item['a_category'].'</td>
									</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
        <!-- /.row -->
        <hr>
    </div>
