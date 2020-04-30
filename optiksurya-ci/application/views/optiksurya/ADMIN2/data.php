<!-- <?php  include 'graph3.php'; ?> -->
<?php 
$semuadata=array();
$tgl_mulai="-";
$tgl_selesai="-";

if (isset($_POST["kirim"])) 
{
	$tgl_mulai = $_POST["tglm"];
	$tgl_selesai = $_POST['tgls'];
	$ambil= $koneksi->query("SELECT * FROM pemesanan pm LEFT JOIN pembeli pl ON pm.NIK=pl.NIK WHERE TGL_PEMESANAN BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
	while($pecah = $ambil -> fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1>Laporan Penjualan dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></h1>
		<ol class="breadcrumb">
		<li <a href=""><i class="fa fa-book"></i></a></li>
		<li <a href="">Grafik</a></li>
		<li class="active">Grafik Penjualan</li>
		</ol>
	</div>
</div>
<form method="post">
	<!-- <?php //echo $tgl_mulai;
	//echo $tgl_selesai;
	 ?> -->
	<div class = "row">
		<div class="col-md-5">
			<div class="form-group">
				<label> Tanggal Mulai </label>
				<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
			</div>	
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label> Tanggal Selesai </label>
				<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
			</div>	
		</div>
		<div class="col-md-2">
		<label>&nbsp;</label><br>
			<button class="btn btn-primary" name= "kirim">Lihat</button>
			<a class="btn btn-success" href="laporan/cetak.php?tgm=<?php echo $tgl_mulai;?>&tgs=<?php echo $tgl_selesai;?>" target="_blank"><i class="fa fa-print"></i>Print</a>
			<!-- <input type="submit" name=""> -->
	</div>	
</form>
<table class= "table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Pembeli</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php $total=0; ?>
	<?php foreach ($semuadata as $key => $value): ?>
	<?php $total += $value ['TOTAL_HARGA']?>
		<tr>
			<td><?php echo $key+1 ?></td>
			<td><?php echo $value["NAMA_PEMBELI"]?></td>
			<td><?php echo $value["TGL_PEMESANAN"]?></td>
			<td>Rp. <?php echo number_format($value["TOTAL_HARGA"])?></td>
			<td><?php echo $value["STATUS_PEMBAYARAN"]?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
	<tr>
	<th  colspan="3">Total</th>
	<th>Rp.<?php echo number_format ($total)?></th>
	</tr>
	</tfoot>
	</table?
