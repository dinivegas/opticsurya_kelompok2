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
<p class="alert alert-success">Registrasi berhasil ! Silahkan <a href="<?php echo base_url('masuk') ?>" class="btn btn-info btn-sm"> Log In di sini</a> Anda juga bisa melakukan Check Out <a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-warning btn-sm"><i class="fa fa-shopping-cart"></i> Check Out</a></p>
<div class="col-md-12">

	
</div>

<div class="col-lg-12">
</div>
</div>
</section>
<!-- Shopping Cart Section End