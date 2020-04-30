<div class="row">
	<div class="col-lg-12">
		<h1>Data <small>Pesanan Saya</small></h1>
		<ol class="breadcrumb">
		<li <a href=""><i class="fa fa-shopping-cart"></i></a></li>
		<li <a href="">Data</a></li>
		<li class="active">Pesanan Saya</li>
		</ol>
	</div>
</div>
<?php
$koneksi = new mysqli("localhost", "root","","optikcoba");
$waktupembayaran=date("Y-m-d");
//$stok= mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE TGL_JATUHTEMPO==$waktupembayaran AND STATUS_PEMBAYARAN='Pending'");
$a= "SELECT * FROM pemesanan, detail_pemesanan WHERE pemesanan.ID_PEMESANAN=detail_pemesanan.ID_PEMESANAN AND TGL_JATUHTEMPO='$waktupembayaran' AND STATUS_PEMBAYARAN='Pending'";
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
//select data dari pemesanan+detailpemesanan
// $jatuhtempo = mysqli_query($koneksi,"SELECT * FROM pemesanan JOIN detail_pemesanan WHERE 'TGL_JATUHTEMPO'");
// //ambil nilai tgl deadline 
// //$deadline = mysqli_query($koneksi,"SELECT * FROM pemesanan WHERE tgl_pemesanan");
// //ambil nilai dari datesys 
// //$deadsys= mysqli_query($koneksi,"SELECT * FROM transfer WHERE tgl_transfer");
// //bandingkan dengan if antara nilai deadline dan date jika, nilai date lebih besar daripada deadline maka update status pembayaran 

// // duedate.php
// $tglbayar = strtotime('TGL_TRANSFER'); // 25 April 2015
// $tglsekarang = strtotime('TGL_PEMESANAN'); // 26 Juni 2015
// $jatuhtempo = strtotime('TGL_JATUHTEMPO'); // 1 Juli 2015
 
// // hitung perbedaan  jatuh tempo dengan sekarang 
// $beda = $jatuhtempo - $tglsekarang; // unix time
// // konversi $beda kedalam hari
// $bedahari = ($beda/24/60/60);
 
// // pastikan nilainya positif, kalo negatif berarti sudah lewat.
// if ($beda > 0 )
// {
//     if ($bedahari < 10s )
//     {
//         echo "Waktunya ditagih!!!. Jatuh tempo dalam $bedahari hari.";
//     }
//     else 
//     {
//         echo "Masih lama. Nagihnya $bedahari hari lagi.";
//     }
// }
// else
// {
//     echo "ayo bayar";
// }
?>
<table class="table table-bodered">
		<thead>
			<tr>
				<th>No</th>
				<th>Id Pembeli</th>
				<th>Nama</th>
				<th>Jumlah Harus Dibayar</th>
				<th>Status</th>
				<th>Tanggal Pemesanan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor=1; ?>
			<?php $ambil= $koneksi-> query ("SELECT * FROM pemesanan JOIN pembeli ON pemesanan.NIK = pembeli.NIK"); ?>
			<?php while ($pecah = $ambil->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $nomor;  ?></td>
				<td><?php echo $pecah['ID_PEMESANAN'];?></td>
				<td><?php echo $pecah ['NAMA_PEMBELI'];?></td>
				<td><?php echo $pecah ['TOTAL_HARGA'];?></td>
				<td><?php echo $pecah ['STATUS_PEMBAYARAN'];?>
				<td><?php echo $pecah ['TGL_PEMESANAN'];?>
				<td>

				<a href="index.php?halaman=detail&id=<?php echo $pecah['ID_PEMESANAN']; ?>" class="btn btn-info">detail</a>
				<?php if($pecah['STATUS_PEMBAYARAN']!=="Pending"): ?>
				<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['ID_PEMESANAN']; ?>" class="btn btn-success">Lihat Pembayaran</a>
			<?php endif ?>
				</td>
			</tr>
			<?php $nomor++; ?>
			<?php } ?>
		</tbody>
	</table>