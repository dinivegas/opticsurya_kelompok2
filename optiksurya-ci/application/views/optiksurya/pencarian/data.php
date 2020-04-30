<table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Mahasiswa</td>
            <td>Alamat</td>
            <td>Jurusan</td>
            <td>Jenis Kelamin</td>
            <td>Tanggal Masuk</td>
        </tr>
    </thead>
    <tbody>
        <?php
            include 'koneksi.php';
            $s_ALAMAT_KOS="";
             $_JENIS_KOS="";
              $s_HARGA="";
            $s_keyword="";
            if (isset($_POST['data_kos'])) {
                $s_jurusan = $_POST['data_kos'];
                $s_keyword = $_POST['keyword'];
            }
            
            $search_jurusan = '%". $s_jurusan ."%';
            $search_keyword = '%". $s_keyword ."%';
            $no = 1;
            //$query = "SELECT * FROM tb_datakos WHERE ALAMAT LIKE ? AND (NAMA_KOS LIKE ? OR jenis_kos) tb_datakos.JENIS_KOS, tb_datakos.JUMLAH_KAMAR, tb_tipekamar.STOK_KAMAR,tb_harga.HARGA FROM tb_datakos, tb_tipekamar, tb_harga WHERE tb_datakos.ID_KOS = tb_tipekamar.ID_KOS";

            $query = "SELECT * FROM tb_datakos.NAMA_KOS,tb_datakos.JENIS_KOS, tb_datakos.JUMLAH_KAMAR, tb_tipekamar.STOK_KAMAR,tb_harga.HARGA FROM tb_datakos, tb_tipekamar, tb_harga WHERE tb_datakos.ID_KOS = tb_tipekamar.ID_KOS AND tb_harga.ID_KAMAR order by tb_harga.HARGA";

            
            // $dewan1 = $kos->prepare($query);
            // $dewan1->bind_param('kos', $search_ALAMAT, $search_HARGA, $search_JENIS_KOS, $search_keyword, $search_keyword, $search_keyword);
            // $dewan1->execute();
            // $res1 = $dewan1->get_result();
            $ambil = $kos->query("SELECT * FROM tb_datakos JOIN tb_tipekamar JOIN tb_harga WHERE tb_datakos.ALAMAT_KOS LIKE '$search_keyword' OR tb_datakos.jenis_kos LIKE '$search_keyword' OR ");

 
                while ($ambil->fetch_array()) {
                    $id = $row['id'];
                    $ALAMAT_KOS = $row['ALAMAT_KOS'];
                    $JENIS_KOS = $row['JENIS_KOS'];
                    $HARGA = $row['HARGA'];
                    
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $ALAMAT_KOS; ?></td>
                <td><?php echo $JENIS_KOS; ?></td>
                <td><?php echo $HARGA; ?></td>
                
            </tr>
        <?php  } else { ?> 
            <tr>
                <td colspan='7'>Tidak ada data ditemukan</td>
            </tr>
        <?php } ?>
    </tbody>
</table>