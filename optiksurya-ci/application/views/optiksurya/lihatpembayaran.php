<?php
session_start();
include 'koneksi.php';
include 'menu.php';
$id_pemesanan = $_GET['id'];
//mengambil data transfer berdasarkan id_pemesanan
$ambil= $koneksi->query("SELECT * FROM transfer LEFT JOIN pemesanan ON transfer.ID_PEMESANAN=pemesanan.ID_PEMESANAN WHERE pemesanan.ID_PEMESANAN='$id_pemesanan'");
$detailbayar= $ambil->fetch_assoc();

echo "<pre>";
print_r($detailbayar);
echo "</pre>";

//jika belum ada data pembayaran
if(empty($detailbayar))
{
	echo "<script>alert('belum ada data pembayaran')</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
//jika data pelanggan yang bayar tidak sesuai dengan yang login
if ($_SESSION["pembeli"]['NIK']!==$detailbayar["NIK"]) {
	echo "<script>alert('anda tidak berhak melihat pembayaran orang lain')</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lihat Pembayaran</title>
	<link rel="stylesheet" type="text-css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
</head>
<body>
<div class="container">
	<h2>Lihat Pembayaran</h2>
	<div class="row">
		<div class="col-md-6">
			<table class="table">
				<tr>
					<th>Nama</th>
					<td><?php echo $detailbayar["NAMA_PENYETOR"]?></td>
				</tr>
				<tr>
					<th>Tanggal</th>
					<td><?php echo $detailbayar["TGL_TRANSFER"]?></td>
				</tr>
				<tr>
					<th>Jumlah</th>
					<td>Rp. <?php echo number_format($detailbayar["JUMLAH_TRANSFER"]) ?></td>
				</tr>
			</table>
		</div>
		<div>
			<img src="buktitransfer/<?php echo $detailbayar["FOTO_BUKTITRANSFER"]?>"s alt="" class="img-responsive">
		</div>
	</div>
</div>
<?php include 'footer.php' ?>
</body>
</html>