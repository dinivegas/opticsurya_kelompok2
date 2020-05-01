<?php session_start();
include 'koneksi.php';


$ID_BARANG = $_GET["id"];
//$_SESSION["ID_BARANG"]= $ID_BARANG;
$ambil=$koneksi->query("SELECT * FROM barang WHERE ID_BARANG='$ID_BARANG'");
$detail= $ambil->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Barang</title>
	<link rel="stylesheet" href="ADMIN2/assets/css/bootstrap.css ">
</head>
<body>

<?php include "menu.php"; ?>

<!--Konten-->
	<section class="kontent">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<img src="foto_produk/<?php echo $detail["GAMBAR_BARANG"];?>" alt="" class="img-responsive">
				</div>
				<br>
			<div class="col-md-6">
				<h2><?php echo $detail ["NAMA_BARANG"] ?></h2>
				<h4>Rp.<?php echo number_format($detail ["HARGA_BARANG"]) ?></h4>
				<h2>Stok :<?php echo $detail ['STOK_BARANG'] ?></h2>
				<form method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="number" min="1" class="form-control" name="jumlah"  max="<?php echo $detail['STOK_BARANG']  ?>">
						</div>
					  	</div>
						
					<div class="input-group-btn">
					<button class="btn btn-warning" name="beli">Masukan Keranjang</button>
				</div>
				</div>
				</form>
	
				<div class="col-md-6">
				<h2><b>Deskripsi barang :</b></h2>
				<h4><?php echo $detail ["DESKRIPSI_BARANG"] ?></h4>
				</div>
				
				<?php 
				//jika ada tombol beli
				if (isset($_POST["beli"])){
					//mendpatkan jumlah yang diinputkan dalam form
					//$array = array[$ID_BARANG,$jumlah];
					$jumlah=$_POST["jumlah"];
					//masukan ke keranjang belanja
					//$a = $_SESSION["keranjang"];
					//$b = $_SESSION["ID_BARANG"];

					//$array = array[$ID_BARANG,$jumlah];
					$_SESSION["keranjang"][$ID_BARANG] = $jumlah;

					echo "<script>alert('produk telah masuk ke keranjang');</script>";
					echo "<script>location='keranjang.php';</script>";
				}
				?>
				
			</div>
		</div>
		</div>
	</section>
	<br>
<?php include 'footer.php' ?>
