<?php
session_start();
include 'koneksi.php';
include "menu.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title> Nota Pembelian</title>
	<link rel="stylesheet" href="ADMIN2/assets/css/bootstrap.css">
</head>
<body>
<section class="konten">
		<div class="container">
		<?php 

			//$idn = $_GET['idn'];
			$ambil = $koneksi->query ("SELECT * FROM pemesanan JOIN pembeli ON pemesanan.NIK=pembeli.NIK WHERE pemesanan.ID_PEMESANAN='$_GET[id]'");
			$detail = $ambil->fetch_assoc();
			?>
			<!-- Jika pelanggan yang beli tidak sama dengan pelanggan yang login, maka dialihkan ke riwayat.php karena tidak berhak melihat nota pelanggan yang sudah login -->
			<!-- <pre><?php //print_r($detail); ?></pre> -->
			<?php 
			$idpelangganbeli=$detail["NIK"];
			//mendapatkan id pelanggan yang login
			$idpelangganlogin= $_SESSION["pembeli"]["NIK"];
			if ($idpelangganbeli!==$idpelangganlogin) {
				echo "<script>alert('silahkan lihat diriwayat belanja');</script>";
				echo "<script>location='riwayat.php';</script>";
				exit();
			}
			?>
			<!--<p>ID Pemesanan :</p>-->
			<!-- <pre><?php //print_r($detail['ID_PEMESANAN']); ?></pre> -->
			<!--<?php //echo "Nama pembeli:<br><strong>" . $detail ['NAMA_PEMBELI'] . "</strong>";?> <br>
			<p>
				<?php //echo "Nomor telepon:<br><strong>" . $detail ['NO_TELEPON'] . "</strong>"; ?> <br>
				<?php //echo "Gambar bukti pembayaran:<br>" . $detail ['GAMBAR_BUKTIPEMBAYARAN']; ?> 
			</p> 

			<p>
				<?php //echo "Tanggal pemesanan:<br><strong>" .$detail ['TGL_PEMESANAN'] . "</strong>"; ?> <br>
				<?php //echo "Total harga:<br><strong>" . $detail ['TOTAL_HARGA'] . "</strong>"; ?> 
			</p>-->
			<div class="row">
				<div class="col-md-3">
				<h3>Pembelian</h3>
				<strong>No.Pemesanan : <?php echo $detail['ID_PEMESANAN']; ?></strong><br>
				Tanggal pemesanan: <?php echo $detail ['TGL_PEMESANAN']; ?> <br>
				Total harga: Rp. <?php echo number_format($detail ['TOTAL_HARGA']); ?>
				</div>
				<div class="col-md-3">
				<h3>Pelanggan</h3>
				<strong><?php echo $detail ['NAMA_PEMBELI'];?></strong><br> </p>
					<p>
					<?php echo $detail ['NO_TELEPON'] ; ?> <br>
					<?php echo $detail ['GAMBAR_BUKTIPEMBAYARAN']; ?></p> 
				</div>
				<div class="col-md-3">
				<h3>Pengiriman</h3>
				<strong><?php echo $detail['KOTA'] ?></strong><br>
				Ongkos Kirim: Rp. <?php echo number_format($detail['TARIF']); ?><br>
				Alamat Kirim : <?php echo ($detail['ALAMAT_KIRIM']); ?>
				</div>	
				<div class="col-md-3">
				<h3>Pesanan</h3>
				<strong>Detail Pesanan : </strong><br><?php echo ($detail['DETAIL_PESANAN']); ?>
				</div>	
			</div>
			<br>
			<table class= "table table-bordered">
				<thead>
					<tr>
						<th>no</th>
						<th>nama produk</th>
						<!--<th>nama pembeli</th>-->
						<th>harga</th>
						<th>jumlah</th>
						<th>subtotal</th>
					</tr>
				</thead>
				<tbody>
				<?php $nomor=1; ?>
				<?php $ambil = $koneksi-> query ("SELECT * FROM detail_pemesanan WHERE ID_PEMESANAN= '$_GET[id]'"); ?>
				<?php 
				while ($pecah =$ambil-> fetch_assoc()){ 
					//$barang = $koneksi-> query ("SELECT * FROM barang WHERE ID_BARANG= '$pecah[ID_BARANG]'");
					//$barang = $barang-> fetch_assoc();
					?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah['NAMABARANG'];?></td>
					<td>Rp. <?php echo number_format($pecah['HARGABARANG']) ;?></td>
					<td><?php echo $pecah['JUMLAH_BARANG'];?></td>
					<!--<td><?php //echo $pecah['TOTAL_HARGA'];?></td>-->
					<td>Rp. <?php echo number_format($subtotal = $pecah["HARGABARANG"] * $pecah["JUMLAH_BARANG"]);?></td>
				</tr>
				<?php $nomor++ ?>
				<?php } ?>
					
				</tbody>
			</table>
			<div class="row">
				<div class="col-md-7">
					<div class="alert alert-info">
						<p>
							Silahkan melakukan pembayaran Rp.<?php echo number_format($detail['TOTAL_HARGA']);?> ke <strong> BANK Mandiri 138-2939993-3322 AN. Fila</strong>
						</p>
					</div>
				</div>
			</div>
			<a href="pembayaran.php?id=<?php echo $detail["ID_PEMESANAN"]?>" class="btn btn-success">Input Pembayaran</a>
		</div>
</section>
<br>
<?php include 'footer.php' ?>
</body>
</html>