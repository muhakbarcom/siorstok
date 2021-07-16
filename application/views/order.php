<style type="text/css">
	body {
		font-family: Verdana, sans-serif;
		background-color: #bdb76b;
	}
</style>
<div style="background-color: 	#BDB76B">
	<div class="row" style="padding: 10px">
		<div class="col-md-10">
			<table>
				<td style="padding-right:10px">Menu</td>
				<td style="padding-right:10px">:</td>
				<td style="padding-right:10px"><a type="button" class="btn btn-secondary btn-sm" href="<?= base_url('konsumen/order/food'); ?>">
						FOOD
					</a>
				</td>
				<td style="padding-right:10px"><a type="button" class="btn btn-secondary btn-sm" href="<?= base_url('konsumen/order/beverage'); ?>">
						BEVERAGE
					</a>
				</td>
			</table>
		</div>
		<div class="col-md-2">
			<a href="<?= base_url('konsumen/detail_keranjang'); ?>">
				<?php
				$keranjang = 'Keranjang Belanja: ' . $this->cart->total_items() . ' item';
				?>
				<?= $keranjang; ?>
			</a>
		</div>
	</div>
	<!-- <div class="row">
	<div class="col-md-12 shadow bg-white"> -->
	<div class="row ml-2 mb-3 mr-2 mt-3 p-2">
		<?php foreach ($menu as $vmt) : ?>
			<div class="col-md-2 bg-white shadow p-4 m-2">
				<a href="<?= base_url('konsumen/keranjang/') . $vmt->id_menu; ?>">
					<div class=" mx-auto rounded">
						<img src="<?= base_url('/assets/uploads/image/menu/') . $vmt->gambar; ?>" class="img-thumbnail">
						<br><br>
						<p style="font-size: 18px">
							<?php echo $vmt->nama_menu; ?>
							<br>
							<b>
								<?php echo rupiah($vmt->harga_menu); ?>
							</b>
							<br>
							<!-- <p style="font-size: 12px" align="right">
							<?php echo $vmt->deskripsi; ?>
						</p> -->
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
	<!-- </div>
</div> -->
	<div class="row pb-3">
		<a class="btn btn-primary mx-auto" href="<?= base_url('konsumen'); ?>">
			HOME
		</a>
	</div>
	<div class="row">
		<div class="col-md-6">
		</div>
		<div class="col-md-6 text-right">
			<?php echo $pagination ?>
		</div>
	</div>

</div>