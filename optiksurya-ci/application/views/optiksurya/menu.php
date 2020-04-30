<!-- Navbar -->
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

</body>
</html>
     <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/font-awesome.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style_footer.css">
     <nav class="navbar navbar-expand navbar-light bg-dark fixed-top" id="mainNav" style="border-radius: 0;">
      <div class="container">
      <a href="index.php" class="navbar-brand"><img src="<?php echo base_url()?>assets/pictures/img/logo-brand.png" height="20"></a>
      <ul class="nav navbar-nav navbar navbar-expand">
          <li class="navbar navbar-expand"><a href="kategori.php">Kategori</a></li>
          <li class="navbar navbar-expand"><a href="keranjang.php">Keranjang</a></li>
          <li class="navbar navbar-expand"><a href="riwayat.php">Riwayat Belanja</a></li>
          <li class="navbar navbar-expand"><a href="daftar.php">Daftar</a></li>

            <!--jk sudah login(ada session pembeli)-->
            <?php if (isset($_SESSION["pembeli"])): ?> 
            <li><a href="logout.php">Logout</a></li>
             <!--jika belum login belum ada session pembeli--> 
            <?php else : ?>
              <li><a href="login.php">Login</a></li>
            <?php endif ?>

      </ul>

      <form action="pencarian.php" method="get" class="navbar-form navbar-right">
        <input type="text" class="form-control" placeholder="masukan nama barang" name="keyword">
        <button class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
      </form>
     
    <!--<form action="datacoba.php" method="post" class="navbar-form navbar-right">
            <input type="text" name="s_keyword" id="s_keyword" class="form-control">
            <button id="search" name="search" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>     
    </form>-->
 
<div class="data"></div>
    </div>
  </nav>