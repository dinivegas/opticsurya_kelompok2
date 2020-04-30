<?php
session_start();
#include 'koneksi.php';
?>
 <!DOCTYPE html>
<html>
<head>
	<title>Kategori Barang</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

  <!--Konten-->
  <section class="konten">
  <br><br>
    <div class="container-fluid jumbotron-fluid bg-warning">
    <br><br>
      <h1>Kategori Barang</h1>

      <div class="row">

        <?php 
        // $idk = $_GET["id"];
        #$ambil = $koneksi->query("SELECT* FROM kategori"); 
         # while ($perbarang = $ambil->fetch_assoc() ){ ?>



        <div class="col-md-3">
          <div class="thumbnail">
            <img src="<?php echo base_url()?>jpegs/foto_kategori/<?php #echo $perbarang['FOTO_KATEGORI']; ?>" alt="img-responsive">
            <div class="caption">
              <h3><?php #echo $perbarang['KATEGORI'];?></h3>
              <a href="barang.php?id=<?php #echo $perbarang['ID_KATEGORI'];?> " class="btn-danger btn">Selengkapnya</a>

            </div>
          </div>
        </div>
        <?php #} ?>
      </div>
    </div>
  </section>
</body>
</html>

