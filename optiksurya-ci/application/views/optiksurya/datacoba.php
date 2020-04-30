 <?php
 include 'koneksi.php';
 include 'menu.php'; 
 ?>

<table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Barang</td>
            <td>Kategori</td>
             <td>Harga</td>
        </tr>
    </thead>
    <tbody>
        <?php                     
            echo $keyword = $_POST['s_keyword'];

           // echo $ambil = $koneksi ->query("SELECT * FROM barang JOIN kategori ON kategori.ID_KATEGORI=barang.ID_KATEGORI WHERE NAMA_BARANG LIKE '& $keyword %' OR LIKE KATEGORI '% $keyword %' OR LIKE HARGA_BARANG '% $keyword %' ");
              $ambil = mysqli_query ($koneksi, "SELECT * FROM barang JOIN kategori ON kategori.ID_KATEGORI=barang.ID_KATEGORI WHERE NAMA_BARANG LIKE '%$keyword%' OR KATEGORI LIKE '%$keyword%' OR HARGA_BARANG LIKE '%$keyword%'");

 $hitung = mysqli_num_rows($ambil);
 if($hitung>0){

                while ($row = $ambil->fetch_array()) {
                    $id = $row['ID_BARANG'];
                    $namabarang = $row['NAMA_BARANG'];
                    $kategori = $row['KATEGORI'];
                    $harga = $row['HARGA_BARANG'];
                    //$alamat = $row['KET_ALAMAT_KOS'];
                    //$HARGA = $row['HARGA'];
                    //$idpemilik = $row['ID_PEMILIK'];
                    //$kab = $row['KAB_KOS'];
                    //$jalan = $row['JALAN_KOS'];
                    //$kec = $row['KEC_KOS'];
        ?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $namabarang; ?></td>
                <td><?php echo $kategori; ?></td>
                <td><?php echo $harga; ?></td>
                <td><a href="beli.php?id=<?php echo $value['ID_BARANG']; ?>" class="btn btn-info">Beli</a>
                 <a href="detail.php?id=<?php echo $value['ID_BARANG']; ?>" class="btn btn-warning">Detail</a></td>
            </tr>
        <?php  }} else { ?> 
            <tr>
                <td colspan='7'>Tidak ada data ditemukan</td>

            </tr>
        <?php } ?>
        
    </tbody>
</table>