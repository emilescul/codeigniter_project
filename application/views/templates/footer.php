	   <div class="container">
	   <!-- Footer -->
			<footer>
				<div class="row">
					<div class="col-lg-12">
						<p>Copyright &copy; Your Website 2015</p>
					</div>
				</div>
			</footer>

		</div>
		<!-- /.container -->

		<!-- jQuery Version 1.11.0 -->
		<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.0.js"); ?>"></script>

		<!-- Bootstrap Core JavaScript -->
		<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			var order_by = "ASC";
			
			$("#addUser").click(function(){
				$('#myPanelLabel').text('Add new user');
				$('#username').val('');
				$('#name').val('');
				$('#email').val('');
				$('#password').val('');
				$('#phone_number').val('');
				$('#description').val('');
				$('#myModal').modal('show');
			});
		
			$("#editUser").click(function(){
				$('#myModal').modal('show');
			});	
			
			$('#updateUser').click(function() {
		
				var form_data = {
					csrfmytokenname: $('input[name*="csrfmytokenname"]').val(),
					id_sel : $('#id').val(),
					username: $('#username').val(),
					name: $('#name').val(),
					phone_number: $('#phone_number').val(),
					age_category: $('#age_category').val(),
					email: $('#email').val(),
					description: $('#description').val(),		
				};
				
				$.ajax({
					url: "<?php echo base_url('set_user');?>",
					type: 'POST',
					data: form_data,
					success: function(msg) {
						alert(msg);
						if (msg == 'The user was updated !') {
							$('#myModal').modal('hide');
							var url = "<?php echo base_url('get_user');?>"+"/"+$('#id').val();    
							$(location).attr('href',url);
						}
					}
				});
			
				return false;
			});
		
			$('#submitUser').click(function() {
				var form_data = {
					csrfmytokenname: $('input[name*="csrfmytokenname"]').val(),
					id_sel: $('#id_sel').val(),
					username: $('#username').val(),
					password: $('#password').val(),
					name: $('#name').val(),
					phone_number: $('#phone_number').val(),
					age_category: $('#age_category').val(),
					user_category: $('#user_category').val(),
					email: $('#email').val(),
					description: $('#description').val(),		
				};
				
				$.ajax({
					url: "<?php echo base_url('set_user');?>",
					type: 'POST',
					data: form_data,
					success: function(msg) {
						alert(msg);
						if (msg == 'The user was registered !' || msg == 'The user was updated !') {	
							$('#myModal').modal('hide');
							filter_users();
						}
					}
				});
				return false;
			});
		
			$('#agecategory').click(function() {
				$('#myAgeModal').modal('show');
				return false;
			});
		
			$('#addCategory').click(function() {
				var form_data = {
					csrfmytokenname: $('input[name*="csrfmytokenname"]').val(),
					title: $('#title').val()
				};
				
				$.ajax({
					url: "<?php echo base_url('add_age_category');?>",
					type: 'POST',
					data: form_data,
					success: function(response) {
						if(response == 'It is ok !') {
							$('#ageTable tr:last').after(response);
							alert("The age category was added !");
							$('#myAgeModal').modal('hide');
							var url = "<?php echo base_url('users');?>";    
							$(location).attr('href',url);
						} else{
							alert(response);
						}
					}
				});
				
				return false;
			});
		
			$('.delCategory').click(function() {
				var id = this.id;
				var form_data = {
					csrfmytokenname: $('input[name*="csrfmytokenname"]').val(),
					id_sel: id
				};
				
				$.ajax({
					url: "<?php echo base_url('del_age_category');?>",
					type: 'POST',
					data: form_data,
					success: function(response) {
						if(response == 'The age category was removed') {
							id_row = '#row_'+id;
							$(id_row).remove();
							alert('The age category was removed !');
							$('#myAgeModal').modal('hide');
							var url = "<?php echo base_url('users');?>";    
							$(location).attr('href',url);
						} else {
							alert(response);
						}
					}
				});
				
				return false;
			});
			
			$('#f_user_category').change(function(){
				filter_users();
			});
			
			$('#f_age_category').change(function(){
				filter_users();
			});
			
			 $("#f_username").keyup(function(){
				filter_users();
			});
			
			function  filter_users() {
				$.post("<?php echo base_url('filter_users');?>", {
					csrfmytokenname: $('input[name*="csrfmytokenname"]').val(),
					f_order_by: $("#usersList").data( "sort"),
					f_username: $('#f_username').val(),
					f_age_category: $('#f_age_category').val(),
					f_user_category: $('#f_user_category').val()
				}, function(response) {
					$('#usersList tbody').html(response);
				});
			}
			
			$('#order_by').click(function() {
				
				if($("#usersList").data( "sort") == 'ASC')
					$("#usersList").data( "sort", 'DESC');
				else
					$("#usersList").data( "sort", 'ASC');
					
				filter_users();
			});
			
			
		});
		
		$('.tr_usr').click(function() {
				id = this.id;
				$('#myModalLabel').text('Edit user');
				$('#myPanelLabel').text('Edit user');
				edit_user(id);
			});
		
		function edit_user(id) {
			$('#id_sel').val(id);
			$('#password').text('');
			
			var form_data = {
				id: id 
				};
				
			$.ajax({
				url: "<?php echo base_url('get_user');?>"+"/"+id,
				type: 'POST',
				data: form_data,
				success: function(msg) {
					var str = msg;
					eval("var jsn = "+ str);
					$('#name').val(jsn['name']);
					$('#username').val(jsn['username']);
					$('#email').val(jsn['email']);
					$('#age_category').val(jsn['id_age_category']);
					$('#user_category').val(jsn['id_user_category']);
					$('#phone_number').val(jsn['phone_number']);
					$('#description').val(jsn['description']);
				}
			});
			$('#myModal').modal('show');
			$('#myModalLabel').text('Edit user');
			$('#myPanelLabel').text('Edit user');
		}
	</script>

	</body>
</html>