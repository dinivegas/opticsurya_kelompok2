<div class="col-md-3">
					<div class="thumbnail">
						<img src="foto_produk/<?php echo $perbarang['GAMBAR_BARANG']; ?>" alt="">
						<div class="caption">
							<h3><?php echo $perbarang['NAMA_BARANG'];?></h3>
							<h5>Rp. <?php echo number_format($perbarang['HARGA_BARANG']);?></h5>
							<h6>Stok : <?php echo $perbarang['STOK_BARANG']; ?></h6>
								<a href="detail.php?id=<?php echo $perbarang['ID_BARANG']; ?>" class="btn btn-info"><i class="fa fa-shopping-cart"></i> Beli</a>
								<a href="detail.php?id=<?php echo $perbarang['ID_BARANG']; ?>" class="btn btn-warning"><i class="fa fa-info-circle"></i> Detail</a>
							
						</div>
					</div>
				</div>