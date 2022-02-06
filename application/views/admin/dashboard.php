<?php
	$this->load->view('partials/header');
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3>Users</h3>
	</div>
	<div class="panel-body">

		<div class="row">
			<div class="col-md-4 col-xs-12">
				All Users <span class="text-primary"><?=$count_all?></span>
			</div>

			<div class="col-md-4 col-xs-12">
				Active & Verified Users <span class="text-primary"><?=$count_active?></span>
			</div>


		</div>
	</div>
</div>
<?php
	$this->load->view('partials/footer');
?>

