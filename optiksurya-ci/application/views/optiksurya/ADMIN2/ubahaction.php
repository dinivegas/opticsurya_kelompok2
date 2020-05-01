<?php $koneksi= new mysqli("localhost", "root","","optikcoba");
$run = $koneksi -> query ("UPDATE barang SET NAMA_BARANG = '$_POST [nama]' WHERE ID_BARANG='$_POST[id]'");
echo "<script>alert ('data barang berhasil diubah');</script>";
	
	echo "<script>location='index.php?halaman=produk';</script>";'
?>