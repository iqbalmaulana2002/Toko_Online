<?php 

class Data_barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != '1') {
			header('location:'.base_url('Auth/login'));
		}
	}
	
	public function index()
	{
		$table = 'tb_barang';
		$data['judul'] = 'Halaman Admin';
		$data['barang'] = $this->M_base->get_data($table)->result_array();
		$data['kategori'] = $this->M_base->get_data('tb_kategori')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/data_barang', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_barang()
	{
		$table = 'tb_barang';
		$nama_barang = $this->input->post('nama_barang');
		$keterangan = $this->input->post('keterangan');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$gambar = $_FILES['gambar']['name'];
		if ($gambar = ''){} else {
			$config ['upload_path'] = './uploads';
			$config ['allowed_types'] = 'jpg|jpeg|png';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo "Gambar Gagal Di Upload";
			} else {
				$gambar = $this->upload->data('file_name');
			}
		}

		$data = [
			'nama_barang' => $nama_barang,
			'keterangan' => $keterangan,
			'id_kategori' => $kategori,
			'harga' => $harga,
			'stok' => $stok,
			'gambar' => $gambar
		];

		$sql = $this->M_base->insert_data($table, $data);
		if ($sql) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Barang berhasil Ditambahkan<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/data_barang');
		}
	}

	public function edit($id='')
	{
		$table = 'tb_barang';
		$where = ['id_barang' => $id];
		$data['judul'] = 'Halaman Edit Barang';
		$data['barang'] = $this->M_base->get_where_data($table, $where)->result_array();
		$data['kategori'] = $this->M_base->get_data('tb_kategori')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id_barang = $this->input->post('id_barang');
		$nama_barang = $this->input->post('nama_barang');
		$keterangan = $this->input->post('keterangan');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		$data = array(
					'nama_barang' => $nama_barang,
					'keterangan' => $keterangan,
					'id_kategori' => $kategori,
					'harga' => $harga,
					'stok' => $stok
		);
		$table = 'tb_barang';
		$where = ['id_barang' => $id_barang];
		$sql = $this->M_base->update_data($table, $where, $data);
		if ($sql) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Barang berhasil Diubah<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/data_barang');
		}
	}

	public function hapus($id='')
	{
		$table = 'tb_barang';
		$where = ['id_barang' => $id];
		$sql = $this->M_base->delete_data($table, $where);
		if ($sql) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Barang berhasil Dihapus<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/data_barang');
		}
	}

	public function detail_barang_admin($id_barang)
	{
		$data['barang'] = $this->M_base->detail_brg($id_barang);
		$data['kategori'] = $this->M_base->get_data('tb_kategori')->result();
		$data['judul'] = 'Detail Barang';	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/detail_barang_admin', $data);
		$this->load->view('templates/footer');
	}
}