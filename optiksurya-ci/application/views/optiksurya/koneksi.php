<?php 
$koneksi = new mysqli("localhost", "root","","optikcoba"); 

function tambahproduk($barang){
	global $koneksi;
	$idkategori=htmlspecialchars($barang["id_kategori"]);
	$idbarang=htmlspecialchars($barang["id_barang"]);
	$namabarang=htmlspecialchars($barang["nama_barang"]);
	$harga=htmlspecialchars($barang["harga"]);
	$stok=htmlspecialchars($barang["stok"]);
	$tglkadaluarsa=htmlspecialchars($barang["tanggal_kadaluarsa"]);
	$foto=htmlspecialchars($barang["foto"]);
	$deskripsi=htmlspecialchars($barang["deskripsi_barang"]);

	$qu=mysqli_query($koneksi,"INSERT INTO barang VALUES ('$idbarang', '$idkategori', '$namabarang','$harga', '$stok', '$tglkadaluarsa','$foto','$deskripsi')");
	return $qu;
}
?>