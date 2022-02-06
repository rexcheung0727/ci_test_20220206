<?php
$this->load->view('partials/header');
?>

<div class="row">
	<div class="col-md-12">
		<div class="pull-right">
			<a class="btn btn-default" href="<?=base_url('home')?>"> Back </a>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6">
		<img class="image" src="<?php echo base_url('uploads/').$product->image?>">
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6">
		<div class="form-group">
			<strong>Title:</strong>
			<?php echo $product->title; ?>
		</div>
		<div class="form-group">
			<strong>Status:</strong>
			<?php echo $product->status == 1 ? "Active" : "Disabled"; ?>
		</div>
		<div class="form-group">
			<strong>Description:</strong>
			<?php echo $product->description; ?>
		</div>
	</div>

	<hr><br>

	<!--	------------------------add to list-----------------------------    -->
	<!--
		since after login User can this page, don't need to hide below part (add to list) for unverified user,
		also do not implement the active/disabled user logic here
	-->
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h4>Add to My List</h4>
		<form class="form-inline" action="<?php echo base_url('add-to-list')?>" method="post">
			<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('id') ?>" />
			<input type="hidden" name="product_id" value="<?php echo $product->id ?>">
			<div class="form-group">
				<label for="price">Price</label>
				<input type="text" class="form-control" name="price" id="price" placeholder="" value="<?php echo ($product_list ? $product_list->price : "0") ?>">
				<span class="text-danger"><?php echo form_error('price'); ?></span>
			</div>
			<div class="form-group">
				<label for="qty">QTY</label>
				<input type="text" class="form-control" name="qty" id="qty" placeholder="" value="<?php echo ($product_list ? $product_list->qty : "0") ?>">
				<span class="text-danger"><?php echo form_error('qty'); ?></span>
			</div>
			<button type="submit" class="btn btn-default">Add</button>
		</form>
	</div>
</div>

<?php
$this->load->view('partials/footer');
?>
