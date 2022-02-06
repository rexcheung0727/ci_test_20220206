<?php
$this->load->view('partials/header');
?>

<div class="row">
	<div class="col-md-12">
		<div class="pull-right">
			<a class="btn btn-success" href="/product/create"> Create </a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
			<tr>
				<th>image</th>
				<th>Title</th>
				<th>Description</th>
				<th width="220px">Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($products as $product) { ?>
				<tr>
					<td style="width:170px"><img src="<?=base_url('uploads/'.$product->image)?>" style="width:150px" /></td>
					<td><?php echo $product->title; ?></td>
					<td><?php echo $product->description; ?></td>
					<td>
						<form method="DELETE" action="<?php echo base_url('product/delete/'.$product->id);?>">
							<a class="btn btn-info" href="<?php echo base_url('product/show/'.$product->id) ?>"> show</a>
							<a class="btn btn-primary" href="<?php echo base_url('product/edit/'.$product->id) ?>"> Edit</a>
							<button type="submit" class="btn btn-danger"> Delete</button>
						</form>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<?php
$this->load->view('partials/footer');
?>
