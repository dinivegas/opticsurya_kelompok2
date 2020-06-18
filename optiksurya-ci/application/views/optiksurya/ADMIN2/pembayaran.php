<h2>Pembayaran</h2>
<?php
//include 'koneksi.php';
$id_pemesanan = $_GET['id'];
//mengambil data transfer berdasarkan id_pemesanan
$ambil= $koneksi->query("SELECT * FROM transfer WHERE ID_PEMESANAN='$id_pemesanan'");
$detail= $ambil->fetch_assoc();

echo "<pre>";
print_r($detail);
echo "</pre>";
?>
<div class="row">
	<div class="col-md-6"></div>
	<table class="table">
		<tr>
			<th>Nama</th>
			<td><?php echo $detail['NAMA_PENYETOR']?>;</td>
		</tr>
		<tr>
			<th>Jumlah</th>
			<td>Rp. <?php echo number_format($detail['JUMLAH_TRANSFER'])?>;</td>
		</tr>
		<tr>
			<th>Tanggal</th>
			<td><?php echo $detail['TGL_TRANSFER']?>;</td>
		</tr>
		
	</table>
	<div class="col-md-6">
		<img src="../buktitransfer/<?php echo $detail['FOTO_BUKTITRANSFER'] ?>" alt="" class="img-responsive">
	</div>
</div>

<form method="post">
	<div class="form-group">
		<label>No Resi Pengiriman</label>
		<input type="text" class="form-control" name="resi">
	</div>
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status">
			<option value="">Pilih Status</option>
			<option value="lunas">LUNAS</option>
			<option value="barang dikirim">Barang Dikirim</option>
		</select>
	</div>
	<button class="btn btn-primary" name="proses">Proses</button>
</form>
<?php
if (isset($_POST["proses"])) {
	$resi= $_POST["resi"];
	$status= $_POST["status"];
	$koneksi->query("UPDATE pemesanan SET RESI_PENGIRIMAN='$resi', STATUS_PEMBAYARAN='$status' WHERE ID_PEMESANAN='$id_pemesanan'");
	echo "<script>alert('data pemesanan telah diupdate');</script>";
	echo "<script>location='index.php?halaman=pesanansaya';</script>";
}
