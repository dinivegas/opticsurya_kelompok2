<div class="content-wrapper">
<section class="content-header">
	<h1>
		Edit Produk
		<small>Control Panel</small>
	</h1>
</section>
	<section class="content">
		<?php foreach ($barang as $brg) { ?>

		<form action="<?php echo base_url().'barang/update'; ?>" method="post">
		<div class="form-group">
     		<label>Nama Barang</label>
     		<input type="hidden" name="id_barang" class="form-control" value="<?php echo $brg->id_barang ?>">
     		<input type="text" name="nama_barang" class="form-control" value="<?php echo $brg->nama_barang ?>">
     	</div>
     	<div class="form-group">
     		<label>Harga Barang</label>
     		<input type="text" name="harga" class="form-control" value="<?php echo $brg->harga ?>">
     	</div>
     	<div class="form-group">
     		<label>Stok Barang</label>
     		<input type="text" name="stok" class="form-control" value="<?php echo $brg->stok ?>">
     	</div>
     	<button type="reset" class="btn btn-danger">Reset</button>
     	<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
		<?php } ?>
	</section>
</div>