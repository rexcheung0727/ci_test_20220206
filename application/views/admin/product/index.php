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
				<th>Status</th>
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
						<?php
							if($product->status == 0) {
								echo "Disabled";
							} else {
								echo "Active";
							}
						?>
					</td>
					<td>
						<form method="DELETE" action="<?php echo base_url('product/delete/'.$product->id);?>">
							<a class="btn btn-sm btn-info" href="<?php echo base_url('product/show/'.$product->id) ?>"> show</a>
							<a class="btn btn-sm btn-primary" href="<?php echo base_url('product/edit/'.$product->id) ?>"> Edit</a>
							<?php
							if($product->status == 0) {
								echo '<a class="btn btn-sm btn-primary" href="'.base_url('product/status/').$product->id.'/enable">Activate</a>';
							} else {
								echo '<a class="btn btn-sm btn-default" href="'.base_url('product/status/').$product->id.'/disable">Deactivate</a>';
							}
							?>
							<button type="submit" class="btn btn-sm btn-danger"> Delete</button>
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
