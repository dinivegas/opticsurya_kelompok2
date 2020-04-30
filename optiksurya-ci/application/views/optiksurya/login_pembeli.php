<?php
session_start();

include 'koneksi.php';
include 'menu.php';
?>
<!DOCTYPE html>

<html>
<head>
	<title>login pembeli</title>
	<link rel="stylesheet" href="ADMIN2/assets/css/bootstrap.css">
</head>
<body>

<div class="container">
  <div class="row">
  	<div class="col-md-4">
  		<div class="panel panel-default">
  			<div class="panel-heading">
  				<h3 class="panel-title">Login Pembeli</h3>
  			</div>
  			<div class="panel-body">
  				<form method="post">
  					<div class="form-grup">
  						<label>Email</label>
  						<input type="email" class="form-control" name="EMAIL">
  					</div>
  					<div class="form-group">
  						<label>password</label>
  						<input type="password" class="form-control" name="PASSWORD">
  					</div>
  					<button class="btn btn-primary" name="login"> LOGIN</button>
  				</form>
  			</div>
  		</div>
  	</div>
  </div>
</div>

<?php
//jk ada tombol login (tombol login ditekan)
if (isset($_POST["login"]))
{
	$email = $_POST["EMAIL"];
	$password = $_POST["PASSWORD"];
	//lakukan query ngecek akun di tabel pembeli di db
	$ambil = $koneksi->query("SELECT * FROM pembeli
		WHERE EMAIL= '$email' AND PASSWORD='$password'");

	//mengambil akun yang terambil
	$akunyangcocok = $ambil->num_rows;

	//jika 1 akun yang cocok, maka diloginkan
	if ($akunyangcocok==1)
	{
		//anda sukses login
		//mendapatkan akun dalam bentuk array
		$akun = $ambil->fetch_assoc();
		//simpan di session pembeli
		$_SESSION["pembeli"] = $akun;
		echo "<script>alert('anda sukses login')</script>";
		echo "<script>location='checkout.php';</script>";

	}
	else
	{
		//anda gagal login
		echo "<script>alert('anda gagal login, periksa akun Anda')</script>";
		echo "<script>location='login_pembeli.php';</script>";
	}
}

?>


<?php include 'footer.php' ?>
</body>
</html>
