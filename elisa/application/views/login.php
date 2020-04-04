<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<script src="<?php echo base_url()?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>


    <!-- Custom styles for this template -->
 <link href="<?php echo base_url()?>assets/css/signin.css" rel="stylesheet">
  </head>
  <body>
  <?php echo form_open('welcome/login',array('class'=>'form-signin')); ?>

  <div class="container">
  <img class="mb-4"  src="<?php echo base_url()?>assets/img/Picture2.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please Log In</h1>
  <label for="username" class="sr-only">Username</label>
  <input type="text" id="username" name= "username" class="form-control" placeholder="Masukan Username Anda" required autofocus><br>
  <label for="password" class="sr-only">Password</label>
  <input type="password" id="password" name="password" class="form-control" placeholder="Masukan Password Anda" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Log In</button>
	<?php echo form_close() ?>


</div>

</body>
</html>
