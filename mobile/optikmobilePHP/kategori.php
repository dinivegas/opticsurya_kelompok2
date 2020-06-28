<?php

include 'koneksi.php';

$sql = "SELECT * FROM kategori";

$query = $conn->query($sql);

$result = array();
if ($query) {
	$list = array();
	while ($row = $query->fetch_assoc()) {
		$menu = array();
		$menu['id_kategori'] = $row['id_kategori'];
		$menu['nama_kategori'] = $row['nama_kategori'];
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

echo json_encode($result);

?>