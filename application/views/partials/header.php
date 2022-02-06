<!DOCTYPE html>
<html>
<head>
	<title>CI_TESTING</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
<div class="container">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">WebSiteName</a>
			</div>
			<ul class="nav navbar-nav">
			<?php if($this->session->userdata('is_admin')) { ?>
				<li class="active"><a href="<?php echo base_url().'admin'?>">dashboard</a></li>
				<li><a href="<?php echo base_url().'product'?>">Products</a></li>
			<?php } ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php
					if($this->session->userdata('id')) {
				?>
						<li><a href="<?=base_url().'logout'?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				<?php
					}
				?>

			</ul>
		</div>
	</nav>
