<table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Kos</td>
            <td>Jenis Kos</td>
            <td>Fasilitas</td>
        </tr>
    </thead>
    <tbody>
        <?php
            include ('koneksi.php');
            $keyword = $_POST['s_keyword'];
            $ambil = $kos->query("SELECT * FROM tb_tipekamar JOIN tb_datakos ON tb_tipekamar.ID_KOS=tb_datakos.ID_KOS WHERE FASILITAS_KAMAR LIKE '".$keyword."%' OR JENIS_KOS LIKE '%".$keyword."%' ");

 $hitung = mysqli_num_rows($ambil);
 if($hitung>0){
                while ($row = $ambil->fetch_array()) {
                    $id = $row['ID_KOS'];
                    $ALAMAT_KOS = $row['NAMA_KOS'];
                    $JENIS_KOS = $row['JENIS_KOS'];
                    $HARGA = $row['FASILITAS_KAMAR'];
        ?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $ALAMAT_KOS; ?></td>
                <td><?php echo $JENIS_KOS; ?></td>
                <td><?php echo $HARGA; ?></td>
                
            </tr>
        <?php  }} else { ?> 
            <tr>
                <td colspan='7'>Tidak ada data ditemukan</td>
            </tr>
        <?php } ?>
    </tbody>
</table>