<?php 
include 'koneksi.php';
$waktupembayaran=date("Y-m-d");
//$stok= mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE TGL_JATUHTEMPO==$waktupembayaran AND STATUS_PEMBAYARAN='Pending'");
$a= "SELECT * FROM pemesanan, detail_pemesanan WHERE pemesanan.ID_PEMESANAN=detail_pemesanan.ID_PEMESANAN AND TGL_JATUHTEMPO='2019-12-26' AND STATUS_PEMBAYARAN='Pending'";
$stok=mysqli_query($koneksi, $a);
$hitung=mysqli_num_rows($stok);

if ($hitung>=1) {
  while ($kembali=mysqli_fetch_array($stok)) {
    echo $iddetail=$kembali['ID_DETAIL_PEMESANAN'];
    echo $idbarang=$kembali['ID_BARANG'];
    echo $jumlah=$kembali['JUMLAH_BARANG'];
    $barang=mysqli_query($koneksi,"SELECT*FROM barang WHERE ID_BARANG='$idbarang'");
    $ambiljmlh=mysqli_fetch_array($barang);
    echo $jumlahbarang=$ambiljmlh['STOK_BARANG'];
    echo $total=$jumlahbarang+$jumlah;
    // echo $br= "UPDATE barang SET STOK_BARANG=$total WHERE ID_BARANG=$idbarang";
    mysqli_query($koneksi, "UPDATE barang SET STOK_BARANG=$total WHERE ID_BARANG='$idbarang'");
  }
  mysqli_query($koneksi, "UPDATE pemesanan SET STATUS_PEMBAYARAN='batal' WHERE TGL_JATUHTEMPO = '$waktupembayaran' AND STATUS_PEMBAYARAN='Pending'");
}

$cat = $_GET['id'];
$barang = mysqli_query($koneksi, "SELECT * FROM kategori WHERE ID_KATEGORI = '$cat'");
$kategori1 = mysqli_fetch_array($barang);
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Optik Surya</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>
<?php include "menu.php"; ?>


  <!--Konten-->
  <section class="konten">
    <div class="container">
      <h1><?php echo $kategori1["KATEGORI"]; ?></h1>

      <div class="row">

        <?php $ambil = $koneksi->query("SELECT* FROM kategori JOIN barang ON kategori.ID_KATEGORI = barang.ID_KATEGORI where kategori.ID_KATEGORI='$cat'"); 
          while ($perbarang = $ambil->fetch_assoc() ){ ?>


        <div class="col-md-3">
          <div class="thumbnail">
            <img src="foto_produk/<?php echo $perbarang['GAMBAR_BARANG']; ?>" alt="img-responsive">
            <div class="caption">
              <h3><?php echo $perbarang['NAMA_BARANG'];?></h3>
              <h5>Rp. <?php echo number_format($perbarang['HARGA_BARANG']);?></h5>
                <a href="beli.php?id=<?php echo $perbarang['ID_BARANG']; ?>" class="btn btn-primary">Beli</a>
                <a href="detail.php?id=<?php echo $perbarang['ID_BARANG']; ?>" class="btn btn-warning">Detail</a>



            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
<?php include 'footer.php' ?>
</body>
</html>

