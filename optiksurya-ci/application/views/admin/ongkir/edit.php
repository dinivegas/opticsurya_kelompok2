<?php 
echo validation_errors('<div class= "alert alert-danger">', '</div>');
// form open
echo form_open(base_url('admin/ongkir/edit/'.$ongkir->id_ongkir),' class="form-horizontal"');
?>
<div class="form-group row">
  <label class="col-md-2 col-form-label">Kota</label>
    <div class="col-md-5">
      <input type="text" name="kota" class="form-control" placeholder="Kota" value="<?php echo $ongkir->kota ?>" required>
    </div>
</div>
<div class="form-group row">
  <label class="col-md-2 col-form-label">Tarif</label>
    <div class="col-md-5">
      <input type="number" name="tarid" class="form-control" placeholder="Tarif" value="<?php echo $ongkir->tarif ?>" required>
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
