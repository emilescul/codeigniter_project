	<div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
				<h1 class="page-header">Reset password</h1>
            </div>
        </div>
        <!-- Content Row -->
        <div class="row">
           <div class="col-md-3">
			</div>
            <div class="col-md-6">
				<div class="row text-center">
					<div class="control-group form-group">
						<?php if(isset($message)) echo $message; ?>
					</div>
				</div>
				<?php echo form_open("reset");?>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="email" id="email" value="" required data-validation-required-message="Please enter your email.">
                            <p class="help-block"></p>
                        </div>
                    </div>
					<input id="btn_login" name="btn_forgot" type="submit" class="btn btn-primary" value="Send" />
				 <?php echo form_close(); ?>
				
			</div>
			<div class="col-md-3">
			</div>
        </div>
        <!-- /.row -->
        <hr>
    </div>
