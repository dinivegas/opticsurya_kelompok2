<?

/**
 * 
 */
class Produk extends CI_Controller
{
	
	function __construct(argument)
	{
		# code...
	}

	public function edit($id_produk)
	{
		//ambil data produk yang akan diedit
		$produk 	= $this->produk_model->detail($id_produk);
		//ambil data kategori
		$kategori	= $this->kategori_model->listing();
		//validasi input
		$validasi	= $this->form_validation;

		$valid->set_rules('nama_produk', 'Nama produk', 'required', array('required' 	=> '%s harus diisi'));

		$valid->set_rules('kode_produk', 'Kode produk', 'required', array('required'	=> '%s harus diisi'));

		if($valid->run())
		{
			//check jika gambar diganti
			if (!empty($_FILES['gambar']['name'])) 
			{
				$config['upload_path']	= './assets/upload/image/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']		= '2400';
				$config['max_width']	= '2024';
				$config['max_height']	= '2024';

				$this->load->library('upload', $config);

				if (! $this->upload->do_upload('gambar'))
					//end validasi
				{
					$data	= array('title' 	=> 'Edit Produk: '.$produk->nama_produk,
						'kategori'		=> $kategori,
						'produk'		=> $produk,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/produk/edit'
					);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
					//masuk database
				}else{
					$upload_gambar	= array('upload_data'	=> $this->upload->data());

					//create thumbnail gambar
					$config['image_library']	='gd2';
					$config['source_image']		='./assets/upload/image'.$upload_gambar['upload_data']['file_name'];
					//lokasi folder thumbnail
					$config['new_image']	= './assets/upload/image/thumbs/';
					$config['create_thumb']	= TRUE;
					$config['maintain_ratio']	= TRUE;
					$config['width']		= 250; //pixels
					$config['height']		= 250;
					$config['thumb_marker']	='';

					$this->load->library('image_lib', $config);

					$this->image_lib->resize();
					//end create thumbnail

					$i = $this->input;
					//slug produk
					$slug_produk	= url_title($this->input->post('nama_produk'). ''. $this->input->post('kode_produk'), 'dash', TRUE);

					$data  =  array(
						'id_produk'		=> $id_produk,
						'id_user'		=> $this->session->userdata('id_user'),
						'id_kategori'	=> $i->post('id_kategori'),
						'kode_produk'	=> $i->post('kode_produk'),
						'nama_produk'	=> $i->post('nama_produk'),
						'slug_produk'	=> $slug_produk,
						'keterangan'	=> $i->post('keterangan'),
						'keywords'		=> $i->post('keywords'),
						'harga'			=> $i->post('harga'),
						'stok'			=> $i->post('stok'),
						//disimpn nama file gambar(gambar tidak diganti)
						'gambar'	=> $upload_gambar['upload_data']['file_name'],
						'berat'			=> $i->post('berat'),
						'ukuran'		=> $i->post('ukuran'),
						'status_produk'	=> $i->post('status_produk')
					);
					$this->produk_model->edit($data);
					$this->session->set_flashdata('sukses', 'data telah diedit');
					redirect(base_url('admin/produk'), 'refresh');
				}}
					else{
						//edit produk tanpa ganti gambar
						$i = $this->input;
						//slug produk
						$slug_produk = url_title($this->input->post('nama_produk').''.$this->input->post('kode_produk'), 'dash', TRUE);

						$data  =  array(
						'id_produk'		=> $id_produk,
						'id_user'		=> $this->session->userdata('id_user'),
						'id_kategori'	=> $i->post('id_kategori'),
						'kode_produk'	=> $i->post('kode_produk'),
						'nama_produk'	=> $i->post('nama_produk'),
						'slug_produk'	=> $slug_produk,
						'keterangan'	=> $i->post('keterangan'),
						'keywords'		=> $i->post('keywords'),
						'harga'			=> $i->post('harga'),
						'stok'			=> $i->post('stok'),
						//disimpn nama file gambar(gambar tidak diganti)
						//'gambar'	=> $upload_gambar['upload_data']['file_name'],
						'berat'			=> $i->post('berat'),
						'ukuran'		=> $i->post('ukuran'),
						'status_produk'	=> $i->post('status_produk')
					);
					$this->produk_model->edit($data);
					$this->session->set_flashdata('sukses', 'data telah diedit');
					redirect(base_url('admin/produk'), 'refresh');
				}}
				$data = array('title'	=> 'Edit produk: '.$produk->nama_produk,
					'kategori'	=> $kategori,
					'produk'	=> $produk,
					'isi'		=> 'admin/produk/edit'
				);
				$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function delete($id_produk)
	{
		//proses hapus gambar
		$produk = $this->produk_model->detail($id_produk);
		unlink('./assets/upload/image/'.$produk->gambar);
		unlink('./assets/upload/image/thumbs'.$produk->gambar);
		//end proses hapus
		$data = array('id_produk'	=> $id_produk);
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses', 'data telah dihapus');
		redirect(base_url('admin/produk'), 'refresh');
	}
}