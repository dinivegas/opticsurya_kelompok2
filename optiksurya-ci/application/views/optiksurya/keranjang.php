<?php 
session_start();

// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";
include 'koneksi.php';

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script> alert('silahkan belanja dahulu');</script>";
	echo "<script> location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>keranjang</title>
	<link rel="stylesheet" href ="assets/css/bootstrap.css">
</head>
<body>

<?php include "menu.php"; ?>

	<!--Konten-->
	<section class="konten">
		<div class="container">
			<h1>Keranjang</h1>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Sub total</th>
						<th>Aksi</th>

					</tr>
				</thead>
				<tbody>
				<?php $nomor=1 ?>
				<?php foreach ($_SESSION["keranjang"] as $ID_BARANG=>$jumlah):?>
				<!--menampilkan produk yang di masukan ke keranjang berdasarkan id baranf -->
				<?php
				$ambil = $koneksi->query("SELECT * FROM barang WHERE ID_BARANG='$ID_BARANG'");
				$pecah =$ambil->fetch_assoc();
				$subtotal = $pecah["HARGA_BARANG"]*$jumlah;
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah['NAMA_BARANG'];?></td>
					<td>Rp. <?php echo number_format($pecah['HARGA_BARANG']);?></td>
					<td><?php echo $jumlah ;?></td>
					<td>Rp. <?php echo number_format($subtotal);?></td>
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $ID_BARANG?>" class="btn btn-danger btn-xs">hapus</a>
					</td>
				</tr>
				<?php $nomor++ ?>

				<?php endforeach ?>
				</tbody>
				
			</table>
			<a href="index.php" class="btn btn-warning">Tambah Belanja</a>
			<a href="checkout.php" class="btn btn-primary">Checkout</a>
			</div>
			</section>
<br>
<?php include 'footer.php' ?>
</body>
</html>