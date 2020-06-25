<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$id_pelanggan= $_POST['id_pelanggan'];

	require_once 'connect.php';

	$Sql_Query = "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan' ";

	$response = mysqli_query($conn, $Sql_Query);

	$result = array();
	$result["read"] = array();

	if( mysqli_num_rows($response) === 1 ){
		if ($row = mysqli_fetch_assoc($response)) {
		$h['nama_pelanggan']	    = $row['nama_pelanggan'];
		$h['telepon']				= $row['telepon'];
		$h['alamat']				= $row['alamat'];

		array_push($result["read"], $h);

		$result["success"] = "1" ;
		echo json_encode($result);

		mysqli_close($conn);
	
}
}else{
	$result["error"] = "0";
	$result["message"] = "Error !";
	echo json_encode($result);
	mysqli_close($conn);
}
}
?>