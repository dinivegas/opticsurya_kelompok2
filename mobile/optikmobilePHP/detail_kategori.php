<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

// 	$id_kategori= $_POST['id_kategori'];

// 	// require_once 'koneksi.php';

 include 'koneksi.php';

 $id_kategori = $_GET['id_kategori'];

$sql = "SELECT * FROM kategori JOIN produk ON kategori.id_kategori = produk.id_kategori WHERE kategori.id_kategori=$id_kategori";

$query = $conn->query($sql);

$result = array();
if ($query) {
	$list = array();
	while ($row = $query->fetch_assoc()) {
		$menu = array();
		$menu['id_produk'] = $row['id_produk'];
		$menu['nama_produk'] = $row['nama_produk'];
		$menu['harga'] = $row['harga'];
		$menu['stok'] = $row['stok'];
		$menu['gambar'] = $row['gambar'];
		array_push($list, $menu);
	}
	$result['status'] = 200;
	$result['messagge'] = "Success";
	$result['data'] = $list;
	$result['error'] = false;
} else {
	$result['status'] = 1;
	$result['messagge'] = "0  result";
	$result['error'] = true;
}
$conn->close();

echo json_encode ($result);
}
?>


