<?php 
    $koneksi = mysqli_connect("localhost", "root", "", "optikcoba");
    if (!$koneksi) {
        die(mysqli_connect_error());
    }

    $barang = mysqli_query($koneksi, "SELECT NAMA_BARANG FROM barang order by ID_BARANG ASC");
    $jumlah = mysqli_query($koneksi, "SELECT JUMLAH_BARANG FROM detail_pemesanan");
?>
<html lang="en">
    <head>
        <title>GRAFIK</title>
        <script src="assets/js/chartjs/Chart.js"></script>
        <style type="text/css">
            .container {
                width: 60%;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar', // bisa diganti ke 'line', 'bar', 'radar', 'polarArea', 'pie', 'doughnut', 'bubble', 'scatter',
                data: {
                    labels: [<?php while ($databarang = mysqli_fetch_array($barang)) { 
                        echo '"' . $databarang['NAMA_BARANG'] . '",';} ?>],
                    datasets: [{
                            label: 'Grafik Stok Kacamata Optik SURYA',
                            data: [<?php while ($datajumlah = mysqli_fetch_array($jumlah)) {
                            echo '"' . $datajumlah['JUMLAH_BARANG'] . '",'; } ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(200, 100, 78, 0.2)',
                                'rgba(300, 102, 42, 0.2)',
                                'rgba(100, 20, 90, 0.2)',
                                'rgba(100, 39, 50, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(200, 40, 90, 1)',
                                'rgba(274, 30, 50, 1)',
                                'rgba(200, 10, 64, 1)',
                                'rgba(143, 20, 30, 1)'
                            ],
                            borderWidth: 2
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
        <h2 style="font-family: monospace;font-size: 14px; text-align: right;">Chart using Chart.JS</h2>
    </body>
</html>