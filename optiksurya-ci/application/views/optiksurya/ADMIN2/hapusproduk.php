<?php
	session_start();
	// define a MariaDB connection
	// variable exec executes SQL query
	$koneksi = mysqli_connect("localhost", "root", "", "optikcoba");
	$exec = $koneksi -> query ("DELETE FROM barang WHERE ID_BARANG = '$_GET[id]'");

	// below 2-lines of javascript code is used to pop up a message "Produk Terhapus"
	// then redirect user to page produk.php
	echo "<script>alert('produk terhapus');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
?>