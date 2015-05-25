	<!-- Modal start -->
		<div class="modal fade" id="myModal" tabindex="-1" data-element_id="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">User Modal</h4>
					</div>
					<div class="modal-body">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Edit Profile user</h3>
							</div>
							<div class="panel-body">
								<div class="row">
								   <div class="col-md-3">
									</div>
									<div class="col-md-6">
										<?php echo form_open("set_user");?>
											<input type="hidden" id="id" value="<?php if(isset($user['id'])) echo $user['id']; ?>">
											<div class="row text-center">
												<div class="control-group form-group">
													<?php echo validation_errors(); ?>
												</div>
											</div>
											<div class="control-group form-group">
												<div class="controls">
													<label>Username:</label>
													<input type="text" class="form-control" name="username" id="username" value="<?php if(isset($user['username'])) echo $user['username']; ?>">
												</div>
											</div>
											<div class="control-group form-group">
												<div class="controls">
													<label>Name:</label>
													<input type="text" class="form-control" name="name" id="name" value="<?php if(isset($user['name'])) echo $user['name']; ?>">
												</div>
											</div>
											<div class="control-group form-group">
												<div class="controls">
													<label>Email:</label>
													<input type="email" class="form-control" name="email" id="email" value="<?php if(isset($user['email'])) echo $user['email']; ?>">
												</div>
											</div>
											<div class="control-group form-group">
												<div class="controls">
													<label>Phone number:</label>
													<input type="text" class="form-control" bfh-phone" data-country="US" name="phone_number" id="phone_number" value="<?php if(isset($user['phone_number'])) echo $user['phone_number']; ?>">
												</div>
											</div>
											<div class="control-group form-group">
												<div class="controls">
													<label>Age category:</label>
													<select class="form-control" name="age_category" id="age_category" >
														<?php 
															$id_age_category_sel = 0;
															if(isset($user['id_age_category']))
																$id_age_category_sel = $user['id_age_category'];
															foreach ($age_category as $item) {
																if ($id_age_category_sel == $item['id']) {
																	$option = '<option value="'.$item['id'].'" selected >';
																} else {
																	$option = '<option value="'.$item['id'].'" >';
																}
																$option .= $item['a_category'].'</option>';
																echo $option;
															}
														?>								
													</select>
													<p class="help-block"></p>
												</div>
											</div>
											<div class="control-group form-group">
												<div class="controls">
													<label>Description:</label><br>
													<textarea  class="form-control" rows="5" name="description" id="description"><?php if(isset($user['description'])) echo $user['description']; ?></textarea>
													<p class="help-block"></p>
												</div>
											</div>
											
											<button type="submit" name="updateUser" id= "updateUser" class="btn btn-primary" value="updateUser">Save</button>
										<?php echo form_close();?>
									</div>
									<div class="col-md-3">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- Modal end -->