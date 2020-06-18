<div class="row">
	<div class="col-lg-12">
		<h1>Data <small>Produk</small></h1>
		<ol class="breadcrumb">
		<li <a href=""><i class="far fa-cubes"></i></a></li>
		<li <a href="">Data</a></li>
		<li class="active">Produk</li>
		</ol>
	</div>
</div>
<p><a href="index.php?halaman=tambahproduk" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Barang Baru</a>
</p>

<table class= "table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>Id barang</th>
			<th>Kategori</th>
			<th>Nama barang</th>
			<th>harga</th>
			<th>stok</th>
			<th>tanggal kadaluarsa</th>
			<th>foto</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
	<?php $koneksi = new mysqli("localhost", "root", "", "optikcoba");?>
	<?php $ambil = $koneksi-> query ("SELECT * FROM barang INNER JOIN kategori ON barang.ID_KATEGORI = kategori.ID_KATEGORI"); ?>
	<?php while ($pecah =$ambil-> fetch_assoc()){ ?>
	<tr>
		<td><?php echo $nomor;?></td>
		<td><?php echo $pecah['ID_BARANG'];?></td>
		<td><?php echo $pecah['KATEGORI'];?></td>
		<td><?php echo $pecah['NAMA_BARANG'];?></td>
		<td><?php echo $pecah['HARGA_BARANG'];?></td>
		<td><?php echo $pecah['STOK_BARANG'];?></td>
		<td><?php echo $pecah['TGL_KADALUARSA'];?></td>
		<td><img src="../foto_produk/<?php echo $pecah['GAMBAR_BARANG']; ?>" width="100"></td>
		
		<td>
		<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['ID_BARANG'];?>" class="btn-danger btn">hapus</a>
		<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['ID_BARANG'];?>" class="btn-warning btn">edit</a>
		</td>
		
	</tr>
	<?php $nomor++ ?>
	<?php } ?>
		
	</tbody>
</table>