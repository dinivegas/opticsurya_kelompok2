<p>
	<a href="<?php echo base_url('admin/ongkir/tambah')?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i>Tambah Data
	</a>
</p>
<!-- nptifikasi -->
<?php 
if ($this->session->flashdata('sukses')) 
{
	echo '<p class="alert alert-info">';
	echo $this->session->flashdata('sukses');
	echo'</div>';
}
?>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>No</th>
			<th>Kota</th>
			<th>Tarif</th>
			<th>Slug</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; foreach ($ongkir as $ongkir) {?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $ongkir->kota ?></td>
			<td><?php echo $ongkir->tarif ?></td>
			<td><?php echo $ongkir->slug_ongkir ?></td>
			<td>
				<a href="<?php echo base_url('admin/ongkir/edit/'.$ongkir->id_ongkir)?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>
				<a href="<?php echo base_url('admin/ongkir/delete/'.$ongkir->id_ongkir)?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ?')"><i class="fa fa-trash"></i>Hapus</a>
			</td>

		</tr>
	<?php } ?>
	</tbody>
</table>