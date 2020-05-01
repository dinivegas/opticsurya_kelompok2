<?php 
session_start();
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
if (!isset($_SESSION['admin']))
{
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
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
//     if ($bedahari < 10 )
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
//     echo "";
// }
 ?>
 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">ADMIN</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp;</div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                     <!-- <li><a href="index.php?halaman=home"><i class="fa fa-home"></i> Home</a></li> -->
                    <li><a href="index.php?halaman=pesanansaya"><i class="fa fa-shopping-cart"></i> Pesanan Saya</a></li>
                    <li><a href="index.php?halaman=produk"><i class="fa fa-file"></i>Produk</a></li>
                    <!--<li><a href="index.php?halaman=tambahproduk"><i class="fa fa-shopping-bag"></i> Tambah Produk</a></li>-->
                    <li><a href="index.php?halaman=data"><i class="fa fa-book"></i> Data</a></li>
                    <li><a href="index.php?halaman=grafik"><i class="fa fa-bar-chart-o"></i>Grafik</a></li>
                    <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </li>
                    	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=="pesanansaya")
                     {
                        include 'pesanansaya.php';
                     }
                     elseif ($_GET['halaman']=="produk")
                     {
                        include 'produk.php';
                     }
                     elseif ($_GET['halaman']=="tambahproduk") 
                     {
                        include 'tambahproduk.php';
                     }
                     elseif ($_GET['halaman']=="detail")
                     {
                        include 'detail.php';
                     }
                     elseif ($_GET['halaman']=="data")
                      {
                         include 'data.php';
                     }
                     elseif ($_GET['halaman']=="grafik")
                      {
                         include 'grafik.php';
                     }
                     elseif ($_GET['halaman']=="hapusproduk")
                      {
                         include 'hapusproduk.php';
                     }
                     elseif ($_GET['halaman']=="ubahproduk")
                     {
                         include 'ubahproduk.php';
                     }
                     elseif ($_GET['halaman']=="logout")
                     {
                         include 'logout.php';
                     }
                     elseif ($_GET['halaman']=="pembayaran")
                     {
                         include 'pembayaran.php';
                     }
                }
                else 
                {
                    include 'pesanansaya.php'; 
                }
                ?>
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
