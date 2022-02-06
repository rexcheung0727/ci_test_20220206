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
				All Users: <span class="text-primary"><?=$count_all?></span>
			</div>

			<div class="col-md-4 col-xs-12">
				Active & Verified Users: <span class="text-primary"><?=$count_active?></span>
			</div>

			<div class="col-md-4 col-xs-12">
				Active Users who have product: <span class="text-primary"><?=$count_active_having_product_list ?></span>
			</div>

		</div>
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3>Products</h3>
	</div>
	<div class="panel-body">

		<div class="row">
			<div class="col-md-4 col-xs-12">
				All Active Products: <span class="text-primary"><?=$count_active_products?></span>
			</div>

			<div class="col-md-4 col-xs-12">
				Active Products not belong to any user: <span class="text-primary"><?=$count_active_products_not_belong_to_any_user?></span>
			</div>

			<div class="col-md-4 col-xs-12">
				Amount of all active attached products <span class="text-primary"><?=$count_attached_active_products?></span>
			</div>

			<div class="col-md-4 col-xs-12">
				Summarized price of all active attached products <span class="text-primary"><?=$total_price_attached_active_products?></span>
			</div>

		</div>
	</div>
</div>
<?php
	$this->load->view('partials/footer');
?>

