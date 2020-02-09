<?php 

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != '2') {
			header('location:'.base_url('Auth/login'));
		}
	}
	
	public function elektronik()
	{
		$table = 'tb_barang';
		$where = ['id_kategori' => '1'];
		$data['elektronik'] = $this->M_base->get_where_data($table, $where)->result();
		$data['judul'] = 'Elektronik';	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('kategori/elektronik', $data);
		$this->load->view('templates/footer');
	}

	public function pakaian_pria()
	{
		$table = 'tb_barang';
		$where = ['id_kategori' => '2'];
		$data['pakaian_pria'] = $this->M_base->get_where_data($table, $where)->result();
		$data['judul'] = 'Pakaian Pria';	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('kategori/pakaian_pria', $data);
		$this->load->view('templates/footer');
	}

	public function pakaian_wanita()
	{
		$table = 'tb_barang';
		$where = ['id_kategori' => '3'];
		$data['pakaian_wanita'] = $this->M_base->get_where_data($table, $where)->result();
		$data['judul'] = 'Pakaian Wanita';	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('kategori/pakaian_wanita', $data);
		$this->load->view('templates/footer');
	}

	public function pakaian_anak()
	{
		$table = 'tb_barang';
		$where = ['id_kategori' => '4'];
		$data['pakaian_anak'] = $this->M_base->get_where_data($table, $where)->result();
		$data['judul'] = 'Pakaian Anak';	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('kategori/pakaian_anak', $data);
		$this->load->view('templates/footer');
	}

	public function peralatan_olahraga()
	{
		$table = 'tb_barang';
		$where = ['id_kategori' => '5'];
		$data['peralatan_olahraga'] = $this->M_base->get_where_data($table, $where)->result();
		$data['judul'] = 'Peralatan Olahraga';	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('kategori/peralatan_olahraga', $data);
		$this->load->view('templates/footer');
	}
}