<!-- Shopping Cart Section Begin --> 
<section class="shopping-cart spad">
<div class="container">
<h2><?php echo $title ?></h2>
<br>
<?php if($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-warning">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>
<p class="alert alert-success">Terimakasih, Produk yang anda beli akan kami proses</p>
<div class="col-md-12">

	
</div>

<div class="col-lg-12">
</div>
</div>
</section>
<!-- Shopping Cart Section End