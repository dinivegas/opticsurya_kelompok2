<?php include 'koneksi.php';?>
<?php
$keyword = $_GET["keyword"];
$semuadata = array();
$ambil= mysqli_query ($koneksi, "SELECT * FROM barang WHERE NAMA_BARANG LIKE '%$keyword%' OR DESKRIPSI_BARANG LIKE '%$keyword%'");
//while($pecah = $ambil->fetch_assoc()) 
	while($pecah = mysqli_fetch_assoc($ambil)) 
{
$semuadata[]= $pecah;
}
// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";
?>
 <!DOCTYPE html>
<html>
<head>
	<title>Pencarian</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body>
<?php include "menu.php"; ?>
<div class="container">
	<h3>Hasil Pencarian</h3>
	<?php if (empty($semuadata)): ?>
		<div class="alert alert-danger"> Produk <?php echo $keyword ?> Tidak Ditemukan</div>
	<?php endif ?>
	
	<div class="row">
	<?php foreach ($semuadata as $key => $value): 
		//while ($value=mysqli_fetch_array($ambil)) {
			# code...
		
	?>

				<div class="col-md-3">
					<div class="thumbnail">
						<img src="foto_produk/<?php echo $value['GAMBAR_BARANG']; ?>" alt="">
						<div class="caption">
							<h3><?php echo $value['NAMA_BARANG'];?></h3>
							<h5>Rp. <?php echo number_format($value['HARGA_BARANG']);?></h5>
							<h6>Stok : <?php echo $value['STOK_BARANG']; ?></h6>
								<a href="beli.php?id=<?php echo $value['ID_BARANG']; ?>" class="btn btn-info">Beli</a>
								<a href="detail.php?id=<?php echo $value['ID_BARANG']; ?>" class="btn btn-warning">Detail</a>
							
						</div>
					</div>
				</div>
	<?php  endforeach ?>
	</div>
</div>
<?php include 'footer.php' ?>
</body>
</html>