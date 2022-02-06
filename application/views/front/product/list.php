<?php
$this->load->view('partials/header');
?>

<div class="row">
	<?php
		$this->load->view('partials/message');
	?>
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
						<a class="btn btn-sm btn-info" href="<?php echo base_url('product/'.$product->id) ?>"> show</a>
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
