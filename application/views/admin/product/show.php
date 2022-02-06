<?php
$this->load->view('partials/header');
?>

<div class="row">
	<div class="col-md-12">
		<div class="pull-right">
			<a class="btn btn-default" href="<?=base_url('product')?>"> Back </a>
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
			<strong>Description:</strong>
			<?php echo $product->description; ?>
		</div>
	</div>
</div>

<?php
$this->load->view('partials/footer');
?>
