<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                   <?php include ('menu.php') ?>
                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                <!-- Product -->
               	
               	
               	<h1 ><?php echo $title ?></h1>
                   <hr>
                   <p>Berikut adalah riwayat belanja anda</p>

                   <?php
                    // Kalau ada transaksi 
                   if($detail_transaksi) {
                    ?>
                    <table class="table table-bordered" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>No</th>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Jumlah Total</th>
                                <th>Jumlah Item</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($detail_transaksi as $detail_transaksi) { ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $detail_transaksi->kd_transaksi ?></td>
                                <td><?php echo date('d-M-Y',strtotime($detail_transaksi->tgl_transaksi)) ?></td>
                                <td><?php echo number_format($detail_transaksi->jumlah_transaksi) ?></td>
                                <td><?php echo $detail_transaksi->total_item ?></td>
                                <td><?php echo $detail_transaksi->status_bayar ?></td>
                                <td>
                                    <a href="<?php echo base_url('dashboard/detail/' .$detail_transaksi->kd_transaksi) ?>" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i>Detail </a>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                    <?php
                    }else{ ?>
                    <p class="alert alert-success">
                        <i class="fa fa-warning"></i>Belum ada data transaksi</p>
                    </
                    <?php
                    }
                    ?>
               		
               	</div>
                </div>
            </div>
        </div>
    </div>
</section>