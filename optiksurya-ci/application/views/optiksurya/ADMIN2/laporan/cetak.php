<?php

include "fpdf.php";
$koneksi = mysqli_connect("localhost", "root", "", "optikcoba");

$pdf = new FPDF;
$pdf -> AddPage();

$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,5,'OPTIK SURYA','0','1','C',false);
$pdf->SetFont('Arial','I',8);
$pdf->Cell(0,5,'Alamat : Perum Mastrip','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,5,'Laporan Penjualan','0','1','L',false);
$pdf->Ln(3);

$pdf->SetFont('Arial','B',7);
$pdf->Cell(8,6,'No. ',1,0,'C');
$pdf->Cell(35,6,'Pembeli',1,0,'C');
//$pdf->Cell(37,6,'Produk',1,0,'C');
$pdf->Cell(35,6,'Tanggal',1,0,'C');
$pdf->Cell(35,6,'Jumlah',1,0,'C');
$pdf->Cell(35,6,'Status',1,0,'C');
$pdf->Ln(2);
$no = 0;
$tgl_mulai = $_GET['tgm'];
$tgl_selesai = $_GET['tgs'];
	$ambil= $koneksi->query("SELECT * FROM pemesanan pm LEFT JOIN pembeli pl ON pm.NIK=pl.NIK WHERE TGL_PEMESANAN BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
while($data=mysqli_fetch_array($ambil)){
	$no++;
	$pdf->Ln(4);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(8,4,$no.".",1,0,'C');
	$pdf->Cell(35,4,$data['NAMA_PEMBELI'],1,0,'L');
	$pdf->Cell(35,4,$data['TGL_PEMESANAN'],1,0,'L');
	$pdf->Cell(35,4,$data['TOTAL_HARGA'],1,0,'L');
	$pdf->Cell(35,4,$data['STATUS_PEMBAYARAN'],1,0,'L');

}
$pdf->Output();

?>

