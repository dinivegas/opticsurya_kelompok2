<?php
session_start();
include 'koneksi.php';
include 'menu.php';
//jika tidak ada session pelanggan belum logm
if (!isset($_SESSION["pembeli"]) OR empty($_SESSION["pembeli"]))
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Riwayat</title>
	<link rel="stylesheet" type="text-css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
</head>
<body>

<pre><?php print_r ($_SESSION) ?></pre>
<section class="riwayat">
	<div class="container">
		<h3>Riwayat Belanja <?php echo $_SESSION["pembeli"]["NAMA_PEMBELI"]?></h3>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$nomor=1;
				//mendapakan nik pembeli yg login dari session
				$NIK = $_SESSION["pembeli"]['NIK'];

				$ambil= $koneksi->query("SELECT * FROM pemesanan WHERE NIK='$NIK'");
				while($pecah = $ambil->fetch_assoc() ) {	
				?>
				<tr>
				<td><?php echo $nomor;?></td>
				<td><?php echo $pecah ["TGL_PEMESANAN"]?></td>
				<td>
					<?php echo $pecah ["STATUS_PEMBAYARAN"]?>
					<br>
					<?php if (!empty($pecah['RESI_PENGIRIMAN'])): ?>
					NO.Resi <?php echo $pecah['RESI_PENGIRIMAN']; ?>
				<?php endif ?>
				</td>
				<td>Rp. <?php echo number_format ($pecah["TOTAL_HARGA"])?></td>
				<td>
					<a href="nota.php?id=<?php echo $pecah["ID_PEMESANAN"]?>" class="btn btn-info">Nota</a>
					<?php if ($pecah['STATUS_PEMBAYARAN']=="Pending"):?>
					<a href="pembayaran.php?id=<?php echo $pecah["ID_PEMESANAN"]?>" class="btn btn-success">Input Pembayaran</a>
				<?php else: ?>
					<a href="lihatpembayaran.php?id=<?php echo $pecah["ID_PEMESANAN"];?>" class= "btn btn-warning">Lihat Pembayaran 
					</a>
				<?php endif ?>
				</td>
			</tr>
			<?php $nomor++;?>
			<?php } ?>
			</tbody>
			
		</table>
		
	</div>
	
</section>
<?php include 'footer.php' ?>
</body>
</html>
