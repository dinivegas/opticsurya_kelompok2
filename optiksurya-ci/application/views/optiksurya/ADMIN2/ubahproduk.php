<h2>Ubah Produk</h2>
<?php

$ambil = $koneksi->query("SELECT * FROM barang WHERE ID_BARANG='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
echo "<strong>ID Barang</strong><br>";
echo "<pre>";
print_r($pecah['ID_BARANG']);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['NAMA_BARANG'];?>">
	</div>
	<div class="form-group">
		<label> Harga(RP)</label>
		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['HARGA_BARANG'];?>">
	</div>
	<div class="form-group">
		<label> Stok</label>
		<input type="number" name="stok" class="form-control" value="<?php echo $pecah['STOK_BARANG'];?>">
	</div>
	<div class="form-group">
		<label> Tanggal Kadaluarsa</label>
		<input type="date" name="tanggal_kadaluarsa" class="form-control" value="<?php echo $pecah['TGL_KADALUARSA'];?>">
	</div>
	<div class="form-group">
	<img src="../foto_ptoduk/<?php echo $pecah['GAMBAR_BARANG']?>" width = "200">
	</div>
	<div class="form-group">
		<label> Ubah Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-group">
		<label> Deskripsi Barang</label>
		<textarea name="deskripsi" class= "form-control" rows="10" value="<?php echo $pecah['DESKRIPSI_BARANG'];?>">
		</textarea>

	<button class="btn btn-primary" name=save>Simpan</button> 
	</form>
<?php
//jika ada tombol simpanS maka mengambil nama foto kemdudian letak foto sementara 
if (isset($_POST['save']))
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	//jika foto diubah
	if (!empty($lokasifoto))
	{
		move_uploaded_file($lokasifoto, "../foto_produk/$foto");
		$koneksi->query("UPDATE barang SET NAMA_BARANG='$_POST[nama_barang]', HARGA_BARANG='$_POST[harga]', STOK_BARANG='$_POST[stok]', TGL_KADALUARSA='$_POST[tanggal_kadaluarsa]', GAMBAR_BARANG='$namafoto', DESKRIPSI_BARANG='$_POST[deskripsi]' WHERE ID_BARANG='$_GET[id]'");
	}else
	{
		$koneksi->query("UPDATE barang SET NAMA_BARANG='$_POST[nama]', HARGA_BARANG='$_POST[harga]', STOK_BARANG='$_POST[stok]', TGL_KADALUARSA='$_POST[tanggal]', DESKRIPSI_BARANG='$_POST[deskripsi]' WHERE ID_BARANG='$_GET[id]'");
	}
	echo "<script>alert('data barang berhasil diubah');</script>";
	
	echo "<script>location='index.php?halaman=produk';</script>";
}
?>


</form>