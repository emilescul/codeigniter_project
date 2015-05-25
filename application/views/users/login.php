	<div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
				<h1 class="page-header">Login</h1>
            </div>
        </div>
        <!-- Content Row -->
        <div class="row">
           <div class="col-md-3">
			</div>
            <div class="col-md-6">
				<?php echo $this->session->flashdata('msg'); ?>
				<?php echo form_open("login");?>
					
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Username:</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>" >
                            <span class="text-danger"><?php echo form_error('username'); ?></span>
                        </div>
                    </div>
					<div class="control-group form-group">
                        <div class="controls">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <span class="text-danger"><?php echo form_error('password'); ?></span>
                        </div>
                    </div>
					<div class="control-group form-group">
                        <div class="controls">
							<a href="reset">Reset password</a>
                        </div>
                    </div>
					<input id="btn_login" name="btn_login" type="submit" class="btn btn-primary" value="Login" />
				 <?php echo form_close(); ?>
				
			</div>
			<div class="col-md-3">
			</div>
        </div>
        <!-- /.row -->
        <hr>
    </div>
