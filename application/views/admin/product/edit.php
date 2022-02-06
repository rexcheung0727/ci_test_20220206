<?php
$this->load->view('partials/header');
?>
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Update Task</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="<?php echo base_url('product')?>"> Back</a>
			</div>
		</div>
	</div>
	<form method="post" action="<?php echo base_url('product/update/'.$product->id)?>" enctype="multipart/form-data" >
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Title:</strong>
					<input type="text" name="title" class="form-control" value="<?php echo $product->title; ?>">
					<span class="text-danger"><?php echo form_error('title'); ?></span>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Description:</strong>
					<textarea name="description" class="form-control"><?php  echo $product->description; ?></textarea>
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

<?php
$this->load->view('partials/footer');
?>
