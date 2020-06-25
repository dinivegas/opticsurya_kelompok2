<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $id_pelanggan= $_POST['id_pelanggan'];
  $nama_pelanggan = $_POST['nama_pelanggan'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];


  require_once 'koneksi.php';
  $conn = mysqli_connect($server, $user, $password, $database);

  $Sql_Query = "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', email='email', alamat='alamat', WHERE id_pelanggan='$id_pelanggan'";

  if (mysqli_query($conn, $Sql_Query)) {

    $result["success"] = "1";
    echo json_encode($result);

    mysqli_close($conn);
  }

else{
  $result["error"] = "0";
  $result["message"] = "Error !";
  echo json_encode($result);

  mysqli_close($conn);
}
}
?>