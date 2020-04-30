<?php
session_start();
include 'koneksi.php';
include 'menu.php';

//jika tidak ada session pelanggan(belum login)
if (!isset($_SESSION["pembeli"]) OR empty($_SESSION["pembeli"])) {
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}
//mendapatkan id pemesanan dari url
$idpemesanan=$_GET["id"];
$ambil = $koneksi->query ("SELECT * FROM pemesanan WHERE ID_PEMESANAN='$idpemesanan'");
$detailpemesanan = $ambil->fetch_assoc();
//mendapatkan id pembeli yang beli
$idpelangganbeli=$detailpemesanan["NIK"];
//mendapatkan id pelanggan yang login
$idpelangganlogin=$_SESSION["pembeli"]["NIK"];
if ($idpelangganlogin!==$idpelangganbeli) {
	echo "<script>alert('jangan nakal');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran</title>
	<link rel="stylesheet" type="text-css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
</head>
<body>
		<div class="container">
		<h2>Konfirmasi Pembayaran</h2>
		<p>Kirim Bukti Pembayaran Anda Disini</p>
		<div class="alert alert-info">total tagihan Anda <strong>Rp. <?php echo number_format($detailpemesanan["TOTAL_HARGA"]) ?></strong></div>

		<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nama Penyetor</label>
			<input type="text" class="form-control" name="NAMA_PENYETOR">	
		</div>
		<div class="form-group">
			<label>Jumlah</label>
			<input type="number" class="form-control" name="JUMLAH_TRANSFER" min="1">
		</div>
		<div class="form-group">
			<label>Bukti Transfer</label>
			<input type="file" class="form-control" name="FOTO_BUKTITRANSFER">	
			<p class="text-danger">foto bukti harus JPG maksimal 2MB</p>
		</div>
		<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>	
		</div>
<?php
//jika ada tombol kirim 
if (isset($_POST["kirim"])){
	$namabukti=$_FILES["FOTO_BUKTITRANSFER"]["name"];
	$lokasibukti=$_FILES["FOTO_BUKTITRANSFER"]["tmp_name"];
	$namafiks =date("YmdHis").$namabukti;
	move_uploaded_file($lokasibukti, "buktitransfer/$namafiks");

	$nama =$_POST["NAMA_PENYETOR"];
	$jumlah=$_POST["JUMLAH_TRANSFER"];
	$tanggal = date("Y-m-d");
	//simpan pembayaran
	$koneksi->query ("INSERT INTO transfer(ID_PEMESANAN,NAMA_PENYETOR,JUMLAH_TRANSFER,TGL_TRANSFER,FOTO_BUKTITRANSFER) VALUES ('$idpemesanan','$nama','$jumlah','$tanggal','$namafiks')");
	//update status pemesanan dari pending menjadi sudah lunas
	$koneksi->query("UPDATE pemesanan SET STATUS_PEMBAYARAN='LUNAS' WHERE ID_PEMESANAN='$idpemesanan'");

	echo "<script>alert('Terimakasih sudah kirim bukti pembayaran');</script>";
	echo "<script>location='riwayat.php';</script>";
}

?>
<br>
<?php include 'footer.php' ?>
</body>
</html>