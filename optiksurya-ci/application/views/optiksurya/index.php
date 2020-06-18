<?php 
session_start();
include 'koneksi.php';
$waktupembayaran=date("Y-m-d");
//$stok= mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE TGL_JATUHTEMPO==$waktupembayaran AND STATUS_PEMBAYARAN='Pending'");
$a= "SELECT * FROM pemesanan, detail_pemesanan WHERE pemesanan.ID_PEMESANAN=detail_pemesanan.ID_PEMESANAN AND TGL_JATUHTEMPO='$waktupembayaran' AND STATUS_PEMBAYARAN='Pending'";
$stok=mysqli_query($koneksi, $a);
$hitung=mysqli_num_rows($stok);

if ($hitung>=1) {
  while ($kembali=mysqli_fetch_array($stok)) {
    echo $iddetail=$kembali['ID_DETAIL_PEMESANAN'];
    echo $idbarang=$kembali['ID_BARANG'];
    echo $jumlah=$kembali['JUMLAH_BARANG'];
    $barang=mysqli_query($koneksi,"SELECT*FROM barang WHERE ID_BARANG='$idbarang'");
    $ambiljmlh=mysqli_fetch_array($barang);
    echo $jumlahbarang=$ambiljmlh['STOK_BARANG'];
    echo $total=$jumlahbarang+$jumlah;
    // echo $br= "UPDATE barang SET STOK_BARANG=$total WHERE ID_BARANG=$idbarang";
    mysqli_query($koneksi, "UPDATE barang SET STOK_BARANG=$total WHERE ID_BARANG='$idbarang'");
  }
  mysqli_query($koneksi, "UPDATE pemesanan SET STATUS_PEMBAYARAN='batal' WHERE TGL_JATUHTEMPO = '$waktupembayaran' AND STATUS_PEMBAYARAN='Pending'");
  }
?>
 <!DOCTYPE html>
<html>
<head>
	<title>Optik Surya</title>
	<link rel="stylesheet" type="text-css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
</head>
</head>
<body>

<?php include "menu.php"; ?>

	<!--Konten-->
	<div class="col-md-10"></div>
	<section class="konten">
		<div class="container">
			<h1>Rekomendasi Produk</h1>

			<div class="row">
				

				<?php $ambil = $koneksi->query("SELECT *, count('ID_BARANG') as JUMLAH_BARANG FROM detail_pemesanan INNER JOIN barang ON barang.ID_BARANG = detail_pemesanan.ID_BARANG GROUP BY detail_pemesanan.ID_BARANG
					ORDER BY JUMLAH_BARANG DESC LIMIT 8"); ?>
				<?php while ($perbarang = $ambil->fetch_assoc() ){ ?>
					

				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<img src="foto_produk/<?php echo $perbarang['GAMBAR_BARANG']; ?>" alt="">
							<div class="caption">
								<h3><?php echo $perbarang['NAMA_BARANG'];?></h3>
								<h5>Rp. <?php echo number_format($perbarang['HARGA_BARANG']);?></h5>
								<h6>Stok : <?php echo $perbarang['STOK_BARANG']; ?></h6>
									<a href="detail.php?id=<?php echo $perbarang['ID_BARANG']; ?>" class="btn btn-info"><i class="fa fa-shopping-cart"></i> Beli</a>
									<a href="detail.php?id=<?php echo $perbarang['ID_BARANG']; ?>" class="btn btn-warning"><i class="fa fa-info-circle"></i> Detail</a>
								
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
<!--<pre><?php //print_r($_SESSION['nik']) ?></pre>-->
<?php include 'footer.php' ?>
 <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>