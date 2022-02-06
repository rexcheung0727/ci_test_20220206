<!DOCTYPE html>
<html>
<head>
	<title>CI_TESTING</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
<div class="container">

	<br />
	<h3>Welcome to CI_TESTING</h3>
	<br />
	<div class="panel panel-default">
		<div class="panel-heading">Register</div>
		<div class="panel-body">
			<?php
				$this->load->view('partials/message')
			?>
			<form method="post" action="<?php echo base_url(); ?>register/validation">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>" />
					<span class="text-danger"><?php echo form_error('username'); ?></span>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>" />
					<span class="text-danger"><?php echo form_error('email'); ?></span>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" />
					<span class="text-danger"><?php echo form_error('password'); ?></span>
				</div>
				<div class="form-group">
					<input type="submit" name="register" value="Register" class="btn btn-info" />    <a href="<?php echo base_url(); ?>login">back to login</a>
				</div>
			</form>
		</div>
	</div>

</div>
</body>
</html>


