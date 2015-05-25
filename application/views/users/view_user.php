	<div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
				<h1 class="page-header">User profile</h1>
            </div>
        </div>
		<div class="row">
            <div class="col-md-3 voffset-20">
				<div id="editUser">
					<span class="glyphicon glyphicon-edit"></span><strong> Edit user profile</strong>
				</div>
				
			</div>
			<div class="col-md-9"></div>
        </div>
        <!-- Content Row -->
        <div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">User profile</h3>
			</div>
			<div class="panel-body">	
				<div class="row">
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
						<table class="table table-hover">
							<thead>
							</thead>
							<tbody>
								<tr>
									<td style="width:30%">Username :</td>
									<td><?php echo $user['username']; ?></td>
							    </tr>
								<tr>
									<td>Name :</td>
									<td><?php echo $user['name']; ?></td>
							    </tr>
								<tr>
									<td>Email :</td>
									<td><?php echo $user['email']; ?></td>
							    </tr>
								<tr>
									<td>Phone Number :</td>
									<td><?php echo $user['phone_number']; ?></td>
							    </tr>
								<tr>
									<td>Age category :</td>
									<td><?php echo $user['a_category']; ?></td>
							    </tr>
								<tr>
									<td >Description :</td>
									<td><?php echo $user['description']; ?></td>
							    </tr>
									
							</tbody>
						</table>
					</div>
					<div class="col-md-3">
					</div>
				</div>
			</div>
		</div>
        <!-- /.row -->
        <hr>
    </div>
