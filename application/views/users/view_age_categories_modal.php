	<!-- Modal start -->
		<div class="modal fade" id="myAgeModal" tabindex="-1" data-element_id="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Age categories Modal</h4>
					</div>
					<div class="modal-body">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Add/Remove category</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-3">
									</div>
									<div class="col-md-6">
				
										<table id="ageTable" class="table table-hover">
											<thead>
											</thead>
											<tbody>
												<?php
													foreach ($age_category as $item) {
														echo '<tr id="row_'.$item['id'].'">
																 <td>'.$item['a_category'].'</td>
																 <td><a id="'.$item['id'].'" class="delCategory glyphicon glyphicon-remove" href="#" </a></td>
															  </tr>';
													}
												?>
											</tbody>
										</table>
										<?php echo form_open("set_user");?>
								
											<div class="control-group form-group">
												<div class="controls">
													<label>Title category:</label>
													<input type="text" class="form-control" name="title" id="title" value="">
												</div>
											</div>
											<button type="submit" name="addCategory" id= "addCategory" class="btn btn-primary" value="addCategory">Add category</button>
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