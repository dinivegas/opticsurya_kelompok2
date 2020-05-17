<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">
<?php if($this->session->flashdata('sukses')) {
		    echo '<div class="alert alert-success">';
		    echo $this->session->flashdata('sukses');
		    echo '</div>';
		}
		?>
	<!-- Cart item -->
	<div class="container-table-cart pos-relative">
		<div class="wrap-table-shopping-cart bgwhite">
		<h2><?php echo $title ?></h2><hr>
		
		<br>
			<table class="table-shopping-cart">
				<tr class="table-head">
					<th class="column-1">GAMBAR</th>
					<th class="column-2">PRODUK</th>
					<th class="column-3">HARGA</th>
					<th class="column-4 p-l-70">Quantity</th>
					<th class="column-5">SUBTOTAL</th>
					<th class="column-6" width="20%">AKSI</th>
				</tr>

				<?php 

				foreach ($keranjang as $keranjang) { 
					//ambil data produk
            	$id_produk 	= $keranjang['id'];
            	$produk 	= $this->produk_model->detail($id_produk);
                 //form update
                echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));

				?>
				<tr class="table-row">
					<td class="column-1">
						<div class="cart-img-product b-rad-4 o-f-hidden">
							<img src="<?php echo base_url('assets/upload/images/thumbs/'.$produk->gambar)?>" alt="IMG-PRODUCT">
						</div>
					</td>
					<td class="column-2"><?php echo $keranjang['name'] ?></td>
					<td class="column-3">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
					<td class="column-4">
						<div class="flex-w bo5 of-hidden w-size17">
							<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
								<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
							</button>

							<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

							<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
								<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
							</button>
						</div>
					</td>
					<td class="column-5">Rp.
                    	<?php
                    	$subtotal= $keranjang['price'] * $keranjang['qty'];
                    	echo number_format($subtotal,'0',',','.' );
                    	?>		
                    </td>
                    <td>
                     <button type="submit" name="update" class="btn btn-warning"><i class="fa fa-edit"> Update</i></button>   
                    <a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" name="hapus" class="btn btn-secondary"><i class="fa fa-trash-o"> Hapus</i></a>   
                    </td>
				</tr>
				<?php 
				//form close
                echo form_close();
                 // end looping keranjang belanja
           		 }
				 ?>
				 <tr class="table-row alert alert-info">
				 	<td colspan="4" class="column-1">Total Belanja</td>
				 	<td colspan= "2" class="column-2">Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
				 </tr>
			</table>
		</div>
	</div>

	<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
	<div class="flex-w flex-m w-full-sm">
	</div>
		<div class="size11 trans-0-4 m-t-10 m-b-10">
			<!-- Button -->
			 <a href="<?php echo base_url('belanja/hapus') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4"><i class="fa fa-trash-o"></i>  Hapus Keranjang Belanja</a>
		</div>
	</div>
	<div class="row">
	<div class="size11 trans-0-4 m-t-10 m-b-10">
     	  <div class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
            <a href="<?php echo base_url('home') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4"><i class="fa fa-shopping-cart"></i>  Belanja Lagi</a>
        </div>
	</div>
	</div>
	<!-- Total -->
	<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
		<h5 class="m-text20 p-b-24">
			Total Belanja
		</h5>
		<!--  -->
		<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
			<span class="s-text18 w-size19 w-full-sm">
				Pengiriman
			</span>

			<div class="w-size20 w-full-sm">
				<p class="s-text8 p-b-23">
					Pilih Kota Pengiriman Anda
				</p>

				<span class="s-text19">
					Kalkulasi Pengiriman
				</span>

				<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
					<select name="id_ongkir" class="form-control">
				    <?php foreach($ongkir as $ongkir) { ?>
				      <option value="<?php echo $ongkir->id_ongkir ?>"> 
				          <?php echo $ongkir->kota ?>
				       </option>
				       <?php } ?>
				    </select>
				</div>

				<div class="size14 trans-0-4 m-b-10">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Update Total
					</button>
				</div>
			</div>
		</div>

		<!--  -->
		<div class="flex-w flex-sb-m p-t-26 p-b-30">
			<span class="m-text22 w-size19 w-full-sm">
				Total:
			</span>

			<span class="m-text21 w-size20 w-full-sm">
				Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?>
			</span>
		</div>

		<div class="size15 trans-0-4">
			<!-- Button -->
			<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" >
				<a href="<?php echo base_url('belanja/checkout') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4"> Checkout </a>
			</button>
		</div>
	</div>
</div>
</section>
