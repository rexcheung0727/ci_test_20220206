<?php
$this->load->view('partials/header');
?>

<br />
<h3>New Product</h3>
<br />
<div class="panel panel-default">
	<div class="panel-heading">New Product
		<div class="pull-right">
			<a class="btn btn-default" href="<?=base_url('product')?>"> Back </a>
		</div>
	</div>
	<div class="panel-body">
		<form method="post" action="<?php echo base_url('product/store')?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Title:</strong>
						<input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>" />
						<span class="text-danger"><?php echo form_error('title'); ?></span>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Description:</strong>
						<textarea name="description" class="form-control" value="<?php echo set_value('description'); ?>"></textarea>
						<span class="text-danger"><?php echo form_error('description'); ?></span>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Image:</strong>
						<input type="file" id="image" name="image" size="33" />
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
$this->load->view('partials/footer');
?>
