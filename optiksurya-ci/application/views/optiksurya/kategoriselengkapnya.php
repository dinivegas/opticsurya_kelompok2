<?php

$pecah = $ambil->fetch_assoc();
echo "<pre>";
print_r($pecah);
echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>keranjang</title>
	<link rel="stylesheet" href ="ADMIN2/assets/css/bootstrap.css">
</head>
<body>
 <!--Konten-->
  <section class="konten"
    <div class="container">
      <h1>Barang</h1>

      <div class="row">

        <?php $ambil = $koneksi->query("SELECT * FROM kategori JOIN barang ON kategori.ID_KATEGORI = barang.ID_KATEGORI WHERE barang.ID_KATEGORI LIKE '$_GET[ID_KATEGORI']'"); 
          while ($perbarang = $ambil->fetch_assoc() ){ ?>


        <div class="col-md-3">
          <div class="thumbnail">
            <img src="foto_produk/<?php echo $perbarang['GAMBAR_BARANG']; ?>" alt="">
            <div class="caption">
              <h3><?php echo $perbarang['NAMA_BARANG'];?></h3>
              <h5>Rp. <?php echo number_format($perbarang['HARGA_BARANG']);?></h5>
                <a href="beli.php?id=<?php echo $perbarang['ID_BARANG']; ?>" class="btn btn-primary">Beli</a>


            </div>
          </div>
        </div>
          </div>
    </div>
  </section>

</form>

</body>

</html>
