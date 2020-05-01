<div class="row">
	<div class="col-lg-12">
		<h1>Pesanan Saya <small>Detail Pesanan</small></h1>
		<ol class="breadcrumb">
		<li <a href=""><i class="fa fa-book"></i></a></li>
		<li <a href="">Pesanan Saya</a></li>
		<li class="active">Detail Pesanan</li>
		</ol>
	</div>
</div>
<?php 
$ambil = $koneksi->query ("SELECT * FROM pemesanan JOIN pembeli ON pemesanan.NIK=pembeli.NIK WHERE pemesanan.ID_PEMESANAN='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<div class="row">
				<div class="col-md-3">
				<h3>Pembelian</h3>
				<strong>No.Pemesanan : <?php echo $detail['ID_PEMESANAN']; ?></strong><br>
				Tanggal pemesanan: <?php echo $detail ['TGL_PEMESANAN']; ?> <br>
				Total harga: Rp. <?php echo number_format($detail ['TOTAL_HARGA']); ?>
				</div>
				<div class="col-md-3">
				<h3>Pelanggan</h3>
				<strong><?php echo $detail ['NAMA_PEMBELI'];?></strong><br>
				<?php echo $detail ['NO_TELEPON'] ; ?>
				</div>
				<div class="col-md-3">
				<h3>Pengiriman</h3>
				<strong><?php echo $detail['KOTA'] ?></strong><br>
				Ongkos Kirim: Rp. <?php echo number_format($detail['TARIF']); ?><br>
				Alamat Kirim : <?php echo ($detail['ALAMAT_KIRIM']); ?>
				</div>	
				<div class="col-md-3">
				<h3>Pesanan</h3>
				<strong>Detail Pesanan : </strong><?php echo ($detail['DETAIL_PESANAN']); ?>
				</div>	
			</div>
<table class= "table table-bordered">
	<thead>
		<tr>
			<th><h5><strong>No</strong></h5></th>
			<th><h5><strong>Nama Produk</strong></h5></th>
			<!--<th>nama pembeli</th>-->
			<th><h5><strong>Harga</strong></h5></th>
			<th><h5><strong>Jumlah</strong></h5></th>
			<th><h5><strong>Subtotal</strong></h5></th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
	<?php $ambil = $koneksi-> query ("SELECT * FROM detail_pemesanan JOIN barang ON detail_pemesanan.ID_BARANG = barang.ID_BARANG
	 WHERE detail_pemesanan.ID_PEMESANAN= '$_GET[id]'"); ?>
	<?php 
	while ($pecah =$ambil-> fetch_assoc()){ ?>
	<tr>
		<td><?php echo $nomor;?></td>
		<td><?php echo $pecah['NAMA_BARANG'];?></td>
		<td><?php echo $pecah['HARGA_BARANG'];?></td>
		<td><?php echo $pecah['JUMLAH_BARANG'];?></td>
		<td>
		<?php echo $pecah['HARGA_BARANG'] * $pecah['JUMLAH_BARANG'];?></td>
		
	</tr>
	<?php $nomor++ ?>
	<?php } ?>
		
	</tbody>
</table>