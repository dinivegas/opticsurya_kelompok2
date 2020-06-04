<?php 
echo validation_errors('<div class= "alert alert-danger">', '</div>');
// form open
echo form_open(base_url('admin/user/edit/'.$user->id_user),' class="form-horizontal"');
?>
<div class="form-group row">
  <label class="col-md-2 col-form-label">Nama Pengguna</label>
    <div class="col-md-5">
      <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo $user->nama ?>" required>
    </div>
</div>
<div class="form-group row">
  <label class="col-md-2 col-form-label">Email Pengguna</label>
    <div class="col-md-5">
      <input type="email" name="email" class="form-control" placeholder="Email Pengguna" value="<?php echo $user->email ?>" required>
    </div>
</div>
<div class="form-group row">
  <label class="col-md-2 col-form-label">Username</label>
    <div class="col-md-5">
      <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" readonly>
    </div>
</div>
<div class="form-group row">
  <label class="col-md-2 col-form-label">Password</label>
    <div class="col-md-5">
      <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $user->password ?>" readonly>
    </div>
</div>
<div class="form-group row">
  <label class="col-md-2 col-form-label">Level Hak Akses</label>
  <div class="col-md-5">
    <select name="akses_level" class="form-control">
    	<option value="Pelapak"> Pelapak </option>
    	<option value="User" <?php if($user->akses_level=="User") { echo"selected"; }?>> User </option>
    </select>
</div>
</div>
<div class="form-group row">
  <label class="col-md-2 col-form-label"></label>
  <div class="col-md-5">
    <button class="btn btn-success btn-lg" name= "submit" type="submit">
    <i class="fa fa-save"></i> Simpan
    </button>
    <button class="btn btn-danger btn-lg" name= "reset" type="reset">
    <i class="fa fa-times"></i> Reset
    </button>
   </div>
</div>
<?php echo form_close(); ?>
