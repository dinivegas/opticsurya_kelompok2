 <h2> Data Kos </h2>
<thead>

<table class="table table-bordered">


<tr>
	<th>NOMOR</th>
	<th>ID_KAMAR</th>
	<th>ID_KOS</th>
	<th>UKURAN KAMAR</th>
	<th>FASILITAS KAMAR</th>
	<th>STOK KAMAR</th>
	<th>KETERANGAN</th>
	<th>FOTO KAMAR</th>
	</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
	<?php $koneksi = new mysqli ("localhost", "root", "", "kos"); ?>
	<?php $ambil= $koneksi->query(' SELECT * FROM tb_tipekamar INNER JOIN tb_harga ON tb_tipekamar.ID_KAMAR = tb_harga.ID_KAMAR
	JOIN tb_datakos ON tb_tipekamar.ID_KOS = tb_datakos.ID_KOS'); ?>
    <?php while ($pecah= $ambil  -> fetch_assoc()) { ?>

 	<tr style="text-align: center;">
 		
 	</tr>

 		<td><?php echo $nomor['ID_KAMAR'];  ?></td>
 		<td><?php echo $pecah['ID_KOS'];  ?></td>
 		<td><?php echo $pecah['UKURAN_KAMAR'];  ?></td>
 		<td><?php echo $pecah['FASILITAS_KAMAR'];  ?></td>
 		<td><?php echo $pecah['STOK_KAMAR']; ?></td>
 		<td><?php echo $pecah['KETERANGAN']; ?></td>
 		<td>
 			<img src="../foto_kos/<?php echo $pecah['FOTO_KAMAR']; ?>" width="100">
 		</td>

 		<td>
 			<a href="index.php?halaman=hapusdata_kos&id=<?php echo $pecah['ID_KOS']; ?>"
 			class="btn-danger btn">hapus</a>
 			<a href="index.php?halaman=ubahdatakos&id=<?php echo $pecah['ID_KOS'];
 			?>" cl ass="btn btn-warning" >ubah</a>
 		</td>
 		</tr>
 		<?php $nomor++; ?>
 		<?php } ?>


</tbody>
 </table>
<a href="" class="btn btn-primary">Tambah Data Kos</a>