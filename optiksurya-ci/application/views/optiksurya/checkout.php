<?php
session_start();
include 'koneksi.php';
$carikode= mysqli_query($koneksi,"SELECT * FROM pemesanan") OR DIE (mysqli_error($koneksi));
$datakode= mysqli_fetch_array($carikode);
$hitung  = mysqli_num_rows($carikode);
//if($datakode){
	//$nilaikode=substr($datakode[0], 1);
	//$kode=(int)$nilaikode; 
	$kode=$hitung+1;
	$cekkode="TR" .str_pad($kode,3,"0",STR_PAD_LEFT);
	$kodeupdate = mysqli_query($koneksi,"SELECT * FROM pemesanan WHERE ID_PEMESANAN = '$cekkode'");
	$kodebaru = mysqli_fetch_array($kodeupdate);
	$cek = mysqli_num_rows($kodeupdate);
	if ($cek == 1){
		$kode2 = $kode+1;
		$hasilkode ="TR" .str_pad($kode2,3,"0",STR_PAD_LEFT);
	}else{
		$hasilkode=$cekkode;
	}
//jika ada session pembeli (belum login), maka dilarikan ke login.php
if (!isset($_SESSION["pembeli"])) 
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login.php' ; </script>";	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<link rel="stylesheet" href="ADMIN2 /assets/css/bootstrap.css">
</head>
<body>
<?php include "menu.php"; ?>

  <!--Konten-->
	<section class="konten">
		<div class="container">
		<!--<h1>Keranjang</h1>-->
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Sub total</th>

					</tr>
				</thead>
				<tbody>
				<?php $nomor=1 ?>	
				<?php $totalbelanja = 0; ?>

				<?php  foreach ($_SESSION["keranjang"] as $ID_BARANG=>$jumlah):?>
				<!--menampilkan produk yang di masukan ke keranjang berdasarkan id barang -->
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
				</tr>
				<?php $nomor++;
				 $totalbelanja+=$subtotal;
				 endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4">Total Belanja</th>
						<th>Rp. <?php echo number_format($totalbelanja) ?></th>
					</tr>
				</tfoot>
			</table>
			<form method="post" action="checkout.php">
				<div class="row">	
				<div class="col-md-2">
				<div class="form-group">
				 <input type="text" readonly value="<?php echo $_SESSION["pembeli"]['NAMA_PEMBELI'] ?>" 
					class="form-control">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION["pembeli"]['NO_TELEPON'] ?>"
						 class="form-control">	
						 </div>
						 </div>	
					<div class="col-md-2">
						<select class="form-control" name="ID_ONGKIR" required="">
							<option value="" >Pilih Ongkos Kirim</option>
							<?php
							$ambil = $koneksi->query("SELECT * FROM ongkir");
							while ($perongkir = $ambil-> fetch_assoc()) {
							?>
							<option value="<?php echo $perongkir["ID_ONGKIR"]?>">
								<?php
								echo $perongkir['KOTA'];
							 	echo number_format($perongkir['TARIF']);
								?>
							</option> 

						<?php } ?>
							
						</select>
				</div>
			</div>
			<div class="form-group">
			<div class="col-md-6">
			<label>Alamat Pengiriman</label>
			<textarea class="form-control" name="alamat_pengiriman" placeholder="masukan alamat lengkap pengiriman (termasuk kode pos)"></textarea>
			</div>	
			<div class="col-md-6">
			<label>Detail Pesanan</label>
			<textarea class="form-control" name="detail_pesanan" placeholder="masukan detail pesanan ukuran minum/plus/cylinder"></textarea>
			</div>	
			</div>
			<br>
			<button type="submit" class="btn btn-primary" name="nota">Nota</button>
			</form>

			<?php
			 //echo $id_pemesanan_baru = $koneksi->insert_id;
			if (isset($_POST["nota"]))
			 {
				
				$nik = $_SESSION["pembeli"]["NIK"];
				$id_ongkir = $_POST["ID_ONGKIR"];
				$alamat = $_POST["alamat_pengiriman"];
				$pesan = $_POST["detail_pesanan"];
				$tgl_pemesanan =date("Y-m-d");
				$ambil = $koneksi->query("SELECT * FROM ongkir WHERE ID_ONGKIR='$id_ongkir'");
				$arrayongkir = $ambil -> fetch_assoc();
				$kota= $arrayongkir['KOTA'];
				$TARIF= $arrayongkir['TARIF'];
				$totalharga = $totalbelanja + $TARIF;

				// 1. menyimpan data ke tabel pembelian
				echo $koneksi->query("INSERT INTO pemesanan (ID_PEMESANAN, NIK, ID_ONGKIR, TGL_PEMESANAN, DETAIL_PESANAN,ALAMAT_KIRIM, KOTA, TARIF, TOTAL_HARGA) VALUES ('$hasilkode', '$nik', '$id_ongkir','$tgl_pemesanan','$pesan','$alamat','$kota','$TARIF','$totalharga')");
				// mendapat ID_PEMESANAN barusan terjadi
				// $id_pemesanan_baru = $koneksi->insert_id;
				foreach ($_SESSION["keranjang"] as $ID_BARANG => $jumlah) 
				{
				// 	medapatkam data produk berdasarkan id barang
					$ambil = $koneksi->query("SELECT * FROM barang WHERE ID_BARANG='$ID_BARANG'");
					$perbarang= $ambil->fetch_assoc();
					echo $nama = $perbarang['NAMA_BARANG'];
				 	echo $harga = $perbarang['HARGA_BARANG'];
				 	echo $subtotal = $perbarang['HARGA_BARANG']*$jumlah;

				$koneksi->query("INSERT INTO detail_pemesanan (ID_BARANG, ID_PEMESANAN, JUMLAH_BARANG,NAMABARANG,HARGABARANG,TOTAL_HARGA) VALUES ('$ID_BARANG', '$hasilkode', '$jumlah','$nama','$harga','$subtotal')");
				//skrip update stok
				$koneksi->query("UPDATE barang SET STOK_BARANG=STOK_BARANG-$jumlah WHERE ID_BARANG='$ID_BARANG'");
				}
				//mengkosongkan keranjang belanja
				unset($_SESSION["keranjang"]);
				//tampilan dialihkan kehalaman nota
				echo "<script>alert('Pembelian sukses');</script>";
				echo "<script>location='nota.php?idn=$hasilkode';</script>";
			}
			?>
			</div>
			
</section>
<br>
<!-- <pre><?php //print_r($_SESSION['pembeli']) ?></pre>
<pre><?php //print_r($_SESSION["keranjang"]) ?></pre> -->
<?php include 'footer.php' ?>
</body>
</html>