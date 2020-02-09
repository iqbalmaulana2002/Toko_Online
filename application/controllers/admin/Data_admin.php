<?php 

class Data_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != '1') {
			header('location:'.base_url('Auth/login'));
		}
	}
	
	public function index()
	{
		$table = 'tb_user';
		$data['judul'] = 'Halaman Admin';
		$where = ['role_id' => '1'];
		$data['user'] = $this->M_base->get_where_data($table, $where)->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/data_admin', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_barang()
	{
		$table = 'tb_user';
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = [
			'nama_barang' => $nama_barang,
			'username' => $username,
			'id_kategori' => $password,
			'harga' => $harga,
			'stok' => $stok
		];

		$sql = $this->M_base->insert_data($table, $data);
		if ($sql) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">User berhasil Ditambahkan<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/data_admin');
		}
	}

	public function edit($id='')
	{
		$table = 'tb_user';
		$where = ['id' => $id];
		$data['judul'] = 'Halaman Edit user';
		$data['user'] = $this->M_base->get_where_data($table, $where)->result_array();
		$data['kategori'] = $this->M_base->get_data('tb_kategori')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id = $this->input->post('id');
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
		$table = 'tb_user';
		$where = ['id' => $id];
		$sql = $this->M_base->update_data($table, $where, $data);
		if ($sql) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">user berhasil Diubah<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/data_admin');
		}
	}

	public function hapus($id='')
	{
		$table = 'tb_user';
		$where = ['id' => $id];
		$sql = $this->M_base->delete_data($table, $where);
		if ($sql) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">user berhasil Dihapus<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/data_admin');
		}
	}

}