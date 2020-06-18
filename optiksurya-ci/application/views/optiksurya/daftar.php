<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>daftar</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php' ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Pembeli</h3>
					</div>
					<div class="panel-body">
						<form method="post" class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-md-3">Nama</label>
								<div class="col-md-7">
									<input type="text" class="form-control" placeholder="masukan nama lengkap Anda" name="nama" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">NIK</label>
								<div class="col-md-7">
									<input type="text" class="form-control" placeholder="masukan NIK" name="nik" required>
								</div>
							</div>
							<div class="form-group">
							<label class="control-label col-md-3">Jenis Kelamin</label>
								<div class="col-md-7">
									<input type="radio" name="jeniskelamin" value="Laki-laki" required>Laki-laki
									<input type="radio" name="jeniskelamin" value="Perempuan" required>Perempuan<br>
								</div> 
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Email</label>
								<div class="col-md-7">
									<input type="email" class="form-control" placeholder="masukan email" name="email" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Password</label>
								<div class="col-md-7">
									<input type="text" class="form-control" placeholder="masukan password" name="password" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Alamat</label>
								<div class="col-md-7">
									<textarea class="form-control" placeholder="masukan alamat lengkap" name="alamat" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Telp/HP</label>
								<div class="col-md-7">
									<input type="text" class="form-control" placeholder="masukan No.telepon" name="telepon" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-7 col-md-offset-3">
									<button class="btn btn-primary" name="daftar">Daftar</button>
								</div>
							</div>
						</form>
						<?php
						//jika ada tombol daftar(ditekan tombol daftar)
						if (isset($_POST["daftar"]))
						{
							//mengambil isian nama, email, password, alamat, telepon
							$nama = $_POST["nama"];
							$nik = $_POST["nik"];
							$jeniskelamin = $_POST["jeniskelamin"];
							$email = $_POST["email"];
							$password = $_POST["password"];
							$alamat = $_POST["alamat"];
							$telepon = $_POST["telepon"];

							//cek apakah email sudah digunakan
							$ambil=$koneksi->query("SELECT * FROM pembeli WHERE EMAIL='$email'");
							$yangcocok=$ambil->num_rows;
							if($yangcocok==1)
							{
							 echo "<script>alert('pendaftaran gagal, email sudah digunakan')</script>";
							 echo "<script>location='daftar.php';</script>";
							}else
							{
								//query insert  ke tabel pelanggan
								$koneksi->query("INSERT INTO pembeli(NIK, NAMA_PEMBELI, ALAMAT,NO_TELEPON, JENIS_KELAMIN,EMAIL,PASSWORD) VALUES ('$nik','$nama','$alamat','$telepon','$jeniskelamin','$email','$password')");
								echo "<script>alert('pendaftaran sukses, silahkan login')</script>";
							    echo "<script>location='login.php';</script>";
							}

							//
						}
						?>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php include 'footer.php' ?>
</body>
</html>