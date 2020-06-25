<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$nama_pelanggan = $_POST['nama_pelanggan'];
	$email 			= $_POST['email'];
	$password		= $_POST['password'];
	$alamat 		= $_POST['alamat'];
	$telepon		= $_POST['telepon'];

	$password		= password_hash($password, PASSWORD_DEFAULT);

	require_once 'connect.php';

	$sql = "INSERT INTO pelanggan (nama_pelanggan, email, password, alamat, telepon) VALUES ('$nama_pelanggan', '$email', '$password', '$alamat', '$telepon')";

	if ( mysqli_query($conn, $sql)) {
		$result["success"] = "1";
		$result["message"] = "success";

		echo json_encode($result);
		mysqli_close($conn);
	}else {
		$result["success"] = "0";
		$result["message"] = "error";

		echo json_encode($result);
		mysqli_close($conn);
	}
}
 ?>