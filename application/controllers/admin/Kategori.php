<?php 

class Kategori extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != '1') {
			header('location:'.base_url('Auth/login'));
		}
	}
	
	public function index()
	{
		$table = 'tb_kategori';
		$data['judul'] = 'Halaman Admin';
		$data['kategori'] = $this->M_base->get_data($table)->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/kategori', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_barang()
	{
		$table = 'tb_kategori';
		$kategori = $this->input->post('kategori', true);

		$data = [
			'kategori' => $kategori
		];

		$sql = $this->M_base->insert_data($table, $data);
		if ($sql) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kategori berhasil Ditambahkan<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/Kategori');
		}
	}

	public function edit($id='')
	{
		$table = 'tb_kategori';
		$where = ['id' => $id];
		$data['judul'] = 'Halaman Edit Kategori';
		$data['kategori'] = $this->M_base->get_where_data($table, $where)->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin');
		$this->load->view('admin/edit_kategori', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id = $this->input->post('id', true);
		$kategori = $this->input->post('kategori', true);

		$data = array(
					'kategori' => $kategori
		);
		$table = 'tb_kategori';
		$where = ['id' => $id];
		$sql = $this->M_base->update_data($table, $where, $data);
		if ($sql) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kategori berhasil Diubah<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/Kategori');
		}
	}

	public function hapus($id='')
	{
		$table = 'tb_kategori';
		$where = ['id' => $id];
		$sql = $this->M_base->delete_data($table, $where);
		if ($sql) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kategori berhasil Dihapus<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/Kategori');
		}
	}
}