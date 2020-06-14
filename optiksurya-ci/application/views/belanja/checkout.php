<!-- Shopping Cart Section Begin --> 
<section class="shopping-cart spad">
<div class="container">
<h2><?php echo $title ?></h2>
<br>
<?php if($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>
<div class="row">
<div class="col-lg-12">
    <div class="cart-table">
        <table>
            <thead>
                <tr>
                    <th>Foto Produk</th>
                    <th class="p-name">Produk</th>
                    <th>Harga</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <?php 
          
			//looping data keranjang belanja
            foreach ($keranjang as $keranjang) {         
            	//ambil data produk
            	$id_produk 	= $keranjang['id'];
            	$produk 	= $this->produk_model->detail($id_produk);
                 //form update
                echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
          	?>
            <tbody>
                <tr>
                    <td class="cart-pic first-row"><img src="<?php echo base_url('assets/upload/img/thumbs/'.$produk->gambar)?>" width="100" alt=""></td>
                    <td class="cart-title first-row">
                        <h5><?php echo $keranjang['name'] ?></h5>
                    </td>
                    <td class="p-price first-row">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
                    <td class="qua-col first-row">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">
                            </div>
                        </div>
                    </td>
                    <td class="total-price first-row">Rp.
                    	<?php
                    	$subtotal= $keranjang['price'] * $keranjang['qty'];
                    	echo number_format($subtotal,'0',',','.' );
                    	?>
                    </td>
                </tr>
                 <td class="close-td first-row">
                    Total <span>Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></span>
                </td>
                <?php
                //form close
                echo form_close();
                 // end looping keranjang belanja
                 } 
                ?>
            </tbody>
        </table>
        <?php echo form_open(base_url('belanja/checkout')); 
           $kode_transaksi = date('dmY').strtoupper(random_string('alnum', 8));
           ?>
        <table class="table">
           <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan ?>">
           <input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total() ?>">
           <input type="hidden" name="tgl_transaksi" value="<?php echo date('Y-m-d'); ?>">
            <table class="table">
            <thead>
                <tr>
                    <th width="25%">Kode Transaksi </th>
                    <th><input type="text" name="kd_transaksi" class="form-control" placeholder="kd_transaksi" value="<?php echo $kode_transaksi ?>" readonly required></th>
                </tr>
                <tr>
                    <th>Nama Penerima </th>
                    <th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" required></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Email Penerima</td>
                    <td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" required></td>
                </tr>
                <tr>
                    <td>No.Telepon Penerima </td>
                    <td><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan->telepon ?>" required></td>
                </tr>
                <tr>
                    <td>Alamat Pengiriman </td>
                    <td><textarea name="alamat" class="form-control" placeholder="Alamat" required><?php echo $pelanggan->alamat ?></textarea> 
                </tr>     
            </tbody>
                    <td><button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" type="submit">CHECK OUT</button></td>
        </table>
           <?php echo form_close(); ?>

    </div>
    </div>
</div>
</div>
</div>
</section>
<!-- Shopping Cart Section End